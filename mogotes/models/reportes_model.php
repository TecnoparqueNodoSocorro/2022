<?php

require_once "conexion.php";

class ModelReportes
{

    // ----------REGISTRAR REPORTE DE BOCADILLO-----------
    static public function mdlPostReporteBocadillo($tabla, $data)
    {
        try {

            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=3 WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"]);
            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }
            $fecha_actual = date("Ymd");
            //sumo 1 mes
            $fecha_vencimiento= date("Ymd", strtotime($fecha_actual . "+ 4 month"));
           
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado, 
            recortes, botes_marmitas, azucar, devolucion_tablas,
            botes_pailas, brix, tabla_extrafino, tabla_bocadillos, tabla_lonja, tabla_manzana, fecha_vencimiento ) 
            VALUES(:lote, :usuario, :azucar, :recortes, :devolucion, :botes_marmitas,
             :botes_pailas, :brix, :tabla_extrafino, :tabla_bocadillos, :tabla_lonja, :tabla_manzana, $fecha_vencimiento) ");
            $stmt->bindParam(":lote", $data["codigo_lote"]);
            $stmt->bindParam(":usuario",  $data["id_usuario"]);
            $stmt->bindParam(":azucar",  $data["azucar"]);
            $stmt->bindParam(":recortes",  $data["recortes"]);
            $stmt->bindParam(":devolucion", $data["devolucion"]);
            $stmt->bindParam(":botes_marmitas", $data["botes_marmitas"]);
            $stmt->bindParam(":botes_pailas", $data["botes_pailas"]);
            $stmt->bindParam(":brix",  $data["brix"]);
            $stmt->bindParam(":tabla_extrafino",  $data["tabla_extrafino"]);
            $stmt->bindParam(":tabla_bocadillos",  $data["tabla_bocadillos"]);
            $stmt->bindParam(":tabla_lonja", $data["tabla_lonja"]);
            $stmt->bindParam(":tabla_manzana", $data["tabla_manzana"]);

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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // ----------REGISTRAR REPORTE DE AREQUIPE-----------
    static public function mdlPostReporteArequipe($tabla, $data)
    {
        try {

            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=3 WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"]);
            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }
            $fecha_actual = date("Ymd");
            //sumo 1 mes
            $fecha_vencimientoAre= date("Ymd", strtotime($fecha_actual . "+ 3 month"));
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado,leche, azucar, botes_marmitas, botes_pailas,tabla_extrafino, tabla_bocadillo, fecha_vencimiento) 
            VALUES(:lote, :usuario,:leche,:azucar, :bmarmitas,:bpailas, :textrafino, :tbocadillo,  $fecha_vencimientoAre) ");
            $stmt->bindParam(":lote", $data["codigo_lote"]);
            $stmt->bindParam(":usuario",  $data["id_usuario"]);
            $stmt->bindParam(":leche",  $data["leche"]);
            $stmt->bindParam(":azucar",  $data["azucar"]);
            $stmt->bindParam(":bmarmitas", $data["botes_marmitas"]);
            $stmt->bindParam(":bpailas", $data["botes_pailas"]);
            $stmt->bindParam(":textrafino", $data["tabla_extrafino"]);
            $stmt->bindParam(":tbocadillo", $data["tabla_bocadillos"]);

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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // ----------REGISTRAR REPORTE DE ESPEJUELLO-----------
    static public function mdlPostReporteEspejuelo($tabla, $data)
    {
        try {

            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=3 WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"]);
            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }
            $fecha_actual = date("Ymd");
            //sumo 1 mes
            $fecha_vencimientoEsp= date("Ymd", strtotime($fecha_actual . "+ 10 month"));
            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado, 
            azucar, aceite_oliva, pectina, botes_marmitas,botes_pailas, brix, redonda, tabla_metalica, fecha_vencimiento) 
            VALUES(:lote, :usuario, :azucar, :aceite_oliva, :pectina, :bmarmitas,
             :bpailas, :brix, :redonda, :tmetalicas,  $fecha_vencimientoEsp) ");
            $stmt->bindParam(":lote", $data["codigo_lote"]);
            $stmt->bindParam(":usuario",  $data["id_usuario"]);
            $stmt->bindParam(":azucar",  $data["azucar"]);
            $stmt->bindParam(":bmarmitas",  $data["botes_marmitas"]);
            $stmt->bindParam(":bpailas", $data["botes_pailas"]);
            $stmt->bindParam(":brix", $data["brix"]);
            $stmt->bindParam(":tmetalicas", $data["tabla_metalica"]);
            $stmt->bindParam(":redonda",  $data["redonda"]);
            $stmt->bindParam(":aceite_oliva",  $data["aceite_oliva"]);
            $stmt->bindParam(":pectina",  $data["pectina"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // --------- TRAER REPORTES DE LOTES DE BOCADILLO POR CODIGO-----------
    static public function mdlGetInfoByCodigo($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_lote = :lote");
            $stmt->bindParam(":lote", $data["codigo"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }


    // --------- TRAER REPORTES DE LOTES DE BOCADILLO POR CODIGO-----------
    static public function mdlGetRegistroById($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $data["id"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // --------- TRAER REPORTES DE LOTES DE ESPEJUELO POR CODIGO-----------
    static public function mdlGetInfoByCodigoEsp($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_lote = :lote");
            $stmt->bindParam(":lote", $data["codigo"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }


    // --------- TRAER REPORTES DE LOTES DE ESPEJUELO POR CODIGO-----------
    static public function mdlGetRegistroByIdEsp($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $data["id"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
    // --------- TRAER REPORTES DE LOTES DE AREQUIPE POR CODIGO-----------
    static public function mdlGetInfoByCodigoAre($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_lote = :lote");
            $stmt->bindParam(":lote", $data["codigo"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }


    // --------- TRAER REPORTES DE LOTES DE AREQUIPE POR CODIGO-----------
    static public function mdlGetRegistroByIdAre($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $data["id"]);
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
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!" . $e);
        }
    }
}
