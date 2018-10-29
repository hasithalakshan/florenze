<?php

namespace Modules\OnlineAppointment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Doctor\Entities\Doctor;
use Modules\User\Entities\User;
use Modules\General\Entities\State;
use Modules\Appointment\Entities\Appointment;

class OnlineAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $states = State::all();
        return view('onlineappointment::index',['doctors'=>$doctors,'states'=>$states]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('onlineappointment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'CaptchaCode' => 'required|valid_captcha'
        ]);*/
        $previous_appointment = Appointment::where('doctor_id',$request['doctor'])->whereDate('date','=',date($request['date']))->orderBy('appointment_no','desc')->first();
        $time=new \DateTime($previous_appointment['time']);
        $new_time=$time->add(new \DateInterval('PT10M'));
        $appointment= Appointment::create(["date" => $request->date,"time" =>$time->format('h:i:s'),"illness" =>'',"appointment_no" =>($previous_appointment==null)?'1':($previous_appointment->appointment_no+1),"is_over" =>0,"payment_settled"=>0,"doctor_id" =>$request->doctor,"patient_id"=>$request->patient]);
        $online_apointment= \Modules\OnlineAppointment\Entities\OnlineAppointment::create(["appointment_id"=>$appointment->id,"payment_method"=> $request->payment_method]);
        
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('onlineappointment::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    
    public function search(Request $request)
    {
        $rosters = \Modules\GeneralAdministration\Entities\Roster::with('work_period')->where('doctor_id',$request['doctor'])->orderBy('id')->get();
        return response()->json($rosters->toArray());
    }
    
    public function findPatient(Request $request)
    {
        $phone=$request->phone;
        $email=$request->email;
        $query=  \Modules\User\Entities\Patient::query()->with('security_question')->with('user.emails')->with('user.telephones');
        
        if($email=='')
            $query->whereHas('user.telephones', function($query)use($phone){
                $query->where('tel_no','like','%'.$phone);                      
            });
        else if($phone=='')
            $query->whereHas('user.emails', function($query)use($email){
                $query->where('email',$email);                      
            });
        
        $patient= $query->get()->first();
        
        
        return response()->json($patient);
    }
    
    public function regPatient(Request $request)
    {
        $user= User::create(['fname' => $request->fname, 'lname' => $request->lname, 'gender' => $request->gender, 'dob' => $request->dob, 'street' => $request->street, 'city' => $request->city, 'role' => '7','state_id' => $request->state == -1 ? null: $request->state]);
        $patient= $user->patient()->create(['nationality' => $request->nationality]);
        if($request->email != null)
            $user->emails ()->create(['email' => $request->email]);
        if($request->phone != null)
            $user->telephones()->create(['tel_no' => $request->phone]);
        return response()->json(array_merge($user->toArray(),['patient'=>$patient]));
    }
    
}
