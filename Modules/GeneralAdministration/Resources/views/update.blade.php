@extends('generaladministration::layouts.master')

@section('content')
<div class="col-xs-4"></div> 
<div class="col-xs-4"></div>
<div class="col-xs-2"></div>
   
<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
	<a href="../generaladministration"><span class="glyphicon glyphicon-home"> Home</span></a> 
</div>

<h2 id="index-header" align="center" class="page-header">Update Schedule </h2>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h2 align="center" class="page-header"> </h2>
                        
				<ul id="myTab" class="nav nav-tabs">
				    <li class="active"><a href="#home" data-toggle="tab">Monday</a></li>
				    <li><a href="#a" data-toggle="tab">Tuesday</a></li>
				    <li><a href="#b" data-toggle="tab">Wednesday</a></li>
				    <li><a href="#c" data-toggle="tab">Thursday</a></li>
				    <li><a href="#d" data-toggle="tab">Friday</a></li>
				    <li><a href="#e" data-toggle="tab">Saturday</a></li>
				    <li><a href="#f" data-toggle="tab">Sunday</a></li>
				</ul>
                       
			<div id="myTabContent" class="tab-content">
			
<!--Monday start-->                         
			<div class="tab-pane fade in active" id="home">
				<div class="col-xs-4"></div> 
				<div class="col-xs-4 florenze-panel">
				<div class="florenze-form">
					
					<div class="content_accordion">
                    <div class="panel-group" id="accordion">
						<form id="update_mon" class="update" action="update" method="GET">
                                                    <input type="hidden" name="day" value="mon"/>
								<label>Room No.  </label>
								<select name="room_no">
                                                                        @foreach ($rooms as $room)
                                                                                <option value="{{$room->room_no}}">{{ $room->room_no }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
							
							<label>Time  </label>
								<select name="time">
                                                                        @foreach ($periods as $period)
                                                                                <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
	
							<label> Room Assistant</label>  
										
								<select name="raID">
									<option value="-">-</option>
									@foreach ($ras as $ra)
										<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
									@endforeach
								</select>
								<br/><br/>
							
							<label>Doctor</label>  
							<select name="dID">
								<option value="-">-</option>
								@foreach ($docs as $doc)
									<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
								@endforeach
							</select>
							<br/><br/>
					
							<input type="submit" value="Submit now" />
						</form>

                          </div></div>     
					</div>
                </div>
			</div>
<!--Monday end-->                          
	
<!--Tuesday start-->					   
		    <div class="tab-pane fade" id="a">
				<div class="col-xs-4"></div> 
				<div class="col-xs-4 florenze-panel">
				<div class="florenze-form">
					<div class="content_accordion">
                    <div class="panel-group" id="ga">

                        <form id="update_tue" class="update" action="update" method="GET">
                            <input type="hidden" name="day" value="tue"/>
							<label>Room No.  </label>
								<select name="room_no">
									@foreach ($rooms as $room)
										<option value="{{$room->room_no}}">{{ $room->room_no }}</option>
									@endforeach
								</select>
								<br/><br/>
    
							<label>Time  </label>
								<select name="time">
                                                                        @foreach ($periods as $period)
                                                                                <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
	
							<label> Room Assistant </label>  
								<select name="raID">
								<option value="-">-</option>
									@foreach ($ras as $ra)
										<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
									@endforeach
								</select>
								<br/><br/>
								
							<label>Doctor </label>  
								<select name="dID">
								<option value="-">-</option>
								@foreach ($docs as $doc)
								<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
								@endforeach
									
								</select>
								<br/><br/>
								
							<input  type="submit" value="Submit now" />
							</form>
						</div></div> 
                    </div>
				</div>
			</div>
<!--Tuesday end-->                           

<!--Wednesday-->						   
			<div class="tab-pane fade" id="b">
				<div class="col-xs-4"></div> 
				<div class="col-xs-4 florenze-panel">
				<div class="florenze-form">
					<div class="content_accordion">
                    <div class="panel-group" id="gb">
                                          
					    <form id="update_wed" class="update" action="update" method="GET">
                                                <input type="hidden" name="day" value="wed"/>
							<label>Room No.  </label>
								<select name="room_no">
									@foreach ($rooms as $room)
										<option value="{{$room->room_no}}">{{ $room->room_no }}</option>
									@endforeach
								</select>
								<br/><br/>
		
							<label>Time  </label>
								<select name="time">
                                                                        @foreach ($periods as $period)
                                                                                <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
		
							<label> Room Assistant</label>  
								<select name="raID">
								<option value="-">-</option>
									@foreach ($ras as $ra)
										<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
									@endforeach
								</select>
								<br/><br/>
								
							<label> Doctor</label>  
								<select name="dID">
								<option value="-">-</option>
								@foreach ($docs as $doc)
								<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
								@endforeach
									
								</select>
								<br/><br/>	
		
		
		
							<input type="submit" value="Submit now" />
					    </form>
						</div></div>  
					</div>
				</div>
			</div>
 <!--Wednesday end-->                          

 <!--Thursday end-->						   
				<div class="tab-pane fade" id="c">
					<div class="col-xs-4"></div> 
					<div class="col-xs-4 florenze-panel">
					<div class="florenze-form">
						<div class="content_accordion">
						<div class="panel-group" id="gc">
							<form id="update_thu" class="update" action="update" method="GET">
                                                            <input type="hidden" name="day" value="thu"/>
								<label>Room No.  </label>
								<select name="room_no">
									@foreach ($rooms as $room)
										<option value="{{$room->room_no}}">{{ $room->room_no }}</option>
									@endforeach
								</select>
								<br/><br/>
								
								<label>Time  </label>
								<select name="time">
                                                                        @foreach ($periods as $period)
                                                                                <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
								
								<label> Room Assistant</label>  
							<select name="raID">
							<option value="-">-</option>
									@foreach ($ras as $ra)
										<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
									@endforeach
								</select>
								
								<br/><br/>
								
								<label> Doctor</label>  
							<select name="dID">
							<option value="-">-</option>
							@foreach ($docs as $doc)
							<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
							@endforeach
									
								</select>
								
								<br/><br/>
								
								<input type="submit" value="Submit now" />
							</form>
									  </div></div>
                                    </div>
                             </div>

                           </div>
<!--Thursday end-->	

<!--Friday-->					   
				<div class="tab-pane fade" id="d">
					<div class="col-xs-4"></div> 
					<div class="col-xs-4 florenze-panel">
					<div class="florenze-form">
						<div class="content_accordion">
						<div class="panel-group" id="gd">
							<form id="update_fri" class="update" action="update" method="GET">
                                                            <input type="hidden" name="day" value="fri"/>
								<label>Room No.  </label>
								<select name="room_no">
								
									@foreach ($rooms as $room)
										<option value="{{$room->room_no}}">{{ $room->room_no }}</option>
									@endforeach
								</select>
								<br/><br/>
								
								<label>Time  </label>
								<select name="time">
                                                                        @foreach ($periods as $period)
                                                                                <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
								
								<label> Room Assistant </label>  
							<select name="raID">
							<option value="-">-</option>
									@foreach ($ras as $ra)
										<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
									@endforeach
								</select>
								
								
								<br/><br/>
								
								<label> Doctor</label>  
							<select name="dID">
							<option value="-">-</option>
							@foreach ($docs as $doc)
							<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
							@endforeach
									
								</select>
								
								<br/><br/>
								
								<input type="submit" value="Submit now" />
							</form>
									 </div></div> 
                                    </div>
                             </div>

                           </div>
<!--Friday end-->	

<!--Saturday-->					   
                <div class="tab-pane fade" id="e">
					<div class="col-xs-4"></div> 
					<div class="col-xs-4 florenze-panel">
					<div class="florenze-form">
						<div class="content_accordion">
						<div class="panel-group" id="ge">
							<form id="update_sat" class="update" action="update" method="GET">
                                                            <input type="hidden" name="day" value="sat"/>
								<label>Room No.  </label>
								<select name="room_no">
									@foreach ($rooms as $room)
										<option value="{{$room->room_no}}">{{ $room->room_no }}</option>
									@endforeach
								</select>
								<br/><br/>
								
								<label>Time  </label>
								<select name="time">
                                                                        @foreach ($periods as $period)
                                                                                <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                        @endforeach
								</select>
								<br/><br/>
								
								<label> Room Assistant</label>  
								<select name="raID">
								<option value="-">-</option>
									@foreach ($ras as $ra)
										<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
									@endforeach
								</select>
								
								
								<br/><br/>
								
																<label> Doctor</label>  
							<select name="dID">
							<option value="-">-</option>
							@foreach ($docs as $doc)
							<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
							@endforeach
									
								</select>
								
								<br/><br/>
								
								<input type="submit" value="Submit now" />
							</form>
								</div></div> 
                                    </div>
                             </div>

                           </div>
<!--Saturday end-->

<!--Sunday-->
                    <div class="tab-pane fade" id="f">
						<div class="col-xs-4"></div> 
					<div class="col-xs-4 florenze-panel">
					<div class="florenze-form">
						<div class="content_accordion">
                        <div class="panel-group" id="gf">
							<form id="update_sun" class="update" action="update" method="GET">
                                                            <input type="hidden" name="day" value="sun"/>
	                            <label>Room No.  </label>
									<select name="room_no">
										@foreach ($rooms as $room)
											<option value="{{$room->room_no}}">{{ $room->room_no }}</option>
										@endforeach
									</select>
									<br/><br/>
									
									<label>Time  </label>
                                                                    <select name="time">
                                                                            @foreach ($periods as $period)
                                                                                    <option value="{{$period->id}}">{{ $period->period_start }} to {{ $period->period_end }}</option>
                                                                            @endforeach
                                                                    </select>
									<br/><br/>
									
									<label> Room Assistant</label>  
									<select name="raID">
									<option value="-">-</option>
										@foreach ($ras as $ra)
											<option value="{{$ra->id}}">{{ $ra->employee->user->fname }} {{ $ra->employee->user->lname }}</option>
										@endforeach
									</select>
									<br/><br/>
									
									<label> Doctor</label>  
										<select name="dID">
										<option value="-">-</option>
										@foreach ($docs as $doc)
										<option value="{{$doc->id}}">{{ $doc->employee->user->fname }} {{ $doc->employee->user->lname }}</option>
										@endforeach
												
											</select>
											
											<br/><br/>
								
									<input type="submit" value="Submit now" />
								</form>

                                       </div></div> 

                                    </div>
                             </div>

                           </div>
<!--Sunday end-->                            
                            
					</div>	 
                </div>
                <!-- /.row -->
               
            </div>
            <!-- /.container-fluid -->
	</div>	


@stop