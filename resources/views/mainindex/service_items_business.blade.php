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

    @forelse ($getuserlinks as $link)
    <div class="wrappers" style="z-index: 5">
        <ul class="socialUl">
            <li class="facebook">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                <div class="slider">
                    <p><a href="{{ $link->facebook_link }}" id="removeunderline" target="_blank">Facebook</a></p>
                </div>
            </li>

            <li class="twitter">
                <i class="fab fa-twitter" aria-hidden="true"></i>
                <div class="slider">
                    <p><a href="{{ $link->twitter_link }}" id="removeunderline" target="_blank">Twitter</a></p>
                </div>
            </li>
            <li class="youtube">
                <i class="fab fa-youtube" aria-hidden="true"></i>
                <div class="slider">
                    <p><a href="{{ $link->youtube_link }}" id="removeunderline" target="_blank">Youtube</a></p>
                </div>
            </li>

            <li class="instagram">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                <div class="slider">
                    <p><a href="{{ $link->instagram_link }}" id="removeunderline" target="_blank">Instagram</a></p>
                </div>
            </li>

            <li class="map">
                <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
                <div class="slider">
                    <p><a href="{{ $link->map_link }}" id="removeunderline" target="_blank">Google Map</a></p>
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
    @empty
    @endforelse
    <section class="py-2 border-bottom" id="features">
        <div class="container">

            {{--all middle content --}}
            <div class="mb-4 col-lg-12 mb-lg-0">
                <div class="mb-3 card card6">
                <div class="card-body ">
                      {{--  --}}
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner shopCss">
                                @foreach ($fetchallServices as $rr)


                                <div class=" top_shop">
                                    {{-- <img src="{{ asset('assets/uploads/126471149.jpeg') }}" class="d-block w-100" alt="Image 1"> --}}
                                    <h1 class="">
                                        Order from<br />
                                        <hr style="width:100%;text-align:left;margin-left:0;position:absolute;left:2px;color:#252424">
                                        {{ \Illuminate\Support\Str::upper(Str::limit($rr->company_name,23))}}

                                    </h1>
                                </div>
                                @endforeach
                            </div>
                            <!-- Carousel controls -->
                            <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>


                     {{--  --}}
                    </div>
                </div>
                <section>
                    <div class="container mt-2">
                        <div class="row g-2 justify-content-center">
                            <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                                <div class="card" style="width: 100%;border:none">
                                    <div class="card-body">
                                        <center class="cardCss">
                                            <h5 class="card-title"><i class="fa fa-truck fa-3x"
                                                    style="color:#3b3b3b"></i></h5>
                                            <p class="card-text"><a href="">DELIVERY <br>ANYWHERE</a></p>
                                        </center>

                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                                <div class="card" style="width: 100%;border:none">
                                    <div class="card-body">
                                        <center class="cardCss">
                                            <h5 class="card-title"><i class="fa fa-thumbs-up fa-3x"
                                                    style="color:#3b3b3b"></i></h5>
                                            <p class="card-text"><a href=""> LIKE<br><span
                                                        style="color:#fff">0</span></a></p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                                <div class="card" style="width: 100%;border:none">
                                    <div class="card-body">
                                        <center class="cardCss">
                                            <h5 class="card-title"><i class="fa fa-users fa-3x"
                                                    style="color:#3b3b3b"></i></h5>
                                            <p class="card-text"><a href=""> VISITORS <br>&nbsp;383</a></p>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-3 BorderCss">

                                <div class="card" style="width: 100%;border:none">
                                    <div class="card-body">
                                        <center class="cardCss">
                                            <h5 class="card-title"><i class="fa fa-sync fa-3x"
                                                    style="color:#3b3b3b"></i></h5>
                                            <p class="card-text"><a href="">FREE RETURNS & EXCHANGES</a></p>
                                        </center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>

                {{-- --}}
             <div class="mt-6 card card8 marginleftrightCss" style="" >
                    {{-- <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="text-white fa fa-shopping-cart"></i> {{
                                \Illuminate\Support\Str::upper($shops->store_name)}}&nbsp;<i
                                    class="text-white fa fa-tags"></i> Dealers in : {{ $shops->dealer_in }}</div>
                        </div>
                    </div> --}}
                    {{-- <div class="card-body" style="margin-left:-10px">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                    aria-selected="true"><a href="#products" class="top4"><i
                                            class="fa fa-tags"></i>&nbsp;9 PRODUCTS NEAR YOU </a></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false"><a
                                        href="#emailc" class="top4"><i class="fa fa-phone-square"></i> CONTACT
                                        US</a></button>
                            </li>
                        </ul>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">A</div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">B</div>

                        </div>
                    </div> --}}

                    <nav style="margin-top:2%;">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <button class="nav-link active" id="nav-products-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-products" type="button" role="tab" aria-controls="nav-products"
                                aria-selected="true"><a href="#products" class="top4"><i class="fa fa-tags"></i>&nbsp;
                                    PRODUCTS (0)</a></button>


                            <button class="nav-link" id="nav-services-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-services" type="button" role="tab" aria-controls="nav-services"
                                aria-selected="false"><a href="#emailc" class="top4"><i class="fa fa-wrench"></i>
                                    SERVICES (1)</a></button>


                            <button class="nav-link" id="nav-jobs-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-jobs" type="button" role="tab" aria-controls="nav-jobs"
                            aria-selected="false"><a href="#emailc" class="top4"><i class="fas fa-search-plus"></i>
                                JOBS (0)</a></button>

                                <button class="nav-link" id="nav-bprofile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-bprofile" type="button" role="tab" aria-controls="nav-bprofile"
                                aria-selected="false"><a href="#emailc" class="top4"><i class="fa fa-briefcase"></i>
                                        BUSINESS PROFILE</a></button>

                                <button class="nav-link" id="nav-contactus-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contactus" type="button" role="tab" aria-controls="nav-contactus"
                                aria-selected="false"><a href="#emailc" class="top4"><i class="fa fa-phone-square"></i>
                                    CONTACT DETAILS</a></button>

                                    <button class="nav-link" id="nav-gallery-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-gallery" type="button" role="tab" aria-controls="nav-gallery"
                                    aria-selected="false"><a href="#emailc" class="top4"><i class="far fa-image"></i>
                                        GALLERY</a></button>

                                    <button class="nav-link" id="nav-maploc-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-maploc" type="button" role="tab" aria-controls="nav-maploc"
                                    aria-selected="false"><a href="#emailc" class="top4"><i class="mt-1 fa fa-map-marker-alt"></i>
                                        MAP LOCATION</a></button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-products" role="tabpanel"
                            aria-labelledby="nav-products-tab">
                            {{-- --}}

                            {{-- --}}
                            <div class="mx-1 mt-1 row">
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

                             <div class="mt-2 table-data">

                                {{-- --}}
                                <div class="mx-1 row " id="dynamic_content">
                                    <div id="load_data"></div>

                                    {{-- --}}


                                    <div class="row">
                                        <div class="col-9">
                                              <a href="#"
                                                class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="MORE BOOTS"><span class="text-dark2"><i
                                                        class="fa fa-plus-square"></i> P Name <span
                                                        class="badge rounded-pill bg-light"
                                                        style="color:#FF7519">0</span></span></a>
                                        </div>
                                        <div class="col-3" class="customPrevNext">
                                            <button class="text-dark1"  type="button"
                                            data-bs-target="#myCarousel" data-bs-slide="prev"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                                                <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                                                        title="Previous"></i></span>
                                            </button>
                                            <button class="text-dark1"  type="button"
                                            data-bs-target="#myCarousel" data-bs-slide="next"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                                                <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                                                        title="Next"></i></span>
                                            </button>
                                        </div>
                                        <hr>
                                    </div>


                                 <div class="row g-1">


                                                <div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                                    <div class="mb-4 card"> {{-- shadow-sm --}}
                                                        <div class="containeroverlay">
                                                            <div class="">
                                                                <img class="card-img-top_ embed-responsive-item"
                                                                    src="#"
                                                                     alt="...">
                                                            </div>
                                                            <div class="overlay overlayTop">
                                                                <div class="text">
                                                                    <h3 id="cssh2" class=""><i
                                                                            class="fa fa-user"></i>&nbsp;Seller &
                                                                        Buyer<br><br>
                                                                        @if(!Auth::check())
                                                                        <a href="{{ route('login') }}" id="removeunderline">
                                                                          <i class="fa fa-gift"></i> Order Now!
                                                                          </a>
                                                                        @else
                                                                          <a href="javascript:void(0)" id="removeunderline">
                                                                           <i class="fa fa-gift"></i> Order Now!
                                                                        </a>
                                                                   @endif

                                                                   <br><br>
                                                                        <a href="#" id="removeunderline">
                                                                            <i class="fa fa-tag"></i> Product&nbsp;Details
                                                                        </a><br><br>
                                                                        <a href="#" id="removeunderline">
                                                                            <i class="fa fa-shopping-cart"></i> See
                                                                            Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        </a><br><br>
                                                                        <a  href="#" id="removeunderline">
                                                                            <i class="fa fa-phone"></i>
                                                                            <span class="hide-phone-number1">0808908</span>
                                                                        </a>

                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body d-flex flex-column">
                                                            <h6 class="card-title fw-bold">title</h6>
                                                            <h5 class="card-text fw-bolder"><span style="color: #ff7519;">00</span>
                                                                <br> <strike> 00</strike>
                                                            </h5>
                                                            {{-- <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('itempictures', ['upload_id' =>encrypt($row->ImageIDS) ])}}" class="linkPhoto">{{ $row->upload_ids }} photos </a> </p> --}}
                                                        </div>


                                                    </div>
                                                </div>




                                </div>

                             </div>
                            </div>
                            {{-- --}}
                        </div>


                        <div class="tab-pane fade" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab">
                            {{-- --}}
                            <div class="mx-2 mt-2 row">


                                        {{-- --}}
                                        @foreach ($fetchallServices as $item)

                                         <div class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                             <div class="mb-4 card"> {{-- shadow-sm --}}
                                                 <div class="">
                                                   <a href="#" class="hrefCss3">
                                                     <div class="">
                                                         <img class="card-img-top"
                                                             src="{{ (!empty($item->company_logo)) ? url('/storage/assets/uploads/'.$item->company_logo) :  url('/storage/assets/uploads/avatar_nzuzi1.png')}}"
                                                             height="200px" alt="...">
                                                     </div>
                                                 </a>
                                                     <div class="overlay">

                                                     </div>
                                                 </div>
                                                 <div class="card-body d-flex flex-column" data-bs-toggle="tooltip" data-bs-placement="top"
                                                 title="{{ $item->company_name }}">
                                                 <a href="#" class="hrefCss3"> <h6 class="text-center card-title fw-bold" style="text-transform: uppercase;">{{ $item->company_name }}</h6></a>

                                                 </div>
                                             </div>
                                         </div>

                                         @endforeach
                                         {{-- --}}






                            </div>
                            {{-- --}}
                        </div>

                        <div class="tab-pane fade" id="nav-jobs" role="tabpanel" aria-labelledby="nav-jobs-tab">
                            {{-- --}}
                            <div class="mx-2 mt-2 row">

                               <h1>Under Construct</h1>

                            </div>
                            {{-- --}}
                        </div>


                        <div class="tab-pane fade" id="nav-bprofile" role="tabpanel" aria-labelledby="nav-bprofile-tab">
                            {{-- --}}
                            <div class="mx-2 mt-2 row">

                               <h1>Business Profile Under Construct</h1>

                            </div>
                            {{-- --}}
                        </div>

                        <div class="tab-pane fade" id="nav-contactus" role="tabpanel" aria-labelledby="nav-contactus-tab">
                            {{-- --}}
                            @foreach ($userinfos as $rx)
                            <div class="mx-2 mt-2 row g-1">

                                <div class="col-md-4">
                                    <div class="card card4">
                                        <div class="card-header free1">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <h5 class="card-title"><i class="fa fa-user"></i> Personal Information</h5>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="col-2"><i class="text-white fa fa-times text-dark close-icon4"></i></div>
                                            </div>
                                        </div>


                                        </div>
                                        <div class="card-body">
                                            <div class="overflow-hidden rounded-circle custom-circle-image center">
                                                <img class="w-100 h-100 flip-img"
                                                    src="{{ (!empty($rx->profile)) ? url('/storage/assets/uploads', $rx->profile) : asset('assets/images/avatar3.png') }}" alt="Card image cap">
                                            </div>
                                            <hr>
                                            <p class="card-text textPCss">
                                                <i class="fa fa-user"></i> <b>Name</b>:  {{ Str::ucfirst($rx->last_name) }} {{ Str::ucfirst($rx->first_name) }}<br><br>
                                                <i class="fa fa-sitemap"></i> <b>Department</b>: {{ Str::ucfirst($rx->department) }}<br><br>
                                                <i class="fa fa-cog"></i> <b>Job title</b>: {{ Str::ucfirst($rx->job_title) }}<br><br>
                                                <i class="fa fa-shopping-cart"></i> <b>Am a</b>: {{ $rx->i_am_a }}<br><br>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card5">
                                        <div class="card-header free1">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <h5 class="card-title"><i class="fa fa-phone-square"></i> Shop Contact
                                                    Information</h5>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="col-2"><i class="text-white fa fa-times text-dark close-icon5"></i></div>
                                            </div>
                                         </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text textPCss">
                                                <i class="fa fa-shopping-cart"></i> <b>Shop Name</b>: {{ $rx->business_name }}<br><br>
                                                <i class="fa fa-tags"></i> <b>Dealers in</b>: {{ $rx->dealers_in }}<br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>Countrty</b>: {{ $rx->countryname }} &nbsp;<img
                                                    src="{{ url('assets/flags/'.$rx->flag) }}" alt="" width="30"
                                                    height="20" class="img_icons_2"></span><br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>State/Province</b>:
                                                {{ $rx->statename }}<br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>City</b>: {{ $rx->cityname }}<br><br>
                                                <i class="fa fa-phone"></i> <b>Mobile</b>:<span class="hide-phone-number"> {{ Str::limit($rx->mobile, 4,  '') }}</span><br><br>
                                                <i class="fa fa-paper-plane"></i> <b>Email</b>:
                                                {{ $rx->email }}<br><br>
                                                <i class="fa fa-link"></i> <b>Page on {{ $rx->website }}</b>: <a
                                                    href="{{ $rx->website }}"
                                                    target="_blank"
                                                    class="hrefCss">{{ $rx->website }}</a><br><br>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                              <div class="col-md-4">
                                    <div class="card card6">
                                        <div class="card-header free1">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <h5 class="card-title"> <i class="fa fa-paper-plane"></i> Email to this supplie</h5>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="col-2"><i class="text-white fa fa-times text-dark close-icon6"></i></div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-warning" role="alert">
                                                        <p class="textPCss">We appreciate your initiative to contact us;
                                                            you can make use of this instant mail form to contact
                                                            Desange Queen Fashion. City <font color="red">*</font> are
                                                            required to enable us to effectively communicate with you.
                                                        </p>
                                                    </div>
                                                    <form method="post" class="gap-2 d-grid">
                                                        <div class="form-group">
                                                            <input class="form-control form-control-lg" type="text"
                                                                placeholder="Name" aria-label=".form-control-lg example"
                                                                id="borderinput2">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control form-control-lg" type="text"
                                                                placeholder="E-mail"
                                                                aria-label=".form-control-lg example" id="borderinput2">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control form-control-lg" type="text"
                                                                placeholder="Subject"
                                                                aria-label=".form-control-lg example" id="borderinput2">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea rows="3" class="form-control form-control-lg"
                                                                type="text" placeholder="Message"
                                                                aria-label=".form-control-lg example"
                                                                id="borderinput2"></textarea>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom:10%">
                                                            <button type="button"
                                                                class="float-end btn btn-outline-warning btn-lg btnColor"
                                                                value="SEND MESSAGE">SEND MESSAGE</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                            {{-- --}}
                        </div>


                        <div class="tab-pane fade" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                            {{-- --}}
                            <div class="mx-2 mt-2 row">

                               <h1>Galery Under Construct</h1>

                            </div>
                            {{-- --}}
                        </div>

                        <div class="tab-pane fade" id="nav-maploc" role="tabpanel" aria-labelledby="nav-maploc-tab">
                            {{-- --}}
                            <div class="mx-2 mt-2 row">
                                @foreach ($fetchallServices as $service)
                                  <div style="width: 100%"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{!! $service->map_location !!}"><a href="https://www.gps.ie/">gps systems</a></iframe></div>
                               @endforeach
                            </div>

                            {{-- --}}
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
</section> --}}

@endsection
