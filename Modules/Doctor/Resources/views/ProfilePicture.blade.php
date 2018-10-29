@extends('doctor::layouts.master')

@section('content')

<div class="container">
	<div class="col-xs-6"></div>
	<div class="col-xs-6">
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
			
			<div class="col-xs-12"><br/><br/></div>
			<div class="col-xs-4"><br/><br/></div>
	   
			<div class="col-xs-7 florenze-panel"  id="panel1">
				<div class="florenze-form">
					<h3 class="form-header">Change Profile Picture</h3>
					 <div id="rprofile">                   
						@if(!empty($profile_pic))
							<div id="rprofile-pic" style="background: url(../profile_images/{{$profile_pic}}); background-size: cover;"></div>
						@else 
							<div id="rprofile-pic" class="glyphicon glyphicon-user" style="background: rgba(0, 0, 0, 0.3);padding-top: 15px;" ></div>
						@endif        
						<span>{{$user->fname}} {{$user->lname}}</span>                        
					</div>  
					<form id="update-reception-form" action="{{ url('doctor/update') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                            <div class="">
                                <div class="col-md-12">
									<table height="100%" width="100%">
										<tr>
											<td><input type="file" name="image" /></td>
										</tr>
										<tr>
											<td><button type="submit" class="btn btn-default btn-md" style="background:#5DADE2">Upload</button></td>
										</tr>
									</table>
								</div>
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

