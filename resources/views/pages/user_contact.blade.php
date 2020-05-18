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
          <h4 class="mb-0">Contact Us</h4>
        </div>
        <div class="card-body">
          <form class="form" role="form" method="post" action="{{url('/user-contact')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
            <div class="col-md-12 col-sm-12">
             <label for="email">Name</label>
            
                <input class="form-control" type="text" id="name" name="name"  required validate="name">
              </div>
            </div>
             <div class="form-group row">
            <div class="col-md-12 col-sm-12">
             <label for="email">Email</label>
            
                <input class="form-control" type="email" id="email" name="email" required validate="email" >
              </div>
            </div>
            <div class="form-group row">
            <div class="col-md-12 col-sm-12">
             <label for="email">Subject</label>
            
                <input class="form-control" type="text" id="subject" name="subject" required  validate="name">
              </div>
            </div>
            
            <div class="form-group row">
            <div class="col-md-12 col-sm-12">
             <label for="message">Comment</label>
                <textarea class="form-control" id="message" name="message" required></textarea>
              </div>
            </div>
            <div class="form-group row">
          
              <div class="col-md-12 col-sm-12">
                
                <button type="submit" class="btn btn-secondary btn-block" id="login" name="login">Submit Your Comment</button>
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