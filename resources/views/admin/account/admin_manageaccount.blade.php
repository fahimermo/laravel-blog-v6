  @extends('layouts.backend_layout.backend_design')
      
  @section('content')

  <!-- Breadcrumb-->
        <div class="breadcrumb-holder">
          <div class="container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
              <li class="breadcrumb-item active">Profile       </li>
            </ul>
          </div>
        </div>
        <section class="forms">
          <div class="container-fluid">
            <!-- Page Header-->
            <header> 
              <h1 class="h3 display">Profile Settings</h1>
            </header>
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-profile">
                  <div style="background-image: url({{asset('images/backend_image/paul-morris-116514-unsplash.jpg')}});" class="card-header"></div>
                  <div class="card-body text-center"><img src="{{asset('images/backend_image/admin_users/small/'.$admin_profileDetails->image)}}" class="card-profile-img">
                      <h3 class="mb-3 text-capitalize">{{$admin_profileDetails->fullname}}</h3>
                    <p class="mb-4 text-capitalize">Welcome back Change Your Picture below </p>

                   <form method="post" action="{{url('admin/profile-image/'.$admin_profileDetails->id)}}" novalidate="novalidate" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
 
                  <div class="custom-file">
                 <input type="file" class="custom-file-input" id="admin_image" name="admin_image">
                <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Change Your Image</button>
                </form>
                  </div>
                </div>
               
              </div>
              <div class="col-lg-8">
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
                    <h3 class="card-title">Edit Your Profile Below</h3>
                  </div>
                 
                </div>
                <form class="card" method="post" action="{{url('admin/manage-account/'.$admin_profileDetails->id)}}">

                  <div class="card-body">
                    <div class="row">
                    
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="col-md-12">
                        <div class="form-group mb-4">
                          <label class="form-label">Fullname</label>
                          <input type="text" placeholder="Fullname" id="full_name" name="full_name" class="form-control" value="{{$admin_profileDetails->fullname}}" required validate="name">
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group mb-4">
                          <label class="form-label">Email</label>
                          <input type="email" placeholder="Email" id="email" name="email" class="form-control" value="{{$admin_profileDetails->email}}" required validate="email">
                        </div>
                      </div>
                    
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>

         @endsection