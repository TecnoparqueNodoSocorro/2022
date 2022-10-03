<?php

class ControladorArticulos
{
    //post articulo
    static public function ctrPostArticulos($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlPostArticulos($tabla, $data);
        return $respuesta;
    }
    static public function ctrGetArticulos()
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlGetArticulos($tabla);
        return $respuesta;
    }
    static public function ctrCambiarEstado($data)
    {
        $tabla = "articulos";
        if ($data["estado"] == 1) {
            $estado = 0;
            $respuesta = ModelArticulos::mdlCambiarEstado($tabla, $data, $estado);
            return $respuesta;
        } else if ($data["estado"] == 0) {
            $estado = 1;
            $respuesta = ModelArticulos::mdlCambiarEstado($tabla, $data, $estado);
            return $respuesta;
        }
    }
    static public function ctrDeleteArticulo($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlDeleteArticulo($tabla, $data);
        return $respuesta;
    }
    static public function ctrGetArticulo($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlGetArticulo($tabla, $data);
        return $respuesta;
    }
    static public function ctrEditarArticulo($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlEditarArticulo($tabla, $data);
        return $respuesta;
    }
}
