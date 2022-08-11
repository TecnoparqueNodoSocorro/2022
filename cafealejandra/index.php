
<?php

require_once "controllers/plantilla_controller.php";
require_once "models/conexion.php";


require_once "controllers/cosecha_controller.php";
require_once "models/cosecha_model.php";

require_once "controllers/usuario_controller.php";
require_once "models/usuario_model.php";

require_once "controllers/pagos_controller.php";
require_once "models/pagos_model.php";


require_once "models/conexion.php";


/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();

