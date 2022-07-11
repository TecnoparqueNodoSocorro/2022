<?php
require_once "views/pages/floristeria_decoracion.php";
require_once "views/pages/tarjetas.php";
require_once "views/pages/anillos_accesorios.php";
require_once "views/pages/animacion.php";
require_once "views/pages/bebidas_licores.php";
require_once "views/pages/chef_pasteleros.php";
require_once "views/pages/iglesias_hoteles.php";
require_once "views/pages/maquillaje_peinado.php";
require_once "views/pages/planeadores.php";
require_once "views/pages/vestidos.php";
require_once "views/pages/video_fotografia.php";
require_once "views/pages/zapatos_recordatorios.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav class="menu">
            <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
            <img src="" alt="">
            <label class="menu-open-button" for="menu-open">
                <img src="images/logo2.png" alt="" class="logo" id="primero" style="visibility:visible; display:block;" onclick="visualiza_segundo()">
                <img src="images/logo3.jpg" alt="" class="logo2" id="segundo" style="visibility:hidden; display:none;" onclick="visualiza_primero()">

            </label>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_3"><img
                    class="image" src="images/calzado.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_5"><img
                    class="image" src="images/tortas.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_7"> <img class="image"
                    src="images/viajes.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_9"><img
                    class="image" src="images/bebidas.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_11"><img
                    class="image" src="images/anillo.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_1"> <img
                    class="image" src="images/decoracionflores.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_4"><img
                    class="image" src="images/grabaciones.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_10"><img
                    class="image" src="images/vestidos.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_2"><img
                    class="image" src="images/invitaciones.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_6"><img
                    class="image" src="images/iglesias.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_8"><img
                    class="image" src="images/decoracion.png " alt=""></a>

            <a type="button" class="menu-item tranparente" data-bs-toggle="modal" data-bs-target="#modal_12"><img
                    class="image" src="images/trajehombre.png " alt=""></a>

        </nav>

    </div>






    <script src="views/js/script.js"></script>
    <script type="text/javascript">
      function visualiza_primero() {
         document.getElementById('primero').style.visibility='visible';
         document.getElementById('primero').style.display='block';
         document.getElementById('segundo').style.visibility='hidden';
         document.getElementById('segundo').style.display='none';
      };
      function visualiza_segundo() {
         document.getElementById('segundo').style.visibility='visible';
         document.getElementById('segundo').style.display='block';
         document.getElementById('primero').style.visibility='hidden';
         document.getElementById('primero').style.display='none';
      };
   </script>
</body>

</html>