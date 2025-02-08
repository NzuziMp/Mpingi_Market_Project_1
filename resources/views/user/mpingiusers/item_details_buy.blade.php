@include('user.layouts.header')

<body class="flexcroll" onkeypress="setDelayForReload()">
    <div class="topnav">
        <nav class="navbar navbar-light my-navbarCss" style="background-color:#464444;border-bottom: 2px solid #f24c15">
            <div class="container">
                <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/images/_202407191446 _ mpingi market logo 125 46 gh2.png') }}" style="width: 40vmin;" class="imag-res"
                        data-aos="fade-left" data-aos-duration="1000">
                </a>
                <div class="mt-3 d-flex">
                    <p style="font-weight: bold;color:aliceblue;font-size: 2.3vmin" >
                        <img src="{{ asset('assets/icons/1236251.png') }}"
                            width="14" height="16" style="border-radius:50%"><span class="" id="english" data-sname2="en" {{ session()->get('locale') }}>  ENGLISH </span>&nbsp;
                            <img
                            src="{{ asset('assets/icons/1542408.png') }}" width="16" height="16"
                            style="border-radius:50%"><span class="" id="francais" data-sname="fr" {{ session()->get('locale') }}> FRANCAIS</span> </p>
                </div>
                {{-- <h4>{{ __('messages.title') }}</h4> --}}
            </div>
        </nav>
    </div>
    @include('user.layouts.navbar')
    {{-- @include('user.layouts.stackbar') --}}

    <section class="py-2 border-bottom " id="features">
        <div class="container-fluid">

            <div class="row g-1">

                {{--all left content --}}
                <div class="mb-5 col-lg-2 mb-lg-0">

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
                                            aria-controls="collapseOne">
                                            <img src="{{ asset('assets/images/icon1.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Apparel</span>&nbsp;
                                            <span class="badge bg-light">
                                                <span class="badge_3">24</span></span>
                                        </button>
                                    </h6>
                                    <div id="collapseOne" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body">
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
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <img src="{{ asset('assets/images/icon2.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Auto</span>&nbsp;<span
                                                class="badge bg-light text-dark"><span class="badge_3">7</span></span>
                                        </button>
                                    </h6>
                                    <div id="collapseTwo" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse3">
                                            <img src="{{ asset('assets/images/icon3.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Electronics</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">3</span></span>
                                        </button>
                                    </h6>
                                    <div id="collapse3" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading3" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse4">
                                            <img src="{{ asset('assets/images/icon4.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Machinery (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse4" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading4" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse5">
                                            <img src="{{ asset('assets/images/icon5.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Gifts
                                                (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse5" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading5" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse6">
                                            <img src="{{ asset('assets/images/icon6.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Home</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">2</span></span>
                                        </button>
                                    </h6>
                                    <div id="collapse6" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading6" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse7">
                                            <img src="{{ asset('assets/images/icon7.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span class="hoversidemenu">Health
                                                (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse7" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading7" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse8">
                                            <img src="{{ asset('assets/images/icon8.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Bags</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">12</span></span>
                                        </button>
                                    </h6>
                                    <div id="collapse8" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading8" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse9">
                                            <img src="{{ asset('assets/images/icon9.png') }}" height="20px" width="25px"
                                                class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Electrical (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse9" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading9" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse10">
                                            <img src="{{ asset('assets/images/icon10.png') }}" height="20px"
                                                width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Agriculture (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse10" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading10" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse11">
                                            <img src="{{ asset('assets/images/icon11.png') }}" height="20px"
                                                width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Packaging (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse11" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading11" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse12">
                                            <img src="{{ asset('assets/images/icon12.png') }}" height="20px"
                                                width="25px" class="img_icons" alt="Nzuzi">&nbsp;<span
                                                class="hoversidemenu">Metallurgy (0)</span>
                                        </button>
                                    </h6>
                                    <div id="collapse12" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="heading12" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                            aria-controls="collapse13">
                                            <i class="fa fa-shopping-basket"
                                                style="margin-left:10px; font-size:18px; color:#ababab"></i>&nbsp;<span
                                                class="hoversidemenu">Stores</span>
                                            &nbsp;<span class="badge bg-light text-dark"><span
                                                    class="badge_3">45</span></span>
                                        </button>
                                    </h6>
                                    <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13"
                                        data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body text-bidgray">
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
                                                        title="Click here to view&nbsp;{{ $countallcountries }}&nbsp;Countries"
                                                        id="imgBorder"> <a href="{{ route('user.viewallcountries') }}" class="current_link hrefCss"><i class="fa fa-search-plus"></i> <span
                                                            class="counter" data-target="{{ $countallcountries }}">0</span> View Counties </a>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="mb-3 card ">
                        <div class="card-body">
                            <img class="mySlides w3-animate-fading" src="{{ asset('assets/images/jumbo.gif') }}"
                                style="width:100%;height:100%">

                            </pre>
                        </div>
                    </div>

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


                </div>
                {{--end all left content --}}

                {{--all middle content --}}
                <div class="mb-4 col-md-8 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">

                                @foreach ($category_name as $row)
                                  <div class="col-11"><img src="{{ '/storage/assets/images/' . $row->category_image }}" height="20"
                                   width="25" class="img_icons">
                                  <span style=""></span><a href="{{ route('user.viewpost') }}" class="hrefCss3s" style="color:#FFF">{{$row->category_name_desc}}  </a>
                                @endforeach
                                <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FFF">@foreach ($subcategories_name as $row1)   {{ $row1->sub_category_name_en }}  @endforeach </a>
                                <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FFF">@foreach ($article_name as $row2)   {{ $row2->article_name_en }} @endforeach </a>
                               <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FF7519">@foreach ($subproduct_name as $row3) {{ $row3->sub_product_name_en }} @endforeach </a>
                           </div>

                           {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                       </div>

                            {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                        </div>


                    <div class="card-body">
                        <p style="background-color:#FFF; margin-top:10px; margin-right:20px;" align="right">
                            <font color="#FF7519"><b>Order Step 2</b> of 3</font>
                        </p>
                        <div class="py-2 my-2"
                            style="background-color:#fcf8e3;color:#8a6d3b;border-radius:6px;border-color:1px solid #fbeed5">
                            <p style="bacground-color:#fcf8e3;color:8a6d3b;font: 10pt/130% Helvetica, Arial, sans-serif;margin-left:1%;margin-right:1%"
                                align="center">
                                2. Carefully read the conditions of the seller (Read the details of the products the payment and delivery methods offered by the seller)<br>
                                <span style="margin-left: 2rem;">2.1 Select your payment and shipping method (pays cash on delivery or chooses an online payment solution (bank transfer or mobile money transfer)).</span><br>
                                <span style="margin-left: 2rem;">2.2 Seller will contact you for delivery (please fill this form correctly to help seller to contact you for delivery and payment. )</span><br>
                                <span style="margin-left: 2rem;">2.3 and then click on CHECK OUT button</span>
                            </p>
                        </div>
                    </div>


                                <div class="card-body">
                                    <div class="row g-2">
                                        {{-- --}}
                                        <div class="col-md-5"  style="border: 1px solid #dee2e6!important;border-radius:6px">
                                            {{-- --}}
                                             <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                                <div class="containeroverlay">
                                                    <div class="carousel-inner">
                                                        @forelse ($viewImage as $key => $slider)
                                                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                            <img src="{{ (!empty($slider->image_name)) ? url('/storage/assets/uploads', $slider->image_name) : url('/storage/assets/images/avatar_nzuzi_default.png')}}"
                                                            class="d-block w-100" alt="...">
                                                        </div>

                                                        @empty
                                                        <center><p>No Image Found</p></center>
                                                        @endforelse
                                                    </div>
                                                    {{-- <div class="overlay overlayTop1_">

                                                        <h2 id="cssh3">
                                                            <a href="{{ route('user.editproductitem', ['upload_id' =>$photoIDS ])}}" style="text-decoration: none;color:#fff"><b><i class="fa fa-edit"></i> Edit products</b></a>
                                                            <br><br>

                                                        </h2>
                                                    </div> --}}
                                                 </div>

                                                 <div class="row">
                                                     <div class="col-md-12">

                                                        @forelse ($countImage as $c)
                                                          <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('user.photosbuy', ['upload_id' =>$photoIDS ])}}" class="linkPhoto">{{ $c }} photos </a> </p>
                                                         @empty
                                                      @endforelse
                                                    </div>
                                                     <div class="col-md-0">
                                                    </div>
                                                 </div>

                                           <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                                 data-bs-slide="prev">
                                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                 <span class="visually-hidden">Previous</span>
                                             </button>
                                             <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                                 data-bs-slide="next">
                                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                 <span class="visually-hidden">Next</span>
                                             </button>


                                            </div>
                                            {{-- --}}
                                        </div>
                                        {{-- --}}
                                        <div class="col-md-4">
                                            {{-- --}}
                                            <div class="card">
                                                <div class="card-body">
                                                @forelse ($getimageid as $row)

                                                    <div class="row">
                                                        <div class="mt-2 col-9">
                                                            <a href="#" class="homecontent_details"
                                                                style="font-size:2.6vmin;"> {{ \Illuminate\Support\Str::title($row->item_name) }}
                                                            </a>
                                                        </div>
                                                        <div class="col-3">
                                                            @if($row->ptype =='New')
                                                             <img src="{{ asset('assets/images/new.png') }}" alt=""
                                                                style="background-color:transparent; border:none;">
                                                             @else
                                                              <img src="{{ asset('assets/images/sale.png') }}" alt=""
                                                             style="background-color:transparent; border:none;">
                                                             @endif
                                                        </div>
                                                        <span
                                                            style="border: 1px solid rgb(214, 211, 211);border-style: dashed;"></span>
                                                        <h6 class="mt-1 card-title fw-bold current_nzuzi_mping__"> {{ $row->currency }} {{ number_format($row->price) }} <br>   <strike class="current_nzuzi_mping_"> {{ $row->currency }} {{ number_format($row->old_price) }}</strike></h6>

                                                        <p class="mb-4 titleDetails">
                                                            <span class="d-flex">Product Type:&nbsp; {{ $row->product_type }}</span>
                                                            <span class="d-flex"> Color:&nbsp;<span
                                                                class="py-2mt-1" style="
                                                                 display: inline-block;
                                                                font-size: 12px;
                                                                font-weight: bold;
                                                                line-height: 15px;
                                                                color: #9f9f9f;
                                                                width: 20px;
                                                                height: 15px;
                                                                background-color: {{ $row->product_color }};
                                                                text-transform: uppercase;
                                                                padding-right: 16px;
                                                                padding-left: 16px;
                                                                padding-top: 10px;
                                                                padding-bottom: 10px;
                                                                -webkit-border-radius: 6px;
                                                                -moz-border-radius: 6px;
                                                                border-radius: 6px;
                                                                margin-bottom: 2px;
                                                                box-shadow: 1px 1px #888888;
                                                                "></span></span>
                                                            <span class="d-flex">Quantity:&nbsp;{{ $row->pieces }}</span>
                                                            <span class="d-flex">Condition:&nbsp; {{ $row->ptype }}</span>
                                                            <span class="d-flex">Price:&nbsp; {{ $row->negotiable }}</span>
                                                            <span class="d-flex">Disponibility:&nbsp;
                                                                @if($row->disponibility == 1)
                                                                     <span class="d-flex" style="color:#00a61c;font-weight:bold">Available</span>
                                                                  @else
                                                                    <span class="d-flex" style="color:#f14c36;font-weight:bold">Sold</span>
                                                                  @endif

                                                            </span>
                                                            {{-- <span class="d-flex">Disponibility:&nbsp; {{ $row->disponibility }}</span> --}}
                                                            {{-- <span class="d-flex">Go to:&nbsp; <a href="#"
                                                                target="_blank"
                                                                style="color:#ff7519;font: 10pt/130% Helvetica, Arial, sans-serif; font-weight:bold">{{ $row->website }}</a></span> --}}
                                                        </p>
                                                        <p>
                                                            <span class="titleDetails d-flex">Posted
                                                                on:&nbsp;{{ \Carbon\Carbon::parse($row->post_date_of_item)->diffForHumans()  }}</span>
                                                            <span class="mb-2 titleDetails d-flex">Views: {{ $row->views }}</span>
                                                            <span class="mb-2 titleDetails d-flex">Rating: {{ $row->rate }}</span>
{{--
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span> --}}
                                                        <div>

                                                            <span>
                                                                <a href="#"><button type="button"
                                                                     data-bs-toggle="tooltip" data-bs-placement="top"
                                                                     class="btn btn-outline w-100 DetailsBtn" style="font: 10pt / 130% 'Varela', sans-serif;color: #ff7519;font-weight: bold;">
                                                                     <i class="fas fa-share"></i> Share</button></a></span>


                                                                     <span data-bs-toggle="modal"
                                                                     data-bs-target="#sellerbuyer_Modal"> <button type="button"
                                                                         data-bs-toggle="tooltip" data-bs-placement="top"
                                                                         title="Seller & Buyer Details"
                                                                         class="mt-3 btn btn-outline w-100 DetailsBtn">
                                                                         <i class="fa fa-user"></i> Seller & Buyer Details</button></span>
                                                                         @include('user.modal.buyersellerModal')

                                                            {{-- <span>
                                                               <a href="#"><button type="button"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Order Now!"
                                                                    class="btn btn-outline w-100 DetailsBtn">
                                                                    <i class="fas fa-shopping-cart"></i> Order
                                                                    Now!</button></a></span> --}}


                                                                    {{-- <span data-bs-toggle="modal"
                                                                    data-bs-target="#sellerbuyer_Modal"> <button type="button"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Seller & Buyer Details"
                                                                        class="mt-3 btn btn-outline w-100 DetailsBtn">
                                                                        <i class="fa fa-user"></i> Seller & Buyer Details</button></span>
                                                                        @include('user.modal.buyersellerModal') --}}

                                                        </div>
                                                        </p>

                                                    </div>

                                                    @empty
                                                      <center><p class="alert alert-warning">No Record Found</p></center>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        {{-- --}}
                                    @forelse ($getimageid as $row3)
                                         <div class="col-md-3">
                                            {{-- --}}
                                            <div class="card">
                                                <div class="card-header" style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                                    <span style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#fff;font-weight:bold"><i
                                                        class="fa fa-star"></i> Please rate this product
                                                    </span>
                                                </div>
                                                <form method="POST" id="forms-id">
                                                <input type="hidden" name="rate" id="rate" value="{{ $row3->product_id }}">
                                                <div class="card-body">
                                                      <div class="form-check">
                                                        <input class="form-check-input negotiable"  value="1" name="rating"  type="radio" >
                                                        <label class="" for="flexRadioDefault1">
                                                            poor
                                                        </label>
                                                      </div>
                                                      <div class="form-check">
                                                        <input class="form-check-input negotiable"  value="2" name="rating"  type="radio" >
                                                        <label class="" for="flexRadioDefault1">
                                                            fair
                                                        </label>
                                                      </div>

                                                      <div class="form-check">
                                                        <input class="form-check-input negotiable"  value="3" name="rating"  type="radio" >
                                                        <label class="" for="flexRadioDefault1">
                                                            good
                                                        </label>
                                                      </div>

                                                      <div class="form-check">
                                                        <input class="form-check-input negotiable"  value="4" name="rating"  type="radio" >
                                                        <label class="" for="flexRadioDefault1">
                                                            very good
                                                        </label>
                                                      </div>

                                                      <div class="form-check">
                                                        <input class="form-check-input negotiable"  value="5" name="rating"  type="radio" checked>
                                                        <label class="" for="flexRadioDefault1">
                                                            excellent
                                                        </label>
                                                      </div>

                                                      <button type="button"
                                                                    class="mt-2 btn-rate btn btn-outline w-100 DetailsBtn">
                                                                 Rate!</button>
                                                     </form>

                                                </div>

                                            </div>
                                          </div>
                                        @empty
                                        <center><p class="alert alert-warning">No Record Found</p></center>
                                       @endforelse

                                        {{-- --}}
                                        {{-- --}}
                                        <div class="mt-4 row g-1">
                                            <div class="col-md-9">
                                                {{-- --}}
                                                <div class="mb-3 card card6">
                                                        <div class="card-header" style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                                            <span style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#fff;font-weight:bold"><i
                                                                class="fa fa-shopping-cart"></i>  Buy From Mpingi Shop
                                                            </span>
                                                        </div>

                                                    <div class=" card-body">
                                                        <div class="mb-3 card" style="border:none;">
                                                            <div class="card-header"
                                                                style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                            <h6 style="font-weight:bold"><i class="fa fa-user fa-1x" style="font-size:1.3rem;"></i>
                                                                                Buyer Details </h6>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                                                {{-- --}}
                                                                <p class=""
                                                                    style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                                                    <i class="fas fa-exclamation-triangle"></i> Please you must update your Profile details before to Order product
                                                                    here</p>
                                                            </div>

                                                            {{-- --}}

                                                        </div>

                                                        <i class="mt-1 fa fa-map-marker-alt" style="font-size:1.3rem;color:#f25433"></i><span style="font-size:1rem;color:#666;font-weight:bold"> - Address </span>
                                                <form method="POST" id="form-mypur">
                                                    @csrf
                                                     @foreach ($getbusinessdata  as $u)

                                                        <div class="mb-2 row">

                                                            <div class="mt-1 col-md-6">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Full Name
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control phone" name="full_name" value="{{ Str::ucfirst($u->first_name) .' '. Str::ucfirst($u->last_name) }}"  placeholder="Full Name" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="full_name-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>

                                                              <div class="mt-1 col-md-6">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Post Code
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control phone" name="post_code" value="{{ $u->pobox }}"  placeholder="Post Code" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="post_code-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>
                                                        </div>

                                                        <div class="mb-2 row">

                                                            <div class="mt-1 col-md-6">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Email Address
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control phone" name="email" value="{{ $u->uemail }}"  placeholder="Email Address" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="email-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>

                                                              <div class="mt-1 col-md-6">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Address 1
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control phone" name="address_1" value="{{ Str::ucfirst($u->address_1) }}"  placeholder="Address 1" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="address_1-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>
                                                        </div>

                                                        <div class="mb-2 row">

                                                            <div class="mt-1 col-md-6">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Mobile or Telephone
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control mobile" name="mobile" value="{{ $u->mobile }}"  placeholder="Mobile/Telephone" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="mobile-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>

                                                              <div class="mt-1 col-md-6">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Address 2
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control phone" name="address_2" value="{{ Str::ucfirst($u->address_2) }}" placeholder="Address 2" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="address_2-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>
                                                        </div>

                                                 @endforeach
                                                     <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">1.2- Set location Information (Address,Country,State and City)</p>
                                                        <div class="mb-2 row">
                                                            <div class="col-md-1">

                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    @foreach ($getbusinessdata as $data)
                                                                    <div class="row g-1">

                                                                        <div class="col-4">
                                                                            <font color="red">*</font>
                                                                            <select class="form-select form-selects country" name="country" value="{{ $data->countryname }}" aria-label="Default select example" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">
                                                                                <option value="{{ $data->country }}">{{ $data->countryname }}</option>
                                                                            </select>
                                                                            <span class="text-danger">
                                                                                <strong id="country-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                            </span>
                                                                        </div>

                                                                        <div class="col-4">
                                                                            <font color="red">*</font>
                                                                            <select class="form-select form-selects city" name="city" value="{{ $data->cityname }}" aria-label="Default select example" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
                                                                                <option value="{{ $data->state_id }}">{{ $data->cityname }}</option>
                                                                            </select>
                                                                            <span class="text-danger">
                                                                                <strong id="city-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                            </span>
                                                                        </div>

                                                                        <div class="col-4">
                                                                            <font color="red">*</font>
                                                                            <select class="form-select form-selects state" name="state" value="{{ $data->statename }}" aria-label="Default select example" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
                                                                                <option value="{{ $data->country_id }}">{{ $data->statename }}</option>
                                                                            </select>
                                                                            <span class="text-danger">
                                                                                <strong id="state-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                            </span>
                                                                        </div>

                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>


                                                            <div class="col-md-2">

                                                            </div>

                                                        </div>


                                                   <p  class="mt-4" style="font: 10pt/130% Helvetica, Arial, sans-serif; color:#666;font-weight:bold;pointer-events: none">
                                                    @foreach ($getbusinessdata  as $p)
                                                        <i class="fa fa-truck" style="font-size:1.3rem;color:#1a6be8"></i><span style="font-size:1rem;color:#666;font-weight:bold"> - Select My Delivery</span>
                                                        <br>
                                                              <div class="mb-3 row g-1">
                                                                <div class="col-md-8">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" id="delivery"  name="delivery" value="Pickup"  onclick="adjustableHeightCheck1_1()">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Pickup from <span style="color: #FF7519;font: 10pt / 130% Helvetica, Arial, sans-serif;">{{ $p->business_name }} ({{ $p->address }}) </span>
                                                                        </label>
                                                                      </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio"  name="delivery" value="Deliver" id="adjustableHeight2_2"  onclick="adjustableHeightCheck2_2()">
                                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                                Delivery to the Address
                                                                            </label>
                                                                          </div>

                                                                </div>


                                                                <span class="text-danger">
                                                                    <strong id="delivery-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                </span>
                                                              </div>


                                                         <i class="fa fa-lock" style="font-size:1.3rem;color:#00a61c"></i><span style="font-size:1rem;color:#666;font-weight:bold"> - Select My Payment Method </span><br>
                                                            <div class="mt-3 mb-3 row">
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="payment" id="payment" value="Pay On Delivery or Pickup">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Pay On Delivery or Pickup
                                                                        </label>
                                                                      </div>
                                                                      <span class="text-danger">
                                                                        <strong id="payment-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                               </div>

                                                            </div>

                                                         <i class="mb-3 fas fa-sync-alt" style="font-size:1.3rem;color:#f25433"></i><span style="font-size:1rem;color:#666;font-weight:bold" class="mb-3"> - Return Conditions</span><br>
                                                         <span style="font: 10pt / 130% Helvetica, Arial, sans-serif; color: #666;font-weight: bold;">Return accepted within <span style="color:#FF7519">{{ $p->day_return }}</span> days of delivery, buyer pays for the cost of return. Item must be undamaged and packaging intact.</span><br>
                                                         <i class="mt-3 mb-3 fa fa-gift" style="font-size:1.3rem;color:#ffe305"></i><span style="font-size:1rem;color:#666;font-weight:bold" class="mb-3"> - My Order</span><br>
                                                         @endforeach
                                                         <div class="mb-2 row">
                                                            <div class="mt-1 col-md-12">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Quantity
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control phone" oninput="updateInput(value)" id="quantity" minlength="1" maxlength="3" name="quantity"  placeholder="Quantity" minlength="1" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="quantity-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>
                                                         </div>

                                                         <div class="mb-2 row">
                                                            @foreach ($getimageid as $s)
                                                            <div class="mt-1 col-md-12">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Price
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control price" id="price" name="price" value="{{ $s->price }}" placeholder="Price" readonly>
                                                                    </div>
                                                                    <span class="text-danger">
                                                                        <strong id="price-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                                    </span>
                                                                </div>
                                                             </div>
                                                             @endforeach
                                                         </div>

                                                         {{-- hidden input --}}

                                                         <div class="mb-2 row" id="max-height_1"  style="display: none;">
                                                            <div class="mt-1 col-md-12">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Shipping Cost <span style="color:#FF7519">Free</span>
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control shipping" name="shipping_price" value="0"  placeholder="Shipping" readonly>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                         </div>

                                                         <div class="mb-2 row" id="max-height_2"  style="display: none;">
                                                            <div class="mt-1 col-md-12">
                                                                <div class="form-group">
                                                                    <font color="red">*</font> <span
                                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                                        Total (Delivery)
                                                                    </span>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control total_delivery" id="subtotal" name="total_delivery" value="0"  placeholder="Total Delivery" readonly>
                                                                    </div>
                                                                </div>
                                                             </div>
                                                         </div>
                                                        {{-- hidden input --}}

                                                         <label class="mgsCss__">
                                                            <font color='red'>*</font> Buyer Clarify Message   <span class="checkpass">(Maximum 500 characters)</span>
                                                        </label>
                                                        <div class="mb input-group">

                                                            <textarea type="text" rows="5" class="form-control" placeholder="Message..."
                                                                aria-label="Message" oninput="limitCharx(this)" id="tArea" name="message"
                                                                maxlength="500" autofocus></textarea>

                                                        </div>

                                                        <div class="mb-3">
                                                            <div class="row">
                                                                <div class="col-md-0">
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <p id="charCounter_"> Characters remaining: <span
                                                                            id="charCounterx" style="color:#FF7519">500</span> / 500</p>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <span class="text-danger">
                                                            <strong id="message-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                        </span>

                                                  </p>

                                                    <!-- form-group// -->
                                                         <div class="mb-4 row">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <input name="user_id_seller" id="user_id_seller" type="hidden"  value="{{ $row3->user_id_seller }}" />
                                                                    <input name="user_id_buyer" id="user_id_buyer" type="hidden"  value="{{ Auth::user()->id }}" />
                                                                    <input name="product_id" id="product_id" type="hidden"  value="{{ $row3->product_id }}" />
                                                                    <input name="category_id" type="hidden" id="category_id" value="@foreach ($category_name as $c){{ $c->id }}@endforeach" />
                                                                    <input name="sub_category_id" type="hidden" id="sub_category_id" value="@foreach ($subcategories_name as $sa){{ $sa->id }}@endforeach" />
                                                                    <input name="article_id" type="hidden" id="article_id" value="@foreach ($article_name as $a){{ $a->id }}@endforeach" />
                                                                    <input name="sub_product_id" type="hidden" id="sub_product_id" value="@foreach ($subproduct_name as $sp){{ $sp->id }}@endforeach" />
                                                                    <input name="item_name" id="item_name" type="hidden"  value="{{ $row3->product_id }}" />

                                                                    <button type="button" class="btn-itemdetailsbuy btn btn-outline btn-lg w-100 DetailsBtns2_"> Check out
                                                                    </button>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-2"></div>
                                                         </div>

                                                  </form>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3 card card6">
                                                    <div class="card-header" style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#fff;font-weight:bold"><i
                                                            class="fa fa-tag"></i>  Product Descriptions
                                                        </span>
                                                    </div>

                                                    <div class="card-body">
                                                        @forelse ($getimageid as $row2)
                                                        <div class="row">
                                                            <p class="titleDetails">{{ $row2->item_descriptions }}</p>
                                                        </div>
                                                        @empty
                                                        <center><p class="alert alert-warning">No Record Found</p></center>
                                                      @endforelse
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- --}}

                                    </div>

                            </div>




                    </div>
                </div>

                {{--all middle content --}}


                {{-- --}}


                {{--all right content --}}
                <div class="col-lg-2">

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
                {{--end all right content --}}
            </div>
    </section>
    <section>
        <div class="container mt-4 mb-4">
            <div class="row g-2 justify-content-center">
                <div class="col-md-12 col-6 col-lg-3 BorderCss">

                    <div class="card" style="width: 100%;border:none">
                        <div class="card-body">
                            <center class="cardCss">
                                <h5 class="card-title"><i class="fa fa-truck fa-2x" style="color:#1a6be8"></i></h5>
                                <p class="card-text"><a href="">DELIVERY <br>ANYWHERE</a></p>
                            </center>

                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-6 col-lg-3 BorderCss">

                    <div class="card" style="width: 100%;border:none">
                        <div class="card-body">
                            <center class="cardCss">
                                <h5 class="card-title"><i class="fa fa-lock fa-2x" style="color:#00a61c"></i></h5>
                                <p class="card-text"><a href=""> PAY CASH <br>ON DELIVERY</a></p>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-6 col-lg-3 BorderCss">

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

                <div class="col-md-12 col-6 col-lg-3 BorderCss">

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
    <footer class="mainfooter" role="contentinfo">
        <div class="py-3 container-fluid" style="background-color:#282828;  font: 10pt/130% Arial;
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
                                        <span style="color: #ff7519;
                                           font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                           font-size: 10pt;">MPINGI
                                            FREE ONLINE CLASSIFIED ADS PLATFORM</span> is a free online
                                        classifieds web and mobile app content management system (CMS) where you can
                                        post
                                        and order new, used and refurbished products online like electronics, cars,
                                        fashion
                                        apparel, collectibles, sporting goods among others as well as services,
                                        jobs, news
                                        and many others around the world, launched in 2017. <span style="color: #ff7519;
                                           font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                           font-size: 10pt;">Read
                                            More</span>
                                    </p>
                                </li>
                                <li>
                                    <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i
                                            class="fa fa-eye"></i>
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
                                    font-size: 12px;"><i class="mt-3 fa fa-map-marker"></i>&nbsp;Geographic Targeting:
                                    Target
                                    your ads by country, province or state, or even as specific as city.
                                </li>
                                <li style="
                                    font-size: 12px;"><i class="mt-3 fa fa-mobile"></i>&nbsp;Platform Targeting: Target
                                    and
                                    serve ads depending on which device users are visiting on.
                                </li>
                                <li style="
                                    font-size: 12px;"><i class="fab fa-google"></i>&nbsp;Your are browsing in
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
                                     font-size: 12px;"><i class="fa fa-dot-circle"></i>&nbsp;<a href="#"
                                        id="footer-faq">
                                        How to create an Account ?</a>
                                </li>
                                <li style="
                                     font-size: 12px;"><i class="fa fa-dot-circle"></i>&nbsp;<a href="#"
                                        id="footer-faq">
                                        How to Sign in</a>
                                </li>
                                <li style="
                                     font-size: 12px;"><i class="fa fa-dot-circle"></i>&nbsp;<a href="#"
                                        id="footer-faq">
                                        How to Post Products</a>
                                </li>
                                <li style="
                                     font-size: 12px;"><i class="fa fa-dot-circle"></i>&nbsp;<a href="#"
                                        id="footer-faq">
                                        How to Order Products</a>
                                </li>
                                <li style="
                                    font-size: 12px;"><i class="fa fa-dot-circle"></i>&nbsp;<a href="#"
                                        id="footer-faq">
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
                                        id="footer-faq">Available on </span> <strong id="footer-faq">App
                                        Store</strong></li>
                                <li><i class="mt-3 fab fa-google-plus fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                        id="footer-faq">Get it on </span> <strong id="footer-faq">Google
                                        play</strong></li>
                                <li><i class="mt-3 fab fa-windows fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                        id="footer-faq">Download with </span> <strong id="footer-faq">Windows
                                        Store</strong>
                                </li>

                                <li style="
                                    font-size: 12px;margin-top:2%"><i class="fa fa-users"></i>&nbsp;<a href="#"
                                        id="footer-faq"> Live
                                        discussions</a>
                                </li>
                                <li style="
                                     font-size: 12px;"><i class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq">
                                        Testimonies</a>
                                </li>
                                {{-- <li style="
                                    font-size: 12px;"><a href="#"
                                        onclick="window.open('https://www.sitelock.com/verify.php?site=mpingimarket.com','SiteLock','width=600,height=600,left=160,top=170');"><img
                                            class="img-fluid" alt="SiteLock" title="SiteLock"
                                            src="https://shield.sitelock.com/shield/mpingimarket.com"></a>
                                </li> --}}
                            </ul>
                            <main>
                                <!-- Social Media Buttons HTML -->
                                <div class="wrapper">
                                  <a href="#" class="icon facebook">
                                    <div class="tooltip">Facebook</div>
                                    <center><span><i class="fab fa-facebook-f"></i></span></center>
                                  </a>
                                  <a href="#" class="icon twitter">
                                    <div class="tooltip">Twitter</div>
                                    <center><span><i class="fab fa-twitter"></i></span></center>
                                  </a>
                                  <a href="#" class="icon instagram">
                                    <div class="tooltip">Instagram</div>
                                    <center><span><i class="fab fa-instagram"></i></span></center>
                                  </a>

                                  <a href="#" class="icon youtube">
                                    <div class="tooltip">Youtube</div>
                                    <center><span><i class="fab fa-youtube"></i></span></center>
                                  </a>
                                </div>
                                <!-- End Social Media Buttons HTML -->
                             </main>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i
                                class="fa fa-send"></i>&nbsp;CONTACT
                            US</h6>
                        <p style="
                                        font-size: 12px;">
                            The Members of the design team at MPINGI always striving to enhance the quality of the
                            website
                            designed by them as a viewer your suggestions are very important to us. They are helping
                            us in
                            continually improving the quality of this website and mobile app. Please you can make
                            use of
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
                                        <textarea rows="3" class="form-control form-control-lg" type="text"
                                            placeholder="Message" aria-label=".form-control-lg example"
                                            id="borderinput2"></textarea>
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

        @include('user.layouts.footer2')
