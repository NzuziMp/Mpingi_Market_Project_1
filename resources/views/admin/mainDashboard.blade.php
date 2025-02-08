@include('admin.layouts.header')
<body class="flexcroll">
    <div class="topnav">
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
    </div>

    @include('admin.layouts.navbar')

    <div class="col-lg-12">

        <section class="py-2 border-bottom" id="features">
            <div class="container">

                {{--all middle content --}}
                <div class="mb-4 col-lg-12 mb-lg-0">
                    <div class="mb-3 card card6">
                    <div class="card-body ">
                          <center><h1>Welcome!, {{ auth()->user()->email }}</h1></center>
                      </div>
                    </div>
                </div>
            </div>
        </section>

        @include('admin.layouts.footer')

        </body>
        </html>
