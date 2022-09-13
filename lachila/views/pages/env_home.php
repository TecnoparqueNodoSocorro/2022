<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "3") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=login"; </script>';
}
?>
<?php
$datos = ControladorLotes::ctrGetLoteEnv();
//print_r($datos)
?>

<div class="container" style="background-color:#eeb3b3; border-radius:5px;">
    <div class="table-responsive mt-1 pt-3 mb-5">
        <table class="table table-danger table-bordered table-striped">
            <thead>
                <tr>

                    <th>Código lote</th>
                    <th>Materia</th>
                    <th>Fecha inicio</th>
                    <th>Registrar</th>


                </tr>
            </thead>
            <tbody>

                <?php foreach ($datos as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["codigo"] ?></td>
                        <td><?php echo $value["materia"] ?></td>
                        <td><?php echo $value["fecha_inicio"] ?></td>
                        <td> <button type="button" data-id="<?php echo $value["id"] ?>" data-codigo="<?php echo $value["codigo"] ?>" class="btnEnv btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalEnv">
                                <i class="bi bi-plus-circle-dotted"></i>
                            </button></td>


                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
    </div>

</div>

<!-- //MODAL PARA  EL PROCESO DE ENVASADO-->

<div class="modal fade" id="modalEnv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="tituloEnv"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <?php
                    $envases = ControladorEnvases::ctrGetEnvases();
                    //print_r($envases)
                    ?>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Envase</label>
                            <select class="form-select mb-2" name="" id="envase" aria-label="Default select example">
                                <option selected value="0">--Seleccione el envase--</option>
                                <?php foreach ($envases as $key => $value) : ?>

                                    <option value="<?php echo $value["id"] ?>"> <?php echo $value["capacidad"] ?><?php echo $value["unidad_medida"] ?> </option>

                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="fInicio" id="cantidad" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="row" style="text-align: right;">
                        <div class="col-12">
                            <button type="button" name="" id="btnAgregarCantidad" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>


                    <div class="table-responsive mt-1 pt-3 mb-5">
                        <table class="table table-danger table-bordered table-striped">
                            <thead>
                                <tr id="theadEnv">

                                   <!--  <th>Código lote</th>
                                    <th>Materia</th>
                                    <th>Fecha inicio</th>

                                </tr> -->
                            </thead>
                            <tbody id="tbodyEnv">

                                   <!--  <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                    
                                    </tr> -->

                         

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>