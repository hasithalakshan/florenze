@extends('user::layouts.master')

@section('content')



<!-- Modal for users add -->
<div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="myModalLabel">Add New Employee</h6>
      </div>
      <div class="modal-body">
<form action="user/create" method="POST" id="user-add-modal-form" class="florenze-form" >
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <table>
        <tr>
            <td>
                    <input type="text" class="form-control" name="firstname" placeholder="first name">
            </td>
            <td>
                    <input type="text" class="form-control" name="lastname" placeholder="last name">
            </td>
        </tr>
        <tr>
            <td>
                    <input class="form-control" type="date"  name="dob">
            </td>
            <td>
                    <input type="radio" name="gender" class="gender" value="m" checked/><label class="styled-label">Male</label>
                    <input type="radio" name="gender" class="gender" value="f" /><label class="styled-label">Female</label>
            </td>
        </tr>
        <tr>
            <td>
                    <select id="uar" name="role">
                        <option value="-1" disabled selected>Role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{ $role->role }}</option>
                        @endforeach
                    </select>
            </td>
            <td>
            </td>
        </tr>
        <tr class="pppp">
            <td>
                <input type="radio" id="" name="dtype" value="v" checked/><label class="styled-label">Visiing</label>
                <input type="radio" name="dtype" value="p"/><label class="styled-label">Permenent</label>
            </td>
            <td>
                
            </td>
        </tr>
        <tr class="pppp">
            <td>
                <input id="doctor-speciality-field" type="text" class="form-control" name="speciality" placeholder="doctor-speciality">
            </td>
            <td>
              
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="text" class="form-control" name="street" placeholder="street">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" class="form-control" name="city" placeholder="city">
            </td>
            <td>
                <select  name="state">
                    <option value="-1" disabled selected>province</option>
                    @foreach ($states as $state)
                        <option value="{{$state->id}}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" class="form-control" name="email"  placeholder="email">
            </td>
            <td>
                <input type="tel" class="form-control" name="tel_no" placeholder="telephone">
            </td>
        </tr>
        <tr>
            <td>
                <input type="password" class="form-control" id="password" name="password" placeholder="initial password">
            </td>
            <td>
              
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="sumbit" type="submit" value="Submit"> 
            </td>
        </tr>
    </table>
  </form>
</div>
    </div>
  </div>
</div>
<!--end users add modal -->
 <!--start  user drop modal -->

<div class="modal fade" id="userdropmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
       <form action="user/userdrop" method="POST" id="userdrop">
        <h4>Are You Sure You want To Disable This user</h4>
        <input type="hidden" class="form-control" name="id" id='dropid'>
       <input class="sumbit" type="submit" value="Yes"> 
       <button type="button"  data-dismiss="modal">No</button>
  </form>
      </div>
      <div class="modal-footer">
       </div>
    </div>
  </div>
</div>
<!--  end  user drop modal -->
<!--start  room drop modal -->

<div class="modal fade" id="roomdropmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
       <form action="user/roomdrop" method="POST" id="roomdrop">
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <h4>Are You Sure You want To Delete This Room</h4>
        <input type="hidden" class="form-control" name="room_no" id='Room_no'>
       <input class="sumbit" type="submit" value="Yes"> 
       <button type="button"  data-dismiss="modal">No</button>
  </form>
      </div>
      <div class="modal-footer">
       </div>
    </div>
  </div>
</div>
<!--  end  user drop modal -->













 <!--start  adduserenablemodal modal -->

<div class="modal fade" id="adduserenablemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="sd-id"></h4>
      </div>
      <div class="modal-body">
       <form action="user/adduesrenable" method="POST" id="adduesrenable">
        <h4>This User is disabled. Are You want To Eneble This user</h4>
        <input type="hidden" class="form-control" name="adduesrenableid" id='disableduserid'>
       <input class="sumbit" type="submit" value="Yes"> 
       <button type="button"  data-dismiss="modal">No</button>
    </form>
      </div>
      
    </div>
  </div>
</div>
<!--  end  adduserenablemodal modal -->
 <!--start  enanble user modal -->

<div class="modal fade" id="userenablemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="myModalLabel">Enable The Employee</h6>
        
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover">
           <thead>
              <tr>
               
               <th>First Name</th>
               <th>Last Name</th>
               <th>email</th>
               <th>gender</th>
               <th>Telephone</th>
               <th>Option</th>
             </tr>
          </thead>
          <tbody>
              @foreach ($disebleusers as $disebleusers) 
                <tr> 
                 <td>{{ $disebleusers->user->fname}}</td> 
                <td>{{ $disebleusers->user->lname}}</td>
                <td>{{ $disebleusers->user->gender}}</td>
                @foreach ($disebleusers->user->emails as $email) 
                 <td>{{ $email->email}}</td> 
                 @endforeach
                @foreach ($disebleusers->user->telephones as $telephones) 
                <td>{{ $telephones->tel_no}}</td> 
                @endforeach  
                 <td><button class="btn btn-default"  onclick="setUserEnabletModal({{ $disebleusers->user->id}});"><label>Enable</label></button></td>
               </tr> 
              @endforeach
          </tbody>
          </table>
      </div>
      
    </div>
  </div>
</div>
<!--  end  enanble user  modal -->

 <!--start  PasswordResetModal modal -->

<div class="modal fade" id="PasswordResetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="myModalLabel">Reset your password</h6>
        
      </div>
      <div class="modal-body">
           <div id="Passward_reset_profile">

                <form id="Passward_reset_profile_form" action='user/resetPassword' method='GET'>
                  <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                   <div class="col-sm-10">
                       <input type="email" class="form-control" name="email" >
                      </div>
                      </div>
                  <div class="form-group row">
                 <label for="inputPassword3" class="col-sm-2 col-form-label">current Password</label>
                 <div class="col-sm-10">
                 <input type="password" class="form-control" name="current_password">
                  </div>
                   </div>
                  <div class="form-group row">
                 <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                 <div class="col-sm-10">
                 <input type="password" class="form-control" name="new_password" id="new_password">
                  </div>
                   </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                     <input type="password" class="form-control" name="confirmpassword">
                     </div>
                       </div> 
              
     <input class="sumbit" type="submit" value="Submit" style="width:400px; margin-left:100px;color:#009ACD;height:40px;"> 
                       
                </form>
              </div>
      </div>
     
    </div>
  </div>
</div>
<!--  end  PasswordResetModal modal -->
<!-- Modal for profile view -->
<div class="modal fade" id="userviewmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <h6 class="modal-title" id="myModalLabel">View your profile</h6>
        </button>
        <h6 class="modal-title" id="myModalLabel">{{$user->fname}} {{$user->lname}}</h6>
      </div>
      <div class="modal-body">
<form action="" method="" id="z" class="florenze-form" >
   <table class="table table-striped">
  <thead>
    <tr>
      <th>

  @if(!empty($profile_pic))
                    <img src="/florenze/public/profile_images/{{$profile_pic}}" alt="..." class="img-circle profile_img">
                @else 
                    <img  class="img-circle profile_img glyphicon glyphicon-user">
                @endif
              </th>
    </tr>
    <tr>
     <th>First Name</th>
     <td>{{$user->fname}}</td>
   </tr>
    <tr>
     <th>Last Name</th>
     <td>{{$user->lname}}</td>
   </tr>
    <tr>
     <th>City</th>
     <td>{{$user->city}}</td>
   </tr>
    <tr>
     <th>gender</th>
     <td>{{$user->gender}}</td>
    </tr>
    </tr>
    <tr>
     
   </tr>
   <tr>
     <th>Email</th>
     <td>{{$email->email}}</td>
   </tr>
   <th>Reset password</th>
      <td><button class="btn btn-default"  onclick="setPasswordResetModal();"><label>Reset Your Password</label></td>
  </thead>
   <tbody>
   </tbody>

</table>
  </form>
</div>
    </div>
  </div>
</div>
<!--end profile view modal -->
<!--staet user edit modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="sd-id"></h4>
      </div>
      <div class="modal-body">
       <form action="user/create1" method="POST" id="usereditp1">
        
        <input type="hidden" class="form-control" name="id" id='edit_user_id'>

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Firstname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="firstname" id='first-name'>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Lastname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lastname" id='last-name'>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="email" id='email'>
      </div>
    </div>
     <div class="form-group row">
      <label for="example-datetime-local-input" class="col-sm-2 col-form-label">dob</label>
      <div class="col-sm-10">
        <input class="form-control" type="date" value="2011-08-19" id='dob' name="dob">
      </div>
    </div>
     
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">role</label>
      <div class="col-sm-10">
        <select id="role" name="role">
            <option value="-1" disabled selected>Role</option>
            @foreach ($roles as $role)
                <option value="{{$role->role}}">{{ $role->role }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">city</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="city" id='city'>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">street</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="street" id='street'>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">state</label>
      <div class="col-sm-10">
        <select id="state" name="state">
              <option value="-1" disabled selected>province</option>
              @foreach ($states as $state)
                  <option value="{{$state->id}}">{{ $state->name }}</option>
              @endforeach
          </select>

      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">gender</label>
      <div class="col-sm-10">
          <input type="radio" name="gender"  value="m">male</input>
          <input type="radio" name="gender" class='egender'value="f">female</input>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputte3" class="col-sm-2 col-form-label">telephone</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="tel_no" id='telephone'>
      </div>
    </div>
    
   <input class="sumbit" type="submit" value="Submit" style="width:400px; margin-left:100px;color:#009ACD;height:40px;">  
  </form>
      </div>
     
        
      </div>
    </div>
  </div>
</div>
<!--end users edit modal -->

<!--start room add modal -->
<div class="modal fade" id="roommodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="myModalLabel">Add the new room</h6>
      </div>
      <div class="modal-body">
      <form action="user/roomInsert" method="GET" id="room-insert-form">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Room Number</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="room-add-modal-room-no" name="room_no">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="location">
          </div>
        </div>
    
    
    <input class="sumbit" type="submit" value="Submit" style="width:400px; margin-left:100px;color:#009ACD;height:40px;"> 
  </form>
      </div>
      
    </div>
  </div>
</div>
<!--end room add modal -->

<!--start role add modal -->
<div class="modal fade" id="roleadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="myModalLabel">Add new roles</h6>
      </div>
      <div class="modal-body">
      <form action="user/roleInsert" method="POST" id="role-insert-form">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Role Name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control"  name="role">
          </div>
        </div>
       
    
    
    <input class="sumbit" type="submit" value="Submit" style="width:400px; margin-left:100px;color:#009ACD;height:40px;"> 
  </form>
      </div>
     
    </div>
  </div>
</div>
<!--end role add modal -->
<!--profile pic modal -->
<div class="modal fade" id="ppicmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       <h6 class="modal-title" id="myModalLabel">Add your profile picture</h6>
      </div>
      <div class="modal-body">
              <form id="update-form" action="user/updateProfilePic" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                       <div class="col-sm-10">
                                  <input type="file" name="image"/>
                            </div>
                                <input class="sumbit" type="submit" value="uplode" style="width:400px; margin-left:100px;color:#009ACD;height:40px;"> 
                                
                        </div>
                </form>
      </div>
      
    </div>
  </div>
</div>
<!--end room add modal -->
 <!--start  room edit modal -->

<div class="modal fade" id="roomedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6 class="modal-title" id="myModalLabel">Edit rooms</h6>
      </div>
      <div class="modal-body">
       <form action="user/create3" method="POST" id="roomeditp3">
        
        <input type="hidden" class="form-control" name="room_no" id='edit_room_no'>

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Room Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="room_no" id="room_no">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="location" id="location">
      </div>
    </div>
    
    
     <input class="sumbit" type="submit" value="uplode" style="width:400px; margin-left:100px;color:#009ACD;height:40px;"> 
  </form>
      </div>
      
    </div>
  </div>
</div>
<!--  end  room edit modal -->

 <!--start  role edit modal -->

<div class="modal fade" id="roleedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h7 class="modal-title" id="myModalLabel">Edit roles</h7>

      </div>
      <div class="modal-body">
       <form action="user/roleedit" method="POST" id="role_edit_modal">
        
        <input type="hidden" class="form-control" name="id" id='edit_role_name'>

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Role Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="role" id="rolel">
      </div>
    </div>
     <input class="sumbit" type="submit" value="uplode" style="width:400px; margin-left:100px;color:#009ACD;height:40px;"> 
  </form>
      </div>
      
    </div>
  </div>
</div>
<!--  end  role edit modal -->

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if(!empty($profile_pic))
                    <img src="/florenze/public/profile_images/{{$profile_pic}}" alt="..." class="img-circle profile_img">
                @else 
                    <img  class="img-circle profile_img glyphicon glyphicon-user">
                @endif
                  
                
              </div>
              <div class="profile_info">
                <span>Admin,</span>
                <h2>{{$user->fname}} {{$user->lname}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General Options</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a></li>
                  <li><a data-toggle="modal" data-target="#useraddmodal"><i class="fa fa-edit"></i> Add New Employee<span class="fa fa-chevron-right"></span></a></li>
                   <li><a data-toggle="modal" data-target="#roleadd"><i class="fa fa-edit"></i> Add New Role<span class="fa fa-chevron-right"></span></a></li>
                  <li><a id="room-modal-trigger" data-toggle="modal" data-target="#roommodal"><i class="fa fa-table"></i>Add New Room <span class="fa fa-chevron-right"></span></a></li>
                   <li><a id="room-modal-trigger" data-toggle="modal" data-target="#userenablemodal"><i class="fa fa-table"></i>Enable Drop Users<span class="fa fa-chevron-right"></span></a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Settings</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="modal" data-target="#userviewmodal"" ><i class="fa fa-bug"></i> My Profile  <span class="fa fa-chevron-right"></span></a></li>
                  <li><a data-toggle="modal" data-target="#ppicmodal"><i class="fa fa-windows"></i> Update Profile Pic <span class="fa fa-chevron-right"></span></a></li>                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
                <a style="width: 100%; text-align: left; padding-left: 10px;" data-toggle="tooltip" data-placement="top" title="Logout" href="user/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div id="admin-logo"></div>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count">{{$doctors}}</div>
                  <h3>Doctors</h3>
                  <p>Visiting : Permenent: </p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count">{{$receptionists}}</div>
                  <h3>Reception</h3>
                  <p>receptionists: cashiers:</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">{{$room_assistants}}</div>
                  <h3>Back Office</h3>
                  <p>Room Assistants: Genaral Admins:</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">{{$patients}}</div>
                  <h3>Patients</h3>
                  <p>Active Today: </p>
                </div>
              </div>
            </div>

            <div class="row" >
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee List</h2>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Input first or last name"/>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                      <table id="user-list" class="table table-bordered table-hover"></table>
                      <ul id="user-list-pagination" class="pagination"></ul>
                  </div>
                </div>
              </div>
            </div>
              
              <div class="row" style="color:#8B6914;">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Room List</h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                      <table id="room-list" class="table table-bordered table-hover" style="color:#8B6914;">
                         <tr> 
                    <td>Rooom No</td> 
                   <td>location</td> 
                   <td>options</td> 
                         </tr> 
            @foreach ($rooms as $user) 
               <tr> 
              <td>{{ $user->room_no}}</td> 
               <td>{{ $user->location}}</td> 
               <td><button class="btn btn-default" data-toggle="modal" data-target="#roomedit" onclick="setRoomEditModal({{ $user->room_no}});"><label>edit</label></button></td>

                        </tr> 


                     @endforeach 
                      </table>
                      <ul id="user-list-pagination" class="pagination"></ul>
                  </div>
                </div>
              </div>
            </div>
          
          <div class="row" style="color:#8B6914;">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Role List</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                      <table id="user-list" class="table table-bordered table-hover" style="color:#8B6914;">
                         <tr> 
                    <td>Role name</td> 
                    <td>Option</td> 
                         </tr> 
            @foreach ($roles as $role) 
               <tr> 
              <td>{{ $role->role}}</td> 
               
               <td><button class="btn btn-default" data-toggle="modal" data-target="#roleedit" onclick="setRoleEditModal({{$role->id}});"><label>edit</label></button></td>

                        </tr> 


                     @endforeach 
                      </table>
                      <ul id="user-list-pagination" class="pagination"></ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->
      </div>
    </div>
<script>
function setRoomEditModal(room_no){
   // $('#sd-ido').html('room_no - '+room_no);
    
    $('#edit_room_no').val(room_no);
    console.log(room_no);
    $.get("user/getByIdo?&room_no="+room_no, function(res, status){
       
        console.log(res);
        $('#room_no').val(res[0].room_no);
        $('#location').val(res[0]. location);
        
        
    });
    
}

</script>
@stop









