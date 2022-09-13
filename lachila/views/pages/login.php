<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        echo '<script>window.location="index.php?page=a_home" </script>';
    }
}
?>
<div class="container" style="height: 100%;">
    <div class="row mt-5" style=" display: flex;align-items: center; justify-content: center;">
        <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
            <section class="page-section">
                <div class="container">
                    <div class="bg-faded  rounded">
                        <img class="intro-img img-fluid  rounded" src="images/nuevologo.jpeg">
                    </div>
                </div>
            </section>

        </div>


        <!--      </div>
                            <div class="col-sm-12 col-md-6 col-lg-6" style=" display: flex;
                            align-items: center;
                            justify-content: center;"> -->

        <div class="col-sm-12 col-md-12 col-lg-6">
            <form method="post">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" id="doc" name="user" placeholder="Número de documento" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control" id="pass" onkeypress="return valideKey(event)" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">
                </div>


                <button type="button" id="btnIniciar" class="btn btn-danger mt-3">Ingresar</button>
            </form>

        </div>
            <!-- ---------------------------------------- Borrar---------------------------------------- -->
            <p class="text-black"> administrador
                2222
                clave:
                2222
                <br>
                empleado 1111
                clave: 1111
            </p>
            <!-- ---------------------------------------- Borrar---------------------------------------- -->
    </div>
</div>

