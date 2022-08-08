<?php
class ControladorPlantilla
{
    /* llamar  la plantilla */
    public function ctrCargarPlantilla()
    {
        /* include se usa par ainvocar el archivo que contiene el codigo */
        include "views/template.php";
    }

    public function ctrCargarPlantillaAdmin()
    {
        /* include se usa par ainvocar el archivo que contiene el codigo */
        include "views/template_admin.php";
    }

    public function ctrCargarPlantillaproveedor()
    {
        /* include se usa par ainvocar el archivo que contiene el codigo */
        include "views/template_proveedor.php";
    }
}
