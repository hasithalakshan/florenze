@extends('room::layouts.master')

@section('content')
<div class="col-xs-4"></div> 
<div class="col-xs-4"></div>
<div class="col-xs-2"></div>
   
<div class="col-xs-2 " style="color:black ; font-size:15pt;align:right">
        <a href="../room"><span class="glyphicon glyphicon-home"> Home</span></a> 
    </div>

<h2 id="index-header" align="center" class="page-header">My Schedule </h2>

<div id="clock-container" style="background: white; width: 340px;">
	<div id="clock" class="light">
		<div class="display">
			<div class="weekdays"></div>
			<div class="ampm"></div>
			<div class="digits"></div>
		</div>
	</div>
</div>

 <br/><br/><br/><br/><br/><br/><br/>
<div class="container-fluid">
    <div class="row">	
	
        <div class="col-lg-12">
			<h2  align="center" class="page-header">
            </h2>
                        
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
                            <div id="head_nav">
                                <tr>
	                                <th>Time</th>
								    <th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>

								<tr>
									<th>Room No.</th>
									<td>{{$mon1}}</td>
									<td>{{$mon2}}</td>
									<td>{{$mon3}}</td>
									<td>{{$mon4}}</td>
									<td>{{$mon5}}</td>
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
							<div id="head_nav">
								<tr>
									<th>Time</th>
									<th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>

								<tr>
									<th>Room No.</th>
									<td>{{$tue1}}</td>
									<td>{{$tue2}}</td>
									<td>{{$tue3}}</td>
									<td>{{$tue4}}</td>
									<td>{{$tue5}}</td>
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
							<div id="head_nav">
								<tr>
									<th>Time</th>
									<th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>

								<tr>
									<th>Room No.</th>
									<td>{{$wed1}}</td>
									<td>{{$wed2}}</td>
									<td>{{$wed3}}</td>
									<td>{{$wed4}}</td>
									<td>{{$wed5}}</td>
									
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
							<div id="head_nav">
								<tr>
									<th>Time</th>
									<th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>
								
								<tr>
									<th>Room No.</th>
									<td>{{$thu1}}</td>
									<td>{{$thu2}}</td>
									<td>{{$thu3}}</td>
									<td>{{$thu4}}</td>
									<td>{{$thu5}}</td>
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
							<div id="head_nav">
								<tr>
									<th>Time</th>
									<th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>

								<tr>
									<th>Room No.</th>
									<td>{{$fri1}}</td>
									<td>{{$fri2}}</td>
									<td>{{$fri3}}</td>
									<td>{{$fri4}}</td>
									<td>{{$fri5}}</td>
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
							<div id="head_nav">
								<tr>
									<th>Time</th>
									<th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>

								<tr>
									<th>Room No.</th>
									<td>{{$sat1}}</td>
									<td>{{$sat2}}</td>
									<td>{{$sat3}}</td>
									<td>{{$sat4}}</td>
									<td>{{$sat5}}</td>
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
							<div id="head_nav">
								<tr>
									<th>Time</th>
									<th>8.00am - 10.00am</th>
									<th>10.00am - 12.00pm</th>
									<th>1.00pm - 3.00pm</th>
									<th>3.00pm - 5.00pm</th>
									<th>5.00pm - 7.00pm</th>
								</tr>
							</div>

								<tr>
									<th>Room No.</th>
									<td>{{$sun1}}</td>
									<td>{{$sun2}}</td>
									<td>{{$sun3}}</td>
									<td>{{$sun4}}</td>
									<td>{{$sun5}}</td>
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


</div>
	
	
@stop