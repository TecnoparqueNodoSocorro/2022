<?php

class ControladorUsuarios
{

    //LOGIN
    static public function ctrLogin($data)
    {
        $tabla = "users";
        $respuesta = ModelUsuarios::mdlLogin($tabla, $data);
        // return $respuesta;
        if ($respuesta == false) {
            return "";
        } /* else if ($respuesta->estado == "0") {
            return "Usuario inactivo";
        }  */ else {
            //SI LA RESPUESTA DEL MODELO ES DIFERENTE A FALSO FUE PORQUE ENCONTRÓ COINCIDENCIA EN LOS DATOS QUE SE ENVIARION
            //SE CREA LA SESSION
            session_start();
            //SE CREAN LAS VARIABLES DE SESSION
            $_SESSION["validar_ingreso"] = "ok";
            $_SESSION["rol"] = $respuesta->rol;
            $_SESSION["id"] = $respuesta->id;
            $_SESSION["usuario"] = $respuesta->usuario;
            return $respuesta;
            //------------------------------------------
        }
    }


    function ctrMenu()
    {
        //SI EXISTE LA VARIABLES DE VALIDAR INGRESO
        if (isset($_SESSION["validar_ingreso"])) {
            //SI LA VARIBLA ES IGUAL A "OK"
            if ($_SESSION["validar_ingreso"] == "ok") {

                echo ' <!--  <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=admin"><i class="bi bi-gear-fill"></i> Administración</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?page=publicaciones"><i class="bi bi-journal-album"></i> Publicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="btnCerrarSesion" href="#"><i class="bi bi-door-closed-fill"></i> Cerrar sesión</a>
                    </li>  ';
            } else {
                echo '';
            }
        }
    }
}
