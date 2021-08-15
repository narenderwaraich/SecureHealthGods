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
<div class="m-t-72"></div>
@endif

<div class="container">
    <div class="row justify-content-center m-t-50">
        <div class="col-md-8">
            <div class="heading-title heading-text heading-color m-t-50">Know About FreeKaFanda</div>
            <br>
            <p>
            <b>Our Services</b>
            <br>
            We only provide articles and information, and we never ask for personal or private information. Prepare your-self for the interview by reading php, laravel, wordpress and gk Interview Questions and Answers. 
            <br>
            <ul>
            	<li>PHP INTERVIEW QUESTIONS & ANSWERS</li>
            	<li>LARAVEL INTERVIEW QUESTIONS & ANSWERS</li>
            	<li>WORDPRESS INTERVIEW QUESTIONS & ANSWERS</li>
            	<li>GENERAL KNOWLEDGE INTERVIEW QUESTIONS & ANSWERS</li>
            </ul>
          </p>
        </div>
        <div class="col-md-4">
            @include('etc.sidebar')
        </div>
    </div>
</div>
@endsection