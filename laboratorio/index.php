<?php

require_once "controllers/plantilla_controller.php";

require_once "controllers/usuarios_controller.php";
require_once "models/usuarios_model.php";

require_once "controllers/clientes_controller.php";
require_once "models/clientes_model.php";

require_once "controllers/ubicaciones_controller.php";
require_once "models/ubicaciones_model.php";

require_once "controllers/equipos_controller.php";
require_once "models/equipos_model.php";
/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






