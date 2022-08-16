<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

class LoginAjax
{
    static public function Login($data)
    {
        $usuario = ControladorUsuario::ctrLogin($data);
       
        $respuesta = json_encode($usuario);
        echo ($respuesta);
    }
}

if (isset($_POST['login'])) {
    $datosLogin = new LoginAjax();
    $data = $_POST['login'];
    $datosLogin->Login($data);
} 