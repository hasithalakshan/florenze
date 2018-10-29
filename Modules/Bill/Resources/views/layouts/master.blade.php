<!DOCTYPE html>
<html lang="en" id="printarea">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Billing</title>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('../Modules/Bill/Assets/css/swipebox.css')}}">
<link href="{{ asset('../Modules/Bill/Assets/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('../Modules/Bill/Assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('../Modules/Bill/Assets/css/print.css')}}" rel="stylesheet" type="text/css" media="print" />
<link href="{{ asset('../Modules/Bill/Assets/css/printstyle.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('../Modules/Bill/Assets/css/form-chamidu.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('../Modules/Bill/Assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" media="all"><!--small icon display-->
<link href="{{ asset('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />


<!-- js -->
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('../Modules/Bill/Assets/js/script.js')}}"></script>
<!-- //js -->
<script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/moment.js')}}"></script>
<script src="{{ asset('js/jquery.validate.js')}}"></script>


    </head>
    <!--<body onload="myFunction1(),myFunction()">       -->
        <body>
        @yield('content')
    </body>
</html>
