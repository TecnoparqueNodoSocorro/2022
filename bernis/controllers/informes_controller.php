<?php


class InformesController
{

    static public function ctrdatosconsultaAll($datosConsulta)
    {

        $tabla = "facturas_detalle";
        $datosconsulta1 = ModeloInformes::mdlconsultaAll($tabla, $datosConsulta);
        return $datosconsulta1;
    }

    static public function ctrdatosconsultaCat($datosConsulta)
    {
        $tabla = "facturas_detalle";

        $datosconsulta2 = ModeloInformes::mdlconsultaCat($tabla, $datosConsulta);
        return $datosconsulta2;
    }
}
