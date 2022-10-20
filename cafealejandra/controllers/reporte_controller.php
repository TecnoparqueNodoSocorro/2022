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
    //CONSULTAR PAGOS ANTERIORES A LOS RECOLECTORES
    static public function ctrReporteRecolectorPagos($data)
    {
        $tabla = "pagos";
        $respuesta = ModelReporte::mdlReporteRecolectorPagos($tabla, $data);
        return ($respuesta);
    }
}
