<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('uploads/favicon.ico') }}">
        <!-- <link rel="icon" type="image/x-icon" href="../uploads/favicon.ico"> -->
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- Scripts -->
        <link id="pagestyle" href="{{ asset('css/material-dashboard.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset ('css/owl.carousel.min.css') }}" >
        <link rel="stylesheet" href="{{ asset ('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset ('css/style.css') }}" >
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased">
        @include('layouts.inc.frontnavigation')
            <div>
                @yield('content')
            </div> 
            @include('sweetalert::alert')
        @include('layouts.inc.frontfooter')
