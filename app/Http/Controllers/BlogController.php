<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Admin;
use App\Comment;
use App\Counter;
use Session;
use Event;
use DB;


class BlogController extends Controller
{
    public function blog(){

        
  $adminDetail=Admin::where('status', 1)->where(['email' => Session::get('BackSession')])->first();

        //in Descending order 
    $allPosts =Post::with('comments')->where('post_status', 1)->orderBy('id','DESC')->paginate(6);
   
      //latest posts on the blog
     $latestBlogPosts= Post::with('comments')->where('post_status', 1)->orderBy('created_at', 'DESC')->take(3)->get();

       
      return view('blog.blog', ['adminDetail' => $adminDetail,'allPosts'=>$allPosts ,
       'latestBlogPosts'=>$latestBlogPosts]);

    }

   
 
}
