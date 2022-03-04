<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Redirect;
use Toastr;
use Validator;
use App\Contact;
use Auth;
use App\User;
use Mail;
use App\Mail\ContactReply;
use App\BanerSlide;
use App\Mail\SendEMail;

class ContactController extends Controller
{
    public function get(){
        $banner = BanerSlide::where('page_name','=','contact-us')->first(); //dd($banner);
          if (isset($banner)) {
              $title = $banner->title;
              $description = $banner->description;
          }
            return view('contact-us',compact('title','description'),['banner' =>$banner]); 
    }
    public function store(Request $request){
    $validate = $this->validate(request(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:255',
            'phone-number'=>'required|string|max:10|min:10',
            'message'=>'required|string|max:255',
          ]);
          if(!$validate){
            Redirect::back()->withInput();
          }
          $data = request(['name','message','email','phone-number']);
          Contact::create($data);
    Toastr::success('Message Sent', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/');
   } 


   public function contactUs(Request $request){
    $validate = $this->validate(request(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:255',
            'message'=>'required|string|max:255',
          ]);
          if(!$validate){
            Redirect::back()->withInput();
          }
          $data = request(['name','message','email']);
          Contact::create($data);
    Toastr::success('Message Sent', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/');
   }
   
   public function getContact(){
          $contacts = Contact::where('status','=',"Pending")->get(); //dd($contacts);
          $getContacts = Contact::orderBy('created_at','desc')->paginate(10); //dd($contacts);
        return view('Admin.contact',compact('contacts'),['getContacts' =>$getContacts]);
   }
   
   public function contactReplyGet($id){
        $contact = Contact::find($id); //dd($contact);
        return view('Admin.contactReply',compact('contact'));
   }

   public function contactReply(Request $request){
      $email = $request->email;
      $reply = $request->reply;
      $mesg_id = $request->id;
      $status['status'] = "Reply";
      Contact::where('id',$mesg_id)->update($status);
      Mail::to($email)->send(new ContactReply($reply));
      Toastr::success('Message Reply', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
   }

   public function sendMailView(){
    if(Auth::check()){
    if(Auth::user()->role == "admin"){
        return view('Admin.send-Mail');
        }
    }else{
        return redirect()->to('/login');
    }
   }

   public function sendMail(Request $request){
      $email = $request->email;
      $subject = $request->subject;
      $message = $request->message;
      $data = [];
      $data['message'] = $message;
      $data['subject'] = $subject;
      Mail::to($email)->send(new SendEMail($data));
      Toastr::success('Mail Send', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->to('/admin');
   }


   public function SendNotificationMail(Request $request){
          $alluser = User::All(); //dd($alluser);
          foreach ($alluser as $user) {
          $subject = $request->subject;
          $message = $request->message;
          $data = [];
          $data['message'] = $message;
          $data['subject'] = $subject;
          Mail::to($user->email)->send(new SendEMail($data));
          }
      return response()->json(['success'=>"Mail Sent successfully."]);
   }
}