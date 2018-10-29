<?php

namespace Modules\Appointment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Modules\Doctor\Entities\Doctor;
use Modules\User\Entities\Patient;
use Modules\User\Entities\User;
use Modules\Reception\Entities\Receptionist;
use Modules\Appointment\Entities\Appointment;
use Modules\Appointment\Entities\VisitAppointment;
use Modules\OnlineAppointment\Entities\OnlineAppointment;
use Modules\Bill\Entities\AppointmentBill;
use Modules\Appointment\Emails\AppointmentMadeMail;
use \Nexmo\Laravel\Facade\Nexmo;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('appointment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('appointment::create');
    }   

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request){
        
        $previous_appointment = Appointment::where('doctor_id',$request['doctor'])->whereDate('date','=',date($request['doa']))->orderBy('appointment_no','desc')->first();
        $appointment= Appointment::create(["date" => $request->doa,"time" =>$request->toa,"illness" =>$request->illness,"appointment_no" =>($previous_appointment==null)?'1':($previous_appointment->appointment_no+1),"is_over" =>0,"payment_settled"=>0,"doctor_id" =>$request->doctor,"patient_id"=>$request->patient]);
        $visit_apointment= VisitAppointment::create(["appointment_id"=>$appointment->id,"receptionist_id"=> Receptionist::where('employee_id',Auth::user()->id)->get()->first()->id]);
        $patient= Patient::with('user.telephones')->with('user.emails')->find($request->patient); 
        $doctor= Doctor::with('employee.user')->find($request->doctor);
        
        $response=['appointment'=>$appointment, 'message'=>null, 'email'=>null];
        /*if($patient['user']['telephones'][0]!=null){
            $response['message'] = Nexmo::message()->send([
                'to' => '94776337669',  //$patient['user']['telephones'][0]['tel_no']
                'from' => 'FlorenzeHIS',
                'text' => 'Hello from Florenze. Woohoo!'
            ]);
        }*/
        /*if($patient['user']['emails'][0]!=null){
        
            $response['email']= Mail::to('chamidhusupeshala@gmail.com')->send(new AppointmentMadeMail($patient->user,$doctor->employee->user,$appointment));
        
        }*/

        return response()->json($response);
}

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('appointment::edit');
    }

    
    public function getDoctorTotalAppointments(Request $request) {
        $day1=date($request->date);
        $count1= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day1)->count();
        $day2=date('Y-m-d',  strtotime("+1 day", strtotime($day1)));
        $count2= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day2)->count();
        $day3=date('Y-m-d',  strtotime("+1 day", strtotime($day2)));
        $count3= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day3)->count();
        $day4=date('Y-m-d',  strtotime("+1 day", strtotime($day3)));
        $count4= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day4)->count();
        $day5=date('Y-m-d',  strtotime("+1 day", strtotime($day4)));
        $count5= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day5)->count();
        $day6=date('Y-m-d',  strtotime("+1 day", strtotime($day5)));
        $count6= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day6)->count();
        $day7=date('Y-m-d',  strtotime("+1 day", strtotime($day6)));
        $count7= Appointment::where('doctor_id',$request->id)->whereDate('date','=',$day7)->count();
        return response()->json([$day1=>$count1,$day2=>$count2,$day3=>$count3,$day4=>$count4,$day5=>$count5,$day6=>$count6,$day7=>$count7]);
    }
    
    
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $previous_appointment = Appointment::where('id','NOT LIKE',$request->appointment_id)->where('doctor_id',$request['doctor_id'])->whereDate('date','=',date($request['doa']))->orderBy('appointment_no','desc')->first();
        $appointment= Appointment::find($request->appointment_id);
        $appointment->fill(["date" => $request->doa,"time" =>$request->toa,"illness" =>$request->illness,"appointment_no" =>($previous_appointment==null)?'1':($previous_appointment->appointment_no+1),"is_over" =>0,"payment_settled"=>0,"doctor_id" =>$request->doctor_id,"patient_id"=>$request->patient_id]);
        $appointment->save();
        
        $patient= Patient::find($appointment->patient_id);
        $patient->update(['nationality' => $request->nationality]);
        
        $user=  User::find($patient->user_id);
        $user->fill(['fname' => $request->fname, 'lname' => $request->lname, 'gender' => $request->gender, 'dob' => $request->dob, 'street' => $request->street, 'city' => $request->city, 'role' => '7','state_id' => $request->state == -1 ? null: $request->state]);
        $user->save();
        
        if($request->email != null){
            $email=  \Modules\General\Entities\Email::where('user_id',$user->id)->get()->first();
            $email->update(['email' => $request->email]);
        }
        if($request->phone != null){
            $telephone= \Modules\General\Entities\Telephone::where('user_id',$user->id)->get()->first();
            $telephone->update(['tel_no' => $request->phone]);
        }
        return response()->json($appointment);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $appointment= Appointment::find($request->id);
        $v_a= VisitAppointment::where('appointment_id',$appointment['id'])->get()->first();
        $o_a= OnlineAppointment::where('appointment_id',$appointment['id'])->get()->first();
        $a_b= AppointmentBill::where('appointment_id',$appointment['id'])->get()->first();
        
        if($v_a!=null)
            VisitAppointment::destroy($v_a->id);
        if($o_a!=null)
            OnlineAppointment::destroy($o_a->id);
        if($a_b!=null)
            AppointmentBill::destroy($a_b->id);
        Appointment::destroy($appointment->id);
        return response()->json("success");
    }

    
    public function search(Request $request)
    {
        $rosters = \Modules\GeneralAdministration\Entities\Roster::with('work_period')->where('doctor_id',$request['doctor'])->orderBy('id')->get();
        return response()->json($rosters->toArray());
    }
    
    public function getLastForDate(Request $request)
    {
        $appointment = Appointment::where('doctor_id',$request['doctor'])->whereDate('date','=',date($request['date']))->orderBy('appointment_no','desc')->first();
        if($appointment != null)
            return response()->json($appointment->toArray());
        return -1;
    }
    
    
    public function getAppointments(Request $request)
    {
        $query=$this->getQueryForAll();
        $query=$this->getFilteredQuery($query,$request->q,$request->pfn,$request->pln,$request->pph,$request->dfn,$request->dln,$request->filter);
        $query=$this->getSortedQuery($query,$request->sort);
        return $query->paginate(8);
    }
    
    public function getQueryForAll()
    {
        $query=Appointment::query();
        $query->select((new Appointment())->getTable().".*");
        
        foreach (\Schema::getColumnListing('patients') as $related_column) {
            $query->addSelect(new Expression("`patients`.`$related_column` AS `p$related_column`"));
        }
        foreach (\Schema::getColumnListing('doctors') as $related_column) {
            $query->addSelect(new Expression("`doctors`.`$related_column` AS `d$related_column`"));
        }
        foreach (\Schema::getColumnListing('users') as $related_column) {
            $query->addSelect(new Expression("`pu`.`$related_column` AS `pu$related_column`"));
            $query->addSelect(new Expression("`du`.`$related_column` AS `du$related_column`"));
        }
        $query->join('patients', 'patients.id', '=', 'appointments.patient_id')->join('users as pu', 'pu.id', '=', 'patients.user_id')->join('doctors', 'doctors.id', '=', 'appointments.doctor_id')->join('employees', 'employees.id', '=', 'doctors.employee_id')->join('users as du', 'du.id', '=', 'employees.user_id'); //->with($relation_name);
        
        return $query;
    }
    
    public function getFilteredQuery($query,$q,$pfn,$pln,$pph,$dfn,$dln,$filter) 
    {
        if($pfn || $pln){
            if(!$pln)
                $query->where('pu.fname','like',$q.'%');                      
            elseif (!$pfn)
                $query->where('pu.lname','like',$q.'%');                      
            else
                $query->where('pu.fname','like',$q.'%')->orWhere('pu.lname','like',$q.'%');
        }elseif ($pph) {
            $telephones = Telephone::where('tel_no','like',$q.'%')->select('user_id')->get()->toArray();
            if ($telephones!=null)
                $patients = User::with('patient')->where('role','patient')->whereIn('id',$telephones)->get()->toJson();
        }elseif ($dfn || $dln) {
            if(!$dln)
                $query->where('du.fname','like',$q.'%');                      
            elseif(!$dfn)
                $query->where('du.lname','like',$q.'%');                      
            else
                $query->where('du.fname','like',$q.'%')->orWhere('du.lname','like',$q.'%');                      
        }
        if($filter=="upcome")
            $query->where('is_over',0);
        if ($filter=="payed")
            $query->where('payment_settled',1);
        return $query;
    }

    public function getSortedQuery($query,$sort)
    {
        if($sort=="pfname")
            $query->orderBy('pu.fname');
        elseif($sort=="plname")
            $query->orderBy('pu.lname');
        elseif($sort=="dfname")
            $query->orderBy('du.fname');
        elseif($sort=="dlname")
            $query->orderBy('du.lname');
        /*elseif($sort=="")
            $query->orderBy('du.lname');
          */  
        return $query;
    }
    
    public function getById(Request $request)
    {
        $appointment=Appointment::with('doctor.employee.user')->with('patient.user.emails','patient.user.telephones')->where('id', $request->id)->get();
        return response()->json($appointment->toArray());
    }
    
    public function temp(Request $request)
    {
        $q=$request->q;
        $query=Appointment::query()->with('doctor.employee.user')->with('patient.user');
        
        if($request->pfn=="true" || $request->pln=="true"){
            if($request->pln!="true")
                $query->whereHas('patient.user', function($query)use($q){
                    $query->where('fname','like',$q.'%');                      
                });
            elseif ($request->pfn!="true")
                $query->whereHas('patient.user', function($query)use($q){
                    $query->where('lname','like',$q.'%');                      
                });
            else
                $query->whereHas('patient.user', function($query)use($q){
                    $query->where('fname','like',$q.'%')->orWhere('lname','like',$q.'%');                      
                });
        }elseif ($request->pph=="true") {
            $telephones = Telephone::where('tel_no','like',$q.'%')->select('user_id')->get()->toArray();
            if ($telephones!=null)
                $patients = User::with('patient')->where('role','patient')->whereIn('id',$telephones)->get()->toJson();
        }elseif ($request->dfn=="true" || $request->dln=="true") {
            if($request->dln!="true")
                $query->whereHas('doctor.employee.user', function($query)use($q){
                    $query->where('fname','like',$q.'%');                      
                });
            elseif($request->dfn!="true")
                $query->whereHas('doctor.employee.user', function($query)use($q){
                    $query->where('lname','like',$q.'%');                      
                });
            else
                $query->whereHas('doctor.employee.user', function($query)use($q){
                    $query->where('fname','like',$q.'%')->orWhere('lname','like',$q.'%');                      
                });
        }
        
        return $query->paginate(1);
    }
}