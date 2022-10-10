<?php

require_once "conexion.php";

class ModelArticulos
{
    //post articulo
    static public function mdlPostArticulos($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (municipio, sesion, nombre, descripcion, direccion, coordenadas_x,
        coordenadas_y, facebook, instagram, imagen1, imagen2) VALUES(:municipio, :sess, :nombre, :descr, :dir, :coor_x, :coor_y, :face, :insta, :img1, :img2)");
        $stmt->bindParam(":municipio", $data["municipio"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":sess", $data["session"], PDO::PARAM_STR);
        $stmt->bindParam(":dir", $data["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":coor_x", $data["coorx"], PDO::PARAM_STR);
        $stmt->bindParam(":coor_y", $data["coory"], PDO::PARAM_STR);
        $stmt->bindParam(":face", $data["face"], PDO::PARAM_STR);
        $stmt->bindParam(":insta", $data["insta"], PDO::PARAM_STR);
        $stmt->bindParam(":descr", $data["descr"], PDO::PARAM_STR);
        $stmt->bindParam(":img1", $data["img1"], PDO::PARAM_STR);
        $stmt->bindParam(":img2", $data["img2"], PDO::PARAM_STR);

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

    //funcion para listar todos los articulos desde el front
    static public function mdlGetArticulos($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY municipio ASC, id DESC");


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
    static public function mdlCambiarEstado($tabla, $data, $estado)
    {
        try {
            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET estado=$estado WHERE id=:id");
            $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
            $stmt->execute();
            return "ok new estado";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }
    //eliminar pagina
    static public function mdlDeleteArticulo($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("DELETE FROM  $tabla WHERE id=:id");

            $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
            $stmt->execute();
            return "Articulo eliminado";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return -1;
        }
    }
    //TRAER ARTCÍULO POR ID
    static public function mdlGetArticulo($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id ");
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

    //update articulo 

    static public function mdlEditarArticulo($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET nombre=:nombre, descripcion=:descr, direccion=:dir, 
        coordenadas_x=:coor_x, coordenadas_y=:coor_y, facebook=:face, 
        instagram=:insta/* , imagen1=:img1, imagen2=:img2 */ WHERE id=:id");

        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":dir", $data["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":coor_x", $data["coorx"], PDO::PARAM_STR);
        $stmt->bindParam(":coor_y", $data["coory"], PDO::PARAM_STR);
        $stmt->bindParam(":face", $data["face"], PDO::PARAM_STR);
        $stmt->bindParam(":insta", $data["insta"], PDO::PARAM_STR);
        $stmt->bindParam(":descr", $data["descr"], PDO::PARAM_STR);
        /*         $stmt->bindParam(":img1", $data["img1"], PDO::PARAM_STR);
        $stmt->bindParam(":img2", $data["img2"], PDO::PARAM_STR); */

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
    //update articulo imagen 1

    static public function mdlEditarImagenArticulo($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET imagen1=:img1 WHERE id=:id");

        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":img1", $data["img1"], PDO::PARAM_STR);


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
    //update articulo imagen 2

    static public function mdlEditarImagen2Articulo($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla  SET  imagen2=:img2 WHERE id=:id");

        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":img2", $data["img2"], PDO::PARAM_STR);

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

    //traer los articulos de cada uno de las sesiones
    static public function mdlGetArticuloPorSession($tabla, $mun, $session)
    {
        $stmt = conexion::conectar()->prepare("SELECT *
        FROM $tabla  WHERE municipio = '$mun' AND sesion= '$session' AND estado = 1 ORDER BY id DESC");


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
}
