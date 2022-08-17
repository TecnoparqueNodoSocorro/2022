<div class="container">
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
                    <h6>Objetivo de producción</h6>
                </label>
                <select class="form-select" name="objetivoProduccion" id="objetivoProduccion" aria-label="Default select example">
                    <option selected>Seleccione el objetivo</option>
                    <option value="1">Carne</option>
                    <option value="2">Leche</option>
                    <option value="2">Doble Propósito</option>

                </select>
            </div>

        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrar" type="button">Registrar Caprinocultor</button>

    </div>

    <!-- listado de caprinocultores -->
    <h5 class="mt-3">Listado de Caprinocultores</h5>
    <div class="table-responsive mt-3">
        <table class="table table-warning table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Animales Registrado</th>
                <th>Apellido</th>
                <th class="none">Documento</th>
                <th>Teléfono</th>
                <th class="none">Objetivo de la producción</th>
            </tr>
        </thead>
        <tbody>

            <!--         <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["nombre"] ?></td>
                        <td><?php echo $value["apellido"] ?></td>
                        <td><?php echo $value["documento"] ?></td>
                        <td><?php echo $value["telefono"] ?></td>
                        <td><?php echo $value["cargo"] ?></td>
                        <?php endforeach ?> -->
            <tr>
                <td>Mark</td>
                <td>44</td>
                <td>Ootto</td>
                <td>6444534</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>

        </tbody>
    </table>
    </div>
</div>