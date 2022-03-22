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
  <a href="/practice-exams/AWS">
    <button type="button" class="btn btn-primary btn-lg on-mob-top-15" style="cursor: pointer;">Practites Exam AWS</button>
  </a>

  <div class="m-t-50">
    <div class="question-box">
      <div class="question-title"><!-- <span class="Qu">Q.01)</span> --> AWS Pricing Calculator</div>
      <p class="answer"><!-- <span class="ans">Ans.</span> -->AWS Pricing Calculator lets you explore AWS services and create an estimate for the cost of your use cases on AWS. You can model your solutions before building them, explore the price points and calculations behind your estimate, and find the available instance types and contract terms that meet your needs. This enables you to make informed decisions about using AWS. You can plan your AWS costs and usage or price out setting up a new set of instances and services. You cannot use this service to forecast your AWS account cost and usage.</p>
    </div>
    <div class="question-box">
      <div class="question-title"><!-- <span class="Qu">Q.01)</span> --> U2F security key</div>
      <p class="answer"><!-- <span class="ans">Ans.</span> -->Universal 2nd Factor (U2F) Security Key is a device that you can plug into a USB port on your computer. U2F is an open authentication standard hosted by the FIDO Alliance. When you enable a U2F security key, you sign in by entering your credentials and then tapping the device instead of manually entering a code.<br>
        <br>
        <br><br>
        How to enable the U2F Security Key for your own IAM user:<br>
        <a href="https://docs.aws.amazon.com/IAM/latest/UserGuide/id_credentials_mfa_enable_u2f.html">https://docs.aws.amazon.com/IAM/latest/UserGuide/id_credentials_mfa_enable_u2f.html</a></p>
      </div>
    </div>
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