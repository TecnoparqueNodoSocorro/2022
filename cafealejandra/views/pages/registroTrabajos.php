<div class="container">

    <h2>
        <span class="text-warning mb-3">Registro de Trabajo Diario</span>
    </h2>

    <div class="container" style="width:70%">
        <label class="form-label">
            <h4 class="text-warning">Cosecha</h4>
        </label>
        <select class="form-select rounded" name="cosecha" id="cosecha_trabajo" aria-label="Default select example">
            <option style="width:50px" selected>Seleccione cosecha</option>
            <option value="1">Cosecha #</option>
            <option value="2">Cosecha 2</option>
            <option value="2">Cosecha 3#</option>
        </select>
    </div>
        <table id="responsive-table" class="table table-striped display responsive nowrap rounded">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th >Apellido</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Tiger Nixon</td>
                    <td>Edinburgh</td>

                </tr>
                <tr>
                    <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="bi bi-plus-circle"></i>
                        </button></td>
                    <td>Garrett Winters</td>
                    <td>Tokyo</td>

                </tr>

        </table>
    
</div>



<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content " style="text-align: center">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center ">Nombre del empleado</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             

                <div class="col-12">
                    <form>

                  
                    <label for="validationServer02" class="form-label">
                        <h4>Kilos recogidos</h4>
                    </label>
                    <input type="number" id="kilos_recogidos" class="form-control" value="" required>
                    <button type="button" id="agregar_trabajo" class="btn btn-warning mt-4">Agregar</button>
                  </form>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="cancelar" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>