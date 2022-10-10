<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] != "ok") {
        echo '<script>window.location="index.php?=vitrina"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?=vitrina"; </script>';
}
?>


<?php
// instanciar el metodo estatico
$registro = ControladorCategorias::ctrCategoria();
if ($registro == "ok") {
    /* LIMPIANDO STORAGE */
    echo '<script>
    if ( window.history.replaceState)
    { window.history.replaceState ( null, null, window.location.href); }
    </script>';
}
?>




<!-- MODAL CREAR CATEGORIAS -->
<div class="modal fade" id="crea_cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Adicionar Categoria</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <!-- idemp en campo oculto -->
                            <input id="cat_idemp" name="cat_idemp" type="hidden" value="1">
                            <!--  -->
                            <div class="col-6">Nombre</div>
                            <div class="col-6"><input type="text" name="cat_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">Descripcion</div>
                            <div class="col-6"> <textarea class="form-control" name="cat_descripcion" aria-label="With textarea" required></textarea></div>
                        </div>

                        <button type="submit" class="btn btn-primary  btn-sm">Agregar</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<?php
$categorias = ControladorCategorias::ctrConsultar();

?>



<div class="container" id="fondo">

    <div class="row">
        <div class="col-4">
            <h3>Categorias</h3>
        </div>
        <div class="col-4"></div>
        <div class="col-4"><button class="btn-danger" data-bs-toggle="modal" data-bs-target="#crea_cat">Adicionar</button></div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $key => $value) :  ?>

                <tr>
                    <td><?php echo $value["nombre"] ?></td>
                    <td><?php echo $value["descripcion"] ?></td>
                    <td>

                        <a type="button" class="btn btn-outline-danger btn-circle btn-sm" id="btnrliminac" data-idp='<?php echo $value["id"] ?>'><i class="bi bi-trash3-fill"></i></a>
                    </td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <hr>


</div>