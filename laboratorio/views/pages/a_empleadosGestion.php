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
    <h3 class="text-titulo">Gestión de Usuarios</h3>

    <div class="table-responsive mt-3 mb-5">
        <table class="table table-primary table-sm">
            <?php
            $usuarios = ControladorUsuario::ctrGetUsuarios();

            ?>
            <thead class="table-dark">
                <tr>
                    <th>Acciones</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>#Docu</th>
                    <th>Email</th>
                    <th>Teléfono</th>

                    <!-- <th>Cargo</th> -->


                </tr>
            </thead>
            <tbody id="tbodyListarEmpleados">

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="ExtraerId btn btn-sm  <?php echo $value["estado"] == 1 ? 'btn-primary' : 'btn-danger' ?>" id="traerid" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>"> <?php echo $value["estado"] == 1  ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-check-lg"></i>' ?></button>

                                <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"]  ?>" class="extIdEmp_edit btn btn-sm btn-warning"  data-bs-toggle="modal" data-bs-target="#modal_edit_empleado"><i class="bi bi-pencil-fill"></i></button>

                                <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" class="editPass btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-key"></i></button>
                            </div>
                        </td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td><?php echo $value["nombres"] . " " . $value["apellidos"] ?></td>
                        <td><?php echo $value["numero_documento"] ?></td>
                        <td><?php echo $value["correo"] ?></td>
                        <td><?php echo $value["numero_telefono"] ?></td>
                    </tr>

                <?php endforeach ?>



            </tbody>
        </table>
    </div>
</div>
<!-- MODAL PARA EL RESTABLECIMIENTO DE CONTRASEÑA -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0d6efd ;">
                <h5 class="modal-title text-white" id="modal-titulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                        <label class="form-label">
                            <h6 class="text-dark">Nueva clave (Máximo 8 caracteres)</h6>
                        </label>
                        <input type="password" maxlength="8" name="newclave" id="newclave" class="form-control " value="" required>

                    </div>
                    <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                        <label class="form-label">
                            <h6 class="text-dark">Confirmar clave</h6>
                        </label>
                        <input type="password" maxlength="8" name="newclaveConfirm" id="newclaveConfirm" class="form-control " value="" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background-color:#0d6efd ;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="cambiarClave" class="btn btn-success">Cambiar clave</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modal_edit_empleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#0d6efd ;">
        <h1 class="modal-title text-white fs-5" id="titulo-modal-emp"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-md-center">
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Nombres</h6>
                </label>
                <input type="text" name="name_user_edit" id="name_user_edit" class="form-control" value="" required>
            </div>
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Apellidos</h6>
                </label>
                <input type="text" name="lastname_user_edit" id="lastname_user_edit" class="form-control" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Número de Teléfono</h6>
                </label>
                <input type="number" name="phone_user_edit" id="phone_user_edit" class="form-control" value="" required>

            </div>
            <div class="col-12 col-xs-12 col-md-12 col-lg-6 mb-3">
                <label class="form-label">
                    <h6>Número de documento</h6>
                </label>
                <input type="number" name="document_user_edit" id="document_user_edit" class="form-control" value="" required>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-12">
                <label class="form-label">
                    <h6>Correo electrónico</h6>
                </label>
                <input type="text" name="email_user_edit" id="email_user_edit" class="form-control" value="" required>

            </div>

        </div>
      </div>
      <div class="modal-footer" style="background-color:#0d6efd ;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="btnEditEmpl" class="btn btn-success">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>