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
                <option value="todas" selected>Seleccione...</option>
                <?php foreach ($categorias as $key => $value) :  ?>
                    <option value=<?php echo $value["nombre"] ?>><?php echo $value["nombre"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <button id="btnconsultar">enviar</button>
    </div>



    <hr>

    <h4>Resultados</h4>
    <div class=" container-fluid">
        <br>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">cat</th>
                        <th scope="col">Cant</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
</div>

