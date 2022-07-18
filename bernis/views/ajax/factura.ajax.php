<?php
require_once('../../controllers/facturas_controller.php');
require_once('../../models/facturas_modelo.php');


class FacturaAjax
{
    function __construct()
    {
    }
    static public function SaveIdFactura($tabla, $idempresa)
    {
        $Cfactura = ControladorFacturas::CtrGuardarFactura($tabla, $idempresa);
        return $Cfactura;
    }

    /* 
    public function SaveDetalleFact($datos)
    {
    
        $Dfactura = ControladorFacturas::CtrGuardarDetalleFactura($tabla, $detalle);
    } */
}


if (isset($_POST['data'])) {
    $ajaxCabecera = new FacturaAjax();
    $datos = json_decode('data');
    foreach ($datos as $dato => $valor) {
        $idempresa = $dato['id_empresa'];
        $idproducto = $dato['id_producto'];
        $nombreprod = $dato['namepro'];
        $cantidad = $dato['cantidad'];
        $tabla = "facturas";
        var_dump($idempresa);
        echo '<script language="javascript">alert("';
        echo $idempresa;
        echo '");</script>';
    }

    $ajaxCabecera->SaveIdFactura($tabla, $idempresa);
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
