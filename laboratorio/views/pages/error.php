<div class="container ">
    <div class="container rounded mt-5">
        <hr>
        <?php
            if (isset($_SESSION["validar_ingreso"])) {
            } else {
                echo '<script>window.location="index.php?page=login"; </script>';
            } ?>

                       <?php
            session_destroy();
            ?>  
        <div class="text-center">
            <h1>404 page not found  </h1>
            <a href="index.php?page=login" class="btn btn-danger mb-3"> Home</a>
        </div>
    </div>
</div>