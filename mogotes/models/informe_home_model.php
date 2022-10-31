<?php

require_once "conexion.php";

class ModelHome
{

    // ----------traer recepciones hoy ---------
    static public function mdlRecepcionesHoy($tabla)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_recepcion = $hoy");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    } // ----------traer escaldadas hoy ---------
    static public function mdlEscaldadasHoy($tabla)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_escaldado  = $hoy");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // ----------traer reporte de bocadillo hoy ---------

    static public function mdlReporteBocadilloHoy($tabla)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_fabricacion = $hoy");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }

    // ----------traer  reporte de arequipe hoy ---------
    static public function mdlReporteArequipeHoy($tabla)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_fabricacion = $hoy");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // ----------traer reporte de espejuelo hoy ---------
    static public function mdlReporteEspejueloHoy($tabla)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_fabricacion = $hoy");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    //-----traer lo embalajes del día de hoy
    static public function mdlEmbalajesHoy($tabla)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_embalaje  = $hoy");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    //-----traer los lotes y las cantidades
    static public function mdlLotesPorEstado($tabla)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT estado, count(estado) AS cantidad FROM $tabla GROUP BY estado ");
            if ($stmt->execute()) {
                return $stmt->fetchAll();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }











    // ----------traer recepciones hoy por usuario---------
    static public function mdlRecepcionesHoyPorUsuario($tabla, $id)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_recepcion = $hoy AND id_usuario = $id");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    } // ----------traer escaldadas hoy por usuario---------
    static public function mdlEscaldadasHoyPorUsuario($tabla, $id)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_escaldado  = $hoy AND id_empleado = $id");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // ----------traer reporte de bocadillo hoy por usuario---------

    static public function mdlReporteBocadilloHoyPorUsuario($tabla, $id)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_fabricacion = $hoy AND id_empleado = $id");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }

    // ----------traer  reporte de arequipe hoy por usuario---------
    static public function mdlReporteArequipeHoyPorUsuario($tabla, $id)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_fabricacion = $hoy AND id_empleado = $id");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // ----------traer reporte de espejuelo hoy por usuario---------
    static public function mdlReporteEspejueloHoyPorUsuario($tabla, $id)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_fabricacion = $hoy AND id_empleado = $id");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    //-----traer lo embalajes del día de hoy por usuario
    static public function mdlEmbalajesHoyPorUsuario($tabla, $id)
    {
        try {
            $hoy = date("Ymd");
            $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha_embalaje  = $hoy AND id_empleado = $id");
            if ($stmt->execute()) {
                return $stmt->fetchColumn();
                $stmt->closeCursor();
                $stmt = null;
            } else {
                echo "\nPDO::errorInfo():\n";
                print_r($stmt->errorInfo());
                $stmt->closeCursor();
                $stmt = null;
            }
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }

}
