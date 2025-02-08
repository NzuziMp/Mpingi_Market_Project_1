<div class="row g-1" id="dynamic_contentp">
    <div id="load_data"></div>
        @forelse($products as $row)

            <div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                <div class="mb-4 card">
                 <div class="containeroverlay">
                     <div class="">
                      <img class="card-img-top_ embed-responsive-item" src="{{ (!empty($row->Images)) ? url('/storage/assets/uploads/'.$row->Images) :  url('/storage/assets/uploads/avatar_nzuzi1.png')}}"  alt="...">
                     </div>
                      <div class="overlay overlayTop">
                         <div class="text">
                                <h3 id="cssh2" class=""><i
                                        class="fa fa-user"></i>&nbsp;Seller &
                                    Buyer<br><br>
                                    @if(!Auth::check())
                                    <a href="{{ route('login') }}" id="removeunderline">
                                      <i class="fa fa-gift"></i> Order Now!
                                      </a>
                                    @else
                                      <a href="javascript:void(0)" id="removeunderline">
                                       <i class="fa fa-gift"></i> Order Now!
                                    </a>
                               @endif
                               <br><br>
                                    <a href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id),'product_type' => $row->product_type ]) }}" id="removeunderline">
                                        <i class="fa fa-tag"></i> Product&nbsp;Details
                                    </a><br><br>
                                    <a href="{{ route('shop_number',['id'=> encrypt($row->userid)]) }}" id="removeunderline">
                                        <i class="fa fa-shopping-cart"></i> See
                                        Store&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a><br><br>
                                    <a href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id),'product_type' => $row->product_type ]) }}" id="removeunderline">
                                        <i class="fa fa-phone"></i>
                                        <span class="hide-phone-number">{{ Str::limit($row->phone,4,  '') }}</span>
                                    </a>

                                </h3>
                            </div>
                        </div>

                     </div>
                     <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold">{{ Str::ucfirst($row->item_name) }}</h6>
                        <h5 class="card-text fw-bolder"><span
                                style="color: #ff7519;">{{ $row->price  }}</span>
                            <br> <strike> {{ $row->old_price }}</strike>
                        </h5>

                    </div>
                </div>
            </div>

      @empty

    <div class="alert alert-danger lign-items-center" role="alert">
        <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img"
            aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
            <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records Found!..,
            </h3>
        </div>
    </div>
    @endforelse

    <div class="col-md-12">

        {{ $products->links('pagination.custom')}}
    </div>

</div>
