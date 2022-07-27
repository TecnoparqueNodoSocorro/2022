<?php


class InformesController
{

    static public function ctrdatosconsultaAll($id_empresa, $finicial, $ffinal)
    {

        $tabla = "detalle_facturas";
        $datosconsulta1 = ModeloInformes::mdlconsultaAll($tabla, $id_empresa, $finicial, $ffinal);
        return $datosconsulta1;
    }

    static public function ctrdatosconsultaCat($id_empresa, $finicial, $ffinal, $categoria)
    {
        $tabla = "detalle_facturas";

        $datosconsulta2 = ModeloInformes::mdlconsultaCat($tabla, $id_empresa, $finicial, $ffinal, $categoria);
        return $datosconsulta2;
    }
}
