@extends('layouts.app')
@section('content')
@if(isset($banner))
<div class="banner">
    <img src="{{asset('/public/images/banner/'.$banner->image)}}" alt="{{$banner->heading}}"/>
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
<div class="m-t-70"></div>
@endif
<div class="container privacy-section m-t-70">
	<div class="heading-title">FreeKaFanda</div>
	<br>
	<p>We only provide articles and information, and we never ask for personal or private information.
	</p>
	<br>

	<div class="heading-title">Privacy Policy</div>
	<br>
	<strong>When do we collect information?</strong>
	<p>Nothing collect any data.</p>

	<br>
	<strong>Contacting Us</strong>
	<br>
	<p>If there are any doubts in privacy policy, you may contact on <a href="mailto:hello@freekafanda.in">hello@freekafanda.in</a></p>
</div>
@endsection