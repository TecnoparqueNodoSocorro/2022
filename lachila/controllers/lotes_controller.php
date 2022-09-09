<?php


class ControladorLotes
{


  //CREAR LOTE
  static public function ctrPostLote($data)
  {
    $tabla = "lotes";
    $respuesta = ModelLotes::mdlPostLote($tabla, $data);
    echo $respuesta;
  }
  //LISTAR LOTES DE MANERA DINÁMICA
  static public function ctrGetLotes($data)
  {
    //ID CARGO 1 EMPLEADO
    if ($data["fermentacion"] == 4 and $data["id_cargo"] == 1) {
      $tabla = "registro_variables";
      $respuesta = ModelLotes::mdlGetLotesHistorialPorUsuario($tabla, $data);
      return $respuesta;
    }
    //ID CARGO 2  ADMINISTRADOR
    else if ($data["fermentacion"] == 4 and $data["id_cargo"] == 2) {
      $tabla = "registro_variables";
      $respuesta = ModelLotes::mdlGetLotesHistorial($tabla, $data);
      return $respuesta;
    } else {
      $tabla = "lotes";
      $respuesta = ModelLotes::mdlGetLotes($tabla, $data);
      return $respuesta;
    }
  }

  //CAMBIAR DE ESTADO O FASE LOS LOTES
  static public function ctrUpdateLote($data)
  {
    $tabla = "lotes";


    //SE FILTRA POR LA FERMENTACIÓN EN LA QUE ESTÁ, Y SE DEFINE A LA QUE SE VA A ADELANTAR EN LA VARIABLE FASE
    if ($data["fermentacion"] == 1) {
      //SI ESTA EN LA FASE 1 SE ADELANTA A LA FASE 2 
      $fase = 2;
      $respuesta = ModelLotes::mdlUpdateFase($tabla, $data, $fase);
      return $respuesta;
    } else if ($data["fermentacion"] == 2) {
      $fase = 3;
      $respuesta = ModelLotes::mdlUpdateFase($tabla, $data, $fase);
      return $respuesta;
    } else if ($data["fermentacion"] == 3) {
      $fase = 4;
      //SE CREA UN MODELO DIFERENTE PARA LOS LOTES QUE VAN A FASE 4 O HISTORIAL
      $respuesta = ModelLotes::mdlUpdateToFase4($tabla, $data, $fase);
      return $respuesta;
    }
  }
  //TRAER REGISTROS DE  LOTES FILTRANDO POR lote Y QUE ESTÉ EN FASE 4
  static public function ctrGetInfoLote($data)
  {
    $tabla = "registro_variables";
    $respuesta = ModelLotes::mdLGetInfoLote($tabla, $data);
    return $respuesta;
  }
  //TRAER REGISTROS DE UN LOTES FILTRANDO POR USUARIO Y QUE ESTÉ EN FASE 4
  static public function ctrGetInfoLotePorUsuario($data)
  {
    $tabla = "registro_variables";
    $respuesta = ModelLotes::mdLGetInfoLotePorUsuario($tabla, $data);
    return $respuesta;
  }

}
