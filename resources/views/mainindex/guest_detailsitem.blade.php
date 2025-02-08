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

    <section class="py-2 border-bottom" id="">
        <div class="">
            <div class="loader"></div>
            <div class="container-fluid">

                <div class="row g-2 justify-content-center">

                    <div class="mb-4 col-lg-10 mb-lg-0">

                        <div class="mb-3 card card6">
                            <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">

                                @foreach ($category_name as $row)
                                  <div class="col-11"><img src="{{ '/storage/assets/images/' . $row->category_image }}" height="20"
                                   width="25" class="img_icons">
                                  <span style=""></span><a href="{{ route('user.viewpost') }}" class="hrefCss3s" style="color:#FFF">{{$row->category_name_desc}}  </a>
                                @endforeach
                                <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FFF">@foreach ($subcategories_name as $row1)   {{ $row1->sub_category_name_en }}  @endforeach </a>
                                <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FFF">@foreach ($article_name as $row2)   {{ $row2->article_name_en }} @endforeach </a>
                               <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FF7519">@foreach ($subproduct_name as $row3) {{ $row3->sub_product_name_en }} @endforeach </a>
                           </div>
                         </div>

                           {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
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
                                                            @forelse ($viewImage as $key => $slider)
                                                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                <img src="{{ (!empty($slider->image_name)) ? url('/storage/assets/uploads', $slider->image_name) : url('/storage/assets/images/avatar_nzuzi_default.png')}}"
                                                                class="d-block w-100" alt="...">
                                                            </div>

                                                            @empty
                                                            <center><p>No Image Found</p></center>
                                                            @endforelse
                                                        </div>
                                                        <div class="overlay overlayTop1">

                                                            <h2 id="cssh3_" class="h2_">
                                                                <b data-bs-toggle="modal"
                                                                data-bs-target="#login_Modal"><i class="fa fa-plus-circle"></i> Add new product</b>
                                                                <br><br>
                                                                <a href="javascript:void(0)" id="removeunderline" data-bs-toggle="modal"
                                                                data-bs-target="#login_Modal">
                                                                    <b><i class="fa fa-gift"></i> Order Now!</b>
                                                                </a>
                                                            </h2>
                                                        </div>
                                                        {{-- <div class="overlay overlayTop1_">

                                                            <h2 id="cssh3">
                                                                <a href="{{ route('user.editproductitem', ['upload_id' =>$photoIDS ])}}" style="text-decoration: none;color:#fff"><b><i class="fa fa-edit"></i> Edit products</b></a>
                                                                <br><br>

                                                            </h2>
                                                        </div> --}}
                                                     </div>

                                                     <div class="row">
                                                         <div class="col-md-12">

                                                            @forelse ($countImage as $c)
                                                              <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('itempictures', ['upload_id' =>$photoIDS ])}}" class="linkPhoto">{{ $c }} photos </a> </p>
                                                             @empty
                                                          @endforelse
                                                        </div>
                                                         <div class="col-md-0">
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



                                            {{-- --}}
                                            <div class="col-md-4">
                                                {{-- --}}
                                                <div class="card">
                                                    <div class="card-body">
                                                        @forelse ($getimageid as $row)
                                                        <div class="row">
                                                            <div class="mt-2 col-10">
                                                                <a href="#" class="homecontent_details"
                                                                    style="font-size:2.6vmin;"> {{ \Illuminate\Support\Str::title($row->item_name) }}
                                                                </a>
                                                            </div>
                                                            <div class="col-2">
                                                                @if($row->type =='New')
                                                                <img src="{{ asset('assets/images/new.png') }}" alt=""
                                                                    style="background-color:transparent; border:none;">
                                                                @else
                                                                <img src="{{ asset('assets/images/sale.png') }}" alt=""
                                                                style="background-color:transparent; border:none;">
                                                                @endif
                                                            </div>
                                                            <span
                                                                style="border: 1px solid rgb(214, 211, 211);border-style: dashed;"></span>
                                                            <h6 class="mt-1 card-title fw-bold current_nzuzi_mping__">
                                                                {{ $row->currency }} {{ number_format($row->price,2) }}<br>   <strike class="current_nzuzi_mping_"> {{ $row->currency }} {{ number_format($row->old_price) }}</strike></h6>

                                                            <p class="mb-4 titleDetails">
                                                                <span class="d-flex">Product Type:&nbsp; {{ $row->product_type }}</span>
                                                                <span class="d-flex"> Color:&nbsp;<span
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
                                                                <span class="d-flex">Quantity:&nbsp; {{ $row->pieces }}</span>
                                                                <span class="d-flex">Condition:&nbsp; {{ $row->type }}</span>
                                                                <span class="d-flex">Price:&nbsp;
                                                                    @if ($row->negotiable == "Negotiable")
                                                                         <span class="d-flex" style="color:#666;font-weight:bold">Price Negotiable</span>
                                                                     @else
                                                                         <span class="d-flex" style="color:#666;font-weight:bold">Price No Negotiable</span>
                                                                    @endif
                                                                </span>
                                                                <span class="d-flex">Disponibility:&nbsp;
                                                                    @if($row->disponibility == 1)
                                                                         <span class="d-flex" style="color:#00a61c;font-weight:bold">Available</span>
                                                                      @else
                                                                        <span class="d-flex" style="color:#f14c36;font-weight:bold">Sold</span>
                                                                      @endif

                                                                </span>
                                                                <span class="d-flex" data-bs-toggle="modal"
                                                                data-bs-target="#login_Modal">Go to:&nbsp; <a href="javascript:void(0)"
                                                                      {{-- {{ $row->product_web_link }} --}}
                                                                        style="color:#ff7519;font: 10pt/130% Helvetica, Arial, sans-serif; font-weight:bold">{{ $row->product_web_name }}</a></span>
                                                            </p>
                                                            <p>
                                                                <span class="titleDetails d-flex">Posted
                                                                    on:&nbsp;{{ \Carbon\Carbon::parse($row->post_date_of_item)->diffForHumans()  }}</span>
                                                                <span class="mb-2 titleDetails d-flex">Views: {{ $row->views }}</span>

                                                                {{-- star rating --}}
                                                                <span class="my-rating-9"></span>
                                                                <span class="live-rating"></span>


                                                            <div>

                                                                @if(!Auth::check())
                                                                <span data-bs-toggle="modal"
                                                                    data-bs-target="#login_Modal"> <button type="button"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Order Now!"
                                                                        class="btn btn-outline w-100 DetailsBtn">
                                                                        <i class="fa fa-gift"></i> Order
                                                                        Now!</button></span>
                                                                @else
                                                                  <a href="javascript:void(0)" id="removeunderline">
                                                                   <i class="fa fa-gift"></i> Order Now!
                                                                 </a>
                                                               @endif

                                                            </div>
                                                            </p>
                                                        </div>

                                                    </div>
                                                    @empty
                                                    <center><p class="alert alert-warning">No Record Found</p></center>
                                                  @endforelse
                                                </div>
                                            </div>
                                            {{-- --}}
                                            <div class="col-md-3">
                                                {{-- --}}
                                                @forelse ($getimageid as $row3)

                                                {{-- --}}
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col-2">
                                                                <img class="rounded-img"
                                                                    src="{{ (!empty($row3->profile)) ? url('/storage/assets/uploads/'.$row3->profile) :  url('/storage/assets/images/deafault_pic.png')}}"
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
                                                                    {{ Str::ucfirst($row->last_name) }} {{ Str::ucfirst($row->first_name) }}</span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;Country:&nbsp;{{ $row->countryname }}:&nbsp;<img
                                                                    src="{{ url('assets/flags/'.$row->flag) }}" alt=""
                                                                    width="30" height="20" class="img_icons_2"></span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;Province:&nbsp;{{ $row->statename }}</span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;City:&nbsp;{{ $row->cityname }}</span>
                                                            <span class="mb-2 d-flex titleDetails_"><i
                                                                 class="fa fa-shopping-cart"></i>&nbsp;<a
                                                                    style="color:#ff7519; font-weight:bold" href="{{ route('guest.shop_number',['id'=> encrypt($row->business_id)]) }}"> See Shop {{ $row->business_name }}</a></span>
                                                            <span class="mb-2 d-flex titleDetails_ hide-phone-number"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Login to view the Contact details of this seller"><i
                                                                    class="mt-1 fa fa-phone"></i>&nbsp;Mobile:&nbsp;{{ Str::limit($row->mobile, 4,  '') }}</span>
                                                            <span class="mb-2 d-flex titleDetails_ hide-phone-number"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Login to view the Contact details of this seller"><i
                                                                    class="mt-1 fa fa-phone"></i>&nbsp;Telephone:&nbsp;{{ Str::limit($row->phone,4,  '') }}</span>
                                                            <span class="mb-2 d-flex titleDetails_"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Click here to order from Desange Queen..."><a
                                                                    href="#" class="hrefCss"><i
                                                                        class="fa fa-plus-circle"></i>&nbsp; More
                                                                    Details</a> |
                                                                    @if ($row->islogged === "Online")
                                                                     Online:
                                                                     <img src="{{asset('assets/images/online.png')}}" alt="">
                                                                    @else
                                                                    Offline: <img src="{{asset('assets/images/off.png')}}" alt="">
                                                                    @endif
                                                            </span>

                                                            <span data-bs-toggle="modal"
                                                                data-bs-target="#login_Modal"><span
                                                                    class="mb-2 d-flex titleDetails__"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Click here to leave message"><i
                                                                        class="mt-1 fa fa-envelope"></i>&nbsp;Leave a message</span></span>

                                                        </p>

                                                    </div>

                                                </div>

                                            @empty

                                            @endforelse
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
                                                                        class="badge rounded-pill bg-warnings">
                                                                        @if($countFeedback != 0)
                                                                          {{ $countFeedback }}
                                                                        @else
                                                                          0
                                                                        @endif
                                                                    </span></a></button>
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
                                                                            class="badge rounded-pill bg-warnings">
                                                                            @if($countFeedback != 0)
                                                                            {{ $countFeedback }}
                                                                          @else
                                                                            0
                                                                          @endif
                                                                        </span>
                                                                    </font>
                                                                </p>
                                                                <p style="margin-top:-5px; background-color:#FFF; border:none;"
                                                                    align="center" class="p">
                                                                <div class="card">
                                                                    <div class="card-body justify-content-center">
                                                                        @foreach ($messagecomment as $msg)
                                                                        <div class="row" id="items_container">
                                                                         <div class="mt-2">
                                                                           <div class="flex-row p-3 d-flex">
                                                                             <img src="{{ (!empty($msg->profile_user)) ? url('/storage/assets/uploads/'.$msg->profile_user) :  url('/storage/assets/images/deafault_pic.png')}}" width="40" height="40" class="mr-3 rounded-circle">&nbsp;&nbsp;
                                                                             <div class="w-100">
                                                                               <div class="d-flex justify-content-between align-items-center">
                                                                                   <div class="flex-row d-flex align-items-center">
                                                                                     <span class="mr-2">{{ Str::title($msg->full_name) }}</span>
                                                                                     {{-- <small class="c-badge">Top Comment</small> --}}
                                                                                   </div>
                                                                                   <small>{{ \Carbon\Carbon::parse($msg->message_date)->diffForHumans() }}</small>
                                                                             </div>

                                                                             <p class="mb-0 text-justify comment-text" style="color: #666;">{{ Str::ucfirst($msg->message) }} </p>
           {{--
                                                                             <div class="flex-row d-flex user-feed">
                                                                               <span class="wish"><i class="mr-2 fa fa-heartbeat"></i>24</span>
                                                                               <span class="ml-3"><i class="mr-2 fa fa-comments-o"></i>Reply</span>
                                                                             </div> --}}

                                                                           </div>
                                                                         </div>
                                                                       </div>
                                                                   </div>
                                                                       @endforeach
                                                                        {{-- <p style="margin-top:4%; background-color:#FFF; border:none;"
                                                                            align="center"><i
                                                                                class="fa fa-comments fa-5x"
                                                                                style="color:#ff7519;"></i></p>
                                                                        <p style="margin-bottom:5%; background-color:#FFF; border:none;"
                                                                            align="center" class="titleDetails">No
                                                                            Comment Found</p> --}}
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
                                                            @forelse ($getimageid as $row2)
                                                            <div class="row">
                                                                <p class="titleDetails">{{ $row2->item_descriptions }}</p>
                                                            </div>
                                                            @empty
                                                            <center><p class="alert alert-warning">No Record Found</p></center>
                                                          @endforelse

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
                                        @forelse ($countryGroupCount as $r)
                                        <a href="{{ route('viewcountryproducts',['country_id' => encrypt($r->country_id)]) }}" class="hrefCss">
                                            <img
                                                src="{{ url('assets/flags/'.$r->flag) }}" alt=""
                                                width="30" height="20" class="img_icons_2">&nbsp;{{ $r->name }}
                                            <span class="badge_3">{{ $r->total_countries }}</span>
                                        </a>
                                        @empty
                                        @endforelse
                                    </p>

                                    <p style="margin-left:2%; background-color:#FFF; border:none;" align="right">
                                        <a href="{{ route('viewallcountries') }}" class="current_link hrefCss">
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

                                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                      <div class="containeroverlay">
                                        {{-- containeroverlay --}}
                                            <div class="carousel-inner">


                                                <div class="mb-3 carousel-item active">

                                                        <center>
                                                         <a href="#" style="color:#ff7519; font-weight:bold"><br><br><br><i class="mb-1 fa fa-tags fa-5x"></i><br>
                                                            Premium Related Automobiles Products</a>
                                                        </center>

                                                </div>
                                                @forelse ($main_img as $key => $slider)
                                                <div class="carousel-item" style="height: 300px">
                                                    <center>
                                                        <img src="{{ (!empty($slider->Images)) ? url('/storage/assets/uploads', $slider->Images) : url('/storage/assets/images/avatar_nzuzi_default.png')}}"
                                                        class="card-img-top_ embed-responsive-item" alt="...">

                                                    </center>
                                                    <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('itempictures', ['upload_id' =>encrypt($slider->ImageIDS) ])}}" class="linkPhoto">{{ $slider->upload_ids }} photos </a> </p>
                                                </div>
                                                @empty
                                                <center><p>No Image Found</p></center>
                                                @endforelse

                                            </div>

                                             <div class="overlay overlayTop2_">

                                                <h2 id="cssh3">
                                                   <b style="color:#fff"><i class="fa fa-tags"></i> Product Details</b>

                                                 </h2>
                                              </div>
                                         </div>


                                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2"
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
