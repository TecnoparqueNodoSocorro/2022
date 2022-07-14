<?php
require_once('../../controllers/facturas_controller.php');


class FacturaAjax{


    static public function SaveIdFactura($datos){

    }


    public function SaveDetalleFact ($datos){
        
    }
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


    /* armar el array cabecera (id empresa,fecha,usuario) */
    $Cfactura = ControladorFacturas::CtrGuardarFactura($tabla, $cabecera);
    /* armar array id cabecera, idproducto , cantiddad , valorunitario */
    $Dfactura = ControladorFacturas::CtrGuardarDetalleFactura($tabla, $detalle);
}
