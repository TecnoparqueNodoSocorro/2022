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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industrias Mogotes</title>
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
</head>

<body>

    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php?page=home">Industrias Mogotes</a>
              <!--  <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                 <div class="boton">
                    <i class="bi bi-chevron-double-left"></i>
                 </div>
                    </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h2 class="offcanvas-title" id="offcanvasNavbarLabel">Industrias Mogotes</h2>
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
                            <a class=" nav-link text-uppercase" href="index.php?page=a_registrarEmpleado"> <i class="bi bi-person"></i>
                                Registrar Empleado</a>
                        </li>

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=recepcionGuayaba"> <i class="bi bi-activity"></i>
                                Recepción</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=escaldado"> <i class="bi bi-person"></i>
                                Escaldado</a>
                        </li>

                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Reporte de Producción</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=reporteBocadillo"> Bocadillo </a>


                                <a class=" nav-link  sub-nav" href="index.php?page=reporteEspejuelo"> Espejuelo</a>


                                <a class=" nav-link  sub-nav" href="index.php?page=reporteArequipe"> Arequipe mogoticos</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_registroEmbalaje"> <i class="bi bi-person"></i>
                                Embalaje</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Informes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=a_informe"> Registro de
                                    Informe de ...</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"> <i class="bi bi-person"></i>
                                Cerrar Sesión</a>
                        </li>




                    </ul>
                </div>
            </div>
             -->

             <?php
            $menu = new ControladorUsuario();
            $menu->ctrMenu();
            ?>
        </div>
    </nav>





    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (

            $_GET["page"] == "home" ||
            $_GET["page"] == "a_registrarEmpleado" ||
            $_GET["page"] == "a_recepcionGuayaba" ||
            $_GET["page"] == "escaldado" ||
            $_GET["page"] == "reporteProduccion" ||
            $_GET["page"] == "reporteBocadillo" ||
            $_GET["page"] == "reporteArequipe" ||
            $_GET["page"] == "reporteEspejuelo" ||
            $_GET["page"] == "a_registroEmbalaje" ||
            $_GET["page"] == "a_informe" ||
            

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




    <script src="views/js/a_registroEmbalaje.js"></script>
    <script src="views/js/a_registroEmpleado.js"></script>
    <script src="views/js/a_activarDesactivarUsuarios.js"></script>
    <script src="views/js/a_cambioClave.js"></script>
    <script src="views/js/a_recepcionGuayaba.js"></script>

    <script src="views/js/escaldadoGuayaba.js"></script>
    <script src="views/js/login.js"></script>
    <script src="views/js/reporteArequipe.js"></script>
    <script src="views/js/reporteBocadilllo.js"></script>
    <script src="views/js/reporteEspejuelo.js"></script>
    <script src="views/js/cerrarSesion.js"></script>







    <footer class="footer">

        <p class="footerText mb-3" >Designed by Tecnoparque Nodo Socorro 2022 ©</p>


    </footer>
</body>

</html>