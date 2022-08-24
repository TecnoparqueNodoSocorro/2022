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



  //CONSULTAR TODOS LOS REPORTES
  static public function ctrReporteControlesTPorUsuario($data)
  {

    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesTPorUsuario($tabla, $data);
    return $respuesta;
  }
  //CONSULTAR REPORTES ENFERMEDAD RESPIRATORIA
  static public function ctrReporteControlesERPorUsuario($data)
  {
    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesERPorUsuario($tabla, $data);
    return $respuesta;
  }


  //CONSULTAR REPORTES ENFERMEDAD GASTROINTESTINAL
  static public function ctrReporteControlesEGPorUsuario($data)

  {
    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesEGPorUsuario($tabla, $data);
    return $respuesta;
  }

  //CONSULTAR REPORTES ENFERMEDAD MORDEDURA
  static public function ctrReporteControlesEMPorUsuario($data)

  {
    $tabla = "registro_control";
    $respuesta = ModelReportes::mdlReporteControlesEMPorUsuario($tabla, $data);
    return $respuesta;
  }

  //CONSULTAR TRATAMIENTOS
  static public function ctrReporteTratamientos($data)

  {

    //SE PREGUNTA EL CARGO 1 ADMINISTRADOR PARA TRAER TODOS LOS TRATAMIENTOS DEL SISTEMA
    if ($data["id_cargo"] == 1) {
      $tabla = "registro_tratamientos";
      $respuesta = ModelReportes::mdlReporteTratamientos($tabla, $data);
      return $respuesta;
    }
    //SE PREGUNTA EL CARGO 2 ES CAPRINOCULTOR PARA MOSTRAR UNICAMENTE LOS TRATAMIENTOS REGISTRADOS POR ESE USUARIO
     else if ($data["id_cargo"] == 2) {
      $tabla = "registro_tratamientos";
      $respuesta = ModelReportes::mdlReporteTratamientosPorUsuario($tabla, $data);
      return $respuesta;
    }
  }
  //CONSULTAR DATOS PARA GENERAR LA GRAFICA
  static public function ctrReporteGrafico($data)
  {
    $tabla = "registro_produccion";
    $respuesta = ModelReportes::mdlGenerarGrafico($tabla, $data);
    return $respuesta;
  }
}
