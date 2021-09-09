<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\User;
use App\UserProfile;
use App\BanerSlide;
use App\Youtube;
use App\Gellery;
use App\Member;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bannerSlide = BanerSlide::where('page_name','=','home')->get();
        $banner = BanerSlide::where('page_name','=','home')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = '';
            $description = '';
        }
        $videos = Youtube::latest()->take(6)->get();
        $gellery = Gellery::orderBy('created_at','desc')->take(6)->get();
        $members = Member::where('is_activated',1)->orderBy('created_at','desc')->take(10)->get();
        return view('index',compact('title','description','bannerSlide','videos','gellery','members'));
    }

    public function productPage(){
        $banner = BanerSlide::where('page_name','=','product')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = '';
            $description = '';
        }
        return view('product',compact('title','description','banner'));
    }
}
