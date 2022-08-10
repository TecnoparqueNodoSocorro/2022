<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

//CREAR USUARIO NUEVO
class UsuarioAjax
{
    static public function usuarioCosecha($data)
    {
        $usuario = ControladorUsuario::ctrAgregarUsuario($data);
        $respuesta = array($usuario);
        echo json_encode($respuesta). "Hola";
    }
}

if (isset($_POST['empleado_nuevo'])) {
    $nuevoUsuario = new UsuarioAjax();
    $data = $_POST['empleado_nuevo'];
    $nuevoUsuario->usuarioCosecha($data);
    return "dfgdfgfd";
} else {
    return ("Error");
}
