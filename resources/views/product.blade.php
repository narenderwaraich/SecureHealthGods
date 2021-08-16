@extends('layouts.app')
@section('content')
@if(!empty($banner->image))
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
<div class="m-t-70"></div>
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
                <b>HEALTH BENEFITS</b>
		          <br>
		          <ul class="service-list">
		            <li>Arthritis Pain</li>
		            <li>Bruises</li>
		            <li>Strains Swelling</li>
		            <li>Upper back tension</li>
		            <li>Sport injuries</li>
		            <li>Headache</li>
		            <li>Menstrual cramps</li>
		            <li>Muscular Pain</li>
		            <li>Hand & wrist pain</li>
		            <li>Lower back pain</li>
		            <li>Inflamation of joints</li>
		          </ul>

		          <div class="joining-text">Joining Package: <span><i class="fa fa-inr" aria-hidden="true"></i> {{config('app.product_price')}}</span></div>
                <a href="/buy-product">
                    <button class="btn btn-style">Join Now</button>
                </a>
            </div>
        </div>
    </div>
 </section>
@endsection