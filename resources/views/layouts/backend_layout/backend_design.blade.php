<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Afolabi Blog - here you can read latest news going on around the world</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
     <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../../../d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-5/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('css/backend_css/fontastic.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('css/backend_css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('css/backend_css/jquery.mCustomScrollbar.css')}}">
    <!-- Fontatic.css-->
    <link rel="stylesheet" href="{{asset('css/backend_css/fontastic.css')}}">
  
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/backend_css/style.default.premium.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/backend_css/custom.css')}}">

     <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/general_css/validin.css')}}">

            <link rel="stylesheet" href="{{asset('css/frontend_css/tagsinput.css')}}">

    <!-- Favicon-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css" integrity="sha256-F+DaKAClQut87heMIC6oThARMuWne8+WzxIDT7jXuPA=" crossorigin="anonymous" defer/>

         

          <link rel="stylesheet" href="{{asset('css/backend_css/responsive.bootstrap4.min.css')}}">-->
  

    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-5/img/favicon.ico">
   <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>



  @include('layouts.backend_layout.backend_sidebar')
    @include('layouts.backend_layout.backend_header')


  @yield('content')

  @include('layouts.backend_layout.backend_footer')

    <!-- JavaScript files-->
    <script src="{{asset('js/backend_js/jquery.min.js')}}"></script>
    <script src="{{asset('js/backend_js/popper.min.js')}}"> </script>
    <script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/backend_js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('js/backend_js/jquery.cookie.js')}}"> </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          

    <script src="{{asset('js/backend_js/Chart.min.js')}}"></script>
   <script src="{{asset('js/backend_js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('js/server_js/calling.js')}}"></script>
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />


    <script src="{{asset('js/backend_js/charts-home.js')}}"></script>
    <!-- Notifications-->
    <script src="{{asset('js/backend_js/messenger.min.js')}}">   </script>
    <script src="{{asset('js/backend_js/messenger-theme-flat.js')}}">       </script>
    <script src="{{asset('js/backend_js/home-premium.js')}}"> </script>
    <!-- Main File-->
    <script src="{{asset('js/backend_js/front.js')}}"></script>
       <script src="{{asset('js/general_js/zxcvbn.js')}}"></script>
  <script src="{{asset('js/general_js/strentghxvbn.js')}}"></script> 
  
     <!-- Main File-->
    <script src="{{asset('js/general_js/validin.min.js')}}"></script>
   <!-- Main File-->
    <script src="{{asset('js/server_js/calling.js')}}"></script>
    <script src="{{asset('js/backend_js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/backend_js/messenger.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js" integrity="sha256-hJ44ymhBmRPJKIaKRf3DSX5uiFEZ9xB/qx8cNbJvIMU=" crossorigin="anonymous" defer></script>
   
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatable/1.0.2/js/datatable.min.js" integrity="sha256-DrWvBtcdFJdUliLFMOtRKgTAYzA3pDw++mLluoIRKI8=" crossorigin="anonymous"></script>


              <script src="{{asset('js/frontend_js/tagsinput.min.js')}}"></script>
          
        

<script type="text/javascript">
  // $(document).ready(function(){

      /* $('.g').change(function(){
             
             var selectedCategory=$(this).children('option:selected').val();

             alert('the category that is selected is '+ selectedCategory);

             $(".y").append(selectedCategory); 


            
            
        });  



    });   */


</script>




<script type="text/javascript">
  

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: "Users Reporting"
  },
  axisY: {
    title: "Number of Monthly Users on Lara Blog"
  },
  data: [{
    type: "line",
    dataPoints: <?php echo json_encode($dataPoints ?? '', JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}


</script>

  </body>
</html>