<?php
require_once "views/pages/modal.php";


?>
<!--          <div class="title_front">BARICHARAPP</div> -->



<!--  INICIO MENU POPUP-->

<div class="title_container">
    <div class="container_menupopup">

        <nav class="menu_popup">
            <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
            <img src="" alt="">
            <label class="menu-open-button" for="menu-open">
                <img src="views/images/menupopup/logo2.png" alt="" class="logo" id="primero"
                    style="visibility:visible; display:block;" onclick="visualiza_segundo()">
                <img src="views/images/menupopup/logo3.jpg" alt="" class="logo2" id="segundo"
                    style="visibility:hidden; display:none;" onclick="visualiza_primero()">

            </label>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/anillo.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/tortas.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"> <img
                    class="image" src="views/images/menupopup/viajes.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/bebidas.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/anillo.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"> <img
                    class="image" src="views/images/menupopup/decoracionflores.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/grabaciones.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/vestidos.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/invitaciones.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/iglesias.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/decoracion.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal"><img
                    class="image" src="views/images/menupopup/trajehombre.png " alt=""></a>

        </nav>

    </div>
    <!-- FIN MENU POPUP -->


</div>

<div class="slider_container">
    <div class="slider_trans_black"></div>
    <div id="random">
        <div style="background-image: url(views/images/slider/slide1.jpg);"></div>
        <div style="background-image: url(views/images/slider/boda_1.jpg);"></div>
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
        <h5 style="text-align:center ;" class="text-light">Quienes Somos?</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="footer_socials">
                            <ul>
                                <li><a href="https://twitter.com/PropuestaDMatri" target="_blank"><img
                                            src="views/images/social/twitter.png" alt="" title="" /></a></li>
                                <li><a href="https://www.facebook.com/expobodasbarichara/" target="_blank"><img
                                            src="views/images/social/facebook.png" alt="" title="" /></a></li>
                                <li><a href="https://www.instagram.com/expobodasbarichara/" target="_blank"><img
                                            src="views/images/social/instagram.png" alt="" title="" /></a></li>
                                <li><a href="https://www.youtube.com/channel/UCBx4pFER775V_jBuQ6nhOBQ"
                                        target="_blank"><img src="views/images/social/youtube.png" alt=""
                                            title="" /></a></li>
                                <li><a href="https://www.tiktok.com/expobodasbarichara/" target="_blank"><img
                                            src="views/images/social/tiktok.png" alt="" title="" /></a></li>
                                <li><a href="whap" target="_blank"><img src="views/images/social/whapsap.png" alt=""
                                            title="" /></a></li>
                                <li><a href="https://www.matrimonio.com.co/wedding-planner/propuesta-de-matrimonio--e118629"
                                        target="_blank"><img src="views/images/social/matrimonios.png" alt=""
                                            title="" /></a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-8"> <iframe width="100%" height="550"
                            src="http://www.youtube.com/embed/bwJWYlS-wnE" frameborder="0"></iframe></div>
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

                    <h3><a href="blog-single.html">HOTELES DE ENSUE??O</a></h3>
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

                    <h3><a href="blog-single.html">DISE??ADORES</a></h3>
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