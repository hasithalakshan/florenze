@extends('generaladministration::layouts.master')

@section('content')
<div class="col-xs-4"></div> 
<div class="col-xs-4"></div>   
<div class="col-xs-2"></div>   

    <div class="col-xs-2 " style="color:black ; font-size:15pt ; align:right">
        <a href="generaladministration/logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a> 
    </div>


<h1 id="index-header">Genaral Administration Panel</h1>

<div id="clock-container" style="background: white; width: 340px;">
	<div id="clock" class="light">
		<div class="display">
			<div class="weekdays"></div>
			<div class="ampm"></div>
			<div class="digits"></div>
		</div>
	</div>
</div>


<div id="index-container">
<div id="left">
<br/>
<form align="right"	class="florenze-form" method="link" action="generaladministration/scheduleForWeek">
<input class="" type="submit" value="Schedule for Week">
</form>

<form class="florenze-form" method="link" action="generaladministration/mySchedule">
<input type="submit" value="My Schedule">
</form>

<form class="florenze-form" method="link" action="generaladministration/updateschedule">
<input type="submit" value="Update Shedule">
</form>
<br/>



</div>
</div>













@stop
