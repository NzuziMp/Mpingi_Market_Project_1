<div id="navbar">
    <!-- Responsive navbar-->
    <nav id="navbar_main" class="mb-0 shadow-sm navbar navbar-expand-lg navbar-light mobile-offcanvas" style="background-color: #fff;">
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

                    <li class="nav-item">
                        <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                             data-bs-auto-close="outside"> <i class="fas fa-tag"></i> Products</a>

                         <ul class="shadow dropdown-menu">
                             {{-- <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">Products (48)</a></li> --}}
                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-list"></i> Categories</a>
                                 <ul class="shadow dropdown-menu">
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-tag"></i> Manage Categories (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-tag"></i> Manage Arcticles (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-tag"></i> Manage Products Categories(0)</a></li>
                                 </ul>
                             </li>

                           <li><a class="dropdown-item" href="{{ route('admin.newProducts') }}"
                                     id="globalheadernavhref">
                                     <i class="fa fa-tag"></i> Manage New Products (0)</a></li>

                            <li><a class="dropdown-item" href="#"
                            id="globalheadernavhref">
                            <i class="fa fa-tag"></i> Manage Used Products (0)</a></li>

                            <li><a class="dropdown-item" href="#"
                                id="globalheadernavhref">
                                <i class="fa fa-tag"></i> Manage Refurbished Products(0)</a></li>

                         </ul>

                       </li>
                     </li>


                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-tag"></i> Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="globalheadernavhref">My Actives Products (1)</a>
                            </li>
                            <li><a class="dropdown-item" href="#" id="globalheadernavhref">My Expired Products (0)</a>
                            </li>
                            <li><a class="dropdown-item" href="#" id="globalheadernavhref">My Canceled Products (0)</a>
                            </li>
                            <li><a class="dropdown-item" href="#" id="globalheadernavhref">My Order Products (0) </a>
                            </li>
                            <li><a class="dropdown-item" href="#" id="globalheadernavhref">My Sales Products (0) </a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item">
                        <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                             data-bs-auto-close="outside"> <i class="fas fa-wrench"></i> Services</a>

                         <ul class="shadow dropdown-menu">
                             {{-- <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">Products (48)</a></li> --}}
                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"> Industries & Manufacturers</a>
                                 <ul class="shadow dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('user.industriesAndManufacturers')  }}" id="globalheadernavhref">Manage Industries & Manufacturers</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Active Services (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Expired Services (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled Services (0)</a></li>
                                 </ul>
                             </li>

                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-briefcase"></i> Businesses</a>
                                 <ul class="shadow dropdown-menu">
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Active Services (0)</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Expired Services (0)</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled Services (0)</a></li>
                                 </ul>
                             </li>

                           <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">
                                     Industries Nearby (3)</a></li>

                            <li><a class="dropdown-item" href="#"
                            id="globalheadernavhref">
                                     Businesses Nearby (16)</a></li>

                         </ul>

                       </li>
                     </li>


                    <li class="nav-item">
                        <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                             data-bs-auto-close="outside"> <i class="fas fa-cogs"></i> Jobs</a>

                         <ul class="shadow dropdown-menu">
                             {{-- <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">Products (48)</a></li> --}}
                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"><i class="fas fa-cogs"></i> My Jobs</a>
                                 <ul class="shadow dropdown-menu">
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Active Jobs (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Expired Jobs (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled Jobs (0)</a></li>
                                 </ul>
                             </li>

                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-file"></i> My CV</a>
                                 <ul class="shadow dropdown-menu">
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Active CV (1)</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Expired CV (0)</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Canceled CV (0)</a></li>
                                 </ul>
                             </li>

                           <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">
                                     Available Jobs (3)</a></li>

                            <li><a class="dropdown-item" href="#"
                            id="globalheadernavhref">
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
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                             data-bs-auto-close="outside"> <i class="fas fa-user"></i> My Account</a>

                         <ul class="shadow dropdown-menu">
                             {{-- <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">Products (48)</a></li> --}}
                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"><i class="fas fa-user"></i> Account Settings</a>
                                 <ul class="shadow dropdown-menu">
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fas fa-user"></i> My Profile Information (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-briefcase"></i> My Shop Account (0)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-link"></i> My Links (Social Media)</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-trash"></i> Delete My Account</a></li>
                                 </ul>
                             </li>

                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-envelope"></i> Mailbox <img src="{{ asset('assets/images/online.png') }}" alt=""></a>
                                 <ul class="shadow dropdown-menu">
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-folder"></i> New Message (4)</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-folder-open"></i> New Message (1)</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-reply-all"></i> Reply (0)</a></li>
                                 </ul>
                             </li>


                             <li class="dropend">
                                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" id="globalheadernavhref"><i class="fa fa-envelope"></i> Chat <img src="{{ asset('assets/images/online.png') }}" alt=""></a>
                                <ul class="shadow dropdown-menu">
                                   <li><a class="dropdown-item" href="#" id="globalheadernavhref"><i class="fa fa-comments"></i> Online (5)</a></li>
                                </ul>
                            </li>


                           <li><a class="dropdown-item" href="#"
                                     id="globalheadernavhref">
                                     <i class="fa fa-lock"></i>  Change Password</a></li>

                            <li><a class="dropdown-item" href="/logout"
                            id="globalheadernavhref">
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
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Help</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">FAQ</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Contact Us</a></li>
                                     <li><a class="dropdown-item" href="#" id="globalheadernavhref">Advice</a></li>
                                 </ul>
                             </li>

                             <li class="dropend">
                                 <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                     data-bs-auto-close="outside" id="globalheadernavhref">About Us</a>
                                 <ul class="shadow dropdown-menu">
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">About Us</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Feedback</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Terms of Use</a></li>
                                    <li><a class="dropdown-item" href="#" id="globalheadernavhref">Privacy Policy</a></li>
                                 </ul>
                             </li>

                         </ul>

                       </li>
                     </li>

                    <li class="nav-item">
                        <button type="button" class="btn btnColor">Sell for free</button>&nbsp;<button type="button"
                        class="btn btn-outline-success">Buy now!</button>
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
