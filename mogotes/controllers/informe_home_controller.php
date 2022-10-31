<?php


class ControladorHome
{


    //trer la cantidad de recepciones de guayaba del día actual
    static public function ctrRecepcionesHoy()
    {
        $tabla = "lote";
        $respuesta = ModelHome::mdlRecepcionesHoy($tabla);
        return $respuesta;
    }
    // ----------traer escaldadas hoy ---------
    static public function ctrEscaldadasHoy()
    {
        $tabla = "escaldado";
        $respuesta = ModelHome::mdlEscaldadasHoy($tabla);
        return $respuesta;
    }
    // ----------traer reporte de bocadillo hoy ---------
    static public function ctrReporteArequipeHoy()
    {
        $tabla = "reporte_arequipe";
        $respuesta = ModelHome::mdlReporteArequipeHoy($tabla);
        return $respuesta;
    }
    // ----------traer  reporte de arequipe hoy ---------
    static public function ctrReporteBocadilloHoy()
    {
        $tabla = "reporte_bocadillo";
        $respuesta = ModelHome::mdlReporteBocadilloHoy($tabla);
        return $respuesta;
    }
    // ----------traer reporte de espejuelo hoy ---------
    static public function ctrReporteEspejueloHoy()
    {
        $tabla = "reporte_espejuelo";
        $respuesta = ModelHome::mdlReporteEspejueloHoy($tabla);
        return $respuesta;
    }
    //-----traer lo embalajes del día de hoy
    static public function ctrEmbalajesHoy()
    {
        $tabla = "embalaje_encabezado";
        $respuesta = ModelHome::mdlEmbalajesHoy($tabla);
        return $respuesta;
    }
    //-----traer lo embalajes del día de hoy
    static public function ctrLotesPorEstado()
    {
        $tabla = "lote";
        $respuesta = ModelHome::mdlLotesPorEstado($tabla);
        return ($respuesta);
    }




    //trer la cantidad de recepciones de guayaba del día actual por usuario
    static public function ctrRecepcionesHoyPorUsuario($id)
    {
        $tabla = "lote";
        $respuesta = ModelHome::mdlRecepcionesHoyPorUsuario($tabla, $id);
        return $respuesta;
    }
    // ----------traer escaldadas hoy por usuario ---------
    static public function ctrEscaldadasHoyPorUsuario($id)
    {
        $tabla = "escaldado";
        $respuesta = ModelHome::mdlEscaldadasHoyPorUsuario($tabla, $id);
        return $respuesta;
    }
    // ----------traer reporte de bocadillo hoy por usuario ---------
    static public function ctrReporteArequipeHoyPorUsuario($id)
    {
        $tabla = "reporte_arequipe";
        $respuesta = ModelHome::mdlReporteArequipeHoyPorUsuario($tabla, $id);
        return $respuesta;
    }
    // ----------traer  reporte de arequipe hoy por usuario ---------
    static public function ctrReporteBocadilloHoyPorUsuario($id)
    {
        $tabla = "reporte_bocadillo";
        $respuesta = ModelHome::mdlReporteBocadilloHoyPorUsuario($tabla, $id);
        return $respuesta;
    }
    // ----------traer reporte de espejuelo hoy por usuario ---------
    static public function ctrReporteEspejueloHoyPorUsuario($id)
    {
        $tabla = "reporte_espejuelo";
        $respuesta = ModelHome::mdlReporteEspejueloHoyPorUsuario($tabla, $id);
        return $respuesta;
    }
    //-----traer lo embalajes del día de hoy por usuario
    static public function ctrEmbalajesHoyPorUsuario($id)
    {
        $tabla = "embalaje_encabezado";
        $respuesta = ModelHome::mdlEmbalajesHoyPorUsuario($tabla, $id);
        return $respuesta;
    }
}
