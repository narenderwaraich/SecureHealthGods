<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Redirect;
use Toastr;
use Validator;
use App\Contact;
use Auth;
use App\User;
use Mail;
use App\BanerSlide;
use App\MerchantAccount;

class ContactController extends Controller
{
    
    
    // public function get(){
    //     $banner = BanerSlide::where('page_name','=','contact-us')->first(); //dd($banner);
    //     if (isset($banner)) {
    //         $title = $banner->title;
    //         $description = $banner->description;
    //     }
    //     if(Auth::check()){
    //         $userId = Auth::id();
    //         $cartCollection = CartStorage::where('user_id',$userId)->get();
    //         $subTotal = DB::table("cart_storages")->where('user_id',$userId)->sum('subtotal');
    //         return view('contact',compact('title','description'),['banner' =>$banner, 'cartCollection' =>$cartCollection, 'subTotal' => $subTotal]);
    //     }else{
    //         return view('contact',compact('title','description'),['banner' =>$banner]);
    //     }
    // }


    public function store(Request $request){
        $validate = $this->validate(request(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:255',
            'message'=>'required|string|max:255',
          ]);
          if(!$validate){
            Redirect::back()->withInput();
          }
          $data = request(['name','email','message','merchant_id']);
          $query = Contact::create($data);
        Toastr::success('Message Sent', 'Success', ["positionClass" => "toast-bottom-right"]);
        return back();
   } 

   public function getContact(){
    if(Auth::check()){
    if(Auth::user()->role == "merchant"){
          $userId = Auth::id();
          $merchant = MerchantAccount::where('user_id',$userId)->first();
          $merchantId = $merchant ? $merchant->id : '';
          if($merchantId){
            $getContacts = Contact::where('merchant_id',$merchantId)->orderBy('created_at','desc')->paginate(10); //dd($getContacts);
        }else{
            $getContacts = [];
        }
          return view('Admin.contact',['getContacts' =>$getContacts]);
        }
    }else{
        return redirect()->to('/login');
    }
   }
   
   public function contactReplyGet($id){
    if(Auth::check()){
    if(Auth::user()->role == "merchant"){
        $contact = Contact::find($id); //dd($contact);
        return view('Admin.contactReply',['contact' =>$contact]);
        }
    }else{
        return redirect()->to('/login');
    }
   }

   public function contactMarkReply($id){
    if(Auth::check()){
    if(Auth::user()->role == "merchant"){
        $status['status'] = "Reply";
        Contact::where('id',$id)->update($status);
        Toastr::success('Message mark reply', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
        }
    }else{
        return redirect()->to('/login');
    }
   }

   public function contactReply(Request $request){
      $email = $request->email;
      $reply = $request->reply;
      $mesg_id = $request->id;
      $status['status'] = "Reply";
      $status['reply_message'] = $reply;
      Contact::where('id',$mesg_id)->update($status);
      Mail::to($email)->send(new ContactReply($reply));
      if (Mail::failures()) {
        // return response showing failed emails
        Toastr::error('Message not Send', 'Error', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
      }
      Toastr::success('Message Reply', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/contact-us');
   }


   /// term-of-services page
   public function termOfServices(){
        $banner = BanerSlide::where('page_name','=','term-of-services')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = '';
            $description = '';
        }
        return view('term-of-services',compact('title','description','banner'));

   }

   /// privacy-policy page
   public function privacyPolicy(){
        $banner = BanerSlide::where('page_name','=','privacy-policy')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = '';
            $description = '';
        }
        return view('privacy-policy',compact('title','description','banner'));
   }

}