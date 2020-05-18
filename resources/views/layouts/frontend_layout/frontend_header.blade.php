  

<?php

use App\Http\Controllers\Controller;

 $userDetails= Controller::userDetails();
?>

<header class="header">
  <!-- Main Navbar-->
  <nav class="navbar navbar-expand-lg">
    <div class="search-area">
      <div class="search-area-inner d-flex align-items-center justify-content-center">
        <div class="close-btn"><i class="icon-close"></i></div>
        <div class="row d-flex justify-content-center">
          <div class="col-md-8">
            <form action="{{url('/user-search-blog')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                <input type="search" name="search" id="search" placeholder="Search by Category Name?">
              
                <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<div class="container">
  <!-- Navbar Brand -->
  <div class="navbar-header d-flex align-items-center justify-content-between">
    <!-- Navbar Brand --><a href="{{url('/')}}" class="navbar-brand">Lara Blog</a>
    <!-- Toggle Button-->
    <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
</div>
<!-- Navbar Menu -->
<div id="navbarcollapse" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item"><a href="{{url('/')}}" class="nav-link active ">Home</a>
      </li>
      <li class="nav-item dropdown">

        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{url('/user-register')}}">Register</a>
         @if(empty(Auth::check()))

            <a class="dropdown-item" href="{{url('/user-login')}}">Login</a>
            @else
           <a class="dropdown-item" href="{{url('/user-dashboard/'.$userDetails->id)}}">Dashboard</>
            <a class="dropdown-item" href="{{url('/user-logout')}}">Logout</a>


        </div>
        
    </li>
      <li class="nav-item"><a href="{{url('/blog')}}" class="nav-link ">Blog</a>
      </li>
     
      @endif

</ul>
<div class="navbar-text"><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></div>
<!--<ul class="langs navbar-text"><a href="#" class="active">EN</a><span></span><a href="#">ES</a></ul>-->
</div>
</div>
</nav>
</header>
