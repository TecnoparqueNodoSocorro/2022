<?php

class ControladorFacturas
{
      static public function CtrGuardarIdFactura($empresa,$usuario)
      {

            $tabla = "facturas";
            $crearIdFactura = ModelFacturas::mdlFacturar($tabla, $empresa,$usuario);
           
           return $crearIdFactura;
      }

      static public function CtrGuardarDetalleFactura($detalle)
      {

            $tabla = "factura_detalle";
            $crearDetalleFactura = ModelFacturas::mdlDetalleFactura($tabla, $detalle);
         /*    return "ok controller"; */
      }
}
