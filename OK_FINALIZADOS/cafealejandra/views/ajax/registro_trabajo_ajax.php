<?php
require_once "../../controllers/registro_controller.php";
require_once "../../models/registro_model.php";


//REGISTRAR KILOS RECOLECTADOR POR RECOLECTOR
class RegistroAjax
{

    static public function PostRegistroTrabajo($data)
    {
        $datosregistro = ControladorRegistro::ctrPostRegistro($data);
        $respuesta = array($datosregistro);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['registroTrabajo'])) {
    $postRegistro = new RegistroAjax();
    $data = $_POST['registroTrabajo'];

    $postRegistro->PostRegistroTrabajo($data);
} else {
    return ("Error");
}
   