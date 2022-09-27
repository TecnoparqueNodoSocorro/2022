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
    <title>Caprinsoft</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="styles/styles.css?v=<?php echo (rand()); ?>" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- datatable -->
    <link rel="stylesheet" href="views/assets/datatables.min.css">
    <script src="views/assets/pdfmake/pdfmake.min.js"></script>
    <script src="views/assets/pdfmake/vfs_fonts.js"></script>
    <script src="views/assets/datatables.min.js"></script>

    <!--  -->

    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <!-- Sweet alert y grafica -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>



<body>

    <!-- ID DEL EMPLEADO EN CAMPO OCULTO -->
    <input type="hidden" name="" id="id_userOculto" value="<?php echo $id ?>">

    <!-- ID DEL CARGP EN CAMPO OCULTO -->
    <input type="hidden" name="" id="id_cargoOculto" value="<?php echo $id_cargo ?>">

    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="<?php echo $id_cargo == 1 ? 'index.php?page=a_estadoCaprino' : 'index.php?page=c_estadoCaprino' ?>">Gestión Caprina</a>
            <!-- LINKS DEL MENU PARA LOS 3 ROLES -->
            <!-- <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <div class="boton">
                    <i class="bi bi-chevron-double-left"></i>
                </div>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasNavbarLabel">Caprinsoft</h2>
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
                            <a class=" nav-link text-uppercase" href="index.php?page=registroCaprinocultor"> <i class="bi bi-person"></i>
                                Registrar Caprinocultor</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase " href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-list-stars"></i> Reportes</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="nav-link sub-nav" href="index.php?page=reporteCaprinocultores">
                                    Reporte de caprinicultores </a>

                                <a class="nav-link sub-nav" href="index.php?page=reporteControles">
                                    Reporte de controles registrado</a>
                                <a class="nav-link sub-nav" href="index.php?page=reporteHallazgos">
                                    Reporte de tratamientos</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=estadoCaprino"> <i class="bi bi-activity"></i>
                                Estado General Caprino</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Registros</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=registroCaprinos"> Registro de
                                    Caprinos</a>
                                <a class=" nav-link sub-nav" href="index.php?page=registroControlIndividual">
                                    Registro de control Individual </a>
                                <a class=" nav-link  sub-nav" href="index.php?page=registroTratamientos"> Registro de
                                    Tratamientos</a>

                                <a class=" nav-link  sub-nav" href="index.php?page=registroSalidas"> Registro de
                                    Salidas</a>
                                <a class=" nav-link sub-nav" href="index.php?page=registroProduccion">
                                    Registrar Producción </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=login"><i class="bi bi-box-arrow-right"></i>   
                                cerrar sesión</a>
                        </li>



                       
                    </ul>
                </div>
            </div> -->

            <?php
            $menu = new ControladorCaprinocultor();
            $menu->ctrMenu();
            ?>
        </div>
    </nav>





    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (

            $_GET["page"] == "home" ||
            $_GET["page"] == "a_registroCaprinocultor" ||
            $_GET["page"] == "a_reporteCaprinocultores" ||
            $_GET["page"] == "a_reporteControles" ||
            $_GET["page"] == "a_reporteTratamientos" ||
            $_GET["page"] == "a_estadoCaprino" ||
            $_GET["page"] == "c_estadoCaprino" ||
            $_GET["page"] == "c_registroProduccion" ||
            $_GET["page"] == "c_registroSalidas" ||
            $_GET["page"] == "c_registroTratamientos" ||
            $_GET["page"] == "c_registroControlIndividual" ||
            $_GET["page"] == "c_registroCaprinos" ||
            $_GET["page"] == "c_reporteControles" ||
            $_GET["page"] == "c_reporteTratamientos" ||
            $_GET["page"] == "c_reporteProduccion" ||
            $_GET["page"] == "c_reporteCaprinos" ||
            $_GET["page"] == "c_reporteSalidas" ||
            $_GET["page"] == "error_credenciales" ||
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




    <script src="views/js/a_registroCaprinocultor.js"></script>
    <script src="views/js/a_reporteControles.js"></script>
    <script src="views/js/a_reporteTratamientos.js"></script>
    <script src="views/js/a_cambioClave.js"></script>

    <script src="views/js/c_reporteTratamientos.js"></script>
    <script src="views/js/c_registroCaprinos.js"></script>
    <!-- <script src="views/js/js.js"></script> -->
    <script src="views/js/login.js"></script>
    <script src="views/js/c_reporteControles.js"></script>
    <script src="views/js/c_controlIndividual.js"></script>
    <script src="views/js/c_registroTratamientos.js"></script>
    <script src="views/js/c_registroSalidas.js"></script>
    <script src="views/js/c_registrarProduccion.js"></script>
    <script src="views/js/c_reporteProduccion.js"></script>

 

    <!-- <script src="views/js/c_picklist.js"></script> -->



    <footer class="footer">

        <p class="navbar-brand mb-3" style="font-size: 0.8rem;">Designed by Tecnoparque Nodo Socorro 2022 ©</p>


    </footer>
</body>

</html>