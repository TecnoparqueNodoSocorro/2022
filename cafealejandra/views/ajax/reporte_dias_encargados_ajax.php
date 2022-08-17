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
    static public function ConsultarDias($dato)
    {
        $usuario = ControladorEncargado::ctrConsultarDia($dato);
        $respuesta = json_encode($usuario);
        echo $respuesta;
    }
}

if (isset($_POST['datos'])) {
    $diasEncargado = new diasEncargadoReporte();
    $dato = $_POST['datos'];
    $diasEncargado->AgregarDiasEncargado($dato);
}


if (isset($_POST['id_encargado'])) {
    $diasEncargado = new diasEncargadoReporte();
    $dato = $_POST['id_encargado'];
    $diasEncargado->ConsultarDias($dato);
}
