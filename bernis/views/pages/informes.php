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


<div class="container-fluid" id="diario">
    <h4>pagina de informes</h4>
    <hr>

    <div class="row g-2">
        <div class="col-4">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Fecha inicial</label>
                <input type="date" id="finicio" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Fecha final</label>
                <input type="date" id="ffinal" class="form-control form-control-sm">
            </div>
        </div>

        <?php
        $categorias = ControladorCategorias::ctrConsultar();
        ?>

        <div class="col-4">
            <label for="exampleFormControlInput1" class="form-label">Categoria</label>
            <input id="id_empresa" value=2 type="hidden">
            <select id="categorias" class="form-select form-select-sm" aria-label="Default select example">
                <option value="todas" selected>Todas las categorias</option>
                <?php foreach ($categorias as $key => $value) :  ?>
                    <option value=<?php echo $value["nombre"] ?>><?php echo $value["nombre"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button type="button" id="btnconsultar">Consultar</button>
    </div>



    <hr>

    <h4>Resultados</h4>
    <div class=" container-fluid">
        <br>
        <div class="table-responsive">
            <table id="tablaresultados" class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Cant</th>
                        <th scope="col">Cat</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody id="rtatable">
                </tbody>

            </table>
            <div class="row">
                <div class="col-6">
                    Total
                </div>

                <div class="col-6" id="totaltable">
                </div>
            </div>
        </div>
    </div>

</div>
</div>