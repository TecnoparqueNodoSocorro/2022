<?php

require_once "conexion.php";

class ModelLote
{
    // ----------REGISTRAR LOTE-----------
    static public function mdlPostLote($tabla, $data)
    {
        //VALIDAR SI EXISTE UN CAPRINO CON EL MISMO CODIGO, SU CUENTAS LAS COLUMNAS Y SI ES 0  DEVUELVE VACIO
        $sql = conexion::conectar()->prepare("SELECT  COUNT(codigo) FROM $tabla WHERE codigo = :cod");
        $sql->bindParam(":cod", $data["lote"], PDO::PARAM_STR);
        $sql->execute();
        $count = $sql->fetchColumn();
        if ($count > 0) {
            return "";
        } else if ($count == 0) {
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario, codigo, lebrija,
        cristalina, villa_mercedes, manzana_blanca, peso, codigo_lote_anterior, peso_lote_anteior ) 
        VALUES(:id_usuario, :lote, :lebrija, :cristalina, :villaMercedes, :manzanaBlanca, :peso_lote,
        :lote_anterior, :peso_lote_anterior) ");
            $stmt->bindParam(":id_usuario", $data["id_usuario"]);
            $stmt->bindParam(":lote", $data["lote"]);
            $stmt->bindParam(":lebrija",  $data["lebrija"]);
            $stmt->bindParam(":cristalina",  $data["cristalina"]);
            $stmt->bindParam(":manzanaBlanca",  $data["manzanaBlanca"]);
            $stmt->bindParam(":peso_lote", $data["peso_lote"]);
            $stmt->bindParam(":lote_anterior", $data["lote_anterior"]);
            $stmt->bindParam(":peso_lote_anterior", $data["peso_lote_anterior"]);
            $stmt->bindParam(":villaMercedes", $data["villaMercedes"]);
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
    //--TRAER TODOS LOS LOTES PARA EL INFORME
    static public function mdlGetLotesInformes($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado !=5  ORDER BY estado, id DESC ");
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
        //--TRAER TODOS LOS LOTES PARA EL INFORME
        static public function mdlGetLotessFinalizadosInformes($tabla)
        {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla  WHERE estado = 5  ORDER BY estado, id DESC ");
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

    //--TRAER TODOS LOS LOTES PARA EL ESCALDADO
    static public function mdlGetLotesEscaldado($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 OR  estado = 2  ORDER BY id DESC");
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
    //--TRAER TODOS LOS LOTES PARA EL reporte
    static public function mdlGetLotesReporte($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE   estado = 2  OR estado = 3 ORDER BY id DESC");
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
    //--TRAER TODOS LOS LOTES PARA EL embalaje
    static public function mdlGetLotesEmbalaje($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE   estado = 3 OR estado = 4 ORDER BY id DESC");
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

    //finalizar lote
    static public function mdlFinalizarLote($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET estado=5 WHERE codigo=:cod");
        $stmt->bindParam(":cod", $data["codigo"], PDO::PARAM_STR);
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
    //traer lote por codigo
    static public function mdlGetLoteByCodigo($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo=:codigo");
        $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_STR);
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
    //traer lote por codigo
    static public function mdlGetLoteInfo($tabla, $data)
    {

        $stmt = conexion::conectar()->prepare("SELECT usuarios.nombres, usuarios.apellidos, $tabla.codigo_lote_anterior, $tabla.cristalina, $tabla.fecha_recepcion, $tabla.lebrija,  $tabla.manzana_blanca, $tabla.peso, $tabla.peso_lote_anteior, $tabla.villa_mercedes
         FROM $tabla 
         INNER JOIN usuarios ON $tabla.id_usuario = usuarios.id
         WHERE codigo=:codigo");
        $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return ($stmt->fetchObject());
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }
        //traer lote por codigo
        static public function mdlGetLoteFinalizadosInfo($tabla, $data)
        {
    
            $stmt = conexion::conectar()->prepare("SELECT usuarios.nombres, usuarios.apellidos, $tabla.codigo_lote_anterior, $tabla.cristalina, $tabla.fecha_recepcion, $tabla.lebrija,  $tabla.manzana_blanca, $tabla.peso, $tabla.peso_lote_anteior, $tabla.villa_mercedes
             FROM $tabla 
             INNER JOIN usuarios ON $tabla.id_usuario = usuarios.id
             WHERE codigo=:codigo");
            $stmt->bindParam(":codigo", $data["codigo"], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return ($stmt->fetchObject());
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
