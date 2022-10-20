<!-- Vista unica de empleados -->

<div class="container">
    <h2>
        <span class="text-warning mt-3 mb-3">Registro de Actividades</span>
    </h2>
    <h4>
        <span class="nombreEmpleado text-warning mt-3 mb-3 text-uppercase"></span>
    </h4>
    <h5 class="text-danger">Vista para empleados unicamente
    </h5>

    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>


                    <th scope="col">Fecha</th>
                    <th scope="col">Kilos recogidos</th>
                    <th scope="col">Dinero obtenido ese día</th>


                </tr>
            </thead>
            <tbody id="tablaActividades">

            </tbody>
        </table>

    </div>
    <h2>
        <span class="text-warning mt-3 mb-3">Reporte de Pagos</span>
    </h2>

    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead id="theadPagos">

            <tbody id="tbodyPagos">

        </table>

    </div>
</div>
<script src="views/js/reporteActividades.js"></script>