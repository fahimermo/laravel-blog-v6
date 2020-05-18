<!DOCTYPE html>
<html>
  
<!-- Mirrored from demo.bootstrapious.com/dashboard-premium/1-4-5/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2019 00:30:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lara Blog-Admin Reset Password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../../../d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-5/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../../../d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-5/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('css/backend_css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('css/backend_css/jquery.mCustomScrollbar.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/backend_css/style.default.premium.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/backend_css/custom.css')}}">
     <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{asset('css/general_css/validin.css')}}">

    <!-- Favicon-->
    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-5/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>
  <body>
   <div class="page login-page">
      <div class="container">

        <div class="form-outer text-center d-flex align-items-center">

          <div class="form-inner">
            <div class="logo text-uppercase"><span>Lara</span><strong class="text-primary">Blog</strong></div>
            <p>Welcome to Lara Blog, here you can log change can your<br> password as an Admin</p>
             @if(Session::has('flash_message_error'))
                    
                      <div class="alert alert-danger" role="alert">

                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong class="">  {!!session('flash_message_error')!!}</strong>  
                        
                    </div>
                    
                          @endif
                    
                                    
                    @if(Session::has('flash_message_success'))
                    
                                 <div class="alert alert-primary" role="alert">
                      <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong class="">  {!!session('flash_message_success')!!}</strong>  
                        
                    </div>
                              @endif
    
            <form class="text-left " id="admin_id"  method ="post" 
            action="{{url('admin/change-password')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="form-group">
               <label for="">Old Password</label>
                <input type="password" id="old_password" name="old_password" class="form-control">
              </div>
              <p id="chk_pasword"></p>
            
              <div class="form-group">
                <label for="new_pwd" >New Password</label>
                <input  type="password" id="new_password" name="new_password"  class="form-control must_match"    required>
                </div>
                 <div class="progress-bar font-weight-bold text-white text-center mt-2" id="progress"></div>
                 <div class="form-group">
                <label for="confirm_password" >Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" validate="match:.must_match"  class="form-control" >
                </div>
              <div class="form-group text-center">
              <button type="submit" id="change_password" name="change_password" class="btn btn-primary btn-block">Change Password</button>               
               <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form>
          <h3 class="h3 text-muted float-right mt-5"><a href="{{url('admin/dashboard')}}">back to dashboard</a></h3>

          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="#" class="external">Wave Palm Technology</a></p>
          </div>

        </div>
      </div>
    </div>
    <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm d-none d-md-inline-block"><i class="fa fa-cog fa-2x"></i></button>
    <!-- JavaScript files-->
    <script src="{{asset('js/backend_js/jquery.min.js')}}"></script>
    <script src="{{asset('js/backend_js/popper.min.js')}}"> </script>
    <script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/backend_js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('js/backend_js/jquery.cookie.js')}}"> </script>
    <script src="{{asset('js/backend_js/Chart.min.js')}}"></script>
    <script src="{{asset('js/backend_js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/backend_js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/backend_js/charts-home.js')}}"></script>
    <!-- Notifications-->
    <script src="{{asset('js/backend_js/messenger.min.js')}}">   </script>
    <script src="{{asset('js/backend_js/messenger-theme-flat.js')}}"> </script>
    <script src="{{asset('js/backend_js/home-premium.js')}}"> </script>
    <!-- Main File-->
    <script src="{{asset('js/general_js/validin.min.js')}}"></script>

   <!-- Main File-->
    <script src="{{asset('js/server_js/calling.js')}}"></script>

    <script src="{{asset('js/server_js/server.js')}}"></script>
    
   <script src="{{asset('js/general_js/zxcvbn.js')}}"></script>

  <script src="{{asset('js/general_js/strentghxvbn.js')}}"></script> 
  
    <!-- Main File-->
    <script src="{{asset('js/backend_js/front.js')}}"></script>


     <script type="text/javascript">
  
$(document).ready(function() {
 // $('#summernote').summernote();
});

</script>
    

    
<script type="text/javascript">


 $(document).ready(function(){

$("#current_password").keyup(function(){

  var current_password=$(this).val();

  //alert(current_password);
  $.ajax({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
          type:"post",
         // method:"POST",
          url:"/reset-adminpassword",
          data:{current_password:current_password},
          success:function(resp){
            console.log(resp);
           // alert(resp);
            //var res = resp;
                 if (resp="true") {


                   $("#chk_pasword").html('<font color="green">Correct Password</font>');

                     $("#current_password").css('border-color','green');

                  
            
                  // $("#user_changepassword").attr('disabled', true);

                 }
                 else if (resp="false") {
                  
                 $("#chk_pasword").html('<font color="red">Incorrect Password</font>');

                   $("#current_password").css('border-color','red');

                 }

                 if (current_password=="") {
                  $("#chk_pasword").html("");
                  $("#current_password").css('border-color','');

                 }
          }, 
          error:function(){

           alert("error");
          }

  });

});  

});  

</script>

<script type="text/javascript">
 /* $(document).ready(function(){
     
    $("#current_password").keyup(function(){

       var current_password=$(this).val();


    });

  }); */

</script>

   
  </body>

<!-- Mirrored from demo.bootstrapious.com/dashboard-premium/1-4-5/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2019 00:30:10 GMT -->
</html>