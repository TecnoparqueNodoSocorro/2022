
<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {
        echo '<script>window.location="index.php?page=home" </script>';
    }
}
?>



<div class="container" style="height: 100%;">
    <div class="row" style=" display: flex;align-items: center; justify-content: center;">
        <div class="col-sm-12 col-md-12 col-lg-8 mt-5">
            <section class="page-section">
                <div class="container">
                    <div class="bg-faded  rounded">
                    <img src="images/logohd2.png" class="img-fluid" alt="Phone image">

                    </div>
                </div>
            </section>

        </div>
      <!-- ---------------------------------------- Borrar---------------------------------------- -->
      <p class="text-black"> empleado
                2222
                clave:
                2222
                <br>
                administrador 1111
                clave: 1111
            </p>
            <!-- ---------------------------------------- Borrar---------------------------------------- -->

        <div class="col-sm-12 col-md-12 col-lg-6">
            <form method="post">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" id="username" name="user" placeholder="Número de documento" aria-label="Username" aria-describedby="basic-addon1">

                </div>
                <div class="input-group mt-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                    <input type="password"  class="form-control only_numbers" id="pass" name="password" autocomplete="on" placeholder="Contraseña" aria-label="passw" aria-describedby="passwordHelpInline">

                </div>


                <button type="button" id="btnIniciar" class="btn btn-warning mt-3 mb-5 text-light">Ingresar</button>
            </form>

        </div>
      
    </div>
</div>