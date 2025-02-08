<div class="content">
    <!-- content section-->
    <section class="py-0 border-bottom" id="features">
        <div class="container-fluid">

            <div class="row g-3">

                <div class="mb-5 col-lg-2 mb-lg-0">

                    <div class="mb-3 card card1">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">

                                <div class="col-10"><i class="fas fa-list"></i> <span class="counter" data-target="3140">0</span> CATEGORIES</div>
                                <div class="col-2"><i class="fa fa-times text-dark close-icon"></i></div>
                            </div>

                        </div>

                             <div class="row align-items-center justify-content-center">
                            <div class="accordion" id="accordionPlusMinus">

                                @foreach ($fetchallCategories as $row)
                                    <div class="accordion-item">
                                        <h6 class="accordion-header" style="border-bottom: 1px solid #6666666c" id="headingOne" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="{{ $row->category_name_desc }}">

                                              <div class="d-flex">

                                                <div class="flex-1 mt-3" style="margin-left:3%">
                                                    <img
                                                    src="{{ '/storage/assets/images/' . $row->category_image }}"
                                                    height="20px" width="25px" class="img_icons"
                                                    alt="Nzuzi">&nbsp;<span
                                                    class="hoversidemenu" >
                                                </div>
                                                <div class="flex-1 mt-3">
                                                    <form id="form" action="{{ route('guest.postoptionfunction') }}" method="POST">
                                                        <input type="hidden" name="id" value="{{ encrypt($row->id) }}">
                                                        @csrf
                                                    <button type="button" onclick="submit()" style="border: none;background-color:#FFF; color: #666;   font: 10pt / 130% Helvetica, Arial, sans-serif;">
                                                        @if(session()->get('locale') === 'fr')
                                                          {{ $row->category_name_fr }}
                                                        @else
                                                          {{ $row->category_name_en }}
                                                        @endif

                                                    </button>
                                                </form>
                                                </div>
                                                </span>&nbsp;
                                             @php
                                                $subcategories_name = DB::table('tbl_sub_categories')
                                                ->where('category_id', $row->id)
                                                ->get();
                                            @endphp
                                             @foreach ($subcategories_name as  $data)
                                                @php
                                                    $allcountsql1 = DB::table('tbl_product_items')
                                                    ->select('sub_category_id',
                                                            'expire_status',
                                                            'category_id',
                                                            DB::raw('COUNT(*) AS total'),
                                                            'article_id',
                                                            )
                                                     ->where(['category_id'=> $data->category_id, 'expire_status'=>1])
                                                    ->get();
                                                @endphp
                                            <span class="mt-3 ml-2">
                                                @foreach ($allcountsql1 as $r)

                                                         @if($r->sub_category_id == $data->id)
                                                            @if($r->total == 0)
                                                                [0]
                                                            @else
                                                                <span class="badge_3">{{ $r->total }}</span>
                                                            @endif
                                                        @endif

                                                    @endforeach
                                              </span>
                                              @endforeach
                                                    <button type="button" class="accordion-button collapsed button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $row->id }}"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                              </div>
                                            </button>

                                        </h6>
                                        <div id="collapseOne{{ $row->id }}" class="accordion-collapse collapse animate slideIn"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionPlusMinus">
                                        <div class="accordion-body panelx2">
                                            @php
                                                $subcategories_name = DB::table('tbl_sub_categories')
                                                ->where('category_id', $row->id)
                                                ->get();
                                            @endphp
                                            @foreach ($subcategories_name as  $data)
                                            <p class="">
                                                <a href="{{ route('guest.viewdetailscategories', ['subcategory_id' => encrypt($data->id), 'category_id' =>encrypt($row->id)]) }}" class="link-secondary sidemenu_a" data-aos="zoom-in"
                                                    data-aos-duration="1000" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Textile & Leather Products">
                                                    <img src="{{ '/storage/assets/icons_2/' . $data->sub_category_image }}" alt="" width="30"
                                                        height="30" class="img_icons_4">
                                                        @if(session()->get('locale') === 'fr')
                                                         {{ Str::limit($data->sub_category_name_fr, '18', '...') }}
                                                      @else
                                                         {{ Str::limit($data->sub_category_name_en, '18', '...') }}
                                                      @endif

                                                        @php
                                                            $allcountsql = DB::table('tbl_product_items')
                                                            ->select('sub_category_id', 'category_id',DB::raw('COUNT(article_id) AS article_countall, article_id'))
                                                            ->where('expire_status',1)
                                                            ->groupBy('sub_category_id')
                                                            ->get();
                                                        @endphp
                                                       @foreach ($allcountsql as $r)
                                                                @if($r->sub_category_id == $data->id)
                                                                    @if($r->article_countall == 0)
                                                                        [0]
                                                                    @else
                                                                        <span class="badge_3">{{ $r->article_countall }}</span>
                                                                    @endif
                                                                @endif
                                                           @endforeach
                                                    {{-- <span class="badge rounded-pill bg-light text-dark"><span
                                                            style="color:#666;;font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span></span> --}}

                                                </a>


                                            </p>
                                            @endforeach

                                        </div>
                                    </div>

                                    </div>
                                @endforeach
                          </div>
                        </div>
                    </div>


                    <div class="mb-3 card ">
                        <div class="card-body">
                            <img class="mySlides w3-animate-fading" src="{{ asset('assets/images/jumbo.gif') }}"
                                style="width:100%;height:100%">

                            </pre>
                        </div>
                    </div>

                    <div class="mb-3 card card3">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-10"><i class="fa fa-wrench"></i> <span class="counter" data-target="653">0</span> SERVICES</div>
                                <div class="col-2"><i class="fa fa-times text-dark close-icon3"></i></div>
                            </div>

                        </div>

                        <div class="row align-items-center justify-content-center">
                            <div class="" id="" style="">

                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                    <a href="#" class="">
                                        <i class="fa fa-bicycle"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Active Life
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-paint-brush"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Arts & Entertainment
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                    <a href="#" class="">
                                        <i class="fa fa-car" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Automotive
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                    <a href="#" class="">
                                        <i class="fa fa-gift" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Beauty & Spas
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-graduation-cap"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Education
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">2</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                    <a href="#" class="">

                                        <i class="fa fa-calendar"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Event Planning
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                    </a>
                                </p>

                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-money-bill"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Financial Services
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                    <a href="#" class="">
                                        <i class="fa fa-utensils"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Food
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">

                                    <a href="#" class="">
                                        <i class="fa fa-medkit"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Health & Medical
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>

                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-home" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Home Services
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-bed" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Hotels & Travel
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-info-circle"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Local Services
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-tv" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Mass Media
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-glass-martini"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Nightlife
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-paw" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Pets
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-cogs" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Professional
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">4</span></span></span>
                                    </a>
                                </p>

                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-building"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Public & Government
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">5</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-home" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Real Estate
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-moon" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Religious
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-coffee"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Restaurants
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-shopping-bag"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Shopping
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">1</span></span></span>
                                    </a>
                                </p>
                                <p id="servicesSection" class="mt-3"
                                    style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">

                                        <i class="fa fa-industry"
                                            style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Industries
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;"> &nbsp;<span
                                                class="badge bg-light text-dark"><span
                                                    style="color:#FF7519;font-weight:bolder;font-size:13px">3</span></span></span>
                                    </a>
                                </p>



                                {{-- next panel --}}

                                <div class="card-body">


                                    <div class="row">

                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id="cardsearch" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Click here to view&nbsp;246&nbsp;Countries" id="imgBorder">
                                                    <i class="fa fa-search-plus"></i> <span class="counter" data-target="653">0</span> View Categories
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="mb-3 card card4">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-10"><i class="fa fa-cogs"></i> JOBS</div>
                                <div class="col-2"><i class="fa fa-times text-dark close-icon4"></i></div>
                            </div>
                        </div>

                        <div class="row align-items-center justify-content-center">
                            <div class="accordion" id="accordionPlusMinus">

                                <p id="servicesSection" class="mt-3" style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-cogs" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Available Jobs
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>

                                </p>
                                <p id="servicesSection" class="mt-3" style="margin-left:0.3%;margin-bottom:5px; margin-top:1%; background-color:#FFF; background-image:none; border:none;">
                                    <a href="#" class="">
                                        <i class="fa fa-file" style="margin-left:20px; font-size:13px; color:#666"></i>
                                        Job Seekers
                                        <span style="font: 10pt/130% Helvetica, Arial, sans-serif;">(0)</span>
                                    </a>
                                </p>

                                {{-- next panel --}}

                                <div class="card-body">
                                    <div class="row">

                                        <div class="card">
                                            <div class="mt-2 card-body">
                                                <p id="cardsearch" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Click here to view&nbsp;246&nbsp;Countries" id="imgBorder">
                                                    <i class="fa fa-search-plus"></i> View <span class="counter" data-target="444">0</span> Categories
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>


                <div class="mb-5 col-lg-8 mb-lg-0">
                    <div class="card card5">
                        <div class="card-header"
                            style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                            <div class="row">
                                <div class="col-11"><i class="fa fa-tags"></i> <span class="counter" data-target="48">0</span>  PRODUCTS NEAR YOU</div>
                                <div class="col-1"><i class="fa fa-times text-dark close-icon5"></i></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <label>
                                        <select size="1" name="" id="search_page" aria-controls="example">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select><span id="perpagetext"> records per page</span>
                                    </label>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Keywords..."
                                            id="search_input">
                                        <span class="input-group-text" id="search_span"><i
                                                class="fa fa-search me-2 text-light"></i> </span>
                                    </div>
                                </div>

                             </div>
                             <div class="col-12">
                                <span class="badge rounded-pill bg-light text-dark">
                                    <div id="total_records" style="display: none;font-size:1.2rem;font-weight:bolder">
                                    </div>
                                </span>
                                <br>
                                {{-- <div class="row" id="dynamic_content" data-aos="fade-up" data-aos-duration="1000">
                                    --}}
                                </div>

                                <div class="table-data">
                                    <div class="row g-1" id="dynamic_contentp">
                                        <div id="load_data"></div>
                                        @forelse($products as $row)

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
                                                                <a href="{{ route('guest.viewdetailsitem', ['upload_id' => encrypt($row->ImageIDS), 'product_id' => encrypt($row->ProductItem_id),'product_type' => $row->product_type ]) }}" id="removeunderline">
                                                                    <i class="fa fa-tag"></i> Product&nbsp;Details
                                                                </a><br><br>
                                                                <a href="{{ route('g.shop_number',['upload_id' => encrypt($row->ImageIDS), 'id'=> encrypt($row->userid)]) }}" id="removeunderline">
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
                                                    <h6 class="card-title fw-bold">{{ Str::ucfirst(Str::limit($row->item_name, 16, '...')) }}</h6>
                                                    <h5 class="card-text fw-bolder"><span style="color: #ff7519;">{{
                                                            number_format($row->price,2) }}</span>
                                                        <br> <strike> {{ number_format($row->old_price,2) }}</strike>
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
                                                <h3 class="" width=""><i class="fa fa-times-circle"></i> No Records
                                                    Found!..,
                                                </h3>
                                            </div>
                                        </div>
                                        @endforelse

                                        <div class="col-md-12">

                                            {{ $products->links('pagination.custom')}}
                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                   @foreach ($products as $row)

            @endforeach

            <div class="col-lg-2">

                <div class="mb-3 card card6">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-shopping-cart"></i> <span class="counter" data-target="{{ $countallproducts_ }}">0</span> PRODUCTS</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon6"></i></div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        <div class="section_">
                            <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                @foreach ($ProductTypeGroupCount as $r)
                                <li id="hrefCss2"><a href="{{ route('viewproductsdetails', ['product_type' =>  $r->slug, 'product_id' =>  encrypt($r->id), 'upload_id' => encrypt($row->ImageIDS)]) }}" >{{ Str::limit($r->product_type,10, '...') }}</a>&nbsp;&nbsp;
                                  @if($r->total_productType != 0)
                                    <span style="color:#FF7519;font-weight:bolder">{{ $r->total_productType }}</span>
                                   @else
                                    {{--  --}}
                                   @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="3140">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                  </div>

                <div class="mb-3 card card7">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <div class="row">
                            <div class="col-10"><i class="fa fa-fa fa-wrench"></i> <span class="counter" data-target="{{ $countallservice_items_ }}">0</span> SERVICES</div>
                            <div class="col-2"><i class="fa fa-times text-dark close-icon7"></i></div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-left:-8px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            @foreach ($joinservices as $r)
                            <li id="hrefCss2"><a href="{{ route('guest.serviceitemservice', ['service_id' => encrypt($r->service_id), 'sub_service_one_id' => encrypt($r->sub_id_one), 'sub_service_id' => encrypt($r->sub_service_id)]) }}" >{{ Str::limit($r->sub_service_3_name,10, '...') }}</a>&nbsp;&nbsp;
                              @if($r->total_sub3 != 0)
                                <span style="color:#FF7519;font-weight:bolder">{{ $r->total_sub3 }}</span>
                               @else
                                {{--  --}}
                               @endif
                            </li>
                            @endforeach

                        </ul>
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="653">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 card">
                    <div class="card-header"
                        style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                        <i class="fa fa-industry"></i> <span class="counter" data-target="{{ $countallindustry_items_ }}">0</span> INDUSTRIES
                    </div>
                    <div class="card-body" style="margin-left:-10px">
                        <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                            @foreach ($fetchsubIndustry as $r)
                            <li id="hrefCss2"><a href="{{route('guest.industryitems', ['industry_id' => encrypt($r->industry_id), 'sub_industry_id' => encrypt($r->sub_industry_id)])}}" >{{ Str::limit($r->sub_industry_name,10, '...') }}</a>&nbsp;&nbsp;
                              @if($r->total_subindustries != 0)
                                <span style="color:#FF7519;font-weight:bolder">{{ $r->total_subindustries }}</span>
                               @else
                                {{--  --}}
                               @endif
                            </li>
                            @endforeach

                        </ul>
                        <div class="card">
                            <div class="mt-2 card-body">
                                <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="2659">0</span> Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                            <div class="card-header"
                                style="background-color:#464444;border-bottom:5px solid #2e2d2d;color:#FF7519;font-weight:bold">
                                <i class="fa fa-cogs"></i> <span class="counter" data-target="{{ $countalljobs_ }}">0</span> JOBS
                            </div>
                            <div class="card-body" style="margin-left:-10px">
                                <ul class="gap-2 d-grid listitems" style="color:#666;font: 10pt/130% Helvetica, Arial, sans-serif;">
                                    @foreach ($fetchjobs as $r)
                                    <li id="hrefCss2"><a href="{{route('guest.jobsitems', ['job_category_id' => encrypt($r->id), 'job_items_id' => encrypt($r->job_items_id)])}}" >
                                    @if(session()->get('locale') === 'fr')
                                            {{ Str::limit($r->job_category_name_fr,15, '...') }}
                                        @else
                                           {{ Str::limit($r->job_category_name_en,15, '...') }}
                                         @endif
                                    </a>&nbsp;&nbsp;
                                      @if($r->total_jobs != 0)
                                        <span style="color:#FF7519;font-weight:bolder">{{ $r->total_jobs }}</span>
                                       @else
                                        {{--  --}}
                                       @endif
                                    </li>
                                    @endforeach

                                </ul>
                                <div class="card">
                                    <div class="mt-2 card-body">
                                        <p id="cardsearch"><i class="fa fa-search-plus"></i> View <span class="counter" data-target="444">0</span> Categories</p>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>

                </div>
            </div>
    </section>
    <!-- content section-->
    <section>
        <div class="container mt-4 mb-4">
            <div class="row g-2 justify-content-center">
                <div class="col-md-12 col-6 col-lg-3 BorderCss">

                    <div class="card" style="width: 100%;border:none">
                        <div class="card-body">
                            <center class="cardCss">
                                <h5 class="card-title"><i class="fa fa-truck fa-2x" style="color:#1a6be8"></i></h5>
                                <p class="card-text"><a href="">DELIVERY <br>ANYWHERE</a></p>
                            </center>

                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-6 col-lg-3 BorderCss">

                    <div class="card" style="width: 100%;border:none">
                        <div class="card-body">
                            <center class="cardCss">
                                <h5 class="card-title"><i class="fa fa-lock fa-2x" style="color:#00a61c"></i></h5>
                                <p class="card-text"><a href=""> PAY CASH <br>ON DELIVERY</a></p>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-6 col-lg-3 BorderCss">

                    <div class="card" style="width: 100%;border:none">
                        <div class="card-body">
                            <center class="cardCss">
                                <h5 class="card-title"><i class="fa fa-gift fa-2x" style="color:#ffe305"></i></h5>
                                <p class="card-text"><a href="">GREAT&nbsp;PRODCUTS&nbsp;AT
                                        UNBEATABLE&nbsp;PRICES</a>
                                </p>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-6 col-lg-3 BorderCss">

                    <div class="card" style="width: 100%;border:none">
                        <div class="card-body">
                            <center class="cardCss">
                                <h5 class="card-title"><i class="fa fa-sync fa-2x" style="color:#f25433"></i></h5>
                                <p class="card-text"><a href="">FREE RETURNS & EXCHANGES</a></p>
                            </center>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
</div>
