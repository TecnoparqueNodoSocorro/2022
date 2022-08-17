<?php


class ControladorUsuario
{

    static public function ctrAgregarUsuario($data)
    {
        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlregistroUsuario($tabla, $data);
        return $respuesta;
    }


    /*     CONSULTAR TODOS LOS USUARIOS*/
    static public function ctrConsultarUsuario()
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuario($tabla);
        return  $consulta;
    }


    /*     CONSULTAR  LOS USUARIOS POR COSECHA*/
    static public function ctrConsultarUsuarioCosecha($dato)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuarioCosecha($tabla, $dato);
        return  $consulta;
    }


    /*     CONSULTAR  LOS RECOLECTORES POR COSECHA*/
    static public function ctrConsultarUsuarioCosechaRecolector($dato)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuarioCosechaRecolector($tabla, $dato);
        return  $consulta;
    }


    /*     CONSULTAR  LOS ENCARGADOS POR COSECHA*/
    static public function ctrConsultarEncargadoCosecha($dato)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarEncargadoCosecha($tabla, $dato);
        return  $consulta;
    }


    /*     CONSULTAR  USUARIO EN ESPECIFICO POR COSECHA*/
    static public function ctrConsultarUsuarioEspecifico($data)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlConsultarUsuarioEspecifico($tabla, $data);
        return  $consulta;
    }
    /* ----------------------------------------------------- */
    /*   LOGIN */
    static public function ctrLogin($data)
    {
        $tabla = "empleados";
        $consulta = ModelUsuario::mdlLogin($tabla, $data);
        if ($consulta == false || $consulta == '') {
            return "";
        } else {
            $idcargo = $consulta[0]['id_cargo'];
            session_start();
            $_SESSION["validar_rol"] =  $idcargo;
            return $consulta;
        }
    }

    function ctrMenu()
    {

        if (isset($_SESSION["validar_rol"])) {
            if ($_SESSION["validar_rol"] == 3) {
                echo ' <li class="nav-item dropdown">
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
                    </li>';
                return;
            } else {
                ($_SESSION["validar_rol"] == 1);
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bar-chart"></i>
                            Reportes particulares
                        </a>
                        <ul class="dropdown-menu" style="background-color: #2f170fe6;" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item px-lg-4"><a class="nav-link " href="index.php?page=registroActividades">Reporte por Empleado</a></li>

                        </ul>
                    </li>';
                return;
            }
        }else{
         
            
        }
    }
}
