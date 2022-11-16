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
$recepcionesPorUsuario = ControladorHome::ctrRecepcionesHoyPorUsuario($id);
//echo ($recepcionesPorUsuario);
$escaldadas = ControladorHome::ctrEscaldadasHoyPorUsuario($id);
// echo $escaldadas
$reporte_bocadillo = ControladorHome::ctrReporteBocadilloHoyPorUsuario($id);
$reporte_arequipe = ControladorHome::ctrReporteArequipeHoyPorUsuario($id);
$reporte_espejuelo = ControladorHome::ctrReporteEspejueloHoyPorUsuario($id);
$embalajes = ControladorHome::ctrEmbalajesHoyPorUsuario($id)

?>
<div class="contenedor-principal">

    <div class="container pt-5">
    <h2 style="text-shadow:2px 2px 0px #000000  ; color:white">Registros del día de hoy</h2>
    <h4 style="text-shadow:4px 2px 0px #000000  ; color:white">Empleado</h4>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Recepciones
                <span class="badge bg-success rounded-pill"><?php echo $recepcionesPorUsuario ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Escaldadas
                <span class="badge bg-success rounded-pill"><?php echo $escaldadas ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Reportes de bocadillo
                <span class="badge bg-success rounded-pill"><?php echo $reporte_bocadillo ?></span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                Reportes de arequipe
                <span class="badge bg-success rounded-pill"><?php echo $reporte_arequipe ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Reportes de espejuelo
                <span class="badge bg-success rounded-pill"><?php echo $reporte_espejuelo ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Embalajes
                <span class="badge bg-success rounded-pill"><?php echo$embalajes ?></span>
            </li>
        </ul>

    </div>
    
</div>