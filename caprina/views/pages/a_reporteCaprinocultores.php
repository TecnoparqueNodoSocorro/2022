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
    <h4 class="mt-3"> Reporte de Caprinocultores</h4>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning  table-sm rca_tabla">
            <thead>
                <tr>
                    <!--                     <th>Opciones</th>
 -->
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Objetivo de la producción</th>

                    <th>Cambio clave</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = ControladorCaprinocultor::ctrConsultarCaprinocultores();
                ?>

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <!--   <td><a type="button" class="btn btn-outline-danger btn-circle btn-sm" id="btnrliminac" data-idp='<?php echo $value["id"] ?>'><i class="bi bi-trash3-fill"></i></a>

                        </td> -->
                        <td><?php echo $value["nombres"] . " " . $value["apellidos"] ?></td>
                        <td><?php echo $value["num_documento"] ?></td>
                        <td><?php echo $value["num_telefono"] ?></td>
                        <td><?php echo $value["direccion"] ?></td>
                        <td><?php echo $value["objetivo_produccion"] ?></td>
                        <td><button type="button" data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombres"] . " " . $value["apellidos"] ?>" class="editPass btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-key"></i>
                            </button></td>

                    </tr>

                <?php endforeach ?>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="modal-titulo"></h5>
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
            </tbody>
        </table>
    </div>
</div>