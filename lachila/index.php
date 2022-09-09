<?php

require_once "controllers/plantilla_controller.php";

require_once "models/usuarios_model.php";
require_once "controllers/usuarios_controller.php";

require_once "models/lotes_model.php";
require_once "controllers/lotes_controller.php";

require_once "models/variables_model.php";
require_once "controllers/variables_controller.php";

/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






