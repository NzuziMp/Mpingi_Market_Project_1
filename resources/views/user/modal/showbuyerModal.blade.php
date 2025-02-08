<!-- Modal -->
<div class="modal fade" id="showbuyer_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #9f9f9f;font-family: Helvetica, Arial, sans-serif;font-size: 100%;font-size: 86%;">  <i class="fa fa-user"></i> Buyer Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

                {{-- --}}
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img class="rounded-img"
                                    src="" id="view_profile2"
                                    alt="" width="40" height="40">
                            </div>
                            <div class="mt-3 col-10">
                                <p class="titleDetails">&nbsp;Buyer Details</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            <span class="mb-2 d-flex titleDetails_"><i
                                    class="mt-1 fa fa-user"></i>&nbsp;Name:&nbsp;
                                  <span id="view_ulastname2" style="text-transform: capitalize;"></span>&nbsp;<span style="text-transform: capitalize;" id="view_ufirstname2"></span></span>
                            <span class="mb-2 d-flex titleDetails_"><i
                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;Country:&nbsp;<span id="view_country_name2" style="text-transform: capitalize;"></span>&nbsp;<img
                                    src="" id="view_flag2" alt=""
                                    width="30" height="20" class="img_icons_2"></span>
                                    {{-- <img src="{{ asset('assets/icons/CA.png') }}" alt=""
                                    width="30" height="20" class="img_icons_2"></span> --}}
                            <span class="mb-2 d-flex titleDetails_"><i
                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;Province:&nbsp;<span id="view_state_name2" style="text-transform: capitalize;"></span></span>
                            <span class="mb-2 d-flex titleDetails_"><i
                                    class="mt-1 fa fa-map-marker-alt"></i>&nbsp;City:&nbsp;<span id="view_city_name2" style="text-transform: capitalize;"></span></span>
                            <span class="mb-2 d-flex titleDetails_"><i
                                class="fa fa-shopping-cart"></i>&nbsp;<a
                                    style="color:#ff7519; font-weight:bold" href="#">See Shop <span id="view_business_name2" style="text-transform: capitalize;"></span></a></span>
                                    {{-- {{ route('guest.shop_number',['id'=> encrypt($row->business_id)]) }} --}}
                            <span class="mb-2 d-flex titleDetails_"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Login to view the Contact details of this seller"><i
                                    class="mt-1 fa fa-phone"></i>&nbsp;Mobile:&nbsp;<span id="view_mobile2" style="text-transform: capitalize;"></span></span>
                            <span class="mb-2 d-flex titleDetails_"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Login to view the Contact details of this seller"><i
                                    class="mt-1 fa fa-phone"></i>&nbsp;Telephone:&nbsp;<span id="view_phone2" style="text-transform: capitalize;"></span>  </span>

                            <span class="mb-2 d-flex titleDetails_"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Click here to order from Desange Queen..."><a
                                    href="#" class="hrefCss"><i
                                        class="fa fa-plus-circle"></i>&nbsp; More
                                    Details</a> | Offline: <img
                                    src="{{asset('assets/images/off.png')}}" alt="">
                            </span>
                            <span data-bs-toggle="modal"
                                data-bs-target="#login_Modal"><span
                                    class="mb-2 d-flex titleDetails__"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Click here to leave message"><i
                                        class="mt-1 fa fa-envelope"></i>&nbsp; Leave
                                    Message</span></span>

                        </p>

                    </div>

                </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
