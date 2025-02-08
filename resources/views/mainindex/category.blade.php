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
{{-- <header class="py-5 main">
    <div class="container ">
    <div class="loader"></div>
        <div class="row justify-content-start">

                <div class="text-center ">
                    <div class="">

                        <div class="container">
                            <div class="row align-items-start g-2 menuAlign" data-aos="fade-down"
                                data-aos-duration="1000">
                                <div class="col-md-3">
                                    <select name="country" class="form-select example country-dropdown"
                                        aria-label="Default select" id="borderinput">
                                        <option value="" selected="true" disabled="disable">&larr; Select Country &rarr;
                                        </option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ (collect(old('country_id'))->
                                            contains($country->id)) ? 'selected':'' }}>{{ $country->name }}</option>
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

            </div>
        </div>
    </div>
    </div>
</header> --}}


<section class="py-2 border-bottom" id="features">
    <div class="container-fluid">

        <div class="row g-2 justify-content-center">
            {{-- all left side bar menu --}}
            <div class="mb-5 col-lg-2 mb-lg-0">


                {{--  --}}
                <div class="mb-3 card card1">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">

                            <div class="col-10"><i class="fas fa-list"></i> <span class="counter" data-target="3140">0</span> CATEGORIES</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon"></i></div>
                        </div>

                    </div>

                    <div class="row align-items-center justify-content-center">

                        <div class="accordion" id="accordionPlusMinus">
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="headingOne" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Apparel, Textiles, Accessories">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne" id="button_to_trigger_collapse">
                                        <img src="{{ asset('/assets/images/icon1.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Apparel</span>&nbsp;
                                            <span class="badge bg-light">
                                            <span  class="badge_3">24</span></span>
                                    </button>
                                </h6>
                                <div id="collapseOne" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/1_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Apparel
                                                <span class="badge rounded-pill bg-light text-dark"><span class="badge_3">24</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Textile & Leather Products">
                                                <img src="{{ asset('assets/icons_2/1_2.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Textile & Leather...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Fashion Accessories">
                                                <img src="{{ asset('assets/icons_2/1_3.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Fashion...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                            </a><br>
                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Timepieces, Jewellery, Eyewear">
                                                <img src="{{ asset('assets/icons_2/1_4.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Timepieces,...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                            </a><br>
                                        </p>


                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="headingTwo" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Auto & Transfortation">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon2.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Auto</span>&nbsp;<span
                                            class="badge bg-light text-dark"><span class="badge_3">7</span></span>
                                    </button>
                                </h6>
                                <div id="collapseTwo" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/2_1.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Automobiles &...
                                                <span class="badge rounded-pill bg-light text-dark"><span class="badge_3">7</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Transportation">
                                                <img src="{{ asset('assets/icons_2/2_2.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Transportation
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>


                                        </p>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading3" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Electronics">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                                        aria-controls="collapse3" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon3.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Electronics</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span class="badge_3">3</span></span>
                                    </button>
                                </h6>
                                <div id="collapse3" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading3" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/3_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Computer Hardware...
                                                <span class="badge rounded-pill bg-light text-dark"><span class="badge_3">3</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Home Appliances">
                                                <img src="{{ asset('assets/icons_2/3_3.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Home Appliances
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Consumer Electronics">
                                                <img src="{{ asset('assets/icons_2/3_2.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Consumer...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>
                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Security & Protection">
                                                <img src="{{ asset('assets/icons_2/3_4.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Security &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>
                                        </p>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading4" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Machinery,Hardware & Tools">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                        aria-controls="collapse4" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon4.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Machinery (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse4" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading4" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/4_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Hardware & Tools
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Machinery">
                                                <img src="{{ asset('assets/icons_2/4_2.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Machinery
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Measurement & Analysis Instruments">
                                                <img src="{{ asset('assets/icons_2/4_3.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Measurement &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>
                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Mechanical Parts & Fabrication Services">
                                                <img src="{{ asset('assets/icons_2/4_4.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                SMechanical Parts &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading5" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Gifts, Sports & Toys">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false"
                                        aria-controls="collapse5" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon5.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Gifts (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse5" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading5" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/5_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Gifts & Crafts
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Sports & Entertainment">
                                                <img src="{{ asset('assets/icons_2/5_2.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Sports &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Toys & Hobbies">
                                                <img src="{{ asset('assets/icons_2/5_3.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Toys & Hobbies
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                        </p>

                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading6" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Home, Lights & Construction">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false"
                                        aria-controls="collapse6" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon6.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Home</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span class="badge_3">2</span></span>
                                    </button>
                                </h6>
                                <div id="collapse6" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading6" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/6_1.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Construction &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Home & Garden">
                                                <img src="{{ asset('assets/icons_2/6_2.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Home & Garden
                                                <span class="badge rounded-pill bg-light text-dark"><span class="badge_3">1</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Lights & Lighting">
                                                <img src="{{ asset('assets/icons_2/6_3.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Lights & Lighting
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Furniture">
                                                <img src="{{ asset('assets/icons_2/6_4.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Furniture
                                                <span class="badge rounded-pill bg-light text-dark"><span class="badge_3">1</span></span>

                                            </a><br>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading7" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Health & Beauty">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false"
                                        aria-controls="collapse7" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon7.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Health (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse7" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading7" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/7_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Health & Medical
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Beauty & Personal Care">
                                                <img src="{{ asset('assets/icons_2/7_2.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Beauty & Personal...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading8" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Jewelry, Bags & Shoes">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false"
                                        aria-controls="collapse8" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon8.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Bags</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span class="badge_3">12</span></span>
                                    </button>
                                </h6>
                                <div id="collapse8" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading8" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/8_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Luggage, Bags &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Timepieces, Jewelry, Eyewear">
                                                <img src="{{ asset('assets/icons_2/1_44.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Timepieces,...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Shoes & Accessories">
                                                <img src="{{ asset('assets/icons_2/8_3.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Shoes &...


                                                <span class="badge rounded-pill bg-light text-dark"><span class="badge_3">12</span></span>

                                            </a><br>
                                            </a><br>

                                        </p>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading9" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Electrical Equipment, Components & Telecom">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false"
                                        aria-controls="collapse9" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon9.png') }}" height="20px" width="25px"
                                            class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Electrical (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse9" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading9" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/9_1.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Electrical...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Electronic Components & Supplies">
                                                <img src="{{ asset('assets/icons_2/9_2.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Electronic...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Telecommunications">
                                                <img src="{{ asset('assets/icons_2/9_3.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                ...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading10" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Agriculture & Food">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false"
                                        aria-controls="collapse10" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon10.png') }}" height="20px"
                                            width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Agriculture (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse10" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading10" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/10_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Agriculture
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Food & Beverage">
                                                <img src="{{ asset('assets/icons_2/10_2.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Food & Beverage
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading11" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Packaging, Advertising & Office">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false"
                                        aria-controls="collapse11" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon11.png') }}" height="20px"
                                            width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Packaging (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse11" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading11" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/11_1.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Packaging &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Office & School Supplies">
                                                <img src="{{ asset('assets/icons_2/11_2.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Office & School...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Service Equipment">
                                                <img src="{{ asset('assets/icons_2/11_3.png') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Service Equipment
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading12" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="More Metallurgy, Chemicals, Rubber & Plastics">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false"
                                        aria-controls="collapse12" id="button_to_trigger_collapse">
                                        <img src="{{ asset('assets/images/icon12.png') }}" height="20px"
                                            width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Metallurgy (0)</span>
                                    </button>
                                </h6>
                                <div id="collapse12" class="accordion-collapse collapse animate slideIn"
                                    aria-labelledby="heading12" data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        <p class="py-2">

                                            <a href="#" class="link-secondary sidemenu_a">
                                                <img src="{{ asset('assets/icons_2/12_1.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Minerals &...
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Rubber & Plastics">
                                                <img src="{{ asset('assets/icons_2/12_2.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Rubber & Plastics
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Chemicals">
                                                <img src="{{ asset('assets/icons_2/12_3.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Chemicals
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Energy">
                                                <img src="{{ asset('assets/icons_2/12_4.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Energy
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                            <a href="#" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                data-aos-duration="1000" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Environment">
                                                <img src="{{ asset('assets/icons_2/12_5.jpg') }}" alt="" width="30"
                                                    height="30" class="img_icons_4">
                                                Environment
                                                <span class="badge rounded-pill bg-light text-dark"><span
                                                        style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                            </a><br>

                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h6 class="accordion-header" id="heading13" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Stores Nearby">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false"
                                        aria-controls="collapse13" id="button_to_trigger_collapse">
                                        <i class="fa fa-shopping-basket"
                                            style="margin-left:10px; font-size:18px; color:#ababab"></i>&nbsp;<span class="hoversidemenu">Stores</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span class="badge_3">45</span></span>
                                    </button>
                                </h6>
                                <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13"
                                    data-bs-parent="#accordionPlusMinus">
                                    <div class="accordion-body text-bidgray panelx2">
                                        {{-- <ul class="list-group list-group-flush" style="font-size:12px">
                                            <li class="list-group-item">Apparel (24)</li>
                                            <li class="list-group-item">Textile & Leather Prducts (0)</li>
                                            <li class="list-group-item">Fashion Accessories (0)</li>
                                            <li class="list-group-item">Timepieces, Jewellery, Eyewear (0)</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            {{-- next panel --}}

                            <div class="card card2">
                                <div class="card-header"
                                    style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <a href="#" style="color:#FF7519; font-weight:bold;" id="global-href">
                                                Countries
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa-solid fa-earth-africa"></i>
                                            <a href="#" style="color:#FF7519; font-weight:bold;" id="global-href">
                                                Map
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <i class="fa fa-times text-dark close-icon2"></i>
                                        </div>
                                    </div>



                                </div>

                                <div class="card-body" style="-7px">
                                    <div class="row">

                                        <div class="mb-3 col-4">
                                            <a href="#">
                                                <img src="{{ asset('assets/icons/CA.png') }}" alt="" width="30"
                                                    height="20" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Canada&nbsp;20" id="imgBorder">

                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#">
                                                <img src="{{ asset('assets/icons/CD.png') }}" alt="" width="30"
                                                    height="20" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Democratic Republic of the Congo&nbsp;15" id="imgBorder">

                                            </a>
                                        </div>

                                        <div class="col-4">
                                            <a href="#">
                                                <img src="{{ asset('assets/icons/RW.png') }}" alt="" width="30"
                                                    height="20" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Rwanda&nbsp;2" id="imgBorder">

                                            </a>
                                        </div>

                                        <div class="mb-3 col-4">
                                            <a href="#">
                                                <img src="{{ asset('assets/icons/UG.png') }}" alt="" width="30"
                                                    height="20" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Uganda&nbsp;12" id="imgBorder">

                                            </a>
                                        </div>

                                        <div class="mb-3 col-4">
                                            <a href="#">
                                                <img src="{{ asset('assets/icons/US.png') }}" alt="" width="30"
                                                    height="20" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="United State&nbsp;1" id="imgBorder">

                                            </a>
                                        </div>

                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id="cardsearch" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Click here to view&nbsp;246&nbsp;Countries"
                                                    id="imgBorder"><i class="fa fa-search-plus"></i> <span class="counter" data-target="239">0</span> View Counties
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{--  --}}
                {{--  --}}
                <div class="mb-3 card ">
                    <div class="card-body">
                        <img class="mySlides w3-animate-fading" src="{{ asset('assets/images/jumbo.gif') }}"
                            style="width:100%;height:100%">

                        </pre>
                    </div>
                </div>
                {{--  --}}
                <div class="mb-3 card card3">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-wrench"></i> <span class="counter" data-target="653">0</span> SERVICES</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon3"></i></div>
                        </div>

                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="" id="" style="">

                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                <a href="#" class="">
                                    <i class="fa fa-bicycle"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Active Life
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-paint-brush"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Arts & Entertainment
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                <a href="#" class="">
                                    <i class="fa fa-car" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Automotive
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                <a href="#" class="">
                                    <i class="fa fa-gift" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Beauty & Spas
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-graduation-cap"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Education
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">2</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                <a href="#" class="">

                                    <i class="fa fa-calendar"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Event Planning
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                </a>
                            </p>

                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-money-bill"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Financial Services
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                <a href="#" class="">
                                    <i class="fa fa-utensils"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Food
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                <a href="#" class="">
                                    <i class="fa fa-medkit"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Health & Medical
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>

                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-home" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Home Services
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-bed" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Hotels & Travel
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-info-circle"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Local Services
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-tv" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Mass Media
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-glass-martini"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Nightlife
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-paw" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Pets
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-cogs" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Professional
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">4</span></span></span>
                                </a>
                            </p>

                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-building"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Public & Government
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">5</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-home" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Real Estate
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-moon" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Religious
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-coffee"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Restaurants
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-shopping-bag"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Shopping
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                </a>
                            </p>
                            <p id="servicesSection" class="mt-3"
                                style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">

                                    <i class="fa fa-industry"
                                        style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Industries
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                            class="badge bg-light text-dark"><span
                                                style="color:#FF7519;font-weight:bolder;font-size:13px">3</span></span></span>
                                </a>
                            </p>



                            {{-- next panel --}}

                            <div class="card-body">


                                <div class="row">

                                    <div class="card">
                                        <div class="mt-2 card-body">
                                            <p id="cardsearch" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Click here to view&nbsp;246&nbsp;Countries" id="imgBorder">
                                                <i class="fa fa-search-plus"></i> <span class="counter" data-target="653">0</span> View Categories
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{--  --}}
                <div class="mb-3 card card4">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-cogs"></i> JOBS</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon4"></i></div>
                        </div>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="accordion" id="accordionPlusMinus">

                            <p id="servicesSection" class="mt-3" style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-cogs" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Available Jobs
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>

                            </p>
                            <p id="servicesSection" class="mt-3" style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                <a href="#" class="">
                                    <i class="fa fa-file" style="margin-left:20px; font-size:13px; color:#666"></i>
                                    Job Seekers
                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                </a>
                            </p>

                            {{-- next panel --}}

                            <div class="card-body">
                                <div class="row">

                                    <div class="card">
                                        <div class="mt-2 card-body">
                                            <p id="cardsearch" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Click here to view&nbsp;246&nbsp;Countries" id="imgBorder">
                                                <i class="fa fa-search-plus"></i> View <span class="counter" data-target="444">0</span> Categories
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{--  --}}
            </div>
           {{--end all left side bar menu --}}

       {{--  --}}

           {{--all middle content  --}}
            <div class="mb-4 col-lg-8 mb-lg-0">
                <div class="mb-3 card card6">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-11"><img src="{{ asset('assets//images/icon1.png') }}" height="20"
                                    width="25" class="img_icons">
                                <span style=""></span> Apparel, Textiles & Accessories
                            </div>
                            {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-md-6">

                                {{-- Apparel --}}

                                <div class="card card8">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-11">
                                                <a name="RlhKTUlzemdRTjFyWkxMMTgzMjFtdz09">
                                                    <h1 class="h1Css">
                                                        <img class="imgCss" src="{{ asset('assets/icons_2/1_1.png') }}"
                                                            alt="" width="80" height="80"
                                                            class="img_icons_3 zoomIn animated">
                                                        Apparel [24]
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="col-1">
                                                <div class="col-1"><i class="fa fa-times close-icon8"></i></div>
                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Men’s Clothing">
                                            <span><span class="TextCss accordion"> Men’s Clothing </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_3">2</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Swimwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Briefs & Boxers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jackets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jeans
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shorts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/2052785933.jpg') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shorts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">2</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Suits & Tuxedo
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Trousers & Pants
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Vests & Waistcoats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sweaters
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hoodies & Sweatshirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>
                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men’s Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Women’s Clothing">
                                            <span><span class="TextCss accordion"> Women’s Clothing </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_3">15</span></span><b
                                                    class="hoverClass accordion">+</b></span>


                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jackets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jeans
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Skirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Costumes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            India & Pakistan Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ladies? Blouses & Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Trousers & Pants
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Ladies Bikini
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sweaters
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tank Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Suits
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>
                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Used Clothes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">2</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hoodies & Sweatshirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shorts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Vests & Waistcoats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Womens Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">6</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/320575944.jpg') }}" alt=""
                                                                width="30" height="30" class="text_x">
                                                            Women’s Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">7</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Children’s Clothing">
                                            <span><span class="TextCss accordion"> Children’s Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jackets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jeans
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Skirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Costumes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            India & Pakistan Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ladies? Blouses & Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Trousers & Pants
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Ladies Bikini
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sweaters
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tank Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Suits
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>
                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Used Clothes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">2</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hoodies & Sweatshirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shorts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Vests & Waistcoats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Womens Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">6</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/320575944.jpg') }}" alt=""
                                                                width="30" height="30" class="text_x">
                                                            Women’s Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">7</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Baby’s Clothing">
                                            <span><span class="TextCss accordion"> Baby’s Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Rompers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Clothing Sets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Bibs
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Pants & Shorts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Sleeping Bags
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Sleepwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Sportswear">
                                            <span><span class="TextCss accordion"> Sportswear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women´s Bikini
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Girls´ Bikini
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men´s Swimwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sport Bra
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women´s Sportswear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Swimwear & Beachwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cycling Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Motorcycle & Auto Racing Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Soccer Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Martial Arts Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Basketball Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sportswear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Underwear">
                                            <span><span class="TextCss accordion"> Underwear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women´s Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Bras
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shapers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women´s Panties
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bra & Brief Sets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men´s Briefs & Boxers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Plus Size Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Underwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Wedding Apparel & Accessories">
                                            <span><span class="TextCss accordion"> Wedding Apparel & Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wedding Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bridesmaid Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Mother of the Bride Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men´s Attire
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Flower Girls´ Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wedding Jackets / Wrap
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Wedding Apparel
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wedding Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Hosiery">
                                            <span><span class="TextCss accordion"> Hosiery</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Socks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Leggings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pantyhose / Tights
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Stockings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Leg Warmers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Body Stocking
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Toe Socks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sexy Hosiery
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hosiery
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Costumes">
                                            <span><span class="TextCss accordion"> Costumes</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Costumes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Workwear">
                                            <span><span class="TextCss accordion"> Workwear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Workwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Uniforms">
                                            <span><span class="TextCss accordion"> Uniforms</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_3">6</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/1661087754.jpg') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Uniforms
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">6</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Stage & Dance Wear">
                                            <span><span class="TextCss accordion"> Stage & Dance Wear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Stage Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Dance Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Garment Accessories">
                                            <span><span class="TextCss accordion"> Garment Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Zippers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Webbing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Lace
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Rhinestones
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cords
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Buttons
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sequins
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Garment Labels
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ribbons
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Badges
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Garment Tags
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Buckles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Underwear Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Patches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Garment Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Garment Dresses">
                                            <span><span class="TextCss accordion"> Dresses</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Evening Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Casual Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Prom Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Club Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cocktail Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Career Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Homecoming Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sleeveless Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Long Sleeve Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Short Sleeve Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            2 - 6 Years
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            7 - 10 Years
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            11 - 14 Years
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            0 - 3 Months
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            4 - 6 Months
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            7 - 12 Months
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            12 - 18 Months
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            19 - 24 Months
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Woman’s Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Girls’ Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby Dresses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jackets">
                                            <span><span class="TextCss accordion"> Jackets</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Winter
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Autumn
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Spring
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Summer
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Woolen
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Corduroy
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Denim
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Satin
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Worsted
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Canvas
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Genuine Leather
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Cotton
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Polyester / Cotton
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Polyester / Nylon
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Nylon / Cotton
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Fur
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Woolen
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Corduroy
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Denim
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Worsted
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Canvas
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Season
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women’s Jackets & Coats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shell Material
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men’s Jackets & Coats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open T-Shirts">
                                            <span><span class="TextCss accordion"> T-Shirts</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_3">1</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women´s T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men´s T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_3">1</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Children´s T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Baby T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Unisex´s T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Printed?s T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Plain Dyed´s T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Plus Size
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Anti-Shrink
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Quick Dry
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Anti-Wrinkle
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eco-Friendly
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            O-Neck
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Polo
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            V-Neck
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            T-Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Ethnic Clothing">
                                            <span><span class="TextCss accordion"> Ethnic Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            India & Pakistan Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Islamic Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Asia & Pacific Islands Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Traditional Chinese Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ethnic Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Sweaters">
                                            <span><span class="TextCss accordion"> Sweaters</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Women
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Unisex
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Cotton
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wool / Acrylic
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Cashmere
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wool / Nylon
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Nylon / Acrylic
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sweaters
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Apparel Design Services">
                                            <span><span class="TextCss accordion"> Apparel Design Services</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Apparel Design Services
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Apparel Processing Services">
                                            <span><span class="TextCss accordion"> Apparel Processing Services</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Apparel Processing Services
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Apparel Stock">
                                            <span><span class="TextCss accordion"> Apparel Stock</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Apparel Stock
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Coats">
                                            <span><span class="TextCss accordion"> Coats</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Coats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Girls´ Clothing">
                                            <span><span class="TextCss accordion"> Girls´ Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Girls´ Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Hoodies & Sweatshirts">
                                            <span><span class="TextCss accordion"> Hoodies & Sweatshirts</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hoodies
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sweatshirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Infant & Toddlers Clothing">
                                            <span><span class="TextCss accordion"> Infant & Toddlers Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Infant Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Toddlers Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jeans">
                                            <span><span class="TextCss accordion"> Jeans</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jeans
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Ladies´ Blouses & Tops">
                                            <span><span class="TextCss accordion"> Ladies´ Blouses & Tops</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ladies´ Blouses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ladies´ Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Mannequins">
                                            <span><span class="TextCss accordion"> Mannequins</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Mannequins
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Maternity Clothing">
                                            <span><span class="TextCss accordion"> Maternity Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Maternity Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Men´s Shirts">
                                            <span><span class="TextCss accordion"> Men´s Shirts</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Men´s Shirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Organic Cotton Clothing">
                                            <span><span class="TextCss accordion"> Organic Cotton Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Organic Cotton Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Other Apparel">
                                            <span><span class="TextCss accordion"> Other Apparel</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Apparel
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Pants & Trousers">
                                            <span><span class="TextCss accordion"> Pants & Trousers</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pants
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Trousers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Plus Size Clothing">
                                            <span><span class="TextCss accordion"> Plus Size Clothing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Plus Size Clothing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Sewing Supplies">
                                            <span><span class="TextCss accordion"> Sewing Supplies</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sewing Supplies
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Shorts">
                                            <span><span class="TextCss accordion"> Shorts</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shorts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Skirts">
                                            <span><span class="TextCss accordion"> Skirts</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Skirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Sleepwear">
                                            <span><span class="TextCss accordion"> Sleepwear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sleepwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Stage & Dance Wear">
                                            <span><span class="TextCss accordion"> Stage & Dance Wear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Stage Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Dance Wear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Suits & Tuxedo">
                                            <span><span class="TextCss accordion"> Suits & Tuxedo</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Suits
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tuxedo
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Tag Guns">
                                            <span><span class="TextCss accordion"> Tag Guns</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tag Guns
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Tank Tops">
                                            <span><span class="TextCss accordion"> Tank Tops</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tank Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Vests & Waistcoats">
                                            <span><span class="TextCss accordion"> Vests & Waistcoats</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Vests
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Waistcoats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>



                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id=""
                                                    style="margin-left:2%; background-color:#FFF; border:none; float:right;">
                                                    <i class="fa fa-search-plus fa-1x"
                                                        style="color:#666;font-weight:bolder"></i> <span
                                                        style=" font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">View
                                                        All Categories</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- end Apparel --}}

                                {{-- Timepiences, Jewel,Eyewear below --}}

                                <div class="mt-4 card card10">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-11">
                                                <a name="RlhKTUlzemdRTjFyWkxMMTgzMjFtdz09">
                                                    <h1 class="h1Css">
                                                        <img class="imgCss" src="{{ asset('assets/icons_2/1_4.jpg') }}"
                                                            alt="" width="80" height="80"
                                                            class="img_icons_3 zoomIn animated">
                                                        Timepieces, Jewellery, Eyewear [ 0 ]
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="col-1">
                                                <div class="col-1"><i class="fa fa-times close-icon10"></i></div>
                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Eyewear">
                                            <span><span class="TextCss accordion"> Eyewear </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyeglasses Frames
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Contact Lenses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sunglasses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyeglasses Lenses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Reading Glasses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sports Eyewear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyewear Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyewear Tops
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyeglasses Parts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Eyewear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jewellery">
                                            <span><span class="TextCss accordion"> Jewellery </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Costume & Fashion Jewelry
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Fine Jewelry
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Necklaces
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Loose Gemstone
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bracelets & Bangles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Rings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Earrings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Loose Beads
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewelry Sets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Jewelry
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Watches">
                                            <span><span class="TextCss accordion"> Watches</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wristwatches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pocket Watches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Watch Bands
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Watch Boxes & Cases
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Smart Watch
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pocket Watch Chain
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wristwatch Tools & Parts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Watch Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Nurse Watch
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Watches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Eyeglasses Frames">
                                            <span><span class="TextCss accordion"> Eyeglasses Frames</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyeglasses Frames
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Sunglasses">
                                            <span><span class="TextCss accordion"> Sunglasses</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sunglasses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Sports Eyewear">
                                            <span><span class="TextCss accordion"> Sports Eyewear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sports Eyewear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Body Jewellery">
                                            <span><span class="TextCss accordion"> Body Jewellery</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Body Jewellery
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Bracelets & Bangles">
                                            <span><span class="TextCss accordion"> Bracelets & Bangles</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bracelets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bangles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Brooches">
                                            <span><span class="TextCss accordion"> Brooches</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Brooches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Cuff Links & Tie Clips">
                                            <span><span class="TextCss accordion"> Cuff Links & Tie Clips</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cuff Links
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tie Clips
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Earrings">
                                            <span><span class="TextCss accordion"> Earrings</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Earrings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_2">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jewellery Boxes">
                                            <span><span class="TextCss accordion"> Jewellery Boxes</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewellery Boxes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>




                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jewellery Sets">
                                            <span><span class="TextCss accordion"> Jewellery Sets</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewellery Sets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jewellery Tools & Equipment">
                                            <span><span class="TextCss accordion"> Jewellery Tools & Equipment</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewelry Tools
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewelry Equipment
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Loose Beads">
                                            <span><span class="TextCss accordion"> Loose Beads</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Loose Beads
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Loose Gemstone">
                                            <span><span class="TextCss accordion"> Loose Gemstone</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Loose Gemstone
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Necklaces">
                                            <span><span class="TextCss accordion"> Necklaces</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Necklaces
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Pendants & Charms">
                                            <span><span class="TextCss accordion"> Pendants & Charms</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pendants
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Charms
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Rings">
                                            <span><span class="TextCss accordion"> Rings</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Rings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Wristwatches">
                                            <span><span class="TextCss accordion"> Wristwatches</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wristwatches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Coats">
                                            <span><span class="TextCss accordion"> Coats</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Coats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Clocks">
                                            <span><span class="TextCss accordion"> Clocks</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wall Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>
                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Digital & Analog-Digital Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>
                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Antique Style Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hourglasses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Clock Parts & Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Desk & Table Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Floor Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Specialty Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Clocks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id=""
                                                    style="margin-left:2%; background-color:#FFF; border:none; float:right;">
                                                    <i class="fa fa-search-plus fa-1x"
                                                        style="color:#666;font-weight:bolder"></i> <span
                                                        style=" font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">View
                                                        All Categories</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--end Timepiences, Jewel,Eyewear --}}

                            </div>

                            <div class="col-md-6">
                                {{-- Textile & Leather Products below --}}
                                <div class="card card9">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-11">
                                                <a name="RlhKTUlzemdRTjFyWkxMMTgzMjFtdz09">
                                                    <h1 class="h1Css">
                                                        <img class="imgCss" src="{{ asset('assets/icons_2/1_2.jpg') }}"
                                                            alt="" width="80" height="80"
                                                            class="img_icons_3 zoomIn animated">
                                                        Textile & Leather Products [ 0 ]
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="col-1">
                                                <div class="col-1"><i class="fa fa-times close-icon9"></i></div>
                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Home Textile">
                                            <span><span class="TextCss accordion"> Home Textile </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bedding Set
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sheet
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Quilts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Curtains
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Valances
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Towel
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Blankets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Throws
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Chair Cover
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Table Runners
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Table Skirts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Table Napkins
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Carpets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Rugs
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Mats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pillows
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cushions
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Fabric">
                                            <span><span class="TextCss accordion"> Fabric </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Technics
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pattern
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Style
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Material
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Use
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Feature
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Type
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            In Stock Fabrics
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Fabrics
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Yarn">
                                            <span><span class="TextCss accordion"> Yarn</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Polyester Yarns
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Cotton Yarns
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Bamboo Fiber Yarns
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Leather">
                                            <span><span class="TextCss accordion"> Leather</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Genuine Leather
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Synthetic Leather
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Leather Products
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Fiber">
                                            <span><span class="TextCss accordion"> Fiber</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Polyester Fibers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Raw Cotton
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Linen Fibers
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Down & Feather">
                                            <span><span class="TextCss accordion"> Down & Feather</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Feather
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Down
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Down Jackets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Down Coats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Textile Accessories">
                                            <span><span class="TextCss accordion"> Textile Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sashes
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tassel Fringe
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Curtain Poles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Curtain Tracks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Curtain Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Garment Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wedding Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Fashion Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Flags, Banners & Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Fur">
                                            <span><span class="TextCss accordion"> Fur</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Fur
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Grey Fabric">
                                            <span><span class="TextCss accordion"> Grey Fabric</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Grey Fabric
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Leather Product">
                                            <span><span class="TextCss accordion"> Leather Product</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Leather Product
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Other Textiles & Leather Products">
                                            <span><span class="TextCss accordion"> Other Textiles & Leather Products</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Textiles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_2">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Textiles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_2">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Textile Processing">
                                            <span><span class="TextCss accordion"> Textile Processing</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Textile Processing
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>




                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Textile Stock">
                                            <span><span class="TextCss accordion"> Textile Stock</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Textile Stock
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Thread">
                                            <span><span class="TextCss accordion"> Thread</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Thread
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open 100% Cotton Fabric">
                                            <span><span class="TextCss accordion"> 100% Cotton Fabric</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Cotton Fabric
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open 100% Polyester Fabric">
                                            <span><span class="TextCss accordion"> 100% Polyester Fabric</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            100% Polyester Fabric
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Bedding Set">
                                            <span><span class="TextCss accordion"> Bedding Set</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bedding Set
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Towel">
                                            <span><span class="TextCss accordion"> Towel</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Towel
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Chair Cover">
                                            <span><span class="TextCss accordion"> Chair Cover</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Chair Cover
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Genuine Leather">
                                            <span><span class="TextCss accordion"> Genuine Leather</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Genuine Leather
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id=""
                                                    style="margin-left:2%; background-color:#FFF; border:none; float:right;">
                                                    <i class="fa fa-search-plus fa-1x"
                                                        style="color:#666;font-weight:bolder"></i> <span
                                                        style=" font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">View
                                                        All Categories</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--end Textile & Leather Products --}}


                                {{-- Fashion Accessories below --}}
                                <div class="mt-4 card card11">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-11">
                                                <a name="RlhKTUlzemdRTjFyWkxMMTgzMjFtdz09">
                                                    <h1 class="h1Css">
                                                        <img class="imgCss" src="{{ asset('assets/icons_2/1_3.jpg') }}"
                                                            alt="" width="80" height="80"
                                                            class="img_icons_3 zoomIn animated">
                                                        Fashion Accessories [ 0 ]
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="col-1">
                                                <div class="col-1"><i class="fa fa-times close-icon11"></i></div>
                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Headwear">
                                            <span><span class="TextCss accordion"> Headwear</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Beanies
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bandanas
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hijabs
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Turbans
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Visors
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Balaclava
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Berets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Earmuffs
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Headwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Neckwear">
                                            <span><span class="TextCss accordion"> Neckwear </span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Neckwear
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Belts">
                                            <span><span class="TextCss accordion"> Belts</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Belts
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Scarf, Hat & Glove Sets">
                                            <span><span class="TextCss accordion"> Scarf, Hat & Glove Sets</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Scarf
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Glove Sets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hat (0)
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}


                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Belt Accessories">
                                            <span><span class="TextCss accordion"> Belt Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Belt Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Hats & Caps">
                                            <span><span class="TextCss accordion"> Hats & Caps</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Caps
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hats
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Hair Accessories">
                                            <span><span class="TextCss accordion"> Hair Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Hair Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Headpieces
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Eyeglasses">
                                            <span><span class="TextCss accordion"> Eyeglasses</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Eyeglasses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Sunglasses
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Scarves & Shawls">
                                            <span><span class="TextCss accordion"> Scarves & Shawls</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Scarves
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shawls
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wraps
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ponchos
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Ties">
                                            <span><span class="TextCss accordion"> Ties</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Neckties
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bow Ties
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Ties Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Fashion Jewelry">
                                            <span><span class="TextCss accordion"> Fashion Jewelry</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewelry
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_2">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wedding Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    class="badge_2">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Watches">
                                            <span><span class="TextCss accordion"> Watches</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Watches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Fashion Watches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Handbags & Messenger Bags">
                                            <span><span class="TextCss accordion"> Handbags & Messenger Bags</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Handbags
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bags
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cases
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open  Gloves & Mittens">
                                            <span><span class="TextCss accordion"> Gloves & Mittens</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Gloves
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Mittens
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Wallets & Holders">
                                            <span><span class="TextCss accordion"> Wallets & Holders</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wallets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Cardholder
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Checkbook Wallets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Money Clip
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Coin Holders
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>



                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Tech Accessories">
                                            <span><span class="TextCss accordion"> Tech Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Tech Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Phone Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Hosiery">
                                            <span><span class="TextCss accordion"> Hosiery</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Socks
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Other Hosiery
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Shoes Accessories">
                                            <span><span class="TextCss accordion"> Shoes Accessories</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shoes Accessories
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Shoes Buckles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Wathches">
                                            <span><span class="TextCss accordion"> Wathches</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Wathches
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Necklaces">
                                            <span><span class="TextCss accordion"> Necklaces</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Necklaces
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Rings">
                                            <span><span class="TextCss accordion"> Rings</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Rings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Earrings">
                                            <span><span class="TextCss accordion"> Earrings</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Earrings
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Bracelets & Bangles">
                                            <span><span class="TextCss accordion"> Bracelets & Bangles</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bracelets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Bangles
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Jewelry Sets">
                                            <span><span class="TextCss accordion"> Jewelry Sets</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Jewelry Sets
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Pendants & Charms">
                                            <span><span class="TextCss accordion"> Pendants & Charms</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Pendants
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Charms
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Open Body Jewelry">
                                            <span><span class="TextCss accordion"> Body Jewelry</span>
                                                &nbsp;<span class="badge bg-light text-dark"><span
                                                        class="badge_2">(0)</span></span><b
                                                    class="hoverClass accordion">+</b></span>

                                            <div class="panelx">
                                                <div class="animate slideIn">
                                                    <p class=""
                                                        style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                        <a href="#" class="link-secondary sidemenu_a2">
                                                            <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                alt="" width="30" height="30" class="text_x">
                                                            Body Jewelry
                                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                        </a><br>


                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}

                                        <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Open Sunglasses">
                                        <span><span class="TextCss accordion"> Sunglasses</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_2">(0)</span></span><b
                                                class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Sunglasses
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Men´s Watches">
                                    <span><span class="TextCss accordion"> Men´s Watches</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Men´s Watches
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open  Fashion Accessories Design Services">
                                    <span><span class="TextCss accordion">  Fashion Accessories Design Services</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Fashion Accessories Design Services
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Fashion Accessories Processing Services">
                                    <span><span class="TextCss accordion">  Fashion Accessories Processing Services</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Fashion Accessories Processing Services
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Fashion Accessories Stock">
                                    <span><span class="TextCss accordion"> Fashion Accessories Stock</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Fashion Accessories Stock
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open  Genuine Leather Belts">
                                    <span><span class="TextCss accordion">  Genuine Leather Belts</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Genuine Leather Belts
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Leather Gloves & Mittens">
                                    <span><span class="TextCss accordion"> Leather Gloves & Mittens</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Leather Gloves
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Leather Mittens
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>



                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Ties & Accessories">
                                    <span><span class="TextCss accordion"> Ties & Accessories</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Ties
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Ties Accessories
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>



                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Belt Buckles">
                                    <span><span class="TextCss accordion"> Belt Buckles</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Belt Buckles
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open PU Belts">
                                    <span><span class="TextCss accordion"> PU Belts</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            PU Belts
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Belt Chains">
                                    <span><span class="TextCss accordion"> Belt Chains</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Belt Chains
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}


                                    <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Open Metal Belts">
                                    <span><span class="TextCss accordion"> Metal Belts</span>
                                        &nbsp;<span class="badge bg-light text-dark"><span
                                                class="badge_2">(0)</span></span><b
                                            class="hoverClass accordion">+</b></span>

                                        <div class="panelx">
                                            <div class="animate slideIn">
                                                <p class=""
                                                    style="margin-left:20%; background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                    <a href="#" class="link-secondary sidemenu_a2">
                                                        <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                            alt="" width="30" height="30" class="text_x">
                                                            Metal Belts
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>

                                                    </a><br>


                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- --}}

                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id=""
                                                    style="margin-left:2%; background-color:#FFF; border:none; float:right;">
                                                    <i class="fa fa-search-plus fa-1x"
                                                        style="color:#666;font-weight:bolder"></i> <span
                                                        style=" font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">View
                                                        All Categories</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--end Fashion Accessories --}}



                            </div>
                        </div>

                    </div>
                </div>

            </div>
             {{--all middle content  --}}

             {{-- all right side bar menu --}}
             <div class="mb-4 col-lg-2 mb-lg-0">

                <div class="mb-3 card card6">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-shopping-cart"></i> <span class="counter" data-target="48">0</span> PRODUCTS</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon6"></i></div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            <li>Table PC&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span> </li>
                            <li>Women's...<span style="color:#FF7519;font-weight:bolder">7</span></li>
                            <li>Uniforms&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">6</span></li>
                            <li>Used Cars...<span style="color:#FF7519;font-weight:bolder">6</span></li>
                            <li>Women's...<span style="color:#FF7519;font-weight:bolder">8</span></li>
                            <li>Boots&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">3</span></li>
                            <li>Interiors...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Kitchen...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Living Room...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Keyboards&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">2</span>
                            </li>
                            <li>Dresses&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">2</span></li>
                            <li>T-shirts&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">2</span></li>
                            <li>Men`s...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Other Womens...<span style="color:#FF7519;font-weight:bolder">6</span></li>
                            <li>Children`s...<span style="color:#FF7519;font-weight:bolder">1</span></li>

                        </ul>
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="3140">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 card card7">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-fa fa-wrench"></i> <span class="counter" data-target="17">0</span> SERVICES</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon7"></i></div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-left:-8px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            <li>Ugandan...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Men's Clothing&nbsp;&nbsp;<span
                                    style="color:#FF7519;font-weight:bolder">1</span>
                            </li>
                            <li>Web Design&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span>
                            </li>
                            <li>Graphic Design&nbsp;&nbsp;<span
                                    style="color:#FF7519;font-weight:bolder">1</span>
                            </li>
                            <li>Advertising&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span>
                            </li>
                            <li>Non Governmental...<span style="color:#FF7519;font-weight:bolder">3</span></li>
                            <li>Print Media&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span>
                            </li>
                            <li>Banks & Credit...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Living Room...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Session...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Internet Services...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                            <li>Universities&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">2</span>
                            </li>
                            <li>Museums&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span></li>


                        </ul>
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="653">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 card">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <i class="fa fa-industry"></i> INDUSTRIES
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            <li><a href="#" id="global-href2"><span id="global-href2">World Wid
                                        Web...</span><span style="color:#FF7519;font-weight:bolder">1</span></a>
                            </li>
                            <li><a href="#" id="global-href2"><span
                                        id="global-href2">Manufacture</span>&nbsp;&nbsp;<span
                                        style="color:#FF7519;font-weight:bolder">2</span></a></li>

                        </ul>
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="2659">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <i class="fa fa-cogs"></i> JOBS
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        {{-- <ul class="gap-2 d-grid listitems" style="color:#585858;font-size:13px">
                            <li><a href="#" id="global-href2"><span id="global-href2">World Wid
                                        Web...</span><span style="color:#FF7519;font-weight:bolder">1</span></a>
                            </li>
                            <li><a href="#" id="global-href2"><span
                                        id="global-href2">Manufacture</span>&nbsp;&nbsp;<span
                                        style="color:#FF7519;font-weight:bolder">2</span></a></li>

                        </ul> --}}
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="444">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
             {{--end all right side bar menu --}}

        </div>
    </div>
</section>
<section>
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
                        <p class="card-text"><a href="">GREAT&nbsp;PRODCUTS&nbsp;AT UNBEATABLE&nbsp;PRICES</a></p>
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
</section>

@endsection
