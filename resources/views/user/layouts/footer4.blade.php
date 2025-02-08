</footer>
<!-- Bootstrap core JS-->
<script src="{{ asset('assets/plugin/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugin/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/fslightbox.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.btn-clicks').on('click', function(event){
        event.preventDefault();
       const id =  this.getAttribute('cat-id');
       console.log("================category_id============");
       console.log(id);


       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


         $.ajax({
            url:'{{ route("user.postoptionfunctionid") }}',
            data:{
                id: id
             },
            type:'post',
            dataType:'json',
        })


        .done(function(res) {
            console.log("=============================res===========================");
            console.log(res.data.id);
            window.location.reload();
        //   window.location.href = '{{ route("user.postoptionfunctionid") }}';
        })

    });
});
</script>

{{-- <script>
    $(document).ready(function() {

       $('.btn-postoption').on('click', function (e) {
        e.preventDefault();

            var category_id = $('#category_id').val();
            console.log("============category_id================");
            console.log(category_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.get('{{ route('user.postoptionfunction') }}', {
                category_id: category_id
             })
              .done(function(data) {
                window.location.href = "{{ url('/user/mpingi-users/users/post-options-process/') }}"+data.category_id;
            })

        });

    });
</script> --}}

<script>
    $(document).ready(function() {

        //fade in,out,zoom,etc...
        AOS.init();
        //end fade in,out,zoom,etc...

        //getId from country show into state
        $('.country-dropdown').change(function () {
            var id = $(this).val();

            $('.state-dropdown').find('option').not(':first').remove();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajaxSetup({
            beforeSend: function() {

                    var emptyvalue = '<option value=""> Please Wait...</option>';
                    $(".state-dropdown").html(emptyvalue);
            },
        });

            $.ajax({
            url:'get-states-by-country-cat/'+id,
            type:'get',
            dataType:'json',
            success:function (response) {
                $(".state-dropdown").empty();
                var len = 0;
                if (response.data != null) {
                    len = response.data.length;
                }

                if (len>0) {
                    for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $(".state-dropdown").append(option);

                    }
                }
            }
            })
        });

        //end getId from country show into state

        //getId from state show into city

        $('.state-dropdown').change(function () {
            var id = $(this).val();

            $('.city-dropdown').find('option').not(':first').remove();

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajaxSetup({
            beforeSend: function() {

                    var emptyvalue = '<option value=""> Please Wait...</option>';
                    $(".city-dropdown").html(emptyvalue);
            },
        });

            $.ajax({
            url:'get-states-by-state-cat/'+id,
            type:'get',
            dataType:'json',
            success:function (response) {
                $(".city-dropdown").empty();
                var len = 0;
                if (response.data != null) {
                    len = response.data.length;
                }

                if (len>0) {
                    for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $(".city-dropdown").append(option);
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

        //end for remove card as temporary
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
     // end collapse left sidebar menu

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


</body>

</html>
