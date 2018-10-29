<?php

namespace Modules\Reception\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Modules\General\Entities\State;
use Modules\General\Entities\Email;
use Modules\General\Entities\Telephone;
use Modules\User\Entities\User;
use Modules\Doctor\Entities\Doctor;
use Modules\User\Entities\Patient;
use Modules\Reception\Entities\Receptionist;
use Modules\Appointment\Entities\Appointment;
use Modules\User\Entities\Employee;
use Illuminate\Database\Query\Expression;
use Modules\GeneralAdministration\Entities\Roster;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            $user=User::find(Auth::user()->user_id);
            $profile_pic= Employee::find(Auth::user()->id)->profile_pic;
            $doctors = Doctor::all();
            $states = State::all();
            return view('reception::index',['user'=>$user,'doctors'=>$doctors,'states'=>$states, 'profile_pic'=>$profile_pic]);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('reception::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user= User::create(['fname' => $request->fname, 'lname' => $request->lname, 'gender' => $request->gender, 'dob' => $request->dob, 'street' => $request->street, 'city' => $request->city, 'role' => '7','state_id' => $request->state == -1 ? null: $request->state]);
        $patient= $user->patient()->create(['nationality' => $request->nationality]);
        if($request->email != null)
            $user->emails ()->create(['email' => $request->email]);
        if($request->phone != null)
            $user->telephones()->create(['tel_no' => $request->phone]);
        return response()->json(array_merge($user->toArray(),['patient'=>$patient]));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('reception::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function updateProfilePic(Request $request)
    {
        /*
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/
        /*$employee= Employee::find(Auth::user()->id);
        $receptionist= Receptionist::where('employee_id',$employee->id)->get()->first();
        
        if(File::exists(public_path().'/profile_images/'.$employee->profile_pic)) {
            File::delete(public_path().'/profile_images/'.$employee->profile_pic);
        }
        
        $imageName = 'receptionist'.$receptionist['id'].'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('profile_images'), $imageName);
        
        $employee->profile_pic=$imageName;
        $employee->save();
        
        
        
        return response()->json(array('path'=> '/profile_images/'.$imageName));*/
        
        
       if(Input::hasFile('file')) {
      //upload an image to the /img/tmp directory and return the filepath.
            $file = Input::file('file');
        
        $employee= Employee::find(Auth::user()->id);
        $receptionist= Receptionist::where('employee_id',$employee->id)->get()->first();
        
        if(File::exists(public_path().'/profile_images/'.$employee->profile_pic)) {
            File::delete(public_path().'/profile_images/'.$employee->profile_pic);
        }
        
        $imageName = 'receptionist'.$receptionist['id'].'.'.$file->getClientOriginalExtension();
        $file->move(public_path('profile_images'), $imageName);
        
        $employee->profile_pic=$imageName;
        $employee->save();
        
      return response()->json(array('path'=> '/profile_images/'.$imageName), 200);
    } else {
      return response()->json(false, 200);
    }
        
        
        
        
        //return response()->json("success");
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    
    
    public function getDoctorsByDay(Request $request){
        $rosters = Roster::with('work_period')->with('doctor.employee.user')->where('day',$request->day)->where('doctor_id','NOT LIKE',null)->get();
        return response()->json($rosters->toArray());
    }
    
    public function searchPatient(Request $request){
        $q=$request->q;
        $patients="[]";
        if (strlen($q)>0) {
            if($request->fn=="true"){
                if($request->ln=="true")
                    $patients = User::with('patient')->where('role','7')->where(function($query)use($q){
                        $query->where('fname','like',$q.'%')->orWhere('lname','like',$q.'%');
                    })->get()->toJson();
                else
                    $patients = User::with('patient')->where('role','7')->where('fname','like',$q.'%')->get()->toJson();
            }elseif ($request->ln=="true") {
                $patients = User::with('patient')->where('role','7')->where('lname','like',$q.'%')->get()->toJson();
            }elseif ($request->ph=="true") {
                if(substr($q, 0,1)=='0')
                        $q=  substr ($q, 1);
                $telephones = Telephone::where('tel_no','like','%'.$q.'%')->select('user_id')->get()->toArray();
                if ($telephones!=null)
                    $patients = User::with('patient')->where('role','7')->whereIn('id',$telephones)->get()->toJson();
            }
        }
        return response()->json($patients);
    }
    
    public function searchDoctor(Request $request){
        $q=$request->q;
        $dfirst=$request->dfirst;
        $dlast=$request->last;
        $sort=$request->sort;
        $dspeciality=$request->dspeciality;
        
        $query=Doctor::query();
        $query->select((new Doctor())->getTable().".*");
        $query->addSelect(new Expression("`users`.`fname` AS `fname`"));
        $query->addSelect(new Expression("`users`.`lname` AS `lname`"));
        $query->addSelect(new Expression("`users`.`gender` AS `gender`"));
        $query->join('employees', 'employees.id', '=', 'doctors.employee_id')->join('users', 'users.id', '=', 'employees.user_id'); //->with($relation_name);
        if($dfirst || $dlast){
            if(!$dlast)
                $query->where('users.fname','like',$q.'%');                      
            elseif (!$dfirst)
                $query->where('users.lname','like',$q.'%');                      
            else
                $query->where('users.fname','like',$q.'%')->orWhere('users.lname','like',$q.'%');
        }elseif ($dspeciality) {
            $query->where('speciality','like',$q.'%');                      
        }
        if($sort=="dfname")
            $query->orderBy('users.fname');
        elseif($sort=="dlname")
            $query->orderBy('users.lname');
        elseif($sort=="dsp")
            $query->orderBy('speciality');
        $doctors=$query->get();
        return response()->json($doctors->toArray());
    }
    
    
    
    public function getPatientByUserId(Request $request)
    {
        $user= User::with('patient')->find($request->user_id);
        return response()->json($user->toArray());
    }
    public function getDoctorById(Request $request)
    {
        $doctor= Doctor::with('employee.user')->find($request->id);
        return response()->json($doctor->toArray());
    }
    
     public function resetPassword(Request $request)
    {
       
		$email= Email::with('user')->find(str_replace("%40", "@", $request->email));
		$emp= Employee::where('user_id', $email['user']['id'])->get()->first();
		
		//if($emp_current->password==Hash::make($request->NewPassword)){
		if (Auth::attempt(array('user_id' => $email['user']['id'], 'password' => $request->CurrentPassword))) {
			$emp->password=Hash::make($request->NewPassword);
			$emp->save();
			
			return response()->json('Updated Successfully');	
		}
		return response()->json('Old email or pasword incorrect');
		
    
    }

    
    
}
