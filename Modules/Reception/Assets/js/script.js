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

function showHome(){
    $('#fullpage .section').eq(1).fadeOut(0);
    $('#fullpage .section').eq(2).fadeOut(0);
    $('#fullpage .section').eq(3).fadeOut(0);
    $('#fullpage .section').eq(0).fadeIn(400);
}
function showShedule(){
    $('#fullpage .section').eq(0).fadeOut(0);
    $('#fullpage .section').eq(2).fadeOut(0);
    $('#fullpage .section').eq(3).fadeOut(0);
    $('#fullpage .section').eq(1).fadeIn(400);
}
function showAppointments(){
    $('#fullpage .section').eq(0).fadeOut(0);
    $('#fullpage .section').eq(1).fadeOut(0);
    $('#fullpage .section').eq(3).fadeOut(0);
    $('#fullpage .section').eq(2).fadeIn(400);
}
function showProfileUpdate(){
    $('#fullpage .section').eq(0).fadeOut(0);
    $('#fullpage .section').eq(1).fadeOut(0);
    $('#fullpage .section').eq(2).fadeOut(0);
    $('#fullpage .section').eq(3).fadeIn(400);
}

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

function setDoctorDetailView(id){
    $.get('reception/getDoctorById?id='+id, function(res, status){
        console.log(res);
        var pre=res.employee.user.gender=='m'?'Mr':'Ms/Mrs';
        $('#sd-profile-name').text(pre+'.'+ res.employee.user.fname+' '+res.employee.user.lname);  
        $('#sd-profile-speciality').text(res.speciality);  
        if(res.employee.profile_pic!=null)
            $('#sd-profile-image').css('background','url(profile_images/'+res.employee.profile_pic+')');  
        else
            $('#sd-profile-image').css('background','white');  
        if(typeof getDoctorTotalAppointments == 'function'){
            getDoctorTotalAppointments(id);

        };

    });
        
}

function setDoctorsTable(){
    var q=$('#doc-filter-keyword').val();
    var sort=$('#doctor-sort-option :selected').val();
    
       
        url="reception/searchDoctor?q="+q+"&sort="+sort+"&dfirst="+($('#dfirst').prop('checked')?1:0)+"&dlast="+($('#dlast').prop('checked')?1:0)+"&dspeciality="+($('#dspeciality').prop('checked')?1:0);
        console.log(url);
        
        $.get(url, function(res, status){
            console.log(res);
            
            var tuples="<tr><th>Doctor Id</th><th>Doctor Name</th><th>Speciality</th><th>Appointment Price</th><th></th></tr>";
            
            for(var i=0; i<res.length; i++ ){
                var pre=res[i].gender=='m'?'Mr':'Ms/Mrs';
                tuples=tuples.concat("<tr onclick=\"setDoctorDetailView("+res[i].id+");\"><td>"+res[i].id+"</td><td>"+ pre+". "+res[i].fname+" "+res[i].lname+"</td><td>"+res[i].speciality+"</td><td>"+res[i].appointment_price+"<td></tr>");
            }
            $('#doc-list-table').html(tuples);  
            
            
        });
}


function setTodaysDoctorShedule(){
    var date=new Date();
    var days=['','mon','tue','wed','thu','fri','sat','sun'];
    var months=['','January','February','March','April','May','June','Jule','August','September','October','November','December'];
    var day=days[date.getDay()];
    
    $('#rs-day').text(date.getDate());
    $('#rs-month').text(months[date.getMonth()]);
    $('#calender-body').text(days[date.getDay()]+"day");
    
    $.get("reception/getDoctorsByDay?day="+day, function(data, status){
        console.log(data);
        
        var general='<h4 class="shedule-headline">General Doctors</h4>';
        var special='<h4 class="shedule-headline">Specialized Doctors</h4>';
        
        for(var i=0; i<data.length; i++ ){
            var pre=data[i].doctor.employee.user.gender=='m'?'Mr':'Ms/Mrs';
            if(data[i].doctor.speciality=="general" || data[i].doctor.speciality=="dentist")
                general=general.concat('<div onclick=\"setDoctorDetailView('+data[i].doctor.id+');\" class="reception-shedule-doctor"><h5 class="sd-name">'+pre+' '+data[i].doctor.employee.user.fname+' '+data[i].doctor.employee.user.lname+'</h5><p class="sd-speciality">'+data[i].doctor.speciality+'</p><p class="sd-time">'+data[i].work_period.period_start+' to '+data[i].work_period.period_end+'</p></div>');
            else
                special=special.concat('<div onclick=\"setDoctorDetailView('+data[i].doctor.id+');\" class="reception-shedule-doctor"><h5 class="sd-name">'+pre+' '+data[i].doctor.employee.user.fname+' '+data[i].doctor.employee.user.lname+'</h5><p class="sd-speciality">'+data[i].doctor.speciality+'</p><p class="sd-time">'+data[i].work_period.period_start+' to '+data[i].work_period.period_end+'</p></div>');
        }
        
        $('#general-doctor-container').html(general);
        $('#specialist-doctor-container').html(special);

    });
}

function getPatientDetails(id){
    $.get("reception/getPatientByUserId?user_id="+id, function(res, status){
        console.log(res);
        if(typeof setAppointmentPatient == 'function'){
            setAppointmentPatient(res);
        };
    });
}

function showPatients(){
    var q=$('#reception-search-field').val();
    if (q.length==0) { 
        $("#patient-search-result-set").html("");
        return;
    }
    $.get("reception/searchPatient?q="+q+"&fn="+$('#fn').prop('checked')+"&ln="+$('#ln').prop('checked')+"&ph="+$('#ph').prop('checked'), function(res, status){
        
        var data = JSON.parse(res);
        //console.log(data);
        if(data.length===0){
            $("#patient-search-result-set").html("<p>No Result Found</p>");
            return;
        }
        var inner='';
        for(var i=0; i<data.length; i++ ){
            inner=inner.concat("<div onclick='getPatientDetails("+data[i]['id']+")'>"+data[i]['fname']+" "+data[i]['lname']+"</div>");
        }
        $("#patient-search-result-set").html(inner);
    });
}

function closeReceptionPanels(){
    $('.reception-panel').addClass('invisible').fadeOut();
}

function rcTurnOff(x){
    console.log(x);
    if(x=='notification-panel')
        $('#rc-notification').toggleClass('active');
    else if(x=='patientreg')
        $('#rc-new-patient').toggleClass('active');
}

function profileImageSubmitter(){
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });

  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
    		$("input[name='title']").val('');
    		alert('Image Upload Successfully.');
    	}else{
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( response.responseJSON.error, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
    	}
    }
  };
}

function initReceptionFormSubmitters(){
    
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#pass-reset-form').validate({
        rules: {
            email:{
				required: true,
				email: true
			},
            CurrentPassword:{
				required:true,
				minlength:5
			} ,
			NewPassword:{
				required:true,
				minlength:5
			}, 
			ConfirmPassword:{
				required: true,
				equalTo:"#NewPassword",
				minlength:5
			} 
			
        },
       messages: {
            email: "Please enter valid email",
            CurrentPassword: "Please enter valid password",
			NewPassword: "Please enter valid password",
			ConfirmPassword: "Please enter valid password"
			
        },
        submitHandler: function(form){
            console.log($(form).serialize());
			
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    $('#pass-reset-form')[0].reset();
					window.alert(res);
                    
                }
            });
        }
    });

    
    $('#patient-register-form').validate({
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
            $('#patientreg').addClass('invisible').fadeOut();
            $('#quickstart').removeClass('invisible').fadeIn();
            $('#loader').html('<img src="images/loading.gif" id="load"/>');
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize()+"&receptionist="+1,
                dataType: 'json',
                success: function(res){
                    setTimeout(function(){$('#loader').html('');},2000);
                    console.log(res);
                    $('#patient-register-form')[0].reset();
                    
                    register_local_notification("Patient Added Success");
                    //if appointment exist, set last added patient to it
                    if(typeof setAppointmentPatient == 'function'){
                        setAppointmentPatient(res);
                    };
                }
            });
        }
    });
    
    
    
    
    
    
    
    /*
    $('#update-reception-form').validate({
        
        rules: {
            image: "required",
            
        },
        messages: {
            image: "Please select a profile image",
            
        },
        submitHandler: function(form){
            console.log('ready for submit');
            //new FormData($(form)[0])
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                    
                    console.log(res);
                    $(form)[0].reset();
                    
                }
            }); 
        }
        
    });*/
    
}

function initReceptionQuickStartEvents(){
    $('#rc-notification').click(function(){
        if($(this).hasClass('active')){
            $('#notification-panel').fadeOut();
        }else{
            $('#notification-panel').fadeIn();
        }
        $(this).toggleClass('active');
    });
    $('#rc-appointment').click(function(){
        if($(this).hasClass('active')){
            $('#appointment').fadeOut();
        }else{
            $('#appointment').fadeIn();
        }
        $(this).toggleClass('active');
    });
    $('#rc-new-patient').click(function(){
        if($(this).hasClass('active')){
            $('#patientreg').addClass('invisible').fadeOut();
        }else{
            closeReceptionPanels();
            $('#patientreg').removeClass('invisible').fadeIn();
        }
        $(this).toggleClass('active');
    });
    $('.panel-close').click(function(){
        $(this).parent().fadeOut();
        rcTurnOff($(this).parent().attr('id'));
            
    });
    $('#rqs-footer-buttton').click(function(){
        var option=$("#quick-option option:selected").val();
        if(option=='1')
            showAppointments();
        else if(option=='2')
            showShedule();
        else if(option=='3'){
            $.get('reception/logout',function(res){
                window.location=window.location;
            });
        }      
    });
    $('#rc-refresh').click(function(){
        window.location=window.location;    
    });
    $('#reception-topmenu-quickstart').click(function(){
        closeReceptionPanels();
        $('#quickstart').removeClass('invisible').fadeIn();
        if($('#rc-new-patient').hasClass('active'))
            $('#rc-new-patient').removeClass('active');
    });
    $('#search-filters input[type="checkbox"]').on('change', function() {
        if(this.id==="ph"){
            $('input[type="checkbox"]').not(this).prop('checked', false);   
        }else{
            $('input[type="checkbox"]').not('input[name="' + this.name + '"]').prop('checked', false);   
        }
        showPatients();
    });
    $('#doc-filter-container input[type="checkbox"]').on('change', function() {
        if(this.id==="dspeciality"){
            $('input[type="checkbox"]').not(this).prop('checked', false);   
        }else{
            $('input[type="checkbox"]').not('input[name="' + this.name + '"]').prop('checked', false);   
        }
        setDoctorsTable();
    });
    
    
}

function setDropzone(){
     Dropzone.options.myDropzone = {
    uploadMultiple: false,
    // previewTemplate: '',
    addRemoveLinks: false,
    // maxFiles: 1,
    dictDefaultMessage: '',
    init: function() {
      this.on("addedfile", function(file) {
         console.log('addedfile...');
      });
      this.on("thumbnail", function(file, dataUrl) {
         console.log('thumbnail...');
        //$('.dz-image-preview').hide();
        //$('.dz-file-preview').hide();
      });
      this.on("success", function(file, res) {
        console.log('upload success...');
        $('#img-thumb').attr('src', res.path);
        $('input[name="pic_url"]').val(res.path);
      });
    }
  };
  var myDropzone = new Dropzone("#profile_picture_panel");
 
  $('#upload-submit').on('click', function(e) {
    e.preventDefault();
    //trigger file upload select
    $("#profile_picture_panel").trigger('click');
  });
 Dropzone.autoDiscover = false;

}


function initReceptionPageLayout(){
    $('#todays-date').text(new Date().toString().slice(0,15));
    
    $('#fullpage').fullpage({
        scrollingSpeed: 1250,
        sectionsColor: ['#fbe5d8','#fbe5d8','#fbe5d8', 'whitesmoke', '#7BAABE','#cbb956', '#ccddff',],
        menu: '#menu',
        //anchors: ['a', 'b', 'c', 'd', 'e'],
        afterRender: function() {
            $('#fullpage .section:not(:first)').fadeOut(0);
        },
        
        onLeave: function(index, nextIndex, direction) {
            if(direction=="down") {
                $('#fullpage .section').eq(index-1).fadeOut(0);
                $('#fullpage .section').eq(nextIndex-1).fadeIn(400);
            } else {
                $('#fullpage .section').eq(index-1).fadeOut(400);
                $('#fullpage .section').eq(nextIndex-1).fadeIn(0);
            }
        },
        css3: true,
        fixedElements: '.navbar, .modal'
    });
    $.ajaxSetup({async: false});
    setTodaysDoctorShedule();
    setDoctorsTable();
    $.ajaxSetup({async: true});
    setDropzone();
}

$(document).ready(function() {
    
    initReceptionPageLayout();
    initReceptionQuickStartEvents();
    initReceptionFormSubmitters();

});