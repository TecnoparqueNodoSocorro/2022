<?php


class ControladorMaterias
{

    //TRAER SABORES
    static public function ctrGetMaterias()
    {
        $tabla = "materias";
        $respuesta = ModelMaterias::mdlGetMaterias($tabla);

        return $respuesta;
        //------------------------------------------
    }
}
