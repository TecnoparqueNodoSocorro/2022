<?php

require_once "conexion.php";

class ModelReportes
{

    // ----------REGISTRAR REPORTE DE BOCADILLO-----------
    static public function mdlPostReporteBocadillo($tabla, $data)
    {
        try {
            $fecha_actual = date("Ymd");
            //sumo 1 mes
            $fecha_vencimiento = date("Ymd", strtotime($fecha_actual . "+ 5 month"));
            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=3, fecha_fabricacion = $fecha_actual, fecha_vencimiento =  $fecha_vencimiento WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"]);
            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }

            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado, 
            recortes, botes_marmitas, azucar,
            botes_pailas, brix, tabla_extrafino, tabla_bocadillos, tabla_lonja, tabla_manzana,
            dev_tabla_extrafino, dev_tabla_bocadillos, dev_tabla_lonja, dev_tabla_manzana,
            adic_tabla_extrafino, adic_tabla_bocadillos, adic_tabla_lonja, adic_tabla_manzana, codigo_lote_adicion ) 
            VALUES(:lote, :usuario, :azucar, :recortes,  :botes_marmitas,
             :botes_pailas, :brix, :tabla_extrafino, :tabla_bocadillos, :tabla_lonja, :tabla_manzana, 
             :dev_tabla_extrafino, :dev_tabla_bocadillos, :dev_tabla_lonja, :dev_tabla_manzana, 
             :adic_tabla_extrafino, :adic_tabla_bocadillos, :adic_tabla_lonja, :adic_tabla_manzana, :codigo_lote_adicion) ");
            $stmt->bindParam(":lote", $data["codigo_lote"]);
            $stmt->bindParam(":usuario",  $data["id_usuario"]);
            $stmt->bindParam(":azucar",  $data["azucar"]);
            $stmt->bindParam(":recortes",  $data["recortes"]);
            $stmt->bindParam(":botes_marmitas", $data["botes_marmitas"]);
            $stmt->bindParam(":botes_pailas", $data["botes_pailas"]);
            $stmt->bindParam(":brix",  $data["brix"]);
            $stmt->bindParam(":tabla_extrafino",  $data["tabla_extrafino"]);
            $stmt->bindParam(":tabla_bocadillos",  $data["tabla_bocadillos"]);
            $stmt->bindParam(":tabla_lonja", $data["tabla_lonja"]);
            $stmt->bindParam(":tabla_manzana", $data["tabla_manzana"]);

            $stmt->bindParam(":dev_tabla_extrafino",  $data["dev_tabla_extrafino"]);
            $stmt->bindParam(":dev_tabla_bocadillos",  $data["dev_tabla_bocadillos"]);
            $stmt->bindParam(":dev_tabla_lonja", $data["dev_tabla_lonja"]);
            $stmt->bindParam(":dev_tabla_manzana", $data["dev_tabla_manzana"]);

            $stmt->bindParam(":adic_tabla_extrafino",  $data["adic_tabla_extrafino"]);
            $stmt->bindParam(":adic_tabla_bocadillos",  $data["adic_tabla_bocadillos"]);
            $stmt->bindParam(":adic_tabla_lonja", $data["adic_tabla_lonja"]);
            $stmt->bindParam(":adic_tabla_manzana", $data["adic_tabla_manzana"]);

            $stmt->bindParam(":codigo_lote_adicion", $data["codigo_lote_adicion"]);


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
            $fecha_actualAre = date("Ymd");
            //sumo 1 mes
            $fecha_vencimientoAre = date("Ymd", strtotime($fecha_actualAre . "+ 4 month"));
            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=3, fecha_fabricacion = $fecha_actualAre, fecha_vencimiento =  $fecha_vencimientoAre WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"]);
            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }

            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado,leche, azucar, botes_marmitas, botes_pailas,tabla_extrafino, tabla_bocadillo) 
            VALUES(:lote, :usuario,:leche,:azucar, :bmarmitas,:bpailas, :textrafino, :tbocadillo) ");
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
            $fecha_actualEsp = date("Ymd");
            //sumo 1 mes
            $fecha_vencimientoEsp = date("Ymd", strtotime($fecha_actualEsp . "+ 11 month"));
            $sql = conexion::conectar()->prepare("UPDATE lote SET estado=3, fecha_fabricacion = $fecha_actualEsp, fecha_vencimiento =  $fecha_vencimientoEsp   WHERE codigo=:lote ");
            $sql->bindParam(":lote", $data["codigo_lote"]);
            if ($sql->execute()) {
                echo "ok";
                $sql->closeCursor();
                $sql = null;
            }

            $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (codigo_lote, id_empleado, 
            azucar, aceite_oliva, pectina, botes_marmitas,botes_pailas, brix, redonda, tabla_metalica) 
            VALUES(:lote, :usuario, :azucar, :aceite_oliva, :pectina, :bmarmitas,
             :bpailas, :brix, :redonda, :tmetalicas) ");
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
            $stmt = conexion::conectar()->prepare("SELECT *, usuarios.id AS 'idEmpl',$tabla.id AS 'idL' FROM $tabla 
            
            INNER JOIN usuarios ON $tabla.id_empleado = usuarios.id WHERE $tabla.codigo_lote = :lote");
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


    // --------- TRAER REPORTES DE LOTES DE BOCADILLO POR ID-----------
    static public function mdlGetRegistroById($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT *, usuarios.id AS 'idEmpl',$tabla.id AS 'idL' FROM $tabla
            INNER JOIN usuarios ON $tabla.id_empleado = usuarios.id
             WHERE $tabla.id = :id");
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
            $stmt = conexion::conectar()->prepare("SELECT *, usuarios.id AS 'idEmpl', $tabla.id AS 'idL' FROM $tabla
            INNER JOIN usuarios ON $tabla.id_empleado = usuarios.id
             WHERE $tabla.codigo_lote = :lote");
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


    // --------- TRAER REPORTES DE LOTES DE ESPEJUELO POR ID-----------
    static public function mdlGetRegistroByIdEsp($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT *, usuarios.id AS 'idEmpl', $tabla.id AS 'idL' FROM $tabla 
            INNER JOIN usuarios ON $tabla.id_empleado = usuarios.id
            WHERE $tabla.id = :id");
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
            $stmt = conexion::conectar()->prepare("SELECT *, usuarios.id AS 'idEmpl', $tabla.id AS 'idL' FROM $tabla
            INNER JOIN usuarios ON $tabla.id_empleado = usuarios.id
             WHERE $tabla.codigo_lote = :lote");
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


    // --------- TRAER REPORTES DE LOTES DE AREQUIPE POR ID-----------
    static public function mdlGetRegistroByIdAre($tabla, $data)
    {
        try {
            $stmt = conexion::conectar()->prepare("SELECT *, usuarios.id AS 'idEmpl', $tabla.id AS 'idL' FROM $tabla
            INNER JOIN usuarios ON $tabla.id_empleado = usuarios.id
           WHERE $tabla.id = :id");
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
