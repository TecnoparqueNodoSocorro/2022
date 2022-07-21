<?php
require_once('../../controllers/facturas_controller.php');
require_once('../../models/facturas_modelo.php');


class FacturaAjax
{

    
    public function SaveIdFactura($idempresa)
    {
       
            $RtaCabecera = ControladorFacturas::CtrGuardarIdFactura($idempresa);
        /*    echo '<pre>';
        print_r($RtaCabecera);
        echo '</pre>'; */
    }


    public function SaveDetalleFactura($detalle)
    {
        $Dfactura = ControladorFacturas::CtrGuardarDetalleFactura($detalle);
        return ("ok controlador");
    }
}




/* --------------------------cabecera---------------------------------- */
if (isset($_POST['id_emp'])) {
    $ajaxCabecera = new FacturaAjax();
    $idempresa= $_POST['id_emp'];
    $ajaxCabecera->SaveIdFactura($idempresa);
    echo("ajaxphp  ok");
} else {
return ("nada de dato!!!");}

/* ---------------------------------detalle------ */

/* 
if (isset($_POST['dataDetalle'])) {

    $ajaxDetalle = new FacturaAjax();
    $detalle = JSON_decode('dataDetalle');
    $ajaxDetalle->SaveDetalleFactura($detalle);
} else {

    echo '<script language="javascript">alert("nada de datos");</script>';
} */
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
