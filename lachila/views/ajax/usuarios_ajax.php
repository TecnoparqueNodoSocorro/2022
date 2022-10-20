<?php
require_once "../../controllers/usuarios_controller.php";
require_once "../../models/usuarios_model.php";

//CREAR USUARIO
class UsuariosAjax
{
    public $controlador;
    static public function PostUsuarios($data)
    {
        $datos = ControladorUsuarios::ctrPostUsuario($data);
      /*   $respuesta = ($datos);
        echo json_encode($respuesta); */
        echo $datos;
    }
    static public function DesactivarUsuario($data)
    {
        $datos = ControladorUsuarios::ctrDesactivarUsuario($data);
      /*   $respuesta = ($datos);
        echo json_encode($respuesta); */
        return $datos;
    }
    static public function cambiarClave($data)
    {
        $datos = ControladorUsuarios::ctrCambiarClave($data);
      /*   $respuesta = ($datos);
        echo json_encode($respuesta); */
        echo $datos;
    }

}
if (isset($_POST['empleado_nuevo'])) {
    $postData = new UsuariosAjax();
    $data = $_POST['empleado_nuevo'];
    $postData->PostUsuarios($data);
}

//ACTIVAR O DESACTIVAR UN EMPLEADO
if (isset($_POST['desactivar'])) {
    $postData = new UsuariosAjax();
    $data = $_POST['desactivar'];
    $postData->DesactivarUsuario($data);
}
//cambio clave
if (isset($_POST['newPass'])) {
    $postData = new UsuariosAjax();
    $data = $_POST['newPass'];
    $postData->cambiarClave($data);
}
