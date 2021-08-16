@extends('layouts.app')
@section('content')

 
@if(isset($bannerSlide))
<section class="home-slider">
    <div id="home-slider" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            @foreach($bannerSlide as $key => $slide)
            <div class="carousel-item {{ $key == 0 ? 'active':'' }} ">
                @if($slide->heading)
                <div class="slide-imge-overlay"></div>
                @endif
                <img src="{{config('app.file_path')}}/images/banner/{{$slide->image}}" alt="{{$slide->heading}}">
                <div class="caption">
                    <div class="container">
                        @if($slide->heading)
                        <div class="caption-in">
                            <div class="caption-ins">
                                <h1 class="text-up">{{$slide->heading}}<span>{{$slide->sub_heading}}</span></h1>
                                @if($slide->button_text)
                                <div class="links"> 
                                    <a href="{{$slide->button_link}}" class="btns slider-btn"><span>{{$slide->button_text}}</span></a> 
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#home-slider" aria-label="slide-next-btn" data-slide="prev">
            <span class="fa fa-angle-left"></span>
        </a>
        <a class="carousel-control-next" href="#home-slider" aria-label="slide-back-btn" data-slide="next">
            <span class="fa fa-angle-right"></span>
        </a>
    </div>
</section>
@endif

 <section class="section-top container">
    <h2 class="fs-50 title-main-heading">Our Product</h2>
    <hr class="under-line">
    <div class="row">
        <div class="col-md-6">
            <div class="product-image">
                <img src="{{config('app.file_path')}}/images/product/mst-pandant.jpg">
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-desc">
                <div class="product-name">MST Pendant</div>
                <p> MST Energy Pendant is one of the Revolutionary Product in Health and Wellness Industry. This is now the Hottest Product in the World as far as Wellness Accessory is concern. MST Energy Pendants are Guaranteed 100% Made of Genuine Volcanic Minerals and Minerals Stone.</p>
                <a href="/product">
                    <button class="btn btn-style">More</button>
                </a>
            </div>
        </div>
    </div>
 </section>
@if($gellery->count())
  <section class="section-top container">
    <h2 class="fs-50 title-main-heading">Our Gallery</h2>
    <hr class="under-line">
            <div class="row">
                @foreach($gellery->take(4) as $item)
                <div class="col-md-6 col-lg-6">
                    <div class="p-r-50 p-r-0-lg">
                        <!-- item blog -->
                        <div class="item-blog">
                            <a href="#" class="item-blog-img pos-relative dis-block hov-img-zoom">
                                <img src="{{config('app.file_path')}}/images/gallery/{{$item->image}}" alt="{{ $item->title }}">

                                <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">{{$item->created_at->format('j M, Y')}}
                                </span>
                            </a>

                            <div class="item-blog-txt p-t-33">
                                <div class="heading-title p-b-11">
                                    <a href="#" class="m-text24" aria-label="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                </div>

                                <p class="p-b-12">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                 @endforeach
                <!--<div class="col-md-4 col-lg-3">-->
                    
                <!--</div>-->
            </div>
            <a href="/gallery" class="btn btn-style on-mob-bottom-30" style="width:150px !important;margin-top: 20px;">View More</a>
  </section>
@endif
    
@if($videos->count())
  <section class="section-top container">
    <h2 class="fs-50 title-main-heading">Our Videos</h2>
    <hr class="under-line">
           <div class="row">
              @foreach ($videos->take(6) as $videoData)
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">

                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $videoData->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  

                        <div class="block3-txt p-t-14">
                            <div class="heading-title p-b-7">
                                    {{ $videoData->title}}
                            </div>

                            <span class="s-text6">By</span> <span class="s-text7">{{ $videoData->auth}}</span>
                            <span class="s-text6">on</span> <span class="s-text7">{{$videoData->created_at->format('j M, Y')}}</span>
                        </div>
                    
                </div>
             @endforeach
            </div>
            <a href="/youtube-videos" class="btn btn-style on-mob-bottom-30 m-t-20" style="width:150px !important;margin-top: 20px;">View More</a>
  </section>
@endif

@endsection