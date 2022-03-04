@extends('layouts.app')
@section('content')
@if(isset($banner))
<div class="banner" style="background: url({{config("app.file_path")}}/images/{{$banner->image ? "banner/".$banner->image : "bg/banner_bg.webp"}}) 50% 0 repeat-y fixed;" title="{{$banner->heading}}">
  <div class="slide-imge-overlay"></div> 
  <div class="container">
    @if($banner->heading)
    <div class="row">
      <div class="col-md-12 col-sm-12">
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
@else
<div class="m-t-150"></div>
@endif

<!-- Content -->
<div class="container singn-up">
    <div class="windows-firm-Box" style="width: 100%;">
        <div class="top-tile">
            Add Youtube Channel
        </div>
        <div class="windows-form">
            <form method="POST" action="/get-youtube-subscribers">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="windows-form-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control windows-form-input {{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ old('phone_no') }}" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                        @if ($errors->has('phone_no'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="e-mail">Email</label>
                        <input id="email" type="email" class="windows-form-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="channel_name">Channel Name</label>
                        <input id="channel_name" type="text" class="windows-form-input form-control{{ $errors->has('channel_name') ? ' is-invalid' : '' }}" name="channel_name" value="{{ old('channel_name') }}" placeholder="Channel Name" required autofocus>

                        @if ($errors->has('channel_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('channel_name') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="channel_id">Channel ID</label>
                        <input id="channel_id" type="text" class="windows-form-input form-control{{ $errors->has('channel_id') ? ' is-invalid' : '' }}" name="channel_id" value="{{ old('channel_id') }}" placeholder="Channel ID" required autofocus>

                        @if ($errors->has('channel_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('channel_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        @foreach ($plans as $plan)
                        <label for="" style="font-size: 14px;">{{ $plan->name}} : Plan in {{ $plan->day}} days {{ $plan->subscriber}} Subscriber Price  <i class="fa fa-rupee" style="font-size:14px;color:red"></i>{{ $plan->price}}</label>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="">Subcribers</label>
                        <select name="subscribers"  class="windows-form-input form-control " id="country">
                            <option value="">-- Select Subcribers--</option>
                            @foreach ($plans as $plan)
                          <option value="{{ $plan->subscriber }}" {{ (old("subscribers") == $plan->subscriber ? "selected":"") }}>{{ $plan->name}}</option>
                              @endforeach    
                        </select>  
                    </div>
                </div>
                <button type="submit" class="btn btn-style btn-top" >Submit</button>
            </form>
        </div>
    </div>
</div> <!-- Content End -->

<script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>        
@endsection