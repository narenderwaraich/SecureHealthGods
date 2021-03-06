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
			<h1 class="heading-txt">GK Interview Questions and Answers</h1>
		@foreach($questions as $question)
			<div class="question-box">
				<div class="question-title"><span class="Qu">{{$question->question_number}})</span> {{$question->question}}</div>
				<p class="answer"><span class="ans">Ans.</span>{{$question->answer}}</p>
			@if(isset($question->points))
				<ul class="answer-points">
					@foreach($question->points as $point)
					<li>{{$point->title}}</li>
					@endforeach
				</ul>
			@endif
			</div>
			@if($question->code)
			<div class="code-show">
				{{$question->code}}
			</div>
			@endif
		 @endforeach
		</div>
		{!! $questions->links() !!}
		<div class="col-md-4">
		</div>
	</div>
</div>
@endsection