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

<div class="container">
    <div class="row justify-content-center m-t-50">
        <div class="col-md-8">
            <div class="heading-title heading-text heading-color m-t-50">Know About {{config('app.name')}}</div>
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