<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <title>About Us | Mpingi Online Market Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('custom/assets_about/img/favicon.ico') }}" type="image" />
    <link rel="shortcut icon" href="{{ asset('custom/assets_about/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('custom/assets_about/img/favicon.ico') }}" type="image/x-icon">

    <!-- Bootsrap -->
    <link rel="stylesheet" href="{{ asset('custom/css3/bootstrap.min.css') }}">

    <!-- Font awesome -->
    <!-- <link rel="stylesheet" href="{{ asset('custom/css3/font-awesome.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('custom/css3/owl.carousel.css') }}">

    <!-- Template main Css -->
    <link rel="stylesheet" href="{{ asset('custom/css3/style.css') }}">

    <!-- Modernizr -->
    <script src="{{ asset('custom/css3/js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('custom/css3/js/masonry.pkgd.min.js') }}"></script>
    <style>
        /* Masonry */
        .grid {
            max-width: 1200px;
            width: 100%;
        }

        /* clearfix */
        .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        /* ---- grid-item ---- */
        .grid-item {
            box-sizing: border-box;
            width: 18%;
            height: auto;
            float: left;
            background: #fff;
            border: 0px solid #ddd;
            border-color: hsla(0, 0%, 0%, 0.5);
            border-radius: 5px;
            margin-bottom: 1%;
        }

        .grid-item--width2 {
            width: 23%;
            overflow-x: hidden;
        }

        .grid-item--height2 {
            height: auto;
        }

        .scroller {}

        .caption a:hover {
            color: #168de2;
        }

        .caption a:hover h5 {
            color: #168de2
        }

        .asymmetric {
            position: relative;
            background-color: #2b2b2b;

            background-size: cover;

            color: #fff;
            background-position: center 0;
            background-size: cover;
            background-attachment: fixed;

            transition: all 0.3s;

        }

        .asymmetric::before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #2b2b2b;
            transform-origin: top left;
            transform: skewY(-9deg);
            z-index: -10;
        }

        .asymmetric::after {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #2b2b2b;
            transform-origin: bottom left;
            transform: skewY(9deg);
            z-index: -10;
        }

        section {
            padding: 50px 0;
        }

        .blank-space {
            height: 100px;
        }

        .blackandwhite1 {
            filter: gray;
            filter: grayscale(100%);
        }
    </style>

    <script>
        $(document).ready(function(){
	$("#Divtwo").hover(function(){
	$(this).removeClass("blackandwhite");
});
});
    </script>
</head>

<body>


    <header class="main-header">


        <nav class="navbar navbar-static-top">

            <div class="navbar-top">

                <div class="container">
                    <div class="row">

                        <div class="col-sm-6 col-xs-12">

                            <ul class="list-unstyled list-inline header-contact">
                                <li> <i class="fa fa-phone"></i> <a href="tel:">+1(418)732-1925 </a> </li>
                                <li> <i class="fa fa-envelope"></i> <a
                                        href="mailto:contact@mpingimarket.com">contact@mpingimarket.com</a> </li>
                            </ul> <!-- /.header-contact  -->

                        </div>

                        <div class="text-right col-sm-6 col-xs-12">

                            <ul class="list-unstyled list-inline header-social">

                                <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-google"></i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-youtube"></i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-pinterest-p"></i> </a> </li>
                            </ul> <!-- /.header-social  -->

                        </div>


                    </div>
                </div>

            </div>

            <div class="navbar-main">

                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>

                        <a class="navbar-brand" href="index.html"><img
                                src="{{ asset('custom/css3/images/mpingi_logo_14.png') }}" alt=""></a>

                    </div>

                    <div id="navbar" class="navbar-collapse collapse pull-right">

                        <ul class="nav navbar-nav">

                            <li><a class="is-active" href="index.php">HOME</a></li>
                            <li><a href="#about">MPINGI MARKET
                                    <!--ONLINE CLASSIFIEDS-->
                                </a></li>
                            <li><a href="#mpingipro">MPINGIPRO</a></li>
                            <li class="has-child"><a href="#">WHAT WE DO</a>

                                <ul class="submenu">
                                    <li class="submenu-item">
                                        <a href="#company">COMPANY SERVICES </a>
                                    </li>
                                    <li class="submenu-item">
                                        <a href="#customers">CUSTOMERS</a>
                                    </li>
                                    <li class="submenu-item">
                                        <a href="#products1">PRODUCTS</a>
                                    </li>

                                </ul>

                            </li>
                            <li><a href="#team">TEAM</a></li>

                            <li><a href="#contact">CONTACT</a></li>

                        </ul>

                    </div> <!-- /#navbar -->

                </div> <!-- /.container -->

            </div> <!-- /.navbar-main -->


        </nav>

    </header> <!-- /. main-header -->



    <!-- Carousel
    ================================================== -->
    <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel" style="margin-top:70px">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homeCarousel" data-slide-to="1"></li>
            <li data-target="#homeCarousel" data-slide-to="2"></li>
            <li data-target="#homeCarousel" data-slide-to="3"></li>
            <li data-target="#homeCarousel" data-slide-to="4"></li>
            <li data-target="#homeCarousel" data-slide-to="5"></li>

        </ol>

        <div class="carousel-inner" role="listbox">






            <div class="item active">

                <img src="{{ asset('custom/css3/images/slider/home-slider-0.jpg') }}" alt="">

                <div class="container">

                    <div class="carousel-caption">

                        <h2 class="carousel-title bounceInDown animated slow">
                            < MpingiPro />
                        </h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow ">Software Project Developers</h4>
                        <h4 id='address_1' style='color:#fff'></h4>


                    </div> <!-- /.carousel-caption -->

                </div>

            </div> <!-- /.item -->

            <div class="item">

                <img src="{{ asset('custom/css3/images/slider/home-slider-1.jpg') }}" alt="">

                <div class="container">

                    <div class="carousel-caption">

                        <h2 class="carousel-title bounceInDown animated slow">Find upto millions of buyers and sellers
                        </h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow ">Mpingi Free Online Market Platform</h4>


                    </div> <!-- /.carousel-caption -->

                </div>

            </div> <!-- /.item -->


            <div class="item">

                <img src="{{ asset('custom/css3/images/slider/home-slider-2.jpg') }}" alt="">

                <div class="container">

                    <div class="carousel-caption">

                        <h2 class="carousel-title bounceInDown animated slow">Discover the world Market</h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow"> Mpingi Free Online Market Platform</h4>


                    </div> <!-- /.carousel-caption -->

                </div>

            </div> <!-- /.item -->




            <div class="item">

                <img src="{{ asset('custom/css3/images/slider/home-slider-3.jpg') }}" alt="">

                <div class="container">

                    <div class="carousel-caption">

                        <h2 class="carousel-title bounceInDown animated slow">Get quickly notification of your products
                            via sms</h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow">Mpingi Free Online Market Platform</h4>


                    </div> <!-- /.carousel-caption -->

                </div>

            </div> <!-- /.item -->


            <div class="item">

                <img src="{{ asset('custom/css3/images/slider/home-slider-4.jpg') }}" alt="">

                <div class="container">

                    <div class="carousel-caption">

                        <h2 class="carousel-title bounceInDown animated slow">Get the GREAT PRODUCTS AT UNBEATABLE
                            PRICES </h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow">Mpingi Free Online Market Platform</h4>


                    </div> <!-- /.carousel-caption -->

                </div>

            </div> <!-- /.item -->

            <div class="item">

                <img src="{{ asset('custom/css3/images/slider/desange.jpg') }}" alt="">

                <div class="container">

                    <div class="carousel-caption">

                        <h2 class="carousel-title bounceInDown animated slow">Discover Mpingi Market</h2>
                        <h4 class="carousel-subtitle bounceInUp animated slow">Mpingi Free Online Marketplace Platform
                        </h4>


                    </div> <!-- /.carousel-caption -->

                </div>

            </div> <!-- /.item -->

        </div>
    </div>
    <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

    </div><!-- /.carousel -->

    <div class="section-home about-us fadeIn animated">

        <h2 class="title-style-1" id="about">MPINGI MARKET
            <!--ONLINE CLASSIFIEDS PLATFORM--> <span class="title-under"></span>
        </h2>

    </div> <!-- /.about-us -->

    <div class="main-container">

        <div class="container">

            <div class="row fadeIn animated">

                <div class="col-md-6" align="center">


                    <img class="img-circle" src="{{ asset('custom/assets_about/img/team/team1.png') }}" alt="">

                    <h2 class="title-style-1">From FOUNDER,CEO's Desk <span class="title-under"></span></h2>

                    <p align="center">
                    <h4><strong>Ir Nzuzi Mpingi Doudou</strong> <br /> Software Developer Specialist </h4>

                    <i class="fa fa-facebook-square fa-2x color-facebook"></i>
                    <i class="fa fa-twitter-square fa-2x color-twitter"></i>
                    <i class="fa fa-youtube-square fa-2x color-google-plus"></i>
                    <i class="fa fa-linkedin-square fa-2x color-linkedin"></i>



                    </p>

                    <h2 class="title-style-2">About Mpingi Market
                        <!--online Market Platform--><span class="title-under"></span>
                    </h2>

                    <p align="justify">
                        Mpingi online Marketplace Platform (MOMP) is a free online market web and mobile app content
                        management system (CMS) where you can post and order new, used and refurbished products online
                        like electronics, cars, fashion apparel, collectibles, sporting goods among others as well as
                        services around the world.</p>
                    <p align="justify"> Launched in 2017, the platform makes it easy to do business anywhere by
                        aggregating a community of suppliers and buyers on a unique online platform, we allow your
                        business to grow exponentially and create the best brand experience for your customers.
                    </p>
                    <h2 class="title-style-2">goal<span class="title-under"></span></h2>
                    <p align="justify">
                        To become the global leading online marketplace of choice.
                    </p>
                    <h2 class="title-style-2">Mission <span class="title-under"></span></h2>
                    <p align="justify">
                        To deliver high-quality online market technology solutions that enable people and businesses to
                        meet their business goals more effectively.
                    </p>

                    <p align="justify">The platform covers a wide range of activities including online advertising
                        platforms, marketplaces, search engines, social media and creative content outlets,
                        communications services, payment systems, and platforms for the collaborative economy. The
                        platform shares key characteristics including the use of information and communication
                        technologies to facilitate interactions (including commercial transactions) between users,
                        collection and use of data about these interactions.</p>
                    <p align="justify">Our award-winning platform takes the hard work out of creating a marketplace,
                        which allows you to focus on growing market share, audience, and relevant content and most
                        importantly a sense of belonging within your community.</p>
                    <p align="justify">Payments between buyer and seller are made offline, so MOMP does not have to deal
                        with varying payment infrastructure availability in each of its markets. Whether you are buying
                        new or used, plain or luxurious, commonplace or rare, trendy or one-of-a-kind – if it exists in
                        the world, it probably is for sale on MOMP. Our mission is to be the world’s favorite
                        destination for discovering great value and unique selection.</p>
                    <p align="justify">We give sellers the platform, solutions, and support they need to grow their
                        businesses and thrive. We measure our success by our customers' success. </p>

                </div>

                <div class="col-md-6">

                    <h2 class="title-style-2">Benefit <span class="title-under"></span></h2>

                    <p align="justify">Mpingi Online Market Platform has always had an online presence from a research
                        point of view, but recently we became a rapidly growing e-Commerce platform. We are very much
                        positioned to cater to the needs of the higher-end customer who is looking for good quality and
                        value. The new platform has already proven popular with various customers and will continue
                        building from a strong base, constantly adding new product lines as per customer demands.</p>
                    <p align="justify">We expect this new platform to go from strength-to-strength following its early
                        success, adding to the ‘one-stop-shop’ nature of a company that provides business users and
                        retail customers with everything from cleaning products to stationary, office desks to computers
                        and so on.</p>
                    <p align="justify">The move is an effort to help small companies in Africa and the world at large to
                        display products and services that would otherwise be missed by millions of consumers and
                        shorten the gap between buyers and consumers most importantly companies operating on small
                        scale.</p>
                    <p align="justify">We know from talking to start-ups and experience that bringing a new product to
                        market can be just as challenging as building it, thus the platform will give start-up companies
                        support so they can focus on inventing on behalf of customers through widening their market
                        channels.</p>
                    <p align="justify">Our Corporate Social Responsibility gives us a very intimate understanding of
                        what our customers want or need when they shop and the platform provides a regular communication
                        strategy among clients. This shapes our philosophy of giving back to the community through
                        feeding schemes, supplier development and trainings as well as uplifting education standards in
                        Africa. </p>
                    <p align="justify">As the online platform strengthens, we shall not stand still on the store front
                        either, we shall actively seek to renew our formats further tailoring the experience to suit our
                        customers’ preferences and better engage underserviced regions in Africa and other continent.
                    </p>

                    <h2 class="title-style-2">WHAT WE DO <span class="title-under"></span></h2>
                    <p align="justify">Our portfolio of commerce brands helps us connect people through technology to
                        create more opportunity for all. Mpingi online market platform serves a wide range of industries
                        ranging from the aviation and transport industry, to energy and resources, financial services,
                        health care, manufacturing, public sector, real estate, IT and telecommunications. We believe
                        that business is all about managing time, resources and budgets. That’s why our bespoke managed
                        services are designed to help you assess your existing infrastructure and enable you to free up
                        your time, resources and money. </p>

                    <h2 class="title-style-2">Our Team <span class="title-under"></span></h2>
                    <p align="justify">Our Management team has breadth of knowledge and experience in the e-commerce,
                        web technologies and Marketplace ecosystem including more than 10 passionate and talented
                        people, of which 75% are software engineers, dedicated to delivering a successful Marketplace
                        project. </p>

                </div>

            </div> <!-- /.row -->



        </div> <!-- /.about-us -->




        <div class="text-center page-heading0 fixme_11" id="mpingipro"
            style="margin-top:87px; z-index:9999; width:100%;transition: opacity 0.6s;">
            <section class="blank-space"></section>
            <div id="overlay">
                <section class="asymmetric">

                    <div class="container zoomIn animated">

                        <h1 class="page-title">
                            < MpingiPro /><span class="title-under2"></span>
                        </h1>
                        <p class="page-description">

                            MpingiPro is a leading software project developers company headquartered in Uganda. Since
                            our founding in 2014, MpingiPro has continually innovated new ways to deliver on our
                            mission: to empower people to access all kinds of services via a software application.
                        </p>

                    </div>
                    <p></p>

                </section>
            </div>
            <section class="blank-space"></section>
            <section class="blank-space"></section>
        </div>



        <div class="container">

            <div class="row fadeIn animated">

                <div class="col-md-6" align="center">



                    <h2 class="title-style-2">Who we are<span class="title-under"></span></h2>

                    <p align="justify">
                        MpingiPro is a leading software project developers company headquartered in Uganda. Since our
                        founding in 2014, MpingiPro has continually innovated new ways to deliver on our mission: to
                        empower people to access all kinds of services via a software application.</p>

                    <h2 class="title-style-2">Goal<span class="title-under"></span></h2>
                    <p align="justify">
                        To create a better software application company.
                    </p>
                    <h2 class="title-style-2">Mission <span class="title-under"></span></h2>
                    <p align="justify">
                        To empower people to access all kinds of services via a software application.
                    </p>




                </div>

                <div class="col-md-6">



                    <h2 class="title-style-2">Our History <span class="title-under"></span></h2>

                    <p align="justify">MpingiPro was founded in 2014 with one goal in mind: to create a better software
                        application company.</p>



                    <h2 class="title-style-2">November 2014 <span class="title-under"></span></h2>
                    <p align="justify">MpingiPro software project developers was founded by Nzuzi Mpingi Doudou</p>


                    <h2 class="title-style-2">From november 2014 to 2018 <span class="title-under"></span></h2>
                    <p align="justify">Over 25 websites was build and host by MpingiPro</p>
                    <h2 class="title-style-2">+2M <span class="title-under"></span></h2>
                    <p align="justify">We power software applications all over the world and support thousands more
                        every day.</p>
                </div>

            </div> <!-- /.row -->



        </div>

        <div class="text-center page-heading9" id="team">
            <div id="overlay4">
                <div class="container zoomIn animated">

                    <h1 class="page-title">Our team<span class="title-under "></span></h1>
                    <p class="page-description">
                        Mpingi Projects
                    </p>

                </div>
            </div>
        </div>
        <div class="our-team animate-onscroll fadeIn">

            <div class="container">


                <p align="justify">Our Management team has breadth of knowledge and experience in the e-commerce, web
                    technologies and Marketplace ecosystem including more than 10 passionate and talented people, of
                    which 75% are software engineers, dedicated to delivering a successful Marketplace project. </p><br>

                <div class="row" style="display:none">

                    <div class="col-md-3 col-sm-6">
                        <div class="team-member">

                            <div class="thumnail">

                                <img src="{{ asset('custom/css3/images/team/member-1.jpg') }}" alt="" class="cause-img">

                            </div>



                            <h4 class="member-name"><a href="#">Nzuzi Mpingi Doudou</a></h4>

                            <div class="member-position">

                            </div>

                            <div class="btn-holder">

                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                            </div>



                        </div> <!-- /.team-member -->

                    </div>

                    <div class="col-md-3 col-sm-6">

                        <div class="team-member">

                            <div class="thumnail">

                                <img src="{{ asset('custom/css3/images/team/member-2.jpg') }}" alt="" class="cause-img">

                            </div>



                            <h4 class="member-name"><a href="#">Kakeeto Brian</a></h4>

                            <div class="member-position">

                            </div>

                            <div class="btn-holder">

                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                            </div>



                        </div> <!-- /.team-member -->

                    </div>


                    <div class="col-md-3 col-sm-6">

                        <div class="team-member">

                            <div class="thumnail">

                                <img src="{{ asset('custom/css3/images/team/member-3.jpg') }}" alt="" class="cause-img">

                            </div>



                            <h4 class="member-name"><a href="#">Desange Hagumi</a></h4>

                            <div class="member-position">

                            </div>

                            <div class="btn-holder">

                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                            </div>



                        </div> <!-- /.team-member -->

                    </div>


                    <div class="col-md-3 col-sm-6">

                        <div class="team-member">

                            <div class="thumnail">

                                <img src="{{ asset('custom/css3/images/team/member-4.jpg') }}" alt="" class="cause-img">

                            </div>



                            <h4 class="member-name"><a href="#">Emma Ngungu</a></h4>

                            <div class="member-position">

                            </div>

                            <div class="btn-holder">

                                <a href="#" class="btn"> <i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-facebook"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-google"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-twitter"></i> </a>
                                <a href="#" class="btn"> <i class="fa fa-linkedin"></i> </a>

                            </div>



                        </div> <!-- /.team-member -->

                    </div>

                </div> <!-- /.row -->

            </div>

        </div>



    </div>
    <!-- /.home-reasons -->

    <!-- /.our-causes -->
    <div class="section-home our-causes animate-onscroll fadeIn bg_image">
        <div id="overlay">
            <div class="container">

                <h2 class="title-style-1" id="company">WHAT WE DO <span class="title-under2"></span></h2>
                <p align="justify"><strong>A Better software application for all</strong></p>
                <p align="justify">It's not just about getting people online. It's about creating a better, safer
                    software application for everyone in the process.</p><br>

                <div class="row">

                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-globe fa-5x color-green"></i>
                            <h4 class="cause-title">WEB DESIGNING</h4>


                            <div class="cause-details">
                                1. Web design <br />
                                2. Mobile web <br />
                                3. Web maintenance <br />

                                </p>
                            </div>




                        </div> <!-- /.cause -->

                    </div>

                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-server fa-5x color-twitter"></i>
                            <h4 class="cause-title"> HOSTING</h4>


                            <div class="cause-details">
                                1. Web hosting <br />
                                2. Email hosting <br />
                                3. Domain name

                                </p>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-cloud-upload fa-5x color-google-plus"></i>
                            <h4 class="cause-title">CLOUD COMPUTING</h4>


                            <div class="cause-details">
                                1. cloud servers<br />
                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>

                                </p>
                            </div>



                        </div> <!-- /.cause -->

                    </div>

                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-connectdevelop fa-5x color-paple"></i>
                            <h4 class="cause-title">NETWORKING</h4>


                            <div class="cause-details">
                                <p>
                                    1. Networking<br />

                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>


                        </div> <!-- /.cause -->

                    </div>

                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-database fa-5x color-black"></i>
                            <h4 class="cause-title">DATA ANALYSIS </h4>


                            <div class="cause-details">
                                <p>
                                    &nbsp;<br />

                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>


                        </div> <!-- /.cause -->

                    </div>

                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-mobile-phone fa-5x color-brown"></i>
                            <h4 class="cause-title">MOBILE APP</h4>


                            <div class="cause-details">
                                <p>
                                    1. Mobile App design<br />

                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>


                        </div> <!-- /.cause -->

                    </div>

                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-magic fa-5x color-pinterest"></i>
                            <h4 class="cause-title">GRAPHICS DESIGN</h4>


                            <div class="cause-details">
                                <p>
                                    1. Professional logo <br />
                                    2. Business banner <br />
                                    3. Business card
                                    <br />


                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>


                        </div> <!-- /.cause -->

                    </div>


                    <div class="col-md-3 col-sm-6">

                        <div class="cause" align="center" style="border-color:#fff">
                            <br /><br />
                            <i class="fa fa-book fa-5x color-pinterest"></i>
                            <h4 class="cause-title">COMPUTER TRAINING</h4>


                            <div class="cause-details">
                                <p>


                                    1. Programming languages </p>
                                <p>3. Networking </p>
                                <p>4. School project </p>
                                <p>5. Web design and development</p>
                                <p>6. Mobile web and App</p>


                            </div>


                        </div> <!-- /.cause -->

                    </div>



                </div>

            </div>
        </div>
    </div>
    <div class="section-home our-sponsors animate-onscroll fadeIn">

        <div class="container">
            <h2 class="title-style-1" id="products1">Our portfolio <span class="title-under"></span></h2>
            <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 40 }'
                style="margin-left:15px;">
                <div class="row">
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #27403c;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.steelconsteng.com" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/steel.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.steelconsteng.com" target="_blank">Steel
                                    Construction Engineering</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #000000;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/amuru" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/amuru.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/amuru" target="_blank">Amuru
                                    District is a district in Northern Uganda</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #c7318b;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/kindergarten/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/babyclass.png') }}" width="250"
                                    height="220" alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/kindergarten/"
                                    target="_blank">Kindergarten Teaching Tool</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #0dadfb;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/mlgb/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/mlgb.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/mlgb/" target="_blank">MLGB
                                    TRADING PTY (Ltd)</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #0dadfb;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/bondeko/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/bondekocenter.png') }}" width="250"
                                    height="220" alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/bondeko/"
                                    target="_blank">Bondeko Center Data System</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #23588c;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/hest/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/hest.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/hest/" target="_blank">HEST
                                    (Higher Education Science and Technology Project)</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #710202;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/kazzi/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/kazzi.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/kazzi/"
                                    target="_blank">KAZZI</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #124d49;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/gadget/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/gadget.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/gadget/" target="_blank">Gadget
                                    Craze</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #a11313;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.jpimi.com" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/jpimi.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.jpimi.com" target="_blank">JPIMI WEBSITE</a>
                            </h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #002c61;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/kibali/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/rap.jpeg') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/kibali/"
                                    target="_blank">Resettlement Action Plan (RAP)</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #1c9826;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.bibliocom.org" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/bibliocom.png') }}" width="250"
                                    height="220" alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.bibliocom.org" target="_blank">BIBLIOCOM
                                    (Bibliothèque Communautaire de Durba)</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #128aed;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.bupragongd.com" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/buprag.jpg') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.bupragongd.com" target="_blank">BUPRAG (Bureau
                                    Des Projets Agricoles « BUPRAG » O.N.G.D)</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #128aed;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.youthallianceug.org" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/youth.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.youthallianceug.org" target="_blank">Youth
                                    Alliance for Career Development</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #004206;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com/lidefauInternational/" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/lidefau.png') }}" width="250"
                                    height="220" alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com/lidefauInternational/"
                                    target="_blank">Lidefau International</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #000000;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.hmcmining.com" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/hmc.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.hmcmining.com" target="_blank">Hassan Mining
                                    Company</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #128aed;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.accessyouthuganda.org" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/ayi.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.accessyouthuganda.org" target="_blank">Access
                                    Youth Initiative Uganda</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #3b3b3b;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.mpingimarket.com" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/mpingi.png') }}" width="250" height="220"
                                    alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.mpingimarket.com" target="_blank">Mpingi Online
                                    Classifieds Platform</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                    <div class="grid-item grid-item--width2 grid-item--height2" style="float:left">


                        <div class="cause" align="center" style="padding-bottom: 15px;
  margin-bottom: 10px;
  border: 1px solid #127ad1;
  -moz-transition: all, 0.3s;
  -o-transition: all, 0.3s;
  -webkit-transition: all, 0.3s;
  transition: all, 0.3s;">
                            <a href="http://www.bondekocenter.com" target="_blank"><img
                                    src="{{ asset('custom/css3/images/products/bondeko.png') }}" width="250"
                                    height="220" alt="" style="margin-top:4px" class="blackandwhite" id="Divtwo" /></a>
                            <h4 class="cause-title"><a href="http://www.bondekocenter.com" target="_blank">The Bondeko
                                    Refugee Livelihoods Center</a></h4>

                            <p align="center"><a href="http://" target="_blank"></a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">

            <h2 class="title-style-1" id="customers">Our Customers <span class="title-under"></span></h2>

            <ul class="owl-carousel list-unstyled list-sponsors">

                <li> <img src="{{ asset('custom/css3/images/customers/mpingi.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/ayi.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/mpingipro.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/bondeko.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/buprag.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/gadget.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/young.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/jambo.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/hmc.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/lidefau.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/kazzi2.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/pragmatic.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/kibali.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/idem.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/buycongolesegoods.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/bibliocom.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/pazuri.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/kazzi.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/mlgb.jpg') }}" alt=""></li>
                <li> <img src="{{ asset('custom/css3/images/customers/roofklin.jpg') }}" alt="" class="blackandwhite">
                </li>

            </ul>

        </div>




        <div class="container">

            <h2 class="title-style-1" id="contact">Our Contact <span class="title-under"></span></h2>

            <div class="row">

                <div class="col-md-7 col-sm-12 col-form">
                    <h2 class="title-style-2">CONTACT FORM <span class="title-under"></span></h2>
                    <p align="justify">We appreciate your initiative to contact us; you can make use of this instant
                        mail form to contact Mpingi Online Market Platform. Please note that all fields marked with an *
                        are required to enable us to effectively communicate with you. </p>



                    <form action="php/mail.php" class="contact-form ajax-form">

                        <div class="row">

                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Name*" required>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="E-mail*" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <textarea name="message" rows="5" class="form-control" placeholder="Message*"
                                required></textarea>
                        </div>

                        <div class="form-group alerts">

                            <div class="alert alert-success" role="alert">

                            </div>

                            <div class="alert alert-danger" role="alert">

                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Send message</button>
                        </div>

                        <div class="clearfix"></div>

                    </form>

                </div>

                <div class="col-md-4 col-md-offset-1 col-contact">

                    <h2 class="title-style-2"> MPINGI CONTACTS <span class="title-under"></span></h2>
                    <p>
                        <b>MpingiPro (software project developers)</b>
                        has it headquarter Office in Canada, USA, D.R Congo and Uganda.
                    </p>

                    <div class="contact-items">

                        <ul class="list-unstyled contact-items-list">
                            <li class="contact-item"> <span class="contact-icon"> <i
                                        class="fa fa-map-marker"></i></span>Canada, Quebec +1(418)732-1925</li>

                            <li class="contact-item"> <span class="contact-icon"> <i
                                        class="fa fa-map-marker"></i></span>Usa, Baltimore MD</li>

                            <li class="contact-item"> <span class="contact-icon"> <i
                                        class="fa fa-map-marker"></i></span>D.R Congo, Kinshasa +243(0)897 701 661</li>
                            <li class="contact-item"> <span class="contact-icon"> <i
                                        class="fa fa-map-marker"></i></span>Uganda, Kampala-city +256(0)782 796 710</li>


                            <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span>
                                contact@mpingimarket.com</li>

                            <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-globe"></i></span> <a
                                    href="http://mpingimarket.com:2096/" target="_blank">Webmail</a> </li>

                        </ul>
                        <a href="http://info.flagcounter.com/7ebf"><img
                                src="http://s09.flagcounter.com/count/7ebf/bg_FFFFFF/txt_000000/border_CCCCCC/columns_5/maxflags_20/viewers_0/labels_1/pageviews_0/flags_0/"
                                alt="Flag Counter" border="0"></a>
                        <!--<a href="https://info.flagcounter.com/q3KK"><img src="https://s01.flagcounter.com/count2/q3KK/bg_FFFFFF/txt_000000/border_CCCCCC/columns_4/maxflags_12/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a>-->
                    </div>



                </div>

            </div> <!-- /.row -->


        </div>

    </div> <!-- /.our-sponsors -->





    <footer class="main-footer">



        <div class="footer-bottom">

            <div class="container text-right">
                <!--Mpingi Online Market Platform-->
                < MpingiPro /> @ copyrights - by <a href="#mpingipro">Mpingi Project</a>
            </div>
        </div>

    </footer> <!-- main-footer -->




    <!-- Donate Modal -->
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="donateModalLabel">CONTACT US</h4>
                </div>
                <div class="modal-body">

                    <form class="form-donation">

                        <h3 class="text-center title-style-1">Thank you for your donation <span
                                class="title-under"></span> </h3>

                        <div class="row">

                            <div class="form-group col-md-12 ">
                                <input type="text" class="form-control" id="amount" placeholder="AMOUNT(€)">
                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="firstName" placeholder="First name*">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="lastName" placeholder="Last name*">
                            </div>
                        </div>


                        <div class="row">

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="email" placeholder="Email*">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>

                        </div>


                        <div class="row">

                            <div class="form-group col-md-12">
                                <textarea cols="30" rows="4" class="form-control" name="note"
                                    placeholder="Additional note"></textarea>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow">DONATE
                                    NOW</button>
                            </div>

                        </div>





                    </form>

                </div>
            </div>
        </div>

    </div> <!-- /.modal -->





    <!--  Scripts
    ================================================== -->

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset("custom/css3/js/jquery-1.11.1.min.js") }}"><\/script>')
    </script>

    <!-- Bootsrap javascript file -->
    <script src="{{ asset('custom/css3/js/bootstrap.min.js') }}"></script>

    <!-- owl carouseljavascript file -->
    <script src="{{ asset('custom/css3/js/owl.carousel.min.js') }}"></script>

    <!-- Template main javascript -->
    <script src="{{ asset('custom/css3/js/main.js') }}"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script src="{{ asset('custom/assets_about/js/custom.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('custom/assets/js/jquery.dcjqaccordion.2.7.js') }}">
    </script>
    <script src="{{ asset('custom/assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('custom/assets/js/common-scripts.js') }}"></script>
    <script>
        var fixmeTop_1 = $('.fixme_1').offset().top;
$(window).scroll(function() {
    var currentScroll_1 = $(window).scrollTop();
    if (currentScroll_1 >= fixmeTop_1) {
        $('.fixme_1').css({
            position: 'fixed',
            top: '0',

        });
    } else {
        $('.fixme_1').css({
            position: 'static'
        });
    }
});

    </script>
    <script type="text/javascript">
        (function () {
        var options = {
            whatsapp: "+14187321925", // WhatsApp number
            viber: "+14187321925", // Viber number
            email: "contact@mpingimarket.com", // Email
            call: "+1(418)732-1925", // Call phone number
            call_to_action: "Message us", // Call to action
            button_color: "#3b3b3b", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp,call,email,viber", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
    </script>
</body>

</html>
