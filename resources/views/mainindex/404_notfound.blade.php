{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="">
    <div class="loader"></div>
    <div class="container-fluid">
        <section class="">
            {{-- --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        {{-- blank div --}}
                    </div>
                    <div class="mt-4 col-md-4">
                        {{-- --}}
                        <div class="card">
                            <div class="text-center card">
                                <div class="card-header cardheaderCss">
                                    <h6 class="mt-2 header-title"><i class="fa fa-exclamation-triangle"></i> Page not found</h6>
                                </div>
                                <p class="top4"
                                    style="background-color:#FFF; border:none; margin-top:15%;color:#666"
                                    align="center">
                                    <img src="{{ asset('assets/images/logo_title_9.png') }}"> <br>
                                    <span id="showtime2">404</span>
                                </p>
                                {{-- <div class="mx-3 text-center alert alert-warning notfoundCss" role="alert">
                                    <i class="fa fa-exclamation-triangle fa-2x"></i> Page not found
                                    <p>

                                    </p>
                                </div> --}}

                                <div class="mx-2 mb-2 text-center card" style="border: none">
                                    <div class="card-header notfoundCss"  style="border: none">
                                        <i class="fa fa-exclamation-triangle fa-2x"></i> Page not found
                                    </div>
                                    <div class="card-body notfoundbodyTextCss">
                                       <p>
                                         Sorry, the document you requested is not available. Here are some steps you may try to find the page you were looking for:
                                       </p>
                                       <p>
                                         1.If you typed the URL by hand then please make sure that it is exactly as it should be. Also check the capitalization and that you are using forward slashes ( / ).
                                       </p>
                                       <p>
                                        2.If you are looking for information on a particular subject, please start on the MPINGI Home page or Site Map.
                                       </p>
                                       <p>
                                         3.Try searching the site using the search box at the top of this page.
                                       </p>
                                       <p>
                                         The MPINGI FAQ has answers to frequently asked questions about our site.
                                       </p>
                                    </div>

                                  </div>



                            </div>


                            {{-- --}}
                        </div>
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
        </header>
        @endsection
