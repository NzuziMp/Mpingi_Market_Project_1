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


    {{-- <div class="wrappers" style="z-index: 5">
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
    </div> --}}

    <section class="py-2 border-bottom" id="features">
        <div class="container">

            {{--all middle content --}}
            <div class="mb-4 col-lg-12 mb-lg-0">
                {{-- --}}
                <div class="card">
                    <h5 class="card-header headerPanelCss"><i class="fa  fa-question-circle"></i> Frequently Asked
                        Questions</h5>
                    <div class="card-body">
                        <p>
                        <h6 class="text-titleCss">When I visit the free sample calendar it still says “Check back soon
                            for today's free sample”- Why is that?</h6>
                        <p class="text-PCss">
                            If you are seeing the "Check back soon" message it is because we either have not yet posted
                            today’s sample find or your Internet browser has saved that image on your computer. Browsers
                            often do this to increase their speed and efficiency for websites you visit often. We post a
                            daily free sample find every morning between 9 and 10 AM. If you still see the “Check back”
                            message at that time, try refreshing your Internet browser or close your browser completely
                            then reopen it again.
                        </p>
                        </p>
                        <div class="_wrapper">

                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">When I went to request the sample it said they were out
                                        or that I didn’t qualify to get the sample.</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        We sometimes offer exclusive free samples through allyou.com, but often we are
                                        scouting out other free samples being offered by other companies. Since most of
                                        these samples have no affiliation with All You, we make sure to the best of our
                                        ability the requesting process is simple and strait-forward before we post the
                                        sample. We want you to trust the sites we find and know they are legitimate,
                                        however, since these are not All You sites, we cannot control the quantity of
                                        samples, length of the offer or changes to the qualifications for receiving the
                                        sample after we post our daily find.
                                    </p>
                                </div>
                            </div>

                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">The free sample site won't work for me.</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        Sometimes theses sites are built with a program called Flash or may have pop-up
                                        windows (or both). Make sure you have the Macromedia Flash plug in (it’s a free
                                        update that most newer browsers come with, but not all) and you do not block
                                        pop-up windows.
                                    </p>
                                </div>
                            </div>

                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">I don't have a Facebook account and cannot accept
                                        Facebook offers. Why do I have to “Like” a company on Facebook to get the
                                        sample?</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        We strive to find the best free sample offers from around the Web every day and
                                        sometimes those samples are found on Facebook. We in no way want to alienate our
                                        readers who choose not to use Facebook, but many companies and brands use
                                        Facebook as a means of communicating with their audience and to distribute their
                                        free samples.
                                    </p>
                                </div>
                            </div>


                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">I don't want give my phone number to request a sample.
                                    </h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        Most sample sites we promote don't require a phone number but occasionally they
                                        do. You should only give the personal information you feel comfortable
                                        providing.
                                    </p>
                                </div>
                            </div>

                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">I don't want to have my email inbox overrun with
                                        newsletters, offers and possibly spam.</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        We suggest opening a free email account (through Yahoo or Gmail) to use just for
                                        entering online sweeps and requesting free samples.
                                    </p>
                                </div>
                            </div>

                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">I can’t see the free sample calendar.</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        If you cannot see the free sample calendar at all, it may be because you do not
                                        have JavaScript enabled in your browser’s preferences. You can change this in
                                        your browser set up.
                                    </p>
                                </div>
                            </div>

                            <div class="faq">
                                <button class="_accordion">
                                    <h6 class="text-titleCss_">How can i update image on mpingi.</h6>
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p class="text-PCss">
                                        If you cannot see the free sample calendar at all, it may be because you do not
                                        have JavaScript enabled in your browser’s preferences. You can change this in
                                        your browser set up.
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                {{-- --}}
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
                                    <p class="card-text"><a href="">GREAT&nbsp;PRODCUTS&nbsp;AT
                                            UNBEATABLE&nbsp;PRICES</a></p>
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
