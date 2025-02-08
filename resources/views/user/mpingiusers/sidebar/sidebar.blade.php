        {{--all left content --}}
        <div class="mb-4 col-md-3 mb-lg-0">
        <div class="mb-3 card card6">
            <div class="card-header"
                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                <div class="row">
                     @foreach ($getuser as $row)
                        @if(is_null($row->first_name)|| is_null($row->gender) || is_null($row->date) || is_null($row->month) || is_null($row->year)
                           || is_null($row->country) || is_null($row->state_id) || is_null($row->mobile) || is_null($row->address_1))
                            <div class="col-11"><i class="fa fa-user"></i> Hi, Guest</div>
                        @else
                            <div class="col-11"><i class="fa fa-user"></i> {{ \Illuminate\Support\Str::ucfirst($row->first_name) }} {{ \Illuminate\Support\Str::ucfirst($row->last_name) }}</div>
                        @endif
                      @endforeach
                     {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                 </div>
            </div>
            <div class="card-body">
                {{-- --}}
                <div class="" style="text-align: center">
                    <span  data-bs-toggle="tooltip" data-bs-placement="top" title="Change picture">
                        @foreach ($getuser as $row)
                        <div class="mx-auto overflow-hidden position-relative rounded-circle custom-circle-image">
                        <img src="{{ (!empty($row->profile)) ? url('/storage/assets/uploads/'.$row->profile) :  url('/storage/assets/images/deafault_pic.png')}}"
                            class="w-100 h-100" alt="..." style="border-radius: 50%"
                            data-bs-toggle="modal" data-bs-target="#UploadpicModal">
                        </div>
                            @endforeach
                    </span>
                    <div class="mt-2 row g-1">
                        <div class="mt-1 col-6 d-flex" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Click to take snap picture">
                            <div class="card w-100">
                                <a href="snap3.php?id=1000" id="snap" class="py-2 mx-1 hrefCssCam"><span
                                        class="py-2 mx-1"> <i class="fa fa-camera fa-1x"
                                            style="font-size:1.3rem;"></i> Snap Photo</span></a>
                            </div>
                        </div>
                        <div class="mt-1 col-6 d-flex" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Click to upload picture">
                            <div class="card w-100">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#UploadpicModal" id="snap" class="py-2 mx-1 hrefCssCam"><span
                                        class="py-2 mx-1"> <i class="fa fa-upload fa-1x"
                                            style="font-size:1.3rem;font-weight: bold"></i> Upload
                                        Photo</span></a>
                            </div>
                        </div>
                    </div>
                    @include('user.modal.uploadprofileModal')

                    <div class="mt-2 row" style="font-weight: bold;text-align:left">
                        <p class="hrefCsslink" style="font-weight: bold;text-align:center"><i
                                class="fa fa-key fa-1x" style="font-size:1.3rem"></i><a href="#"
                                class="hrefCsslink_x" data-bs-toggle="modal"
                                data-bs-target="#UploadpicModal">Account Settings</a></p>
                        <hr>
                        <p class="hrefCsslink"><i class="fa fa-user fa-1x" style="font-size:1.3rem"></i><a
                                href="{{ route('user.profileinfo') }}" class="hrefCsslink_x"> My Profile Account</a></p>
                        <p class="hrefCsslink"><i class="fa fa-shopping-cart fa-1x"
                                style="font-size:1.3rem"></i><a href="{{ route('user.business') }}" class="hrefCsslink_x"> My Shop
                                Account</a></p>
                        <p class="hrefCsslink_x"><i class="fa fa-link fa-1x" style="font-size:1.3rem"></i><a
                                href="{{ route('user.pagelinks') }}" class="hrefCsslink_x"> My Links (Social media)</a></p>
                        <p class="hrefCsslink_x"><i class="fa fa-lock fa-1x" style="font-size:1.3rem"></i><a
                                href="{{ route('user.changepassword') }}" class="hrefCsslink_x"> Change Password</a></p>
                        <p class="hrefCsslink_x"><i class="fa fa-times fa-1x"
                                style="font-size:1.3rem;color:rgb(223, 56, 56)"></i><a href="{{ route('user.deleteaccount') }}"
                                class="hrefCsslink_x"> Delete Account</a></p>
                        <p class="hrefCsslink_x"><i class="fas fa-sign-out-alt fa-1x"
                                style="font-size:1.3rem;"></i><a href="/logout" class="hrefCsslink_x">Sign Out</a>
                        </p>

                        <p class="hrefCsslink_x" style="font-weight: bold;margin-top:4%;text-align:center">
                            </i> Mail Box <img src="{{ asset('assets/images/online.png') }}" alt=""></p>
                        <hr>
                        <p class="hrefCsslink_x"><i class="fa fa-folder fa-1x"
                                style="font-size:1.3rem"></i><a href="{{ route('user.newmail') }}" class="hrefCsslink_x"> New Messages
                                <span class="badge_3">5</span></a></p>
                        <p class="hrefCsslink_x"><i class="fa fa-folder-open fa-1x"
                                style="font-size:1.3rem"></i><a href="{{ route('user.inbox') }}" class="hrefCsslink_x"> Inbox <span
                                    class="badge_3">1</span></a></p>
                        <p class="hrefCsslink_x"><i class="fa fa-reply fa-1x"
                                style="font-size:1.3rem"></i><a href="{{ route('user.reply') }}" class="hrefCsslink_x"> Reply <span
                                    style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></a></p>

                        <p class="hrefCsslink_x" style="font-weight: bold;margin-top:4%;text-align:center">
                            </i> Chat <img src="{{ asset('assets/images/online.png') }}" alt=""></p>
                        <hr>
                        <p class="hrefCsslink_x"><i class="fa fa-comments fa-1x"
                                style="font-size:1.3rem"></i><a href="{{ route('user.online') }}" class="hrefCsslink_x"> Online <span
                                    class="badge_3">5</span></a></p>



                        <p class="hrefCsslink_x" style="font-weight: bold;margin-top:4%;text-align:center">
                            </i><i class="fa fa-question fa-1x" style="font-size:1.3rem"></i> Help Center
                        </p>
                        <hr>
                        <p class="text-left hrefCsslink_x"><i class="fa fa-question fa-1x"
                                style="font-size:1.3rem"></i><a href="{{ route('user.expireservices') }}" class="hrefCsslink_x"> Help
                                Center</a></p>
                    </div>

                </div>
                {{-- --}}
            </div>
        </div>
    </div>
    {{--end all left content --}}
