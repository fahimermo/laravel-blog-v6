
  @extends('layouts.frontend_layout.frontend_design')
      
  @section('content')

<div class="breadcrumb-holder mb-5">
          <div class="container-fluid mb-5">

            <ul class="breadcrumb mt-3 ">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ul>
          </div>
        </div>
        <div class=" container">
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

          <div class="row">
            <div class=" col-sm-4 col-xs-4 col-lg-4 col-md-4 ">
               <form method="post" action="{{url('/user-dashboard/'.$user_profileDetails )}}" enctype="multipart/form-data" novalidate="novalidate">
           <img src="{{asset('images/backend_image/admin_users/small/'.$user_profileDetails->user_image)}}" alt="" class="img-fluid w-75" />
              <input type="hidden" name="_token" value="{{csrf_token()}}">
             <div class="custom-file mt-3">
              <input type="file" class="custom-file-input" id="user_image" name="user_image">
             <label class="custom-file-label" for="customFile">Choose file</label>
              
            </div>
            <div class="mt-5 row d-flex justify-content-center pl-3 pr-3">
              <button type="submit" class=" btn btn-primary btn-block">Change Your Picture</button>
            </div>
            <p class="font-weight-bold mt-5 ml-5 ">Profile Details</p>
            <ul class="list-unstyled mb-5 ml-5">
           <a href="{{url('/user-changepassword')}}"><li>Forgot Password</li></a>
            </ul>
          </div>
          <div class=" col-sm-8 col-xs-8 col-lg-8 col-md-8 ">
          <h1 class=" ml-5">
                                        Profile Details
                                    </h2>
                                    <h6 class="h6 ml-5">
                                      <ul class="list-unstyled mt-5 mb-5">
                                        <li class="mb-5">Name:<span class="ml-5">{{$user_profileDetails->name}}</span></li>
                                        <li>Email:<span class="ml-5">{{$user_profileDetails->email}}</span></li>

                                      </ul>
                                    </h6>
                                    </form>
        </div>
        </div>
      </div>

         @endsection