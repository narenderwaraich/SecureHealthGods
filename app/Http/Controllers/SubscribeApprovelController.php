<?php

namespace App\Http\Controllers;

use App\SubscribeApprovel;
use Illuminate\Http\Request;
use Toastr;
use Auth;
use Redirect;
use Validator;
use Carbon\Carbon;
use App\youtubeGet;
use App\subscriber;

class SubscribeApprovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvel = SubscribeApprovel::orderBy('created_at','desc')->paginate(10); //dd($approvel);
        foreach ($approvel as $approvelData) {
            $channel = youtubeGet::where('id',$approvelData->channel_id)->first(); //dd($channel);
            $approvelData->channelName = $channel->channel_name;
            $approvelData->channelId = $channel->channel_id;
        }
        return view('Admin.approve',compact('approvel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $channel = youtubeGet::where('channel_id',$id)->first();
        return view('approvel',compact('channel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validate = $this->validate(request(),[
                            'screen_shot' => 'mimes:jpeg,bmp,png',
          ]);
          if(!$validate){
            toster::error('Insert Image','Error',["positionClass" => "toast-bottom-right"]);
            Redirect::back();
          }

                             
        $data = request(['channel_id']);
          $imageName = time().'.'.request()->screen_shot->getClientOriginalExtension();

          request()->screen_shot->move(public_path('images/screen_shot'), $imageName);
          $data["screen_shot"] = $imageName;
          $data["channel_id"] = $id;
          $data["user_id"] = Auth::id();
          $data["status"] = "Pending";

           SubscribeApprovel::create($data);
          Toastr::success('Account Updated', 'Success', ["positionClass" => "toast-bottom-right"]);
          return redirect()->to('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubscribeApprovel  $subscribeApprovel
     * @return \Illuminate\Http\Response
     */
    public function show(SubscribeApprovel $subscribeApprovel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubscribeApprovel  $subscribeApprovel
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscribeApprovel $subscribeApprovel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubscribeApprovel  $subscribeApprovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscribeApprovel $subscribeApprovel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubscribeApprovel  $subscribeApprovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscribeApprovel $subscribeApprovel)
    {
        //
    }

    public function approve($channelId, $id){
        if(Auth::check()){
            if(Auth::user()->role == "admin"){
                $approvel = SubscribeApprovel::where('id',$id)->first(); //dd($approvel);
                $data['status'] = "Confirm";
                $approvel->update($data);

                $userId = $approvel->user_id;
                $subscriberUser = subscriber::where('user_id',$userId)->first();
                $add['total_amount'] = $subscriberUser->total_amount + 1;
                $subscriberUser->update($add);

                $youtubeGet = youtubeGet::where('channel_id',$channelId)->first();
                if($youtubeGet->subscribers == 1){
                    $subscriber = 0;
                }else{
                    $subscriber = $youtubeGet->subscribers - 1;
                }
                $yotube['subscribers'] = $subscriber;
                $youtubeGet->update($yotube);
                Toastr::success('Approvel Confirm', 'Success', ["positionClass" => "toast-bottom-right"]);
                  return redirect()->to('/approvel-list');
            }
        }else{
            return redirect()->to('/login');
        }
    }
}
