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


var doctor_id=null;
var year=null;
var month=null;
var day=null;
var patient_id=null;

function filterTo12(time){
    var h=time.slice(0,2),m=time.slice(3,5),p='am';
    if(h>12){
        h=h-12;
        p='pm';
        if(h<10)
            h='0'+h;
    }
    return h+':'+m+p;
}
function getDateForDay(day){
    var days=['MON','TUE','WED','THU','FRI','SAT','SUN']
    var d=new Date();
    day=days.indexOf(day)-d.getDay()+1;
    if(day<0)
        day+=7;
    d.setDate(d.getDate()+day);
    return d.toISOString().slice(0,10);
}

function setAppointmentDT(doctor,year,month,day){
    $('#online-appointment-nav-tabs a[href="#step2"]').tab('show');
    
    this.doctor_id=doctor;
    this.year=year;
    this.month=month;
    this.day=day;
    
    $('#online-appointment-nav-tabs li').filter('.active').find('a[data-toggle]').each(function(){
        $(this).attr("data-toggle","tab");
    });
    
    
    console.log(this.doctor_id+" "+this.year+" "+this.month+" "+this.day+" "+this.patient_id);
}
function setAppointmentPatient(patient){
    $('#online-appointment-nav-tabs a[href="#step3"]').tab('show');
    
    this.patient_id=patient;
    
    $('#online-appointment-nav-tabs li').filter('.active').find('a[data-toggle]').each(function(){
        $(this).attr("data-toggle","tab");
    });
    
    console.log(this.doctor_id+" "+this.year+" "+this.month+" "+this.day+" "+this.patient_id);
}

function initOnlineAppointmentPageLayout(){
    $('#online-appointment-doctor').select2({
        placeholder: "Select a Doctor"
    });
    $('body').on('show.bs.modal',function(){
        if($('body').innerHeight()>$(window).height()){
            $('body').css('margin-right','0px');
        }
    });
}

function toggleRegisterWindow() {
    console.log('clicked');
    $('#online-selected-patient').hide();
    $('#online-register-patient').show();

}

function initOnlineAppointmentQuickStartEvents(){
    $('#online-selected-patient').hide();
    
    $('#search-patient').click(function() {
        $('#online-selected-patient').html('');
        var email=$('#patient-email').val();
        var phone=$('#patient-phone').val();
        if(email=='' && phone==''){
            $('#search-patient').popover('show');
            return;
        }else{
            $.get("onlineappointment/findPatient?email="+email+"&phone="+phone, function(res, status){
                console.log(res);
                if(res.user!=null){
                    var inner='<mark>Are you <strong>'+res.user.fname+' '+res.user.lname+'</strong> from '+res.user.street+' '+res.user.city+'?</mark><br>';
                    if(res.security_question_id !=null){
                        inner=inner.concat('<p>Please answer the following security question that you have set first time You made an Appointment :</p>');
                        inner=inner.concat('<div class="jumbotron"><p>Question : '+res.security_question.question+'</p></div>');
                        inner=inner.concat('<table class="florenze-form"><tr><td><p>Your Answer : </p></td><td><input type="text"/></td><td><input type="submit" id="check-select-patient" value="Next"></td></tr></table>');
                    }else{
                        
                        inner=inner.concat('<div class="jumbotron" id="patient-details-jumbotron"><table><tr><td><p>First Name : </p></td><td>'+res.user.fname+'</td></tr><tr><td><p>Last Name : </p></td><td>'+res.user.lname+'</td></tr><tr><td><p>Gender : </p></td><td>'+(res.user.gender=='m'?'male':'female')+'</td></tr><tr><td><p>Nationality : </p></td><td>'+res.nationality+'</td></tr><tr><td><p>Birth Day : </p></td><td>'+res.user.dob+'</td></tr></table></div>');
                        inner=inner.concat('<input type="submit" id="set-select-patient" onclick="setAppointmentPatient('+res.id+')" value="Conform My Details"/><br><br>');
                    }
                    
                    inner=inner.concat('<p>Is this Not your account? <a id="reg-as-new-patient" onclick="toggleRegisterWindow()">Register as New Patient</a></p>');
                    
                    $('#online-selected-patient').html(inner);
                }else{
                    var inner='<mark>No results Found</mark>';
                    inner=inner.concat('<p>Couldn\'t find your account? <a id="reg-as-new-patient" onclick="toggleRegisterWindow()">Register as New Patient</a></p>');
                    $('#online-selected-patient').html(inner);
                }
            });
        }
        $('#online-register-patient').hide();
        $('#online-selected-patient').show();
    });
    
    
    $('#do-make-appointment').click(function() {
        $.get("onlineappointment/store?payment_method=manual&doctor="+doctor_id+"&patient="+patient_id+"&date="+year+"-"+month+"-"+day, function(res, status){
            window.print('success');
            console.log(res);
            
        });
    });
    
    $('#search-doctor').click(function() {
        var doctor= $('#online-appointment-doctor option:selected').val();
        if(doctor==''){
            $('#search-doctor').popover('show');
            return;
        }
        $('#search-doctor').popover('destroy');
        var inner='<tr><th><p>Day</p></th><th><p>Available Time</p></th><th><p>Book on this Day</p></th></tr>';
        $.get("onlineappointment/search?doctor="+doctor, function(data, status){
            console.log(data);
            var inner='<ul id="doctor-slider">';
            
            for(var i=0; i<data.length; i++ ){
                //console.log(data);
                //console.log(data[i]['id'].slice(0,3));
                //console.log(data[i]['id'].slice(3,4));
                //console.log(period_start[data[i]['id'].slice(3,4)]);
                //inner=inner.concat("<li onclick='setAppointmentDT(this.innerHTML)'><h5>"+data[i]['id'].slice(0,3)+"</h4><p>"++" - "++"</p></li>");
                
                var date= new Date(getDateForDay(data[i]['day']));
                inner=inner.concat('<tr><td><input type="text" readonly="readonly" style="border:none;width:80px;" value="'+date.toISOString().slice(0,10)+'"/> ('+data[i]['day']+')</td><td>from '+data[i]['work_period']['period_start']+' to '+data[i]['work_period']['period_end']+'</td><td><button class="" onclick="setAppointmentDT('+doctor+','+date.getFullYear()+','+(date.getMonth()+1)+','+date.getDate()+');">Book Now</button></td></tr>');
            }
            
            $('#doctor-profile').removeClass('hidden');
            /*
            if(res['employee']['profile_pic']!=null){
                $('#doctor-profile-pic').removeClass('glyphicon')
                $('#doctor-profile-pic').css({background:'url(/florenze/public/images/florenze-logo.png)'});
            }else{
                if(!$('#doctor-profile-pic').hasClass('glyphicon'))
                    $('#doctor-profile-pic').addClass('glyphicon');
            }
            $('#doctor-profile-name').html((res['employee']['user']['gender']=='m'?'Mr.':'Mrs/Ms.')+res['employee']['user']['fname']+" "+res['employee']['user']['lname']);
            $('#doctor-profile-speciality').html(res['speciality']);*/
            $('#doctor-time-list').html(inner);
        });
    });
}


function initOnlineAppointmentFormSubmitters(){
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#online-patient-register-form').validate({
        rules: {
            fname: "required",
            lname: "required",
            dob: "required",
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
                    console.log(res);
                    $(form)[0].reset();
                    setAppointmentPatient(res['patient']['id']);
                }
            });
        }
    });
}    
    



$(document).ready(function() {
    
    initOnlineAppointmentPageLayout();
    initOnlineAppointmentQuickStartEvents();
    initOnlineAppointmentFormSubmitters();
    
});
