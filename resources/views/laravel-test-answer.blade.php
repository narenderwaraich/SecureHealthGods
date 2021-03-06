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
<div class="container text-question-page">
	<div class="row justify-content-center m-t-50">
		<div class="col-md-8">
			<h1 class="heading-txt">Laravel Test Answers</h1>
		<form method="post" action="/test-laravel">
		    {{ csrf_field() }}
		@foreach($questions as $question)
			<div class="question-box">
				<div class="question-title"><span class="Qu">{{$question->question_number}})</span> {{$question->question}}</div>
				<div class="answer-options-section">
					<div class="answer-options">
						<span class="options-ans-left">
							<div class="form-check-inline">
                              <label class="form-check-label" for="checkA_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkA_{{$question->id}}" name="question_{{$question->id}}" value="A" {{ "$requestAnswer->question_"."$question->id" == "A" ? "checked":"" }}>{{$question->A}}
                              </label>
                            </div>
						</span>
						<span class="options-ans-right">
							<div class="form-check-inline">
                              <label class="form-check-label" for="checkB_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkB_{{$question->id}}" name="question_{{$question->id}}" value="B" {{ "$requestAnswer->question_"."$question->id" == "B" ? "checked":"" }}>{{$question->B}}
                              </label>
                            </div>
						</span>
					</div>
					<div class="answer-options p-t-10">
						<span class="options-ans-left">
							<div class="form-check-inline">
                              <label class="form-check-label" for="checkC_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkC_{{$question->id}}" name="question_{{$question->id}}" value="C" {{ "$requestAnswer->question_"."$question->id" == "C" ? "checked":"" }}>{{$question->C}}
                              </label>
                          </div>
						</span>
						<span class="options-ans-right">
							<div class="form-check-inline">
                              <label class="form-check-label" for="checkD_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkD_{{$question->id}}" name="question_{{$question->id}}" value="D" {{ "$requestAnswer->question_"."$question->id" == "D" ? "checked":"" }}>{{$question->D}}
                              </label>
                            </div>
						</span>
					</div>
					<div class="show-answer"><span class="ans">Ans.</span> {{$question->shoAnswer}}</div>
				</div>
			</div>
		 @endforeach
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
@endsection