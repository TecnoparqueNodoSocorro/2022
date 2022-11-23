<?php
require_once "../../controllers/usuarios_controller.php";
require_once "../../models/usuarios_model.php";
require_once "../../controllers/clientes_controller.php";
require_once "../../models/clientes_model.php";



class UsuarioAjax
{
    public $controlador;


    //GUARDAR CAPRINOCULTOR
    static public function PostUsuario($data)
    {
        $datosusuario = ControladorUsuario::ctrPostUsuario($data);
        /*   $respuesta = ($datosusuario);
        echo json_encode($respuesta); */
        echo $datosusuario;
    }

    //get info por id
    static public function GetInfoById($data)
    {
        $datos = ControladorUsuario::ctrGetInfoById($data);
        $respuesta = ($datos);
        print json_encode($respuesta);
        // return $datoscaprinocultor;
    }
    //GUARDAR CAPRINOCULTOR
    static public function EditEmpleado($data)
    {
        $datosusuario = ControladorUsuario::ctrEditEmpleado($data);
        echo $datosusuario;
    }

    //login
    static public function login($data)
    {

        $datosLogin = ControladorUsuario::login($data);
        $respuesta = ($datosLogin);
        print json_encode($respuesta);
        // return $datoscaprinocultor;
    }

    //ACTIVAR O DESACTIVAR UN EMPLEADO
    static public function DesactivarUsuario($data)
    {
        $datos = ControladorUsuario::ctrDesactivarUsuario($data);
        return $datos;
    }

    //CAMBIAR CLAVE DE EMPLEADO DESDE EL ADMINISTRADOR
    static public function CambioClave($data)
    {
        $datos = ControladorUsuario::ctrCambioClave($data);
        echo json_encode($datos);
    }

    //CAMBIAR CLAVE DE EMPLEADO DESDE EL EMPLEADO
    static public function CambioClaveEmp($data)
    {
        $datos = ControladorUsuario::ctrCambioClaveEmpAndClie($data);
        echo ($datos);
    }
}
//GUARDAR empleado
if (isset($_POST['nuevoUsuario'])) {
    $postUsuario = new UsuarioAjax();
    $data = $_POST['nuevoUsuario'];

    $postUsuario->PostUsuario($data);
}
//------------------------------------------------------------------------
//traer info del empleado por id
if (isset($_POST['infoEmpleado'])) {
    $postUsuario = new UsuarioAjax();
    $data = $_POST['infoEmpleado'];
    $postUsuario->GetInfoById($data);
}
//cambio clave desde el usuario del administrador
if (isset($_POST['newPass'])) {
    $postUsuario = new UsuarioAjax();
    $data = $_POST['newPass'];
    $postUsuario->CambioClave($data);
}

//cambio clave desde el usuario de empleado
if (isset($_POST['new_pas'])) {
    $postUsuario = new UsuarioAjax();
    $data = $_POST['new_pas'];
    $postUsuario->CambioClaveEmp($data);
}
//editar empleado
if (isset($_POST['editUsuario'])) {
    $postUsuario = new UsuarioAjax();
    $data = $_POST['editUsuario'];
    $postUsuario->EditEmpleado($data);
}

//login
if (isset($_POST['login'])) {
    $datos = new UsuarioAjax();
    $data = $_POST['login'];

    $datos->login($data);
}
//ACTIVAR O DESACTIVAR UN EMPLEADO
if (isset($_POST['desactivar'])) {
    $postData = new UsuarioAjax();
    $data = $_POST['desactivar'];
    $postData->DesactivarUsuario($data);
}
