@include('mainindex.modal.contactmemodal')
<footer class="mainfooter" role="contentinfo">
    <div class="py-3 container-fluid"
        style="background-color:#282828;  font: 10pt/130% Arial;
    font-family:Arial; color:#fff">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <i class="fa fa-paper-plane"></i> contact@mpingimarket.com <i class="fa fa-users"></i> @if(session()->get('locale') === 'fr')  Visiteurs:  @else Visitors:  </span>@endif <span id="result_count" style="color:#fff;font-weight:bold">
            </div>
            <div class="col-md-4">
                @if(session()->get('locale') === 'fr')  Droit d'auteur © Mpingi Market en ligne Tous droits réservés  @else Copyright © Mpingi Market All Rights Reserved @endif

            </div>
            <div class="col-md-3" data-bs-toggle="modal" data-bs-target="#developerModal"><i class="fa fa-cog faa-spin spinner "></i> Developed by Nzuzi Mpingi</div>
        </div>
    </div>

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-pad">
                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i
                                class="fa fa-file"></i>&nbsp; @if(session()->get('locale') === 'fr')  À PROPOS DE NOUS  @else ABOUT US @endif</h6>
                        <ul class="list-unstyled">
                            <li>
                                @if(session()->get('locale') === 'fr')
                                <p style="
                                font-size: 12px;">
                                    <span
                                        style="color: #ff7519;
                                   font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                   font-size: 10pt;">MPINGI PLATE-FORME GRATUIT DE PETITES ANNONCES EN LIGNE</span> est une application web et mobile gratuite de petites annonces en ligne où vous pouvez publier et commander en ligne des produits neufs, d'occasion et remis à neuf comme l'électronique, les voitures, les vêtements de mode, les objets de collection, les articles de sport, entre autres, ainsi que les services, les emplois, les actualités et bien d'autres à travers le monde, lancés en 2017. <span
                                        style="color: #ff7519;
                                   font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                   font-size: 10pt;">Lire la suite</span>
                                </p>
                                   @else
                                   <p style="
                                   font-size: 12px;">
                                       <span
                                           style="color: #ff7519;
                                      font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                      font-size: 10pt;">MPINGI
                                           FREE ONLINE CLASSIFIED ADS PLATFORM</span> is a free online
                                       classifieds web and mobile app content management system (CMS) where you can post
                                       and order new, used and refurbished products online like electronics, cars, fashion
                                       apparel, collectibles, sporting goods among others as well as services, jobs, news
                                       and many others around the world, launched in 2017. <span
                                           style="color: #ff7519;
                                      font-family: Helvetica, Arial, sans-serif; font-weight:bold;
                                      font-size: 10pt;">Read
                                           More</span>
                                   </p>
                                   @endif


                            </li>
                            <li>
                                <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i class="fa fa-eye"></i>
                                    @if(session()->get('locale') === 'fr')  PUBLICATION D' ANNONCES - SIMPLIFIÉE @else AD SERVING — SIMPLIFIED @endif
                                    </h6>
                            </li>
                            <li><i class="mt-3 fa fa-cloud"></i>&nbsp;
                                @if(session()->get('locale') === 'fr')
                                  Basé sur le cloud - rien à installer
                                @else
                                  Cloud-based - nothing to install
                                 @endif
                            </li>
                            <li><i class="mt-3 fa fa-globe"></i>&nbsp;
                                @if(session()->get('locale') === 'fr')
                                Code d'annonce le plus rapide au monde
                              @else
                                World's fastest ad-code
                               @endif

                            </li>
                            <li><i class="mt-3 fa fa-users"></i>&nbsp;
                                @if(session()->get('locale') === 'fr')
                                Gère les publicités personnalisées dans tous les formats
                              @else
                                Handles custom ads in all formats
                               @endif
                            </li>
                            <li><i class="mt-3 fa fa-file"></i>&nbsp;
                             @if(session()->get('locale') === 'fr')
                                Rapports en temps réel
                              @else
                                Real-time reporting
                               @endif
                            </li>
                            <li><i class="mt-3 fa fa-edit"></i>&nbsp;
                            @if(session()->get('locale') === 'fr')
                                Interface entièrement personnalisable
                              @else
                                Completely customizable interface
                               @endif
                             </li>
                            <li>
                                <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%;margin-top:4%"><i
                                        class="fa fa-eye"></i>
                                        @if(session()->get('locale') === 'fr')
                                         CIBLAGE DU PUBLIC
                                        @else
                                         AUDIENCE TARGETING
                                        @endif

                                    </h6>
                            </li>
                            <li style="
                            font-size: 12px;"><i
                                    class="mt-3 fa fa-map-marker"></i>&nbsp;
                                 @if(session()->get('locale') === 'fr')
                                    Ciblage géographique: ciblez vos annonces par pays, province ou État, ou même aussi par une ville spécifique.
                                   @else
                                     Geographic Targeting: Target
                                   your ads by country, province or state, or even as specific as city.
                                   @endif

                            </li>
                            <li style="
                            font-size: 12px;"><i
                                    class="mt-3 fa fa-mobile"></i>&nbsp;
                                 @if(session()->get('locale') === 'fr')
                                      Ciblage par plate-forme: ciblez et diffusez des annonces en fonction de l'appareil sur lequel les utilisateurs se rendent.
                                   @else
                                     Platform Targeting: Target and
                                   serve ads depending on which device users are visiting on.
                                   @endif

                            </li>
                            <li style="
                            font-size: 12px;"><i
                                    class="fab fa-google"></i>&nbsp;
                               @if(session()->get('locale') === 'fr')
                                    Your are browsing in
                                 @else
                                   Your are browsing in
                                 @endif

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="footer-pad">
                        <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i
                                class="fa fa-question-circle"></i>&nbsp;
                                @if(session()->get('locale') === 'fr')
                                   QUESTIONS FRÉQUEMMENT POSÉES
                                 @else
                                   FREQUENTLY ASKED QUESTIONS
                                 @endif

                            </h6>
                        <ul class="list-unstyled">
                            <li style="
                             font-size: 12px;"><i
                                    class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                    @if(session()->get('locale') === 'fr')
                                        Comment créer un compte
                                      @else
                                       How to create an Account ?
                                      @endif
                                    </a>
                            </li>
                            <li style="
                             font-size: 12px;"><i
                                    class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                    @if(session()->get('locale') === 'fr')
                                        Comment se connecter
                                      @else
                                       How to Sign in
                                      @endif

                                </a>
                            </li>
                            <li style="
                             font-size: 12px;"><i
                                    class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                     @if(session()->get('locale') === 'fr')
                                       Comment publier des produitss
                                      @else
                                       How to Post Products
                                      @endif

                                </a>
                            </li>
                            <li style="
                             font-size: 12px;"><i
                                    class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                      @if(session()->get('locale') === 'fr')
                                        Comment commander des produits
                                       @else
                                        How to Order Products
                                       @endif

                                </a>
                            </li>
                            <li style="
                            font-size: 12px;"><i
                                    class="fa fa-dot-circle"></i>&nbsp;<a href="#" id="footer-faq">
                                      @if(session()->get('locale') === 'fr')
                                       Plus de questions
                                       @else
                                        More questions
                                       @endif

                                </a>
                            </li>
                            <li>
                                <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%;margin-top:4%"><i
                                        class="fa fa-truck"></i>
                                        @if(session()->get('locale') === 'fr')
                                         SUPPORT UTILE
                                        @else
                                          HELPFUL SUPPORT
                                        @endif

                                        </h6>
                            </li>
                            <li style="
                             font-size: 12px;">
                                @if(session()->get('locale') === 'fr')
                                    Notre équipe d'assistance est disponible par téléphone ou par e-mail pour vous aider à tirer le meilleur parti de MPINGI
                                   @else
                                    Our support team is available via
                                    phone or e-mail to help you make the most
                                    of MPINGI
                                   @endif

                            </li>
                            <li>
                                <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%;margin-top:4%"><i
                                        class="fa fa-link"></i>
                                      @if(session()->get('locale') === 'fr')
                                        EMMENEZ-NOUS PARTOUT OU VOUS ETES !
                                       @else
                                         TAKE US EVERYWHERE YOU ARE !
                                       @endif

                                        </h6>
                            </li>
                            <li><i class="mt-3 fab fa-apple fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                    id="footer-faq">
                                    @if(session()->get('locale') === 'fr')
                                     Disponible sur
                                   @else
                                     Available on
                                   @endif

                                </span> <strong id="footer-faq">App Store</strong></li>
                            <li><i class="mt-3 fab fa-google-plus fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                    id="footer-faq">
                                 @if(session()->get('locale') === 'fr')
                                    Obtenez-le sur
                                  @else
                                   Get it on
                                  @endif

                                 </span> <strong id="footer-faq">Google play</strong></li>
                            <li><i class="mt-3 fab fa-windows fa-2x"></i>&nbsp;<span style="font-size: 12px"
                                    id="footer-faq">
                                @if(session()->get('locale') === 'fr')
                                    Téléchargez avec
                                  @else
                                   Download with
                                  @endif

                                 </span> <strong id="footer-faq">Windows Store</strong>
                            </li>

                            <li style="
                            font-size: 12px;margin-top:2%"><i
                                    class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq">
                                      @if(session()->get('locale') === 'fr')
                                        Discussions en direct
                                      @else
                                       Live discussions
                                      @endif
                                </a>
                            </li>
                            <li style="
                             font-size: 12px;"><i
                                    class="fa fa-users"></i>&nbsp;<a href="#" id="footer-faq">
                                     @if(session()->get('locale') === 'fr')
                                       Témoignages
                                      @else
                                       Testimonies
                                      @endif

                                </a>
                            </li>
                            {{-- <li style="
                            font-size: 12px;">
                               <i class="mt-3 fab fa-facebook-f fa-2x"></i>
                            </li> --}}

                        </ul>

                        <main>
                            <!-- Social Media Buttons HTML -->
                            <div class="wrapper">
                              <a href="#" class="icon facebook">
                                <div class="tooltip">Facebook</div>
                                <center><span><i class="fab fa-facebook-f"></i></span></center>
                              </a>
                              <a href="#" class="icon twitter">
                                <div class="tooltip">Twitter</div>
                                <center><span><i class="fab fa-twitter"></i></span></center>
                              </a>
                              <a href="#" class="icon instagram">
                                <div class="tooltip">Instagram</div>
                                <center><span><i class="fab fa-instagram"></i></span></center>
                              </a>

                              <a href="#" class="icon youtube">
                                <div class="tooltip">Youtube</div>
                                <center><span><i class="fab fa-youtube"></i></span></center>
                              </a>
                            </div>
                            <!-- End Social Media Buttons HTML -->
                         </main>


                    </div>
                </div>
                <div class="col-md-4">
                    <h6 style="color: #ff7519;font-weight:bold;margin-bottom:3%"><i class="fa fa-send"></i>&nbsp;
                     @if(session()->get('locale') === 'fr')
                        CONTACTEZ NOUS
                       @else
                        CONTACT US
                       @endif

                    </h6>
                    @if(session()->get('locale') === 'fr')
                    <p style="
                    font-size: 12px;">
                        Les membres de l'équipe de conception de MPINGI s'efforçant toujours d'améliorer la qualité du site Web conçu par eux en tant que spectateur, vos suggestions sont très importantes pour nous. Ils nous aident à améliorer continuellement la qualité de ce site Web et de cette application mobile. Veuillez utiliser ce formulaire de messagerie instantanée pour votre suggestion.
                    </p>
                   @else
                   <p style="
                   font-size: 12px;">
                            The Members of the design team at MPINGI always striving to enhance the quality of the website
                            designed by them as a viewer your suggestions are very important to us. They are helping us in
                            continually improving the quality of this website and mobile app. Please you can make use of
                            this instant mail form for your suggestion.
                        </p>
                   @endif

                    <ul class="social-network social-circle">
                        <li>
                            <form method="post" class="gap-2 d-grid">
                                <div class="form-group">
                                    <input class="form-control form-control-lg" type="text" placeholder="@if(session()->get('locale') === 'fr') Nom @else Name @endif"
                                        aria-label=".form-control-lg example" id="borderinput2">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" type="text" placeholder="@if(session()->get('locale') === 'fr') Email @else E-mail @endif"
                                        aria-label=".form-control-lg example" id="borderinput2">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg" type="text" placeholder="@if(session()->get('locale') === 'fr') Sujet @else Subject @endif"
                                        aria-label=".form-control-lg example" id="borderinput2">
                                </div>
                                <div class="form-group">
                                    <textarea rows="3" class="form-control form-control-lg" type="text" placeholder="@if(session()->get('locale') === 'fr') Message @else Message @endif"
                                        aria-label=".form-control-lg example" id="borderinput2"></textarea>
                                </div>
                                <div class="form-group" style="margin-bottom:10%">


                                    <button type="button" class="float-end btn btn-outline-warning btn-lg btnColor"
                                        value="SEND MESSAGE">
                                     @if(session()->get('locale') === 'fr')
                                         ENVOYER LE MESSAGE
                                       @else
                                         SEND MESSAGE
                                       @endif

                                    </button>
                                </div>
                            </form>
                        </li>


                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;">
        <a href="#top"  class="scrollToTop"
            style="font-size: 13px; font-weight: normal; text-shadow: 0 2px 2px #FFF;text-decoration: none;"><i
                class="icon-arrow-up"></i>&nbsp; <img src="{{ asset('assets/images/up.png') }}"
                style="width:48px; height:48px">
        </a>
    </div>

</footer>
<!-- Bootstrap core JS-->
<script src="{{ asset('assets/plugin/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugin/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/fslightbox.js') }}"></script>
<script src="{{ asset('assets/starrating/src/jquery.star-rating-svg.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery.min.js') }}"></script>
<script src="{{ asset('assets/owlcarousel/owl.carousel.js') }}"></script>

<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
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
                url:"{{ route('searchcountry') }}",
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
<script>
    function myFunction2() {
        var z = document.querySelector('input[name=password_]');
        if (z.type === "password") {
            z.type = "text";
        } else {
            z.type = "password";
        }
    }
</script>

<script>
    // login guest user
$('.btn-loginguestindex').on('click', function(event){
    event.preventDefault();
    // alert('click Product');
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $('#email-error').html("");
         $('#password-error').html("");

          const email = document.querySelector('input[name=email_]').value;
          const password = document.querySelector('input[name=password_]').value;

    $.ajax({

          url:'{{ route("guest.loginUserIndex") }}',
          type:'get',
          data:{
              email: email,
              password: password,

          },
          dataType:'json',
          success:function (response) {

            if (response.status == 200) {
                  setTimeout(function () {
                    $('#form-login').hide();
                    $('#user-login').html('<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>&nbsp;Login User Sucessfully</div>');
                      window.location.href = "{{ route('dashboard') }}";
                   }, 100);
                  $("#form-id")[0].reset();

              }

              if(response.errors) {

                      if(response.errors.email){
                          $('#email-error').html(response.errors.email[0]);
                          $(".email").removeClass("is-valid").addClass("is-invalid");

                      }else{
                          $(".email").removeClass("is-invalid").addClass("is-valid");

                      }

                      if(response.errors.password){
                          $('#password-error').html(response.errors.password[0]);
                          $(".password").removeClass("is-valid").addClass("is-invalid");

                      }else{
                          $(".password").removeClass("is-invalid").addClass("is-valid");

                      }

                }

                if(response.errorlogin == 400) {
                        $('#user-login').hide();
                        $('#form-login').html('<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i>&nbsp;Wrong email address or password</div>');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                 }

          }
     });

  });

  //end login guest user

</script>

<script>
    // login guest user
$('.btn-loginguest').on('click', function(event){
    event.preventDefault();
    // alert('click Product');
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $('#email-error').html("");
         $('#password-error').html("");

          const email = document.querySelector('input[name=email_]').value;
          const password = document.querySelector('input[name=password_]').value;

    $.ajax({

          url:'{{ route("guest.loginUser") }}',
          type:'get',
          data:{
              email: email,
              password: password,

          },
          dataType:'json',
          success:function (response) {

            if (response.status == 200) {
                  setTimeout(function () {
                    $('#form-login').hide();
                    $('#user-login').html('<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>&nbsp;Login User Sucessfully</div>');
                      window.location.href = "{{ route('user.myorders') }}";
                   }, 100);
                  $("#form-id")[0].reset();

              }

              if(response.errors) {

                      if(response.errors.email){
                          $('#email-error').html(response.errors.email[0]);
                          $(".email").removeClass("is-valid").addClass("is-invalid");

                      }else{
                          $(".email").removeClass("is-invalid").addClass("is-valid");

                      }

                      if(response.errors.password){
                          $('#password-error').html(response.errors.password[0]);
                          $(".password").removeClass("is-valid").addClass("is-invalid");

                      }else{
                          $(".password").removeClass("is-invalid").addClass("is-valid");

                      }

                }

                if(response.errorlogin == 400) {
                        $('#user-login').hide();
                        $('#form-login').html('<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i>&nbsp;Wrong email address or password</div>');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                 }

          }
     });

  });

  //end login guest user

</script>

<script>
    // login guest user categories
$('.btn-loginguests').on('click', function(event){
    event.preventDefault();
    // alert('click Product');
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $('#email-error').html("");
         $('#password-error').html("");

          const email = document.querySelector('input[name=email_]').value;
          const password = document.querySelector('input[name=password_]').value;

    $.ajax({

          url:'{{ route("guest.loginUser2") }}',
          type:'get',
          data:{
              email: email,
              password: password,

          },
          dataType:'json',
          success:function (response) {

            if (response.status == 200) {
                  setTimeout(function () {
                    $('#form-login').hide();
                    $('#user-login').html('<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>&nbsp;Login User Sucessfully</div>');
                    var baseString1 = 'my-name-encrypt-secret-key';
                    var encodedString1 = window.btoa( baseString1 );
                    var id = 1;
                    var baseString = 'my-name-encrypt';
                    var encodedString = window.btoa( baseString );
                    window.location.href = "{{url('/user/mpingi-users/users/post-options-free-products/login')}}" +  "/" + encodedString1 + "/" + id + "/" + encodedString;
                   }, 100);
                  $("#form-id")[0].reset();

              }

              if(response.errors) {

                      if(response.errors.email){
                          $('#email-error').html(response.errors.email[0]);
                          $(".email").removeClass("is-valid").addClass("is-invalid");

                      }else{
                          $(".email").removeClass("is-invalid").addClass("is-valid");

                      }

                      if(response.errors.password){
                          $('#password-error').html(response.errors.password[0]);
                          $(".password").removeClass("is-valid").addClass("is-invalid");

                      }else{
                          $(".password").removeClass("is-invalid").addClass("is-valid");

                      }

                }

                if(response.errorlogin == 400) {
                        $('#user-login').hide();
                        $('#form-login').html('<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i>&nbsp;Wrong email address or password</div>');
                        //toastr.error('Added Student Failed!.', {timeOut: 2000}, {positionClass: 'toast-top-center'});

                 }

          }
     });

  });

  //end login guest user categories

</script>

<script>
    $(function() {
         $(".my-rating-9").starRating({
            initialRating: 0,
            strokeColor: '#894A00',
            strokeWidth: 10,
            starSize: 25,
            disableAfterRate: false,
            onHover: function(currentIndex, currentRating, $el){
            $('.live-rating').text(currentIndex);
            },
            onLeave: function(currentIndex, currentRating, $el){
            $('.live-rating').text(currentRating);
            }
        });

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

        //for remove card as temporary
        $('.close-icon').on('click',function() {
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

   //carousel
   var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 3000,
        wrap: false
     })
     //end carousel

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

      //scrollTbelow
      $(window).scroll(function() {
            // scrollTbelow is not a function - changed to scrollTbelow
            if ($(this).scrollTop() < 5) {
                $('.d-lg-none').fadeIn();
            } else {
                $('.d-lg-none').fadeOut();
            }
        }).trigger('scroll');
         //end scrollTbelow

       // search job seekers title
        $('.job_name').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                // $('#jobsList').html("<h2>No Found</h2>");
              var _token = $('input[name="_token"]').val();
            jQuery.ajaxSetup({
            beforeSend: function() {
                //empty only
                },
           });
            $.ajax({
                url:"{{ route('searchjobtitle') }}",
                method:"POST",
            data:{query:query, _token:_token},
               success:function(data){
                $('#jobsList').fadeIn();
                $('#jobsList').html(data);
               }
             });
            }
        });

        $(document).on("click", "#results > li > a", function( event ){
           const value = $(this).text();
            $('.job_name').val(value);
            $('#jobsList').html("");
            $('#jobsList').fadeOut();
        });

      // end search job seekers title


      /////////////////////////all products ////////////////////////////


            //for pagination
            $(document).on('click','.pagination_ap a', function(e){
            e.preventDefault();
            $('#dynamic_content_ap').html(make_skeleton())
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
                    url:"/ajax-paginate-allproduct?page="+page,
                    data: {
                            limit: limit
                    },
                    success:function(res){
                        $('.table-data_ap').html(res);
                    }
                })

          }

        //end pagination

        // for searching data
        var query = $('.search_input_aps').val();
        fetch_customer_data(query);

        $(document).on('keyup', '.search_input_aps', function(){
            var query = $(this).val();
            console.log("============================query================================");
            console.log(query);
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
            url:"{{ route('ajax.paginateallproducts') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {

                $('#dynamic_content_ap').html(data.table_data);

             }
            })
        }

       //end for searching data

      //for per page

        $(document).on('change', '#search_pages_x',function(){
            var pages = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dynamic_content_ap').html(make_skeleton())

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
                    url:"{{ route('getSearchdataAppProducts') }}",
                    data:{'pages':pages, limit: limit},
                    success:function(data){
                        $('.table-data_ap').html(data);

                    }
                });
            }

        });

        //end for per page

      /////////////////////////end all products ////////////////////////


        //for pagination
        $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            $('#dynamic_content_').html(make_skeleton())
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
                    url:"/ajax-paginate-shop?page="+page,
                    data: {
                            limit: limit
                    },
                    success:function(res){
                        $('.table-data_').html(res);
                    }
                })
            //}, 300);
          }

        //end pagination

        // for searching data
        var query = $('.search_input_').val();
        fetch_customer_data(query);

        $(document).on('keyup', '.search_input_', function(){
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
            url:"{{ route('getSearchdataShop') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {

                $('#dynamic_content_').html(data.table_data);

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

            $('#dynamic_content_').html(make_skeleton())

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
                    url:"{{ route('getPageShop') }}",
                    data:{'pages':pages, limit: limit},
                    success:function(data){
                        $('.table-data_').html(data);

                    }
                });
            }

        });

        //end for per page


       // get search results

        //  $('body').on('click', '#btn-resultsearch', function(e){
        //     e.preventDefault();

        //     $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //     const country = $('.country').val();
        //     console.log("==========country===============");
        //     console.log(country);

        //     const state =  $('.state').val();
        //     console.log("==========state===============");
        //     console.log(state);

        //     const city =  $('.city').val();
        //     console.log("==========city===============");
        //     console.log(city);

        //     const job_name =  $('.job_name').val();
        //     console.log("==========job_name===============");
        //     console.log(job_name);

        //     var data = new FormData(this);
        //         data.append('country', country);
        //         data.append('state', state);
        //         data.append('city', city);
        //         data.append('job_name', job_name);


        //     $.ajax({
        //         url: '{{ route('searchresult') }}',
        //         method: 'post',
        //         data: data,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         dataType: 'json',
        //         success: function(response){
        //             window.location.href= "https://mpingimarket.mywebapp.online/search-results-jobseekers";
        //         if(response.errors) {
        //             console.log("Failed");

        //         }

        //     },
        //   });
        //  });

      // end  get search results

          //for pagination jobs
          $(document).on('click','.pagination_ a', function(e){
            e.preventDefault();
             let page2 = $(this).attr('href').split('page=')[1]
               records(page2)

            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function records(page2){
                // $('#load_data').empty();
                //   $loader = $('<div class="loader"></div>');
                //   $loader.appendTo('#load_data');
                //   setTimeout(function(){
                //     $loader.remove();
                $.ajax({
                    url:"/ajax-paginate-jobs?page="+page2,
                    success:function(res2){
                        $('.table-datas').html(res2);
                    }
                })
            //}, 300);
          }

        //end pagination jobs

          //for per page jobs

          $(document).on('change', '#search_pages',function(){
            var pages = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dynamic_contents').html(make_skeleton())

                setTimeout(function() {
                        records()
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
           function records(limits){
                $.ajax({
                    type:'GET',
                    url:"{{ route('getPageJobs') }}",
                    data:{'pages':pages, limits: limits},
                    success:function(datas){
                        $('.table-datas').html(datas);

                    }
                });
            }

        });

        //end for per page jobs



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
                // $('#load_data').empty();
                //   $loader = $('<div class="loader"></div>');
                //   $loader.appendTo('#load_data');
                //   setTimeout(function(){
                //     $loader.remove();
                $.ajax({
                    url:"/ajax-paginate-jobseekers?page="+page3,
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
                    url:"{{ route('getPageJobseekers') }}",
                    data:{'pages':pages, limits: limits},
                    success:function(data_s){
                        $('.table-data_s').html(data_s);

                    }
                });
            }

        });

        //end for per page jobseekers

        ////////////////////////////search for job available job////////////////////

        //paginate a jobs paginate jobs
        $(document).on('click','.paginations_ a', function(e){
            e.preventDefault();
             let page4 = $(this).attr('href').split('page=')[1]
               records(page4)

            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function records(page4){
                $.ajax({
                    url:"/ajax-paginate-availablejobs?page="+page4,
                    success:function(res4){
                        $('.table-data_a').html(res4);
                    }
                })
            //}, 300);
          }

        //end paginate a jobs paginate jobs

       //for per page available jobs

         $(document).on('change', '#search_pages_a',function(){
            var pages = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dynamic_contents_a').html(make_skeleton())

                setTimeout(function() {
                        records()
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
           function records(limits){
                $.ajax({
                    type:'GET',
                    url:"{{ route('getPageavailableJobs') }}",
                    data:{'pages':pages, limits: limits},
                    success:function(datas){
                        $('.table-data_a').html(datas);

                    }
                });
            }

        });

        //end for per page available jobs

       // for searching data available jobs
         var query = $('#search_inputs_').val();
        fetch_customer_data(query);

        $(document).on('keyup', '#search_inputs_', function(){
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
            url:"{{ route('getSearchdataAvailablejobs') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {

                $('#dynamic_content_a').html(data.table_data);

             }
            })
        }

       //end for searching data available jobs

     ////////////////////////////search for job available jobseekers////////////////////

        //paginate a jobseekers
        $(document).on('click','.paginations__ a', function(e){
            e.preventDefault();
             let page4 = $(this).attr('href').split('page=')[1]
               records(page4)

            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function records(page4){
                $.ajax({
                    url:"/ajax-paginate-availablejobseekers?page="+page4,
                    success:function(res4){
                        $('.table-data_as').html(res4);
                    }
                })
            //}, 300);
          }

        //end paginate a jobseekers

       //for per page available jobseekers

         $(document).on('change', '#search_pages_as',function(){
            var pages = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dynamic_contents_as').html(make_skeleton())

                setTimeout(function() {
                        records()
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
           function records(limits){
                $.ajax({
                    type:'GET',
                    url:"{{ route('getPageavailableJobs') }}",
                    data:{'pages':pages, limits: limits},
                    success:function(datas){
                        $('.table-data_as').html(datas);

                    }
                });
            }

        });

        //end for per page available jobseekers

       // for searching data available jobseekers
         var query = $('#search_inputs__').val();
        fetch_customer_data(query);

        $(document).on('keyup', '#search_inputs__', function(){
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
            url:"{{ route('getSearchdataAvailablejobseekers') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {

                $('#dynamic_content_as').html(data.table_data);

             }
            })
        }

       //end for searching data available jobseekers


   });

</script>
<script>
     // count text limit 500 contact us
       let limitChar = (element) => {
        const maxChar = 500;

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


          // show password
          document.getElementById("click-check").addEventListener("click", myFunction);
                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            //end show password

              // hide alert

              $(window).bind("load", function() {
                    window.setTimeout(function() {
                        $(".alerts").fadeTo(1000, 0).slideUp(1000, function() {
                            $(this).remove();
                        });
                    }, 1000);
                });
              // hide alert
  </script>
{{-- <script>
    $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }



    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script> --}}

{{-- <script>
    let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
        	next = items[0]
      	}
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})
</script> --}}

{{-- <script>
    $('.carousel .carousel-item').each(function() {
    var minPerSlide = 4;
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
        next = next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
    }
});
</script> --}}
{{-- language translate --}}
<script type="text/javascript">
    $(document).ready(function () {

        $('#francais').on('click', function(e) {
            e.preventDefault();
            var url = "{{ route('changeLang') }}";
            var fr = $(this).data("sname");
            console.log("===========fr=============");
            console.log(fr);
            window.location.href = url + "?lang=" + fr;
        });

        $('#english').on('click', function(e) {
            e.preventDefault();
            var url = "{{ route('changeLang') }}";
            var en = $(this).data("sname2");
            console.log("===========en=============");
            console.log(en);
            window.location.href = url + "?lang=" + en;
        });

    });

    </script>

    {{--end language translate --}}

    <script>
        expiration = new Date;
        expiration.setMonth(expiration.getMonth()+6)
        counter = eval(cookieVal("total_visited"))
        counter++
        document.cookie = "total_visited="+counter+";expires=" + expiration.toGMTString()


        function cookieVal(cookieName) {
            thisCookie = document.cookie.split("; ")
            for (i=0; i<thisCookie.length; i++){
                if (cookieName == thisCookie[i].split("=")[0]){
                    return thisCookie[i].split("=")[1]
                }
            }
            return 0;
        }

        document.getElementById('result_count').innerHTML = counter;

    </script>
</body>

</html>
