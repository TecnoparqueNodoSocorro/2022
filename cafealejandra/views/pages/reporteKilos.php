<div class="container">

    <h2>
        <span class="text-warning mb-3">Reporte de Kilos por cosecha</span>
    </h2>

    <?php
    $cosecha = ControladorCosecha::ConsultarCosecha()
    ?>


    <select class="form-select rounded" name="cosecha" id="reporteKilos" aria-label="Default select example">
        <option selected>--Seleccione la cosecha--</option>
        <?php foreach ($cosecha as $key => $value) : ?>

            <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

        <?php endforeach ?>
    </select>

    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Empleados</th>
                    <th>Kilos recogidos</th>
                    <th>Cafe Guayaba</th>
                    <th>Cafe Pergamino</th>
                </tr>
            </thead>
            <tbody id="tbodyReporte">

        </table>
    </div>

   
    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead id="headReporte">
                <!-- <tr>
                    <th>Nombre Empleados</th>
                    <th>Kilos recogidos</th>
                    <th>Cafe Guayaba</th>
                    <th>Cafe Pergamino</th>
                </tr> -->
           
           

        </table>
    </div>
</div>