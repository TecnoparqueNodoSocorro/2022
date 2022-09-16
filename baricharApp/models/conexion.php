
<?php
class conexion
{
    static public function conectar()
    {
        /* parametros PDO-  "nombre_servidor; nombrebd", "usuario", "contraseña" */

        try {
            $link = new PDO("mysql:host=localhost;dbname=baricharapp", "root", "");
            $link->exec("set names utf8");
            return $link;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

/* try {
    # Conexión a MySQL
    $cn = new PDO("mysql:host=localhost;dbname=prueba", "usuario", "password");
  }
  catch(PDOException $e) {
      echo $e->getMessage();
  } */