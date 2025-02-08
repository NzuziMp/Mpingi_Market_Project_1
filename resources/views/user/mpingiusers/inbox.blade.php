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
                @include('user.mpingiusers.sidebar.sidebar')
                {{--end all left content --}}

                {{--all middle content --}}
                <div class="mb-4 col-md-7 mb-lg-0">
                    <div class="mb-3 card card6">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                            <div class="row">
                                <div class="col-11"><i class="fa fa-folder-open"></i> Inbox (1)
                                </div>
                                {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                            </div>
                        </div>
                        <div class="card-body">

                         {{-- alert update profile and business account --}}
                         @include('user.mpingiusers.middlealert.updateaccount')
                         {{--end alert update profile and business account  --}}

                            <div class="mt-3 card-body" style="background-color:#fcf8e3;color:#8a6d3b" align="left">
                                {{-- --}}
                                <p class=""
                                    style="text-align:center;bacground-color:#fcf8e3;color:8a6d3b;border:none;font: 10pt/130% Helvetica, Arial, sans-serif">
                                    <b><i class="fa fa-trash" style="font-size:1.3rem"></i> Delete Multiple Messages
                                    </b> Check the radion Button and click the Delete button to Delete Messages
                                    here
                                </p>

                            </div>

                            <button type="button" class="mt-4 btn btnColorfind2_" id="">DELETE</button>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <div class="flex-1">
                                                    <div class="form-check" style="font-size: 1.5rem">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="check1">
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                style="color:#666;font: 12pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                Sender</th>
                                            <th scope="col"
                                                style="color:#666;font: 12pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                Subject</th>
                                            <th scope="col"
                                                style="color:#666;font: 12pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                Date</th>
                                            <th scope="col"
                                                style="color:#666;font: 12pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                Actions</th>
                                            <th scope="col">
                                                <center><img src="{{ asset('assets/images/off.png') }}" alt=""></center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <div class="flex-1">
                                                    <div class="form-check" style="font-size: 1.5rem">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="check1">
                                                    </div>
                                                </div>
                                            </th>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">Nzuzi
                                                Mpingi Doudou</td>
                                            <td
                                                style="color:#333333;font: 10pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                nzuzi_mpingi@yahoo.fr</td>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                Tuesday,February 13, 2024</td>
                                            <td>
                                                <a rel="facebox" href="#"
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#333333;text-decoration: none;">
                                                    <b class="b">Reply</b>
                                                </a>
                                                <i class="fa fa-share"></i>
                                                |
                                                <a rel="facebox" href="#" class=""
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
                                                    <i class="fa fa-trash" style="color:#333333"></i> Delete
                                                </a>
                                            </td>
                                            <td scope="col">
                                                <center><img src="{{ asset('assets/images/online.png') }}" alt="">
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="flex-1">
                                                    <div class="form-check" style="font-size: 1.5rem">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="check1">
                                                    </div>
                                                </div>
                                            </th>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                okebepu@merepost.com</td>
                                            <td
                                                style="color:#333333;font: 10pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                okebepu@merepost.com</td>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                Saturday,November 18, 2023</td>
                                            <td>
                                                <a rel="facebox" href="#"
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#333333;text-decoration: none;">
                                                    <b class="b">Reply</b>
                                                </a>
                                                <i class="fa fa-share"></i>
                                                |
                                                <a rel="facebox" href="#" class=""
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
                                                    <i class="fa fa-trash" style="color:#333333"></i> Delete
                                                </a>
                                            </td>
                                            <td scope="col">
                                                <center><img src="{{ asset('assets/images/online.png') }}" alt="">
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="flex-1">
                                                    <div class="form-check" style="font-size: 1.5rem">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="check1">
                                                    </div>
                                                </div>
                                            </th>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                wqgaoz@merepost.com</td>
                                            <td
                                                style="color:#333333;font: 10pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                wqgaoz@merepost.com</td>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                Wednesday,September 06, 2023</td>
                                            <td>
                                                <a rel="facebox" href="#"
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#333333;text-decoration: none;">
                                                    <b class="b">Reply</b>
                                                </a>
                                                <i class="fa fa-share"></i>
                                                |
                                                <a rel="facebox" href="#" class=""
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
                                                    <i class="fa fa-trash" style="color:#333333"></i> Delete
                                                </a>
                                            </td>
                                            <td scope="col">
                                                <center><img src="{{ asset('assets/images/online.png') }}" alt="">
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="flex-1">
                                                    <div class="form-check" style="font-size: 1.5rem">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="check1">
                                                    </div>
                                                </div>
                                            </th>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                qebeega@mailto.plus</td>
                                            <td
                                                style="color:#333333;font: 10pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                qebeega@mailto.plus</td>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                Friday,August 25, 2023</td>
                                            <td>
                                                <a rel="facebox" href="#"
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#333333;text-decoration: none;">
                                                    <b class="b">Reply</b>
                                                </a>
                                                <i class="fa fa-share"></i>
                                                |
                                                <a rel="facebox" href="#" class=""
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
                                                    <i class="fa fa-trash" style="color:#333333"></i> Delete
                                                </a>
                                            </td>
                                            <td scope="col">
                                                <center><img src="{{ asset('assets/images/online.png') }}" alt="">
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="flex-1">
                                                    <div class="form-check" style="font-size: 1.5rem">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="check1">
                                                    </div>
                                                </div>
                                            </th>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                guuema@mailto.plus</td>
                                            <td
                                                style="color:#333333;font: 10pt/130% Helvetica;font-weight: bold;text-align: center;">
                                                guuema@mailto.plus</td>
                                            <td style="color:#666;font: 10pt/130% Helvetica;text-align: center;">
                                                Sunday,July 16, 2023</td>
                                            <td>
                                                <a rel="facebox" href="#"
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#333333;text-decoration: none;">
                                                    <b class="b">Reply</b>
                                                </a>
                                                <i class="fa fa-share"></i>
                                                |
                                                <a rel="facebox" href="#" class=""
                                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;color:#666666;text-decoration: none;">
                                                    <i class="fa fa-trash" style="color:#333333"></i> Delete
                                                </a>
                                            </td>
                                            <td scope="col">
                                                <center><img src="{{ asset('assets/images/online.png') }}" alt="">
                                                </center>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>
                {{--end all middle content --}}

                {{--all right content --}}
                @include('user.mpingiusers.sidebar.rightsidebar')
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
