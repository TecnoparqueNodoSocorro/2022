<?php
require_once('../../controllers/controller_productos.php');
require_once('../../models/model_productos.php');

class ProductosAjax
{
    //agregar producto

    public function PostProducto($data)
    {
        $NewProducto = ControladorProductos::CtrPostProducto($data);
        echo $NewProducto;
    }
    //------------------------------------------------------------
    //CAMBIAR ESTADO
    public function NewEstadoProd($data)
    {
        $NewEstado = ControladorProductos::CtrNewEstadoPro($data);
        echo $NewEstado;
    }
    //------------------------------------------------------------

    //ELIMINAR PRODUCTO
    public function DeleteProduct($data)
    {
        $rta = ControladorProductos::ctrDeleteProducto($data);
        echo $rta;
    }
    //------------------------------------------------------------ 
    //GET PRODUCTO
    public function GetProduct($data)
    {
        $rta = ControladorProductos::ctrGetProducto($data);
        $datos = json_encode($rta);
        print_r($datos);
    }
    //------------------------------------------------------------    
    //TRAER PRODUCTOPOR ID DE LA CATEGORIA
    public function GetProductByIdCategoria($data)
    {
        $rta = ControladorProductos::ctrGetProductoByIdCategoria($data);
        $datos = json_encode($rta);
        print_r($datos);
    }
    //------------------------------------------------------------
        //TRAER PRODUCTOPOR ID DEL PROVEEDOOR
        public function GetProductByIdProveedor($data)
        {
            $rta = ControladorProductos::ctrGetProductoByIdProveedor($data);
            $datos = json_encode($rta);
            print_r($datos);
        }
        //------------------------------------------------------------

    //EDITAR PAGINA
    public function EditProd($data)
    {
        $editProd = ControladorProductos::CtrEditProd($data);
        echo $editProd;
    }

    //EDITAR PAGINA imagen 1
    public function EditImagen1Prod($data)
    {
        $editProd = ControladorProductos::CtrEditImagen1Prod($data);
        echo $editProd;
    }

    //EDITAR PAGINA imagen 2
    public function EditImagen2Prod($data)
    {
        $editProd = ControladorProductos::CtrEditImagen2Prod($data);
        echo $editProd;
    }
    //------------------------------------------------------------

}
//agregar producto
if (
    !empty($_POST['prov_p_id_oculto']) ||
    !empty($_POST['prov_p_categ']) ||
    !empty($_POST['prov_p_nombre']) ||
    !empty($_POST['prov_p_precio']) ||
    !empty($_POST['prov_p_descripciom'])
) { //-------------------IMAGEN 1--------------------------------------
    /* imagen generica */
    $rutaimagen1 = "../images/productos/p2.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes1 = "../images/productos";
    if (isset($_FILES["prov_p_imagen1"]["tmp_name"])) {
        $newAncho = 310;
        $newAlto = 213;
        list($ancho, $alto) = getimagesize($_FILES["prov_p_imagen1"]["tmp_name"]);
        if (!file_exists($raizImagenes1))
            mkdir($raizImagenes1, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 1 + $dateLoad->getTimestamp();
        if ($_FILES["prov_p_imagen1"]["type"] == "image/png") {
            $rutaimagen1 = $raizImagenes1 . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["prov_p_imagen1"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen1);
        } else if ($_FILES["prov_p_imagen1"]["type"] == "image/jpeg") {
            $rutaimagen1 = $raizImagenes1 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["prov_p_imagen1"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen1);
        } else if ($_FILES["prov_p_imagen1"]["type"] == "image/jpg") {
            $rutaimagen1 = $raizImagenes1 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["prov_p_imagen1"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen1);
        }
    } //-------------------IMAGEN 2--------------------------------------
    /* imagen generica */
    $rutaimagen2 = "../images/productos/p2.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes2 = "../images/productos";
    if (isset($_FILES["prov_p_imagen2"]["tmp_name"])) {
        $newAncho = 310;
        $newAlto = 213;
        list($ancho, $alto) = getimagesize($_FILES["prov_p_imagen2"]["tmp_name"]);
        if (!file_exists($raizImagenes2))
            mkdir($raizImagenes2, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 2 + $dateLoad->getTimestamp();
        if ($_FILES["prov_p_imagen2"]["type"] == "image/png") {
            $rutaimagen2 = $raizImagenes2 . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["prov_p_imagen2"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen2);
        } else if ($_FILES["prov_p_imagen2"]["type"] == "image/jpeg") {
            $rutaimagen2 = $raizImagenes2 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["prov_p_imagen2"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen2);
        } else if ($_FILES["prov_p_imagen2"]["type"] == "image/jpg") {
            $rutaimagen2 = $raizImagenes2 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["prov_p_imagen2"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen2);
        }
    }
    $datos = new ProductosAjax();
    $data = array(
        "idproveedor" => $_POST["prov_p_id_oculto"],
        "categoria" => $_POST["prov_p_categ"],
        "nombre" => $_POST["prov_p_nombre"],
        "precio" => $_POST["prov_p_precio"],
        "descripcion" => $_POST["prov_p_descripciom"],
        "img1" => $rutaimagen1,
        "img2" => $rutaimagen2,

    );
    //print_r($data);
    $datos->PostProducto($data);
}
//CAMBIAR ESTADO
if (isset($_POST['CambioEstadoProd'])) {
    $Estado = new ProductosAjax();
    $data = $_POST['CambioEstadoProd'];
    $Estado->NewEstadoProd($data);
}
//ELIMINAR PRODUCTP 
if (isset($_POST['DataDeleteProd'])) {
    $dato = new ProductosAjax();
    $data = $_POST['DataDeleteProd'];
    $dato->DeleteProduct($data);
}
//TRAER PRODUCTO PARA VISUALIAR
if (isset($_POST['dataProduct'])) {
    $dato = new ProductosAjax();
    $data = $_POST['dataProduct'];
    $dato->GetProduct($data);
}

//TRAER PRODUCTO por id de la categoria
if (isset($_POST['idCat'])) {
    $dato = new ProductosAjax();
    $data = $_POST['idCat'];
    $dato->GetProductByIdCategoria($data);
}
//TRAER PRODUCTO por id del proveedor
if (isset($_POST['idProv'])) {
    $dato = new ProductosAjax();
    $data = $_POST['idProv'];
    $dato->GetProductByIdProveedor($data);
}

//EDITAR PRODUCTO 
if (
    !empty($_POST['edit_prod_id']) ||
    !empty($_POST['edit_prov_p_categ']) ||
    !empty($_POST['edit_prov_p_nombre']) ||
    !empty($_POST['edit_prov_p_precio']) ||
    !empty($_POST['edit_prov_p_descripciom'])
) {
    $EditP = new ProductosAjax();
    $data = array(
        "id" => $_POST["edit_prod_id"],
        "categoria" => $_POST["edit_prov_p_categ"],
        "nombre" => $_POST["edit_prov_p_nombre"],
        "precio" => $_POST["edit_prov_p_precio"],
        "descripcion" => $_POST["edit_prov_p_descripciom"],
        /*         "img1" => $rutaimagen1,
        "img2" => $rutaimagen2, */

    );
    $EditP->EditProd($data);
}

//EDITAR IMAGEN 1
if (
    !empty($_POST['edit_prod_id'])
) {
    //-------------------EDITAR IAMGEN 1--------------------------------------
    /* imagen generica */
    $rutaimagen3 = "../images/productos/p2.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes3 = "../images/productos";
    if (!empty($_FILES["edit_prov_p_imagen1"]["tmp_name"])) {
        $newAncho = 310;
        $newAlto = 213;
        list($ancho, $alto) = getimagesize($_FILES["edit_prov_p_imagen1"]["tmp_name"]);
        if (!file_exists($raizImagenes3))
            mkdir($raizImagenes3, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 3 + $dateLoad->getTimestamp();
        if ($_FILES["edit_prov_p_imagen1"]["type"] == "image/png") {
            $rutaimagen3 = $raizImagenes3 . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["edit_prov_p_imagen1"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen3);
            $EditP = new ProductosAjax();
            $data = array(
                "id" => $_POST["edit_prod_id"],
                "img1" => $rutaimagen3,
            );
            print_r($data);

            $EditP->EditImagen1Prod($data);
        } else if ($_FILES["edit_prov_p_imagen1"]["type"] == "image/jpeg") {
            $rutaimagen3 = $raizImagenes3 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_prov_p_imagen1"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen3);
            $EditP = new ProductosAjax();
            $data = array(
                "id" => $_POST["edit_prod_id"],
                "img1" => $rutaimagen3,
            );
            print_r($data);

            $EditP->EditImagen1Prod($data);
        } else if ($_FILES["edit_prov_p_imagen1"]["type"] == "image/jpg") {
            $rutaimagen3 = $raizImagenes3 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_prov_p_imagen1"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen3);
            $EditP = new ProductosAjax();
            $data = array(
                "id" => $_POST["edit_prod_id"],
                "img1" => $rutaimagen3,
            );
            print_r($data);

            $EditP->EditImagen1Prod($data);
        }
    }
}


//EDITAR IMAGEN 2
if (
    !empty($_POST['edit_prod_id'])
) {
    //-------------------EDITAR IAMGEN 2--------------------------------------
    /* imagen generica */
    $rutaimagen4 = "../images/productos/p2.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes4 = "../images/productos";
    if (!empty($_FILES["edit_prov_p_imagen2"]["tmp_name"])) {
        $newAncho = 310;
        $newAlto = 213;
        list($ancho, $alto) = getimagesize($_FILES["edit_prov_p_imagen2"]["tmp_name"]);
        if (!file_exists($raizImagenes4))
            mkdir($raizImagenes4, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 4 + $dateLoad->getTimestamp();
        if ($_FILES["edit_prov_p_imagen2"]["type"] == "image/png") {
            $rutaimagen4 = $raizImagenes4 . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["edit_prov_p_imagen2"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen4);
            $EditP = new ProductosAjax();
            $data = array(
                "id" => $_POST["edit_prod_id"],
                "img2" => $rutaimagen4,
            );
            print_r($data);
            $EditP->EditImagen2Prod($data);
        } else if ($_FILES["edit_prov_p_imagen2"]["type"] == "image/jpeg") {
            $rutaimagen4 = $raizImagenes4 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_prov_p_imagen2"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen4);
            $EditP = new ProductosAjax();
            $data = array(
                "id" => $_POST["edit_prod_id"],
                "img2" => $rutaimagen4,
            );
            print_r($data);
            $EditP->EditImagen2Prod($data);
        } else if ($_FILES["edit_prov_p_imagen2"]["type"] == "image/jpg") {
            $rutaimagen4 = $raizImagenes4 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_prov_p_imagen2"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen4);
            $EditP = new ProductosAjax();
            $data = array(
                "id" => $_POST["edit_prod_id"],
                "img2" => $rutaimagen4,
            );
            print_r($data);
            $EditP->EditImagen2Prod($data);
        }
    }
}
