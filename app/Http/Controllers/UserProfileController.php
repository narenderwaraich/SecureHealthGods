<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use Toastr;
use Redirect;
use Validator;
use Hash;
use App\User;
use Image;
use Illuminate\Support\Facades\File;
use App\Member;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userProfile = UserProfile::where('user_id',$userId)->first();
            $country_data =DB::table('countries')->select('id','name')->get();
            $state_data = DB::table("states")->select('id','name')->get();
            $city_data = DB::table("cities")->select('id','name')->get();
            $members = Member::where('user_id',$userId)->get()->count();
            return view('user-profile',compact('userProfile','country_data','state_data','city_data','members'));
        }else{
            Toastr::error('Please login first', 'Error', ["positionClass" => "toast-bottom-right"]);
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
    public function changeAddress(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userProfile = UserProfile::where('user_id',$userId)->first();
            $data = $request->all();
            if(!$userProfile){
                $data['user_id'] = $userId;
                UserProfile::create($data);
                return response()->json(['success' => "Address Saved"]);
            }else{
               $userProfile->update($data);
                return response()->json(['success' => "Address Updated"]); 
            }
        }else{
            return response()->json(['error' => "Please Login First"]);
      }
    }

    public function profileUpdate(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userProfile = UserProfile::where('user_id',$userId)->first();
            $data = $request->all();
            if(!$userProfile){
                $data['user_id'] = $userId;
                UserProfile::create($data);
            }else{
               $userProfile->update($data); 
            }

            $user = User::find($userId);
            $email = $request->email;
            $phone = $request->phone;

            $userData['name'] = $request->name;
            if($email){
                /// Check email record in database already exists or not
                if(sizeof(User::where('email','=',$email)->get()) > 0){
                    return response()->json(['error' => "Sorry User email exists!"]);
                }else{
                   $userData['email'] = $email;
                   $userData['email_verified_at'] = null; 
                } 
            }
            if($phone){
                /// Check phone record in database already exists or not
                if(sizeof(User::where('phone','=',$phone)->get()) > 0){
                    return response()->json(['error' => "Sorry User mobile exists!"]);
                }else{
                   $userData['phone'] = $phone; 
                   if(!$userProfile){
                        $data['user_id'] = $userId;
                        $data['phone_no'] = $phone;
                        UserProfile::create($data);
                    }else{
                        $data['phone_no'] = $phone;
                       $userProfile->update($data); 
                    }
                } 
            }
            $user->update($userData);
            $response = [];
            $response['data'] = $user;
            $response['success'] = 'Profile Updated';
             return response()->json($response);
        }else{
            return response()->json(['error' => "Please Login First"]);
      }
    }

    public function profileLogoUpdate(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userProfile = UserProfile::where('user_id',$userId)->first();
            if($request->logo){
              if($userProfile){
                // remove image from directory file path
                $menu_image_path = public_path('/images/user-logo/'.$userProfile->logo);
                if(File::exists($menu_image_path)) {
                    File::delete($menu_image_path);
                }
                /// oriznal image remove
                $oriznal_image_path = public_path('/images/oriznal/'.$userProfile->logo);
                if(File::exists($oriznal_image_path)) {
                    File::delete($oriznal_image_path);
                }
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

            if(!$userProfile){
                $data['user_id'] = $userId;
                UserProfile::create($data);
            }else{
               $userProfile->update($data); 
            }
            return response()->json(['success' => "Profile Updated"]);

      }else{
            return response()->json(['error' => "Please Login First"]);
      }
    }


    public function changePass(Request $request){
            // $validate = $this->validate(request(),[
            //             'old_password' => 'required',
            //             'password' => 'required|confirmed|string|min:6',
            //         ]);
            // if(!$validate){ 
            //     Redirect::back()->withInput();
            // }
        if (Auth::check()) {
                $data = $request->all();
                $user = User::find(auth()->user()->id);
            if(!Hash::check($data['old_password'], $user->password)){
                return response()->json(['error' => "The specified password does not match the database password"]);
            }else{
                $password = $request->password;
                $user->update(['password' => Hash::make($password)]);
                return response()->json(['success' => "Password Updated"]);
            }

      }else{
            return response()->json(['error' => "Please Login First"]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
