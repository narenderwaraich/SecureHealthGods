<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered; 
use Illuminate\Http\Request;
use App\subscriber;
use App\Jobs\SendVerificationEmail; 
use Toastr;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['referral_code'])){
            $ref = $data['referral_code'];
            $referUser = User::Where('referral_link','=',$ref)->first(); 
            if($referUser){
                $subscriber = subscriber::Where('user_id',$referUser->id)->first();
                $amount['total_amount'] = $subscriber->total_amount + 1;
                $subscriber->update($amount);
            }
        }else{
            $referUser = "";
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referral_code' => $referUser ? $referUser->referral_link : '',
            'email_token' => base64_encode($data['email'])
        ]);
    }

    /**
            * Handle a registration request for the application.
            *
            * @param \Illuminate\Http\Request $request
            * @return \Illuminate\Http\Response
            */
            public function register(Request $request)
            {
                $this->validator($request->all())->validate();
                event(new Registered($user = $this->create($request->all())));
                dispatch(new SendVerificationEmail($user));
                Toastr::success('Thank you for Registered', 'Success', ["positionClass" => "toast-bottom-right"]);
                return redirect()->to('/');

            }
            /**
            * Handle a registration request for the application.
            *
            * @param $token
            * @return \Illuminate\Http\Response
            */
            public function verify($token)
            {
                $user = User::where('email_token',$token)->first();
                $user->verified = 1;
                if($user->save()){
                    $data['user_id'] = $user->id;
                    $sub = subscriber::create($data);
                Toastr::success('Email is successfully verified login Now', 'Success', ["positionClass" => "toast-top-right"]);
                return redirect()->to('/login');
                }
            }
}
