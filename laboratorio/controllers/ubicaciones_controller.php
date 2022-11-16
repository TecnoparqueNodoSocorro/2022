<?php


class ControladorUbicaciones
{

    //CREAR ubicacion
    static public function CtrPostCliente($data)
    {
        $tabla = "ubicaciones";
        $respuesta = ModelUbicaciones::mdlPostUbicacion($tabla, $data);
        echo $respuesta;
    }
    //CREAR ubicacion
    static public function CtrGetUbicacionesByCliente($data)
    {
        $tabla = "ubicaciones";
        $respuesta = ModelUbicaciones::mdlGetUbicacionesByCliente($tabla, $data);
        return $respuesta;
    }
}
