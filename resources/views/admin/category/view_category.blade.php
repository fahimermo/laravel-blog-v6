@extends('layouts.backend_layout.backend_design')
    
@section('content')
<!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
            <li class="breadcrumb-item active">View Categories </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">View Categories Table</h1>
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
              <h4>Categories Detail</h4>
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
                      <th>Category Id</th>
                      <th>Category Name</th>
                      <th>Category URL</th>
                      <th>created_at</th>
                        <th>Actions</th>

                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($viewCategories as  $viewCategorie)
                    <tr>
                      <td>{{$viewCategorie->id}}</td>
                   <td>{{$viewCategorie->category_name}}</td>
                   <td>{{$viewCategorie->category_url}}</td>
                   <td>{{$viewCategorie->created_at}}</td>
                  <td>
                    <div class=" btn btn- group">
                      <a href="{{url('admin/edit-category/'.$viewCategorie->id)}}" class="btn btn-success">Edit</a>
                      <a href="{{url('admin/delete-category/'.$viewCategorie->id)}}"  onclick="return confirm('Are you sure you want to delete the record')" class="btn btn-success">Delete</a>

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
      </section>


  @endsection