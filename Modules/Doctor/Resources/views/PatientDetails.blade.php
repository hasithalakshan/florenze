@extends('doctor::layouts.master')
@section('content')

<div class="container">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
		<h3><b></b></h3> 
		<br/><br/>
	</div>
 
	<div class="form-group">
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
		<br/>
		<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
			<a href="../doctor"><span class="glyphicon glyphicon-home"> Home</span></a> 
		</div>
	
		<div class="col-xs-2 " style="color:black ; font-size:15pt ; align:right">
			<a href="logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a> 
		</div>
		
		<div class="col-xs-12"></div>
		
        <div class="col-xs-5 florenze-panel" id="patient-details" >
			<div class="florenze-form">
				<h3 class="form-header">Appointments List</h3>
				<table width="100%">
					<tr >
						<td><lable for="appDate"><b>Date</b><span class="glyphicon glyphicon-calendar"></span></lable></td>
						<td><input id="appointmentDate" type="date" style="background:#FAD7A0"></td>

						<td><button id="searchAppointments" style="background:#AEB6BF" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search"></span></button></td>
						<td></td>
					</tr>
					</table>
					
					<div id="appointment-list">
                        <table id="appointment-list-table" class="table table-bordered"></table>
                    </div>
			</div>
		</div>
		
		<div class="col-xs-1"></div>
		
		<div class="col-xs-5 florenze-panel" id="patient-details">
			<div class="florenze-form">
				<h3 class="form-header">Patient Details</h3>
				<table  width="100%">
					<tr><td><input id="fname" name="FName" type="text" readonly="readonly" placeholder="First Name"/></td>
						<td><input id="lname" name="LName" type="text" readonly="readonly" placeholder="Last Name"/></td></tr>
						<tr><td colspan="2"><input id="dob" name="Age" type="text" readonly="readonly" placeholder="Age"/></td></tr>			
				</table>
                <div id="records-list">
					<table id="record-list-table" class="table table-bordered"></table>
                </div>	
			</div>
		</div>
	</div>
</div>
  
@stop