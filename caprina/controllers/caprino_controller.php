<?php


class ControladorCaprino
{

  static public function ctrPostCaprino($data)
  {


    $tabla = "registro_caprino";
    $respuesta = ModelCaprino::registroCaprino($tabla, $data);
    if ($respuesta == "ok") {
      return 1;
    } else {
      return 0;
    }
  }
  static public function ctrConsultarCaprino()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprino($tabla);
    return $consulta;
  }
//------------------CONSULTAR CANTIDAD DE CAPRINOS-----------------------
  static public function ctrConsultarCantidadDeCaprinos()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCantidadDeCaprinos($tabla);
    return $consulta;
  }
//------------------CONSULTAR CANTIDAD DE CAPRINOS POR RAZAS-----------------------
static public function ctrConsultarCantidadDeCaprinosPorRaza()
{
  $tabla = "registro_caprino";
  $consulta = ModelCaprino::mdlConsultarCantidadDeCaprinosPorRaza($tabla);
  return $consulta;
}
//------------------CONSULTAR CANTIDAD DE CAPRINOS ACTIVOS----------------------
  static public function ctrConsultarCaprinoActivo()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprinoActivo($tabla);
    return $consulta;
  }

  //------------------CONSULTAR CANTIDAD DE CAPRINOS INACTIVOS-----------------------
  static public function ctrConsultarCaprinoInactivo()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprinoInactivo($tabla);
    return $consulta;
  }

  //------------------CONSULTAR CAPRINOS----------------------
  static public function ctrGetCaprino($data)
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlGetCaprino($tabla, $data);
    return $consulta;
  }

  //------------------CONSULTAR CAPRINOS POR CODIGO------------------
  static public function ctrGetCaprinoInd($data)
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprinoInd($tabla, $data);
    return $consulta;
  }

//------------------POST TRATAMIENTOS----------------------
  static public function ctrPostTratamiento($descripcion, $id_usuario, $fecha_inicio)
  {
    $tabla = "registro_tratamientos";
    $crearIdFactura = ModelCaprino::mdlTratamiento($tabla, $descripcion, $id_usuario, $fecha_inicio);
    return $crearIdFactura;
  }

  //CALCULAR TODOS LOS TRATAMIENTOS
  static public function ctrCantidadTratamientos()
  {
    $tabla = "registro_tratamientos";
    $crearIdFactura = ModelCaprino::mdlCantidadTratamientos($tabla);
    return $crearIdFactura;
  }
//-----------------POST CAPRINOS EN TRATAMIENTO--------------------
  static public function ctrPostCaprinosTratamiento($idtratamiento, $caprinos)
  {
    $tabla = "caprinos_en_tratamiento";
    $crearDetalleFactura = ModelCaprino::mdlCaprinosTratamiento($tabla, $idtratamiento, $caprinos);
    return $crearDetalleFactura;
  }
}
