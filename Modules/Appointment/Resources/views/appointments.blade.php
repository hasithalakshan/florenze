
<div class="section">
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
    <div id="background-filter-green"></div>
    <div id="nav-bar">
        <span class="nav-item glyphicon glyphicon-home" onclick="showHome();"></span>
        <span class="nav-item glyphicon glyphicon-bishop" onclick="showShedule();"></span>
        <span class="nav-item glyphicon glyphicon-tasks" onclick="showAppointments();"></span>
        <span class="nav-item glyphicon glyphicon-calendar" onclick="showProfileUpdate();"></span>
    </div>
    <div>
    <div id="logo"></div>
    <div class="top-menus">
        <a href="#" data-toggle="modal" data-target="#"><span id="reception-topmenu-quickstart" class="glyphicon glyphicon-menu-down"> Appointments </span> </a>
        <a href="reception/logout"><span id="reception-topmenu-logout" class="glyphicon glyphicon-log-out"> Logout</span></a>
    </div>
    <div id="appointment-history" class="florenze-panel">
        <div class="florenze-form">
            <div id="appointment-history-filter-keyword"><input type="text" id="appointment-search-field" onkeyup="setAppointmentsTable()" placeholder="Appointment Search Keyword" onkeyup="showPatients()"/></div>
            <div id="appointment-options-panel">
                <table>
                    <tr>
                        <td>
                            <button class="btn btn-default appointment-filter-option" value="upcome">Upcoming Only</button>
                            <button class="btn btn-default appointment-filter-option" value="payed">Payed Only</button>
                            <button class="btn btn-default appointment-filter-option active" value="all">All</button>
                        </td>
                        <td>
                            &nbsp;&nbsp;Sort By :
                            <select id="appointment-sort-option" class="btn btn-default dropdown">
                                <option value="pfname">Patient First Name</option>
                                <option value="plname">Patient Last Name</option>
                                <option value="dfname">Doctor First Name</option>
                                <option value="dlname">Doctor Last Name</option>
                                <option value="adate">Appointment Date</option>
                                <option value="cdate">Created Date</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <form id="appointment-history-filters">
                <div id="appointment-filter-list">
                    <table>
                        <tr><td>Filter by Patient :</td></tr>
                        <tr><td><input type="checkbox" name="pname" id="pfn" checked><label for="pfn" class="styled-label">First Name</label></td></tr>
                        <tr><td><input type="checkbox" name="pname" id="pln"><label for="pln" class="styled-label">Last Name</label></td></tr>
                        <tr><td><input type="checkbox" id="pph"><label for="pph" class="styled-label">Phone</label></td></tr>
                        <tr><td><br>Filter by Doctor :</td></tr>
                        <tr><td><input type="checkbox" name="dname" id="dfn"><label for="dfn" class="styled-label">First Name</label></td></tr>
                        <tr><td><input type="checkbox" name="dname" id="dln"><label for="dln" class="styled-label">Last Name</label></td></tr>
                        <tr><td><br>Filter by Date :</td></tr>
                        <tr><td><input type="checkbox" id="ad"><label for="ad" class="styled-label">Appointment</label></td></tr>
                        <tr><td><input type="checkbox" id="cd"><label for="cd" class="styled-label">Created</label></td></tr>
                    </table>
                </div>
            </form>
            <div id="appointment-history-result-set">
            <table id="appointment-tuples" class="table table-hover table-bordered table-responsive"></table>
            <ul id="appointment-history-pagination" class="pagination"></ul>
            </div>
        </div>
    </div>
    </div>
    
<div id="appointment-edit-popover-content" class="hidden">
    <div class="popover-heading">
        This doctor available dates and times : 
    </div>
    <table class="popover-body table">
        
    </table>
</div>    
    
    
</div>

<div id="appointment-edit-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <form id="appointment-edit-form" action="appointment/update" method="get">
            <div class="modal-header">
                <div class="florenze-form">
                    <label id="appointment-edit-form-id"></label>
                    <input type="hidden" id="appointment-doctor-id" name="doctor_id"/>
                    <input type="hidden" id="appointment-patient-id" name="patient_id"/>
                    <input type="hidden" id="appointment-edit-id" name="appointment_id"/>
                    <table style="width:100%">
                        <tr>
                            <td><input type="date" id="appointment-edit-date" name="doa" data-placement="bottom" data-toggle="popover" data-popover-content="#appointment-edit-popover-content" data-trigger="focus"/></td>
                            <td><input type="time" id="appointment-edit-time" name="toa"/></td>
                            <td><input type="text" id="appointment-edit-illness" name="illness" placeholder="Illness"/></td>
                        </tr>
                    </table>
                    <table class="compact-table" style="width:100%">
                        <tr>
                            <td>Patient : <label id="appointment-edit-patient-label" class="transparent-gold-button"></label></td>
                            <td><!--<button class="float-left transparent-blue-button">change</button>--></td>
                        </tr>
                        <tr>
                            <td>Doctor : <label id="appointment-edit-doctor-label" class="transparent-gold-button"></label></td>
                            <td><!--<button class="float-left transparent-blue-button">change</button>--></td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                    </table>
                    <label class="float-left">Details of Patient </label>
                    <a id="appointment-patient-edit-button" class="float-right transparent-blue-button">Edit </a>
                </div>
            </div>
                
            <div class="modal-body">
                <div id="appointment-patient-edit-form" class="florenze-form no-edit">
                    <table id="appointment-patient-edit-form-table" style="width:100%">
                        <tr>
                            <td><input type="text" id="appointment-edit-patient-fname" name="fname" placeholder="First Name"/></td>
                            <td><input type="text" id="appointment-edit-patient-lname" name="lname" placeholder="Last Name"/></td>
                            <td><input type="text" id="appointment-edit-patient-nationality" name="nationality" placeholder="Nationality"/></td>
                        </tr>
                        <tr>
                            <td>
                                <label id="appointment-edit-patient-gender-label" class="float-left transparent-gold-button font-12"></label>
                                <input class="appointment-edit-patient-gender" type="radio" name="gender" value="m" /><label class="styled-label">Male</label>
                                <input class="appointment-edit-patient-gender" type="radio" name="gender" value="f" /><label class="styled-label">Female</label>
                            </td>
                            <td><label id="appointment-edit-dob-label" class="float-right light-grey font-12">Date of Birth :</label></td>
                            <td>
                                <input type="date" id="appointment-edit-patient-dob" name="dob"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="text" id="appointment-edit-patient-street" name="street" placeholder="Street"/></td>
                        </tr>
                        <tr>
                            <td><input id="appointment-edit-patient-city" name="city" type="text" placeholder="city"/></td>
                            <td>
                                <select id="appointment-edit-patient-state" name="state">
                                    <option value="-1" disabled selected>province</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" id="appointment-edit-patient-email" name="email" placeholder="E mail"/></td>
                            <td><input type="tel" id="appointment-edit-patient-phone" name="phone" placeholder="Phone"/></td>
                        </tr>
                        <tr>
                            <td><a id="appointment-edit-delete-button" class="float-left transparent-blue-button">Delete</a> </td>
                            <td>&nbsp;</td>
                            <td><input type="submit" id="appointment-edit-save" name="appointment-edit-save" value="Save"></td>
                        </tr>
                    </table>
                    <div id="appointment-patient-readonly-panel">
                        <table style="width:100%">
                            <tr>
                                <td><label class="float-left light-grey font-12">First Name :</label></td>
                                <td><label class="float-left light-grey font-12">Last Name :</label></td>
                                <td><label class="float-left light-grey font-12">Nationality :</label></td>
                            </tr>
                            <tr>
                                <td><label class="float-left light-grey font-12">Gender :</label></td>
                                <td></td>
                                <td><label class="float-left light-grey font-12">Date of Birth :</label></td>
                            </tr>
                            <tr>
                                <td><label class="float-left light-grey font-12">Street :</label></td>
                            </tr>
                            <tr>
                                <td><label class="float-left light-grey font-12">City :</label></td>
                                <td><label class="float-left light-grey font-12">Province :</label></td>
                            </tr>
                            <tr>
                                <td><label class="float-left light-grey font-12">E-mail :</label></td>
                                <td></td>
                                <td><label class="float-left light-grey font-12">Phone No :</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


