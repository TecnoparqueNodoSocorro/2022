let c_nombre = document.getElementById("nombre");
let c_nit = document.getElementById("nit");
let c_direccion = document.getElementById("direccion");
let c_telefono = document.getElementById("telefono");
let c_email = document.getElementById("email");
let c_max_p = document.getElementById("max_p");
let c_logo = document.getElementById("logo");
let c_vigencia = document.getElementById("vigencia");
let c_user = document.getElementById("user");
let c_pass_1 = document.getElementById("pass_1");
let c_pass_2 = document.getElementById("pass_2");
let c_descr_producto = document.getElementById("descr_producto");
let c_btn_guardar = document.querySelector("#btn_guardar");
let c_btn_cerrar = document.querySelector("#btn_cerrar");

// elementos del js



//listener

c_btn_guardar.addEventListener("click", crearProveedor)

/* *********************************************************************************************************************** */
// crear proveedor
/* *********************************************************************************************************************** */
function crearProveedor() {

       if (c_pass_1.value != c_pass_2.value) {
           alert("error!!! Las contraseñas no coinciden");
       }
       else {
   const  datos_proveedor = {
        nombre: c_nombre.value,
        nit: c_nit.value,
        direccion: c_direccion.value,
        telefono: c_telefono.value,
        email: c_email.value,
        max_p: c_max_p.value,
        logo: c_logo.value,
        vigencia: c_vigencia.value,
        user: c_user.value,
        pass_1: c_pass_1.value,
        pass_2: c_pass_2.value,
        descr: c_descr_producto.value,
    }
    postajax(datos_proveedor);
}

};

function postajax(datos_proveedor) {
    $.post("views/ajax/bari_proveedores.ajax.php", {datos_proveedor}, function (data) {
        console.log({ datos_proveedor });
        let response = $.parseJSON(data);
        console.log(response);
    })
}



/* *********************************************************************************************************************** */
// editar proveedor
/* *********************************************************************************************************************** */



/* *********************************************************************************************************************** */
// cambiar vigencia
/* *********************************************************************************************************************** */










/* *********************************************************************************************************************** */
// bloquear-habilitar proveedor
/* *********************************************************************************************************************** */
