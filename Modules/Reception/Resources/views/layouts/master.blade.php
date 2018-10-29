<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Reception</title>
        
        <!-- styles -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/jquery.fullpage.css')}}">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/calendar.css')}}">
        <link rel="stylesheet" href="{{ asset('css/theme.css')}}">
        <link rel="stylesheet" href="{{ asset('css/dropzone.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/basic.min.css')}}">
        <link rel="stylesheet" href="{{ asset('../Modules/Reception/Assets/css/style.css')}}">
        
        <!-- scripts -->
        <script src="{{ asset('js/socket.io.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/jquery.fullpage.min.js')}}"></script>
        <script src="{{ asset('js/jquery.fullpage.extensions.min.js')}}"></script>
        <script src="{{ asset('js/jquery.validate.js')}}"></script>
        <script src="{{ asset('js/dropzone.min.js')}}"></script>
        <script src="{{ asset('js/script.js')}}"></script>
        <script src="{{ asset('js/moment.js')}}"></script>
        <!-- scripts - to be distributed -->
        <script src="{{ asset('../Modules/Reception/Assets/js/script.js')}}"></script>
        <script src="{{ asset('../Modules/Reception/Assets/js/notification_engine.js')}}"></script>
        
        @if (View::exists('appointment::layouts.master')) @include('appointment::layouts.master') @endif
        
    </head>
    <body>
        @yield('content')
    </body>
</html>
