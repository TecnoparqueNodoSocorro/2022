<?php
if (isset($_SESSION["validar_ingreso"])) {
 
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

?>
<div class="container">

    <h4>Control Individual</h4>
    <?php
    $caprinos = ControladorCaprino::ctrConsultarCaprinoActivo($id)
    ?>
    <!-- formulario para agregar un control individual -->
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6 mt-3 ">

                <!-- 
                <label class="form-label">
                    <h6>codigo</h6>
                </label> -->
                <select class="form-select mb-2" name="" id="codigo_caprino_control" aria-label="Default select example">
                    <option selected value="0">--Seleccione el código del caprino--</option>
                    <?php foreach ($caprinos as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>


            </div>
        </div>
    </div>
    <h5 class="mt-2">Datos del caprino</h5>
</div>

<!-- tabla que muestra los resultados que se arrojas -->
<div class="container">
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Código</th>
                    <th>Raza</th>
                    <th>Fecha Nacimiento</th>
                </tr>
            </thead>
            <tbody id="tbodyControl">
            </tbody>
        </table>
    </div>
</div>


<!-- Modal opcines para control-->
<div class="modal fade" id="ModalDatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headControl"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row row-cols-2">
                    <div class="col-12 col-sm-6">
                        <label class="form-label">
                            <h6>Peso en Kilos</h6>
                        </label>
                        <input type="number" name="peso_kilos" id="peso_kilos" class="form-control" value="" required>
                    </div>

                    <div class="col-12 col-sm-6">
                        <label class="form-label">
                            <h6>Condicion Corporal (1-5)</h6>
                        </label>
                        <select class="form-select" name="condicion" id="condicion" aria-label="Default select example">
                            <option selected>Seleccione la condición</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>

                        </select>
                    </div>
                </div>


                <div class="row mb-3" style="text-align:left;">


                    <div class="col-12 col-sm-6">
                        <label class="mt-2">Enfermedad Respiratoria</label>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="checkRes" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" id="textER" aria-label="Text input with checkbox" disabled>
                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="mt-2">Enfermedad Gastrointestinal</label>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="checkGas" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" id="textEG" aria-label="Text input with checkbox" disabled>
                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="mt-2">Enfermedad por Mordedura</label>
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" id="checkMor" aria-label="Checkbox for following text input">
                            </div>
                            <input type="text" class="form-control" id="textEM" aria-label="Text input with checkbox" disabled>
                        </div>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardarD" class="btn btn-primary">Guardar</button>
            </div>

        </div>
    </div>
</div>


<!-- <script type="text/javascript">
   
</script> -->