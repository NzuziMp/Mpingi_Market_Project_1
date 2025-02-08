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
                                @foreach ($shops as $rr)


                                <div class=" top_shop">
                                    {{-- <img src="{{ asset('assets/uploads/126471149.jpeg') }}" class="d-block w-100" alt="Image 1"> --}}
                                    <h1 class="">
                                        Order from<br />
                                        <hr style="width:100%;text-align:left;margin-left:0;position:absolute;left:2px;color:#252424">
                                        {{ \Illuminate\Support\Str::upper(Str::limit($rr->business_name,23))}}

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
                            @foreach ($shops as $u)
                            @endforeach
                            @php
                            $usercountallproducts = DB::table('tbl_product_items')->select('*')
                            ->where(['ad_type'=>'0', 'expire_status'=>'1', 'user_id'=>$u->user_id])
                            ->count();
                            @endphp
                            <button class="nav-link active" id="nav-products-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-products" type="button" role="tab" aria-controls="nav-products"
                                aria-selected="true"><a href="#products" class="top4"><i class="fa fa-tags"></i>&nbsp;{{ $usercountallproducts }}
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

                                {{-- --}}
                                <div class="mx-1 row " id="dynamic_content">
                                    <div id="load_data"></div>

                                    {{-- --}}

                                    @forelse($ProductTypeGroupCount as $r)
                                    {{-- --}}

                                    <div class="row">
                                        <div class="col-9">
                                              <a href="{{ route('guest.viewProductsDetails', ['upload_id' => encrypt($r->IDs), 'product_id' => encrypt($r->id), 'product_type' => $r->product_type, 'subproduct_id' => $r->sub_product_id]) }}"
                                                class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="MORE BOOTS"><span class="text-dark2"><i
                                                        class="fa fa-plus-square"></i> {{ Str::upper($r->product_type) }} <span
                                                        class="badge rounded-pill bg-light"
                                                        style="color:#FF7519">{{ $r->total_productType }}</span></span></a>
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
                                     @foreach ($shops as $rr)

                                    @endforeach
                                     @php
                                    $getimagex =  DB::table('tbl_product_items')
                                  ->selectRaw('count(tbl_imgs.upload_id) as upload_ids,
                                        tbl_images.id,
                                        tbl_images.id as ImageIDS,
                                        tbl_imgs.image_name as Images,
                                        tbl_imgs.upload_id,
                                        users.product_duration as PDurations,
                                        tbl_product_items.id as ProductItem_id,
                                        tbl_product_items.currency,
                                        tbl_product_items.post_date_of_item,
                                        tbl_product_items.user_id as userid,
                                        tbl_product_items.category_id,
                                        tbl_product_items.sub_category_id,
                                        tbl_product_items.article_id,
                                        tbl_product_items.product_id,
                                        tbl_product_items.sub_product_id,
                                        tbl_product_items.item_name,
                                        tbl_product_items.product_type,
                                        tbl_product_items.brand_name,
                                        tbl_product_items.brand_id,
                                        tbl_product_items.pieces,
                                        tbl_product_items.price,
                                        tbl_product_items.old_price,
                                        tbl_product_items.color_id,
                                        tbl_product_items.sub_color_id,
                                        tbl_product_items.price_range_start,
                                        tbl_product_items.price_range_end,
                                        tbl_product_items.product_color,
                                        tbl_product_items.place_of_origin,
                                        tbl_product_items.city,
                                        tbl_product_items.state_id,
                                        tbl_product_items.item_descriptions,
                                        tbl_product_items.item_images,
                                        tbl_product_items.supplier_name,
                                        tbl_product_items.supplier_region,
                                        tbl_product_items.type,
                                        tbl_product_items.post_expiry_date,
                                        tbl_product_items.post_delete_date,
                                        tbl_product_items.post_date_count,
                                        tbl_product_items.post_expiry_count,
                                        tbl_product_items.post_delete_count,
                                        tbl_product_items.expire_status,
                                        tbl_product_items.ad_type,
                                        tbl_product_items.views,
                                        tbl_product_items.shipping,
                                        tbl_product_items.shipping_price,
                                        tbl_product_items.price_id,
                                        tbl_product_items.rate,
                                        tbl_product_items.total_rate,
                                        tbl_product_items.hits,
                                        tbl_product_items.payment,
                                        tbl_product_items.weight,
                                        tbl_product_items.volume,
                                        tbl_product_items.delivery,
                                        tbl_product_items.day_return,
                                        tbl_product_items.negotiable,
                                        tbl_product_items.currency,
                                        tbl_product_items.category,
                                        tbl_product_items.product_web_name,
                                        tbl_product_items.product_web_link,
                                        tbl_product_items.disponibility,
                                        tbl_product_items.created_at,
                                        tbl_product_items.remainingdays_status,
                                        tbl_product_items.expireddate_remain,
                                        tbl_images.product_item,
                                        users.phone,
                                        users.id as userid

                                    ')
                            ->leftjoin('users','users.id','=','tbl_product_items.user_id')
                            ->leftjoin('tbl_images','tbl_images.product_item','=','tbl_product_items.id')
                            ->leftjoin('tbl_imgs','tbl_imgs.upload_id','=','tbl_images.id')
                            ->leftjoin('tbl_sub_products','tbl_sub_products.id','=','tbl_product_items.sub_product_id')
                            ->where(['tbl_sub_products.id'=> $r->sub_product_id, 'tbl_product_items.expire_status' => 1, 'tbl_imgs.uid'=> $rr->user_id])
                            ->groupBy('tbl_imgs.upload_id')
                            ->get();


                                     @endphp
                                 <div class="row g-1">

                                            @forelse ($getimagex as $key => $row)


                                                <div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                                                    <div class="mb-4 card"> {{-- shadow-sm --}}
                                                        <div class="containeroverlay">
                                                            <div class="">
                                                                <img class="card-img-top_ embed-responsive-item"
                                                                    src="{{ (!empty($row->Images)) ? url('/storage/assets/uploads/'.$row->Images) :  url('/storage/assets/uploads/avatar_nzuzi1.png')}}"
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
                                                                            <span class="hide-phone-number1">{{ Str::limit($row->phone,4,  '') }}</span>
                                                                        </a>

                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body d-flex flex-column">
                                                            <h6 class="card-title fw-bold">{{ Str::ucfirst(Str::limit($row->item_name, 16, '...')) }}</h6>
                                                            <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                                    number_format($row->price, 2) }}</span>
                                                                <br> <strike> {{ number_format($row->old_price,2) }}</strike>
                                                            </h5>
                                                            {{-- <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('itempictures', ['upload_id' =>encrypt($row->ImageIDS) ])}}" class="linkPhoto">{{ $row->upload_ids }} photos </a> </p> --}}
                                                        </div>


                                                    </div>
                                                </div>



                                            @empty

                                            @endforelse


                                </div>
                                @empty

                                @endforelse
                             </div>
                            </div>
                            {{-- --}}
                        </div>
                        <div class="tab-pane fade" id="nav-contactus" role="tabpanel" aria-labelledby="nav-contactus-tab">
                            {{-- --}}
                            @foreach ($shops as $r)
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
                                                    src="{{ (!empty($r->profile)) ? url('/storage/assets/uploads', $r->profile) : asset('assets/images/avatar3.png') }}" alt="Card image cap">
                                            </div>
                                            <hr>
                                            <p class="card-text textPCss">
                                                <i class="fa fa-user"></i> <b>Name</b>:  {{ Str::ucfirst($r->last_name) }} {{ Str::ucfirst($r->first_name) }}<br><br>
                                                <i class="fa fa-sitemap"></i> <b>Department</b>: {{ Str::ucfirst($r->department) }}<br><br>
                                                <i class="fa fa-cog"></i> <b>Job title</b>: {{ Str::ucfirst($r->job_title) }}<br><br>
                                                <i class="fa fa-shopping-cart"></i> <b>Am a</b>: {{ $r->i_am_a }}<br><br>
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
                                                <i class="fa fa-shopping-cart"></i> <b>Shop Name</b>: {{ $r->business_name }}<br><br>
                                                <i class="fa fa-tags"></i> <b>Dealers in</b>: {{ $r->dealers_in }}<br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>Countrty</b>: {{ $r->countryname }} &nbsp;<img
                                                    src="{{ url('assets/flags/'.$r->flag) }}" alt="" width="30"
                                                    height="20" class="img_icons_2"></span><br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>State/Province</b>:
                                                {{ $r->statename }}<br><br>
                                                <i class="fa fa-map-marker-alt"></i> <b>City</b>: {{ $r->cityname }}<br><br>
                                                <i class="fa fa-phone"></i> <b>Mobile</b>:<span class="hide-phone-number"> {{ Str::limit($r->mobile, 4,  '') }}</span><br><br>
                                                <i class="fa fa-paper-plane"></i> <b>Email</b>:
                                                {{ $r->email }}<br><br>
                                                <i class="fa fa-link"></i> <b>Page on {{ $r->website }}</b>: <a
                                                    href="{{ $r->website }}"
                                                    target="_blank"
                                                    class="hrefCss">{{ $r->website }}</a><br><br>
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
