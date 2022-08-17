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
    /* Consultar fechas y pagos a encargados por id */
    static public function ConsultarPagos($data)
    {
        $datosrecolector = ControladorPagos::ctrConsultarPagos($data);
        $respuesta = json_encode($datosrecolector);
        echo ($respuesta);
    }
}

if (isset($_POST['consultaPagos'])) {
    $calcularPago = new ConsultaPagoAjax();
    $data = $_POST['consultaPagos'];

    $calcularPago->ConsultarPagosR($data);
}
if (isset($_POST['id_empleado'])) {
    $calcularPago = new ConsultaPagoAjax();
    $data = $_POST['id_empleado'];

    $calcularPago->ConsultarPagos($data);
}
