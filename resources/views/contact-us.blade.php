@extends('layouts.app')
@section('content')
@if(!empty($banner->image))
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

<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="contct-form-section">
            <div class="form-title">Get In Touch</div>
            <div class="form-subtitle">We would be happy to help you. You can contact us ..</div>
            <div class="form-style shadow-lg">
                <form action="/contactUs" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control form-input" name="name" placeholder="Name" required>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="tel" class="form-control form-input" name="mobile" placeholder="Mobile">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-input " placeholder="Email" value="" required="">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="dis-none" for="query">Message</label>
                                <textarea class="form-control windows-form-input {{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" rows="5" placeholder="Message" id="query"></textarea>
                                @if ($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- <input type="checkbox" onclick="myFunction()"> &nbsp; <b>Show Password</b> -->
                    <br>

                    <button type="submit" class="btn btn-style btn-top" >Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection