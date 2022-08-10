<?php
require_once "../../controllers/pagos_controller.php";
require_once "../../models/pagos_model.php";


//REGISTRAR PAGO ENCARGADO
class PagarEncargadoAjax
{
    static public function PagoPostEncargado($data)
    {
        $pagoRecolector = ControladorPagos::ctrPagoPostEncargado($data);
        $respuesta = json_encode($pagoRecolector);
        echo ($respuesta);
    }
}

if (isset($_POST['pagoEncargado'])) {
    $Pago = new PagarEncargadoAjax();
    $data = $_POST['pagoEncargado'];

    $Pago->PagoPostEncargado($data);
} else {
    return ("Error");
}
