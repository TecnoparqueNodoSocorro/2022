<?php


class ControladorCategorias
{

    static public function ctrCategoria()
    {
        if (isset($_POST["cat_idemp"]) && ($_POST["cat_name"]) && ($_POST["cat_descripcion"])) {

            $tabla = "categorias";
            $datos = array(
                "idemp" => $_POST["cat_idemp"],
                "nombre" => $_POST["cat_name"],
                "desc" => $_POST["cat_descripcion"]
            );
     $respuesta = ModelCategoria::mdlRegistroC($tabla, $datos);

            return $respuesta;
        } else {
            return "error";
        }
    }


    static public function ctrConsultar(){

        $tabla = "categorias";
        $idemp = 1;
        $respuesta = ModelCategoria::mdlConsultarC($tabla, $idemp);
        return $respuesta;
    }

    static public function crtEliminaCategoria($delprod){
        $tabla = "categorias";
        $idecat= $delprod;
        $respuesta = ModelCategoria::mdlEliminaCategoria($tabla, $idecat);
        return $respuesta;
    }
}
