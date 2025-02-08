</footer>
<!-- Bootstrap core JS-->
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('assets/js/moment-with-locales.js') }}"></script>
<script src="{{ asset('assets/plugin/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugin/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/fslightbox.js') }}"></script>
<script src="{{ asset('assets/nicelabel/js/jquery.nicelabel.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.min.js')}}"></script>
{{-- <script src="{{ asset('assets/js/jquery.js') }}"></script> --}}
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    moment().format();
</script>

{{-- search country --}}
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fetch_country_data();
            function fetch_country_data(query = '') {
            $.ajax({
                url:"{{ route('user.searchcountry') }}",
                method:'GET',
                data:{'country':query},
                beforeSend: function() {
                      $('.loader').show();
                  },
                success:function(data){
                      $('#country_list').html(data);
                      setTimeout(function () {
                        $('.loader').hide();
                         }, 500);

                    }
                })
             }

                $(document).on('keyup', '.search', function(){
                var query = $(this).val();
                fetch_country_data(query);
            });

    });
</script>
{{--end search country --}}

{{-- my order product --}}
<script type="text/javascript">

             //for pagination
         $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            $('#dynamic_content_product').html(make_skeleton())
            let page = $(this).attr('href').split('page=')[1]
            setTimeout(function() {
                        record(page)
                }, 1500);
            })

            function make_skeleton() {
                var output = '';
                for (var count = 0; count < 12; count++) {
                    output += '<div class="col-4">';
                    output += '<div class="ph-item">';
                    output += '<div class="ph-col-12">';
                    output += '<div class="ph-picture"></div>';
                    output += '<div class="ph-row">';
                    output += '<div class="ph-col-6 big"></div>';
                    output += '<div class="ph-col-4 empty big"></div>';
                    output += '<div class="ph-col-12"></div>'
                    output += '<div class="ph-col-12"></div>'
                    output += '</div>';
                    output += '</div>';
                    output += '</div>';
                    output += '</div>';
                }
                return output;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function record(page, limit){

                $.ajax({
                    url:"/user/mpingi-users/ajax-paginates?page="+page,
                    data: {
                            limit: limit
                    },
                    success:function(res){
                        $('.table-data_product').html(res);
                    }
                })
            //}, 300);
          }

        //end pagination

        // for searching data
        var query = $('#search_input_item').val();
        fetch_customer_data(query);

        $(document).on('keyup', '#search_input_item', function(){
            var query = $(this).val();
            if(query == ''){
                fetch_customer_data(query);
            }
            fetch_customer_data(query);
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        function fetch_customer_data(query = '') {
            $.ajax({
            url:"{{ route('getSearchdatas') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {
                $('#dynamic_content_product').html(data.table_data);
                // $('#total_records').css('display','block');
            // $('#total_records').html('Total Items: <span class="badge rounded-pill bg-primary">'+ data.total_data +'</span>');
            }
            })
        }

       //end for searching data

      //for per page

        $(document).on('change', '#search_page',function(){
            var pages = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dynamic_content_product').html(make_skeleton())

                setTimeout(function() {
                        record()
                }, 1500);

                function make_skeleton() {
                    var output = '';
                    for (var count = 0; count < 12; count++) {
                        output += '<div class="col-4">';
                        output += '<div class="ph-item">';
                        output += '<div class="ph-col-12">';
                        output += '<div class="ph-picture"></div>';
                        output += '<div class="ph-row">';
                        output += '<div class="ph-col-6 big"></div>';
                        output += '<div class="ph-col-4 empty big"></div>';
                        output += '<div class="ph-col-12"></div>'
                        output += '<div class="ph-col-12"></div>'
                        output += '</div>';
                        output += '</div>';
                        output += '</div>';
                        output += '</div>';
                    }
                  return output;
             }
           function record(limit){
                $.ajax({
                    type:'GET',
                    url:"{{ route('user.getPages') }}",
                    data:{'pages':pages, limit: limit},
                    success:function(data){
                        $('.table-data_product').html(data);

                    }
                });
            }

        });

        //end for per page


</script>

{{--start private message --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.datatable_pmessage').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 5,
            // scrollX: true,

            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("user.newmail") }}',
            columns: [
                {data: 'images', name: 'images'},
                {data: 'message', name: 'message'},
                // {data: 'email', name: 'email'},
                {data: 'date_created', name: 'date_created'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
                {data: 'islogged', name: 'islogged'},
            ]
        });

      //end table data




 });
</script>
{{--end private message --}}





{{--cancel my order product --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.cancelmyorderproducts-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allcancelorderproducts") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>
{{--end cancel my order product --}}

{{-- my order product --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.myorderproducts-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allpurchaseproductsitems") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>
{{-- my order product --}}


{{-- my sales --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.mysalesproducts-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allsaleproductsitems") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>
{{-- my  sales --}}


{{--  Industries Details --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.industriesitem-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("user.fetchAllIndustryItems") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>

{{--end  Industries Details  --}}

{{--  Jobs logo  --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.jobs-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allfetchjobs") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>

{{--end  Jobs logo  --}}

{{--  Business logo  --}}
<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.businessitem-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allfetchbusiness") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>

{{--end  Business logo  --}}

{{-- add form product items step 2 to 2 --}}

<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.productsitem-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allproductsitems") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>

<script type="text/javascript">
    $(document).ready(function() {

     // table data

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        var dataTable = $('.productsitem-datatable_Expired').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            stateSave: true,
            pageLength: 10,
            // scrollX: true,
            "order": [[ 0, "asc" ]],
            "searchable": false, "targets": [0,1],
            ajax: '{{ route("allproductsitemsexpired") }}',
            columns: [
                {data: 'image_name', name: 'image_name'},
                {data: 'action', name: 'action',orderable:false,serachable:false,sClass:'text-center'},
            ]
        });

      //end table data


 });
</script>

<script>
    $(document).ready(function() {

     //for pagination job seekers
      $(document).on('click','.pagination_s a', function(e){
            e.preventDefault();
             let page3 = $(this).attr('href').split('page=')[1]
               _records(page3)

            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function _records(page3){
                $.ajax({
                    url:"/ajax-paginate-jobseekers_page?page="+page3,
                    success:function(res3){
                        $('.table-data_s').html(res3);
                    }
                })
            //}, 300);
          }

        //end pagination job seekers

        //for per page jobseekers

        $(document).on('change', '#search_pagess',function(){
            var pages = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             records()


           function records(limits){
                $.ajax({
                    type:'GET',
                    url:"{{ route('getPageJobseekers2') }}",
                    data:{'page':pages, limits: limits},
                    success:function(data_s){
                        $('.table-data_s').html(data_s);

                    }
                });
            }

        });

        //end for per page jobseekers

            // add rate1
      $('.btn-rate1').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#place_of_origin-error').html("");

                const rate = document.querySelector("input[name=rating]:checked")?.value; //radio
                const id = document.querySelector('input[name=rate]').value;



          $.ajax({

                url:'{{ route("user.rateform") }}',
                type:'post',
                data:{

                    rate: rate,
                    id: id
                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Rate Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            // window.location.href = "{{ route('user.viewpost') }}";
                          location.reload(true);
                         }, 1500);
                        $("#forms-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.rate){
                                $('#rate-error').html(response.errors.rate[0]);
                                $(".rate").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".rate").removeClass("is-invalid").addClass("is-valid");

                            }


                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add rate1

    // add rate
      $('.btn-rate').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#place_of_origin-error').html("");

                const rate = document.querySelector("input[name=rating]:checked")?.value; //radio
                const id = document.querySelector('input[name=rate]').value;



          $.ajax({

                url:'{{ route("user.rateform") }}',
                type:'post',
                data:{

                    rate: rate,
                    id: id
                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Rate Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            // window.location.href = "{{ route('user.viewpost') }}";
                          location.reload(true);
                         }, 1500);
                        $("#forms-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.rate){
                                $('#rate-error').html(response.errors.rate[0]);
                                $(".rate").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".rate").removeClass("is-invalid").addClass("is-valid");

                            }


                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add rate

     // add step 2 to 2 form free products
      $('.btn-product-item').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#place_of_origin-error').html("");
               $('#city-error').html("");
               $('#state_id-error').html("");
               $('#product_web_name-error').html("");
               $('#product_web_link-error').html("");
               $('#item_name-error').html("");
               $('#brand_name-error').html("");
               $('#pieces-error').html("");
               $('#types-error').html("");
               $('#product_color-error').html("");
               $('#negotiable-error').html("");
               $('#price-error').html("");
               $('#oldprice-error').html("");
               $('#currency-error').html("");
               $('#item_descriptions-error').html("");
               $('#payment-error').html("");
               $('#weight-error').html("");
               $('#volume-error').html("");
               $('#shipping-error').html("");
               $('#delivery-error').html("");
               $('#day_return-error').html("");

                const user_id = document.querySelector('input[name=user_id]').value;
                const post_date_of_item = document.querySelector('input[name=post_date_of_item]').value;
                const category_id = document.querySelector('input[name=category_id]').value;
                const sub_category_id = document.querySelector('input[name=sub_category_id]').value;
                const article_id = document.querySelector('input[name=article_id]').value;
                const sub_product_id = document.querySelector('input[name=sub_product_id]').value;
                const place_of_origin = $('.place_of_origin option:selected').val();
                const city = $('.city option:selected').val();
                const state_id = $('.state_id option:selected').val();
                const product_web_name = document.querySelector('input[name=product_web_name]').value;
                const product_web_link = document.querySelector('input[name=product_web_link]').value;
                const disponibility = document.querySelector('input[name=disponibility]').value;
                const item_name = document.querySelector('input[name=item_name]').value;
                const product_type = document.querySelector('input[name=product_type]').value;
                const brand_name = $('.brand_name option:selected').val();
                const pieces = document.querySelector('input[name=pieces]').value;
                const types = $('.types option:selected').val();
                const product_color = document.querySelector('input[name=product_color]').value;
                const negotiable = document.querySelector("input[name=negotiable]:checked")?.value; //radio
                const price = document.querySelector('input[name=price]').value;
                const old_price = document.querySelector('input[name=old_price]').value;
                const currency = $('.currency option:selected').val();
                const item_descriptions = document.querySelector('textarea[name=item_descriptions]').value;
                const payment = document.querySelector("input[name=payment]:checked")?.value; //radio
                const weight = document.querySelector('input[name=weight]').value;
                const volume = document.querySelector('input[name=volume]').value;
                const shipping = document.querySelector("input[name=shipping]:checked")?.value; //radio
                const shipping_price = document.querySelector('input[name=shipping_price]').value;
                const delivery = document.querySelector("input[name=delivery]:checked")?.value; //radio
                const day_return = document.querySelector("input[name=day_return]:checked")?.value; //radio


          $.ajax({

                url:'{{ route("user.postoptionInsertDatafromform") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    post_date_of_item: post_date_of_item,
                    category_id: category_id,
                    sub_category_id: sub_category_id,
                    article_id: article_id,
                    sub_product_id: sub_product_id,
                    place_of_origin: place_of_origin,
                    city: city,
                    state_id: state_id,
                    product_web_name: product_web_name,
                    product_web_link: product_web_link,
                    disponibility: disponibility,
                    item_name: item_name,
                    product_type: product_type,
                    brand_name: brand_name,
                    pieces: pieces,
                    types: types,
                    product_color: product_color,
                    negotiable: negotiable,
                    price: price,
                    old_price: old_price,
                    currency: currency,
                    item_descriptions: item_descriptions,
                    payment: payment,
                    weight: weight,
                    volume: volume,
                    shipping: shipping,
                    shipping_price: shipping_price,
                    delivery: delivery,
                    day_return: day_return
                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Product item Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.viewpost') }}";
                        //    location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.place_of_origin){
                                $('#place_of_origin-error').html(response.errors.place_of_origin[0]);
                                $(".place_of_origin").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".place_of_origin").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state_id){
                                $('#state_id-error').html(response.errors.state_id[0]);
                                $(".state_id").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state_id").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.product_web_name){
                                $('#product_web_name-error').html(response.errors.product_web_name[0]);
                                $(".product_web_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_web_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.product_web_link){
                                $('#product_web_link-error').html(response.errors.product_web_link[0]);
                                $(".product_web_link").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_web_link").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.item_name){
                                $('#item_name-error').html(response.errors.item_name[0]);
                                $(".item_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".item_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.brand_name){
                                $('#brand_name-error').html(response.errors.brand_name[0]);
                                $(".brand_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".brand_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.pieces){
                                $('#pieces-error').html(response.errors.pieces[0]);
                                $(".pieces").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".pieces").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.types){
                                $('#types-error').html(response.errors.types[0]);
                                $(".types").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".types").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.product_color){
                                $('#product_color-error').html(response.errors.product_color[0]);
                                $(".product_color").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_color").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state_id){
                                $('#state_id-error').html(response.errors.state_id[0]);
                                $(".state_id").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state_id").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.negotiable){
                                $('#negotiable-error').html(response.errors.negotiable[0]);
                                $(".negotiable").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".negotiable").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.price){
                                $('#price-error').html(response.errors.price[0]);
                                $(".price").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".price").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.oldprice){
                                $('#oldprice-error').html(response.errors.oldprice[0]);
                                $(".oldprice").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".oldprice").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.currency){
                                $('#currency-error').html(response.errors.currency[0]);
                                $(".currency").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".currency").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.item_descriptions){
                                $('#item_descriptions-error').html(response.errors.item_descriptions[0]);
                                $(".item_descriptions").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".item_descriptions").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.payment){
                                $('#payment-error').html(response.errors.payment[0]);
                                $(".payment").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".payment").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.weight){
                                $('#weight-error').html(response.errors.weight[0]);
                                $(".weight").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".weight").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.volume){
                                $('#volume-error').html(response.errors.volume[0]);
                                $(".volume").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".volume").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.shipping){
                                $('#shipping-error').html(response.errors.shipping[0]);
                                $(".shipping").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".shipping").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.delivery){
                                $('#delivery-error').html(response.errors.delivery[0]);
                                $(".delivery").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".delivery").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.day_return){
                                $('#day_return-error').html(response.errors.day_return[0]);
                                $(".day_return").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".day_return").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add step 2 to 2 form free products


    // add step 2 to 2 form paid products
      $('.btn-product-item-paid').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#place_of_origin-error').html("");
               $('#city-error').html("");
               $('#state_id-error').html("");
               $('#product_web_name-error').html("");
               $('#product_web_link-error').html("");
               $('#item_name-error').html("");
               $('#brand_name-error').html("");
               $('#pieces-error').html("");
               $('#types-error').html("");
               $('#product_color-error').html("");
               $('#negotiable-error').html("");
               $('#price-error').html("");
               $('#oldprice-error').html("");
               $('#currency-error').html("");
               $('#item_descriptions-error').html("");
               $('#payment-error').html("");
               $('#weight-error').html("");
               $('#volume-error').html("");
               $('#shipping-error').html("");
               $('#delivery-error').html("");
               $('#day_return-error').html("");

                const user_id = document.querySelector('input[name=user_id]').value;
                const post_date_of_item = document.querySelector('input[name=post_date_of_item]').value;
                const category_id = document.querySelector('input[name=category_id]').value;
                const sub_category_id = document.querySelector('input[name=sub_category_id]').value;
                const article_id = document.querySelector('input[name=article_id]').value;
                const sub_product_id = document.querySelector('input[name=sub_product_id]').value;
                const place_of_origin = $('.place_of_origin option:selected').val();
                const city = $('.city option:selected').val();
                const state_id = $('.state_id option:selected').val();
                const product_web_name = document.querySelector('input[name=product_web_name]').value;
                const product_web_link = document.querySelector('input[name=product_web_link]').value;
                const disponibility = document.querySelector('input[name=disponibility]').value;
                const item_name = document.querySelector('input[name=item_name]').value;
                const product_type = document.querySelector('input[name=product_type]').value;
                const brand_name = $('.brand_name option:selected').val();
                const pieces = document.querySelector('input[name=pieces]').value;
                const types = $('.types option:selected').val();
                const product_color = document.querySelector('input[name=product_color]').value;
                const negotiable = document.querySelector("input[name=negotiable]:checked")?.value; //radio
                const price = document.querySelector('input[name=price]').value;
                const old_price = document.querySelector('input[name=old_price]').value;
                const currency = $('.currency option:selected').val();
                const item_descriptions = document.querySelector('textarea[name=item_descriptions]').value;
                const payment = document.querySelector("input[name=payment]:checked")?.value; //radio
                const weight = document.querySelector('input[name=weight]').value;
                const volume = document.querySelector('input[name=volume]').value;
                const ad_type = document.querySelector('input[name=ad_type]').value;
                const shipping = document.querySelector("input[name=shipping]:checked")?.value; //radio
                const shipping_price = document.querySelector('input[name=shipping_price]').value;
                const delivery = document.querySelector("input[name=delivery]:checked")?.value; //radio
                const day_return = document.querySelector("input[name=day_return]:checked")?.value; //radio


          $.ajax({

                url:'{{ route("user.postoptionInsertDatafromformpaid") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    post_date_of_item: post_date_of_item,
                    category_id: category_id,
                    sub_category_id: sub_category_id,
                    article_id: article_id,
                    sub_product_id: sub_product_id,
                    place_of_origin: place_of_origin,
                    city: city,
                    state_id: state_id,
                    product_web_name: product_web_name,
                    product_web_link: product_web_link,
                    disponibility: disponibility,
                    item_name: item_name,
                    product_type: product_type,
                    brand_name: brand_name,
                    pieces: pieces,
                    types: types,
                    product_color: product_color,
                    negotiable: negotiable,
                    price: price,
                    old_price: old_price,
                    currency: currency,
                    item_descriptions: item_descriptions,
                    payment: payment,
                    weight: weight,
                    volume: volume,
                    ad_type: ad_type,
                    shipping: shipping,
                    shipping_price: shipping_price,
                    delivery: delivery,
                    day_return: day_return
                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Product item Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.viewpost') }}";
                        //    location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.place_of_origin){
                                $('#place_of_origin-error').html(response.errors.place_of_origin[0]);
                                $(".place_of_origin").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".place_of_origin").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state_id){
                                $('#state_id-error').html(response.errors.state_id[0]);
                                $(".state_id").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state_id").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.product_web_name){
                                $('#product_web_name-error').html(response.errors.product_web_name[0]);
                                $(".product_web_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_web_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.product_web_link){
                                $('#product_web_link-error').html(response.errors.product_web_link[0]);
                                $(".product_web_link").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_web_link").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.item_name){
                                $('#item_name-error').html(response.errors.item_name[0]);
                                $(".item_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".item_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.brand_name){
                                $('#brand_name-error').html(response.errors.brand_name[0]);
                                $(".brand_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".brand_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.pieces){
                                $('#pieces-error').html(response.errors.pieces[0]);
                                $(".pieces").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".pieces").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.types){
                                $('#types-error').html(response.errors.types[0]);
                                $(".types").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".types").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.product_color){
                                $('#product_color-error').html(response.errors.product_color[0]);
                                $(".product_color").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_color").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state_id){
                                $('#state_id-error').html(response.errors.state_id[0]);
                                $(".state_id").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state_id").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.negotiable){
                                $('#negotiable-error').html(response.errors.negotiable[0]);
                                $(".negotiable").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".negotiable").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.price){
                                $('#price-error').html(response.errors.price[0]);
                                $(".price").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".price").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.oldprice){
                                $('#oldprice-error').html(response.errors.oldprice[0]);
                                $(".oldprice").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".oldprice").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.currency){
                                $('#currency-error').html(response.errors.currency[0]);
                                $(".currency").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".currency").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.item_descriptions){
                                $('#item_descriptions-error').html(response.errors.item_descriptions[0]);
                                $(".item_descriptions").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".item_descriptions").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.payment){
                                $('#payment-error').html(response.errors.payment[0]);
                                $(".payment").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".payment").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.weight){
                                $('#weight-error').html(response.errors.weight[0]);
                                $(".weight").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".weight").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.volume){
                                $('#volume-error').html(response.errors.volume[0]);
                                $(".volume").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".volume").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.shipping){
                                $('#shipping-error').html(response.errors.shipping[0]);
                                $(".shipping").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".shipping").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.delivery){
                                $('#delivery-error').html(response.errors.delivery[0]);
                                $(".delivery").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".delivery").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.day_return){
                                $('#day_return-error').html(response.errors.day_return[0]);
                                $(".day_return").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".day_return").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add step 2 to 2 form paid products

         // edit step 2 to 2 form
      $('.btn-product-item-edit').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#place_of_origin2-error').html("");
               $('#city2-error').html("");
               $('#state_id2-error').html("");
               $('#product_web_name2-error').html("");
               $('#product_web_link2-error').html("");
               $('#item_name2-error').html("");
               $('#brand_name2-error').html("");
               $('#pieces2-error').html("");
               $('#types2-error').html("");
               $('#product_color2-error').html("");
               $('#negotiable2-error').html("");
               $('#price2-error').html("");
               $('#oldprice2-error').html("");
               $('#currency2-error').html("");
               $('#item_descriptions2-error').html("");
               $('#payment2-error').html("");
               $('#weight2-error').html("");
               $('#volume2-error').html("");
               $('#shipping2-error').html("");
               $('#delivery2-error').html("");
               $('#day_return2-error').html("");

                const user_id = document.querySelector('input[name=user_id_edit]').value;
                const category_id = document.querySelector('input[name=category_id_edit]').value;
                const sub_category_id = document.querySelector('input[name=sub_category_id_edit]').value;
                const article_id = document.querySelector('input[name=article_id_edit]').value;
                const sub_product_id = document.querySelector('input[name=sub_product_id_edit]').value;
                const place_of_origin = $('.place_of_origin_edit option:selected').val();
                const city = $('.city_edit option:selected').val();
                const state_id = $('.state_id_edit option:selected').val();
                const product_web_name = document.querySelector('input[name=product_web_name_edit]').value;
                const product_web_link = document.querySelector('input[name=product_web_link_edit]').value;
                // const disponibility = document.querySelector('input[name=disponibility_edit]').value;
                const item_name = document.querySelector('input[name=item_name_edit]').value;
                const product_type = document.querySelector('input[name=product_type_edit]').value;
                const brand_name = $('.brand_name_edit option:selected').val();
                const pieces = document.querySelector('input[name=pieces_edit]').value;
                const types = $('.types_edit option:selected').val();
                const product_color = document.querySelector('input[name=product_color_edit]').value;
                const negotiable = document.querySelector("input[name=negotiable_edit]:checked")?.value; //radio
                const price = document.querySelector('input[name=price_edit]').value;
                const old_price = document.querySelector('input[name=old_price_edit]').value;
                const currency = $('.currency_edit option:selected').val();
                const item_descriptions = document.querySelector('textarea[name=item_descriptions_edit]').value;
                const payment = document.querySelector("input[name=payment_edit]:checked")?.value; //radio
                const weight = document.querySelector('input[name=weight_edit]').value;
                const volume = document.querySelector('input[name=volume_edit]').value;
                const shipping = document.querySelector("input[name=shipping_edit]:checked")?.value; //radio
                const shipping_price = document.querySelector('input[name=shipping_price_edit]').value;
                const delivery = document.querySelector("input[name=delivery_edit]:checked")?.value; //radio
                const day_return = document.querySelector("input[name=day_return_edit]:checked")?.value; //radio
                const id = document.querySelector('input[name=id]').value;


          $.ajax({

                url:'{{ route("user.editpostoptionInsertDatafromform") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    category_id: category_id,
                    sub_category_id: sub_category_id,
                    article_id: article_id,
                    sub_product_id: sub_product_id,
                    place_of_origin: place_of_origin,
                    city: city,
                    state_id: state_id,
                    product_web_name: product_web_name,
                    product_web_link: product_web_link,
                    // disponibility: disponibility,
                    item_name: item_name,
                    product_type: product_type,
                    brand_name: brand_name,
                    pieces: pieces,
                    types: types,
                    product_color: product_color,
                    negotiable: negotiable,
                    price: price,
                    old_price: old_price,
                    currency: currency,
                    item_descriptions: item_descriptions,
                    payment: payment,
                    weight: weight,
                    volume: volume,
                    shipping: shipping,
                    shipping_price: shipping_price,
                    delivery: delivery,
                    day_return: day_return,
                    id: id,
                },
                dataType:'json',
                success:function (resp) {

                    if (resp.status == 200) {
                        toastr.success('Edit Product item Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                          location.reload(true);
                         }, 1500);
                        $("#form2-id")[0].reset();

                    }

                    if(resp.errors) {

                            if(resp.errors.place_of_origin){
                                $('#place_of_origin2-error').html(resp.errors.place_of_origin[0]);
                                $(".place_of_origin_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".place_of_origin_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.city){
                                $('#city2-error').html(resp.errors.city[0]);
                                $(".city_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.state_id){
                                $('#state_id2-error').html(resp.errors.state_id[0]);
                                $(".state_id_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state_id_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.product_web_name){
                                $('#product_web_name2-error').html(resp.errors.product_web_name[0]);
                                $(".product_web_name_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_web_name_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.product_web_link){
                                $('#product_web_link2-error').html(resp.errors.product_web_link[0]);
                                $(".product_web_link_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_web_link_edit").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(resp.errors.item_name){
                                $('#item_name2-error').html(resp.errors.item_name[0]);
                                $(".item_name_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".item_name_edit").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(resp.errors.brand_name){
                                $('#brand_name2-error').html(resp.errors.brand_name[0]);
                                $(".brand_name_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".brand_name_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.pieces){
                                $('#pieces2-error').html(resp.errors.pieces[0]);
                                $(".pieces_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".pieces_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.types){
                                $('#types2-error').html(resp.errors.types[0]);
                                $(".types_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".types_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.product_color){
                                $('#product_color2-error').html(resp.errors.product_color[0]);
                                $(".product_color_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".product_color_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.state_id){
                                $('#state_id2-error').html(resp.errors.state_id[0]);
                                $(".state_id_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state_id_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.negotiable){
                                $('#negotiable2-error').html(resp.errors.negotiable[0]);
                                $(".negotiable_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".negotiable_edit").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(resp.errors.price){
                                $('#price2-error').html(resp.errors.price[0]);
                                $(".price_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".price_edit").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(resp.errors.oldprice){
                                $('#oldprice2-error').html(resp.errors.oldprice[0]);
                                $(".oldprice_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".oldprice_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.currency){
                                $('#currency2-error').html(resp.errors.currency[0]);
                                $(".currency_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".currency_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.item_descriptions){
                                $('#item_descriptions2-error').html(resp.errors.item_descriptions[0]);
                                $(".item_descriptions_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".item_descriptions_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.payment){
                                $('#payment2-error').html(resp.errors.payment[0]);
                                $(".payment_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".payment_edit").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(resp.errors.weight){
                                $('#weight2-error').html(resp.errors.weight[0]);
                                $(".weight_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".weight_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.volume){
                                $('#volume2-error').html(resp.errors.volume[0]);
                                $(".volume_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".volume_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.shipping){
                                $('#shipping2-error').html(resp.errors.shipping[0]);
                                $(".shipping_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".shipping_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.delivery){
                                $('#delivery2-error').html(resp.errors.delivery[0]);
                                $(".delivery_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".delivery_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(resp.errors.day_return){
                                $('#day_return2-error').html(resp.errors.day_return[0]);
                                $(".day_return_edit").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".day_return_edit").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(resp.errors) {
                         console.log(resp.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }

                  }

              }
           });

        });

     //end edit step 2 to 2 form


 // get single product item
      $('.modelClose').on('click', function(){
            $('#updateprice_Modal').hide();
        });

        var product_id
        var currency
        var price
        var user_id

        $('body').on('click', '.btn-getprice', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                product_id3 = $(this).data('pid');
                console.log(product_id3);

                currency3 = $(this).data('cur');
                console.log(currency3);

                price3 = $(this).data('price');
                console.log(price3);

                user_id3 = $(this).data('uuser');
                console.log(user_id3);


                $('#view_uproductid').val(product_id3);
                $('#view_newcurrency').text(currency3);
                $('#view_oldprice').val(price3);
                $('#view_oldcurrency').text(currency3);
                $('#view_ususerid').val(user_id3);



        });
     //end get single product item


        // update profile
        $('.btn-updatesingleprice').on('click', function(e){
          e.preventDefault();
        //   alert('click myaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

         $('#prices-error').html("");

            // const user_id = document.querySelector('input[name=view_ususerid]').value;
            // console.log(user_id);

            const prices = document.querySelector('input[name=new_price]').value;
            console.log(prices);

            const product_id = document.querySelector('input[name=view_uproductid]').value;
            console.log(product_id);

            $.ajax({

            url:'{{ route("user.updatesingleprices") }}',
            type:'post',
                data:{
                    // user_id: user_id,
                    prices: prices,
                    product_id: product_id,
                },
                dataType:'json',
                success:function (response7) {
                 if (response7.status7 == 200) {
                        toastr.success('Update price Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-price")[0].reset();

                    }

                    if(response7.errors7) {

                        if(response7.errors7.prices){
                            $('#prices-error').html(response7.errors7.prices[0]);
                            $("#new_price").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $("#new_price").removeClass("is-invalid").addClass("is-valid");

                        }

                    if(response7.errors7) {
                         console.log(response7.errors7);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }

                    }
                }
             });
          });
       //end update Product items



    // get single User data
    $('.modelClose').on('click', function(){
            $('#viewseller_Modal').hide();
        });

        var profile
        var last_name1
        var first_name1
        var country_name
        var state_name
        var city_name
        var flag

        $('body').on('click', '.btn-viewuserdetials', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           purchase_id = $(this).data('pid');
           console.log(purchase_id);

           $.ajax({
                type:'GET',
                    url:"{{ url('/mpingiusers/user/purchase_sellermodal/') }}/"+purchase_id,

                   success : function(results) {

                    for(var i=0;i<=results.status.length;i++) {

                        if(results.status[i].profile == ""){
                              $('#view_profile').attr("src", "/storage/assets/images/deafault_pic.png");
                            }else{
                              $('#view_profile').attr("src", '/storage/assets/uploads/'+ results.status[i].profile);
                         }
                        $('#view_ulastname').text(results.status[i].last_name);
                        $('#view_ufirstname').text(results.status[i].first_name);
                        $('#view_country_name').text(results.status[i].countryname);
                        $('#view_state_name').text(results.status[i].statename);
                        $('#view_city_name').text(results.status[i].cityname);



                       if(results.status[i].flag == ""){
                                $('#view_flag').text('no flag');
                            }else{
                                $('#view_flag').attr("src", '/assets/flags/'+ results.status[i].flag);
                        }
                        $('#view_business_name').text(results.status[i].business_name);
                        $('#view_mobile').text(results.status[i].mobile);
                        $('#view_phone').text(results.status[i].phone);
                        $('#view_useridseller').text(results.status[i].useridseller);
                    }

                }
            });

        });
     //end seller details

     // buyer details
     $('.modelClose').on('click', function(){
            $('#viewbuyer_Modal').hide();
        });

        var profile_1
        var last_name1_1
        var first_name1_1
        var country_name_1
        var state_name_1
        var city_name_1
        var flag_1

        $('body').on('click', '.btn-viewuserdetials2', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           purchase_id = $(this).data('pid2');
           console.log(purchase_id);

           $.ajax({
                type:'GET',
                    url:"{{ url('/mpingiusers/user/purchase_buyermodal/') }}/"+purchase_id,

                   success : function(res) {

                    for(var i=0;i<=res.status1.length;i++) {

                        if(res.status1[i].profile == ""){
                              $('#view_profile2').attr("src", "/storage/assets/images/deafault_pic.png");
                            }else{
                              $('#view_profile2').attr("src", '/storage/assets/uploads/'+ res.status1[i].profile);
                         }
                        $('#view_ulastname2').text(res.status1[i].last_name);
                        $('#view_ufirstname2').text(res.status1[i].first_name);
                        $('#view_country_name2').text(res.status1[i].countryname);
                        $('#view_state_name2').text(res.status1[i].statename);
                        $('#view_city_name2').text(res.status1[i].cityname);



                       if(res.status1[i].flag == ""){
                                $('#view_flag2').text('no flag');
                            }else{
                                $('#view_flag2').attr("src", '/assets/flags/'+ res.status1[i].flag);
                        }
                        $('#view_business_name2').text(res.status1[i].business_name);
                        $('#view_mobile2').text(res.status1[i].mobile);
                        $('#view_phone2').text(res.status1[i].phone);
                        $('#view_useridseller2').text(res.status1[i].useridseller);
                    }

                }
            });

        });

    //end buyer details


     // add  basic listing business
    $('.btn-basiclistingbusiness').on('click', function(event){
          event.preventDefault();
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#first_name-error').html("");
               $('#last_name-error').html("");
               $('#department-error').html("");
               $('#job_title-error').html("");
               $('#description-error').html("");
               $('#company_color-error').html("");
               $('#company_title_color-error').html("");
               $('#country-error').html("");
               $('#city-error').html("");
               $('#state-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#tel-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");

                const user_id = document.querySelector('input[name=user_id]').value;
                const mainservice_id = document.querySelector('input[name=service_id]').value;
                const service_id = document.querySelector('input[name=sub_service_3_id]').value;
                const sub_service_id = document.querySelector('input[name=sub_service_id]').value;
                const sub_service_1_id = document.querySelector('input[name=sub_service_1_id]').value;
                const sub_service_2_id = document.querySelector('input[name=sub_service_2_id]').value;
                const sub_service_3_id = document.querySelector('input[name=sub_service_3_id]').value;
                const first_name = document.querySelector('input[name=first_name]').value;
                const last_name = document.querySelector('input[name=last_name]').value;
                const universities_name = document.querySelector('input[name=universities_name]').value;
                // const company_name = document.querySelector('input[name=company_name]').value;
                // const company_type = document.querySelector('input[name=company_type]').value;
                // const company_motto = document.querySelector('input[name=company_motto]').value;
                // const company_banner = document.querySelector('input[name=company_banner]').value;
                const description = CKEDITOR.instances.editor1.getData();
                //const description = document.querySelector('textarea[name=wysiwyg-editor]').value;
                const address = document.querySelector('textarea[name=address]').value;
                // const address_2 = document.querySelector('input[name=address_2]').value;
                const country = $('.country option:selected').val();
                const city = $('.city option:selected').val();
                const state = $('.state option:selected').val();
                const p_box = document.querySelector('input[name=p_box]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const email = document.querySelector('input[name=email]').value;
                const website = document.querySelector('input[name=website]').value;
                const ad_type = document.querySelector('input[name=ad_type]').value;
                const company_color = document.querySelector('input[name=company_color]').value;
                const company_title_color = document.querySelector('input[name=company_title_color]').value;


          $.ajax({

                url:'{{ route("user.basiclistingbusinessesform") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    mainservice_id: mainservice_id,
                    service_id: service_id,
                    sub_service_id: sub_service_id,
                    sub_service_1_id: sub_service_1_id,
                    sub_service_2_id: sub_service_2_id,
                    sub_service_3_id: sub_service_3_id,
                    first_name: first_name,
                    last_name: last_name,
                    universities_name: universities_name,
                    description: description,
                    p_box: p_box,
                    address: address,
                    country: country,
                    city: city,
                    state: state,
                    phone: phone,
                    mobile: mobile,
                    email: email,
                    website: website,
                    ad_type: ad_type,
                    company_color: company_color,
                    company_title_color: company_title_color,

                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Free Post Businesses Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           // window.location.href = "{{ route('user.viewpost') }}";
                           location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.first_name){
                                $('#first_name-error').html(response.errors.first_name[0]);
                                $(".first_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".first_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.last_name){
                                $('#last_name-error').html(response.errors.last_name[0]);
                                $(".last_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".last_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.description){
                                $('#description-error').html(response.errors.description[0]);
                                $(".description").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".description").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_color){
                                $('#company_color-error').html(response.errors.company_color[0]);
                                $(".company_color").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_color").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_title_color){
                                $('#company_title_color-error').html(response.errors.company_title_color[0]);
                                $(".company_title_color").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_title_color").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.country){
                                $('#country-error').html(response.errors.country[0]);
                                $(".country").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".country").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state){
                                $('#state-error').html(response.errors.state[0]);
                                $(".state").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#tel-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add basic listing business

    //delete item image one or multiple checkbox
     $('.removeAll').on('click', function(e){
            e.preventDefault();
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        if(allVals.length <= 0){
              toastr.error('Please select checkbox one or more', {timeOut: 1000}, {positionClass: 'toast-top-right'});
                //alert("Please select checkbox one or more");
            }  else {

         swal.fire({
            icon: 'question',
            text: "Are you sure to delete this product?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
              var join_selected_values = allVals.join(",");
                $.ajax({
                    type: "post",
                    data: 'imageid='+join_selected_values,
                    dataType: 'json',
                    url: '{{route('user.deleteimageupload')}}',
                    success: function(res2) {
                        if (res2.status == 200) {
                            toastr.success('Delete Product Image successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);
                            // $("#form-id")[0].reset();

                        }
                     }

                });

              }
            }, function (dismiss) {
            return false;
           });
         }
        });
       //end delete item image one or multiple checkbox


           // item details buy
        $('.btn-itemdetailsbuy').on('click', function(e){
          e.preventDefault();
         //   alert('click myaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

          $('#quantity-error').html("");
          $('#delivery-error').html("");
          $('#middle_name-error').html("");
          $('#payment-error').html("");
          $('#message-error').html("");

            const user_id_seller = document.querySelector('input[name=user_id_seller]').value;
            console.log(user_id_seller);

            const user_id_buyer = document.querySelector('input[name=user_id_buyer]').value;
            console.log(user_id_buyer);

            const category_id = document.querySelector('input[name=category_id]').value;
            console.log(category_id);

            const sub_category_id = document.querySelector('input[name=sub_category_id]').value;
            console.log(sub_category_id);

            const article_id = document.querySelector('input[name=article_id]').value;
            console.log(article_id);

            const product_id = document.querySelector('input[name=product_id]').value;
            console.log(product_id);

            const sub_product_id = document.querySelector('input[name=sub_product_id]').value;
            console.log(sub_product_id);

            const item_name = document.querySelector('input[name=item_name]').value;
            console.log(item_name);

            const full_name = document.querySelector('input[name=full_name]').value;
            console.log(full_name);


            const email = document.querySelector('input[name=email]').value;
            console.log(email);

            const mobile = document.querySelector('input[name=mobile]').value;
            console.log(mobile);

            const post_code = document.querySelector('input[name=post_code]').value;
            console.log(post_code);

            const address_1 = document.querySelector('input[name=address_1]').value;
            console.log(address_1);

            const address_2 = document.querySelector('input[name=address_2]').value;
            console.log(address_2);

            const country_id = $('.country option:selected').val();
            console.log(country_id);

            const state_id = $('.state option:selected').val();
            console.log(state_id);

            const city_id = $('.city option:selected').val();
            console.log(city_id);

            const delivery = document.querySelector("input[name=delivery]:checked")?.value; //radio
            console.log(delivery);

            const payment = document.querySelector("input[name=payment]:checked")?.value; //radio
            console.log(payment);

            const quantity = document.querySelector('input[name=quantity]').value;
            console.log(quantity);

            const price = document.querySelector('input[name=price]').value;
            console.log(price);

            const shipping_price = document.querySelector('input[name=shipping_price]').value;
            console.log(shipping_price);

            const total_delivery = document.querySelector('input[name=total_delivery]').value;
            console.log(total_delivery);

            const message = document.querySelector('textarea[id=tArea]').value;
            console.log(message);


            $.ajax({

            url:'{{ route("user.purchasesproduct") }}',
            type:'post',
                data:{
                    user_id_seller: user_id_seller,
                    user_id_buyer: user_id_buyer,
                    category_id: category_id,
                    sub_category_id: sub_category_id,
                    article_id: article_id,
                    product_id: product_id,
                    sub_product_id: sub_product_id,
                    item_name: item_name,
                    full_name: full_name,
                    email: email,
                    mobile: mobile,
                    post_code: post_code,
                    address_1: address_1,
                    address_2: address_2,
                    country_id: country_id,
                    state_id: state_id,
                    city_id: city_id,
                    delivery: delivery,
                    payment: payment,
                    quantity: quantity,
                    price: price,
                    shipping_price: shipping_price,
                    total_delivery: total_delivery,
                    message: message

                },
                dataType:'json',
                success:function (response2) {
                 if (response2.status == 200) {
                        toastr.success('Purchases Product Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.purchases') }}";
                        //    location.reload(true);
                         }, 1500);
                        $("#form-mypur")[0].reset();

                    }

                    if(response2.errors2) {

                        if(response2.errors2.quantity){
                            $('#quantity-error').html(response2.errors2.quantity[0]);
                            $("#quantity").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $("#quantity").removeClass("is-invalid").addClass("is-valid");

                        }

                        if(response2.errors2.delivery){
                            $('#delivery-error').html(response2.errors2.delivery[0]);
                            $("#delivery").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $("#delivery").removeClass("is-invalid").addClass("is-valid");

                        }

                      if(response2.errors2.payment){
                            $('#payment-error').html(response2.errors2.payment[0]);
                            $("#payment").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $("#payment").removeClass("is-invalid").addClass("is-valid");

                        }

                        if(response2.errors2.message){
                            $('#message-error').html(response2.errors2.message[0]);
                            $("#tArea").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $("#tArea").removeClass("is-invalid").addClass("is-valid");

                        }

                    if(response2.errors2) {
                         console.log(response2.errors2);
                       }

                    }
                }
            });
          });
       //end item details buy

    // update profile
       $('.btn-updatemyaccount').on('click', function(e){
          e.preventDefault();
        //   alert('click myaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

         $('#first_name-error').html("");
         $('#middle_name-error').html("");

            const first_name = document.querySelector('input[name=first_name]').value;
            console.log(first_name);

            const middle_name = document.querySelector('input[name=middle_name]').value;
            console.log(middle_name);

            const last_name = document.querySelector('input[name=last_name]').value;
            console.log(last_name);

            const gender = document.querySelector("input[name=gender]:checked")?.value; //radio
            console.log(gender);

            const date = $('.date option:selected').val();
            console.log(date);

            const month = $('.month option:selected').val();
            console.log(month);

            const year = $('.year option:selected').val();
            console.log(year);

            const country = $('.country-dropdown1 option:selected').val();
            console.log(country);

            const country_id = $('.state-dropdown1 option:selected').val();
            console.log(country_id);

            const state_id = $('.city-dropdown1 option:selected').val();
            console.log(state_id);

            const mobile = document.querySelector('input[name=mobile]').value;
            console.log(mobile);

            const pobox = document.querySelector('input[name=pobox]').value;
            console.log(pobox);

            const phone = document.querySelector('input[name=phone]').value;
            console.log(phone);

            const address_1 = document.querySelector('input[name=address_1]').value;
            console.log(address_1);

            const address_2 = document.querySelector('input[name=address_2]').value;
            console.log(address_2);

            const user_id = document.querySelector('input[name=user_id]').value;
            console.log(user_id);


            $.ajax({

            url:'{{ route("user.updatemyaccount") }}',
            type:'post',
                data:{
                    first_name: first_name,
                    middle_name: middle_name,
                    last_name: last_name,
                    gender: gender,
                    date: date,
                    month: month,
                    year: year,
                    country: country,
                    country_id: country_id,
                    state_id: state_id,
                    mobile: mobile,
                    pobox: pobox,
                    phone: phone,
                    address_1: address_1,
                    address_2: address_2,
                    user_id: user_id

                },
                dataType:'json',
                success:function (response2) {
                 if (response2.status == 200) {
                        toastr.success('Update My Account Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-myaccount")[0].reset();

                    }

                    if(response2.errors2) {

                        if(response2.errors2.first_name){
                            $('#first_name-error').html(response2.errors2.first_name[0]);
                            $(".first_name").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $(".first_name").removeClass("is-invalid").addClass("is-valid");

                        }

                      if(response2.errors2.middle_name){
                            $('#middle_name-error').html(response2.errors2.middle_name[0]);
                            $(".middle_name").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $(".middle_name").removeClass("is-invalid").addClass("is-valid");

                        }

                    if(response2.errors2) {
                         console.log(response2.errors2);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }

                    }
                }
             });
          });
       //end update profile


 // add step 1 to 1 form add business(basiclisting-business)
 $('.btn-basiclisting-business').on('click', function(event){
          event.preventDefault();
        //   alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#first_name-error').html("");
               $('#last_name-error').html("");
               $('#job_title-error').html("");
               $('#department-error').html("");
               $('#company_name-error').html("");
               $('#company_type-error').html("");
               $('#company_colors-error').html("");
               $('#company_title_color2-error').html("");
               $('#country-error').html("");
               $('#city-error').html("");
               $('#state-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");
               $('#maploc-error').html("");

                const user_id = document.querySelector('input[name=user_id]').value;
                console.log("=========================user id=======================");
                console.log(user_id);

                const service_id = document.querySelector('input[name=service_id]').value;
                console.log("=========================service_id=======================");
                console.log(service_id);

                const sub_service_id = document.querySelector('input[name=sub_service_id]').value;
                console.log("=========================sub_service_id=======================");
                console.log(sub_service_id);

                const sub_service_1_id = document.querySelector('input[name=sub_service_1_id]').value;
                console.log("=========================sub_service_1_id=======================");
                console.log(sub_service_1_id);

                const sub_service_2_id = document.querySelector('input[name=sub_service_2_id]').value;
                console.log("=========================sub_service_2_id=======================");
                console.log(sub_service_2_id);

                const sub_service_3_id = document.querySelector('input[name=sub_service_3_id]').value;
                console.log("=========================sub_service_3_id=======================");
                console.log(sub_service_3_id);

                // const sub_industry_id = document.querySelector('input[name=sub_industry_id]').value;
                const first_name = document.querySelector('input[name=first_name]').value;
                console.log("=========================first_name=======================");
                console.log(first_name);

                const last_name = document.querySelector('input[name=last_name]').value;
                console.log("=========================last_name=======================");
                console.log(last_name);

                const job_title = document.querySelector('input[name=job_title]').value;
                console.log("=========================job_title=======================");
                console.log(job_title);


                const department = document.querySelector('input[name=department]').value;
                console.log("=========================department=======================");
                console.log(department);

                const company_name = document.querySelector('input[name=company_name]').value;
                console.log("=========================company_name=======================");
                console.log(company_name);


                // const company_type = $('.company_type option:selected').val();
                const description = CKEDITOR.instances.editor2.getData();
                console.log("=========================description=======================");
                console.log(description);


                const country = $('.country option:selected').val();
                console.log("=========================country=======================");
                console.log(country);

                const city = $('.city option:selected').val();
                console.log("=========================city=======================");
                console.log(city);

                const state = $('.state option:selected').val();
                console.log("=========================state=======================");
                console.log(state);


                const p_box = document.querySelector('input[name=p_box]').value;
                console.log("=========================p_box=======================");
                console.log(p_box);


                const address = document.querySelector('textarea[name=address]').value;
                console.log("=========================address=======================");
                console.log(address);

                const phone = document.querySelector('input[name=phone]').value;
                console.log("=========================phone=======================");
                console.log(phone);

                const email = document.querySelector('input[name=email]').value;
                console.log("=========================phone=======================");
                console.log(phone);

                const mobile = document.querySelector('input[name=mobile]').value;
                console.log("=========================mobile=======================");
                console.log(mobile);

                const website = document.querySelector('input[name=website]').value;
                console.log("=========================website=======================");
                console.log(website);

                const ad_type = document.querySelector('input[name=ad_type]').value;
                console.log("=========================ad_type=======================");
                console.log(ad_type);

                const company_color = document.querySelector('input[name=company_color2]').value;
                console.log("=========================company_color=======================");
                console.log(company_color);

                const company_title_color = document.querySelector('input[name=company_title_color2]').value;
                console.log("=========================company_title_color=======================");
                console.log(company_title_color);

                const map_location = document.querySelector('input[name=map_location]').value;
                console.log("=========================map_location=======================");
                console.log(map_location);


          $.ajax({

                url:'{{ route("user.insertbusinessforms") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    service_id: service_id,
                    sub_service_id: sub_service_id,
                    sub_service_1_id: sub_service_1_id,
                    sub_service_2_id: sub_service_2_id,
                    sub_service_3_id: sub_service_3_id,
                    first_name: first_name,
                    last_name: last_name,
                    department: department,
                    job_title: job_title,
                    company_name: company_name,
                    description: description,
                    country: country,
                    city: city,
                    state: state,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    // ad_type: ad_type,
                    company_color: company_color,
                    map_location: map_location,

                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Business Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.viewbusiness') }}";
                            //location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.first_name){
                                $('#first_name-error').html(response.errors.first_name[0]);
                                $(".first_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".first_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.last_name){
                                $('#last_name-error').html(response.errors.last_name[0]);
                                $(".last_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".last_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }



                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.country){
                                $('#country-error').html(response.errors.country[0]);
                                $(".country").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".country").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state){
                                $('#state-error').html(response.errors.state[0]);
                                $(".state").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_color){
                                $('#company_colors-error').html(response.errors.company_color[0]);
                                $(".company_color2").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_color2").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_title_color){
                                $('#company_title_color2-error').html(response.errors.company_title_color[0]);
                                $(".company_title_color2").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_title_color2").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.map_location){
                                $('#maploc-error').html(response.errors.map_location[0]);
                                $(".map_location").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".map_location").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add step 1 to 1 form add business(basiclisting-business)


          // get single industries logo data
          $('body').on('click', '.btn_businessphoto', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            company_logo = $(this).data('photo');
            console.log("===============company_logo=============");
            console.log(company_logo);

            id = $(this).data('ids');
            console.log("===============id=============");
            console.log(id);

           if(company_logo === ""){
                $('#edit_photo2').attr("src", '/assets/images/deafault_pic.png');
             }else{
                $('#edit_photo2').attr("src", '/storage/assets/uploads/'+ company_logo);
            }
            $('#get_pic').val(company_logo);
            $('#edit_sid2').val(id);

        });



    // get single industries logo data


        // add step 2 to 2 form add industries(basiclisting)
      $('.btn-basiclistingindustries').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#first_name-error').html("");
               $('#last_name-error').html("");
               $('#job_title-error').html("");
               $('#department-error').html("");
               $('#company_name-error').html("");
               $('#company_type-error').html("");
               $('#company_color-error').html("");
               $('#company_title_color-error').html("");
               $('#country-error').html("");
               $('#city-error').html("");
               $('#state-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");
               $('#question_1-error').html("");
               $('#question_2-error').html("");
               $('#question_3-error').html("");
               $('#question_4-error').html("");
               $('#question_5-error').html("");
               $('#question_6-error').html("");
               $('#president-error').html("");
               $('#purchasing-error').html("");
               $('#advertising-error').html("");
               $('#marketing-error').html("");
               $('#sales-error').html("");
               $('#engineering-error').html("");
               $('#map_location_industry-error').html("");

                const user_id = document.querySelector('input[name=user_id]').value;
                const industry_id = document.querySelector('input[name=industry_id]').value;
                const sub_industry_id = document.querySelector('input[name=sub_industry_id]').value;
                const first_name = document.querySelector('input[name=first_name]').value;
                const last_name = document.querySelector('input[name=last_name]').value;
                const job_title = document.querySelector('input[name=job_title]').value;
                const department = document.querySelector('input[name=department]').value;
                const company_name = document.querySelector('input[name=company_name]').value;
                const company_type = $('.company_type option:selected').val();
                const description = CKEDITOR.instances.editor2.getData();
                const country = $('.country option:selected').val();
                const city = $('.city option:selected').val();
                const state = $('.state option:selected').val();
                const p_box = document.querySelector('input[name=p_box]').value;
                const address = document.querySelector('textarea[name=address]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const email = document.querySelector('input[name=email]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const website = document.querySelector('input[name=website]').value;
                const question_1 = document.querySelector('input[name=question_1]').value;
                const question_2 = document.querySelector('input[name=question_2]').value;
                const question_3 = document.querySelector('input[name=question_3]').value;
                const question_4 = document.querySelector('input[name=question_4]').value;
                const question_5 = document.querySelector("input[name=question_5]:checked")?.value; //radio
                const question_6 = document.querySelector("input[name=question_6]:checked")?.value; //radio
                const president = document.querySelector('input[name=president]').value;
                const advertising = document.querySelector('input[name=advertising]').value;
                const sales = document.querySelector('input[name=sales]').value;
                const purchasing = document.querySelector('input[name=purchasing]').value;
                const marketing = document.querySelector('input[name=marketing]').value;
                const engineering = document.querySelector('input[name=engineering]').value;
                const ad_type = document.querySelector('input[name=ad_type]').value;
                const company_color = document.querySelector('input[name=company_color]').value;
                const company_title_color = document.querySelector('input[name=company_title_color]').value;
                const map_location_industry = document.querySelector('input[name=map_location_industry]').value;

          $.ajax({

                url:'{{ route("user.insertindustriesform") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    industry_id: industry_id,
                    sub_industry_id: sub_industry_id,
                    first_name: first_name,
                    last_name: last_name,
                    job_title: job_title,
                    department: department,
                    company_name: company_name,
                    company_type: company_type,
                    description: description,
                    country: country,
                    city: city,
                    state: state,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    question_1: question_1,
                    question_2: question_2,
                    question_3: question_3,
                    question_4: question_4,
                    question_5: question_5,
                    question_6: question_6,
                    president: president,
                    advertising: advertising,
                    sales: sales,
                    purchasing: purchasing,
                    marketing: marketing,
                    engineering: engineering,
                    ad_type: ad_type,
                    company_color: company_color,
                    company_title_color: company_title_color,
                    map_location_industry: map_location_industry
                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Industries Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.viewindusty') }}";
                            //location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.first_name){
                                $('#first_name-error').html(response.errors.first_name[0]);
                                $(".first_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".first_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.last_name){
                                $('#last_name-error').html(response.errors.last_name[0]);
                                $(".last_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".last_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.company_type){
                                $('#company_type-error').html(response.errors.company_type[0]);
                                $(".company_type").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_type").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.country){
                                $('#country-error').html(response.errors.country[0]);
                                $(".country").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".country").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state){
                                $('#state-error').html(response.errors.state[0]);
                                $(".state").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_1){
                                $('#question_1-error').html(response.errors.question_1[0]);
                                $(".question_1").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_1").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_2){
                                $('#question_2-error').html(response.errors.question_2[0]);
                                $(".question_2").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_2").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.question_3){
                                $('#question_3-error').html(response.errors.question_3[0]);
                                $(".question_3").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_3").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_4){
                                $('#question_4-error').html(response.errors.question_4[0]);
                                $(".question_4").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_4").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_5){
                                $('#question_5-error').html(response.errors.question_5[0]);
                                $(".question_5").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_5").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_6){
                                $('#question_6-error').html(response.errors.question_6[0]);
                                $(".question_6").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_6").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.president){
                                $('#president-error').html(response.errors.president[0]);
                                $(".president").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".president").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.purchasing){
                                $('#purchasing-error').html(response.errors.purchasing[0]);
                                $(".purchasing").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".purchasing").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.advertising){
                                $('#advertising-error').html(response.errors.advertising[0]);
                                $(".advertising").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".advertising").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.marketing){
                                $('#marketing-error').html(response.errors.marketing[0]);
                                $(".marketing").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".marketing").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.sales){
                                $('#sales-error').html(response.errors.sales[0]);
                                $(".sales").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".sales").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.engineering){
                                $('#engineering-error').html(response.errors.engineering[0]);
                                $(".engineering").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".engineering").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.map_location_industry){
                                $('#map_location_industry-error').html(response.errors.map_location_industry[0]);
                                $(".map_location_industry").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".map_location_industry").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add step 2 to 2 form add industries(basiclisting)


    // add step 2 to 2 form add industries(premiumprogram)
      $('.btn-premiumprogramindustries').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#first_name-error').html("");
               $('#last_name-error').html("");
               $('#job_title-error').html("");
               $('#department-error').html("");
               $('#company_name-error').html("");
               $('#company_type-error').html("");
               $('#company_color-error').html("");
               $('#company_title_color-error').html("");
               $('#country-error').html("");
               $('#city-error').html("");
               $('#state-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");
               $('#question_1-error').html("");
               $('#question_2-error').html("");
               $('#question_3-error').html("");
               $('#question_4-error').html("");
               $('#question_5-error').html("");
               $('#question_6-error').html("");
               $('#president-error').html("");
               $('#purchasing-error').html("");
               $('#advertising-error').html("");
               $('#marketing-error').html("");
               $('#sales-error').html("");
               $('#engineering-error').html("");

                const user_id = document.querySelector('input[name=user_id]').value;
                const industry_id = document.querySelector('input[name=industry_id]').value;
                const sub_industry_id = document.querySelector('input[name=sub_industry_id]').value;
                const first_name = document.querySelector('input[name=first_name]').value;
                const last_name = document.querySelector('input[name=last_name]').value;
                const job_title = document.querySelector('input[name=job_title]').value;
                const department = document.querySelector('input[name=department]').value;
                const company_name = document.querySelector('input[name=company_name]').value;
                const company_type = $('.company_type option:selected').val();
                const description = CKEDITOR.instances.editor2.getData();
                const country = $('.country option:selected').val();
                const city = $('.city option:selected').val();
                const state = $('.state option:selected').val();
                const p_box = document.querySelector('input[name=p_box]').value;
                const address = document.querySelector('textarea[name=address]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const email = document.querySelector('input[name=email]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const website = document.querySelector('input[name=website]').value;
                const question_1 = document.querySelector('input[name=question_1]').value;
                const question_2 = document.querySelector('input[name=question_2]').value;
                const question_3 = document.querySelector('input[name=question_3]').value;
                const question_4 = document.querySelector('input[name=question_4]').value;
                const question_5 = document.querySelector("input[name=question_5]:checked")?.value; //radio
                const question_6 = document.querySelector("input[name=question_6]:checked")?.value; //radio
                const president = document.querySelector('input[name=president]').value;
                const advertising = document.querySelector('input[name=advertising]').value;
                const sales = document.querySelector('input[name=sales]').value;
                const purchasing = document.querySelector('input[name=purchasing]').value;
                const marketing = document.querySelector('input[name=marketing]').value;
                const engineering = document.querySelector('input[name=engineering]').value;
                const ad_type = document.querySelector('input[name=ad_type]').value;
                const company_color = document.querySelector('input[name=company_color]').value;
                const company_title_color = document.querySelector('input[name=company_title_color]').value;

          $.ajax({

                url:'{{ route("user.insertindustriesform") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    industry_id: industry_id,
                    sub_industry_id: sub_industry_id,
                    first_name: first_name,
                    last_name: last_name,
                    job_title: job_title,
                    department: department,
                    company_name: company_name,
                    company_type: company_type,
                    description: description,
                    country: country,
                    city: city,
                    state: state,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    question_1: question_1,
                    question_2: question_2,
                    question_3: question_3,
                    question_4: question_4,
                    question_5: question_5,
                    question_6: question_6,
                    president: president,
                    advertising: advertising,
                    sales: sales,
                    purchasing: purchasing,
                    marketing: marketing,
                    engineering: engineering,
                    ad_type: ad_type,
                    company_color: company_color,
                    company_title_color: company_title_color
                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Industries Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            //window.location.href = "{{ route('user.viewpost') }}";
                            location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.first_name){
                                $('#first_name-error').html(response.errors.first_name[0]);
                                $(".first_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".first_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.last_name){
                                $('#last_name-error').html(response.errors.last_name[0]);
                                $(".last_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".last_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.company_type){
                                $('#company_type-error').html(response.errors.company_type[0]);
                                $(".company_type").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_type").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.country){
                                $('#country-error').html(response.errors.country[0]);
                                $(".country").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".country").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state){
                                $('#state-error').html(response.errors.state[0]);
                                $(".state").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_1){
                                $('#question_1-error').html(response.errors.question_1[0]);
                                $(".question_1").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_1").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_2){
                                $('#question_2-error').html(response.errors.question_2[0]);
                                $(".question_2").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_2").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.question_3){
                                $('#question_3-error').html(response.errors.question_3[0]);
                                $(".question_3").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_3").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_4){
                                $('#question_4-error').html(response.errors.question_4[0]);
                                $(".question_4").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_4").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_5){
                                $('#question_5-error').html(response.errors.question_5[0]);
                                $(".question_5").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_5").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.question_6){
                                $('#question_6-error').html(response.errors.question_6[0]);
                                $(".question_6").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".question_6").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.president){
                                $('#president-error').html(response.errors.president[0]);
                                $(".president").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".president").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.purchasing){
                                $('#purchasing-error').html(response.errors.purchasing[0]);
                                $(".purchasing").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".purchasing").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.advertising){
                                $('#advertising-error').html(response.errors.advertising[0]);
                                $(".advertising").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".advertising").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.marketing){
                                $('#marketing-error').html(response.errors.marketing[0]);
                                $(".marketing").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".marketing").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.sales){
                                $('#sales-error').html(response.errors.sales[0]);
                                $(".sales").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".sales").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.engineering){
                                $('#engineering-error').html(response.errors.engineering[0]);
                                $(".engineering").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".engineering").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add step 2 to 2 form add industries(premiumprogram)



        // edit step 2 to 2 form add industries()
      $('.btn-update-industries').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#job_title-error').html("");
               $('#department-error').html("");
               $('#company_name-error').html("");
               $('#company_color-error').html("");
               $('#company_title_color-error').html("");
               $('#p_box-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");

                const job_title = document.querySelector('input[name=job_title]').value;
                const department = document.querySelector('input[name=department]').value;
                const company_name = document.querySelector('input[name=company_name]').value;
                const description = document.querySelector('textarea[name=description]').value;
                const p_box = document.querySelector('input[name=p_box]').value;
                const address = document.querySelector('textarea[name=address]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const email = document.querySelector('input[name=email]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const website = document.querySelector('input[name=website]').value;
                const id = document.querySelector('input[name=industry_id]').value;

          $.ajax({

                url:'{{ route("user.updatetindustriesform") }}',
                type:'post',
                data:{
                    job_title: job_title,
                    department: department,
                    company_name: company_name,
                    description: description,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    id: id,

                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Update Industries Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            //window.location.href = "{{ route('user.viewpost') }}";
                            location.reload(true);
                         }, 1500);
                        $("#form-id3")[0].reset();

                    }

                    if(response.errors) {


                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end edit step 2 to 2 form add industries()



        // edit service logo()
      $('.btn-update-services').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#job_title-error').html("");
               $('#department-error').html("");
               $('#company_name-error').html("");
               $('#company_color-error').html("");
               $('#company_title_color-error').html("");
               $('#p_box-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");

                const job_title = document.querySelector('input[name=job_title]').value;
                const department = document.querySelector('input[name=department]').value;
                const company_name = document.querySelector('input[name=company_name]').value;
                const description = document.querySelector('textarea[name=description]').value;
                const p_box = document.querySelector('input[name=p_box]').value;
                const address = document.querySelector('textarea[name=address]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const email = document.querySelector('input[name=email]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const website = document.querySelector('input[name=website]').value;
                const id = document.querySelector('input[name=business_id]').value;

          $.ajax({

                url:'{{ route("user.updatetserviceform") }}',
                type:'post',
                data:{
                    job_title: job_title,
                    department: department,
                    company_name: company_name,
                    description: description,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    id: id,

                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Update Service Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            //window.location.href = "{{ route('user.viewpost') }}";
                            location.reload(true);
                         }, 1500);
                        $("#form-id4")[0].reset();

                    }

                    if(response.errors) {


                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end edit service logo()

        // edit job logo()
        $('.btn-update-jobs').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#job_title-error').html("");
               $('#department-error').html("");
               $('#company_name-error').html("");
               $('#company_color-error').html("");
               $('#company_title_color-error').html("");
               $('#p_box-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");

                const job_title = document.querySelector('input[name=job_title]').value;
                const department = document.querySelector('input[name=department]').value;
                const company_name = document.querySelector('input[name=company_name]').value;
                const job_description = document.querySelector('textarea[name=job_description]').value;
                const p_box = document.querySelector('input[name=p_box]').value;
                const address = document.querySelector('textarea[name=address]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const email = document.querySelector('input[name=email]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const website = document.querySelector('input[name=website]').value;
                const id = document.querySelector('input[name=job_id]').value;

          $.ajax({

                url:'{{ route("user.updateJobsform") }}',
                type:'post',
                data:{
                    job_title: job_title,
                    department: department,
                    company_name: company_name,
                    job_description: job_description,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    id: id,

                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Update Job Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            //window.location.href = "{{ route('user.viewpost') }}";
                            location.reload(true);
                         }, 1500);
                        $("#form-id4")[0].reset();

                    }

                    if(response.errors) {


                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }



                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end edit job logo()

  // get single industries logo data
        $('body').on('click', '.btn_getindustriesphoto', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            company_logo = $(this).data('photo');
            console.log("===============company_logo=============");
            console.log(company_logo);

            id = $(this).data('ids');
            console.log("===============id=============");
            console.log(id);

           if(company_logo === ""){
                $('#edit_photo').attr("src", '/assets/images/deafault_pic.png');
             }else{
                $('#edit_photo').attr("src", '/storage/assets/uploads/'+ company_logo);
            }
            $('#get_pic').val(company_logo);
            $('#edit_sid2').val(id);

        });



    // get single industries logo data

         // update industry logo
         $('.btn-updateIndustrylogo').on('click', function(e){
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#image3-error').html("");

            const company_logo = document.querySelector('input[id=image3]').value;
            console.log(company_logo);

            // const edit_photo = document.querySelector('input[id=edit_photo]').value;
            // console.log(edit_photo);

            const id = document.querySelector('input[id=edit_sid2]').value;
            console.log(id);

            var data = new FormData(this.form);
            data.append('company_logo', $('#image3')[0].files[0]);
            // data.append('edit_photo', edit_photo);
            data.append('id', id);

            // $('#photo-error').html("");

            $.ajax({
                    url: '{{ route('user.updatemyIndustrylogo') }}',
                    type:'post',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                    success: function(response6){
                        if (response6.status == 200) {
                        toastr.success('Update Industry Logo Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-blogo2")[0].reset();

                      }

                      if(response6.errors6) {

                            if(response6.errors6.company_logo){
                                $('#image3-error').html(response6.errors6.company_logo[0]);
                                $(".image3").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".image3").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(response6.errors6) {
                          console.log("Failed");

                     }
                  }
                }
            })
        });
    //end update industry logo


     //  update user links
     $('.btn-userlinks').on('click', function(e){
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // $('#image3-error').html("");

            const website_name = document.querySelector('input[id=website_name]').value;
            console.log(website_name);

            const website_link = document.querySelector('input[id=website_link]').value;
            console.log(website_link);

            const facebook_link = document.querySelector('input[id=facebook_link]').value;
            console.log(facebook_link);

            const twitter_link = document.querySelector('input[id=twitter_link]').value;
            console.log(twitter_link);

            const youtube_link = document.querySelector('input[id=youtube_link]').value;
            console.log(youtube_link);

            const instagram_link = document.querySelector('input[id=instagram_link]').value;
            console.log(instagram_link);

            const map_link = document.querySelector('input[id=map_link]').value;
            console.log(map_link);

            const id = document.querySelector('input[id=id]').value;
            console.log(id);

            var data = new FormData(this.form);
            data.append('website_name', website_name);
            data.append('website_link', website_link);
            data.append('facebook_link', facebook_link);
            data.append('twitter_link', twitter_link);
            data.append('youtube_link', youtube_link);
            data.append('instagram_link', instagram_link);
            data.append('map_link', map_link);
            data.append('id', id);

            $.ajax({
                    url: '{{ route('user.updateuserlinks') }}',
                    type:'post',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                    success: function(response11){
                        if (response11.status == 200) {
                        toastr.success('Update User link Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-link")[0].reset();

                      }

                }
            })
        });
    //end update user links


         //  edit user links
         $('.btn-editsociallink').on('click', function(e){
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // $('#image3-error').html("");

            const website_name = document.querySelector('input[id=edit_website_name]').value;
            console.log(website_name);

            const website_link = document.querySelector('input[id=edit_website_link]').value;
            console.log(website_link);

            const facebook_link = document.querySelector('input[id=edit_facebook_link]').value;
            console.log(facebook_link);

            const twitter_link = document.querySelector('input[id=edit_twitter_link]').value;
            console.log(twitter_link);

            const youtube_link = document.querySelector('input[id=edit_youtube_link]').value;
            console.log(youtube_link);

            const instagram_link = document.querySelector('input[id=edit_instagram_link]').value;
            console.log(instagram_link);

            const map_link = document.querySelector('input[id=edit_map_link]').value;
            console.log(map_link);

            const id = document.querySelector('input[id=edit_id]').value;
            console.log(id);

            var data = new FormData(this.form);
            data.append('website_name', website_name);
            data.append('website_link', website_link);
            data.append('facebook_link', facebook_link);
            data.append('twitter_link', twitter_link);
            data.append('youtube_link', youtube_link);
            data.append('instagram_link', instagram_link);
            data.append('map_link', map_link);
            data.append('id', id);

            $.ajax({
                    url: '{{ route('user.edituserlinks') }}',
                    type:'post',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                    success: function(response11){
                        if (response11.status == 200) {
                        toastr.success('Edit User link Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-link")[0].reset();

                      }

                }
            })
        });
    //end edit user links


        //add (Free Jobs)
      $('.btn-freejobs').on('click', function(event){
          event.preventDefault();
          //alert('click Product');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

               $('#first_name-error').html("");
               $('#last_name-error').html("");
               $('#department-error').html("");
               $('#job_title-error').html("");
               $('#company_name-error').html("");
               $('#salary-error').html("");
               $('#type_of_job-error').html("");
               $('#schedule_from-error').html("");
               $('#schedule_to-error').html("");
               $('#country-error').html("");
               $('#city-error').html("");
               $('#state-error').html("");
               $('#p_box-error').html("");
               $('#address-error').html("");
               $('#phone-error').html("");
               $('#email-error').html("");
               $('#mobile-error').html("");
               $('#website-error').html("");


                const user_id = document.querySelector('input[name=user_id]').value;
                const job_category_id = document.querySelector('input[name=job_category_id]').value;
                const first_name = document.querySelector('input[name=first_name]').value;
                const last_name = document.querySelector('input[name=last_name]').value;
                const department = document.querySelector('input[name=department]').value;
                const job_title = document.querySelector('input[name=job_title]').value;
                const company_name = document.querySelector('input[name=company_name]').value;
                const salary = document.querySelector('input[name=salary]').value;
                const type_of_job = document.querySelector("input[name=type_of_job]:checked")?.value; //radio
                const schedule_from = $('.schedule_from option:selected').val();
                const schedule_to = $('.schedule_to option:selected').val();
                const job_description = CKEDITOR.instances.editor2.getData();
                const country = $('.country option:selected').val();
                const city = $('.city option:selected').val();
                const state = $('.state option:selected').val();
                const p_box = document.querySelector('input[name=p_box]').value;
                const address = document.querySelector('textarea[name=address]').value;
                const phone = document.querySelector('input[name=phone]').value;
                const email = document.querySelector('input[name=email]').value;
                const mobile = document.querySelector('input[name=mobile]').value;
                const website = document.querySelector('input[name=website]').value;
                const ad_type = document.querySelector('input[name=ad_type]').value;


          $.ajax({

                url:'{{ route("user.insertfreejobsforms") }}',
                type:'post',
                data:{
                    user_id: user_id,
                    job_category_id: job_category_id,
                    first_name: first_name,
                    last_name: last_name,
                    department: department,
                    job_title: job_title,
                    company_name: company_name,
                    salary: salary,
                    type_of_job: type_of_job,
                    schedule_from: schedule_from,
                    schedule_to: schedule_to,
                    job_description: job_description,
                    country: country,
                    city: city,
                    state: state,
                    p_box: p_box,
                    address: address,
                    phone: phone,
                    email: email,
                    mobile: mobile,
                    website: website,
                    ad_type: ad_type,

                },
                dataType:'json',
                success:function (response) {

                    if (response.status == 200) {
                        toastr.success('Added Free Jobs Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.viewjobs') }}";
                           // location.reload(true);
                         }, 1500);
                        $("#form-id")[0].reset();

                    }

                    if(response.errors) {

                            if(response.errors.first_name){
                                $('#first_name-error').html(response.errors.first_name[0]);
                                $(".first_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".first_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.last_name){
                                $('#last_name-error').html(response.errors.last_name[0]);
                                $(".last_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".last_name").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.department){
                                $('#department-error').html(response.errors.department[0]);
                                $(".department").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".department").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.job_title){
                                $('#job_title-error').html(response.errors.job_title[0]);
                                $(".job_title").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".job_title").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.company_name){
                                $('#company_name-error').html(response.errors.company_name[0]);
                                $(".company_name").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".company_name").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.salary){
                                $('#salary-error').html(response.errors.salary[0]);
                                $(".salary").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".salary").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.type_of_job){
                                $('#type_of_job-error').html(response.errors.type_of_job[0]);
                                $(".type_of_job").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".type_of_job").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.schedule_from){
                                $('#schedule_from-error').html(response.errors.schedule_from[0]);
                                $(".schedule_from").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".schedule_from").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.schedule_to){
                                $('#schedule_to-error').html(response.errors.schedule_to[0]);
                                $(".schedule_to").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".schedule_to").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.country){
                                $('#country-error').html(response.errors.country[0]);
                                $(".country").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".country").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.city){
                                $('#city-error').html(response.errors.city[0]);
                                $(".city").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".city").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.state){
                                $('#state-error').html(response.errors.state[0]);
                                $(".state").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".state").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.p_box){
                                $('#p_box-error').html(response.errors.p_box[0]);
                                $(".p_box").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".p_box").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.address){
                                $('#address-error').html(response.errors.address[0]);
                                $(".address").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".address").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.phone){
                                $('#phone-error').html(response.errors.phone[0]);
                                $(".phone").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".phone").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.email){
                                $('#email-error').html(response.errors.email[0]);
                                $(".email").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".email").removeClass("is-invalid").addClass("is-valid");

                            }


                            if(response.errors.mobile){
                                $('#mobile-error').html(response.errors.mobile[0]);
                                $(".mobile").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".mobile").removeClass("is-invalid").addClass("is-valid");

                            }

                            if(response.errors.website){
                                $('#website-error').html(response.errors.website[0]);
                                $(".website").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".website").removeClass("is-invalid").addClass("is-valid");

                            }


                        if(response.errors) {
                         console.log(response.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }


                  }

                }
           });

        });

        //end add (Free Jobs)



          // get single jobs logo data
          $('body').on('click', '.btn_jobsphoto', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            company_logo = $(this).data('photo');
            console.log("===============company_logo=============");
            console.log(company_logo);

            id = $(this).data('ids');
            console.log("===============id=============");
            console.log(id);

           if(company_logo === ""){
                $('#edit_photo3').attr("src", '/assets/images/deafault_pic.png');
             }else{
                $('#edit_photo3').attr("src", '/storage/assets/uploads/'+ company_logo);
            }
            $('#get_pic').val(company_logo);
            $('#edit_sid3').val(id);

        });



    // get single jobs logo data


       // update profile picture
        $('.btn-updateprofile').on('click', function(e){
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#image-error').html("");

            const profile = document.querySelector('input[id=image]').value;
            console.log(profile);

            // const edit_photo = document.querySelector('input[id=edit_photo]').value;
            // console.log(edit_photo);

            const id = document.querySelector('input[id=id]').value;
            console.log(id);

            var data = new FormData(this.form);
            data.append('profile', $('#image')[0].files[0]);
            // data.append('edit_photo', edit_photo);
            data.append('id', id);

            // $('#photo-error').html("");

            $.ajax({
                    url: '{{ route('user.updatemyprofile') }}',
                    type:'post',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                    success: function(response3){
                        if (response3.status == 200) {
                        toastr.success('Update Profile Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-profile")[0].reset();

                      }

                      if(response3.errors) {

                            if(response3.errors.profile){
                                $('#image-error').html(response3.errors.profile[0]);
                                $(".image").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".image").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(response3.errors) {
                          console.log("Failed");

                     }
                  }
                }
            })
        });
    //end update profile picture




     // update business logo
           $('.btn-updateBusinesslogo').on('click', function(e){
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#image2-error').html("");

            const company_logo = document.querySelector('input[id=image2]').value;
            console.log(company_logo);

            // const edit_photo = document.querySelector('input[id=edit_photo]').value;
            // console.log(edit_photo);

            const id = document.querySelector('input[id=edit_sid2]').value;
            console.log(id);

            var data = new FormData(this.form);
            data.append('company_logo', $('#image2')[0].files[0]);
            // data.append('edit_photo', edit_photo);
            data.append('id', id);

            // $('#photo-error').html("");

            $.ajax({
                    url: '{{ route('user.updatemybusinesslogo') }}',
                    type:'post',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                    success: function(response3){
                        if (response3.status == 200) {
                        toastr.success('Update Business Logo Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-blogo")[0].reset();

                      }

                      if(response3.errors) {

                            if(response3.errors.company_logo){
                                $('#image2-error').html(response3.errors.company_logo[0]);
                                $(".image2").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".image2").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(response3.errors) {
                          console.log("Failed");

                     }
                  }
                }
            })
        });
    //end update business logo


         // update Jobs logo
         $('.btn-updateJobslogo').on('click', function(e){
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#image2-error').html("");

            const company_logo = document.querySelector('input[id=image2]').value;
            console.log(company_logo);

            // const edit_photo = document.querySelector('input[id=edit_photo]').value;
            // console.log(edit_photo);

            const id = document.querySelector('input[id=edit_sid3]').value;
            console.log(id);

            var data = new FormData(this.form);
            data.append('company_logo', $('#image2')[0].files[0]);
            // data.append('edit_photo', edit_photo);
            data.append('id', id);

            // $('#photo-error').html("");

            $.ajax({
                    url: '{{ route('user.updatemyjoblogo') }}',
                    type:'post',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:'json',
                    success: function(response4){
                        if (response4.status == 200) {
                        toastr.success('Update Job Logo Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-jlogo")[0].reset();

                      }

                      if(response4.errors) {

                            if(response4.errors.company_logo){
                                $('#image2-error').html(response4.errors.company_logo[0]);
                                $(".image2").removeClass("is-valid").addClass("is-invalid");

                            }else{
                                $(".image2").removeClass("is-invalid").addClass("is-valid");

                            }

                        if(response4.errors) {
                          console.log("Failed");

                     }
                  }
                }
            })
        });
    //end update Jobs logo


      // update business account
      $('.btn-updatemybusinessaccount').on('click', function(e){
          e.preventDefault();
        //alert('click mybusinessaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

            const business_name = document.querySelector('input[name=business_name]').value;
            console.log(business_name);

            const business_type = document.querySelector('input[name=business_type]').value;
            console.log(business_type);

            const business_motto = document.querySelector('input[name=business_motto]').value;
            console.log(business_motto);

            const dealers_in = document.querySelector('input[name=dealers_in]').value;
            console.log(dealers_in);

            const business_icon = document.querySelector("input[name=business_icon]:checked")?.value; //radio
            console.log(business_icon);

            const description = document.querySelector('textarea[name=description]').value;
            console.log(description);

            const department = document.querySelector('input[name=department]').value;
            console.log(department);

            const job_title = document.querySelector('input[name=job_title]').value;
            console.log(job_title);

            const i_am_a = document.querySelector("input[name=i_am_a]:checked")?.value; //radio
            console.log(i_am_a);

            const fax = document.querySelector('input[name=fax]').value;
            console.log(fax);

            const po_box = document.querySelector('input[name=po_box]').value;
            console.log(po_box);

            const website = document.querySelector('input[name=website]').value;
            console.log(website);

            const address = document.querySelector('input[name=address]').value;
            console.log(address);

            const business_id = document.querySelector('input[name=business_id]').value;
            console.log(business_id);

            $.ajax({
                    url: '{{ route('user.submitbusiness') }}',
                    type:'post',
                    data:{
                        business_name: business_name,
                        business_type: business_type,
                        business_motto: business_motto,
                        dealers_in: dealers_in,
                        business_icon: business_icon,
                        description: description,
                        department: department,
                        job_title: job_title,
                        i_am_a: i_am_a,
                        fax: fax,
                        po_box: po_box,
                        website: website,
                        address: address,
                        business_id: business_id

                    },
                    dataType:'json',
                    success: function(response4){
                        console.log(response4);
                        if (response4.status4 == 200) {
                        toastr.success('Update Business Account Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-mybusiness")[0].reset();

                      }

                //       if(response3.errors) {

                //             if(response3.errors.profile){
                //                 $('#image-error').html(response3.errors.profile[0]);
                //                 $(".image").removeClass("is-valid").addClass("is-invalid");

                //             }else{
                //                 $(".image").removeClass("is-invalid").addClass("is-valid");

                //             }

                //         if(response3.errors) {
                //           console.log("Failed");

                //      }
                //   }
                }
            })


          });
       //end update business account


  //upload product items
      $('.btn-productitems').on('click', function(e){
        //alert('click');
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#imguploads-error').html("");

            // const image = document.querySelector('input[id=image_name]').value;
            // console.log(image);

            const user_id = document.querySelector('input[name=user_id]').value;
            console.log(user_id);

            const product_item = document.querySelector('input[name=product_item]').value;
            console.log(product_item);

            const category_id = document.querySelector('input[name=category_id]').value;
            console.log(category_id);

            const sub_category_id = document.querySelector('input[name=sub_category_id]').value;
            console.log(sub_category_id);

            const article_id = document.querySelector('input[name=article_id]').value;
            console.log(article_id);

            const product_id = document.querySelector('input[name=product_id]').value;
            console.log(product_id);

            const sub_product_id = document.querySelector('input[name=sub_product_id]').value;
            console.log(sub_product_id);

            const oFile2 = document.getElementById("image_name").files[0];

          function validateSize(){
                if($("#image_name").val() === ""){
                    $($("#image_name")).addClass("is-invalid");
                    $("#imguploads-error").html("Required Image Upload");
                    $("#imguploads-error").css({"color" : "red", "font-size" : "14px"});
                    $("#imguploads2-error").hide();
                  return false;
                }else if (oFile2.size > 5242880) { //kb equal mb 5120 only max (5MB)
                      $($("#image_name")).addClass("is-invalid");
                        $("#imguploads2-error").html('File size must under or maximum 5MB only');
                       $("#imguploads2-error").css({"color" : "red", "font-size" : "14px"});
                       $("#imguploads-error").hide();
                       $("#imguploads2-error").show();

                     return false;
                      } else {
                       $("#image_name").removeClass("is-invalid").addClass("is-valid");
                       $("#imguploads-error").html("");
                       $("#imguploads2-error").html("");

                        return true;
                    }
                }


             validateSize();
          if (validateSize() === true) {


            var data = new FormData(this.form);
            var names = [];
                var file_data = $('#image_name')[0].files[0];
                for(var i = 0;i<file_data.length;i++){
                    data.append("image_name"+i, file_data[i]);
                }

            data.append('image_name[]',names);
            data.append('user_id', user_id);
            data.append('product_item', product_item);
            data.append('category_id', category_id);
            data.append('sub_category_id', sub_category_id);
            data.append('article_id', article_id);
            data.append('product_id', product_id);
            data.append('sub_product_id', sub_product_id);
            data.append('user_id', user_id);
            // isValidStatus();

            $.ajax({
                    url: '{{ route('user.uploadproductitemImage') }}',
                    type:'POST',
                    data: data,
                    cache: false,
                    contentType:false,
                    processData:false,
                          beforeSend: function() {
                           var imgs = '<img src="{{ url("/assets/loading/ajax-loader.gif") }}" style="height: 25px; width: 25px;"/>';
                            $('.btn-productitems').html(imgs + ' Wait Loading...');
                            $(".btn-productitems").prop('disabled', true).addClass("disabled");

                        },
                    // cache: false,
                    // contentType: false,
                    // processData: false,
                    // dataType:'json',
                    success: function(response4){
                        if (response4.status4 == 200) {
                        toastr.success('Upload Product Image successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                            window.location.href = '{{URL::to("/mpingiusers/user/category/products/items/photo")}}/'+response4.upload_id;
                        //    location.reload(true);
                         }, 1500);
                        $("#form-imgupload")[0].reset();

                      }

                //       if(response4.errors4) {

                //             if(response4.errors4.image_name){
                //                 $('#imguploads-error').html(response4.errors4.image_name[0]);
                //                 $(".image_name").removeClass("is-valid").addClass("is-invalid");

                //             }else{
                //                 $(".image_name").removeClass("is-invalid").addClass("is-valid");

                //             }

                //         if(response4.errors4) {
                //           console.log("Failed");

                //      }
                //   }
                }
            })

           }
        });
    //end upload product items


       //upload new additonal new photo
       $('.btn-additionalnewphoto').on('click', function(e){
        //alert('click');
            e.preventDefault();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#newimguploads-error').html("");

            const user_id = document.querySelector('input[name=user_id]').value;
            console.log(user_id);

            const product_item = document.querySelector('input[name=product_item]').value;
            console.log(product_item);

            const sub_product_id = document.querySelector('input[name=sub_product_id]').value;
            console.log(sub_product_id);

            const id = document.querySelector('input[name=id]').value;
            console.log(id);

            const oFile = document.getElementById("newimage_name").files[0];


            function validateSize1(){
                if($("#newimage_name").val() === ""){
                    $($("#newimage_name")).addClass("is-invalid");
                    $("#newimguploads-error").html("Required Image Upload");
                    $("#newimguploads-error").css({"color" : "red", "font-size" : "14px"});
                    $("#newimguploads2-error").hide();
                  return false;
                }else if (oFile.size > 5242880) {//kb equal mb 5120 only max (5MB)
                      $($("#newimage_name")).addClass("is-invalid");
                        $("#newimguploads2-error").html('File size must under or maximum 5MB only');
                       $("#newimguploads2-error").css({"color" : "red", "font-size" : "14px"});
                       $("#newimguploads-error").hide();
                       $("#newimguploads2-error").show();

                     return false;
                      } else {
                       $("#newimage_name").removeClass("is-invalid").addClass("is-valid");
                       $("#newimguploads-error").html("");
                       $("#newimguploads2-error").html("");

                        return true;
                    }
                }


              validateSize1();

          if (validateSize1() === true) {


            var data = new FormData(this.form);
            var names = [];
                var file_data = $('#newimage_name')[0].files[0];
                for(var i = 0;i<file_data.length;i++){
                    data.append("newimage_name"+i, file_data[i]);
                }

            data.append('newimage_name[]',names);
            data.append('user_id', user_id);
            data.append('product_item', product_item);
            data.append('sub_product_id', sub_product_id);
            data.append('id', id);

            $.ajax({
                    url: '{{ route('user.uploadAdditionalImage') }}',
                    type:'POST',
                    data: data,
                    cache: false,
                    contentType:false,
                    processData:false,
                          beforeSend: function() {
                           var imgs = '<img src="{{ url("/assets/loading/ajax-loader.gif") }}" style="height: 20px; width: 20px;"/>';
                            $('.btn-additionalnewphoto').html(imgs + 'Loading...');
                            $(".btn-additionalnewphoto").prop('disabled', true).addClass("disabled");

                        },

                    success: function(response7){
                        if (response7.status7 == 200) {
                        toastr.success('Upload Additional Image successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-imguploadnew")[0].reset();

                      }


                }
            })

           }
        });
    //end upload new additonal new photo


       //submit submit chat message
       $('.btn-chatmessage').on('click', function(e){
          e.preventDefault();
        //   alert('click myaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


           $('#message-error').html("");


            const seller_id = document.querySelector('input[name=seller_id]').value;
            console.log(seller_id);

            const buyer_id = document.querySelector('input[name=buyer_id]').value;
            console.log(buyer_id);

            const message = document.querySelector('textarea[name=message]').value;
            console.log(message);

            const email = document.querySelector('input[name=email]').value;
            console.log(email);

            $.ajax({

            url:'{{ route("user.submitchatmessage") }}',
            type:'post',
                data:{
                    seller_id: seller_id,
                    buyer_id: buyer_id,
                    message: message,
                    email: email
                },
                dataType:'json',
                success:function (res7) {
                 if (res7.status == 200) {
                        toastr.success('Submit Message Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-mychat")[0].reset();

                    }

                    if(res7.errors) {

                      if(res7.errors.message){
                            $('#message-error').html(res7.errors.message[0]);
                            $(".tArea").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $(".tArea").removeClass("is-invalid").addClass("is-valid");

                        }

                    if(res7.errors) {
                         console.log(res7.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }

                    }
                }
             });
          });
       //end submit chat message


    //submit submit reply message
    $('.btn-replymessage').on('click', function(e){
          e.preventDefault();
        //   alert('click myaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


           $('#message2-error').html("");


            const id = document.querySelector('input[name=edit_id]').value;
            console.log(id);

            const seller_id = document.querySelector('input[name=seller_id]').value;
            console.log(seller_id);

            const reply = document.querySelector('textarea[name=reply]').value;
            console.log(reply);

            $.ajax({

            url:'{{ route("user.submitreplymessage") }}',
            type:'post',
                data:{
                    id: id,
                    seller_id: seller_id,
                    reply: reply
                },
                dataType:'json',
                success:function (res8) {
                 if (res8.status == 200) {
                        toastr.success('Submit Reply Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form1-mychat")[0].reset();

                    }

                    if(res8.errors) {

                      if(res8.errors.reply){
                            $('#message2-error').html(res8.errors.reply[0]);
                            $(".tArea").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $(".tArea").removeClass("is-invalid").addClass("is-valid");

                        }

                    if(res8.errors) {
                         console.log(res8.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }

                    }
                }
             });
          });
       //end submit reply message

     //submit message or feedback
     $('.btn-submitmessage').on('click', function(e){
          e.preventDefault();
        //   alert('click myaccount');
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });


         $('#message-error').html("");


            const profile_user = document.querySelector('input[name=profile_user]').value;
            console.log(profile_user);

            const full_name = document.querySelector('input[name=full_name]').value;
            console.log(full_name);

            const user_id = document.querySelector('input[name=user_id]').value;
            console.log(user_id);

            const category_id = document.querySelector('input[name=category_id]').value;
            console.log(category_id);

            const sub_category_id = document.querySelector('input[name=sub_category_id]').value;
            console.log(sub_category_id);

            const article_id = document.querySelector('input[name=article_id]').value;
            console.log(article_id);

            const product_id = document.querySelector('input[name=product_id]').value;
            console.log(product_id);

            const sub_product_id = document.querySelector('input[name=sub_product_id]').value;
            console.log(sub_product_id);

            const product_item = document.querySelector('input[name=item_name]').value;
            console.log(product_item);

            const email = document.querySelector('input[name=email]').value;
            console.log(email);

            const mobile = document.querySelector('input[name=mobile]').value;
            console.log(mobile);

            const message = document.querySelector('input[name=message]').value;
            console.log(message);

            $.ajax({

            url:'{{ route("user.submitmessage") }}',
            type:'post',
                data:{
                    profile_user: profile_user,
                    full_name: full_name,
                    user_id: user_id,
                    category_id: category_id,
                    sub_category_id: sub_category_id,
                    article_id: article_id,
                    product_id: product_id,
                    sub_product_id: sub_product_id,
                    product_item: product_item,
                    email: email,
                    mobile: mobile,
                    message: message,

                },
                dataType:'json',
                success:function (res4) {
                 if (res4.status == 200) {
                        toastr.success('Submit Message Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                        setTimeout(function () {
                           location.reload(true);
                         }, 1500);
                        $("#form-myaccount")[0].reset();

                    }

                    if(res4.errors) {

                        if(res4.errors.subject){
                            $('#subject-error').html(res4.errors.subject[0]);
                            $(".subject").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $(".subject").removeClass("is-invalid").addClass("is-valid");

                        }

                      if(res4.errors.message){
                            $('#message-error').html(res4.errors.message[0]);
                            $(".message").removeClass("is-valid").addClass("is-invalid");

                        }else{
                            $(".message").removeClass("is-invalid").addClass("is-valid");

                        }

                    if(res4.errors) {
                         console.log(res4.errors);
                        //  $('#form-id').animate({ scrollTop: 0 }, 'slow');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                       }

                    }
                }
             });
          });
       //end submit message or feedback

    function submit() {
            const form = document.querySelector("form");
            form.addEventListener('submit', function(event) {
            event.preventDefault();
            // Your form submission logic here
        });
    }

    });
 </script>
 {{--end add form product items step 2 to 2 --}}
{{-- for category section with all items select --}}
<script>
    $(document).ready(function() {
      $('.btn-clicks').on('click', function(event){
          event.preventDefault();
         const id =  this.getAttribute('cat-id');
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

              $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.postoptionfunction') }}',
                    success: function (res) {
                            setTimeout(function () {
                                window.location.href = '{{URL::to("/user/mpingi-users/users/post-options-process")}}/'+res.data;
                         }, 1500);


                    }

         });
      });

         //colapse middle colapse
         document.querySelectorAll('.accordion').forEach(el => {
            el.addEventListener('click', e => {
                let accordion = e.target;
                accordion.classList.toggle('active');
                accordion.parentElement.nextElementSibling.classList.toggle('show');
            });
        });

     //end middle colapse


    //  collapse left sidebar menu

    document.querySelectorAll('#button_to_trigger_collapse').forEach(el => {
            el.addEventListener('click', e => {
                let accordion = e.target;
                accordion.classList.toggle('.panelx2');
                accordion.parentElement.nextElementSibling.classList.toggle('show');
            });
        });

   });
</script>
{{--end for category section with all items select --}}

<script>
    $(document).ready(function() {

        //fade in,out,zoom,etc...
        AOS.init();
        //end fade in,out,zoom,etc...

        //getId from country show into state
        $('.country-dropdown1').change(function () {
            var id = $(this).val();

            $('.state-dropdown1').find('option').not(':first').remove();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajaxSetup({
            beforeSend: function() {

                    var emptyvalue = '<option value=""> Please Wait...</option>';
                    $(".state-dropdown1").html(emptyvalue);
            },
        });

            $.ajax({
            url:'{{URL::to("/mpingiusers/get-states-by-country-cat")}}/'+id,
            type:'get',
            dataType:'json',
            success:function (response) {
                $(".state-dropdown1").empty();
                var len = 0;
                if (response.data != null) {
                    len = response.data.length;
                }

                if (len>0) {
                    for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $(".state-dropdown1").append(option);

                    }
                }
            }
            })
        });

        //end getId from country show into state

        //getId from state show into city

        $('.state-dropdown1').change(function () {
            var id = $(this).val();

            $('.city-dropdown1').find('option').not(':first').remove();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajaxSetup({
            beforeSend: function() {

                    var emptyvalue = '<option value=""> Please Wait...</option>';
                    $(".city-dropdown1").html(emptyvalue);
            },
        });

            $.ajax({
            url:'{{URL::to("/mpingiusers/get-states-by-state-cat")}}/'+id,
            type:'get',
            dataType:'json',
            success:function (response) {
                $(".city-dropdown1").empty();
                var len = 0;
                if (response.data != null) {
                    len = response.data.length;
                }

                if (len>0) {
                    for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $(".city-dropdown1").append(option);
                    }
                }
            }
            });

        });

        //end getId from state show into city

        //header fixed scroll

        window.onscroll = function() {
        myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }

        //end header fixed scroll

        //for all tooltip
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        //end for all tooltip


       //end for searching data available jobseekers


          //for remove card as temporary
        $('.close-icon1').on('click',function() {
            $(this).closest('.card1').fadeOut();
        });
        $('.close-icon2').on('click',function() {
            $(this).closest('.card2').fadeOut();
        });
        $('.close-icon3').on('click',function() {
            $(this).closest('.card3').fadeOut();
        });
        $('.close-icon4').on('click',function() {
            $(this).closest('.card4').fadeOut();
        });
        $('.close-icon5').on('click',function() {
            $(this).closest('.card5').fadeOut();
        });
        $('.close-icon6').on('click',function() {
            $(this).closest('.card6').fadeOut();
        });
        $('.close-icon7').on('click',function() {
            $(this).closest('.card7').fadeOut();
        });
        $('.close-icon8').on('click',function() {
            $(this).closest('.card8').fadeOut();
        });
        $('.close-icon9').on('click',function() {
            $(this).closest('.card9').fadeOut();
        });
        $('.close-icon10').on('click',function() {
            $(this).closest('.card10').fadeOut();
        });
        $('.close-icon11').on('click',function() {
            $(this).closest('.card11').fadeOut();
        });

        //end for remove card as temporary

    //      //for pagination
    //      $(document).on('click','.pagination a', function(e){
    //         e.preventDefault();
    //         $('#dynamic_content').html(make_skeleton())
    //         let page = $(this).attr('href').split('page=')[1]
    //         setTimeout(function() {
    //                     record(page)
    //             }, 1500);
    //         })

    //         function make_skeleton() {
    //             var output = '';
    //             for (var count = 0; count < 12; count++) {
    //                 output += '<div class="col-4">';
    //                 output += '<div class="ph-item">';
    //                 output += '<div class="ph-col-12">';
    //                 output += '<div class="ph-picture"></div>';
    //                 output += '<div class="ph-row">';
    //                 output += '<div class="ph-col-6 big"></div>';
    //                 output += '<div class="ph-col-4 empty big"></div>';
    //                 output += '<div class="ph-col-12"></div>'
    //                 output += '<div class="ph-col-12"></div>'
    //                 output += '</div>';
    //                 output += '</div>';
    //                 output += '</div>';
    //                 output += '</div>';
    //             }
    //             return output;
    //         }

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         function record(page, limit){
    //             $.ajax({
    //                 url:"/user/mpingi-users/users/ajax-paginate?page="+page,
    //                 data: {
    //                         limit: limit
    //                 },
    //                 success:function(res){
    //                     $('.table-data').html(res);
    //                 }
    //             })
    //         //}, 300);
    //       }

    //     //end pagination

    //     // for searching data
    //     var query = $('#search_input').val();
    //     fetch_customer_data(query);

    //     $(document).on('keyup', '#search_input', function(){
    //         var query = $(this).val();
    //         if(query == ''){
    //             record();
    //         }
    //         fetch_customer_data(query);
    //     });
    //     $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //     function fetch_customer_data(query = '') {
    //         $.ajax({
    //         url:"{{ route('getSearchdataUser') }}",
    //         method:'GET',
    //         data:{query:query},
    //         dataType:'json',
    //         success:function(data) {

    //             $('#dynamic_content').html(data.table_data);
    //             $('#total_records').css('display','block');
    //         // $('#total_records').html('Total Items: <span class="badge rounded-pill bg-primary">'+ data.total_data +'</span>');
    //         }
    //         })
    //     }

    //    //end for searching data

    //   //for per page

    //     $(document).on('change', '#search_page',function(){
    //         var pages = $(this).val();
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $('#dynamic_content').html(make_skeleton())

    //             setTimeout(function() {
    //                     record()
    //             }, 1500);

    //             function make_skeleton() {
    //                 var output = '';
    //                 for (var count = 0; count < 12; count++) {
    //                     output += '<div class="col-4">';
    //                     output += '<div class="ph-item">';
    //                     output += '<div class="ph-col-12">';
    //                     output += '<div class="ph-picture"></div>';
    //                     output += '<div class="ph-row">';
    //                     output += '<div class="ph-col-6 big"></div>';
    //                     output += '<div class="ph-col-4 empty big"></div>';
    //                     output += '<div class="ph-col-12"></div>'
    //                     output += '<div class="ph-col-12"></div>'
    //                     output += '</div>';
    //                     output += '</div>';
    //                     output += '</div>';
    //                     output += '</div>';
    //                 }
    //               return output;
    //          }
    //        function record(limit){
    //             $.ajax({
    //                 type:'GET',
    //                 url:"{{ route('getPageUser') }}",
    //                 data:{'pages':pages, limit: limit},
    //                 success:function(data){
    //                     $('.table-data').html(data);

    //                 }
    //             });
    //         }

    //     });

    //     //end for per page


  // carousel
   var myCarousel = document.querySelector('#myCarousels')
        var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 3000,
        wrap: false
     })

     var myCarousel2 = document.querySelector('#myCarousels2')
        var carousel = new bootstrap.Carousel(myCarousel2, {
        interval: 3000,
        wrap: false
     })
    // end carousel


     $(document).ready(function(){
        $('.carousel-item:first-of-type').addClass('active');
    });



     $(window).scroll(function() {
            // scrollTbelow is not a function - changed to scrollTbelow
            if ($(this).scrollTop() < 5) {
                $('.d-lg-none').fadeIn();
            } else {
                $('.d-lg-none').fadeOut();
            }
        }).trigger('scroll');

     // scrollTop
      $(window).scroll(function() {
            // scrollToTop is not a function - changed to scrollTop
            if ($(this).scrollTop() > 75) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        }).trigger('scroll');
      //end scrollTop



   });




</script>

<script>
    // mobile navigation
      function clickFunction() {
              var para = document.getElementById("toggle-icon");
                  para.classList.toggle("rotate-icon");
              }
              function darken_screen(yesno){
                  if( yesno == true ){
                      document.querySelector('.screen-darken').classList.add('active');
                  }
                  else if(yesno == false){
                      document.querySelector('.screen-darken').classList.remove('active');
                  }
              }

              function close_offcanvas(){
                  darken_screen(false);
                  document.querySelector('.mobile-offcanvas.show').classList.remove('show');
                  document.body.classList.remove('offcanvas-active');
              }

              function show_offcanvas(offcanvas_id){
                  darken_screen(true);
                  document.getElementById(offcanvas_id).classList.add('show');
                  document.body.classList.add('offcanvas-active');
              }

              document.addEventListener("DOMContentLoaded", function(){
                  document.querySelectorAll('[data-trigger]').forEach(function(everyelement){

                      let offcanvas_id = everyelement.getAttribute('data-trigger');

                      everyelement.addEventListener('click', function (e) {
                          e.preventDefault();
                          show_offcanvas(offcanvas_id);

                      });
                  });

                  document.querySelectorAll('.btn-close').forEach(function(everybutton){

                      everybutton.addEventListener('click', function (e) {
                          e.preventDefault();
                          close_offcanvas();
                      });
                  });

                  document.querySelector('.screen-darken').addEventListener('click', function(event){
                      close_offcanvas();
                  });
                  //end canva


              });
       //end mobile navigation

          // show password
        //   document.getElementById("click-check").addEventListener("click", myFunction);
        //         function myFunction() {
        //             var x = document.getElementById("myInput2");
        //             if (x.type === "password") {
        //                 x.type = "text";
        //             } else {
        //                 x.type = "password";
        //             }
        //     }

</script>

<script>
    // faq accordion
    var acc = document.getElementsByClassName("_accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        this.parentElement.classList.toggle("active");

        var pannel = this.nextElementSibling;

        if (pannel.style.display === "block") {
          pannel.style.display = "none";
        } else {
          pannel.style.display = "block";
        }
      });
    }
      // faq accordion

</script>

{{-- disable input type when select checkbox business logo form --}}
<script>
    $(document).ready(function () {

     $('#check1').change(function () {
          $('#department').prop("disabled", this.checked);
        });

        $('#check2').change(function () {
          $('#job_title').prop("disabled", this.checked);
        });

        $('#check3').change(function () {
          $('#business_description').prop("disabled", this.checked);
        });

        $('#check4').change(function () {
          $('#po_box').prop("disabled", this.checked);
        });

        $('#check5').change(function () {
          $('#email_address').prop("disabled", this.checked);
        });

        $('#check6').change(function () {
          $('#website').prop("disabled", this.checked);
        });

        //////////////////////////////////////////////////

        $('#checkName').change(function () {
          $('#other_name').prop("disabled", this.checked);
        });

        $('#checkLName').change(function () {
          $('#last_name').prop("disabled", this.checked);
        });

        $('#checkNoBox').change(function () {
          $('#nopo_box').prop("disabled", this.checked);
        });

        $('#checkTelephone').change(function () {
          $('#NoTelephone').prop("disabled", this.checked);
        });


        $('#checkNoAddress').change(function () {
          $('#no_address').prop("disabled", this.checked);
        });


        //////////////////////////////////////////////

        $('#check1ShopMoto').change(function () {
          $('#shop_moto').prop("disabled", this.checked);
        });

        $('#check1NoDescription').change(function () {
          $('#no_description').prop("disabled", this.checked);
        });

        $('#check1Dept').change(function () {
          $('#no_dept').prop("disabled", this.checked);
        });

        $('#check1NoJob').change(function () {
          $('#no_jobtitle').prop("disabled", this.checked);
        });

        $('#check3Fax').change(function () {
          $('#no_fax').prop("disabled", this.checked);
        });

        $('#check3PBox').change(function () {
          $('#p_box').prop("disabled", this.checked);
        });

        $('#check3No').change(function () {
          $('#no').prop("disabled", this.checked);
        });


        /////////////////////////for fill up step 2//////////////////
        $('#checkWebsiteName1').change(function () {
          $('#maploc').prop("disabled", this.checked);
        });

        $('#checkMaplocation').change(function () {
          $('#sitename1').prop("disabled", this.checked);
        });


        $('#checkWebsiteName').change(function () {
          $('#sitename').prop("disabled", this.checked);
        });

        $('#checkWebsiteLink').change(function () {
          $('#sitelink').prop("disabled", this.checked);
        });

        $('#checkOldprice').change(function () {
          $('#oldprice').prop("disabled", this.checked);
        });

        $('#checkNoWeight').change(function () {
          $('#NoWeight').prop("disabled", this.checked);
        });

        $('#checkNoVolume').change(function () {
          $('#NoVolume').prop("disabled", this.checked);
        });

        // basiclistingindustries form

        $('#checkWebsitepName').change(function () {
          $('#pname').prop("disabled", this.checked);
        });

        $('#checkPurchaseName').change(function () {
          $('#purchasing_name').prop("disabled", this.checked);
        });

        $('#checkAdverName').change(function () {
          $('#advertising_name').prop("disabled", this.checked);
        });

        $('#checkMarketingName').change(function () {
          $('#marketing_name').prop("disabled", this.checked);
        });

        $('#checkSalesName').change(function () {
          $('#sales_name').prop("disabled", this.checked);
        });

        $('#checkEngineeringName').change(function () {
          $('#engineering_name').prop("disabled", this.checked);
        });


    });
</script>
{{--end disable input type when select checkbox business logo form --}}

<script>
    $(function(){
		$('#rect-checkbox > input').nicelabel();
		$('#rect-radio > input').nicelabel();
		$('#circle-checkbox > input').nicelabel();
		$('#circle-radio > input').nicelabel();
		$('#text-checkbox > input').nicelabel();
		$('#text-radio > input').nicelabel();
		$('#text-checkbox-ico > input:eq(0)').nicelabel({
			checked_ico: '{{ asset("assets/ico/checked.png") }}',
			unchecked_ico: '{{ asset("assets/ico/unchecked.png") }}'
		});
		$('#text-checkbox-ico > input:eq(1)').nicelabel({
			checked_ico: '{{ asset("assets/ico/checked.png") }}',
			unchecked_ico: '{{ asset("assets/ico/unchecked.png") }}'
		});
		$('#text-checkbox-ico > input:eq(2)').nicelabel({
			checked_ico: '{{ asset("assets/ico/checked.png") }}',
			unchecked_ico: '{{ asset("assets/ico/unchecked.png") }}'
		});
		$('#text-checkbox-ico > input:eq(3)').nicelabel({
			uselabel: false
		});

	});
</script>
<script>
    // switch on and off toggle
 $(function(){
    var switchStatus = false;
        $("#checktoggle").on('change', function() {
            if ($(this).is(':checked')) {
                document.getElementById("on").checked=true;
                document.getElementById("off").checked=false;
            }
            else {
                document.getElementById("off").checked=true;
                document.getElementById("on").checked=false;
            }
        });

    });
       //end switch on and off toggle
</script>
<script>
    // count text limit 500 contact us
      let limitChar = (element) => {
       const maxChar = 100;

       let ele = document.getElementById(element.id);
       let charLen = ele.value.length;

       let p = document.getElementById('charCounter1');
      var output = p.innerHTML = maxChar - charLen;

       if (charLen > maxChar)
       {
           ele.value = ele.value.substring(0, maxChar);
           $('#charCounter1').output = 0;
       }
    }
      //end count text limit 500 contact us
</script>
<script>
    // count text limit 500 contact us
      let limitChar2 = (element) => {
       const maxChar = 100;

       let ele = document.getElementById(element.id);
       let charLen = ele.value.length;

       let p = document.getElementById('charCounter');
      var output = p.innerHTML = maxChar - charLen;

       if (charLen > maxChar)
       {
           ele.value = ele.value.substring(0, maxChar);
           $('#charCounter').output = 0;
       }
    }
      //end count text limit 500 contact us
</script>

  <script>
    function autocomplete(inp, arr) {
      var currentFocus;
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          this.parentNode.appendChild(a);
          for (i = 0; i < arr.length; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              b = document.createElement("DIV");
              b.innerHTML = "<strong style='color:#ff7519'>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              b.addEventListener("click", function(e) {
                  inp.value = this.getElementsByTagName("input")[0].value;
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
        });
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) { //up
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {

            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
          }
         }
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
          });
        }

        var nodept = ['Administrative', 'Communication', 'Customer','service', 'Engineering', 'Finance', 'HR', 'IT', 'Legal', 'Marketing', 'Operations', 'Professional services', 'R&D', 'Sales', 'Other'];
        autocomplete(document.getElementById("no_dept"), nodept);
</script>

     <script>
        function autocomplete(inp, arr) {
          var currentFocus;
          inp.addEventListener("input", function(e) {
              var a, b, i, val = this.value;
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              a = document.createElement("DIV");
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              this.parentNode.appendChild(a);
              for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                  b = document.createElement("DIV");
                  b.innerHTML = "<strong style='color:#ff7519'>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  b.addEventListener("click", function(e) {
                      inp.value = this.getElementsByTagName("input")[0].value;
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
            });
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    currentFocus++;
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    currentFocus--;
                    addActive(x);
                } else if (e.keyCode == 13) {
                    e.preventDefault();
                    if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                if (!x) return false;
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {

                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
              }
             }
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
              });
            }

            var nojobtitle = ['C-level', 'SVP / VP', 'Director', 'Manager', 'Staff', 'Student / intern', 'Other'];
            autocomplete(document.getElementById("no_jobtitle"), nojobtitle);
    </script>

<script>
    function autocomplete(inp, arr) {
      var currentFocus;
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          this.parentNode.appendChild(a);
          for (i = 0; i < arr.length; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              b = document.createElement("DIV");
              b.innerHTML = "<strong style='color:#ff7519'>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              b.addEventListener("click", function(e) {
                  inp.value = this.getElementsByTagName("input")[0].value;
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
        });
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) { //up
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {

            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
          }
         }
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
          });
        }

        var businesstype = ['Company', 'Shop', 'Enterprise', 'NGO', 'Supermarket', 'Mini Supermarket', 'Market', 'Mini Market', 'Restaurant', 'Shopping', 'mall', 'Hotel', 'Guest house', 'Petrol', 'station', 'Hospital', 'Pharmacy', 'Salon', 'Bar', 'Cyber café', 'Night club', 'Other'];
        autocomplete(document.getElementById("business_type"), businesstype);
    </script>

  {{-- <script>
    $(document).ready(function() {
	     setInterval(function() {
		$("#screen").load();
        }, 4000);
    });
  </script> --}}

  <script>

    const delivery = document.querySelector('#delivery');
    const adjustableHeight2_2 = document.querySelector('#adjustableHeight2_2');


    delivery.addEventListener('change', adjustableHeightCheck1_1);
    adjustableHeight2_2.addEventListener('change', adjustableHeightCheck2_2);


        function adjustableHeightCheck1_1() {
        if (document.getElementById("delivery").checked) {
                 document.getElementById("max-height_1").style.display = "none";
            }
        }

        function adjustableHeightCheck2_2() {
        if (document.getElementById("adjustableHeight2_2").checked) {
              document.getElementById("max-height_1").style.display = "block";
              document.getElementById("max-height_2").style.display = "block";
            }
        }

    //calculate qty * price
        function updateInput(value) {
           let qty = document.getElementById("quantity").value;
           let price = document.getElementById("price").value;
           var sub = qty * price;
            document.getElementById('subtotal').value = sub;

        }
    </script>


  <script>

    const adjustableHeight1 = document.querySelector('#adjustableHeight1');
    const adjustableHeight2 = document.querySelector('#adjustableHeight2');
    const adjustableHeight3 = document.querySelector('#adjustableHeight3');

    adjustableHeight1.addEventListener('change', adjustableHeightCheck1);
    adjustableHeight2.addEventListener('change', adjustableHeightCheck2);
    adjustableHeight3.addEventListener('change', adjustableHeightCheck3);

        function adjustableHeightCheck1() {
        if (document.getElementById("adjustableHeight1").checked) {
                 document.getElementById("max-height").style.display = "none";
                 document.getElementById("max-height1").style.display = "none";
            } else {
                 document.getElementById("max-height").style.display = "none";
                 document.getElementById("max-height1").style.display = "none";

            }
        }

        function adjustableHeightCheck2() {
        if (document.getElementById("adjustableHeight2").checked) {
            document.getElementById("max-height").style.display = "block";
            document.getElementById("max-height1").style.display = "block";
            } else {
                document.getElementById("max-height").style.display = "none";
                document.getElementById("max-height1").style.display = "none";

            }
        }


        function adjustableHeightCheck3() {
        if (document.getElementById("adjustableHeight3").checked) {
                 document.getElementById("max-height").style.display = "none";
                 document.getElementById("max-height1").style.display = "none";
            } else {
                 document.getElementById("max-height").style.display = "none";
                 document.getElementById("max-height1").style.display = "none";

            }
        }
    </script>

<script>
    $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".alerts").fadeTo(1000, 0).slideUp(1000, function() {
                    $(this).remove();
                });
            }, 1500);
        });
</script>
 <script type="text/javascript" language="javascript">
    var input = document.getElementById('image_name');
    input.addEventListener('change', handleFiles);

    function handleFiles(e) {
        var files = input.files;
        $('#uploadmgs').html('<div class="alert alert-info" role="alert">Upload image number <strong>'+ files.length + '</strong></div>');

    }
 </script>

<script type="text/javascript" language="javascript">
    var input2 = document.getElementById('newimage_name');
    input2.addEventListener('change', handleFiles);

    function handleFiles(e) {
        var files2 = input2.files;
        $('#uploadmgs2').html('<div class="alert alert-info" role="alert">Upload image number <strong>'+ files2.length + '</strong></div>');

    }
 </script>

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-cancelproductitem', function(e) {
                e.preventDefault();
            let id = $(this).data('can');

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure you want cancel this order?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    reverseButtons: !0
                }).then(function (e) {

            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.cancelproduct') }}',
                    success: function (res1) {
                        if (res1.status == 200) {
                            toastr.success('Cancel Product item Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);

                        }
                    }

                 });
               }
             }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-deleteIndustrylogo', function(e) {
                e.preventDefault();
            let id = $(this).data('del');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure to delete this Industry Item?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (e) {

            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.deleteIndustrylogo') }}',
                    success: function (res1) {
                        if (res1.status == 200) {
                            toastr.success('Delete Industry logo Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);

                        }
                    }

                 });
               }
             }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-deleteServicelogo', function(e) {
                e.preventDefault();
            let id = $(this).data('del');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure to delete this Service Item?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (e) {

            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.deleteServicelogo') }}',
                    success: function (res1) {
                        if (res1.status == 200) {
                            toastr.success('Delete Service logo Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);

                        }
                    }

                 });
               }
             }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-deleteJoblogo', function(e) {
                e.preventDefault();
            let id = $(this).data('del');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure to delete this Job Item?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (e) {

            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.deleteJoblogo') }}',
                    success: function (res1) {
                        if (res1.status == 200) {
                            toastr.success('Delete Job logo Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);

                        }
                    }

                 });
               }
             }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-deleteproductitem', function(e) {
                e.preventDefault();
            let id = $(this).data('del');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure to delete this product?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                }).then(function (e) {

            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.deletepostoptionInsertDatafromform') }}',
                    success: function (res1) {
                        if (res1.status == 200) {
                            toastr.success('Delete Product item Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);

                        }
                    }

                 });
               }
             }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
{{-- <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor2').ckeditor();
    });
</script> --}}

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-alert', function(e) {
                e.preventDefault();
            let id = $(this).data('del');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "you have already used the free 10 posts you can contact the admin just click the button below",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Proceed",
                    cancelButtonText: "Cancel",
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                       window.location.href = '{{URL::to("/user/mpingi-users/users/contact/admin")}}';
                    }
                 }, function (dismiss) {
            return false;
         });

       });
      }

   });

   $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-alert2', function(e) {
                e.preventDefault();
            let id = $(this).data('del');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "you have already used the free 10 posts you can contact the admin just click the button below",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Proceed",
                    cancelButtonText: "Cancel",
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                       window.location.href = '{{URL::to("/user/mpingi-users/users/contact/admin")}}';
                    }
                 }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>

<script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-changestatus', function(e) {
                e.preventDefault();
            let id = $(this).data('cid');
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure, you want to change the Available to Sold?",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "Cancel",
                    reverseButtons: !0
                }).then(function (e) {

            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: {
                            id: id,
                        },
                    dataType: 'json',
                    url: '{{ route('user.updatedisponibility') }}',
                    success: function (res3) {
                        if (res3.status == 200) {
                            toastr.success('Update Disponibility Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function () {
                              location.reload(true);
                            }, 1500);

                        }
                    }

                 });
               }
             }, function (dismiss) {
            return false;
         });

        });
      }

   });

</script>
<script>
    // count text limit 500 contact us
      let limitCharx = (element) => {
       const maxChar = 500;

       let ele = document.getElementById(element.id);
       let charLen = ele.value.length;

       let p = document.getElementById('charCounterx');
      var output = p.innerHTML = maxChar - charLen;

       if (charLen > maxChar)
       {
           ele.value = ele.value.substring(0, maxChar);
           $('#charCounterx').output = 0;
       }
    }
      //end count text limit 500 contact us
</script>
<script>
    function calculate(form){
         var txt1 = form.quantity.value;
        var txt2 = form.price.value;
        var txt3 = form.shipping.value;
        var txt4 = parseFloat(txt1) * parseFloat(txt2) + parseFloat(txt3);
        var txt5 = parseFloat(txt1) * parseFloat(txt2);
        form.total_delivery.value = parseFloat(txt4).toFixed(2);
        form.total_pickup.value = parseFloat(txt5).toFixed(2);
    }
</script>

<script>
    $("#currency").change(function () {

           if ($("#currency").val() == "UGX") {
               $("#textchange").text("UGX (USh)");

            } else if ($("#currency").val() == "AED"){
              $("#textchange").text("AED ()");

            } else if ($("#currency").val() == "AFN"){
              $("#textchange").text("AFN (؋)");

            } else if ($("#currency").val() == "ALL"){
              $("#textchange").text("ALL (Lek)");

            } else if ($("#currency").val() == "AMD"){
              $("#textchange").text("AMD ()");

            } else if ($("#currency").val() == "ANG"){
              $("#textchange").text("ANG (ƒ)");

            } else if ($("#currency").val() == "AOA"){
              $("#textchange").text("AOA (Kz)");

            } else if ($("#currency").val() == "ARS"){
              $("#textchange").text("ARS ($)");

            } else if ($("#currency").val() == "AUD"){
              $("#textchange").text("AUD ($)");

            } else if ($("#currency").val() == "AWG"){
              $("#textchange").text("AWG (ƒ)");

            } else if ($("#currency").val() == "AZN"){
              $("#textchange").text("AZN (ман)");

            } else if ($("#currency").val() == "BAM"){
              $("#textchange").text("BAM (KM)");

            } else if ($("#currency").val() == "BBD"){
              $("#textchange").text("BBD ($)");

            } else if ($("#currency").val() == "BDT"){
              $("#textchange").text("BDT ()");

            } else if ($("#currency").val() == "BGN"){
              $("#textchange").text("BGN (лв)");

            } else if ($("#currency").val() == "BHD"){
              $("#textchange").text("BHD ()");

            } else if ($("#currency").val() == "BIF"){
              $("#textchange").text("BIF (FBu)");

            } else if ($("#currency").val() == "BMD"){
              $("#textchange").text("BMD ($)");

            } else if ($("#currency").val() == "BND"){
              $("#textchange").text("BND ($)");

            } else if ($("#currency").val() == "BOB"){
              $("#textchange").text("BOB ($b)");

            } else if ($("#currency").val() == "BRL"){
              $("#textchange").text("BRL (R$)");

            } else if ($("#currency").val() == "BSD"){
              $("#textchange").text("BSD ($)");

            } else if ($("#currency").val() == "BTN"){
              $("#textchange").text("BTN ()");

            } else if ($("#currency").val() == "BWP"){
              $("#textchange").text("BWP (P)");

            } else if ($("#currency").val() == "BYR"){
              $("#textchange").text("BYR (p.)");

            } else if ($("#currency").val() == "BZD"){
              $("#textchange").text("BZD (BZ$)");

            } else if ($("#currency").val() == "CAD"){
              $("#textchange").text("CAD ($)");

            } else if ($("#currency").val() == "CDF"){
              $("#textchange").text("CDF (CDF)");

            } else if ($("#currency").val() == "CHF"){
              $("#textchange").text("CHF (CHF)");

            } else if ($("#currency").val() == "CLP"){
              $("#textchange").text("CLP ($)");

            } else if ($("#currency").val() == "CNY"){
              $("#textchange").text("CNY (¥)");

            } else if ($("#currency").val() == "COP"){
              $("#textchange").text("COP ($)");

            } else if ($("#currency").val() == "CRC"){
              $("#textchange").text("CRC (₡)");

            } else if ($("#currency").val() == "CUP"){
              $("#textchange").text("CUP (₱)");

            } else if ($("#currency").val() == "CVE"){
              $("#textchange").text("CVE ()");

            } else if ($("#currency").val() == "CYP"){
              $("#textchange").text("CYP ()");

            } else if ($("#currency").val() == "CZK"){
              $("#textchange").text("CZK (Kč)");

            } else if ($("#currency").val() == "DJF"){
              $("#textchange").text("DJF ()");

            } else if ($("#currency").val() == "DKK"){
              $("#textchange").text("DKK (kr)");

            } else if ($("#currency").val() == "DOP"){
              $("#textchange").text("DOP (RD$)");

            } else if ($("#currency").val() == "DZD"){
              $("#textchange").text("DZD (دج)");

            } else if ($("#currency").val() == "EEK"){
              $("#textchange").text("EEK (kr)");

            } else if ($("#currency").val() == "EGP"){
              $("#textchange").text("EGP (£)");

            } else if ($("#currency").val() == "ERN"){
              $("#textchange").text("ERN (Nfk)");

            } else if ($("#currency").val() == "ETB"){
              $("#textchange").text("ETB (ETB)");

            } else if ($("#currency").val() == "EUR"){
              $("#textchange").text("EUR (€)");

            } else if ($("#currency").val() == "FJD"){
              $("#textchange").text("FJD ($)");

            } else if ($("#currency").val() == "FKP"){
              $("#textchange").text("FKP (£)");

            } else if ($("#currency").val() == "GBP"){
              $("#textchange").text("GBP (£)");

            } else if ($("#currency").val() == "GEL"){
              $("#textchange").text("GEL ()");

            } else if ($("#currency").val() == "GHC"){
              $("#textchange").text("GHC (¢)");

            } else if ($("#currency").val() == "GIP"){
              $("#textchange").text("GIP (£)");

            } else if ($("#currency").val() == "GMD"){
              $("#textchange").text("GMD (D)");

            } else if ($("#currency").val() == "GNF"){
              $("#textchange").text("GNF ()");

            } else if ($("#currency").val() == "GTQ"){
              $("#textchange").text("GTQ (Q)");

            } else if ($("#currency").val() == "GYD"){
              $("#textchange").text("GYD ($)");

            } else if ($("#currency").val() == "HKD"){
              $("#textchange").text("HKD ($)");

            } else if ($("#currency").val() == "HNL"){
              $("#textchange").text("HNL (L)");

            } else if ($("#currency").val() == "HRK"){
              $("#textchange").text("HRK (kn)");

            } else if ($("#currency").val() == "HTG"){
              $("#textchange").text("HTG (G)");

            } else if ($("#currency").val() == "HUF"){
              $("#textchange").text("HUF (Ft)");

            } else if ($("#currency").val() == "IDR"){
              $("#textchange").text("IDR (Rp)");

            } else if ($("#currency").val() == "ILS"){
              $("#textchange").text("ILS (₪)");

            } else if ($("#currency").val() == "INR"){
              $("#textchange").text("INR (₹)");

            } else if ($("#currency").val() == "IQD"){
              $("#textchange").text("IQD ()");

            } else if ($("#currency").val() == "IRR"){
              $("#textchange").text("IRR (﷼)");

            } else if ($("#currency").val() == "ISK"){
              $("#textchange").text("ISK (kr)");

            } else if ($("#currency").val() == "JMD"){
              $("#textchange").text("JMD ($)");

            } else if ($("#currency").val() == "JOD"){
              $("#textchange").text("JOD ()");

            } else if ($("#currency").val() == "JPY"){
              $("#textchange").text("JPY (¥)");

            } else if ($("#currency").val() == "KES"){
              $("#textchange").text("KES ()");

            } else if ($("#currency").val() == "KGS"){
              $("#textchange").text("KGS (лв)");

            } else if ($("#currency").val() == "KHR"){
              $("#textchange").text("KHR (៛)");

            } else if ($("#currency").val() == "KMF"){
              $("#textchange").text("KMF ()");

            } else if ($("#currency").val() == "KPW"){
              $("#textchange").text("KPW (₩)");

            } else if ($("#currency").val() == "KRW"){
              $("#textchange").text("KRW (₩)");

            } else if ($("#currency").val() == "KWD"){
              $("#textchange").text("KWD ()");

            } else if ($("#currency").val() == "KYD"){
              $("#textchange").text("KYD ($)");

            } else if ($("#currency").val() == "KZT"){
              $("#textchange").text("KZT (лв)");

            } else if ($("#currency").val() == "LAK"){
              $("#textchange").text("LAK (₭)");

            } else if ($("#currency").val() == "LBP"){
              $("#textchange").text("LBP (£)");

            } else if ($("#currency").val() == "LKR"){
              $("#textchange").text("LKR (₨)");

            } else if ($("#currency").val() == "LRD"){
              $("#textchange").text("LRD ($)");

            } else if ($("#currency").val() == "LSL"){
              $("#textchange").text("LSL (L)");

            } else if ($("#currency").val() == "LTL"){
              $("#textchange").text("LTL (Lt)");

            } else if ($("#currency").val() == "LVL"){
              $("#textchange").text("LVL (Ls)");

            } else if ($("#currency").val() == "LYD"){
              $("#textchange").text("LYD ()");

            } else if ($("#currency").val() == "MAD"){
              $("#textchange").text("MAD ()");

            } else if ($("#currency").val() == "MDL"){
              $("#textchange").text("MDL ()");

            } else if ($("#currency").val() == "MGA"){
              $("#textchange").text("MGA ()");

            } else if ($("#currency").val() == "MKD"){
              $("#textchange").text("MKD (ден)");

            } else if ($("#currency").val() == "MMK"){
              $("#textchange").text("MMK (K)");

            } else if ($("#currency").val() == "MNT"){
              $("#textchange").text("MNT (₮)");

            } else if ($("#currency").val() == "MOP"){
              $("#textchange").text("MOP (MOP)");

            } else if ($("#currency").val() == "MRO"){
              $("#textchange").text("MRO (UM)");

            } else if ($("#currency").val() == "MTL"){
              $("#textchange").text("MTL ()");

            } else if ($("#currency").val() == "MUR"){
              $("#textchange").text("MUR (₨)");

            } else if ($("#currency").val() == "MVR"){
              $("#textchange").text("MVR (Rf)");

            } else if ($("#currency").val() == "MWK"){
              $("#textchange").text("MWK (MK)");

            } else if ($("#currency").val() == "MXN"){
              $("#textchange").text("MXN ($)");

            } else if ($("#currency").val() == "MYR"){
              $("#textchange").text("MYR (RM)");

            } else if ($("#currency").val() == "MZN"){
              $("#textchange").text("MZN (MT)");

            } else if ($("#currency").val() == "NAD"){
              $("#textchange").text("NAD ($)");

            } else if ($("#currency").val() == "NGN"){
              $("#textchange").text("NGN (₦)");

            } else if ($("#currency").val() == "NIO"){
              $("#textchange").text("NIO (C$)");

            } else if ($("#currency").val() == "NOK"){
              $("#textchange").text("NOK (kr)");

            } else if ($("#currency").val() == "NPR"){
              $("#textchange").text("NPR (₨)");

            } else if ($("#currency").val() == "NZD"){
              $("#textchange").text("NZD ($)");

            } else if ($("#currency").val() == "OMR"){
              $("#textchange").text("OMR (﷼)");

            } else if ($("#currency").val() == "PAB"){
              $("#textchange").text("PAB (B/.)");

            } else if ($("#currency").val() == "PEN"){
              $("#textchange").text("PEN (S/.)");

            } else if ($("#currency").val() == "PGK"){
              $("#textchange").text("PGK ()");

            } else if ($("#currency").val() == "PHP"){
              $("#textchange").text("PHP (Php)");

            } else if ($("#currency").val() == "PKR"){
              $("#textchange").text("PKR (₨)");

            } else if ($("#currency").val() == "PLN"){
              $("#textchange").text("PLN (zł)");

            } else if ($("#currency").val() == "PYG"){
              $("#textchange").text("PYG (Gs)");

            } else if ($("#currency").val() == "QAR"){
              $("#textchange").text("QAR (﷼)");

            } else if ($("#currency").val() == "RON"){
              $("#textchange").text("RON (lei)");

            } else if ($("#currency").val() == "RSD"){
              $("#textchange").text("RSD (Дин)");

            } else if ($("#currency").val() == "RUB"){
              $("#textchange").text("RUB (руб)");

            } else if ($("#currency").val() == "RWF"){
              $("#textchange").text("RWF ()");

            } else if ($("#currency").val() == "SAR"){
              $("#textchange").text("SAR (﷼)");

            } else if ($("#currency").val() == "SBD"){
              $("#textchange").text("SBD ($)");

            } else if ($("#currency").val() == "SCR"){
              $("#textchange").text("SCR (₨)");

            } else if ($("#currency").val() == "SDD"){
              $("#textchange").text("SDD ()");

            } else if ($("#currency").val() == "SEK"){
              $("#textchange").text("SEK (kr)");

            } else if ($("#currency").val() == "SGD"){
              $("#textchange").text("SGD ($)");

            } else if ($("#currency").val() == "SHP"){
              $("#textchange").text("SHP (£)");

            } else if ($("#currency").val() == "SKK"){
              $("#textchange").text("SKK (Sk)");

            } else if ($("#currency").val() == "SLL"){
              $("#textchange").text("SLL (Le)");

            } else if ($("#currency").val() == "SOS"){
              $("#textchange").text("SOS (S)");

            } else if ($("#currency").val() == "SRD"){
              $("#textchange").text("SRD ($)");

            } else if ($("#currency").val() == "STD"){
              $("#textchange").text("STD (Db)");

            } else if ($("#currency").val() == "SVC"){
              $("#textchange").text("SVC ($)");

            } else if ($("#currency").val() == "SYP"){
              $("#textchange").text("SYP (£)");

            } else if ($("#currency").val() == "SZL"){
              $("#textchange").text("SZL ()");

            } else if ($("#currency").val() == "THB"){
              $("#textchange").text("THB (฿)");

            } else if ($("#currency").val() == "TJS"){
              $("#textchange").text("TJS ()");

            } else if ($("#currency").val() == "TMM"){
              $("#textchange").text("TMM (m)");

            } else if ($("#currency").val() == "TND"){
              $("#textchange").text("TND ()");

            } else if ($("#currency").val() == "TOP"){
              $("#textchange").text("TOP (T$)");

            } else if ($("#currency").val() == "TRY"){
              $("#textchange").text("TRY (YTL)");

            } else if ($("#currency").val() == "TTD"){
              $("#textchange").text("TTD (TT$)");

            } else if ($("#currency").val() == "TWD"){
              $("#textchange").text("TWD (NT$)");

            } else if ($("#currency").val() == "TZS"){
              $("#textchange").text("TZS ()");

            } else if ($("#currency").val() == "UAH"){
              $("#textchange").text("UAH (₴)");

            } else if ($("#currency").val() == "UGX"){
              $("#textchange").text("UGX (USh)");

            } else if ($("#currency").val() == "USD"){
              $("#textchange").text("USD ($)");

            } else if ($("#currency").val() == "UYU"){
              $("#textchange").text("UYU ($U)");

            } else if ($("#currency").val() == "UZS"){
              $("#textchange").text("UZS (лв)");

            } else if ($("#currency").val() == "VEF"){
              $("#textchange").text("VEF (Bs)");

            } else if ($("#currency").val() == "VND"){
              $("#textchange").text("VND (₫)");

            } else if ($("#currency").val() == "VUV"){
              $("#textchange").text("VUV (Vt)");

            } else if ($("#currency").val() == "WST"){
              $("#textchange").text("WST (WS$)");

            } else if ($("#currency").val() == "XAF"){
              $("#textchange").text("XAF (FCF)");

            } else if ($("#currency").val() == "XAF"){
              $("#textchange").text("XAF (CFA)");

            } else if ($("#currency").val() == "XCD"){
              $("#textchange").text("XCD ($)");

            } else if ($("#currency").val() == "XOF"){
              $("#textchange").text("XOF ()");

            } else if ($("#currency").val() == "XOF"){
              $("#textchange").text("XOF (CFA)");

            } else if ($("#currency").val() == "XPF"){
              $("#textchange").text("XPF (CFP)");

            } else if ($("#currency").val() == "XPF"){
              $("#textchange").text("XPF ()");

            } else if ($("#currency").val() == "YER"){
              $("#textchange").text("YER (﷼)");

            } else if ($("#currency").val() == "ZAR"){
              $("#textchange").text("ZAR (R)");

            } else if ($("#currency").val() == "ZMK"){
              $("#textchange").text("ZMK (ZK)");

            } else if ($("#currency").val() == "ZWD"){
              $("#textchange").text("ZWD (Z$)");
        }
    });
</script>

{{-- ///////////////////////////////////////////rating below/////////////////////////////// --}}
    <script>

    $(document).ready(function(){

        var rating_data = 0;


        $(document).on('mouseenter', '.submit_star', function(){

            var rating = $(this).data('rating');

            reset_background();

            for(var count = 1; count <= rating; count++)
            {

                $('#submit_star_'+count).addClass('text-warning');

            }

        });

        function reset_background()
        {
            for(var count = 1; count <= 5; count++)
            {

                $('#submit_star_'+count).addClass('star-light');

                $('#submit_star_'+count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function(){

            reset_background();

            for(var count = 1; count <= rating_data; count++)
            {

                $('#submit_star_'+count).removeClass('star-light');

                $('#submit_star_'+count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function(){

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function(){

            var user_name = $('#user_name').val();

            var user_review = $('#user_review').val();

            if(user_name == '' || user_review == '')
            {
                alert("Please Fill Both Field");
                return false;
            }
            else
            {
                $.ajax({
                    url:"#",
                    method:"POST",
                    data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                    success:function(data)
                    {
                        $('#review_modal').modal('hide');

                        load_rating_data();

                        alert(data);
                    }
                })
            }

        });

        load_rating_data();

        function load_rating_data(){
        $.ajax({
            url:"#",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="mb-3 row">';

                        html += '<div class="col-sm-1"><div class="pt-2 pb-2 text-white rounded-circle bg-danger"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="text-right card-footer">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
             }
           })
        }

     });

    </script>

    {{-- ///////////////////////////////////////////end rating below/////////////////////////////// --}}


    <script type="text/javascript">
     $(document).ready(function() {
    // get single Section data
    $('.modelClose').on('click', function(){
            $('#replychat_Modal').hide();
        });

        var reply
        var seller_id
        var fullname
        var photo
        var id
        $('body').on('click', '.btn_getreplynow', function(e) {
            e.preventDefault();
            // alert('id=' + id );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            id = $(this).data('bid');
            profile = $(this).data('photo');
            fullname = $(this).data('fname');
            seller_id = $(this).data('selid')
            reply = $(this).data('rep')

            if(photo === ""){
                $('#edit_photo').attr("src", "/storage/uploads/no-photo-available-icon-20.jpg");
             }else{
                $('#edit_photo').attr("src", '/storage/assets/uploads/'+ profile);
            }
            $('#edit_fullname').text(fullname);
            $('.edit_reply').val(reply);
            $('#edit_seller_id').val(seller_id);
            $('#edit_id').val(id);

        });
     //end get single Section data


         // delete message

         $('body').on('click', '.btn-deleteMessage', function (e) {

            let id = $(this).data('delid');
            $('#del_id').val(id);

            let csrf = '{{ csrf_token() }}';
            if (!confirm('Are You sure want to delete this Message!')) {
                e.preventDefault();
            }else{

                $.ajax({
                    type: "DELETE",
                    data: {
                            id: id,
                            _token: csrf
                        },
                    cache: false,
                    dataType: 'json',
                    url: '{{ route('user.deletetemessages') }}',
                    success: function (res) {
                        if (res.status3 == 200) {
                            $('.datatable_pmessage').DataTable().ajax.reload();
                        }
                    }

              });

            }
         });
      //end delete message


         // delete message

         $('body').on('click', '.btn-readmessageclick', function (e) {

            let id = $(this).data('sid');
            console.log("=============chat id==================");
            console.log(id);
            //$('#del_id').val(id);

            let csrf = '{{ csrf_token() }}';
            if (!confirm('Are You sure want to read this Message!')) {
                e.preventDefault();
            }else{

                $.ajax({
                    type: "POST",
                    data: {
                            id: id,
                            _token: csrf
                        },
                    cache: false,
                    dataType: 'json',
                    url: '{{ route('user.readmessagesclick') }}',
                    success: function (resx) {
                        if (resx.statusx == 200) {
                            $('.datatable_pmessage').DataTable().ajax.reload();
                        }
                    }

            });

            }
            });
            //end delete message



    });
    </script>

   {{-- /////////////////////////////delete account of user///////////////// --}}
    <script>
        $(document).ready(function() {
            load_data();
            var count = 1;
            function load_data() {
                $(document).on('click', '.btn-confirm', function(e) {
                    e.preventDefault();
                let id = $(this).data('sid');
                // alert('id='+id);
                $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                swal.fire({
                        icon: 'question',
                        text: "Are you sure you want to Confirm this Order?",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes!",
                        cancelButtonText: "No!",
                        reverseButtons: !0
                    }).then(function (e) {

                if (e.value === true) {
                    $.ajax({
                        type: "post",
                        data: {
                                id: id,
                            },
                        dataType: 'json',
                        url: '{{ route('user.confirmorder') }}',
                        success: function (res1) {
                            if (res1.status == 200) {
                                toastr.success('Confirm Order Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
                                setTimeout(function () {
                                  location.reload(true);
                                }, 1500);

                            }
                        }

                     });
                   }
                 }, function (dismiss) {
                return false;
             });

            });
          }

       });

    </script>

       {{-- /////////////////////////////end delete account of user///////////////// --}}

       <script type="text/javascript">
        var IDLE_TIMEOUT = 600;
           var _idleSecondsCounter = 0;
           document.onclick = function() {
           _idleSecondsCounter = 0;
           };
           document.onmousemove = function() {
           _idleSecondsCounter = 0;
           };
           document.onkeypress = function() {
           _idleSecondsCounter = 0;
           };
           window.setInterval(CheckIdleTime, 1000);

           function CheckIdleTime() {
           _idleSecondsCounter++;
           var oPanel = document.getElementById("SecondsUntilExpire");
           if (oPanel)
           oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
           if (_idleSecondsCounter >= IDLE_TIMEOUT) {
           document.location.href = "{{ url('/logout') }}";
           }
           }
   </script>

{{-- <script>
    $(document).ready(function() {


    });
    </script> --}}
    <script>
     $(document).ready(function() {
         $(document).on('click', '.user-online', function() {
            var recipient_id = $(this).data('id');
            $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                $.ajax({
                    url: '/user/mpingi-users/messages/chatbox/' + recipient_id,
                    type: 'GET',
                    success: function(data) {
                     $('#chat-box').html('');
                        $.each(data, function(index, message) {
                           // $('#chat-box').append(message.message);
                           if(message.profile === ""){
                                $('#profile').attr("src", "https://image.flaticon.com/icons/svg/327/327779.svg");
                            }else{
                                $('#profile').attr("src", '/storage/assets/uploads/'+ message.profile);
                            }
                            $('#name').html('' + message.last_name + ' '+  message.first_name +'');

                            $('#chat-box').html(message.message);
                            $('#receiver_id').val(message.uid);
                            $('#dates').html(message.dates);
                        });
                    },
                    error: function(xhr) {
                        alert('An error occurred. Please try again.');
                    }
                });

        });



        $(document).on('click', '.msger-send-btn', function(e) {
            e.preventDefault();
            var sender_id = $('#senders_id').val();
            var receiver_id = $('#receiver_id').val();
            var message = $('.msger-input').val();
            $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                $.ajax({
                    url: '/user/mpingi-users/send-message',
                    type: 'POST',
                    data: {
                        sender_id: sender_id,
                        receiver_id: receiver_id,
                        message: message,
                    },
                    success: function(response) {
                        if (response.success) {
                            // alert(response.message);
                            toastr.success(response.message, {timeOut: 2000}, {positionClass: 'toast-top-right'});
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);


                        } else {
                            alert('Failed to send message');
                        }
                    },
                    error: function(xhr) {
                        alert('An error occurred. Please try again.');
                    }
                });

        });


    //     loadMessages();
     //setInterval(getreolaod, 1000);

     });
    </script>

    <script>
      const msgerForm = get(".msger-inputarea");
            const msgerInput = get(".msger-input");
            const msgerChat = get(".msger-chat");

            const BOT_MSGS = [
            "Hi, how are you?",
            "Ohh... I can't understand what you trying to say. Sorry!",
            "I like to play games... But I don't know how to play!",
            "Sorry if my answers are not relevant. :))",
            "I feel sleepy! :("
            ];

            // Icons made by Freepik from www.flaticon.com
            const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
            const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
            const BOT_NAME = "BOT";
            const PERSON_NAME = "Sajad";

            msgerForm.addEventListener("submit", event => {
            event.preventDefault();

            const msgText = msgerInput.value;
            if (!msgText) return;

            appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
            msgerInput.value = "";

            botResponse();
            });

            function appendMessage(name, img, side, text) {
            //   Simple solution for small apps
            const msgHTML = `
                <div class="msg ${side}-msg">
                <div class="msg-img" style="background-image: url(${img})"></div>

                <div class="msg-bubble">
                    <div class="msg-info">
                    <div class="msg-info-name">${name}</div>
                    <div class="msg-info-time">${formatDate(new Date())}</div>
                    </div>

                    <div class="msg-text">${text}</div>
                </div>
                </div>
            `;

            msgerChat.insertAdjacentHTML("beforeend", msgHTML);
            msgerChat.scrollTop += 500;
            }

            function botResponse() {
            const r = random(0, BOT_MSGS.length - 1);
            const msgText = BOT_MSGS[r];
            const delay = msgText.split(" ").length * 100;

            setTimeout(() => {
                appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
            }, delay);
            }

            // Utils
            function get(selector, root = document) {
            return root.querySelector(selector);
            }

            function formatDate(date) {
            const h = "0" + date.getHours();
            const m = "0" + date.getMinutes();

            return `${h.slice(-2)}:${m.slice(-2)}`;
            }

            function random(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
            }
    </script>


</body>
</html>
