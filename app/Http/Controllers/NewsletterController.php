<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsletterSubscriber;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    public function laraBlogCheckSubscriberNewsLetter(Request $request){
if ($request->ajax()) {
	$data=$request->all();

	//echo "<pre>"; print_r($data); die;

	$subscriberCount=NewsletterSubscriber::where('email', $data['subscriber_email'])->count();
	if ($subscriberCount>0) {
	
	          return response()->json(['newsletter'=>'subscriber']); // Return OK to user's browser

	}
}

      
}
public function laraBlogAddSubscriberNewsLetter(Request $request){

if ($request->ajax()) {
	$data=$request->all();

	//echo "<pre>"; print_r($data); die;

	$subscriberCount=NewsletterSubscriber::where('email', $data['subscriber_email'])->count();
	if ($subscriberCount>0) {
	
	   return response()->json(['exists'=>'ok']); // Return OK to user's browser
	}

	else{

		//add the email in the newsletter subscriber table

		$newsletter=new NewsletterSubscriber;
        
        $newsletter->email=$data['subscriber_email'];

        $newsletter->status=1;

       $saved= $newsletter->save();

       if ($saved) {
       	# code...
       }

        return response()->json(['saved'=>'yes']); // Return OK to user's browser

	}
}

}
public function adminViewNewsletter(){

	$getNewsletters=NewsletterSubscriber::get();

	return view('admin.newsletters.admin_view_newsletter')->with(compact("getNewsletters"));
}
public function adminUpdateNewsletter($id, $status){

NewsletterSubscriber::where('id', $id)->update(['status'=>$status]);
return redirect()->back()->with('flash_message_success', "You Successfully update the status");

}

public function adminDeleteNewsletterEmail($id){

	NewsletterSubscriber::where('id', $id)->delete();

	return redirect()->back()->with('flash_message_success', "You Successfully Deleted The Newsletter Email");

}
public function newsletterExportEmails(){


return Excel::download(new NewsletterExport, 'newsletter_subscribers.xlsx');

}
}
