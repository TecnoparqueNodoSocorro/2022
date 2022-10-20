<?php


class ControladorVariables
{


  //CREAR VARIABLE
  static public function ctrPostVariable($data)
  {
    $tabla = "registro_variables";
    $respuesta = ModelVariables::mdlPostVariables($tabla, $data);
    echo $respuesta;
  }
  //TRAER REGISTROS POR USUARIO
  static public function ctrGetRegistros($id)
  {
    $tabla = "registro_variables";
    $respuesta = ModelVariables::mdlGetRegistros($tabla, $id);
    return $respuesta;
  }
  //get datos de lotes que esten en f1 para vista de administrador
  static public function ctrGetDatosFer1($data)
  {
    $tabla = "registro_variables";
    $respuesta = ModelVariables::mdlGetDatosFer1($tabla, $data);
    return $respuesta;
  }
  //GENERAR DATOS GRAFICA
  static public function ctrDatosGrafica($data)
  {
    $tabla = "registro_variables";
    $respuesta = ModelVariables::mdlDatosGrafica($tabla, $data);
    return $respuesta;
  }   //DATOS HOME ANDMIN
  static public function ctrDatosHome($fase)
  {
    $tabla = "registro_variables";
    $respuesta = ModelVariables::mdlDatosHome($tabla, $fase);
    return $respuesta;
  }
  //DATOS HOME ANDMIN
  static public function ctrDatosHomeEmp($fase, $id)
  {
    $tabla = "registro_variables";
    $respuesta = ModelVariables::mdlDatosHomeEmpl($tabla, $fase, $id);
    return $respuesta;
  }
}
