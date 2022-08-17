<div class="container">
    <h4>Registro de Salidas</h4>

    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <!-- formulario para buscar caprino para darle de baja -->
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Id</h6>
                </label>
                <input type="text" name="id_salida" id="id_salida" class="form-control" value="" required>
            </div>
            <div class="col-12 col-xs-12 col-md-6 col-lg-6 mt-3">

                <label class="form-label">
                    <h6>Motivo de Salida</h6>
                </label>
                <select class="form-select" name="motivo_salida" id="motivo_salida" aria-label="Default select example">
                    <option selected>Seleccione el motivo</option>
                    <option value="1">Sacrificio</option>
                    <option value="2">Venta</option>
                    <option value="2">Muerte Natural</option>
                    <option value="2">Autoconsumo</option>
                    <option value="2">Otra</option>
                </select>
            </div>
        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrarS" type="submit">Registrar Salida</button>
    </div>

    <!-- listado de caprinos que se dieron de baja -->
    <h5 class="mt-3">Listado de Salidas</h5>

    <div class="table-responsive mt-3">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Raza</th>
                    <th>Motivo de salida</th>
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
    </div>
</div>