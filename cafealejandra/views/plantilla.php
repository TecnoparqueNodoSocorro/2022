<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

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



</head>

<body>
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-warning mb-3">CAFÉ ALEJANDRA</span>
        </h1>
    </header>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand  text-warning fw-bold d-lg-none" href="index.php?page=home">Sistema
                de
                Gestión <br> Cafe Alejandra</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <!-- administradores -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: left;">
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-basket"></i>
                            Gestión de Cosechas
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=gestionCosechas">Iniciar nueva cosecha</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=finalizarCosecha">Finalizar cosecha</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person"></i>
                            Gestión de Empleados
                        </a>

                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item  text-faded px-lg-4"><a class="nav-link " href="index.php?page=gestionUsuarios">Registro
                                    de Empleados</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=reporteEmpleados">Listado
                                    de empleados</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-clipboard2-pulse"></i>
                            Registrar </a>
                        <ul class="dropdown-menu rounded" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroTrabajos">Registrar Trabajo Diario a Recolectores</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registrarDiasEncargados">Registrar Dias no Laborados a Encargados</a></li>



                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-coin"></i>
                            Pagos </a>
                        <ul class="dropdown-menu rounded" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">

                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroPagos">
                                    Pago Diario</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=pagoEncargados">
                                    Pagar a Encargados</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bar-chart"></i>
                            Reportes administrativos
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=reportePagos">Reporte
                                    de pagos</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link" href="index.php?page=reporteKilos">Reporte
                                    de kilos</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=reporteAvanzadoRecolector">Reporte Avanzado por Recolector</a></li>
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=reporteEncargado">Reporte Avanzado por Encargado</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=home"><i class="bi bi-house"></i> Cerrar sesion</a></li>

                </ul>
            </div>

            <!--usuarios  -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: left;">
                <ul class="navbar-nav mx-auto">
          
                    <!-- sesion de usuarios  -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bar-chart"></i>
                            Reportes particulares
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroActividades">Reporte por Empleado</a></li>

                        </ul>
                    </li>
                    <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=home"><i class="bi bi-house"></i> Cerrar sesion</a></li>
                </ul>
            </div>

            <!--  -->
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
            $_GET["page"] == "home" ||
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






    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="views/js/script.js"></script>
    <script src="views/js/js.js"></script>
    <script src="views/js/registrosEncargados.js"></script>
    <script src="views/js/reporteEncargados.js"></script>
    <script src="views/js/login.js"></script>



    <footer class="footer">

        <p class="text-warning">Café Alejandra </p>

    </footer>
</body>

</html>