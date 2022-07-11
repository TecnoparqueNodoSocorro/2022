<div class="container">
    <h4 class="mt-2"> Reporte de Hallazgos</h4>
    <div class="container mb-3 mt-2" style="background-color:#f8deb9;border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha inicio</h6>
                </label>
                <input type="date" name="fecha_inicioH" id="fecha_inicioH" class="form-control" value="" required>
            </div>

            <div class="col-6 col-xs-12 col-md-6 col-lg-6 mt-1">
                <label class="form-label">
                    <h6>Fecha fin</h6>
                </label>
                <input type="date" name="fecha_finH" id="fecha_finH" class="form-control" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-2 mb-2" id="btnReporteH" type="submit">Generar reporte</button>

        <!-- tabla del reporte generado -->

    </div>
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