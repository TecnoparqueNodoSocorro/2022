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
<div class="container">
    <h5 class="mt-2">Registro Empleado</h5>
    <div class="container" style="background-color:#e3f8e0; border-radius:5px;">
        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Nombres</h6>
                </label>
                <input type="text" name="name_user" id="name_user" class="form-control" value="" required>
            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Apellidos</h6>
                </label>
                <input type="text" name="lastname_user" id="lastname_user" class="form-control" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Número de Teléfono</h6>
                </label>
                <input type="number" name="phone_user" id="phone_user" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Núm de documento</h6>
                </label>
                <input type="number" name="document_user" id="document_user" class="form-control" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Contraseña</h6>
                </label>
                <input type="password" name="password_user"  id="password_user" class="form-control only_numbers" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Confirm contraseña</h6>
                </label>
                <input type="password" name="confirm_password"  id="confirm_password" class="form-control only_numbers" value="" required>
            </div>
        </div>

        <!--       <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Cargo</h6>
                </label>
                <select class="form-select" name="cargo_user" id="cargo_user" aria-label="Default select example">
                    <option selected>Seleccione el cargo</option>
                    <option value="1">Empleado</option>
                    <option value="2">Administrador</option>

                </select>
            </div>

        </div> -->
        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrar" type="submit">Registrar Empleado</button>

    </div>

    <!-- Tabla que muestra los empleados registrado -->
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-success table-bordered table-sm">
            <?php
            $usuarios = ControladorUsuario::ctrGetUsuarios();

            ?>
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>#Docu</th>
                    <th>Teléfono</th>
                    <!-- <th>Cargo</th> -->


                </tr>
            </thead>
            <tbody id="tbodyListarEmpleados">

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td> <button type="button" class="ExtraerId btn btn-sm  <?php echo $value["estado"] == 1 ? 'btn-primary' : 'btn-danger' ?>" id="traerid" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>"> <?php echo $value["estado"] == 1  ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-check-lg"></i>' ?></button>

                            <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" class="editPass btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-key"></i>
                            </button>
                        </td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td><?php echo $value["nombres"] . " " . $value["apellidos"] ?></td>
                        <td><?php echo $value["numero_documento"] ?></td>
                        <td><?php echo $value["numero_telefono"] ?></td>
                        <!-- <td><?php echo $value["id_cargo"] == "1" ? 'Empleado' : '' ?><?php echo $value["id_cargo"] == "3" ? 'Envasador' : '' ?></td> -->
                    </tr>

                <?php endforeach ?>



            </tbody>
        </table>

        <!-- MODAL PARA EL RESTABLECIMIENTO DE CONTRASEÑA -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#5ac15d ;">
                        <h5 class="modal-title text-white" id="modal-titulo"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col col-xs-6 col-md-6 col-lg-6">
                                <label class="form-label">
                                    <h6 class="text-dark">Nueva clave</h6>
                                </label>
                                <input type="password" name="newclave" id="newclave" class="form-control only_numbers" value="" required>

                            </div>
                            <div class="col col-xs-6 col-md-6 col-lg-6">
                                <label class="form-label">
                                    <h6 class="text-dark">Confirmar clave</h6>
                                </label>
                                <input type="password" name="newclaveConfirm" id="newclaveConfirm" class="form-control only_numbers" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color:#5ac15d ;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="cambiarClave" class="btn btn-primary">Cambiar clave</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>