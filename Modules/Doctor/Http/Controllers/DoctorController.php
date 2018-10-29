<?php

namespace Modules\Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\http\Controllers\Controller;
use Modules\Appointment\Entities\Appointment;
use Modules\User\Entities\User;
use Modules\Doctor\Entities\Doctor;
use Illuminate\Support\Facades\Mail;
use Modules\User\Entities\Patient;
use Modules\User\Entities\Employee;
use Modules\General\Entities\Telephone;
use Modules\General\Entities\Email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Modules\MedicalRecord\Entities\MedicalRecord;
use Modules\Doctor\Emails\PasswordResetMail;
use LRedis;



use App\Events\TestingEvent;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('doctor::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
		
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('doctor::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
   

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    public function home(Request $request)
    {
		
		if (Auth::check()&& User::find(Auth::user()->user_id)->role=="4") {
            // The user is logged in...
			$user=User::find(Auth::user()->user_id);
            $profile_pic= Employee::find(Auth::user()->id)->profile_pic;
			return view('doctor::home',['user'=>$user,'profile_pic'=>$profile_pic]);
        	}
        	return redirect('/');

    }

	public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
	
    public function updateInfor(Request $request)

    {
		if (Auth::check()&& User::find(Auth::user()->user_id)->role=="4") {
            // The user is logged in...
			$doc= Doctor::all();
            $states= \Modules\General\Entities\State::all();
			return view('doctor::UpdateInfor' , ['dID'=>$doc,'states'=>$states]);
        	}
        	return redirect('/');
        
    }
	
	 public function profilePicture(Request $request)

    {
		if (Auth::check()&& User::find(Auth::user()->user_id)->role=="4") {
            // The user is logged in...
			$user=User::find(Auth::user()->user_id);
            $profile_pic= Employee::find(Auth::user()->id)->profile_pic;
			return view('doctor::profilePicture',['user'=>$user,'profile_pic'=>$profile_pic] );
        	}
        	return redirect('/');
        
    }

    public function updateDetails(Request $request)
    {
        
        //doc, emp, user update
        $doc= Doctor::find($request->id);
        $emp= Employee::find($doc->employee_id);
        $user= User::find($emp->user_id);
        
        $doc->appointment_price = $request->chanellingCharges;
		$doc->type = $request->Type;
        $user->fname=$request->FName;
        $user->lname=$request->LName;
        $user->street=$request->Add1;
        $user->city=$request->Add2;
		$user->state_id=$request->Add3;
		
        $user->save();
        $emp->save();
        $doc->save();
        
        //email,  tel update
        
        if($request->TelNo!=null){
            $tel= Telephone::where('user_id',$user->id)->first();
            if($tel==null){
                $tel=new Telephone();
                $tel->tel_no=$request->TelNo;
                $tel->user_id=$user->id;
                $tel->save();
            }else{
                $tel->update(['tel_no'=>$request->TelNo]);
            }
        }
        if($request->email!=null){
            $email=Email::where('user_id',$user->id)->first();
            if($email==null){
                $email=new Email();
                $email->email=$request->email;
                $email->user_id=$user->id;
                $email->save();
            }else{
                $email->update(['email'=>$request->email]);
            }
        }
        
	return response()->json('Updated Successfully');

    }
		
	 public function resetPassword(Request $request)
    {
        //doc, emp update
		
		$email= Email::with('user')->find(str_replace("%40", "@", $request->email));
		$emp= Employee::where('user_id', $email['user']['id'])->get()->first();
		
		//if($emp_current->password==Hash::make($request->NewPassword)){
		if (Auth::attempt(array('user_id' => $email['user']['id'], 'password' => $request->CurrentPassword))) {
			$emp->password=Hash::make($request->NewPassword);
			$emp->save();
                        
			if($email["email"]!=null){
                            /*$email_status= Mail::to('dulminiviweka@gmail.com')->send(new PasswordResetMail());*/
			return response()->json('Updated Successfully');
			
			
                         }
		}
		return response()->json('Old email or pasword incorrect');
		
    }

		
	public function patientDetails(Request $request)
    {	
			if (Auth::check()&& User::find(Auth::user()->user_id)->role=="4"){
            // The user is logged in...
			$patients= Patient::all();
			return view('doctor::PatientDetails', ['pats'=>$patients]);
        	}
        	return redirect('/');
    }

	public function appointments(Request $request)
    {	
		
		if (Auth::check()&& User::find(Auth::user()->user_id)->role=="4"){
            // The user is logged in...
			$patients= Patient::all();
			$aDates=Appointment::all();
			return view('doctor::Appointments',['aDate'=>$aDates]);
        	}
        	return redirect('/');
		

    }

	public function reset(Request $request)
    {
		if (Auth::check()&& User::find(Auth::user()->user_id)->role=="4"){
            // The user is logged in...
			$patients= Patient::all();
			return view('doctor::Reset');
        	}
        	return redirect('/');
		

    }


    public function newHome(Request $request)
    {
		return view('doctor::NewHome');

    }

    
    public function doctorCame(Request $request)
    {
	$redis = LRedis::connection();
        $redis->publish('message', "Doctor Arrived");
        return "PUBLISHED";
    }

	public function getPatientDetail(Request $request)
    {
		$patient= Patient::find($request->pID);
		$user = User::find($patient['user_id']);
		$record= MedicalRecord::where('patient_id',$request->pID)->get();
		$u=$user->toArray();
		$r=$record->toArray();
		
		return response()->json(array('user'=>$u,'record'=>$r));
		
		/*$employeeid=Auth::user()->id;
        $query= Appointment::query();
		$query->where('doctor_id', $employeeid);
		$query->where('appointment_no',$appNo);
		
        $patientId=$request['pid'];
        $patient= Patient::find($patientId);
        $user = User::find($patient->user_id);
        $appointment= Appointment::where('patient_id', $patientId)->get();
        
        $a=$appointment->toArray();
        $u=$user->toArray();
        
        return response()->json(array('user'=>$u, 'appointment'=>$a));*/
    }
	public function getDetail(Request $request)
	{
		$date=$request['appDate'];
		$query= Appointment::query();
		$query->where('date',$date);
        $query->where('doctor_id', Doctor::where('employee_id',Auth::user()->id)->get()->first()->id);
		$appointment= $query->get();
		
		return response()->json($appointment->toArray());
	}
	
	
	/*public function getMedicalRecords(Request $request)
    {
		$patientNo=$request['pno'];
        $query= MedicalRecord::query();
		$query->where('patient_id',$patientNo);
		$patient=$query->get();
		
        return response()->json($patient->toArray());
    }*/

	public function getAppointmentCount(Request $request)
    {
		$date=$request['appDate'];
		$query= Appointment::query();
		$query->where('date',$date);
        $query->where('doctor_id', Doctor::where('employee_id',Auth::user()->id)->get()->first()->id);
		$count=$query->get()->count();
        
        return response()->json(['count'=>$count]);
    }
	
	public function getEmployeeDetails(Request $request)
    {
		
		$employeeid=Auth::user()->id;
        $query= Doctor::query();
		$query->where('employee_id', $employeeid);
		$query->with('employee.user.telephones');
		$query->with('employee.user.emails');
		$employee=$query->get();
        return response()->json($employee->toArray());
    }
	
	 public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $employee= Employee::find(Auth::user()->id);
        $doctor= Doctor::where('employee_id',$employee->id)->get()->first();
        
        if(File::exists(public_path().'/profile_images/'.$employee->profile_pic)) {
            File::delete(public_path().'/profile_images/'.$employee->profile_pic);
        }
        
        $imageName = 'doctor'.$doctor['id'].'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('profile_images'), $imageName);
        
        $employee->profile_pic=$imageName;
        $employee->save();

    	return back()->with('success','Image Uploaded successfully.');
        //return response()->json("success");
    }

	

}
