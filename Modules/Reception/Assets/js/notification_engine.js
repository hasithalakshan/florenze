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

/*
var socket = io.connect('http://localhost:6001');
socket.on('message', function (data) {
    register_notification(data);
});
*/


var elements = [];

//calculate the total number of popups suitable and then populate the toatal_popups variable.
function check_overflows(){
    var currentHeight= document.getElementById('notification-clock').offsetHeight;
    for(var iii = 0; iii < elements.length; iii++){
        if(elements[iii] !== undefined)
            currentHeight+= document.getElementById(elements[iii]).offsetHeight;
    }
    if(currentHeight > window.innerHeight*0.65){
        document.getElementById(elements.splice(0,1)).outerHTML = "";
        return false;
    }
    return true;
}

function get_possible_id(){
    if(elements.length === 0)
        return 0;
    return elements[elements.length-1]+1;
}

//creates markup for a new popup. Adds the id to popups array.
function register_notification(data){
    var id=get_possible_id();
    var element = '<li id="'+id+'"><div class="timeline-div"><time>'+moment().format("hh:mm A")+'</time>'+data+' '+id+'</div></li>';
    $("#notification-list").append(element);
    elements.push(id);
    check_overflows();
}
function register_local_notification(data){
    var id=get_possible_id();
    var element = '<li id="'+id+'"><div class="timeline-div"><time>'+moment().format("hh:mm A")+'</time>'+data+'</div></li>';
    $("#notification-list").append(element);
    elements.push(id);
    check_overflows();
}





$(document).ready(function() {  
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