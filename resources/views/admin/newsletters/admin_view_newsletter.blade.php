@extends('layouts.backend_layout.backend_design')
    
@section('content')
<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">View Users Newsletter Emails </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">

          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Users Newsletter Email</h1>
          </header>
          <div class="row d-flex text-md-left ml-2 py-4">
          <a href="{{url('admin/export-newsletter-emails')}}" class="btn btn-success btn-lg">Export</a>
        </div>
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
              <h4>Newsletter Details</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                 
                </div>
                <div class="col-lg-6">
                
                </div>
              </div>
              <div class="table-responsive">
                <table id="Newsletter_table" style="width: 100%;" class="table">
                  <thead>
                    <tr>
                      <th> Id</th>
                      <th> Email</th>
                      <th> Status</th>
                      <th>created_at</th>
                        <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getNewsletters as  $getNewsletter)
                    <tr>
                      <td>{{$getNewsletter->id}}</td>
                   <td>{{$getNewsletter->email}}</td>
                   <td>@if($getNewsletter->status==1)
                     <a href="{{url('admin/update-newsletter-status/'.$getNewsletter->id.'/0')}}"><span style="color: green;">Active</span></a>
                     @else
               <a href="{{url('admin/update-newsletter-status/'.$getNewsletter->id.'/1')}}"><span style="color: red;">Inactive</span></a> 
                @endif
                 </td>
                   <td>{{$getNewsletter->created_at}}</td>
                  <td>
                    <div class=" btn btn- group">
                      <a href="{{url('admin/view-news-letter-subscribers/'.$getNewsletter->id)}}" class="btn btn-success">Edit</a>
                      <a href=""  class="btn btn-success" data-toggle="modal" data-target="#modalDeleteNewsletter{{$getNewsletter->id}}" role="button">Delete</a>

                    </div>
                  </td>

                    </tr>
                   @endforeach
                    
                  </tbody>

                  <!-- Modal: modalCoupon-->
               @foreach ( $getNewsletters as   $getNewsletter)

<div class="modal fade " id="modalDeleteNewsletter{{$getNewsletter->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Newsletter Delete Details</p>
        

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
      Are you Sure You want to Delete tHis Newsletter Email
       because You would not able to revert it 
      </div>

      <!--Footer-->
      <div class="modal-footer">
       <form method="post" action="{{url('admin/delete-news-letter-subscribers/'.$getNewsletter->id)}}">
      
        <input type="hidden" name="_token" value="{{csrf_token()}}">
      <a href="" class="btn btn-success" data-dismiss="modal"  role="button">Close</a>
       <a href="{{url('admin/delete-news-letter-subscribers/'.$getNewsletter->id)}}" class="btn btn-danger"  role="button">Delete</a></form>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
@endforeach
<!-- Modal: end of modalCoupon-->

                </table>
              </div>
            </div>
          </div>
        </div>
      </section>


  @endsection