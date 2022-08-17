<?php


class ControladorReportes
{

  //CONSULTAR TODOS LOS REPORTES
  static public function ctrReporteControlesT($data)
  {

    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesT($tabla, $data);
    return $respuesta;
  }
  //CONSULTAR REPORTES ENFERMEDAD RESPIRATORIA
  static public function ctrReporteControlesER($data)
  {
    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesER($tabla, $data);
    return $respuesta;
  }


  //CONSULTAR REPORTES ENFERMEDAD GASTROINTESTINAL
  static public function ctrReporteControlesEG($data)

  {
    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesEG($tabla, $data);
    return $respuesta;
  }

  //CONSULTAR REPORTES ENFERMEDAD MORDEDURA
  static public function ctrReporteControlesEM($data)

  {
    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesEM($tabla, $data);
    return $respuesta;
  }
  //CONSULTAR TRATAMIENTOS
  static public function ctrReporteTratamientos($data)

  {
    $tabla = "registro_tratamientos";
    $respuesta = ModelReportes::mdlReporteTratamientos($tabla, $data);
    return $respuesta;
  }
  //CONSULTAR DATOS PARA GENERAR LA GRAFICA
  static public function ctrReporteGrafico($data)

  {
    $tabla = "registro_produccion";
    $respuesta = ModelReportes::mdlGenerarGrafico($tabla, $data);
    return $respuesta;
  }
}
