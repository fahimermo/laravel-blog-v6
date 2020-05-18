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
          <h4 class="mb-0">User Login</h4>
        </div>
        <div class="card-body">
          <form class="form" role="form" autocomplete="off" method="post" action="{{url('/user-login')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
            <div class="col-md-12 col-sm-12">
             <label for="email">Email</label>
            
                <input class="form-control" type="email" id="email" name="email" required >
              </div>
            </div>

            <div class="form-group row">
            <div class="col-md-12 col-sm-12">
             <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password"required >
              </div>
            </div>
            <div class="form-group row">
          
              <div class="col-md-12 col-sm-12">
                
                <button type="submit" class="btn btn-secondary btn-block" id="login" name="login">Login</button>
              </div>
            </div>
                <div class="d-flex justify-content-around">
        <div>
          <!-- Remember me -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
            <label class="custom-control-label" for="remember">Remember me</label>
          </div>
        </div>
        <div>
          <!-- Forgot password -->
          <a href="{{url('/user-reset-email')}}">Forgot password?</a>
        </div>
      </div>
      <p class="mt-4 text-center">If you are not a member yet <a href="{{url('/user-register')}}">Register</a></p>
            </div>
          </div>
          </form>
        </div>
      </div>
      <!-- /form user info -->
    </div>
  </div>
</div>
@endsection