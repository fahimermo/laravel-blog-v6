    <!-- Page Footer-->
    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="logo">
              <h6 class="text-white" class="font-weight-bold">Address</h6>
            </div>
            <div class="contact-details">
              <p>Road C, House 3, Oluwatofarati Zone,</p>
              <p>Olunloyo Ibadan Nigeria</p>
              <p>Phone: +2347061843049</p>
              <p>Email:mtreal62@gmail.com</p>
              <ul class="social-menu">
                <li class="list-inline-item"><a href="{{url('https://web.facebook.com/mutairu.busari')}}"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="{{url('https://twitter.com/mutairu00844054')}}"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="{{url('https://www.linkedin.com/in/mutairu-busari-a3789393/')}}"><i class="fa fa-linkedin"></i></a></li>
                <li class="list-inline-item"><a href="{{url('https://github.com/mt4real')}}"><i class="fa fa-github"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="menus d-flex">
              <ul class="list-unstyled">
                        

                <li> <a href="#" class="font-weight-bold">My Account</a></li>
              
                <li> <a href="#">Add Listing</a></li>
                <li> <a href="#">Pricing</a></li>
                <li> <a href="#">Privacy &amp; Policy</a></li>
                
              </ul>
              <ul class="list-unstyled">
                <li> <a href="#" class="font-weight-bold">Our Partners</a></li>
                <li> <a href="{{url('/faq-page')}}">FAQ</a></li>
                <li> <a href="{{url('/user-contact')}}">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="logo">
              <h6 class="text-white" class="font-weight-bold">Address</h6>
            </div>
            <div class="contact-details">
              <p>Road C, House 3, Oluwatofarati Zone,  </p>
              <p>Olunloyo, Ibadan, Nigeria</p>
              <p>Phone: +2347061843049</p>
              <p>Email:mtreal62@gmail.com</p>
           </div>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>
                &copy; <?php $startYear = 2020; 
              $currentYear = date('Y');
              echo $startYear;
              if ($startYear != $currentYear) {
              echo '-' . $currentYear;
                      }
                         ?>
                  allright reserved Lara Blog</p>
            </div>
            <div class="col-md-6 text-right">
              <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>
                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
