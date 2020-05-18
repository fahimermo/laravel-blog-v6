@extends('layouts.frontend_layout.frontend_design')

@section('content')
<div class="container m-5 py-3">
  <div class="row">
    <div class="mx-auto col-sm-6">
      <!-- form user info -->
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
    
        <div class="card-header">
          <h4 class="mb-0">User Information</h4>
        </div>
        <div class="card-body">
          <form class="form" role="form" autocomplete="off" method="post" action="{{url('/user-register')}}" enctype="multipart/form-data"  novalidate="novalidate">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
              <div class="col-sm-12 col-md-12">
              <label >Name</label>
              
                <input class="form-control" type="text" id="name" name="name"  validate="name" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12 col-md-12">
              <label >Email</label>
              
                <input class="form-control" type="email" id="email" name="email" validate="email" required>
              </div>
             </div>
            

             

            <div class="form-group row">
               <div class="col-sm-12 col-md-12">
              <label >Password</label>
          
              
                <input class="form-control" type="password" id="password" name="password" validate="larablog_password" required >
              </div>
               <div class="progress-bar font-weight-bold text-white text-center mt-2" id="progress"></div>
            </div>
          </div>

          <div class="form-group">
               <div class="col-sm-12 col-md-12">
              <label >Image</label>
             
                 <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>

            <div class="form-group row d-flex justify-content-center">
               
                
                <button type="submit" class="btn btn-primary  btn-lg">Register</button>
              
            </div>
            </form>
             <hr>
             <div class="text-center">
              <h3 class="h3 ">OR</h3>
            <small>if you are an existing user pls,<a href="{{url('/user-login')}}">login</a> </small>
            </div>
          
        </div>
      </div>
      <!-- /form user info -->
    </div>
  </div>
</div>
@endsection