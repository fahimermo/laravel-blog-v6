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

                              @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
        <div class="card-header">
          <h4 class="mb-0">User Change Your Password</h4>
        </div>
        <div class="card-body">
          <form class="form" role="form"   method="post" action="{{url('/user-reset-forgot-password')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
           
            <div class="form-group row">
              <div class="col-md-12 col-sm-12">
              <label>Email</label>
                <input class="form-control" type="email" id="email" name="email"required >
              </div>
                <div class="progress-bar font-weight-bold text-white text-center mt-2" id="progress"></div>

            </div>

          
              <div class="form-group row">
              <div class="col-md-12 col-sm-12">
              <label>New password</label>
              <input class="form-control" type="password" id="password" name="password"required validate="larablog_password">
              </div>
             </div>
               <div class="col-md-12 col-sm-12">
                
                <button type="submit" class="btn btn-secondary btn-block" id="user_changepassword" name="user_changepassword">Update Your Password</button>
              </div>
 
          </form>
        </div>
      </div>
      <!-- /form user info -->
    </div>
  </div>
</div>
@endsection