@extends('layouts.backend_layout.backend_design')
    
@section('content')

<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">User Details</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Edit User Details</h1>
            
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
                  <h4>Edit User</h4>
                </div>
                <div class="card-body">
                  <p>Edit User below</p>
                   <form class="form" role="form"  method="post" action="{{url('admin/edit-user/'.$userDetails->id)}}" enctype="multipart/form-data"  novalidate="novalidate">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group row">       
                      <label>User Name</label>
                      <input type="text" placeholder="Title" id="name" name="name" class="form-control mb-3"  value="{{$userDetails->name}}" required>
                    </div>
                    <div class="form-group row">       
                      <label>User Email</label>
                      <input type="text" placeholder="Title" id="email" name="email" class="form-control mb-3"  value="{{$userDetails->email}}" required>
                    </div>
                    <div class=" form-group row">
                      <div class="custom-file">
                     <input type="file" class="custom-file-input mb-3" id="image" name="image" required value="{{$userDetails->post_image}}">
                    <label class="custom-file-label" for="customFile">Choose file</label>

                    </div>
                      @if(!empty($userDetails->user_image))
                      <div class="mt-4 mb-4">
                       <img src="{{asset('images/backend_image/admin_users/small/'.$userDetails->user_image)}}" class="w-25  img-fluid">|<a href="{{url('admin/delete-user-image/'.$userDetails->id)}}" class="blue-text ">Delete</a>
                       </div>
                         @endif

                    </div>
                    
                    </div>
                    <div class="form-group row">
                            <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" @if($userDetails->user_status==1)) checked @endif value="1" >
                    <label class="form-check-label" for="status">User Status</label>
                   </div>

                    </div>
                    <div class="form-group row text-center">       
                      <button type="submit" class="btn btn-success mt-3 btn-block" id="add_user" name="edit_user">Edit User</button>
                    </div>
                  </form>
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

