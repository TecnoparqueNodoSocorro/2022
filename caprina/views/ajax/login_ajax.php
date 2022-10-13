<?php
require_once "../../controllers/caprinocultor_controller.php";
require_once "../../models/caprinocultor_model.php";


//LOGIN
class CaprinocultorLogin
{
    public $controlador;



    static public function login($data)
    {

        $datoscaprinocultor = ControladorCaprinocultor::login($data);
        $respuesta = ($datoscaprinocultor);
        print json_encode($respuesta);
        // return $datoscaprinocultor;
    }
}

if (isset($_POST['login'])) {
    $loginCaprinocultor = new CaprinocultorLogin();
    $data = $_POST['login'];

    $loginCaprinocultor->login($data);
}
