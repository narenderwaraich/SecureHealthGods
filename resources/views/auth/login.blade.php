@extends('layouts.app')
@section('content')
<div class="container">
    <section class="login-section">
<div class="windows-firm-Box shadow-lg">
    <div class="top-tile">
        Log In
    </div>
    <div class="windows-form">
        <form method="POST" action="{{ route('login') }}">
         @csrf

          <input id="email" type="email" placeholder="Email" class="windows-form-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            <input id="password-field" type="password" placeholder="Password" class="windows-form-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
            <p style="margin-left:25px"><input class="windows-form-input form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width:40px; height:20px;"><span style="padding-left: 20px;">Remember Me</span>
                <label class="pull-right">
                    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="forget-password-text">{{ __('Forgotten Password?') }}</a>@endif
    </label>
            </p>
            <button type="submit" class="btn btn-style btn-top" >Submit</button>
            <!-- <br>
            <div style="float: left;">Don't have account ? <a href="/register" class="sign-up-link">Register here</a></div> -->
        </form>
    </div>
</div>
</section>
</div>
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
