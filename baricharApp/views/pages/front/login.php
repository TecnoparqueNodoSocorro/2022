<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] == "ok") {

        if (($_SESSION["id_cargo"]) == "1") {
            echo '<script>window.location="proveedor.php?page=phome" </script>';
        } else if (($_SESSION["id_cargo"]) == "2") {
            echo '<script>window.location="admin.php?page=ahome" </script>';
        }
    } else {
        echo '<script>window.location="index.php?page=login" </script>';
    }
}
?>
<div class="title_container">
    <div class="home_bottomS">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="contLogin col-sm-12 col-md-4 py-2">
                    <div class="bottom_icon"><img class="text-light" src="views/images/user.png" alt="" title=""></div>

                    <div class="form_row_full">
                        <label class="text-light">USUARIO</label>
                        <input type="text" class="form_input" name="user" id="user" />
                    </div>
                    <div class="form_row_full">
                        <label class="text-light">CONTRASEÑA</label>
                        <input type="password" class="form_input" name="password" id="password" />
                    </div>
                    <input type="button" class="btn btn-warning text-light" id="btnIniciar" value="INICIAR SESIÓN" style="float:none; border-color: white !important">
                    <label class="text-light">administrador
                        usuario: admin
                        clave: admin12345
                    </label>

                    <label class="text-light">proveedor
                        usuario: 45645
                        clave: 44
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="slider_container">
    <div class="slider_trans_black"></div>
    <div id="random">
        <div style="background-image: url(views/images/slider/slide1.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide3.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide4.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide5.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide6.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide7.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide8.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide9.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide10.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide11.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide12.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide13.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide14.jpg);"></div>
        <div style="background-image: url(views/images/slider/slide15.jpg);"></div>
    </div>
</div>