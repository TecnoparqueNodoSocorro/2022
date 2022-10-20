<?php
require_once "../../controllers/usuarios_controller.php";
require_once "../../models/usuarios_model.php";


//LOGIN
class UsuarioLogin
{
    public $controlador;



    static public function login($data)
    {

        $datos = ControladorUsuarios::ctrLogin($data);
        $respuesta = ($datos);
        print json_encode($respuesta);
        // return $datoscaprinocultor;
    }
}

if (isset($_POST['login'])) {
    $login = new UsuarioLogin();
    $data = $_POST['login'];

    $login->login($data);
}
