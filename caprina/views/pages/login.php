<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        echo '<script>window.location="index.php?page=home" </script>';
    }
}
?>
<div class="container">
    <div class="row" style="justify-content:center ">
        <div class="col col-sm-12 col-md-12 col-lg-8 col-xl-6">
            <section class="page-section">
                <div class="container">
                    <div class="bg-faded  rounded">
                        <img class="intro-img img-fluid  rounded" src="images/logohd.png">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6" style=" display: flex;
        align-items: center;
        justify-content: center;">
            <div class="container" style="width:100%;">

                <form method="post">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control" id="username" name="user" placeholder="Número de documento" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                        <input type="password"  class="form-control only_numbers" id="pass" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">
                    </div>

                    <button type="button" id="btnIniciar" class="btn btn-warning mt-3 mb-5">Ingresar</button>


                </form>
                <!-- ------------------------------------------------------BORRAR----------------------------------------------------------------- -->

                ADMINISTRADOR 2111
                CLAVE 1111 <br>
                CAPRINOCULTOR 2222
                CLAVE 2222
                <!-- ------------------------------------------------------BORRAR----------------------------------------------------------------- -->

            </div>

        </div>

    </div>
</div>