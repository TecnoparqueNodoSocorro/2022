<?php

require_once "conexion.php";

class ModelMaterias
{

    // -------------MODELO TRAER MATERIAS--------
    static public function mdlGetMaterias($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
      
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
}