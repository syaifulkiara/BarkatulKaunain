<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('back/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-gradient-navy">
<div class="container">
<br>
@yield('content')
</div>
<script src="{{ asset('back/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('back/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{ asset('back/js/sb-admin-2.min.js')}}"></script>
</body>
</html> 