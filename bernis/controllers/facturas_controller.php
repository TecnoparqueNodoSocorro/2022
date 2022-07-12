<?php

class ControladorFacturas
{
      static public function CtrGuardarFactura()
      {




            if (isset($_POST['data'])) {
                  $data = json_decode($_POST["data"]);
                  $myarray = $data->myArray;
                  print_r ($myarray); 
                  ///  aqui creas un ciclo para recorrer ahora el arreglo
                  foreach ($myarray as $producto) {
                        ///   aqui se recorre el array
                  }
                  $factura = ModelFacturas::mdlFacturar($tabla, $cabecera);
                  GuardarDetalleFactura();
            }
      }

      static public function GuardarDetalleFactura()
      {
            $detalle = ModelFacturas::mdlDetalleFactura($tabla, $detalle);
      }
}


