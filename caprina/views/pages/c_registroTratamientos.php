<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

?>
<div class="container">

    <h4>Registro de tratamientos</h4>
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center">

            <div class="col-xs-12 col-sm-12  col-md-6 mb-2">
                <label class="form-label">
                    <h6> Descripción del tratamiento</h6>
                </label>
                <textarea class="form-control" placeholder="Descripción del tratamiento" style="height: 100px" id="tratamiento"></textarea>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mb-2">
                <label class="form-label">
                    <h6> Fecha de inicio del tratamiento</h6>
                </label>
                <input type="date" name="fecha_salida" id="fecha_inicio_tratamiento" class="form-control" value="" required>
            </div>
        </div>
    </div>

    <div class="container" style="background-color:#f8deb9; border-radius:5px;">

        <div class="row justify-content-md-center mt-2">
            <div class="col-8">
                <?php $caprino = ControladorCaprino::ctrConsultarCaprinoActivo($id) ?>
                <label class="form-label">
                    <h6> Seleccione el código del caprino</h6>
                </label>
                <select class="form-select mb-2" name="cosecha_user" id="caprino_tratamiento_select" aria-label="Default select example">
                    <option selected>--Seleccione el código del caprino--</option>
                    <?php foreach ($caprino as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>"> <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>


            </div>
            <div class="col-4">
                <!--   <label class="form-label">
                    Agregar caprino
                </label>
 -->
                <button name="" id="btnAgregarCT" class="btnAgregarCaprinos btn btn-warning" type="button"> Agregar</button>
            </div>
        </div>
    </div>



    <h5 class="mt-3">Listado de caprinos</h5>

    <?php
    $caprinos = ControladorCaprino::ctrConsultarCaprino()
    ?>


    <div class="table-responsive mt-3 mb-4">
        <table class="table table-warning table-bordered  table-sm">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Código</th>
                    <th>Raza</th>
                    <th>Fecha de nacimiento</th>

                </tr>
            </thead>
            <tbody id="tbodyTratamientos">





            </tbody>
        </table>
    </div>

    <div class="container mb-5" style="text-align:right;">
        <a name="" id="cancelarT" href="index.php?page=home" class="btn btn-danger" type="button"> Cancelar</a>

        <button name="" id="btnGuardarT" class="btn btn-warning" type="button"> Guardar</button>

    </div>
</div>