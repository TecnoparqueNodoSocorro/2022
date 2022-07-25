<?php

class ControladorFacturas
{
      static public function CtrGuardarIdFactura($empresa, $usuario)
      {
            $tabla = "facturas";
            $crearIdFactura = ModelFacturas::mdlFacturar($tabla, $empresa, $usuario);

            return $crearIdFactura;
      }

      static public function CtrGuardarDetalleFactura($idfactura, $detalle)
      {
            $tabla = "facturas_detalle";
            $crearDetalleFactura = ModelFacturas::mdlDetalleFactura($tabla, $idfactura, $detalle);
            return $crearDetalleFactura;
            /*  return $detalle; */
      }
}
