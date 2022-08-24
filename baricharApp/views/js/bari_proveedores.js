let nombre = document.getElementById("nombre");
let nit = document.getElementById("nit");
let direccion = document.getElementById("direccion");
let telefono = document.getElementById("telefono");
let email = document.getElementById("email");
let max_p = document.getElementById("max_p");
let logo = document.getElementById("logo");
let vigencia = document.getElementById("vigencia");
let user = document.getElementById("user");
let pass_1 = document.getElementById("pass_1");
let pass_2 = document.getElementById("pass_2");
let descr_producto = document.getElementById("descr_producto");
let btn_guardar = document.querySelector("#btn_guardar");
let btn_cerrar = document.querySelector("#btn_cerrar");
// elementos del js



//listener





// crear proveedor
let datos_proveedor = {
    "nombre":nombre,
    "nit":nit,
    "direccion":direccion,
    "telefono":telefono,
    "email":email,
    "max_p":max_p,
    "logo":logo,
    "vigencia":vigencia,
    "user":user,
    "pass_1":pass_1,
    "pass_2":pass_2,
    "descr_producto":descr_producto,
}




$(document).on("click", "#btnGuardar", function () {

console.log(datos_proveedor);
    // postear y recibir respuesta para codificar en json
 /*    $.post("views/ajax/bari_proveedores.ajax.php", { datos_proveedor }, function (data) {
    })
        let response = $.parseJSON(data); */
});








// editar proveedor 

// cambiar vigencia 

// bloquear-habilitar proveedor 
