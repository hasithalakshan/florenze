
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
    <div id="background-filter-blue"></div>
    <div id="nav-bar">
        <span class="nav-item glyphicon glyphicon-home" onclick="showHome();"></span>
        <span class="nav-item glyphicon glyphicon-bishop" onclick="showShedule();"></span>
        <span class="nav-item glyphicon glyphicon-tasks" onclick="showAppointments();"></span>
        <span class="nav-item glyphicon glyphicon-calendar" onclick="showProfileUpdate();"></span>
    </div>
    <div>
    <div id="logo"></div>
    <div class="top-menus">
        <a href="#" data-toggle="modal" data-target="#"><span id="reception-topmenu-quickstart" class="glyphicon glyphicon-menu-down"> Shedule </span> </a>
        <a href="reception/logout"><span id="reception-topmenu-logout" class="glyphicon glyphicon-log-out"> Logout</span></a>
    </div>
    </div>
    <div id="reception-shedule" class=" ">
        <span class="glyphicon glyphicon-remove panel-close"></span>

        <ul class="nav nav-tabs">
            <li class="active"><a class="reception-shedule-header" data-toggle="tab" href="#todays-doc-shedule">Today's Doctor Shedule</a></li>
            <li><a class="reception-shedule-header" data-toggle="tab" href="#find-doc">Find Doctor</a></li>
        </ul>

        <div class="tab-content">
            <div id="todays-doc-shedule" class="tab-pane fade  in active">
                <div id="doc-shedule-container">
                    <div id="doc-shedule-top-container">
                        <div class="calendar-container">
                            <header>
                                <div class="day" id="rs-day"></div>
                                <div class="month" id="rs-month"></div>
                            </header>
                            <div id="calender-body"></div>
                            <div class="ring-left"></div>
                            <div class="ring-right"></div>
                        </div>
                    </div>
                    <div id="general-doctor-container"></div>
                    <div id="specialist-doctor-container"></div>
                </div>
                    

            </div>
            <div id="find-doc" class="tab-pane fade">
                <div class="florenze-form" id="doc-filter-keyword-holder"><input type="text" id="doc-filter-keyword" onkeyup="setDoctorsTable();" placeholder="Doctor Search Keyword"/></div>
                <table id="doctor-sort-panel" >
                    <tr>
                        <td>
                            &nbsp;&nbsp;Sort By :
                            <select id="doctor-sort-option" class="btn btn-default dropdown" onchange="setDoctorsTable();">
                                <option value="dfname">First Name</option>
                                <option value="dlname">Last Name</option>
                                <option value="dsp">Speciality</option>
                            </select>
                        </td>
                    </tr>
                </table>
                
                <div id="doc-filter-container">
                    <table>
                        <tr><td><br>Filter by Name :</td></tr>
                        <tr><td><input type="checkbox" name="dname" id="dfirst" checked=""><label for="dfirst" class="styled-label">First Name</label></td></tr>
                        <tr><td><input type="checkbox" name="dname" id="dlast"><label for="dlast" class="styled-label">Last Name</label></td></tr>
                        <tr><td><br>Filter by Speciality :</td></tr>
                        <tr><td><input type="checkbox" id="dspeciality"><label for="demail" class="styled-label">Speciality</label></td></tr>
                    </table>
                </div>
                <div id="doc-list-container">
                    <table id="doc-list-table" class="table table-hover"></table>
                </div>
            </div>
        </div>
        
        <div id="sd-profile">
            <div id="sd-border-patch"></div>
            <div id="sd-profile-container">
                <div id="sd-profile-basics">
                    <p id="sd-profile-name"></p>
                    <p id="sd-profile-speciality"></p>
                </div>
                <div id="sd-profile-image"></div>
                <div id="sd-details-holder"><table class="table" id="sd-details"></table></div>
                
            </div>
        </div>

    </div>
</div>