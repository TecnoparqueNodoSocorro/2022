<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSumatoria">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="modalSumatoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sumar kilos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col-8">
                        <input type="number"  class="form-control" id="cantidad" placeholder="Cantidad en kg">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-success" id="btn_agregarCantidad">Agregar </button>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive mt-3 mb-4">
                        <table class="table table-bordered  table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 80px;">Eliminar</th>
                                    <th>Cantidad</th>
                                  

                                </tr>
                            </thead>
                            <tbody id="tbodyCantidades">





                            </tbody>
                          
                        </table>
                        <span id="textoSumatoria"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="guardarSumatoria" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>