<?php
require_once('../../controllers/controller_proveedores.php');
require_once('../../models/model_proveedores.php');

class ProveedoresAjax
{
    //crear proveedor ---ADMIN--------------------------------------------
    public function CrearProveedor($data)
    {
        $NewProveedor = ControladorProveedor::CtrNewProveedor($data);
        echo $NewProveedor;
    }
    //seleccionar proveedor----------ADMIN--------------------------------
    public function InfoProveedor($data)
    {
        $SelectProveedor = ControladorProveedor::CtrInfoProveedor($data);
        //$respuesta = array("data" => $SelectProveedor);
        // echo $respuesta;
        $datos = json_encode($SelectProveedor);
        echo ($datos);
    }


    /* modales */

    //------------actualizar vigencia-----ADMIN--------------------------------------------
    public function NewVigenciaProv($data)
    {
        $NewVigencia = ControladorProveedor::CtrNewVigencia($data);
        /*  $RtaNewVigencia = array("data"=> $NewVigencia); 
        echo $RtaNewVigencia;*/
        echo $NewVigencia;
    }

    //---------------cambiar estado---ADMIN------------------------------------------
    public function NewEstadoProv($data)
    {
        $NewEstado = ControladorProveedor::CtrNewEstado($data);
        echo $NewEstado;
    }

    //--------------------editar proveedor-ADMIN---------------------------------------
    public function EditProv($data)
    {
        $Updateprov = ControladorProveedor::CtrUpdateProveedor($data);
        echo $Updateprov;
    }
    //--------------------editar logo del proveedor-ADMIN---------------------------------------
    public function EditLogoProv($data)
    {
        $Updateprov = ControladorProveedor::CtrUpdateLogoProveedor($data);
        echo $Updateprov;
    }

    //-------------------Cambiar contraseña ADMIN-----------------------------------------
    public function NewPasswProv($data)
    {
        $NewPass = ControladorProveedor::CtrNewPass($data);
        echo $NewPass;
    }

    //--------------------editar proveedor-PROVEEDOR---------------------------------------
    public function edit_prov($data)
    {
        $edit = ControladorProveedor::ctrEditProv($data);
        echo $edit;
    }

    //-------------------Cambiar contraseña desde el rol de proveedor-----------------------------------------
    public function new_pass_prov($data)
    {
        $NewPass = ControladorProveedor::ctrNewPassProv($data);
        echo $NewPass;
    }
}


/* ********************************************************* */
/* ********************************************************* */
//crear proveedorADMIN
if (
    !empty($_POST['nombre']) ||
    !empty($_POST['nit']) ||
    !empty($_POST['direccion']) ||
    !empty($_POST['telefono']) ||
    !empty($_POST['email']) ||
    !empty($_POST['max_p']) ||
    !empty($_POST['vigencia']) ||
    !empty($_POST['user']) ||
    !empty($_POST['descr_prov']) ||
    !empty($_POST['pass_1'])

) {
    //-------------------IMAGEN 1--------------------------------------
    /* imagen generica */
    $rutaimagen = "../images/logos/logo.png";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes = "../images/logos";
    if (isset($_FILES["logo"]["tmp_name"])) {
        $newAncho = 200;
        $newAlto = 200;
        list($ancho, $alto) = getimagesize($_FILES["logo"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 1 + $dateLoad->getTimestamp();
        if ($_FILES["logo"]["type"] == "image/png") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen);
        } else if ($_FILES["logo"]["type"] == "image/jpeg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
        } else if ($_FILES["logo"]["type"] == "image/jpg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
        }
    } else {
        return "error";
    }
    $ajaxproveedor = new ProveedoresAjax();

    $data = array(
        "nombre" => $_POST["nombre"],
        "nit" => $_POST["nit"],
        "direccion" => $_POST["direccion"],
        "telefono" => $_POST["telefono"],
        "email" => $_POST["email"],
        "max_p" => $_POST["max_p"],
        "vigencia" => $_POST["vigencia"],
        "user" => $_POST["user"],
        "descr" => $_POST["descr_prov"],
        "pass_1" => $_POST["pass_1"],
        "logo" => $rutaimagen
    );
    print_r($data);

    $ajaxproveedor->CrearProveedor($data);
}

//informacion proveedor----ADMIN
if (isset($_POST['info_proveedor'])) {
    $ajaxInfoproveedor = new ProveedoresAjax();
    $data = $_POST['info_proveedor'];
    $ajaxInfoproveedor->InfoProveedor($data);
}



/* ********************************************************* */
//------------actualizar vigencia-----ADMIN--------------------------------------------

if (isset($_POST['data_VigNew'])) {
    $vigencia = new  ProveedoresAjax();
    $data = $_POST['data_VigNew'];
    $vigencia->NewVigenciaProv($data);
}

//---------------cambiar estado---ADMIN------------------------------------------
if (isset($_POST['data_NewEstado'])) {
    $Estado = new ProveedoresAjax();
    $data = $_POST['data_NewEstado'];
    $Estado->NewEstadoProv($data);
}

//--------------------editar proveedor--usuario: ADMIN--------------------------------------
if (
    !empty($_POST['id_proveedor_oculto']) ||
    !empty($_POST['edit_nombre']) ||
    !empty($_POST['edit_nit']) ||
    !empty($_POST['edit_direccion']) ||
    !empty($_POST['edit_telefono']) ||
    !empty($_POST['edit_email']) ||
    !empty($_POST['edit_max_p']) ||
    !empty($_POST['edit_vigencia']) ||
    !empty($_POST['edit_user']) ||
    !empty($_POST['edit_descr_prov'])


) {
    $EditProv = new ProveedoresAjax();
    $data = array(
        "idproveedor" => $_POST["id_proveedor_oculto"],
        "nombre" => $_POST["edit_nombre"],
        "nit" => $_POST["edit_nit"],
        "direccion" => $_POST["edit_direccion"],
        "telefono" => $_POST["edit_telefono"],
        "email" => $_POST["edit_email"],
        "max_p" => $_POST["edit_max_p"],
        "vigencia" => $_POST["edit_vigencia"],
        "user" => $_POST["edit_user"],
        "descr" => $_POST["edit_descr_prov"],


    );
    // print_r($data);
    $EditProv->EditProv($data);
}
//--------------------editar logo del proveedor--usuario: ADMIN--------------------------------------
if (
    !empty($_POST['id_proveedor_oculto'])

) {

    //------------------editar logo del proveedor--------------------------------------
    /* imagen generica */
    $rutaimagen_edit_logo = "../images/logos/logo.png";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes = "../images/logos";
    if (!empty($_FILES["edit_logo"]["tmp_name"])) {
        $newAncho = 200;
        $newAlto = 200;
        list($ancho, $alto) = getimagesize($_FILES["edit_logo"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 1 + $dateLoad->getTimestamp();
        if ($_FILES["edit_logo"]["type"] == "image/png") {
            $rutaimagen_edit_logo = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["edit_logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen_edit_logo);

            $EditLogoProveedor = new ProveedoresAjax();
            $data = array(
                "idproveedor" => $_POST["id_proveedor_oculto"],
                "logo" => $rutaimagen_edit_logo
            );
            print_r($data);
            $EditLogoProveedor->EditLogoProv($data);
        } else if ($_FILES["edit_logo"]["type"] == "image/jpeg") {
            $rutaimagen_edit_logo = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_edit_logo);

            $EditLogoProveedor = new ProveedoresAjax();
            $data = array(
                "idproveedor" => $_POST["id_proveedor_oculto"],
                "logo" => $rutaimagen_edit_logo
            );
            print_r($data);
            $EditLogoProveedor->EditLogoProv($data);
        } else if ($_FILES["edit_logo"]["type"] == "image/jpg") {
            $rutaimagen_edit_logo = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_edit_logo);

            $EditLogoProveedor = new ProveedoresAjax();
            $data = array(
                "idproveedor" => $_POST["id_proveedor_oculto"],
                "logo" => $rutaimagen_edit_logo
            );
            print_r($data);
            $EditLogoProveedor->EditLogoProv($data);
        }
    } /* else {
        return "error";
    } */
}
//-------------------Cambiar contraseña ADMIN-----------------------------------------
if (isset($_POST['data_Newpass'])) {
    $passwnew = new ProveedoresAjax();
    $data = $_POST['data_Newpass'];
    $passwnew->NewPasswProv($data);
}



//-------------------Cambiar contraseña desde el rol de proveedor-usuario: ADMIN----------------------------------------
if (isset($_POST['data_cambio_clave_prov'])) {
    $passwnew = new ProveedoresAjax();
    $data = $_POST['data_cambio_clave_prov'];
    $passwnew->new_pass_prov($data);
}



//----------------------editar proveedor-- usuario: PROVEEDOR--------------------------------------
if (
    !empty($_POST['id_prov_oculto']) ||
    !empty($_POST['emp_direccion']) ||
    !empty($_POST['emp_telefono']) ||
    !empty($_POST['emp_email']) ||
    !empty($_POST['emp_descr'])
) {
    $datos = new ProveedoresAjax();
    $data = array(
        "id" => $_POST["id_prov_oculto"],
        "direc" => $_POST["emp_direccion"],
        "tel" => $_POST["emp_telefono"],
        "email" => $_POST["emp_email"],
        "descr" => $_POST["emp_descr"],


    );
    $datos->edit_prov($data);
}

//--------------------editar logo del proveedor--usuario: PROVEEDOR--------------------------------------
if (
    !empty($_POST['id_prov_oculto'])

) {

    //------------------editar logo del proveedor--------------------------------------
    /* imagen generica */
    $rutaimagen_emp_logo = "../images/logos/logo.png";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes = "../images/logos";
    if (!empty($_FILES["emp_logo"]["tmp_name"])) {
        $newAncho = 200;
        $newAlto = 200;
        list($ancho, $alto) = getimagesize($_FILES["emp_logo"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 1 + $dateLoad->getTimestamp();
        if ($_FILES["emp_logo"]["type"] == "image/png") {
            $rutaimagen_emp_logo = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["emp_logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen_emp_logo);

            $EditLogoProveedor = new ProveedoresAjax();
            $data = array(
                "idproveedor" => $_POST["id_prov_oculto"],
                "logo" => $rutaimagen_emp_logo
            );
            print_r($data);
            $EditLogoProveedor->EditLogoProv($data);
        } else if ($_FILES["emp_logo"]["type"] == "image/jpeg") {
            $rutaimagen_emp_logo = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["emp_logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_emp_logo);

            $EditLogoProveedor = new ProveedoresAjax();
            $data = array(
                "idproveedor" => $_POST["id_prov_oculto"],
                "logo" => $rutaimagen_emp_logo
            );
            print_r($data);
            $EditLogoProveedor->EditLogoProv($data);
        } else if ($_FILES["emp_logo"]["type"] == "image/jpg") {
            $rutaimagen_emp_logo = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["emp_logo"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_emp_logo);

            $EditLogoProveedor = new ProveedoresAjax();
            $data = array(
                "idproveedor" => $_POST["id_prov_oculto"],
                "logo" => $rutaimagen_emp_logo
            );
            print_r($data);
            $EditLogoProveedor->EditLogoProv($data);
        }
    } /* else {
        return "error";
    } */
}