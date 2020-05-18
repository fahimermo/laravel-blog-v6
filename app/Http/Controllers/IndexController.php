<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Newsletter;

class IndexController extends Controller
{
    //
    public function index(){

  $latestPosts =Post::orderBy('created_at', 'DESC')->where('post_status', 1)->orderBy('created_at', 'DESC')->take(6)->get();

  $latestPostFeatures=Post::orderBy('created_at', 'DESC')->where('post_status', 1)->paginate(4);

    	return view('index')->with(compact("latestPosts","latestPostFeatures"));
    }


}
