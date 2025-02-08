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

                {{--all left content --}}

                {{--end all left content --}}

                {{--all middle content --}}
                <div class="mb-4 col-md-10 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11"><img src="{{ asset('assets/images/icon3.png') }}" height="20"
                                        width="20" class="img_icons">&nbsp;<a href="category_view_order/index.php?id=3"
                                        style="color:#fff; font-weight:bold"></a>
                                    <font color="#ff7519">&nbsp;&nbsp;»</font>
                                    <a href="category_view_order/products_view/index.php?article_id=82"
                                        style="color:#fff; font-weight:bold"></a>
                                    <font color="#ff7519"> &nbsp;» </font> &nbsp;
                                    <a href="category_view_order/products_view/items_view/index.php?id=2787"
                                        style="color:#fff; font-weight:bold"> </a>
                                    <font color="#ff7519"> &nbsp;»&nbsp;<b>&nbsp;

                                        </b></font>
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card">
                                {{-- --}}
                                <div class="card-body">
                                    <p style="background-color:#FFF; margin-top:10px; margin-right:20px;" align="right">
                                        <font color="#FF7519"><b>Order Step 2</b> of 3</font>
                                    </p>
                                    <div class="py-2 my-2"
                                        style="background-color:#fcf8e3;color:#8a6d3b;border-radius:6px;border-color:1px solid #fbeed5">
                                        <p
                                            style="bacground-color:#fcf8e3;color:8a6d3b;font: 10pt/130% Helvetica, Arial, sans-serif;margin-left:2%;margin-right:2%;margin-top:2%">
                                            <span style="text-align:left">2. Carefully read the conditions of the seller
                                                (Read the details of the products the payment and delivery methods
                                                offered by the seller)</span><br><br>
                                            <span style="margin-left:4%;">2.1 Select your payment and shipping method
                                                (pays cash on delivery or chooses an online payment solution (bank
                                                transfer or mobile money transfer)).</span><br><br>
                                            <span style="margin-left:4%;">2.2 Seller will contact you for delivery
                                                (please fill this form correctly to help seller to contact you for
                                                delivery and payment. )</span><br><br>
                                            <span style="margin-left:4%;">2.3 and then click on CHECK OUT button</span>
                                        </p>
                                    </div>
                                </div>
                                {{-- --}}

                                {{-- --}}

                                <div class="card-body">
                                    <div class="row g-2">
                                        {{-- --}}
                                        <div class="col-md-5"
                                            style="border: 1px solid #dee2e6!important;border-radius:6px">
                                            {{-- --}}
                                            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                                <div class="containeroverlay">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="{{ (!empty($prductdetails->product_image)) ? url('/assets/uploads/'.$prductdetails->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                                class="d-block w-100" alt="...">
                                                        </div>

                                                        {{-- @foreach($allProducts as $key => $slider)
                                                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                            <img src="{{url('/assets/uploads/', $slider->product_image)}}"
                                                                class="d-block w-100" alt="...">
                                                        </div>
                                                        @endforeach --}}
                                                    </div>

                                                    <div class="overlay overlayTop3">

                                                        <h2 id="cssh3">
                                                            {{-- <b><i class="fa fa-tags"></i> product Details</b>
                                                            <br><br> --}}
                                                            <a href="#" id="removeunderline">
                                                                <b><i class="fa fa-gift"></i> Order Now!</b>
                                                            </a>
                                                        </h2>
                                                    </div>
                                                </div>


                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#myCarousel" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#myCarousel" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="text-center titleDetailslide"><i
                                                                class="fa fa-image"></i>&nbsp;<a
                                                                href="{{ route('itempictures',['id'=>encrypt($prductdetails->id)]) }}"
                                                                class="linkPhoto">0 photos </a> </p>
                                                    </div>
                                                    <div class="col-md-0">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- --}}
                                        </div>
                                        {{-- --}}
                                        <div class="col-md-4">
                                            {{-- --}}
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="mt-2 col-10">
                                                            <a href="#" class="homecontent_details"
                                                                style="font-size:2.6vmin;"> HP - Clavier professionnel
                                                                USB mince,...
                                                            </a>
                                                        </div>
                                                        <div class="col-2">
                                                            <img src="{{ asset('assets/images/sale.png') }}" alt=""
                                                                style="background-color:transparent; border:none;">
                                                        </div>
                                                        <span
                                                            style="border: 1px solid rgb(214, 211, 211);border-style: dashed;"></span>
                                                        <h6 class="mt-1 card-title fw-bold current_nzuzi_mping__">{{
                                                            $prductdetails->product_price }}<br> <strike
                                                                class="current_nzuzi_mping_"> {{
                                                                $prductdetails->original_price }}</strike></h6>

                                                        <p class="mb-4 titleDetails">
                                                            <span class="d-flex">Product Type:&nbsp;Keyboards</span>
                                                            <span class="d-flex"> Color:&nbsp;<span
                                                                    class="colorCss2"></span></span>
                                                            <span class="d-flex">Quantity:&nbsp; 1</span>
                                                            <span class="d-flex">Condition:&nbsp; New</span>
                                                            {{-- <span class="d-flex">Price:&nbsp; Negotiable</span>
                                                            <span class="d-flex">Disponibility:&nbsp;
                                                                Available</span> --}}
                                                            {{-- <span class="d-flex">Go to:&nbsp; <a href="#"
                                                                    target="_blank"
                                                                    style="color:#ff7519;font: 10pt/130% Helvetica, Arial, sans-serif; font-weight:bold">www.mpingimarket.com</a></span>
                                                            --}}
                                                        </p>
                                                        <p>
                                                            <span class="titleDetails d-flex">Posted
                                                                on:&nbsp;Sunday,October 11, 2020</span>
                                                            <span class="mb-2 titleDetails d-flex">Views: 297</span>
                                                            <span class="mb-2 titleDetails d-flex">Rating: </span>

                                                        <div>
                                                            <div class="row">
                                                                <div class="col-2"></div>
                                                                <div class="col-8">
                                                                    <a href="#" class="hrefCss_3"><button type="button"
                                                                            class="btn btn-outline w-100 DetailsBtn">
                                                                            <i class="far fa-money-bill-alt"></i>
                                                                            Available</button>
                                                                    </a>
                                                                </div>
                                                                <div class="col-2"></div>
                                                            </div>
                                                        </div>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- --}}
                                        <div class="col-md-3">
                                            {{-- --}}
                                            <div class="card">
                                                <div class="card-header"
                                                    style="background-color:#3b3b3b;color:#fff;border-bottom: 5px solid #282828;font-size:12px;font-weight:bold; ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12">
                                                            <i class="fa fa-star"></i>&nbsp; Please rate this product
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <p class="card-text">
                                                    <div class="form-check"
                                                        style="color: #666; font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            poor
                                                        </label>
                                                    </div>
                                                    <div class="form-check"
                                                        style="color: #666; font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            fair
                                                        </label>
                                                    </div>
                                                    <div class="form-check"
                                                        style="color: #666; font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            good
                                                        </label>
                                                    </div>
                                                    <div class="form-check"
                                                        style="color: #666; font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            very good
                                                        </label>
                                                    </div>
                                                    <div class="form-check"
                                                        style="color: #666; font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            excellent
                                                        </label>
                                                    </div>

                                                    <div class="mt-3 row">
                                                        <div class="col-3"></div>
                                                        <div class="col-6">
                                                            <button type="button"
                                                                class="btn btn-outline w-100 DetailsBtnx_">
                                                                Rate!
                                                            </button>
                                                        </div>
                                                        <div class="col-3"></div>
                                                    </div>


                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                        {{-- --}}
                                        {{-- --}}
                                        <div class="mt-4 g-2 row">
                                            <div class="col-md-9">
                                                {{-- --}}
                                                <div class="mb-3 card">
                                                    <div class="card-header"
                                                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold;font-size:12px;">
                                                        <i class="fa fa-shopping-cart"></i> Buy From Mpingi Shop
                                                    </div>
                                                    <div class="card-body">
                                                        {{-- --}}
                                                        <div class="mt-3 mb-3 card" style="border:none;">
                                                            <div class="card-header"
                                                                style="background-color:#fbeed5;color:#8a6d3b;font-weight:bold;border:none">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5 style="font-weight:bold;text-align:left"><i
                                                                                class="fa fa-user fa-1x"
                                                                                style="font-size:1.3rem"></i> Buyer
                                                                            Details</h5>
                                                                    </div>
                                                                </div>
                                                            </div class="">
                                                            <div class="card-body"
                                                                style="background-color:#fcf8e3;color:#8a6d3b"
                                                                align="left">
                                                                {{-- --}}
                                                                <p class=""
                                                                    style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                                                    <i class="fa fa-warning"></i> Please you must update
                                                                    your Profile details before to Order product
                                                                    here
                                                                </p>

                                                            </div>
                                                            {{-- --}}

                                                            <div class="mt-4 row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Full Name
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Full Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Post Code
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Post Code">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-4 row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Email Address
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Address 1
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Address 1">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-4 row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Mobile or
                                                                            Telephone
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Mobile/Telephone">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Address 2
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Address 2">
                                                                    </div>
                                                                </div>
                                                            </div>




                                                            <div class="mt-2 mb-3 row align-items-start g-2 menuAlign"
                                                                align="center">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-3">
                                                                    <select name="country"
                                                                        class="form-select example country-dropdown"
                                                                        aria-label="Default select" id="borderinput">
                                                                        <option value="" selected="true"
                                                                            disabled="disable">&larr; Select
                                                                            Country &rarr;</option>
                                                                        @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}" {{
                                                                            (collect(old('country_id'))->
                                                                            contains($country->id)) ? 'selected':''
                                                                            }}>{{ $country->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <select name="country"
                                                                        class="form-select state-dropdown"
                                                                        aria-label="Default select example"
                                                                        id="borderinput">
                                                                        <option value="" selected="true"
                                                                            disabled="disable">&larr; Select
                                                                            State
                                                                            &rarr;</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <select name="country"
                                                                        class="form-select city-dropdown"
                                                                        aria-label="Default select example"
                                                                        id="borderinput">
                                                                        <option value="" selected="true"
                                                                            disabled="disable">&larr; Select
                                                                            City
                                                                            &rarr;</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <h6 style="font-size: 1rem;margin-top:2%"><i
                                                                    class="fa fa-truck fa-1x"
                                                                    style="color:#1a6be8;font-size:1.3rem"></i> <span
                                                                    style="font-weight:bold;color:#666"> - Select My
                                                                    Delivery</span> </h6>

                                                            <div class="mt-3 g-1 row">
                                                                <div class="col-7">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1"
                                                                            style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                                            Pickup from <font color="#ff7519">Mpingi
                                                                                Shop (459 Rue eudore couture app 101)
                                                                            </font>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1"
                                                                            style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                                            Delivery to the Address
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <h6 style="font-size: 1rem;margin-top:2%"><i
                                                                    class="fa fa-lock fa-1x"
                                                                    style="color:#00a61c;font-size:1.3rem"></i> <span
                                                                    style="font-weight:bold;color:#666"> - Select My
                                                                    Payment Method</span> </h6>

                                                            <div class="mt-3 row">
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1"
                                                                            style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                                            Pay On Delivery or Pickup
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            <h6 style="font-size: 1rem;margin-top:2%"><i
                                                                    class="fa fa-sync fa-1x"
                                                                    style="color:#f25433;font-size:1.3rem"></i> <span
                                                                    style="font-weight:bold;color:#666"> - Return
                                                                    Conditions</span> </h6>

                                                            <div class="mt-3 row">
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1"
                                                                            style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                                            Return accepted within <font
                                                                                color="#ff7519">3</font> days of
                                                                            delivery, buyer pays for the cost of return.
                                                                            Item must be undamaged and packaging intact.
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <h6 style="font-size: 1rem;margin-top:2%"><i
                                                                    class="fa fa-gift fa-1x"
                                                                    style="color:#ffe305;font-size:1.3rem"></i> <span
                                                                    style="font-weight:bold;color:#666"> - My
                                                                    Order</span> </h6>

                                                            <div class="mt-3 row">
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="flexRadioDefault"
                                                                            id="flexRadioDefault1">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1"
                                                                            style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                                            Return accepted within <font
                                                                                color="#ff7519">3</font> days of
                                                                            delivery, buyer pays for the cost of return.
                                                                            Item must be undamaged and packaging intact.
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="mt-3 row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Quantity
                                                                        </label>
                                                                        <input type="number" class="form-control"
                                                                            placeholder="Quantity"  minlength="1" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="mt-3 row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Price
                                                                        </label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Quantity" value="30" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mt-3 row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style=";color:#9f9f9f">
                                                                            <font color="red">*</font> Buyer Clarify
                                                                            Message (Maximum 500 characters)
                                                                        </label>
                                                                        <textarea type="text" class="form-control"
                                                                            placeholder="Quantity" rows="5"></textarea>
                                                                        <span
                                                                            style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666">Characters
                                                                            Remaining: 500</span>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="mt-3 card-body"
                                                                style="background-color:#fcf8e3;color:#8a6d3b"
                                                                align="left">
                                                                {{-- --}}
                                                                <p class=""
                                                                    style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                                                    <i class="fa fa-warning"></i> Please you must update
                                                                    your Profile details before to Order product
                                                                    here
                                                                </p>

                                                            </div>

                                                            <div class="mt-3 row">
                                                                <div class="col-3"></div>
                                                                <div class="col-6">
                                                                    <a href="{{ route('orderstatus') }}"
                                                                        class="hrefCss_3">
                                                                        <button type="button"
                                                                            class="btn btn-outline w-100 DetailsBtnx_">
                                                                            Check out
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                <div class="col-2"></div>
                                                            </div>

                                                        </div>
                                                        {{-- --}}

                                                    </div>
                                                </div>
                                                {{-- --}}

                                            </div>
                                            <div class="col-md-3">
                                                {{-- --}}
                                                <div class="mb-3 card">
                                                    <div class="card-header"
                                                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold;font-size:12px;">
                                                        <i class="fa fa-tags"></i> Product Descriptions
                                                    </div>
                                                    <div class="card-body">
                                                        {{-- --}}
                                                        <p
                                                            style="color: #666; font: 10pt/130% Helvetica, Arial, sans-serif;">
                                                            HP – Clavier professionnel USB mince, branchement par câble,
                                                            interface USB, compatible avec les ordinateurs,
                                                            membraneTechnologie interrupteur à clé : MembraneTechnologie
                                                            de connectivité du clavier/pavé numérique : CâbleInterface
                                                            hôte clavier/pavé numérique : USBHauteur clavier/pavé
                                                            numérique : 0,8 po (21 mm)Largeur du clavier/pavé numérique
                                                            : 17,2 po (436,8 mm)Profondeur du clavier/pavé numérique :
                                                            5,4 po (137,6 mm)Poids (approximatif) : 960 gAppareil pris
                                                            en charge : OrdinateurGarantie limitée : 1 an
                                                        </p>
                                                        {{-- --}}

                                                    </div>
                                                </div>
                                                {{-- --}}

                                            </div>
                                        </div>

                                        {{-- --}}

                                    </div>
                                </div>

                                {{-- --}}
                            </div>

                        </div>

                    </div>


                </div>
                {{--end all middle content --}}

                {{--all right content --}}
                <div class="col-lg-2">

                    <div class="mb-3 card">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                            <center><i class="fa fa-list"></i></center>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            {{-- --}}
                        </div>
                    </div>
                    {{-- --}}
                    <div class="mb-3 card">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold;font-size:12px;">
                            <center>Find Products in your Country</center>
                        </div>
                        <div class="card-body">
                            {{-- --}}
                            {{-- --}}
                            <div class="card">
                                <div class="mt-2 card-body">
                                    <span class="mb-2 d-flex titleDetails_">
                                        <img src="{{ asset('assets/icons/CA.png') }}" alt="" width="30" height="20"
                                            class="img_icons_2">&nbsp;Canada &nbsp;<span class="badge_3">2</span></span>
                                    <p id="cardsearch" align="right"><i class="fa fa-search-plus"></i> View <span
                                            class="counter" data-target="653">0</span> Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- --}}

                    {{-- --}}
                    <div class="mb-3 card">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold;font-size:12px;">
                            <center>Premium Related Products</center>
                        </div>
                        <div class="card-body">

                            {{-- --}}
                            <div class="card">
                                <div class="mt-2 card-body">
                                    <div class="">
                                        <div class="mb-2 card"> {{-- shadow-sm --}}
                                            <div class="containeroverlay">
                                                <div class="">
                                                    <img class="card-img-top"
                                                        src="{{ asset('assets/images/avatar_nzuzi.png') }}"
                                                        height="200px" alt="...">
                                                </div>


                                                <div class="overlay overlayTop4">
                                                    <div class="text">

                                                        <a href="#" id="removeunderline_">
                                                            Order Now!<br>
                                                            Product Details
                                                        </a>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <p style="font-size: 15px;text-align:center"><span style="color: #666;">0
                                            Photos</span>

                                    </p>
                                </div>
                            </div>

                            {{-- --}}
                            <div class="mt-2 card">
                                <div class="mt-2 card-body">
                                    <div class="">
                                        <div class="mb-2 card"> {{-- shadow-sm --}}
                                            <div class="containeroverlay">
                                                <div class="">
                                                    <img class="card-img-top"
                                                        src="{{ asset('assets/images/avatar_nzuzi.png') }}"
                                                        height="200px" alt="...">
                                                </div>


                                                <div class="overlay overlayTop4">
                                                    <div class="text">

                                                        <a href="#" id="removeunderline_">
                                                            Order Now!<br>
                                                            Product Details
                                                        </a>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <p style="font-size: 15px;text-align:center"><span style="color: #666;">0
                                            Photos</span>

                                    </p>
                                </div>
                            </div>



                        </div>
                    </div>


                    {{-- --}}



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
