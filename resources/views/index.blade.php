@extends('layouts.frontend_layout.frontend_design')
    
@section('content')
  <!-- Hero Section-->
    <section style="background: url({{ asset('images/frontend_image/hero.jpg')}}); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h1>Lara Blog- Read the latest news here</h1><a href="#" class="hero-link">Discover More</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro text-justify">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">Lara Blog</h2>
            <p class="text-big">A Blog site being developed using Laravel Framework<strong>LaraBlog</strong><strong>This is a Blog site that everyone out there will fall in love with because it was devloped using one of the world best PHP Frameworks(Laravel)</strong>Lara Blog is a Blog Website that is being developed using Laravel Framework.It is an open source project that is being developed by Afolabi.Any Development on this project is being welcome from other Laravel Developer</p>
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#">Business</a><a href="#">Technology</a></div><a href="post.html">
                    <h2 class="h4">Alberto Savoia Can Teach You About Interior</h2></a>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('images/frontend_image/avatar-1.jpg')}}" alt="avatar" class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="{{asset('images/frontend_image/featured-pic-1.jpeg')}}" alt="feature pics"></div>
        </div>
        <!-- Post        -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="{{asset('images/frontend_image/featured-pic-2.jpeg')}}" alt="feature pics2"></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#">Business</a><a href="#">Technology</a></div><a href="post.html">
                    <h2 class="h4">Alberto Savoia Can Teach You About Interior</h2></a>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('images/frontend_image/avatar-2.jpg')}}" alt="avatar2" class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
        </div>
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="#">Business</a><a href="#">Technology</a></div><a href="post.html">
                    <h2 class="h4">Alberto Savoia Can Teach You About Interior</h2></a>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{asset('images/frontend_image/avatar-3.jpg')}}" alt="..." class="img-fluid"></div>
                    <div class="title"><span>John Doe</span></div></a>
                  <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                  <div class="comments"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="{{asset('images/frontend_image/featured-pic-3.jpeg')}}" alt="feature pics 3"></div>
        </div>
      </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url({{asset('images/frontend_image/divider-bg.jpg')}}); background-size: cover; background-position: center bottom" class="divider">
      <div class="container text-justify">
        <div class="row">
          <div class="col-md-7">
            <h2>Lara Blog is a Blog site developed using one of the best PHP Frameworks in the world.Check the documentation you will find it useful as it is an open source</h2><a href="#" class="hero-link">View More</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest from the blog</h2>
          <p class="text-big">Read tthe latest posts from our Blog.</p>
        </header>
        <div class="row">
          @foreach($latestPosts as $latestPost)
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="{{url('/view-post/'.$latestPost->id)}}"><img src="{{asset('images/backend_image/admin_users/medium/'.$latestPost->post_image)}}" alt="blog pics" class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category">{{$latestPost->cat_name}}</div>
              </div><a href="{{url('/view-post/'.$latestPost->id)}}">
                <h3 class="h4">{{$latestPost->post_title}}</h3></a>
              <p class="text-muted">{{Str::limit($latestPost->post_contents, 100)}}<a href="{{url('/view-post/'.$latestPost->id)}}">Readmore</a></p>
            </div>
          </div>
          @endforeach

          <!--<div class="post col-md-4">
            <div class="post-thumbnail"><a href="post.html"><img src="{{asset('images/frontend_image/blog-2.jpg')}}" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category"><a href="#">Technology</a></div>
              </div><a href="post.html">
                <h3 class="h4">Diversity in Engineering: Effect on Questions</h3></a>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
          </div>
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="post.html"><img src="{{asset('images/frontend_image/blog-3.jpg')}}" alt="blog 3" class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="date">20 May | 2016</div>
                <div class="category"><a href="#">Financial</a></div>
              </div><a href="post.html">
                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
          </div>-->
        </div>
      </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top">    
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Subscribe to Newsletter</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="col-md-8">
            <div class="form-holder">
              <form action="javascript:void(0);" name="form_subscriber" type="post" id="myform_newsletter">
                <input  type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  <input onfocus="enableSubcriber();"  onchange ="checkSubscriber(); "  type="email" name="subscriber_email" id="subscriber_email" validate="email" required placeholder="Type your email address" 
                  >
                  <button onclick="checkSubscriber(); addSubscriber()"  id="btnSubmit" type="submit" class="submit">Subscribe</button>
                  <p  id="email_id" style="color: red;"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Gallery Section-->
    <section class="gallery no-padding">    
      <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="{{asset('images/frontend_image/gallery-1.jpg')}}" data-fancybox="gallery" class="image"><img src="{{asset('images/frontend_image/gallery-1.jpg')}}" alt="gallery1" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="{{asset('images/frontend_image/gallery-2.jpg')}}" data-fancybox="gallery" class="image"><img src="{{asset('images/frontend_image/gallery-2.jpg')}}" alt="gallery2" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="{{asset('images/frontend_image/gallery-3.jpg')}}" data-fancybox="gallery" class="image"><img src="{{asset('images/frontend_image/gallery-3.jpg')}}" alt="gallery3" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
          <div class="item"><a href="{{asset('images/frontend_image/gallery-4.jpg')}}" data-fancybox="gallery" class="image"><img src="{{asset('images/frontend_image/gallery-4.jpg')}}" alt="gallery4" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
        </div>
      
    </section>
  

@endsection