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

                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="py-0 border-bottom " id="features">
        <div class="container-fluid">

     <div class="mt-0 row g-3">

        <div class="mb-5 col-lg-2 mb-lg-0">

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

                        @foreach ($fetchallCategories as $row)
                            <div class="accordion-item">
                                <h6 class="accordion-header" style="border-bottom: 1px solid #6666666c" id="headingOne" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ $row->category_name_desc }}">

                                      <div class="d-flex">

                                        <div class="flex-1 mt-3" style="margin-left:3%">
                                            <img
                                            src="{{ '/storage/assets/images/' . $row->category_image }}"
                                            height="20px" width="25px" class="img_icons"
                                            alt="Nzuzi">&nbsp;<span
                                            class="hoversidemenu" >
                                        </div>
                                        <div class="flex-1 mt-3">
                                            <form id="form" action="{{ route('guest.postoptionfunction') }}" method="POST">
                                                <input type="hidden" name="id" value="{{ encrypt($row->id) }}">
                                                @csrf
                                            <button type="button" onclick="submit()" style="border: none;background-color:#FFF; color: #666;   font: 10pt / 130% Helvetica, Arial, sans-serif;">{{ $row->category_name_en }}</button>
                                        </form>
                                        </div>
                                        </span>&nbsp;
                                     @php
                                        $subcategories_name = DB::table('tbl_sub_categories')
                                        ->where('category_id', $row->id)
                                        ->get();
                                    @endphp
                                     @foreach ($subcategories_name as  $data)
                                        @php
                                            $allcountsql1 = DB::table('tbl_product_items')
                                            ->select('sub_category_id',
                                                    'category_id',
                                                    DB::raw('COUNT(*) AS total'),
                                                    'article_id',
                                                    )
                                            ->where('category_id', '=', $data->category_id)
                                            ->get();
                                        @endphp
                                    <span class="mt-3 ml-2">
                                        @foreach ($allcountsql1 as $r)

                                                 @if($r->sub_category_id == $data->id)
                                                    @if($r->total == 0)
                                                        [0]
                                                    @else
                                                        <span class="badge_3">{{ $r->total }}</span>
                                                    @endif
                                                @endif

                                            @endforeach
                                      </span>
                                      @endforeach
                                            <button type="button" class="accordion-button collapsed button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $row->id }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                      </div>
                                    </button>

                                </h6>
                                <div id="collapseOne{{ $row->id }}" class="accordion-collapse collapse animate slideIn"
                                aria-labelledby="headingOne" data-bs-parent="#accordionPlusMinus">
                                <div class="accordion-body panelx2">
                                    @php
                                        $subcategories_name = DB::table('tbl_sub_categories')
                                        ->where('category_id', $row->id)
                                        ->get();
                                    @endphp
                                    @foreach ($subcategories_name as  $data)
                                    <p class="">
                                        <a href="{{ route('guest.viewdetailscategories', ['subcategory_id' => encrypt($data->id), 'category_id' =>encrypt($row->id)]) }}" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                            data-aos-duration="1000" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Textile & Leather Products">
                                            <img src="{{ '/storage/assets/icons_2/' . $data->sub_category_image }}" alt="" width="30"
                                                height="30" class="img_icons_4">
                                                {{ Str::limit($data->sub_category_name_en, '18', '...') }}
                                                @php
                                                    $allcountsql = DB::table('tbl_product_items')
                                                    ->select('sub_category_id', 'category_id',DB::raw('COUNT(article_id) AS article_countall, article_id'))
                                                    ->groupBy('sub_category_id')
                                                    ->get();
                                                @endphp
                                               @foreach ($allcountsql as $r)
                                                        @if($r->sub_category_id == $data->id)
                                                            @if($r->article_countall == 0)
                                                                [0]
                                                            @else
                                                                <span class="badge_3">{{ $r->article_countall }}</span>
                                                            @endif
                                                        @endif
                                                   @endforeach
                                            {{-- <span class="badge rounded-pill bg-light text-dark"><span
                                                    style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span> --}}

                                        </a>


                                    </p>
                                    @endforeach

                                </div>
                            </div>

                            </div>
                        @endforeach
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


        </div>
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

                                {{-- <div class=""
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


                                    </div> --}}



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
                                                         <a href="{{ route('guest.subproductid',['id'=> encrypt($rowss->id),'subcategory_id'=> encrypt($data->id),'article_id'=> encrypt($rows->id),'category_id'=> encrypt($row->id)]) }}" class="link-secondary sidemenu_a2">
                                                             <img src="{{ asset('assets/images/avatar_nzuzi_default.png') }}"
                                                                 alt="" width="30" height="30" class="text_x">
                                                             {{ $rowss->sub_product_name_en }}
                                                             @php
                                                                $countsql = \Illuminate\Support\Facades\DB::table('tbl_product_items')
                                                                ->select('product_type',DB::raw('COUNT(article_id) AS article_count, article_id'))
                                                                 ->where(['tbl_product_items.article_id' => $rows->id])
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

            @foreach ($products as $row)

            @endforeach

            <div class="col-lg-2">

                <div class="mb-3 card card6">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-shopping-cart"></i> <span class="counter" data-target="{{ $countallproducts_ }}">0</span> PRODUCTS</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon6"></i></div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        <div class="section_">
                            <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                @foreach ($ProductTypeGroupCount as $r)
                                <li id="hrefCss2"><a href="{{ route('viewproductsdetails', ['product_type' =>  $r->slug, 'product_id' =>  encrypt($r->id), 'upload_id' => encrypt($row->ImageIDS)]) }}" >{{ Str::limit($r->product_type,10, '...') }}</a>&nbsp;&nbsp;
                                  @if($r->total_productType != 0)
                                    <span style="color:#FF7519;font-weight:bolder">{{ $r->total_productType }}</span>
                                   @else
                                    {{--  --}}
                                   @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
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
                            <div class="col-10"><i class="fa fa-fa fa-wrench"></i> <span class="counter" data-target="{{ $countallservice_items_ }}">0</span> SERVICES</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon7"></i></div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-left:-8px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            @foreach ($joinservices as $r)
                            <li id="hrefCss2"><a href="{{ route('guest.serviceitemservice', ['service_id' => encrypt($r->service_id), 'sub_service_one_id' => encrypt($r->sub_id_one), 'sub_service_id' => encrypt($r->sub_service_id)]) }}" >{{ Str::limit($r->sub_service_3_name,10, '...') }}</a>&nbsp;&nbsp;
                              @if($r->total_sub3 != 0)
                                <span style="color:#FF7519;font-weight:bolder">{{ $r->total_sub3 }}</span>
                               @else
                                {{--  --}}
                               @endif
                            </li>
                            @endforeach

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
                        <i class="fa fa-industry"></i> <span class="counter" data-target="{{ $countallindustry_items_ }}">0</span> INDUSTRIES
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            @foreach ($fetchsubIndustry as $r)
                            <li id="hrefCss2"><a href="{{route('guest.industryitems', ['industry_id' => encrypt($r->industry_id), 'sub_industry_id' => encrypt($r->sub_industry_id)])}}" >{{ Str::limit($r->sub_industry_name,10, '...') }}</a>&nbsp;&nbsp;
                              @if($r->total_subindustries != 0)
                                <span style="color:#FF7519;font-weight:bolder">{{ $r->total_subindustries }}</span>
                               @else
                                {{--  --}}
                               @endif
                            </li>
                            @endforeach

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
                                <i class="fa fa-cogs"></i> <span class="counter" data-target="{{ $countalljobs_ }}">0</span> JOBS
                            </div>
                            <div class="card-body" style="margin-left:-10px">
                                <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                    @foreach ($fetchjobs as $r)
                                    <li id="hrefCss2"><a href="{{route('guest.jobsitems', ['job_category_id' => encrypt($r->id), 'job_items_id' => encrypt($r->job_items_id)])}}" >
                                    @if(session()->get('locale') === 'fr')
                                            {{ Str::limit($r->job_category_name_fr,15, '...') }}
                                        @else
                                           {{ Str::limit($r->job_category_name_en,15, '...') }}
                                         @endif
                                    </a>&nbsp;&nbsp;
                                      @if($r->total_jobs != 0)
                                        <span style="color:#FF7519;font-weight:bolder">{{ $r->total_jobs }}</span>
                                       @else
                                        {{--  --}}
                                       @endif
                                    </li>
                                    @endforeach

                                </ul>
                                <div class="card">
                                    <div class="mt-2 card-body">
                                        <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="444">0</span> Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>

            </div>

     </div>

            {{-- all middle content  --}}
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
@endsection
