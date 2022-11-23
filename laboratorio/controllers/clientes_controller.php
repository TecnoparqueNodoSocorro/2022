<?php


class ControladorClientes
{

    //CREAR cliente
    static public function CtrPostCliente($data)
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::mdlPostCliente($tabla, $data);
        echo $respuesta;
    }

    //edit cliente
    static public function CtrEditCliente($data)
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::mdlEditCliente($tabla, $data);
        echo $respuesta;
    }
    //edit logo cliente
    static public function CtrEditLogoClient($data)
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::mdlEditLogoClient($tabla, $data);
        echo $respuesta;
    }
    //TREAR clientes
    static public function ctrGetClientes()
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::mdlGetClientes($tabla);
        return $respuesta;
    }
    //trar cliente por id
    static public function ctrGetInfoById($data)
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::mdlGetInfoById($tabla, $data);
        return $respuesta;
    }
    //LOGIN
    static public function login($data)
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::login($tabla, $data);

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
            /*             $_SESSION["nombres"] = $respuesta->nombres;
            $_SESSION["apellidos"] = $respuesta->apellidos; */
            return $respuesta;
            //------------------------------------------
        }
    }
    //cambio clave desde el usuario del administrador
    static public function ctrCambioClave($data)
    {
        $tabla = "clientes";
        $respuesta = ModelClientes::mdlCambioClave($tabla, $data);
        return $respuesta;
    }
    //cambio clave desde el usuario de empleado
    static public function ctrCambioClaveEmp($data)
    {
        $tabla = "empleados";
        $respuesta = ModelUsuario::mdlCambioClaveEmp($tabla, $data);
        return $respuesta;
    }
    function ctrMenuCliente()
    {
        //SI EXISTE LA VARIABLES DE VALIDAR INGRESO
        if (isset($_SESSION["validar_ingreso"])) {
            //SI LA VARIBLA ES IGUAL A "OK"
            if ($_SESSION["validar_ingreso"] == "ok") {


                if ($_SESSION["id_cargo"] == "3") {
                    //SI EL UD DE CARGO ES 3 SE DIBUJA EL MENU DEL USUARIO
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

                        <div class="offcanvas-body body-menu ">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link text-white text-uppercase" aria-current="page" href="index.php?page=c_home"> <i class="bi bi-house-fill"></i> Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pc-display"></i>
                                    Equipos</a>
                                <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                    <a class=" nav-link  sub-nav" href="index.php?page=a_equiposRegistrar"><i class="bi bi-file-plus-fill"></i> Registrar </a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=c_equiposHojasVida"><i class="bi bi-file-text-fill"></i> Hoja de vida </a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=c_equiposInventarios"><i class="bi bi-journal-album"></i> Inventarios</a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=c_equiposEditar"><i class="bi bi-pencil-fill"></i> Editar</a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=todos_ubicaciones"><i class="bi bi-geo-fill"></i> Ubicaciones</a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=c_equiposBaja"><i class="bi bi-arrow-down-right-square-fill"></i> Bajas</a>

                                </div>
                            </li>                                



                            <li class="nav-item dropdown">
                                <a class="nav-link text-white dropdown-toggle text-uppercase" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-file-earmark-text-fill"></i>
                                    Mantenimientos</a>
                                <div class="dropdown-menu sub-menu" aria-labelledby="dropdownId">
                                    <a class=" nav-link  sub-nav" href="index.php?page=c_mantenimientosRegistrar"><i class="bi bi-search"></i> Registrar </a>
                                    <a class=" nav-link  sub-nav" href="index.php?page=c_mantenimientosConsultar"><i class="bi bi-search"></i> Consultar </a>
                                </div>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link text-white text-uppercase" aria-current="page" href="index.php?page=cambioContrasena"> <i class="bi bi-unlock-fill"></i>
                                        Cambiar contraseña
                                    </a>
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
            } else {
                echo '';
            }
        } else {
            echo "";
        }
    }
    //desactivar O ACTIVAR USUARIOS
    static public function ctrDesactivarClientes($data)
    {
        $tabla = "clientes";
        //SI EL USUARIO ESTA ACTIVO, SE ENVIA AL MODELO QUE DESACTIVA AL USUARIO
        if ($data["state"] == 1) {
            $respuesta = ModelClientes::mdlDesactivarClientes($tabla, $data);
            echo $respuesta;
            //SI EL USUARIO ESTA INACTIVO, SE ENVIA AL MODELO QUE ACTIVA AL USUARIO

        } else if ($data["state"] == 0) {
            $respuesta = ModelClientes::mdlActivarClientes($tabla, $data);
            echo $respuesta;
        }
    }
}
