@extends('doctor::layouts.master')

@section('content')
    
<div class="container">

	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-2">
	<h1><b></b></h1> 
	</div>
	<div class="col-xs-2"></div>
	
	<div class="form-group">
		<div class="col-xs-12">
			<br/><br/>
		</div>
	
		<div class="col-xs-4">
			<div id="clock-container" style="background: white; width: 340px;">
				<div id="clock" class="light">
					<div class="display">
						<div class="weekdays"></div>
						<div class="ampm"></div>
						<div class="digits"></div>
					</div>
				</div>
			</div>
		</div>  
	
		<div class="col-xs-4"></div>  
	
		<div class="col-xs-2 "></div>
	
		<div class="col-xs-2 " style="color:black ; font-size:15pt ; align:right">
			<a href="doctor/logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a> 
		</div>
   
		<div class="col-xs-12"></div>  
		<div class="col-xs-12"></div>  
		<div class="col-xs-4"></div> 
		
		<div class="col-xs-3">	
			<div id="rprofile">                   
				@if(!empty($profile_pic))
					<div id="rprofile-pic" style="background: url(profile_images/{{$profile_pic}}); background-size: cover;"></div>
				@else 
					<div id="rprofile-pic" class="glyphicon glyphicon-user" style="background: rgba(0, 0, 0, 0.3);padding-top: 15px;" ></div>
				@endif
				<span>{{$user->fname}} {{$user->lname}}</span>                        
			</div>                   
		</div>
	
		<div class="col-xs-1"></div> 
	 
		<div class="col-xs-4 florenze-panel">
			<div class="florenze-form" style="font-size:13pt">
				<br/>
				<table height="100%" width="100%">
					<tr>
						<td><a class="btn btn-default btn-sm" href="doctor/patientDetails" style="height:80px;width:300px; color:#784212;background:#FAE5D3" ><span class="glyphicon glyphicon-user"></span><b>Patient Details</b></a><br/></td>
					</tr>
					<tr>
						<td><a class="btn btn-default btn-sm" href="doctor/appointments" style="height:80px;width:300px;color:#784212;background:#FAE5D3"> <span class="glyphicon glyphicon-list" ></span><b> Appointments</b></a><br/></td>
					</tr>
					<tr>
						<td><a class="btn btn-default btn-sm" href="doctor/updateInfor" style="height:80px;width:300px;color:#784212;background:#FAE5D3"> <span class="glyphicon glyphicon-pencil" ></span> <b>Update Details</b></a><br/></td>
					</tr>
					<tr>
						<td><a class="btn btn-default btn-sm" href="doctor/reset" style="height:80px;width:300px;color:#784212;background:#FAE5D3"><span class="glyphicon glyphicon-edit" ></span><b>Change Password</b></a><br/></td>
					</tr>
					<tr>
						<td><a class="btn btn-default btn-sm" href="doctor/profilePicture" style="height:80px;width:300px;color:#784212;background:#FAE5D3"><span class="glyphicon glyphicon-picture" ></span><b>Change Profile Picture </b></a><br/></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
@stop

