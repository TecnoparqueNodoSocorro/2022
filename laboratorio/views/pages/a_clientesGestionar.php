<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}



?>

<div class="container" style="text-align: center;">
    <h3 class="text-titulo">Gestionar clientes</h3>

    <div class="table-responsive mt-3 mb-5">
        <table class="table table-primary table-sm">
            <?php
            $clientes = ControladorClientes::ctrGetClientes();

            ?>
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>#Nit</th>
                    <th>Logo</th>

                    <th>Email</th>
                    <th>Teléfono</th>


                    <!-- <th>Cargo</th> -->


                </tr>
            </thead>
            <tbody id="tbodyListarEmpleados">

                <?php foreach ($clientes as $key => $value) : ?>
                    <tr>
                        <td>
                            <!-- <button type="button" class="ExtraerId btn btn-sm  <?php echo $value["estado"] == 1 ? 'btn-primary' : 'btn-danger' ?>" id="traerid" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>"> <?php echo $value["estado"] == 1  ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-check-lg"></i>' ?></button>

                            <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" class="editPass btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-key"></i>
                            </button> -->
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="ExtIdCliente btn btn-sm  <?php echo $value["estado"] == 1 ? 'btn-primary' : 'btn-danger' ?>" id="traeridC" data-nombre="<?php echo $value["nombre"] ?>" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>"> <?php echo $value["estado"] == 1  ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-check-lg"></i>' ?></button>

                                <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="extIdClient_edit btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editar_cliente_modal"><i class="bi bi-pencil-fill"></i></button>

                                <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editPassClient btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_pass_client">
                                    <i class="bi bi-key"></i></button>


                            </div>
                        </td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td><?php echo $value["nombre"] ?></td>
                        <td><?php echo $value["nit"] ?></td>
                        <td><img src="views/views/<?php echo $value["logo"] ?>" class="img-thumbnail rounded-start img-logo" alt="..."></td>
                        <td><?php echo $value["email"] ?></td>
                        <td><?php echo $value["telefono"] ?></td>
                    </tr>

                <?php endforeach ?>



            </tbody>
        </table>
    </div>
</div>
<!-- MODAL PARA EL RESTABLECIMIENTO DE CONTRASEÑA -->
<div class="modal fade" id="modal_pass_client" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0d6efd ;">
                <h5 class="modal-title text-white" id="modal-tituloClient"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                        <label class="form-label">
                            <h6 class="text-dark">Nueva clave</h6>
                        </label>
                        <input type="password" name="newclaveClient" id="newclaveClient" class="form-control " value="" required>

                    </div>
                    <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                        <label class="form-label">
                            <h6 class="text-dark">Confirmar clave (Máximo 8 caracteres)</h6>
                        </label>
                        <input type="password" maxlength="8" name="newclaveConfirmClient" id="newclaveConfirmClient" class="form-control" value="" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color:#0d6efd ;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="cambiarClaveClient" class="btn btn-success">Cambiar clave</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal editar cliente-->
<div class="modal fade" id="editar_cliente_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0d6efd ;">
                <h1 class="modal-title text-white fs-5" id="titulo-modal-edit"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formulario_edit_cliente" enctype="multipart/form-data">

                <div class="modal-body">
                    <input type="hidden" id="id_cliente_oculto" name="id_cliente_oculto">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Nombre</h6>
                            </label>
                            <input type="text" name="name_emp_edit" id="name_emp_edit" class="form-control" value="">
                        </div>
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Nit</h6>
                            </label>
                            <input type="text" name="nit_emp_edit" id="nit_emp_edit" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row justify-content-md-center">
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Representante legal</h6>
                            </label>
                            <input type="text" name="replegal_emp_edit" id="replegal_emp_edit" class="form-control" value="">

                        </div>
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Ciudad</h6>
                            </label>
                            <input type="text" name="ciudad_emp_edit" id="ciudad_emp_edit" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Dirección</h6>
                            </label>
                            <input type="text" name="direccion_emp_edit" id="direccion_emp_edit" class="form-control" value="">

                        </div>
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Teléfono</h6>
                            </label>
                            <input type="number" name="tel_emp_edit" id="tel_emp_edit" class="form-control" value="">

                        </div>

                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Email</h6>
                            </label>
                            <input type="email" name="email_emp_edit" id="email_emp_edit" class="form-control" value="">

                        </div>
                        <div class="col-12 col-xs-12 col-md-6 col-lg-6 mb-3">
                            <label class="form-label">
                                <h6>Logo (Peso máxino 600kb)</h6>
                            </label>
                            <input type="file" name="logo_emp_edit" id="logo_emp_edit" class="form-control" value="">

                        </div>

                    </div>
                </div>
                <div class="modal-footer" style="background-color:#0d6efd ;">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>