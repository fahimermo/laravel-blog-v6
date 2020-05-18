@extends('layouts.backend_layout.backend_design')
    
@section('content')
<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">View Comments </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">View Comments Table</h1>
          </header>
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
              <h4>Comment Details</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                 
                </div>
                <div class="col-lg-6">
                
                </div>
              </div>
              <div class="table-responsive">
                <table id="category_table" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th>Comment Id</th>
                      <th>User Name</th>
                      <th>User Image</th>
                      <th>User Comment</th>
                      <th>created_at</th>
                        <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($adminViewUserComments as $adminViewUserComment)
                    <tr>
                      <td>{{$adminViewUserComment->id}}</td>
                   <td>{{$adminViewUserComment->user_name}}</td>
                   <td><img class="img-fluid w-25" src="{{asset('images/backend_image/admin_users/small/'.$adminViewUserComment->user_image)}}"></td>
                   <td>{{$adminViewUserComment->comment}}</td>
                   <td>{{$adminViewUserComment->created_at}}</td>
                  <td>
                    <div class=" btn btn-group">
                      <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalUserAdminComment{{$adminViewUserComment->id}}">View</a>
                      <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalUserAdminDeleteComment{{$adminViewUserComment->id}}">Delete</a>

                    </div>
                  </td>

                    </tr>
                   @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

 @foreach ($adminViewUserComments as $adminViewUserComment)

<div class="modal fade " id="modalUserAdminComment{{$adminViewUserComment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">View User Comments</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">Comment</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminViewUserComment->id}}
              </div>
            </div>
            <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">User Name</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminViewUserComment->user_name}}
              </div>
            </div>
            <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">User Image</span>
              <div class="col-lg-9 col-form-label form-control-label">
                  <img class="img-fluid w-25" src="{{asset('images/backend_image/admin_users/small/'.$adminViewUserComment->user_image)}}">
     
              </div>
            </div>

             <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">User Comment</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminViewUserComment->comment}}
              </div>
            </div>
           

            <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">Comment Date</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminViewUserComment->created_at}}
              </div>
            </div>

      </div>

      <!--Footer-->
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" >Close</button>
        
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
@endforeach



@foreach ($adminViewUserComments as $adminViewUserComment)

<div class="modal fade " id="modalUserAdminDeleteComment{{$adminViewUserComment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Delete User Comment</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      Are you sure you want to delete this Comment Details?
      
      </div>

      <!--Footer-->
      <div class="modal-footer">
        <form method="post" action="{{url('admin/delete-user-comment/'.$adminViewUserComment->id)}}')}}">
      
        <input type="hidden" name="_token" value="{{csrf_token()}}">
      <a href="{{url('admin/delete-user-comment/'.$adminViewUserComment->id)}}" class="btn btn-success"  role="button">Delete</a>
        </form>
 <a href="#" class="btn btn-success" data-dismiss="modal"  role="button">Dismiss</a>        
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
@endforeach

      </section>


  @endsection