
<?php
class conexion{
    static public function conectar(){
        /* parametros PDO-  "nombre_servidor; nombrebd", "usuario", "contraseña" */
        $link= new PDO("mysql:host=localhost;dbname=gestion_caprina", "root", "");
        $link-> exec("set names utf8");
        return $link;
    }
}