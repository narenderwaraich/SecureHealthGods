@extends('layouts.app')

@section('content')
@if(isset($banner))
<div class="banner">
    <img src="{{config('app.file_path')}}/images/banner/{{$banner->image}}" alt="{{$banner->heading}}"/>
    <div class="slider-imge-overlay"></div>
    <div class="caption text-center">
        <div class="container">
            @if($banner->heading)
            <div class="caption-in">
                <div class="caption-ins">
                    <h1 class="text-up">{{$banner->heading}}<span>{{$banner->sub_heading}}</span></h1>
                    @if($banner->button_text)
                    <div class="links"> 
                        <a href="{{$banner->button_link}}" class="btns slider-btn"><span>{{$banner->button_text}}</span></a> 
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@else
<div class="m-t-72"></div>
@endif
<div class="container">
    <div class="row justify-content-center m-t-150">
        <div class="contct-form-section">
            <div class="form-title">Login</div>
            <div class="form-subtitle">Access your account via login credentials</div>
            <div class="form-style shadow-lg">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label class="dis-none" for="user-username">Username</label>
                    <input type="text" placeholder="Email or Mobile" class="form-control form-input {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" id="user-username" required>
                    @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                    <label class="dis-none" for="password-field">Password</label>
                    <input id="password-field" style="margin-top:20px;" type="password" placeholder="Password" class="form-control form-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <p style="margin-left:10px;margin-top: 10px;"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width:40px; height:20px;"><label for="remember" style="padding-left: 20px;">Remember Me</label>
                        <span class="pull-right">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forget-password-text">{{ __('Forgotten Password?') }}</a>@endif
                        </span>
                    </p>
                    <button type="submit" class="btn btn-style btn-top" >Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<style>

</style>
<script src="{{config('app.file_path')}}/jquery/jquery-3.2.1.min.js"></script>
<script>
$(".toggle-password").click(function() {
$(this).toggleClass("fa-eye-slash fa-eye");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
input.attr("type", "text");
} else {
input.attr("type", "password");
}
});
</script>
@endsection
