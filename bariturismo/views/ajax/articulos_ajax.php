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
        $nameRandom = 1+$dateLoad->getTimestamp();
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
        $nameRandom = 2+$dateLoad->getTimestamp();
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

        /* "imagen" => $rutaimagen */
    );
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
    !empty($_POST['descripcion_edit']) 
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
  /*       "img1" => $rutaimagen,
        "img2" => $rutaimagen2, */

        /* "imagen" => $rutaimagen */
    );
    $art->EditarArticulo($data);
}
