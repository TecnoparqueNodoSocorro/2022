<?php

require_once "controllers/plantilla_controller.php";

require_once "controllers/usuarios_controller.php";
require_once "models/usuarios_model.php";


require_once "controllers/lotes_controller.php";
require_once "models/lotes_model.php";

require_once "controllers/escaldado_controller.php";
require_once "models/escaldado_model.php";

require_once "controllers/reportes_controller.php";
require_once "models/reportes_model.php";

require_once "controllers/embalaje_controller.php";
require_once "models/embalaje_model.php";

require_once "controllers/informe_home_controller.php";
require_once "models/informe_home_model.php";
/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






