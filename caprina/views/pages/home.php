<?php
if (isset($_SESSION["validar_ingreso"])) {
    if ($_SESSION["validar_ingreso"] != "ok") {
        echo '<script>window.location="index.php?page=error"; </script>';
    }
} else {
    echo '<script>window.location="index.php?page=error"; </script>';
}
?>
<div class="contenedor-principal">


</div>