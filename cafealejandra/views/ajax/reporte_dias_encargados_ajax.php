<?php
require_once "../../controllers/dias_no_asistidos_controller.php";
require_once "../../models/dias_no_asistidos_model.php";


//AGREGAR DÍAS NO TRABAJADOS POR ENCARGADO
class diasencargadoReporte
{
    static public function AgregarDiasEncargado($dato)
    {
        $usuario = ControladorEncargado::ctrAgregarDias($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['datos'])) {
    $diasEncargado = new diasEncargadoReporte();
    $dato = $_POST['datos'];
    $diasEncargado->AgregarDiasEncargado($dato);
} else {
    return ("Error");
}
