<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bariturismo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FuturismoBari</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?page=admin">Administracion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=acercade">Acerca de ...</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=publicaciones">publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?page=home">home</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET["page"])) {
        if (
            $_GET["page"] == "admin" ||
            $_GET["page"] == "acercade" ||
            $_GET["page"] == "publicaciones" ||
            $_GET["page"] == "home" ||
            $_GET["page"] == "login"
        ) {
            include "pages/" . $_GET["page"] . ".php";
        } else {
            include "pages/error.php";
        }
    } else {
        include "pages/login.php";
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>