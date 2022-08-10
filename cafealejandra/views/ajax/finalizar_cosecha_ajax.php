<?php
require_once "../../controllers/cosecha_controller.php";
require_once "../../models/cosecha_model.php";

//DESACTIVAR COSECHA
class CosechaAjax
{
    static public function finalizarCosecha($data)
    {
        $finalizarcosecha = ControladorCosecha::ctrFinalizarCosecha($data);
        $respuesta = array($finalizarcosecha);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['datos'])) {
    $finCosecha = new CosechaAjax();
    $data = $_POST['datos'];
    $finCosecha->finalizarCosecha($data);
} else {
    return ("Error");
}
