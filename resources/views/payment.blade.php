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

<div class="container" style="margin-top: 50px;">
	
    <section class="login-section">
        <div class="windows-firm-Box">
            <div class="top-tile">
                Pay Payment
            </div>
        <div class="windows-form">
            
            <form method="POST" action="/pay/payment">
                @csrf
            <input type="hidden" name="channel_id" value="{{ $channel->id }}" readonly class="form-control windows-form-input">
            <input class="form-control windows-form-input {{ $errors->has('payment') ? ' is-invalid' : '' }}" type="number" name="payment" value="{{$payment}}" placeholder="Enter Payment">
				@if ($errors->has('payment'))
	                <span class="invalid-feedback" role="alert">
	                   <strong>{{ $errors->first('payment') }}</strong>
	                </span>
                 @endif
            
            <button type="submit" class="btn btn-style btn-top" >Pay Now</button>
        </form>
        
            </div>
        </div>
    </section>
    </div>
@endsection