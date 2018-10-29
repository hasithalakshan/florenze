
@extends('reception::layouts.master')

@section('content')


    <div id="fullpage">
        <div class="section active">
            <div id="welcome-carousel" class="carousel fade" data-ride="carousel"  data-interval="10000" data-pause="false">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div id="bg1"></div>
                    </div>
                    <div class="item">
                        <div id="bg2"></div>
                    </div>
                </div>
            </div>
            <div id="background-filter-red"></div>
            <div id="nav-bar">
                <span class="nav-item glyphicon glyphicon-home" onclick="showHome();"></span>
                <span class="nav-item glyphicon glyphicon-bishop" onclick="showShedule();"></span>
                <span class="nav-item glyphicon glyphicon-tasks" onclick="showAppointments();"></span>
                <span class="nav-item glyphicon glyphicon-calendar" onclick="showProfileUpdate();"></span>
            </div>
            <div>
            <div id="logo"></div>
            <div class="top-menus">
                <a href="#" data-toggle="modal" data-target="#"><span id="reception-topmenu-quickstart" class="glyphicon glyphicon-menu-down"> Quick Start </span> </a>
                <a href="reception/logout"><span id="reception-topmenu-logout" class="glyphicon glyphicon-log-out"> Logout</span></a>
            </div>
            
            <div id="notification-panel">
                <span class="glyphicon glyphicon-remove panel-close"></span>
                    <section class="timeline">
                        <ul id="notification-list">
                            <li id="notification-clock">
                                <div class="timeline-div">
                                    <time>Now</time>
                                    <div id="clock-container">
                                        <div id="clock" class="light">
                                        <div class="display">
                                            <div class="weekdays"></div>
                                            <div class="ampm"></div>
                                            <div class="digits"></div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="timeline-delete">
                            </li>
                          

                          <!-- more list items here -->
                        </ul>
                    </section>
                <span id="todays-date"></span>
            </div>
            
            <div id="appointment">
                @if (View::exists('appointment::reception_appointment')) @include('appointment::reception_appointment') @endif
            </div>
            
            <div id="quickstart" class="florenze-panel reception-panel">
                <span class="glyphicon glyphicon-remove panel-close"></span>
                <h3 class="form-header">Quick Start</h3>
                <div id="quickstart-body">
                    <div id="rprofile">
                        
                            @if(!empty($profile_pic))
                                <div id="rprofile-pic" style="background: url(profile_images/{{$profile_pic}}); background-size: cover;"></div>
                            @else 
                                <div id="rprofile-pic" class="glyphicon glyphicon-user" style="background: rgba(0, 0, 0, 0.3);padding-top: 15px;" ></div>
                            @endif
                                
                        <span>{{$user->fname}} {{$user->lname}}</span>
                        
                    </div>
                    <div id="rcontrollers">
                        <div id="rc-appointment" class="rcontrol glyphicon glyphicon-tasks active" data-toggle="tooltip" title="Appointment" data-placement="bottom"></div>
                        <div id="rc-refresh" class="rcontrol glyphicon glyphicon-refresh" data-toggle="tooltip" title="Refresh" data-placement="bottom"></div>
                        <div id="rc-new-patient" class="rcontrol glyphicon glyphicon-plus" data-toggle="tooltip" title="Add New Patient" data-placement="bottom"></div>
                        <div id="rc-notification" class="rcontrol glyphicon glyphicon-bell active" data-toggle="tooltip" title="Notification Panel" data-placement="bottom"></div>
                        <div id="" class="rcontrol glyphicon " data-toggle="tooltip" title="" data-placement="bottom"></div>
                        
                    </div>
                    <div id="rqs-footer">
                        <select id="quick-option" placeholder="aaaa">
                            <option>Select a Quick Option</option>
                            <option value="1">View Previous Appointments</option>
                            <option value="2">Doctor Management</option>
                            <option value="3">Log Out</option>
                        </select>
                        <span id="rqs-footer-buttton">GO</span>
                    </div>
                </div>
            </div>

            <div id="patientreg" class="invisible florenze-panel reception-panel">
                <span class="glyphicon glyphicon-remove panel-close"></span>
                <div class="florenze-form">
                    <h3 class="form-header">New Patient Register</h3>
                    <form id="patient-register-form" action="reception/store" method="GET">
                    <table style="width:100%">
                        <tr>
                            <td><input type="text" id="fname" name="fname" placeholder="First Name"/></td>
                            <td><input type="text" id="lname" name="lname" placeholder="Last Name"/></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="gender" class="gender" value="m" checked/><label class="styled-label">Male</label>
                                <input type="radio" name="gender" class="gender" value="f" /><label class="styled-label">Female</label>
                            </td>
                            <td>
                                <input type="date" id="dob" name="dob"/>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" id="nationality" name="nationality" placeholder="Nationality"/></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" id="street" name="street" placeholder="Street"/></td>
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
                            <td colspan="2"><input type="email" id="email" name="email" placeholder="E mail"/></td>
                        </tr>
                        <tr>
                            <td><input type="tel" id="phone" name="phone" placeholder="Phone"/></td>
                        </tr>
                        <tr>
                            <td><input class="float-right" type="reset" value="Reset" /> </td>
                            <td><input type="submit" id="reg-patient" value="Confirm"></td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
            
            <div id="patientselect" class="invisible florenze-panel reception-panel">
                <span class="glyphicon glyphicon-remove panel-close"></span>
                <div class="florenze-form">
                    <h3 class="form-header">Select Patient</h3>
                    <form>
                        <input type="text" id="reception-search-field" placeholder="Search" onkeyup="showPatients()"/>
                        <div id="search-filters">
                            <table>
                                <tr><td><label>&nbsp;&nbsp;&nbsp;Filter by :</label></td></tr>
                                <tr><td><input type="checkbox" name="pname" id="fn" checked><label for="fn" class="styled-label">First Name</label></td></tr>
                                <tr><td><input type="checkbox" name="pname" id="ln"><label for="ln" class="styled-label">Last Name</label></td></tr>
                                <tr><td><input type="checkbox" id="ph"><label for="ph" class="styled-label">Phone No</label></td></tr>
                                
                            </table>
                        </div>
                        <div id="patient-search-result-set">
                        </div>
                        <div id="search-footer"><input class="float-left" type="reset" value="Reset" /> Not Found? Add New Patient</div>
                    </form>
                </div>
            </div>
            
            
            <div id="loader"></div>
                    
        </div>
        </div>
        
        @if (View::exists('reception::shedule')) @include('reception::shedule') @endif
        @if (View::exists('appointment::appointments')) @include('appointment::appointments') @endif
        
        <div class="section">
            <div id="nav-bar">
                <span class="nav-item glyphicon glyphicon-home" onclick="showHome();"></span>
                <span class="nav-item glyphicon glyphicon-bishop" onclick="showShedule();"></span>
                <span class="nav-item glyphicon glyphicon-tasks" onclick="showAppointments();"></span>
                <span class="nav-item glyphicon glyphicon-calendar" onclick="showProfileUpdate();"></span>
            </div>
            <div>
            <div id="logo"></div>
            <div id="welcome-carousel" class="carousel fade" data-ride="carousel"  data-interval="10000" data-pause="false">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div id="bg1"></div>
                    </div>
                    <div class="item">
                        <div id="bg2"></div>
                    </div>
                </div>
            </div>
            <div class="top-menus">
                <a href="#" data-toggle="modal" data-target="#"><span id="reception-topmenu-quickstart" class="glyphicon glyphicon-menu-down"> Quick Start </span> </a>
                <a href="reception/logout"><span id="reception-topmenu-logout" class="glyphicon glyphicon-log-out"> Logout</span></a>
            </div>
            <div id="profile-main-container" class="florenze-panel reception-panel">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <form class="form single-dropzone" id="profile_picture_panel" action="{{ url('reception/updateProfilePic') }}" enctype="multipart/form-data" method="POST">                   
                                {{ csrf_field() }}        
                                 
                                <button id="upload-submit"><i class="fa fa-upload"></i> Upload Picture</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form class="florenze-form" id="pass-reset-form" action='reception/resetPassword' method='GET'>
                                    <table>
						<tr>
							
							<td><input id="email" name="email" type="text" placeholder="E-mail" size="20" maxlength="30" placeholder="@gmail.com"/></td>
						</tr>
						<tr>
							
							<td><input id="CurrentPassword" name="CurrentPassword" placeholder="Current Password" type="password" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							
							<td><input id="NewPassword" name="NewPassword" type="password" placeholder="New Password" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							
							<td><input id="ConfirmPassword" name="ConfirmPassword" type="password" placeholder="Confirm Password" size="20" maxlength="20" />
							</td>
						</tr>
                                                    
				

						<tr>
							
							<td><input type="submit" class="btn btn-default btn-md"></td><br/><br/>
						</tr>
					</table>
				</form>     
                        </td>
                    </tr>
                </table>
                
                
                
            </div>

        </div>
    </div>

@stop
