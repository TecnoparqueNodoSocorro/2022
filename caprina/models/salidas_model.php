<?php

require_once "conexion.php";

class ModelSalidas
{

    // --------REGISTRO DE SALIDAS--------------
    static public function registroSalida($tabla, $data, $estado)
    {

        try {
            $sql = "UPDATE $tabla  SET estado=:estado, motivo_salida=:motivo, fecha_salida=:fecha WHERE codigo=:codigo";
            $stmt = conexion::conectar()->prepare($sql);
            
            $stmt->bindParam(":codigo",  $data["codigo"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha",  $data["fecha"], PDO::PARAM_STR);
            $stmt->bindParam(":motivo",  $data["motivo"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
    
            $stmt->execute();
            return "ok";

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
           return "error";
        }


    }
}
