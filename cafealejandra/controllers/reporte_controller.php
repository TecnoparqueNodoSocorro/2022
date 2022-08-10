<?php


class ControladorReporte
{

    static public function ctrReporte($data)
    {


        $tabla = "registro";
        $where = "fecha_registro";
        $respuesta = ModelReporte::mdlReporte($tabla, $data, $where);
        return  $respuesta;
    }
    static public function ctrReporteEncargado($dato)
    {
        $tabla = "dias_no_asistidos";
        $respuesta = ModelReporte::mdlReporteEncargado($tabla, $dato);
        return $respuesta;
    }

    static public function ctrReporteRecolectorPagos($dato)
    {
        $tabla = "pagos";
        $respuesta = ModelReporte::mdlReporteRecolectorPagos($tabla, $dato);
        return ($respuesta);
    }
   
}
