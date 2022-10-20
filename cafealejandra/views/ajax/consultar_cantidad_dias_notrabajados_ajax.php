<?php
require_once "../../controllers/dias_no_asistidos_controller.php";
require_once "../../models/dias_no_asistidos_model.php";


//CREAR COSECHA AJAX
class ConsultaDiasPagoAjax
{
    static public function consultarCantidadDias($data)
    {
        $diasEncargado = ControladorEncargado::ctrConsultarDiasNoTrabajados($data);
        $respuesta = json_encode($diasEncargado);
        echo ($respuesta);
       
        
    
        
    }
}

if (isset($_POST['consultaDias'])) {
    $calcularDias = new ConsultaDiasPagoAjax();
    $data = $_POST['consultaDias'];
    $calcularDias->consultarCantidadDias($data);
} else {
    return ("Error");
}
