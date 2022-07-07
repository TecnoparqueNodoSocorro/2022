<?php


class ControladorProductos
{
    /* C REGISTRAR PRODUCTO */
    static public function ctrRegistro()
    {
        /* imagen generica */
        $rutaimagen = "views/images/producto.jpeg";
        /* directorio de almacenamiento de imagenes  */
        $raizImagenes="views/images/products";
        if (isset($_POST["prod_name"]) && isset($_POST["prod_descripcion"]) && isset($_POST["prod_clasificacion"]) && isset($_POST["prod_costo"]) && isset($_POST["prod_valor"]) && isset($_POST["prod_idemp"])) {

            if(isset($_FILES["imagen"]["tmp_name"])){
                $newAncho=300;
                $newAlto=150;
                list($ancho, $alto)=getimagesize($_FILES["imagen"]["tmp_name"]);
                if(!file_exists($raizImagenes))
                    mkdir($raizImagenes, 0755);
                
                $dateLoad = new DateTime();
                $nameRandom = $dateLoad->getTimestamp();
                

                if($_FILES["imagen"]["type"]=="image/png"){
                    $rutaimagen = $raizImagenes."/".$nameRandom.".png";
                    $orige = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($newAncho, $newAlto);                
                    imagealphablending($destino, false);
                    imagesavealpha($destino, true);
                    $transparent = imagecolorallocatealpha($destino,255,255,255,127);
                    imagefilledrectangle($destino, 0, 0, $newAncho, $newAlto, $transparent);
                    imagecopyresampled($destino, $orige, 0,0,0,0, $newAncho, $newAlto, $ancho, $alto);
                    imagepng($destino,$rutaimagen);
                }  else if($_FILES["imagen"]["type"] == "image/jpeg") {
                    $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
                    $orige = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($newAncho, $newAlto);
                    imagecopyresized($destino,$orige,0,0,0,0,$newAncho,$newAlto, $ancho, $alto);
                    imagejpeg($destino, $rutaimagen);
                }

                else if($_FILES["imagen"]["type"] == "image/jpg") {
                    $rutaimagen = $raizImagenes . "/" . $nameRandom . ".jpg";
                    $orige = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($newAncho, $newAlto);
                    imagecopyresized($destino,$orige,0,0,0,0,$newAncho,$newAlto, $ancho, $alto);
                    imagejpeg($destino, $rutaimagen);
                }

            }

            /* ---------------------------------------------------------------------------------------- */
            $tabla = "productos";
            $datos = array(
                "idemp" => $_POST["prod_idemp"],
                "nombre" => $_POST["prod_name"],
                "descripcion" => $_POST["prod_descripcion"],
                "costo" => $_POST["prod_costo"],
                "precio" => $_POST["prod_valor"],
                "clasificacion" => $_POST["prod_clasificacion"],
                "imagen"=>$rutaimagen
            );
            $respuesta = ModelProductos::mdlRegistro($tabla, $datos);
            return $respuesta;
        } else {
            return "error";
        }
    }

    /* C CONSULTAR TODOS LOS PRODUCTOS  */
    static public function ctrConsultarProductos()
    {
        $tabla = "productos";
        $idemp = 1;
        $consulta = ModelProductos::mdlConsultarProductos($tabla, $idemp);
        return $consulta;
    }

    /* C CONSULTAR 1 PRODUCTO  */
    static public function ctrdatosProducto($idp)
    {
        $tabla = "productos";
        $dato = $idp;
        $consulta = ModelProductos::mdldatosProducto($tabla, $dato);
        return $consulta;
    }

    /* C ACTUALIZAR PRODUCTO  */
    static public function ctractualizarProducto($upd_idproducto, $upd_nombre, $upd_descripcion, $upd_costo, $upd_valor, $upd_clasificacion)
    {
        $tabla = "productos";
        $dataupdate = array(
            "idproducto" => $upd_idproducto,
            "nombre" => $upd_nombre,
            "descripcion" => $upd_descripcion,
            "costo" => $upd_costo,
            "valor" => $upd_valor,
            "clasificacion" => $upd_clasificacion,
        );
        $actualizarprod = ModelProductos::mdleditarProducto($tabla, $dataupdate);
        return $actualizarprod;
    }

    /* ELIMINAR PRODUCTO */
    static public function crtelimnarproducto($delprod){
        $tabla = "productos";
        $eliminarproducto=ModelProductos::mdleliminarProducto($tabla, $delprod);
        return $eliminarproducto;
    }


    
}
