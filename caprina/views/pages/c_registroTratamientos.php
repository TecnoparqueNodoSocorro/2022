<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["id_cargo"] != "2") {
        echo '<script>window.location="index.php?page=error_credenciales"; </script>';
        return;
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
}

?>
<div class="container">

    <h4>Registro de tratamientos</h4>
    <div class="container" style="background-color:#f8deb9; border-radius:5px;">
        <div class="row justify-content-md-center">

            <div class="col-xs-12 col-sm-12  col-md-6 mb-2">
                <label class="form-label">
                    <h6> Descripción del tratamiento</h6>
                </label>
                <textarea class="form-control" placeholder="Descripción del tratamiento" style="height: 100px" id="tratamiento"></textarea>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mb-2">
                <label class="form-label">
                    <h6> Fecha de inicio del tratamiento</h6>
                </label>
                <input type="date" name="fecha_salida" id="fecha_inicio_tratamiento" class="form-control" value="" required>
            </div>
        </div>

        <!-- BOTON QUE TRAE LOS CAPRINOS, LOS ASIGNA A LA CAJA MUESTRA EL DIV Y SE OCULTA EL BOTON -->
        <input type="button" name="" id="btnTraerCaprinos" onclick="traerCaprinos()" class="btn btn-warning my-2" value="Traer Caprinos">

    </div>

    <!-- DIV QUE ESTÁ OCULTO SOLO SE MUESTRA CUANDO SE LE DA CLIC AL BOTON TRAER CAPRINOS -->
    <div class="container mb-5 pb-2" style="background-color:#f8deb9; border-radius:5px; display:none" id="divBtnGuardar">


        <div class="row">
            <!-- CONTENEDOR PRIMER DIV -->

            <div class="col-12 col-md-5" style=" text-align:right">
                <div class="badge bg-warning text-wrap my-1" style="width: 6rem; background-color: #fd7e14 !important" id="conteo_caprinos_sin">
                    
                </div>
                <div class="content1">
                    <!-- ACA VA LA LISTA DE LOS PRIMEROS CAPRINOS -->
                    <div class="list-group" id="list_group1">
                    </div>

                </div>
            </div>

            <!-- DIV EN EL QUE VAN LOS BOTONES -->
            <div class="col-12 col-md-2 my-2 ">

                <div class="btn-group-vertical">
                <input type="button" name="" onclick="check()" class="btn btn-warning btn-sm" value="Agregar">
                    <input type="button" name="" onclick="checkAll()" class="btn btn-warning btn-sm" value="Agregar todos">
                    <input type="button" name="" onclick="remove()" class="btn btn-warning  btn-sm" value="Eliminar">
                    <input type="button" name="" onclick="removeAll()" class="btn btn-warning btn-sm" value="Eliminar todos">
                </div>
            </div>

            <!-- segundo div -->

            <div class="col-12 col-md-5" style=" text-align:right">
                <div class="badge bg-warning text-wrap my-1" style="width: 6rem; background-color: #fd7e14 !important" id="conteo_caprinos_con">
                    
                </div>
                <div class="content1 mb-5">

                    <div class="list-group" id="list_group2">
                    </div>
                </div>
            </div>
        </div>



        <div class="container mb-5">
            <a name="" id="cancelarT" href="index.php?page=c_estadoCaprino" class="btn btn-danger" type="button"> Cancelar</a>
            <button name="" id="btnGuardarT" class="btn btn-warning" type="button"> Guardar</button>
        </div>
    </div>

</div>