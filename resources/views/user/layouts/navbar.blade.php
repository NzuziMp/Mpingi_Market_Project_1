<div id="navbar">
    <!-- Responsive navbar-->
    <nav id="navbar_main" class="mb-0 shadow-sm navbar navbar-expand-lg navbar-light mobile-offcanvas"
        style="background-color: #fff;">
        <div class="offcanvas-header">
            <button class="btn-close float-end"></button>
        </div>
        <div class="container px-5">
            {{-- <a class="navbar-brand" href="#!">Start Bootstrap</a> --}}
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button> --}}

            <ul class="mb-2 navbar-nav mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">
                        <i class="fas fa-home"></i> Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-tag"></i> My Products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($countProductItems as $rowc)
                        <li><a class="dropdown-item" href="{{ route('user.viewpost') }}" id="globalheadernavhref">My Actives Products ({{ $rowc->cnt }})</a>
                        </li>
                        @endforeach
                        @php
                          $countProductItems_expired = DB::table('tbl_product_items')->where(['user_id' => Auth::user()->id, 'expire_status' => 0])->count();
                        @endphp
                        <li>
                           <a class="dropdown-item" href="{{ route('user.expiredads') }}" id="globalheadernavhref">My Expired Products ({{ $countProductItems_expired }})</a>
                        </li>

                         @php
                             $countcancelmyOrder1 = DB::table('tbl_mping_purchases')->where(['user_id_buyer' => Auth::user()->id, 'cancel_id' => 0])->count();
                         @endphp
                        <li><a class="dropdown-item" href="{{ route('user.canceled') }}" id="globalheadernavhref">My Canceled Products ({{ $countcancelmyOrder1 }})</a>
                        </li>
                        @php
                              $countmyOrder1 = DB::table('tbl_mping_purchases')->where(['user_id_buyer' => Auth::user()->id, 'cancel_id' => 1])->count();
                        @endphp

                        <li><a class="dropdown-item" href="{{ route('user.purchases') }}" id="globalheadernavhref">My Order Products ({{ $countmyOrder1 }}) </a>
                        </li>

                        @php
                            $countmyPostpurchases1 = DB::table('tbl_mping_purchases')->where(['user_id_seller' => Auth::user()->id, 'cancel_id' => 1])->count();
                        @endphp
                        <li><a class="dropdown-item" href="{{ route('user.sales') }}" id="globalheadernavhref">My Sales Products ({{ $countmyPostpurchases1 }}) </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"> <i class="fas fa-wrench"></i> My Services</a>

                    <ul class="shadow dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#" id="globalheadernavhref">Products (48)</a></li>
                        --}}
                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref">My Industries &
                                Manufacturers</a>
                            <ul class="shadow dropdown-menu">
                                @php
                                $countIndustryItems = DB::table('tbl_industry_items')->where(['user_id' => Auth::user()->id, 'expire_status' => 1])->count();
                               @endphp
                                <li><a class="dropdown-item" href="{{ route('user.viewindusty') }}" id="globalheadernavhref">Active Services
                                        ({{ $countIndustryItems }})</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Expired Services
                                        (0)</a></li>
                                <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled Services
                                        (0)</a></li>
                            </ul>
                        </li>

                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref"><i
                                    class="fa fa-briefcase"></i> My Businesses</a>
                            <ul class="shadow dropdown-menu">
                                @php
                                 $countServiceItems = DB::table('tbl_service_items')->where(['user_id' => Auth::user()->id, 'expire_status' => 1])->count();
                                @endphp
                                <li><a class="dropdown-item" href="{{ route('user.viewbusiness') }}" id="globalheadernavhref">Active Services
                                        ({{ $countServiceItems }})</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Expired Services
                                        (0)</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Canceled Services
                                        (0)</a></li>
                            </ul>
                        </li>

                        <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">
                                Industries Nearby (0)</a></li>

                        <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">
                                Businesses Nearby (0)</a></li>

                    </ul>

                </li>
                </li>


                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"> <i class="fas fa-cogs"></i> My Jobs</a>

                    <ul class="shadow dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#" id="globalheadernavhref">Products (48)</a></li>
                        --}}
                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref"><i class="fas fa-cogs"></i> My
                                Jobs</a>
                            <ul class="shadow dropdown-menu">
                                @php
                                $countJobsItems = DB::table('tbl_job_items')->where(['user_id' => Auth::user()->id, 'expire_status' => 1])->count();
                               @endphp
                                <li><a class="dropdown-item" href="{{ route('user.viewjobs') }}" id="globalheadernavhref">Active Jobs ({{ $countJobsItems }})</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Expired Jobs (0)</a>
                                </li>
                                <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled Jobs (0)</a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-file"></i> My
                                CV</a>
                            <ul class="shadow dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Active CV (1)</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Expired CV (0)</a>
                                </li>
                                <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled CV (0)</a>
                                </li>
                            </ul>
                        </li>

                        <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">
                                Available Jobs (3)</a></li>

                        <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">
                                Job Seekers (16)</a></li>

                    </ul>

                </li>
                </li>


                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> My Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" id="globalheadernavhref">Sign In</a></li>
                        <li><a class="dropdown-item" href="#" id="globalheadernavhref">Join For Free </a></li>
                    </ul>
                </li> --}}


                <li class="nav-item">
                <li class="nav-item dropdown">
                    @foreach ($getuser as $row)
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"> <img class="nzuzi" src="{{ (!empty($row->profile)) ? url('/storage/assets/uploads/'.$row->profile) :  url('/storage/assets/images/deafault_pic.png')}}" alt="" width="20" height="20" style="border-radius:50%;outline-style:double  "> My Account</a>
                     @endforeach
                    <ul class="shadow dropdown-menu">
                        {{-- <li><a class="dropdown-item" href="#" id="globalheadernavhref">Products (48)</a></li>
                        --}}
                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref"><i class="fas fa-user"></i>
                                Account Settings</a>
                            <ul class="shadow dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user.profileinfo') }}" id="globalheadernavhref"><i
                                            class="fas fa-user"></i> My Profile Information (0)</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.business') }}" id="globalheadernavhref"><i
                                            class="fa fa-briefcase"></i> My Shop Account (0)</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.pagelinks') }}" id="globalheadernavhref"><i
                                            class="fa fa-link"></i> My Links (Social Media)</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.deleteaccount') }}" id="globalheadernavhref"><i
                                            class="fa fa-trash"></i> Delete My Account</a></li>
                            </ul>
                        </li>

                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-envelope"></i>
                                Mailbox <img src="{{ asset('assets/images/online.png') }}" alt=""></a>
                            <ul class="shadow dropdown-menu">
                               @php
                                  $getcountbuyer = DB::table('tbl_chats')
                                    ->select(
                                        'tbl_chats.id',
                                        'tbl_chats.seller_id',
                                        'tbl_chats.buyer_id',
                                        'tbl_chats.message',
                                        'tbl_chats.email',
                                        'tbl_chats.message_status',
                                        'tbl_chats.date_created',
                                        'users.profile',
                                        'users.islogged',
                                        'users.id as uid',
                                        DB::raw("(COUNT(tbl_chats.buyer_id)) as count_buyerid")
                                    )
                                    ->leftjoin('users','users.id','=','tbl_chats.buyer_id')
                                    ->whereNot('users.id', Auth::user()->id)
                                    ->get();
                               @endphp
                                <li>
                                    @foreach ($getcountbuyer as $y)
                                    <a class="dropdown-item" href="{{ route('user.newmail') }}" id="globalheadernavhref"><i
                                        class="fa fa-folder"></i> New Message ({{ $y->count_buyerid }})</a>
                                    @endforeach

                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.inbox') }}" id="globalheadernavhref"><i
                                            class="fa fa-folder-open"></i> New Message (1)</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('user.reply') }}" id="globalheadernavhref"><i
                                            class="fa fa-reply-all"></i> Reply (0)</a></li> --}}
                            </ul>
                        </li>


                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-envelope"></i>
                                Chat <img src="{{ asset('assets/images/online.png') }}" alt=""></a>
                            <ul class="shadow dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user.online') }}" id="globalheadernavhref"><i
                                            class="fa fa-comments"></i> Online (5)</a></li>
                            </ul>
                        </li>


                        <li><a class="dropdown-item" href="{{ route('user.changepassword') }}" id="globalheadernavhref">
                                <i class="fa fa-lock"></i> Change Password</a></li>

                        <li><a class="dropdown-item" href="/logout" id="globalheadernavhref">
                                <i class="fas fa-sign-out-alt"></i> Sign Out</a></li>

                    </ul>

                </li>
                </li>



                <li class="nav-item">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"> <i class="fas fa-plus-circle"></i> More</a>

                    <ul class="shadow dropdown-menu">
                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref">Help</a>
                            <ul class="shadow dropdown-menu">
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">Help</a></li>
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">FAQ</a></li>
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">Contact Us</a></li>
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">Advice</a></li>
                            </ul>
                        </li>

                        <li class="dropend">
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" id="globalheadernavhref">About Us</a>
                            <ul class="shadow dropdown-menu">
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">About Us</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.expireservices') }}" id="globalheadernavhref">Feedback</a></li>
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">Terms of Use</a></li>
                                <li><a class="dropdown-item" href="/" id="globalheadernavhref">Privacy Policy</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </li>
                </li>

                <li class="nav-item d-flex">

                    <a href="{{ route('user.postoptions') }}" id="globalheadernavhref"><button type="button" class="btn btnColor">Post for free</button></a>
                    &nbsp;<a href="{{ route('user.myorders') }}" id="globalheadernavhref"><button type="button"
                        class="btn btn-outline-success">Order now!</button></a>
                </li>
            </ul>

        </div>
    </nav>
    <span class="screen-darken"></span>
    <button data-trigger="navbar_main" class="d-lg-none navbar-toggler btnCss" type="button">
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

<div class="col-lg-12">
    <header class="py-5 _main ">
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
                                            <select name="country" class="form-select form-select2 example country-dropdown"
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
                                            <select name="country" class="form-select form-select2 state-dropdown"
                                                aria-label="Default select example" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; Select
                                                    State
                                                    &rarr;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select name="country" class="form-select form-select2 city-dropdown"
                                                aria-label="Default select example" id="borderinput">
                                                <option value="" selected="true" disabled="disable">&larr; Select
                                                    City
                                                    &rarr;</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control"
                                                placeholder="48 Products near you" id="borderinput" style="padding: 0.5rem;">
                                        </div>
                                        <div class="col-md-1">

                                            <button type="button" class="btn btnColorfind_"
                                                id="">Find&nbsp;Products</button>
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
