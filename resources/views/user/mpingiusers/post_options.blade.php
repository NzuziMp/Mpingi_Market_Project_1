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

    <section class="py-2 border-bottom " id="features">
        <div class="container-fluid">

            <div class="row g-1">

                {{--all middle content --}}
                <div class="mb-4 col-md-4 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#ff7519;border-bottom:5px solid #f66b0e;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11">POST PRODUCTS
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-tags fa-2x"></i> FREE
                                                    PRODUCTS </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="font-size: 1rem">FREE</b> (31 days)<br>Free to post products or
                                        services in over 239 countries, 4,120 regions and 47,576 cities</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Post upto 10 products or services for free and create a free shop for your
                                        business</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Free Post products or services is seen by millions of users, visible everywhere
                                        across the site on all pages only for 31 days of expired duration</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Dozens of categories,subcategories, products and sub products to target your
                                        post</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Free Service products have limited exposure as new products will bury existing
                                        products, but still effective since there is no cost to post an ad. However, for
                                        more visitors' attention try Paid Service Ad, if you need quick response from
                                        people
                                    </p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Upload up to 10 images of your property, products or services logo to enhance
                                        your free product</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Users can contact you via your email, web chat room and web form</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        You can also provide other contact details such as Telephone number, Mobile
                                        number, website address etc, to enable customers to contact you directly.</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        You can edit, delete, change images,change price and add images of your product
                                        before product expired date</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Mpingi Market platform, offer one month of expired duration for free post
                                        product</p>

                                        @foreach ($getuser as $row)
                                        @if(is_null($row->first_name)|| is_null($row->gender) || is_null($row->date) ||
                                        is_null($row->month) || is_null($row->year)
                                        || is_null($row->country) || is_null($row->state_id) || is_null($row->mobile) ||
                                        is_null($row->address_1))
                                                    <p
                                                    style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                                        <i class='fas fa-exclamation-triangle'></i> Please you must update Profile details before to Post Regular Products
                                                        Account <a href="{{ route("user.profileinfo") }}"
                                                            class="AhrefColor">HERE</a></p>

                                        @else

                                     @endif
                                     @endforeach
                                </div>

                                {{-- --}}

                            </div>
                            <div class="mt-3 form-group">
                                <form action="{{ route('user.postoptionfunction') }}" method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="free_post_duration" value="{{ encrypt(31) }}"> --}}
                                    <input type="hidden" name="id" value="{{ encrypt(1) }}">
                                    @foreach ($getuser as $row)
                                    @if(is_null($row->first_name)|| is_null($row->gender) || is_null($row->date) ||
                                    is_null($row->month) || is_null($row->year)
                                    || is_null($row->country) || is_null($row->state_id) || is_null($row->mobile) ||
                                    is_null($row->address_1))
                                            <div class="mt-3 form-group">
                                            <button type="button" class="btn-alert py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct2_" disabled="disabled">
                                                    GET STARTED FOR FREE</button>

                                            </div>
                                        @else
                                         @foreach ($countuid as $u)
                                            @if($u->post_number = 0 || $u->post_number <= 10)
                                           <div class="mt-3 form-group">
                                              <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                                    GET STARTED FOR FREE </button>
                                            </div>
                                           @elseif($u->post_number = 10 || $u->post_number >= 10 )
                                           <button type="button" class="btn-alert py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                                  GET STARTED FOR FREE</button>
                                           @endif
                                         @endforeach

                                        @endif
                                    @endforeach
                                   {{-- <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                     GET STARTED FOR FREE
                                   </button> --}}
                                </form>
                            </div>
                            {{-- --}}
                            {{-- --}}
                            <div class="mt-3 mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-tags fa-2x"></i> PAID
                                                    PRODUCTS</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Featured products is seen by millions of users, visible everywhere across the
                                        site on all pages</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Sell or Promote Fast & Quickly get noticed by a greater number audience upto
                                        millions of people. Featured Ad is HIGHLY Recommended if you really want
                                        RESULTS.</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Featured products is displayed on every page across the site & gives extremely
                                        high exposure compared to regular free ad</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Seen by millions, upto 10 million ad impressions
                                    </p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        It brings more visitors, more views, more attention and quicker response from
                                        people</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Upload up to 10 images of your property, products or services logo to enhance
                                        your free ad</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Once Featured products duration has expired, it is still part of regular
                                        products</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Economical rates starting from $ 1 per product for year, Pay by cash for
                                        security purpose.</p>

                                </div>

                                {{-- --}}

                            </div>
                            <form action="{{ route('user.paidproducts') }}" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="free_post_duration" value="{{ encrypt(31) }}"> --}}
                             <input type="hidden" name="id" value="{{ encrypt(1) }}">
                             <input type="hidden" name="ad_type" value="{{ 1 }}">
                            <div class="mt-3 form-group">
                                @foreach ($getbusinessdata as $u)
                                 <input type="hidden" name="free_post_duration"  value="{{ $u->product_duration }}">
                                @endforeach

                             @foreach ($countuid as $u)
                                @if($u->post_number = 10 || $u->post_number > 10)
                                <div class="mt-3 form-group">
                                    <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                        GET STARTED </button>
                                    </div>
                                @elseif($u->post_number = 10 || $u->product_duration > 31)
                                   <button type="button" class="btn-alert2 py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED </button>
                                @endif
                             @endforeach

                                {{-- <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED </button> --}}
                            </div>
                            </form>
                            {{-- --}}
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-md-4 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#5a88ca;border-bottom:5px solid #1266de;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11">POST SERVICES
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">

                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-cogs fa-2x"></i> BASIC
                                                    LISTING</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="font-size: 1rem">FREE</b> (31 days)<br>Put your company on industry's
                                        leading product sourcing and supplier selection platform.</p>

                                </div>

                                {{-- --}}

                            </div>
                            <div class="mt-3 form-group">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#basiclistingModal" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED FOR FREE </button>
                                    @include('user.modal.basiclistingModal')
                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mt-3 mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-cogs fa-2x"></i> PREMIUM
                                                    PROGRAM</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <strong style="font-size:1rem">QUOTED</strong><br>as per your goals
                                        Stand out from your competitors with a high-profile, targeted presence
                                        throughout MPINGIMARKET.com</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <strong style="font-size:1rem">Features</strong><br>Detailed Company Profile
                                        Promote the info buyers look for on MPINGIMARKET.com</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Services Categorization</b><br>Get your services listed where they belong</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>National Reach</b><br>Be accessible to our entire audience of buyers &
                                        engineers</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Lead Generation</b><br>Receive and manage leads from verified prospects, and
                                        get detailed contact information delivered to your email inbox</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Amplified Promotion To Our Audience</b><br>Appear above ALL Basic Listings in
                                        your service categories</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Company Profile Ad</b><br>Drive buyers to your website with a prominent
                                        display ad on your profile</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Increased Brand Exposure</b><br>Promote brand awareness by featuring your
                                        logo on your company profile</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Premium Positioning</b><br>Receive preferred placement in your key
                                        product/service categories</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Audience Retargeting</b><br>Reach MPINGIMARKET.com buyers interested in your
                                        offerings, elsewhere on the internet</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b>Services Showcase</b><br>Boost your activity with highly visibile links to
                                        your detailed product/capabilities info</p>
                                </div>

                                {{-- --}}

                            </div>
                            <div class="mt-3 form-group">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#premiumprogramModal" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED </button>
                                    @include('user.modal.premiumprogramModal')
                            </div>
                            {{-- --}}

                        </div>

                    </div>
                </div>


                <div class="mb-4 col-md-4 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#00a61c;border-bottom:5px solid #05891c;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11">POST JOBS
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-briefcase fa-2x"></i> Free
                                                    Jobs</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <b style="font-size: 1rem">FREE</b> (31 days)<br>Put your company on industry's
                                        leading product sourcing and supplier selection platform.</p>
                                    {{-- <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <strong style="font-size:1rem">QUOTED</strong><br>as per your goals
                                        Stand out from your competitors with a high-profile, targeted presence
                                        throughout MPINGIMARKET.com</p> --}}
                                </div>

                                {{-- --}}
                            </div>
                            <div class="mt-3 form-group">
                                <form action="{{ route('user.basiclistingbusinesses') }}" method="POST">
                                    @csrf
                                  <input type="hidden" name="id" value="{{ encrypt(1) }}">
                                <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                    GET STARTED FOR FREE</button>
                                </form>
                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mt-3 mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-tags fa-2x"></i> Premium
                                                    Program</h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}

                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <strong style="font-size:1rem">QUOTED</strong><br>as per your goals
                                        Stand out from your competitors with a high-profile, targeted presence
                                        throughout MPINGIMARKET.com</p>
                                </div>

                                {{-- --}}

                            </div>
                            @foreach ($getbusinessdata as $row1)
                              @if($row1->business_name == "" || $row1->business_type == "" || $row1->dealers_in == ""
                                || $row1->i_am_a == "" || $row1->address == "" || $row1->business_icon == "")
                                    <div class="mt-3 form-group">
                                        <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct2_" disabled="disabled">
                                            GET STARTED </button>
                                    </div>
                                    @else
                                        <div class="mt-3 form-group">
                                            <form action="{{ route('user.basiclistingbusinesses') }}" method="POST">
                                                @csrf
                                              <input type="hidden" name="id" value="{{ encrypt(1) }}">
                                            <button type="submit" class="py-3 btn btn-outline btn-lg w-100 DetailsBtnsProduct_">
                                                GET STARTED </button>
                                            </form>
                                        </div>
                                    @endif
                            @endforeach
                            {{-- --}}

                        </div>

                    </div>

                    {{-- --}}

                    {{-- --}}
                    <div class="mt-3 mb-3 card">
                        <div class="card-header"
                            style="background-color:#3b3b3b;border-bottom:5px solid #282828 ;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-12">
                                    <center>
                                        <h6 class="mt-1" style="font-weight:bold">PAYMENTS</h6>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="far fa-money-bill-alt fa-2x"></i>
                                                    Payment method </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        Our financial team is available via phone or e-mail to help you make your
                                        payment successfully. Once contact or email us your payment post field will be
                                        activated and you will be able to post the number of products paid.</p>
                                </div>

                                {{-- --}}

                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-tags fa-2x"></i> Duration
                                                    price per package choose plan </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class=""
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        1. Bronze (100 products, services or jobs per year)</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        2. Sliver (250 products, services or jobs per year)</p>
                                    <p class="mt-4"
                                        style="text-align:left;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        3. Gold (500 products, services or jobs per year)</p>
                                </div>

                                {{-- --}}

                            </div>
                            {{-- --}}

                            {{-- --}}
                            <div class="mb-3 card" style="border:none;">
                                <div class="card-header"
                                    style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                    <div class="row">
                                        <div class="col-12">
                                            <center>
                                                <h6 style="font-weight:bold"><i class="fa fa-phone-square fa-2x"></i>
                                                    Contact us </h6>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                    {{-- --}}
                                    <p class="py-2 my-2 mt-2 text-center"
                                        style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <i class="fa fa-phone-square"></i> +1 (418) 732 1925</p>
                                    <p class="py-2 my-2 mt-3 text-center"
                                        style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                        <i class="fa fa-envelope"></i> contact@mpingimarket.com</p>

                                </div>

                                {{-- --}}

                            </div>
                            {{-- --}}



                        </div>

                        {{-- --}}

                    </div>

                    {{-- --}}

                    <div class="mt-3 mb-3 card">
                        <div class="card-header"
                            style="background-color:#3b3b3b;border-bottom:5px solid #282828 ;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-12">
                                    <center>
                                        <h6 class="mt-1" style="font-weight:bold">ADVERTISE WITH US</h6>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"
                            style="background-color:#fcf8e3;color:#8a6d3b;font-weight:bold;border:none">

                            {{-- --}}
                            <p class="py-2 my-2 mt-2 text-center"
                                style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                <i class="fa fa-tags"></i> Banner advertisement</p>
                            <p class="py-2 my-2 mt-3 text-center"
                                style="text-align:left;background-color:#fbeed5;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                <i class="fa fa-tags"></i> Contextual Advertising</p>
                            {{-- --}}

                            {{-- --}}
                        </div>

                        {{-- --}}

                    </div>

                    {{-- --}}

                </div>

            </div>

            {{--end all middle content --}}


            {{--all right content --}}

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
