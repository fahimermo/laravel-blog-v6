<?php
 
$curren_month=date("M");

$last_month=date("M", strtotime("-1 month"));

$last_two_month=date("M", strtotime("-2 month"));

$dataPoints = array(
  array("y" => $last_two_month_users, "label" => $last_two_month),
  array("y" => $last_month_users, "label" => $last_month),
  array("y" =>$current_month_users , "label" => $curren_month),
  //array("y" => 5, "label" => "Wednesday"),
 //// array("y" => 10, "label" => "Thursday"),
 // array("y" => 0, "label" => "Friday"),
 // array("y" => 20, "label" => "Saturday")
);
 
?>




@extends('layouts.backend_layout.backend_design')
    
@section('content')


        <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Number of Categories</strong><span>Current Categories</span>
                  <div class="count-number">{{$admincountCategories}}</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-padnote"></i></div>
                <div class="name"><strong class="text-uppercase">No of Blog Posts</strong><span>Current Blog Posts</span>
                  <div class="count-number">{{ $admincountPosts}}</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-check"></i></div>
                <div class="name"><strong class="text-uppercase">No of Comment</strong><span>Current comment post</span>
                  <div class="count-number">{{ $admincountComments}}</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name"><strong class="text-uppercase">No of Users</strong><span>Current Users</span>
                  <div class="count-number">{{ $admincountUsers}}</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-list"></i></div>
                <div class="name"><strong class="text-uppercase">No of Admins</strong><span>Current admins</span>
                  <div class="count-number">{{ $admincountAdmins}}</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                
                <div class="name"><strong class="text-uppercase"></strong><span></span>
                  <div class="count-number"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
              <!--You will find Javascript for this in backend_design.blade.php  -->
              <div id="chartContainer" style="height: 370px; width: 100%;"></div>

            </div>
          </div>
        </div>
      </section>
    

@endsection