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
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha de Nacimiento Aprox.</h6>
                </label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="" required>

            </div>

        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrarCaprino" type="button">Registrar Caprino</button>



    </div>
    <h5 class="mt-2">Listado de Caprinos</h5>
</div>




<!-- listado de caprinos -->

<div class="container mb-5" style="text-align:left;">
    <table id="responsive-table" class="table rounded table-warning display responsive nowrap">
        <thead>
            <tr>
                <th>Id</th>
                <th>Raza</th>
                <th>Origen</th>
                <th class="none">Fecha Nacimiento</th>

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
</div>
</div>