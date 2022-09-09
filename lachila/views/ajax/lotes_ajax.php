<?php
require_once "../../controllers/lotes_controller.php";
require_once "../../models/lotes_model.php";


class LotesAjax
{
    public $controlador;
    //CREAR LOTE
    static public function PostLote($data)
    {
        $datos = ControladorLotes::ctrPostLote($data);
        /*   $respuesta = ($datos);
        echo json_encode($respuesta); */
        echo $datos;
    }
    //GET LOTES DE MANERA DINAMICA
    static public function GetLotes($data)
    {
        $datos = ControladorLotes::ctrGetLotes($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
        // return $datos;
    }
    // PASAR LOTE A LA SIGUIENTE FERMENTACION O FASE
    static public function UpdateLote($data)
    {
        $datos = ControladorLotes::ctrUpdateLote($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
        // return $datos;
    }
    // //TRAER TODOS LOS REGISTROS DE UN LOTE EN ESPECIFICO PARA EL HISTORIAL DEL ADMINISTRADOR

    static public function GetInfoLote($data)
    {
        $datos = ControladorLotes::ctrGetInfoLote($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
        // return $datos;
    }

    // //TRAER TODOS LOS REGISTROS DE UN LOTE EN ESPECIFICO PARA EL HISTORIAL DEL ADMINISTRADOR
    static public function GetInfoLotePorUsuario($data)
    {
        $datos = ControladorLotes::ctrGetInfoLotePorUsuario($data);
        $respuesta = ($datos);
        echo json_encode($respuesta);
        // return $datos;
    }
}
//CREAR LOTE
if (isset($_POST['lote'])) {
    $postData = new LotesAjax();
    $data = $_POST['lote'];
    $postData->PostLote($data);
}

//LISTAR LOTES DE MANERA DINAMICA
if (isset($_POST['dataFase'])) {
    $postData = new LotesAjax();
    $data = $_POST['dataFase'];
    $postData->GetLotes($data);
}

// PASAR LOTE A LA SIGUIENTE FERMENTACION O FASE
if (isset($_POST['codigolote'])) {
    $postData = new LotesAjax();
    $data = $_POST['codigolote'];
    $postData->UpdateLote($data);
}

//TRAER TODOS LOS REGISTROS DE UN LOTE EN ESPECIFICO PARA EL HISTORIAL DEL ADMINISTRADOR
if (isset($_POST['codigo_loteA'])) {
    $postData = new LotesAjax();
    $data = $_POST['codigo_loteA'];
    $postData->GetInfoLote($data);
}
//TRAER TODOS LOS REGISTROS DE UN LOTE EN ESPECIFICO PARA EL HISTORIAL DEL EMPLEADO
if (isset($_POST['codigo_loteE'])) {
    $postData = new LotesAjax();
    $data = $_POST['codigo_loteE'];
    $postData->GetInfoLotePorUsuario($data);
}
