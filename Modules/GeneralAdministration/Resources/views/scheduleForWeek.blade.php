@extends('generaladministration::layouts.master')

@section('content')
<div class="col-xs-4"></div> 
<div class="col-xs-4"></div>
<div class="col-xs-2"></div>
   
<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
        <a href="../generaladministration"><span class="glyphicon glyphicon-home"> Home</span></a> 
    </div>
	
   

<h2 id="index-header" class="page-header">Schedule For Week</h2>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
            <h2 class="page-header"></h2>
				<ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#a" data-toggle="tab">Monday</a></li>
                    <li><a href="#b" data-toggle="tab">Tuesday</a></li>
					<li><a href="#c" data-toggle="tab">Wednesday</a></li>
				    <li><a href="#d" data-toggle="tab">Thursday</a></li>
				    <li><a href="#e" data-toggle="tab">Friday</a></li>
				    <li><a href="#f" data-toggle="tab">Saturday</a></li>
				    <li><a href="#g" data-toggle="tab">Sunday</a></li>
				</ul>
                       
		<div id="myTabContent" class="tab-content">
            
<!-- /Monday start -->	
			<div id="a" class="tab-pane fade in active">
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
		 
						
						
							
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($mon[$i][$room['room_no']])?'-':$mon[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
									
							

						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Monday end-->	
		
<!-- /Tuesday start -->			
			<div id="b" class="tab-pane fade" >
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($tue[$i][$room['room_no']])?'-':$tue[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
						
						
			
						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Tuesday End -->

<!-- /Wednesday start-->
			<div id="c" class="tab-pane fade" >
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($wed[$i][$room['room_no']])?'-':$wed[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
						
						
			
						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Wednesday end -->	

<!-- /Thursday start-->	
			<div id="d" class="tab-pane fade" >
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($thu[$i][$room['room_no']])?'-':$thu[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
						
						
			
						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Thursday end-->	

<!-- /Friday start -->
			<div id="e" class="tab-pane fade" >
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
		 
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($fri[$i][$room['room_no']])?'-':$fri[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
						
			
						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Friday end-->

<!-- /Saturday start-->	
			<div id="f" class="tab-pane fade" >
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($sat[$i][$room['room_no']])?'-':$sat[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
						
						
			
						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Saturday end-->

<!-- /Sunday start-->
			<div id="g" class="tab-pane fade" >
				<div class="content_accordion">
					<div class="panel-group" id="accordion">
			
						<table width="100%" align="center" >    
							<tr>
								<th></th>
								@foreach ($rooms as $room)
								<th>{{$room->room_no}}</th>
								@endforeach
							</tr>
                                                        @for ($i = 1 ; $i <= count($periods); $i++)
                                                        <tr>
                                                        <th>{{ $periods[$i-1]['period_start'] }} to {{ $periods[$i-1]['period_end'] }} </th>
                                                            @foreach ($rooms as $room)
                                                                <td>
                                                                        {{ empty($sun[$i][$room['room_no']])?'-':$sun[$i][$room['room_no']] }}
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                        @endfor
						
						
			
						</table>
                                       
					</div>
				</div>

			</div>
<!-- /Sunday end-->		
			
			
		</div>
					
		</div>
<!-- /.row -->
                
	</div>
<!-- /.container-fluid -->
</div>


	
@stop