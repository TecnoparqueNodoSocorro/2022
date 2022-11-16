<?php
require_once "../../controllers/clientes_controller.php";
require_once "../../models/clientes_model.php";


class ClientesAjax
{
    public $controlador;


    //GUARDAR cliente
    public function PostCliente($data)
    {
        $NewCliente = ControladorClientes::CtrPostCliente($data);
        echo $NewCliente;
    }
    //editar cliente
    public function EditCliente($data)
    {
        $NewCliente = ControladorClientes::CtrEditCliente($data);
        echo $NewCliente;
    }
    //EDITAR logo
    public function EditLogoClient($data)
    {
        $editProd = ControladorClientes::CtrEditLogoClient($data);
        echo $editProd;
    }

    //get info por id
    static public function GetInfoById($data)
    {

        $datos = ControladorClientes::ctrGetInfoById($data);
        $respuesta = ($datos);
        print json_encode($respuesta);
        // return $datoscaprinocultor;
    }
    //login
    static public function login($data)
    {

        $datosLogin = ControladorClientes::login($data);
        $respuesta = ($datosLogin);
        print json_encode($respuesta);
        // return $datoscaprinocultor;
    }
    //ACTIVAR O DESACTIVAR UN EMPLEADO

    static public function DesactivarCliente($data)
    {
        $datos = ControladorClientes::ctrDesactivarClientes($data);
        return $datos;
    }

    //CAMBIAR CLAVE DE EMPLEADO DESDE EL ADMINISTRADOR
    static public function CambioClave($data)
    {
        $datos = ControladorClientes::ctrCambioClave($data);
        echo json_encode($datos);
    }

    //CAMBIAR CLAVE DE EMPLEADO DESDE EL EMPLEADO
    static public function CambioClaveEmp($data)
    {
        $datos = ControladorClientes::ctrCambioClaveEmp($data);
        echo ($datos);
    }

}
//------------------------------------------------------------------------
//GUARDAR CLIENTe
if (
    !empty($_POST['name_emp']) ||
    !empty($_POST['nit_emp']) ||
    !empty($_POST['replegal_emp']) ||
    !empty($_POST['ciudad_emp']) ||
    !empty($_POST['direccion_emp']) ||
    !empty($_POST['tel_emp']) ||
    !empty($_POST['email_emp']) ||
    !empty($_POST['password_emp'])

) { //-------------------IMAGEN 1--------------------------------------
    /* imagen generica */
    $rutaimagen = "../../images/logos/logostock.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes = "../../images/logos";
    if (isset($_FILES["logo_emp"]["tmp_name"])) {
        $newAncho = 300;
        $newAlto = 300;
        list($ancho, $alto) = getimagesize($_FILES["logo_emp"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom =  $dateLoad->getTimestamp();
        if ($_FILES["logo_emp"]["type"] == "image/png") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["logo_emp"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen);
        } else if ($_FILES["logo_emp"]["type"] == "image/jpeg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["logo_emp"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
        } else if ($_FILES["logo_emp"]["type"] == "image/jpg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["logo_emp"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
        }
    }
    $datos = new ClientesAjax();
    $data = array(
        "name" => $_POST["name_emp"],
        "nit" => $_POST["nit_emp"],
        "replegal" => $_POST["replegal_emp"],
        "city" => $_POST["ciudad_emp"],
        "dir" => $_POST["direccion_emp"],
        "tel" => $_POST["tel_emp"],
        "email" => $_POST["email_emp"],
        "pass" => $_POST["password_emp"],
        "img" => $rutaimagen,


    );
    //print_r($data);
    $datos->PostCliente($data);
}
//------------------------------------------------------------------------
//traer info del cliente por id
if (isset($_POST['infoCliente'])) {
    $postUsuario = new ClientesAjax();
    $data = $_POST['infoCliente'];
    $postUsuario->GetInfoById($data);
}

//-----editar cliente-------------------------------------------------------------------

if (
    !empty($_POST["id_cliente_oculto"]) ||
    !empty($_POST['name_emp_edit']) ||
    !empty($_POST['nit_emp_edit']) ||
    !empty($_POST['replegal_emp_edit']) ||
    !empty($_POST['ciudad_emp_edit']) ||
    !empty($_POST['direccion_emp_edit']) ||
    !empty($_POST['tel_emp_edit']) ||
    !empty($_POST['email_emp_edit']) ||
    !empty($_POST['password_emp_edit'])

) {
    $datos = new ClientesAjax();
    $data = array(
        "id" => $_POST["id_cliente_oculto"],
        "name" => $_POST["name_emp_edit"],
        "nit" => $_POST["nit_emp_edit"],
        "replegal" => $_POST["replegal_emp_edit"],
        "city" => $_POST["ciudad_emp_edit"],
        "dir" => $_POST["direccion_emp_edit"],
        "tel" => $_POST["tel_emp_edit"],
        "email" => $_POST["email_emp_edit"],



    );
    // print_r($data);
    $datos->EditCliente($data);
}


//EDITAR logo 1
if (
    !empty($_POST['id_cliente_oculto'])
) {
    //-------------------EDITAR IAMGEN 1--------------------------------------
    /* imagen generica */
    $rutaimagen = "../../images/logos/logostock.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes = "../../images/logos";
    if (!empty($_FILES["logo_emp_edit"]["tmp_name"])) {
        $newAncho = 310;
        $newAlto = 213;
        list($ancho, $alto) = getimagesize($_FILES["logo_emp_edit"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom =  $dateLoad->getTimestamp();
        if ($_FILES["logo_emp_edit"]["type"] == "image/png") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["logo_emp_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen);
            $EditP = new ClientesAjax();
            $data = array(
                "id" => $_POST["id_cliente_oculto"],
                "img" => $rutaimagen,
            );
            print_r($data);

            $EditP->EditLogoClient($data);
        } else if ($_FILES["logo_emp_edit"]["type"] == "image/jpeg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["logo_emp_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
            $EditP = new ClientesAjax();
            $data = array(
                "id" => $_POST["id_cliente_oculto"],
                "img" => $rutaimagen,
            );
            print_r($data);

            $EditP->EditLogoClient($data);
        } else if ($_FILES["logo_emp_edit"]["type"] == "image/jpg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["logo_emp_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
            $EditP = new ClientesAjax();
            $data = array(
                "id" => $_POST["id_cliente_oculto"],
                "img" => $rutaimagen,
            );
            print_r($data);

            $EditP->EditLogoClient($data);
        }
    }
}






//------------------------------------------------------------------------
//cambio clave desde el usuario del administrador
if (isset($_POST['newPassCliente'])) {
    $postUsuario = new ClientesAjax();
    $data = $_POST['newPassCliente'];
    $postUsuario->CambioClave($data);
}

//cambio clave desde el usuario de cliente
if (isset($_POST['new_pas'])) {
    $postUsuario = new UsuarioAjax();
    $data = $_POST['new_pas'];
    $postUsuario->CambioClaveEmp($data);
}

//login
if (isset($_POST['login_cliente'])) {
    $datos = new ClientesAjax();
    $data = $_POST['login_cliente'];

    $datos->login($data);
}
//ACTIVAR O DESACTIVAR UN EMPLEADO
if (isset($_POST['desactivarC'])) {
    $postData = new ClientesAjax();
    $data = $_POST['desactivarC'];
    $postData->DesactivarCliente($data);
}


