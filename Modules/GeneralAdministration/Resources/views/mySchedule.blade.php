@extends('generaladministration::layouts.master')

@section('content')
<div class="col-xs-4"></div> 
<div class="col-xs-4"></div>
<div class="col-xs-2"></div>
   
<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
        <a href="../generaladministration"><span class="glyphicon glyphicon-home"> Home</span></a> 
</div>

<h2 id="index-header" align="center" class="page-header">My Schedule </h2>
 
<br/><br/><br/><br/><br/><br/><br/>
<div class="container-fluid">
    <div class="row">
	@if(empty($mon))
		<div class="col-xs-4"></div> 
	
			<div class="col-xs-4 florenze-panel">
				<div class="florenze-form">
					<div class="col-lg-12">
					
					<h2  align="center" class="page-header"></h2>
					<form action="getMyShedule" method="get">
						<input type="text" name="raId" placeholder="Enter the ID" />
						<input type="submit" value="Get the Schedule"/>
					</form>
					<br/><br/><br/><br/>
					</div>
				</div>
			</div>
	@else
		
	<div class="col-lg-12">
			<h2  align="center" class="page-header"></h2>
                        
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
<!--Monday-->                         
		    <div class="tab-pane fade in active" id="home">
                <div class="content_accordion">
                    <div class="panel-group" id="accordion">
                        
			<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($mon[$i])?'-':$mon[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
                    </div>
		</div>
	</div>
<!--Monday end-->                          
	
<!--Tuesday-->					   
		    <div class="tab-pane fade" id="a">
                <div class="content_accordion">
                    <div class="panel-group" id="ga">
                       
			<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($tue[$i])?'-':$tue[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
                    </div>
				</div>
			</div>
<!--Tuesday end-->                           

<!--Wednesday-->						   
			<div class="tab-pane fade" id="b">
				<div class="content_accordion">
					<div class="panel-group" id="gb">
						
				<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($wed[$i])?'-':$wed[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
                    </div>
			    </div>
            </div>
 <!--Wednesday end-->                          

 <!--Thursday end-->						   
			<div class="tab-pane fade" id="c">
				<div class="content_accordion">
					<div class="panel-group" id="gc">
					   
				<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($thu[$i])?'-':$thu[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
					</div>
				</div>
			</div>
<!--Thursday end-->	

<!--Friday-->					   
			<div class="tab-pane fade" id="d">
				<div class="content_accordion">
					<div class="panel-group" id="gd">
                          
				<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($fri[$i])?'-':$fri[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
					</div>
				 </div>
			</div>
<!--Friday end-->	

<!--Saturday-->					   
			<div class="tab-pane fade" id="e">
				<div class="content_accordion">
					<div class="panel-group" id="ge">
                                        
				<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($sat[$i])?'-':$sat[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
                    </div>
				</div>
			</div>
<!--Saturday end-->

<!--Sunday-->
            <div class="tab-pane fade" id="f">
                <div class="content_accordion">
                    <div class="panel-group" id="gf">
                                       
				<table width="80%" align="center" >
                                <tr>
	                            <th>Time</th>
                                    @foreach ($periods as $p)
					<th>{{$p->period_start}} to {{$p->period_end}}</th>
                                    @endforeach
				</tr>
                                <tr>
                                    <th>Room No.</th>
                                    @for ($i = 1 ; $i <= count($periods); $i++)
                                        <td>
                                            {{ empty($sun[$i])?'-':$sun[$i] }}
                                        </td>
                                    @endfor
                                </tr>
                        </table>
                    </div>
                </div>
			</div>
<!--Sunday end-->                            
                            
            </div>
<!-- /.row -->
    </div>
<!-- /.container-fluid -->
@endif

</div>
</div>
	
	
@stop