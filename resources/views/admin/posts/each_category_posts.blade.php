@extends('layouts.frontend_layout.frontend_design')

@section('content')
 <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
                @foreach( $each_category_posts as $each_category_post)
            
              <div class="post col-xl-6">
               <div class="post-thumbnail"><a href="{{url('/view-post/'. $each_category_post->id)}}"><img src="{{asset('images/backend_image/admin_users/medium/'. $each_category_post->post_image)}}" alt="img blog-posts" class="img-fluid"></a></div>
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last">{{ $each_category_post->created_at->format('d M') }} | {{ $each_category_post->created_at->format('Y') }}</div>
                    <div class="category">{{ $each_category_post->cat_name}}</div>
                  </div><a href="{{url('/view-post/'. $each_category_post->id)}}">
                    <h3 class="h4">{{ $each_category_post->post_title}}</h3></a>
                 <p class="text-muted">{{Str::limit( $each_category_post->post_contents, 100)}}
                  <a href="{{url('/view-post/'. $each_category_post->id)}}">Readmore</a></p>
                  <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                      <div class="avatar"><img src="{{asset('images/backend_image/admin_users/small/'. $each_category_post->author_image)}}" alt="authour image" class="img-fluid"></div>
                      <div class="title"><span>{{ $each_category_post->author_name}}</span></div></a>
                    <div class="date"><i class="fa fa-clock-o"></i> {{$each_category_post->created_at->diffForHumans()}}</div>
                    @foreach( $countPostComments as  $countPostComment)
                  
                    <div class="comments meta-last"><i class="icon-comment">{{$countPostComment->comments->count()}}</i></div>
                    @endforeach
                  </footer>
                  
                </div>
               </div>
                  @endforeach
            
              </div>
               <div class="d-flex row justify-content-center">
        
        {!!$each_category_posts->appends(['data'=>Str::random(8000)])->links()!!}
            
            </div>
              
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
                <input type="search" placeholder="What are you looking for?" name="search" id="search">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
                   @foreach ( $latestBlogPosts as  $latestBlogPost)
            <div class="blog-posts"><a href="{{url('/view-post/'.$latestBlogPost->post_title)}}">
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

          @include('layouts.frontend_layout.category_bar')
         
          </div>
        </aside>
      </div>
    </div>
   @endsection