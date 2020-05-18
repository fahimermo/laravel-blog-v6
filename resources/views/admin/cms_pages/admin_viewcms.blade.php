@extends('layouts.backend_layout.backend_design')
    
@section('content')
<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">View CMS Page</li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">View CMS Table</h1>
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
                <table id="viewcms_cms" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th>..</th>
                      <th>Page Id</th>
                      <th>Title</th>
                      <th>URL</th>
                      <th>Status</th>
                       <th>Date Created</th>
                      <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                @foreach($adminCmsDetails as $adminCmsDetail)
                    <tr>
                      <td>
                <div class="form-check">
                 <input type="checkbox" class="form-check-input" id="checked" name="checked" >
                 <label class="form-check-label" for="checked"></label>
                  </div>
                </td>
                      <td>{{$adminCmsDetail->id}}</td>
            
                   <td>{{$adminCmsDetail->title}}</td>
                   <td>{{$adminCmsDetail->cms_url}}</td>
                   <td>{{$adminCmsDetail->status}}</td>
                     <td>{{$adminCmsDetail->created_at}}</td>


                  <td>
                   <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="#modalViewCms{{$adminCmsDetail->id}}" class="btn btn-success" data-toggle="modal">View</a>
                  <a href="{{url('admin/edit-cms-page/'.$adminCmsDetail->id)}}" class="btn btn-success">Edit</a>
                  <a href="" class="btn btn-success"  id="delete" data-toggle="modal" data-target="#modalDeleteCms{{$adminCmsDetail->id}}">Delete</a>
                      </div>                 
                      </td>
                    </tr>
             
                    @endforeach
                  </tbody>

                </table>
              </div>



                  <!-- Modal: modalCoupon-->

                  @foreach($adminCmsDetails as $adminCmsDetail)

<div class="modal fade " id="modalViewCms{{$adminCmsDetail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">View Cms Page Details</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <table class="text-justify">
          <tr>
            <td>
              <span class="font-weight-bold mb-2">Id</span><br>
              </td><td>{{$adminCmsDetail->id}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Title</span><br>
              </td><td>{{$adminCmsDetail->title}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Cms URL</span><br>
              </td><td>{{$adminCmsDetail->cms_url}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Description</span><br>
            </td><td>{{$adminCmsDetail->description}}</td></tr>
              <tr>
              <td>
              <span class="font-weight-bold mb-2">Meta Title</span><br>
              
            </td><td>{{$adminCmsDetail->meta_title}}</td></tr>
            <tr>
            <td>
            <span class="font-weight-bold mb-2">Meta Description</span><br>
              </td><td class="text-justify">{{$adminCmsDetail->meta_description}}</td></tr>
              <tr>
              <td>
                <span class="font-weight-bold mb-2">Meta Keyword</span><br>
            </td><td>{{$adminCmsDetail->meta_keyword}}</td></tr>
              <tr>
             <td>
                <span class="font-weight-bold mb-2">Status</span><br>
              </td><td>{{$adminCmsDetail->status}}</td></tr>
             <tr>
             <td>
                <span class="font-weight-bold mb-2">Date Created</span><br>
              </td><td>{{$adminCmsDetail->created_at}}</td></tr>
            
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





  @foreach($adminCmsDetails as $adminCmsDetail)

<div class="modal fade " id="modalDeleteCms{{$adminCmsDetail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Delete Cms Page</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
       Are you Sure You want to delete this Cms Page
      </div>

      <!--Footer-->
      <div class="modal-footer">
        <form action="{{url('admin/delete-cms-page/'.$adminCmsDetail->id)}}" method="post">
        <button type="submit" class="btn btn-danger" data-dsimiss="modal">Delete</button></form>
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