<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Lara Blog - here you can read latest news going on around the world</title>
   <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/frontend_css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-
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

        <link rel="stylesheet" href="{{asset('css/frontend_css/tagsinput.css')}}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

               <!-- <link rel="stylesheet" href="{{asset('css/frontend_css/profile.css')}}">


   

   
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>



  @include('layouts.frontend_layout.frontend_header')

  @yield('content')

  @include('layouts.frontend_layout.frontend_footer')




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

      <!-- Main File-->
    <script src="{{asset('js/server_js/server.js')}}"></script>

    <script src="{{asset('js/server_js/calling.js')}}"></script>



    <!--<script src="{{asset('js/server_js/calling.js')}}"></script>-->

    
        <script src="{{asset('js/frontend_js/tagsinput.min.js')}}"></script>

 
  </body>
</html>