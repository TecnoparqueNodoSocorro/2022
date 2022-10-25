<?php
require_once "../../controllers/lotes_controller.php";
require_once "../../models/lotes_model.php";


class LoteAjax
{
    public $controlador;


    //GUARDAR LOTE
    static public function PostLote($data)
    {
        $datosusuario = ControladorLote::ctrPostLote($data);
        /*   $respuesta = ($datosusuario);
        echo json_encode($respuesta); */
        echo $datosusuario;
    }
    //finalizar LOTE
    static public function FinalizarLote($data)
    {
        $datosusuario = ControladorLote::ctrFinalizarLote($data);
        /*   $respuesta = ($datosusuario);
            echo json_encode($respuesta); */
        echo $datosusuario;
    }
    //finalizar LOTE
    static public function GetLoteByCodigo($data)
    {
        $datosLote = ControladorLote::ctrGetLoteByCodigo($data);
        $datos = json_encode($datosLote);
        echo ($datos);
    }

}
//GUARDAR LOTE
if (isset($_POST['recepcionGuayaba'])) {
    $postData = new LoteAjax();
    $data = $_POST['recepcionGuayaba'];
    $postData->PostLote($data);
}
//finalizar LOTE
if (isset($_POST['lote_fin'])) {
    $postData = new LoteAjax();
    $data = $_POST['lote_fin'];
    $postData->FinalizarLote($data);
}

//get lote by codigo
if (isset($_POST['codigoLote'])) {
    $postData = new LoteAjax();
    $data = $_POST['codigoLote'];
    $postData->GetLoteByCodigo($data);
}


