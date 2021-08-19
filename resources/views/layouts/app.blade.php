<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} @if(isset($title)) {{$title}} @endif</title>
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
    <link rel="stylesheet" href="/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css/design.css">
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
<body>


@include('etc.navbar')

@yield('content')


<!-- commn code all page -->

@include('etc.footer')
    <script type="text/javascript" src="{{config('app.file_path')}}/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="{{config('app.file_path')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{config('app.file_path')}}/js/toastr.min.js"></script>

    {!! Toastr::message() !!}
</body>
</html>
