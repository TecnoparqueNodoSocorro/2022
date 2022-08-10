<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

//CONSULTAR LOS EMPLEADOS DE UNA COSECHA
class UsuarioCosechaAjax
{
    static public function usuarioCosecha($dato)
    {
        $usuario = ControladorUsuario::ctrConsultarUsuarioCosechaRecolector($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['data'])) {
    $usuarioCosecha = new UsuarioCosechaAjax();
    $dato = $_POST['data'];
    $usuarioCosecha->usuarioCosecha($dato);
} else {
    return ("Error");
}
