<div id="appointment-modal" class="modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="online-appointment-nav-tabs">
                    <li class="active"><a id="step1-header" data-toggle="tab" href="#step1">Step 1 :<br/>Doctor & Date</a></li>
                    <li><a id="step2-header" data-toggle="" href="#step2">Step 2 :<br/>Patient Details</a></li>
                    <li><a id="step3-header" data-toggle="" href="#step3">Step 3 :<br/>Confirm</a></li>
                </ul>
                
                <div class="tab-content">
                    <div id="step1" class="tab-pane active">

                            <div id="search-main-bar" class="">
                            
                                <div id="online-appointment-doctor-holder">
                                    <select id="online-appointment-doctor" name="doctor_name">
                                        <option></option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{$doctor->id}}">@if ($doctor->employee->user->gender=='f') Mrs. @else Mr. @endif {{ $doctor->employee->user->fname }} {{ $doctor->employee->user->lname }} - {{ $doctor->speciality }}</option>
                                        @endforeach
                                    </select>
                                
                                    <button type="submit" id="search-doctor" data-toggle="popover" data-placement="bottom" data-content="Please Select a Doctor" data-trigger="focus">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>

                                </div>
                            </div>
                            <div id="search-result">
                                <div id="doctor-profile" class="hidden">
                                    <div id="doctor-profile-pic" class="glyphicon glyphicon-user"></div>
                                    <p id="doctor-profile-name"></p>
                                    <p id="doctor-profile-speciality"></p>
                                </div>
                                <div id="doctor-available-times">
                                    <table id="doctor-time-list" class="table table-bordered table-hover">
                                    </table>
                                </div>
                                
                            </div>
                    </div>
                    <div id="step2" class="tab-pane">
                        <div id="online-appointment-patient-select-panel">
                            Have You made appointments before? If so, input your Phone Number or Email : 
                            <br>
                            <table class="florenze-form"><td><input type="tel" id="patient-phone" placeholder="Phone Number"/></td><td>&nbsp;Or&nbsp;</td><td><input type="email" id="patient-email" placeholder="Email"/></td><td><span id="search-patient" class="glyphicon glyphicon-search" aria-hidden="true" data-toggle="popover" data-placement="bottom" data-content="Please Input either Email or Phone"></span></td></table>
                        </div>
                        <div id="online-register-patient">
                            <p id="or-label">Otherwise Fill out your details here:</p>
                            <div class="jumbotron">
                            <form id="online-patient-register-form" class="florenze-form" action="onlineappointment/regPatient" method="GET">

                                <table style="width:100%">
                                    <tr>
                                        <td><input type="text" id="fname" name="fname" placeholder="First Name"/></td>
                                        <td><input type="text" id="lname" name="lname" placeholder="Last Name"/></td>
                                        <td><input type="text" id="nationality" name="nationality" placeholder="Nationality"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="gender" class="gender" value="m" checked/><label class="styled-label">Male</label>
                                            <input type="radio" name="gender" class="gender" value="f" /><label class="styled-label">Female</label>
                                        </td>
                                        <td>Date of birth:</td>
                                        <td><input type="date" id="dob" name="dob"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><input type="text" id="street" name="street" placeholder="Street"/></td>
                                    </tr>
                                    <tr>
                                        <td><input id="city" type="text" name="city" placeholder="city"/></td>
                                        <td>
                                            <select id="state" name="state">
                                                <option value="-1" disabled selected>province</option>
                                                @foreach ($states as $state)
                                                    <option value="{{$state->id}}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="tel" id="phone" name="phone" placeholder="Phone"/></td>
                                        <td colspan="2"><input type="email" id="email" name="email" placeholder="E mail"/></td>
                                    </tr>
                                    <tr>
                                        <td><input class="float-right" type="reset" value="Reset" /> </td>
                                        <td></td>
                                        <td><input type="submit" id="reg-patient" value="Next"></td>
                                    </tr>
                                </table>
                            </form>
                            </div>
                        </div>
                        <div id="online-selected-patient">
                            
                        </div>    
                    </div>
                    <div id="step3" class="tab-pane">
                        <div id="online-appointment-confirm-panel">
                            <div class="col-md-6">
                                {!! app('captcha')->display(); !!}
                            </div>
                        </div>
                        <div class="florenze-form"><input type="submit" id="do-make-appointment" value="Confirm"></div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>




