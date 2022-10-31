<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
$recepciones = ControladorHome::ctrRecepcionesHoy();
// echo ($recepciones);
$escaldadas = ControladorHome::ctrEscaldadasHoy();
// echo $escaldadas
$reporte_bocadillo = ControladorHome::ctrReporteBocadilloHoy();
$reporte_arequipe = ControladorHome::ctrReporteArequipeHoy();
$reporte_espejuelo = ControladorHome::ctrReporteEspejueloHoy();
$lotes = ControladorHome::ctrLotesPorEstado();

?>
<div class="contenedor-principal">
    <div class="container pt-3 shadow-lg rounded">
        <h2 style="text-shadow:2px 2px 0px #000000  ; color:white">Registros del día de hoy</h2>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Recepciones hoy
                <span class="badge bg-success rounded-pill"><?php echo $recepciones ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Escaldadas hoy
                <span class="badge bg-success rounded-pill"><?php echo $escaldadas ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Reportes de bocadillo hoy
                <span class="badge bg-success rounded-pill"><?php echo $reporte_bocadillo ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Reportes de arequipe hoy
                <span class="badge bg-success rounded-pill"><?php echo $reporte_arequipe ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Reportes de espejuelo hoy
                <span class="badge bg-success rounded-pill"><?php echo $reporte_espejuelo ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Embalajes hoy
                <span class="badge bg-success rounded-pill">1</span>
            </li>
        </ul>

    </div>
    <div class="container pt-4  shadow-lg rounded">
        <h2 style="text-shadow:2px 2px 0px #000000  ; color:white">Resumen lotes</h2>

        <ul class="list-group">
            <?php foreach ($lotes as $key => $value) : ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Lotes en estado de <?php if ($value["estado"] == "1") {
                                            echo "Recepción";
                                        } elseif ($value["estado"] == "2") {
                                            echo "Escaldado";
                                        } elseif ($value["estado"] == "3") {
                                            echo "Producción";
                                        } elseif ($value["estado"] == "4") {
                                            echo "Embalaje";
                                        } elseif ($value["estado"] == "5") {
                                            echo "Finalizado";
                                        } ?>

                    <span class="badge bg-success rounded-pill"><?php echo $value["cantidad"] ?></span>
                </li>
            <?php endforeach ?>
            <!-- 
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Lotes en escaldado
                <span class="badge bg-success rounded-pill">2</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Lotes en producción
                <span class="badge bg-success rounded-pill">1</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Lotes en embalaje
                <span class="badge bg-success rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Lotes finalizados
                <span class="badge bg-success rounded-pill">2</span>
            </li> -->

        </ul>

    </div>
</div>