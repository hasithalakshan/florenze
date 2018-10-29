@extends('onlineappointment::layouts.master')

@section('content')
<div id="body-wrapper">
<div class="image-slider">
    <div id="slider-wrapper">        
        <div id="slider" class="nivoSlider">
            <img src="{{ asset('../Modules/OnlineAppointment/Assets/images/slider-image1.png')}}" alt="">
            <img src="{{ asset('../Modules/OnlineAppointment/Assets/images/slider-image2.png')}}" alt="">
        </div><!--close slider-->
    </div>
    <div class="header">
        <div class="logo">
        </div>
        <div class="top-nav">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a data-toggle="modal" data-target="#appointment-modal">E-Channel</a></li>
            </ul>					
        </div>
        <div class="clear"> </div>
    </div>
    <div class="row options">
            <div class="listview row">
                <div class="listimg1 col-sm-6"></div>
                <h3 class="col-sm-6">30+ Best Doctors</h3>
            </div>
            <div class="listview row">
                    <div class="listimg2 col-sm-6"></div>
                    <h3 class="col-sm-6">24 hrs Service</h3>
            </div>
            <div class="listview row">
                    <div class="listimg3 col-sm-6"></div>
                    <h3 class="col-sm-6">Patient Care</h3>
            </div>
    </div>

</div>
<!--End-image-slider---->

<div class="clear"> </div>

<div class="wrap">
    <div class="content-box">
        <div class="section group row">
            <div class="col-sm-4 feature">
                    <h3>Dedicated Staff</h3>
                    <img src="{{ asset('../Modules/OnlineAppointment/Assets/images/box-img1.jpg')}}" title="staff" />
                    <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <a href="#">Readmore</a>
            </div>
            <div class="col-sm-4 feature">
                    <h3>Candidates</h3>
                    <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</span>
                    <p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor pariatur.</p>
                    <ul>
                            <li><a href="#"><img src="images/arrow.png">Primary Care Directory</a></li>
                            <li><a href="#"><img src="images/arrow.png">Medical Fee Waiving Mechanism</a></li>
                            <li><a href="#"><img src="images/arrow.png">Health Care Voucher</a></li>
                            <li><a href="#"><img src="images/arrow.png">reprehenderit in voluptate</a></li>
                            <li><a href="#"><img src="images/arrow.png">laboris nisi ut aliquip ex ean</a></li>
                            <li><a href="#"><img src="images/arrow.png">aboris nisi ut aliquip</a></li>
                            <li><a href="#"><img src="images/arrow.png">Duis aute irure dolor </a></li>
                            <li><a href="#"><img src="images/arrow.png">adipisicing elit, sed do</a></li>
                            <li><a href="#"><img src="images/arrow.png">Ut enim ad minim veniam</a></li>
                            <li><a href="#"><img src="images/arrow.png">Primary Care Directory</a></li>
                            <li><a href="#"><img src="images/arrow.png">Medical Fee Waiving Mechanism</a></li>
                    </ul>
            </div>
            <div class="col-sm-4 feature">
                    <h3>Quality Service</h3>
                    <img src="{{ asset('../Modules/OnlineAppointment/Assets/images/box-img2.jpg')}}" title="staff" />
                    <span>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <a href="#">Readmore</a>
            </div>
        </div>
    </div>
</div>
<div class="clear"> </div>
<div class="footer">
    <div class="wrap">
        <div class="footer-left">
                        <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">services</a></li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="contact.html">contact</a></li>
                        </ul>
        </div>
        <div class="footer-right">
                <p>Medicare | Design By <a href="http://w3layouts.com/">W3Layouts</a></p>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<!--end-wrap-->

</div>



@if (View::exists('onlineappointment::online_appointment')) @include('onlineappointment::online_appointment') @endif

@stop


