<?php
require_once('../../controllers/facturas_controller.php');


class FacturaAjax
{


    static public function SaveIdFactura($datos)
    {
        /* armar el array cabecera (id empresa,fecha,usuario) */
        $tabla =
            $Cfactura = ControladorFacturas::CtrGuardarFactura($tabla, $cabecera);
    }


    public function SaveDetalleFact($datos)
    {
        /* armar array id cabecera, idproducto , cantiddad , valorunitario */
        $Dfactura = ControladorFacturas::CtrGuardarDetalleFactura($tabla, $detalle);
    }
}


if (isset($_POST['prodId']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['costo']) && isset($_POST['valor']) && isset($_POST['clasificacion'])) {
    $ajax = new FacturaAjax();
        $Factfecha =
        $factIDemp =
        $tabla = "facturacabecera";
    $ajax->SaveIdFactura($tabla, $cabecera);
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
