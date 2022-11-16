<?php


class ControladorReporteTablas
{


    //trer la cantidad de recepciones de guayaba del día actual
    static public function ctrInformeGeneralTablas($data)
    {
        $tabla = "reporte_bocadillo";
        if ($data["producto"] == "1") {
            $respuesta = ModelReporteTablas::mdlInformeGeneralTablas($tabla, $data);
            return $respuesta;
        } else if ($data["producto"] == "2") {
            $respuesta = ModelReporteTablas::mdlInformelTablasBocadillo($tabla, $data);
            return $respuesta;
        } else if ($data["producto"] == "3") {
            $respuesta = ModelReporteTablas::mdlInformelTablasManzana($tabla, $data);
            return $respuesta;
        } else if ($data["producto"] == "4") {
            $respuesta = ModelReporteTablas::mdlInformelTablasExtrafino($tabla, $data);
            return $respuesta;
        } else if ($data["producto"] == "5") {
            $respuesta = ModelReporteTablas::mdlInformelTablasLonja($tabla, $data);
            return $respuesta;
        }
    }
}
