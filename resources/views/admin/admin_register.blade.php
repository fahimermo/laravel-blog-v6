<!DOCTYPE html>
<html>

<!-- Mirrored from demo.bootstrapious.com/dashboard-premium/1-4-5/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2019 00:30:10 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Bootstrap Dashboard by Bootstrapious.com</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">
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
              <p>Welcome to Lara Blog Page, here you can register as an Admin</p>

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
    
              <form class="text-left form-validate" method="post" action="{{url('admin/register')}}" enctype="multipart/form-data"  novalidate="novalidate">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                
                  <div class="form-group">
                     <label for="fullname">Fullname </label>
                  <input  type="text" id="fullname" name="fullname" required  validate="name" class="form-control" >
                 </div>
                <div class="form-group">
               <label for="register-email">Email Address</label>
                  <input id="register-email" type="email" id="email" name="email" required validate="email" class="form-control">
                 </div>
                <div class="form-group mb-3">
                 <label for="password">Password</label>
                  <input id="password" type="password"  name="password" required  validate="larablog_password" class="form-control" >
                   <div class="progress-bar font-weight-bold text-white text-center mt-2" id="progress"></div>
                </div>
                <div class="form-group">
                 <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>

              </div>
              <div class="form-group terms-conditions text-center">
                <input id="register-agree" name="registerAgree" type="checkbox" required value="1" class="form-control-custom">
                <label for="register-agree">Keep me log in</label>
              </div>
              <div class="form-group text-center">
                <button type="submit" id="register" type="submit" value="Register" class="btn btn-primary btn-block">Register</button>
              </div>
            </form><small>Already have an account? </small><a href="{{url('/admin')}}" class="signup">Login</a>
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="#" class="external">Wave Palm Technology</a></p>
          </div>
        </div>
      </div>
    </div>
    <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm d-none d-md-inline-block"><i class="fa fa-cog fa-2x"></i></button>
    <div id="style-switch" class="collapse">
      <h5 class="mb-3">Select theme colour</h5>
      <form class="mb-3">
        <select name="colour" id="colour" class="form-control">
          <option value="">select colour variant</option>
          <option value="default.premium">green</option>
          <option value="red.premium">red</option>
          <option value="violet.premium">violet</option>
          <option value="pink.premium">pink</option>
          <option value="sea.premium">sea</option>
          <option value="blue.premium">blue</option>
        </select>
      </form>
      <p><img src="../../../d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-5/img/template-mac.png" alt="" class="img-fluid"></p>
      <p class="text-muted text-small">Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</p>
    </div>
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
    <script src="{{asset('js/backend_js/messenger-theme-flat.js')}}">       </script>
    <script src="{{asset('js/backend_js/home-premium.js')}}"> </script>

          <script src="{{asset('js/general_js/zxcvbn.js')}}"></script>
   <script src="{{asset('js/general_js/strentghxvbn.js')}}"></script> 

    <!-- Main File-->
    <script src="{{asset('js/general_js/validin.min.js')}}"></script>
   <!-- Main File-->
    <script src="{{asset('js/server_js/calling.js')}}"></script>

  

    <!-- Main File-->
    <script src="{{asset('js/backend_js/front.js')}}"></script>

  </body>

  <!-- Mirrored from demo.bootstrapious.com/dashboard-premium/1-4-5/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Oct 2019 00:30:10 GMT -->
  </html>