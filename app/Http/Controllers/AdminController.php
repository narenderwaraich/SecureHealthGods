<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use Toastr;
use Redirect;
use Hash;
use Validator;
use Carbon\Carbon;
use App\Page;
use App\BanerSlide;
use Image;
use Illuminate\Support\Facades\File;

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
            return view('Admin.User-Show',['user' =>$user]);
          }
        }else{
              return redirect()->to('/login');
        }
    }

    public function userWithStatus($status){
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $user = User::where('is_activated',$status)->orderBy('created_at','desc')->paginate(10);
            return view('Admin.User-Show',['user' =>$user]);
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
                    return view ('Admin.User-Show',compact('total_row','user'))->withQuery ( $q )->withMessage ($total_row.' '. 'User found match your search');
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

}
