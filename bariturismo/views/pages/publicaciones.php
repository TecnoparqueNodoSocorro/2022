<div class="container-fluid mb-5">


  <div class="table-responsive mb-5 pb-5" style="margin-top: 40px;">
    <a type="button" href="index.php?page=agregar_articulo" class="btn btn-primary mt-4 mx-2" style="float: right;">Nuevo Artículo</a>
    <?php
    $art = ControladorArticulos::ctrGetArticulos();
    // print_r($art);
    ?>
    <table class="table table-dark table-striped table-bordered  table-sm mt-1 mb-5 ar_table">
      <thead>
        <tr>

          <th>Menú</th>
          <th>Municipio</th>
          <th>Nombre</th>
          <th>Cesión</th>
          <th>Estado</th>

      </thead>
      <tbody>
        <?php foreach ($art as $key => $value) : ?>
          <tr>
            <th scope="row">
              <button id="btnGroupDrop1" type="button" data-session="<?php echo $value["sesion"] ?>" data-estado="<?php echo $value["estado"] ?>" data-id="<?php echo $value["id"] ?>" class="boton btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              </button>
              <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a onclick="cambiar_estado()" class="dropdown-item" href="#"><?php echo $value["estado"] == "1" ? 'Desactivar' : 'Activar' ?></a></li>
                <li><a onclick="openModalEdit()" class="dropdown-item" href="#">Editar</a></li>
                <li><a onclick="eliminar_articulo()" class="dropdown-item" href="#">Eliminar</a></li>
              </ul>

            </th>
            <td><?php echo $value["municipio"] ?></td>
            <td><?php echo $value["nombre"] ?></td>
            <td><?php echo $value["sesion"] ?></td>
            <td class="fw-bold <?php echo $value["estado"] == "1" ? 'text-primary' : 'text-danger' ?>"><?php echo $value["estado"] == 1 ? 'Activo' : 'Inactivo' ?></td>
          </tr>
        <?php endforeach ?>

      </tbody>
    </table>
  </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editar_articulo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar artículo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formulario_edit_articulo" enctype="multipart/form-data">
          <input type="hidden" name="idEdit" id="idEdit" value="">
          <div class="row">
            <div class="col-12 my-2 col-md-12" id="nombre_div_edit">
              <div class="input-group mb-3 ">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-font-fill"></i></span>
                <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" name="nombre_edit" id="nombre_edit">
              </div>
            </div>

            <div class="col-12 my-2 col-md-12" id="direccion_div_edit">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-signpost"></i></span>
                <input type="text" class="form-control" placeholder="Dirección" aria-label="Dirección" aria-describedby="basic-addon1" name="direccion_edit" id="direccion_edit">
              </div>
            </div>

            <div class="col-12 my-2  " id="coordenadas_div_edit">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control form-control-sm" placeholder="Coordenadas X" aria-label="Coordenadas" aria-describedby="basic-addon1" name="coordenadas_x_edit" id="coordenadas_x_edit">
                <hr>

                <input type="text" class="form-control form-control-sm" placeholder="Coordenadas Y" aria-label="Coordenadas" aria-describedby="basic-addon1" name="coordenadas_y_edit" id="coordenadas_y_edit">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 my-2" id="descripcion_div_edit">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-heading"></i></span>
                <textarea type="text" class="form-control" placeholder="Descripción" aria-label="Descripción" aria-describedby="basic-addon1" name="descripcion_edit" id="descripcion_edit"></textarea>
              </div>
            </div>

            <div class="col-12  col-md-6  my-2" id="facebook_div_edit">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-facebook"></i></span>
                <input type="text" class="form-control" placeholder="Facebook" aria-label="Facebook" aria-describedby="basic-addon1" name="facebook_edit" id="facebook_edit">
              </div>
            </div>

            <div class="col-12  col-md-6  my-2" id="instagram_div_edit">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-instagram"></i></span>
                <input type="text" class="form-control" placeholder="Instagram" aria-label="Instagram" aria-describedby="basic-addon1" name="instagram_edit" id="instagram_edit">
              </div>
            </div>
          </div>

          <div class="row" id="imagenes_div_edit">

            <div class="col-6 col-md-6  my-2">
              <picture>
              <source id="img1"  type="image/svg+xml">
                <img id="img11" class="img-fluid img-thumbnail" alt="...">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-image-fill"></i></span>
                <input type="file" class="form-control"  name="img1_edit" id="img1_edit">
              </div>
            </div>

            <div class="col-6 col-md-6  my-2">
              <picture>
                <source id="img2"  type="image/svg+xml">
                <img id="img22" class="img-fluid img-thumbnail" alt="...">
              </picture>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-image-fill"></i></span>
                <input type="file" class="form-control" name="img2_edit" id="img2_edit">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="btn_guardar_edit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>