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
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                            <div class="row">
                                @foreach ($countProductItems as $rowc)
                                <div class="col-11"><i class="fas fa-tags"></i> My Products <span
                                        class="badge_3">{{ $rowc->cnt }}</span>
                                </div>
                                @endforeach
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- alert update profile and business account --}}
                            @include('user.mpingiusers.middlealert.updateaccount')
                            {{--end alert update profile and business account  --}}
                            {{-- --}}
                            <div class="mt-3 row">
                                <div class="mb-2 col-xl-4 col-md-6">
                                    <div class="mb-0 text-white card" style="background-color:#ff7519;color:#ffffff">
                                        <div class="py-4 card-body">
                                            <h3 align="center">1 Free <br>Products </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 col-xl-4 col-md-6">
                                    <div class="mb-0 text-white card" style="background-color:#ffd900;color:#ffffff">
                                        <div class="py-4 card-body">
                                            <h3 align="center">1 Paid <br>Products </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 col-xl-4 col-md-6">
                                    <div class="mb-0 text-white card" style="background-color:#5a88ca;color:#ffffff">
                                        <div class="py-4 card-body">
                                            <h3 align="center">0 Expired <br>Products </h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- --}}


                        </div>

                    </div>

                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                            <div class="row">
                                @foreach ($countProductItems as $rowc)
                                <div class="col-11"><i class="fas fa-tags"></i> My Products (items) <span
                                        class="badge_3">{{ $rowc->cnt }}</span>
                                </div>
                                @endforeach
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                     <div class="card-body">
                      <div class="mt-2 table-data-pitems">
                         <div class="mx-1 row " id="dynamic_products_item">
                            {{-- --}}
                            <div class="row">
                                <div class="col-md-6">

                                    <label>
                                        <select size="1" name="" id="search_page" aria-controls="example">
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
                                            id="search_input">
                                        <span class="input-group-text" id="search_span"><i
                                                class="fa fa-search me-2 text-light"></i> </span>
                                    </div>
                                </div>

                            </div>
                            {{-- --}}

                            {{-- item picture with details --}}

                            <div class="py-4 row">
                                @forelse ($ProductItems as $row)
                                <div class="col-md-7">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="">
                                                <center>
                                                    <div style="border: 1px solid #ccc;height:230px;">
                                                        <p class="mt-2 PClass">

                                                         <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

                                                                <center>
                                                                    <div class="carousel-inner" >
                                                                        @forelse ($fetchImage as $key => $slider)
                                                                       @if($slider->product_item == $row->ProductItem_id)
                                                                          <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                            <img class="card-img-top" src="{{ (!empty($slider->image_name)) ? url('/storage/assets/uploads', $slider->image_name) : url('/storage/assets/images/avatar_nzuzi_default.png')}}" class="img-thumbnail"
                                                                              height="180px">

                                                                          </div>

                                                                         @endif

                                                                          @empty
                                                                          <center><p>No Image Found</p></center>
                                                                          @endforelse
                                                                      </div>
                                                                </center>


                                                          </div>

                                                          @if($row->item_images == 0)
                                                            <a href="{{ route('user.uploadimageProductItem', ['id' => encrypt($row->ProductItem_id) ]) }}" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                                                                    class="fa fa-gift"></i>

                                                                   Add new photo (0)
                                                            </a>
                                                             @else
                                                           <a href="{{ route('user.viewphotos', ['upload_id' => encrypt($row->ImageIDS) ]) }}" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><i
                                                                class="fas fa-image"></i>
                                                                 <?php
                                                                   $countImage = \Illuminate\Support\Facades\DB::table('tbl_imgs')->where('upload_id', $row->ImageIDS)->count();
                                                                  ?>
                                                                    view photo (  {{ $countImage }})

                                                               </a>
                                                             @endif

                                                        </p>

                                                    </div>
                                                </center>

                                            </div>
                                        </div>
                                        <div class="col-md-7">

                                            <div class="card-body">
                                                <h6 class="card-title fw-bold">{{ \Illuminate\Support\Str::title($row->item_name) }}</h6>
                                                <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{ $row->currency }} {{ number_format($row->price) }}
                                                        </span>
                                                    <br><span class="strikeCss" style="font-weight: bold;"><strike> {{ $row->currency }} {{ number_format($row->old_price) }}</strike></span>
                                                </h5>
                                                <span class="d-flex"> <span class="hrefCsslink_x"
                                                        style="font-weight: bold">Color:</span>&nbsp;<span
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
                                                <span class="mb-2 d-flex hrefCsslink_x"><span
                                                        style="font-weight: bold">Product&nbsp;type:</span>&nbsp;
                                                        {{ $row->product_type }}</span>
                                                <span class="mb-2 d-flex hrefCsslink_x"><span
                                                        style="font-weight: bold">Quantity:</span>&nbsp; {{ $row->pieces }}
                                                    </span>
                                                <span class="mb-2 d-flex hrefCsslink_x"><span
                                                        style="font-weight: bold">Views:</span>&nbsp; {{ $row->views }}</span>
                                                <button type="submit"
                                                    class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_x">
                                                    <i class="far fa-money-bill-alt"></i> Available </button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3 card card6">
                                        <div class="card-header"
                                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                                            <div class="row">
                                                <div class="col-11" style="font-size: 13px!important"><i
                                                        class="fas fa-tags"></i> Product Settings
                                                </div>
                                                {{-- <div class="col-1"><i
                                                        class="fa fa-times text-dark close-icon6"></i></div> --}}
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <span class="mb-3 d-flex hrefCsslink_x"><span

                                                    style="font-weight: bold">Posted on:</span>&nbsp; {{ \Carbon\Carbon::parse($row->post_date_of_item)->diffForHumans()  }}</span>

                                            <span class="mb-3 d-flex hrefCsslink_x"><span
                                                    style="font-weight: bold">Expired on:</span>&nbsp;  {{ $row->post_expiry_date }} </span>
                                            <span class="mb-3 d-flex hrefCsslink_x"><span style="font-weight: bold">
                                                    <font color="#f25433">Delete on:</font>
                                                </span>&nbsp; {{ $row->post_delete_date }}</span>
                                            <span class="mb-3 d-flex hrefCsslink_x"><span
                                                    style="font-weight: bold"><span class="badge rounded-pill bg"
                                                        style="background-color: #FE980F;color:#ffffff">{{ today()->diffInDays(\Carbon\Carbon::parse($row->created_at)->toDateString()) - $row->product_duration }}</span></span>&nbsp;
                                                Days Remaining (@if($row->ad_type == 1) Paid Product @else Free Product @endif)</span>

                                            <div class="row g-1">
                                                <div class="col-4">
                                                    <a href="{{ route('user.viewdetails', ['upload_id' => encrypt($row->ImageIDS) ]) }}" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="button"
                                                        class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx1">
                                                        <i class="fas fa-search"></i> View </button></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="{{ route('user.editproductitem', ['upload_id' => encrypt($row->ImageIDS)])}}" class="hrefCss_xx" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif"><button type="submit"
                                                        class="mt-2 btn btn-outline btn-lg w-100 DetailsBtns2_xx2">
                                                        <i class="far fa-edit"></i> Edit </button></a>
                                                </div>
                                                <div class="col-4">
                                                  <button type="button" style="font-weight: bold;font: 10pt/130% Helvetica, Arial, sans-serif" data-del="{{ encrypt($row->ImageIDS) }}"
                                                        class="mt-2 btn-deleteproductitem btn btn-outline btn-lg w-100 DetailsBtns2_xx3">
                                                        <i class="fa fa-times"></i> Delete </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @empty

                            <center><p class="alert alert-warning">No Record Found</p></center>

                             @endforelse
                          </div>
                         </div>
                         <div class="col-md-12">
                            {{ $ProductItems->links('pagination.custom')}}
                         </div>
                       </div>
                            {{-- Next Product --}}

                            {{--end item picture with details --}}


                        </div>

                    </div>

                </div>
                {{--end all middle content --}}


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
