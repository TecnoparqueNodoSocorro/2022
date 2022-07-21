<?php

class ControladorFacturas
{
      static public function CtrGuardarIdFactura($cabecera)
      {

            $tabla = "facturas";
            $crearIdFactura = ModelFacturas::mdlFacturar($tabla, $cabecera);
         
            return ("ok modelo");
      }

      static public function CtrGuardarDetalleFactura($detalle)
      {

            $tabla = "factura_detalle";
            $crearDetalleFactura = ModelFacturas::mdlDetalleFactura($tabla, $detalle);
            return ("ok modelo")
      }
}
