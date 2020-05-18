@extends('layouts.backend_layout.backend_design')
    
@section('content')
<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{'admin/dashboard'}}">Home</a></li>
            <li class="breadcrumb-item active">View User </li>
          </ul>
        </div>
      </div>
      <section>
       
        <div class="container-fluid">
           
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">View User Table</h1>
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
              <h4>User Details</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                 
                </div>
                <div class="col-lg-6">
                
                </div>
              </div>
               <!--<form method="post" action="{{url('admin/multiple-users-delete')}}" enctype="multipart/form-data"  novalidate="novalidate">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">-->
              <div class="table-responsive">
                <table id="user_table" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th>..</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Date Registered</th>
                       <th>Image</th>
                        <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($adminUserDetails as $adminUserDetail)
                    <tr>
                        <td>
                <div class="form-check">
                 <!--<input type="checkbox" class="form-check-input" id="del_user" name="del_user[]" >-->
                 <label class="form-check-label" for="checked"></label>
                  </div>
                </td>
                   <td>{{$adminUserDetail->name}}</td>
                   <td>{{$adminUserDetail->email}}</td>
                   <td>{{$adminUserDetail->created_at}}</td>
                   <td><img class="img-fluid w-25" src="{{asset('images/backend_image/admin_users/small/'.$adminUserDetail->user_image)}}"></td>
                  <td> <div class="btn-group" role="group" aria-label="Basic example">
                  <a  data-toggle="modal" data-target="#modalUserAdmin{{$adminUserDetail->id}}"> <button type="button" class="btn btn-success btn-sm" title="view Category">View</button></a>
                  <a href="{{url('admin/edit-user/'.$adminUserDetail->id)}}"><button type="button" class="btn btn-success btn-sm" title="Edit User">Edit</button></a>
                <a  href="{{url('admin/delete-user/'.$adminUserDetail->id)}}" onclick="return confirm('Are you sure you want to delete this User record')" id="delete"><button type="button" class="btn btn-success btn-sm" title="Delete User">Delete</button></a>


                      </div></td>

                      @endforeach
                    </tr>
             
                  </tbody>
                </table>
              </div>


            <!--   <div class="row d-flex justify-content-center mt-4">
    
  <button  type="button" data-toggle="modal" data-target="#modalDeleteSelectedUsers" 
   class="btn btn-success text-center " id="d" disabled>Delete Selected Users</button>
</div>
<!-- Modal Multiple Delete
               
 @foreach ($adminUserDetails as $adminUserDetail)
<div class="modal fade " id="modalDeleteSelectedUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content
    <div class="modal-content">
      <!--Header-
      <div class="modal-header">
        <p class="heading">Delete Multiple Users</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body
      <div class="modal-body text-justify">
        Are you sure you want to delete all these selected Users?Because you will not able to revert it
             </div>

      <!--Footer-
      <div class="modal-footer">
         <a href="#" class="btn btn-success" data-dismiss="modal" role="button">Close</a>

             
     <button type="submit" class="btn btn-danger" data-toggle="modal" >Delete</button></form>
        
      </div>
    </div>
    <!--/.Content
  </div>
</div>

@endforeach-->


                <!-- Modal: modalCoupon-->
                    @foreach ($adminUserDetails as $adminUserDetail)

<div class="modal fade " id="modalUserAdmin{{$adminUserDetail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">View User Details</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">User Name</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminUserDetail->name}}
              </div>
            </div>
            <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">User Email</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminUserDetail->email}}
              </div>
            </div>

            <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">Date Registered</span>
              <div class="col-lg-9 col-form-label form-control-label">
                {{$adminUserDetail->created_at}}
              </div>
            </div>

              <div class="form-group row">
              <span class="col-lg-3 col-form-label form-control-label font-weight-bold ">User Image</span>
              <div class="col-lg-9 col-form-label form-control-label">
                  <img class="img-fluid w-25" src="{{asset('images/backend_image/admin_users/small/'.$adminUserDetail->user_image)}}">
     
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
            </div>
          </div>
        </div>
      </section>


  @endsection