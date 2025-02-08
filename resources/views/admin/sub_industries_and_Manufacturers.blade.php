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
                                <div class="col-md-7 d-flex">

                                    <h5><i class="far fa-clone"></i> {{ $subId->category_name }} </h5>
                                </div>
                                <div class="col-md-5">
                                    <a href="{{ route('user.industriesAndManufacturers') }}" class="hrefCss"><button
                                            type="button" class="btn btn-outline-warning"><i
                                                class=" fas fa-long-arrow-alt-left"></i> Back </button> </a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#subindustriesandmanufacturesModal"
                                        class="btn btn-outline-success">Add Sub Industries & Manufactures</a>
                                    @include('admin.modal.add_subindustriesandmanufactures')
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table mt-3 table-striped table-sm subindusAndManufac-datatable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Sub Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($fetchallsSubIndusandManufac as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->sub_category_name }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="flex-1"><button type="button"
                                                            class="btn btn-outline-primary btn-sm btn_editsubindustriesandManufactures"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editsubindustriesandmanufacturesModal{{ $row->id }}"
                                                            ><i
                                                                class="fa fa-edit"></i></button></div> | <div
                                                        class="flex-1"><button type="button"
                                                            class="btn btn-outline-danger btn-sm btn-deleteSubIndustriesandManufactures"
                                                            data-did="{{ $row->id }}"><i class="fa fa-trash"></i></button></div>
                                                </div>
                                                @include('admin.modal.edit_subindustriesandmanufactures')
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('admin.layouts.footer')



</body>

</html>
