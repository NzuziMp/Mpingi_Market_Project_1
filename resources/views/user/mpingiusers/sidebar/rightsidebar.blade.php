               {{--all right content --}}
               <div class="mb-4 col-md-2 mb-lg-0">
                <div class="mb-3 card card6">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#fff;font-weight:bold">
                        <div class="row">
                            <div class="col-11"><i class="fa fa-question-circle"></i> HELP CENTER
                            </div>
                            {{-- <div class="col-1"><i class="fa fa-times text-dark close-icon6"></i></div> --}}
                        </div>
                    </div>
                    <h4 class="py-2 top7" align="center">
                        <i class="fa fa-question-circle fa-2x"></i> How to :
                    </h4>
                    <div class="card-body" style="background-color:#fcf8e3;" align="left">
                        {{-- --}}
                        <p style="padding-top:0px;  border:none;color:#ff7519;" align="center">
                            <a href="#" class="hrefCss_x">PRODUCTS</a>
                        </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-tags fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#postfreeproductsModal"> Post free products</a>
                                @include('user.modal.postfreeproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-tags fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#postpayproductsModal"> Post pay products</a>
                                @include('user.modal.postpayproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-gift fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#orderfreeproductsModal"> Order products</a>
                                @include('user.modal.orderproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-search fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#searchproductsModal"> Search products</a>
                                @include('user.modal.searchproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="far fa-money-bill-alt fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#changeproductspriceModal"> Change price</a>
                                @include('user.modal.changeproductspriceguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-plus-circle fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#addpicturesproductsModal"> Add pictures</a>
                                @include('user.modal.addpicturesproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-share-square fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#shareproductsModal"> Share products</a>
                                @include('user.modal.shareproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-edit fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#editproductsModal"> Edit products</a>
                                @include('user.modal.editproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-edit fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#viewproductsModal"> View products</a>
                                @include('user.modal.viewproductsguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-times fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#deleteproductsModal"> Delete products</a>
                                @include('user.modal.deleteproductsguide')
                            </p>

                        <p style="padding-top:0px;  border:none;color:#ff7519;" align="center">
                            <a href="#" class="hrefCss_x">ACCOUNTS</a>
                        </p>

                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-user fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#personalinformationModal"> Personal Information</a>
                                @include('user.modal.personalinformationguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-briefcase fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#createashopModal"> Create a shop</a>
                                @include('user.modal.createashopguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fas fa-sync fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#changepasswordModal"> Change password</a>
                                @include('user.modal.changepasswordguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-times fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#deleteaccountModal"> Delete Account</a>
                                @include('user.modal.deleteaccountguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-envelope fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#changeemailModal"> Change Email</a>
                                @include('user.modal.changeemailguide')
                            </p>

                        <p style="padding-top:0px;  border:none;color:#ff7519;" align="center">
                            <a href="#" class="hrefCss_x">MESSAGE</a>
                        </p>

                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-envelope fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#readmessageModal"> Read Message</a>
                                @include('user.modal.readmessageguide')
                            </p>
                        <p class="hrefCsslink" style="font-weight: bold;text-align:left;color:#8a6d3b"><i
                                class="fa fa-reply-all fa-1x" style="font-size:1.1rem"></i><a href="#"
                                class="hrefCsslink_" data-bs-toggle="modal" data-bs-target="#readreplyModal"> Read Reply</a>
                                @include('user.modal.readreplyguide')
                            </p>

                        {{-- --}}
                    </div>
                </div>
            </div>
            {{--end all right content --}}
