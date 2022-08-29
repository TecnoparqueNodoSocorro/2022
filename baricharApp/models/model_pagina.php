<?php
require_once "conexion.php";

class ModelPagina
{

    static public function MdlNewArticulo($tabla, $datos)
    {
        $estado=1;
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (sesion, categoria, item, imagen, titulo, descripcion,estado) VALUES(:sesion, :categoria, :item, :imagen, :titulo, :descripcion,:estado)");
        $stmt->bindParam(":sesion", $datos["session_create"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria_create"], PDO::PARAM_STR);
        $stmt->bindParam(":item", $datos["item_create"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["product_img_create"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo_prod_create"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descr_producto_create"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado);

        if ($stmt->execute()) {
            return "OK";
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }


static function CtrCBcategorias($tabla,$sesion){
        $stmt = conexion::conectar()->prepare("SELECT DISTINCT(categoria) FROM $tabla WHERE sesion =:sesion");
        $stmt->bindParam(":sesion",$sesion);

        if ($stmt->execute()) {
     
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
}


    static function CtrCBitems($tabla, $categ)
    {
        $stmt = conexion::conectar()->prepare("SELECT DISTINCT(items) FROM $tabla WHERE categoria =:cat");
        $stmt->bindParam(":cat", $categ);
        if ($stmt->execute()) {
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




// combos 

/* 
categotias 

SELECT DISTINCT(categoria) FROM `pg_categorias` WHERE sesion ="menu";


items
SELECT DISTINCT(item) FROM `pg_categorias` WHERE categoria ="Diversion";

*/