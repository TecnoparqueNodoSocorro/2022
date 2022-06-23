<?php

require_once "controllers/plantilla_controller.php";
require_once "models/cosechas_modelo.php";
require_once "controllers/cosechas_controller.php";


/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();

