<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mpingi Market | Free Online Marketplace Platform</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon ok.png') }}" />
    <link href="{{ asset('assets/plugin/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/mainstyles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/css/placeholder-loading.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet">

</head>

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
    {{-- <div class="topnav">
        <nav class="navbar navbar-light" style="background-color:#464444;border-bottom: 2px solid #f24c15">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/mpingi_logo_14.png') }}" height="50"
                        data-aos="fade-left" data-aos-duration="1000"></a>
                <div class="mt-1 d-flex">
                    <p style="font-weight: bold;color:aliceblue;"><img src="{{ asset('assets/icons/1236251.png') }}"
                            width="16" height="16" style="border-radius:50%"> ENGLISH &nbsp;<img
                            src="{{ asset('assets/icons/1542408.png') }}" width="16" height="16"
                            style="border-radius:50%"> FRANCAIS</p>
                </div>
            </div>
        </nav>
    </div> --}}
    <div id="navbar">
        <!-- Responsive navbar-->
        <nav id="navbar_main" class="mb-0 shadow-sm navbar navbar-expand-lg navbar-light mobile-offcanvas" style="background-color: #fff;">
            <div class="offcanvas-header">
                <button class="btn-close float-end"></button>
            </div>
            <div class="d-block mx-auto px-5">
                {{-- <a class="navbar-brand" href="#!">Start Bootstrap</a> --}}
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button> --}}

                    <ul class="mb-2 navbar-nav mb-lg-0">
                        @foreach ($getflag as $r)
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">
                            <img
                            src="{{ url('assets/flags/'.$r->flag) }}" alt=""
                            width="30" height="20" class="img_icons_2">
                              @if(session()->get('locale') === 'fr')
                                <i class="fas fa-home"></i> Accueil</a>
                                @else
                                <i class="fas fa-home"></i> Home</a>
                             @endif
                            </a>
                                 {{-- <i class="fas fa-home"></i> --}}
                        </li>
                        @endforeach
                        <li class="nav-item">
                           <li class="nav-item dropdown">
                           @if(session()->get('locale') === 'fr')
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"><i class="fas fa-list"></i> Categories</a>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"><i class="fas fa-list"></i> Categories</a>
                            @endif


                            <ul class="shadow dropdown-menu">
                                @php
                                $countallproducts1 = DB::table('tbl_product_items')->select('*')
                                ->where(['ad_type'=>'0', 'expire_status'=>'1'])
                                ->count();
                                @endphp

                               <li>
                                    @if(session()->get('locale') === 'fr')
                                        <a class="dropdown-item" href="{{ route('guest.postfunctions', ['id'=> encrypt(1)]) }}"
                                            id="globalheadernavhref"> Produits ({{ $countallproducts1 }})</a>
                                      @else
                                      <a class="dropdown-item" href="{{ route('guest.postfunctions', ['id'=> encrypt(1)]) }}"
                                        id="globalheadernavhref"> Products ({{ $countallproducts1 }})</a>
                                     @endif
                                </li>

                                <li class="dropend">
                                     @if(session()->get('locale') === 'fr')
                                       <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                       data-bs-auto-close="outside" id="globalheadernavhref">Services (20)</a>
                                     @else
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" id="globalheadernavhref">Services (20)</a>
                                     @endif
                                    <ul class="shadow dropdown-menu">
                                          <li>
                                         @if(session()->get('locale') === 'fr')
                                            <a class="dropdown-item" href="{{ route('getindustries',['id'=> encrypt(1)]) }}" id="globalheadernavhref">Industrie & Fabrication (3)</a>
                                          @else
                                          <a class="dropdown-item" href="{{ route('getindustries',['id'=> encrypt(1)]) }}" id="globalheadernavhref">Industry &
                                            Manufacture (3)</a>
                                          @endif

                                        </li>
                                        <li>
                                         @if(session()->get('locale') === 'fr')
                                          <a class="dropdown-item" href="{{ route('getservices',['id'=> encrypt(1)]) }}" id="globalheadernavhref"> Entreprises
                                            (17)</a>
                                          @else
                                          <a class="dropdown-item" href="{{ route('getservices',['id'=> encrypt(1)]) }}" id="globalheadernavhref"> Businesses
                                            (17)</a>
                                          @endif

                                        </li>
                                    </ul>
                                </li>

                                <li class="dropend">
                                    @if(session()->get('locale') === 'fr')
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" id="globalheadernavhref">Emplois (0)</a>
                                    @else
                                        <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" id="globalheadernavhref">Jobs (0)</a>
                                    @endif
                                    <ul class="shadow dropdown-menu">
                                        <li>
                                            @if(session()->get('locale') === 'fr')
                                            <a class="dropdown-item" href="{{ route('jobs') }}" id="globalheadernavhref">Emplois Disponibles
                                                (0)</a>
                                            @else
                                            <a class="dropdown-item" href="{{ route('jobs') }}" id="globalheadernavhref">Available Jobs
                                                (0)</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if(session()->get('locale') === 'fr')
                                            <a class="dropdown-item" href="{{ route('jobs') }}" id="globalheadernavhref">Demandeurs D' Emploi
                                                (0)</a>
                                            @else
                                            <a class="dropdown-item" href="{{ route('jobseekers') }}" id="globalheadernavhref">Job Seekers
                                                (0)</a>
                                            @endif

                                        </li>
                                    </ul>
                                </li>

                            </ul>

                          </li>
                        </li>


                        <li class="nav-item dropdown">
                         @if(session()->get('locale') === 'fr')
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tag"></i> Produits
                            </a>
                            @else
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tag"></i> Products
                            </a>
                            @endif
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                     @php
                                $countallstore = DB::table('tbl_mping_businesses')->select('*')
                                //->where(['ad_type'=>'0'])
                                ->count();
                                @endphp
                                <li>
                                    @if(session()->get('locale') === 'fr')
                                     <a class="dropdown-item" href="{{ route('shops') }}" id="globalheadernavhref">Magasins À Proximité ({{ $countallstore }})</a>
                                    @else
                                     <a class="dropdown-item" href="{{ route('shops') }}" id="globalheadernavhref">Stores Nearby ({{ $countallstore }})</a>
                                    @endif
                                </li>
                                @php
                                $countallproducts = DB::table('tbl_product_items')->select('*')
                                ->where(['ad_type'=>'0', 'expire_status'=>'1'])
                                ->count();
                                @endphp
                                <li>
                                  @if(session()->get('locale') === 'fr')
                                    <a class="dropdown-item" href="{{ route('products') }}" id="globalheadernavhref">Tous Les Produits({{ $countallproducts }})</a>
                                   @else
                                    <a class="dropdown-item" href="{{ route('products') }}" id="globalheadernavhref">All Products ({{ $countallproducts }})</a>
                                   @endif

                                </li>
                                @php
                                $countallproductsnew = DB::table('tbl_product_items')->select('*')
                                ->where(['ad_type'=>'0', 'expire_status'=>'1','type'=>'New'])
                                ->count();
                                @endphp
                                <li>
                                    @if(session()->get('locale') === 'fr')
                                     <a class="dropdown-item" href="{{ route('newproducts', ['NewProducts' => 'New' ] ) }}" id="globalheadernavhref">Nouvaux Produits ({{ $countallproductsnew }})</a>
                                   @else
                                    <a class="dropdown-item" href="{{ route('newproducts', ['NewProducts' => 'New' ] ) }}" id="globalheadernavhref">New Products ({{ $countallproductsnew }})</a>
                                   @endif

                                </li>
                                @php
                                $countallproductsused = DB::table('tbl_product_items')->select('*')
                                ->where(['ad_type'=>'0', 'expire_status'=>'1','type'=>'Used'])
                                ->count();
                                @endphp
                                <li>
                                 @if(session()->get('locale') === 'fr')
                                   <a class="dropdown-item" href="{{ route('usedproducts', ['UsedProducts' => 'Used']) }}" id="globalheadernavhref">Produits D' Occasion ({{ $countallproductsused }}) </a>
                                  @else
                                   <a class="dropdown-item" href="{{ route('usedproducts', ['UsedProducts' => 'Used']) }}" id="globalheadernavhref">Used Products ({{ $countallproductsused }}) </a>
                                  @endif

                                </li>
                                @php
                                $countallproductsrefurbished = DB::table('tbl_product_items')->select('*')
                                ->where(['ad_type'=>'0', 'expire_status'=>'1','type'=>'Refurbished'])
                                ->count();
                             @endphp
                                <li>
                                @if(session()->get('locale') === 'fr')
                                    <a class="dropdown-item" href="{{ route('refurbishedproducts', ['RefurbishedProducts' => 'Refurbished']) }}" id="globalheadernavhref">Produits Remis A Neuf
                                        ({{ $countallproductsrefurbished }})</a>
                                   @else
                                    <a class="dropdown-item" href="{{ route('refurbishedproducts', ['RefurbishedProducts' => 'Refurbished']) }}" id="globalheadernavhref">Refurbished Products
                                    ({{ $countallproductsrefurbished }})</a>
                                   @endif


                                </li>
                            </ul>
                        </li>

                    <li class="nav-item dropdown">

                            @if(session()->get('locale') === 'fr')
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-wrench"></i> Services
                            </a>
                            @else
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-wrench"></i> Services
                            </a>
                            @endif
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @php
                                $countallindustry_items_ =  DB::table('tbl_industry_items')->where(['expire_status'=>'1'])->count();
                              @endphp
                              <li>
                                @if(session()->get('locale') === 'fr')
                                 <a class="dropdown-item" href="{{ route('industriesmanufactures') }}" id="globalheadernavhref">
                                    Industrie & Fabrication ({{ $countallindustry_items_ }})</a>
                               @else
                                <a class="dropdown-item" href="{{ route('industriesmanufactures') }}" id="globalheadernavhref">
                                Industries & Manufactures ({{ $countallindustry_items_ }})</a>
                               @endif

                                </li>
                                 @php
                                      $countallservice_items_ =  DB::table('tbl_service_items')->where(['expire_status'=>'1'])->count();
                                  @endphp
                                  <li>
                                  @if(session()->get('locale') === 'fr')
                                    <a class="dropdown-item" href="{{ route('servicesnearbyyou') }}" id="globalheadernavhref">
                                        Entreprises ({{ $countallservice_items_ }})</a>
                                  @else
                                    <a class="dropdown-item" href="{{ route('servicesnearbyyou') }}" id="globalheadernavhref">
                                       Businesses ({{ $countallservice_items_ }})</a>
                                  @endif

                                </li>
                            </ul>
                        </li>

                       <li class="nav-item dropdown">
                            @if(session()->get('locale') === 'fr')
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Emplois
                            </a>
                            @else
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Jobs
                            </a>
                            @endif

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                 @if(session()->get('locale') === 'fr')
                                  <a class="dropdown-item" href="{{ route('availablejobs') }}" id="globalheadernavhref">
                                    Emplois Disponibles (0)</a>
                                  @else
                                   <a class="dropdown-item" href="{{ route('availablejobs') }}" id="globalheadernavhref">
                                    Available Jobs (0)</a>
                                  @endif

                                </li>
                                <li>
                                    @if(session()->get('locale') === 'fr')
                                     <a class="dropdown-item" href="{{ route('ajobseekers') }}" id="globalheadernavhref">Demandeurs D' Emploi (0)</a>
                                    @else
                                     <a class="dropdown-item" href="{{ route('ajobseekers') }}" id="globalheadernavhref">Job Seekers (0)</a>
                                    @endif
                                </li>
                            </ul>
                        </li>

                         <li class="nav-item dropdown">

                            @if(session()->get('locale') === 'fr')
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> Mon Compte
                            </a>
                            @else
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> My Account
                            </a>
                            @endif
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="#" id="globalheadernavhref" data-bs-toggle="modal" data-bs-target="#mainlogin_Modal">Sign In</a></li> --}}
                                <li>
                                  @if(session()->get('locale') === 'fr')
                                     <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login_Modal" id="globalheadernavhref">Se Connecter</a>
                                   @else
                                    <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login_Modal" id="globalheadernavhref">Sign In</a>
                                   @endif

                                </li>
                                {{-- <li><a class="dropdown-item" href="{{ route('login') }}" id="globalheadernavhref">Sign In</a></li> --}}
                                <li>
                                 @if(session()->get('locale') === 'fr')
                                    <a class="dropdown-item" href="{{ route('joinlogin') }}" id="globalheadernavhref">Rejoignez Gratuitement </a>
                                  @else
                                  <a class="dropdown-item" href="{{ route('joinlogin') }}" id="globalheadernavhref">Join For Free </a>
                                  @endif

                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <li class="nav-item dropdown">
                                @if(session()->get('locale') === 'fr')
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside"> <i class="fas fa-plus-circle"></i> Plus</a>
                                @else
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside"> <i class="fas fa-plus-circle"></i> More</a>
                                @endif

                             <ul class="shadow dropdown-menu">
                                 <li class="dropend">
                                 @if(session()->get('locale') === 'fr')
                                  <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                 data-bs-auto-close="outside" id="globalheadernavhref">Aide</a>
                                  @else
                                   <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                  data-bs-auto-close="outside" id="globalheadernavhref">Help</a>
                                  @endif

                                     <ul class="shadow dropdown-menu">
                                         <li>
                                            @if(session()->get('locale') === 'fr')
                                            <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Aide</a>
                                            @else
                                             <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Help</a>
                                            @endif

                                        </li>
                                         <li>
                                            @if(session()->get('locale') === 'fr')
                                             <a class="dropdown-item" href="{{ route('faq') }}" id="globalheadernavhref">FAQ</a>
                                            @else
                                             <a class="dropdown-item" href="{{ route('faq') }}" id="globalheadernavhref">FAQ</a>
                                            @endif

                                        </li>
                                         <li>
                                            @if(session()->get('locale') === 'fr')
                                             <a class="dropdown-item" href="{{ route('contactus') }}" id="globalheadernavhref">Contact</a>
                                           @else
                                            <a class="dropdown-item" href="{{ route('contactus') }}" id="globalheadernavhref">Contact Us</a>
                                           @endif

                                        </li>
                                         <li>
                                         @if(session()->get('locale') === 'fr')
                                            <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Conseils</a>
                                          @else
                                            <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Advice</a>
                                          @endif

                                        </li>
                                     </ul>
                                 </li>

                                 <li class="dropend">
                                    @if(session()->get('locale') === 'fr')
                                     <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                         data-bs-auto-close="outside" id="globalheadernavhref">A Propos De Nous</a>
                                    @else
                                     <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" id="globalheadernavhref">About Us</a>
                                    @endif

                                     <ul class="shadow dropdown-menu">
                                        <li>
                                        @if(session()->get('locale') === 'fr')
                                          <a class="dropdown-item" href="{{ route('about') }}" id="globalheadernavhref">A Propos De Nous</a>
                                          @else
                                           <a class="dropdown-item" href="{{ route('about') }}" id="globalheadernavhref">About Us</a>
                                          @endif

                                        </li>
                                        <li>
                                            @if(session()->get('locale') === 'fr')
                                             <a class="dropdown-item" href="{{ route('contactus') }}" id="globalheadernavhref">Commentaires</a>
                                            @else
                                             <a class="dropdown-item" href="{{ route('contactus') }}" id="globalheadernavhref">Feedback</a>
                                            @endif

                                        </li>
                                        <li>
                                            @if(session()->get('locale') === 'fr')
                                             <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref"> Conditions D' Utilisation</a>
                                           @else
                                            <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Terms of Use</a>
                                           @endif

                                        </li>
                                        <li>
                                         @if(session()->get('locale') === 'fr')
                                          <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Politique De Confidentialité</a>
                                          @else
                                           <a class="dropdown-item" href="{{ route('404notfound') }}" id="globalheadernavhref">Privacy Policy</a>
                                          @endif

                                        </li>
                                     </ul>
                                 </li>

                             </ul>

                           </li>
                         </li>
                         <li class="nav-item">
                            <a href="{{ route('guest.post_options') }}" id="globalheadernavhref"><button type="button" class="btn btnColor"> @if(session()->get('locale') === 'fr')  Vendez gratuitement  @else Sell for free  @endif</button></a>&nbsp;<button type="button"
                            class="btn btn-outline-success">@if(session()->get('locale') === 'fr')  Acheter maintenant!  @else Buy now!  @endif </button>
                        </li>
                    </ul>


            </div>
        </nav>
        <span class="screen-darken"></span>
        <button data-trigger="navbar_main" class="d-lg-none navbar-toggler btnCss" type="button" >
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </button>
        {{-- <div class="d-lg-none" data-trigger="navbar_main" id="toggle-icon">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div> --}}

    </div>
    @include('mainindex.modal.mainlogin')
    @include('mainindex.modal.loginindex')
