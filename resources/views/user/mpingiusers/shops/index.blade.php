{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="col-lg-12">

    <header class="py-5 _main ">
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
    </header>


    <div class="wrappers" style="z-index: 5">
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
    </div>

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
                                <div class="carousel-item active top_shop">
                                    {{-- <img src="{{ asset('assets/uploads/126471149.jpeg') }}" class="d-block w-100" alt="Image 1"> --}}
                                    <h1 class="">
                                        Order from<br />
                                        <hr style="width:100%;text-align:left;margin-left:0;position:absolute;left:2px;color:#252424">
                                        {{ \Illuminate\Support\Str::upper(Str::limit($shops->store_name,23))}}

                                    </h1>
                                </div>
                                <div class="carousel-item top_shop">
                                    {{-- <img src="{{ asset('assets/uploads/266549999.jpg') }}" class="d-block w-100" alt="Image 2"> --}}
                                    <h1 class="">
                                        Order from<br />
                                        <hr style="width:100%;text-align:left;margin-left:0;position:absolute;left:2px;color:#252424">
                                        {{ \Illuminate\Support\Str::upper(Str::limit($shops->store_name,23))}}

                                    </h1>
                                </div>
                                <div class="carousel-item top_shop">
                                    {{-- <img src="{{ asset('assets/uploads/370226165.jpeg') }}" class="d-block w-100" alt="Image 3"> --}}
                                    <h1 class="">
                                        Order from<br />
                                        <hr style="width:100%;text-align:left;margin-left:0;position:absolute;left:2px;color:#252424">
                                        {{ \Illuminate\Support\Str::upper(Str::limit($shops->store_name,23))}}

                                    </h1>
                                </div>
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
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="text-white fa fa-shopping-cart"></i> {{
                                \Illuminate\Support\Str::upper($shops->store_name)}}&nbsp;<i
                                    class="text-white fa fa-tags"></i> Dealers in : {{ $shops->dealer_in }}</div>
                        </div>
                    </div>
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
                                aria-selected="true"><a href="#products" class="top4"><i class="fa fa-tags"></i>&nbsp;9
                                    PRODUCTS NEAR YOU </a></button>
                            <button class="nav-link" id="nav-contactus-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contactus" type="button" role="tab" aria-controls="nav-contactus"
                                aria-selected="false"><a href="#emailc" class="top4"><i class="fa fa-phone-square"></i>
                                    CONTACT US</a></button>

                            <button class="nav-link" id="nav-services-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-services" type="button" role="tab" aria-controls="nav-services"
                                aria-selected="false"><a href="#emailc" class="top4"><i class="fa fa-wrench"></i>
                                    SERVICES</a></button>


                            <button class="nav-link" id="nav-jobs-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-jobs" type="button" role="tab" aria-controls="nav-jobs"
                            aria-selected="false"><a href="#emailc" class="top4"><i class="fas fa-search-plus"></i>
                                JOBS</a></button>
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

                                <div class="mx-1 row" id="dynamic_content">
                                    <div id="load_data"></div>
                                    @forelse($products as $row)

                                    @empty

                                    @endforelse

                                    <div class="row">
                                        <div class="col-9">
                                            <a href="../category/products/items/index.php?id=YjdWV1piNllWN0dOMGlTMHA1c1JCdz09"
                                                class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="MORE INTERIORS ACCESSORIES"><span class="text-dark2"><i
                                                        class="fa fa-plus-square"></i> INTERIORS... <span
                                                        class="badge rounded-pill bg-light"
                                                        style="color:#FF7519">1</span></span></a>
                                        </div>
                                        <div class="col-3" class="customPrevNext">
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                                                <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                                                        title="Previous"></i></span>
                                            </button>
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                                                <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                                                        title="Next"></i></span>
                                            </button>
                                        </div>
                                        <hr>
                                    </div>


                                    <div class="col-md-12">

                                        {{ $products->links('pagination.custom')}}
                                    </div>

                                </div>

                                {{--  --}}

                                <div class="mx-1 row" id="dynamic_content">
                                    <div id="load_data"></div>
                                    @forelse($products as $row)

                                    <div
                                        class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                        <div class="mb-4 card"> {{-- shadow-sm --}}
                                            <div class="containeroverlay">
                                                <div class="">
                                                    <img class="card-img-top"
                                                        src="{{ (!empty($row->product_image)) ? url('/assets/uploads/'.$row->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                        height="200px" alt="...">
                                                </div>
                                                <div class="overlay overlayTop">
                                                    <div class="text">
                                                        <h3 id="cssh2" class=""><i class="fa fa-user"></i>&nbsp;Seller &
                                                            Buyer<br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-gift"></i> Order Now!
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-tag"></i> Product&nbsp;Details
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-shopping-cart"></i> See
                                                                Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-phone"></i>
                                                                +1(418) 509-2913
                                                            </a>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h6 class="card-title fw-bold">{{ $row->product_name }}</h6>
                                                <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                        $row->product_price }}</span>
                                                    <br> <strike> {{ $row->original_price }}</strike>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                    @empty

                                    <div class="alert alert-danger lign-items-center" role="alert">
                                        <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
                                            aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <div>
                                            <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                                                Found!..,
                                            </h3>
                                        </div>
                                    </div>
                                    @endforelse

                                    <div class="row">
                                        <div class="col-9">
                                            <a href="../category/products/items/index.php?id=YjdWV1piNllWN0dOMGlTMHA1c1JCdz09"
                                                class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="MORE KEYBOARDS"><span class="text-dark2"><i
                                                        class="fa fa-plus-square"></i> KEYBOARDS <span
                                                        class="badge rounded-pill bg-light"
                                                        style="color:#FF7519">2</span></span></a>
                                        </div>
                                        <div class="col-3" class="customPrevNext">
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                                                <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                                                        title="Previous"></i></span>
                                            </button>
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                                                <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                                                        title="Next"></i></span>
                                            </button>
                                        </div>
                                        <hr>
                                    </div>


                                    <div class="col-md-12">

                                        {{ $products->links('pagination.custom')}}
                                    </div>

                                </div>

                                {{-- --}}

                                {{-- --}}
                                <div class="mx-1 row " id="dynamic_content">
                                    <div id="load_data"></div>
                                    @forelse($products as $row)

                                    <div
                                        class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                        <div class="mb-4 card"> {{-- shadow-sm --}}
                                            <div class="containeroverlay">
                                                <div class="">
                                                    <img class="card-img-top"
                                                        src="{{ (!empty($row->product_image)) ? url('/assets/uploads/'.$row->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                        height="200px" alt="...">
                                                </div>
                                                <div class="overlay overlayTop">
                                                    <div class="text">
                                                        <h3 id="cssh2" class=""><i class="fa fa-user"></i>&nbsp;Seller &
                                                            Buyer<br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-gift"></i> Order Now!
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-tag"></i> Product&nbsp;Details
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-shopping-cart"></i> See
                                                                Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-phone"></i>
                                                                +1(418) 509-2913
                                                            </a>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h6 class="card-title fw-bold">{{ $row->product_name }}</h6>
                                                <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                        $row->product_price }}</span>
                                                    <br> <strike> {{ $row->original_price }}</strike>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                    @empty

                                    <div class="alert alert-danger lign-items-center" role="alert">
                                        <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
                                            aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <div>
                                            <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                                                Found!..,
                                            </h3>
                                        </div>
                                    </div>
                                    @endforelse

                                    <div class="row">
                                        <div class="col-9">
                                            <a href="../category/products/items/index.php?id=YjdWV1piNllWN0dOMGlTMHA1c1JCdz09"
                                                class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="MORE KITCHEN ACCESSORIES"><span class="text-dark2"><i
                                                        class="fa fa-plus-square"></i>
                                                   KITCHEN... <span class="badge rounded-pill bg-light"
                                                        style="color:#FF7519">1</span></span></a>
                                        </div>
                                        <div class="col-3" class="customPrevNext">
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                                                <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                                                        title="Previous"></i></span>
                                            </button>
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                                                <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                                                        title="Next"></i></span>
                                            </button>
                                        </div>
                                        <hr>
                                    </div>


                                    <div class="col-md-12">

                                        {{ $products->links('pagination.custom')}}
                                    </div>

                                </div>
                                {{-- --}}


                                {{-- --}}
                                <div class="mx-1 row" id="dynamic_content">
                                    <div id="load_data"></div>
                                    @forelse($products as $row)

                                    <div
                                        class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                        <div class="mb-4 card"> {{-- shadow-sm --}}
                                            <div class="containeroverlay">
                                                <div class="">
                                                    <img class="card-img-top"
                                                        src="{{ (!empty($row->product_image)) ? url('/assets/uploads/'.$row->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                        height="200px" alt="...">
                                                </div>
                                                <div class="overlay overlayTop">
                                                    <div class="text">
                                                        <h3 id="cssh2" class=""><i class="fa fa-user"></i>&nbsp;Seller &
                                                            Buyer<br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-gift"></i> Order Now!
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-tag"></i> Product&nbsp;Details
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-shopping-cart"></i> See
                                                                Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </a><br><br>
                                                            <a href="#" id="removeunderline">
                                                                <i class="fa fa-phone"></i>
                                                                +1(418) 509-2913
                                                            </a>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h6 class="card-title fw-bold">{{ $row->product_name }}</h6>
                                                <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                        $row->product_price }}</span>
                                                    <br> <strike> {{ $row->original_price }}</strike>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                    @empty

                                    <div class="alert alert-danger lign-items-center" role="alert">
                                        <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
                                            aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <div>
                                            <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                                                Found!..,
                                            </h3>
                                        </div>
                                    </div>
                                    @endforelse

                                    <div class="row">
                                        <div class="col-9">
                                            <a href="../category/products/items/index.php?id=YjdWV1piNllWN0dOMGlTMHA1c1JCdz09"
                                                class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="MORE LIVING ROOM FURNITURE"><span class="text-dark2"><i
                                                        class="fa fa-plus-square"></i>
                                                    LVING ROOM ... <span class="badge rounded-pill bg-light"
                                                        style="color:#FF7519">1</span></span></a>
                                        </div>
                                        <div class="col-3" class="customPrevNext">
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                                                <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                                                        title="Previous"></i></span>
                                            </button>
                                            <button class="text-dark1" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                                                <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                                                        title="Next"></i></span>
                                            </button>
                                        </div>
                                        <hr>
                                    </div>


                                    <div class="col-md-12">

                                        {{ $products->links('pagination.custom')}}
                                    </div>

                                </div>

                                {{-- --}}
                                <div class="mx-1 row" id="dynamic_content">
                                <div id="load_data"></div>
                                @forelse($products as $row)

                                <div
                                    class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                    <div class="mb-4 card"> {{-- shadow-sm --}}
                                        <div class="containeroverlay">
                                            <div class="">
                                                <img class="card-img-top"
                                                    src="{{ (!empty($row->product_image)) ? url('/assets/uploads/'.$row->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                    height="200px" alt="...">
                                            </div>
                                            <div class="overlay overlayTop">
                                                <div class="text">
                                                    <h3 id="cssh2" class=""><i class="fa fa-user"></i>&nbsp;Seller &
                                                        Buyer<br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-gift"></i> Order Now!
                                                        </a><br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-tag"></i> Product&nbsp;Details
                                                        </a><br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-shopping-cart"></i> See
                                                            Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </a><br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-phone"></i>
                                                            +1(418) 509-2913
                                                        </a>

                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title fw-bold">{{ $row->product_name }}</h6>
                                            <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                    $row->product_price }}</span>
                                                <br> <strike> {{ $row->original_price }}</strike>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                                @empty

                                <div class="alert alert-danger lign-items-center" role="alert">
                                    <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                                            Found!..,
                                        </h3>
                                    </div>
                                </div>
                                @endforelse

                                <div class="row">
                                    <div class="col-9">
                                        <a href="../category/products/items/index.php?id=YjdWV1piNllWN0dOMGlTMHA1c1JCdz09"
                                            class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="MORE USER CARS"><span class="text-dark2"><i
                                                    class="fa fa-plus-square"></i>
                                                USER CARS... <span class="badge rounded-pill bg-light"
                                                    style="color:#FF7519">3</span></span></a>
                                    </div>
                                    <div class="col-3" class="customPrevNext">
                                        <button class="text-dark1" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                                            <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                                                    title="Previous"></i></span>
                                        </button>
                                        <button class="text-dark1" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                                            <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                                                    title="Next"></i></span>
                                        </button>
                                    </div>
                                    <hr>
                                </div>


                                <div class="col-md-12">

                                    {{ $products->links('pagination.custom')}}
                                </div>

                              </div>

                                {{-- --}}
                                <div class="mx-1 row" id="dynamic_content">
                                <div id="load_data"></div>
                                @forelse($products as $row)

                                <div
                                    class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                    <div class="mb-4 card"> {{-- shadow-sm --}}
                                        <div class="containeroverlay">
                                            <div class="">
                                                <img class="card-img-top"
                                                    src="{{ (!empty($row->product_image)) ? url('/assets/uploads/'.$row->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                    height="200px" alt="...">
                                            </div>
                                            <div class="overlay overlayTop">
                                                <div class="text">
                                                    <h3 id="cssh2" class=""><i class="fa fa-user"></i>&nbsp;Seller &
                                                        Buyer<br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-gift"></i> Order Now!
                                                        </a><br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-tag"></i> Product&nbsp;Details
                                                        </a><br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-shopping-cart"></i> See
                                                            Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </a><br><br>
                                                        <a href="#" id="removeunderline">
                                                            <i class="fa fa-phone"></i>
                                                            +1(418) 509-2913
                                                        </a>

                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title fw-bold">{{ $row->product_name }}</h6>
                                            <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                    $row->product_price }}</span>
                                                <br> <strike> {{ $row->original_price }}</strike>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                                @empty

                                <div class="alert alert-danger lign-items-center" role="alert">
                                    <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                                            Found!..,
                                        </h3>
                                    </div>
                                </div>
                                @endforelse


                                <div class="col-md-12">

                                    {{ $products->links('pagination.custom')}}
                                </div>

                                </div>

                            </div>
                            {{-- --}}
                        </div>
                        <div class="tab-pane fade" id="nav-contactus" role="tabpanel" aria-labelledby="nav-contactus-tab">
                            {{-- --}}
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
                                                    src="{{ asset('assets/images/avatar3.png') }}" alt="Card image cap">
                                            </div>
                                            <hr>
                                            <p class="card-text textPCss">
                                                <i class="fa fa-user"></i> <b>Name</b>: Desange Hagumi Queen<br><br>
                                                <i class="fa fa-sitemap"></i> <b>Department</b>: Sales<br><br>
                                                <i class="fa fa-cog"></i> <b>Job title</b>: Manager<br><br>
                                                <i class="fa fa-shopping-cart"></i> <b>Am a</b>: Seller & Buyer<br><br>
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
                                                <i class="fa fa-shopping-cart"></i> <b>Shop Name</b>: Desange Queen
                                                Fashion<br><br>
                                                <i class="fa fa-tags"></i> <b>Dealers in</b>: All products<br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>Countrty</b>: Canada &nbsp;<img
                                                    src="{{ asset('assets/icons/CA.png') }}" alt="" width="30"
                                                    height="20" class="img_icons_2"></span><br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>State/Province</b>:
                                                Quebec<br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>City</b>: Rimouski<br><br>
                                                <i class="fa fa-phone"></i> <b>Mobile</b>: +1(418) 509-2913<br><br>
                                                <i class="fa fa-paper-plane"></i> <b>Email</b>:
                                                desangehagumi1@gmail.com<br><br>
                                                <i class="fa fa-link"></i> <b>Page on www.mpingimarket.com</b>: <a
                                                    href="http://www.mpingimarket.com/shops/?shop_number=ZHRjOEhLbzhWL0pUMVh3My83eVdNdz09"
                                                    target="_blank"
                                                    class="hrefCss">http://www.mpingimarket.com/shops/?shop_number=ZHRjOEhLbzhWL0pUMVh3My83eVdNdz09</a><br><br>
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
                            {{-- --}}
                        </div>

                        <div class="tab-pane fade" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab">
                            {{-- --}}
                            <div class="mx-2 mt-2 row">

                                <div class="mx-2 mt-2 row">

                                    <h1>Under Construct</h1>

                                 </div>

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
