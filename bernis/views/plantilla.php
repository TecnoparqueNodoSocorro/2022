<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>


    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Smooch&display=swap" rel="stylesheet">



    <!-- iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="views/js/jquery-3.6.0.min.js" type="text/javascript"></script>


    <!--modal de pedido   -->
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="canasta">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-cart4"></i> Canasta de Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="carrito_compras">
                    <table class="table table sm tablacarrito" id="tabla_productos">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Cant</th>
                                <th>Valor</th>
                                <th>Subtotal</th>
                                <th>Opc</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- aqui indexa la informacion el carrito.js -->

                        </tbody>

                    </table>

                    <div class=row ">
                            <div class=" col-5">Total compra:</div>
                    <div class="col-7  totalcompra ">
                        <p></p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger btn-sm" id="btnvaciarC">Vaciar</a>
                <a href="#" class="btn btn-success btn-sm" id="btnHacerP"><i class="bi bi-whatsapp"></i>Hacer pedido</a>
              
          <!--       https://wa.me/573124624763?text= -->
            </div>
        </div>
    </div>
    </div>

    <!--  -->

</head>

<body>

    <nav class="navbar navbar-light  fixed-top" id="navbarqr" name="navbarqr">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=vitrina">Delicias Bernis</a>
            <div id="msj"></div>
            <div id="alertas"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Opciones</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-lock-fill"></i>
                                Administración</a>
                        </li>
                        <li>
                            <form method="post">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                    <input type="text" class="form-control" name="l_username" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                    <input type="password" class="form-control" name="l_password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">
                                </div>


                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </form>
                        </li>

                        <?php

                        $login = new ControladorLogin();
                        $login->ctrlogin();

                        ?>
                        <hr>
                        <div class="container" id="fondo">
                            <h3>Administracion</h3>

                            <li> <a class="nav-link" href="index.php?page=facturar"><i class="bi bi-calendar2-check"></i>
                                    Facturar</a> </li>
                            <li> <a class="nav-link " href="index.php?page=productos"><i class="bi bi-collection-fill"></i>
                                    Productos</a></li>
                            <li> <a class="nav-link " href="index.php?page=categorias"><i class="bi bi-columns"></i>
                                    Categorias</a> </li>
                            <li> <a class="nav-link " href="index.php?page=informes"><i class="bi bi-cash-coin"></i>
                                    Informes</a> </li>
                            <li> <a class="nav-link " href="index.php?page=salir"><i class="bi bi-x-circle-fill"></i>
                                    Salir</a> </li>
                        </div>
                        <hr>
                        <li> <a class="nav-link" href="index.php?page=vitrina"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?page=contactos"><i class="bi bi-whatsapp"></i> Contactenos para pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=acercade"><i class="bi bi-bookmark-heart-fill"></i> Agregar a
                                favoritos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=acercade"><i class="bi bi-info-circle-fill"></i> Acerca de ...</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="contenido">
    </div>
    <!-- rutas -->
    <?php


    if (isset($_GET["page"])) {

        if (
            $_GET["page"] == "facturar" ||
            $_GET["page"] == "productos" ||
            $_GET["page"] == "categorias" ||
            $_GET["page"] == "informes" ||
            $_GET["page"] == "contactos" ||
            $_GET["page"] == "acercade" ||
            $_GET["page"] == "agregara" ||
            $_GET["page"] == "salir" ||
            $_GET["page"] == "vitrina"
        ) {
            include "pages/" . $_GET["page"] . ".php";
        } else {
            include "pages/error.php";
        }
    } else {
        include "pages/vitrina.php";
    }

    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<link href="styles/menu.css" rel="stylesheet" type="text/css">

<script src="views/js/app.js"></script>
<script src="views/js/carrito.js"></script>
<script src="views/js/factura.js"></script>
<script src="views/js/sweetalert2.all.min.js"></script>
<script src="views/js/informes.js"></script>


</html>