<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

?>

<div class="container-fluid" style="background-color:#e3f8e0; text-align:center;">
    <h5 class="mt-2">Reporte de tablas de bocadillo</h5>

    <div class="row mt-3 pb-3">
        <div class="col-6">
            <span class="input-group-text" id="basic-addon1">Fecha inicio</span>

            <input class="form-control" type="date" name="fechaInicioRB" id="fechaInicioRB">
        </div>
        <div class="col-6">
            <span class="input-group-text" id="basic-addon1">Fecha fin</span>
            <input class="form-control" type="date" name="fechaFinRB" id="fechaFinRB">
        </div>
        <div class="col-12 mt-2">
            <select class="form-select" name="reporte_producto" id="reporte_producto">
                <option selected value="0">--Seleccione el producto--</option>
                <option value="1">Todos</option>
                <option value="2">Bocadillo</option>
                <option value="3">Manzana</option>
                <option value="4">Extrafino</option>
                <option value="5">Lonja</option>

            </select>

        </div>
    </div>
    <button type="button" id="btnGenerarInfoTB" class="btn btn-primary mb-2">Generar</button>

</div>
<!-- TABLA REGISTROS -->
<div class="table-responsive-sm mt-3 mb-5">
    <table class="table table-striped table-success table-bordered table-sm">

        <thead id="theadReporteTablaGeneral">

        </thead>
        <tbody id="tbodyReporteTablaGeneral">
        </tbody>
    </table>
</div>
<!-- TABLA REGISTROS -->
<div class="table-responsive-sm table-striped mt-3 mb-5">
    <table class="table table-success table-bordered table-sm">

        <thead id="theadReporteTablaProducto">

        </thead>
        <tbody id="tbodyReporteTablaProducto">
        </tbody>
    </table>
</div>