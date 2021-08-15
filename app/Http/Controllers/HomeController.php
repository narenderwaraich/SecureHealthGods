<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\User;
use App\UserProfile;
use App\BanerSlide;

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
        return view('index',compact('title','description','bannerSlide'));
    }
}
