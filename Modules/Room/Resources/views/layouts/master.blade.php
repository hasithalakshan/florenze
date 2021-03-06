<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Room Assistant Panal</title>
		
		
		<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
		
		<link href="{{ asset('../Modules/Room/Assets/css/style.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('../Modules/GeneralAdministration/Assets/css/stylehome.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('../Modules/GeneralAdministration/Assets/css/styletabs.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('../Modules/GeneralAdministration/Assets/css/tt.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('../Modules/GeneralAdministration/Assets/css/mt.css')}}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ asset('css/theme.css')}}">
		
		<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		
		<script type="text/javascript" src="{{ asset('../Modules/Room/Assets/js/script.js')}}"></script>
		<link rel="stylesheet" href="{{ asset('css/select2.min.css')}}">
		<script src="{{ asset('js/select2.min.js')}}"></script>
		<script src="{{ asset('js/jquery.validate.js')}}"></script>
		<script src="{{ asset('js/moment.js')}}"></script>
		
		
    </head>
	
	

   <body>
   <div id="welcome-carousel" class="carousel fade" data-ride="carousel"  data-interval="10000" data-pause="false">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div id="bg1"></div>
        </div>
        <div class="item">
            <div id="bg2"></div>
        </div>
    </div>
</div>

<div id="logo"></div>
        @yield('content')
    </body>
</html>
