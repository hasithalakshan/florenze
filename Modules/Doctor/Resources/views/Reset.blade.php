@extends('doctor::layouts.master')
@section('content')

<div class="container">
	<div class="col-xs-6"></div>
	<div class="col-xs-6"><h3><b></b></h3></div>  

	<div class="form-group">
		<div class="col-xs-4"><br/><br/>
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
			
		<div class="col-xs-12"><br/><br/></div>
		<div class="col-xs-5"><br/><br/></div>
	    <div class="col-xs-5 florenze-panel" id="panel1">
			<div class="florenze-form">
			    <h3 class="form-header">Change Password</h3>
				<form id="pass-reset-form" action='resetPassword' method='GET'>
					<table width="100%">
						<tr>
							<td><input id="email" name="email" type="text"   placeholder="Email"/></td>
						</tr><br/><br/>
						<tr>
							<td><input id="CurrentPassword" name="CurrentPassword" type="password" placeholder="Current Password" /></td>
						</tr>
						<tr>
							<td><input id="NewPassword" name="NewPassword" type="password" placeholder="New Password"/></td>
						</tr>
						<tr>
							<td><input id="ConfirmPassword" name="ConfirmPassword" type="password" placeholder="Confirm Password" />
							</td>
						</tr>
						<tr>
                            
                            <td><input type="submit" id="reg-patient" value="Confirm"></td>
                        </tr>
					</table>
				</div>
				</form>
		</div>
	
		<div class="col-xs-12"></div>
		<div class="col-xs-6"></div>
		<div class="col-xs-2"></div>
		<div class="col-xs-2"></div>	
	</div>
</div>

@stop
