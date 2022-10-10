<?php
require_once "../../controllers/controller_articulos.php";
require_once "../../models/model_articulos.php";



class ArticulosAjax
{
    public $controlador;




    //post articulo
    static public function PostArticulo($data)
    {
        $datos = ControladorArticulos::ctrPostArticulos($data);
        echo json_encode($datos);
    }





    //cambio de estado de articulo
    static public function CambiarEstado($data)
    {
        $datos = ControladorArticulos::ctrCambiarEstado($data);
        echo $datos;
    }

    //delete articulo
    static public function DeleteArticulo($data)
    {
        $datos = ControladorArticulos::ctrDeleteArticulo($data);
        echo $datos;
    }

    //Get datos para editar
    static public function GetArticulo($data)
    {
        $datos = ControladorArticulos::ctrGetArticulo($data);
        $rta = json_encode($datos);
        print_r($rta);
    }

    //post articulo editado
    static public function EditarArticulo($data)
    {
        $datos = ControladorArticulos::ctrEditarArticulo($data);
        echo $datos;
    }

    //EDITAR IMAGEN 1 
    static public function EditarImagenArticulo($data)
    {
        $datos = ControladorArticulos::ctrEditarImagenArticulo($data);
        echo $datos;
    }
    //EDITAR IMAGEN 2
    static public function EditarImagen2Articulo($data)
    {
        $datos = ControladorArticulos::ctrEditarImagen2Articulo($data);
        echo $datos;
    }
}


//post articulo

if (
    !empty($_POST['nombre_art']) ||
    !empty($_POST['direccion_art']) ||
    !empty($_POST['coordenadas_x_art']) ||
    !empty($_POST['municipio']) ||
    !empty($_POST['coordenadas_y_art']) ||
    !empty($_POST['facebook_art']) ||
    !empty($_POST['instagram_art']) ||
    !empty($_POST['descripcion_art']) ||
    !empty($_POST['sesion'])

) {

    //-------------------IMAGEN 1--------------------------------------
    /* imagen generica */
    $rutaimagen = "../images/p2.jpeg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes = "../images/" . $_POST['municipio'] . "/" . $_POST['sesion'];
    if (isset($_FILES["img1_art"]["tmp_name"])) {
        $newAncho = 600;
        $newAlto = 300;
        list($ancho, $alto) = getimagesize($_FILES["img1_art"]["tmp_name"]);
        if (!file_exists($raizImagenes))
            mkdir($raizImagenes, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 1 + $dateLoad->getTimestamp();
        if ($_FILES["img1_art"]["type"] == "image/png") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["img1_art"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen);
        } else if ($_FILES["img1_art"]["type"] == "image/jpeg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img1_art"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
        } else if ($_FILES["img1_art"]["type"] == "image/jpg") {
            $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img1_art"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen);
        }
    } else {
        return "error";
    }
    //--------------------------------------------------------------------------------------------------------------
    //-------------------IMAGEN 2--------------------------------------
    /* imagen generica */
    $rutaimagen2 = "../images/p2.jpeg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes2 = "../images/" . $_POST['municipio'] . "/" . $_POST['sesion'];
    if (isset($_FILES["img2_art"]["tmp_name"])) {
        $newAncho = 600;
        $newAlto = 300;
        list($ancho, $alto) = getimagesize($_FILES["img2_art"]["tmp_name"]);
        if (!file_exists($raizImagenes2))
            mkdir($raizImagenes2, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 2 +  $dateLoad->getTimestamp();
        if ($_FILES["img2_art"]["type"] == "image/png") {
            $rutaimagen2 = $raizImagenes2 . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["img2_art"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen2);
        } else if ($_FILES["img2_art"]["type"] == "image/jpeg") {
            $rutaimagen2 = $raizImagenes2 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img2_art"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen2);
        } else if ($_FILES["img2_art"]["type"] == "image/jpg") {
            $rutaimagen2 = $raizImagenes2 . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img2_art"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen2);
        }
    } else {
        return "error";
    }
    //--------------------------------------------------------------------------------------------------------------


    $art = new ArticulosAjax();
    $data = array(
        "nombre" => $_POST["nombre_art"],
        "direccion" => $_POST["direccion_art"],
        "session" => $_POST["sesion"],
        "descr" => $_POST["descripcion_art"],
        "coorx" => $_POST["coordenadas_x_art"],
        "municipio" => $_POST["municipio"],
        "coory" => $_POST["coordenadas_y_art"],
        "insta" => $_POST["instagram_art"],
        "face" => $_POST["facebook_art"],
        "img1" => $rutaimagen,
        "img2" => $rutaimagen2,
    );
    print_r($data);
    $art->PostArticulo($data);
} /* else {
    return "error";
} */

//cambio de estado de articulo
if (isset($_POST['new_estado'])) {
    $art = new ArticulosAjax();
    $data = $_POST['new_estado'];
    $art->CambiarEstado($data);
}


//delete articulo
if (isset($_POST['delete_articulo'])) {
    $art = new ArticulosAjax();
    $data = $_POST['delete_articulo'];
    $art->DeleteArticulo($data);
}

//Get datos para editar
if (isset($_POST['get_info'])) {
    $art = new ArticulosAjax();
    $data = $_POST['get_info'];
    $art->GetArticulo($data);
}

//post articulo editado
if (
    !empty($_POST['id']) ||
    !empty($_POST['nombre_edit']) ||
    !empty($_POST['direccion_edit']) ||
    !empty($_POST['coordenadas_x_edit']) ||
    !empty($_POST['coordenadas_y_edit']) ||
    !empty($_POST['facebook_edit']) ||
    !empty($_POST['instagram_edit']) ||
    !empty($_POST['descripcion_edit']) /* ||
    !empty($_POST['sesion_edit']) ||
    !empty($_POST['municipio_edit']) */
) {

    $art = new ArticulosAjax();
    $data = array(
        "id" => $_POST["idEdit"],
        "nombre" => $_POST["nombre_edit"],
        "direccion" => $_POST["direccion_edit"],
        "descr" => $_POST["descripcion_edit"],
        "coorx" => $_POST["coordenadas_x_edit"],
        "coory" => $_POST["coordenadas_y_edit"],
        "insta" => $_POST["instagram_edit"],
        "face" => $_POST["facebook_edit"],
        /*         "municipio" => $_POST["municipio_edit"],   
        "sesion" => $_POST["sesion_edit"],
        "img1" => $rutaimagen_edit,
        "img2" => $rutaimagen2_edit,
 */
        /* "imagen" => $rutaimagen */
    );
    // print_r($data);
    $art->EditarArticulo($data);
}


//EDITAR IMAGEN 1 

if (
    !empty($_POST['id']) ||
    !empty($_POST['sesion_edit']) ||
    !empty($_POST['municipio_edit'])
) {
    //-------------------IMAGEN 1 EDIT--------------------------------------
    /* imagen generica */
    $rutaimagen_edit = "../images/p2.jpeg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes_edit = "../images/" . $_POST['municipio_edit'] . "/" . $_POST['sesion_edit'];
    if (!empty($_FILES["img1_edit"]["tmp_name"])) {
        $newAncho = 600;
        $newAlto = 300;
        list($ancho, $alto) = getimagesize($_FILES["img1_edit"]["tmp_name"]);
        if (!file_exists($raizImagenes_edit))
            mkdir($raizImagenes_edit, 0755);
        $dateLoad = new DateTime();
        $nameRandom = 3 + $dateLoad->getTimestamp();
        if ($_FILES["img1_edit"]["type"] == "image/png") {
            $rutaimagen_edit = $raizImagenes_edit . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["img1_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen_edit);

            $art = new ArticulosAjax();
            $data = array(
                "id" => $_POST["idEdit"],
                "img1" => $rutaimagen_edit,
            );
            print_r($data);
            $art->EditarImagenArticulo($data);
        } else if ($_FILES["img1_edit"]["type"] == "image/jpeg") {
            $rutaimagen_edit = $raizImagenes_edit . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img1_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_edit);

            $art = new ArticulosAjax();
            $data = array(
                "id" => $_POST["idEdit"],
                "img1" => $rutaimagen_edit,
            );
            print_r($data);
            $art->EditarImagenArticulo($data);
        } else if ($_FILES["img1_edit"]["type"] == "image/jpg") {
            $rutaimagen_edit = $raizImagenes_edit . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img1_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen_edit);

            $art = new ArticulosAjax();
            $data = array(
                "id" => $_POST["idEdit"],
                "img1" => $rutaimagen_edit,
            );
            print_r($data);
            $art->EditarImagenArticulo($data);
        } /* else {

            echo "error";
        } */
    }
}
//--------------------------------------------------------------------------------------------------------------




//EDITAR IMAGEN 2 

if (
    !empty($_POST['id']) ||
    !empty($_POST['sesion_edit']) ||
    !empty($_POST['municipio_edit'])
) {
    //-------------------IMAGEN 2--EDIT------------------------------------
    /* imagen generica */
    $rutaimagen2_edit = "../images/p2.jpeg";
    /* directorio de almacenamiento de imagenes  */
    $raizImagenes2_edit = "../images/" . $_POST['municipio_edit'] . "/" . $_POST['sesion_edit'];
    if (!empty($_FILES["img2_edit"]["tmp_name"])) {
        $newAncho = 600;
        $newAlto = 300;
        list($ancho, $alto) = getimagesize($_FILES["img2_edit"]["tmp_name"]);
        if (!file_exists($raizImagenes2_edit))
            mkdir($raizImagenes2_edit, 0755);
        $dateLoad = new DateTime();
        $nameRandom =  4 + $dateLoad->getTimestamp();
        if ($_FILES["img2_edit"]["type"] == "image/png") {
            $rutaimagen2_edit = $raizImagenes2_edit . "/" . $nameRandom . ".png";
            $orige = imagecreatefrompng($_FILES["img2_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagealphablending($destino, false);
            imagesavealpha($destino, true);
            $transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);
            imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
            imagecopyresampled($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagepng($destino, $rutaimagen2_edit);

            $art = new ArticulosAjax();
            $data = array(
                "id" => $_POST["idEdit"],
                "img2" => $rutaimagen2_edit,
            );
            print_r($data);
            $art->EditarImagen2Articulo($data);
        } else if ($_FILES["img2_edit"]["type"] == "image/jpeg") {
            $rutaimagen2_edit = $raizImagenes2_edit . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img2_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen2_edit);
            $art = new ArticulosAjax();
            $data = array(
                "id" => $_POST["idEdit"],
                "img2" => $rutaimagen2_edit,
            );
            print_r($data);
            $art->EditarImagen2Articulo($data);
        } else if ($_FILES["img2_edit"]["type"] == "image/jpg") {
            $rutaimagen2_edit = $raizImagenes2_edit . "/" . $nameRandom . ".jpg";
            $orige = imagecreatefromjpeg($_FILES["img2_edit"]["tmp_name"]);
            $destino = imagecreatetruecolor($newAncho, $newAlto);
            imagecopyresized($destino, $orige, 0, 0, 0, 0, $newAncho, $newAlto, $ancho, $alto);
            imagejpeg($destino, $rutaimagen2_edit);
            $art = new ArticulosAjax();
            $data = array(
                "id" => $_POST["idEdit"],
                "img2" => $rutaimagen2_edit,
            );
                 print_r($data);
            $art->EditarImagen2Articulo($data);
        }
        /*  else{
        echo "error";
        } */
    }
}
    //--------------------------------------------------------------------------------------------------------------