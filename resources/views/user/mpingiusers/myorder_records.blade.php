<div class="row g-1" id="dynamic_content_product">
    <div id="load_data"></div>
    @forelse($products as $row)

    <div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
        <div class="mb-4 card">
            <div class="containeroverlay">
                <div class="">
                    <img class="card-img-top_ embed-responsive-item"
                        src="{{ (!empty($row->Images)) ? url('/storage/assets/uploads/'.$row->Images) :  url('/storage/assets/uploads/avatar_nzuzi1.png')}}"
                          alt="...">
                </div>
                <div class="overlay overlayTop">
                    <div class="text">
                        <h3 id="cssh2" class=""><i class="fa fa-user"></i>&nbsp;Seller &
                            Buyer<br><br>
                            <a href="{{ route('user.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id) ]) }}" id="removeunderline">
                                <i class="fa fa-gift"></i> Order Now!
                             </a>
                            <br><br>
                            <a href="{{ route('user.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id) ]) }}" id="removeunderlines">
                                <i class="fa fa-tag"></i> Product&nbsp;Details
                            </a><br><br>
                            <a href="{{ route('user.shop_number',['id'=> encrypt($row->userid)]) }}" id="removeunderlines">
                                <i class="fa fa-shopping-cart"></i> See
                                Store&nbsp;&nbsp;&nbsp;&nbsp;
                            </a><br><br>
                            <a href="{{ route('user.productdetails',['id'=> encrypt($row->id)]) }}" id="removeunderlines">
                                <i class="fa fa-phone"></i>
                                +1(418) 509-2913
                            </a>

                        </h3>
                    </div>
                </div>


            </div>
            <div class="card-body d-flex flex-column">
                <h6 class="card-title fw-bold">{{ Str::ucfirst(Str::limit($row->item_name, 16, '...')) }}</h6>
                <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{ number_format($row->price,2) }}</span>
                    <br> <strike> {{ number_format($row->old_price,2) }}</strike>
                </h5>

            </div>
        </div>
    </div>

    @empty

    <div class="alert alert-danger lign-items-center" role="alert">
        <svg class="flex-shrink-0 bi me-2" width="24" height="24" role="img" aria-label="Danger:">
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
