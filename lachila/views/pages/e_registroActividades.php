<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=login"; </script>';
}

// Se trae la variable de sesion que guarda el id


?>
<div class="container">

    <h4>Registro del Empleado</h4>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-danger table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Lote</th>
                    <th>Fase</th>
                    <th>Brix</th>
                    <th>Alcohol</th>
                    <th>PH</th>
                    <th>TDS</th>
                    <th>AC</th>
                    <th>Temp.</th>
                    <th>Humed.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $registros = ControladorVariables::ctrGetRegistros($id);
               // print_r($registros)
                ?>


                <?php foreach ($registros as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["fecha_registro"] ?></td>
                        <td><?php echo $value["codigo_lote"] ?></td>
                        <td><?php echo $value["fase_lote"]==1 ? '1Fer' : ( $value["fase_lote"]==2 ? '2Fer' :'' ) ?></td>
                        <td><?php echo $value["brix"] ?></td>
                        <td><?php echo $value["alcohol"] ?></td>
                        <td><?php echo $value["ph"] ?></td>
                        <td><?php echo $value["tds"] ?></td>
                        <td><?php echo $value["ac"] ?></td>
                        <td><?php echo $value["temperatura"] ?></td>
                        <td><?php echo $value["humedad"] ?></td>



                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>