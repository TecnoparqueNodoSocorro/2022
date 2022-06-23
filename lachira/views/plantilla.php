<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="styles/styles.css?v=<?php echo(rand()); ?>" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"
        type="text/css">


    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php?page=home">Sistema de Gestión</a>
            <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <div class="boton">
                    <i class="bi bi-chevron-double-left"></i>
                </div>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
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
                            <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=home"> <i
                                    class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=gestionUsuarios"> <i
                                    class="bi bi-person"></i>
                                Gestión de Usuarios</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase " href="#" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="bi bi-basket"></i> Lotes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="nav-link sub-nav" href="index.php?page=gestionLotes">
                                    Gestión de Lotes Administrador</a>

                                <a class="nav-link sub-nav" href="index.php?page=gestionLotesUsuarios">
                                    Gestión de Lotes Usuarios</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="bi bi-file-earmark-text"></i>
                                Informes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=informeInvima"> Informe INVIMA</a>
                                <a class=" nav-link sub-nav" href="index.php?page=informeLotes">
                                    Informe de Lotes </a>
                            </div>
                        </li>


                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="bi bi-activity"></i>
                                Registros</a>


                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <div class="dropp">

                                    <a class=" nav-link sub-nav" href="index.php?page=registroActividades"></i>
                                        Registro de Actividades </a>

                                </div>
                            </div>
                        </li>








                    </ul>
                </div>
            </div>
        </div>
    </nav>





    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (
   
        $_GET["page"] == "home" ||
        $_GET["page"] == "gestionUsuarios" ||
        $_GET["page"] == "gestionLotes" ||
        $_GET["page"] == "gestionLotesUsuarios" ||
        $_GET["page"] == "registroActividades" ||
        $_GET["page"] == "informeInvima" ||
        $_GET["page"] == "informeLotes" ||
        $_GET["page"] == "faseEnvasado" ||
        $_GET["page"] == "segundaF" ||
        $_GET["page"] == "faseFin" ||
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js">
    </script>


    <footer class="footer">

        <p class="navbar-brand">LaChila</p>

    </footer>
</body>

</html>