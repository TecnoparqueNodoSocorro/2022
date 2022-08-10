<?php
$cosecha = ControladorCosecha::ConsultarCosecha()
?>

<div class="container">
    <h3>
        <span class="text-warning ">listado de Trabajadores por Cosecha</span>
    </h3>

    <div class="container mt-3">
        <select class="form-select" name="usuarios_cosecha" id="usuarios_cosecha" >
            <option selected>--Seleccione la cosecha--</option>
            <?php foreach ($cosecha as $key => $value) : ?>

                <option value="<?php echo $value["id"] ?>">Codigo: <?php echo $value["id"] ?> | Fecha de inicio <?php echo $value["fecha_inicio"] ?></option>

            <?php endforeach ?>

        </select>

    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                </tr>   
            </thead>
            <tbody id="tbody">

     


            </tbody>
        </table>
    </div>
</div>