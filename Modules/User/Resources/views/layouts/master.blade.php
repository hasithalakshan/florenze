<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module User</title>        
        
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
        <link rel="stylesheet" href="{{ asset('../Modules/User/Assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/theme.css')}}">
        <!-- scripts -->
       <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('js/jquery.validate.js')}}"></script>
        <script src="{{ asset('../Modules/User/Assets/js/script.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        
        
        
    </head>
    <body class="nav-md">
        @yield('content')
    </body>
</html>
