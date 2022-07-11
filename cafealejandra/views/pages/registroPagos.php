<div class="container">
    <h2>
        <span class="text-warning mb-3">Registro de Pago</span>
    </h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th class="none">Documento</th>
                    <th class="none">Edad</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModalEm
                                ">
                            <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>

                </tr>
                <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#myModalEncargado">
                            <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>

                </tr>
            </tbody>
        </table>

    </div>

</div>


<!-- The Modal empleado-->
<div class="modal" id="myModalEm">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="text-align: center">

            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Nombre del empleado</h2>

            </div>

            <!-- Modal body -->
            <div class="modal-body">


                <div class="col-12">
                    <label class="form-label">
                        Kilos recogidos
                    </label>
                    <input type="number" readonly class="form-control" id="kilosRecogidos" name="kilosRecogidos"
                        required>
                    <label class="form-label">
                        Total pendiente a pagar
                    </label>
                    <input type="number" readonly class="form-control" id="totalPagar" name="totalPagar" required>
                    <label class="form-label">
                        Cantidad a pagar
                    </label>
                    <input type="number" class="form-control" id="cantidadPagar" name="cantidadPagar" required>
                    <button type="button" id="btnPagar" class="btn btn-warning mt-5">Pagar</button>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>



<!-- The Modal encargado-->
<div class="modal" id="myModalEncargado">
    <div class="modal-dialog modal-dialog-centered   ">
        <div class="modal-content" style="text-align: center">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Nombre del encargado</h2>
            </div>
            <!-- Modal body -->
            <div class="modal-body">



                <form name="form2" id="form2" method="post">

                    <div class="row">
                        <div class="input-group date col-12" id="datepicker">
                            <div class="col-12">
                                <span class="input-group-addon">
                                    <label class="form-label mt-3">
                                        Días de no asistencia:
                                    </label>
                                    <span id="fechas" class="count"></span></span>
                            </div>

                            <div class="col-12">

                                <input type="text" class="form-control" id="diasEncargado" name="diasEncargado"
                                    placeholder="Seleccione los días" required />

                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">
                                Total pendiente a pagar
                            </label>
                            <input type="number" readonly class="form-control" id="totalPagarEncargado"
                                name="totalPagarEncargado" required>
                            <label class="form-label">
                                Cantidad a pagar
                            </label>
                            <input type="number" class="form-control" id="cantidadPagarEncargado"
                                name="cantidadPagarEncargado" required>

                        </div>

                    </div>

                    <button type="button" id="btnCalcularEncargado" class="btn btn-warning mt-4">Agregar</button>
                </form>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
$('#datepicker').datepicker({
    "multidate": true,

}).on('changeDate', function(e) {
    // `e` here contains the extra attributes
    $(this).find('.input-group-addon .count').text(' ' + e.dates.length);
});
</script>