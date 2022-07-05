<!-- header -->
<div class="container"  >
    <h2>
        <span class="text-warning mb-3">Registro de Kilos</span>
    </h2>
    <div class="formularioKilos">


        <div class="row">
            <div class="col-12">
                <select class="form-select" id="cosecha_pago" aria-label="Default select example">
                    <option selected>Seleccione la cosecha</option>
                    <option value="1">Cosecha #</option>
                    <option value="2">Cosecha 2#</option>
                    <option value="3">Cosecha 3#</option>

                </select>
            </div>
            <div class="col-12 mt-3">
                <select class="form-select" id="empleado" aria-label="Default select example">
                    <option selected>Seleccione el empleado</option>
                    <option value="1">Emmpleadp 1</option>
                    <option value="2">Emnpelado 2</option>
                </select>
            </div>


            <div class="col-6">
                <label for="validationServer01">
                    <h6>Fecha Inicio</h6>
                </label>
                <input type="date" id="fecInicio" name="fecInicio" class="form-control" value="" required>
            </div>
            <div class="col-6">
                <label for="validationServer02">
                    <h6>Fecha Fin</h6>
                </label>
                <input placeholder="Fecha fin" id="fecFin" name="fecFin" type="date" class="form-control" value=""
                    required>
            </div>
            <div class="col-12">

                <button type="button" id="btnGenerarCant" class="btn btn-warning mt-3">Generar </button>
            </div>
        </div>
    </div>





    <table id="responsive-table" class="table  table-striped display responsive nowrap rounded">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th>K. recogidos</th>
                <th class="none">T. pagar</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>

            </tr>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>

            </tr>
            <tr>
                <td>Mark</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>

            </tr>
        </tbody>
    </table>

</div>