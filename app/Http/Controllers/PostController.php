<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Image;
use Session;
use App\Admin;
use App\Comment;
use App\User;
use Auth;
use DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost(Request $request){

     try{

        if($request->isMethod('post')){
            
            $data=$request->all();
                   
         if ( empty($data['fullname']) || empty($data['title']) || empty($data['category']) || empty($data['cat_name']) || 
          empty($data['content'])  || empty($data['tag'])){

                 return redirect()->back()->with('flash_message_error','You can not submit an empty field');

             }

              //$admin->email=$data['email'];
            $adminCountPost=Post::where(['post_title' => $data['title']])->count();
            
            if($adminCountPost>0){
                
                return redirect()->back()->with('flash_message_error','The Post title is already exist!');
            }
           


              $post=new Post;
              $post->author_name=$data['fullname'];
              $post->author_image=$data['author_image'];
              $post->post_title=$data['title'];
              $post->category_id=$data['category'];
              $post->cat_name=$data['cat_name'];
              $post->post_contents=$data['content'];

                    //upload image
            
            if($request->hasFile('image')){
                
                $image_tmp= $request->file('image');
                
                if($image_tmp->isValid()){
                    
                    //image resize
                    
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename=rand(111, 99999).'.'.$extension;
                    $large_image_path="images/backend_image/admin_users/large/".$filename;
                    $medium_image_path="images/backend_image/admin_users/medium/".$filename;
                    $small_image_path="images/backend_image/admin_users/small/".$filename;
                    
                    //resize image
                    
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(200,200)->save($small_image_path);
                    
                    //store image in admin table
                    $post->post_image=$filename;
            
                      
            }
        }         



               $post->post_tag=$data['tag'];
               //$post->post_title=$data['post_title'];
               

              if (empty($data['feature'])) {

              $data['feature']=0;

             }
             else{

               $data['feature']=1;

                 }
             
              
             if (empty($data['status'])) {

                  $data['status']=0;

              
             }
             else{
                      $data['status']=1;
            
             }


              $post->post_feature=$data['feature'];
              $post->post_status=$data['status'];
              $post->post_views=0;

             
                  $post->save();

                  return redirect()->back()->with('flash_message_success',"You successfully add the post");
     
     }
   

    	$selectCategories=Category::all();

      $adminDetails=Admin::where(['email'=>Session::get('BackSession')])->first();
}
 catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                //dd('Duplicate Entry');


      return redirect()->back()->with('flash_message_error','duplication error');
 
            }
           }


    return view('admin.posts.add_post')->with(compact("selectCategories","adminDetails"));

    	//return view('admin.posts.add_post');    
    }





    public function viewPosts(Request $request, $id= null){

        

  $viewPosts=Post::get();

   return view('admin.posts.view_posts')->with(compact("viewPosts"));

  
       
}

public function deletePost(Request $request, $id=null){

 $postDelete=Post::where(['id'=>$id])->first();
        
         $large_image_paths='images/backend_image/admin_users/small/';
            
            $medium_image_paths='images/backend_image/admin_users/medium/';
            
            $small_image_paths='images/backend_image/admin_users/large/';
            
             //Delete Image permenently from product table begins 

            //Delete Large image if not exist
            
            if(file_exists($large_image_paths. $postDelete->post_image)){
                
            unlink($large_image_paths. $postDelete->post_image);    
            }


            //Delete Large image if not exist
            
            if(file_exists($small_image_paths. $postDelete->post_image)){
                
            unlink($small_image_paths. $postDelete->post_image);    
            }
            
            
            //Delete Medium image if not exist
            
            if(file_exists($medium_image_paths. $postDelete->post_image)){
                
            unlink($medium_image_paths. $postDelete->post_image);    
            }

            
              Post::where(['id'=>$id])->delete();
 
              return redirect()->back()->with('flash_message_success','Product has been Successfully Deleted');


}

public function multiplePostDelete(Request $request){


if ($request->isMethod("post")) {

  $data=$request->all();

 // $postDelete=Post::where('id' ,'>' ,0)->pluck('id')->toArray();

  $postDeletes=Post::where('id' ,'>' ,0)->get();


 
   foreach ($postDeletes as $postDelete) {
      # code...
    
 
    # code...
  

   // $postDeletes=Post::where(['id'=> $id])->get();
//}
  $large_image_paths='images/backend_image/admin_users/small/';
            
            $medium_image_paths='images/backend_image/admin_users/medium/';
            
            $small_image_paths='images/backend_image/admin_users/large/';
            
             //Delete Image permenently from product table begins 

            //Delete Large image if not exist
            
            if(file_exists($large_image_paths. $postDelete->post_image)){
                
            unlink($large_image_paths. $postDelete->post_image);    
            }


            //Delete Large image if not exist
            
            if(file_exists($small_image_paths. $postDelete->post_image)){
                
            unlink($small_image_paths. $postDelete->post_image);    
            }
            
            
            //Delete Medium image if not exist
            
            if(file_exists($medium_image_paths. $postDelete->post_image)){
                
            unlink($medium_image_paths. $postDelete->post_image);    
            }
}
       

//$del_id=$request->input('del_feedback');

Post::whereIn('id', $data['del_post'])->delete();

return redirect()->back()->with("flash_message_success","you Successfully Deleted The Selected Post(s)");


}
}



public function editPost(Request $request, $id=null){

      try {
            //DB::table('users')->insert($userData);  
      

if ($request->isMethod('post')) {
     
     $data=$request->all();  

       if (empty($data['title']) || empty($data['category']) || empty($data['cat_name']) || empty($data['content']) || empty($data['tag'])){

                 return redirect()->back()->with('flash_message_error','You can not submit an empty field');

             }
 

     
     if (empty($data['feature'])) {

              $data['feature']=0;

             }
             else{

               $data['feature']=1;

                 }
             
              
             if (empty($data['status'])) {

                  $data['status']=0;

              
             }
             else{
                      $data['status']=1;
            
             }         

              
                   //$post->session_id=$session_id;


       if($request->hasFile('image')){
                
                $image_tmp=$request->file('image');
                
                if($image_tmp->isValid()){
                    
                    //image resize
                    
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename=rand(111, 99999).'.'.$extension;
                    $large_image_path="images/backend_image/admin_users/small/".$filename;
                    $medium_image_path="images/backend_image/admin_users/medium/".$filename;
                    $small_image_path="images/backend_image/admin_users/large/".$filename;
                    
                    //resize image
                    
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(200,200)->save($small_image_path);
   
    }
  }
     
     $post_edit= Post::find($id);


 // name of the file
      //new image uploaded
if(!empty($_FILES['image']['name'])){

     $post_edit->post_title=$data['title'];

     $post_edit->category_id=$data['category'];

     $post_edit->cat_name=$data['cat_name'];

     $post_edit->post_contents=$data['content'];

     $post_edit->post_image=$filename;

     $post_edit->post_tag=$data['tag'];

     $post_edit->post_feature=$data['feature'];

     $post_edit->post_status=$data['status'];

          $post_edit->save();

return redirect('admin/view-posts')->with('flash_message_success','Product has been updated Successfully');
           }
      
   else{

       $post_edit->post_title=$data['title'];

     $post_edit->category_id=$data['category'];

     $post_edit->cat_name=$data['cat_name'];

     $post_edit->post_contents=$data['content'];

     $post_edit->post_tag=$data['tag'];

     $post_edit->post_feature=$data['feature'];

     $post_edit->post_status=$data['status'];

          $post_edit->save();

return redirect('admin/view-posts')->with('flash_message_success','Product has been updated Successfully');
           }
        
   
   
           }
         
      //get product details

      $cat_dropdownss=Category::get();
      
   
     $postDetails=Post::where(['id' => $id])->first();

      $categories_dropdownss='<option selected disabled>Select</option>';

       foreach ($cat_dropdownss as $cat_dropdown) {
         
         if ($cat_dropdown->id ==$postDetails->category_id) {
           
           $selected='selected';
         }
         else{
          $selected='';
}
       
                   $categories_dropdownss.="<option value='".$cat_dropdown->id."'".$selected.">".$cat_dropdown->category_name."</option>";
}

   $cat_dropdowns=Category::get();
      
   
     $postDetails=Post::where(['id' => $id])->first();


 $categories_dropdowns='<option selected disabled>Select</option>';

       foreach ($cat_dropdowns as $cat_dropdownn) {
         
         if ($cat_dropdownn->id ==$postDetails->category_id) {
           
           $selecteds='selected';
         }
         else{
          $selecteds='';
}
       
                   $categories_dropdowns.="<option value='".$cat_dropdownn->category_name."'".$selecteds.">".$cat_dropdownn->category_name."</option>";
}
        
}

catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                //dd('Duplicate Entry');


      return redirect()->back()->with('flash_message_error','Duplication Error');
 
            }
           }

      return view('admin.posts.edit_post')->with(compact('postDetails','categories_dropdowns', 'categories_dropdownss'));

}
public function deletePostImage(Request $request, $id=null){

        //Get the product Image Name
            
            $postImage= Post::where(['id'=>$id])->first();
            
                    
            //Get Product Image Paths
            
            $large_image_path="images/backend_image/admin_users/small/";
            $medium_image_path="images/backend_image/admin_users/medium/";
            $small_image_path="images/backend_image/admin_users/large/";
            
            //Delete Large image if not exist
            
            if(file_exists($large_image_path.$postImage->post_image)){
                
            unlink($large_image_path.$postImage->post_image);    
            }
            
            
            //Delete Medium image if not exist
            
            if(file_exists($medium_image_path.$postImage->post_image)){
                
            unlink($medium_image_path.$postImage->post_image);    
            }
            
            //Delete Small image if not exist
            
            if(file_exists($small_image_path.$postImage->post_image)){
                
            unlink($small_image_path.$postImage->post_image);    
            }
            
            //Delete image from the table
            
       // Post::where(['id'=>$id])->update(['post_image'=>'']);
     
            $post_edit_image= Post::find($id);

            $post_edit_image->post_image="";

            $post_edit_image->save();
        
         return redirect()->back()->with('flash_message_success','product Image has been deleted Successfully');
        

}




    public function selectCategory(){
       
      $selectCategories=Category::get();

      return view('admin.posts.add_post')->with(compact("selectCategories"));

    }
    public function postCategoryDetail(Request $request, $id=null, $category_name=null, $post_title=null){

          // $user_email=Auth::user()->email;


         $categoryDetails=Category::with('posts')->get();

       $categoryCountName= Category::where(['category_name'=>$category_name,'category_status'=>1])->count();

         // $categoryCountName=Category::where([' category_name'=> $category_name])->count();

         $postDetail=Post::with('comments')->where('id', $id)->first();
         
         //count post
        $postDetailCount=Comment::with('post')->where('post_id', $id)->count();

        $relatedPosts=Post::where('id','!=', $id)->where(['category_id'=>$postDetail->category_id])->get();

        //$user_email=Auth::user()->email;

       $userDetails=User::where(['email'=>Session::get('UserLoginSession')])->first();




return view('blog.read_post')->with(compact("categoryDetails","postDetail","relatedPosts",
  "categoryCountName","userDetails","postDetailCount"));

    }

public function userSearchBlog(Request $request, $cat_name=null, $id=null, $category_name=null){

if ($request->isMethod('post')) {
  
  $data=$request->all();


 $searchCategoryName= Category::with('posts')->where(['category_name'=>$category_name,'category_status'=>1])->get();

  //in Descending order 
   // $allPosts= Post::orderBy('id','DESC')->where('post_status', 1)->get();

   $latestBlogPosts= Post::orderBy('created_at', 'DESC')->where('post_status', 1)->paginate(6);

    $blogCategoryDetails=Category::with('posts')->get();


  $search_blog=$data['search'];

  $allPosts=Post::where('cat_name', 'like', '%'.$search_blog.'%' )->orwhere('post_title', $search_blog)->where('post_status', 1)->get();


 // $check_search=Post::where()
//$admin->email=$data['email'];
            $countPostSearch=Post::where(['cat_name' => $data['search']])->count();
            
            if($countPostSearch==0){
                return view('search.search_post')->with(compact("countPostSearch","searchCategoryName","allPosts","latestBlogPosts","blogCategoryDetails"), 'flash_message_error','The post(s) category is not exist');

               // return redirect('/user-search-blog')->with(compact("countPostSearch","searchCategoryName","allPosts","search_blog","latestBlogPosts","blogCategoryDetails"), 'flash_message_error','The post(s) category is exist');
            }
            else{
            
  //$postDetail=Post::first();

 return view('search.search_post')->with(compact("countPostSearch","searchCategoryName","allPosts","search_blog","latestBlogPosts","blogCategoryDetails"));


  //echo "<pre>"; print_r($data); die;
}
}
}
 

    public function addBlogPostComment(Request $request, $id=null){
    
     if ($request->isMethod('post')) {
            
            $data=$request->all();

             if (Auth::check()) {
      
      $user_id=Auth::user()->id;

      $user_image=User::where('id', $user_id)->first();
      }


           // return $data; die;
        
        $comment=new Comment;

        $comment->post_id=$data['post_id'];
        
        $comment->category_id=$data['category_id'];

        $comment->user_name=$data['user_name'];

         $comment->user_image=$user_image->user_image;

         $comment->comment=$data['user_comment'];

         $comment->save();

        return redirect()->back();


    }


}
 public function userGetComment(Request $request, $id=null){
       
        $commentDetails=Post::with('comments')->where('id', $id)->first();

        return redirect()->back()->with(compact("commentDetails"));
    }

    public function eachCategoryPosts($category_name, $id=null){

    // $each_category_posts=Category::with('posts')->where('category_name',$category_name)->where('category_status', 1)->first();

        $adminDetail=Admin::where('status', 1)->where(['email' => Session::get('BackSession')])->first();


        $each_category_posts=Post::with('category')->where('post_status', 1)->orderBy('id','DESC')
        ->paginate(6);


     $latestBlogPosts= Post::orderBy('created_at', 'DESC')->where('post_status', 1)->take(3)->get();

      $countPostComments=Post::with('comments')->where('id', $id)->get();

    return view('admin.posts.each_category_posts')->with(compact("each_category_posts","adminDetail","latestBlogPosts","countPostComments"));
    }

}