@extends('layouts.backend_layout.backend_design')
    
@section('content')

<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Blog Post</h1>
            
          </header>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
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
    
              
                <div class="card-header d-flex align-items-center">
                  <h4>Edit Post</h4>
                </div>
                <div class="card-body">
                  <p>Edit Blog post below</p>
                  <form method="post" action="{{url('admin/edit-post/'.$postDetails->id)}}" enctype="multipart/form-data"  novalidate="novalidate">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group row">       
                      <label>Title</label>
                      <input type="text" placeholder="Title" id="title" name="title" class="form-control mb-3"  value="{{$postDetails->post_title}}" required>
                    </div>
                    
                    <div class="form-group row">
                      <label class="">Select Category</label>
                        <select id="category" name="category" class="category_select form-control mb-3" required>
                       <option selected  disabled>Select Category</option>
                       <option><?php echo $categories_dropdownss ?></option>
                        </select>
                      </div>
                       <div class="form-group row">       
                      <label>Category Name</label>
                      <select id="cat_name"name="cat_name" class="category_select form-control mb-3" required>
                       <option selected  disabled>Select Category</option>

                           
                          <option><?php  echo $categories_dropdowns; ?></option>
                          
                        </select>
                    </div>
                   
                     
                    <div class="form-group row">
                   <label for="comment">Post Contents</label>
                  <textarea class="form-control mb-3" rows="5" id="content" name="content" required>{{$postDetails->post_contents}}</textarea>
                    </div>
                    <div class=" form-group row">
                      <div class="custom-file">
                     <input type="file" class="custom-file-input mb-3" id="image" name="image" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                     <input type="hidden" name="post_image" value="{{$postDetails->post_image}}">
                    </div>
                      @if(!empty($postDetails->post_image))
                      <div class="mt-4 mb-4">
                       <img src="{{asset('images/backend_image/admin_users/small/'.$postDetails->post_image)}}" class="w-25  img-fluid">|<a href="{{url('admin/delete-image/'.$postDetails->id)}}" class="blue-text ">Delete</a>
                       </div>
                         @endif

                    </div>
                     <div class="form-group row">       
                      <label>Tag(s)</label>
                      <input type="text" placeholder="Tags" id="tag" name="tag" class="form-control mb-3" value="{{$postDetails->post_tag}}" required>
                    </div>
                    <div class="form-group row">
                            <div class="form-check">
                   <input type="checkbox" class="form-check-input" id="feature" name="feature"  @if($postDetails->post_feature==1) checked @endif value="1">
              <label class="form-check-label" for="feature">Feature Post</label>
                     </div>

                    </div>
                    <div class="form-group row">
                           <!-- <div class="form-check">
                      <label class="form-check-label" for="status">
                    <input type="checkbox" class="form-check-input" id="status" name="status" @if(!empty($postDetails->post_status==1)) checked @endif value="1" required>
                    Status Post</label>
                   </div>-->


                     <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="status" name="status" @if($postDetails->post_status==1)checked @endif value="1" required>Enable
                    </label>
                  </div>


                    </div>
                
                    <div class="form-group row text-center">       
                      <button type="submit" class="btn btn-success mt-3 btn-block" id="edit_post" name="edit_post">Edit Post</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
            
            </div>
            <div class="col-lg-8">
             
            </div>
            <div class="col-lg-4">
             
            </div>
            <div class="col-lg-12">
              
            </div>
          </div>
        </div>


      </section>

       @endsection