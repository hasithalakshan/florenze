<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;
use Modules\User\Entities\User;
use Modules\Doctor\Entities\Doctor;
use Modules\User\Entities\Employee;
use Modules\General\Entities\Telephone;
use Modules\General\Entities\Email;
use Modules\General\Entities\State;
use Modules\General\Entities\Role;
use Modules\User\Entities\Administrator;
use Modules\GeneralAdministration\Entities\Roster;
use Modules\Room\Entities\RoomAssistant;
use Modules\Doctor\Entities\DoctorWorkPeriod;
use Modules\Appointment\Entities\Appointment;
use Modules\Room\Entities\Room;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        if (Auth::check() && User::find(Auth::user()->user_id)->role=="1") {

            $roles = Role::all();
            
            $rooms = Room::all();
            $states = State::all();
            $doctors = DB::table('users')->where('role', '4')->count();
            $room_assistants = DB::table('users')->where('role', '5')->count();
            $receptionists = DB::table('users')->where('role', '3')->count();
            $patients = DB::table('users')->where('role', '7')->count();
            $user= User::find(Auth::user()->user_id);
            $email= Email::where('user_id',$user->id)->first();
            $telephone= Telephone::where('user_id',$user->id)->first();
            $disebleusers= Employee::with('user.emails')->with('user.telephones')->where('disabled',1)->get();
            //$disebles= DB::table('employees')->where('disabled',1);
            //$disebleusers= User::with('emails')->with('telephones')->where('id',$disebles->user_id)->get();

            $profile_pic= Employee::find(Auth::user()->id)->profile_pic;
            return view('user::admin',['roles'=>$roles,'rooms'=>$rooms,'states'=>$states,'doctors'=>$doctors,'room_assistants'=>$room_assistants,'receptionists'=>$receptionists,'patients'=>$patients,'user'=>$user, 'profile_pic'=>$profile_pic,'email'=>$email,'telephone'=>$telephone,'disebleusers'=>$disebleusers]);       
        }
        return redirect('/');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request)
    {   $validateEmail=Email::find($request->email);
        $validatetelephone=Telephone::find($request->tel_no);
        if($validateEmail!=null&$validatetelephone!=null)
        { 
          $disable= Employee::where('user_id',$validateEmail->user_id)->get()->first();
          if($disable->disabled==1)
          {
           return response()->json(["disabled"=>$disable->id]);  

          }
         return response()->json(["failed"=>"Sorry your Telephone number and Email are alrady exists in database"]); 
        }
        elseif ($validateEmail!=null)
        {
           $disable= Employee::where('user_id',$validateEmail->user_id)->get()->first();
          if($disable->disabled==1)
          {
           return response()->json(["disabled"=>$disable->id]);  

          }
         return response()->json(["failed"=>"Sorry your Email is alrady exists in database"]);
        }
        elseif ($validatetelephone!=null)
        {
           $disable= Employee::where('user_id',$validatetelephone->user_id)->get()->first();
          if($disable->disabled==1)
          {
           return response()->json(["disabled"=>$disable->id]);  

          }
         return response()->json(["failed"=>"Sorry your Telephone number is alrady exists in database"]);
        }
        else
        {
        $role= $request->input('role');
        
        $user= User::create(['fname' => $request->firstname, 'lname' => $request->lastname, 'gender' => $request->gender, 'dob' => $request->dob, 'role' => $request->role,'street' => $request->street, 'city' => $request->city]);
        
        $user->emails()->create(['email'=>$request->email]);
        $user->telephones()->create(['tel_no'=>$request->tel_no]);
        
        $employee= $user->employee()->create(['password'=> \Illuminate\Support\Facades\Hash::make($request->password)]);

        if($role=='4'){
            $employee->doctor()->create(['type'=>$request->dtype,'speciality'=>$request->speciality,'appointment_price'=>$request->appointment_price]);
        }
        elseif($role=='5')
        {
           $employee->room_assistant()->create([]);
        }
        elseif($role=='3')
        {
           $employee->receptionist()->create([]);
        }
        elseif($role=='2')
        {
           $employee->administrator()->create(['type'=>'general']);
        }
        elseif($role=='1')
        {
           $employee->administrator()->create(['type'=>'system']);
        }
        elseif($role=='6')
        {
           $employee->cashier()->create([]);
        }
        return response()->json(["success","Record inserted successfully"]); 
      }
    }
    public function roomInsert(Request $request)
    {
        $room = new Room();
        $room->room_no = $request->room_no;
        $room->location = $request->location;
        $room->save();
        return response()->json("Room inserted successfully"); 
    }
    public function roleInsert(Request $request)
    {
        $role = new Role();
        $role->role = $request->role;
        $role->save();
        return response()->json("Role inserted successfully"); 


    }


    public function roomEdit(Request $request)
    {   
        $room= Room::find($request->room_no);
        if($room==null)
        {
            $room= New Room();
            $room->room_no=$request->room_no;
            $room->location =$request->location;;
            $room->save(); 
        }
          else
          {
        $room->room_no=$request->room_no;
        $room->location=$request->location;
        
        $room->save();
          }
        return response()->json("Update Success");
    }

      public function roleedit(Request $request)
        {   
        $role= Role::find($request->id);
        if($role==null)
        {
            $role= New Room();
            $role->role=$request->role;
            
            $role->save(); 
        }
          else
          {
        $role->role=$request->role;
        
        
        $role->save();
          }
        return response()->json("Update Success");
    
        }
     public function getByIdo(Request $request)
    {
          $use = Room::where('room_no',$request->room_no)->get();

         return response()->json($use->toArray());

    }


    
    public function getNextRoomNo(){
        $room =  Room::orderBy('room_no','desc')->get()->first();
        return response()->json($room==null?1:($room->room_no+1)); 
    }

    public function getByRoleId(Request $request)
    {
       $role = Role::where('id',$request->id)->get();

         return response()->json($role->toArray());
    }




    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request)
    {
        $user= User::find($request->id);
        $email= Email::where('user_id',$user->id)->first();
        $telephone= Telephone::where('user_id',$user->id)->first();
        
        $user->fname=$request->firstname;
        $user->lname=$request->lastname;
        $user->dob=$request->dob;
        $user->role=$request->role;
        $user->gender=$request->gender;
        $user->city=$request->city;
        $user->street=$request->street;
        $user->state_id=$request->state;
        $user->save();

        if($email==null){
            $email= New Email();
            $email->email=$request->email;
            $email->user_id = $user->id;
            $email->save();
        }else{
            $email->update(['email'=>$request->email]);
        }
        if($telephone==null){
            $telephone= New Telephone();
            $telephone->tel_no=$request->tel_no;
            $telephone->user_id = $user->id;
            $telephone->save();
        }else{
            $telephone->update(['tel_no'=>$request->tel_no]);
        }


        return response()->json("Update Success");
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
    public function destroy(Request $request)
    {
        $user= User::find($request->id);
        $emp= Employee::where('user_id',$user->id)->get()->first();
        $emp->disabled=1;
        $emp->save();
        return response()->json("Dlete Success");


    }
    public function adduesrenable(Request $request)
    {
        
        $emp= Employee::where('user_id',$request->adduesrenableid)->get()->first();
        $emp->disabled='0';
        $emp->save();
        return response()->json("enable Success");


    }
    public function adduesrenablemodal(Request $request)
    {
      $emp= Employee::where('user_id',$request->id)->get()->first();
        $emp->disabled='0';
        $emp->save();
        return response()->json("enable Success");


    }
    
     public function resetPassword(Request $request)
    {
        //doc, emp update
    
    $email= Email::with('user')->find(str_replace("%40", "@", $request->email));
    $emp= Employee::where('user_id', $email['user']['id'])->get()->first();
    
    //if($emp_current->password==Hash::make($request->NewPassword)){
    if (Auth::attempt(array('user_id' => $email['user']['id'], 'password' => $request->current_password))) {
      $emp->password=Hash::make($request->new_password);
      $emp->save();
      return response()->json('Updated Successfully');
    }
    return response()->json('Old email or password incorrect');
    
    }
    

  public function search(Request $request)
    {
          $users = User::with('emails')->with('telephones')->where(function ($query) use ($request) {
          $query->where('fname','LIKE','%'.$request->q.'%')
                                     ->orWhere('lname','LIKE','%'.$request->q.'%');
        })->where('role','NOT LIKE','patient')->whereHas('employee', function($query){
                    $query->where('disabled','not like','1');                      
                });
                                     



          
          return $users->paginate(8);

    }

     public function getById(Request $request)
    {
          $user = User::with('emails')->with('telephones')->where('id',$request->id)->get();

return response()->json($user->toArray());

    }

public function updateProfilePic(Request $request)
{

 $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $employee= Employee::find(Auth::user()->id);
        $administrator= Administrator::where('employee_id',$employee->id)->get()->first();
        
        if(File::exists(public_path().'/profile_images/'.$employee->profile_pic)) {
            File::delete(public_path().'/profile_images/'.$employee->profile_pic);
        }
        
        $imageName = 'administrator'.$administrator['id'].'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('profile_images'), $imageName);
        
        $employee->profile_pic=$imageName;
        $employee->save();

       //return Redirect::toRoute('admin');
     return redirect('/user'); 
}


}
