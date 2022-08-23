<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "1") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
?>
<div class="container">
    <h4 class="mt-3"> Reporte de Caprinocultores</h4>
    <div class="table-responsive mt-3 mb-5">
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
<!--                     <th>Opciones</th>
 -->
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Direccion</th>
                    <th>Objetivo de la produccion</th>

                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = ControladorCaprinocultor::ctrConsultarCaprinocultores();
                ?>

                <?php foreach ($usuarios as $key => $value) : ?>
                    <tr>
                      <!--   <td><a type="button" class="btn btn-outline-danger btn-circle btn-sm" id="btnrliminac" data-idp='<?php echo $value["id"] ?>'><i class="bi bi-trash3-fill"></i></a>

                        </td> -->
                        <td><?php echo $value["nombres"] ?></td>
                        <td><?php echo $value["apellidos"] ?></td>
                        <td><?php echo $value["num_documento"] ?></td>
                        <td><?php echo $value["num_telefono"] ?></td>
                        <td><?php echo $value["direccion"] ?></td>
                        <td><?php echo $value["objetivo_produccion"] ?></td>
                        <td><?php echo $value["id_cargo"]==1 ? 'Administrador': 'Caprinocultor' ?></td>

                    </tr>

                <?php endforeach ?>


            </tbody>
        </table>
    </div>
</div>