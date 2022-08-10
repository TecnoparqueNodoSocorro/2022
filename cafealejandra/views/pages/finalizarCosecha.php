<?php
$cosecha = ControladorCosecha::ConsultarCosechaActiva()
?>


<div class="container mt-5">
    <h2>
        <span class="text-warning">Finalizar Cosecha</span>
    </h2>
    <div class="container mt-4">

        <select class="form-select rounded form-select-sm" id="num_cosecha" aria-label=".form-select-sm example">

            <option selected>Seleccionar cosecha a finalizar</option>
            <?php foreach ($cosecha as $key => $value) : ?>

                <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

            <?php endforeach ?>

        </select>

    </div>

    <button type="button" id="btnCerrarCosecha" class="btn btn-danger mt-4">Finalizar Cosecha</button>
</div>

