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
                            {{-- <h5>Welcome!, {{ auth()->user()->email }}</h5> --}}

                            <div class="row">
                                <div class="col-md-9">
                                    <h5><i class="fa fa-industry"></i> Industries and Manufacturers</h5>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#industriesandmanufacturesModal"
                                        class="btn btn-outline-success">Add Industries & Manufactures</a>
                                    @include('admin.modal.add_industriesandmanufactures')
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table mt-3 table-striped table-sm indusAndManufac-datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.modal.edit_industriesandmanufactures')
        @include('admin.layouts.footer')
</body>
</html>
