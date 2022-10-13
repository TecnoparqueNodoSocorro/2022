<?php
require_once('../../controllers/controller_pagina.php');
require_once('../../models/model_pagina.php');

class ArticulosPag
{

    public function NewArticulo($data)
    {
        $NewArticulo = Controladorpagina::CtrNewArticulo($data);
        echo $NewArticulo;
    }

    public function CBOCateg($data)
    {
        $CBO_cat = Controladorpagina::CtrCBcateg($data);
        $respuesta = json_encode($CBO_cat);
        echo ($respuesta);
    }

    public function CBOitems($data)
    {
        $CBO_items = Controladorpagina::CrtBCitems($data);
        $respuesta = json_encode($CBO_items);
        echo ($respuesta);
    }

    //TRAER JSON COMPLETO CON LA INFORMACION DE LA PAGINA
    public function GetDataPag($data)
    {

        $pagina = Controladorpagina::ctrGetPag($data);
        $datos = json_encode($pagina);
        echo ($datos);
    }
    //------------------------------------------------------------
    //CAMBIAR ESTADO
    public function NewEstadoPag($data)
    {
        $NewEstado = Controladorpagina::CtrNewEstado($data);
        echo $NewEstado;
    }
    //------------------------------------------------------------

    //ELIMINAR PAGINA
    public function DeletePagina($data)
    {
        $NewEstado = Controladorpagina::ctrDeletePagina($data);
        echo $NewEstado;
    }
    //------------------------------------------------------------

    //EDITAR PAGINA
    public function EditPag($data)
    {
        $Updateprov = Controladorpagina::CtrUpdatePagina($data);
        echo $Updateprov;
    }
    //------------------------------------------------------------
    //EDITAR imagen PAGINA
    public function EditImagenPag($data)
    {
        $Updateprov = Controladorpagina::CtrUpdateImagenPagina($data);
        echo $Updateprov;
    }
    //------------------------------------------------------------

}


/* ------------------------------------------------------------------------------- */



if (
    !empty($_POST['pag_sesion']) ||
    !empty($_POST['pag_cat']) ||
    !empty($_POST['pag_item']) ||
    !empty($_POST['pag_titulo']) ||
    !empty($_POST['pag_descr'])
    ) { //-------------------IMAGEN 1--------------------------------------
        /* imagen generica */
        $rutaimagen = "../images/imagen_articulo/p2.jpg";
        /* directorio de almacenamiento de imagenes  */
        $raizImagenes = "../images/imagen_articulo";
        if (isset($_FILES["pag_img"]["tmp_name"])) {
            $newAncho = 640;
            $newAlto = 427;
            list($ancho, $alto) = getimagesize($_FILES["pag_img"]["tmp_name"]);
            if (!file_exists($raizImagenes))
                mkdir($raizImagenes, 0755);
            $dateLoad = new DateTime();
            $nameRandom = 1 + $dateLoad->getTimestamp();
            if ($_FILES["pag_img"]["type"] == "image/png") {
                $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
                $orige = imagecreatefrompng($_FILES["pag_img"]["tmp_name"]);
                $destino = imagecreatetruecolor($newAncho, $newAlto);
                imagealphablending($destino, false);
                imagesavealpha($destino, true);
                $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
                imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
                imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
                imagepng($destino, $rutaimagen);
            } else if ($_FILES["pag_img"]["type"] == "image/jpeg") {
                $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
                $orige = imagecreatefromjpeg($_FILES["pag_img"]["tmp_name"]);
                $destino = imagecreatetruecolor($newAncho, $newAlto);
                imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
                imagejpeg($destino, $rutaimagen);
            } else if ($_FILES["pag_img"]["type"] == "image/jpg") {
                $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
                $orige = imagecreatefromjpeg($_FILES["pag_img"]["tmp_name"]);
                $destino = imagecreatetruecolor($newAncho, $newAlto);
                imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
                imagejpeg($destino, $rutaimagen);
            }
        } else {
            return "error";
        }
    $ajaxarticulo = new ArticulosPag();
    $data = array(
        "session_create" => $_POST["pag_sesion"],
        "categoria_create" => $_POST["pag_cat"],
        "item_create" => $_POST["pag_item"],
        "titulo_prod_create" => $_POST["pag_titulo"],
        "descr_producto_create" => $_POST["pag_descr"],
        "product_img_create" => $rutaimagen

    );
    //print_r($data);
    $ajaxarticulo->NewArticulo($data);
}

if (isset($_POST['datasesion'])) {
    $cbcategoria = new ArticulosPag();
    $data = $_POST['datasesion'];
    $cbcategoria->CBOCateg($data);
}

if (isset($_POST['datacateg'])) {
    $cbitems = new ArticulosPag();
    $data = $_POST['datacateg'];
    $cbitems->CBOitems($data);
}

/* ********************************************************* */

//TRAER JSON COMPLETO CON LA INFORMACION DE LA PAGINA
if (isset($_POST['DataPag'])) {
    $datos = new ArticulosPag();
    $data = $_POST['DataPag'];
    $datos->GetDataPag($data);
}
//CAMBIAR ESTADO
if (isset($_POST['data_NewEstado'])) {
    $Estado = new ArticulosPag();
    $data = $_POST['data_NewEstado'];
    $Estado->NewEstadoPag($data);
}

//ELIMINAR PAGINA 
if (isset($_POST['dataDeletePagina'])) {
    $pagina = new ArticulosPag();
    $data = $_POST['dataDeletePagina'];
    $pagina->DeletePagina($data);
}

//EDITAR PAGINA 
if (
    !empty($_POST['edit_pag_sesion']) ||
    !empty($_POST['edit_pag_cat']) ||
    !empty($_POST['edit_pag_item']) ||
    !empty($_POST['edit_pag_titulo']) ||
    !empty($_POST['edit_pag_descr']) ||
    !empty($_POST['id_oculto_pag'])

) {
    $EditPag = new ArticulosPag();
    $data = array(
        "session_edit" => $_POST["edit_pag_sesion"],
        "categoria_edit" => $_POST["edit_pag_cat"],
        "item_edit" => $_POST["edit_pag_item"],
        "titulo_prod_edit" => $_POST["edit_pag_titulo"],
        "descr_producto_edit" => $_POST["edit_pag_descr"],
        "id" =>  $_POST["id_oculto_pag"],


    );
    //print_r($data);
    $EditPag->EditPag($data);
}


//--------------------editar imagen de la pagina-------------------------------------
if (
    !empty($_POST['id_oculto_pag'])

) {

    //--------------editar imagen de la pagina--------------------------------------------
    /* imagen generica */
    $rutaimagen_edit_pag_img = "../images/imagen_articulo/p2.jpg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes  = "../images/imagen_articulo";
    if (!empty($_FILES["edit_pag_img"]["tmp_name"])) {
        $newAncho = 640;
        $newAlto = 427;
        list($ancho, $alto) = getimagesize($_FILES["edit_pag_img"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 1 + $dateLoad->getTimestamp();
        if ($_FILES["edit_pag_img"]["type"] == "image/png") {
            $rutaimagen_edit_pag_img = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["edit_pag_img"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen_edit_pag_img);

            $editImagenPag = new ArticulosPag();
            $data = array(
                "idp" => $_POST["id_oculto_pag"],
                "imagen" => $rutaimagen_edit_pag_img
            );
            print_r($data);
            $editImagenPag->EditImagenPag($data);
        } else if ($_FILES["edit_pag_img"]["type"] == "image/jpeg") {
            $rutaimagen_edit_pag_img = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_pag_img"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_edit_pag_img);

            $editImagenPag = new ArticulosPag();
            $data = array(
                "idp" => $_POST["id_oculto_pag"],
                "imagen" => $rutaimagen_edit_pag_img
            );
            print_r($data);
            $editImagenPag->EditImagenPag($data);
        } else if ($_FILES["edit_pag_img"]["type"] == "image/jpg") {
            $rutaimagen_edit_pag_img = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["edit_pag_img"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_edit_pag_img);

            $editImagenPag = new ArticulosPag();
            $data = array(
                "idp" => $_POST["id_oculto_pag"],
                "imagen" => $rutaimagen_edit_pag_img
            );
            print_r($data);
            $editImagenPag->EditImagenPag($data);
        }
    } /* else {
        return "error";
    } */
}
