<div class="container">
    <h4>Registro de Caprinos</h4>
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <!-- formulario para agregar un usuario -->
        <div class="row justify-content-md-center mt-2">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Raza</h6>
                </label>
                <select class="form-select" name="raza" id="raza" aria-label="Default select example">
                    <option selected>Seleccione la raza</option>
                    <option value="1">Saanen</option>
                    <option value="2">Alpino</option>
                    <option value="2">Santandereano</option>
                    <option value="2">Nubiana</option>
                    <option value="2">Togenburn</option>
                    <option value="2">Booer</option>
                    <option value="2">Otras</option>


                </select>
            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Origen</h6>
                </label>
                <select class="form-select" name="origen" id="origen" aria-label="Default select example">
                    <option selected>Seleccione el origen</option>
                    <option value="1">Comprado</option>
                    <option value="2">Nacido</option>
                    <option value="2">Otro</option>

                </select>
            </div>
        </div>
        <div class="row justify-content-md-center mt-2">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Nacimiento Aprox.</h6>
                </label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="" required>

            </div>
            <div class="col-xs-12  col-sm-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Código</h6>
                </label>
                <input type="number" name="fecha_nac" id="codigo" class="form-control" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrarCaprino" type="button">Registrar Caprino</button>



    </div>
<!--     <h5 class="mt-2">Listado de Caprinos</h5> -->


    <?php
    $caprino = ControladorCaprino::ctrConsultarCaprino();
    ?>


    <!-- listado de caprinos -->
<!-- 
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Raza</th>
                    <th>Origen</th>
                    <th>Fecha Nacimiento</th>
                    <th>Motivo de Salida</th>
                    <th>Fecha de Salida</th>


                </tr>
            </thead>
            <tbody>

                <?php foreach ($caprino as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["codigo"]  ?></td>
                        <td><?php echo ($value["estado"]==1 ?'Activo':'Inactivo') ?></td>
                        <td><?php echo $value["raza"] ?></td>
                        <td><?php echo $value["origen"] ?></td>
                        <td><?php echo $value["fecha_nacimiento"] ?></td>
                        <td><?php echo $value["motivo_salida"] ?></td>
                        <td><?php echo $value["fecha_salida"] ?></td>

                    </tr>

                <?php endforeach ?>



            </tbody>
        </table>
    </div> -->
</div>