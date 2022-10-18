<?php
require_once('../../controllers/controller_proveedores.php');
require_once('../../models/model_proveedores.php');



//LOGIN
class UsuarioLogin
{
    public $controlador;



    static public function login($data)
    {

        $datos = ControladorProveedor::ctrLogin($data);
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
