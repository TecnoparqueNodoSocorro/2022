<?php

?>

<div class="container">
    <form action="" method="post" id="formulario">
        <h4 class="mt-2">Registro Caprinocultor</h4>
        <div class="container" style="background-color:#f8deb9; border-radius:5px;">
            <!-- formulario para agregar un caprinocultor -->
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
                        <h6>Cargo</h6>
                    </label>
                    <select class="form-select" name="objetivoProduccion" id="cargo" aria-label="Default select example">
                        <option selected>--Seleccione el cargo--</option>
                        <option value="1">Administrador</option>
                        <option value="2">Caprinocultor</option>

                    </select>
                </div>
                <div class="col col-xs-6 col-md-6 col-lg-6">
                    <label class="form-label">
                        <h6>direccion</h6>
                    </label>
                    <input type="number" name="document_user" id="direccion" class="form-control" value="" required>
                </div>

            </div>
            <div class="row justify-content-md-center">
                <div class="col col-xs-6 col-md-6 col-lg-6">
                    <label class="form-label">
                        <h6>Objetivo de producción</h6>
                    </label>
                    <select class="form-select" name="objetivoProduccion" id="objetivoProduccion" aria-label="Default select example">
                        <option selected>--Seleccione el objetivo--</option>
                        <option value="1">Carne</option>
                        <option value="2">Leche</option>
                        <option value="2">Doble Propósito</option>

                    </select>
                </div>

            </div>
            <button class="btn btn-warning mt-2 mb-4" id="btnRegistrar" type="button">Registrar Caprinocultor</button>

        </div>
    </form>
    <!-- listado de caprinocultores -->
   <!--  <?php
    $usuarios = ControladorCaprinocultor::ctrConsultarCaprinocultores();
    ?>

    <h5 class="mt-3">Listado de Caprinocultores</h5>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Direccion</th>
                    <th>Objetivo de la produccion</th>

                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["nombres"] ?></td>
                        <td><?php echo $value["apellidos"] ?></td>
                        <td><?php echo $value["num_documento"] ?></td>
                        <td><?php echo $value["num_telefono"] ?></td>
                        <td><?php echo $value["direccion"] ?></td>
                        <td><?php echo $value["objetivo_produccion"] ?></td>
                        <td><?php echo ($value["id_cargo"] == 1 ? 'Administrador' : 'Caprinocultor')  ?></td>


                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
    </div> -->
</div>