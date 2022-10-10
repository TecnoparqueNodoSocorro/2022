<?php


class ControladorProduccion
{


    //REGISTRAR PRODUCCION
    static public function ctrPostProduccion($data)
    {
        $tabla = "registro_produccion";
        $respuesta = ModelProduccion::registroProduccion($tabla, $data);
        return $respuesta;
    }

}
