{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="col-lg-12">

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
    </header>

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


    {{-- <div class="wrappers" style="z-index: 5">
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
    </div> --}}

    <section class="py-2 border-bottom" id="features">
        <div class="container">
            <div class="row">
                {{--all middle content --}}
                <div class="mb-4 col-lg-8 mb-lg-0">
                    {{-- --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="py-4 mb-3 text-center card-header notfoundCss_" style="border: none">
                                <i class="fa fa-paper-plane fa-3x"></i><Br>
                                We appreciate your initiative to contact us; you can make use of this instant mail form
                                to contact Mpingi Online Shopping Mall. Please note that all fields marked with an * are
                                required to enable us to effectively communicate with you.
                            </div>
                            <form data-role="form">
                                <div class="input-group">
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-user"></i>&nbsp;<font color='red'>*</font> </span>
                                        <input type="text" class="form-control" placeholder="Full Name"
                                            aria-label="Name" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-envelope"></i>&nbsp;<font color='red'>*</font> </span>
                                        <input type="text" class="form-control" placeholder="Email" aria-label="Email"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-headphones-alt"></i>&nbsp;<font color='red'>*</font>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Mobile/Telephone"
                                            aria-label="Mobile/Telephone" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-file"></i>&nbsp;<font color='red'>*</font> </span>
                                        <input type="text" class="form-control" placeholder="Subject"
                                            aria-label="Subject" aria-describedby="basic-addon1">
                                    </div>
                                    <label class="mgsCss__">
                                        <font color='red'>*</font> Message <span class="checkpass">(Maximum 500
                                            characters)</span>
                                    </label>
                                    <div class="mb input-group">

                                        <textarea type="text" rows="5" class="form-control" placeholder="Message..."
                                            aria-label="Message" oninput="limitChar(this)" id="tArea" name="message"
                                            maxlength="500" autofocus></textarea>

                                    </div>

                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-0">
                                            </div>
                                            <div class="col-md-12">
                                                <p id="charCounter_"> Characters remaining: <span
                                                        id="charCounter">500</span> / 500</p>
                                            </div>
                                        </div>


                                    </div>
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline btn-lg w-100 DetailsBtns2_"> Send
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                {{-- --}}

                <div class="mb-4 col-lg-4 mb-lg-0">
                    <div class="card">
                        <div class="card-header text-titleCss">
                            <i class="mt-1 fa fa-map-marker-alt"></i> Physical Location
                        </div>
                        <div class="card-body">
                            <p>
                            <h5 style="font-weight: bold">MPINGI CONTACTS</h5>
                            <p>
                                <strong>Mpingi Market</strong><span class="text-titleCss2_"> has it headquarter Office
                                    in Canada, USA, D.R Congo and Uganda.</span>
                            <p class="text-titleCss2_">
                                <i class="fa fa-map-marker-alt"></i> Canada, Quebec +1(418)732-1925 <Br>
                                <i class="fa fa-map-marker-alt"></i> Usa, Baltimore MD<br>
                                <i class="fa fa-map-marker-alt"></i> D.R Congo, Kinshasa +243(0)897 701 661
                                <br>
                                <i class="fa fa-map-marker-alt"></i> Uganda, Kampala-city +256(0)782 796 710
                                <br>
                                <i class="fa fa-envelope"></i> contact@mpingimarket.com
                                <br>
                                <i class="fa fa-globe"></i><a href="http://mpingimarket.com:2096/" target="_blank"
                                    class="hrefCss_"> Webmail</a>
                                <br>
                            </p>
                            </p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--all middle content --}}


        <br>

        {{-- <section>
            <div class="container mt-2">
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
                                            UNBEATABLE&nbsp;PRICES</a></p>
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
        </section> --}}

        @endsection
