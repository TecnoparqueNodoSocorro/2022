<div class="container">
    <h5 class="mt-2">Registro Empleado</h5>
    <div class="container" style="background-color:#e3f8e0; border-radius:5px;">
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
                <select class="form-select" name="cargo_user" id="cargo_user" aria-label="Default select example">
                    <option selected>Seleccione el cargo</option>
                    <option value="1">Empleado</option>
                    <option value="2">Administrador</option>

                </select>
            </div>

        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrar" type="submit">Registrar Empleado</button>

    </div>
    
</div>