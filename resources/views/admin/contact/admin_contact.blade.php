@extends('layouts.backend_layout.backend_design')
    
@section('content')
<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">View Posts </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">View Post Table</h1>
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
              <h4>View Posts</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                 
                </div>
                <div class="col-lg-6">
                
                </div>
              </div>
              <div class="table-responsive">
                <table id="viewpost_table" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th>..</th>
                      <th>Id</th>
                      <th>User Name</th>
                      <th>User Email</th>
                      <th>Subject</th>
                       <th>Message</th>
                      <th>Date Created</th>
                      <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $admin_getcontacts as   $admin_getcontact)
                    <tr>
                      <td>
                <div class="form-check">
                 <input type="checkbox" class="form-check-input" id="checked" name="checked" >
                 <label class="form-check-label" for="checked"></label>
                  </div>
                </td>
                      <td>{{ $admin_getcontact->id}}</td>
                   <td>{{ $admin_getcontact->name}}</td>
                   <td>{{ $admin_getcontact->email}}</td>
                   <td>{{ $admin_getcontact->subject}}</td>
                   <td>{{ $admin_getcontact->message}}</td>
                    <td>{{ $admin_getcontact->created_at}}</td>
                    
                  <td>
                   <div class="btn-group" role="group" aria-label="Basic example">
                  <a  data-toggle="modal" data-target="#modalContact{{$admin_getcontact->id}}"> <button type="button" class="btn btn-success btn-sm" title="view Contact">View</button></a>
                  <a href="{{ url('admin/reply-contact-page/'.$admin_getcontact->id)}}"><button type="button" class="btn btn-success btn-sm" title="Reply Contact ">Reply</button></a>
                <a href="{{url('admin/delete-post/'.$admin_getcontact->id)}}" onclick="return confirm('Are you sure you want to delete the record')" id="delete"><button type="button" class="btn btn-success btn-sm" title="Delete Ca">Delete</button></a>

                      </div>                 
                      </td>
                    </tr>
             
                      @endforeach

                  </tbody>

                </table>
              </div>



                  <!-- Modal: modalCoupon-->
               @foreach ( $admin_getcontacts as   $admin_getcontact)

<div class="modal fade " id="modalContact{{$admin_getcontact->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">View User Contact Details</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <table >
          <tr>
            <td>
              <span class="font-weight-bold mb-2">User Name</span><br>
              {{$admin_getcontact->name}}</td></tr>
              <br>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">User Email</span><br>
              {{$admin_getcontact->email}}</td></tr>
              <br>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Subject</span><br>
              {{$admin_getcontact->subject}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Message</span><br>
              {{$admin_getcontact->message}}</td></tr>
              
        </table>
      
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
<!-- Modal: end of modalCoupon-->

            </div>
          </div>
        </div>
      </section>


  @endsection