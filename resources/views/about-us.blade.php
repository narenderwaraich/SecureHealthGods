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
<div class="m-t-72"></div>
@endif

<div class="container">
	<div class="row justify-content-center m-t-50">
		<div class="col-md-12">
			<div class="heading-title heading-text heading-color m-t-50">Know About {{ config('app.name') }}</div>
			<br>
			<p>This group has been establish for development of every individual. we keep our focus specially on the providing new planning and promotion tools to help our members.
				<br><br>
			We are new in terms of planning and management and we always fulfill our commitment to associates and never hide any type of conditions.</p>
			<p>
				<b>Our Vision</b>
				<br>
				We are aiming to capture the most of the market of India. For became best company in networking industry we will be consistently providing the combination of product and outstanding service that will help every individual to fulfill all his dreams. 
				<br>
			</p>
			<p>
				<b>Our Mission</b>
				<br>We strive to break the financial barriers in the life of every individual who work with us and thereby lifting the economic level of the same by the way of direct marketing. India, being second largest populated country in the world is facing problem of unemployment, poverty and less education. Hence our first priority is to make every individual as independent and make his/her life worth full for its family and nation. 
				<br>
			</p>
		</div>
	</div>
</div>
@endsection