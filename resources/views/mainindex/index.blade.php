@extends('layouts.main')
@section('content')
    <!-- Header-->
    <header class="py-5 bg-dark main">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js">
  </script>
        <script language="javascript" type="text/javascript">
$.get("https://ipinfo.io/json", function (response) {
    $("#ip").html("IP: " + response.ip);
    $("#address_1").html(response.city + ", " + response.region + ", " + response.country);
    $("#details").html(JSON.stringify(response, null, 4));
}, "jsonp");

</script>
        <div class="container ">
            <div class="row justify-content-start">
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

                        @forelse($products as $row)
                           {{--  --}}
                        @empty
                            {{--  --}}
                        @endforelse
                        <p class="text-white"><i class="fa fa-phone-square"></i> <!--+256 (0) 782796710 --> +1 (418) 732-1925 &nbsp; <i
                                class="fa fa-paper-plane"></i> contact@mpingimarket.com </p>
                        <h1 class="text-white display-5 fw-bolder">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont">MPINGI MARKET</h1>
                                        </a>
                                    </div>
                                    @foreach ($Subproductitems as $r)
                                    <div class="carousel-item">
                                        <a href="#">
                                            <h1 class="text-capitalize bigFont"><a href="{{ route('viewproductsdetails', ['product_type' =>  $r->slug, 'product_id' =>  encrypt($r->id), 'upload_id' => encrypt($row->ImageIDS)]) }}" style="text-decoration: none;color:#fff">   @if(session()->get('locale') === 'fr')  {{ Str::upper($r->sub_product_name_fr) }} @else {{ Str::upper($r->sub_product_name_en) }} @endif</a></h1>
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </h1>
                        <div class="justify-content-sm-center">
                            <p class="px-4 me-sm-3" style="color:#FF7519" data-aos="fade-right" data-aos-duration="1000">@if(session()->get('locale') === 'fr')   PLATEFORME GRATUITE DE MARCHÉ EN LIGNE @else FREE ONLINE MARKETPLACE PLATFORM  @endif</p>
                            <p class="px-4 me-sm-3" style="color:#dfdada">
                                <div id='address_1' style='color:#fff'></div>
                                </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @endsection

