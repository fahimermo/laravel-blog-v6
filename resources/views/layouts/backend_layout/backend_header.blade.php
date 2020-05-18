

<?php

use App\Http\Controllers\Controller;

 $adminDetails= Controller::adminDetails();
?>
 <div class="page">
  <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{url('admin/dashboard')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Lara Blog</span><strong class="text-primary">Dashboard</strong></div></a></div>
           <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown--->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link font-weight-bold">Account</a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="{{url('admin/change-password')}}" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between"> <div class="notification-content">
                         <i class="fa fa-envelope"></i>Reset Password</div>
                          
                        </div></a></li>
                         
                    <li><a rel="nofollow" href="{{url('admin/manage-account/'.$adminDetails->id)}}" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>Manage Your Account</div>
                     
                        </div></a></li>

                         <li><a rel="nofollow" href="{{url('/logout')}}" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>Logout</div>
                     
                        </div></a></li>


                       

    <!-- <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

      <li class="nav-item dropdown">

        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{url('admin/change-password')}}">Reset Password</a>
      

            <a class="dropdown-item" href="#">Manage Your Account</a>
            
          
        </div>
        
    </li>
    
</ul>-->

                
              </ul>
            </div>
          </div>
        </nav>
      </header>
     