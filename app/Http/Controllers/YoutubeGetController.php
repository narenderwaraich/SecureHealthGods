<?php

namespace App\Http\Controllers;

use App\youtubeGet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BanerSlide;
use Illuminate\Support\Facades\Input;
use Toastr;
use Auth;
use Redirect;
use Validator;
use App\SubscriberPlan;

class YoutubeGetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtubes = youtubeGet::orderBy('created_at','desc')->paginate(10);
        return view('Admin.youtube-get',compact('youtubes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = SubscriberPlan::all();
        return view('get-youtube',compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate(request(),[
                'name'=>'required|string|max:50',
                'email'=>'required|string|max:50',
                'phone_no'=>'required|string|max:50',
                'channel_name'=>'required|string|max:50',
                'channel_id'=>'required|string|max:255',
              ]);
              if(!$validate){
                Redirect::back()->withInput();
              }

              $data = request(['name','email','phone_no','channel_name','channel_id','subscribers']);
              $data['status'] = "Deactivate";
              $channel = youtubeGet::create($data);
             Toastr::success('Your Youtube Channel Add', 'Success', ["positionClass" => "toast-bottom-right"]);
             $plan = SubscriberPlan::where('subscriber',$channel->subscribers)->first(); //dd($plan);
             $payment = $plan->price;
            return view('payment',compact('payment','channel','plan'));
    }


    public function payPayment($channel)
    {
        //dd($channel);
        $plan = SubscriberPlan::where('subscriber',$channel->subscribers)->first(); //dd($plan);
        $payment = $plan->price;
        return view('payment',compact('payment','channel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\youtubeGet  $youtubeGet
     * @return \Illuminate\Http\Response
     */
    public function show(youtubeGet $youtubeGet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\youtubeGet  $youtubeGet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $youtubeGet = youtubeGet::find($id);
        return view('update-get-youtube',compact('youtubeGet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\youtubeGet  $youtubeGet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate(request(),[
                'name'=>'required|string|max:50',
                'email'=>'required|string|max:50',
                'phone_no'=>'required|string|max:50',
                'channel_name'=>'required|string|max:50',
                'channel_id'=>'required|string|max:255',
              ]);
              if(!$validate){
                Redirect::back()->withInput();
              }

              $data = request(['name','email','phone_no','channel_name','channel_id','subscribers']);
                    youtubeGet::where('id',$id)->update($data);
             Toastr::success('Your Youtube Channel Add', 'Success', ["positionClass" => "toast-bottom-right"]);
         return redirect()->to('/list-youtube-subscribers');
    }

    public function activate($id){
            $data['status'] = 'Activate';
            youtubeGet::where('id',$id)->update($data);
            Toastr::success('Youtube Channel Activate', 'Success', ["positionClass" => "toast-bottom-right"]);
         return redirect()->to('/list-youtube-subscribers');
    }

    public function deactivate($id){
            $data['status'] = "Deactivate";
            youtubeGet::where('id',$id)->update($data);
            Toastr::success('Youtube Channel Deactivate', 'Success', ["positionClass" => "toast-bottom-right"]);
         return redirect()->to('/list-youtube-subscribers'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\youtubeGet  $youtubeGet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            if(Auth::user()->role == "admin"){
                $youtubeGet = youtubeGet::find($id);
                $youtubeGet->delete();
                Toastr::success('Youtube Channel Deleted', 'Success', ["positionClass" => "toast-bottom-right"]);
                return redirect()->to('/list-youtube-subscribers');
                }
        }else{
            return redirect()->to('/login');
        }
    }
}
