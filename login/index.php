<?php

require_once "controllers/plantilla_controller.php";
require_once "controllers/productos_controller.php";
require_once "controllers/user_controller.php";
require_once "models/user_model.php";
require_once "models/productos.modelo.php";
require_once "models/categoria_modelo.php";
require_once "controllers/categoria_controller.php";
require_once "models/facturas_modelo.php";
require_once "controllers/facturas_controller.php";


/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo  */
$plantilla->ctrCargarPlantilla();






