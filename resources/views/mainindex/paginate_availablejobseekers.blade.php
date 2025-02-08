<div class="row" id="dynamic_contents_as">
    <div id="load_data"></div>
    <div class="col-md-12">
        {{ $ajobs->links('pagination.custom')}}
    </div>

      <div class="mx-2 mt-2 table-data_as">

        @forelse($ajobs as $row)


           <div class="row">
               <div class="col-9">
                   <a href="../category/products/items/index.php?id=YjdWV1piNllWN0dOMGlTMHA1c1JCdz09"
                       class="_hrefCss" data-bs-toggle="tooltip" data-bs-placement="top"
                       title="MORE WORLD WIDE WEB SERVICE"><span class="text-dark2"><i
                               class="fa fa-plus-square"></i> {{ \Illuminate\Support\Str::upper(Str::limit($row->job_name,16))}} <span
                               class="badge rounded-pill bg-light"
                               style="color:#FF7519">0</span></span></a>
               </div>
               <div class="col-3" class="customPrevNext">
                   <button class="text-dark1" type="button"
                       data-bs-target="#carouselExampleControls" data-bs-slide="prev"
                       data-bs-toggle="tooltip" data-bs-placement="top" title="PREVIOUS">
                       <span class=""><i class="fa fa-angle-left" aria-hidden="true"
                               title="Previous"></i></span>
                   </button>
                   <button class="text-dark1" type="button"
                       data-bs-target="#carouselExampleControls" data-bs-slide="next"
                       data-bs-toggle="tooltip" data-bs-placement="top" title="NEXT">
                       <span class=""><i class="fa fa-angle-right" aria-hidden="true"
                               title="Next"></i></span>
                   </button>
               </div>
               <hr>
            </div>

        {{-- --}}
        <div
        class="col-md-3 d-flex justify-content-center fade_in u-fade-type-left js-scroll-trigger" >
          <div class="mb-4 card" style="width: 300px;;"> {{-- shadow-sm --}}
               <div class="">
               <center>
               <div style="background-color:#3b3b3b;height:200px">
                   <i class="mb-1 fa fa-user fa-6x IClass"></i>
                   <h6 class="h6Css">{{ \Illuminate\Support\Str::upper(Str::limit($row->job_name,16))}}</h6>
                   </div>

                   <p class="mt-2 PClass" data-bs-toggle="modal" data-bs-target="#mainlogin_Modal">
                   <a href="#"  class="hrefCss3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ \Illuminate\Support\Str::lower($row->job_name)}}">
                       <i class="fa fa-user"></i>
                       Apply Now!
                   </a>
               </p>
               </center>
               </div>

        </div>
    </div>
       {{-- --}}

       @empty

       @endforelse

       <div class="col-md-12">

        {{ $ajobs->links('pagination.custom')}}
    </div>
   </div>



</div>
