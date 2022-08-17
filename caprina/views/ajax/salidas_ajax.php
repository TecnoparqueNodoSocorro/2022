<?php
require_once "../../controllers/salidas_controller.php";
require_once "../../models/salidas_model.php";


class SalidasAjax
{
    public $controlador;




    static public function registrarSalida($data)
    {
      
        $datos_salidas= ControladorSalidas::ctrPostSalidas($data);
        $respuesta = array($datos_salidas);
        echo json_encode($respuesta);
    }



}

if(isset($_POST['salidas'])){
    $Salida= new SalidasAjax();
    $data = $_POST['salidas'];
    $Salida->registrarSalida($data);

}else{
return ("Error");
}