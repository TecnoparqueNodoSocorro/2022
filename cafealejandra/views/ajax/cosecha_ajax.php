<?php
require_once "../../controllers/cosecha_controller.php";
require_once "../../models/cosecha_model.php";


//CREAR COSECHA AJAX
class CosechaAjax
{
    static public function PostCosecha($data)
    {
        $datoscosecha = ControladorCosecha::ctrPostCosecha($data);
        $respuesta = array($datoscosecha);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['cosecha'])) {
    $postCosecha = new CosechaAjax();
    $data = $_POST['cosecha'];

    $postCosecha->PostCosecha($data);
} else {
    return ("Error");
}
