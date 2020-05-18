

//password meter
$(document).ready(function(){
  $('form').validin({
custom_tests:{
  'larablog_password': {
    'regex': /^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/,
    'error_message': "the password must have atleast one special character(s)"
  }
}
});

});

function ValidateEmail(inputText)
{
 // var email=document.form_subscriber.email;

var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form_subscriber.email.focus();
return true;
}


else
{
//alert("You have entered an invalid email address!");
document.getElementById('email_id').innerHTML="You have entered an invalid email address!";
document.form_subscriber.email.focus();
//document.getElementById('email_id').innerHTML="";

return false;
}

}



//user password meter
$(document).ready(function(){
   $('#progress').zxcvbnProgress({
   passwordInput: '#password'
        });
});

//view category table 
$(document).ready(function(){
 $('#category_table').DataTable();
});


//view post table
$(document).ready(function(){
 $('#viewpost_table').DataTable();
});

//view user table
$(document).ready(function(){
 $('#user_table').DataTable();
});



//view post table
$(document).ready(function(){
 $('#viewcms_cms').DataTable();
});

//user password meter for change password templa
$(document).ready(function(){
   $('#progress').zxcvbnProgress({
   passwordInput: '#new_password'
        });
});


//users charts


