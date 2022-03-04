<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name') }} @if(isset($title)) {{$title}} @endif</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@if(isset($description)) {{$description}} @endif">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="http://www.freekafanda.in/" />
    <link rel="icon" href="/public/favicon.ico" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('/public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/custom.css">
    <link rel="stylesheet" type="text/css" href="/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/design.css">
    <link rel="stylesheet" type="text/css" href="/public/css/responsive.css">
    <script type="text/javascript" src="/public/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
     <div id="app">
        @include('etc.navbar')

        <main class="m-t-72">
            @yield('content')
        </main>
        @include('etc.footer')
    </div>
    <script type="text/javascript" src="/public/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
</body>
</html>