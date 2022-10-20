
<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

//CONSULTAR ENCARGADOS DE UNA COSECHA AJAX
class encargadoCosecha
{
    static public function usuarioCosechaEncargado($dato)
    {
        $usuario = ControladorUsuario::ctrConsultarEncargadoCosecha($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['data'])) {
    $encargado = new encargadoCosecha();
    $dato = $_POST['data'];
    $encargado->usuarioCosechaEncargado($dato);
} else {
    return ("Error");
}
