<div class="container">

    <h4>Registro de tratamientos</h4>
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6">


                <textarea class="form-control my-2" placeholder="Descripción del tratamiento" 
                    style="height: 100px" id="tratamiento"></textarea>
            </div>
            <div class="col-12 col-xs-12 col-md-6 col-lg-6 mt-3">
                <div class="input-group mb-3">
                    <input type="text" readonly placeholder="Agregar Caprinos" class="form-control" aria-label="">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="bi bi-plus-circle"></i>
                    </button>
                </div>         

                <!-- Modal que mostrará los id de los caprinos -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Caprinos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="list-group" style="text-align:left;">
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" id="idCaprino_1" name="trata" type="checkbox" value="1">
                                        ID Caprino
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" id="idCaprino_2" name="trata" type="checkbox" value="2">
                                        ID Caprino
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" id="idCaprino_3" name="trata" type="checkbox" value="3">
                                        ID Caprino
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" id="idCaprino_4" name="trata" type="checkbox" value="4">
                                        ID Caprino
                                    </label>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" id="idCaprino_5" name="trata" type="checkbox" value="5">
                                        ID Caprino
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btnAgregarT" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <h5 class="mt-3">Listado de caprinos</h5>




    <table id="responsive-table" class="table rounded table-warning display responsive nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Raza</th>
                <th>Tratamiento</th>
                <th class="none">Fecha de Salida</th>

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

            </tr>

        </tbody>
    </table>
    <div class="container mb-5" style="text-align:right;">
    <a name="" id="cancelarT" href="index.php?page=home" class="btn btn-danger" type="button"> Cancelar</a>

        <button name="" id="btnGuardarT" class="btn btn-warning" type="button"> Guardar</button>

    </div>
</div>
