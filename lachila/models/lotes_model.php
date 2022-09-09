<?php

require_once "conexion.php";

class ModelLotes
{


    // ----------REGISTRAR NUEVO- LOTE----------
    static public function mdlPostLote($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( codigo, materia, fecha_inicio, peso_inicial, peso_neto, p_desperdicio, adicion) 
        VALUES( :cod, :materia, :fecha, :peso, :peso_n, :peso_d, :adicion) ");
        $stmt->bindParam(":cod", $data["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":materia", $data["materia"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $data["fecha_inicio"]);
        $stmt->bindParam(":peso",  $data["peso_inicial"]);
        $stmt->bindParam(":peso_n",  $data["peso_neto"]);
        $stmt->bindParam(":peso_d",  $data["peso_desperdiciado"]);
        $stmt->bindParam(":adicion",  $data["adicion"], PDO::PARAM_STR);

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
    //LISTAR LOS LOSTES DE MANERA DINÁMICA
    static public function mdlGetLotes($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fermentacion = :fer ORDER BY id DESC ");
        $stmt->bindParam(":fer", $data["fermentacion"]);
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

    //LISTAR LOS REGISTROS DE LOS LOTES QUE ESTAN EN ESTADO DE HISTORIAL
    static public function mdlGetLotesHistorial($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT lotes.fermentacion,  lotes.fecha_fin, lotes.codigo AS'codigo_lote', lotes.materia FROM $tabla
         INNER JOIN lotes ON lotes.codigo=$tabla.codigo_lote  WHERE lotes.fermentacion = :fer GROUP BY lotes.id
        ORDER BY $tabla.id DESC");

        $stmt->bindParam(":fer", $data["fermentacion"]);
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
    //LISTAR LOS REGISTROS DE LOS LOTES QUE ESTAN EN ESTADO DE HISTORIAL FILTRANDO POR LOTE
    static public function mdLGetInfoLote($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT  lotes.fecha_fin, lotes.codigo AS'codigo_lote', $tabla.fase_lote, $tabla.temperatura, $tabla.humedad, $tabla.id,  $tabla.brix, $tabla.alcohol, $tabla.ph,
             $tabla.tds, $tabla.ac, $tabla.fecha_registro, usuarios.nombres, usuarios.apellidos  FROM $tabla
             INNER JOIN lotes ON lotes.codigo=$tabla.codigo_lote 
            INNER JOIN usuarios on usuarios.id = $tabla.id_usuario  WHERE lotes.fermentacion = :fer AND lotes.codigo=:lote
            ORDER BY $tabla.id DESC");

        $stmt->bindParam(":fer", $data["fermentacion"]);
        $stmt->bindParam(":lote", $data["codigo"]);

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


    //LISTAR LOS REGISTROS DE LOS LOTES POR EMPLEADO PARA LA GESTION DE LOTES DE LOS EMPLEADOS
    static public function mdlGetLotesPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN lotes on lotes.id=$tabla.id_lote 
            INNER JOIN usuarios ON usuarios.id = :emp
            WHERE $tabla.id_usuario = :emp
            ORDER BY $tabla.fecha_registro DESC");

        $stmt->bindParam(":emp", $data["user"]);
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


    //LISTAR LOS REGISTROS DE LOS LOTES POR USUARIO Y QUE ESTEN EN FASE 4 PARA EL HISTORIAL DEL  EMPLEADO
    static public function mdLGetInfoLotePorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT lotes.fermentacion, lotes.fecha_fin, lotes.codigo AS'codigo_lote', $tabla.temperatura, $tabla.humedad, $tabla.id,  $tabla.brix, $tabla.alcohol, $tabla.ph,
            $tabla.tds, $tabla.ac, $tabla.fecha_registro, usuarios.nombres, usuarios.apellidos FROM $tabla 
            INNER JOIN usuarios ON usuarios.id=:usuario 
            INNER JOIN lotes ON lotes.codigo=$tabla.codigo_lote
            WHERE $tabla.id_usuario=:usuario 
            AND $tabla.codigo_lote=:codigo
            AND lotes.fermentacion=:fer ");

        $stmt->bindParam(":codigo", $data["idCodigo"]);
        $stmt->bindParam(":usuario", $data["idUsuario"]);
        $stmt->bindParam(":fer", $data["fermentacion"]);


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




    //LISTAR LOS REGISTROS DE LOS LOTES QUE ESTAN EN ESTADO DE HISTORIAL PARA LOS USUARIOS
    static public function mdlGetLotesHistorialPorUsuario($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT lotes.fermentacion, lotes.codigo as 'codigo_lote', $tabla.id as 'registro_id',
             lotes.fecha_fin, lotes.materia from $tabla INNER JOIN lotes ON lotes.codigo = $tabla.codigo_lote 
             where $tabla.id_usuario=:user AND lotes.fermentacion=:fer group by lotes.id");

        $stmt->bindParam(":fer", $data["fermentacion"]);
        $stmt->bindParam(":user", $data["user"]);
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



    //AVANZAR DE ETAPA LOTE EN ESPECIFICO
    static public function mdlUpdateFase($tabla, $data, $fase)
    {
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET fermentacion=$fase WHERE codigo=:codigo");
        $stmt->bindParam(":codigo", $data["codigolote"], PDO::PARAM_STR);
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


    //AVANZAR A ETAPA 4  LOS LOTES QUE ESTANE EN ESTAPA 3, SE HACE POR APARTE DE LOS DEMÁS PORQUE HAY QUE COLOCAR FECHA DE FIN
    static public function mdlUpdateToFase4($tabla, $data, $fase)
    {
        $hoy = date("Ymd");
        $stmt = conexion::conectar()->prepare("UPDATE  $tabla SET fermentacion=$fase, fecha_fin=$hoy WHERE codigo=:cod ");
        $stmt->bindParam(":cod", $data["codigolote"], PDO::PARAM_STR);
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
