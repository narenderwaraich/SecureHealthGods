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

<div class="container text-question-page aws-exam-question">
	<div class="row justify-content-center m-t-50">
		<div class="col-md-12">
			<h1 class="heading-txt">AWS Practice Exams</h1>
		<!-- <form method="post" action="/test-aws">
		    {{ csrf_field() }} -->
		@foreach($questions as $question)
			<div class="question-box">
				<div class="question-title"><span class="Qu">{{$question->question_number}})</span> {{$question->question}}</div>
				<div class="answer-options-section on-mob-top-15">
					@if($question->ans_type == "option")
					<div class="answer-options">
						@if($question->A)
						<span class="options-ans-left">
							<div class="form-check-inline">
                <label class="form-check-label radio-btn-design" for="checkA_{{$question->id}}">
                  <input type="radio" class="form-check-input" id="checkA_{{$question->id}}" name="question_{{$question->id}}" value="A"><strong style="margin-left: 35px;">A.</strong> {{$question->A}}
                  <span class="checkmark"></span>
                </label>
              </div>
						</span>
						@endif
						@if($question->B)
						<span class="options-ans-right">
							<div class="form-check-inline">
                <label class="form-check-label radio-btn-design" for="checkB_{{$question->id}}">
                  <input type="radio" class="form-check-input" id="checkB_{{$question->id}}" name="question_{{$question->id}}" value="B"><strong style="margin-left: 35px;">B.</strong> {{$question->B}}
                  <span class="checkmark"></span>
                </label>
              </div>
						</span>
						@endif
					</div>
					<div class="answer-options p-t-10">
						@if($question->C)
						<span class="options-ans-left">
							<div class="form-check-inline">
                <label class="form-check-label radio-btn-design" for="checkC_{{$question->id}}">
                  <input type="radio" class="form-check-input" id="checkC_{{$question->id}}" name="question_{{$question->id}}" value="C"><strong style="margin-left: 35px;">C.</strong> {{$question->C}}
                  <span class="checkmark"></span>
                </label>
              </div>
						</span>
						@endif
						@if($question->D)
						<span class="options-ans-right">
							<div class="form-check-inline">
                <label class="form-check-label radio-btn-design" for="checkD_{{$question->id}}">
                  <input type="radio" class="form-check-input" id="checkD_{{$question->id}}" name="question_{{$question->id}}" value="D"><strong style="margin-left: 35px;">D.</strong> {{$question->D}}
                  <span class="checkmark"></span>
                </label>
              </div>
						</span>
						@endif

					</div>
					<button type="button" class="btn btn-success m-t-20" onclick="showAnswer({{$question->id}})">Show Answer</button>
					<div class="show-answer m-t-20" style="display: none;" id="show_answer_{{$question->id}}"><span class="ans">Ans.</span> {{$question->answer}}</div>
					@endif

					@if($question->ans_type == "choice")
					<div class="form-check">
						@if($question->checkbox_1)
              <div class="checkbox">
                <label for="checkbox_1_{{$question->id}}" class="form-check-label checkbox-btn-design ">
                  <input type="checkbox" id="checkbox_1_{{$question->id}}" name="checkbox1" value="{{$question->checkbox_1}}" class="form-check-input"> <span style="margin-left: 35px;">{{$question->checkbox_1}}</span>
                <span class="checkbox-checkmark"></span>
                </label>
              </div>
            @endif
            @if($question->checkbox_2)
              <div class="checkbox">
                <label for="checkbox_2_{{$question->id}}" class="form-check-label checkbox-btn-design ">
                  <input type="checkbox" id="checkbox_2_{{$question->id}}" name="checkbox2" value="{{$question->checkbox_2}}" class="form-check-input"> <span style="margin-left: 35px;">{{$question->checkbox_2}}</span>
                <span class="checkbox-checkmark"></span>
                </label>
              </div>
            @endif
            @if($question->checkbox_3)
              <div class="checkbox">
                <label for="checkbox_3_{{$question->id}}" class="form-check-label checkbox-btn-design ">
                  <input type="checkbox" id="checkbox_3_{{$question->id}}" name="checkbox3" value="{{$question->checkbox_3}}" class="form-check-input"> <span style="margin-left: 35px;">{{$question->checkbox_3}}</span>
                <span class="checkbox-checkmark"></span>
                </label>
              </div>
            @endif
            @if($question->checkbox_4)
              <div class="checkbox">
                <label for="checkbox_4_{{$question->id}}" class="form-check-label checkbox-btn-design ">
                  <input type="checkbox" id="checkbox_4_{{$question->id}}" name="checkbox4" value="{{$question->checkbox_4}}" class="form-check-input"> <span style="margin-left: 35px;">{{$question->checkbox_4}}</span>
                <span class="checkbox-checkmark"></span>
                </label>
              </div>
            @endif
            @if($question->checkbox_5)
              <div class="checkbox">
                <label for="checkbox_5_{{$question->id}}" class="form-check-label checkbox-btn-design ">
                  <input type="checkbox" id="checkbox_5_{{$question->id}}" name="checkbox5" value="{{$question->checkbox_5}}" class="form-check-input"> <span style="margin-left: 35px;">{{$question->checkbox_5}}</span>
                <span class="checkbox-checkmark"></span>
                </label>
              </div>
            @endif
            @if($question->checkbox_6)
              <div class="checkbox">
                <label for="checkbox_6_{{$question->id}}" class="form-check-label checkbox-btn-design ">
                  <input type="checkbox" id="checkbox_6_{{$question->id}}" name="checkbox6" value="{{$question->checkbox_6}}" class="form-check-input"> <span style="margin-left: 35px;">{{$question->checkbox_6}}</span>
                <span class="checkbox-checkmark"></span>
                </label>
              </div>
            @endif
            </div>
            <button type="button" class="btn btn-success m-t-20" onclick="showAnswer({{$question->id}})">Show Answer</button>
            <div class="show-answer m-t-20" style="display: none;" id="show_answer_{{$question->id}}"><span class="ans">Ans.</span> 
            	<ul>
                @if($question->checkbox_ans_1)
                  <li>{{$question->checkbox_ans_1}}</li> 
                @endif
                @if($question->checkbox_ans_2)
                  <li>{{$question->checkbox_ans_2}}</li> 
                @endif
                @if($question->checkbox_ans_3)
                  <li>{{$question->checkbox_ans_3}}</li> 
                @endif
                @if($question->checkbox_ans_4)
                  <li>{{$question->checkbox_ans_4}}</li> 
                @endif
                @if($question->checkbox_ans_5)
                  <li>{{$question->checkbox_ans_5}}</li> 
                @endif
                @if($question->checkbox_ans_6)
                  <li>{{$question->checkbox_ans_6}}</li> 
                @endif
              </ul>

            </div>
					@endif

					@if($question->ans_type == "true_false")
					<div class="answer-options">
						<label class="form-check-label radio-btn-design" for="checkTrue_{{$question->id}}">
              <input type="radio" class="form-check-input" id="checkTrue_{{$question->id}}" name="question_{{$question->id}}" value="1">  <span style="margin-left: 35px;">True</span>
            <span class="checkmark"></span>
            </label>
            <br>
            <label class="form-check-label radio-btn-design" for="checkFalse_{{$question->id}}">
              <input type="radio" class="form-check-input" id="checkFalse_{{$question->id}}" name="question_{{$question->id}}" value="0">  <span style="margin-left: 35px;">False</span>
            <span class="checkmark"></span>
            </label>
					</div>
					<button type="button" class="btn btn-success m-t-20" onclick="showAnswer({{$question->id}})">Show Answer</button>
					<div class="show-answer m-t-20" style="display: none;" id="show_answer_{{$question->id}}"><span class="ans">Ans.</span> @if($question->true_false_answer) True @else False @endif</div>
					@endif

					@if($question->ans_type == "write")
					<textarea name="write_ans_data_{{$question->id}}" class="form-control" rows="9" placeholder="Write Answer"></textarea>
					<button type="button" class="btn btn-success m-t-20" onclick="showAnswer({{$question->id}})">Show Answer</button>
					<div class="show-answer m-t-20" style="display: none;" id="show_answer_{{$question->id}}"><span class="ans">Ans.</span> {{$question->write_ans}}</div>
					@endif


				</div>
			</div>
		 @endforeach
		 <!-- <button type="submit" class="btn btn-success get-answer">Submit</button>
		 </form> -->
		</div>
	</div>
</div>
<style>
    body{
        background: #0a3644;
        color: #ffffff;
    }
    
</style>
<script>
	function showAnswer(id){
		$('#show_answer_'+id).show();
	}
</script>
@endsection