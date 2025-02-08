<?php
 $getlink = $_GET['reset'];
 $obj = json_decode (json_encode ($getlink), FALSE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mpingi Market | Free Online Marketplace Platform</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.ico') }}" />
    <link href="{{ asset('assets/plugin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/mainstyles2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/css/placeholder-loading.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet">



    <script src="{{ asset('assets/plugin/jquery.min.js') }}"></script>
    <script type="text/javascript">
      $(window).on('load', function(){
        setTimeout(function(){
              $('.loader').fadeOut('slow');
          }, 1000);
      });
    </script>
</head>

<body class="flexcroll">
    <div class="topnav">
        <nav class="navbar navbar-light" style="background-color:#464444;border-bottom: 2px solid #f24c15">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/mpingi market logo 125 46 gh.png') }}" height="50"
                        data-aos="fade-left" data-aos-duration="1000"></a>
                <div class="mt-1 d-flex">
                    <p style="font-weight: bold;color:aliceblue;"><img src="{{ asset('assets/icons/1236251.png') }}"
                            width="16" height="16" style="border-radius:50%"> ENGLISH &nbsp;<img
                            src="{{ asset('assets/icons/1542408.png') }}" width="16" height="16"
                            style="border-radius:50%"> FRANCAIS</p>
                </div>
            </div>
        </nav>
    </div>
    <div id="navbar">
        <!-- Responsive navbar-->
        <nav id="navbar_main" class="mb-0 shadow-sm navbar navbar-expand-lg navbar-light mobile-offcanvas" style="background-color: #fff;">
            <div class="offcanvas-header">
                <button class="btn-close float-end"></button>
            </div>
            <div class="container px-5">
                {{-- <a class="navbar-brand" href="#!">Start Bootstrap</a> --}}
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button> --}}

                    <ul class="mb-2 navbar-nav mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">
                                <i class="fas fa-home"></i> Home</a>
                        </li>

                        <li class="nav-item">
                           <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"><i class="fas fa-list"></i> Categories</a>

                            <ul class="shadow dropdown-menu">
                                <li><a class="dropdown-item" href="#"
                                        id="globalheadernavhref">Products (48)</a></li>
                                <li class="dropend">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" id="globalheadernavhref">Services (20)</a>
                                    <ul class="shadow dropdown-menu">
                                        <li><a class="dropdown-item" href="#" id="globalheadernavhref">Industry &
                                                Manufacture (3)</a></li>
                                        <li><a class="dropdown-item" href="#" id="globalheadernavhref">Businesses
                                                (17)</a></li>
                                    </ul>
                                </li>

                                <li class="dropend">
                                    <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" id="globalheadernavhref">Jobs (0)</a>
                                    <ul class="shadow dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('jobs') }}" id="globalheadernavhref">Available Jobs
                                                (0)</a></li>
                                        <li><a class="dropdown-item" href="{{ route('jobseekers') }}" id="globalheadernavhref">Job Seekers
                                                (0)</a></li>
                                    </ul>
                                </li>

                            </ul>

                          </li>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tag"></i> Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('shops') }}" id="globalheadernavhref">Stores Nearby (45)</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('products') }}" id="globalheadernavhref">All Products (48)</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('newproducts') }}" id="globalheadernavhref">New Products (34)</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('usedproducts') }}" id="globalheadernavhref">Used Products (13) </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('refurbishedproducts') }}" id="globalheadernavhref">Refurbished Products
                                        (1)</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-wrench"></i> Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('industriesmanufactures') }}" id="globalheadernavhref">
                                        Industries & Manufactures (3)</a></li>
                                <li><a class="dropdown-item" href="{{ route('servicesnearbyyou') }}" id="globalheadernavhref">
                                        Businesses (17)</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Jobs
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('availablejobs') }}" id="globalheadernavhref">
                                        Available Jobs (0)</a></li>
                                <li><a class="dropdown-item" href="{{ route('ajobseekers') }}" id="globalheadernavhref">Job Seekers (0)</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> My Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="#" id="globalheadernavhref" data-bs-toggle="modal" data-bs-target="#mainlogin_Modal">Sign In</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('login') }}" id="globalheadernavhref">Sign In</a></li>
                                <li><a class="dropdown-item" href="{{ route('joinlogin') }}" id="globalheadernavhref">Join For Free </a></li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                 data-bs-auto-close="outside"> <i class="fas fa-plus-circle"></i> More</a>

                             <ul class="shadow dropdown-menu">
                                 <li class="dropend">
                                     <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                         data-bs-auto-close="outside" id="globalheadernavhref">Help</a>
                                     <ul class="shadow dropdown-menu">
                                         <li><a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Help</a></li>
                                         <li><a class="dropdown-item" href="{{ route('faq') }}" id="globalheadernavhref">FAQ</a></li>
                                         <li><a class="dropdown-item" href="{{ route('contactus') }}" id="globalheadernavhref">Contact Us</a></li>
                                         <li><a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Advice</a></li>
                                     </ul>
                                 </li>

                                 <li class="dropend">
                                     <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                         data-bs-auto-close="outside" id="globalheadernavhref">About Us</a>
                                     <ul class="shadow dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('about') }}" id="globalheadernavhref">About Us</a></li>
                                        <li><a class="dropdown-item" href="{{ route('contactus') }}" id="globalheadernavhref">Feedback</a></li>
                                        <li><a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Terms of Use</a></li>
                                        <li><a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Privacy Policy</a></li>
                                     </ul>
                                 </li>

                             </ul>

                           </li>
                         </li>

                        <li class="nav-item">
                            <button type="button" class="btn btnColor">Sell for free</button>&nbsp;<button type="button"
                            class="btn btn-outline-success">Buy now!</button>
                        </li>
                    </ul>

            </div>
        </nav>
        <span class="screen-darken"></span>
        <button data-trigger="navbar_main" class="d-lg-none navbar-toggler btnCss" type="button" >
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </button>
        {{-- <div class="d-lg-none" data-trigger="navbar_main" id="toggle-icon">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div> --}}

    </div>
    @include('mainindex.modal.mainlogin')

<div class="">
    <div class="loader"></div>
    <div class="container-fluid">
        <section class="">
            {{-- --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        {{-- blank div --}}
                    </div>
                    <div class="mt-4 col-md-4">
                        {{-- --}}
                        <div class="card">
                            <div class="text-center card">
                                <div class="card-header cardheaderCss">
                                    <h6 class="mt-2 header-title"><i class="fas fa-lock"></i> Change password</h6>
                                </div>

                                <div class="mx-3 mt-4 text-center alert alert-warning titleDetails" role="alert">
                                    Change password Here
                                </div>
                                <div class="mx-3">
                                @if(session()->has('mgs'))
                                        <div class="alert alert-success alerts">
                                        {{ session()->get('mgs') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="mx-3">
                                    @if(session()->has('success'))
                                            <div class="alert alert-success alerts">
                                            {{ session()->get('success') }}
                                            </div>
                                        @endif
                                    </div>

                                <div class="mx-3">
                                @if(session()->has('msg-notfound'))
                                        <div class="alert alert-success alerts">
                                        {{ session()->get('msg-notfound') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('newpassword', $obj ) }}">
                                        @csrf
                                        <div class="mb-3 input-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa fa-lock"></i>&nbsp;<font color='red'>*</font>
                                                </span>
                                                <input type="password" name="password" class="form-control pass @error('password') is-invalid @enderror" placeholder="New Password"
                                                    aria-label="Password" aria-describedby="basic-addon1" autocomplete="off">

                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="text-danger" style="text-align:left;font-size:15px!important">{{ $errors->first('password') }}</span>
                                          @endif
                                        </div>
                                        <div class="mb-3 input-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa fa-lock"></i>&nbsp;<font color='red'>*</font>
                                                </span>
                                                <input type="password" name="password_confirmation" class="form-control pass @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password"
                                                    aria-label="Password" aria-describedby="basic-addon1" autocomplete="off">

                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                            <span class="text-danger" style="text-align:left;font-size:15px!important">{{ $errors->first('password_confirmation') }}</span>
                                          @endif
                                        </div>

                                        <div class="input-group">

                                        </div>
                                       <!-- form-group// -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline btn-lg w-100 DetailsBtns2_">
                                                Change Password </button>
                                        </div>

                                        <div class="mt-3 form-group">
                                            <div class="row g-1">
                                                <div class="col-12">
                                                    <a href="{{ route('login') }}" class="DetailsBtnlogin_2"><button type="button"
                                                        class="btn btn-outline btn-lg w-100 DetailsBtnlogin_2"><i
                                                            class="fas fa-arrow-left"></i> Back to login </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>


                            {{-- --}}
                        </div>
                    </div>


                </div>
            </div>

        </section>
        <section>
            <div class="container mt-4 mb-4">
                <div class="row g-2 justify-content-center">
                    <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                        <div class="card" style="width: 100%;border:none">
                            <div class="card-body">
                                <center class="cardCss">
                                    <h5 class="card-title"><i class="fa fa-truck fa-2x" style="color:#1a6be8"></i></h5>
                                    <p class="card-text"><a href="">DELIVERY <br>ANYWHERE</a></p>
                                </center>

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                        <div class="card" style="width: 100%;border:none">
                            <div class="card-body">
                                <center class="cardCss">
                                    <h5 class="card-title"><i class="fa fa-lock fa-2x" style="color:#00a61c"></i></h5>
                                    <p class="card-text"><a href=""> PAY CASH ON DELIVERY</a></p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                        <div class="card" style="width: 100%;border:none">
                            <div class="card-body">
                                <center class="cardCss">
                                    <h5 class="card-title"><i class="fa fa-gift fa-2x" style="color:#ffe305"></i></h5>
                                    <p class="card-text"><a href="">GREAT&nbsp;PRODCUTS&nbsp;AT
                                            UNBEATABLE&nbsp;PRICES</a>
                                    </p>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                        <div class="card" style="width: 100%;border:none">
                            <div class="card-body">
                                <center class="cardCss">
                                    <h5 class="card-title"><i class="fa fa-sync fa-2x" style="color:#f25433"></i></h5>
                                    <p class="card-text"><a href="">FREE RETURNS & EXCHANGES</a></p>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </section>
        </header>

        <footer class="mainfooter" role="contentinfo">
            <div class="py-3 container-fluid"
                style="background-color:#282828;  font: 10pt/130% Arial;
            font-family:Arial; color:#fff">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <i class="fa fa-paper-plane"></i> contact@mpingimarket.com <i class="fa fa-users"></i> Visitors
                        435734
                    </div>
                    <div class="col-md-4">
                        Copyright © Mpingi Market All Rights Reserved
                    </div>
                    <div class="col-md-3"><i class="fa fa-cog faa-spin spinner "></i> Developed by Nzuzi Mpingi</div>
                </div>
            </div>

            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-pad">
                                <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i
                                        class="fa fa-file"></i>&nbsp;ABOUT US</h6>
                                <ul class="list-unstyled">
                                    <li>
                                        <p style="
                                        font-size: 12px;">
                                            <span
                                                style="color: #ff7519;
                                           font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                           font-size: 10pt;">MPINGI
                                                FREE ONLINE CLASSIFIED ADS PLATFORM</span> is a free online
                                            classifieds web and mobile app content management system (CMS) where you can post
                                            and order new, used and refurbished products online like electronics, cars, fashion
                                            apparel, collectibles, sporting goods among others as well as services, jobs, news
                                            and many others around the world, launched in 2017. <span
                                                style="color: #ff7519;
                                           font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                           font-size: 10pt;">Read
                                                More</span>
                                        </p>
                                    </li>
                                    <li>
                                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i class="fa fa-eye"></i>
                                            AD SERVING — SIMPLIFIED</h6>
                                    </li>
                                    <li><i class="mt-3 fa fa-cloud"></i>&nbsp;Cloud-based - nothing to install </li>
                                    <li><i class="mt-3 fa fa-globe"></i>&nbsp;World's fastest ad-code </li>
                                    <li><i class="mt-3 fa fa-users"></i>&nbsp;Handles custom ads in all formats </li>
                                    <li><i class="mt-3 fa fa-file"></i>&nbsp;Real-time reporting </li>
                                    <li><i class="mt-3 fa fa-edit"></i>&nbsp;Completely customizable interface </li>
                                    <li>
                                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%;margin-top:4%"><i
                                                class="fa fa-eye"></i> AUDIENCE TARGETING</h6>
                                    </li>
                                    <li style="
                                    font-size: 12px;"><i
                                            class="mt-3 fa fa-map-marker"></i>&nbsp;Geographic Targeting: Target
                                        your ads by country, province or state, or even as specific as city.
                                    </li>
                                    <li style="
                                    font-size: 12px;"><i
                                            class="mt-3 fa fa-mobile"></i>&nbsp;Platform Targeting: Target and
                                        serve ads depending on which device users are visiting on.
                                    </li>
                                    <li style="
                                    font-size: 12px;"><i
                                            class="fab fa-google"></i>&nbsp;Your are browsing in
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="footer-pad">
                                <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i
                                        class="fa fa-question-circle"></i>&nbsp;FREQUENTLY ASKED QUESTIONS</h6>
                                <ul class="list-unstyled">
                                    <li style="
                                     font-size: 12px;"><i
                                            class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                            How to create an Account ?</a>
                                    </li>
                                    <li style="
                                     font-size: 12px;"><i
                                            class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                            How to Sign in</a>
                                    </li>
                                    <li style="
                                     font-size: 12px;"><i
                                            class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                            How to Post Products</a>
                                    </li>
                                    <li style="
                                     font-size: 12px;"><i
                                            class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                            How to Order Products</a>
                                    </li>
                                    <li style="
                                    font-size: 12px;"><i
                                            class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                            More questions</a>
                                    </li>
                                    <li>
                                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%;margin-top:4%"><i
                                                class="fa fa-truck"></i> HELPFUL SUPPORT</h6>
                                    </li>
                                    <li style="
                                     font-size: 12px;">Our support team is available via
                                        phone or e-mail to help you make the most
                                        of MPINGI
                                    </li>
                                    <li>
                                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%;margin-top:4%"><i
                                                class="fa fa-link"></i> TAKE US EVERYWHERE YOU ARE !</h6>
                                    </li>
                                    <li><i class="mt-3 fab fa-apple fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                            id="footer-faq">Available on </span> <strong id="footer-faq">App Store</strong></li>
                                    <li><i class="mt-3 fab fa-google-plus fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                            id="footer-faq">Get it on </span> <strong id="footer-faq">Google play</strong></li>
                                    <li><i class="mt-3 fab fa-windows fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                            id="footer-faq">Download with </span> <strong id="footer-faq">Windows Store</strong>
                                    </li>

                                    <li style="
                                    font-size: 12px;margin-top:2%"><i
                                            class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq"> Live
                                            discussions</a>
                                    </li>
                                    <li style="
                                     font-size: 12px;"><i
                                            class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq">
                                            Testimonies</a>
                                    </li>
                                    <li style="
                                    font-size: 12px;"><a href="#"
                                            onclick="window.open('https://www.sitelock.com/verify.php?site=mpingimarket.com','SiteLock','width=600,height=600,left=160,top=170');"><img
                                                class="img-fluid" alt="SiteLock" title="SiteLock"
                                                src="https://shield.sitelock.com/shield/mpingimarket.com"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i class="fa fa-send"></i>&nbsp;CONTACT
                                US</h6>
                            <p style="
                                        font-size: 12px;">
                                The Members of the design team at MPINGI always striving to enhance the quality of the website
                                designed by them as a viewer your suggestions are very important to us. They are helping us in
                                continually improving the quality of this website and mobile app. Please you can make use of
                                this instant mail form for your suggestion.
                            </p>
                            <ul class="social-network social-circle">
                                <li>
                                    <form method="post" class="gap-2 d-grid">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="text" placeholder="Name"
                                                aria-label=".form-control-lg example" id="borderinput2">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="text" placeholder="E-mail"
                                                aria-label=".form-control-lg example" id="borderinput2">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="text" placeholder="Subject"
                                                aria-label=".form-control-lg example" id="borderinput2">
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="3" class="form-control form-control-lg" type="text" placeholder="Message"
                                                aria-label=".form-control-lg example" id="borderinput2"></textarea>
                                        </div>
                                        <div class="form-group" style="margin-bottom:10%">
                                            <button type="button" class="float-end btn btn-outline-warning btn-lg btnColor"
                                                value="SEND MESSAGE">SEND MESSAGE</button>
                                        </div>
                                    </form>
                                </li>


                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;">
                <a href="#top" class="scrollToTop"
                    style="font-size: 13px; font-weight: normal; text-shadow: 0 2px 2px #FFF;text-decoration: none;"><i
                        class="icon-arrow-up"></i>&nbsp; <img src="{{ asset('assets/images/up.png') }}"
                        style="width:48px; height:48px">
                </a>
            </div>

        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('assets/plugin/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugin/dist/aos.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="{{ asset('assets/js/fslightbox.js') }}"></script>

        <script>
            $(document).ready(function() {

                //fade in,out,zoom,etc...
                AOS.init();
                //end fade in,out,zoom,etc...

                //getId from country show into state
                $('.country-dropdown').change(function () {
                    var id = $(this).val();

                    $('.state-dropdown').find('option').not(':first').remove();

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                jQuery.ajaxSetup({
                    beforeSend: function() {

                            var emptyvalue = '<option value=""> Please Wait...</option>';
                            $(".state-dropdown").html(emptyvalue);
                    },
                });

                    $.ajax({
                    url:'get-states-by-country-cat/'+id,
                    type:'get',
                    dataType:'json',
                    success:function (response) {
                        $(".state-dropdown").empty();
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len>0) {
                            for (var i = 0; i<len; i++) {
                                    var id = response.data[i].id;
                                    var name = response.data[i].name;
                                    var option = "<option value='"+id+"'>"+name+"</option>";

                                    $(".state-dropdown").append(option);

                            }
                        }
                    }
                    })
                });

                //end getId from country show into state

                //getId from state show into city

                $('.state-dropdown').change(function () {
                    var id = $(this).val();

                    $('.city-dropdown').find('option').not(':first').remove();

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajaxSetup({
                    beforeSend: function() {

                            var emptyvalue = '<option value=""> Please Wait...</option>';
                            $(".city-dropdown").html(emptyvalue);
                    },
                });

                    $.ajax({
                    url:'get-states-by-state-cat/'+id,
                    type:'get',
                    dataType:'json',
                    success:function (response) {
                        $(".city-dropdown").empty();
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len>0) {
                            for (var i = 0; i<len; i++) {
                                    var id = response.data[i].id;
                                    var name = response.data[i].name;
                                    var option = "<option value='"+id+"'>"+name+"</option>";

                                    $(".city-dropdown").append(option);
                            }
                        }
                    }
                    });

                });

                //end getId from state show into city

                //header fixed scroll

                window.onscroll = function() {
                myFunction()
                };

                var navbar = document.getElementById("navbar");
                var sticky = navbar.offsetTop;

                function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
                }

                //end header fixed scroll

                //for all tooltip
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
                });

                //end for all tooltip

                //for remove card as temporary
                $('.close-icon').on('click',function() {
                    $(this).closest('.card1').fadeOut();
                });
                $('.close-icon2').on('click',function() {
                    $(this).closest('.card2').fadeOut();
                });
                $('.close-icon3').on('click',function() {
                    $(this).closest('.card3').fadeOut();
                });
                $('.close-icon4').on('click',function() {
                    $(this).closest('.card4').fadeOut();
                });
                $('.close-icon5').on('click',function() {
                    $(this).closest('.card5').fadeOut();
                });
                $('.close-icon6').on('click',function() {
                    $(this).closest('.card6').fadeOut();
                });
                $('.close-icon7').on('click',function() {
                    $(this).closest('.card7').fadeOut();
                });

                $('.close-icon8').on('click',function() {
                    $(this).closest('.card8').fadeOut();
                });

                $('.close-icon9').on('click',function() {
                    $(this).closest('.card9').fadeOut();
                });

                $('.close-icon10').on('click',function() {
                    $(this).closest('.card10').fadeOut();
                });


                $('.close-icon11').on('click',function() {
                    $(this).closest('.card11').fadeOut();
                });
                //end for remove card as temporary

                 //colapse middle colapse

                document.querySelectorAll('.accordion').forEach(el => {
                    el.addEventListener('click', e => {
                        let accordion = e.target;
                        accordion.classList.toggle('active');
                        accordion.parentElement.nextElementSibling.classList.toggle('show');
                    });
                });

             //end middle colapse

            //  collapse left sidebar menu

                    document.querySelectorAll('#button_to_trigger_collapse').forEach(el => {
                    el.addEventListener('click', e => {
                        let accordion = e.target;
                        accordion.classList.toggle('.panelx2');
                        accordion.parentElement.nextElementSibling.classList.toggle('show');
                    });
                });
             // end collapse left sidebar menu

           //carousel
           var myCarousel = document.querySelector('#myCarousel')
                var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 3000,
                wrap: false
             })
             //end carousel

             // scrollTop
              $(window).scroll(function() {
                    // scrollToTop is not a function - changed to scrollTop
                    if ($(this).scrollTop() > 75) {
                        $('.scrollToTop').fadeIn();
                    } else {
                        $('.scrollToTop').fadeOut();
                    }
                }).trigger('scroll');
              //end scrollTop

              //scrollTbelow
              $(window).scroll(function() {
                    // scrollTbelow is not a function - changed to scrollTbelow
                    if ($(this).scrollTop() < 5) {
                        $('.d-lg-none').fadeIn();
                    } else {
                        $('.d-lg-none').fadeOut();
                    }
                }).trigger('scroll');
                 //end scrollTbelow

               // search job seekers title
                $('.job_name').keyup(function(){
                    var query = $(this).val();
                    if(query != ''){
                        // $('#jobsList').html("<h2>No Found</h2>");
                      var _token = $('input[name="_token"]').val();
                    jQuery.ajaxSetup({
                    beforeSend: function() {
                        //empty only
                        },
                   });
                    $.ajax({
                        url:"{{ route('searchjobtitle') }}",
                        method:"POST",
                    data:{query:query, _token:_token},
                       success:function(data){
                        $('#jobsList').fadeIn();
                        $('#jobsList').html(data);
                       }
                     });
                    }
                });


                $(document).on("click", "#results > li > a", function( event ){
                   const value = $(this).text();
                    $('.job_name').val(value);
                    $('#jobsList').html("");
                    $('#jobsList').fadeOut();
                });

              // end search job seekers title



                //for pagination
                $(document).on('click','.pagination a', function(e){
                    e.preventDefault();
                    $('#dynamic_content_').html(make_skeleton())
                    let page = $(this).attr('href').split('page=')[1]
                    setTimeout(function() {
                                record(page)
                        }, 1500);
                    })

                    function make_skeleton() {
                        var output = '';
                        for (var count = 0; count < 12; count++) {
                            output += '<div class="col-4">';
                            output += '<div class="ph-item">';
                            output += '<div class="ph-col-12">';
                            output += '<div class="ph-picture"></div>';
                            output += '<div class="ph-row">';
                            output += '<div class="ph-col-6 big"></div>';
                            output += '<div class="ph-col-4 empty big"></div>';
                            output += '<div class="ph-col-12"></div>'
                            output += '<div class="ph-col-12"></div>'
                            output += '</div>';
                            output += '</div>';
                            output += '</div>';
                            output += '</div>';
                        }
                        return output;
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    function record(page, limit){
                        // $('#load_data').empty();
                        //   $loader = $('<div class="loader"></div>');
                        //   $loader.appendTo('#load_data');
                        //   setTimeout(function(){
                        //     $loader.remove();
                        $.ajax({
                            url:"/ajax-paginate-shop?page="+page,
                            data: {
                                    limit: limit
                            },
                            success:function(res){
                                $('.table-data_').html(res);
                            }
                        })
                    //}, 300);
                  }

                //end pagination

                // for searching data
                var query = $('.search_input_').val();
                fetch_customer_data(query);

                $(document).on('keyup', '.search_input_', function(){
                    var query = $(this).val();
                    if(query == ''){
                        record();
                    }
                    fetch_customer_data(query);
                });
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                function fetch_customer_data(query = '') {
                    $.ajax({
                    url:"{{ route('getSearchdataShop') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data) {

                        $('#dynamic_content_').html(data.table_data);

                     }
                    })
                }

               //end for searching data

              //for per page

                $(document).on('change', '#search_page',function(){
                    var pages = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dynamic_content_').html(make_skeleton())

                        setTimeout(function() {
                                record()
                        }, 1500);

                        function make_skeleton() {
                            var output = '';
                            for (var count = 0; count < 12; count++) {
                                output += '<div class="col-4">';
                                output += '<div class="ph-item">';
                                output += '<div class="ph-col-12">';
                                output += '<div class="ph-picture"></div>';
                                output += '<div class="ph-row">';
                                output += '<div class="ph-col-6 big"></div>';
                                output += '<div class="ph-col-4 empty big"></div>';
                                output += '<div class="ph-col-12"></div>'
                                output += '<div class="ph-col-12"></div>'
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                            }
                          return output;
                     }
                   function record(limit){
                        $.ajax({
                            type:'GET',
                            url:"{{ route('getPageShop') }}",
                            data:{'pages':pages, limit: limit},
                            success:function(data){
                                $('.table-data_').html(data);

                            }
                        });
                    }

                });

                //end for per page


               // get search results

                //  $('body').on('click', '#btn-resultsearch', function(e){
                //     e.preventDefault();

                //     $.ajaxSetup({
                //             headers: {
                //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //             }
                //         });

                //     const country = $('.country').val();
                //     console.log("==========country===============");
                //     console.log(country);

                //     const state =  $('.state').val();
                //     console.log("==========state===============");
                //     console.log(state);

                //     const city =  $('.city').val();
                //     console.log("==========city===============");
                //     console.log(city);

                //     const job_name =  $('.job_name').val();
                //     console.log("==========job_name===============");
                //     console.log(job_name);

                //     var data = new FormData(this);
                //         data.append('country', country);
                //         data.append('state', state);
                //         data.append('city', city);
                //         data.append('job_name', job_name);


                //     $.ajax({
                //         url: '{{ route('searchresult') }}',
                //         method: 'post',
                //         data: data,
                //         cache: false,
                //         contentType: false,
                //         processData: false,
                //         dataType: 'json',
                //         success: function(response){
                //             window.location.href= "https://mpingimarket.mywebapp.online/search-results-jobseekers";
                //         if(response.errors) {
                //             console.log("Failed");

                //         }

                //     },
                //   });
                //  });

              // end  get search results

                  //for pagination jobs
                  $(document).on('click','.pagination_ a', function(e){
                    e.preventDefault();
                     let page2 = $(this).attr('href').split('page=')[1]
                       records(page2)

                    })

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    function records(page2){
                        // $('#load_data').empty();
                        //   $loader = $('<div class="loader"></div>');
                        //   $loader.appendTo('#load_data');
                        //   setTimeout(function(){
                        //     $loader.remove();
                        $.ajax({
                            url:"/ajax-paginate-jobs?page="+page2,
                            success:function(res2){
                                $('.table-datas').html(res2);
                            }
                        })
                    //}, 300);
                  }

                //end pagination jobs

                  //for per page jobs

                  $(document).on('change', '#search_pages',function(){
                    var pages = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dynamic_contents').html(make_skeleton())

                        setTimeout(function() {
                                records()
                        }, 1500);

                        function make_skeleton() {
                            var output = '';
                            for (var count = 0; count < 12; count++) {
                                output += '<div class="col-4">';
                                output += '<div class="ph-item">';
                                output += '<div class="ph-col-12">';
                                output += '<div class="ph-picture"></div>';
                                output += '<div class="ph-row">';
                                output += '<div class="ph-col-6 big"></div>';
                                output += '<div class="ph-col-4 empty big"></div>';
                                output += '<div class="ph-col-12"></div>'
                                output += '<div class="ph-col-12"></div>'
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                            }
                          return output;
                     }
                   function records(limits){
                        $.ajax({
                            type:'GET',
                            url:"{{ route('getPageJobs') }}",
                            data:{'pages':pages, limits: limits},
                            success:function(datas){
                                $('.table-datas').html(datas);

                            }
                        });
                    }

                });

                //end for per page jobs



             //for pagination job seekers
              $(document).on('click','.pagination_s a', function(e){
                    e.preventDefault();
                     let page3 = $(this).attr('href').split('page=')[1]
                       _records(page3)

                    })

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    function _records(page3){
                        // $('#load_data').empty();
                        //   $loader = $('<div class="loader"></div>');
                        //   $loader.appendTo('#load_data');
                        //   setTimeout(function(){
                        //     $loader.remove();
                        $.ajax({
                            url:"/ajax-paginate-jobseekers?page="+page3,
                            success:function(res3){
                                $('.table-data_s').html(res3);
                            }
                        })
                    //}, 300);
                  }

                //end pagination job seekers

                //for per page jobseekers

                $(document).on('change', '#search_pagess',function(){
                    var pages = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                     records()


                   function records(limits){
                        $.ajax({
                            type:'GET',
                            url:"{{ route('getPageJobseekers') }}",
                            data:{'pages':pages, limits: limits},
                            success:function(data_s){
                                $('.table-data_s').html(data_s);

                            }
                        });
                    }

                });

                //end for per page jobseekers

                ////////////////////////////search for job available job////////////////////

                //paginate a jobs paginate jobs
                $(document).on('click','.paginations_ a', function(e){
                    e.preventDefault();
                     let page4 = $(this).attr('href').split('page=')[1]
                       records(page4)

                    })

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    function records(page4){
                        $.ajax({
                            url:"/ajax-paginate-availablejobs?page="+page4,
                            success:function(res4){
                                $('.table-data_a').html(res4);
                            }
                        })
                    //}, 300);
                  }

                //end paginate a jobs paginate jobs

               //for per page available jobs

                 $(document).on('change', '#search_pages_a',function(){
                    var pages = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dynamic_contents_a').html(make_skeleton())

                        setTimeout(function() {
                                records()
                        }, 1500);

                        function make_skeleton() {
                            var output = '';
                            for (var count = 0; count < 12; count++) {
                                output += '<div class="col-4">';
                                output += '<div class="ph-item">';
                                output += '<div class="ph-col-12">';
                                output += '<div class="ph-picture"></div>';
                                output += '<div class="ph-row">';
                                output += '<div class="ph-col-6 big"></div>';
                                output += '<div class="ph-col-4 empty big"></div>';
                                output += '<div class="ph-col-12"></div>'
                                output += '<div class="ph-col-12"></div>'
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                            }
                          return output;
                     }
                   function records(limits){
                        $.ajax({
                            type:'GET',
                            url:"{{ route('getPageavailableJobs') }}",
                            data:{'pages':pages, limits: limits},
                            success:function(datas){
                                $('.table-data_a').html(datas);

                            }
                        });
                    }

                });

                //end for per page available jobs

               // for searching data available jobs
                 var query = $('#search_inputs_').val();
                fetch_customer_data(query);

                $(document).on('keyup', '#search_inputs_', function(){
                    var query = $(this).val();
                    if(query == ''){
                        record();
                    }
                    fetch_customer_data(query);
                });
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                function fetch_customer_data(query = '') {
                    $.ajax({
                    url:"{{ route('getSearchdataAvailablejobs') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data) {

                        $('#dynamic_content_a').html(data.table_data);

                     }
                    })
                }

               //end for searching data available jobs

             ////////////////////////////search for job available jobseekers////////////////////

                //paginate a jobseekers
                $(document).on('click','.paginations__ a', function(e){
                    e.preventDefault();
                     let page4 = $(this).attr('href').split('page=')[1]
                       records(page4)

                    })

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    function records(page4){
                        $.ajax({
                            url:"/ajax-paginate-availablejobseekers?page="+page4,
                            success:function(res4){
                                $('.table-data_as').html(res4);
                            }
                        })
                    //}, 300);
                  }

                //end paginate a jobseekers

               //for per page available jobseekers

                 $(document).on('change', '#search_pages_as',function(){
                    var pages = $(this).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dynamic_contents_as').html(make_skeleton())

                        setTimeout(function() {
                                records()
                        }, 1500);

                        function make_skeleton() {
                            var output = '';
                            for (var count = 0; count < 12; count++) {
                                output += '<div class="col-4">';
                                output += '<div class="ph-item">';
                                output += '<div class="ph-col-12">';
                                output += '<div class="ph-picture"></div>';
                                output += '<div class="ph-row">';
                                output += '<div class="ph-col-6 big"></div>';
                                output += '<div class="ph-col-4 empty big"></div>';
                                output += '<div class="ph-col-12"></div>'
                                output += '<div class="ph-col-12"></div>'
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                                output += '</div>';
                            }
                          return output;
                     }
                   function records(limits){
                        $.ajax({
                            type:'GET',
                            url:"{{ route('getPageavailableJobs') }}",
                            data:{'pages':pages, limits: limits},
                            success:function(datas){
                                $('.table-data_as').html(datas);

                            }
                        });
                    }

                });

                //end for per page available jobseekers

               // for searching data available jobseekers
                 var query = $('#search_inputs__').val();
                fetch_customer_data(query);

                $(document).on('keyup', '#search_inputs__', function(){
                    var query = $(this).val();
                    if(query == ''){
                        record();
                    }
                    fetch_customer_data(query);
                });
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                function fetch_customer_data(query = '') {
                    $.ajax({
                    url:"{{ route('getSearchdataAvailablejobseekers') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data) {

                        $('#dynamic_content_as').html(data.table_data);

                     }
                    })
                }

               //end for searching data available jobseekers

             // show password
             document.getElementById("click-check").addEventListener("click", myFunction);
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            //end show password

            // hide alert

                $(window).bind("load", function() {
                    window.setTimeout(function() {
                        $(".alerts").fadeTo(1000, 0).slideUp(1000, function() {
                            $(this).remove();
                        });
                    }, 1000);
                });
              // hide alert
           });

        </script>
        <script>
             // count text limit 500 contact us
               let limitChar = (element) => {
                const maxChar = 500;

                let ele = document.getElementById(element.id);
                let charLen = ele.value.length;

                let p = document.getElementById('charCounter');
               var output = p.innerHTML = maxChar - charLen;

                if (charLen > maxChar)
                {
                    ele.value = ele.value.substring(0, maxChar);
                    $('#charCounter').output = 0;
                }
             }
               //end count text limit 500 contact us
        </script>
        <script>
            // mobile navigation
              function clickFunction() {
                      var para = document.getElementById("toggle-icon");
                          para.classList.toggle("rotate-icon");
                      }
                      function darken_screen(yesno){
                          if( yesno == true ){
                              document.querySelector('.screen-darken').classList.add('active');
                          }
                          else if(yesno == false){
                              document.querySelector('.screen-darken').classList.remove('active');
                          }
                      }

                      function close_offcanvas(){
                          darken_screen(false);
                          document.querySelector('.mobile-offcanvas.show').classList.remove('show');
                          document.body.classList.remove('offcanvas-active');
                      }

                      function show_offcanvas(offcanvas_id){
                          darken_screen(true);
                          document.getElementById(offcanvas_id).classList.add('show');
                          document.body.classList.add('offcanvas-active');
                      }

                      document.addEventListener("DOMContentLoaded", function(){
                          document.querySelectorAll('[data-trigger]').forEach(function(everyelement){

                              let offcanvas_id = everyelement.getAttribute('data-trigger');

                              everyelement.addEventListener('click', function (e) {
                                  e.preventDefault();
                                  show_offcanvas(offcanvas_id);

                              });
                          });

                          document.querySelectorAll('.btn-close').forEach(function(everybutton){

                              everybutton.addEventListener('click', function (e) {
                                  e.preventDefault();
                                  close_offcanvas();
                              });
                          });

                          document.querySelector('.screen-darken').addEventListener('click', function(event){
                              close_offcanvas();
                          });
                          //end canva


                      });
               //end mobile navigation
             </script>

            <script>
            // faq accordion
            var acc = document.getElementsByClassName("_accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                this.parentElement.classList.toggle("active");

                var pannel = this.nextElementSibling;

                if (pannel.style.display === "block") {
                  pannel.style.display = "none";
                } else {
                  pannel.style.display = "block";
                }
              });
            }
              // faq accordion
          </script>

        </body>

        </html>

