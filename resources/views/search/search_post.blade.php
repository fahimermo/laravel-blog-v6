@extends('layouts.frontend_layout.frontend_design')

@section('content')
 
      <div class="row">
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
    

        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="container">

                 
            <div class="row">
              <!-- post -->

              
                @foreach($allPosts as $allPost)
            
              <div class="post col-xl-6">
         <div class="post-thumbnail"><a href="post.html">
          <img src="{{asset('images/backend_image/admin_users/medium/'.$allPost->post_image)}}" alt="img blog-posts" class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{$allPost->created_at->format('d M')}}|{{$allPost->created_at->format('Y')}} </div>
                    <div class="category"><a href="#">{{$allPost->cat_name}}</a></div>
                  </div><a href="{{url('/view-post/'.$allPost->id)}}">
                    <h3 class="h4">{{$allPost->post_title}}</h3></a>
                 <p class="text-muted">{{Str::limit($allPost->post_contents, 100)}}
                  <a href="{{url('/view-post/'.$allPost->id)}}">Readmore</a></p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('images/backend_image/admin_users/small/'.$allPost->post_image)}}" alt="authour image" class="img-fluid"></div>
                      <div class="title"><span>{{$allPost->author_name}}</span></div></a>
                    <div class="date"><i class="icon-clock"></i>{{$allPost->created_at->diffForHumans()}}</div>
                    <div class="comments meta-last"><i class="fa fa-eye"></i>5</div>
                  </footer>
                  
                </div>
               </div>
                  @endforeach
            
              </div>
              <!-- post             
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.html"><img src="{{asset('images/frontend_image/blog-post-2.jpg')}}" alt="blog-post2" class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">20 May | 2016</div>
                    <div class="category"><a href="#">Business</a></div>
                  </div><a href="post.html">
                    <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  <div class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('images/frontend_image/avatar-2.jpg')}}" alt="avatar-2" class="img-fluid"></div>
                      <div class="title"><span>John Doe</span></div></a>
                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div>
              <!-- post             
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.html"><img src="{{asset('images/frontend_image/blog-post-3.jpeg')}}" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">20 May | 2016</div>
                    <div class="category"><a href="#">Business</a></div>
                  </div><a href="post.html">
                    <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  <div class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                      <div class="title"><span>John Doe</span></div></a>
                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div>
              <!-- post 
              <div class="post col-xl-6">
                <div class="post-thumbnail"><a href="post.html"><img src="{{asset('images/frontend_image/blog-post-4.jpeg')}}" alt="blog-post-4" class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">20 May | 2016</div>
                    <div class="category"><a href="#">Business</a></div>
                  </div><a href="post.html">
                    <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  <div class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('images/frontend_image/avatar-1.jpg')}}" alt="avatar-1" class="img-fluid"></div>
                      <div class="title"><span>John Doe</span></div></a>
                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pagination 
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav>-->
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
             <form action="{{url('/user-search-blog')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                <input type="search" placeholder="Search by Category Name?" name="search" id="search">
                <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
                   @foreach ( $latestBlogPosts as  $latestBlogPost)
            <div class="blog-posts"><a href="{{url('/view-post/'.$latestBlogPost->id)}}">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="{{asset('images/backend_image/admin_users/medium/'.$latestBlogPost->post_image)}}" alt="latest blog post image" class="img-fluid"></div>
                  <div class="title text-justify"><strong>{{ $latestBlogPost->post_title}}</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a>@endforeach
                <!--<a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a><a href="#">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i> 500</div>
                      <div class="comments"><i class="icon-comment"></i>12</div>
                    </div>
                  </div>
                </div></a></div>-->
          </div>
          <!-- Widget [Categories Widget]-->
          <div class="widget categories">
            <header>
              <h3 class="h6">Blog Categories</h3>
            </header>
            @foreach ( $blogCategoryDetails as  $blogCategoryDetail)
            <div class="item d-flex justify-content-between"><a href="#">{{ $blogCategoryDetail->category_name}}</a><span>({{ $blogCategoryDetail->posts->count() }})</span></div>@endforeach
           <!-- <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Sales</a><span>8</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Tips</a><span>17</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>-->
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
              <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  
   @endsection