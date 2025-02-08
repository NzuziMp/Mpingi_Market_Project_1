{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="">
    <div class="loader"></div>
    <div class="container">
        <section class="">
            {{-- --}}

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                         {{--  --}}
                         <div class="card">
                            <div class="text-center card">
                                <div class="card-header cardheaderCss">
                                    <h6 class="mt-2 header-title"><i class="fas fa-users"></i> Join free</h6>
                                </div>
                                <div class="mx-3 mt-3 text-center alert alert-warning titleDetails" role="alert">
                                    <p class="mx-3 text-center">Welcome to Mpingi Market!
                                        We believe that classifieds is important, we hope that you'll be connected here</p>

                                    <p class="mx-3 text-center">Create an account for a business, you can cancel your account any time you want
                                        No commitment, hidden fees or hassles</p>
                                </div>
                                <p class="top4"
                                    style="background-color:#FFF; border:none; margin-top:20px;color:#666"
                                    align="center">
                                    <img src="{{ asset('assets/images/Fichier 7.png') }}" height="100px" width="100px"> <br>
                                    Secure <br> <i class="fa fa-lock"></i>
                                    {{-- <a href="#" onclick="window.open('https://www.sitelock.com/verify.php?site=mpingimarket.com','SiteLock','width=600,height=600,left=160,top=170');"><img class="img-fluid" alt="SiteLock" title="SiteLock" src="https://shield.sitelock.com/shield/mpingimarket.com"></a> --}}
                                    {{-- Secure <br> <i class="fa fa-lock"></i> --}}
                                </p>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register.user') }}">
                                        @csrf
                                        <div class="mb-3 input-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa fa-user"></i>&nbsp;<font color='red'>*</font>
                                                </span>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  value="{{old('email')}}" placeholder="Email"
                                                    aria-label="Email" aria-describedby="basic-addon1" autocomplete="off">

                                            </div>
                                            @if ($errors->has('email'))
                                            <span class="mb-1 text-danger" style="text-align:left;font-size:15px!important">{{ $errors->first('email') }}</span>
                                          @endif
                                        </div>

                                        <div class="mb-3 input-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa fa-lock"></i>&nbsp;<font color='red'>*</font>
                                                </span>
                                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  value="{{old('password')}}" placeholder="Password"
                                                    aria-label="Password" aria-describedby="basic-addon1" autocomplete="off">

                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="text-danger" style="text-align:left;font-size:15px!important">{{ $errors->first('password') }}</span>
                                          @endif
                                        </div>


                                        <div class="mb-3 input-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa fa-lock"></i>&nbsp;<font color='red'>*</font>
                                                </span>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Re-Enter Password"
                                                    aria-label="Confirm-Password" aria-describedby="basic-addon1" autocomplete="off">

                                            </div>
                                            @if ($errors->has('confirm_password'))
                                            <span class="text-danger" style="text-align:left;font-size:15px!important">{{ $errors->first('confirm_password') }}</span>
                                          @endif
                                        </div>

                                        <div class="input-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label checkpass"
                                                            for="exampleCheck1">I agree with the terms and conditions of this Project</label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div> <!-- form-group// -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline btn-lg w-100 DetailsBtns2_" disabled>
                                               Create My Account</button>
                                        </div>
                                        <div class="mt-2 form-group">
                                            <button type="button" class="btn btn-outline btn-lg w-100 DetailsBtns_" >
                                             <a href="{{ route('login') }}" class="hrefCss" ><i class="fa fa-user"></i>&nbsp;Already a Member ?</a> </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                         {{--  --}}
                        </div>
                        <div class="mt-4 col-md-2 sectionx">
                            {{-- --}}
                            <div class="seperator_"><b>or</b></div>
                            {{-- --}}
                        </div>

                        <div class="sectionx col-md-5 ">
                            {{-- --}}
                            <div class="card flex1">

                                    <div class="mx-3 mt-3 text-center alert alert-warning titleDetails" role="alert">
                                        <p class="mx-3 text-center"><i class="fa fa-link"></i>  or you can sign up via your social network</p>

                                    </div>
                                    <div class="mx-3 mt-1">
                                            <p class="top5"
                                                style="background-color:#3b5998;  border:none; margin-top:0px;"
                                                align="center">
                                                <a href="">
                                                    <font color="#FFFFFF"><b><i class="fab fa-facebook-square"></i>
                                                            Facebook</b></font>
                                                </a>
                                            </p>

                                            <p class="top5"
                                                style="background-color:#d92521;  border:none; margin-top:0px;"
                                                align="center">
                                                <a href="">
                                                    <font color="#FFFFFF"><b><i class="fab fa-google-plus-square"></i>
                                                        Sign up with Google+</b></font>
                                                </a>
                                            </p>
                                         </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- --}}
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
        </div>
        </section>
        </header>
        @endsection
