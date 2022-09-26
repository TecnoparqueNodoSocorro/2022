<?php
require_once "conexion.php";
class ModelProducto
{
    // crear 
    static public function mdlPostProducto($tabla, $datos)
    {

        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (idproveedor, idcategoria, nombre, precio, img1, img2, descripcion) 
        VALUES(:idproveedor, :idcategoria, :nombre, :precio, :img1, :img2,:descripcion)");
        $stmt->bindParam(":idproveedor", $datos["idproveedor"], PDO::PARAM_STR);
        $stmt->bindParam(":idcategoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":img1", $datos["img1"], PDO::PARAM_STR);
        $stmt->bindParam(":img2", $datos["img2"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);


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
    // consultar categorias de los productos
    static public function mdlGetProductos($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
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
    // consultar categorias de los productos
    static public function mdlGetCategoriaProductos($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
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
    //cambiar estado
    static public function MdlNewEstadoPro($tabla, $data)
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
    static public function mdlDeleteProducto($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("DELETE FROM  $tabla WHERE id=:idpro");

            $stmt->bindParam(":idpro", $data["id"], PDO::PARAM_STR);
            $stmt->execute();
            return "Pagina eliminada";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }
    // consultar categorias de los productos
    static public function mdlGetProducto($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT *, p.id AS 'id_categoria', $tabla.id AS 'id_producto' FROM $tabla INNER JOIN pg_categorias p ON p.id =$tabla.idcategoria  WHERE $tabla.id = :idpro");
        $stmt->bindParam(":idpro", $data["id"], PDO::PARAM_STR);

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
    //editar
    static public function mdlEditProd($tabla, $datos)
    {

        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET   idcategoria=:categoria, nombre=:nombre,
              precio=:precio, descripcion=:descripcion WHERE id=:idpro");
        $stmt->bindParam(":categoria", $datos["categoria"]);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"]);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":idpro", $datos["id"]);
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
}
