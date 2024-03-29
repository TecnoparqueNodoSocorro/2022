<?php
require_once "controllers/controller_proveedores.php";
session_start();
if (isset($_SESSION["id"])) {
    $userid = $_SESSION["id"];
}
if (isset($_SESSION["id_cargo"])) {
    $id_cargo = $_SESSION["id_cargo"];
}
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
}
if (isset($_SESSION["validar_ingreso"])) {
    $validaringreso = $_SESSION["validar_ingreso"];
}

/* echo $userid;
echo $id_cargo;
echo $usuario;
echo $validaringreso; */


?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="tecnoparque nodo socorro" />
    <meta name="description" content="plataforma de gestion de bodas en barichara" />
    <meta name="keywords" content="premium css templates, premium wordpress themes, wedding themes, themeforest" />
    <title>Administracion | BaricharApp</title>
    <link rel="stylesheet" type="text/css" media="all" href="views/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="views/colors/red.css" />
    <link rel="stylesheet" href="views/css/carousel.css">
    <link href='http://fonts.googleapis.com/css?family=Clicker+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
    <!-- boostrap -->
    <!-- CSS only -->
    <!-- boostrapmenu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="views/css/styles.css" />

    <!-- Sweet alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>


    <a class="show_menu" href="#"><img src="views/images/mobile_menu_open.png" alt="" title="" /></a>
    <a class="hide_menu" href="#"><img src="views/images/mobile_menu_close.png" alt="" title="" /></a>

    <nav class="menu">
        <ul id="main_menu">
            <li><a class="selected" href="admin.php?page=ahome">HOME</a></li>
            <li><a href="admin.php?page=g_proveedores">Proveedores</a></li>
            <!--        <li><a href="admin.php?page=g_solicitudes">Solicitudes</a></li> -->
            <li><a href="admin.php?page=g_pagina">Pagina</a></li>
            <li id="btnCerrarSesionAdmin"><a>Cerrar sesion</a></li>
        </ul>
    </nav>


    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (

            $_GET["page"] == "ahome" ||
            $_GET["page"] == "g_proveedores" ||
            $_GET["page"] == "g_solicitudes" ||
            $_GET["page"] == "g_pagina" ||
            $_GET["page"] == "error_credenciales" ||
            $_GET["page"] == "home"


        ) {
            include "pages/administracion/" . $_GET["page"] . ".php";
        } else {
            include "pages/front/error.php";
        }
    } else {
        include "pages/login.php";
    }
    ?>


    <div class="footer">
        <div class="full_width_centered">
            <!-- <div class="footer_sign"><span class="swirl_left_transparent"><span class="swirl_right_transparent"><img src="views/images/birds_icon.png" alt="" title="" /></span></span></div> -->
            <div class="footer_names">BaricharApp</div>



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
    <!-- js propios -->
    <script src="views/js/bari_pagina.js"></script>
    <script src="views/js/bari_user.js"></script>
    <script src="views/js/bari_proveedores.js"></script>

    <script src="views/js/cerrarSesion.js"></script>

</body>


</html>