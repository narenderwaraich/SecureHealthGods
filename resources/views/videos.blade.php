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
            <div class="home-heading-txt">YouTube - Tuttorials</div>
            <div class="row m-t-30">
            @foreach ($videos as $videoData)
                <div class="col-sm-10 col-md-6 p-b-30 m-l-r-auto">

                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $videoData->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  

  <!--               <div class="block3-txt p-t-14">
                    <h4 class="p-b-7">
                            {{ $videoData->title}}
                    </h4>
                </div> -->
                </div>
             @endforeach
            </div>
            {!! $videos->links() !!}

        </div>
        <div class="col-md-3">
            @include('etc.sidebar')
        </div>
    </div>
</div>
@endsection