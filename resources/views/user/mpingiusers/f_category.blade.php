@include('user.layouts.header')

<body class="flexcroll">
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

                {{-- all left content --}}
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

                                @foreach ($fetchallCategories as $row)
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" id="headingOne" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ $row->category_name_desc }}">
                                            <form id="form" action="{{ route('user.postoptionfunction') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ encrypt($row->id) }}">
                                          <button type="button" onclick="submit()"  class="accordion-button collapsed button" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $row->id }}"
                                                aria-expanded="true" aria-controls="collapseOne">
                                              <img
                                                        src="{{ '/storage/assets/images/' . $row->category_image }}"
                                                        height="20px" width="25px" class="img_icons"
                                                        alt="Nzuzi">&nbsp;<span
                                                        class="hoversidemenu">{{ $row->category_name_en }}</span>&nbsp;
                                                    <span class="badge bg-light">
                                                        <span class="badge_3">0</span></span>

                                            </button>
                                            </form>
                                        </h6>
                                        {{-- <div id="collapseOne{{ $row->id }}" class="accordion-collapse collapse animate slideIn"
                                          aria-labelledby="headingOne" data-bs-parent="#accordionPlusMinus">
                                           <div class="accordion-body">
                                            @foreach ($fetchallCategoriesIDs as $row)
                                                <p class="">
                                                    <a href="#" class="link-secondary sidemenu_a">
                                                        <img src="{{ '/storage/assets/icons_2/' . $row->sub_category_image }}" alt="" width="30"
                                                            height="30" class="img_icons_4">
                                                            {{ $row->sub_category_name_en }}
                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                class="badge_2">0</span></span>
                                                    </a>
                                                </p>
                                            @endforeach
                                          </div>
                                       </div> --}}
                                    </div>
                                @endforeach
                         </div>


                                {{-- next panel --}}

                                <div class="card card2">
                                    <div class="card-header"
                                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <a href="#" style="color:#FF7519; font-weight:bold;"
                                                    id="global-href">
                                                    Countries
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <i class="fa-solid fa-earth-africa"></i>
                                                <a href="#" style="color:#FF7519; font-weight:bold;"
                                                    id="global-href">
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
                                                    <img src="{{ asset('assets/icons/CA.png') }}" alt=""
                                                        width="30" height="20" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Canada&nbsp;20" id="imgBorder">

                                                </a>
                                            </div>

                                            <div class="col-4">
                                                <a href="#">
                                                    <img src="{{ asset('assets/icons/CD.png') }}" alt=""
                                                        width="30" height="20" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Democratic Republic of the Congo&nbsp;15" id="imgBorder">

                                                </a>
                                            </div>

                                            <div class="col-4">
                                                <a href="#">
                                                    <img src="{{ asset('assets/icons/RW.png') }}" alt=""
                                                        width="30" height="20" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Rwanda&nbsp;2" id="imgBorder">

                                                </a>
                                            </div>

                                            <div class="mb-3 col-4">
                                                <a href="#">
                                                    <img src="{{ asset('assets/icons/UG.png') }}" alt=""
                                                        width="30" height="20" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Uganda&nbsp;12"
                                                        id="imgBorder">

                                                </a>
                                            </div>

                                            <div class="mb-3 col-4">
                                                <a href="#">
                                                    <img src="{{ asset('assets/icons/US.png') }}" alt=""
                                                        width="30" height="20" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="United State&nbsp;1"
                                                        id="imgBorder">

                                                </a>
                                            </div>

                                            <div class="card">
                                                <div class="mt-2 card-body">
                                                    <p id="cardsearch" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
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
                                        <i class="fa fa-gift"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
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
                                        <i class="fa fa-home"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
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

                                        <i class="fa fa-cogs"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
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
                                        <i class="fa fa-home"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Real Estate
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-moon"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
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
                                        <i class="fa fa-cogs"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Available Jobs
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>

                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-file"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
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
                {{-- end all left content --}}

                {{-- all middle content  --}}
                <div class="mb-4 col-lg-8 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FFF;font-weight:bold">
                            <div class="row">
                                @foreach ($CategoriesID as $row)

                                    <div class="col-11">
                                        <img  src="{{ '/storage/assets/images/' . $row->category_image }}" height="20"
                                        width="25" class="img_icons">
                                    {{ $row->category_name_desc }}

                                </div>
                                @endforeach
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                    <div class="card-body">

                        <div class="row g-1">
                            <div class="col-md-12">

                                {{-- Apparel --}}

                                    <div class=""
                                            style="background-color:#fbeed5;color:#8a6d3b;border-radius:6px;border-color:1px solid #fbeed5">
                                            <div class="mt-3 row">
                                                <div class="col-11"></div>
                                                <div class="col-1">
                                                    <i class="fa fa-times close-icon11 cssIcon"></i>
                                                </div>
                                            </div>
                                            <p class="mx-3 mt-2"
                                                style="background-color:#fcf8e3;color:8a6d3b;font: 10pt/130% Helvetica, Arial, sans-serif;padding-left:3%;padding-right:3%;padding-top:3%;padding-bottom:3%"
                                                align="center">
                                                We appreciate your initiative to post Products on MPINGI
                                                FREE ONLINE CLASSIFIED ADS PLATFORM select a correct and
                                                relevant category to post your products. If a products is
                                                posted in a wrong category it will not be published and our
                                                MPINGI PLATFORM team will delete it immediately. Please note
                                                that every products posted at our website is reviewed and
                                                approved by the MPINGI FREE ONLINE CLASSIFIED ADS PLATFORM
                                                team.
                                            </p>

                                           <div class="mx-2 mb-3 row">
                                             <div class="mt-2 col-md-4">
                                                <p style="background-color:#fbeed5; margin-top:10px; margin-right:20px;margin-bottom:2%"><a href="{{ route('user.postoptions') }}" style="text-decoration:none;background-color:#fbeed5;color:#8a6d3b"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;Back</a></p>
                                             </div>
                                             <div class="col-md-8">
                                                <p style="background-color:#fbeed5; margin-top:10px; margin-right:20px;margin-bottom:2%"
                                                >
                                                <font color="#8a6d3b" class="py-2"><i
                                                        class="fa fa-tags fa-2x"
                                                        style="font-size:1.9rem"></i> <b>Order Step <font
                                                            color="#FF7519"><b>1</b></font></b> <b>of 2</b>
                                                </font>
                                            </p>
                                             </div>
                                           </div>


                                        </div>



                                  {{--  --}}
                                  <div class="row forcard">

                                    @foreach ($fetchallSubCategories as  $data)
                                    <div class="mb-3 col-md-6">
                                         <div class="card card_3">
                                                <div class="card-body">
                                                   <h1 class="h1Css">
                                                       <img class="imgCss"
                                                           src="{{ '/storage/assets/icons_2/' . $data->sub_category_image }}"
                                                           alt="" width="80" height="80"
                                                           class="img_icons_3 zoomIn animated">

                                                           <span></span>  {{ $data->sub_category_name_en }}
                                                           @foreach ($allcountsql as $r)
                                                                @if($r->sub_category_id == $data->id)
                                                                    @if($r->article_countall == 0)
                                                                        [0]
                                                                    @else
                                                                        [{{ $r->article_countall }}]
                                                                    @endif
                                                                @endif
                                                           @endforeach
                                                    </h1>
                                                   @foreach ($fetchAllArticles as $rows)

                                                     @if($rows->sub_category_id == $data->id)

                                                     <div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ $rows->article_name_en }}">
                                                        <span><span class="TextCss accordion"  style="margin-left:10%;"> {{ $rows->article_name_en }}</span>
                                                         &nbsp;
                                                         <span class="badge bg-light text-dark">
                                                            @foreach ($allcountarticle as $ar)
                                                               @if($ar->article_id == $rows->id)
                                                                    @if($ar->articlesub_count == 0)
                                                                      <span class="badge rounded-pill bg-light text-dark"><span
                                                                        style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                                    @else
                                                                      <span class="badge_3">{{ $ar->articlesub_count }}</span>
                                                                    @endif
                                                                @endif

                                                             @endforeach
                                                            </span>
                                                              <b
                                                             class="hoverClass accordion" style="float: right">+</b></span>

                                                        <div class="panelx">
                                                         <div class="animate slideIn">
                                                            @php
                                                            $sql = \Illuminate\Support\Facades\DB::table('tbl_sub_products')->where('article_id', $rows->id)->get();
                                                         @endphp
                                                          @foreach ($sql as $rowss)

                                                         <p class=""
                                                             style="margin-left:15%; margin-bottom: 2px;  background-color:#FFF; background-image:none; border:none;font: 18pt/130% Helvetica, Arial, sans-serif;">

                                                             {{-- @foreach ($fetchallProductID as $p) @endforeach --}}
                                                             <a href="{{ route('user.subproductid',['id'=> encrypt($rowss->id),'subcategory_id'=> encrypt($data->id),'article_id'=> encrypt($rows->id),'category_id'=> encrypt($row->id) ,'user_id'=> $user_id]) }}" class="link-secondary sidemenu_a2">
                                                                 <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                     alt="" width="30" height="30" class="text_x">
                                                                 {{ $rowss->sub_product_name_en }}
                                                                 @php
                                                                    $countsql = \Illuminate\Support\Facades\DB::table('tbl_product_items')
                                                                    ->select('product_type',DB::raw('COUNT(article_id) AS article_count, article_id'))
                                                                    ->where(['tbl_product_items.user_id' => Auth::user()->id, 'tbl_product_items.article_id' => $rows->id])
                                                                    ->distinct()
                                                                    ->groupBy('product_type')
                                                                    ->orderBy(DB::raw('COUNT(product_type)'), 'DESC')
                                                                    ->get();
                                                                 @endphp
                                                               @foreach($countsql as $c)
                                                                   @if($c->product_type == $rowss->sub_product_name_en)
                                                                      @if($c->article_count == 0)
                                                                        <span class="badge rounded-pill bg-light text-dark"><span
                                                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                                                        @else
                                                                            <span class="badge_3">{{ $c->article_count }}</span>
                                                                        @endif
                                                                    @endif
                                                                 @endforeach
                                                             </a>

                                                         </p>
                                                         @endforeach

                                                         </div>
                                                     </div>
                                                 </div>
                                                    @endif
                                                 @endforeach
                                               </div>

                                               <div class="mx-3 mb-3 card">
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
                                    @endforeach
                               </div>

                               <div class="row forcard" id="outputSubcategory"></div>

                                {{--  --}}
                                </div>
                                      {{-- <div class="col-1">
                                            <div class="col-1"><i class="fa fa-times close-icon8"></i></div>
                                        </div> --}}
                                    </div>
                                    {{-- --}}


                                </div>
                            </div>

                            {{-- end Fashion Accessories --}}





                </div>

                {{-- all middle content  --}}

                {{-- all right content --}}
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
                {{-- end all right content --}}
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
                                        classifieds web and mobile app content management system (CMS) where you can
                                        post
                                        and order new, used and refurbished products online like electronics, cars,
                                        fashion
                                        apparel, collectibles, sporting goods among others as well as services,
                                        jobs, news
                                        and many others around the world, launched in 2017. <span
                                            style="color: #ff7519;
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
                                    font-size: 12px;"><i
                                        class="mt-3 fa fa-map-marker"></i>&nbsp;Geographic Targeting:
                                    Target
                                    your ads by country, province or state, or even as specific as city.
                                </li>
                                <li style="
                                    font-size: 12px;"><i
                                        class="mt-3 fa fa-mobile"></i>&nbsp;Platform Targeting: Target
                                    and
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
                                     font-size: 12px;">Our support team is
                                    available via
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
                                    font-size: 12px;margin-top:2%"><i
                                        class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq"> Live
                                        discussions</a>
                                </li>
                                <li style="
                                     font-size: 12px;"><i
                                        class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq">
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
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder="E-mail" aria-label=".form-control-lg example"
                                            id="borderinput2">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder="Subject" aria-label=".form-control-lg example"
                                            id="borderinput2">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="3" class="form-control form-control-lg" type="text" placeholder="Message"
                                            aria-label=".form-control-lg example" id="borderinput2"></textarea>
                                    </div>
                                    <div class="form-group" style="margin-bottom:10%">
                                        <button type="button"
                                            class="float-end btn btn-outline-warning btn-lg btnColor"
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
