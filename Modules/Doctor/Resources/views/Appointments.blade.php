@extends('doctor::layouts.master')

@section('content')

<div class="container">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4">
		<h3><b></b></h3>
	</div>  
	
	
		<div class="form-group">
			<div class="col-xs-4">
				<br/><br/>
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
			<div class="col-xs-4"><br/><br/></div>
			<div class="col-xs-4"><br/><br/></div>
			<div class="col-xs-4"><br/><br/></div>
			
			<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
				<a href="../doctor"><span class="glyphicon glyphicon-home"> Home</span></a> 
			</div>
	
			<div class="col-xs-2 " style="color:black ; font-size:15pt ; align:right">
				<a href="logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a> 
			</div>
			
			<div class="col-xs-12"><br/><br/><br/></div>
			<div class="col-xs-4"><br/><br/><br/></div>
			<div class="col-xs-6 florenze-panel" id="panel1" height="100%">
				<div class="florenze-form">
					<h3 class="form-header">Appointments</h3>
					<table width="100%" >
						<tr><br/><br/></tr>
						<tr>
							<td><lable for="appDate"><b>Date</b><span class="glyphicon glyphicon-calendar"></span></lable></td>
							<td><input id="appointmentDate" type="date" style="background:#FAD7A0"></td>
							<td><button id="appointmentSearch"  style="background:#AEB6BF" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search"></span></button></td>
						</tr>
						<tr><td></td></tr>
						<tr>
							<td colspan="3"><input id="NoOfAppointments" name="NoOfAppointments" type="text" placeholder="Number of Appointments" readonly="readonly"/></td>
						</tr>
					</table>
				</div>
			</div>
		</div>  
</div>
  
@stop
