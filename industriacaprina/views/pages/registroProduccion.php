<div class="container">

    <h4 class="mt-2">Registrar Producción</h4>
    <!-- div para agregar produccion -->
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-12 col-lg-12">
                <label class="form-label">
                    <h6>ID</h6>
                </label>
                <input type="number" name="id_produccion" id="id_produccion" class="form-control" value="" required>
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
    <div class="container mb-5">
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

        <button class="btn btn-warning mt-3" id="btnGrafico" type="submit">Generar gráfica</button>

        <!-- div para añadir la grafica -->
        <div class="image mt-3 ">
            <img src="images/grafica.png" alt="">
        </div>
    </div>
</div>