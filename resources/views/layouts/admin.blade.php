<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
      <meta charset="utf-8">
      <title>{{ config('app.name') }} Admin Panel</title>
      <meta name="description" content="Resturent Management System">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="apple-touch-icon" href="apple-icon.png">
      <link rel="shortcut icon" href="favicon.ico">
      <link rel="stylesheet" href="/css/normalize.css">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="/bootstrap/css/bootstrap-toggle.min.css">
      <link rel="stylesheet" href="/css/font-awesome.min.css">
      <link rel="stylesheet" href="/css/themify-icons.css">
      <link rel="stylesheet" href="/css/cs-skin-elastic.css">
      <!-- <link rel="stylesheet" href="/css/bootstrap-select.less"> -->
      <link rel="stylesheet" href="/css/style.css">
      <link rel="stylesheet" href="/css/admin-custom.css">

      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="/css/toastr.min.css">
</head>
<body>
@include('etc.admin-navbar')

@yield('content')

    <script src="/jquery/jquery-3.2.1.min.js"></script>
    <script src="/bootstrap/js/popper.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/bootstrap-toggle.min.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script src="/js/admin-custom.js"></script>
    {!! Toastr::message() !!}
</body>
</html>