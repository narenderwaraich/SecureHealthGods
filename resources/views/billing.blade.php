<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('app.name')}} @if(isset($title)){{$title}}@endif</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@if(isset($description)) {{$description}} @endif">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="google-site-verification" content="GepccWm_M384hcZ_LsUELFhZO7saTPzAnrAUm7oQM0k" />
    <link rel="canonical" href="http://www.securehealthgods.in/" />
    <link rel="icon" href="{{config('app.file_path')}}/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/fonts/themify/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css-hamburgers/hamburgers.css">
    <link rel="stylesheet" href="{{config('app.file_path')}}/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css/design.css">
    <link rel="stylesheet" href="{{config('app.file_path')}}/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{config('app.file_path')}}/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="{{config('app.file_path')}}/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css/responsive.css">
    <script type="text/javascript" src="{{config('app.file_path')}}/jquery/jquery-3.2.1.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KP6XGZKLW7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-KP6XGZKLW7');
    </script>
</head>
<body style="background: #000;">


<div class="container">
	<div class="row justify-content-center m-t-50">
		<div class="col-md-12">
			<div class="card m-t-100">
				<div class="card-header">
					<h3>Payment</h3>
				</div>
				<div class="card-body">
					<p>Your bill amount Rs. 2187 is pending now pay your pending billing payment. click on button and pay your bill</p>
					<br><br>
					<a href="/pay-billing"><button type="button" class="btn btn-dark btn-lg">Pay Now</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{config('app.file_path')}}/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="{{config('app.file_path')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{config('app.file_path')}}/js/toastr.min.js"></script>
    <script src="{{config('app.file_path')}}/owl-carousel/owl.carousel.js"></script>
    {!! Toastr::message() !!}
</body>
</html>
