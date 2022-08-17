<div class="container">

    <h4 class="mt-2">Registrar Producción</h4>
    <!-- div para agregar produccion -->
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-12 col-lg-12">
                <label class="form-label">
                    <h6>Código</h6>
                </label>
                <?php
                $caprino = ControladorCaprino::ctrConsultarCaprinoActivo()
                ?>
                <select class="form-select mb-2" name="cosecha_user" id="caprino_produccion_select" aria-label="Default select example">
                    <option selected value="0">--Seleccione el código del caprino--</option>
                    <?php foreach ($caprino as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>
            </div>
        </div>
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Cantidad de Leche (Litros)</h6>
                </label>
                <input type="number" name="cantidad_leche" id="cantidad_leche" class="form-control" value="" required>
            </div>

            <div class="col-12 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha</h6>
                </label>
                <input type="date" name="fecha_prod" id="fecha_prod" class="form-control" value="" required>
            </div>
        </div>
        <button class="btn btn-warning mt-2 mb-4" id="btnAdicionar" type="submit">Adicionar</button>
    </div>

    <!-- datos para generar el gráfico -->
    <h5 class="mt-2">Reporte gráfico de producción de leche por días</h5>

    <div class="container mb-2" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha 1</h6>
                </label>
                <input type="date" name="fecha1_gra" id="fecha1_gra" class="form-control" value="" required>
            </div>

            <div class="col-6 col-xs-12 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha 2</h6>
                </label>
                <input type="date" name="fecha2_gra" id="fecha2_gra" class="form-control" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-3 mb-3" id="btnGenerarGrafica" type="submit">Generar gráfica</button>

        <!-- div para añadir la grafica -->
    </div>
    <div class="container">

    <canvas id="myChart" width="100%" height="100%" class="mb-5"></canvas>

    </div>
</div>