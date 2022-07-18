<?php

class ControladorFacturas
{
      static public function CtrGuardarFactura($tabla, $idempresa)
      {
$crearFactura=ModelFacturas::mdlFacturar($tabla, $idempresa);

      }

      static public function CtrGuardarDetalleFactura($tabla,$detalle)
      {
            

      }
}


