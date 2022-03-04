@extends('layouts.app')
@section('content')
@if(isset($banner))
<div class="banner">
	<img src="{{asset('/public/images/banner/'.$banner->image)}}" alt="{{$banner->heading}}"/>
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

<div class="container text-question-page">
	<div class="row justify-content-center m-t-50">
		<div class="col-md-8">
			<h1 class="heading-txt">PHP Test Questions and Answers</h1>
		<form method="post" action="/test-php">
		    {{ csrf_field() }}
		@foreach($questions as $question)
			<div class="question-box">
				<div class="question-title"><span class="Qu">{{$question->question_number}})</span> {{$question->question}}</div>
				<div class="answer-options-section">
					<div class="answer-options">
						<span class="options-ans-left">
							<div class="form-check-inline">
                              <label class="form-check-label radio-btn-label" for="checkA_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkA_{{$question->id}}" name="question_{{$question->id}}" value="A" required>{{$question->A}}
                                <span class="checkmark"></span>
                              </label>
                            </div>
						</span>
						<span class="options-ans-right">
							<div class="form-check-inline">
                              <label class="form-check-label radio-btn-label" for="checkB_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkB_{{$question->id}}" name="question_{{$question->id}}" value="B" required>{{$question->B}}
                                <span class="checkmark"></span>
                              </label>
                            </div>
						</span>
					</div>
					<div class="answer-options p-t-10">
						<span class="options-ans-left">
							<div class="form-check-inline">
                              <label class="form-check-label radio-btn-label" for="checkC_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkC_{{$question->id}}" name="question_{{$question->id}}" value="C" required>{{$question->C}}
                                <span class="checkmark"></span>
                              </label>
                            </div>
						</span>
						<span class="options-ans-right">
							<div class="form-check-inline">
                              <label class="form-check-label radio-btn-label" for="checkD_{{$question->id}}">
                                <input type="radio" class="form-check-input" id="checkD_{{$question->id}}" name="question_{{$question->id}}" value="D" required>{{$question->D}}
                                <span class="checkmark"></span>
                              </label>
                            </div>
						</span>
					</div>
				</div>
			</div>
		 @endforeach
		 <button type="submit" class="btn btn-success get-answer">Submit</button>
		 </form>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>


<form>
				<h2>2. Customs Radios</h2>
				<div class="form-check">
					<label>
						<input type="radio" name="radio" checked> <span class="label-text">Option 01</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="radio" name="radio"> <span class="label-text">Option 02</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="radio" name="radio"> <span class="label-text">Option 03</span>
					</label>
				</div>
				<div class="form-check">
					<label>
						<input type="radio" name="radio" disabled> <span class="label-text">Option 04</span>
					</label>
				</div>
			</form>

<style>
	@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
body{
	padding: 50px;
}

label{
	position: relative;
	cursor: pointer;
	color: #666;
	font-size: 30px;
}

input[type="checkbox"], input[type="radio"]{
	position: absolute !important;
	right: 9000px;
}

/*Check box*/
input[type="checkbox"] + .label-text:before{
	content: "\f096";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="checkbox"]:checked + .label-text:before{
	content: "\f14a";
	color: #2980b9;
	animation: effect 250ms ease-in;
}

input[type="checkbox"]:disabled + .label-text{
	color: #aaa;
}

input[type="checkbox"]:disabled + .label-text:before{
	content: "\f0c8";
	color: #ccc;
}

/*Radio box*/

input[type="radio"] + .label-text:before{
	content: "\f10c";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 5px;
}

input[type="radio"]:checked + .label-text:before{
	content: "\f192";
	color: #8e44ad;
	animation: effect 250ms ease-in;
}

input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

input[type="radio"]:disabled + .label-text:before{
	content: "\f111";
	color: #ccc;
}

/*Radio Toggle*/

.toggle input[type="radio"] + .label-text:before{
	content: "\f204";
	font-family: "FontAwesome";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;
	-webkit-font-smoothing:antialiased;
	width: 1em;
	display: inline-block;
	margin-right: 10px;
}

.toggle input[type="radio"]:checked + .label-text:before{
	content: "\f205";
	color: #16a085;
	animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled + .label-text{
	color: #aaa;
}

.toggle input[type="radio"]:disabled + .label-text:before{
	content: "\f204";
	color: #ccc;
}


@keyframes effect{
	0%{transform: scale(0);}
	25%{transform: scale(1.3);}
	75%{transform: scale(1.4);}
	100%{transform: scale(1);}
}
</style>
@endsection