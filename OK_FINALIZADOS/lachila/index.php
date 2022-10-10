<?php

require_once "controllers/plantilla_controller.php";

require_once "models/usuarios_model.php";
require_once "controllers/usuarios_controller.php";

require_once "models/lotes_model.php";
require_once "controllers/lotes_controller.php";

require_once "models/variables_model.php";
require_once "controllers/variables_controller.php";

require_once "models/materias_model.php";
require_once "controllers/materias_controller.php";

require_once "models/envases_model.php";
require_once "controllers/envases_controller.php";
/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






