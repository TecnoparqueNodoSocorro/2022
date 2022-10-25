<?php
require_once "../../controllers/escaldado_controller.php";
require_once "../../models/escaldado_model.php";


class EscaldadoAjax
{
    public $controlador;

    //registrar proceso de escaldado
    static public function PostEscaldado($data)
    {
        $datosusuario = ControladorEscaldado::ctrPostEscaldado($data);
        /*   $respuesta = ($datosusuario);
                echo json_encode($respuesta); */
        echo $datosusuario;
    }
    //traer todos los registros por codigo
    static public function GetReistrosByCodigo($data)
    {
        $datos = ControladorEscaldado::ctrGetReistrosByCodigo($data);
        $respuesta = json_encode($datos);
        print_r($respuesta);
    }
}


//registrar proceso de escaldado
if (isset($_POST['escaldadoGuayaba'])) {
    $postData = new EscaldadoAjax();
    $data = $_POST['escaldadoGuayaba'];
    $postData->PostEscaldado($data);
}

//traer todos los registros por codigo
if (isset($_POST['escaldadosByCodigo'])) {
    $postData = new EscaldadoAjax();
    $data = $_POST['escaldadosByCodigo'];
    $postData->GetReistrosByCodigo($data);
}
