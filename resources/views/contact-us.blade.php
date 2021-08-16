@extends('layouts.app')
@section('content')
@if(!empty($banner->image))
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
<div class="m-t-70"></div>
@endif

<div class="container" style="margin-top: 100px;">
            <div class="row contact-address-section">
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contact-address-box">
                  <div class="left-side-icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                <div class="address-content">
                  <div class="address-content-title">Company Address</div>
                  <p>Near Bajaj Agency (Kangthli)<br>
                     Kaithal, Haryana (136033)
                  </p>               
                </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contact-address-box">
                  <div class="left-side-icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                  <div class="address-content">
                    <div class="address-content-title">E-Mail</div>
                    <p><a href="mailto:{{ config('app.web_mail_address') }}">{{ config('app.web_mail_address') }}</a></p>              
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contact-address-box">
                  <div class="left-side-icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <div class="address-content">
                    <div class="address-content-title">Phone Number</div>
                    <p><span class="text-primary"><a href="tel:{{ config('app.web_contact_number') }}">{{ config('app.web_contact_number') }}</a></span>
                    </p>             
                  </div>
                </div>
              </div>
            </div>
    <div class="row justify-content-center">

        <div class="contct-form-section m-b-50">
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

    <section class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6913.68720783754!2d76.34647792556372!3d29.955176877659273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3911da2de2e5af6d%3A0x2a04c3a9cb187b90!2sKangthali%2C%20Haryana%20136033!5e0!3m2!1sen!2sin!4v1629087723308!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
<style>
    footer {
    margin-top: -4px;
}
</style>
@endsection