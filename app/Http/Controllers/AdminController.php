<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;
use App\Admin;
use Session;
use Auth;
use App\User;
use App\Comment;
use App\Category;
use App\Post;
use App\Cms;
use App\ContactUs;
use App\ReplyMessages;
use Carbon\Carbon;




class AdminController extends Controller
{
   public function dashboard(){
 $admincountCategories=Category::count();
 $admincountPosts=Post::count();
  $admincountComments=Comment::count();
  $admincountUsers=User::count();
  $admincountAdmins=Admin::count();


 $current_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)->count(); 

     $last_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->subMonth(1))->count(); 

  $last_two_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->subMonth(2))->count(); 




   	return view('admin.dashboard')->with(compact("admincountCategories","admincountPosts","admincountUsers","admincountComments","admincountAdmins","current_month_users","last_month_users","last_two_month_users"));
   }
   public function register(){

   	   	return view('admin.admin_register');

   }
   public function adminRegister(Request $request){

     
          
        if($request->isMethod('post')){
            
            $data=$request->all();

             if (empty($data['fullname'])  || empty($data['email']) || empty($data['password']) || empty($data['status']) ||

              empty($filename)){

                 return redirect()->back()->with('flash_message_error','Any field can not be left empty');

             }
            //$admin->email=$data['email'];
            $adminCountEmail=Admin::where(['email' => $data['email']])->count();
            
            if($adminCountEmail>0){
                
                return redirect()->back()->with('flash_message_error','The Email already exist!');
            }
                   
            else{

              $admin=new Admin;
              $admin->fullname=$data['fullname'];
              $admin->email=$data['email'];
              $admin->password=bcrypt($data['password']);
             
             if ($admin->status=="") {

               $admin->status=1;
             }
             else{

              $admin->status=0;
             }
             
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
                    $admin->image=$filename;
            
                       }
            }

                  $admin->save();

            if 
               (Auth::guard('admin')->attempt(['email'=> $data['email'], 'password'=>$data['password']])){

           Session::put('BackSession', $data['email']);

           return redirect('admin/dashboard');


                             }

         
     }
     }
    }


    
   public function adminLogin(Request $request){


     if($request->isMethod('post')){
            
            $data=$request->all();

            if ( empty($data['email']) || empty($data['password'])){

                 return redirect()->back()->with('flash_message_error','You can not log in with an empty field');

             }

         if 
               (Auth::guard('admin')->attempt(['email'=> $data['email'], 'password'=>$data['password']])){

           Session::put('BackSession', $data['email']);

           return redirect('admin/dashboard');


                             }
            
            
        else{
            
            //echo "failed"; die;
            
            return redirect()->back()->with('flash_message_error',' invalid email or password');
        }
        }

   	return view('admin.admin_login');
   }

   public function adminUserDetails(){

   $adminUserDetails=User::get();

    return view('admin.user.view_user')->with(compact("adminUserDetails"));
   }

   public function adminDeleteUser($id=null){

     //Get the product Image Name
            
            $user_image= User::where(['id'=>$id])->first();
            
                    
            //Get Product Image Paths
            
            $large_image_path="images/backend_image/admin_users/small/";
            $medium_image_path="images/backend_image/admin_users/medium/";
            $small_image_path="images/backend_image/admin_users/large/";
            
            //Delete Large image if not exist
            
            if(file_exists($large_image_path.$user_image->user_image)){
                
            unlink($large_image_path.$user_image->user_image);    
            }
            
            
            //Delete Medium image if not exist
            
            if(file_exists($medium_image_path.$user_image->user_image)){
                
            unlink($medium_image_path.$user_image->user_image);    
            }
            
            //Delete Small image if not exist
            
            if(file_exists($small_image_path.$user_image->user_image)){
                
            unlink($small_image_path.$user_image->user_image);    
            }
       

    User::where(['id'=>$id])->delete();

    return redirect()->back()->with('flash_message_error',"You successfully Delete the user");
   }

   public function adminEditUser(Request $request, $id=null){

   
  try {
            //DB::table('users')->insert($userData);  
      

if ($request->isMethod('post')) {
     
     $data=$request->all();  

       if ( empty($data['name']) || empty($data['email']) || empty($data['image'])){

                 return redirect()->back()->with('flash_message_error','You can not submit an empty field');

             }
 
if (empty($data['status'])) {

               $data['status']=0;
             }
             else{

              $data['status']=1;
             }
             

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

       


  User::where(['id'=>$id])->update(['name'=>$data['name'], 'email' => $data['email'], 'user_image'=>$filename, 'user_status' => $data['status']]);
        
        return redirect('admin/view-user-details')->with('flash_message_success','User has been updated Successfully');
}
 $userDetails=User::where(['id' => $id])->first();
}

catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                //dd('Duplicate Entry');


      return redirect()->back()->with('flash_message_error','Duplication Error');
 
            }
           }

return view('admin.user.edit_user')->with(compact("userDetails"));
   }



   public function deleteUserImage(Request $request, $id=null){

        //Get the product Image Name
            
            $user_image= User::where(['id'=>$id])->first();
            
                    
            //Get Product Image Paths
            
            $large_image_path="images/backend_image/admin_users/small/";
            $medium_image_path="images/backend_image/admin_users/medium/";
            $small_image_path="images/backend_image/admin_users/large/";
            
            //Delete Large image if not exist
            
            if(file_exists($large_image_path.$user_image->user_image)){
                
            unlink($large_image_path.$user_image->user_image);    
            }
            
            
            //Delete Medium image if not exist
            
            if(file_exists($medium_image_path.$user_image->user_image)){
                
            unlink($medium_image_path.$user_image->user_image);    
            }
            
            //Delete Small image if not exist
            
            if(file_exists($small_image_path.$user_image->user_image)){
                
            unlink($small_image_path.$user_image->user_image);    
            }
            
            //Delete image from the table
            
        User::where(['id'=>$id])->update(['user_image'=>'']);
        
         return redirect()->back()->with('flash_message_success','User Image has been deleted Successfully');
        

}

public function readAdminPassword(Request $request, $id=null){



   $data=$request->all();
    $old_password=$data['password'];
       //$adminOldPassword=Admin::where(['email'=>Session::get('BackSession'), 'password'=>bcrypt($data['password'])])->first(); 

                  // $adminOldPassword=Auth::guard('admin')->user()->password;

    $admin= Admin::find($id);
if (Hash::check($old_password, $admin['password'])) {
    // Success

           echo "true"; 
        } 
    else{
        
        echo "false"; 
    } 
}

public function adminChangePassword(Request $request){

        if ($request->isMethod('post')) {

        $data=$request->all();

                 $this->validate($request,[

           'new_password' => 'required|min:10',                

            'confirm_password' => 'required|same:new_password'


              ]);


      $user_id=Auth::guard('admin')->user()->id;

      $old_password=Admin::where('id', $user_id)->first();


      $current_password=$data['old_password'];
if (Hash::check($current_password, $old_password->password)) {
  //update password

  $new_password=bcrypt($data['new_password']);

  Admin::where('id', $user_id)->update(['password'=>$new_password]);

  return redirect()->back()->with("flash_message_success","You have Changed Your Password Successfully");

}
else{
  return redirect()->back()->with("flash_message_error","The Current Password  is Incorrect");
}


       // echo '<pre>'; print_r($data);  die;
      }


  return view('admin.settings.admin_changepassword');
}

public function adminResetPassword(Request $request, $id=null){

   
   // $seller_id=auth('purchaser')->id();
  if ($request->isMethod('post')) {
  $data=$request->all();


     // echo "<pre>"; print_r($data); die;

      $old_password=$data['old_password'];

            $admin_id =Auth::guard('admin')->user()->id; 

           // $admin_id=auth('admin')->id;

      $check_passwordee=Admin::where('id', $admin_id)->first();

      if (Hash::check($old_password, $check_passwordee->password)) {

       // return "true";
       return response()->json(['success'=>'lara']); // Return OK to user's browser

      }  
}
}

public function adminForgotPassword(Request $request, $id=null){


if($request->isMethod('post')){
            
            $data=$request->all();

            if ( empty($data['email']) || empty($data['password'])){

                 return redirect()->back()->with('flash_message_error','You can not log in with an empty field');

             }
              $adminCountEmail=Admin::where(['email' => $data['email']])->count();
            
            if($adminCountEmail==0){
                
                return redirect()->back()->with('flash_message_error','The Email does not Exist');
            }
           

         if 
               (Auth::guard('admin')->attempt(['email'=> $data['email'], 'password'=>$data['password']])){

            $new_password=bcrypt($data['password']);

           User::where('id', $id)->update(['password'=>$new_password]);

           Session::put('BackSession', $data['email']);

           return redirect('/admin');


                             }
            
            
       // else{
            
            //echo "failed"; die;
            
            //return redirect('admin/login')->with('flash_message_error',' invalid email or password');
        //}
        }

  return view("admin.settings.admin_forgotpassword");
}

public function viewComments(){

$adminViewUserComments=Comment::get();

  return view('admin.comment.Admin_viewcomments')->with(compact("adminViewUserComments"));
}
public function adminDeleteUserComment($id=null){

    Comment::where(['id'=>$id])->delete();

    return redirect()->back()->with('flash_message_success',"You successfully Delete the comment");

}

public function adminGetContactDetails(Request $request){

$admin_getcontacts=ContactUs::get();
  return view('admin.contact.admin_contact')->with(compact("admin_getcontacts"));
}

public function adminReplyContact(Request $request, $id=null){

    
            //DB::table('users')->insert($userData);  
      

if ($request->isMethod('post')) {
     
     $data=$request->all();  


       if (empty($data['name']) || empty($data['message'])){

                 return redirect()->back()->with('flash_message_error','You can not submit an empty field');

        }

        
          $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'subject'=>'required',
        'message' => 'required'
        ]);

  //echo "<pre>"; print_r($data); die;
  $email=$data['email'];

  $messageData=[
        
        'name'=>$data['name'],

        'email'=>$data['email'],

        'subject'=>$data['subject'],

        'comment'=>$data['message'],
  ];
  Mail::send('emails.admin_reply', $messageData, function($message) use ($email){

    $message->to($email)->subject("Reply for an Enquiry");
  }); 

   $admin_reply=new ReplyMessages;

   $admin_reply->name=$data['name'];
  
   $admin_reply->email=$data['email'];

   $admin_reply->subject=$data['subject'];

   $admin_reply->message=$data['message'];

   $admin_reply->save();

 return redirect('admin/reply-admin-sent-message
')->with('flash_message_success', "Reply Enquiry has Successfully Sent");
}
        
        //return redirect()->back()->with('flash_message_success','Message sent successfully');


 
$contactDetails=ContactUs::where(['id' => $id])->first();
  
      return view('admin.contact.admin_reply')->with(compact('contactDetails'));

}


public function adminReplyMessagesSent(){

$admin_reply_messages=ReplyMessages::orderBy('created_at','DESC')->get();
  return view('admin.contact.admin_reply_message')->with(compact("admin_reply_messages"));
}

public function adminDeleteReplyMessagesSent($id=null){

ReplyMessages::where(['id'=>$id])->delete();
  return redirect()->back()->with("flash_message_success", "You successfully Delete The Reply Message(s)");
}

public function adminManageAccount(Request $request, $id=null){
   
            try {
     
if ($request->isMethod('post')) {
     
    $data=$request->all();  


           $request->validate([
        'full_name'=>'required',
        'email'=> 'required|email'
        
      ]);

     
          Admin::where(['id'=>$id])->update(['fullname'=>$data['full_name'], 'email'=>$data['email']]);
        
        return redirect()->back()->with('flash_message_success','Your Profile has been updated Successfully');
           }
 }


 catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                //dd('Duplicate Entry');


      return redirect()->back()->with('flash_message_error','This Email is already Exist');
 
            }
           }

 
    $admin_profileDetails=Admin::where('email', Session::get('BackSession'))->first();


  return view('admin.account.admin_manageaccount')->with(compact("admin_profileDetails"));

}

    public function adminProfileImage(Request $request, $id=null){


              //$admin_image= Admin::where(['id'=>$id])->first();

       if ($_FILES['admin_image']['size'] == 0 || $_FILES['admin_image']['error'] == 0){

   return redirect()->back()->with('flash_message_error','Error in uploading or Empty field');


        }

        $this->validate($request, [
            'admin_image'=>'required|image|mimes:jpg,jpeg,png,gif'
           ]);


   if($request->hasFile('admin_image')){
                
                $image_tmp= $request->file('admin_image');
                
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
                    
                    
                       }

                         
                            Admin::where('id', $id)->update(['image'=>$filename]);

                                    return redirect()->back()->with('flash_message_success','Your Profile Picture has been updated Successfully');

                        
            }

          }






public function viewUsersChart(){

 $current_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->month)->count(); 

     $last_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->subMonth(1))->count(); 

  $last_two_month_users=User::whereYear('created_at', Carbon::now()->year)
                        ->whereMonth('created_at', Carbon::now()->subMonth(2))->count(); 


                        return view('admin.dashboard')->with(compact("current_month_users","last_month_users","last_two_month_users"));

}



public function multipleUserDelete(Request $request){

  if ($request->isMethod("post")) {

        $data=$request->all();   

        //$postDeletes=Post::get($id);

            $ids = $data['del_user'];
foreach ($ids as $id) {

        //$post_id->id;

        $postDelete=Post::find($id)  ;    

        //$postDeletes=Post::where(['id'=> $del['del_user']])
                            //->where('post_image', $post_image)
                            //->get();
       // $img_array = array();
        //foreach(explode(',', $vehicles->images) as $img) {
        //foreach (explode(',', $postDeletes->post_image) as $img) {
            $large_image_paths='images/backend_image/admin_users/small/';

            $medium_image_paths='images/backend_image/admin_users/medium/';

            $small_image_paths='images/backend_image/admin_users/large/';
          
            if(file_exists($large_image_paths.$postDelete->post_image)){
                $img_l= $large_image_paths.$postDelete->post_image;
            }

            if(file_exists($small_image_paths.$postDelete->post_image)){
                $img_s = $small_image_paths.$postDelete->post_image;
            }

            if(file_exists($medium_image_paths.$postDelete->post_image)){
                $img_m= $medium_image_paths.$postDelete->post_image;
            }

            //array_push($img_array,$img);
            File::delete(public_path($img_l));
            File::delete(public_path($img_s));
            File::delete(public_path($img_m));
        }

        
        Post::whereIn('id', $data['del_user'])->delete();

        return redirect()->back()->with("flash_message_success","you Successfully Deleted The Selected Users(s)");
    }  
}


   public function adminLogout(){

   	Session::flush();
   	return redirect('/admin')->with("flash_message_success","You Successfully LogOut");
   }
}
