<?php


class ControladorUsuario
{

    //CREAR usuario
    static public function ctrPostUsuario($data)
    {
        $tabla = "usuarios";
        $respuesta = ModelUsuario::registroUsuario($tabla, $data);
        echo $respuesta;
    }
    //CREAR usuario
    static public function ctrGetUsuarios()
    {
        $tabla = "usuarios";
        $respuesta = ModelUsuario::mdlGetUsuarios($tabla);
        return $respuesta;
    }
    //LOGIN
    static public function login($data)
    {
        $tabla = "usuarios";
        $respuesta = ModelUsuario::login($tabla, $data);

        // return $respuesta;
        if ($respuesta == false) {
            return "";
        } else {
            //SI LA RESPUESTA DEL MODELO ES DIFERENTE A FALSO FUE PORQUE ENCONTRÓ COINCIDENCIA EN LOS DATOS QUE SE ENVIARION

            //SE CREA LA SESSION
            session_start();

            //SE CREAN LAS VARIABLES DE SESSION
            $_SESSION["validar_ingreso"] = "ok";
            $_SESSION["id_cargo"] = $respuesta->id_cargo;
            $_SESSION["id"] = $respuesta->id;
            $_SESSION["nombres"] = $respuesta->nombres;
            $_SESSION["apellidos"] = $respuesta->apellidos;
            return $respuesta;
            //------------------------------------------
        }
    }
    //cambio clave desde el usuario del administrador
    static public function ctrCambioClave($data)
    {
        $tabla = "usuarios";
        $respuesta = ModelUsuario::mdlCambioClave($tabla, $data);
        return $respuesta;
    }
    //cambio clave desde el usuario de empleado
    static public function ctrCambioClaveEmp($data)
    {
        $tabla = "usuarios";
        $respuesta = ModelUsuario::mdlCambioClaveEmp($tabla, $data);
        return $respuesta;
    }
    function ctrMenu()
    {
        //SI EXISTE LA VARIABLES DE VALIDAR INGRESO
        if (isset($_SESSION["validar_ingreso"])) {
            //SI LA VARIBLA ES IGUAL A "OK"
            if ($_SESSION["validar_ingreso"] == "ok") {
                //SI EL ID DEL CARGO ES IGUAL A 1 SE DIBUJA EL MENU DEL ADMINISTRADOR
                if ($_SESSION["id_cargo"] == "1") {
                    echo '
                    <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
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
                            <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=a_home"> <i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_registrarEmpleado"> <i class="bi bi-person"></i>
                                Registrar Empleado</a>
                        </li>

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_recepcionGuayaba"> <i class="bi bi-activity"></i>
                                Recepción</a>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=escaldado"> <i class="bi bi-droplet"></i>
                                Escaldado</a>
                        </li>

                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Reporte de Producción</a>
                            <div class="dropdown-menu" style="background-color:#c4eec6" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=reporteBocadillo"> Bocadillo </a>


                                <a class=" nav-link  sub-nav" href="index.php?page=reporteEspejuelo"> Espejuelo</a>


                                <a class=" nav-link  sub-nav" href="index.php?page=reporteArequipe"> Arequipe mogoticos</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_registroEmbalaje"> <i class="bi bi-box-seam"></i>
                                Embalaje</a>
                        </li>

                        <li class="nav-item">
                        <a class=" nav-link text-uppercase" href="index.php?page=a_finalizarLote"> <i class="bi bi-calendar2-check"></i>
                            Finalizar lote</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text"></i>
                                Informes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=a_informe"> Registro de
                                    Informe de lotes</a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=a_informeTablasBoc"> Registro de
                                    Informe de tablas bocadillo</a>
                            </div>

                        </li>

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"> <i class="bi bi-person"></i>Cerrar Sesión</a>
                        </li>




                    </ul>
                </div>
            </div>
                         ';
                }
                if ($_SESSION["id_cargo"] == "2") {
                    //SI EL UD DE CARGO ES 2 SE DIBUJA EL MENU DEL EMPLEADO
                    echo '
                    <button class="btn btn-outline-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
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
                            <a class="nav-link text-uppercase" aria-current="page" href="index.php?page=e_home"> <i class="bi bi-house"></i> Home</a>
                        </li>
                    

                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" href="index.php?page=a_recepcionGuayaba"> <i class="bi bi-activity"></i>
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
                            <a class=" nav-link text-uppercase" href="index.php?page=a_registroEmbalaje"> <i class="bi bi-box-seam"></i>Embalaje</a>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-unlock-fill"></i>
                                Opciones</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class=" nav-link  sub-nav" href="index.php?page=o_cambioContrasena"> Cambiar contraseña </a>
                            </div>
                        </li>
                    
                        <li class="nav-item">
                            <a class=" nav-link text-uppercase" id="btnCerrarSesion" href="#"> <i class="bi bi-person"></i>
                                Cerrar Sesión</a>
                        </li>




                    </ul>
                </div>
            </div>
                         ';
                }
            } else {
                echo '';
            }
        } else {
            echo "";
        }
    }
    //desactivar O ACTIVAR USUARIOS
    static public function ctrDesactivarUsuario($data)
    {
        $tabla = "usuarios";
        //SI EL USUARIO ESTA ACTIVO, SE ENVIA AL MODELO QUE DESACTIVA AL USUARIO
        if ($data["state"] == 1) {
            $respuesta = ModelUsuario::mdlDesactivarUsuarios($tabla, $data);
            echo $respuesta;
            //SI EL USUARIO ESTA INACTIVO, SE ENVIA AL MODELO QUE ACTIVA AL USUARIO

        } else if ($data["state"] == 0) {
            $respuesta = ModelUsuario::mdlActivarUsuarios($tabla, $data);
            echo $respuesta;
        }
    }
}
