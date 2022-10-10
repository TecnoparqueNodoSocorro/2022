<?php


class ControladorCosecha
{

    //CREAR COSECHA
    static public function ctrPostCosecha($data)
    {
        $tabla = "cosechas";
        $respuesta = ModelCosecha::mdlregistroCosecha($tabla, $data);
        return $respuesta;
    }


    //CONSULTAR COSECHA
    static public function ConsultarCosecha()
    {
        $tabla = "cosechas";
        $consulta = ModelCosecha::mdlConsultarCosecha($tabla);
        return  $consulta;
    }


    //CONSULTAR COSECHAS ACTIVAS
    static public function ConsultarCosechaActiva()
    {
        $tabla = "cosechas";
        $consulta = ModelCosecha::mdlConsultarCosechaActiva($tabla);
        return  $consulta;
    }


    //DESACTIVAR COSECHA
    static public function ctrFinalizarCosecha($data)
    {
        $tabla = "cosechas";
        $estado = 0;
        $rta = ModelCosecha::mdlFinalizarCosecha($tabla, $data, $estado);
        return $rta;
    }


    //REPORTE DE KILOS POR COSECHA
    static public function ctrReporteCosecha($data)
    {
        $tabla = "cosechas";
        $rta = ModelCosecha::mdlReporteCosecha($tabla, $data);
        return $rta;
    }



   /*  //REPORTE GENERAL
    static public function ctrReporteGeneralPagos($data)
    {
        $tabla = "pagos";
        $rta = ModelCosecha::mdlReporteGeneralPagos($tabla, $data);
        return $rta;
    } */
}
