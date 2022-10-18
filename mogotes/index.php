<?php

require_once "controllers/plantilla_controller.php";

require_once "controllers/usuarios_controller.php";
require_once "models/usuarios_model.php";
/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






