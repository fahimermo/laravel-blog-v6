<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Cms;
use App\ContactUs;

class CmsController extends Controller
{
    public function adminCmsPage(Request $request){


        if($request->isMethod('post')){
            
            $data=$request->all();
            if (empty($data['meta_title'])) {
              
              $data['metal_title']="";
            }
             if (empty($data['meta_description'])) {
              
              $data['meta_description']="";
            }
             if (empty($data['meta_keyword'])) {
              
              $data['metal_keyword']="";
            }

             
           if (empty($data['status'])) {

              $data['status']=0;
        }
        else{

             $data['status']=1;
        } 
           
           $cms_title=Cms::where(['title' => $data['title']])->count();

           if ($cms_title>0) {
           	
           return redirect()->back()->with('flash_message_error',"This CMS Page is already exist");

           }
           
            
              $cms=new Cms;
              $cms->title=$data['title'];
              $cms->cms_url=$data['cms_url'];
              $cms->description=$data['description'];
              $cms->meta_title=$data['meta_title'];
              $cms->meta_description=$data['meta_description'];
              $cms->meta_keyword=$data['meta_keyword'];
             
                 $cms->status=$data['status'];
                  $cms->save();

           return redirect('admin/view-cms-pages')->with('flash_message_success',"You succefully saved CMS Page");
         
     
     }


  return view('admin.cms_pages.cms_page');
}
public function adminViewCmsPage(){

 $adminCmsDetails=Cms::get();

	return view('admin.cms_pages.admin_viewcms')->with(compact("adminCmsDetails"));
}






public function adminEditCmsPage(Request $request, $id=null){

try{
   if($request->isMethod('post')){
            
            $data=$request->all();
            
           if(empty($data['status'])){
                
                $data['status']=0;
            }
                else{
                    $data['status']=1;
                }


           
         Cms::where(['id'=>$id])->update(['title'=>$data['title'], 'cms_url'=>$data['cms_url'], 'description'=>$data['description'],'meta_title'=>$data['meta_title'] ,  'meta_description'=> $data['meta_description'], 'meta_keyword' => $data['meta_keyword'], 'status'=>$data['status']]); 
                    
            return redirect('admin/view-cms-pages')->with('flash_message_success','Cms Updated Successfully');
        }
        $CmsDetails_admin= Cms::where(['id'=>$id])->first();
}


 catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                //dd('Duplicate Entry');


      return redirect()->back()->with('flash_message_error','Duplicate Entry!');
 
            }
           }   

       // return view('admin.Cms.edit_categories')->with(compact('CmsDetails_admin'));
     


	return view('admin.cms_pages.admin_editcms')->with(compact("CmsDetails_admin"));
}

   public function adminDeleteCmsPage($id=null){

   	Cms::where(['id'=>$id])->delete();

   	return redirect('admin/view-cms-pages')->with('flash_message_success','You Successfully Deleted the Cms Page');



   }
  /* public function adminCmsPage($url){

    $cmsPageCount=Cms::where(['cms_url'=>$url])->count();

    if ($cmsPageCount>0) {
      
      $cmsPageDetails=Cms::where(['cms_url'=>$url])->first();

      $meta_title=$cmsPageDetails->meta_title;

      $meta_description=$cmsPageDetails->meta_description;

      $meta_keyword=$cmsPageDetails->meta_keyword;
    }
    else{

      abort(404);
    }
 $viewCategories=Category::get();


  return view('admin.category.view_category')->with( compact("viewCategories","cmsPageDetails","metal_title","meta_description","meta_keyword"));

   }  */

    public function userContactForm(Request $request){

if ($request->isMethod('post')) {
  
  $data=$request->all();

         $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'subject'=>'required',
        'message' => 'required'
        ]);

     


  //echo "<pre>"; print_r($data); die;
  $email="mt4real@yopmail.com";

  $messageData=[
        
        'name'=>$data['name'],

        'email'=>$data['email'],

        'subject'=>$data['subject'],

        'comment'=>$data['message'],
  ];
  Mail::send('emails.enquiry', $messageData, function($message) use ($email){

    $message->to($email)->subject("Enquiry from Larablog");
  });
//save the message for admin to access it

  $contact_us=new ContactUs;

  $contact_us->name=$data['name'];
  
  $contact_us->email=$data['email'];

  $contact_us->subject=$data['subject'];

    $contact_us->message=$data['message'];

  $contact_us->save();

  return redirect('/user-contact')->with('flash_message_success', "Thanks for the Enquiry We will get back to you soon");
}
      return view("admin.cms_pages.user_contact");
    }

    public function cmsPage($url){

    //redirect to error 404 page if not exist or disabled

      $cmsPageCount=Cms::where(['url' =>$url, 'status'=>1])->count();
      if ($cmsPageCount>0) {

        $cmsPageDetails=Cms::where('url', $url)->first();

      }
      else{
        abort(404);
      }
     
     return view('pages.cms_page')->with(compact("cmsPageDetails"));

    }

      public function faq(){

      return view('admin.cms_pages.faq');
    }
  
}
