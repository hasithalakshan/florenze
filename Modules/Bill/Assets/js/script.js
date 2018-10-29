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

function initBillFormSubmitters(){
    
    
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
				minlength:3
			} ,
			NewPassword:{
				required:true,
				minlength:3
			}, 
			ConfirmPassword:{
				required: true,
				equalTo:"#NewPassword",
				minlength:3
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
                    
                }
            });
        }
    });
    
    $('#update_profile_form').validate({
        rules: {
            fname: "required",
            lname: "required",
            dob: "required",
            email: {
                required: true,
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
                    
                }
            });
        }
    });
    
     $('#passward_reset_profile_form').validate({
        rules: {
            passward_reset_username:{
				required: true,
				email: true	
			},
            passward_reset_current_passward:{
				required:true,
				minlength:3
			} ,
			passward_reset_naw_passward:{
				required:true,
				minlength:3
			}, 
			passward_reset_confirm_passward:{
				required: true,
				equalTo:"#passward_reset_naw_passward",
				minlength:3
			} 
			
        },
       messages: {
            passward_reset_username: "Please enter valid email",
            passward_reset_current_passward: "Please enter valid password",
			passward_reset_naw_passward: "Please enter valid password",
			passward_reset_confirm_passward: "Please enter valid confirm password"
			
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
                    $('#passward_reset_profile_form')[0].reset();
                    
                }
            });
        }
    });


 
    
    
}



$(document).ready(function() {
    
    initBillFormSubmitters();
    
    $('#app_date').val(new Date().toISOString().slice(0,10));
    
    $('#update_button').click(function(){
            console.log('clicked');
            $.get("bill/getMyDetail",function(res,status){
                   console.log(res);
                   $('#update_profile_fname').val(res[0].fname);
                   $('#update_profile_lname').val(res[0].lname);
                   $('.update_profile_gender').val(res[0].gender);
                   $('#update_profile_dob').val(res[0].dob);
                   $('#update_profile_state').val(res[0].state_id);
                   $('#update_profile_street').val(res[0].street);
                   $('#update_profile_city').val(res[0].city);
                   $('#update_profile_email').val(res[0].emails[0].email);
                   $('#update_profile_phone').val(res[0].telephones[0].tel_no);
                   
            });     
    });
    
    
    
    $('#fullamount').click(function(){ 
      var basicamount=document.getElementById('basic_amount').value;
	  var servicecharges=document.getElementById('service_charges').value;
      var laboratoryfees=document.getElementById('laboratory_fees').value;
        if(laboratoryfees==0){
            laboratoryfees=0;
        }
      var xrayfees=document.getElementById('xray_fees').value;
        if(xrayfees==0){
            xrayfees=0;
        }
      var concession=document.getElementById('concessions').value;
        if(concession==0){
            concession=0;
        }  
           
      var result=parseInt(basicamount)+parseInt(servicecharges)+parseInt(laboratoryfees)+parseInt(xrayfees)-parseInt(concession);
            
            $('#fullamount123').val(result);
            $('#model_fullamount').text(result);
            $('#model_finalfullamount').val(result);
            $('#secondtable_fullamount').text(result);
			
            
            
            $('#secondtable_servicecharges').text(servicecharges);
            $('#secondtable_basicamount').text(basicamount);			
            $('#secondtable_xrayfees').text(concession);
            $('#secondtable_laboratoryfees').text(laboratoryfees);
            $('#secondtable_concession').text(concession);
            
            //$('#secondtable_patientid').val(res['appoinment']['patient']['id']); can,t use here bwcause res is not valid here.
            
           
            
            
     
  });
  $('#bill-clear').click(function(){
      $('#form2')[0].reset();
  });
  $('#bill-clear').click(function(){
      $('#form3')[0].reset();
  });
  $('#bill-clear').click(function(){
      $('#app_no')[0].reset();
  });
    
    
    
        $('#print').click(function(){
            
            $.get("bill/?ano="+$('#app_no').val()+"&adoc="+$('#app_doctor').val()+"&adate="+$('#app_date').val(),function(res,status){
                    console.log('awaaaaaaaaaaaa');
                    $.get("bill/saveBill?aid="+$('#app_no').val()+'&amount='+$('#model_finalfullamount').val()+'&laboratoryfees='+$('#laboratory_fees').val()+'&xrayfees='+$('#xray_fees').val()+'&concession='+$('#concessions').val(), function(res, status){

                    });     
                
                $('#model_fname').text(res['user']['fname']);
                if(typeof res['user']['telephones'][0] != 'undefined')
                    $('#model_tel_no').text(res['user']['telephones'][0]['tel_no']);
                $('#model_lname').text(res['user']['lname']);
                if(typeof res['user']['emails'][0] != 'undefined')
                    $('#model_email').text(res['user']['emails'][0]['email']);
                $('#model_gender').text(res['user']['gender']);
                $('#model_address').text(res['user']['city']);
                $('#model_dob').text(res['user']['dob']);

                    $('#secondtable_patientfirstname').text(res['user']['fname']);
                    $('#secondtable_appoinmentno').text(res['appoinment']['id']);
                    $('#secondtable_patienid').text(res['user']['patient']['id']);


                    $('#model_servicedate').text(res['appoinment']['date']);
                    //$('#model_fullamount').val(res['appoinment']['time']);
                    //$('#secondtable_basicamount').val(res['appoinment']['doctor']['appointment_price']);
               
               
                  printdiv('print-preview-modal');
                
               //window.onafterprint = function(){
                  window.location.reload(true);
            
                
        // }
                
            });
             
        });
        $('#appNo').click(function(){
        
        $.get("bill/getDetail?ano="+$('#app_no').val()+"&adoc="+$('#app_doctor').val()+"&adate="+$('#app_date').val(), function(res, status){
            
            /*
            var data = JSON.parse(res);
            $('#fname').val(data['fname']);
            $('#lname').val(data['lname']);
            $('#dob').val(data['dob']);
            $('#address').val(data['city']);
            if(data['gender']==='m')
                $('#gender').val(data['gender']);
            else
                 $('#gender').val(data['gender']);
            
            $('#email').val(data['emails'][0]['email']);//mehi emails function aka.array alement 0 ak.email model ake field aka.
            $('#tel_no').val(data['telephones'][0]['tel_no']);
            $('#patient_id').val(data['patient']['id']);
            $('#basic_amount').val(data['doctor']['appointment_price']);
            
           
            
            */
           $("#form2")[0].reset();
           
            console.log(res); //console ake res aka balaa ganeemata.
            if(res!=''){
            $('#fname').val(res['user']['fname']);
            /*$('#tmp').text("hasitha");*/
            $('#lname').val(res['user']['lname']);
            $('#dob').val(res['user']['dob']);
            $('#address').val(res['user']['city']);
            $('#gender').val(res['user']['gender']);
           
            if(typeof res['user']['emails'][0] != 'undefined')
                $('#email').val(res['user']['emails'][0]['email']);
            if(typeof res['user']['telephones'][0] != 'undefined')
                $('#tel_no').val(res['user']['telephones'][0]['tel_no']);
            $('#patient_id').val(res['user']['patient']['id']);
            $('#basic_amount').val(res['appoinment']['doctor']['appointment_price']);
            
            $('#visit_date').val(res['appoinment']['date']);
            $('#visit_time').val(res['appoinment']['time']);
            
            $('#model_fname').text(res['user']['fname']);
            if(typeof res['user']['telephones'][0] != 'undefined')
                $('#model_tel_no').text(res['user']['telephones'][0]['tel_no']);
            $('#model_lname').text(res['user']['lname']);
            if(typeof res['user']['emails'][0] != 'undefined')
                $('#model_email').text(res['user']['emails'][0]['email']);
            $('#model_gender').text(res['user']['gender']);
            $('#model_address').text(res['user']['city']);
            $('#model_dob').text(res['user']['dob']);

                    $('#secondtable_patientfirstname').text(res['user']['fname']);
                    $('#secondtable_appoinmentno').text(res['appoinment']['id']);
                    $('#secondtable_patienid').text(res['user']['patient']['id']);


                    $('#model_servicedate').text(res['appoinment']['date']);
                }else{
                    window.alert('Appointment Not Found');
                }
            
        });
        
    });    
        
});




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

function printdiv(divname){
    var originalcontent=document.body.innerHTML;
    var printcontent=document.getElementById(divname).innerHTML;
    
   
    //var printhead=document.getElementById(head).innerHTML;
    
    //document.body.write('<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />'); 
    //document.head.innerHTML=printhead;
    //
    
   
    document.body.innerHTML=printcontent;
   
    window.print();
    
    document.body.innerHTML=originalcontent;
    
}     


