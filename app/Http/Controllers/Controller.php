<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Admin;
use App\User;
use App\Category;
use App\Post;
use App\Comment;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function adminDetails(){
        
        $adminDetails=Admin::where(['email'=>Session::get('BackSession')])->first();
        
        return $adminDetails;
         
         
    }

    public static function userDetails(){

 $userDetails=User::where(['email'=>Session::get('UserLoginSession')])->first();

 return $userDetails;

    }


  public static function tagDetails(){

 $tagDetails= Category::with('posts')->orderBy('id','DESC')->where('category_status', 1)->first();

 return $tagDetails;

    }

public static function blogCategoryDetails(){


  $blogCategoryDetails = Category::with('posts')->orderBy('id','DESC')->where('category_status', 1)->get();

  return  $blogCategoryDetails;

}

 public static function userDetail(){

$user_email=Auth::user()->email;

 $userDetail=User::where('email', $user_email)->first();

  return $userDetail;

    }

   /* public static function postViews($id){

   $postView=Post::where('id', $id)->first();

   //foreach ($postViews as $postView) {
     # code...
   

   $blogKey='blog_'.$postView->id;

   if (!Session::has($blogKey)) {
          
   $postView->increment('post_views');

   Session::put($blogKey, 1);
                       }
        // }

         return $postView;                      

    }*/

    
}
