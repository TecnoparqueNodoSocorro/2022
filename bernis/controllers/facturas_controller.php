<?php

class ControladorFacturas
{
      static public function CtrGuardarIdFactura($cabecera)
      {
            $tabla = "facturas";
            $crearIdFactura = mdlFacturar->mdlFacturar($tabla, $cabecera);
         
            return crearIdFactura;
      }

      static public function CtrGuardarDetalleFactura($detalle)
      {

            $tabla = "factura_detalle";
            $crearDetalleFactura = ModelFacturas::mdlDetalleFactura($tabla, $detalle);
      }
}
