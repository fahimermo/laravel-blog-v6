@extends('layouts.frontend_layout.frontend_design')

@section('content')
 <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="post-thumbnail"><img src="{{asset('images/backend_image/admin_users/medium/'.$postDetail->post_image)}}" alt="post image" class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="category" id="c_name"><a href="#">{{$postDetail->category_name}}</a></div>
                </div>
                <h1 class=" text-justify" id="title">{{$postDetail->post_title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                    <div class="title" id="a_name"><span>{{$postDetail->author_name}}</span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i>{{$postDetail->created_at->diffForHumans()}}</div>
                    <div class="views"><i class="fa fa-eye"></i>5</div>
                    <div class="comments meta-last"><i class="fa fa-comment" aria-hidden="true"></i>{{$postDetail->comments->count()}}</div>
                  </div>
                </div>
                <div class="post-body">
                  <p class="lead text-justify" id="c_contents">{{ Str::limit($postDetail->post_contents, 150)}}</p>
                  <p> <img src="{{asset('images/backend_image/admin_users/medium/'.$postDetail->post_image)}}" alt="post image 2" class="img-fluid"></p>
                  <h3>Continue Reading</h3>
                  <p class="text-justify">{{ $postDetail->post_contents}}</p>
                 <!-- <blockquote class="blockquote">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <footer class="blockquote-footer">Someone famous in
                      <cite title="Source Title">Source Title</cite>
                    </footer>
                  </blockquote>
                  <p>quasi nam. Libero dicta eum recusandae, commodi, ad, autem at ea iusto numquam veritatis, officiis. Accusantium optio minus, voluptatem? Quia reprehenderit, veniam quibusdam provident, fugit iusto ullam voluptas neque soluta adipisci ad.</p>-->
                </div>
               <div class="post-tags"><a href="#" class="tag">{{$postDetail->post_tag}}</a></div>
               
               <!-- <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="" class="prev-post text-left d-flex align-items-center">
                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">Previous Post </strong>
                      <h6></h6>
                    </div></a>
                  
                              
                    <a href="" class="next-post text-right d-flex align-items-center justify-content-end">
                    <div class="text"><strong class="text-primary">Next Post </strong>
                      <h6></h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a>
                  </div>-->
                <div class="post-comments" id="comment_c">
                  <header>
                    <h3 class="h6">No of Comment(s) for this post<span class="no-of-comments">({{$postDetailCount}})</span></h3>
                  </header>
               @foreach ( $postDetail->comments as $commentDetail)

                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="{{asset('images/backend_image/admin_users/small/'.$commentDetail->user_image)}}" alt="user comment image" class="img-fluid rounded-circle"></div>
                        <div class="title"><strong>{{$commentDetail->user_name}}</strong><span class="date">{{$commentDetail->created_at->format('M d')}}</span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p>{{$commentDetail->comment}}</p>
                    </div>
                  </div>
                   @endforeach


                 <!--<div class="comment" >
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="title"><strong>Nikolas</strong><span class="date">May 2016</span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                  </div>
                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="title"><strong>John Doe</strong><span class="date">May 2016</span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                  </div>-->
                </div>
              <div class="add-comment">
                  <header>
                    <h3 class="h6">Leave a reply</h3>
                  </header>
                  <form action="{{url('/user-comment')}}" method="post" class="commenting-form" id="comment_form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                      <input type="hidden" id="post_id" name="post_id" value="{{$postDetail->id}}" >

                      <input type="hidden" id="category_id" name="category_id" value="{{$postDetail->category_id}}"  >

                       <input type="hidden" id="user_name" name="user_name" value="{{$userDetails->name}}" data-id="{{$postDetail->id}}" >

                      <!--<input type="hidden" id="user_image" name="user_image" value="{{$userDetails->user_image}}" >-->

                      <div class="form-group col-md-12 col-sm-12">
                        <textarea name="user_comment" id="user_comment" placeholder="Type your comment" class="form-control"></textarea>
                      </div>
                      <!--<div class="form-group col-md-6">
                        <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                      </div>-->
                      <div class="form-group col-md-12 text-center mt-4">
                        <button type="submit" class="btn btn-outline-success btn-lg" id="comment_save" name="comment-save">Submit Comment</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog</h3>
            </header>
            <form action="{{url('/user-search-blog')}}" method="post" class="search-form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              
              <div class="form-group">
                <input type="search" placeholder="Search by Category Name?" name="search" id="search">
                <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </form>
          </div>
          <!-- Widget Related Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Related Posts</h3>
            </header>
              <?php  $count=1; ?>
       
        @foreach($relatedPosts->chunk(4) as $chunk)
      
                @foreach($chunk as $item)

            <div class="blog-posts"><a href="{{url('/view-post/'.$item->id)}}">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="{{asset('images/backend_image/admin_users/medium/'.$item->post_image)}}" alt="post image" class="img-fluid"></div>
                  <div class="title"><strong>{{$item->post_title}}</strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="fa fa-eye"></i> 5</div>
                      <div class="comments"><i class="fa fa-comment" aria-hidden="true"></i>12</div>
                    </div>
                  </div>
                   
                </div></a>
              

                     @endforeach
                    @endforeach
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
                </div></a>-->
              </div>
          </div>
          <!-- Widget [Categories Widget]-->
                    @include('layouts.frontend_layout.category_bar')

          </div>
        </aside>
      </div>
    </div>
    
   @endsection