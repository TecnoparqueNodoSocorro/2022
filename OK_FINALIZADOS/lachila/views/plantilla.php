<!DOCTYPE html>
<html lang="en">
<?php
//require_once "controllers/caprinocultor_controller.php";

session_start();
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}
if (isset($_SESSION["id_cargo"])) {
    $id_cargo = $_SESSION["id_cargo"];
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Chila</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="styles/styles.css?v=<?php echo (rand()); ?>" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <!-- Sweet alert y grafica -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>

<body>
    <!-- ID DEL EMPLEADO EN CA<MPO OCULTO -->
    <input type="hidden" name="" id="id_userOculto" value="<?php echo $id ?>">

    <!-- ID DEL CARGP EN CAMPO OCULTO -->
    <input type="hidden" name="" id="id_cargoOculto" value="<?php echo $id_cargo ?>">

    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand text-white" href="<?php /*  $id_cargo==2 ? 'index.php?page=a_home':( $id_cargo==1 ? 'index.php?page=e_home':'index.php?page=env_home') */ ?>">Sistema de Gestión</a> -->
            <a class="navbar-brand text-white" href="<?php echo $id_cargo==2 ? 'index.php?page=a_home':'index.php?page=e_home' ?>" >Sistema LaChila</a>

            <!--  <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <div class="boton">
                    <i class="bi bi-chevron-double-left"></i>
                </div>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasNavbarLabel">LaChila</h2>
                    <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                        <div class="botonClose">
                            <i class="bi bi-chevron-double-right"></i>
                        </div>
                    </button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=home"> <i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_gestionUsuarios"> <i class="bi bi-person"></i>
                                Gestión de Usuarios</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase " href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-basket"></i> Lotes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="nav-link sub-nav" onclick="hola()" href="index.php?page=a_gestionLotes">
                                    Gestión de Lotes Administrador</a>

                                <a class="nav-link sub-nav" href="index.php?page=e_gestionLotesUsuarios">
                                    Gestión de Lotes Usuarios</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Informes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=a_informeInvima"> Informe INVIMA</a>
                                <a class=" nav-link sub-nav" href="index.php?page=a_informeLotes">
                                    Informe de Lotes </a>
                            </div>
                        </li>


                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-activity"></i>
                                Registros</a>


                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <div class="dropp">

                                    <a class=" nav-link sub-nav" href="index.php?page=e_registroActividades"></i>
                                        Registro de Actividades </a>

                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=login"><i class="bi bi-box-arrow-left"></i>
                                Cerrar sesión</a>
                        </li>







                    </ul>
                </div>
            </div> -->

            <?php
            $menu = new ControladorUsuarios();
            $menu->ctrMenu();
            ?>
        </div>
    </nav>





    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (

            $_GET["page"] == "a_home" ||
            $_GET["page"] == "a_gestionUsuarios" ||
            $_GET["page"] == "a_gestionLotes" ||
            $_GET["page"] == "e_gestionLotesUsuarios" ||
            $_GET["page"] == "e_registroActividades" ||
            $_GET["page"] == "e_home" ||
            $_GET["page"] == "a_informeInvima" ||
            $_GET["page"] == "a_informeLotes" ||
            $_GET["page"] == "error_credenciales" ||
            // $_GET["page"] == "env_home" ||
            $_GET["page"] == "login"

        ) {
            include "pages/" . $_GET["page"] . ".php";
        } else {
            include "pages/error.php";
        }
    } else {
        include "pages/login.php";
    }
    ?>





    <script src="views/js/js.js"></script>
    <script src="views/js/script.js"></script>
    <script src="views/js/a_gestionLotesAdmin.js"></script>
    <script src="views/js/a_registroUsuarios.js"></script>
    <script src="views/js/a_activarDesactivarUsuarios.js"></script>
    <script src="views/js/a_avanzarLoteDeFase.js"></script>
    <script src="views/js/a_crearLote.js"></script>
    <script src="views/js/a_reporteTemperatura_Humedad.js"></script>
    <script src="views/js/e_postVariables.js"></script>
    <script src="views/js/e_gestionLotesEmp.js"></script>
    <script src="views/js/a_cambioClave.js"></script>

    <script src="views/js/env_envasado.js"></script>
    <script src="views/js/cerrarSesion.js"></script>

    <script src="views/js/a_home.js"></script>



    <script src="views/js/login.js"></script>



    <footer class="footer">

        <p class="navbar-brand" style="font-size: 0.8rem;">Designed by Tecnoparque Nodo Socorro 2022 ©</p>

    </footer>
</body>

</html>