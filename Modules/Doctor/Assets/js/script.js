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

 function showPatientDetails(pID)
 {
	  $.get("getPatientDetail?pID="+pID, function(data, status){
            
            console.log(data);
            
            $('#fname').val(data['user']['fname']);
            $('#lname').val(data['user']['lname']);
            $('#dob').val(moment().diff(moment(data['user']['dob'], 'YYYY-MM-DD'), 'years'));
            
            $('#record-list-table').html('');
            setSlider(data['record']);  
        });
 } 
 function validateForms(){
	 $('#doc-update-form').validate({
        rules: {
            FName: {
				required:true
				 
			}, 
            LName: "required",
			Add1: "required",
			Add2: "required",
			Add3: "required",
			Type:"required",
			
			chanellingCharges:{
				required: true,
				number:true
			} ,
			
            email: {
                required: true,
                email: true
            },
			TelNo:{
				required: true,
				number: true,
				minlength:10
				},
				
			
        },
        messages: {
            FName: "Please enter firstname",
            LName: "Please enter lastname",
            Add1: "Please enter street",
            Add2: "Please enter city",
			Add3: "Please enter state",
			Type: "Please enter type"
			
			
        },
        submitHandler: function(form){
            console.log($(form).serialize()+'&id='+$('#docId').val()+'   '+$(form).attr('action'));
            
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize()+'&id='+$('#docId').val(),
                dataType: 'json',
                success: function(res){
                    
                    console.log(res);
                    $('#doc-update-form')[0].reset();
                    window.alert(res);
                   
                }
            });
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
            email: "Please enter your current email",
            CurrentPassword: "Please enter your current password",
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


 }

$(document).ready(function() {  
   
   $('#panel').hide();
   
	validateForms();
   
	
	 $('#searchAppointments').click(function(){
        $.get("getDetail?appDate="+$('#appointmentDate').val(), function(data, status){
            
            console.log(data);
            var output="<tr><th>Appointment No</th><th>Patient ID</th></tr>";
			for(var i=0; i<data.length; i++){
                var output=output.concat('<tr><td>'+data[i].appointment_no+'</a></td><td><a onclick="showPatientDetails('+data[i].patient_id+');">'+data[i].patient_id+'</td></tr>');
			}
			//console.log(output);
            $('#appointment-list-table').html(output);
              
        });
    });
	
	$('#appointmentSearch').click(function(){
        //console.log($('#appointmentDate').val());
		$.get("getAppointmentCount?appDate="+$('#appointmentDate').val(), function(data, status){
            console.log(data);
			$('#NoOfAppointments').val(data['count']);
        });
    });
    
	 $('#searchEmployee').click(function(){
        $.get("getEmployeeDetails", function(data, status){
            
            console.log(data);
            $('#docId').val(data[0]['id']);
            $('#fname').val(data[0]['employee']['user']['fname']);
			$('#lname').val(data[0]['employee']['user']['lname']);
			$('#add1').val(data[0]['employee']['user']['street']);
			$('#add2').val(data[0]['employee']['user']['city']);
			$('#chanellingCharges').val(data[0]['appointment_price']);
			$('#type').val(data[0]['type']);
                        $('#add3').val(data[0]['employee']['user']['state_id']);
			
			if(data[0]['employee']['user']['telephones'][0]!=undefined)
				$('#telno').val(data[0]['employee']['user']['telephones'][0]['tel_no']);
			if(data[0]['employee']['user']['emails'][0]!=undefined)
				$('#email').val(data[0]['employee']['user']['emails'][0]['email']);
			 
        });
    });   
    
});


function loadSlider(){
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
     var output="<tr align:center><th>Medical Record ID</th><th>Record</th></tr>";
			for(var i=0; i<data.length; i++){
                var output=output.concat('<tr><td>'+data[i].id+'</td><td><a href="/florenze/public/medical_records/'+data[i].medical_record+'">'+data[i].medical_record+'</a></td></tr>');
			}
			//console.log(output);
            $('#record-list-table').html(output);    
}


$(function(){
	// Cache some selectors
	var clock = $('#clock'),
		ampm = clock.find('.ampm');
	// Map digits to their names (this will be an array)
	var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');
	// This object will hold the digit elements
	var digits = {};
	// Positions for the hours, minutes, and seconds
	var positions = [
		'h1', 'h2', ':', 'm1', 'm2', ' ', 's1', 's2'
	];
	// Generate the digits with the needed markup,
	// and add them to the clock
	var digit_holder = clock.find('.digits');
	$.each(positions, function(){
		if(this == ':'){
			digit_holder.append('<div class="dots">');
		}else if(this == ' '){
			digit_holder.append('<div class="seconds">');
		}
		else{
			var pos = $('<div>');
			for(var i=1; i<8; i++){
				pos.append('<span class="d' + i + '">');
			}
			// Set the digits as key:value pairs in the digits object
			digits[this] = pos;
			// Add the digit elements to the page
			digit_holder.append(pos);
		}
	});
	// Add the weekday names
	var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
		weekday_holder = clock.find('.weekdays');
	$.each(weekday_names, function(){
		weekday_holder.append('<span>' + this + '</span>');
	});
	var weekdays = clock.find('.weekdays span');
	// Run a timer every second and update the clock
	(function update_time(){
		// Use moment.js to output the current time as a string
		// hh is for the hours in 12-hour format,
		// mm - minutes, ss-seconds (all with leading zeroes),
		// d is for day of week and A is for AM/PM
		var now = moment().format("hhmmssdA");
		digits.h1.attr('class', digit_to_name[now[0]]);
		digits.h2.attr('class', digit_to_name[now[1]]);
		digits.m1.attr('class', digit_to_name[now[2]]);
		digits.m2.attr('class', digit_to_name[now[3]]);
		digits.s1.attr('class', digit_to_name[now[4]]);
		digits.s2.attr('class', digit_to_name[now[5]]);
		// The library returns Sunday as the first day of the week.
		// Stupid, I know. Lets shift all the days one position down, 
		// and make Sunday last
		var dow = now[6];
		dow--;
		// Sunday!
		if(dow < 0){
			// Make it last
			dow = 6;
		}
		// Mark the active day of the week
		weekdays.removeClass('active').eq(dow).addClass('active');
		// Set the am/pm text:
		ampm.text(now[7]+now[8]);
		// Schedule this function to be run again in 1 sec
		setTimeout(update_time, 1000);
	})();
});