<div class="row" id="dynamic_contents_ap">
    <div id="load_data"></div>
      <div class="mx-2 mt-2 table-data_ap">

        @forelse($getimagex as $row)


        <div class="mx-1 row " id="dynamic_content_ap">
            <div class="col-md-3 col-6 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger">
                <div class="mb-4 card"> {{-- shadow-sm --}}
                    <div class="containeroverlay">
                        <div class="">
                            <img class="card-img-top_ embed-responsive-item"
                                src="{{ (!empty($row->Images)) ? url('/storage/assets/uploads/'.$row->Images) :  url('/storage/assets/uploads/avatar_nzuzi1.png')}}"
                                 alt="...">
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
                                    <a href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->product_id),'product_type' => $row->product_type]) }}" id="removeunderline">
                                        <i class="fa fa-tag"></i> Product&nbsp;Details
                                    </a><br><br>
                                    <a href="{{ route('shop_number',['id'=> encrypt($row->userid)]) }}" id="removeunderline">
                                        <i class="fa fa-shopping-cart"></i> See
                                        Store&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a><br><br>
                                    <a  href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->product_id),'product_type' => $row->product_type]) }}" id="removeunderline">
                                        <i class="fa fa-phone"></i>
                                        <span class="hide-phone-number1">{{ Str::limit($row->phone,4,  '') }}</span>
                                    </a>

                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title fw-bold">{{ Str::ucfirst(Str::limit($row->item_name, 16, '...')) }}</h6>
                        <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                number_format($row->price, 2) }}</span>
                            <br> <strike> {{ number_format($row->old_price,2) }}</strike>
                        </h5>
                        {{-- <p class="text-center titleDetailslide"><i class="fa fa-image"></i>&nbsp;<a href="{{ route('itempictures', ['upload_id' =>encrypt($row->ImageIDS) ])}}" class="linkPhoto">{{ $row->upload_ids }} photos </a> </p> --}}
                    </div>


                </div>
            </div>
           </div>
       {{-- --}}

       @empty

       @endforelse

       <div class="col-md-12">

        {{ $getimagex->links('pagination.custom')}}
    </div>
   </div>



</div>
