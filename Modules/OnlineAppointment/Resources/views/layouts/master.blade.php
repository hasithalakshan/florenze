<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Appointment</title>
        
        <!-- vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/lightslider.min.css')}}">
        <!-- custom styles -->
        <link rel="stylesheet" href="{{ asset('css/theme.css')}}">
        <link rel="stylesheet" href="{{ asset('../Modules/OnlineAppointment/Assets/css/style.css')}}">
        
        <!-- vendor scripts -->
        <script src="{{ asset('vendor/jquery/jquery-1.3.2.min.js')}}"></script>
        <script src="{{ asset('js/jquery.nivo.slider.pack.js')}}"></script>
        <script>
            var $old=jQuery.noConflict(true); 
            $old(document).ready(function() {
               $old('#slider').nivoSlider({ pauseOnHover:false}); 
            });
        </script>
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{ asset('js/select2.min.js')}}"></script>
        <script src="{{ asset('js/jquery.validate.js')}}"></script>
        <!-- custom scripts -->
        <script src="{{ asset('../Modules/OnlineAppointment/Assets/js/script.js')}}"></script>
        
    </head>
    <body>
        @yield('content')
    </body>
</html>
