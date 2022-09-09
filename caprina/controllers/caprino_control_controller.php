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
  //---------------CANTIDAD DE CONTROLES ADMIN---------------------------
  static public function ctrCantidadDeControles()
  {
    $tabla = "registro_control";
    $respuesta = ModelCaprinoControl::mdlCantidadDeControles($tabla);
    return $respuesta;
  }
    //---------------CANTIDAD DE CONTROLES-CAPRINOCULTOR--------------------------
    static public function ctrCantidadDeControlesPorCaprinocultor($id)
    {
      $tabla = "registro_control";
      $respuesta = ModelCaprinoControl::mdlCantidadDeControlesPorCaprinocultor($tabla, $id);
      return $respuesta;
    }
  //---------------CANTIDAD DE CONTROLES EL DIA ACTUAL ADMIN---------------------------
  static public function ctrCantidadDeControlesHoy()
  {
    $tabla = "registro_control";
    $respuesta = ModelCaprinoControl::mdlCantidadDeControlesHoy($tabla);
    return $respuesta;
  }
    //---------------CANTIDAD DE CONTROLES EL DIA ACTUAL CAPRINOCULTOR---------------------------
    static public function ctrCantidadDeControlesHoyPorCaprinocultor($id)
    {
      $tabla = "registro_control";
      $respuesta = ModelCaprinoControl::mdlCantidadDeControlesHoyPorCaprinocultor($tabla, $id);
      return $respuesta;
    }

  //CONSULTAR CAPRINOS PARA LISTAR
  static public function ctrConsultarCaprino()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprino($tabla);
    return $consulta;
  }
    //---------------CANTIDAD DE CONTROLES EL DIA ACTUAL---------------------------
    static public function ctrConsultarControlesPorUsuario($usuario)
    {
      $tabla = "registro_control";
      $respuesta = ModelCaprinoControl::mdlConsultarControlesPorUsuario($tabla, $usuario);
      return $respuesta;
    }
}
