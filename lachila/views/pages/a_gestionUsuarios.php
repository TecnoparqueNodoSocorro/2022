<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=login"; </script>';
}
?>
<div class="container mb-1">

    <!--  <h3>
        Registro de Usuarios
    </h3> -->
    <div class="container" style="background-color:#eeb3b3; border-radius:5px;">
        <h3>
            Registro de Usuarios
        </h3>
        <!-- formulario para agregar un usuario -->
        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">

                <h6>Nombres</h6>

                <input type="text" name="name_user" id="name_user" class="form-control" value="" required>
            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">

                <h6>Apellidos</h6>

                <input type="text" name="lastname_user" id="lastname_user" class="form-control" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">

                <h6>Número de Teléfono</h6>

                <input type="number" name="phone_user" id="phone_user" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">

                <h6>Núm de documento</h6>

                <input type="number" name="document_user" id="document_user" class="form-control" value="" required>
            </div>
        </div>


        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">

                <h6>Contraseña</h6>

                <input type="password" name="pass_user" onkeypress="return valideKey(event)" id="pass_user" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">

                <h6>Confirm. contraseña</h6>

                <input type="password" name="confirm_pass" onkeypress="return valideKey(event)" id="confirm_pass" class="form-control" value="" required>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-12 col-xs-6 col-md-6 col-lg-6">

                <h6>F. Nacimiento</h6>

                <input type="date" name="nacimiento_user" id="nacimiento_user" class="form-control" value="" required>
            </div>
            <!--       <div class="col-12 col-xs-6 col-md-6 col-lg-6">

                <h6>Cargo</h6>

                <select class="form-select" name="cargo_user" id="cargo_user" aria-label="Default select example">
                    <option selected value="0">Seleccione el cargo</option>
                    <option value="1">Empleado</option>
                    <option value="2">Administrador</option>
                </select>
            </div> -->

        </div>




        <div class="formulario mt-3" style="text-align:center">
            <form class="row g-3" method="post">

                <div class="col-12  mb-3">
                    <button class="btn btn-danger" id="btnRegistrar" type="button">Registrar usuario</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Tabla que muestra los empleados registrado -->
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-danger table-bordered table-sm">
            <?php
            $usuarios = ControladorUsuarios::ctrGetUsuarios()
            ?>
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>

                </tr>
            </thead>
            <tbody id="tbodyListarEmpleados">

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td> <button type="button" class="ExtraerId btn btn-sm btn-danger" id="traerid" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>"> <?php echo $value["estado"] == 1  ? '<i class="bi bi-x-lg"></i>' : '<i class="bi bi-check-lg"></i>' ?></button>
                       
                        <button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" class="editPass btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-key"></i>
                            </button></td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-dark' ?>"><?php echo $value["estado"] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td><?php echo $value["nombres"] . " " . $value["apellidos"] ?></td>
                        <td><?php echo $value["num_documento"] ?></td>
                        <td><?php echo $value["num_telefono"] ?></td>
                    </tr>

                <?php endforeach ?>



            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="modal-titulo"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-md-center">
                            <div class="col col-xs-6 col-md-6 col-lg-6">
                                <label class="form-label">
                                    <h6 class="text-dark">Nueva clave</h6>
                                </label>
                                <input type="password" onkeypress="return valideKey(event)" name="newclave" id="newclave" class="form-control" value="" required>

                            </div>
                            <div class="col col-xs-6 col-md-6 col-lg-6">
                                <label class="form-label">
                                    <h6 class="text-dark">Confirmar clave</h6>
                                </label>
                                <input type="password" name="newclaveConfirm" onkeypress="return valideKey(event)" id="newclaveConfirm" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="cambiarClave" class="btn btn-primary">Cambiar clave</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>