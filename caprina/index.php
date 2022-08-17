<?php

require_once "controllers/plantilla_controller.php";
require_once "controllers/caprinocultor_controller.php";
require_once "controllers/caprino_controller.php";
require_once "controllers/produccion_controller.php";
require_once "controllers/caprino_control_controller.php";

require_once "models/caprinocultor_model.php";
require_once "models/caprino_model.php";
require_once "models/produccion_model.php";
require_once "models/caprino_control_model.php";


require_once "models/conexion.php";


/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






