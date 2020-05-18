@extends('layouts.backend_layout.backend_design')
    
@section('content')

<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Edit Category</h1>
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
                  <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                  <p>Edit Category below</p>
                  <form method="post" action="{{url('admin/edit-category/'.$categoryDetails_admin->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group row">       
                      <label>Category Name</label>
                      <input type="text"  placeholder="Category" id="category_name" name="category_name" class="form-control mb-3" value="{{ $categoryDetails_admin->category_name}}" required validate="name">
                    </div>
                      
                    <div class="form-group row">
                   <label for="comment">Category Description</label>
                   <textarea class="form-control mb-3" rows="5" id="category_desc" name="category_desc" required>
                    {{ $categoryDetails_admin->category_desc}}
                   </textarea>
                    </div>
                     <div class="form-group row">       
                      <label>Category Url</label>
                      <input type="text" placeholder="Category url" id="category_url" name="category_url" class="form-control mb-3" value="{{ $categoryDetails_admin->category_url}}" required validate="name">
                    </div>
                   <div class="form-group row">
                            <div class="form-check">
                   <input type="checkbox" class="form-check-input" id="category_status" name="category_status" 
                    @if($categoryDetails_admin->category_status==1) checked @endif value="1">
              <label class="form-check-label" for="category_status">Enable</label>
                     </div>
                   </div>

                    <div class="form-group row text-center">       
                      <button type="submit" class="btn btn-success mt-3 btn-block" id="add_category" name="add_category">Edit Category</button>
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