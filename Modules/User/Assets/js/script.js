$(document).ready(function() { 
    setUsersTable();
    $(".pppp").hide();
    intitValidators();
    $("#search").on('keyup', function(){
        setUsersTable();
    });
    $("#room-modal-trigger").on('click', function(){
        $.get("user/getNextRoomNo", function(res, status){
            $('#room-add-modal-room-no').val(res);
        });
    });
    $("#uar").on('change', function(){
        if($("#uar option:selected").val()=='4')
            $(".pppp").show();
        else
            $(".pppp").hide();
    });
    
    
    
    
}); 

    
function intitValidators(){
    $("#user-add-modal-form").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                tel_no: "required",
                dob:"required",
                role:"required",
                password: {
                    required: true,
                    minlength: 5
                },
                password_again: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
               password_again: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                     console.log(res)
                     if(res.disabled !=undefined)
                      {
                          $('#useraddmodal').modal('hide');
                          $('#disableduserid').val(res.disabled);
                          $('#adduserenablemodal').modal('show');
                        
                       // window.alert(res.disabled);
                      }
                     else if(res.failed!=undefined)
                      {
                        window.alert(res.failed);  
                      }
                     else{
                     
                        $(form)[0].reset();
                    
                    //if appointment exist, set last added patient to it
                        window.alert(res);
						}
       
					}
			});
			}
			});

$("#room-insert-form").validate({
            rules: {
                room_no: "required",
                //location:"required",
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                   
                    console.log(res);
                    $(form)[0].reset();
                    
                    //if appointment exist, set last added patient to it
                   window.alert(res);
                   location.reload();
                }
            });
          }
    });

 
$("#role-insert-form").validate({
            rules: {
                role: "required",
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                   
                    console.log(res);
                    $(form)[0].reset();
                    
                    //if appointment exist, set last added patient to it
                   window.alert(res);
                   location.reload();
                }
            });
          }
    });
$("#role_edit_modal").validate({
            rules: {
                role:"required",
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                   
                    console.log(res);
                    $(form)[0].reset();
                    
                    //if appointment exist, set last added patient to it
                   window.alert(res);
                   location.reload();
                }
            });
          }
    });

$("#userdrop").validate({
            rules: {
                
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                   
                    console.log(res);
                    $(form)[0].reset();
                    
                    //if appointment exist, set last added patient to it
                   window.alert(res);
                   location.reload();
                }
            });
          }
    });

    $("#adduesrenable").validate({
            rules: {
                
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                   
                    console.log(res);
                    $(form)[0].reset();
                    
                    //if appointment exist, set last added patient to it
                   window.alert(res);
                   location.reload();
                }
            });
          }
    });


$("#roomeditp3").validate({
            rules: {
                room_no: "required",
                location: "required",
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                dataType: 'json',
                success: function(res){
                   
                    console.log(res);
                    $('#roomeditp3')[0].reset();
                    
                    //if appointment exist, set last added patient to it
                   window.alert(res);
                   location.reload();
                }
            });
          }
    });
$('#Passward_reset_profile_form').validate({
         rules: {
                email: "required",
                current_password: "required",
                new_password: "required",
                confirmpassword:"required",
                
                new_password: {
                    required: true,
                    minlength: 3
                },
               confirmpassword: {
                    required: true,
                    minlength: 3,
                    equalTo: "#new_password"
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                
                
                new_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirmpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                
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
                    $(form)[0].reset();
                     window.alert(res)
                }
            });
        }
    });










































$("#usereditp1").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                city: "required",
                street: "required",
                tel_no: "required",
                gender: "required",
                dob:"required",
                role:"required",
                
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                
                
                email: "Please enter a valid email address",
                
            },
       submitHandler: function(form){
            console.log($(form).serialize());
            $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize()+"&id="+$('#edit_user_id').val(),
                dataType: 'json',
                success: function(res){
                   
                    
                    console.log(res)
                    
                     
                    $(form)[0].reset();
                    
                    
                   window.alert(res);
                     
                }
            });
          }
    });

}
    

function setUserEditModal(id){
    $('#sd-id').html('user Id - '+id);
    
    $('#edit_user_id').val(id);
    $.get("user/getById?&id="+id, function(res, status){
       
        console.log(res);
        $('#first-name').val(res[0].fname);
       $('#last-name').val(res[0].lname);
        $('#dob').val(res[0].dob);
        $('#role').val(res[0].role);
        $('#city').val(res[0].city);
        $('#state').val(res[0].state_id);
        if(res[0].emails[0] != undefined)

        $('#email').val(res[0].emails[0].email);
        $('#street').val(res[0].street);
       $('input:radio[name="gender"]').filter('[value='+res[0].gender+']').attr('checked', true);
       if(res[0].telephones[0] != undefined)
        $('#telephone').val(res[0].telephones[0].tel_no);
        
    });
    
}
function setUserDropModal(id){
    
    $.get("user/getById?&id="+id, function(res, status){
        
        console.log(res);
        
        $('#dropid').val(res[0].id);
        
    });
    
}
function setPasswordResetModal(){
    
                          $('#userviewmodal').modal('hide');
                          //$('#disableduserid').val(res.disabled);
                          $('#PasswordResetModal').modal('show');
        
   
    
}

function setRoomEditModal(room_no){
   // $('#sd-ido').html('room_no - '+room_no);
    
    $('#edit_room_no').val(room_no);
    console.log(room_no);
    $.get("user/getByIdo?&room_no="+room_no, function(res, status){
       
        console.log(res);
        $('#room_no').val(res[0].room_no);
        $('#location').val(res[0]. location);
        
        
    });
    
}


function setRoleEditModal(id){
   // $('#sd-ido').html('room_no - '+room_no);
    
    $('#edit_role_name').val(id);
    console.log(id);
    $.get("user/getByRoleId?&id="+id, function(res,status){
       
        console.log(res);
        $('#rolel').val(res[0].role);
        
        
        
    });
    
}

function setUserEnabletModal(id){
   // $('#sd-ido').html('room_no - '+room_no);
    
   // $('#edit_role_name').val(id);
   // console.log(id);
    $.get("user/adduesrenablemodal?&id="+id, function(res,status){
       
        window.alert(res);
         location.reload();        
        
        
    });
    
}











function setUsersTable(url){
    var q=$('#search').val();
    var url_default="user/search?q="+q;
    
    if(url!='null'){
        url=(url==undefined)?url_default:url+"&q="+q;
        
        console.log(url);
        
        $.get(url, function(res, status){
            console.log(res);
            

            var tuples="<tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Role</th><th>Gender</th><th>DOB</th><th>Phone</th><th>Email</th><th>Options</th></tr>";
            
            for(var i=0; i<res.data.length; i++ ){
                var tel='';
                var email='';
                if(res.data[i].telephones[0] != undefined)
                    tel=res.data[i].telephones[0].tel_no;
                if(res.data[i].emails[0] != undefined)
                    email=res.data[i].emails[0].email;

                var options="<input readonly=\"readonly\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#editmodal\" onclick=\"setUserEditModal("+res.data[i].id+");\" value='edit'/>"+"<input readonly=\"readonly\" class=\"btn btn-default\"data-toggle=\"modal\" data-target=\"#userdropmodal\" onclick=\"setUserDropModal("+res.data[i].id+");\" value='deseble' />";

                tuples=tuples.concat("<tr><td>"+res.data[i].id+"</td><td>"+res.data[i].fname+"</td><td>"+res.data[i].lname+"</td><td>"+res.data[i].role+"</td><td>"+res.data[i].gender+"</td><td>"+res.data[i].dob+"</td><td>"+tel+"</td><td>"+email+"</td><td>"+options+"</td></tr>");

       
            }
            $('#user-list').html(tuples);  
            
            var pages='<li><a onclick="setUsersTable(\''+res.prev_page_url+'\');">\<\<</a></li>';
            //var pagebaseurl=
            if(res.last_page==0) return;
            else if(res.last_page==1)
                pages=pages.concat('<li><a>first</a></li><li class="active"><a>'+res.current_page+'</a></li><li><a>last</a></li><li><a>\>\></a></li>');
            else{
                var pagebaseurl=res.current_page>1?res.prev_page_url.substring(0, res.prev_page_url.length-1):res.next_page_url.substring(0, res.next_page_url.length-1);
                pages=pages.concat('<li><a onclick="setUsersTable(\''+pagebaseurl.concat("1")+'\');">first</a></li>');
                pages=pages.concat('<li class="active"><a>'+res.current_page+'</a></li>');
                pages=pages.concat('<li><a onclick="setUsersTable(\''+pagebaseurl.concat(res.last_page)+'\');">last</a></li>');
                pages=pages.concat('<li><a onclick="setUsersTable(\''+res.next_page_url+'\');">\>\></a></li>');
            }
            $('#user-list-pagination').html(pages);

        });
    }
}
 
