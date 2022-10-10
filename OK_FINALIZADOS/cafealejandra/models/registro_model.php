<?php

require_once "conexion.php";

class ModelRegistro
{

    //REGISTRAR KILOS RECOGIDOS POR RECOLECTOR
    static public function mldRegistroTrabajo($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_cosecha, id_empleado, id_cargo, fecha_registro, kilos) VALUES( :cosecha, :empleado, :cargo, :fecha, :kilos) ");
        $stmt->bindParam(":empleado", $data["id_recolector"]);
        $stmt->bindParam(":cargo",  $data["id_cargo"]);
        $stmt->bindParam(":cosecha",  $data["id_cosecha"]);
        $stmt->bindParam(":kilos",  $data["kilos_recogidos"]);
        $stmt->bindParam(":fecha",  $data["fecha"]);


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
