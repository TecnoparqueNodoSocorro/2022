<!doctype html>
<html lang="en">
<?php
//require_once "controllers/caprinocultor_controller.php";

session_start();

if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
if (isset($_SESSION["rol"])) {
    $id_cargo = $_SESSION["rol"];
};

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bariturismo</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNwjb8sRHTavZOap3RKPwVsOyAwo8nDXw&callback=iniciarMap"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </script>


    <link rel="stylesheet" href="views/css/styles.css">
    <link rel="stylesheet" href="views/css/menuflotante.css">
    <!-- Sweet alert y grafica -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home"><i class="bi bi-house"></i> FuturismoBari </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                        <div class="botonClose">
                            <i class="bi bi-x-circle-fill"></i>
                        </div>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=home"><i class="bi bi-house-fill"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=acercade"><i class="bi bi-info-square-fill"></i> Acerca de ...</a>
                        </li>

                        <li class="nav-item" style="display: <?php echo (isset($_SESSION["rol"])) ? 'none' : 'block' ?>;">
                            <a class="nav-link active" href="index.php?page=login"><i class="bi bi-door-open-fill"></i> Login</a>
                        </li>
                        <!-- 
                         <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=admin">Administracion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=publicaciones">publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=home">home</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" id="btnCerrarSesion" href="#">Cerrar sesión</a>
                        </li> -->
                        <?php
                        $menu = new ControladorUsuarios();
                        $menu->ctrMenu();
                        ?>
                    </ul>

                </div>
            </div>

        </div>
    </nav>

    <?php
    if (isset($_GET["page"])) {
        if (
            $_GET["page"] == "admin" ||
            $_GET["page"] == "acercade" ||
            $_GET["page"] == "publicaciones" ||
            $_GET["page"] == "home" ||
            $_GET["page"] == "login" ||
            $_GET["page"] == "historia" ||
            $_GET["page"] == "turismo" ||
            $_GET["page"] == "restaurantes" ||
            $_GET["page"] == "hospedajes" ||
            $_GET["page"] == "agregar_articulo" ||
            $_GET["page"] == "generales"
        ) {
            include "pages/" . $_GET["page"] . ".php";
        } else {
            include "pages/error.php";
        }
    } else {
        include "pages/home.php";
    }

    ?>

    <!--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
 -->
    <script src="views/js/login.js"></script>
    <script src="views/js/cerrarSesion.js"></script>
    <script src="views/js/mapa.js"></script>
    <script src="views/js/agregar_articulo.js"></script>
    <script src="views/js/articulo.js"></script>





    <script src="views/js/menu.js"></script>
    <footer class="footer">

        <p class="navbar-brand" style="font-size: 0.8rem;"><strong> Designed by Tecnoparque Nodo Socorro 2022 ©</strong></p>

    </footer>
</body>

</html>