<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Auth;
use Toastr;
use Redirect;
use Hash;
use Validator;
use Carbon\Carbon;
use App\Page;
use App\BanerSlide;
use Image;
use App\Member;
use App\UserProfile;

class AdminController extends Controller
{
    public function __construct(){
          $this->middleware('isAdmin');
    }

    public function homePage(){
        if(Auth::check()){
          if(Auth::user()->role == 'admin' || Auth::user()->role == 'merchant'){
            $userId = Auth::id();
            $nowDate = date("Y-m-d", time());
            $lastMonth = array(date('m')-1);
            $cruentYear = array(date('Y'));
            $lastYear = array(date('Y')-1);

          return view('Admin.index');
        }else{
           return redirect('/');
        }
        }else{
           return redirect('/login'); 
        }
        
    }

    public function index(){
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $user = User::where('is_activated',1)->orderBy('created_at','desc')->paginate(10);
            foreach ($user as $userData) {
                $userProfie = UserProfile::where('user_id',$userData->id)->first();
                $userData->gender = $userProfie ? $userProfie->gender : '';
                $userData->avatar = $userProfie ? $userProfie->logo : '';
            }
            return view('Admin.User.User-Show',['user' =>$user]);
          }
        }else{
              return redirect()->to('/login');
        }
    }

    public function userWithStatus($status){
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $user = User::where('is_activated',$status)->orderBy('created_at','desc')->paginate(10);
            return view('Admin.User.User-Show',['user' =>$user]);
          }
        }else{
              return redirect()->to('/login');
        }
    }

    public function SearchData(Request $request){
            $q = Input::get ( 'q' );
            /// Start user search by Name or email
            $user = User::where('name', 'like', '%'.$q.'%')
                 ->orWhere('email', 'like', '%'.$q.'%')
                 ->orderBy('created_at', 'desc')
                 ->paginate(10)->setPath ( '' );
                  $pagination = $user->appends ( array (
                  'q' => Input::get ( 'q' )
                  ) );
                if (count ($user) > 0){ //by user name data view
                      $total_row = $user->total(); //dd($total_row);
                    return view ('Admin.User.User-Show',compact('total_row','user'))->withQuery ( $q )->withMessage ($total_row.' '. 'User found match your search');
                 }else{ 
                    return view ('Admin.User-Show')->withMessage ( 'User not found match Your search !' );
                 }
        }       


    public function changePassGet(){
      if(Auth::check()){
            return view('Admin.ChangePassword');
      }else{
          return redirect()->to('/login');
      }
    }

    public function changePass(Request $request){
        $validate = $this->validate(request(),[
                        'current_password' => 'required',
                        'new_password' => 'required|confirmed|string|min:6',
                    ]);
                 if(!$validate){ 
                  Redirect::back()->withInput();
                }
              $data = $request->all();
              $user = User::find(auth()->user()->id);
              if(!Hash::check($data['current_password'], $user->password)){
                Toastr::error('The specified password does not match the database password', 'Error', ["positionClass" => "toast-top-right"]);
                        return back();
              }else{
                  $password = $request->new_password;
                  $user->update(['password' => Hash::make($password)]);
                 Toastr::success('Password Updated', 'Success', ["positionClass" => "toast-bottom-right"]);
                 return redirect()->to('/admin');
              }
    }

    public function verifyUser($id){
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $user = User::find($id);
            $user->is_activated = !$user->is_activated;
            $data['token'] = "";
            $user->update($data);
            Toastr::success('User Verified', 'Success', ["positionClass" => "toast-bottom-right"]);
                return back();
          }
        }else{
            return redirect()->to('/login');
        }
        }

    public function enableDisableUser($id){
      if(Auth::check()){
          if(Auth::user()->role == "admin"){
            $user = User::find($id);
            $user->suspend = !$user->suspend;
            $user->save();
            Toastr::success('User Suspend', 'Success', ["positionClass" => "toast-bottom-right"]);
                return back();
          }
      }else{
          return redirect()->to('/login');
      }
    }

    public function deleteUser($id){
          if(Auth::check()){
            if(Auth::user()->role == "admin"){
                $user = User::find($id);
                $user->delete();
                Toastr::success('User Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
                $url = '/admin/users';
                return redirect()->to($url);
            }
          }else{
            return redirect()->to('/login');
          }
    }

    //// Page Setup All function

    public function pageIndex()
    {
      if(Auth::check()){
    if(Auth::user()->role == "admin"){
        $pageSetup = BanerSlide::orderBy('created_at','desc')->paginate(8);
        return view('Admin.PageSetup.Show',['pageSetup' =>$pageSetup]);
      }
    }else{
        return redirect()->to('/login');
    }
    }
    
    public function pageCreate()
    {
      if(Auth::check()){
    if(Auth::user()->role == "admin"){
        $pages = Page::All();
        return view('Admin.PageSetup.Add',['pages' => $pages]);
      }
    }else{
        return redirect()->to('/login');
    }
    }

    public function pageStore(Request $request)
    {
        $validate = $this->validate($request, [
            'page_name' => 'required',
        ]);
        if(!$validate){
            Redirect::back()->withInput();
        }
        $data = request(['title','description','heading','sub_heading','button_text','button_link','page_name']);
        if($request->file('uploadFile')){
            foreach ($request->file('uploadFile') as $key => $value) {

                $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                $value->move(public_path('images/banner'), $imageName);
                $data['image'] =$imageName;
            }
        }
        if($request->page_name == "home"){
            $pageSetup = BanerSlide::create($data);
            Toastr::success('Banner Add', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/page-setup/show');
        }else{
          $pageNameCheck = BanerSlide::where('page_name', '=', $request->page_name)->first();
          if($pageNameCheck){
            Toastr::error('Page Banner Already Make', 'Sorry', ["positionClass" => "toast-bottom-right"]);
           return redirect()->back(); 
         }else{
           $pageSetup = BanerSlide::create($data);
            Toastr::success('Banner Add', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/page-setup/show'); 
         }   
        }
        
    }
    public function pageEdit($id)
    {
      if(Auth::check()){
    if(Auth::user()->role == "admin"){
        $pageSetup = BanerSlide::find($id);
        $pages = Page::All();
        return view('Admin.PageSetup.Edit',['pageSetup' =>$pageSetup, 'pages' => $pages]);
      }
}else{
    return redirect()->to('/login');
}
    }
    public function pageUpdate(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'page_name' => 'required',

        ]);
        if(!$validate){
            Redirect::back()->withInput();
        }
        $pageSetup = BanerSlide::find($id);
        $data = request(['title','description','heading','sub_heading','button_text','button_link','page_name']);
        if($request->file('uploadFile')){
            // remove image from directory file path
            $banner_image_path = public_path('/images/banner/'.$pageSetup->image);
            if(File::exists($banner_image_path)) {
                File::delete($banner_image_path);
            }
            foreach ($request->file('uploadFile') as $key => $value) {

                $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                $value->move(public_path('images/banner'), $imageName);
                $data['image'] = $imageName;
            }
            $pageSetup->update($data);
            Toastr::success('Banner updated', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/page-setup/show');
        }else{
            $pageSetup->update($request->all());
            Toastr::success('Banner updated', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/page-setup/show');
        }
 
    }
    public function pageDestroy($id)
    {
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
          $pageSetup = BanerSlide::find($id);
          $banner_image_path = public_path('/images/banner/'.$pageSetup->image);
            if(File::exists($banner_image_path)) {
                File::delete($banner_image_path);
            }
          $pageSetup->delete();
          Toastr::success('Banner Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
          return redirect()->to('/page-setup/show');
        }
      }else{
        return redirect()->to('/login');
      }
    }

    public function addMember(){
        $country_data =DB::table('countries')->select('id','name')->get();
        $state_data = DB::table("states")->select('id','name')->get();
        $city_data = DB::table("cities")->select('id','name')->get();
        return view('Admin.User.Add-Member',compact('country_data','state_data','city_data'));
    }

    public function storeMemberData(Request $request)
    {
            $validate = $this->validate(request(),[
                  'name'=>'required|string|max:50',
                  'phone'=> 'required|string|min:10|max:10',
                ]);
                if(!$validate){
                  Redirect::back()->withInput();
                }

                $email = $request->email;
                /// Check email record in database already exists or not
                if(sizeof(User::where('email','=',$email)->get()) > 0){
                  Toastr::error('Sorry User email exists!', 'Error', ["positionClass" => "toast-top-right"]);
                    return back();
                }
                $phone = $request->phone;
                /// Check phone record in database already exists or not
                if(sizeof(User::where('phone','=',$phone)->get()) > 0){
                  Toastr::error('Sorry User phone exists!', 'Error', ["positionClass" => "toast-top-right"]);
                    return back();
                }
            $lastMemberNumber = Member::orderBy('id', 'DESC')->pluck('member_code')->first(); 
             //dd($lastMemberNumber);
            if($lastMemberNumber){
                $getNumber = explode('SHG', $lastMemberNumber)[1]; 
                $newMemberNum = 'SHG'.str_pad($getNumber + 1, 6, "0", STR_PAD_LEFT); 
            }else{
              $newMemberNum = "SHG000001";
            }
            //dd($newMemberNum);

            $data = request(['pendant_no','name','email','phone','gender','date_of_birth','adhar_card_number','country','state','city','zipcode','address']);

            $data['refer_code'] = $request->refer_code ? $request->refer_code : "SHG000001";
            $data['member_code'] = $newMemberNum;
            $data['is_activated'] = 1;

            if($request->live_image){
                $img = $request->live_image;
                $folderPath = public_path("/images/user-logo/");
                $image_parts = explode(";base64,", $img); 
                //$image_type_aux = explode("image/", $image_parts[0]);
                //$image_type = $image_type_aux[1]; //dd($image_type);
              
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
                $data['logo'] = $fileName; 
              
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
            }

            if($request->logo){
                $image = $request->file('logo'); //dd($image);
                $data['logo'] = time().'.'.$image->getClientOriginalExtension();
             
                $filePath = public_path('/images/user-logo');

                $img = Image::make($image->path()); //dd($img);
                $img->resize(200, 200, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$data['logo']);
           
                $filePath = public_path('/images/oriznal');
                $image->move($filePath, $data['logo']);
            }
            $userData['name'] = $request->name;
            $userData['phone'] = $request->phone;
            $userData['email'] = $request->email;
            $userData['password'] = Hash::make($request->pendant_no);
            $userData['is_activated'] = 1;

            $userProfileData['phone_no'] = $request->phone;
            $userProfileData['gender'] = $request->gender;
            $userProfileData['date_of_birth'] = $request->date_of_birth;
            $userProfileData['address'] = $request->address;
            $userProfileData['country'] = $request->country;
            $userProfileData['state'] = $request->state;
            $userProfileData['city'] = $request->city;
            $userProfileData['zipcode'] = $request->zipcode;

            $user = User::create($userData);
            if($user){
                $data['user_id'] = $user->id;
                $member = Member::create($data);
                $userProfileData['user_id'] = $user->id;
                $userProfileData['logo'] = $member->logo;
                UserProfile::create($userProfileData);
            }
        Toastr::success('Member Added', 'Success', ["positionClass" => "toast-bottom-right"]);
        $url = '/admin/member/list';
        return redirect()->to($url);
    }

    public function editMember($id){
        $member = Member::find($id);
        $country_data =DB::table('countries')->select('id','name')->get();
        $state_data = DB::table("states")->select('id','name')->get();
        $city_data = DB::table("cities")->select('id','name')->get();
        return view('Admin.User.Edit-Member',compact('country_data','state_data','city_data','member'));
    }

    public function updateMemberData(Request $request, $id)
    {
            $validate = $this->validate(request(),[
                  'name'=>'required|string|max:50',
                ]);
                if(!$validate){
                  Redirect::back()->withInput();
                }

            $member = Member::find($id);

            $data = request(['pendant_no','name','email','phone','gender','date_of_birth','adhar_card_number','country','state','city','zipcode','address']);

            if($request->live_image){
                // remove image from directory file path
                $member_image_path = public_path('/images/user-logo/'.$member->logo);
                if(File::exists($member_image_path)) {
                    File::delete($member_image_path);
                }
                /// oriznal image remove
                $oriznal_image_path = public_path('/images/oriznal/'.$member->logo);
                if(File::exists($oriznal_image_path)) {
                    File::delete($oriznal_image_path);
                }

                $img = $request->live_image;
                $folderPath = public_path("/images/user-logo/");
                $image_parts = explode(";base64,", $img); 
                //$image_type_aux = explode("image/", $image_parts[0]);
                //$image_type = $image_type_aux[1]; //dd($image_type);
              
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = uniqid() . '.png';
                $data['logo'] = $fileName; 
              
                $file = $folderPath . $fileName;
                file_put_contents($file, $image_base64);
            }


            if($request->logo){
                // remove image from directory file path
                $member_image_path = public_path('/images/user-logo/'.$member->logo);
                if(File::exists($member_image_path)) {
                    File::delete($member_image_path);
                }
                /// oriznal image remove
                $oriznal_image_path = public_path('/images/oriznal/'.$member->logo);
                if(File::exists($oriznal_image_path)) {
                    File::delete($oriznal_image_path);
                }

                $image = $request->file('logo'); //dd($image);
                $data['logo'] = time().'.'.$image->getClientOriginalExtension();
             
                $filePath = public_path('/images/user-logo');

                $img = Image::make($image->path()); //dd($img);
                $img->resize(200, 200, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$data['logo']);
           
                $filePath = public_path('/images/oriznal');
                $image->move($filePath, $data['logo']);
            }
            
            $member->update($data);

        Toastr::success('Member Updated', 'Success', ["positionClass" => "toast-bottom-right"]);
        $url = '/admin/member/list';
        return redirect()->to($url);
    }

    public function memberVerify($id){
          if(Auth::check()){
            if(Auth::user()->role == "admin"){
                $member = Member::find($id);
                $data['is_activated'] = 1;
                $member->update($data);
                Toastr::success('Member Verified', 'Success', ["positionClass" => "toast-bottom-right"]);
                $url = '/admin/member/list';
                return redirect()->to($url);
            }
          }else{
            return redirect()->to('/login');
          }

    }

    public function deleteMember($id){
          if(Auth::check()){
            if(Auth::user()->role == "admin"){
                $member = Member::find($id);
                $member->delete();
                Toastr::success('Member Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
                $url = '/admin/member/list';
                return redirect()->to($url);
            }
          }else{
            return redirect()->to('/login');
          }
    }

}
