{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="">
    <div class="loader"></div>
    <div class="container-fluid">
        <section class="">
            {{-- --}}
            <div class="card">
                <div class="card-body">

                    <div class="card">
                        <div class="card-header cardheaderCss2">
                            <i class='far fa-images'></i> Ensemble pyjama (Diorre) (2 )
                        </div>
                        <div class="card-body">
                            <div class="row g-1">

                                <div class="mb-2 col-3">
                                      <div class="overflow-hidden rounded-circle custom-circle-image" >
                                        <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                      </div>
                                  </div>
                                  <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>
                                 <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>
                                 <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>

                                 <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>
                                 <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>
                                 <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>
                                 <div class="mb-2 col-3">
                                    <div class="overflow-hidden rounded-circle custom-circle-image">
                                      <a href="{{ '/assets/uploads/'.$itemPictures->product_image }}" data-fslightbox="gallery" title=""> <img class="w-100 h-100" src="{{ '/assets/uploads/'.$itemPictures->product_image }}" alt="Card image cap"></a>
                                    </div>
                                 </div>

                            </div>
                        </div>
                      </div>

                </div>
                {{-- --}}

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
        </section>
        </header>
        @endsection
