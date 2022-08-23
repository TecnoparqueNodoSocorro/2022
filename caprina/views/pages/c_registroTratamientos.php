<?php
if (isset($_SESSION["validar_ingreso"])) {
 
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if(isset( $_SESSION["id"])){
$id = $_SESSION["id"];}

?>
<div class="container">

    <h4>Registro de tratamientos</h4>
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center mt-2">
            <div class="col-12 col-xs-12 col-md-6 col-lg-6">


                <textarea class="form-control my-2" placeholder="Descripción del tratamiento" style="height: 100px" id="tratamiento"></textarea>
            </div>
        </div>

        <div class="row justify-content-md-center mt-2">
            <div class="col-xs-12 col-sm-12 col-md-6  ">
                <?php
                $caprino = ControladorCaprino::ctrConsultarCaprinoActivo($id)
                ?>
                <label class="form-label">
                    Seleccione el código del caprino
                </label>
                <select class="form-select mb-2" name="cosecha_user" id="caprino_tratamiento_select" aria-label="Default select example">
                    <option selected>--Seleccione el código del caprino--</option>
                    <?php foreach ($caprino as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mb-3">
                <label class="form-label">
                    Fecha de inicio del tratamiento
                </label>
                <input type="date" name="fecha_salida" id="fecha_inicio_tratamiento" class="form-control" value="" required>
            </div>
        </div>
    </div>


    <h5 class="mt-3">Listado de caprinos</h5>

    <?php
    $caprinos = ControladorCaprino::ctrConsultarCaprino()
    ?>


    <div class="table-responsive mt-3">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Raza</th>
                    <th>Fecha de Salida</th>

                </tr>
            </thead>
            <tbody id="tbodyTratamientos">

                <!--        <?php foreach ($caprinos as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["id"] ?></td>
                        <td><?php echo $value["raza"] ?></td>
                        <td><?php echo $value["raza"] ?></td>
                        <td><?php echo $value["raza"] ?></td>

                    </tr>

                <?php endforeach ?> -->



            </tbody>
        </table>
    </div>

    <div class="container mb-5" style="text-align:right;">
        <a name="" id="cancelarT" href="index.php?page=home" class="btn btn-danger" type="button"> Cancelar</a>

        <button name="" id="btnGuardarT" class="btn btn-warning" type="button"> Guardar</button>

    </div>
</div>