<?php

require_once "conexion.php";


// ------REGISTRAR PRODUCCION--------------
class ModelProduccion
{
    static public function registroProduccion($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario, codigo_caprino, cantidad_leche,  fecha_registro) VALUES( :id_usuario, :codigo_caprino, :cantidad, :fecha) ");
        $stmt->bindParam(":id_usuario", $data["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo_caprino",  $data["codigo_caprino"], PDO::PARAM_STR);
        $stmt->bindParam(":cantidad",  $data["cantidad"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha",  $data["fecha"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            $stmt->closeCursor();
            $stmt = null;
            return "ok";
        } else {
            echo "\nPDO::errorInfo():\n" . $data . "modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
