<?php 

require_once "conexion.php";

class ModelCategoria {

    static public function mdlRegistroC($tabla, $datos){
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (idemp, nombre, descripcion) VALUES(:idemp, :nombre, :descripcion) ");
        $stmt->bindParam(":idemp", $datos["idemp"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["desc"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());

            $stmt->closeCursor();
            $stmt = null;
        }
    }

    static public function mdlConsultarC($tabla , $idemp){
        $stmt = conexion::conectar()->prepare("SELECT id, nombre, descripcion FROM $tabla WHERE idemp = :idemp ");
        $stmt->bindParam(":idemp", $idemp, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlEliminaCategoria($tabla, $idecat){
        $stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :idecat ");
        $stmt->bindParam(":idecat", $idecat, PDO::PARAM_STR);
        $stmt->execute();

    }


}




?>