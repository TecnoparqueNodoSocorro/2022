<?php
require_once('../../controllers/facturas_controller.php');
require_once('../../models/facturas_modelo.php');


class FacturaAjax
{

    
    public function SaveIdFactura($idempresa, $idusuario)
    {
       
            $RtaCabecera = ControladorFacturas::CtrGuardarIdFactura($idempresa, $idusuario);
        echo ( $RtaCabecera);
    
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
   
/*  return $ajaxCabecera; */
} else {
return ("nada de dato!!!");}

/* ---------------------------------detalle------ */


if (isset($_POST['dataDetalle'])) {

    $ajaxDetalle = new FacturaAjax();
    $detalle = JSON_decode('dataDetalle');
    $ajaxDetalle->SaveDetalleFactura($detalle);
} else {

    echo '<script language="javascript">alert("nada de datos");</script>';
}
/* ------------------------------------------------ */

/* if (isset($_POST['data'])) {
    $data = json_decode($_POST["data"]);
    $myarray = $data->myArray;
    print_r($myarray);
    return $myarray;
    ///  aqui creas un ciclo para recorrer ahora el arreglo
    foreach ($myarray as $producto) {
        ///   aqui se recorre el array
    } 
}*/
