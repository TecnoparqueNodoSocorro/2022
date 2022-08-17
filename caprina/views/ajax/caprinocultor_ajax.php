<?php
require_once "../../controllers/caprinocultor_controller.php";
require_once "../../models/caprinocultor_model.php";


class CaprinocultorAjax
{
    public $controlador;



    static public function PostCaprinocultores($data)
    {

        $datoscaprinocultor = ControladorCaprinocultor::ctrPostCaprinocultor($data);
        $respuesta = array($datoscaprinocultor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['nuevoCaprinocultor'])) {
    $postCaprinocultor = new CaprinocultorAjax();
    $data = $_POST['nuevoCaprinocultor'];

    $postCaprinocultor->PostCaprinocultores($data);
} else {
    return ("Error");
}
