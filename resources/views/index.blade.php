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
        <div class="col-md-9">
            <div class="home-heading-txt">There is given GK, PHP, Laravel and Wordpress interview questions and answers that have been asked in many companies.</div>
            <div class="row m-t-30">
                <div class="col-md-6">
                    <a href="/php" class="hov-img-zoom">
                        <img src="{{config('app.file_path')}}/images/section/php.jpg" class="type-view-img" alt="php">
                    </a>
                </div>
                <div class="col-md-6 on-mob-top-30">
                    <a href="/laravel" class="hov-img-zoom">
                        <img src="{{config('app.file_path')}}/images/section/laravel.jpg" class="type-view-img" alt="laravel">
                    </a>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-md-6">
                    <a href="/wordpress" class="hov-img-zoom">
                        <img src="{{config('app.file_path')}}/images/section/wordpress.jpg" class="type-view-img" alt="wordpress">
                    </a>
                </div>
                <div class="col-md-6 on-mob-top-30">
                    <a href="/gk" class="hov-img-zoom">
                        <img src="{{config('app.file_path')}}/images/section/gk.jpg" class="type-view-img" alt="gk">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('etc.sidebar')
        </div>
    </div>
</div>
@endsection