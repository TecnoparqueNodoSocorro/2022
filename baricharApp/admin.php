<?php
require_once "controllers/controller_plantilla.php";
/*  */
require_once "models/model_pagina.php";
require_once "controllers/controller_pagina.php";

require_once "models/model_productos.php";
require_once "controllers/controller_productos.php";

require_once "models/model_proveedores.php";
require_once "controllers/controller_proveedores.php";

require_once "models/model_user.php";
require_once "controllers/controller_user.php";

/* creamos un objeto */
$plantilla = new ControladorPlantilla();
/* llamamos el metodo */
$plantilla->ctrCargarPlantillaAdmin();
