<?php

require_once "conexion.php";

class modelUsuarios{
/* consultar usuarios */

static public function mdlloginusuario($tabla, $item, $valor)
{

  $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$valor");
  $stmt->bindParam(":".$valor, $valor, PDO::PARAM_STR); 
  $stmt->execute();
  return  $stmt->fetch();
  
  $stmt = null;
}




}