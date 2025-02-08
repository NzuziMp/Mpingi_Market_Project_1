<div class="row" id="dynamic_content_">
    <div id="load_data"></div>
        @forelse($shops as $row)

        <div
        class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
          <div class="mb-4 card" style="width: 300px;;"> {{-- shadow-sm --}}

                    @if($row->product_id == 1)

                        <div class="">
                         <center>
                          <div style="background-color:#3b3b3b;height:200px">
                            <i class="mb-1 fa fa-shopping-cart fa-6x IClass"></i>
                              <h6 class="h6Css">{{ \Illuminate\Support\Str::upper(Str::limit($row->store_name,16))}}</h6>
                            </div>

                            <p class="mt-2 PClass">
                             <a href="shops/?shop_number=azRYbHppRENzUkVseUFubjdoZzFGQT09"  class="hrefCss3" data-bs-toggle="tooltip" data-bs-placement="top" title="Order from {{ \Illuminate\Support\Str::lower($row->store_name)}}">
                                <i class="fa fa-gift"></i>
                                Order Now!
                             </a>
                          </p>
                         </center>
                        </div>


                    @elseif($row->product_id == 2)

                        <div class="">
                            <center>
                                <div style="background-color:#3b3b3b;height:200px">
                                <i class="mb-1 fa fa-shopping-basket fa-6x IClass"></i>
                                <h6 class="h6Css">{{ \Illuminate\Support\Str::upper(Str::limit($row->store_name,16))}}</h6>
                                </div>

                                <p class="mt-2 PClass"><a href="shops/?shop_number=azRYbHppRENzUkVseUFubjdoZzFGQT09"  class="hrefCss3" data-bs-toggle="tooltip" data-bs-placement="top" title="Order from {{ \Illuminate\Support\Str::lower($row->store_name)}}">
                                    <i class="fa fa-gift"></i>
                                    Order Now!
                                </a></p>
                             </center>
                        </div>

                    @else

                        <div class="">
                            <center>
                                <div style="background-color:#3b3b3b;height:200px">
                                   <i class="mb-1 fa fa-shopping-bag fa-6x IClass"></i>
                                   <h6 class="h6Css">{{ \Illuminate\Support\Str::upper(Str::limit($row->store_name,16))}}</h6>
                                </div>

                                <p class="mt-2 PClass"><a href="shops/?shop_number=azRYbHppRENzUkVseUFubjdoZzFGQT09"  class="hrefCss3" data-bs-toggle="tooltip" data-bs-placement="top" title="Order from {{ \Illuminate\Support\Str::lower($row->store_name)}}">
                                    <i class="fa fa-gift "></i>
                                    Order Now!
                                </a></p>
                             </center>
                        </div>

                    @endif



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

        {{ $shops->links('pagination.custom')}}
    </div>

</div>
