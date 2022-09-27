<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

?>
<div class="container">
    <h4>Registro de Caprinos</h4>
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <!-- formulario para agregar un usuario -->
        <div class="row justify-content-md-center mt-2">
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Raza</h6>
                </label>
                <select class="form-select" name="raza" id="raza" aria-label="Default select example">
                    <option selected value="0">Seleccione la raza</option>
                    <option value="1">Saanen</option>
                    <option value="2">Alpino</option>
                    <option value="3">Santandereano</option>
                    <option value="4">Nubiana</option>
                    <option value="5">Togenburn</option>
                    <option value="6">Booer</option>
                    <option value="7">Otras</option>
                </select>
            </div>
            <div class="col col-xs-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Origen</h6>
                </label>
                <select class="form-select" name="origen" id="origen" aria-label="Default select example">
                    <option selected value="0">Seleccione el origen</option>
                    <option value="1">Comprado</option>
                    <option value="2">Nacido</option>
                    <option value="4">Genética</option>
                    <option value="3">Otro</option>
                </select>
            </div>
        </div>

        <!-- DIV PARA MOSTRAR EL CODIGO DE LA MADRE SE OCULTA O SE MUESTRA -->
        <div class="row justify-content-md-center mt-2">
            <div class="col-12" style="display:none" id="divCodigoMadre">
                <label class="form-label">
                    <h6>Código de la madre</h6>
                </label>
                <!-- <input type="text" name="fecha_nac" id="codigo_madre" class="form-control" value="" required> -->
                <?php
                $caprino = ControladorCaprino::ctrConsultarCaprinoHembra($id)
                ?>
                <select class="form-select mb-2" name="cosecha_user" id="caprinos_hembras" aria-label="Default select example">
                    <option selected value="0">--Seleccione el código del caprino--</option>
                    <?php foreach ($caprino as $key => $value) : ?>

                        <option value="<?php echo $value["codigo"] ?>">Codigo: <?php echo $value["codigo"] ?> </option>

                    <?php endforeach ?>

                </select>
            </div>
        </div>
        <!-- ----------------------------------------------------------------------- -->

        <div class="row justify-content-md-center mt-2">
            <div class="col-12" id="divGenero">
                <label class="form-label">
                    <h6>Género del caprino</h6>
                </label>
                <select class="form-select" name="origen" id="CaprinoGenero" aria-label="Default select example">
                    <option selected value="0">Seleccione el género</option>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                </select>
            </div>
        </div>


        <!-- DIV QUE SE MUESTRA EN CASO DE SER MACHO -->
        <div class="row justify-content-md-center mt-2">
            <div class="col-12" style="display:none" id="DivGeneroMacho">
                <label class="form-label">
                    <h6>¿El caprino está castrado?</h6>
                </label>
                <select class="form-select" name="origen" id="CaprinoCapado" aria-label="Default select example">
                    <option selected value="0">Seleccione si el caprino ya está castrado</option>
                    <option value="Capado">Si</option>
                    <option value="No capado">No</option>
                </select>
            </div>
        </div>
        <!-- ----------------------------------------------------------------------- -->

        <!-- DIV QUE SE MUESTRA EN CASO DE SER HEMBRA -->
        <div class="row justify-content-md-center mt-2">
            <div class="col-12" style="display:none" id="DivGeneroHembra">
                <label class="form-label">
                    <h6>El caprino ya tuvo su primer parto</h6>
                </label>
                <select class="form-select" name="origen" id="CaprinoParto" aria-label="Default select example">
                    <option selected value="0">Seleccione si el caprino ya tuvo su primer parto</option>
                    <option value="Con partos">Si</option>
                    <option value="Sin partos">No</option>
                </select>
            </div>
        </div>
        <!-- ----------------------------------------------------------------------- -->

        <div class="row justify-content-md-center mt-2">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Fecha de nacimiento Aproximado</h6>
                </label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="" required>

            </div>
            <div class="col-xs-12  col-sm-6 col-md-6 col-lg-6">
                <label class="form-label">
                    <h6>Código del caprino</h6>
                </label>
                <input type="text" name="fecha_nac" id="codigo"   class="form-control campoTel" value="" required>
            </div>
        </div>

        <button class="btn btn-warning mt-2 mb-4" id="btnRegistrarCaprino" type="button">Registrar Caprino</button>



    </div>

</div>