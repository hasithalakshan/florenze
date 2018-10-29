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

$(document).ready(function(){
    validateForms();
    
    $('#update_profile_confirm').click(function(){
        $.get("bill/update?userid="+$id+'&fname='+$('#update_profile_fname').val()+'&lname='+$('#update_profile_lname').val()+'&dob='+('#update_profile_dob').val()+'&nationalitl='+$('#update_profile_nationality').val(),function(res,states){
            console.log(res);
        });
    });
});


/*
function validateForms(){
	 $('#update_profile_modal').validate({
        rules: {
            FName: "required",
            LName: "required",
			
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
           
			
        },
        submitHandler: function(form){
            console.log($(form).serialize()+'&id='+$('#fname').val()+'   '+$(form).attr('action'));
            
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize()+'&id='+$('#EmpId option:selected').val(),
                dataType: 'json',
                success: function(res){
                    
                    console.log(res);
                    $('#update_profile_form')[0].reset();
                    
                   
                }
            });
        }
    });
	
	

 }
 
 */
