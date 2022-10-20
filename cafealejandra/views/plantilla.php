<?php
require_once "controllers/usuario_controller.php";
session_start();
if(isset($_SESSION["id_empleado"])){
    $userid = $_SESSION["id_empleado"];}


?>
<!DOCTYPE html>
<html lang="en">

<!-- campooculto -->
<input id="userId" name="userId" type="hidden" value="<?php echo $userid; ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Alejandra</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="styles/estilos.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-warning mb-3">CAFÉ ALEJANDRA</span>
        </h1>
        <?php
      /*   var_dump($_SESSION); */
        ?>

    </header>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand  text-warning fw-bold d-lg-none" href="#">Sistema
                de
                Gestión <br> Cafe Alejandra</a>



            <?php
            $login = new ControladorUsuario();
            $login->ctrmenu();
            ?>


            </ul>
        </div>
        </div>
    </nav>




    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (
            $_GET["page"] == "gestionUsuarios" ||
            $_GET["page"] == "gestionCosechas" ||
            $_GET["page"] == "reporteAvanzadoRecolector" ||
            $_GET["page"] == "registroPagos" ||
            $_GET["page"] == "registroTrabajos" ||
            $_GET["page"] == "registroActividades" ||
            $_GET["page"] == "reportes"  ||
            $_GET["page"] == "finalizarCosecha" ||
            $_GET["page"] == "reporteKilos"  ||
            $_GET["page"] == "reportePagos" ||
            $_GET["page"] == "reporteEmpleados" ||
            $_GET["page"] == "registrarDiasEncargados" ||
            $_GET["page"] == "reporteEncargado" ||
            $_GET["page"] == "pagoEncargados" ||
            $_GET["page"] == "reporteActividadesEncargado" ||
            $_GET["page"] == "a_reporteGeneral" ||

            $_GET["page"] == "home" ||
            $_GET["page"] == "login" ||
            $_GET["page"] == "error" ||
            $_GET["page"] == "error2" ||
            $_GET["page"] == "error3"

        ) {
            include "pages/" . $_GET["page"] . ".php";
        } else {
            include "pages/error.php";
        }
    } else {
        include "pages/login.php";
    }
    ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="views/js/script.js"></script>
    <script src="views/js/js.js"></script>
    <script src="views/js/registrosEncargados.js"></script>
    <script src="views/js/reporteEncargados.js"></script>
    <script src="views/js/login.js"></script>
    <script src="views/js/reporteActividadesEncargado.js"></script>
    <script src="views/js/a_reporteGeneral.js"></script>

    <footer class="footer">

        <p class="text-warning" style="font-size: 0.8rem;">Designed by Tecnoparque Nodo Socorro 2022 ©</p>

    </footer>
</body>

</html>