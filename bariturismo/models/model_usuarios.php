<?php

require_once "conexion.php";

class ModelUsuarios
{

    // -------------MODELO LOGIN--------
    static public function mdlLogin($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:user AND pass=:pass");
        $stmt->bindParam(":user",  $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["password"], PDO::PARAM_STR);
        $stmt->execute();
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
    //cambio clave
/*     static public function mdlCambioClave($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET clave = :pass WHERE id = :id");
        $stmt->bindParam(":id",  $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":pass",  $data["pass"], PDO::PARAM_STR);

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
    } */
}