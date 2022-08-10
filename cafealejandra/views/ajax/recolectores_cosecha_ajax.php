<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

//CONSULTAR LOS RECOLECTORES DE UNA COSECHA
class UsuarioCosechaAjax
{
    static public function usuarioCosechaRecolector($dato)
    {
        $usuario = ControladorUsuario::ctrConsultarUsuarioCosechaRecolector($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['dataReporte'])) {
    $usuarioCosecha = new UsuarioCosechaAjax();
    $dato = $_POST['dataReporte'];
    $usuarioCosecha->usuarioCosechaRecolector($dato);
} else {
    return ("Error");
}
