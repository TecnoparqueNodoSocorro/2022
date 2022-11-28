<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "3") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}

$equipos = ControladorEquipos::CtrGetEquiposByUser($id);
//print_r($equipos);
?>
<div class="container">
    <h1 class="text-center fs-4">Inventario de los equipos</h1>

    <div class="table-responsive mt-3 mb-5">

        <table class="table table-primary  table-sm table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Menú</th>
                    <th>Equipo</th>
                    <th>Ubicacion</th>
                    <th>Código</th>
                    <th style="width: 100px !important;">Imagen</th>
                    <th>Estado</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $key => $value) : ?>

                    <tr>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-chevron-double-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerDescrip dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_descripcion">Descripción del equipo</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-id_cliente="<?php echo $value["id_cliente"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editUbic dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_ubicacion">Cambiar ubicación</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerComponentes dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_componentes">Componentes</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="TraerRiesgosA dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_riesgosAsociados">Riesgos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editRegistro dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_registrotecnico">Registro técnico</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editCaract dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_caracteristicasMetro">Características metrológicas</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="editRegisHst dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_registroHistorico">Registro histórico</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="traerProcesos dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_procesosLimpieza">Procesos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-nombre="<?php echo $value["nombre"] ?>" class="restoEdiciones dropdown-item" data-bs-toggle="modal" data-bs-target="#editar_restoEdiciones">Intervenciones y disposición final</a></li>
                                    <li><a class="dropdown-item" href="#">Documentos</a></li>
                                    <li><a data-id="<?php echo $value["id"] ?>" data-estado=" <?php echo $value["estado"] ?>" class="ActDesact dropdown-item" href="#">
                                            <?php echo $value["estado"] == "1" ? 'Desactivar' : 'Activar' ?>

                                        </a></li>

                                </ul>
                            </div>
                        </td>
                        <td><?php echo $value["nombre"] ?></td>
                        <td><?php echo $value["nombre_ubicacion"] ?></td>
                        <td><?php echo $value["codigo"] ?></td>
                        <td>

                            <picture>
                                <source srcset="views/views/<?php echo $value["imagen"] ?>" type="image/svg+xml">
                                <img src="views/views/<?php echo $value["imagen"] ?>" class="img-fluid img-thumbnail" alt="<?php echo $value["nombre"] ?>">
                            </picture>
                        </td>
                        <td class="fw-bold <?php echo $value["estado"] == 1 ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == "1" ? 'Activo' : 'Inactivo' ?></td>


                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>