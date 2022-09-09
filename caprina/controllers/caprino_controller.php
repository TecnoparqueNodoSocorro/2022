<?php


class ControladorCaprino
{


  //POSTEO DE CAPRINOS
  static public function ctrPostCaprino($data)
  {
    $tabla = "registro_caprino";
    $respuesta = ModelCaprino::registroCaprino($tabla, $data);
    if ($respuesta == "ok") {
      //SI SE RETORNA 1 SE POSTEA EL CAPRINO
      return 1;
    } else 
    //SI EL MODELO NO DEVUELVE "OK" ES PORQUE EL CÓDIGO QUE SE ESTÁ REPITIENDO
    {
      return 0;
    }
  }
  //TRAER CAPRINO DE MANERA INDIVUAL, POR CÓDIGO 
  static public function ctrConsultarCaprino()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprino($tabla);
    return $consulta;
  }
//------------------CONSULTAR CANTIDAD DE CAPRINOS- ESTADO GENERAL ADMIN----------------------
  static public function ctrConsultarCantidadDeCaprinos()
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCantidadDeCaprinos($tabla);
    return $consulta;
  }
  //------------------CONSULTAR CANTIDAD DE CAPRINOS- ESTADO GENERAL CAPRINOCULTOR----------------------
  static public function ctrConsultarCantidadDeCaprinosPorCaprinocultor($id)
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCantidadDeCaprinosPorCaprinocultor($tabla, $id);
    return $consulta;
  }
//------------------CONSULTAR CANTIDAD DE CAPRINOS POR RAZAS-ADMIN----------------------
static public function ctrConsultarCantidadDeCaprinosPorRaza()
{
  $tabla = "registro_caprino";
  $consulta = ModelCaprino::mdlConsultarCantidadDeCaprinosPorRaza($tabla);
  return $consulta;
}
//------------------CONSULTAR CANTIDAD DE CAPRINOS POR RAZAS-CAPRINOCULTOR----------------------
static public function ctrConsultarCantidadDeCaprinosPorRazaPorCaprinocultor($id)
{
  $tabla = "registro_caprino";
  $consulta = ModelCaprino::mdlConsultarCantidadDeCaprinosPorRazaPorCaprinocultor($tabla, $id);
  return $consulta;
}
//------------------CONSULTAR CANTIDAD DE CAPRINOS ACTIVOS----------------------
  static public function ctrConsultarCaprinoActivo($id)
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprinoActivo($tabla, $id);
    return $consulta;
  }

  //------------------CONSULTAR CANTIDAD DE CAPRINOS INACTIVOS-----------------------
  static public function ctrConsultarCaprinoInactivo($id)
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlConsultarCaprinoInactivo($tabla, $id);
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

  //CALCULAR TODOS LOS TRATAMIENTOS ADMIN
  static public function ctrCantidadTratamientos()
  {
    $tabla = "registro_tratamientos";
    $crearIdFactura = ModelCaprino::mdlCantidadTratamientos($tabla);
    return $crearIdFactura;
  }
    //CALCULAR TODOS LOS TRATAMIENTOS CAPRINOCULTOR
    static public function ctrCantidadTratamientosPorCaprinocultor($id)
    {
      $tabla = "registro_tratamientos";
      $crearIdFactura = ModelCaprino::mdlCantidadTratamientosPorCaprinocultor($tabla, $id);
      return $crearIdFactura;
    }
//-----------------POST CAPRINOS EN TRATAMIENTO--------------------
  static public function ctrPostCaprinosTratamiento($idtratamiento, $caprinos)
  {
    $tabla = "caprinos_en_tratamiento";
    $crearDetalleFactura = ModelCaprino::mdlCaprinosTratamiento($tabla, $idtratamiento, $caprinos);
    return $crearDetalleFactura;
  }

  //-----------------GET CAPRINO POR USUARIO--------------------
  static public function ctrGetCaprinoUsuario($data)
  {
    $tabla = "registro_caprino";
    $consulta = ModelCaprino::mdlCaprinosPorUsuario($tabla, $data);
    return $consulta;
  }
}
