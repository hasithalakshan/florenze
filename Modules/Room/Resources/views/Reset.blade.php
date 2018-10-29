@extends('room::layouts.master')
@section('content')

		<div class="col-xs-4"><br/><br/></div>
		<div class="col-xs-4"><br/><br/></div>
		
	   
	    <div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
			<a href="../room"><span class="glyphicon glyphicon-home"> Home</span></a> 
		</div>
	
		<div class="col-xs-2 " style="color:black ; font-size:15pt ; align:right">
			<a href="logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a> 
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

		
		
		<div class="col-xs-4"></div> 
		<br/><br><br/><br/><br/>
		<div class="col-xs-4"></div> 
		<div class="col-xs-4"></div> 
	    
		<div class="col-xs-4 florenze-panel">
			<div class="florenze-form">
			<br/>
				
				<form id="pass-reset-form" action='resetPassword' method='GET'>
					<h4><b>Reset Password</b></h4>
					
						<tr>
							<td><lable for="UserName"><b>Email</b></lable></td>
							<td><input id="email" name="email" type="text"  size="20" maxlength="30" placeholder="@gmail.com"/></td>
						</tr><br/><br/>
						<tr>
							<td><lable for="CurrentPassword"><b>Current Password </b></lable></td>
							<td><input id="CurrentPassword" name="CurrentPassword" type="password" size="20" maxlength="20" /></td>
						</tr><br/><br/>
						<tr>
							<td><lable for="NewPassword"><b>New Password</b></lable></td>
							<td><input id="NewPassword" name="NewPassword" type="password" size="20" maxlength="20" /></td>
						</tr><br/><br/>
						<tr>
							<td><lable for="ConfirmPassword"><b>Confirm Password</b></lable></td>
							<td><input id="ConfirmPassword" name="ConfirmPassword" type="password" size="20" maxlength="20" />
							</td>
						</tr><br/><br/>
					
				

						<tr>
							
							<td><input type="submit" class="btn btn-default btn-md"></td><br/><br/>
						</tr>
					
				</form>
		</div>
	
		</div>
	


@stop
