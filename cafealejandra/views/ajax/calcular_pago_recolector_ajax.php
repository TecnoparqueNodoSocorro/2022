<?php
require_once "../../controllers/pagos_controller.php";
require_once "../../models/pagos_model.php";


//CREAR COSECHA AJAX
class PagoAjax
{
    static public function ConsultarPagoR($data)
    {
        $datosrecolector = ControladorPagos::ctrConsultarPagoRecolector($data);
        $respuesta = json_encode($datosrecolector);
        echo ($respuesta);
    }
}

if (isset($_POST['jsonPagoRecolector'])) {
    $calcularPago = new PagoAjax();
    $data = $_POST['jsonPagoRecolector'];

    $calcularPago->ConsultarPagoR($data);
} else {
    return ("Error");
}
