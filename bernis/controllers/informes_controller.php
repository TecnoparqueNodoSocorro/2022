<?php


class InformesController
{

    static public function ctrdatosconsultaAll($finicial, $ffinal)
    {
        $id_empresa = 1;
        $tabla = "detalle_facturas";
        $datosconsulta1=ModeloInformes::mdlconsultaAll(  $tabla, $id_empresa,$finicial, $ffinal);
        return $datosconsulta1;
    }

    static public function ctrdatosconsultaCat($finicial, $ffinal, $categoria)
    {
        $tabla="detalle_facturas";
        $id_empresa = 1;
        $datosconsulta2= ModeloInformes::mdlconsultaCat( $tabla, $id_empresa, $finicial, $ffinal,$categoria);
        return $datosconsulta2;
    }

}
