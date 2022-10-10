<?php
require_once "../../controllers/pagos_controller.php";
require_once "../../models/pagos_model.php";


//REGISTRAR PAGO
class PagarAjax
{
    static public function PagoPost($data)
    {
        $pagoRecolector = ControladorPagos::ctrPagoPostRecolector($data);
        $respuesta = json_encode($pagoRecolector);
        echo ($respuesta);
    }
}

if (isset($_POST['pago'])) {
    $Pago = new PagarAjax();
    $data = $_POST['pago'];

    $Pago->PagoPost($data);
} else {
    return ("Error");
}
