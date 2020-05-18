<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
//use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
//use Illuminate\Http\RedirectResponse;
use Session;
use Auth;
use App\User;
use Image;

class UserController extends Controller
{
    public function register(Request $request){
      if ($request->isMethod('post')) {

      	$data=$request->all();

          
        if (empty($data['name'])  || empty($data['email']) || empty($data['password'])){

                 return redirect()->back()->with('flash_message_error','You can not register with an empty field');

             }
      	
      	$email_verify=User::where(['email'=> $data['email']])->count();

            if ($email_verify>0) {

            	return redirect()->back()->with('flash_message_error','The email is already exist');
            }



            else{

            

            $user=new User;


            	$user->name=$data['name'];

            	$user->email=$data['email'];

            	$user->password=bcrypt($data['password']);

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
                    $user->user_image=$filename;
            
                       }
            }

            if ($user->user_status=="") {

               $user->user_status=0;
             }
             else{

              $user->user_status=1;
             }
             
            $user->user_status=1;


            	$user->save();

   // $remember_me = $request->has('remember_me') ? true : false; 
if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
          Session::put('UserLoginSession', $data['email']);
          return redirect('/');
            	}
            }
      }

       return view('user.user_register');
    }



    public function login(Request $request){

    	if ($request->isMethod('post')) {
    		
    		$data=$request->all();

        if ( empty($data['email']) || empty($data['password'])){

                 return redirect()->back()->with('flash_message_error','You can not log in with an empty field');

             }

              // $remember= $request->remember; 

                // $remember = $data['remember']? true : false; 


    		if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
    			Session::put('UserLoginSession', $data['email']);

         //if (Auth::viaRemember()) {
   

    			return redirect('/');
    		//}
      }
    		else{

         return redirect()->back()->with('flash_message_error','Invalid email or password');
    		}
    	}
    	return view('user.user_login');
    }


    public function userResetEmail(){

      return view("user.user_email");
    }
    
    public function userSetPassword(Request $request){

  try{
      if ($request->isMethod('post')) {
        
        $data=$request->all();

        $this->validate($request,[

           'email' => 'required|email',


              ]);


        $userAccount=User::where('email', $data['email'])->count();

        if ($userAccount==0) {

               return redirect()->back()->with('flash_message_error','This email  does not exist');
 
       }
            //get user details

               $userDetails=User::where('email', $data['email'])->first();

             //generate random password
         // $randomPassword=Str::random(12);  

          //encode new password
          //$newPassword=$randomPassword;

          //

          //User::where('email', $data['email'])->update(['password'=>bcrypt($newPassword)]);

          //send forhgot password email code
          $email=$data['email'];

          $name=$userDetails->name;

          $messageData=[
             'email' => $email,
             'name' =>  $name,
              //'password' => $newPassword,
              'link' => 'http://127.0.0.1:8000/user-reset-forgot-password'


          ];

          Mail::send('emails.forgot_password', $messageData, function($message) use($email){

            $message->to($email)->subject('New Passord -Lara Blog');

          } );

      return redirect()->back()->with('flash_message_success','Check Your email in order to reset your Password');

        
    }
  }

catch(ErrorException $e) {


      return redirect()->back()->with('flash_message_error','This email  is not exist with us');
 
              }
           

            return view('user.user_email');

    
        
    }

    public function userCheckPassword(Request $request){
      
      $data=$request->all();

     // echo "<pre>"; print_r($data); die;

      $current_password=$data['current_password'];

      $user_id=Auth::user()->id;

      $check_password=User::where('id', $user_id)->first();

      $c=Hash::check($current_password, $check_password->password);

      if ($c) {
        return response()->json(['status'=>'Hooray']);
      }

          


    }

public function userChangePassword(){

  return view('user.user_changepassword');
}


public function userUpdatePassword(Request $request){

 //route view

      if ($request->isMethod('post')) {

        $data=$request->all();

                 $this->validate($request,[

           'new_password' => 'required|min:10',                

            'password_confirmation' => 'required|same:new_password'


              ]);


      $user_id=Auth::user()->id;

      $old_password=User::where('id', $user_id)->first();


      $current_password=$data['current_password'];
if (Hash::check($current_password, $old_password->password)) {
  //update password

  $new_password=bcrypt($data['new_password']);

  User::where('id', $user_id)->update(['password'=>$new_password]);

   //return redirect("/user-dashboard/".$user_id);

   return redirect()->back()->with("flash_message_success","You Successfully Changed Your Password");


}
else{
  return redirect()->back()->with("flash_message_error","The Current password  is Incorrect");
}


       // echo '<pre>'; print_r($data);  die;
      }
    
 //return view('user.user_changepassword');

}

public function userCallPassword(Request $request){



try{
      if ($request->isMethod('post')) {
        
        $data=$request->all();


          $this->validate($request,[

           'password' =>'required|min:10|regex:/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',


              ]);


        $userAccount=User::where('email', $data['email'])->count();

        if ($userAccount==0) {

               return redirect()->back()->with('flash_message_error','This email  does not exist');
 
       }
               
          //encode new password
          $newPassword=bcrypt($data['password']);

          //

          User::where('email', $data['email'])->update(['password'=>$newPassword]);

         
      return redirect('/user-login');

        
    }
  }

catch(ErrorException $e) {


      return redirect()->back()->with('flash_message_error','This email  is not exist with us');
 
              }  
           

  return view('user.user_password');
}

public function userDashboard(Request $request, $id=null){

           $user_id=Auth::user()->id;
    
              $user_profileDetails= User::where(['id'=>$user_id])->first();
  if ($request->isMethod('post')) {
    # code...
  
        if ($_FILES['user_image']['size'] == 0 || $_FILES['user_image']['error'] == 0){

   return redirect()->back()->with('flash_message_error','Error in uploading or Empty field');


        }

        $this->validate($request, [
            'user_image'=>'required|image|mimes:jpg,jpeg,png,gif'
           ]);



   if($request->hasFile('user_image')){
                
                $image_tmp= $request->file('user_image');
                
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

                         
                            User::where('id', $user_id)->update(['user_image'=>$filename]);

                                    return redirect()->back()->with('flash_message_success','Your Profile Picture has been updated Successfully');

                }        
            }

              
            
  return view('user.user_dashboard')->with(compact("user_profileDetails"));
}


  
    public function logout(){
    	Session::flush();
        
         return redirect('/');
    }

    
}
