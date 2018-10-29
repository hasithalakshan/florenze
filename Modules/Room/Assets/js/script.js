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

 
 $(document).ready(function() {
    validateForms();
    var date=new Date();
    var d=date.getDate();
    var m=date.getMonth()+1;
    var y=date.getFullYear();
    $('#today').val( y+'-'+(m<10?"0"+m:m)+'-'+(d<10?"0"+d:d));
	$('#doctor').select2({
        placeholder: "Select the Doctor"
    });
    
});

function validateForms(){
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

$('#update-prescription-form').validate({
        rules: {
            date:{
				required: true,
				
			},
            appointment_no:{
				required:true,
				
			} ,
			doctor:{
				required:true,
			}, 
			medical_record:{
				required: true,
			} 
			
        },
       messages: {
            
        }
    });

















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
	
	
	