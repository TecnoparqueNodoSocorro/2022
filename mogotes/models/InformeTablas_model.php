<?php

require_once "conexion.php";

class ModelReporteTablas
{

    // ----------traer recepciones hoy ---------
    static public function mdlInformeGeneralTablas($tabla, $data)
    {
        try {

            $stmt = conexion::conectar()->prepare("SELECT codigo_lote, tabla_extrafino, tabla_bocadillos, tabla_lonja, tabla_manzana,
            adic_tabla_extrafino, adic_tabla_bocadillos, adic_tabla_lonja, adic_tabla_manzana,
            dev_tabla_bocadillos, dev_tabla_extrafino, dev_tabla_lonja, dev_tabla_manzana,
            fecha_fabricacion, codigo_lote_adicion,
            ((SUM(tabla_extrafino)- SUM(dev_tabla_extrafino)) + SUM(adic_tabla_extrafino)) AS 'total_extrafino',
            ((SUM(tabla_bocadillos)- SUM(dev_tabla_bocadillos)) + SUM(adic_tabla_bocadillos)) AS 'total_bocadillo',
            ((SUM(tabla_lonja)- SUM(dev_tabla_lonja)) + SUM(adic_tabla_lonja)) AS 'total_lonja', 
            ((SUM(tabla_manzana)- SUM(dev_tabla_manzana)) + SUM(adic_tabla_manzana)) AS 'total_manzana' 
            FROM $tabla WHERE fecha_fabricacion BETWEEN :fechaInicio AND :fechaFin GROUP BY id");
            $stmt->bindParam(":fechaInicio",  $data["fechaInicio"]);
            $stmt->bindParam(":fechaFin",  $data["fechaFin"]);

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
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
    static public function mdlInformelTablasBocadillo($tabla, $data)
    {
        try {

            $stmt = conexion::conectar()->prepare("SELECT codigo_lote, tabla_bocadillos, 
            adic_tabla_bocadillos, dev_tabla_bocadillos,fecha_fabricacion, codigo_lote_adicion,         
           (SUM(tabla_bocadillos) - SUM(dev_tabla_bocadillos) + SUM(adic_tabla_bocadillos)) AS 'total_bocadillo'
            FROM $tabla WHERE fecha_fabricacion BETWEEN :fechaInicio AND :fechaFin GROUP BY id");
            $stmt->bindParam(":fechaInicio",  $data["fechaInicio"]);
            $stmt->bindParam(":fechaFin",  $data["fechaFin"]);

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
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
    static public function mdlInformelTablasManzana($tabla, $data)
    {
        try {

            $stmt = conexion::conectar()->prepare("SELECT codigo_lote, tabla_extrafino, tabla_bocadillos, tabla_lonja, tabla_manzana,
            adic_tabla_extrafino, adic_tabla_bocadillos, adic_tabla_lonja, adic_tabla_manzana,
            dev_tabla_bocadillos, dev_tabla_extrafino, dev_tabla_lonja, dev_tabla_manzana,
            fecha_fabricacion, codigo_lote_adicion,
            ((SUM(tabla_extrafino)- SUM(dev_tabla_extrafino)) + SUM(adic_tabla_extrafino)) AS 'total_extrafino',
            ((SUM(tabla_bocadillos)- SUM(dev_tabla_bocadillos)) + SUM(adic_tabla_bocadillos)) AS 'total_bocadillo',
            ((SUM(tabla_lonja)- SUM(dev_tabla_lonja)) + SUM(adic_tabla_lonja)) AS 'total_lonja', 
            ((SUM(tabla_manzana)- SUM(dev_tabla_manzana)) + SUM(adic_tabla_manzana)) AS 'total_manzana' 
            FROM $tabla WHERE fecha_fabricacion BETWEEN :fechaInicio AND :fechaFin GROUP BY id");
            $stmt->bindParam(":fechaInicio",  $data["fechaInicio"]);
            $stmt->bindParam(":fechaFin",  $data["fechaFin"]);

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
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
    static public function mdlInformelTablasExtrafino($tabla, $data)
    {
        try {

            $stmt = conexion::conectar()->prepare("SELECT codigo_lote, tabla_extrafino, tabla_bocadillos, tabla_lonja, tabla_manzana,
            adic_tabla_extrafino, adic_tabla_bocadillos, adic_tabla_lonja, adic_tabla_manzana,
            dev_tabla_bocadillos, dev_tabla_extrafino, dev_tabla_lonja, dev_tabla_manzana,
            fecha_fabricacion, codigo_lote_adicion,
            ((SUM(tabla_extrafino)- SUM(dev_tabla_extrafino)) + SUM(adic_tabla_extrafino)) AS 'total_extrafino',
            ((SUM(tabla_bocadillos)- SUM(dev_tabla_bocadillos)) + SUM(adic_tabla_bocadillos)) AS 'total_bocadillo',
            ((SUM(tabla_lonja)- SUM(dev_tabla_lonja)) + SUM(adic_tabla_lonja)) AS 'total_lonja', 
            ((SUM(tabla_manzana)- SUM(dev_tabla_manzana)) + SUM(adic_tabla_manzana)) AS 'total_manzana' 
            FROM $tabla WHERE fecha_fabricacion BETWEEN :fechaInicio AND :fechaFin GROUP BY id");
            $stmt->bindParam(":fechaInicio",  $data["fechaInicio"]);
            $stmt->bindParam(":fechaFin",  $data["fechaFin"]);

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
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
    static public function mdlInformelTablasLonja($tabla, $data)
    {
        try {

            $stmt = conexion::conectar()->prepare("SELECT codigo_lote, tabla_extrafino, tabla_bocadillos, tabla_lonja, tabla_manzana,
            adic_tabla_extrafino, adic_tabla_bocadillos, adic_tabla_lonja, adic_tabla_manzana,
            dev_tabla_bocadillos, dev_tabla_extrafino, dev_tabla_lonja, dev_tabla_manzana,
            fecha_fabricacion, codigo_lote_adicion,
            ((SUM(tabla_extrafino)- SUM(dev_tabla_extrafino)) + SUM(adic_tabla_extrafino)) AS 'total_extrafino',
            ((SUM(tabla_bocadillos)- SUM(dev_tabla_bocadillos)) + SUM(adic_tabla_bocadillos)) AS 'total_bocadillo',
            ((SUM(tabla_lonja)- SUM(dev_tabla_lonja)) + SUM(adic_tabla_lonja)) AS 'total_lonja', 
            ((SUM(tabla_manzana)- SUM(dev_tabla_manzana)) + SUM(adic_tabla_manzana)) AS 'total_manzana' 
            FROM $tabla WHERE fecha_fabricacion BETWEEN :fechaInicio AND :fechaFin GROUP BY id");
            $stmt->bindParam(":fechaInicio",  $data["fechaInicio"]);
            $stmt->bindParam(":fechaFin",  $data["fechaFin"]);

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
        } catch (PDOException $e) {
            echo "DataBase Error: The user could not be added.<br>" . $e->getMessage();
        } catch (Exception $e) {
            echo "General Error: The user could not be added.<br>" . $e->getMessage();
        }
    }
}
