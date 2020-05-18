<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Lara Blog - here you can read latest news going on around the world</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/fontastic.css')}}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{asset('css/frontend_css/jquery.fancybox.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/frontend_css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/custom.css')}}">
      <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/general_css/validin.css')}}">
   

   
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>

@include('layouts.frontend_layout.frontend_header')

  
 <!-- Newsletter Section-->
    <section class="newsletter m-5">   
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


                              @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

     
      <div class="container">
        
        <div class="row">
          <div class="col-md-6 ">
            <h2 class="display-4">Reset Your password</h2>
            <p class="text-big">Type in Your Email below to reset your Password.</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="{{url('/user-set-password')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address" required validate="email">
                  <button type="submit" class="submit">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section>


    <!-- JavaScript files-->

    <script src="{{asset('js/frontend_js/jquery.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.cookie.js')}}"> </script>
    <script src="{{asset('js/frontend_js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/frontend_js/front.js')}}"></script>
    <script src="{{asset('js/general_js/zxcvbn.js')}}"></script>
  <script src="{{asset('js/general_js/strentghxvbn.js')}}"></script> 
  
     <!-- Main File-->
    <script src="{{asset('js/general_js/validin.min.js')}}"></script>

     <!-- Main File-->
    <script src="{{asset('js/server_js/calling.js')}}"></script>


   
  </body>
</html>