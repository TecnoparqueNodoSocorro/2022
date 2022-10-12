<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        echo '<script>window.location="index.php?page=home" </script>';
    }else{
        echo '<script>window.location="index.php?page=login" </script>';
    }
}
?>
<div class="container-fluid containerLogin">

    <div class="row mt-5">
    <!--         <div class="col-sm-12 col-md-12 col-lg-6">

                <section class="page-section">
                    <div class="container">
                        <div class="bg-faded  rounded">
                            <img class="intro-img img-fluid  rounded" src="views/images/logo5.png">

                        </div>
                    </div>
                </section>
            </div> -->

        <div class="col-sm-12 col-md-12 col-lg-12 mt-5 mb-5">
            <form method="post" style="text-align:center;">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" id="doc" name="user" placeholder="Nombre de usuario" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control only_numbers" id="pass" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">
                </div>

                <button type="button" id="btnIniciar" class="btn btn-dark mt-3">Ingresar</button>
                            <!-- ---------------------------------------- Borrar---------------------------------------- -->
            <p class="text-black"> administrador:
            user_prueba
                clave:
                pass_2002

            </p>
            <!-- ---------------------------------------- Borrar---------------------------------------- -->
            </form>
        </div>
    </div>
</div>