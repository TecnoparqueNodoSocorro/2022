<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        if (isset($_SESSION["id_cargo"])) {
            if ($_SESSION["id_cargo"] != "2") {
                echo '<script>window.location="admin.php?page=error_credenciales"</script>';
            }
        }
    } else {
        echo '<script>window.location="index.php?page=login" </script>';
    }
} else {
    echo '<script>window.location="index.php?page=login" </script>';
}
?>
<div class="title_container">
 
    <div class="home_bottomS">

        <div class="container-fluid" id="tablas">
            <br>
            <div class="row">Gestion de Solicitudess</div>

            <hr>
            <div class="container">
                <h4>Bienvenido JUAN PABLO </h4>
            </div>
            <hr>
            <div class="row">
                <button type="button" class="btn btn-success"><i class="bi bi-plus-circle"> Adicionar</i></button>
            </div>



            <div class="table-responsive" id="proveedores">
                <table class="table caption-top">

                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>logo</th>
                            <th>Nombre</th>
                            <th>Vigencia</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>

                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check"> Actualizar Vigencia</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-lock-fill"> Bloquear</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pen"> Editar</i></a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-search"> Ver</i></a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                xxx
                            </td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                    <br><br><br>
                </table>
            </div>
        </div>

    </div>
</div>
<div class="slider_container">
    <div class="slider_trans_black"></div>
    <div id="random">
        <div style="background-image: url(views/images/slider/slide14.jpg);"></div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto o servicio</h5>

            </div>
            <div class="modal-body">


                <div class="container">
                    <form id="ContactForm" method="post" action="">
                        <br>
                        <div class="row">
                            <div class="col-12  col-md-4">
                                <label>Nombre del producto o Servicio</label>
                                <div class="select_container">
                                    <select class="form_select" name="guests" id="categoria">
                                        <option selected>---Categorias---</option>
                                        <option value="C1">Iglesias, hoteles y bodas</option>
                                        <option value="C2">Maquillaje y peinado</option>
                                        <option value="C3">Iluminacion sonido y animación</option>
                                        <option value="C4">Zapatos y recordatorios</option>
                                        <option value="C5">Planeadores de bodas</option>
                                        <option value="C6">Videos y fotografia</option>
                                        <option value="C7">Chef y pasteleros</option>
                                        <option value="C8">Anillos y accesorios</option>
                                        <option value="C9">Vestidos de novia y novio</option>
                                        <option value="C10">Tarjetas de invitación</option>
                                        <option value="C11">Bebidas y licores</option>
                                        <option value="C12">Floristeria y decoración</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Nombre del producto o Servicio</label>
                                <input type="text" class="form_input " name="product_nuevo" id="product_nombre" />
                            </div>
                            <div class="col-12  col-md-4">
                                <label>Precio</label>
                                <input type="number" class="form_input " name="product_precio" id="product_precio" />
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (1)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img1" />
                            </div>
                            <div class="col-12  col-md-6">
                                <label>Imagen (2)</label>
                                <input type="file" class="form_input " name="product_img" id="product_img2" />
                            </div>
                            <div class="col-12">
                                <label>Breve descripcion de su producto o servicio</label>
                                <textarea class="form_textarea_full" name="descr_producto" id="descr_producto"></textarea>
                            </div>

                            <div class="col-6">


                            </div>
                            <div class="col-6">

                                <button type="button" class="btn btn-success"> Guardar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>
<!-- <div class="modal-footer">
    <h1>hola</h1>
</div> -->