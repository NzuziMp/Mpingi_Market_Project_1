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


    <section class="py-2 border-bottom" id="features">
        <div class="container-fluid">

            <div class="row g-2 justify-content-center">
                {{-- all left side bar menu --}}
                <div class="mb-5 col-lg-2 mb-lg-0">


                    {{-- --}}
                    <div class="mb-3 card card1">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">

                                <div class="col-10"><i class="fas fa-list"></i> <span class="counter"
                                        data-target="3140">0</span> CATEGORIES</div>
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
                                            <img src="{{ asset('assets/images/icon1.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Apparel</span>&nbsp;
                                            <span class="badge bg-light">
                                                <span class="badge_3">24</span></span>
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
                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                            class="badge_3">24</span></span>

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
                                            aria-expanded="false" aria-controls="collapseTwo"
                                            id="button_to_trigger_collapse">
                                            <img src="{{ asset('assets/images/icon2.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Auto</span>&nbsp;<span
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
                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                            class="badge_3">7</span></span>

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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Electronics</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">3</span></span>
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
                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                            class="badge_3">3</span></span>

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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Machinery (0)</span>
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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Gifts
                                                (0)</span>
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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Home</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">2</span></span>
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
                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                            class="badge_3">1</span></span>

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
                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                            class="badge_3">1</span></span>

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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Health
                                                (0)</span>
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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Bags</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">12</span></span>
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


                                                    <span class="badge rounded-pill bg-light text-dark"><span
                                                            class="badge_3">12</span></span>

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
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Electrical (0)</span>
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
                                                width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Agriculture (0)</span>
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
                                                width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Packaging (0)</span>
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
                                                width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Metallurgy (0)</span>
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
                                                style="margin-left:10px; font-size:18px; color:#ababab"></i>&nbsp;<span
                                                class="hoversidemenu">Stores</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">45</span></span>
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
                                                        id="imgBorder"><i class="fa fa-search-plus"></i> <span
                                                            class="counter" data-target="239">0</span> View Counties
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- --}}
                    {{-- --}}
                    <div class="mb-3 card ">
                        <div class="card-body">
                            <img class="mySlides w3-animate-fading" src="{{ asset('assets/images/jumbo.gif') }}"
                                style="width:100%;height:100%">

                            </pre>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="mb-3 card card3">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-10"><i class="fa fa-wrench"></i> <span class="counter"
                                        data-target="653">0</span> SERVICES</div>
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
                                                    <i class="fa fa-search-plus"></i> <span class="counter"
                                                        data-target="653">0</span> View Categories
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- --}}
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

                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-cogs" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Available Jobs
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>

                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
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
                                                    <i class="fa fa-search-plus"></i> View <span class="counter"
                                                        data-target="444">0</span> Categories
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- --}}
                </div>
                {{--end all left side bar menu --}}

                {{-- --}}

                {{--all middle content --}}
                <div class="mb-4 col-lg-8 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-10"><i class="fa fa-briefcase"></i> <span class="counter"
                                        data-target="0">0</span> {{ $availjobs->job_name }}</div>
                                {{-- <div class="col-2"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="row">
                                <div class="col-md-6">

                                    <label>
                                        <select size="1" name="" id="search_pages" aria-controls="example">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select><span id="perpagetext"> records per page</span>
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Keywords..."
                                            id="search_inputs">
                                        <span class="input-group-text" id="search_span"><i
                                                class="fa fa-search me-2 text-light"></i> </span>
                                    </div>
                                </div>

                            </div>
                            {{-- --}}

                          {{--  --}}
                                <div class="mt-4 row">
                                    <div class="col-9">
                                        <a href="services/items/?service=VnYzMjFrOU5WOFpSaURMQWtxS2U1UT09" class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ \Illuminate\Support\Str::upper($availjobs->job_name) }} "><span class="text-dark2"><i class="fa fa-plus-square"></i> {{ \Illuminate\Support\Str::upper(Str::limit($availjobs->job_name, 16)) }}   <span class="badge rounded-pill bg-light" style="color:#FF7519">0</span></span></a>
                                    </div>
                                    <div class="col-3" class="customPrevNext">
                                        <button class="text-dark1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="" ><i class="fa fa-angle-left" aria-hidden="true" title="Previous"></i></span>
                                        </button>
                                        <button class="text-dark1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class=""><i class="fa fa-angle-right" aria-hidden="true" title="Next"></i></span>
                                        </button>
                                    </div><hr  style="margin-left">
                                </div>
                              {{--  --}}


                                <div class="col-md-12">
                                   {{ $availjobs_->links('pagination.custom')}}
                                </div>

                            <p style="margin-top:40px; width:70% background-color:#FFF; border:none;background-color:#FFF;color: #FF7519" align="center" class="p"><i class="fa fa-briefcase fa-6x"></i></p>
                            <p class="textPCss" align="center">No {{ $availjobs->job_name }} Posted</p>
                            <div id="submit_compare2" align="center" style="padding-bottom:10px"><a data-toggle="modal" href="#login1" id="pic" title="Change picture" class="top44" style="font: 10pt/130% Helvetica, Arial, sans-serif;font-weight:bold; color:#fff"><i class="fa fa-plus-square"></i> Post {{ $availjobs->job_name }}  for free Now!</a></div>


                        </div>

                    </div>
                </div>

                {{--all middle content --}}

                {{-- all right side bar menu --}}
                <div class="mb-4 col-lg-2 mb-lg-0">

                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-10"><i class="fa fa-shopping-cart"></i> <span class="counter"
                                        data-target="48">0</span> PRODUCTS</div>
                                <div class="col-2"><i class="fa fa-times text-dark close-icon6"></i></div>
                            </div>
                        </div>
                        <div class="card-body" style="margin-left:-10px">
                            <ul class="gap-2 d-grid listitems"
                                style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
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
                                    <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter"
                                            data-target="3140">0</span> Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 card card7">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-10"><i class="fa fa-fa fa-wrench"></i> <span class="counter"
                                        data-target="17">0</span> SERVICES</div>
                                <div class="col-2"><i class="fa fa-times text-dark close-icon7"></i></div>
                            </div>
                        </div>
                        <div class="card-body" style="margin-left:-8px">
                            <ul class="gap-2 d-grid listitems"
                                style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                <li>Ugandan...<span style="color:#FF7519;font-weight:bolder">1</span></li>
                                <li>Men's Clothing&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span>
                                </li>
                                <li>Web Design&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span>
                                </li>
                                <li>Graphic Design&nbsp;&nbsp;<span style="color:#FF7519;font-weight:bolder">1</span>
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
                                    <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter"
                                            data-target="653">0</span> Categories</p>
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
                            <ul class="gap-2 d-grid listitems"
                                style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                <li><a href="#" id="global-href2"><span id="global-href2">World Wid
                                            Web...</span><span style="color:#FF7519;font-weight:bolder">1</span></a>
                                </li>
                                <li><a href="#" id="global-href2"><span
                                            id="global-href2">Manufacture</span>&nbsp;&nbsp;<span
                                            style="color:#FF7519;font-weight:bolder">2</span></a></li>

                            </ul>
                            <div class="card">
                                <div class="mt-2 card-body">
                                    <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter"
                                            data-target="2659">0</span> Categories</p>
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
                                    <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter"
                                            data-target="444">0</span> Categories</p>
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
                                <p class="card-text"><a href="">GREAT&nbsp;PRODCUTS&nbsp;AT UNBEATABLE&nbsp;PRICES</a>
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
    </section>

    @endsection
