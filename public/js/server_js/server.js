
  $(document).ready(function(){

$("#current_password").keyup(function(){

   var current_password= $("#current_password").val();

     $.ajax({

    type:"post",

    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },


    url:"/user-checkpassword",

    data:{current_password:current_password
    },

      success:function(response){

        if (response.status=="Hooray") {
         
         //alert("ok");

     $("#chkp").html("<font class='text-success'>Correct Password</font>");

     $("#current_password").css('border-color', "green");


        }
        else{
         // alert("not okay");
           $("#chkp").html("<font class='text-danger'>Incorrect Password</font>");

           $("#current_password").css('border-color', "red");
        }

        if (current_password=="") {

           $("#current_password").css('border-color', '');
               
           $("#chkp").html("<font class=''></font>");

              $("current_password").focus();
        }
        
          
      },
      error:function(){

        alert("error");
      }
   });
  });

});



function checkSubscriber(){

var subscriber_email=$("#subscriber_email").val();


       //alert(subscriber_email);

$.ajax({
  headers:{
    'X-CSRF-TOKEN':
      $('meta[name="csrf-token"]').attr('content')
},      

  method:'post',
  url:'/check-subscriber-email',
  data:{subscriber_email:subscriber_email},
  success:function (resp){

   //alert(resp);
  if (resp.newsletter=="subscriber") {
     // alert("Subscriber Email Already exists");
      $("#email_id").show();
      $("#email_id").html("this subscriber is already exists");
       $("#btnSubmit").hide();

    }

   
  }, error:function(){
    alert("Error");
  }
});      

} 





//admin change Password

function addSubscriber(){

var subscriber_email=$("#subscriber_email").val();


$.ajax({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

  type:'post',
  url:'/add-subscriber-email',
  data:$("#myform_newsletter").serialize() ,//{subscriber_email:subscriber_email},
   
  success:function (resp){

   //alert(resp);
  if (resp.exists=="ok") {
      alert("Subscriber Email Already exists");
      $("#email_id").show();
      $("#email_id").html("Error:this subscriber is already exists");
       $("#btnSubmit").hide();

    }



    else if (resp.saved=="yes") {

      $("#email_id").show();
      $("#email_id").html("<font color='green'>Success:Thanks for subscribed</font>");
  

    }
  }, error:function(){
    alert("Error");
  }
});

}   


function enableSubcriber(){

 $("#btnSubmit").show();

  $("#email_id").hide();


}





//admimn check password

$(document).ready(function(){

$("#old_password").keyup(function(){

  var old_password=$(this).val();

  //alert(current_password);

  $.ajax({

          type:"post",
          url:"/reset-adminpassword",
          data:{old_password:old_password},

            headers:{
         'X-CSRF-TOKEN':
      $('meta[name="csrf-token"]').attr('content')
           },
  

          success:function(resp){

                         if (resp.success=="lara") {

                   $("#chk_pasword").html('<font color="green">Correct Password</font>');

                   $("#old_password").css('border-color','green');

                 }
                 else {

                     $("#chk_pasword").html('<font color="red">Incorrect Password</font>');

                     $("#old_password").css('border-color','red');

                 }
          }, error:function(){

           alert("error");
          }

  });

}); 

});



