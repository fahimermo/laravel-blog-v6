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
          <h4 class="mb-0">User Password Change</h4>
        </div>
        <div class="card-body">
          <form class="form"  method="post" action="{{url('/user-update-password')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
              <div class="col-md-12 col-sm-12">
              <label>Current Password</label>
                <input class="form-control" type="password" id="current_password" name="current_password" required>
              </div>
            </div>
          <small id="chkp" class="form-text text-muted text-center"></small>

            <div class="form-group row">
              <div class="col-md-12 col-sm-12">
              <label>New Password</label>
                <input class="form-control must_match" type="password" id="new_password" name="new_password" required>
              </div>
                <div class="progress-bar font-weight-bold text-white text-center mt-2" id="progress"></div>

            </div>

          
              <div class="form-group row">
              <div class="col-md-12 col-sm-12">
              <label>Confirm Password</label>
              <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" validate="match:.must_match" required>
              </div>
             </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label form-control-label"></label>
              <div class="col-md-12 col-sm-12">
                
                <button type="submit" class="btn btn-secondary btn-block" id="user_changepassword" name="user_changepassword">Change Password</button>
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