<?php
require_once "../../controllers/pagos_controller.php";
require_once "../../models/pagos_model.php";


//CONSULTAR PAGOS ANTERIORES A ENCARGADOS
class ConsultaPagoEncargadoAjax
{
    static public function ConsultarPagosEncargados($data)
    {
        $datosEncargado = ControladorPagos::ctrConsultarPagosEncargado($data);
        $respuesta = json_encode($datosEncargado);
        echo ($respuesta);
    }
}

if (isset($_POST['consultaEncargado'])) {
    $calcularPago = new ConsultaPagoEncargadoAjax();
    $data = $_POST['consultaEncargado'];

    $calcularPago->ConsultarPagosEncargados($data);
} else {
    return ("Error");
}
