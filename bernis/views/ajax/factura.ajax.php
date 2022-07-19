<?php
require_once('../../controllers/facturas_controller.php');
require_once('../../models/facturas_modelo.php');


class FacturaAjax
{
    function __construct()
    {
    }
    static public function SaveIdFactura($cabecera)
    {
        $Cfactura = ControladorFacturas::CtrGuardarIdFactura($cabecera);
        return $lastInsertI;
    }


    public function SaveDetalleFactura($detalle)
    {
        $Dfactura = ControladorFacturas::CtrGuardarDetalleFactura($detalle);
        return $Dfactura;
    }
}
/* --------------------------------------------------------------------------------------- */
if (isset($_POST['dataCabecera'])) {
    $ajaxCabecera = new FacturaAjax();
    $detalle = JSON_decode('dataCabecera');
    $ajaxCabecera->SaveIdFactura($cabecera);
} else {

    echo '<script language="javascript">alert("nada de datos");</script>';
}

/* --------------------------------------- */


if (isset($_POST['dataDetalle'])) {

    $ajaxDetalle = new FacturaAjax();
    $detalle = JSON_decode('dataDetalle');
    $ajaxDetalle->SaveDetalleFactura($detalle);
} else {

    echo '<script language="javascript">alert("nada de datos");</script>';
}




















if (isset($_POST['data'])) {
    $data = json_decode($_POST["data"]);
    $myarray = $data->myArray;
    print_r($myarray);
    return $myarray;
    ///  aqui creas un ciclo para recorrer ahora el arreglo
    foreach ($myarray as $producto) {
        ///   aqui se recorre el array
    }
}
