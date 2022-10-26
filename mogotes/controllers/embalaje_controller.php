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
    /* --------------------POST DE LA CABECERA DEL EMBALAJE---------------------------------- */
    static public function ctrPostEncabezadoEmb($data)
    {
        $tabla = "embalaje_encabezado";
        $crearIdEncabezado = ModelEmbalaje::mdlPostEncabezadoEmb($tabla, $data);
        return $crearIdEncabezado;
    }
    /* --------------------POST DE LA CABECERA DEL EMBALAJE---------------------------------- */
    static public function ctrPostDetalleEmb($idEncabezado, $data)
    {
        $tabla = "embalaje_detalle";

        $crearDetalleEmbalaje = ModelEmbalaje::mdlPostDetalleEmb($tabla, $idEncabezado,  $data);
        return $crearDetalleEmbalaje;
    }
}
