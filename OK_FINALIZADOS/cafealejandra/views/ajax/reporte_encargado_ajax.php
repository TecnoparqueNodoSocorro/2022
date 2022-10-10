<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";

//CONSULTAR UNICAMENTE LOS ENCARGADOS DE UNA COSECHA
class EncargadosCosecha
{
    static public function encargadoCosecha($dato)
    {
        $usuario = ControladorUsuario::ctrConsultarEncargadoCosecha($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['dataCosecha'])) {
    $encargadoCosecha = new EncargadosCosecha();
    $dato = $_POST['dataCosecha'];
    $encargadoCosecha->encargadoCosecha($dato);
} else {
    return ("Error");
}
