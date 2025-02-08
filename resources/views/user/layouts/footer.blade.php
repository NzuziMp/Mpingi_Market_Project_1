</footer>
<!-- Bootstrap core JS-->
<script src="{{ asset('assets/plugin/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugin/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/fslightbox.js') }}"></script>
<script src="{{ asset('assets/nicelabel/js/jquery.nicelabel.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.min.js')}}"></script>
<script>
    $(document).ready(function() {
  // update profile picture
      $('.btn-updateprofile_').on('click', function(e){
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
     });
</script>
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
<script type="text/javascript" src="{{ asset('assets/js/jquery.gritter.js') }}"></script>
@foreach ($getuser as $row)
@if(is_null($row->first_name)|| is_null($row->gender) || is_null($row->date) || is_null($row->month) || is_null($row->year)
|| is_null($row->country) || is_null($row->state_id) || is_null($row->mobile) || is_null($row->address_1))
<script>

    $(document).ready(function() {
        var unique_id = $.gritter.add({
            text: 'Please update your Profile Account <a href="{{ route("user.profileinfo") }}" class="AhrefColor">HERE</a>',
            sticky: true,
            time: '',
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>
@else

@endif
@endforeach


@foreach ($getbusinessdata as $row1)
@if($row1->business_name == "" || $row1->business_type == "" || $row1->dealers_in == ""
|| $row1->i_am_a == "" ||  $row1->address == "" ||  $row1->business_icon == "")
<script>

    $(document).ready(function() {
        var unique_id = $.gritter.add({
            text: 'Please update your Business Account <a href="{{ route("user.business") }}" class="AhrefColor">HERE</a>',
            sticky: true,
            time: '',
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>

@else

@endif
@endforeach


<script>

    $(document).ready(function() {
        var unique_id = $.gritter.add({
            title: '<span color="white">Welcome to Mpingi Portal</span>',
            text: 'MPINGI ONLINE CLASSIFIEDS PLATFORM is a free online market web and mobile app content management system (CMS) where you can post and order new, used and refurbished products online like electronics, cars, fashion apparel, collectibles, sporting goods among others as well as services around the world, launched in 2017.',
            image: '{{ asset("assets/images/avatar_nzuzi_default.png") }}',
            sticky: true,
            time: '',
            class_name: 'my-sticky-class'
        });

        return false;
    });
    </script>

   {{-- /////////////////////////////delete account of user///////////////// --}}
   <script>
    $(document).ready(function() {
        load_data();
        var count = 1;
        function load_data() {
            $(document).on('click', '.btn-delete-account', function(e) {
                e.preventDefault();
            let id = $(this).data('uid');

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            swal.fire({
                    icon: 'question',
                    text: "Are you sure you want to delete you account?",
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
                    url: '#',
                    success: function (res1) {
                        if (res1.status == 200) {
                            toastr.success('Delete Account Successfully.', {timeOut: 2000}, {positionClass: 'toast-top-right'});
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

</body>

</html>
