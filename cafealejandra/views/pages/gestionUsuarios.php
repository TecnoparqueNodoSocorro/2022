<div class="container">

    <h2>
        <span class="text-warning mb-3">Registro de Empleados</span>
    </h2>

    <!-- formulario para agregar un empleado a una cosecha -->
    <form method="post">
        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6 class="text-white">Cosecha</h6>
                </label>
                <select class="form-select" name="cosecha_user" id="cosecha_user" aria-label="Default select example">
                    <option selected>Seleccione la cosecha</option>
                    <option value="1">Cosecha #</option>
                    <option value="2">Cosecha 2#</option>
                    <option value="3">Cosecha 3#</option>
                </select>
            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6 class="text-white">Nombres</h6>
                </label>
                <input type="text" name="name_user" id="name_user" class="form-control" value="" required>
            </div>
        </div>


        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6 class="text-white">Apellidos</h6>
                </label>
                <input type="text" name="lastname_user" id="lastname_user" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6 class="text-white">Cargo</h6>
                </label>
                <select class="form-select" name="cargo_user" id="cargo_user" aria-label="Default select example">
                    <option selected>Seleccione el cargo</option>
                    <option value="1">Recolector</option>
                    <option value="2">Encargado</option>
                </select>
            </div>

        </div>

        <div class="row justify-content-md-center">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6 class="text-white">Número de Teléfono</h6>
                </label>
                <input type="number" name="phone_user" id="phone_user" class="form-control" value="" required>

            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6 class="text-white">Núm de documento</h6>
                </label>
                <input type="number" name="document_user" id="document_user" class="form-control" value="" required>
            </div>
        </div>


        <div class="formulario mt-3" style="text-align:center">
            <form class="row g-3" method="post">

                <div class="col-12">
                    <button class="btn btn-warning" id="btnRegister" type="button">Registrar empleado</button>
                </div>
            </form>
        </div>
    </form>




    <!-- Tabla que muestra los empleados registrado -->


    <div class="table-responsive mt-3" >
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th class="none">Teléfono</th>
                    <th class="none">Cargo</th>
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
                    <td>Otto</td>
                    <td>6444534</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>