{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<header class="py-3 bg-white">

    <section>
        <div class="text-center page-heading">
            <div class="container">
                <center>
                    <!-- Advertisement  -->
                    <a href="#"><img src="{{ asset('assets/images/advertisement2.png') }}" class="img-fluid" alt="..."
                            data-aos="zoom-in" data-aos-delay="300"></a>
                    <!-- // Advertisement  -->
                </center>

            </div>
        </div>

    </section>
    <section class="py-4 border-bottom" id="">
        <div class="">
            <div class="loader"></div>
            <div class="container-fluid">

                <div class="row g-2 justify-content-center">

                    <div class="mb-4 col-lg-10 mb-lg-0">

                        <div class="mb-3 card card6">
                            <div class="card-header"
                                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                <div class="row">
                                    <div class="col-11"><a href="#" style="color:#fff; font-weight:bold"
                                            class="titleDetails">
                                            <img src="{{ asset('assets/images/icon1.png') }}" height="20" width="20"
                                                class="img_icons">
                                            Apparel, Textiles &amp; Accessories</a>
                                        <font color="#ff7519">&nbsp;&nbsp;»</font>
                                        <a href="#" style="color:#fff; font-weight:bold"
                                            class="titleDetails">Apparel</a>
                                        <font color="#ff7519"> &nbsp;» </font>
                                        <a href="#" style="color:#fff; font-weight:bold" class="titleDetails"> Women’s
                                            Clothing</a>
                                        <font color="#ff7519"> &nbsp;»&nbsp;<b>&nbsp;</b></font>
                                    </div>
                                    {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                                </div>
                            </div>
                            <div class="card-body" style="margin-left:-10px">
                                {{-- --}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row g-2">
                                            {{-- --}}
                                            <div class="col-md-5"  style="border: 1px solid #dee2e6!important;border-radius:6px">
                                                {{-- --}}
                                                 <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="containeroverlay">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img src="{{ (!empty($prductdetails->product_image)) ? url('/assets/uploads/'.$prductdetails->product_image) :  url('assets/uploads/avatar_nzuzi1.png')}}"
                                                                    class="d-block w-100" alt="...">
                                                            </div>
                                                            <div class="carousel-item">
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

                                                        <div class="overlay overlayTop1">

                                                            <h2 id="cssh3">
                                                                <b><i class="fa fa-tags"></i> product Details</b>
                                                                <br><br>
                                                                <a href="#" id="removeunderline">
                                                                    <b><i class="fa fa-gift"></i> Order Now!</b>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                     </div>


                                                     <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#myCarousel" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                     </button>
                                                     <button class="carousel-control-next" type="button"
                                                        data-bs-target="#myCarousel" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                     </button><br>
                                                     <div class="row">
                                                         <div class="col-md-12">
                                                            <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('itempictures',['id'=>encrypt($prductdetails->id)]) }}" class="linkPhoto">2 photos </a> </p>
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
                                                                    style="font-size:2.6vmin;"> Ensemble pyjama (Diorre)
                                                                </a>
                                                            </div>
                                                            <div class="col-2">
                                                                <img src="{{ asset('assets/images/new.png') }}" alt=""
                                                                    style="background-color:transparent; border:none;">
                                                            </div>
                                                            <span
                                                                style="border: 1px solid rgb(214, 211, 211);border-style: dashed;"></span>
                                                            <h6 class="mt-1 card-title fw-bold current_nzuzi_mping">{{
                                                                $prductdetails->product_price }}</h6>
                                                            <p class="mb-4 titleDetails">
                                                                <span class="d-flex">Product Type:&nbsp; Other
                                                                    Womens...</span>
                                                                <span class="d-flex"> Coulor:&nbsp;<span
                                                                        class="colorCss"></span></span>
                                                                <span class="d-flex">Quantity:&nbsp; 10</span>
                                                                <span class="d-flex">Condition:&nbsp; New</span>
                                                                <span class="d-flex">Price:&nbsp; Negotiable</span>
                                                                <span class="d-flex">Disponibility:&nbsp;
                                                                    Available</span>
                                                                <span class="d-flex">Go to:&nbsp; <a href="#"
                                                                        target="_blank"
                                                                        style="color:#ff7519;font: 10pt/130% Helvetica, Arial, sans-serif; font-weight:bold">www.mpingimarket.com</a></span>
                                                            </p>
                                                            <p>
                                                                <span class="titleDetails d-flex">Posted
                                                                    on:&nbsp;Wednesday,April 28, 2021</span>
                                                                <span class="mb-2 titleDetails d-flex">Views: 245</span>

                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                            <div>
                                                                <span data-bs-toggle="modal"
                                                                    data-bs-target="#login_Modal"> <button type="button"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Order Now!"
                                                                        class="btn btn-outline w-100 DetailsBtn">
                                                                        <i class="fa fa-gift"></i> Order
                                                                        Now!</button></span>

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
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col-2">
                                                                <img class="rounded-img"
                                                                    src="{{ asset('assets/images/7281603340072.jpeg') }}"
                                                                    alt="" width="40" height="40">
                                                            </div>
                                                            <div class="mt-3 col-10">
                                                                <p class="titleDetails">&nbsp;Seller & Buyer Details</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-user"></i>&nbsp;Name:&nbsp;
                                                                Desange Hagumi Queen</span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;Country:&nbsp;Canada:&nbsp;<img
                                                                    src="{{ asset('assets/icons/CA.png') }}" alt=""
                                                                    width="30" height="20" class="img_icons_2"></span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;Province:&nbsp;Quebec</span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;City:&nbsp;Rimouski</span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;<a
                                                                    style="color:#ff7519; font-weight:bold" href="#">See
                                                                    Shop Desange Queen...</a></span>
                                                            <span class="mb-2 d-flex titleDetails_"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Login to view the Contact details of this seller"><i
                                                                    class="mt-1 fa fa-phone"></i>&nbsp;Mobile:&nbsp;1(418)
                                                                509-2913 </span>
                                                            <span class="mb-2 d-flex titleDetails_"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Login to view the Contact details of this seller"><i
                                                                    class="mt-1 fa fa-phone"></i>&nbsp;Telephone:&nbsp;1(418)
                                                                509-2913 </span>
                                                            <span class="mb-2 d-flex titleDetails_"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Click here to order from Desange Queen..."><a
                                                                    href="#" class="hrefCss"><i
                                                                        class="fa fa-plus-circle"></i>&nbsp; More
                                                                    Details</a> | Offline: <img
                                                                    src="{{asset('assets/images/off.png')}}" alt="">
                                                            </span>
                                                            <span data-bs-toggle="modal"
                                                                data-bs-target="#login_Modal"><span
                                                                    class="mb-2 d-flex titleDetails__"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Click here to leave message"><i
                                                                        class="mt-1 fa fa-envelope"></i>&nbsp; Leave
                                                                    Message</span></span>

                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                            {{-- --}}
                                            {{-- --}}
                                            <div class="mt-4 row">
                                                <div class="col-md-9">

                                                    <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <button class="nav-link active" id="nav-shipping-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-shipping"
                                                                type="button" role="tab" aria-controls="nav-shipping"
                                                                aria-selected="true"><i class="fa fa-truck fa-2x"
                                                                    style="color:#1a6be8"></i>&nbsp;<a href="#Shipping1"
                                                                    data-toggle="tab" class="tab_">SHIPPING</a></button>
                                                            <button class="nav-link" id="nav-payment-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-payment"
                                                                type="button" role="tab" aria-controls="nav-payment"
                                                                aria-selected="false"><i class="fa fa-lock fa-2x"
                                                                    style="color:#00a61c"></i>&nbsp;<a href="#Payment1"
                                                                    data-toggle="tab" class="tab_">PAYMENT</a></button>
                                                            <button class="nav-link" id="nav-return-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-return"
                                                                type="button" role="tab" aria-controls="nav-contact"
                                                                aria-selected="false"><i class="fa fa-refresh fa-2x"
                                                                    style="color:#f25433"></i>&nbsp;<a href="#Return1"
                                                                    data-toggle="tab" class="tab_">RETURN
                                                                    POLICY</a></button>
                                                            <button class="nav-link" id="nav-review-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-review"
                                                                type="button" role="tab" aria-controls="nav-review"
                                                                aria-selected="false"><i class="fa fa-comments fa-2x"
                                                                    style="color:#ffe305"></i>&nbsp;<a href="#Product1"
                                                                    data-toggle="tab" class="tab_">REVIEW <span
                                                                        class="badge rounded-pill bg-warnings">0</span></a></button>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-shipping"
                                                            role="tabpanel" aria-labelledby="nav-shipping-tab">
                                                            <div>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails"><i
                                                                        class="fa fa-truck"></i>
                                                                    <font color="#ff7519;"> Shipping</font>
                                                                </p>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails">
                                                                    1. How will I get the item?: Free Shipping
                                                                </p>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails">
                                                                    2. When will I receive the item?: 3 to 7 days
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-payment" role="tabpanel"
                                                            aria-labelledby="nav-payment-tab">
                                                            <div>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails"><i
                                                                        class="fa fa-lock"></i>
                                                                    <font color="#ff7519;"> Payment</font>
                                                                </p>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails">
                                                                    1. How do I pay?: Pay on delivery or pickup
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-return" role="tabpanel"
                                                            aria-labelledby="nav-return-tab">
                                                            <div>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails"><i
                                                                        class="fa fa-refresh"></i>
                                                                    <font color="#ff7519;"> Return policy</font>
                                                                </p>
                                                                <p style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails">
                                                                    Returns accepted within 3 days, only for damaged or
                                                                    wrong products. Return offered in the form of
                                                                    Product exchange. Buyer is the responsible for the
                                                                    shipping fees.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                                            aria-labelledby="nav-review-tab">
                                                            <div>
                                                                <p  style="background-color:#FFF; margin-top:1%; margin-left:2%; border:none"
                                                                    align="justify" class="titleDetails"><i
                                                                        class="fa fa-comments"></i>
                                                                    <font color="#ff7519;"  data-bs-toggle="modal"
                                                                    data-bs-target="#login_Modal"><span>Leave your Review</span>
                                                                        <span
                                                                            class="badge rounded-pill bg-warnings">0</span>
                                                                    </font>
                                                                </p>
                                                                <p style="margin-top:-5px; background-color:#FFF; border:none;"
                                                                    align="center" class="p">
                                                                <div class="card">
                                                                    <div class="card-body justify-content-center">
                                                                        <p style="margin-top:4%; background-color:#FFF; border:none;"
                                                                            align="center"><i
                                                                                class="fa fa-comments fa-5x"
                                                                                style="color:#ff7519;"></i></p>
                                                                        <p style="margin-bottom:5%; background-color:#FFF; border:none;"
                                                                            align="center" class="titleDetails">No
                                                                            Comment Found</p>
                                                                    </div>
                                                                </div>

                                                                </p>


                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-3">

                                                    <div class="mb-3 card card6">
                                                        <div class="card-header" style="">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <span style="" class="titleDetails"><i
                                                                            class="fa fa-tag"></i> Product
                                                                        Descriptions</span>
                                                                </div>
                                                                {{-- <div class="col-1"><i
                                                                        class="fa fa-times text-dark close-icon6"></i>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <p class="titleDetails">Ensemble pyjama (Diorre)</p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- --}}

                                        </div>
                                    </div>
                                </div>
                                {{-- --}}
                            </div>
                        </div>
                    </div>

                    @include('mainindex.modal.login')

                    <div class="mb-4 col-lg-2 mb-lg-0">

                        <div class="mb-3 card card6">
                            <div class="card-header"
                                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                <div class="row">
                                    <div class="col-11"><i class="fa fa-list" style="color:#fff"
                                            class="titleDetails"></i>
                                        <span style="color:#fff" class="titleDetails"><a href="#"
                                                style="color:#fff; font-weight:bold;text-decoration:none">Women’s
                                                Clothing</a></span>
                                    </div>
                                    {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">

                                </div>

                            </div>
                        </div>

                        {{-- --}}

                        <div class="mb-3 card card6">
                            <div class="card-header"
                                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                <div class="row">
                                    <div class="col-11"><i class="fa fa-map-marker-alt" style="color:#fff"
                                            class="titleDetails"></i>
                                        <span style="color:#fff" class="titleDetails"><a href="#"
                                                style="color:#fff; font-weight:bold;text-decoration:none">Find Product
                                                in your Country</a></span>
                                    </div>
                                    {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <p class="top4"
                                        style="margin-left:2%; margin-top:1%; background-color:#FFF; border:none;">

                                        <a href="country/?id=186&amp;country=39" class="hrefCss">
                                            <img src="{{ asset('assets/icons/CA.png') }}" alt="" width="30" height="20"
                                                class="img_icons_2"> Canada
                                            <span class="badge_3">6</span>
                                        </a>
                                    </p>

                                    <p style="margin-left:2%; background-color:#FFF; border:none;" align="right">
                                        <a href="../../../country/countries.php?id" class="current_link hrefCss">
                                            <i class="fa fa-search fa-1x"></i>
                                            View All Countries
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>
                        {{-- --}}

                        <div class="mb-3 card card6">
                            <div class="card-header"
                                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                <div class="row">
                                    <div class="col-11"><i class="fa fa-tags" style="color:#fff"
                                            class="titleDetails"></i>
                                        <span style="color:#fff" class="titleDetails"><a href="#"
                                                style="color:#fff; font-weight:bold;text-decoration:none"> Premium
                                                Related Products</a></span>
                                    </div>
                                    {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    {{-- --}}

                                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                      <div class="containeroverlay">
                                            <div class="carousel-inner">

                                                @foreach($allProducts as $key => $slider)
                                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                    <img src="{{url('/assets/uploads/', $slider->product_image)}}"
                                                        class="d-block w-100" alt="...">
                                                </div>
                                                @endforeach
                                            </div>

                                             <div class="overlay overlayTop2">

                                                <h2 id="cssh4">
                                                   <b><i class="fa fa-tags"></i> product Details</b>

                                                 </h2>
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

                            </div>
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
                                                <p class="card-text"><a href="">GREAT&nbsp;PRODCUTS&nbsp;AT UNBEATABLE&nbsp;PRICES</a>
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
                    </section>
                </header>
                @endsection
