<?php

namespace Modules\Room\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Modules\GeneralAdministration\Entities\Roster;
use Modules\Room\Entities\Room;
use Modules\User\Entities\User;
use Modules\Room\Entities\RoomAssistant;
use Modules\Appointment\Entities\Appointment;
use Modules\User\Entities\Employee;
use Modules\MedicalRecord\Entities\MedicalRecord;
use Modules\MedicalRecord\Entities\AppointmentTreatment;
use Modules\General\Entities\Email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Room\Emails\Passwordresetmail;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::check() && User::find(Auth::user()->user_id)->role=="5") {
            // The user is logged in...		
            $doctors = \Modules\Doctor\Entities\Doctor::all();
            return view('room::index',['doctors'=>$doctors]);
        }
        return redirect('/');
    }
	
	  
	 public function mySchedule(Request $request)
    {
        if (Auth::check() && User::find(Auth::user()->user_id)->role=="5") {
            // The user is logged in...		
           // $doctors = \Modules\Doctor\Entities\Doctor::all();
		   $room_assistant_id= RoomAssistant::where('employee_id', Auth::user()->id)->get()->first()->id;
		   
		   $mon1=Roster::where('id','like','mon1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$mon1=  $mon1==null ? '-':substr($mon1->id, 4);
		$mon2=Roster::where('id','like','mon2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$mon2=  $mon2==null ? '-':substr($mon2->id, 4);
		$mon3=Roster::where('id','like','mon3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$mon3=  $mon3==null ? '-':substr($mon3->id, 4);
		$mon4=Roster::where('id','like','mon4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$mon4=  $mon4==null ? '-':substr($mon4->id, 4);
		$mon5=Roster::where('id','like','mon5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$mon5=  $mon5==null ? '-':substr($mon5->id, 4);
		
		$tue1=Roster::where('id','like','tue1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$tue1=  $tue1==null ? '-':substr($tue1->id, 4);
		$tue2=Roster::where('id','like','tue2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$tue2=  $tue2==null ? '-':substr($tue2->id, 4);
		$tue3=Roster::where('id','like','tue3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$tue3=  $tue3==null ? '-':substr($tue3->id, 4);
		$tue4=Roster::where('id','like','tue4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$tue4=  $tue4==null ? '-':substr($tue4->id, 4);
		$tue5=Roster::where('id','like','tue5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$tue5=  $tue5==null ? '-':substr($tue5->id, 4);
		
		$wed1=Roster::where('id','like','wed1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$wed1=  $wed1==null ? '-':substr($wed1->id, 4);
		$wed2=Roster::where('id','like','wed2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$wed2=  $wed2==null ? '-':substr($wed2->id, 4);
		$wed3=Roster::where('id','like','wed3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$wed3=  $wed3==null ? '-':substr($wed3->id, 4);
		$wed4=Roster::where('id','like','wed4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$wed4=  $wed4==null ? '-':substr($wed4->id, 4);
		$wed5=Roster::where('id','like','wed5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$wed5=  $wed5==null ? '-':substr($wed5->id, 4);
		
		$thu1=Roster::where('id','like','thu1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$thu1=  $thu1==null ? '-':substr($thu1->id, 4);
		$thu2=Roster::where('id','like','thu2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$thu2=  $thu2==null ? '-':substr($thu2->id, 4);
		$thu3=Roster::where('id','like','thu3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$thu3=  $thu3==null ? '-':substr($thu3->id, 4);
		$thu4=Roster::where('id','like','thu4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$thu4=  $thu4==null ? '-':substr($thu4->id, 4);
		$thu5=Roster::where('id','like','thu5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$thu5=  $thu5==null ? '-':substr($thu5->id, 4);
		
		$fri1=Roster::where('id','like','fri1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$fri1=  $fri1==null ? '-':substr($fri1->id, 4);
		$fri2=Roster::where('id','like','fri2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$fri2=  $fri2==null ? '-':substr($fri2->id, 4);
		$fri3=Roster::where('id','like','fri3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$fri3=  $fri3==null ? '-':substr($fri3->id, 4);
		$fri4=Roster::where('id','like','fri4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$fri4=  $fri4==null ? '-':substr($fri4->id, 4);
		$fri5=Roster::where('id','like','fri5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$fri5=  $fri5==null ? '-':substr($fri5->id, 4);
		
		$sat1=Roster::where('id','like','sat1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sat1=  $sat1==null ? '-':substr($sat1->id, 4);
		$sat2=Roster::where('id','like','sat2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sat2=  $sat2==null ? '-':substr($sat2->id, 4);
		$sat3=Roster::where('id','like','sat3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sat3=  $sat3==null ? '-':substr($sat3->id, 4);
		$sat4=Roster::where('id','like','sat4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sat4=  $sat4==null ? '-':substr($sat4->id, 4);
		$sat5=Roster::where('id','like','sat5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sat5=  $sat5==null ? '-':substr($sat5->id, 4);
		
		$sun1=Roster::where('id','like','sun1%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sun1=  $sun1==null ? '-':substr($sun1->id, 4);
		$sun2=Roster::where('id','like','sun2%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sun2=  $sun2==null ? '-':substr($sun2->id, 4);
		$sun3=Roster::where('id','like','sun3%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sun3=  $sun3==null ? '-':substr($sun3->id, 4);
		$sun4=Roster::where('id','like','sun4%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sun4=  $sun4==null ? '-':substr($sun4->id, 4);
		$sun5=Roster::where('id','like','sun5%')->where('room_assistant_id',$room_assistant_id)->orderBy('id')->get()->first();
		$sun5=  $sun5==null ? '-':substr($sun5->id, 4);

		return view('room::mySchedule',[
		'mon1'=> $mon1,'mon2'=> $mon2,'mon3'=> $mon3,'mon4'=> $mon4,'mon5'=>$mon5,
		'tue1'=> $tue1,'tue2'=> $tue2,'tue3'=> $tue3,'tue4'=> $tue4,'tue5'=>$tue5, 
		'wed1'=> $wed1,'wed2'=> $wed2,'wed3'=> $wed3,'wed4'=> $wed4,'wed5'=>$wed5,
		'thu1'=> $thu1,'thu2'=> $thu2,'thu3'=> $thu3,'thu4'=> $thu4,'thu5'=>$thu5 , 
		'fri1'=> $fri1,'fri2'=> $fri2,'fri3'=> $fri3,'fri4'=> $fri4,'fri5'=>$fri5, 
		'sat1'=> $sat1,'sat2'=> $sat2,'sat3'=> $sat3,'sat4'=> $sat4,'sat5'=>$sat5, 
		'sun1'=> $sun1,'sun2'=> $sun2,'sun3'=> $sun3,'sun4'=> $sun4,'sun5'=>$sun5]);
		   
		   
        return view('room::mySchedule');
        }
        return redirect('/');
    }
	
		
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

  
    public function uploadPrescription(Request $request)
    {
	$this->validate($request, [
            'medical_record' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $employee= Employee::find(Auth::user()->id);
        $room_assistant= RoomAssistant::where('employee_id',$employee->id)->get()->first();
         
	$appointment= Appointment::where('appointment_no',$request->appointment_no)->where('doctor_id',$request->doctor)->whereDate('date','=',$request->date)->get()->first();
	
        $imageName = 'mr_pres'.$appointment['id'].'.'.$request->medical_record->getClientOriginalExtension();
        $request->medical_record->move(public_path('medical_records'), $imageName);
        
	$mc= MedicalRecord::create(['medical_record'=>$imageName, 'description'=>$request->description, 'patient_id'=>$appointment['patient']['id']]);
	$appointment_treatment= AppointmentTreatment::create(['appointment_id'=>$appointment->id,'medical_record_id'=>$mc->id]);	

    	return response()->json(['success'=>'success']);
    }

	
	public function reset(Request $request)
    {
		if (Auth::check() && User::find(Auth::user()->user_id)->role=="5") {
            // The user is logged in...
			
			return view('room::Reset');
        	}
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
			if($email["email"]!=null){
				$email_status= Mail::to('manoharikannangara94@gmail.com')->send(new passwordresetmail());
			return response()->json('Updated Successfully',['status'=>$email_status, 'email'=>$email['email']]);	
		}
		return response()->json('Old email or pasword incorrect');
		
    }
  }
	}