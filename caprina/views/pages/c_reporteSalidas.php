<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if(isset( $_SESSION["id"])){
$id = $_SESSION["id"];}

?>

<div class="container">


    <!-- listado de caprinos que se dieron de baja -->
    <h5 class="mt-3">Listado de Salidas</h5>
    <?php
    $caprinoInactivo = ControladorCaprino::ctrConsultarCaprinoInactivo($id)

    ?>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered  table-sm">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Raza</th>
                    <th>Motivo de salida</th>
                    <th>Fecha de salida</th>


                </tr>
            </thead>
            <tbody>

                <?php foreach ($caprinoInactivo as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value["codigo"] ?></td>
                        <td><?php echo $value["raza"] ?></td>
                        <td><?php echo $value["motivo_salida"] ?></td>
                        <td><?php echo $value["fecha_salida"] ?></td>

                    </tr>

                <?php endforeach ?>

                </tr>
            </tbody>
        </table>
    </div>
</div>