<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content=""/>
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="icon" type="image/png" href="/css/fav.png"/>


    @vite('resources/css/app.css')
    @yield('css')

</head>

<body>

<!-- Start of Header -->
@include('includes.header')
<!-- End of Header -->


<!-- Start of Main -->
@yield('content')
<!-- End of Main -->

<!-- Start of Footer -->
@include('includes.footer')
<!-- End of Footer -->



@vite(['resources/js/app.js'])
@yield('js')

</body>
</html>
