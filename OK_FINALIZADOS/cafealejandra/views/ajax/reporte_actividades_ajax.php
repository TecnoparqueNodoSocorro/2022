<?php
require_once "../../controllers/usuario_controller.php";
require_once "../../models/usuario_model.php";



//CONSULTAR USUARIO EN ESPECIFICO
class UsuarioEspecificoAjax
{
    static public function usuarioEspcifico($data)
    {
        $usuario = ControladorUsuario::ctrConsultarUsuarioEspecifico($data);
        $respues = json_encode($usuario);
        echo $respues;
    }
}

if (isset($_POST['id_empleado'])) {
    $usuarioEsp = new UsuarioEspecificoAjax();
    $data = $_POST['id_empleado'];
    $usuarioEsp->usuarioEspcifico($data);

} else {
    return ("Error");
}
