<?php
require_once('../../controllers/facturas_controller.php');
require_once('../../models/facturas_modelo.php');


class FacturaAjax
{

    
    public function SaveIdFactura($idempresa, $idusuario)
    {
       
            $RtaCabecera = ControladorFacturas::CtrGuardarIdFactura($idempresa, $idusuario);
             return $RtaCabecera;
    
    }


    public function SaveDetalleFactura($detalle)
    {
        $Dfactura = ControladorFacturas::CtrGuardarDetalleFactura($detalle);
     /*    return ("ok controlador"); */
    }
}




/* --------------------------cabecera---------------------------------- */
if (isset($_POST['datosfactura']))  {
    $ajaxCabecera = new FacturaAjax();
    $data= $_POST['datosfactura'];
    $idempresa = $data['d_emp'];
    $idusuario = $data['d_user'];
    $ajaxCabecera->SaveIdFactura($idempresa, $idusuario);
   
} else {
return ("nada de dato cabecera!!!");}

/* ---------------------------------detalle------ */


if (isset($_POST['dataDetalle'])) {

    $ajaxDetalle = new FacturaAjax();
    $detalle = JSON_decode('dataDetalle');
    $ajaxDetalle->SaveDetalleFactura($detalle);
} else {
    return ("nada de dato detalle!!!");
}
  

/* ------------------------------------------------ */

