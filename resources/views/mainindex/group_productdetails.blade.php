{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="col-lg-12">

    {{-- <header class="py-5 _main ">
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
    </header> --}}

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

            <div class="row g-1">
                <div class="col-md-2">


                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-11"><i class="fa fa-list" style="color:#fff"
                                        class="titleDetails"></i>
                                    <span style="color:#fff" class="titleDetails"><a href="#"
                                            style="color:#fff; font-weight:bold;text-decoration:none">@foreach ($producttype as $row4) {{ $row4->product_type }} @endforeach</a></span>
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                              {{--  --}}
                        </div>
                    </div>

                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-11">
                                    <span style="color:#fff" class="titleDetails"><a href="#"
                                            style="color:#fff; font-weight:bold;text-decoration:none">@foreach ($producttype as $row4) {{ $row4->product_type }} @endforeach  Colors</a></span>


                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                              {{--  --}}
                              <div class="row g-1">
                                @forelse($producttypeall as $rowx)
                                <div class="col-3">
                                    <span
                                    class="py-2mt-1" style="
                                     display: inline-block;
                                    font-size: 12px;
                                    font-weight: bold;
                                    line-height: 15px;
                                    color: #9f9f9f;
                                    width: 20px;
                                    height: 15px;
                                    background-color: {{ $rowx->product_color }};
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
                                    "></span>
                                </div>
                                @empty

                                @endforelse

                               </div>
                        </div>
                    </div>

                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-11">
                                    <span style="color:#fff" class="titleDetails"><a href="#"
                                            style="color:#fff; font-weight:bold;text-decoration:none">@foreach ($producttype as $row4) {{ $row4->product_type }} @endforeach  Prices Ranges</a></span>
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-1">
                                @forelse($productPriceRange as $p)
                                <div class="col-3">
                                    {{ $p->prices  }}<span>,</span>
                                </div>
                                @empty

                                @endforelse

                               </div>
                        </div>
                    </div>


                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-11">
                                    <span style="color:#fff" class="titleDetails"><a href="#"
                                            style="color:#fff; font-weight:bold;text-decoration:none">Find Uniforms in your Country</a></span>
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row g-2">
                                @foreach ($countryGroupCount as $r)
                             <div class="mb-2 align-self-start">
                                <a href="{{ route('viewcountryproducts',['country_id' => encrypt($r->country_id)]) }}" class="hrefCss">
                                    <img
                                        src="{{ url('assets/flags/'.$r->flag) }}" alt=""
                                        width="30" height="20" class="img_icons_2">&nbsp;{{ $r->name }}&nbsp;
                                            @if ($r->total_countries != 0)
                                              <span class="badge_3">({{ $r->total_countries }})</span>
                                            @else
                                              <span class="badge rounded-pill bg-light text-dark"><span
                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                           @endif
                                   </a>
                               </div>
                               @endforeach
                            </div>

                            <div class="card">
                            <p class="mx-3 mt-2" style="margin-left:2%; background-color:#FFF; border:none;" align="right">
                                <a href="{{ route('viewallcountries') }}" class="current_link hrefCss">
                                    <i class="fa fa-search fa-1x"></i>
                                    View All Countries
                                </a>
                            </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">

                                @foreach ($catname as $row)
                                  <div class="col-11"><img src="{{ '/storage/assets/images/' . $row->category_image }}" height="20"
                                   width="25" class="img_icons">
                                  <span style=""></span><a href="{{ route('user.viewpost') }}" class="hrefCss3s" style="color:#FFF">{{$row->category_name_desc}}  </a>
                                @endforeach
                                <font color="#ff7519">&nbsp;&nbsp;» </font>

                                 {{--  <a href="#" class="hrefCss3s" style="color:#FFF">@foreach ($articlename as $row2)   {{ $row2->article_name_en }} @endforeach </a>
                               <font color="#ff7519">&nbsp;&nbsp;» </font> --}}
                               <a href="#" class="hrefCss3s" style="color:#FFF">@foreach ($producttype as $row4) {{ $row4->product_type }} @endforeach </a>
                                 <font color="#ff7519">&nbsp;&nbsp;» </font>
                                  <a href="#" class="hrefCss3s" style="color:#FF7519">@foreach ($producttype as $row4) {{ $row4->product_type }} @endforeach </a>
                           </div>
                         </div>
                        </div>
                        <div class="card-body">
                               <div class="mt-3 row g-1">
                                    @forelse($producttypeall as $row)

                                    <div class="col-md-4 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
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
                                                            <a href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id),'product_type' => $row->product_type ]) }}" id="removeunderline">
                                                                <i class="fa fa-tag"></i> Product&nbsp;Details
                                                            </a><br><br>
                                                            <a href="{{ route('g.shop_number',['upload_id' => encrypt($row->ImageIDS), 'id'=> encrypt($row->userid)]) }}" id="removeunderline">
                                                                <i class="fa fa-shopping-cart"></i> See
                                                                Store&nbsp;&nbsp;&nbsp;&nbsp;
                                                            </a><br><br>
                                                            <a  href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id),'product_type' => $row->product_type ]) }}" id="removeunderline">
                                                                <i class="fa fa-phone"></i>
                                                                <span class="hide-phone-number2">{{ Str::limit($row->phone,4,  '') }}</span>
                                                            </a>

                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body d-flex flex-column">
                                                <h6 class="card-title fw-bold">{{ Str::ucfirst(Str::limit($row->item_name, 16, '...')) }}</h6>
                                                <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                        number_format($row->price,2) }}</span>
                                                    <br> <strike> {{ number_format($row->old_price,2) }}</strike>
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
                                </div>




                            {{-- <div class="mb-3 row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control search" placeholder="Search Country..."
                                            id="search_input">
                                        <span class="input-group-text" id="search_span"><i
                                                class="fa fa-search me-2 text-light"></i> </span>
                                    </div>
                                </div>
                             </div> --}}


                             {{-- <div id="country_list"></div> --}}
                            {{-- <div class="row g-2" id="hideid">

                                @foreach ($fetchcoutrieswithcount as $row)
                                   <div class="mb-2 col-md-3">
                                    <a href="#" class="hrefCss">
                                        <img
                                            src="{{ url('assets/flags/'.$row->flag) }}" alt=""
                                            width="30" height="20" class="img_icons_2">&nbsp;{{ Str::limit($row->name, 8) }}&nbsp;
                                            <span class="badge rounded-pill bg-light text-dark"><span
                                                style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span>
                                    </a>
                                   </div>
                                @endforeach


                            </div> --}}

                        </div>
                    </div>
                </div>


                    <div class="col-md-2">
                        <div class="mb-3 card card6">
                            <div class="card-header"
                                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                <div class="row">
                                    <div class="col-11"><i class="fa fa-list" style="color:#fff"
                                            class="titleDetails"></i>
                                        <span style="color:#fff" class="titleDetails"><a href="#"
                                                style="color:#fff; font-weight:bold;text-decoration:none">CATEGORIES</a></span>
                                    </div>
                                    {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                  {{--  --}}
                            </div>
                        </div>
                    </div>



            </div>




            {{-- <div class="mb-4 col-lg-12 mb-lg-0">
                <div class="mb-3 card card6">
                <div class="card-body ">

                      <h2>Mid</h2>

                    </div>
                </div>

            </div> --}}
        </div>
    </section>

</div>


{{--all middle content --}}


<br>



@endsection
