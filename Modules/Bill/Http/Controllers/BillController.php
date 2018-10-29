<?php

namespace Modules\Bill\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Appointment\Entities\Appointment;
use Modules\Bill\Entities\AppointmentBill;
use Modules\User\Entities\User;
use Modules\User\Entities\Employee;
use Modules\Bill\Entities\Cashier;
use Modules\General\Entities\Email;
use Illuminate\Support\Facades\Hash;




class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (Auth::check() && User::find(Auth::user()->user_id)->role=="6") {
            $profile_pic= Employee::find(Auth::user()->id)->profile_pic;
            $doctors= \Modules\Doctor\Entities\Doctor::all();
            $service_charge= \Modules\Bill\Entities\Charge::where('category','service')->get()->first();
            $lab_charges= \Modules\Bill\Entities\Charge::where('category','lab')->get();
            $xray_charges= \Modules\Bill\Entities\Charge::where('category','xray')->get();
            $states= \Modules\General\Entities\State::all();
            return view('bill::index',['profile_pic'=>$profile_pic,'doctors'=>$doctors,'service_charge'=>$service_charge,'lab_charges'=>$lab_charges,'xray_charges'=>$xray_charges, "states"=>$states]);
        }
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
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
			return response()->json('Updated Successfully');
		}
		return response()->json('Old email or pasword incorrect');
		
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bill::create');
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
        return view('bill::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $user = \Modules\User\Entities\User::find(Auth::user()->user_id);
        $user->fname= $request->fname;
        $user->lname= $request->lname;
        $user->gender= $request->gender;
        $user->dob= $request->dob;
        //$user->state_id= $request->state;
        $user->city= $request->city;
        $user->street= $request->street;
        $user->save();
        
        $email= \Modules\General\Entities\Email::where('user_id',$user->id)->get()->first();
        $email->email= $request->email;
        $email->save();
        
        $tel= \Modules\General\Entities\Telephone::where('user_id',$user->id)->get()->first();
        $tel->tel_no=$request->phone;
        $tel->save();
        
        return response()->json("success");
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    
    public function updateProfilePic(Request $request)
    {
     $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $employee= Employee::find(Auth::user()->id);
            $cashier= Cashier::where('employee_id',$employee->id)->get()->first();

            if(File::exists(public_path().'/profile_images/'.$employee->profile_pic)) {
                File::delete(public_path().'/profile_images/'.$employee->profile_pic);
            }

            $imageName = 'cashier'.$cashier['id'].'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('profile_images'), $imageName);

            $employee->profile_pic=$imageName;
            $employee->save();

           //return Redirect::toRoute('admin');
         return redirect('/bill'); 
    }


    
    public function getDetail(Request $request)
    {
        $appointment = Appointment::with('patient')->with('doctor')->where("doctor_id",$request['adoc'])->where('appointment_no',$request['ano'])->whereDate('date','=',$request['adate'])->get()->first();
        if($appointment==null)
            return;
        $user = \Modules\User\Entities\User::with('telephones')->with('emails')->with('patient')->find($appointment->patient->user_id);
       // return response()->json($user->toJson());
        
       $a=$appointment->toArray();
       $u=$user->toArray();
       return response()->json(array('user'=>$u,'appoinment'=>$a));
    }
    
    public function getMyDetail(Request $request)
    {
        $user = \Modules\User\Entities\User::with('telephones')->with('emails')->find(Auth::user()->user_id);
       // return response()->json($user->toJson());
        
       
       return response()->json(array($user->toArray()));
    }
    
    public function saveBill(Request $request)
    {
        $appointment= Appointment::find($request['aid']);
        $appointment_bill =  AppointmentBill::where('appointment_id',$request->aid)->get()->first();
        if($appointment_bill==null){
            $appointment_bill = AppointmentBill::create(['payment_amount'=>$request->amount,'appointment_id'=>$request->aid,'xray_fees'=>$request->xrayfees,'laboratory_fees'=>$request->laboratoryfees,'concession'=>$request->concesstios]);
        }else{
            $appointment_bill->payment_amount=$request->amount;
            $appointment_bill->save();
        }
        
       return response()->json("Saved");
    }
    
    
    
    

    
    
    
    
    
    //public function update(Request $request){
      //  $user=User::find($request['id']);
        //$user=User::create(['fname'=>$request->fname,'lname'=>$request->lname]);
        //$user->save();
    }
    
    
    
   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 
   


    