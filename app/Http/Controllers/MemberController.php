<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Validator;
use Redirect;
use Toastr;
use Auth;
use Response;
use App\BanerSlide;
use Image;
use App\User;
use App\Joiner;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $member = Member::where('is_activated',1)->orderBy('created_at','desc')->paginate(10);
            foreach ($member as $memberData) {
                $downMember = Member::where('refer_code',$memberData->member_code)->get()->count();
                $memberData->down_member = $downMember;
            }
            return view('Admin.User.Member',['member' =>$member]);
          }
        }else{
              return redirect()->to('/login');
        }
    }

    public function memberWithStatus($status){
        if(Auth::check()){
        if(Auth::user()->role == "admin"){
            $member = Member::where('is_activated',$status)->orderBy('created_at','desc')->paginate(10);
            return view('Admin.User.Member',['member' =>$member]);
          }
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
        $banner = BanerSlide::where('page_name','=','member-join')->first(); //dd($banner);
        if (isset($banner)) {
            $title = $banner->title;
            $description = $banner->description;
        }else{
            $title = '';
            $description = '';
        }
        $country_data =DB::table('countries')->select('id','name')->get();
        $state_data = DB::table("states")->select('id','name')->get();
        $city_data = DB::table("cities")->select('id','name')->get();
        return view('member-join',compact('title','description','country_data','state_data','city_data'),['banner' =>$banner]);
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

            $data = request(['pendant_no','name','email','phone','gender','date_of_birth','adhar_card_number','country','state','city','zipcode','address']);

            $data['refer_code'] = $request->refer_code ? $request->refer_code : "SHG000001";

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
            
            $member = Joiner::create($data);
        Toastr::info('Please complete payment process', 'Success', ["positionClass" => "toast-bottom-right"]);
        $url = '/member-payment/'.$member->id;
        return redirect()->to($url);


    }

    public function storeData(Request $request)
    {
            $validate = $this->validate(request(),[
                  'name'=>'required|string|max:50',
                  'email'=>'string|max:255',
                  'phone'=> 'required|string|min:10|max:10',
                ]);
                if(!$validate){
                  Redirect::back()->withInput();
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

            $user = User::create($userData);
            if($user){
                $data['user_id'] = $user->id;
                $member = Member::create($data);
            }
        Toastr::success('Member Added', 'Success', ["positionClass" => "toast-bottom-right"]);
        $url = '/member-status/'.$member->id;
        return redirect()->to($url);


    }

    public function memberIdTake($id){
            $member = Member::find($id);
        return view('member-status',compact('member'));
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
