<?php
require_once('../../controllers/facturas_controller.php');
require_once('../../models/facturas_modelo.php');


class FacturaAjax
{


    public function SaveIdFactura($idempresa, $idusuario)
    {

        $RtaCabecera = ControladorFacturas::CtrGuardarIdFactura($idempresa, $idusuario);
        $response = array("idFactura" => $RtaCabecera);
        echo json_encode($response);
    }


    public function SaveDetalleFactura($idfactura, $detalle)
    {
        $RtaDetallefact = ControladorFacturas::CtrGuardarDetalleFactura($idfactura,$detalle);
        echo json_encode($RtaDetallefact);
    }
}




/* --------------------------cabecera---------------------------------- */
if (isset($_POST['datosfactura'])) {
    $ajaxCabecera = new FacturaAjax();
    $data = $_POST['datosfactura'];
    $idempresa = $data['d_emp'];
    $idusuario = $data['d_user'];
    $ajaxCabecera->SaveIdFactura($idempresa, $idusuario);
} else {
    return ("nada de dato cabecera!!!");
}

/* ---------------------------------detalle------ */


if (isset($_POST['idfactura']) && isset($_POST['detallefactura'])) {

    $ajaxDetalle = new FacturaAjax();
    $detalle = JSON_decode('dataDetalle');
    $ajaxDetalle->SaveDetalleFactura($idfactura, $detalle);

} else {
    return ("nada de dato detalle!!!");
}
  

/* ------------------------------------------------ */
