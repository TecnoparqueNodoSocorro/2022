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
    //funcion para listar todos los articulos desde el front
    static public function ctrGetArticulos()
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlGetArticulos($tabla);
        return $respuesta;
    }

    //cambio de estado de articulo
    static public function ctrCambiarEstado($data)
    {

        $tabla = "articulos";

        //se valida el estado que viene en el json, si viene 1 es activo, entonces se manda a desactivar
        if ($data["estado"] == 1) {
            $estado = 0;
            $respuesta = ModelArticulos::mdlCambiarEstado($tabla, $data, $estado);
            return $respuesta;
        }
        //se valida el estado que viene en el json, si viene 0 esta inactivo, entonces se manda a activar
        else if ($data["estado"] == 0) {
            $estado = 1;
            $respuesta = ModelArticulos::mdlCambiarEstado($tabla, $data, $estado);
            return $respuesta;
        }
    }

    //delete articulo
    static public function ctrDeleteArticulo($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlDeleteArticulo($tabla, $data);
        return $respuesta;
    }

    //Get datos para editar
    static public function ctrGetArticulo($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlGetArticulo($tabla, $data);
        return $respuesta;
    }

    //post articulo editado
    static public function ctrEditarArticulo($data)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlEditarArticulo($tabla, $data);
        return $respuesta;
    }

    //se llaman los articulos dependiende de la sesion y el municipio los cuales se envian como parametro desde el front end
    static public function ctrGetArticuloPorSession($mun, $session)
    {
        $tabla = "articulos";
        $respuesta = ModelArticulos::mdlGetArticuloPorSession($tabla, $mun, $session);
        return $respuesta;
    }
}
