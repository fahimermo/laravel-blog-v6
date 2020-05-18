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
                 <!-- <form method="post" action="{{url('admin/multiple-delete-posts')}}" enctype="multipart/form-data"  novalidate="novalidate">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">-->
              <div class="table-responsive">
                <table id="viewpost_table" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th>..</th>
                      <th>Id</th>
                      <th>Post Author</th>
                      <th>Post Title</th>
                      <th>Post Category</th>
                       <th>Date Created</th>
                      <th>Post Image</th>
                      <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $viewPosts as   $viewPost)
                    <tr>
                      <td>
                <div class="form-check">
                 <input type="checkbox" class="form-check-input" id="del_post" name="del_post[]" >
                 <label class="form-check-label" for="checked"></label>
                  </div>
                </td>
                      <td>{{ $viewPost->id}}</td>
                   <td>{{ $viewPost->author_name}}</td>
                   <td>{{ $viewPost->post_title}}</td>
                   <td>{{ $viewPost->cat_name}}</td>
                    <td>{{ $viewPost->created_at}}</td>
                    <td><img class="img-fluid w-25" src="{{asset('images/backend_image/admin_users/small/'.$viewPost->post_image)}}"></td>
                    
                  <td>
                   <div class="btn-group" role="group" aria-label="Basic example">
                  <a  data-toggle="modal" data-target="#modalPost{{$viewPost->id}}"> <button type="button" class="btn btn-success btn-sm" title="view Category">View</button></a>
                  <a href="{{ url('admin/edit-post/'.$viewPost->id)}}"><button type="button" class="btn btn-success btn-sm" title="Edit Category">Edit</button></a>
                <a href="{{url('admin/delete-post/'.$viewPost->id)}}" onclick="return confirm('Are you sure you want to delete the record')" id="delete"><button type="button" class="btn btn-success btn-sm" title="Delete Category">Delete</button></a>


                      </div>                 
                      </td>
                    </tr>
             
                      @endforeach

                  </tbody>

                </table>
              </div>
                           <!-- <div class="row d-flex justify-content-center mt-4">
    
  <button  type="button" data-toggle="modal" data-target="#modalDeleteSelectedPosts" 
   class="btn btn-success text-center " id="d" disabled>Delete Selected Posts</button>
</div>
<!-- Modal: modalCoupon-->
               
@foreach (  $viewPosts  as    $viewPost)
<div class="modal fade " id="modalDeleteSelectedPosts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Delete Multiple Posts</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body text-justify">
        Are you sure you want to delete all these selected Posts?Because you will not able to revert it
             </div>

      <!--Footer-->
      <div class="modal-footer">
         <a href="#" class="btn btn-success" data-dismiss="modal" role="button">Close</a>

             
     <button type="submit" class="btn btn-danger" data-toggle="modal" >Delete</button><!--</form>-->
        
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

@endforeach

<hr>
 


                  <!-- Modal: modalCoupon-->
               @foreach ( $viewPosts as   $viewPost)

<div class="modal fade " id="modalPost{{$viewPost->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">View Post Details</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <table >
          <tr>
            <td>
              <span class="font-weight-bold mb-2">Post Author</span><br>
              {{$viewPost->author_name}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Post Title</span><br>
              {{$viewPost->post_title}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Post Category</span><br>
              {{$viewPost->cat_name}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Post Content</span><br>
              {{$viewPost->post_contents}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Post Image</span><br>
              <img class="img-fluid w-25" src="{{asset('images/backend_image/admin_users/small/'.$viewPost->post_image)}}">
            </td></tr>
            <tr>
            <td>
            <span class="font-weight-bold mb-2">Post Tag(s)</span><br>
              {{$viewPost->post_tag}}</td></tr>
              <tr>
              <td>
                <span class="font-weight-bold mb-2">Post Status</span><br>
              {{$viewPost->post_status}}</td></tr>
              <tr>
             <td>
                <span class="font-weight-bold mb-2">Post Feature</span><br>
              {{$viewPost->post_feature}}</td></tr>
            

          
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