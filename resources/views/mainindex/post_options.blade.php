{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="col-lg-12">

    {{-- <header class="py-5 _main ">
        <div class="container ">
            <div class="row justify-content-start">
                <div class="loader"></div>
                <div class="col-lg-12">
                    <div class="text-center _cardCss">

                        <div class="card " style="margin-top:-20px;background-color: rgba(202, 136, 90, 0.25); margin-bottom:10px;-webkit-border-radius: 5px;
                             -moz-border-radius: 5px;">
                            <div class="card-body">

                                <div class="container">
                                    <div class="row align-items-start g-2 menuAlign" data-aos="fade-down"
                                        data-aos-duration="1000">
                                        <div class="col-md-3">
                                            <select name="country" class="form-select example country-dropdown"
                                                aria-label="Default select" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; Select
                                                    Country &rarr;</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ (collect(old('country_id'))->
                                                    contains($country->id)) ? 'selected':'' }}>{{ $country->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="country" class="form-select state-dropdown"
                                                aria-label="Default select example" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; Select State
                                                    &rarr;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="country" class="form-select city-dropdown"
                                                aria-label="Default select example" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; Select City
                                                    &rarr;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="48 Products near you"
                                                id="borderinput">
                                        </div>
                                        <div class="col-md-1">

                                            <button type="button" class="btn btnColorfind"
                                                id="">FIND&nbsp;PRODUCTS</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header> --}}
    <header class="py-5 bg-dark main">
        <div class="container ">
            <div class="row justify-content-start">
                <div class="loader"></div>
                <div class="col-lg-12">
                    <div class="my-5 text-center">

                        <div class="card" style="margin-top:-30px;background-color: rgba(202, 136, 90, 0.25); margin-bottom:10px;-webkit-border-radius: 5px;
                             -moz-border-radius: 5px;">
                            <div class="card-body">

                       <div class="container">
                                    <div class="row align-items-start g-2 menuAlign" data-aos="fade-down" data-aos-duration="1000" >
                                        <div class="col-md-3">
                                            <select name="country" class="form-select example country-dropdown"
                                                aria-label="Default select" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; Select Country &rarr;</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id }}" {{ (collect(old('country_id'))->contains($country->id)) ? 'selected':'' }}>{{ $country->name }}</option>
                                                @endforeach
                                             </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="country" class="form-select state-dropdown"
                                                aria-label="Default select example" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; @if(session()->get('locale') === 'fr') Sélectionner état @else Select State @endif
                                                    &rarr;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="country" class="form-select city-dropdown"
                                                aria-label="Default select example" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr;@if(session()->get('locale') === 'fr') Sélectionner ville @else Select City  @endif
                                                    &rarr;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="48 @if(session()->get('locale') === 'fr') Produits près de chez vous @else Products near you @endif"
                                                id="borderinput">
                                        </div>
                                        <div class="col-md-1">

                                            <button type="button" class="btn btnColorfind" id="">@if(session()->get('locale') === 'fr') RECHERCHER @else FIND&nbsp;PRODUCTS @endif</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="wrappers" style="z-index: 5">
        <ul class="socialUl">
            <li class="facebook">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                <div class="slider">
                    <p>Facebook</p>
                </div>
            </li>

            <li class="twitter">
                <i class="fab fa-twitter" aria-hidden="true"></i>
                <div class="slider">
                    <p>Twitter</p>
                </div>
            </li>
            <li class="youtube">
                <i class="fab fa-youtube" aria-hidden="true"></i>
                <div class="slider">
                    <p>Youtube</p>
                </div>
            </li>

            <li class="instagram">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                <div class="slider">
                    <p>Instagram</p>
                </div>
            </li>

            <li class="map">
                <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                <div class="slider">
                    <p>Google Map</p>
                </div>
            </li>


            <li class="comments">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <div class="slider">
                    <p>Email Address</p>
                </div>
            </li>

        </ul>
    </div>
    <section class="py-2 border-bottom " id="features">
        <div class="container">

            <div class="row g-1">

                {{--all middle content --}}
                <div class="mb-4 col-md-4 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#ff7519;border-bottom:5px solid #f66b0e;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11">POST PRODUCTS
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-tags fa-2x"></i>  POST PRODUCTS </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                  Post for free products, services and jobs in over 239 countries, 4,120 regions and 47,576 cities</p>

                                <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Products is seen by millions of users, visible everywhere across the site on all pages</p>

                                <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Sell or promote fast and fast Get noticed by more people up to millions of people. Advertising your product is HIGHLY recommended if you really want RESULTS.</p>

                               <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Products is displayed on every page across the site & gives extremely high exposure compared to regular ad
                                   </p>

                                <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Seen by millions, upto 10 million ad impressions</p>

                                    <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Seen by millions, upto 10 million ad impressions
                                </p>

                                <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Upload up to 10 images of your products to enhance your free ad</p>
                                <p class="mt-4"
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Once products duration has expired, it is still part of regular products</p>


                                </div>

                                {{-- --}}

                            </div>
                            <div class="mt-3 form-group">
                                <form action="{{ route('user.postoptionfunction') }}" method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="free_post_duration" value="{{ encrypt(31) }}"> --}}
                                    <input type="hidden" name="id" value="{{ encrypt(1) }}">

                                            <div class="mt-3 form-group">
                                                <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                                    GET STARTED </button>

                                            </div>

                                   {{-- <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                     GET STARTED FOR FREE
                                   </button> --}}
                                </form>
                            </div>
                            {{-- --}}
                            {{-- --}}

                            {{-- --}}
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-md-4 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#5a88ca;border-bottom:5px solid #1266de;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11">POST SERVICES
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">

                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-cogs fa-2x"></i>  POST SERVICES</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="">Detailed Company Profile</b><br>
                                            Promote the info buyers look for on MPINGIMARKET.com</p>

                                  <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="">Services Categorization</b><br>
                                        Get your services listed where they belong</p>

                                  <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="">National Reach</b><br>
                                        Be accessible to our entire audience of buyers</p>

                                   <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="">Lead Generation</b><br>
                                        Receive and manage leads from verified prospects, and get detailed contact information delivered to your email inbox</p>

                                  <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b style="">Amplified Promotion To Our Audience</b><br>
                                    Appear above ALL Basic Listings in your service categories</p>

                                 <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b style="">Company Profile Ad</b><br>
                                    Drive buyers to your website with a prominent display ad on your profile</p>

                                  <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b style="">Increased Brand Exposure</b><br>
                                    Promote brand awareness by featuring your logo on your company profile</p>

                                 <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b style="">Premium Positioning</b><br>
                                    Receive preferred placement in your key product/service categories</p>

                                 <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b style="">Audience Retargeting</b><br>
                                    Reach MPINGIMARKET.com buyers interested in your offerings, elsewhere on the internet</p>

                                <p class=""
                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b style="">Services Showcase</b><br>
                                    Boost your activity with highly visibile links to your detailed product/capabilities info</p>

                                </div>

                                {{-- --}}

                            </div>
                            <div class="mt-3 form-group">
                                <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED </button>

                            </div>
                            {{-- --}}



                        </div>

                    </div>
                </div>


                <div class="mb-4 col-md-4 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#00a61c;border-bottom:5px solid #05891c;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11"> POST JOBS
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-briefcase fa-2x"></i> Free
                                                    Jobs</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                         online recruitment and employment solutions for Employers, Post a job Now !</p>
                                    {{-- <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <strong style="font-size:1rem">QUOTED</strong><br>as per your goals
                                        Stand out from your competitors with a high-profile, targeted presence
                                        throughout MPINGIMARKET.com</p> --}}
                                </div>

                                {{-- --}}
                            </div>
                            <div class="mt-3 form-group">
                                <form action="{{ route('user.basiclistingbusinesses') }}" method="POST">
                                    @csrf
                                  <input type="hidden" name="id" value="{{ encrypt(1) }}">
                                <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED FOR FREE</button>
                                </form>
                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mt-3 mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <b style="font-size: 1.0rem"><i class="fa fa-send fa-2x"></i> Never miss a job. Get new jobs emailed to you daily.</b>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}

                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Be the first to see new Categories List jobs<Br>
                                            <div class="mb-3 input-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="password" name="password" id="myInput" class="form-control pass @error('password') is-invalid @enderror" placeholder="E-Mail"
                                                        aria-label="Password" aria-describedby="basic-addon1" autocomplete="off">

                                                </div>

                                            </div>

                                            <center><a href="#" id="globalheadernavhref"><button type="button" class="btn btnColor"><i class="far fa-paper-plane"></i>  Activate </button></a></center>
                                        </p>

                                </div>



                                {{-- --}}

                            </div>



                        </div>

                    </div>

                    {{-- --}}

                    {{-- --}}
                    <div class="mt-3 mb-3 card">
                        <div class="card-header"
                            style="background-color:#3b3b3b;border-bottom:5px solid #282828 ;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-12">
                                    <center>
                                        <h6 class="mt-1" style="font-weight:bold">PAYMENTS</h6>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="far fa-money-bill-alt fa-2x"></i>
                                                    Payment method </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Our financial team is available via phone or e-mail to help you make your
                                        payment successfully. Once contact or email us your payment post field will be
                                        activated and you will be able to post the number of products paid.</p>
                                </div>

                                {{-- --}}

                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-tags fa-2x"></i> Duration
                                                    price per package choose plan </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        1. Bronze (100 products, services or jobs per year)</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        2. Sliver (250 products, services or jobs per year)</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        3. Gold (500 products, services or jobs per year)</p>
                                </div>

                                {{-- --}}

                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-phone-square fa-2x"></i>
                                                    Contact us </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class="py-2 my-2 mt-2 text-center"
                                        style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <i class="fa fa-phone-square"></i> +1 (418) 732 1925</p>
                                    <p class="py-2 my-2 mt-3 text-center"
                                        style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <i class="fa fa-envelope"></i> contact@mpingimarket.com</p>

                                </div>

                                {{-- --}}

                            </div>
                            {{-- --}}



                        </div>

                        {{-- --}}

                    </div>

                    {{-- --}}

                    <div class="mt-3 mb-3 card">
                        <div class="card-header"
                            style="background-color:#3b3b3b;border-bottom:5px solid #282828 ;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-12">
                                    <center>
                                        <h6 class="mt-1" style="font-weight:bold">ADVERTISE WITH US</h6>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"
                            style="background-color:#fcf8e3;color:#8a6d3b;font-weight:bold;border:none">

                            {{-- --}}
                            <p class="py-2 my-2 mt-2 text-center"
                                style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                <i class="fa fa-tags"></i> Banner advertisement</p>
                            <p class="py-2 my-2 mt-3 text-center"
                                style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                <i class="fa fa-tags"></i> Contextual Advertising</p>
                            {{-- --}}

                            {{-- --}}
                        </div>

                        {{-- --}}

                    </div>

                    {{-- --}}

                </div>

            </div>

            {{--end all middle content --}}


            {{--all right content --}}

            {{--end all right content --}}
        </div>
    </section>

@endsection
