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


         //for pagination
         $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            $('#dynamic_content').html(make_skeleton())
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
                // $('#load_data').empty();
                //   $loader = $('<div class="loader"></div>');
                //   $loader.appendTo('#load_data');
                //   setTimeout(function(){
                //     $loader.remove();
                $.ajax({
                    url:"/user/mpingi-users/users/ajax-paginate?page="+page,
                    data: {
                            limit: limit
                    },
                    success:function(res){
                        $('.table-data').html(res);
                    }
                })
            //}, 300);
          }

        //end pagination

        // for searching data
        var query = $('#search_input').val();
        fetch_customer_data(query);

        $(document).on('keyup', '#search_input', function(){
            var query = $(this).val();
            if(query == ''){
                record();
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
            url:"{{ route('getSearchdataUser') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {

                $('#dynamic_content').html(data.table_data);
                $('#total_records').css('display','block');
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

            $('#dynamic_content').html(make_skeleton())

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
                    url:"{{ route('getPageUser') }}",
                    data:{'pages':pages, limit: limit},
                    success:function(data){
                        $('.table-data').html(data);

                    }
                });
            }

        });

        //end for per page



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
          document.getElementById("click-check").addEventListener("click", myFunction);
                function myFunction() {
                    var x = document.getElementById("myInput2");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
            }

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


    });
</script>
{{--end disable input type when select checkbox business logo form --}}
<script>
    const chatBoxIcon = document.getElementById('chatbox-btn-wrapper')
    const chatBoxCloseBtn = document.querySelector('#chatbox .chatbox-close')
    const chatBoxWrapper = document.getElementById('chatbox')
    const chatBoxTextField = document.getElementById('chatbox-message-field')

    chatBoxIcon.addEventListener('click', e =>{
        e.preventDefault()
        if(chatBoxWrapper.classList.contains('show')){
            chatBoxWrapper.classList.remove('show')
        }else{
            chatBoxWrapper.classList.add('show')
            chatBoxIcon.style.display = `none`
        }
    })

    chatBoxCloseBtn.addEventListener('click', e => {
        e.preventDefault()
        if(chatBoxWrapper.classList.contains('show')){
            if(!chatBoxWrapper.classList.contains('closing'))
                chatBoxWrapper.classList.add('closing');
                setTimeout(()=>{
                chatBoxWrapper.classList.remove('show');
                chatBoxWrapper.classList.remove('closing');
                }, 500)
        }
        chatBoxIcon.removeAttribute('style')
    })

    const chatBoxTextFieldHeight = chatBoxTextField.clientHeight
    chatBoxTextField.addEventListener('keyup', e=>{
        var maxHeight = getComputedStyle(chatBoxTextField).getPropertyValue('--chatbox-max-height')
        chatBoxTextField.removeAttribute('style')
        setTimeout(()=>{
            if(chatBoxTextField.scrollHeight > maxHeight){
                chatBoxTextField.style.height = `${maxHeight}px`
            }else{
                chatBoxTextField.style.height = `${chatBoxTextField.scrollHeight}px`
            }
        },0)
    })
</script>


</body>

</html>
