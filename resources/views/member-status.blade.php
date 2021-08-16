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
<div class="m-t-150"></div>
@endif
<div class="container m-t-70">
  <div class="table-title">Member</div>
  <div class="track-order-box">
    <p class="description">Your member Id is</p>
    <div class="track-code">
        <p>{{$member->member_code}}</p>
    </div>
  </div>
</div>
@endsection