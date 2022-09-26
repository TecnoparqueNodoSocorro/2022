<?php
require_once('../../controllers/controller_proveedores.php');
require_once('../../models/model_proveedores.php');

class ProveedoresAjax
{
    //crear proveedor ---ADMIN--------------------------------------------
    public function CrearProveedor($data)
    {
        $NewProveedor = ControladorProveedor::CtrNewProveedor($data);
        echo $NewProveedor;
    }
    //seleccionar proveedor----------ADMIN--------------------------------
    public function InfoProveedor($data)
    {
        $SelectProveedor = ControladorProveedor::CtrInfoProveedor($data);
        //$respuesta = array("data" => $SelectProveedor);
        // echo $respuesta;
        $datos = json_encode($SelectProveedor);
        echo ($datos);
    }


    /* modales */

    //------------actualizar vigencia-----ADMIN--------------------------------------------
    public function NewVigenciaProv($data)
    {
        $NewVigencia = ControladorProveedor::CtrNewVigencia($data);
        /*  $RtaNewVigencia = array("data"=> $NewVigencia); 
        echo $RtaNewVigencia;*/
        echo $NewVigencia;
    }

    //---------------cambiar estado---ADMIN------------------------------------------
    public function NewEstadoProv($data)
    {
        $NewEstado = ControladorProveedor::CtrNewEstado($data);
        echo $NewEstado;
    }

    //--------------------editar proveedor-ADMIN---------------------------------------
    public function EditProv($data)
    {
        $Updateprov = ControladorProveedor::CtrUpdateProveedor($data);
        echo $Updateprov;
    }

    //-------------------Cambiar contraseña ADMIN-----------------------------------------
    public function NewPasswProv($data)
    {
        $NewPass = ControladorProveedor::CtrNewPass($data);
        echo $NewPass;
    }

    //--------------------editar proveedor-PROVEEDOR---------------------------------------
    public function edit_prov($data)
    {
        $edit = ControladorProveedor::ctrEditProv($data);
        echo $edit;
    }

    //-------------------Cambiar contraseña desde el rol de proveedor-----------------------------------------
    public function new_pass_prov($data)
    {
        $NewPass = ControladorProveedor::ctrNewPassProv($data);
        echo $NewPass;
    }
}


/* ********************************************************* */
/* ********************************************************* */
//crear proveedorADMIN
if (isset($_POST['datos_proveedor'])) {
    $ajaxproveedor = new ProveedoresAjax();

    $data = $_POST['datos_proveedor'];
    $ajaxproveedor->CrearProveedor($data);
}

//informacion proveedor----ADMIN
if (isset($_POST['info_proveedor'])) {
    $ajaxInfoproveedor = new ProveedoresAjax();
    $data = $_POST['info_proveedor'];
    $ajaxInfoproveedor->InfoProveedor($data);
}



/* ********************************************************* */
//------------actualizar vigencia-----ADMIN--------------------------------------------

if (isset($_POST['data_VigNew'])) {
    $vigencia = new  ProveedoresAjax();
    $data = $_POST['data_VigNew'];
    $vigencia->NewVigenciaProv($data);
}

//---------------cambiar estado---ADMIN------------------------------------------
if (isset($_POST['data_NewEstado'])) {
    $Estado = new ProveedoresAjax();
    $data = $_POST['data_NewEstado'];
    $Estado->NewEstadoProv($data);
}

//--------------------editar proveedor-- ADMIN--------------------------------------
if (isset($_POST['dataEdit'])) {
    $EditProv = new ProveedoresAjax();
    $data = $_POST['dataEdit'];
    $EditProv->EditProv($data);
}

//-------------------Cambiar contraseña ADMIN-----------------------------------------
if (isset($_POST['data_Newpass'])) {
    $passwnew = new ProveedoresAjax();
    $data = $_POST['data_Newpass'];
    $passwnew->NewPasswProv($data);
}

//----------------------editar proveedor-- PROVEEDOR--------------------------------------
if (isset($_POST['data_edit_prov'])) {
    $datos = new ProveedoresAjax();
    $data = $_POST['data_edit_prov'];
    $datos->edit_prov($data);
}

//-------------------Cambiar contraseña desde el rol de proveedor-----------------------------------------
if (isset($_POST['data_cambio_clave_prov'])) {
    $passwnew = new ProveedoresAjax();
    $data = $_POST['data_cambio_clave_prov'];
    $passwnew->new_pass_prov($data);
}
