

<?php

use App\Http\Controllers\Controller;

 $adminDetails= Controller::adminDetails();
?>






<!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
                
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><a href="#"><img src="{{asset('images/backend_image/admin_users/small/'.$adminDetails->image)}}" alt="admin fullname" class="img-fluid rounded-circle"></a>
            <h2 class="h5">{{$adminDetails->fullname}}</h2><span>Admin</span>
          </div>
        
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="{{url('admin/dashboard')}}" class="brand-small text-center"> <strong>Lara</strong><strong class="text-primary">B</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{url('/')}}"> <i class="icon-home"></i>Home                             </a></li>
              <li><a href="#componentsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-page"></i>Category</a>
              <ul id="componentsDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('admin/add-category')}}">Add Category</a></li>
                <li><a href="{{url('admin/view-categories')}}">View Categories</a></li>
              
              </ul>
            </li>
            <li><a href="#formsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Posts</a>
              <ul id="formsDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('admin/add-post')}}">Add Post(s)</a></li>
                <li><a href="{{url('admin/view-posts')}}">View Posts</a></li>
               
              </ul>
            </li>
           
          
            <li><a href="#adminViewUserDetails" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>User </a>
              <ul id="adminViewUserDetails" class="collapse list-unstyled ">
                <li><a href="{{ url('admin/view-user-details')}}">View User Details</a></li>
                
              </ul>
            </li>
              
             <li><a href="#adminViewCommentDetails" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>User Comments </a></li>
              <ul id="adminViewCommentDetails" class="collapse list-unstyled ">
                <li><a href="{{ url('admin/view-user-comments')}}">View User Comment(s)</a></li>
                 </ul>
                   <li><a href="#adminViewUserContactDetails" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Contacts</a></li>
              <ul id="adminViewUserContactDetails" class="collapse list-unstyled ">
                <li><a href="{{ url('admin/get-contact-details')}}">View User Contact Details</a></li>
                 <li><a href="{{ url('admin/reply-admin-sent-message')}}">View Message Sent</a></li>

              </ul>
            
          <li><a href="#adminViewNewsletterDetails" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Newsletter</a></li>
              <ul id="adminViewNewsletterDetails" class="collapse list-unstyled ">
                <li><a href="{{ url('admin/view-news-letter-subscribers')}}">View Newsletter Details</a></li>
                
              </ul>
          </ul>
        </div>
        
      </div>
    </nav>
    