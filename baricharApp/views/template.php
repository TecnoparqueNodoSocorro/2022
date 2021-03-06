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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    <link rel="stylesheet" href="views/css/styles.css" />
</head>

<body>


    <a class="show_menu" href="#"><img src="views/images/mobile_menu_open.png" alt="" title="" /></a>
    <a class="hide_menu" href="#"><img src="views/images/mobile_menu_close.png" alt="" title="" /></a>

    <nav class="menu">
        <ul id="main_menu">
            <li><a class="selected" href="index.php?page=home">HOME</a></li>
            <li><a href="page.html">DIVERSION</a>
                <ul>
                    <li><a href="page.html">Planes</a></li>
                    <li><a href="page.html">Eventos</a></li>
                    <li><a href="page.html">Pride</a></li>
                    <li><a href="page.html">Festivales</a></li>
                    <li><a href="page.html">Cruceros</a></li>
                </ul>
            </li>
            <li><a href="index.php?page=productos">PRODUCTOS</a></li>

            <li><a href="index.php?page=agregar_empresa">AGREGAR EMPRESA</a></li>
           

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
           
            <li><a href="index.php?page=login">INICIAR SESION</a></li>
        </ul>
    </nav>


    <!-- Redireccinar url por variable -->
    <?php
                    if (isset($_GET["page"])) {

                        if (
                
                        $_GET["page"] == "home" ||
                        $_GET["page"] == "login" ||
                        $_GET["page"] == "agregar_productos" ||
                        $_GET["page"] == "productos" ||

                        $_GET["page"] == "agregar_empresa"

                
                        
                        ) {
                        include "pages/" . $_GET["page"] . ".php";
                        } else {
                        include "pages/error.php";
                        }
                } 
                else {
                    include "pages/login.php";
                }
                ?>


    <div class="footer">
        <div class="full_width_centered">
            <div class="footer_sign"><span class="swirl_left_transparent"><span class="swirl_right_transparent"><img
                            src="views/images/birds_icon.png" alt="" title="" /></span></span></div>
            <div class="footer_names">BaricharApp</div>

            <nav class="footer_menu">
                <ul>
                    <!--              <li><a href="index.html" class="selected">HOME</a></li> -->

                    <li><a onClick="jQuery('html, body').animate( { scrollTop: 0 }, 'slow' );"
                            href="javascript:void(0);" class="gotop" title="Go on top">TOP</a> </li>
                </ul>
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

<!-- js con los datos de los formularios -->
    <script type="text/javascript" src="views/js/script.js"></script>

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