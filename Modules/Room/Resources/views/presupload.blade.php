
@extends('room::layouts.master')

@section('content')
<div class="col-xs-4"></div> 
<div class="col-xs-4"></div>
<div class="col-xs-2"></div>
   
<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
        <a href="../room"><span class="glyphicon glyphicon-home"> Home</span></a> 
    </div>
	
   

<h2 id="index-header" class="page-header">Prescription Uploader</h2>

<div id="clock-container" style="background: white; width: 340px;">
	<div id="clock" class="light">
		<div class="display">
			<div class="weekdays"></div>
			<div class="ampm"></div>
			<div class="digits"></div>
		</div>
	</div>
</div>



<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="col-xs-4"></div> 

		
		<div class="col-xs-4 florenze-panel">
			<div class="florenze-form">
				
		<br/>
				<form id="update-prescription-form" action="{{ url('room/uploadPrescription') }}" enctype="multipart/form-data" method="POST">
						{{ csrf_field() }}
						<input id="today" type="date" name="date"/>
						<select id="doctor" name="doctor">
                                        <option></option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{$doctor->id}}">@if ($doctor->employee->user->gender=='f') Mrs. @else Mr. @endif {{ $doctor->employee->user->fname }} {{ $doctor->employee->user->lname }} - {{ $doctor->speciality }}</option>
                                        @endforeach
                                    </select>
						
						<tr>
						<td>
							<lable for="pid"><b>Patient ID</b></lable>
						</td>
						<br/><br/>
						<td>
							<select name="appointment-no" >
								
							</select>
						</td>
						<br/><br/>
					</tr>
					<tr>
						<td>
							<lable for="pid"><b>Doctor</b></lable>
						</td>
						<br/><br/>
						<td>
							<select name="appointment-no" >
								
							</select>
						</td>
						<br/><br/>
					</tr>
				
					<tr>
						<td>
							<lable for="presccription"><b>Prescription </b></lable>
							 <input type="file" name="medical-record">
						</td>
						<br/><br/>
						
					</tr>
				
					<tr>
						<td>
							<lable for="description"><b>Description</b></lable>
							
						</td>
						<td>
						<br/><br/>
						<textarea rows="4" cols="50" name="description" >Other Comments</textarea>
							
						</td>
					</tr>
				    
					<input type="submit" value="Upload" />
				</form>
				
			
				<br/>
			</div>
		</div>
	  
		
	  
		
		
		
	</div>
</div>
  
@stop