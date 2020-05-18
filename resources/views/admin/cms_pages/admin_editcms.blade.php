@extends('layouts.backend_layout.backend_design')
    
@section('content')

<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">CMS Page</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">CMS Page</h1>
            
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
                  <h4>Edit CMS Page</h4>
                </div>
                <div class="card-body">
                  <p>Edit CMS Page Below</p>
                  <form method="post" action="{{url('admin/edit-cms-page/'.$CmsDetails_admin->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group row">  
                    <div class="col-md-12 col-sm-12">     
                      <label>Title</label>
                      <input type="text" placeholder="Title" id="title" name="title" class="form-control mb-3" required value="{{ $CmsDetails_admin->title}}">
                    </div>
                  </div>
                    
                    <div class="form-group row"> 
                    <div class="col-md-12 col-sm-12">      
                      <label>CMS Url</label>
                      <input type="text" placeholder="Title" id="cms_url" name="cms_url" class="form-control mb-3" required value="{{ $CmsDetails_admin->cms_url}}">
                    </div>
                  </div>
                    
                     
                   <div class="form-group row">
                      <div class="col-md-12 col-sm-12">
                   <label for="comment">Description</label>
                   <textarea class="form-control mb-3 text-justify" rows="5" id="description" name="description" required>{{ $CmsDetails_admin->description}}</textarea>
                    </div>
                    </div>
                     <div class="form-group row"> 
                    <div class="col-md-12 col-sm-12">      
                      <label>Meta title</label>
                      <input type="text" placeholder="Title" id="meta_title" name="meta_title" class="form-control mb-3" required value="{{ $CmsDetails_admin->meta_title}}">
                    </div>
                  </div>
                   <div class="form-group row"> 
                    <div class="col-md-12 col-sm-12">      
                      <label>Meta Description</label>
                      <input type="text" placeholder="Title" id="meta_description" name="meta_description" class="form-control mb-3" required value="{{ $CmsDetails_admin->title}}">
                    </div>
                  </div>
                   <div class="form-group row"> 
                    <div class="col-md-12 col-sm-12">      
                      <label>Meta Keyword</label>
                      <input type="text" placeholder="Title" id="meta_keyword" name="meta_keyword" class="form-control mb-3" required value="{{ $CmsDetails_admin->meta_keyword}}">
                    </div>
                  </div>
                   
                    <div class="form-group row"> <div class="col-md-12 col-sm-12">
                     <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" @if($CmsDetails_admin->status==1) checked @endif value="1">
                    <label class="form-check-label" for="status">Enable</label>
                   </div>
                    </div>
                    </div>

                    <div class="form-group row text-center">       
                      <button type="submit" class="btn btn-success mt-3 btn-block" id="add_page" name="add_page">Edit Page</button>
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