<?php
require_once "controllers/controller_plantilla.php";

require_once "models/model_usuarios.php";
require_once "controllers/controller_usuarios.php";


require_once "models/model_articulos.php";
require_once "controllers/controller_articulos.php";

/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo */
$plantilla->ctrCargarPlantilla();
/* 
require_once "models/model_.php";
require_once "controllers/controller_.php";
 */