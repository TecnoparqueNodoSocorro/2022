<?php


class ControladorReportes
{


    //registrar reporte de bocadillo
    static public function ctrPostReporteBocadillo($data)
    {
        $tabla = "reporte_bocadillo";
        $respuesta = ModelReportes::mdlPostReporteBocadillo($tabla, $data);
        return $respuesta;
    }
    //get info lot reporte bocadillo por codigo
    static public function ctrGetInfoByCodigoo($data)
    {
        $tabla = "reporte_bocadillo";
        $respuesta = ModelReportes::mdlGetInfoByCodigo($tabla, $data);
        return $respuesta;
    }
    //get registro por id reporte bocadillo
    static public function ctrGetRegistroById($data)
    {
        $tabla = "reporte_bocadillo";
        $respuesta = ModelReportes::mdlGetRegistroById($tabla, $data);
        return $respuesta;
    }





    //registrar reporte de arequipe
    static public function ctrPostReporteArequipe($data)
    {
        $tabla = "reporte_arequipe";
        $respuesta = ModelReportes::mdlPostReporteArequipe($tabla, $data);
        return $respuesta;
    }

    //get info lot reporte bocadillo por codigo
    static public function ctrGetInfoByCodigoAre($data)
    {
        $tabla = "reporte_arequipe";
        $respuesta = ModelReportes::mdlGetInfoByCodigoAre($tabla, $data);
        return $respuesta;
    }
    //get registro por id reporte arequipe
    static public function ctrGetRegistroByIdAre($data)
    {
        $tabla = "reporte_arequipe";
        $respuesta = ModelReportes::mdlGetRegistroByIdAre($tabla, $data);
        return $respuesta;
    }






    //registrar reporte de espejuelo
    static public function ctrPostReporteEspejuelo($data)
    {
        $tabla = "reporte_espejuelo";
        $respuesta = ModelReportes::mdlPostReporteEspejuelo($tabla, $data);
        return $respuesta;
    }

    //get info del lote de espejuelo por codigo
    static public function ctrGetInfoByCodigoEsp($data)
    {
        $tabla = "reporte_espejuelo";
        $respuesta = ModelReportes::mdlGetInfoByCodigoEsp($tabla, $data);
        return $respuesta;
    }
    //get registro por id reporte espejuelo
    static public function ctrGetRegistroByIdEsp($data)
    {
        $tabla = "reporte_espejuelo";
        $respuesta = ModelReportes::mdlGetRegistroByIdEsp($tabla, $data);
        return $respuesta;
    }
}
