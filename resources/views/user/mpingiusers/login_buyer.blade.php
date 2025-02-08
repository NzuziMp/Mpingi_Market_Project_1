{{-- @include('layouts2.contents') --}}
@extends('layouts2.main')
@section('content2')
<div class="">
    {{-- <div class="loader"></div> --}}
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
                                    <h6 class="mt-2 header-title"><i class="fas fa-sign-out-alt"></i> Sign In</h6>
                                </div>
                                <p class="top4"
                                    style="background-color:#FFF; border:none; margin-top:20px;color:#666"
                                    align="center">
                                    <img src="{{ asset('assets/images/logo_title_9.png') }}"> <br>
                                    Secure <br> <i class="fa fa-lock"></i>
                                </p>
                                <div class="mx-3 text-center alert alert-warning titleDetails" role="alert">
                                    Please sign in to start Posting and Ordering your Products on Mpingi
                                </div>
                                <div class="mx-3">
                                    @if(session()->has('mgs'))
                                            <div class="alert alert-success alerts">
                                            {{ session()->get('mgs') }}
                                            </div>
                                        @endif
                                    </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login.custom') }}">
                                        @csrf
                                        <div class="mb-3 input-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="fa fa-user"></i>&nbsp;<font color='red'>*</font>
                                                </span>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}" placeholder="Email"
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
                                                <input type="password" name="password" id="myInput" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                                    aria-label="Password" aria-describedby="basic-addon1" autocomplete="off">

                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="text-danger" style="text-align:left;font-size:15px!important">{{ $errors->first('password') }}</span>
                                          @endif
                                        </div>
                                        <div class="input-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                        id="click-check">
                                                        <label class="form-check-label checkpass"
                                                            for="exampleCheck1">Show Password Characters</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input" name="remember"
                                                            id="exampleCheck1">
                                                        <label class="form-check-label checkpass"
                                                            for="exampleCheck1">Keep me logged in</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                       <!-- form-group// -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline btn-lg w-100 DetailsBtns2_">
                                                Sign In </button>
                                        </div>


                                        <div class="seperator"><b>or</b></div>
                                        <p class="DetailsBtnlogin_">Sign in with your social media account</p>
                                        <!-- Social login buttons -->

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
                                                Sign in with Google</b></font>
                                        </a>
                                        </p>

                                        {{-- <p class="top5"
                                            style="background-color:#2daae1;  border:none; margin-top:0px;"
                                            align="center">
                                            <a href="">
                                                <font color="#FFFFFF"><b><i class="fab fa-twitter-square"></i>
                                                        Twitter</b></font>
                                            </a>
                                        </p> --}}

                                        <div class="mt-4 form-group">
                                            <div class="row g-1">
                                                <div class="col-6">
                                                    <a href="{{ route('forgotpassword') }}" class="DetailsBtnlogin_2"><button type="button"
                                                        class="btn btn-outline btn-lg w-100 DetailsBtnlogin_2"><i
                                                            class="fa fa-lock"></i> I forgot my password </button></a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="{{ route('joinlogin') }}" class="DetailsBtnlogin_2"><button type="button"
                                                        class="btn btn-outline btn-lg w-100 DetailsBtnlogin_2"><i
                                                            class="fa fa-users"></i> Register a new membership
                                                    </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
