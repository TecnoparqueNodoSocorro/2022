<div class="modal fade" id="list_prod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel"><i class="bi bi-plus-circle"></i> Adicionar</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        $productos = ControladorProductos::ctrConsultarProductos();
        ?>

        <div class="table-responsive">
          <table class="table table-sm tablacarrito">
            <thead>
              <tr>
                <th>Sumar</th>
                <!--   <th>Imagen</th> -->
                <th>Clasificacion</th>
                <th>Nombre</th>
                <th>cant</th>
                <th>Subtotal</th>
                <th>Restar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($productos as $key => $value) :  ?>
                <tr>
                  <td>
                    <div class="d-grid gap-1 d-md-block">
                      <a type="button" class="btn btn-outline-success btn-circle btn-sm sumar" data-idp='<?php echo $value["id"] ?>' data-idemp='<?php echo $value["idemp"] ?>' id="sumar"><i class="bi bi-cart-plus"></i></a>
                    </div>
                  </a>
                  </td>
                  <!--    <td> <img src=<?php echo $value["imagen"] ?> id="miniaturas" alt="">

                        </td> -->
                  <td>
                    <?php echo $value["clasificacion"] ?>
                  </td>
                  <td>
                    <?php echo $value["nombre"] ?>
                  </td>
                  <td>
                    5
                  </td>
                  <td>
                    <?php echo $value["precio"] ?>
                  </td>
                  <td>
                    <a type="button" class="btn btn-outline-danger btn-circle btn-sm restar" data-idp='<?php echo $value["id"] ?>' data-idemp='<?php echo $value["idemp"] ?>' id="restar"><i class="bi bi-cart-x"></i></a>
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

    <div class="col-4"><button class="btn-danger mt-3" onclick="CargarFacturaListener()" data-bs-toggle="modal" data-bs-target="#list_prod">Adicionar</button>
    </div>
  </div>
  <div class="col"> Fecha: 05/05/2022</div>

</div>
<table class="table">
  <thead>
    <tr>

      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Valor</th>
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

</div>