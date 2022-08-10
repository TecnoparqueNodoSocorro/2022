<?php
require_once "../../controllers/pagos_controller.php";
require_once "../../models/pagos_model.php";


//CREAR COSECHA AJAX
class ConsultaPagoAjax
{
    static public function ConsultarPagosR($data)
    {
        $datosrecolector = ControladorPagos::ctrConsultarPagosRecolector($data);
        $respuesta = json_encode($datosrecolector);
        echo ($respuesta);
    }
}

if (isset($_POST['consultaPagos'])) {
    $calcularPago = new ConsultaPagoAjax();
    $data = $_POST['consultaPagos'];

    $calcularPago->ConsultarPagosR($data);
} else {
    return ("Error");
}
