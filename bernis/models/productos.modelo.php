<?php

require_once "conexion.php";


class ModelProductos
{

    /* M REGISTRO DE PRODUCTO*/
    static public function mdlRegistro($tabla, $datos)
    {

        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (idemp, nombre, descripcion, costo, precio, clasificacion, imagen) VALUES(:idemp, :nombre, :descripcion, :costo, :precio, :clasificacion, :imagen) ");
        /* bindParam() */
        $stmt->bindParam(":idemp", $datos["idemp"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt->bindParam(":clasificacion", $datos["clasificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());

            $stmt->closeCursor();
            $stmt = null;
        }
    }

    /* M CONSULTAR TODOS LOS PRODUCTOS*/

    static public function mdlConsultarProductos($tabla, $idemp)
    {

        $stmt = conexion::conectar()->prepare("SELECT id, nombre, descripcion, costo, precio, clasificacion, imagen FROM $tabla WHERE idemp = :idemp ");
        $stmt->bindParam(":idemp", $idemp, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }




    /* M CONSULTAR 1 PRODUCTO */

    static public function mdldatosProducto($tabla, $dato)
    {
        $stmt = conexion::conectar()->prepare("SELECT id, nombre, descripcion, costo, precio, clasificacion FROM $tabla WHERE id = :dato");
        $stmt->bindParam(":dato", $dato, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }



    /* M ELIMINAR PRODUCTO */

    static public function mdleliminarProducto($tabla, $delprod)
    {

        try {
            $stmt = conexion::conectar()->prepare("DELETE FROM $tabla where id = :idproducto");
            $stmt->bindParam(":idproducto", $delprod, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
            return 1;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }

    /* M ACTUALIZAR PRODUCTO  */

    static public function mdleditarProducto($tabla, $dataupdate)
    {
        try {
            $sql = "UPDATE $tabla SET clasificacion=:clasificacion, nombre=:nombre, descripcion=:descripcion, costo=:costo, precio=:valor WHERE id=:idproducto";
            $stmt = conexion::conectar()->prepare($sql);

            $stmt->bindParam(":idproducto", $dataupdate["idproducto"], PDO::PARAM_STR);
            $stmt->bindParam(":clasificacion", $dataupdate["clasificacion"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $dataupdate["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $dataupdate["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":costo", $dataupdate["costo"], PDO::PARAM_STR);
            $stmt->bindParam(":valor", $dataupdate["valor"], PDO::PARAM_STR);
            $stmt->execute();
            return 1;
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }
}

