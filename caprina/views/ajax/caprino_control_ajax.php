<?php
require_once "../../controllers/caprino_control_controller.php";
require_once "../../models/caprino_control_model.php";


class Caprino_controlAjax
{
    public $controlador;




    static public function PostCaprinoControl($data)
    {
        $datoscaprino = ControladorCaprinoControl::ctrPostCaprinoControl($data );
        $respuesta = array($datoscaprino);
        echo json_encode($respuesta);
    }

    
}


//--------------------------CONTROL ENFERMEDADES RESPIRATORIAS-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}

/* 
//--------------------------CONTROL ENFERMEDADES RESPIRATORIAS Y GASTROINTESTINALES-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}


//--------------------------CONTROL TODAS ENFERMEDADES-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}



//--------------------------CONTROL ENFERMEDADES GASTROINTESTINALES Y MORDEDURAS-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}


//--------------------------CONTROL ENFERMEDADES RESPIRATORIAS Y MORDEDURAS-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}



//--------------------------CONTROL ENFERMEDADES GASTROINTESTINALES-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}



//--------------------------CONTROL ENFERMEDADES POR MORDEDURAS-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}



//--------------------------CONTROL SIN ENFERMEDADES-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}



//--------------------------CONTROL ENFERMEDADES-------------------
if (isset($_POST['caprinoRegistro'])) {
    $postCaprino = new Caprino_controlAjax();
    $data = $_POST['caprinoRegistro'];
    $postCaprino->PostCaprinoControl($data);
} else {
    return ("Error");
}
 */