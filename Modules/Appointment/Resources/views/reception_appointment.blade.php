
<form id="appointment-basics" action="appointment/store" method="get"> 
    <span class="glyphicon glyphicon-remove appointment-close"></span>
    <div class="row">
        <select id="appointment-doctor" name="doctor">
                <option></option>
                @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}">@if ($doctor->employee->user->gender=='f') Mrs. @else Mr. @endif {{ $doctor->employee->user->fname }} {{ $doctor->employee->user->lname }} - {{ $doctor->speciality }}</option>
                @endforeach
            </select>
            <div id="livesearch"></div>
            <div id="doctor-slider-container"></div>
    </div>



    <div class="row" id="appointment-date-time-container">
        <input type="date" id="appointment-date" name="doa"/><input type="time" id="appointment-time" name="toa"/>

    </div>

    <label id="appointment-patient-details-label">Patient Details:</label>
    <div id="appointment-patient-details">

        <div id="patient-selecter">
            <div id="new-patient" class="op glyphicon glyphicon-plus"></div>
            <div id="select-patient" class="op glyphicon glyphicon-search"></div>
        </div>

        <div id="selected-patient" class="invisible">
            <span class="glyphicon glyphicon-remove" id="clear-selected-patient"></span>
            <input type="hidden" id="sp-id" name="patient"/>
            <p id="sp-name"></p>
            <p id="sp-dob"></p>
            <p id="sp-street"></p>
            <p id="sp-city"></p>
            <p id="sp-reg"></p>
        </div>
    </div>
    <div id="appointment-illness-details" class="florenze-form"><input id="appointment-illness" name="illness" type="text" placeholder="Illness" /></div>


    <input type="submit" id="confirm-appointment" value="Confirm Appointment">
</form>
    
