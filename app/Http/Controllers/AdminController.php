<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BanerSlide;
use Illuminate\Support\Facades\Input;
use Toastr;
use Auth;
use Redirect;
use Validator;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Question;
use App\Models\Category;
use App\Models\Contact;
use App\Models\TestQuestion;
use App\Models\Page;
use App\Models\SubscribeApprovel;
use App\Models\payments;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::check()){
            $findRole = User::find(Auth::id());
            $role = $findRole->role;
            if($role == "admin"){
                $php = "Php";
                $phpCategoryId = Category::where('name',$php)->first()->id;
                $phpQuestion = Question::where('category_id',$phpCategoryId)->count();
                $phpTestQuestion = TestQuestion::where('category_id',$phpCategoryId)->count();

                $laravel = "Laravel";
                $laravelCategoryId = Category::where('name',$laravel)->first()->id;
                $laravelQuestion = Question::where('category_id',$laravelCategoryId)->count();
                $laravelTestQuestion = TestQuestion::where('category_id',$laravelCategoryId)->count();

                $wordpress = "Wordpress";
                $wordpressCategoryId = Category::where('name',$wordpress)->first()->id;
                $wordpressQuestion = Question::where('category_id',$wordpressCategoryId)->count();
                $wordpressTestQuestion = TestQuestion::where('category_id',$wordpressCategoryId)->count();

                $gk = "GK";
                $gkCategoryId = Category::where('name',$gk)->first()->id;
                $gkQuestion = Question::where('category_id',$gkCategoryId)->count();
                $gkTestQuestion = TestQuestion::where('category_id',$gkCategoryId)->count();

                $totalQuestion = Question::All()->count();
                $totalTestQuestion = TestQuestion::All()->count();
                $contacts = Contact::where('status','=',"Pending")->get(); //dd($contacts);
                $approvel = SubscribeApprovel::where('status','=',"Pending")->get();
                $totalUser =User::All()->count();
                $activeUser =User::where('verified', '=', 1)->count();
                $deActiveUser =User::where('verified', '=', 0)->count();
                $newUser =User::whereMonth('created_at', '>=', Carbon::now()->subMonth(12))->count();
                $totalProfit = payments::where('transaction_status','=','Success')->sum('amount');
                return view('Admin.index',compact('totalQuestion','wordpressQuestion','phpQuestion','laravelQuestion','gkQuestion','totalTestQuestion','wordpressTestQuestion','phpTestQuestion','laravelTestQuestion','gkTestQuestion','contacts','totalUser','activeUser','newUser','deActiveUser','totalProfit','approvel'));
            }else{
            return redirect()->to('/');
        }
    }else{
            return redirect()->to('/login');
        }
}
    
    public function pageIndex()
    {
        $page = Page::orderBy('created_at','desc')->paginate(5);
        return view('Admin.Page.Show',['page' =>$page]);
    }

    public function pageCreate()
    {
        return view('Admin.Page.Add');
    }

    public function pageStore(Request $request)
    {
        $validate = $this->validate($request, [
            'text' => 'required',
            'slug' => 'required',
        ]);
        if(!$validate){
                        Redirect::back()->withInput();
                          }
        $page = Page::create($request->all());
        Toastr::success('Page Add', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/page/show');
    }

    public function pageEdit($id)
    {
        $page = Page::find($id);
        return view('Admin.Page.Edit',['page' =>$page]);
    }

    public function pageUpdate(Request $request, $id)
    {
        $page = Page::find($id);

        $page->update($request->all());
        Toastr::success('Page updated', 'Success', ["positionClass" => "toast-bottom-right"]);

      return redirect()->to('/admin/page/show');
    }

    public function pageDestroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        Toastr::success('Page deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/page/show');
    }

    public function userList()
    {
      if(Auth::check()){
    if(Auth::user()->role == "admin"){
        $user = User::orderBy('created_at','desc')->paginate(10);
        return view('Admin.User.Show',['user' =>$user]);
      }
      }else{
          return redirect()->to('/login');
      }
    }

    public function verifyUser($id){
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $user = User::find($id);
            $user->verified = !$user->verified;
            $data['email_token'] = "";
            $user->update($data);
            Toastr::success('User Verified', 'Success', ["positionClass" => "toast-bottom-right"]);
                return back();
          }
        }else{
            return redirect()->to('/login');
        }
        }

    public function userDestroy($id)
    {
      if(Auth::check()){
        if(Auth::user()->role == "admin"){
            if($id == 1){
                Toastr::error('Admin Can not be deleted', 'Error', ["positionClass" => "toast-top-right"]);
                        return back();
            }else{
              $user = User::find($id);
              $user->delete();
            Toastr::success('User Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
            return redirect()->to('/admin');
          }
       }
    }else{
        return redirect()->to('/login');
    }
  }
}
