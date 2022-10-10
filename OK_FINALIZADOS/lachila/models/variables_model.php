<?php

require_once "conexion.php";

class ModelVariables
{


    // ----------REGISTRAR VARIABLES  A UN LOTE----------
    static public function mdlPostVariables($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla ( codigo_lote, fase_lote, id_usuario, brix, alcohol, ph, tds, ac, temperatura, humedad) 
        VALUES( :cod, :fase, :usuario, :brix, :alcohol, :ph, :tds, :ac, :temp, :hum) ");

        $stmt->bindParam(":cod", $data["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":fase", $data["fase"]);
        $stmt->bindParam(":usuario", $data["usuario"]);
        $stmt->bindParam(":brix",  $data["brix"]);
        $stmt->bindParam(":alcohol",  $data["alcohol"]);
        $stmt->bindParam(":ph",  $data["ph"]);
        $stmt->bindParam(":tds",  $data["tds"]);
        $stmt->bindParam(":ac",  $data["ac"]);
        $stmt->bindParam(":temp",  $data["temperatura"]);
        $stmt->bindParam(":hum",  $data["humedad"]);

        if ($stmt->execute()) {
            return "ok" . $data["codigo"];
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    //TRAER VARIABLES

    //LISTAR LOS REGISTROS DE LOS LOTES POR USUARIO
    static public function mdlGetRegistros($tabla, $id)
    {
        $stmt = conexion::conectar()->prepare("SELECT *, $tabla.codigo_lote AS 'codigo_lote' FROM $tabla INNER JOIN usuarios ON usuarios.id=$tabla.id_usuario  WHERE $tabla.id_usuario=$id ORDER BY $tabla.id DESC");


        if ($stmt->execute()) {
            return $stmt->fetchAll();
            $stmt->closeCursor();
            $stmt = null;
        } else {
            echo "\nPDO::errorInfo():\n modelo";
            print_r($stmt->errorInfo());
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    //get datos de lotes que esten en f1 para vista de administrador
    static public function mdlGetDatosFer1($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla
        INNER JOIN usuarios ON usuarios.id=$tabla.id_usuario
        WHERE fase_lote=:estado AND codigo_lote=:cod ORDER BY $tabla.fecha_registro DESC ");
        $stmt->bindParam(":cod",  $data["cod"]);
        $stmt->bindParam(":estado",  $data["state"]);

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
    //GENERACION DE LA GRÁFICA
    static public function mdlDatosGrafica($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("SELECT codigo_lote, temperatura, humedad, brix, alcohol,
          fecha_registro FROM $tabla
          WHERE codigo_lote=:cod AND fase_lote=:estado AND fecha_registro BETWEEN :inicio AND :fin ORDER BY fecha_registro ASC");
        $stmt->bindParam(":cod",  $data["cod"]);
        $stmt->bindParam(":estado",  $data["state"]);
        $stmt->bindParam(":inicio",  $data["inicio"]);
        $stmt->bindParam(":fin",  $data["fin"]);


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
    //GENERAR INFORMACION DE LOS LOTES PARA EL HOME ADMIN
    static public function mdlDatosHome($tabla, $fase)
    {
        $stmt = conexion::conectar()->prepare("SELECT l.id, $tabla.codigo_lote, m.nombre AS materia, l.fecha_inicio, 
        COUNT($tabla.fecha_registro) as cantidad_registros
        FROM $tabla
        INNER JOIN lotes l on l.codigo=$tabla.codigo_lote 
        INNER JOIN materias m ON l.id_materia=m.id
        WHERE l.fermentacion=$fase AND $tabla.fase_lote=$fase GROUP BY l.codigo ORDER BY m.nombre, l.codigo");



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
    //GENERAR INFORMACION DE LOS LOTES PARA EL HOME empleado
    static public function mdlDatosHomeEmpl($tabla, $fase, $id)
    {
        $stmt = conexion::conectar()->prepare("SELECT l.id,  $tabla.codigo_lote, 
        COUNT($tabla.fecha_registro) AS cantidad_registros, max($tabla.fecha_registro) as fecha_registro, m.nombre AS materia
        FROM $tabla INNER JOIN lotes l on l.codigo=$tabla.codigo_lote 
        INNER JOIN materias m ON l.id_materia = m.id
        WHERE l.fermentacion=$fase AND $tabla.fase_lote=$fase AND $tabla.id_usuario=$id 
        GROUP BY $tabla.codigo_lote 
        ORDER BY m.nombre, l.codigo;");



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
}
