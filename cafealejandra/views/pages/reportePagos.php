<div class="container">

    <h2>
        <span class="text-warning mb-3">Reporte de pagos por cosecha</span>
    </h2>
    <?php
    $cosecha =  ControladorCosecha::ConsultarCosecha();
    ?>

    <select class="form-select rounded" name="cosecha" id="reportePagos" aria-label="Default select example">
        <option selected>Seleccione cosecha</option>
        <?php foreach ($cosecha as $key => $value) : ?>

            <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

        <?php endforeach ?>
    </select>

    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Pago</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="tbodyReporte">
<!--                 <tr>
                    <td>Tiger Nixon</td>
                    <td>Tiger Nixon</td>
                    <td>Edinburgh</td>
                    <td>Edinburgh</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>