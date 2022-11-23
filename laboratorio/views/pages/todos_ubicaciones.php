<?php
$clientes = ControladorClientes::ctrGetClientes();

?>

<div class="container-fluid" id="div_ubicaciones" style="text-align: center;">
    <h3 class="text-titulo">Registrar ubicación</h3>
    <div class="divUbicaciones row justify-content-md-center">
        <div class="col-12 mt-4 mb-3">

            <select class="input-caja" name="cliente_unic" id="cliente_unic">
                <option selected value="0">--Seleccionar cliente--</option>
                <?php foreach ($clientes as $key => $value) : ?>
                    <option value="<?php echo $value["id"] ?>"><?php echo $value["nombre"] ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <div class="col-12 mt-4 mb-3">

            <input type="text" name="name_ubic" id="name_ubic" class="input-caja" placeholder="Ubicación" value="">


        </div>
        <div class="col-12">

            <button class="btn btn-primary mt-2 mb-4" id="btnRegistrar_ubic" type="button">Registrar ubicación</button>


        </div>
    </div>

    <!-- TABLA REGISTROS -->

    <div class="tablaUbicaciones table-responsive-sm mt-3 mb-5">
        <table class="table table-striped table-primary table-bordered table-sm">

            <thead id="theadUbicaciones">

            </thead>
            <tbody id="tbodyUbicaciones">
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalUbicaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="textModalUbicacion"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">
                        <h6>Cambiar nombre de la ubicación</h6>
                    </label>
                    <input type="text" name="edit_name_ubic" id="edit_name_ubic" class="input-caja" placeholder="Ubicación">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardarCambiosUbic" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>