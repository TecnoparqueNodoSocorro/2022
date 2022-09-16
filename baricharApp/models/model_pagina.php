<?php
require_once "conexion.php";

class ModelPagina
{

    static public function MdlNewArticulo($tabla, $datos)
    {
        $estado = 1;
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
    //editar
    static public function mdlUpdatePagina($tabla, $datos)
    {

        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET  sesion=:sesion , categoria=:categoria, item=:item,
          titulo=:titulo, descripcion=:descripcion WHERE id=:idp");
        $stmt->bindParam(":sesion", $datos["session_edit"], PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $datos["categoria_edit"], PDO::PARAM_STR);
        $stmt->bindParam(":item", $datos["item_edit"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo_prod_edit"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descr_producto_edit"], PDO::PARAM_STR);
        $stmt->bindParam(":idp", $datos["id"]);
        if ($stmt->execute()) {
            return "ok";
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    static function mdlGetPaginas($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ");

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    static function CtrCBcategorias($tabla, $sesion)
    {
        $stmt = conexion::conectar()->prepare("SELECT DISTINCT(categoria) FROM $tabla WHERE sesion =:sesion");
        $stmt->bindParam(":sesion", $sesion["sesion"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        $stmt = conexion::conectar()->prepare("SELECT DISTINCT(item) FROM $tabla WHERE categoria =:cat");
        $stmt->bindParam(":cat", $categ["categ"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    static function mdlGetPag($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id =:id");
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $stmt->fetchObject();
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
    //cambiar estado
    static public function MdlNewEstado($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET estado=:newestado WHERE id=:idp");
            $stmt->bindParam(":newestado", $data["NewEstado"], PDO::PARAM_STR);
            $stmt->bindParam(":idp", $data["id"], PDO::PARAM_STR);
            $stmt->execute();
            return "ok new estado";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }
    //eliminar pagina
    static public function mdlDeletePagina($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("DELETE FROM  $tabla WHERE id=:idp");

            $stmt->bindParam(":idp", $data["id"], PDO::PARAM_STR);
            $stmt->execute();
            return "Pagina eliminada";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
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