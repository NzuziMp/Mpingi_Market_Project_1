@include('mainindex.modal.contactmemodal')
<footer class="mainfooter" role="contentinfo">
    <div class="py-3 container-fluid"
        style="background-color:#282828;  font: 10pt/130% Arial;
    font-family:Arial; color:#fff">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <i class="fa fa-paper-plane"></i> contact@mpingimarket.com <i class="fa fa-users"></i> 
                
                @if(session()->get('locale') === 'fr')  Visiteurs:  @else Visitors:  </span>@endif <span id="result_count" style="color:#fff;font-weight:bold">
        

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
                                <div id="guestMessage"></div>
                                @csrf
                                <div class="form-group">
                                    <input class="form-control form-control-lg name" type="text" placeholder="@if(session()->get('locale') === 'fr') Nom @else Name @endif"
                                        aria-label=".form-control-lg example" id="borderinput2">
                                        <span class="text-danger" id="nameMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg email2" type="email" placeholder="@if(session()->get('locale') === 'fr') Email @else E-mail @endif"
                                        aria-label=".form-control-lg example"  id="borderinput2">
                                        <span class="text-danger" id="emailMessage"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-lg subject" type="text" placeholder="@if(session()->get('locale') === 'fr') Sujet @else Subject @endif"
                                        aria-label=".form-control-lg example" id="borderinput2">
                                        <span class="text-danger" id="subjectMessage"></span>
                                </div>
                                <div class="form-group">
                                    <textarea rows="3" class="form-control form-control-lg message" type="text" placeholder="@if(session()->get('locale') === 'fr') Message @else Message @endif"
                                        aria-label=".form-control-lg example" id="borderinput2"></textarea>
                                        <span class="text-danger" id="messageMessage"></span>
                                </div>
                                <div class="form-group" style="margin-bottom:10%">


                                    <button type="button" class="float-end btn btn-outline-warning btn-lg btnColor"
                                        value="SEND MESSAGE" id="btn-message">
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
<script src="{{ asset('assets/plugin/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugin/dist/aos.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
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
            url:'get-states-by-country/'+id,
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
            url:'get-states-by-state/'+id,
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

        // for ads sidebar carousel
        var myIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000);
        }

        //end for ads sidebar carousel


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
                    url:"/ajax-paginate?page="+page,
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
        var query = $('#search_inputs').val();
        fetch_customer_data1(query);

        $(document).on('keyup', '#search_inputs', function(){
            var query = $(this).val();
            if(query == ''){
                record();
            }
            fetch_customer_data1(query);
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        function fetch_customer_data1(query = '') {
            $.ajax({
            url:"{{ route('getSearchdata') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data1) {

                $('#dynamic_content').html(data1.table_data);
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
                    url:"{{ route('getPage') }}",
                    data:{'pages':pages, limit: limit},
                    success:function(data){
                        $('.table-data').html(data);

                    }
                });
            }

        });

        //end for per page

        // ======================================view country product========================

             //for pagination
             $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            $('#dynamic_contentp').html(make_skeleton())
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
                    url:"/country/products/paginate/country/product?page="+page,
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
            url:"{{ route('getsearchcountryproduct') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data) {

                $('#dynamic_contentp').html(data.table_data);
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

            $('#dynamic_contentp').html(make_skeleton())

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
                    url:"{{ route('getperpagecountryproduct') }}",
                    data:{'pages':pages, limit: limit},
                    success:function(data){
                        $('.table-data').html(data);

                    }
                });
            }

        });

        //end for per page
    // ======================================end view country product========================

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

        //end for remove card as temporary

        // scrollTop
      $(window).scroll(function() {
            // scrollToTop is not a function - changed to scrollTop
            if ($(this).scrollTop() > 75) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        }).trigger('scroll');
      //end   scrollTop

    //
      $(window).scroll(function() {
            // scrollTbelow is not a function - changed to scrollTbelow
            if ($(this).scrollTop() < 5) {
                $('.d-lg-none').fadeIn();
            } else {
                $('.d-lg-none').fadeOut();
            }
        }).trigger('scroll');

    //



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

            });
     //end mobile navigation
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


    //this function used to move the items
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
</script>
<script>
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
</script>

<script>
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


<script>

    $(document).ready(function() {
        $('#btn-message').click(function(e) {
            e.preventDefault();
            var name = $('.name').val();
            console.log("=============name===========");
            console.log(name);

            var email = $('.email2').val();
            console.log("=============email===========");
            console.log(email);

            var subject = $('.subject').val();
            console.log("=============subject===========");
            console.log(subject);

            var message = $('.message').val();
            console.log("=============message===========");
            console.log(message);


            $.ajax({
                url: "",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    subject: subject,
                    message: message
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        $('#guestMessage').html('<div class="alert alert-success">Send successful!</div>');
                        window.location.href = "{{ route('mainIndex') }}";
                    }
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';

                    if (errors.name) {
                        $('#nameMessage').html(errors.name[0]);
                    }

                    if (errors.email) {
                        $('#emailMessage').html(errors.email[0]);
                    }

                    if (errors.subject) {
                        $('#subjectMessage').html(errors.subject[0]);
                    }

                    if (errors.message) {
                        $('#messageMessage').html(errors.message[0]);
                    }
                }
            });
        });
    });

</script>

</body>

</html>
