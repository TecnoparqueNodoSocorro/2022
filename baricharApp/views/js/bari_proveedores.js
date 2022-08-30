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
let c_descr_emp = document.getElementById("descr_prov");
//
let c_btn_guardar = document.querySelector("#admin_btn_guardar");


// elementos del js



//listener

if (c_btn_guardar){c_btn_guardar.addEventListener("click", crearProveedor)}



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
        descr: c_descr_emp.value,
    }
    postajax(datos_proveedor);
}

};

function postajax(datos_proveedor) {
    $.post("views/ajax/bari_proveedores.ajax.php", {datos_proveedor}, function (data) {
    /*     console.log({ datos_proveedor });
        let responses = JSON.parse(data);
        console.log(responses); */
        console.log(data);
    })
}

let md_datos = document.getElementById("m_datos");
let md_editar = document.getElementById("m_editar");
let md_bloq_desb = document.getElementById("m_bloquear_desb");
let md_actualizar = document.getElementById("m_actualizar");




/* *********************************************************************************************************************** */
// actualizar vigencia
/* *********************************************************************************************************************** */
function evento1() {
console.log("actualizar")
    $('#modal_actualizar').modal('show');
    var id_actualizar = $(this).data("id");
    md_actualizar.innerHTML = `id_actualizar`;
}

/* *********************************************************************************************************************** */
// bloquear-habilitar proveedor
/* *********************************************************************************************************************** */
function evento2() {
    console.log("bloquear")
    $('#modal_bloq_desb').modal('show');
    var id_bloquear = $(this).data("id");
    md_bloq_desb.innerHTML = `id_bloquear`;
}

/* *********************************************************************************************************************** */
// editar proveedor
/* *********************************************************************************************************************** */
function evento3() {
    console.log("editar")
    $('#modal_editar').modal('show');
    var id_editar = $(this).data("id");
    md_editar.innerHTML =`id_editar `
}

/* *********************************************************************************************************************** */
// ver datos del  proveedor
/* *********************************************************************************************************************** */

function evento4() {
    console.log("ver")
    $('#modal_datos').modal('show');
    var id_ver = $(this).data("id");
    md_datos.innerHTML = `id_ver `
}