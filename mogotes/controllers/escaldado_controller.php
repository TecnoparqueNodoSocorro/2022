<?php


class ControladorEscaldado
{


    //registrar proceso de escaldado
    static public function ctrPostEscaldado($data)
    {
        $tabla = "escaldado";
        $respuesta = ModelEscaldado::mdlPostEscaldado($tabla, $data);
        return $respuesta;
    }

    //traer todos los registros por codigo
    static public function ctrGetReistrosByCodigo($data)
    {
        $tabla = "escaldado";
        $respuesta = ModelEscaldado::mdlGetReistrosByCodigo($tabla, $data);
        return $respuesta;
    }
}
