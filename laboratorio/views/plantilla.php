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
    <title>Laboratorio</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="styles/styles.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>



    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Sweet alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </script>
</head>

<body>
    <nav class="navbar navbar-dark navbar-background">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php if ($id_cargo == "1") {
                                                'index.php?page=a_home';
                                            } else if ($id_cargo == "2") {
                                                'index.php?page=e_home';
                                            } else if ($id_cargo == "3") {
                                                'index.php?page=u_home';
                                            } ?>">LABORATORIO</a>
            <input type="hidden" name="id_usuario_oculto" id="id_usuario_oculto" value="<?php echo $id ?>">

            <?php
            $menu = new ControladorUsuario();
            $menu->ctrMenu();
            ?>
            <?php
            $menuCliente = new ControladorClientes();
            $menuCliente->ctrMenuCliente();
            ?>
        </div>
    </nav>




    <!-- Redireccinar url por variable -->
    <?php
    if (isset($_GET["page"])) {

        if (

            $_GET["page"] == "a_home" ||

            $_GET["page"] == "a_clientesRegistrar" ||
            $_GET["page"] == "a_clientesAgregarUbicaciones" ||
            $_GET["page"] == "a_clientesGestionar" ||

            $_GET["page"] == "a_equiposRegistrar" ||
            $_GET["page"] == "a_equiposHojaVida" ||
            $_GET["page"] == "a_equiposInventarios" ||
            $_GET["page"] == "a_equiposEditar" ||
            $_GET["page"] == "a_equiposBaja" ||

            $_GET["page"] == "a_parametrosMantenimientos" ||
            $_GET["page"] == "a_parametrosGuiasRapidas" ||
            $_GET["page"] == "a_parametrosCheckListDiagnostico" ||

            $_GET["page"] == "a_empleadosRegistrar" ||
            $_GET["page"] == "a_empleadosGestion" ||





            $_GET["page"] == "e_home" ||

            $_GET["page"] == "e_equiposConsultarBajas" ||
            $_GET["page"] == "e_equiposHojasVida" ||
            $_GET["page"] == "e_equiposInventarios" ||
            $_GET["page"] == "e_equiposUbicaciones" ||

            $_GET["page"] == "e_mantenimientosConsultar" ||

            $_GET["page"] == "e_parametrosPassword" ||
            $_GET["page"] == "e_parametrosPerfil" ||

            $_GET["page"] == "e_reparacionRegistro" ||

            $_GET["page"] == "e_cambioContrasena" ||




            $_GET["page"] == "c_home" ||

            $_GET["page"] == "c_equiposBaja" ||
            $_GET["page"] == "c_equiposRegistrar" ||
            $_GET["page"] == "c_equiposEditar" ||
            $_GET["page"] == "c_equiposHojasVida" ||
            $_GET["page"] == "c_equiposInventarios" ||

            $_GET["page"] == "c_mantenimientosConsultar" ||
            $_GET["page"] == "c_mantenimientosRegistrar" ||



            $_GET["page"] == "login" ||
            $_GET["page"] == "login_clientes" ||
            $_GET["page"] == "select_login"

        ) {
            include "pages/" . $_GET["page"] . ".php";
        } else {
            include "pages/error.php";
        }
    } else {
        include "pages/login.php";
    }
    ?>


    <footer class="footer">
        <p class="text-white" style="font-size: 0.8rem;">Designed by Tecnoparque Nodo Socorro 2022 ©</p>

    </footer>

    <script src="views/js/script.js"></script>
    <script src="views/js/a_registrarUsuarios.js"></script>
    <script src="views/js/a_registrarCliente.js"></script>
    <script src="views/js/a_cambioClave.js"></script>
    <script src="views/js/a_activarDesactivarUsuarios.js"></script>
    <script src="views/js/a_activarDesactivarClientes.js"></script>
    <script src="views/js/a_editarUsuarios.js"></script>
    <script src="views/js/a_menuWizard.js"></script>
    <script src="views/js/a_ubicaciones.js"></script>
    <script src="views/js/a_registrarEquipo.js"></script>



    <script src="views/js/cambioContrasena.js"></script>
    <script src="views/js/login.js"></script>
    <script src="views/js/login_clientes.js"></script>

    <script src="views/js/cerrarSesion.js"></script>





</body>

</html>