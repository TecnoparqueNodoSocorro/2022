<?php
require_once "conexion.php";

class ModelPagina
{

    static public function MdlNewArticulo($tabla, $datos)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (sesion, categoria, item,imagen,titulo,descripcion,estado) VALUES(:sesion, :categoria, :item, :imagen, :titulo, :descripcion, :estado)");
        $stmt->bindParam(":sesion", $datos["session_create"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria_create"], PDO::PARAM_STR);
        $stmt->bindParam(":item", $datos["item_create"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["product_img_create"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo_prod_create"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descr_producto_create"], PDO::PARAM_STR);
        return;
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
