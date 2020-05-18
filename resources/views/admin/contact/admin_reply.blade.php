@extends('layouts.backend_layout.backend_design')
    
@section('content')

<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">Reply User</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Admin Reply User</h1>
            
          </header>
          <div class="row">
            <div class="col-lg-6">
              <div class="card">

              
                <div class="card-header d-flex align-items-center">
                  <h4>Reply User</h4>
                </div>
                <div class="card-body">
                  <p>User Contact Details</p>

                  <div class="form-group row">       
                      <label class="font-weight-bold"><strong>Name</strong></label>
                        </div>

                         <p>{{$contactDetails->name}}</p>
                  
                  <div class="form-group row">       
                      <label class="font-weight-bold"><strong>Email</strong></label>
                                       </div>
                      <p>{{$contactDetails->email}}</p>
                    <div class="form-group row">       
                      <label class="font-weight-bold"><strong>Subject</strong></label>
                                          </div>
                        <p>{{$contactDetails->subject}}</p>

                    <div class="form-group row">       
                       <label class="font-weight-bold"><strong>Message</strong></label>
                                         </div>
                   <p>{{$contactDetails->message}}</p>


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
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
                  
                   
                  <label class="font-weight-bold mb-4 mt-4"><strong>Reply User Below</strong></label>
                  <form method="post" action="{{url('admin/reply-contact-page/'.$contactDetails->id)}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="form-group row">       
                      <label>Name</label>
                      <input type="text" placeholder="Name" id="name" name="name" class="form-control mb-3"  value="{{$contactDetails->name}}" validate="name" required>
                    </div>
                    
                    <div class="form-group row">       
                      <label>Email</label>
                      <input type="email" placeholder="email" id="email" name="email" class="form-control mb-3"  value="{{$contactDetails->email}}" validate="email" required>
                    </div>
                    
                    <div class="form-group row">       
                      <label>Subject</label>
                      <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control mb-3" validate="name"  value="{{$contactDetails->subject}}" required>
                    </div>
                    
                    <div class="form-group row">       
                      <label>Message</label>
                      <textarea class="form-control" id="message" name="message" required></textarea>
                                         </div>
                   
                    <div class="form-group row text-center">       
                      <button type="submit" class="btn btn-success mt-3 btn-block" id="reply_user" name="reply_user">Reply</button>
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