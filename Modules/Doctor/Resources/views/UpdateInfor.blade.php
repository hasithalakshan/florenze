@extends('doctor::layouts.master')
@section('content')

<div class="container">
	<div class="col-xs-4"></div>
	<div class="col-xs-4"></div>
	<div class="col-xs-4"><h1><b></b></h1></div>
	
		<div class="form-group">
			<div class="col-xs-4" ><br/><br/>
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
			
			<div class="col-xs-4"><br/><br/><br/></div>
			<div class="col-xs-4"><br/><br/><br/></div>
			<div class="col-xs-4"><br/><br/><br/></div>
		
			<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
				<a href="../doctor"><span class="glyphicon glyphicon-home"> Home</span></a> 
			</div>
	
			<div class="col-xs-2 " style="color:black ; font-size:15pt ; align:right">
				<a href="logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a> 
			</div>
			
			<div class="col-xs-6"></div>
			<div class="col-xs-6 florenze-panel" id="panel1">
                <div class="florenze-form">
                    <h3 class="form-header">Update Details</h3>
                   <form id="doc-update-form" action='updateDetails'  method="GET">
                    <table style="width:100%">
                       <tr>
							<td><input id="docId" name="DocId" type="text" placeholder="Doctor ID" readonly="readonly"/></td>	
							<td><a  id="searchEmployee" style="background:#AEB6BF" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search"></span></a></td>	
						</tr>
                        <tr>
							<td><input id="fname" name="FName" type="text" placeholder="First Name"/></td>
                            <td><input id="lname" name="LName" type="text" placeholder="Last Name"/></td>
                        </tr>
                        <tr>
                            <td><select  id="type" name="Type"  >
								<option value="-1" disabled selected>Type</option>
								<option value="v">Visiting </option>
								<option value="p">Permanent </option>
								</select>
							</td>
                       
                            <td><input type="text" id="add1" name="Add1" placeholder="Street"/></td>
                        </tr>
                        <tr>
                            <td><input id="add2" type="text" name="Add2" placeholder="city"/></td>
                            <td>
                                <select id="add3" name="Add3">
                                    <option value="-1" disabled selected>Province</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" id="email" name="email" placeholder="E mail"/></td>
                        </tr>
                        <tr>
                            <td><input type="tel" id="telno" name="TelNo" placeholder="Telephone Number"/></td>
                            <td><input type="text" id="chanellingCharges" name="chanellingCharges" placeholder="Channelling Charge"/></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td><input type="submit" id="reg-patient" value="Confirm"></td>
                        </tr>
                    </table>
                    </form>
                </div>
            
			
			</div>
				
			
								
		</div>	
</div>

@stop

