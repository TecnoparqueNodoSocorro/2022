<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        if (isset($_SESSION["id_cargo"])) {
            if ($_SESSION["id_cargo"] != "2") {
                echo '<script>window.location="admin.php?page=error_credenciales"</script>';
            }
        }
    } else {
        echo '<script>window.location="index.php?page=login" </script>';
    }
} else {
    echo '<script>window.location="index.php?page=login" </script>';
}
?>
<div class="title_container">

    <div class="home_bottomS">

        <div class="container-fluid" id="tablas">



            <div class="container">
                <!-- aqui imagen representativa  -->
                <h4 style="padding: 0px;">Gestion de Proveedores BaricharApp</h4>
                <div class="row">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_proveedores">
                        Agregar nuevo proveedor
                    </button>
                </div>
            </div>

            <?php
            $proveedores = ControladorProveedor::CtrSelectAllProveedor();
            /*   print_r($proveedores); */
            ?>
            <div class="table-responsive" id="proveedores">
                <table class="table caption-top table-bordered table-sm" style="min-height:450px; margin-bottom: 350px">

                    <thead>
                        <tr>
                            <th>Menú</th>
                            <th>logo</th>
                            <th>Nombre</th>
                            <th>Vigencia</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($proveedores as $key => $value) : ?>
                            <tr>
                                <td>
                                    <button type="button" data-id="<?php echo $value["id"] ?>" class="boton btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-plus-circle-fill"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-id_update="<?php echo $value["id"] ?>" href="#" onclick="p_actualizar()"><i class=" bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" data-id_estado="<?php echo $value["id"] ?>" href="#" onclick=" p_bloq_desbloq()"><i class=" bi bi-lock-fill"> Bloq/Desbl</i></a></li>
                                        <li><a class="dropdown-item" data-id_editar="<?php echo $value["id"] ?>" href="#" onclick="p_editar()"><i class=" bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" data-id_ver="<?php echo $value["id"] ?>" href="#" onclick="p_passw()"><i class=" bi bi-search"> Password</i></a></li>
                                    </ul>
                                </td>
                                <td><img src="views/views/<?php echo $value["logo"] ?>" class="img-thumbnail" alt="..."> </td>
                                <td> <?php echo $value["nombre"] ?> </td>
                                <td> <?php echo $value["vigencia"] ?> </td>
                                <td class="fw-bold <?php echo $value["estado"] == "1" ? 'text-primary' : 'text-danger' ?>"> <?php echo $value["estado"] == "1" ? 'Activo' : 'Inactivo' ?> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <br><br><br>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="slider_container">
    <div class="slider_trans_black"></div>
    <div id="random">
        <div style="background-image: url(views/images/slider/slide14.jpg);"></div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="modal_proveedores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="padding: 0;">Agregar nuevo proveedor</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="ContactForm" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-sm-6  col-lg-4">
                                <label>Nombre del provedor</label>
                                <input type="text" class="form_input form_agregar_pro " name="nombre" id="nombre" />
                            </div>
                            <div class="col-sm-6  col-lg-4">
                                <label>Nit</label>
                                <input type="textr" class="form_input form_agregar_pro " name="nit" id="nit" />
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <label>Direccion</label>
                                <input type="text" class="form_input form_agregar_pro " name="direccion" id="direccion" />
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <label>Telefono</label>
                                <input type="number" class="form_input form_agregar_pro" name="telefono" id="telefono" />
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <label>Email</label>
                                <input type="mail" class="form_input form_agregar_pro " name="email" id="email" />
                            </div>
                            <div class="col-sm-6  col-lg-4">
                                <label>Max productos publicados </label>
                                <input type="number" class="form_input form_agregar_pro " name="max_p" id="max_p" />
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label>Logo (Peso máximo 500kb)</label>
                                <input type="file" class="form_input form_agregar_logo " name="logo" id="logo" />
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label>Vigencia de servicio</label>
                                <input type="date" class="form_input form_agregar_pro " name="vigencia" id="vigencia" />
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <label>Usuario</label>
                                <input type="text" class="form_input form_agregar_pro" name="user" id="user" />
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <label>Contraseña</label>
                                <input type="password" class="form_input form_agregar_pro" name="pass_1" id="pass_1" />
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <label>Repetir contraseña</label>
                                <input type="password" class="form_input form_agregar_pro" name="pass_2" id="pass_2" />
                            </div>
                            <div class="col-12">
                                <label>Breve descripcion de la empresa</label>
                                <textarea class="form_textarea_full form_agregar_pro" name="descr_prov" id="descr_prov"></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success" id="admin_btn_guardar"> Guardar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_cerrar_new_prov">Cerrar</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>

    </div>
</div>

<div class="modal fade" id="modal_actualizar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTituloVigencia"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- <p id="m_actualizar"></p> -->
                    <!-- <h3> <strong>Joyeria la esmeralda</strong> </h3> -->
                    <strong><span>Vigencia actual</span>
                        <span class="text-primary" id="vigenciactual"></span></strong>
                    <hr>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nueva Vigencia</span>
                        <input type="date" class="form-control" id="vigencianueva" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_guardar_vig"> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_cerrar_new_vig">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="modal_bloq_desb" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModalEstado"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">


                <input id="estadoactual" type="hidden"></input>
                <span>Estado actual del proveedor: </span>
                <span id="m_bloquear_desb"></span>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success mx-1 my-1" id="btn_guardar_bloq_desb"></button>
                <button type="button" class="btn btn-danger mx-1 my-1" data-bs-dismiss="modal" id="btn_cerrar_new_state">Cerrar</button>
            </div>


        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="modal_editar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit_ContactForm" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="container">
                        <br>
                        <div class="row">
                            <!--    <p id="m_editar"></p> -->
                            <!-- id oculto del proveedor -->
                            <input type="hidden" name="id_proveedor_oculto" id="id_proveedor_oculto">
                            <div class="col-sm-6  col-md-4">
                                <label>Nombre del provedor</label>
                                <input type="text" class="form_input form_editar_pro" name="edit_nombre" id="edit_nombre" />
                            </div>
                            <div class="col-sm-6  col-md-4">
                                <label>Nit</label>
                                <input type="textr" class="form_input form_editar_pro" name="edit_nit" id="edit_nit" />
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Direccion</label>
                                <input type="text" class="form_input form_editar_pro" name="edit_direccion" id="edit_direccion" />
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Telefono</label>
                                <input type="number" class="form_input form_editar_pro" name="edit_telefono" id="edit_telefono" />
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label>Email</label>
                                <input type="mail" class="form_input form_editar_pro" name="edit_email" id="edit_email" />
                            </div>
                            <div class="col-sm-6  col-md-4">
                                <label>Max productos publicados </label>
                                <input type="number" class="form_input form_editar_pro" name="edit_max_p" id="edit_max_p" />
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label>Logo</label>
                                <input type="file" class="form_input" name="edit_logo" id="edit_logo" />
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label>Vigencia de servicio</label>
                                <input type="date" class="form_input form_editar_pro" name="edit_vigencia" id="edit_vigencia" />
                            </div>
                            <div class="col-sm-12 col-md-12 ">
                                <label>Usuario</label>
                                <input type="text" class="form_input form_editar_pro" name="edit_user" id="edit_user" />
                            </div>

                            <div class="col-12">
                                <label>Breve descripcion de la empresa</label>
                                <textarea class="form_textarea_full form_editar_pro" name="edit_descr_prov" id="edit_descr_prov"></textarea>
                            </div>
                        </div>

                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btn_guardar_editar"> Guardar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_cerrar_edit">Cerrar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="modal_passw" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ver datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--  <p id="m_passw"></p> -->
                <span><strong> Ingrese la nueva contraseña</strong></span>
                <div class="col-sm-12 col-md-12 mt-2">
                    <label>Contraseña</label>
                    <input type="password" class="form_input" name="edt_pass1" id="edt_pass1" />
                </div>
                <div class="col-sm-12 col-md-12">
                    <label>Repetir contraseña</label>
                    <input type="password" class="form_input" name="edt_pass2" id="edt_pass2" />
                </div>
                <br>

            </div>
            <div class="modal-footer"> <button type="button" class="btn btn-success" id="btn_g_passw"> Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_cerrar_edit_pass">Cerrar</button>
            </div>
        </div>

    </div>
</div>