
<?php
require_once "models/conexion.php";
require_once "controllers/plantilla_controller.php";

require_once "controllers/cosecha_controller.php";
require_once "models/cosecha_model.php";
require_once "controllers/usuario_controller.php";
require_once "models/usuario_model.php";
require_once "controllers/pagos_controller.php";
require_once "models/pagos_model.php";

require_once "controllers/reporte_controller.php";
require_once "models/reporte_model.php";

require_once "controllers/dias_no_asistidos_controller.php";
require_once "models/dias_no_asistidos_model.php";


require_once "controllers/registro_controller.php";
require_once "models/registro_model.php";

/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();

