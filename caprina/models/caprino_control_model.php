<?php

require_once "conexion.php";

class ModelCaprinoControl
{

    //----------REGISTRAR CONTROL A CAPRINO------------------
    static public function mdlRegistroCaprinoControl($tabla, $data)
    {
        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario, codigo_caprino, peso, condicion_corporal,  enfermedad_respiratoria, enfermedad_gastrointestinal, enfermedad_mordedura) VALUES( :id_usuario, :codigo_caprino, :peso, :condicion, :er, :eg, :em) ");
        $stmt->bindParam(":id_usuario", $data["usuario"]);
        $stmt->bindParam(":codigo_caprino",  $data["caprino"]);
        $stmt->bindParam(":peso",  $data["peso"]);
        $stmt->bindParam(":condicion",  $data["condicion"]);
        $stmt->bindParam(":er",  $data["enfermedad_respiratoria"], PDO::PARAM_STR);
        $stmt->bindParam(":eg",  $data["enfermedad_gastrointestinal"], PDO::PARAM_STR);
        $stmt->bindParam(":em",  $data["enfermedad_mordeduras"], PDO::PARAM_STR);

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
    //----------CONSULTAR PARA LISTRAR CAPRINOS------------------
    static public function mdlConsultarCaprino($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT id, raza, origen, fecha_nacimiento FROM $tabla ");
        $stmt->execute();
        return $stmt->fetchAll();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    //----------CONSULTAR LA CANTIDAD DE CONTROLES PARA EL ESTADO CAPRINO-----------------
    static public function mdlCantidadDeControles($tabla)
    {
        $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla");
        $stmt->execute();
        return $stmt->fetchColumn();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }

    //----------CONSULTAR LA CANTIDAD DE CONTROLES DEL DIA DE PRESENTE PARA EL ESTADO CAPRINO-----------------
    static public function mdlCantidadDeControlesHoy($tabla)
    {
        //VARIABLE HOY PARA CALCULAR ELDÍA ACTUAL Y PODER EJECUTAR LA CONSULTA
        $hoy = date("Ymd");

        $stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE fecha = $hoy ");
        $stmt->execute();
        return $stmt->fetchColumn();
        /*  $stmt->closeCursor();
        $stmt = null; */
    }
}
