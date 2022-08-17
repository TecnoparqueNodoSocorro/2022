<?php
require_once "../../controllers/produccion_controller.php";
require_once "../../models/produccion_model.php";


class ProduccionAjax
{
    public $controlador;




    static public function PostProduccion($data)
    {

        $datosproduccion = ControladorProduccion::ctrPostProduccion($data);
        $respuesta = array($datosproduccion);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['produccion'])) {
    $Produccion = new ProduccionAjax();
    $data = $_POST['produccion'];
    $Produccion->PostProduccion($data);
} else {
    return ("Error");
}
