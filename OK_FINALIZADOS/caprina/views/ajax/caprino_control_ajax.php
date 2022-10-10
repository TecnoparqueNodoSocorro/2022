<?php
require_once "../../controllers/caprino_control_controller.php";
require_once "../../models/caprino_control_model.php";


class Caprino_controlAjax
{
    public $controlador;



    //REGISTRAR CONTROL 
    static public function PostCaprinoControl($data)
    {
        $datoscaprino = ControladorCaprinoControl::ctrPostCaprinoControl($data);
        $respuesta = array($datoscaprino);
        echo json_encode($respuesta);
    }
}


//--------------------------CONTROL ENFERMEDADES -------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
}