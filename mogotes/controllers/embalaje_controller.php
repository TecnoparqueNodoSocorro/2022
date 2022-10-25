<?php


class ControladorEmbalaje
{


    //traer empaques dependiendo del producto
    static public function ctrGetEmpaquesByProductos($data)
    {
        $tabla = "embalaje_empaque";
        $respuesta = ModelEmbalaje::mdlGetEmpaquesByProductos($tabla, $data);
        return $respuesta;
    }


}
