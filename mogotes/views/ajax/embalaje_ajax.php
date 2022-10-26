<?php
require_once "../../controllers/embalaje_controller.php";
require_once "../../models/embalaje_model.php";


class EmbalajeAjax
{
    public $controlador;

    //traer empaques dependiendo del producto
    static public function GetEmpaquesByProductos($data)
    {
        $datos = ControladorEmbalaje::ctrGetEmpaquesByProductos($data);
        $rta = json_encode($datos);
        echo ($rta);
    }
    /* --------------------POST DE LA CABECERA DEL EMBALAJE---------------------------------- */

    public function postEncabezadoEmb($data)
    {
        $RtaCabecera = ControladorEmbalaje::ctrPostEncabezadoEmb($data);
        $response = array("idEncabezado" => $RtaCabecera);
        echo json_encode($response);
    }
    /* --------------------POST DE LA CABECERA DEL EMBALAJE---------------------------------- */
    public function postDetalleEmb($idEncabezado, $data)
    {
        $RtaDetalleEmb = ControladorEmbalaje::ctrPostDetalleEmb($idEncabezado, $data);
        echo json_encode($RtaDetalleEmb);
    }
}


//traer empaques dependiendo del producto
if (isset($_POST['producto'])) {
    $postData = new EmbalajeAjax();
    $data = $_POST['producto'];
    $postData->GetEmpaquesByProductos($data);
}

/* --------------------POST DE LA CABECERA DEL EMBALAJE---------------------------------- */
if (isset($_POST['datosEcabezadoEmbalaje'])) {
    $ajaxCabecera = new EmbalajeAjax();
    $data = $_POST['datosEcabezadoEmbalaje'];

    $ajaxCabecera->postEncabezadoEmb($data);
}
/* ---POST DETALLE DE EMBALAJE----- */
if (isset($_POST['idEncabezado']) && isset($_POST['cantidades'])) {

    $ajaxDetalle = new EmbalajeAjax();
    $data = JSON_decode($_POST['cantidades'], true);
    $idEncabezado = $_POST['idEncabezado'];
    $ajaxDetalle->postDetalleEmb($idEncabezado, $data);
}
