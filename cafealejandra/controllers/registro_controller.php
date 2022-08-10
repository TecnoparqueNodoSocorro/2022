<?php


class ControladorRegistro
{

    static public function ctrPostRegistro($data)
    {


        $tabla = "registro";
        $respuesta = ModelRegistro::mldRegistroTrabajo($tabla, $data);
        return $respuesta;
    }

   
}
