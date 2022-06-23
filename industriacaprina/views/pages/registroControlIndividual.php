<div class="container">

    <h4>Control Individual</h4>
    <!-- formulario para agregar un control individual -->
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Id</h6>
                </label>
                <input type="number" name="id_caprino" id="id_caprino" class="form-control" value="" required>
            </div>
        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnTraer" type="submit">Traer</button>
    </div>
    <h5 class="mt-2">Datos del caprino</h5>
</div>

<!-- tabla que muestra los resultados que se arrojas -->
<div class="container mt-4 mb-5" style="text-align:left;">
    <table class="table rounded table-warning display responsive nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Raza</th>
                <th>Opciones</th>
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
                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Opciones </button></td>
            </tr>

        </tbody>
    </table>


    <!-- Modal opcines para control-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ID del caprino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row row-cols-2">
                        <div class="col-12 col-sm-6">
                            <label class="form-label">
                                <h6>Peso en Kilos</h6>
                            </label>
                            <input type="number" name="peso_kilos" id="peso_kilos" class="form-control" value=""
                                required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label class="form-label">
                                <h6>Condicion Corporal (1-5)</h6>
                            </label>
                            <select class="form-select" name="condicion" id="condicion"
                                aria-label="Default select example">
                                <option selected>Seleccione la condición</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>

                            </select>
                        </div>
                    </div>


                    <div class="row mb-3" style="text-align:left;">

                        <div class="col-12 col-sm-6 ">
                            <label class="mt-2">Enfermedad Respiratoria</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" id="check1" value="1"
                                        aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" class="form-control" id="textER"
                                    aria-label="Text input with checkbox">
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label class="mt-2">Enfermedad Gastrointestinal</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" id="check2" value="2"
                                        aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" class="form-control" id="textEG"
                                    aria-label="Text input with checkbox">
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label class="mt-2">Enfermedad por Mordedura</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" id="check3" value="3"
                                        aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" class="form-control" id="textEM"
                                    aria-label="Text input with checkbox">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="btnGuardarT" class="btn btn-primary">Guardar </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>