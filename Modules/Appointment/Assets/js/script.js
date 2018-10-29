/* 
 * |--------------------------------------------------------------------------
 * | florenze HIS
 * |--------------------------------------------------------------------------
 * |
 * | This is a proud development of ceynocta(pvt) Ltd.
 * | 
 * | Original sources of this product are property of ceynocta(pvt) Ltd
 * | and please maintain this licence header when modify or further develop
 * | this product.
 * 
 */


function getLatestDayForDay(day){
    var days=['mon','tue','wed','thu','fri','sat','sun'];
    day=days.indexOf(day)+1-new Date().getDay();
    console.log(day);
    if(day<0)
        day+=7;
    return day;
}
function setAppointmentDT(content){
    var d=new Date();
    d.setDate(d.getDate()+getLatestDayForDay(content.slice(4,7)));
    console.log(d);
    
    console.log("date="+d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+"&doctor="+$('#appointment-doctor option:selected').val());
    $.get("appointment/getLastForDate?date="+d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+"&doctor="+$('#appointment-doctor option:selected').val(), function(res, status){
        console.log(res);
        var time,app_no;
        if(res=='-1'){
            time=content.slice(15,20);
            if(content.slice(20,22)=='pm')
                time=parseInt(time.slice(0,2))+12+':'+time.slice(3,5);
            app_no=1;
        }
        else{
            time=res.time;
            app_no=res.appointment_no +1;
        }
        
        d.setHours(time.slice(0,2));
        d.setMinutes(time.slice(3,5));
        var appointment_dt=d;
        if(res!='-1')
            var appointment_dt=moment(d).add(10,'m').toDate();
        console.log(appointment_dt);
        
        $("#appointment-date").val(appointment_dt.toISOString().slice(0,10));
        $("#appointment-time").val((appointment_dt.getHours()<10?'0'.concat(appointment_dt.getHours()):appointment_dt.getHours())+":"+(appointment_dt.getMinutes()<10?'0'.concat(appointment_dt.getMinutes()):appointment_dt.getMinutes()));
        //$("#appointment-no").text('Appointment No: '+app_no);
    });
    
    
}

function setEditAppointmentDT(content){
    console.log(content);
    var d=new Date();
    console.log(content.slice(4,14));
    d.setYear(content.slice(4,8));
    d.setMonth(content.slice(9,11)-1);
    d.setDate(content.slice(12,14));
    console.log(d);
    $.get("appointment/getLastForDate?date="+content.slice(4,14)+"&doctor="+$('#appointment-doctor-id').val(), function(res, status){
        console.log(content.slice(28,30));
        var time,app_no;
        if(res=='-1'){
            time=content.slice(23,27);
            if(content.slice(28,30)=='pm')
                time=parseInt(time.slice(0,2))+12+':'+time.slice(3,5);
            app_no=1;
        }
        else{
            time=res.time;
            app_no=res.appointment_no +1;
        }
        
        d.setHours(time.slice(0,2));
        d.setMinutes(time.slice(3,5));
        var appointment_dt=d;
        if(res!='-1')
            var appointment_dt=moment(d).add(10,'m').toDate();
        console.log(appointment_dt);
        
       $("#appointment-edit-date").val(appointment_dt.toISOString().slice(0,10));
       $("#appointment-edit-time").val((appointment_dt.getHours()<10?'0'.concat(appointment_dt.getHours()):appointment_dt.getHours())+":"+(appointment_dt.getMinutes()<10?'0'.concat(appointment_dt.getMinutes()):appointment_dt.getMinutes()));
        //$("#appointment-no").text('Appointment No: '+app_no);
    });
    
    
}

function reloadSlider(){
    $("#doctor-slider").lightSlider({
        item: 3,
        autoWidth: true,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////
 
        speed: 400, //ms'
        auto: false,
        loop: false,
        slideEndAnimation: true,
        pause: 2000,
 
        keyPress: true,
        controls: false,
        prevHtml: '',
        nextHtml: '',
 
        rtl:false,
        adaptiveHeight:true,
 
        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,
 
        thumbItem:10,
        pager: true,
        gallery: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',
 
        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,
 
        responsive : [],
 
        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });
}

function setSlider(data) {
    var inner='<ul id="doctor-slider">';
    for(var i=0; i<data.length; i++ ){
        console.log(data);
        inner=inner.concat("<li onclick='setAppointmentDT(this.innerHTML)'><h5>"+data[i]['day']+"</h4><p>"+data[i]['work_period']['period_start']+" - "+data[i]['work_period']['period_end']+"</p></li>");
    }
    if(data.length>1)
        inner=inner.concat('<li></li>');
    inner=inner.concat('</ul>');
    $("#doctor-slider-container").html(inner);
    reloadSlider();
    
}

function setAppointmentPatient(data){
    $('#sp-id').val(data['patient']['id']);
    var gender= data['gender']=='m'? 'Mr.': 'Ms/Mrs.';
    $('#sp-name').html(gender+' '+data['fname']+' '+data['lname']);
    $('#sp-dob').html('Born: '+data['dob']);
    $('#sp-street').html(data['street']);
    $('#sp-city').html(data['city']);
    $('#sp-reg').html('Registered On: '+data['created_at']);
    $('#selected-patient').removeClass('invisible').fadeIn();
}

function getDoctorTotalAppointments(id){
    var d=new Date();
    d.setMinutes(d.getMinutes()-d.getTimezoneOffset());
    $.get("appointment/getDoctorTotalAppointments?id="+id+'&date='+d.toISOString().slice(0,10), function(res, status){
            console.log(res);
            var tuples="<tr><th>Date</th><th>Current No</th></tr>";
            for(day in res){
                tuples=tuples.concat("<tr><td>"+day+"</td><td>"+res[day]+"</td></tr>");
            }
            $('#sd-details').html(tuples);  
            
            

        });
}

function deleteAppointment(id){
    var yes= confirm('Are you sure want to delete this?');
    if(yes==true){
        $.get("appointment/destroy?&id="+id, function(res, status){
            console.log(res);
            setAppointmentsTable();
        });
    }
}

function setAppointmentEditModal(id){
    $('#appointment-edit-form-id').html('Appointment Id - '+id);
    $.get("appointment/getById?&id="+id, function(res, status){
        //setTimeout(function(){$('#loader').html('<h3>Done !!</h3>');},2000);
        console.log(res);
        
        $('#appointment-doctor-id').val(res[0].doctor.id);
        $('#appointment-patient-id').val(res[0].patient.id);
        $('#appointment-edit-id').val(res[0].id);
        $('#appointment-edit-patient-label').text(res[0].patient.user.fname+' '+res[0].patient.user.lname);
        $('#appointment-edit-doctor-label').text(res[0].doctor.employee.user.fname+' '+res[0].doctor.employee.user.lname);
        
        
        $('#appointment-edit-date').val(res[0].date);
        $('#appointment-edit-time').val(res[0].time);
        $('#appointment-edit-illness').val(res[0].illness);
        $('#appointment-edit-patient-fname').val(res[0].patient.user.fname);
        $('#appointment-edit-patient-lname').val(res[0].patient.user.lname);
        $('#appointment-edit-patient-nationality').val((res[0].patient.nationality==null)?'nationality not known':res[0].patient.nationality);
        $('.appointment-edit-patient-gender').filter('[value='+res[0].patient.user.gender+']').prop('checked',true);
        $('#appointment-edit-patient-gender-label').text((res[0].patient.user.gender=='m')?'male':'female');
        $('#appointment-edit-patient-dob').val(res[0].patient.user.dob);
        $('#appointment-edit-patient-street').val((res[0].patient.user.street==null)?'street not known':res[0].patient.user.street);
        $('#appointment-edit-patient-city').val((res[0].patient.user.city==null)?'city not known':res[0].patient.user.city);
        if(res[0].patient.user.state_id==null)
            $('#appointment-edit-patient-state option[value=-1]').prop("selected",true);
        else
            $('#appointment-edit-patient-state option[value='+res[0].patient.user.state_id+']').prop("selected",true);
        $('#appointment-edit-patient-email').val(res[0].patient.user.emails.length==0?'email not known':res[0].patient.user.emails[0].email);
        $('#appointment-edit-patient-phone').val(res[0].patient.user.telephones.length==0?'phone not known':res[0].patient.user.telephones[0].tel_no);
    });
    if(!$('#appointment-patient-edit-form').hasClass('no-edit')) $('#appointment-patient-edit-form').addClass('no-edit');
}

function setAppointmentsTable(url){
    var q=$('#appointment-search-field').val();
    var filter=$('.appointment-filter-option.active').val();
    var sort=$('#appointment-sort-option :selected').val();
    var url_default="appointment/getAppointments?filter="+filter+"&sort="+sort;
    
    if(url!='null'){
        url=(url==undefined)?url_default:url;
        url=(url=='all')?url_default+"&q=":url+"&filter="+filter+"&sort="+sort+"&q="+q+"&pfn="+($('#pfn').prop('checked')?1:0)+"&pln="+($('#pln').prop('checked')?1:0)+"&pph="+($('#pph').prop('checked')?1:0)+"&dfn="+($('#dfn').prop('checked')?1:0)+"&dln="+($('#dln').prop('checked')?1:0);
        console.log(url);
        
        $.get(url, function(res, status){
            console.log(res);
            var tuples="<tr><th>No</th><th>Date</th><th>Time</th><th>Doctor</th><th>Patient</th><th>Created/Updated</th><th>Payment</th><th>Options</th></tr>";
            
            for(var i=0; i<res.data.length; i++ ){
                var options="<button class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#appointment-edit-modal\" onclick=\"setAppointmentEditModal("+res.data[i].id+");\"><label>edit<\label></button>"+"<button class=\"btn btn-default\" onclick=\"deleteAppointment("+res.data[i].id+");\"><label>delete</label></button>";
                var payment_status=res.data[i].payment_settled=='0'?"No":"Yes";
                tuples=tuples.concat("<tr><td>"+res.data[i].appointment_no+"</td><td>"+res.data[i].date+"</td><td>"+res.data[i].time+"<td>"+res.data[i].dufname+" "+res.data[i].dulname+"</td><td>"+res.data[i].pufname+" "+res.data[i].pulname+"</td><td>"+res.data[i].created_at+"</td><td>"+payment_status+"</td><td>"+options+"</td></tr>");
            }
            $('#appointment-tuples').html(tuples);  
            
            var pages='<li><a onclick="setAppointmentsTable(\''+res.prev_page_url+'\');">\<\<</a></li>';
            //var pagebaseurl=
            if(res.last_page==0) return;
            else if(res.last_page==1)
                pages=pages.concat('<li><a>first</a></li><li class="active"><a>'+res.current_page+'</a></li><li><a>last</a></li><li><a>\>\></a></li>');
            else{
                var pagebaseurl=res.current_page>1?res.prev_page_url.substring(0, res.prev_page_url.length-1):res.next_page_url.substring(0, res.next_page_url.length-1);
                pages=pages.concat('<li><a onclick="setAppointmentsTable(\''+pagebaseurl.concat("1")+'\');">first</a></li>');
                pages=pages.concat('<li class="active"><a>'+res.current_page+'</a></li>');
                pages=pages.concat('<li><a onclick="setAppointmentsTable(\''+pagebaseurl.concat(res.last_page)+'\');">last</a></li>');
                pages=pages.concat('<li><a onclick="setAppointmentsTable(\''+res.next_page_url+'\');">\>\></a></li>');
            }
            $('#appointment-history-pagination').html(pages);
        });
    }
}

function clearSelectedPatient(){
    $('#selected-patient').addClass('invisible').fadeOut();
    $('#sp-id').val('');
    $('#sp-name').html('');
    $('#sp-dob').html('');
    $('#sp-street').html('');
    $('#sp-city').html('');
    $('#sp-reg').html('');
}


function initAppointmentQuickStartEvents(){
    $('#appointment-filter-list input[type="checkbox"]').on('change', function() {
        if(this.id==="pph" || this.id==="ad" || this.id==="cd"){
            $('input[type="checkbox"]').not(this).prop('checked', false);   
        }else{
            $('input[type="checkbox"]').not('input[name="' + this.name + '"]').prop('checked', false);   
        }
        setAppointmentsTable();
    });
    $('#appointment-sort-option').on('change', function() {
        setAppointmentsTable();
    });
    $('.appointment-filter-option').click(function() {
        $('.appointment-filter-option').not(this).removeClass('active');
        $(this).addClass('active');
        setAppointmentsTable();
    });
    $('#appointment-doctor').change(function(){
        var doctor= $('#appointment-doctor option:selected').val();
        
        $('#doctor-slider-container').html('');
        $("#appointment-date").val('');
        $("#appointment-time").val('');
        $.get("appointment/search?doctor="+doctor, function(res, status){

            setSlider(res);
            //alert("Data: " + res['doctor_work_periods'] + "\nStatus: " + status); console.log(data);
        }); 
    });
    $('#appointment-patient-edit-button').click(function(){
        $('#appointment-patient-edit-form').removeClass('no-edit');
    });
    $('#new-patient').click(function(){
        closeReceptionPanels();
        $('#patientreg').removeClass('invisible').fadeIn();
    });
    $('#select-patient').click(function(){
        closeReceptionPanels();
        $('#patientselect').removeClass('invisible').fadeIn();
    });
    $('.appointment-close').click(function(){
        $('#appointment').fadeOut();
        $('#rc-appointment').toggleClass('active');
    });
    $('#clear-selected-patient').click(function(){
        clearSelectedPatient();
    });
    $('#appointment-edit-date').on('mouseover', function() {
        $.get("appointment/search?doctor="+$('#appointment-doctor-id').val(), function(data){
            var inner='';            
            for(var i=0; i<data.length; i++ ){
                var d=new Date();
                d.setDate(d.getDate()+getLatestDayForDay(data[i]['day']));
                d.setMinutes(d.getMinutes()-d.getTimezoneOffset());
                inner=inner.concat("<tr style='cursor: pointer;' onclick='setEditAppointmentDT(this.innerHTML)'><td>"+d.toISOString().slice(0,10)+"</td><td>"+data[i]['work_period']['period_start']+" - "+data[i]['work_period']['period_end']+"</td></tr>");
            }
            $("#appointment-edit-popover-content .popover-body").html(inner);
        }); 
        $(this).popover({
            html:true,
            content: function(){
                var content=$(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
            },
            title:function(){
                var title=$(this).attr("data-popover-content");
                return $(title).children(".popover-heading").html();
            }
        });
    });
    $('#appointment-edit-delete-button').click(function(){
        deleteAppointment($('#appointment-edit-id').val());
    });
}

function initAppointmentPageLayout(){
    $('#patientselect').fadeOut();
    $('#patientreg').fadeOut();
    
    $('#appointment-doctor').select2({
        placeholder: "Select a Doctor"
    });
    $('b[role="presentation"]').hide();
    $('.select2-selection__arrow').append('<span class="glyphicon glyphicon-search"></span>');

    $("#doctor-slider-container").html('<label id="appointment-date-time-label">Date for New Appointment:</label><label id="appointment-date-time-label">Time for New Appointment:</label>');

    $.ajaxSetup({async: false});
    setAppointmentsTable('all');
    $.ajaxSetup({async: true});
}


function initAppointmentFormSubmitters(){
    $('#appointment-edit-form').validate({
        rules: {
            date: "required",
            time: "required",
            fname: "required",
            lname: "required",
            email: {
                required: false,
                email: true
            },
        },
        messages: {
            fname: "Please enter firstname",
            lname: "Please enter lastname",
            dob: "Please enter B'date",
            email: "Please enter a valid email address",
        },
        submitHandler: function(form){
            console.log('ready for submit');
            
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                    window.alert("update success, new appointment no: "+res.appointment_no);
                }
            });
        }
    });
    $('#appointment-basics').validate({
        ignore: [],
        rules: {
            doctor: "required",
            toa: "required",
            doa: "required",
            patient: "required",
        },
        messages: {
            doctor: "",
            toa: "",
            doa: "",
            patient: "",
            
        },
        submitHandler: function(form){
            console.log('ready for submit');
            
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                    //setTimeout(function(){$('#loader').html('<h3>Done !!</h3>');},2000);
                    console.log(res);
                    clearSelectedPatient();
                    register_local_notification("Appointment Added success !!</br> Appointment No: "+res.appointment.appointment_no+" (reference:"+res.appointment.id+")");
                    $('#appointment-doctor').val(null).trigger('change');
                    setTimeout(function(){
                        $("#doctor-slider-container").html('<label id="appointment-date-time-label">Date for New Appointment:</label><label id="appointment-date-time-label">Time for New Appointment:</label>');
                    },1000);
                }
            });
                    
            
        }
    });
    
    
}


$(document).ready(function() {
    
    initAppointmentPageLayout();
    initAppointmentQuickStartEvents();
    initAppointmentFormSubmitters();
    
});
