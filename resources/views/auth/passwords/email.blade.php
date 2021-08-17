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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
