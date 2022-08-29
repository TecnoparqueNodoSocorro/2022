<?php
require_once('../../controllers/controller_pagina.php');
require_once('../../models/model_pagina.php');

class CreateArticuloAjax{

public function CrearArticulo ($data)
{
$NewArticulo= Controladorpagina::CtrNewArticulo($data);
echo $NewArticulo;
}

}


/* ------------------------------------------------------------------------------- */



if(isset($_POST['pag_datosarticulo'])){
$ajaxarticulo=new CreateArticuloAjax();
$data= $_POST['pag_datosarticulo'];
$ajaxarticulo->CrearArticulo($data);
}