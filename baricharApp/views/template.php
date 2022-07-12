<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="SindevoThemes" />
    <meta name="description" content="Get in the spotlight" />
    <meta name="keywords" content="premium css templates, premium wordpress themes, wedding themes, themeforest" />
    <title>local | BaricharApp</title>
    <link rel="stylesheet" type="text/css" media="all" href="views/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="views/colors/blue.css" />
    <link rel="stylesheet" href="views/css/carousel.css">
    <link href='http://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <!-- boostrap -->
    <!-- CSS only -->
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <!-- boostrapmenu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link rel="stylesheet" href="views/css/styles.css" />
</head>

<body>
    <div id="main_container">

        <a class="show_menu" href="#"><img src="views/images/mobile_menu_open.png" alt="" title="" /></a>
        <a class="hide_menu" href="#"><img src="views/images/mobile_menu_close.png" alt="" title="" /></a>

        <nav class="menu">
            <ul id="main_menu">
                <li><a class="selected" href="index.html">HOME</a></li>
                <li><a href="page.html">DIVERSION</a>
                    <ul>
                        <li><a href="page.html">Planes</a></li>
                        <li><a href="page.html">Eventos</a></li>
                        <li><a href="page.html">Pride</a></li>
                        <li><a href="page.html">Festivales</a></li>
                        <li><a href="page.html">Cruceros</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">CULTURAL</a></li>
                <li><a href="photos.html">SERVICIOS</a>
                    <ul>
                        <li><a href="page.html">Concierge</a></li>
                        <li><a href="page.html">Hoteles</a></li>
                        <li><a href="page.html">Oasis</a></li>
                        <li><a href="page.html">Toures</a></li>
                        <li><a href="page.html">Autos</a></li>
                        <li><a href="page.html">Wedding Planner</a></li>
                    </ul>
                </li>
                <li><a href="rsvp.html">REGISTRO</a>
                    <ul>
                        <li><a href="page.html">proveedor de servicios</a></li>

                    </ul>
                </li>
                <li><a href="contact.html">BLOG</a></li>
                <li><a href="contact.html">INICIAR SESION</a></li>
            </ul>
        </nav>

        <div class="title_container">

   <!--          <div class="title_front">BARICHARAPP</div> -->
        


            <!--  INICIO MENU POPUP-->
            <div class="container mt-5">
              
                <nav class="menu_popup">
                    <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
                    <img src="" alt="">
                    <label class="menu-open-button" for="menu-open">
                        <img src="views/images/menupopup/logo2.png" alt="" class="logo" id="primero" style="visibility:visible; display:block;" onclick="visualiza_segundo()">
                        <img src="views/images/menupopup/logo3.jpg" alt="" class="logo2" id="segundo" style="visibility:hidden; display:none;" onclick="visualiza_primero()">

                    </label>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_3"><img class="image" src="views/images/menupopup/anillo.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_5"><img class="image" src="views/images/menupopup/tortas.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_7"> <img class="image" src="views/images/menupopup/viajes.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_9"><img class="image" src="views/images/menupopup/bebidas.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_11"><img class="image" src="views/images/menupopup/anillo.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_1"> <img class="image" src="views/images/menupopup/decoracionflores.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_4"><img class="image" src="views/images/menupopup/grabaciones.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_10"><img class="image" src="views/images/menupopup/vestidos.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_2"><img class="image" src="views/images/menupopup/invitaciones.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_6"><img class="image" src="views/images/menupopup/iglesias.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_8"><img class="image" src="views/images/menupopup/decoracion.png " alt=""></a>

                    <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_12"><img class="image" src="views/images/menupopup/trajehombre.png " alt=""></a>

                </nav>

            </div>
            <!-- FIN MENU POPUP -->
         

        </div>

        <div class="slider_container">
            <div class="slider_trans_black"></div>
            <div id="random">
                <div style="background-image: url(views/images/slider/slide1.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide2.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide3.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide4.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide5.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide6.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide7.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide8.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide9.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide10.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide11.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide12.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide13.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide14.jpg);"></div>
                <div style="background-image: url(views/images/slider/slide15.jpg);"></div>
            </div>
        </div>
        <!--    <div class="countdown_container">
            <h2 class="centered_title">Countdown to Wedding Ceremony</h2>
            <div id="defaultCountdown"></div>
            <div class="rsvp_button"><span class="swirl_left_small"><span class="swirl_right_small"><a href="#">RSVP</a></span></span></div>
      
        </div> -->


        <div class="countdown_container">

            <div class="videocontainer">
                <h5 style="text-align:center ;">Quienes Somos?</h2>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="footer_socials">
                                    <ul>
                                        <li><a href="https://twitter.com/PropuestaDMatri" target="_blank"><img src="views/images/social/twitter.png" alt="" title="" /></a></li>
                                        <li><a href="https://www.facebook.com/expobodasbarichara/" target="_blank"><img src="views/images/social/facebook.png" alt="" title="" /></a></li>
                                        <li><a href="https://www.instagram.com/expobodasbarichara/" target="_blank"><img src="views/images/social/instagram.png" alt="" title="" /></a></li>
                                        <li><a href="https://www.youtube.com/channel/UCBx4pFER775V_jBuQ6nhOBQ" target="_blank"><img src="views/images/social/youtube.png" alt="" title="" /></a></li>
                                        <li><a href="https://www.tiktok.com/expobodasbarichara/" target="_blank"><img src="views/images/social/tiktok.png" alt="" title="" /></a></li>
                                        <li><a href="whap" target="_blank"><img src="views/images/social/whapsap.png" alt="" title="" /></a></li>
                                        <li><a href="https://www.matrimonio.com.co/wedding-planner/propuesta-de-matrimonio--e118629" target="_blank"><img src="views/images/social/matrimonios.png" alt="" title="" /></a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-8"> <iframe width="100%" height="550" src="http://www.youtube.com/embed/bwJWYlS-wnE" frameborder="0"></iframe></div>
                            <div class="col-12 col-md-2">
                                <ul>
                                    <li>
                                        <div class="title2">Bienestar</div>
                                    </li>
                                    <li>
                                        <div class="title2">Amor</div>
                                    </li>
                                    <li>
                                        <div class="title2">Responsabilidad</div>
                                    </li>
                                    <li>
                                        <div class="title2">Innovacion</div>
                                    </li>
                                    <li>
                                        <div class="title2">Cultura</div>
                                    </li>
                                    <li>
                                        <div class="title2">Historia</div>
                                    </li>
                                    <li>
                                        <div class="title2">Alma</div>
                                    </li>
                                    <li>
                                        <div class="title2">Respeto</div>
                                    </li>
                                    <li>
                                        <div class="title2">Atencion</div>
                                    </li>
                                    <li>
                                        <div class="title2">Posicionamiento</div>
                                    </li>
                                    <li>
                                        <div class="title2">Paz</div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
            </div>

        </div>




        <div class="carousel_container">
            <div class="carousel_container_image">
                <div class="full_width_carousel">
                    <h2>PLANES Y SERVICIOS BARICHARA</h2>
                    <span class="carousel_titles">Alma Herencia &amp; Encanto</span>
                    <div id="weddingcarousel" class="owl-carousel">
                        <div class="left14"><img src="views/images/planesyservicios/barichara.png" alt="" title="" />
                            <h3>BARICHARA </h3>
                        </div>
                        <div class="left14"><img src="views/images/planesyservicios/planest.png" alt="" title="" />
                            <h3>PLANES </h3>
                        </div>
                        <div class="left14"><img src="views/images/planesyservicios/promociones.png" alt="" title="" />
                            <h3>PROMOCIONES</h3>
                        </div>
                        <div class="left14_last"><img src="views/images/planesyservicios/vacaciones.png" alt="" title="" />
                            <h3>VACACIONES</h3>
                        </div>
                        <div class="left14"><img src="views/images/planesyservicios/lunademiel.png" alt="" title="" />
                            <h3>LUNA DE MIEL</h3>
                        </div>
                        <div class="left14"><img src="views/images/planesyservicios/tours.png" alt="" title="" />
                            <h3>TOUR DE ENTRETENIMIENTO</h3>
                        </div>
                        <div class="left14"><img src="views/images/planesyservicios/bodas.png" alt="" title="" />
                            <h3>BODAS</h3>
                        </div>
                        <div class="left14_last"><img src="views/images/planesyservicios/turismo.png" alt="" title="" />
                            <h3>TURISMO</h3>
                        </div>
                    </div>
                    <div class="view_all_carousel"><a href="bridesmaids.html">COTIZA TU BODA AQUI!!!</a></div>
                </div>
            </div>
        </div>

        <div class="full_width_centered">
            <div class="latest_posts">
                <h2>ENTERATE DE MUCHO MAS DE NUESTROS PROVEEDORES</h2>
                <div class="left13">
                    <div class="latest_post">
                        <div class="post_info">

                            <h3><a href="blog-single.html">PROPUESTAS DE MATRIMONIO</a></h3>
                            <a href="blog-single.html" class="post_read_more">Ver Mas</a>
                        </div>
                        <img src="views/images/web/proveedores/propuestas.png" alt="" title="" />
                    </div>
                </div>
                <div class="left13">
                    <div class="latest_post">
                        <div class="post_info">

                            <h3><a href="blog-single.html">CHEFF Y PASTELEROS</a></h3>
                            <a href="blog-single.html" class="post_read_more">Ver Mas</a>
                        </div>
                        <img src="views/images/web/proveedores/pasteleros.png" alt="" title="" />
                    </div>
                </div>
                <div class="left13_last">
                    <div class="latest_post">
                        <div class="post_info">

                            <h3><a href="blog-single.html">HOTELES DE ENSUEÑO</a></h3>
                            <a href="blog-single.html" class="post_read_more">Ver Mas</a>
                        </div>
                        <img src="views/images/web/proveedores/hoteles.png" alt="" title="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="full_width_centered">
            <div class="latest_posts">

                <div class="left13">
                    <div class="latest_post">
                        <div class="post_info">

                            <h3><a href="blog-single.html">GASTRONOMIA BODAS</a></h3>
                            <a href="blog-single.html" class="post_read_more">Ver Mas</a>
                        </div>
                        <img src="views/images/web/proveedores/gastronomia.png" alt="" title="" />
                    </div>
                </div>
                <div class="left13">
                    <div class="latest_post">
                        <div class="post_info">

                            <h3><a href="blog-single.html">DISEÑADORES</a></h3>
                            <a href="blog-single.html" class="post_read_more">Ver Mas</a>
                        </div>
                        <img src="views/images/web/proveedores/disenadores.png" alt="" title="" />
                    </div>
                </div>
                <div class="left13_last">
                    <div class="latest_post">
                        <div class="post_info">

                            <h3><a href="blog-single.html">CRUCEROS</a></h3>
                            <a href="blog-single.html" class="post_read_more">Ver Mas</a>
                        </div>
                        <img src="views/images/web/proveedores/cruceros.png" alt="" title="" />
                    </div>
                </div>


                <a href="blog.html" class="view_all">VER TODOS NUESTROS PROVEEDORES</a>
                <div class="clear"></div>
            </div>
        </div>




        <div class="footer">
            <div class="full_width_centered">
                <div class="footer_sign"><span class="swirl_left_transparent"><span class="swirl_right_transparent"><img src="views/images/birds_icon.png" alt="" title="" /></span></span></div>
                <div class="footer_names">BaricharApp</div>

                <nav class="footer_menu">
                    <ul>
                        <!--              <li><a href="index.html" class="selected">HOME</a></li> -->

                        <li><a onClick="jQuery('html, body').animate( { scrollTop: 0 }, 'slow' );" href="javascript:void(0);" class="gotop" title="Go on top">TOP</a> </li>
                    </ul>


            </div>

            </nav>
        </div>

    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="views/js/jquery-1.11.1.min.js"></script>
    <!-- SLIDER -->
    <script type="text/javascript" src="views/js/jquery.skippr.js"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $("#random").skippr({
                navType: 'bubble',
                transition: 'fade',
                autoPlay: true,
                autoPlayDuration: 4000,
                speed: 1000,
                arrows: false
            });
            $("#weddingcarousel").owlCarousel({
                items: 4,
                itemsScaleUp: true,
                navigationText: ["prev", "next"]
            })
        });
    </script>
    <script src="views/js/owl.carousel.js"></script>
    <!-- DropDownMenu -->
    <script type="text/javascript" src="views/js/menu.js"></script>
    <script type="text/javascript" src="views/js/effects.js"></script>
    <script type="text/javascript" src="views/js/jquery.arctext.js"></script>
    <script type="text/javascript" src="views/js/jquery.countdown.js"></script>

    <!-- js menu inicio -->

    <script type="text/javascript">
        function visualiza_primero() {
            document.getElementById('primero').style.visibility = 'visible';
            document.getElementById('primero').style.display = 'block';
            document.getElementById('segundo').style.visibility = 'hidden';
            document.getElementById('segundo').style.display = 'none';
        };

        function visualiza_segundo() {
            document.getElementById('segundo').style.visibility = 'visible';
            document.getElementById('segundo').style.display = 'block';
            document.getElementById('primero').style.visibility = 'hidden';
            document.getElementById('primero').style.display = 'none';
        };
    </script>
    <!-- js menu fin -->

    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(window).load(function() {
            "use strict";
            var $titlefront = $('.title_front').hide();
            var $titleunder = $('.title_under').hide();
            var $bestman = $('.bestman span').hide();
            var $footernames = $('.footer_names').hide();

            $titlefront.show().arctext({
                radius: 250
            });
            $titleunder.show().arctext({
                radius: 180,
                dir: -1
            });
            $bestman.show().arctext({
                radius: 80
            });
            $footernames.show().arctext({
                radius: 120,
                dir: -1
            });

            $('#defaultCountdown').countdown({
                until: new Date(2017, 8 - 1, 20, 15),
                format: 'y-o-d-h'
            });

        });
    </script>
    <script type="text/javascript">
        var main_menu = new main_menu.dd("main_menu");
        main_menu.init("main_menu", "menuhover");
    </script>
</body>

</html>