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
		<div class="col-md-12">
			<h1 class="heading-txt">AWS Practites Exam</h1>
		@foreach($allCategory as $question)
			<a href="/practice-exams/{{$question->name}}">
				<button type="button" class="btn btn-primary btn-lg">Practites Exam {{$question->name}}</button>
			</a>
		@endforeach
		</div>
	</div>

	<!-- <div class="row m-t-50">
          <div class="col-md-12">
              <input type="text" name="query" class="form-control search-query" id="search-question" onkeyup="runQuery()" placeholder="Search Question" aria-label="Search Question">
          </div>
  </div>

  <section class="m-t-30">
  	<div class="row justify-content-center" id="search-record"></div>
  </section>
 -->
</div>
<!-- <script src="{{config('app.file_path')}}/jquery/jquery-3.2.1.min.js"></script>
<script src="{{config('app.file_path')}}/js/custom.js"></script> -->
@endsection