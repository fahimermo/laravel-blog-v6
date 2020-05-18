   
<?php

use App\Http\Controllers\Controller;

 $blogCategoryDetails= Controller::blogCategoryDetails();

  $tagDetails= Controller::tagDetails();

?>





  <div class="widget categories">
            <header>
              <h3 class="h6">Blog Categories</h3>
            </header>
            @foreach ( $blogCategoryDetails as  $blogCategoryDetail)
            <div class="item d-flex justify-content-between"><a href="{{url('/each-category-posts/'.$blogCategoryDetail->category_name)}}">{{ $blogCategoryDetail->category_name}}</a><span>({{$blogCategoryDetail->posts->count() }})</span></div>@endforeach
           <!-- <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Sales</a><span>8</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Tips</a><span>17</span></div>
            <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>-->
          </div>
          <!-- Widget [Tags Cloud Widget]-->
          <div class="widget tags">       
            <header>
              <h3 class="h6">Tags</h3>
            </header>
             <ul class="list-inline">
                          @foreach ( $tagDetails->posts as  $tagDetail)

              <li class="list-inline-item"><a href="#" class="tag">{{ $tagDetail->post_tag}}</a></li>
             @endforeach
            </ul>