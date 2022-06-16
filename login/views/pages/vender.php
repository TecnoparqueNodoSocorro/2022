<!-- modal con listado de productos -->
<div class="modal fade" id="list_prod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Adicionar</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $productos = ControladorProductos::ctrConsultarProductos();
                $cantProd = count($productos);
                echo ($cantProd . " Productos disponibles en esta tienda");
                ?>


                <div class="table-responsive">
                    <table class="table table-sm tablacarrito table-hover">
                        <thead>
                            <tr>
                                <th>Clasificacion</th>
                                <th>Nombre</th>
                                <th>Agregar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $key => $value) :  ?>
                                <tr>
                                    <td>
                                        <a id="clasificacion"><?php echo $value["clasificacion"] ?></a>
                                    </td>
                                    <td>
                                        <a id="nombre"> <?php echo $value["nombre"] ?></a>
                                    </td>
                                    <input id="prod_id" name="prod_id" type="hidden" value="<?php echo $value["id"] ?>">
                                    <input id="precio" name="precio" type="hidden" value="<?php echo $value["precio"] ?>">
                                    <td>
                                        <a href="#" onclick="CargarFacturaListener()" class="btn btn-warning btn-circle btn-sm AgrePro" data_id="<?php echo $value["id"] ?>"><i class="bi bi-cart-plus"></i> 0</a>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary  btn-sm"><i class="bi bi-cart-check"></i></button>
            </div>

        </div>
    </div>
</div>

<!--  -->
<div class="container" id="fondo">

    <div class="row">
        <div class="col-8">
            <h3>Facturar Orden </h3>
        </div>
        <!-- boton que llama el  modal -->
        <div class="col-4"><button class="btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#list_prod">Adicionar</button>
        </div>
    </div>
    <div class=" col"> Fecha: 05/05/2022</div>

</div>
<table class="table">
    <thead>
        <tr>

            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
    </tbody>
</table>


<div class="container">
    <div class="row">
        <div class="col-4 totalLB">TOTAL</div>
        <div class="col-4 totalValor">$15000</div>
        <div class="col-4">
            <button class="btn-warning mb-2 BtnFacturar">Facturar</button>
        </div>


    </div>


</div>