<?php

class ControladorLogin
{
    /* metodo de ingreso */

    public function ctrlogin()
    {
        if (isset($_POST["l_username"])) {
            $tabla="usuarios";
            $item= "usuario";
            $valor=($_POST["l_username"]);
            $password=($_POST["l_password"]);
            $respuesta = modelUsuarios::mdlloginusuario($tabla, $item ,$valor);
          /* Validacion */

        if ($respuesta==false || $respuesta=='0'){

            echo'<script> 
            if (window.history.replaceState){
                window.fistoy.replaceState(null, null, window.location.href);
            } </script>';
            echo '<div class="alert alert-danger" role="alert">
            Error de credenciales!
             </div>';


             /* var_dump($respuesta); */

        }

        else
        {
            if ($respuesta["usuario"] == $_POST["l_username"]  &&  $respuesta["contrasena"] == $_POST["l_password"])
            {
                
             $_SESSION["ValidarIngreso"]="ok";

            echo 'ok';
            }

            else{
                echo '<div class="alert alert-danger" role="alert">
                Error de credenciales!
                 </div>';
            }
        }
    }
    }
}