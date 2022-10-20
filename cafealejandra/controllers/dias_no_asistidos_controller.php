<?php


class ControladorEncargado
{

    static public function ctrAgregarDias($dato)
    {
        $tabla = "dias_no_asistidos";


        $respuesta = ModelDiasEncargado::mdlCompararFecha($tabla, $dato);

        if ($respuesta == "1") {
            return "Fecha ya registrada";
        } else if ($respuesta == "0") {
            $rta = ModelDiasEncargado::mdlAgregarDia($tabla, $dato);
            return $rta;
        } else {
            return $respuesta;
        }
    }
    static public function ctrConsultarDiasNoTrabajados($data)
    {
        $tabla = "dias_no_asistidos";
        $respuesta = ModelDiasEncargado::mdlCantidadDias($tabla, $data);
        return $respuesta;
    }
    /* consultar dias no asistidos */
    static public function ctrConsultarDia($dato)
    {
        $tabla = "dias_no_asistidos";
        $respuesta = ModelDiasEncargado::mdlDias($tabla, $dato);
        return $respuesta;
    }
}
