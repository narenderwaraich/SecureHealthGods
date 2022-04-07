<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BanerSlide;
use Illuminate\Support\Facades\Input;
use Toastr;
use Redirect;
use Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = BanerSlide::where('page_name','=','home')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        return view('index',compact('title','description'),['banner' =>$banner]);
    }
}
