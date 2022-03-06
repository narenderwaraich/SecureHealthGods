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
			<h1 class="heading-txt">AWS Test Answers</h1>
		@foreach($questions as $question)
			<div class="question-box">
				<div class="question-title"><span class="Qu">{{$question->question_number}})</span> {{$question->question}}</div>
				<div class="answer-options-section">
					@if($question->ans_type == "option")
					<div class="answer-options">
						@if($question->A)
						<span class="options-ans-left">
							<div class="form-check-inline">
                  <label class="form-check-label" for="checkA_{{$question->id}}">
                    <input type="radio" class="form-check-input" id="checkA_{{$question->id}}" name="question_{{$question->id}}" value="A" {{ "$requestAnswer->question_"."$question->id" == "A" ? "checked":"" }}>{{$question->A}}
                  </label>
              </div>
						</span>
						@endif
						@if($question->B)
						<span class="options-ans-right">
							<div class="form-check-inline">
                  <label class="form-check-label" for="checkB_{{$question->id}}">
                    <input type="radio" class="form-check-input" id="checkB_{{$question->id}}" name="question_{{$question->id}}" value="B" {{ "$requestAnswer->question_"."$question->id" == "B" ? "checked":"" }}>{{$question->B}}
                  </label>
              </div>
						</span>
						@endif
					</div>
					<div class="answer-options p-t-10">
						@if($question->C)
						<span class="options-ans-left">
							<div class="form-check-inline">
                  <label class="form-check-label" for="checkC_{{$question->id}}">
                    <input type="radio" class="form-check-input" id="checkC_{{$question->id}}" name="question_{{$question->id}}" value="C" {{ "$requestAnswer->question_"."$question->id" == "C" ? "checked":"" }}>{{$question->C}}
                  </label>
              </div>
						</span>
						@endif
						@if($question->D)
						<span class="options-ans-right">
							<div class="form-check-inline">
                  <label class="form-check-label" for="checkD_{{$question->id}}">
                    <input type="radio" class="form-check-input" id="checkD_{{$question->id}}" name="question_{{$question->id}}" value="D" {{ "$requestAnswer->question_"."$question->id" == "D" ? "checked":"" }}>{{$question->D}}
                  </label>
              </div>
						</span>
						@endif
					</div>
					<div class="show-answer m-t-20"><span class="ans">Ans.</span> {{$question->shoAnswer}}</div>
					@endif

					@if($question->ans_type == "choosie")
					<div class="form-check">
						@if($question->checkbox_1)
              <div class="checkbox">
                <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="checkbox1" name="checkbox1" value="{{$question->checkbox_1}}" class="form-check-input"> {{$question->checkbox_1}}
                </label>
              </div>
            @endif
            @if($question->checkbox_2)
              <div class="checkbox">
                <label for="checkbox2" class="form-check-label ">
                  <input type="checkbox" id="checkbox2" name="checkbox2" value="{{$question->checkbox_2}}" class="form-check-input"> {{$question->checkbox_2}}
                </label>
              </div>
            @endif
            @if($question->checkbox_3)
              <div class="checkbox">
                <label for="checkbox3" class="form-check-label ">
                  <input type="checkbox" id="checkbox3" name="checkbox3" value="{{$question->checkbox_3}}" class="form-check-input"> {{$question->checkbox_3}}
                </label>
              </div>
            @endif
            @if($question->checkbox_4)
              <div class="checkbox">
                <label for="checkbox4" class="form-check-label ">
                  <input type="checkbox" id="checkbox4" name="checkbox4" value="{{$question->checkbox_4}}" class="form-check-input"> {{$question->checkbox_4}}
                </label>
              </div>
            @endif
            @if($question->checkbox_5)
              <div class="checkbox">
                <label for="checkbox5" class="form-check-label ">
                  <input type="checkbox" id="checkbox5" name="checkbox5" value="{{$question->checkbox_5}}" class="form-check-input"> {{$question->checkbox_5}}
                </label>
              </div>
            @endif
            @if($question->checkbox_6)
              <div class="checkbox">
                <label for="checkbox6" class="form-check-label ">
                  <input type="checkbox" id="checkbox6" name="checkbox6" value="{{$question->checkbox_6}}" class="form-check-input"> {{$question->checkbox_6}}
                </label>
              </div>
            @endif

            <div class="show-answer m-t-20"><span class="ans">Ans.</span> 
            	<br>
            	@if($question->checkbox_ans_1) {{$question->checkbox_ans_1}} @endif
            	<br>
            	@if($question->checkbox_ans_2) {{$question->checkbox_ans_2}} @endif
            	<br>
            	@if($question->checkbox_ans_3) {{$question->checkbox_ans_3}} @endif
            	<br>
            	@if($question->checkbox_ans_4) {{$question->checkbox_ans_4}} @endif
            	<br>
            	@if($question->checkbox_ans_5) {{$question->checkbox_ans_5}} @endif
            	<br>
            	@if($question->checkbox_ans_6) {{$question->checkbox_ans_6}} @endif

            </div>
            </div>
					@endif

					@if($question->ans_type == "true_false")
					<div class="answer-options">
						<label class="form-check-label" for="checkTrue_{{$question->id}}">
              <input type="radio" class="form-check-input" id="checkTrue_{{$question->id}}" name="question_{{$question->id}}" value="1" {{ "$requestAnswer->question_"."$question->id" == "1" ? "checked":"" }}>  True
            </label>
            <br>
            <label class="form-check-label" for="checkFalse_{{$question->id}}">
              <input type="radio" class="form-check-input" id="checkFalse_{{$question->id}}" name="question_{{$question->id}}" value="0" {{ "$requestAnswer->question_"."$question->id" == "0" ? "checked":"" }}>  False
            </label>
            <div class="show-answer m-t-20"><span class="ans">Ans.</span> @if($question->true_false_answer) True @else False @endif</div>
					</div>
					@endif

					@if($question->ans_type == "write")
					<textarea name="write_ans_data" class="form-control" rows="9" placeholder="Write Answer" readonly>{{$requestAnswer->write_ans_data}}</textarea>
					<div class="show-answer m-t-20"><span class="ans">Ans.</span> {{$question->write_ans}}</div>
					@endif
				</div>
			</div>
		 @endforeach
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
@endsection