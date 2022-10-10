<?php


class ControladorEnvases
{

    //TRAER ENVASES
    static public function ctrGetEnvases()
    {
        $tabla = "envases";
        $respuesta = ModelEnvases::mdlGetEnvases($tabla);

        return $respuesta;
        //------------------------------------------
    }
    //CREAR ENVASES
    static public function ctrPostEnvase($data)
    {
        $tabla = "envasado";
        $respuesta = ModelEnvases::mdlPostEnvasado($tabla, $data);

        return $respuesta;
        //------------------------------------------
    }
    //GET ENVASES POR LOTE
    static public function ctrGetEnvase($data)
    {
        /*   $tabla = "envasado";
        if(isset($data["id_usuario"])){
            $respuesta = ModelEnvases::mdlGetEnvasadosPorUsuario($tabla, $data);
            return $respuesta;
        }else{
            $respuesta = ModelEnvases::mdlGetEnvasados($tabla, $data);
            return $respuesta;
        } */

        $tabla = "envasado";
        $respuesta = ModelEnvases::mdlGetEnvasados($tabla, $data);
        return $respuesta;
        //------------------------------------------
    }
     //GET cantidades de presentaciones o ENVASES POR LOTE
     static public function ctrGetEnvasePorLote($data)
     {
         $tabla = "envasado";
         $respuesta = ModelEnvases::mdlGetEnvasadosPorLote($tabla, $data);
         return $respuesta;
         //------------------------------------------
     }
}
