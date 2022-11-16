<?php


class ControladorLote
{

    //CREAR LOTE
    static public function ctrPostLote($data)
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlPostLote($tabla, $data);
        echo $respuesta;
    }
    //TRAER TODOS LOS LOTES PARA EL INFORME
    static public function ctrGetLotesInformes()
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLotesInformes($tabla);
        return $respuesta;
    }
    //TRAER TODOS LOS LOTES finalizados PARA EL INFORME
    static public function ctrGetLotesFinalizadosInformes()
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLotessFinalizadosInformes($tabla);
        return $respuesta;
    }
    //TRAER TODOS LOS LOTES que esten es tado 1 o 2 para el escaldado
    static public function ctrGetLotesEscaldado()
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLotesEscaldado($tabla);
        return $respuesta;
    }
    //TRAER TODOS LOS LOTES que esten es tado 2 para el reporte de produccion
    static public function mdlGetLotesReporte()
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLotesReporte($tabla);
        return $respuesta;
    }

    //TRAER TODOS LOS LOTES que esten es tado 2 para el reporte de produccion
    static public function ctrGetLotesEmbalaje()
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLotesEmbalaje($tabla);
        return $respuesta;
    }
    //finalizar lote
    static public function ctrFinalizarLote($data)
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlFinalizarLote($tabla, $data);
        return $respuesta;
    }
    //traer lote por codigo
    static public function ctrGetLoteByCodigo($data)
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLoteByCodigo($tabla, $data);
        return $respuesta;
    }
    //traer lote por codigo
    static public function ctrGetLoteInfo($data)
    {
        $tabla = "lote";
        $respuesta = ModelLote::mdlGetLoteInfo($tabla, $data);
        return $respuesta;
    }
}
