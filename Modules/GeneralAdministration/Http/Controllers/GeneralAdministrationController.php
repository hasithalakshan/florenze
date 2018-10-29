<?php

namespace Modules\GeneralAdministration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\GeneralAdministration\Entities\Roster;
use Modules\Room\Entities\Room;
use Modules\Room\Entities\RoomAssistant;
use Modules\Doctor\Entities\Doctor;
use Illuminate\Support\Facades\Auth;

class GeneralAdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
		
	if (Auth::check()) {
            // The user is logged in...
            return view('generaladministration::index');
        }
        return redirect('/');
        
    }
	
	public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

 
	
	public function checkAssignedRA(Request $request)
    {
		$availability= Roster::where('room_assistant_id',$request->raID)
		->where(function($query) use ($request){
			$query->where('day',$request->day)->where('work_period_id',$request->time);
		})->get()->first();
		
		return response()->json($availability!=null?$availability->toArray():'');
		
    }
	
		public function checkAssignedDoctor(Request $request)
    {
		$availability= Roster::where('doctor_id',$request->raID)
		->where(function($query) use ($request){
			$query->where('day',$request->day)->where('work_period_id',$request->time);
		})->get()->first();
		
		return response()->json($availability!=null?$availability->toArray():'');
		
    }
	
 
	public function scheduleForWeek(Request $request)
    {
		
                $monday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','mon')->orderBy('work_period_id')->get();
                $mon=null;
                foreach ($monday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $mon[$monday[$key]['work_period_id']][$monday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                $tuesday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','tue')->orderBy('work_period_id')->get();
                $tue=null;
                foreach ($tuesday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $tue[$tuesday[$key]['work_period_id']][$tuesday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                $wedday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','wed')->orderBy('work_period_id')->get();
                $wed=null;
                foreach ($wedday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $wed[$wedday[$key]['work_period_id']][$wedday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                $thuday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','thu')->orderBy('work_period_id')->get();
                $thu=null;
                foreach ($thuday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $thu[$thuday[$key]['work_period_id']][$thuday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                $friday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','fri')->orderBy('work_period_id')->get();
                $fri=null;
                foreach ($friday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $fri[$friday[$key]['work_period_id']][$friday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                $satday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','sat')->orderBy('work_period_id')->get();
                $sat=null;
                foreach ($satday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $sat[$satday[$key]['work_period_id']][$satday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                $sunday=Roster::with('room_assistant.employee.user')->with('doctor.employee.user')->where('day','sun')->orderBy('work_period_id')->get();
                $sun=null;
                foreach ($sunday as $key=>$value){
                    $ra=$value['room_assistant']['employee']['user']['fname'].' '.$value['room_assistant']['employee']['user']['lname'];
                    $doc=$value['doctor']['employee']['user']['fname'].' '.$value['doctor']['employee']['user']['lname'];
                    $sun[$sunday[$key]['work_period_id']][$sunday[$key]['room_no']]='RA:'.$ra.', Doctor:'.$doc;
                }
                
                
                
                
                
//$rosters= Roster::all();
		
		$rooms= Room::all();
                $periods= \Modules\GeneralAdministration\Entities\WorkPeriod::all();
		
		if (Auth::check()) {
			// The user is logged in...
			return view('generaladministration::scheduleForWeek',["rooms"=>$rooms,"periods"=>$periods, "mon"=>$mon, "tue"=>$tue, "wed"=>$wed, "thu"=>$thu, "fri"=>$fri, "sat"=>$sat, "sun"=>$sun]);
		}
		return redirect('/');
        
    }
    
		
		public function mySchedule(){
			
		if (Auth::check()) {
			// The user is logged in...
			return view('generaladministration::mySchedule');
		}
		return redirect('/');
        
			
			
		}
	
     public function getMyShedule(Request $request)
    {
		
		$rooms= Room::all();
                $periods= \Modules\GeneralAdministration\Entities\WorkPeriod::all();
		
                $monday=Roster::where('day','mon')->where('room_assistant_id',$request->raId)->orderBy('work_period_id')->get();
                $mon=null;
                foreach ($monday as $key=>$value){
                    $mon[$monday[$key]['work_period_id']]=$monday[$key]['room_no'];
                }
                $tueday=Roster::where('day','tue')->where('room_assistant_id',$request->raId)->select('room_no')->orderBy('work_period_id')->get()->toArray();
		$tue=null;
                foreach ($tueday as $key=>$value){
                    $tue[$tueday[$key]['work_period_id']]=$tueday[$key]['room_no'];
                }
                
                $wedday=Roster::where('day','wed')->where('room_assistant_id',$request->raId)->select('room_no')->orderBy('work_period_id')->get()->toArray();
		$wed=null;
                foreach ($wedday as $key=>$value){
                    $wed[$wedday[$key]['work_period_id']]=$wedday[$key]['room_no'];
                }
                $thuday=Roster::where('day','thu')->where('room_assistant_id',$request->raId)->select('room_no')->orderBy('work_period_id')->get()->toArray();
                $thu=null;
                foreach ($thuday as $key=>$value){
                    $thu[$thuday[$key]['work_period_id']]=$thuday[$key]['room_no'];
                }
                $friday=Roster::where('day','fri')->where('room_assistant_id',$request->raId)->select('room_no')->orderBy('work_period_id')->get()->toArray();
                $fri=null;
                foreach ($friday as $key=>$value){
                    $fri[$friday[$key]['work_period_id']]=$friday[$key]['room_no'];
                }
                $satday=Roster::where('day','sat')->where('room_assistant_id',$request->raId)->select('room_no')->orderBy('work_period_id')->get()->toArray();
                $sat=null;
                foreach ($satday as $key=>$value){
                    $sat[$satday[$key]['work_period_id']]=$satday[$key]['room_no'];
                }
                $sunday=Roster::where('day','sun')->where('room_assistant_id',$request->raId)->select('room_no')->orderBy('work_period_id')->get()->toArray();
                $sun=null;
                foreach ($sunday as $key=>$value){
                    $sun[$sunday[$key]['work_period_id']]=$sunday[$key]['room_no'];
                }
                return view('generaladministration::mySchedule',["periods"=>$periods, "mon"=>$mon, "tue"=>$tue, "wed"=>$wed, "thu"=>$thu, "fri"=>$fri, "sat"=>$sat, "sun"=>$sun]);
    }
	
		
		
		public function updateschedule(Request $request)
    {
		 $rooms= Room::all();
		  $ras= RoomAssistant::all();
		  $docs= Doctor::all();
                  $periods= \Modules\GeneralAdministration\Entities\WorkPeriod::all();
		  if (Auth::check()) {
			// The user is logged in...
			return view('generaladministration::update',['rooms'=>$rooms,'ras'=>$ras,'docs'=>$docs,'periods'=>$periods]);
		}
		return redirect('/');
        
		
    }
	
	
	


	public function update(Request $request)
	{		
                
		 $roster= Roster::where('day',$request->day)->where('work_period_id',$request->time)->where('room_no',$request->room_no)->get()->first();
		 if($roster==null){
			 $roster= new Roster();
			 $roster->day = $request->day;
                         $roster->work_period_id = $request->time;
                         $roster->room_no = $request->room_no;
			 if( $request->raID=="-")
				$roster->room_assistant_id = null;
			else
				$roster->room_assistant_id = $request->raID;
			
			if( $request->dID=="-")
				 $roster->doctor_id = null;
			else
				 $roster->doctor_id = $request->dID;
			 $roster->save();
		 }else{
			 if( $request->raID=="-")
				$roster->update(['room_assistant_id'=> null]);
			else
				$roster->update(['room_assistant_id'=> $request->raID]);
			
			
			if( $request->dID=="-")
				$roster->update(['doctor_id'=> null]);
			else
				$roster->update(['doctor_id'=> $request->dID]);
			
		 }
		 
		return response()->json('Updated Successfully');
	}
	

	
	
	
	
}
