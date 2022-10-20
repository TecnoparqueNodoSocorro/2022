<?php
require_once "../../controllers/envases_controller.php";
require_once "../../models/envases_model.php";


class EnvasesAjax
{
    public $controlador;
    //ENVASAR LOTE
    static public function PostEnvase($data)
    {
        $datos = ControladorEnvases::ctrPostEnvase($data);
        /*   $respuesta = ($datos);
        echo json_encode($respuesta); */
        return $datos;
    }
    //GET ENVASES POR LOTE
    static public function GetEnvase($data)
    {
        $datos = ControladorEnvases::ctrGetEnvase($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
    }
    //GET cantidad de  ENVASES POR LOTE
    static public function GetEnvasesPorLote($data)
    {
        $datos = ControladorEnvases::ctrGetEnvasePorLote($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
    }
}

if (isset($_POST['postEnvase'])) {
    $datos = new EnvasesAjax();
    $data = $_POST['postEnvase'];
    $datos->PostEnvase($data);
}

if (isset($_POST['getEnv'])) {
    $datos = new EnvasesAjax();
    $data = $_POST['getEnv'];
    $datos->GetEnvase($data);
}
if (isset($_POST['envasado'])) {
    $datos = new EnvasesAjax();
    $data = $_POST['envasado'];
    $datos->GetEnvasesPorLote($data);
}
