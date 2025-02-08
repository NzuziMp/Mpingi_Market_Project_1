@extends('layouts.main2')
@section('contents')
    <!-- Header-->
    <header class="py-5 bg-dark main">
        <div class="container ">
            <div class="row justify-content-start">
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

                                            <button type="button" class="btn btnColorfind" id="">FIND&nbsp;PRODUCTS</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <p class="text-white"><i class="fa fa-phone-square"></i> +256 (0) 782796710 &nbsp; <i
                                class="fa fa-paper-plane"></i> contact@mpingimarket.com </p> --}}
                        <h1 class="text-white display-5 fw-bolder">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item active typed-out">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont"> DISCOVER THE PRODUCTS</h1>
                                        </a>
                                    </div>

                                    {{-- <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">T-SHIRTS</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">USED CARS ...</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">CHILDREN&amp;RSQUO;S...</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">WOMEN&amp;ACUTE;S SHOES</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">OTHER WOMENS CLOTHING &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">MEN&amp;ACUTE;S T-SHIRTS &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">DRESSES &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">KEYBOARDS &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">LIVING ROOM FURNITURE &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">KITCHEN ACCESSORIES &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">INTERIOR ACCESSORIES &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">BOOTS &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">UNIFORMS &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">WOMEN&amp;RSQUO;S... &nbsp;</h1>
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">TABLET PC &nbsp;</h1>
                                        </a>
                                    </div> --}}

                                </div>
                            </div>
                        </h1>
                        <div class="justify-content-sm-center">
                            <p class="intro" data-scroll-reveal="wait 0.45s, then enter left and move 80px over 1s" data-aos="fade-right" data-aos-duration="1000" style="-webkit-transform: translatex(0);transform: translatex(0);opacity: 1;-webkit-transition: -webkit-transform 1s ease-in-out 0.45s,  opacity 1s ease-in-out 0.45s;transition: transform 1s ease-in-out 0.45s, opacity 1s ease-in-out 0.45s;-webkit-perspective: 1000;-webkit-backface-visibility: hidden;text-capitalize bigFont;color:#FF7519;font-weight:bold" >
                                <i class="fa fa-map-marker-alt"></i>
                           GET THE GREAT PRODUCTS AT UNBEATABLE PRICES IN
                             @foreach ($getflag as $r)
                               &nbsp;<img src="{{ url('assets/flags/'.$r->flag) }}" alt="" width="30" height="20" class="img_icons_2">&nbsp;{{ Str::ucfirst($r->name) }}
                             @endforeach
                            </p>
                            {{-- <p class="px-4 me-sm-3" style="color:#FF7519" data-aos="fade-right" data-aos-duration="1000">FREE ONLINE MARKETPLACE PLATFORM</p> --}}
                            <p class="px-4 me-sm-3" style="color:#dfdada">San Mateo, Calabarzon</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @endsection

