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
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $row->id }}"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                <a href="{{ route('user.postoptionfunctionid',['id'=> encrypt($row->id)]) }}" class="hrefCss3_"><img
                                                        src="{{ '/storage/assets/images/' . $row->category_image }}"
                                                        height="20px" width="25px" class="img_icons"
                                                        alt="Nzuzi">&nbsp;<span
                                                        class="hoversidemenu">{{ $row->category_name_en }}</span>&nbsp;
                                                    <span class="badge bg-light">
                                                        <span class="badge_3">0</span></span>
                                                </a>
                                            </button>
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
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">

                                     @foreach ($CategoriesIDs as $row)
                                       <div class="col-11"><img src="{{ '/storage/assets/images/' . $row->category_image }}" height="20"
                                        width="25" class="img_icons">
                                       <span style=""></span><a href="{{ route('user.postoptionfunctionid',['id'=> encrypt($row->id)]) }}" class="hrefCss3s" style="color:#FFF">{{$row->category_name_desc}}  </a>
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
                                                Please make sure product content such as location, product name, quantity, brand, condition, color, price, and description are relevant to the category. We do not tolerate spam or scams; each product is reviewed and approved by MPINGI PLATFORM team. To have effective response from our buyers, write a comprehensive product name and description.
                                            </p>
                                            {{-- <//?php echo date("l,F d, Y"); ?> --}}
                                            <div class="mx-2 mb-3 row">
                                                <div class="mt-2 col-md-4">
                                                   <p style="background-color:#fbeed5; margin-top:10px; margin-right:20px;margin-bottom:2%"><a href="{{ route('user.postoptionfunctionid',['id'=> encrypt($row->id)]) }}" style="text-decoration:none;background-color:#fbeed5;color:#8a6d3b"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;Back</a></p>
                                                </div>
                                                <div class="col-md-8">
                                                   <p style="background-color:#fbeed5; margin-top:10px; margin-right:20px;margin-bottom:2%"
                                                   >
                                                   <font color="#8a6d3b" class="py-2"><i
                                                           class="fa fa-tags fa-2x"
                                                           style="font-size:1.9rem"></i> <b>Order Step <font
                                                               color="#FF7519"><b>2</b></font></b> <b>of 2</b>
                                                   </font>
                                               </p>
                                                </div>
                                              </div>
                                            {{-- <p style="background-color:#fbeed5; margin-top:10px; margin-right:20px;margin-bottom:2%"
                                                align="center">
                                                <font color="#8a6d3b" class="py-2"><i
                                                        class="fa fa-tags fa-2x"
                                                        style="font-size:1.9rem"></i> <b>Order Step <font
                                                            color="#FF7519"><b>2</b></font></b> <b>of 2</b>
                                                </font>
                                            </p> --}}
                                        </div>
                                  {{--  --}}

                                  <div class="mt-3 row">
                                    <p style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#FF7519;font-weight:bold">1- General Information&nbsp;<i class=" fas fa-map-marker-alt" style="font-size:1.3rem;"></i></p>
                                    <hr>
                                    <p class="mt-3"  style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">1.1- Set location information (country, state and city where product will be displayed)</p>
                                    @if(session()->has('success'))
                                    <div class="alert alert-success mgs-errors" role="alert">
                                       {{ session()->get('success') }}
                                    </div>
                                   @endif
                                    <form id="form-id">
                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                @foreach ($getbusinessdata as $data)
                                                <div class="row g-1">

                                                    <div class="col-4">
                                                        <font color="red">*</font>
                                                         <select class="form-select form-selects place_of_origin" name="place_of_origin" value="{{ $data->countryname }}" aria-label="Default select example" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">
                                                            <option value="{{ $data->country }}">{{ $data->countryname }}</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <strong id="place_of_origin-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
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
                                                        <select class="form-select form-selects state_id" name="state_id" value="{{ $data->statename }}" aria-label="Default select example" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
                                                            <option value="{{ $data->country_id }}">{{ $data->statename }}</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <strong id="state_id-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                                         </span>
                                                    </div>

                                                </div>
                                                @endforeach
                                            </div>
                                        </div>


                                        <div class="col-md-2">

                                        </div>

                                    </div>


                                </div>


                                <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">1.2- Set product website reference (Check the radio Box to leave the name or link of the website empty)</p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="d-flex">
                                                <div class="flex-1 mt-2"> <label>
                                                        <font color="red">*</font> <span
                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none"> No Website Name
                                                        </span>
                                                    </label>&nbsp;</div>
                                                <div class="flex-1 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkWebsiteName">
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="text" class="form-control product_web_name" id="sitename" name="product_web_name"
                                                placeholder="">
                                           <span class="text-danger">
                                             <strong id="product_web_name-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="d-flex">
                                                <div class="flex-1 mt-2"> <label>
                                                        <font color="red">*</font> <span
                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none"> No Website Link
                                                        </span>
                                                    </label>&nbsp;</div>
                                                <div class="flex-1 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkWebsiteLink">
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="text" class="form-control product_web_link" id="sitelink" name="product_web_link"
                                                placeholder="ex: https://mpingimarket.com">
                                            <span class="text-danger">
                                                <strong id="product_web_link-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                        </div>
                                    </div>
                                </div>


                                <p class="mt-4" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#FF7519;font-weight:bold">2- Product Details &nbsp;<i class=" fas fa-tags" style="font-size:1.3rem;"></i></p>
                                <hr>

                                <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">2.1- Main Details</p>

                                <div class="row">
                                    <div class="mt-0 col-md-6">
                                        <label style="color:#fff">x</label>
                                        <div class="form-group">
                                            <font color="red">*</font> <input type="text" class="form-control item_name" name="item_name" placeholder="Product Name">
                                        </div>
                                        <span class="text-danger">
                                            <strong id="item_name-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                          </span>
                                    </div>

                                    <div class="mt-0 col-md-6">
                                        <label style="color:#ccc">Select other if the brand does not exist</label>
                                        <div class="form-group">
                                            <font color="red">*</font>
                                            <select class="form-select form-selects brand_name" aria-label="Default select example" name="brand_name" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
                                                <option value="" selected="true" disabled="disabled">
                                                    <font color="color:#666;">&larr;Select Product Brand&rarr;</font>
                                                </option>
                                                 <option value="Other">Other</option>
                                            </select>
                                            <span class="text-danger">
                                                <strong id="brand_name-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="mt-1 col-md-6">
                                        <div class="form-group">
                                            <font color="red">*</font>
                                             <input type="text" name="pieces" class="form-control pieces" placeholder="Quantity">
                                        </div>
                                        <span class="text-danger">
                                            <strong id="pieces-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                          </span>
                                    </div>

                                    <div class="mt-1 col-md-6">
                                        <div class="form-group">
                                            <font color="red">*</font>
                                             <select class="form-select form-selects types" name="types" aria-label="Default select example"  style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
                                                <option value="" selected="true" disabled="disabled">
                                                    <font color="color:#9f9f;">&larr; Select Product Condition &rarr;</font>
                                                </option>
                                                <option value="New">New</option>
                                                <option value="Used">Used</option>
                                                <option value="Refurbished">Refurbished </option>
                                            </select>
                                            <span class="text-danger">
                                                <strong id="types-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                        </div>
                                    </div>

                                </div>

                                <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold"> 2.2- Product Duration (in Day)</p>
                                  @foreach ($productduration as $row)
                                     <span style="font-weight: bold"><span class="badge rounded-pill bg" style="background-color: #FE980F;color:#ffffff">{{ $row->product_duration }}</span> <font style="font: 10pt/130% Helvetica, Arial, sans-serif; color:#666">Days</font> </span>
                                 @endforeach
                                <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold"> 2.3-  Select Product color (Click on textbox)
                                    <img src="{{asset('assets/images/red.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/pink.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/orange.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/yellow.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/purple.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/green.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/blue.png') }}" alt="" width="" height="">
                                    <img src="{{asset('assets/images/brown.png') }}" alt="" width="" height="">
                                 </p>

                                 <div class="mt-3 row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="color" class="form-control product_color" placeholder="" name="product_color" style="height: 40px;">
                                        </div>
                                        <span class="text-danger">
                                            <strong id="product_color-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                          </span>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                 </div>

                                 <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">2.4- Set Product Price</p>


                                 <div class="mt-3 card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">

                                    <p class="" style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <i class="fas fa-check-square" style="font-size:1.3rem;"></i> Check the radio Box to leave the Old Price empty
                                    </p>

                                </div>

                                <div class="mt-3 row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-5">
                                        <div id="circle-radio" >
                                            <input class="circle-nicelabel" id="checktoggle" data-nicelabel='{"position_class": "circle-checkbox"}' id="inner"  type="checkbox" />
                                           <br>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="mt-3 row g-1">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input negotiable" id="on" value="Negotiable" name="negotiable"  type="radio" >
                                            <label class="" for="flexRadioDefault1">
                                                Negotiable Price
                                            </label>
                                          </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input negotiable"  id="off" value="No Negotiable" name="negotiable" type="radio">
                                            <label class="" for="flexRadioDefault1">
                                                No Negotiable Price
                                            </label>
                                          </div>

                                    </div>
                                    <span class="text-danger">
                                        <strong id="negotiable-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                      </span>
                                   </div>


                                  <div class="row">
                                    <div class="mt-3 col-md-6">
                                        <div class="form-group">
                                            <font color="red">*</font> <span
                                                style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                New Price
                                            </span>
                                            <div class="form-group">
                                                <input type="text" class="form-control price" name="price" placeholder="ex:63500" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            </div>
                                            <span class="text-danger">
                                                <strong id="price-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-6">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <div class="flex-1"> <label>
                                                        <font color="red">*</font> <span
                                                            style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                            No Old Price
                                                        </span>
                                                    </label>&nbsp;</div>
                                                <div class="flex-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="checkOldprice">
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="text" class="form-control oldprice" id="oldprice" placeholder=""  name="old_price" placeholder="ex:63500" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            <span class="text-danger">
                                                <strong id="oldprice-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-2 col-md-6">
                                        <div class="form-group">
                                         <span
                                                style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#fff;font-weight:bold;pointer-events: none">
                                                X
                                            </span>

                                        </div>
                                    </div>
                                    <div class="mt-3 col-md-3">
                                        <div class="form-group">
                                            <div class="flex-1"> <label>
                                                    <font color="red">*</font> <span
                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                        Select Currency
                                                    </span>
                                                </label>&nbsp;</div>
                                             <select class="form-select form-selects currency"
                                                aria-label="Default select example" name="currency" id="currency"
                                                style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;">
                                                <option value="" selected="true" disabled="disabled">
                                                    <font color="color:#9f9f;">&larr; Select Currency &rarr;</font>
                                                </option>
                                                <option value="UGX">UGX (USh)</option>
                                                <option value="AED">AED ()</option>
                                                <option value="AFN">AFN (؋)</option>
                                                <option value="ALL">ALL (Lek)</option>
                                                <option value="AMD">AMD ()</option>
                                                <option value="ANG">ANG (ƒ)</option>
                                                <option value="AOA">AOA (Kz)</option>
                                                <option value="ARS">ARS ($)</option>
                                                <option value="AUD">AUD ($)</option>
                                                <option value="AWG">AWG (ƒ)</option>
                                                <option value="AZN">AZN (ман)</option>
                                                <option value="BAM">BAM (KM)</option>
                                                <option value="BBD">BBD ($)</option>
                                                <option value="BDT">BDT ()</option>
                                                <option value="BGN">BGN (лв)</option>
                                                <option value="BHD">BHD ()</option>
                                                <option value="BIF">BIF (FBu)</option>
                                                <option value="BMD">BMD ($)</option>
                                                <option value="BND">BND ($)</option>
                                                <option value="BOB">BOB ($b)</option>
                                                <option value="BRL">BRL (R$)</option>
                                                <option value="BSD">BSD ($)</option>
                                                <option value="BTN">BTN ()</option>
                                                <option value="BWP">BWP (P)</option>
                                                <option value="BYR">BYR (p.)</option>
                                                <option value="BZD">BZD (BZ$)</option>
                                                <option value="CAD">CAD ($)</option>
                                                <option value="CDF">CDF (CDF)</option>
                                                <option value="CHF">CHF (CHF)</option>
                                                <option value="CLP">CLP ($)</option>
                                                <option value="CNY">CNY (¥)</option>
                                                <option value="COP">COP ($)</option>
                                                <option value="CRC">CRC (₡)</option>
                                                <option value="CUP">CUP (₱)</option>
                                                <option value="CVE">CVE ()</option>
                                                <option value="CYP">CYP ()</option>
                                                <option value="CZK">CZK (Kč)</option>
                                                <option value="DJF">DJF ()</option>
                                                <option value="DKK">DKK (kr)</option>
                                                <option value="DOP">DOP (RD$)</option>
                                                <option value="DZD">DZD (دج)</option>
                                                <option value="EEK">EEK (kr)</option>
                                                <option value="EGP">EGP (£)</option>
                                                <option value="ERN">ERN (Nfk)</option>
                                                <option value="ETB">ETB (ETB)</option>
                                                <option value="EUR">EUR (€)</option>
                                                <option value="FJD">FJD ($)</option>
                                                <option value="FKP">FKP (£)</option>
                                                <option value="GBP">GBP (£)</option>
                                                <option value="GEL">GEL ()</option>
                                                <option value="GHC">GHC (¢)</option>
                                                <option value="GIP">GIP (£)</option>
                                                <option value="GMD">GMD (D)</option>
                                                <option value="GNF">GNF ()</option>
                                                <option value="GTQ">GTQ (Q)</option>
                                                <option value="GYD">GYD ($)</option>
                                                <option value="HKD">HKD ($)</option>
                                                <option value="HNL">HNL (L)</option>
                                                <option value="HRK">HRK (kn)</option>
                                                <option value="HTG">HTG (G)</option>
                                                <option value="HUF">HUF (Ft)</option>
                                                <option value="IDR">IDR (Rp)</option>
                                                <option value="ILS">ILS (₪)</option>
                                                <option value="INR">INR (₹)</option>
                                                <option value="IQD">IQD ()</option>
                                                <option value="IRR">IRR (﷼)</option>
                                                <option value="ISK">ISK (kr)</option>
                                                <option value="JMD">JMD ($)</option>
                                                <option value="JOD">JOD ()</option>
                                                <option value="JPY">JPY (¥)</option>
                                                <option value="KES">KES ()</option>
                                                <option value="KGS">KGS (лв)</option>
                                                <option value="KHR">KHR (៛)</option>
                                                <option value="KMF">KMF ()</option>
                                                <option value="KPW">KPW (₩)</option>
                                                <option value="KRW">KRW (₩)</option>
                                                <option value="KWD">KWD ()</option>
                                                <option value="KYD">KYD ($)</option>
                                                <option value="KZT">KZT (лв)</option>
                                                <option value="LAK">LAK (₭)</option>
                                                <option value="LBP">LBP (£)</option>
                                                <option value="LKR">LKR (₨)</option>
                                                <option value="LRD">LRD ($)</option>
                                                <option value="LSL">LSL (L)</option>
                                                <option value="LTL">LTL (Lt)</option>
                                                <option value="LVL">LVL (Ls)</option>
                                                <option value="LYD">LYD ()</option>
                                                <option value="MAD">MAD ()</option>
                                                <option value="MDL">MDL ()</option>
                                                <option value="MGA">MGA ()</option>
                                                <option value="MKD">MKD (ден)</option>
                                                <option value="MMK">MMK (K)</option>
                                                <option value="MNT">MNT (₮)</option>
                                                <option value="MOP">MOP (MOP)</option>
                                                <option value="MRO">MRO (UM)</option>
                                                <option value="MTL">MTL ()</option>
                                                <option value="MUR">MUR (₨)</option>
                                                <option value="MVR">MVR (Rf)</option>
                                                <option value="MWK">MWK (MK)</option>
                                                <option value="MXN">MXN ($)</option>
                                                <option value="MYR">MYR (RM)</option>
                                                <option value="MZN">MZN (MT)</option>
                                                <option value="NAD">NAD ($)</option>
                                                <option value="NGN">NGN (₦)</option>
                                                <option value="NIO">NIO (C$)</option>
                                                <option value="NOK">NOK (kr)</option>
                                                <option value="NPR">NPR (₨)</option>
                                                <option value="NZD">NZD ($)</option>
                                                <option value="OMR">OMR (﷼)</option>
                                                <option value="PAB">PAB (B/.)</option>
                                                <option value="PEN">PEN (S/.)</option>
                                                <option value="PGK">PGK ()</option>
                                                <option value="PHP">PHP (Php)</option>
                                                <option value="PKR">PKR (₨)</option>
                                                <option value="PLN">PLN (zł)</option>
                                                <option value="PYG">PYG (Gs)</option>
                                                <option value="QAR">QAR (﷼)</option>
                                                <option value="RON">RON (lei)</option>
                                                <option value="RSD">RSD (Дин)</option>
                                                <option value="RUB">RUB (руб)</option>
                                                <option value="RWF">RWF ()</option>
                                                <option value="SAR">SAR (﷼)</option>
                                                <option value="SBD">SBD ($)</option>
                                                <option value="SCR">SCR (₨)</option>
                                                <option value="SDD">SDD ()</option>
                                                <option value="SEK">SEK (kr)</option>
                                                <option value="SGD">SGD ($)</option>
                                                <option value="SHP">SHP (£)</option>
                                                <option value="SKK">SKK (Sk)</option>
                                                <option value="SLL">SLL (Le)</option>
                                                <option value="SOS">SOS (S)</option>
                                                <option value="SRD">SRD ($)</option>
                                                <option value="STD">STD (Db)</option>
                                                <option value="SVC">SVC ($)</option>
                                                <option value="SYP">SYP (£)</option>
                                                <option value="SZL">SZL ()</option>
                                                <option value="THB">THB (฿)</option>
                                                <option value="TJS">TJS ()</option>
                                                <option value="TMM">TMM (m)</option>
                                                <option value="TND">TND ()</option>
                                                <option value="TOP">TOP (T$)</option>
                                                <option value="TRY">TRY (YTL)</option>
                                                <option value="TTD">TTD (TT$)</option>
                                                <option value="TWD">TWD (NT$)</option>
                                                <option value="TZS">TZS ()</option>
                                                <option value="UAH">UAH (₴)</option>
                                                <option value="UGX">UGX (USh)</option>
                                                <option value="USD">USD ($)</option>
                                                <option value="UYU">UYU ($U)</option>
                                                <option value="UZS">UZS (лв)</option>
                                                <option value="VEF">VEF (Bs)</option>
                                                <option value="VND">VND (₫)</option>
                                                <option value="VUV">VUV (Vt)</option>
                                                <option value="WST">WST (WS$)</option>
                                                <option value="XAF">XAF (FCF)</option>
                                                <option value="XAF">XAF (CFA)</option>
                                                <option value="XCD">XCD ($)</option>
                                                <option value="XOF">XOF ()</option>
                                                <option value="XOF">XOF (CFA)</option>
                                                <option value="XPF">XPF (CFP)</option>
                                                <option value="XPF">XPF ()</option>
                                                <option value="YER">YER (﷼)</option>
                                                <option value="ZAR">ZAR (R)</option>
                                                <option value="ZMK">ZMK (ZK)</option>
                                                <option value="ZWD">ZWD (Z$)</option>
                                            </select>
                                            <span class="text-danger">
                                                <strong id="currency-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                        </div>
                                    </div>
                                </div>


                                <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">2.5- Product Description</p>


                                <div class="mt-3 card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">

                                   <p class="" style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                      Enter more details about your Product so buyers can learn more about your post
                                       Descriptions (Maximum 500 characters)</p>

                               </div>

                               <div class="row">
                                 <div class="mt-2 col-md-12">
                                    <div class="form-group">
                                            <textarea type="text" rows="5" name="item_descriptions" oninput="limitChar(this)" id="tArea" name="message"
                                            maxlength="500" autofocus class="form-control item_descriptions" placeholder=""></textarea>
                                    </div>

                                        <p class="mt-2" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none" align="center" id="charCounter_"> Characters remaining: <span
                                            id="charCounter1">500</span> / 500</p>
                                            <span class="text-danger">
                                                <strong id="item_descriptions-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                              </span>
                                </div>

                               </div>

                               <p class="mt-4" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#FF7519;font-weight:bold">3- Shipping and payment details  &nbsp;<i class=" fa fa-truck" style="font-size:1.3rem;"></i> & <i class="far fa-money-bill-alt" style="font-size:1.3rem;"></i></p>
                               <hr>

                               <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">3.1- Payment Details</p>

                               <div class="mt -3 form-check">
                                <input class="form-check-input payment" type="radio" name="payment" value="Pay on delivery or pickup" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Pay on delivery or pickup
                                </label>
                              </div>
                               <span class="text-danger">
                                 <strong id="payment-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                              </span>

                               <p class="mt-2" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">3.2- Shipping Details</p>

                               <div class="mt-2 card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">

                                <p class="" style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <i class="fas fa-check-square" style="font-size:1.3rem;"></i> Check the radio Box to leave the Old Price empty
                                </p>

                            </div>


                            <div class="row">
                                <div class="mt-3 col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex">
                                            <div class="flex-1"> <label>
                                                    <font color="red">*</font> <span
                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                        No Weight (Kg)
                                                    </span>
                                                </label>&nbsp;</div>
                                            <div class="flex-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkNoWeight">
                                                </div>
                                            </div>
                                        </div>


                                        <input type="text" class="form-control weight" id="NoWeight" name="weight" placeholder="">
                                        <span class="text-danger">
                                            <strong id="weight-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                          </span>
                                      </div>
                                </div>

                                <div class="mt-3 col-md-6">
                                    <div class="form-group">
                                        <div class="d-flex">
                                            <div class="flex-1"> <label>
                                                    <font color="red">*</font> <span
                                                        style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold;pointer-events: none">
                                                        No Volume (m3)
                                                    </span>
                                                </label>&nbsp;</div>
                                            <div class="flex-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkNoVolume">
                                                </div>
                                            </div>
                                        </div>


                                        <input type="text" class="form-control volume" id="NoVolume" name="volume" placeholder="">
                                        <span class="text-danger">
                                            <strong id="volume-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                                          </span>
                                    </div>
                                </div>
                            </div>



                            <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">3.3- Shipping Options</p>

                          <div class="row g-1">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input shipping" type="radio" name="shipping" id="adjustableHeight1"  onclick="adjustableHeightCheck1()" value="Free" >
                                    <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Free Shipping
                                     </label>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input shipping" type="radio" name="shipping" id="adjustableHeight2"  onclick="adjustableHeightCheck2()" value="Home" >
                                    <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Home or Office Delivery
                                     </label>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-1"  id="max-height"  style="display: none;"><input type="text" class="shipping_price" id="inputtext" name="shipping_price" value="0" width="10px"></div>&nbsp;<div class="flex-1"><div class="mt-2" id="max-height1" style="display: none;" style=";color:#ff7519;border:none;font: 10pt/130% Helvetica, Arial, sans-serif;cursor: none;"><span id="textchange"></div></div>
                                    </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input shipping" type="radio" name="shipping" value="Pickup from Shop" id="adjustableHeight3"  onclick="adjustableHeightCheck3()">
                                    <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Pickup from Shop
                                     </label>
                                    </div>
                            </div>

                            <span class="text-danger">
                                <strong id="shipping-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                              </span>

                          </div>


                            <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">3.4- Delivery Days</p>

                            <div class="mt -3 form-check">
                             <input class="form-check-input delivery" type="radio" name="delivery" value="3 to 7" id="flexRadioDefault1">
                             <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                Delivery Days within 3 to 7 Days
                              </label>
                             </div>

                             <div class="mt -3 form-check">
                                <input class="form-check-input delivery" type="radio" name="delivery" value="7 to 14" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Delivery Days within 7 to 14 Days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input delivery" type="radio" name="delivery" value="14 to 21" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Delivery Days within 14 to 21 Days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input delivery" type="radio" name="delivery" value="21 to 30" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Delivery Days within 21 to 30 Days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input delivery" type="radio" name="delivery" value="30" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Delivery Days within 30 Days
                                 </label>
                             </div>
                             <span class="text-danger">
                                <strong id="delivery-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                              </span>


                             <p class="mt-4" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#FF7519;font-weight:bold">4- Return Policy  &nbsp;<i class="fas fa-sync" style="font-size:1.3rem;"></i></p>
                             <hr>

                             <div class="mt-3 card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">

                                <p class="" style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Minimum product return policy is 3 days, only for damaged or wrong products. To increase your sales, you can select a better return policy!</p>

                            </div>



                            <p class="mt-3" style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666;font-weight:bold">4.1- Days</p>

                            <div class="mt -3 form-check">
                             <input class="form-check-input day_return" type="radio" name="day_return" value="3" id="flexRadioDefault1">
                             <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                Returns accepted within 3 days, only for damaged or wrong products
                              </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input day_return" type="radio" name="day_return" value="7" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Returns accepted within 7 days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input day_return" type="radio" name="day_return" value="14" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Returns accepted within 14 days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input day_return" type="radio" name="day_return" value="21" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Returns accepted within 21 days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input day_return" type="radio" name="day_return" value="30" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    Returns accepted within 30 days
                                 </label>
                             </div>
                             <div class="mt -3 form-check">
                                <input class="form-check-input day_return" type="radio" name="day_return" value="0 (No Returns Products)" id="flexRadioDefault1">
                                <label class="" for="flexRadioDefault1" style="bacground-color:#666;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    No Returns Products
                                 </label>
                             </div>

                             <span class="text-danger">
                                <strong id="day_return-error" style="color:#dc3545;font: 10pt/130% Helvetica, Arial, sans-serif;"></strong>
                              </span>


                              @php

                               $date


                              @endphp

                             <div class="mt-3 row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        @foreach ($users as $user)
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        @endforeach
                                        <input type="hidden" name="post_date_of_item"
                                        value="{{ $created_at['timestamp'] }}">
                                        @foreach ($CategoriesIDs as $row)
                                        <input type="hidden" name="category_id"
                                            value="{{ $row->id }}">
                                        @endforeach
                                        @foreach ($subcategories_name as $row1)
                                        <input type="hidden" name="sub_category_id"
                                            value="{{ $row1->id }}">
                                            @endforeach
                                            @foreach ($article_name as $row2)
                                        <input type="hidden" name="article_id"
                                            value="{{ $row2->id }}">
                                            @endforeach
                                        {{-- @foreach ($products as $row4)
                                        <input type="hidden" name="product_id"
                                            value="{{ $row4->id }}">
                                        @endforeach --}}
                                        @foreach ($subproduct_name as $row3)
                                        <input type="hidden" name="sub_product_id"
                                            value="{{ $row3->id }}">
                                        @endforeach
                                        @foreach ($subproduct_name as $row3)
                                          <input type="hidden" name="product_type" value="{{ $row3->sub_product_name_en }} ">
                                         @endforeach

                                          <input type="hidden" name="disponibility" value="1">
                                        <button type="button" class="mt-3 btn-product-item btn btn-outline btn-lg w-100 DetailsBtns2_">
                                            Post For Free Now</button>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                        </form>

                                   </div>
                                 </div>
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
