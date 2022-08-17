<?php


class ControladorCaprinoControl
{

  //INSERTAR CONTROL A CAPRINO
  static public function ctrPostCaprinoControl($data)
  {
    $tabla = "registro_control";
    $respuesta = ModelCaprinoControl::mdlRegistroCaprinoControl($tabla, $data);
    return $respuesta;
  }
  //---------------CANTIDAD DE CONTROLES---------------------------
  static public function ctrCantidadDeControles()
  {
    $tabla = "registro_control";
    $respuesta = ModelCaprinoControl::mdlCantidadDeControles($tabla);
    return $respuesta;
  }
  //---------------CANTIDAD DE CONTROLES EL DIA ACTUAL---------------------------
  static public function ctrCantidadDeControlesHoy()
  {
    $tabla = "registro_control";
    $respuesta = ModelCaprinoControl::mdlCantidadDeControlesHoy($tabla);
    return $respuesta;
  }

  //CONSULTAR CAPRINOS PARA LISTAR
  static public function ctrConsultarCaprino()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprino($tabla);
    return $consulta;
  }
}
