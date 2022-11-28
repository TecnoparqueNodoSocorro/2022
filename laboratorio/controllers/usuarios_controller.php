<?php


class ControladorUsuario
{

    //CREAR usuario
    static public function ctrPostUsuario($data)
    {
        $tabla = "empleados";
        $respuesta = ModelUsuario::registroUsuario($tabla, $data);
        echo $respuesta;
    }
    //TREAR usuario
    static public function ctrGetUsuarios()
    {
        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlGetUsuarios($tabla);
        return $respuesta;
    }
    //trar usuario por id
    static public function ctrGetInfoById($data)
    {
        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlGetInfoById($tabla, $data);
        return $respuesta;
    }
    //editar
    static public function ctrEditEmpleado($data)
    {


        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlEditEmpleado($tabla, $data);
        return $respuesta;
    }
    //LOGIN
    static public function login($data)
    {
        $tabla = "empleados";
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
        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlCambioClave($tabla, $data);
        return $respuesta;
    }
    //cambio clave para cliente y empleado
    static public function ctrCambioClaveEmpAndClie($data)
    {

        if ($data["cargo"] == "3") {
            $tabla = "clientes";
            $respuesta = ModelClientes::mdlCambioClaveCli($tabla, $data);
            return $respuesta;
        } else {
            $tabla = "empleados";
            $respuesta = ModelUsuario::mdlCambioClaveEmp($tabla, $data);
            return $respuesta;
        }
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
                                <h2 class="offcanvas-title" id="offcanvasNavbarLabel"></h2>
                                <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                                    <div class="botonClose">
                                        <i class="bi bi-chevron-double-right"></i>
                                    </div>
                                </button>
                            </div>

                            <div class="offcanvas-body body-menu">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                                <li class="nav-item">
                                    <a class="nav-link text-white text-uppercase" aria-current="page" href="index.php?page=a_home"> <i class="bi bi-house-fill"></i> Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-bounding-box"></i>
                                        Clientes</a>
                                    <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_clientesRegistrar"><i class="bi bi-person-plus-fill"></i> Registro </a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=todos_ubicaciones"><i class="bi bi-person-plus-fill"></i> Registrar ubicación </a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_clientesGestionar"><i class="bi bi-person-lines-fill"></i> Ver/Editar</a>
                                    </div>

                                </li>  
 

                                <li class="nav-item dropdown">
                                    <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pc-display"></i>
                                        Equipos</a>
                                    <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_equiposRegistrar"><i class="bi bi-file-plus-fill"></i> Registrar </a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_equiposHojaVida"><i class="bi bi-file-text-fill"></i> Hoja de vida</a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_equiposInventarios"><i class="bi bi-journal-album"></i> Inventarios</a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_equiposEditar"><i class="bi bi-pencil-fill"></i> Editar</a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_equiposBaja"><i class="bi bi-arrow-down-right-square-fill"></i> Bajas</a>
                                    </div>
                                </li>                                

<!--
                              <li class="nav-item dropdown">
                                    <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text-fill"></i>
                                        Parámetros</a>
                                    <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_parametrosMantenimientos"><i class="bi bi-sliders"></i> Parametros mantenimientos </a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_parametrosGuiasRapidas"><i class="bi bi-file-earmark-easel-fill"></i> Guías rápidas</a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_parametrosCheckListDiagnostico"><i class="bi bi-clipboard-check-fill"></i> Cheklist de diagnósticos</a>
                                    </div>
                              </li>
                              -->
                           
                              
                            <li class="nav-item dropdown">
                                    <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-people-fill"></i>
                                        Empleados</a>
                                    <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_empleadosRegistrar"><i class="bi bi-person-plus-fill"></i> Registro </a>
                                        <a class=" nav-link  sub-nav" href="index.php?page=a_empleadosGestion"><i class="bi bi-person-lines-fill"></i> Ver/Editar/bloquear</a>
                                    </div>
                            </li>  
                            
                            
                            <li class="nav-item">
                                        <a class="nav-link text-white text-uppercase" aria-current="page" id="btnCerrarSesion" > <i class="bi bi-box-arrow-right"></i>
                                            Cerrar sesión
                                        </a>
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
                            <h2 class="offcanvas-title" id="offcanvasNavbarLabel"></h2>
                            <button type="button" class="btn btn-outline-link" data-bs-dismiss="offcanvas" aria-label="Close">
                                <div class="botonClose">
                                    <i class="bi bi-chevron-double-right"></i>
                                </div>
                            </button>
                        </div>

                        <div class="offcanvas-body body-menu">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item">
                                        <a class="nav-link text-white text-uppercase" aria-current="page" href="index.php?page=e_home"> <i class="bi bi-house-fill"></i> Home</a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pc-display"></i>
                                            Equipos</a>
                                        <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                            <a class=" nav-link  sub-nav" href="index.php?page=a_equiposRegistrar"><i class="bi bi-file-plus-fill"></i> Registrar </a>
                                            <a class=" nav-link  sub-nav" href="index.php?page=e_equiposHojasVida"><i class="bi bi-file-text-fill"></i> Hoja de vida </a>
                                            <a class=" nav-link  sub-nav" href="index.php?page=a_equiposInventarios"><i class="bi bi-journal-album"></i> Inventarios</a>
                                            <a class=" nav-link  sub-nav" href="index.php?page=e_equiposConsultarBajas"><i class="bi bi-arrow-down-right-square-fill"></i> Consultar bajas</a>
                                            <a class=" nav-link  sub-nav" href="index.php?page=todos_ubicaciones"><i class="bi bi-geo-fill"></i> Ubicaciones</a>

                                        </div>
                                    </li>                                


<!--
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text-fill"></i>
                                            Mantenimientos</a>
                                        <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                            <a class=" nav-link  sub-nav" href="index.php?page=e_mantenimientosConsultar"><i class="bi bi-search"></i> Consultar </a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                            <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text-fill"></i>
                                                Parámetros</a>
                                            <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                                <a class=" nav-link  sub-nav" href="index.php?page=e_parametrosPerfil"><i class="bi bi-file-break-fill"></i> Perfil</a>
                                                <a class=" nav-link  sub-nav" href="index.php?page=e_parametrosPassword"><i class="bi bi-key-fill"></i> Contraseña</a>
                                            </div>
                                    </li>
-->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text-fill"></i>
                                            Solicitar reparación</a>
                                        <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                            <a class=" nav-link  sub-nav" href="index.php?page=e_reparacionRegistro"><i class="bi bi-sliders"></i> Registro </a>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white text-uppercase" aria-current="page" href="index.php?page=cambioContrasena"> <i class="bi bi-unlock-fill"></i>
                                            Cambiar contraseña
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                            <a class="nav-link text-white text-uppercase" aria-current="page" id="btnCerrarSesion"> <i class="bi bi-box-arrow-right"></i>
                                                Cerrar sesión
                                            </a>
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
        $tabla = "empleados";
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