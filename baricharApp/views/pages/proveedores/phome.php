<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        if (isset($_SESSION["id_cargo"])) {
            if ($_SESSION["id_cargo"] != "1") {
                echo '<script>window.location="admin.php?page=error_credenciales"</script>';
            }
        }
    } else {
        echo '<script>window.location="index.php?page=login" </script>';
    }
} else {
    echo '<script>window.location="index.php?page=login" </script>';
}

if (isset($_SESSION["id"])) {
    $userid = $_SESSION["id"];
}
?>
<div class="title_container">

    <div class="home_bottomS">

        <div class="container-fluid" id="tablas">
            <br>

            <div class="container">

                <h4>DATOS DEL PROVEEDOR</h4>
                <?php
                $prov = ControladorProveedor::CtrInfoProveedorHome($userid);
                //  print_r($prov);

                ?>

                <div class="row" style="margin-bottom:250px ;">
                    <div class="col-12 col-md-12" id="imagen_prov">
                        <div class="container">
                            <img id="imgproveedor" class="img-thumbnail" src="views/views/<?php echo $prov->logo ?>">
                        </div>
                    </div>



                    <div class="row" id="proveedor">
                        <div class="prov_item col-6 col-md-4 ">
                            <label> <strong>Empresa:</strong></br> <?php echo $prov->nombre ?></label>
                        </div>
                        <div class="prov_item col-6 col-md-4">
                            <label> <strong>Nit:</strong></br><?php echo $prov->nit ?></label>
                        </div>
                        <div class="prov_item col-6  col-md-4">
                            <label> <strong>Rep legal:</strong></br> <?php echo $prov->nombre ?></label>
                        </div>
                        <div class="prov_item col-6  col-md-4">
                            <label> <strong>Telefono:</strong></br> <?php echo $prov->telefono ?></label>
                        </div>

                        <div class="prov_item col-6  col-md-4">
                            <label> <strong>Email:</strong></br> <?php echo $prov->correo ?></label>
                        </div>
                        <div class="prov_item col-6  col-md-4">
                            <label> <strong>Licencia de uso hasta:</strong></br> <?php echo $prov->vigencia ?></label>
                        </div>
                        <div class="prov_item col-12  col-md-4">
                            <label> <strong>Direccion:</strong></br> <?php echo $prov->direccion ?></label>
                        </div>
                        <!--          <div class="prov_item col-6  col-md-4">
                                <label> <strong>Direccion:</strong></br> <?php echo $prov->nombre ?></label>
                            </div> -->

                        <div class="prov_item col-12  col-md-8">
                            <label> <strong>Descripcion:</strong></br> <?php echo $prov->descripcion ?></label>
                        </div>



                        <div class="row ">
                            <div class="prov_item col-6">

                                <button type="button" data-id="<?php echo $prov->id ?>" class="btnEditProv btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal_cambio_clave">
                                    Cambiar clave
                                </button>

                            </div>
                            <div class="prov_item col-6">
                              <!--   <button type="button" data-id="<?php echo $prov->id ?>" class="btnEditProv btn btn-success px-auto" data-bs-toggle="modal" data-bs-target="#modal_cambio_clave">
                                    Cambiar clave
                                </button> -->

                                <button type="button" data-dir="<?php echo $prov->direccion ?>" data-desc="<?php echo $prov->descripcion ?>" data-id="<?php echo $prov->id ?>" data-tel="<?php echo $prov->telefono ?>" data-email="<?php echo $prov->correo ?>" class="btnEditProv btn-sm btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Editar información
                                </button>
                            </div>

                        </div>


                    </div>
                </div>

            </div>





            <!-- 
                            <div class="table-responsive" id="proveedores">

                            </div> -->
        </div>

    </div>
</div>
<div class="slider_container">

    <div id="random">
        <div style="background-image: url(views/images/slider/slide14.jpg);">

        </div>

    </div>
</div>
<!-- //----------MODAL EDITAR PROVEEDOR -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form id="modal_prov_edit" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title clear" id="exampleModalLabel">Editar datos de la empresa</h5>

                </div>
                <div class="modal-body">


                    <div class="container">
                        <p class="clear"><strong>Datos de la empresa</strong></p>

                        <div class="row">

                            <div class="col-12  col-md-4">
                                <label>Direccion</label>
                                <input type="text" class="form_input form_provee_edit" name="emp_direccion" id="emp_direccion" />
                            </div>

                            <input type="hidden" name="id_prov_oculto" id="id_prov_oculto">
                            <div class="col-12  col-md-4">
                                <label>Telefono</label>
                                <input type="number" class="form_input form_provee_edit" name="emp_telefono" id="emp_telefono" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Email</label>
                                <input type="mail" class="form_input form_provee_edit" name="emp_email" id="emp_email" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label>Logo <Small>(Reemplazar)</Small></label>
                                <input type="file" class="form_input " name="emp_logo" id="emp_logo" />
                            </div>
                            <div class="col-12">
                                <label>Breve descripcion de la empresa</label>
                                <textarea class="form_textarea_full form_provee_edit" name="emp_descr" id="emp_descr"></textarea>
                            </div>
                            <br>

                            <!--       <div class="row">
                                <p class="clear"><strong>Cambiar Contraseña</strong></p>
                                <hr>
                                <div class="col-12  col-md-4">
                                    <label>Contraseña actual</label>
                                    <input type="text" class="form_input" name="emp_user" id="emp_user" />
                                </div>
                                <div class="col-12  col-md-4">
                                    <label>Contraseña Nueva</label>
                                    <input type="password" class="form_input" name="emp_pass_1" id="emp_pass_1" />
                                </div>
                                <div class="col-12  col-md-4">
                                    <label>Confirmar contraseña</label>
                                    <input type="password" class="form_input" name="emp_pass_2" id="emp_pass_2" />
                                </div>
                               
                            </div> -->

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnGuardarEditProv"> Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- MODAL CAMBIAR CLAVE PROVEEDOR -->

<div class="modal fade" id="modal_cambio_clave" tabindex="-1" aria-labelledby="clave_cambio" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title clear" id="exampleModalLabel">Editar datos de la empresa</h5>

            </div>
            <div class="modal-body">


                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <div class="row">
                            <div class="row">
                                <p class="clear"><strong>Cambiar Contraseña</strong></p>
                                <hr>
                                <div class="col-12  col-md-4">
                                    <label>Contraseña actual</label>
                                    <input type="password" class="form_input" name="emp_user" id="emp_pss_0" />
                                </div>
                                <div class="col-12  col-md-4">
                                    <label>Contraseña Nueva</label>
                                    <input type="password" class="form_input" name="emp_pass_1" id="emp_pass_1" />
                                </div>
                                <div class="col-12  col-md-4">
                                    <label>Confirmar contraseña</label>
                                    <input type="password" class="form_input" name="emp_pass_2" id="emp_pass_2" />
                                </div>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnEditClaveProv"> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!-- <div class="modal-footer">
    <h1>hola</h1>
</div> -->