<div class="container ">
    <div class="container rounded mt-5">
        <hr>
        <div class="text-center">
            <?php
            if (isset($_SESSION["validar_ingreso"])) {
            } else {
                echo '<script>window.location="index.php?page=login"; </script>';
            } ?>
            <!--   <?php
                    session_destroy();
                    ?>  -->
            <h1>401 error page</h1>
            <a href="index.php?page=home" class="btn btn-warning mb-3"> Volver</a>
        </div>
    </div>
</div>