<?php
require_once "../../controllers/caprinocultor_controller.php";
require_once "../../models/caprinocultor_model.php";


class CaprinocultorAjax
{
    public $controlador;


    //GUARDAR CAPRINOCULTOR
    static public function PostCaprinocultores($data)
    {

        $datoscaprinocultor = ControladorCaprinocultor::ctrPostCaprinocultor($data);
        /*   $respuesta = ($datoscaprinocultor);
        echo json_encode($respuesta); */
        echo $datoscaprinocultor;
    }
}
//GUARDAR CAPRINOCULTOR
if (isset($_POST['nuevoCaprinocultor'])) {
    $postCaprinocultor = new CaprinocultorAjax();
    $data = $_POST['nuevoCaprinocultor'];

    $postCaprinocultor->PostCaprinocultores($data);
} else {
    return ("Error");
}
