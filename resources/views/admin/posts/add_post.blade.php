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
                  <h4>Add Post</h4>
                </div>
                <div class="card-body">
                  <p>Add Blog post below</p>
                  <form method="post" action="{{url('admin/add-post')}}" enctype="multipart/form-data"  novalidate="novalidate">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group row">  
                    <div class="col-md-12 col-sm-12">     
                      <label>Author's Name</label>
                      <input type="text" placeholder="Title" id="fullname" name="fullname" class="form-control mb-3" value="{{$adminDetails->fullname}}" readonly>
                    </div>
                  </div>
                    <input type="hidden" name="author_image" value="{{$adminDetails->image}}">
                    <div class="form-group row"> 
                    <div class="col-md-12 col-sm-12">      
                      <label>Title</label>
                      <input type="text" placeholder="Title" id="title" name="title" class="form-control mb-3" required>
                    </div>
                  </div>
                    
                    <div class="form-group row"> <div class="col-md-12 col-sm-12">
                      <label class="">Select Category</label>
                        <select id="category" name="category" class="category_select form-control mb-3" required>
                       <option selected  disabled>Select Category</option>

                           @foreach($selectCategories as $selectCategory)
                          <option value="{{$selectCategory->id}}">{{$selectCategory->category_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                       <div class="form-group row"> 
                       <div class="col-md-12 col-sm-12">      
                      <label>Category Name</label>
                      <select id="cat_name"name="cat_name" class="category_select form-control mb-3" required>
                       <option selected  disabled >Select Category</option>

                           @foreach($selectCategories as $selectCategory)
                          <option>{{$selectCategory->category_name}}</option>
                          @endforeach
                        </select>
                    </div>
                   </div>
                     
                   <div class="form-group row">
                      <div class="col-md-12 col-sm-12">
                   <label for="comment">Post Contents</label>
                   <textarea class="form-control mb-3 text-justify" rows="5" id="content" name="content" required></textarea>
                    </div>
                    </div>
                     <!--<div class="form-group row"> <div class="col-md-12 col-sm-12">
                        <label for="summernote">Post Contents</label>
                          <textarea id="summernote"  name="content"></textarea>
                        </div>
                     </div>-->
                     

                    <div class=" form-group row"><div class="col-md-12 col-sm-12">
                      <div class="custom-file">
                     <input type="file" class="custom-file-input mb-3" id="image" name="image" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    </div>
                  </div>
                     <div class="form-group row"> <div class="col-md-12 col-sm-12">      
                      <label>Tag(s)</label>
                      <input type="text"  id="tag" name="tag" data-role="tagsinput" placeholder="Add tags" class="form-control mb-3" required>
                    </div>
                  </div>
                    <div class="form-group row"> <div class="col-md-12 col-sm-12">
                   <div class="form-check">
                   <input type="checkbox" class="form-check-input" id="feature" name="feature" checked value="1">
              <label class="form-check-label" for="feature" >Feature Post</label>
                     </div>
                     </div>
                    </div>
                    <div class="form-group row"> <div class="col-md-12 col-sm-12">
                     <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1" checked >
                    <label class="form-check-label" for="status">Status Post</label>
                   </div>
                    </div>
                    </div>

                    <div class="form-group row text-center">       
                      <button type="submit" class="btn btn-success mt-3 btn-block" id="add_post" name="add_post">Add Post</button>
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