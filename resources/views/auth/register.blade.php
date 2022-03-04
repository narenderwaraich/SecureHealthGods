@extends('layouts.app')
@section('content')

<div class="container">
    <section class="login-section">
<div class="windows-firm-Box shadow-lg">
    <div class="top-tile">
        {{ __('Register') }}
    </div>
    <div class="windows-form">
        <form method="POST" action="{{ route('register') }}">
         @csrf

         <input id="name" type="text" placeholder="Name" class="windows-form-input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          <input id="email" type="email" placeholder="Email" class="windows-form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input id="password-field" type="password" placeholder="Password" class="windows-form-input form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <input id="" type="text" placeholder="Referral Code" class="windows-form-input form-control" name="referral_code">
                                        
            <button type="submit" class="btn btn-style btn-top" >Submit</button>
            <!-- <br>
            <div style="float: left;">Don't have account ? <a href="/register" class="sign-up-link">Register here</a></div> -->
        </form>
    </div>
</div>
</section>
</div>
@endsection
