@extends('room::layouts.master')

@section('content')

<div id="nav-bar" style="color:black ; font-size:15pt ; align:right">
<div class="col-xs-2"></div>
<div class="col-xs-3"> <a href="room/mySchedule"><span class="glyphicon glyphicon-th-list">My Schedule</span></a></div> 
    <div class="col-xs-3"> <a href="room/reset"><span class="glyphicon glyphicon-refresh">Reset Password</span></a> </div>
    <div class="col-xs-3"> <a href="room/logout"><span class="glyphicon glyphicon-log-out">Logout</span></a> </div>
</div>



<div id="clock-container" style="background: white; width: 340px;">
	<div id="clock" class="light">
		<div class="display">
			<div class="weekdays"></div>
			<div class="ampm"></div>
			<div class="digits"></div>
		</div>
	</div>
</div>

<div id="upload-panel" class="florenze-panel">
        
                <form id="update-prescription-form" action="room/uploadPrescription" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                            <div class="florenze-form">				    
                                <br/>
                                <lable for="pid"><b>Appointment Date:</b></lable>
                                <input id="today" type="date" name="date"/>
                                <br/><br/>
                                <input type="text" name="appointment_no" placeholder="appointment no"/>
                                <br/><br/>
                            </div>
                                <select id="doctor" name="doctor">
                                    <option></option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{$doctor->id}}">@if ($doctor->employee->user->gender=='f') Mrs. @else Mr. @endif {{ $doctor->employee->user->fname }} {{ $doctor->employee->user->lname }} - {{ $doctor->speciality }}</option>
                                    @endforeach
                                </select>
                            <div class="florenze-form">				
                                <br/><br/>
                                <lable for="presccription"><b>Prescription </b></lable>
                                <input type="file" name="medical_record">
                                <br/><br/>
                                <lable for="description"><b>Description</b></lable>
                                <br/><br/>
                                <textarea rows="4" cols="50" name="description" >Other Comments</textarea>
                                <br/><br/>
                                <input type="submit" value="Upload" />
                                <br/>
                            </div>
                </form>
</div>








@stop
