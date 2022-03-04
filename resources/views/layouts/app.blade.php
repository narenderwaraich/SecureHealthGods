<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@if(isset($title)){{$title}}@endif | {{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@if(isset($description)) {{$description}} @endif">
    <meta name="google-site-verification" content="GepccWm_M384hcZ_LsUELFhZO7saTPzAnrAUm7oQM0k" />
    <link rel="canonical" href="http://www.securehealthgods.in/" />
    <link rel="shortcut icon" href="{{config('app.file_path')}}/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="http://www.freekafanda.in/" />
    <link rel="icon" href="{{config('app.file_path')}}/favicon.ico" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{config('app.file_path')}}/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{config('app.file_path')}}/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css/custom.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{config('app.file_path')}}/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css/design.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.file_path')}}/css/responsive.css">
    <script type="text/javascript" src="{{config('app.file_path')}}/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
     <div id="app">
        @include('etc.navbar')

        <main class="m-t-72">
            @yield('content')
        </main>
        @include('etc.footer')
    </div>
    <script type="text/javascript" src="{{config('app.file_path')}}/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="{{config('app.file_path')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{config('app.file_path')}}/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</body>
</html>