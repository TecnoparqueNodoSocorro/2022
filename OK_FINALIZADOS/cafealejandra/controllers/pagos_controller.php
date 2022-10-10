<?php


class ControladorPagos
{
    // CONSULTAR LOS KILOS RECOLECTADOS Y EL PRECIO DEL KILO
    static public function ctrConsultarPagoRecolector($data)
    {
        $tabla = "empleados";
        $respuesta = ModelPagos::mdlConsultarPagoRecolector($tabla, $data);
        return $respuesta;
    }

    //CONSULTAR SI TIENE PAGOS ANTERIORES EL RECOLECTOR
    static public function ctrConsultarPagosRecolector($data)
    {

        $tabla = "pagos";
        $respuesta = ModelPagos::mdlConsultarPagosRecolector($tabla, $data);
        if ($respuesta->total_pagado == null) {
            return 0;
        } else {
            $dato = intval($respuesta->total_pagado);
            return $dato;
        }
    }


    // CONSULTAR LOS PAGOS AL RECOLECTOR PARA MOSTRAR EN EL REPROTE 
    static public function ctrConsultarPagos($data)
    {
        $tabla = "pagos";
        $respuesta = ModelPagos::mdlConsultarPagos($tabla, $data);
        return $respuesta;
    }
    //REGISTRAR PAGO A UN RECOLECTOR
    static public function ctrPagoPostRecolector($data)
    {
        $tabla = "pagos";
        $respuesta = ModelPagos::mdlPostPagosRecolector($tabla, $data);
        return $respuesta;
    }
    //CONSULTAR SI TIENE PAGOS ANTERIORES EL encargado
    static public function ctrConsultarPagosEncargado($data)
    {

        $tabla = "pagos";
        $respuesta = ModelPagos::mdlConsultarPagosEncargado($tabla, $data);
        return $respuesta;
        /*  if ($respuesta->total_pagado == 0) {
            return 0;
        } else {
            $dato = intval($respuesta->total_pagado);
            return $dato;
        } */
    }


    static public function ctrConsultarPagosEncargadoInd($data)
    {

        $tabla = "pagos";
        $respuesta = ModelPagos::mdlConsultarPagosRecolector($tabla, $data);
        if ($respuesta->total_pagado == null) {
            return 0;
        } else {
            $dato = intval($respuesta->total_pagado);
            return $dato;
        }
    }
    //REGISTRAR PAGO ENCARGADO
    static public function ctrPagoPostEncargado($data)
    {
        $tabla = "pagos";
        $respuesta = ModelPagos::mdlPostPagosEncargado($tabla, $data);
        return $respuesta;
    }

    //MOSTRAR TODOS LOS PAGOS
    static public function ctrReportePagos($data)
    {
        $tabla = "pagos";
        $respuesta = ModelPagos::mdlReportePagos($tabla, $data);
        return $respuesta;
    }
}
