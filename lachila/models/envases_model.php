<?php

require_once "conexion.php";

class ModelEnvases
{

    // -------------MODELO TRAER MATERIAS--------
    static public function mdlGetEnvases($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }
    // -------------MODELO  ENVASAR LOTES--------
    static public function mdlPostEnvasado($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_lote, id_envase, id_usuario, cantidad) VALUES(:lote, :env, :usuario, :cant)");
        $stmt->bindParam(":lote",  $data["lote_id"]);
        $stmt->bindParam(":env",  $data["envase"]);
        $stmt->bindParam(":usuario",  $data["id_usuario"]);
        $stmt->bindParam(":cant",  $data["cantidad"]);

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
    // -------------MODELO TRAER ENVASADOS--------
    static public function mdlGetEnvasados($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT l.codigo, u.nombres, u.apellidos, e.capacidad, $tabla.cantidad  FROM $tabla 
        INNER JOIN usuarios u ON u.id = $tabla.id_usuario 
        INNER JOIN envases e ON e.id =  $tabla.id_envase
        INNER JOIN lotes l ON l.id = :id
        WHERE $tabla.id_lote = :id  ORDER BY $tabla.id DESC");
        $stmt->bindParam(":id",  $data["id"]);

        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
  // -------------MODELO TRAER ENVASADOS--------
  static public function mdlGetEnvasadosPorLote($tabla, $data)
  {
      $stmt = conexion::conectar()->prepare("SELECT v.capacidad, SUM($tabla.cantidad) as total, 
      (v.capacidad*SUM($tabla.cantidad)) as totalProduccion
      FROM $tabla  INNER JOIN envases v ON $tabla.id_envase=v.id 
      WHERE  $tabla.id_lote=:id GROUP BY $tabla.id_envase");
      $stmt->bindParam(":id",  $data["id"]);

      if ($stmt->execute()) {
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          $stmt = null;
      } else {
          echo "\nPDO::errorInfo():\n modelo";
          print_r($stmt->errorInfo());
          $stmt->closeCursor();
          $stmt = null;
      }
  }   
   /*  // -------------MODELO TRAER ENVASADOS POR USUARIO--------
    static public function mdlGetEnvasadosPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT l.codigo, u.nombres, u.apellidos, e.capacidad, $tabla.cantidad  FROM $tabla 
            INNER JOIN usuarios u ON u.id = $tabla.id_usuario 
            INNER JOIN envases e ON e.id =  $tabla.id_envase
            INNER JOIN lotes l ON l.id = :id
            WHERE $tabla.id_lote = :id AND $tabla.id_usuario = :id_usuario ORDER BY $tabla.fecha_envasado DESC");
        $stmt->bindParam(":id",  $data["id"]);
        $stmt->bindParam(":id_usuario",  $data["id_usuario"]);


        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    } */
}
