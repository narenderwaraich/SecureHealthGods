<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BanerSlide;
use Illuminate\Support\Facades\Input;
use Toastr;
use Auth;
use Redirect;
use Validator;
use App\Models\User;
use App\Models\youtubeGet;
use App\Models\SubscribeApprovel;

class SubscriberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = BanerSlide::where('page_name','=','dashboard')->first(); //dd($banner);
        $title = $banner ? $banner->title : '';
        $description = $banner ? $banner->description : '';
        if(Auth::check()){
            $userId = Auth::id();
            $subscriber = subscriber::where('user_id',$userId)->first();
            $youtubeGet = youtubeGet::where('status','=','Activate')->orderBy('created_at','desc')->paginate(15); //dd($youtubeGet);
            foreach ($youtubeGet as $youtube) {
                $status = SubscribeApprovel::where('channel_id',$youtube->id)->first(); //dd($status);
                $youtube->statusApprove = $status ? $status->status : null;
            }
            return view('dashboard',compact('title','description','subscriber'),['banner' =>$banner, 'youtubeGet' => $youtubeGet]);
        }else{
            return redirect()->to('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscriber $subscriber)
    {
        //
    }


    public function storeBank(Request $request, $id)
    {
         $validate = $this->validate(request(),[
                'bank_name'=>'required|string|max:50',
                'account_no'=>'required|string|max:50',
                'ifsc_code'=>'required|string|max:50',
              ]);
              if(!$validate){
                Redirect::back()->withInput();
              }

              $data = request(['bank_name','account_no','ifsc_code','upi_id']);
              $subscriber = subscriber::find($id);
              if($subscriber){
                subscriber::where('id',$id)->update($data);
                Toastr::success('Bank Updated', 'Success', ["positionClass" => "toast-bottom-right"]);
                          return redirect()->to('/');
            }else{
                Toastr::error('please first address update', 'Success', ["positionClass" => "toast-bottom-right"]);
                          return redirect()->to('/');
            }
                
                
    }
}
