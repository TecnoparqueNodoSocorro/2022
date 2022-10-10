<?php


class ControladorSalidas
{
//REGISRTAR SALIDAS DE CAPRINOS
  static public function ctrPostSalidas($data)
  {
    $tabla = "registro_caprino";
    $estado = 0;
    $respuesta = ModelSalidas::registroSalida($tabla, $data, $estado);
    return $respuesta;
  }
}
