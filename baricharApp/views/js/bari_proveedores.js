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

if (c_btn_guardar) { c_btn_guardar.addEventListener("click", crearProveedor) }



/* *********************************************************************************************************************** */
// crear proveedor
/* *********************************************************************************************************************** */
function crearProveedor() {

    if (c_pass_1.value != c_pass_2.value) {
        alert("error!!! Las contraseñas no coinciden");
    }
    else {
        const datos_proveedor = {
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
    $.post("views/ajax/bari_proveedores.ajax.php", { datos_proveedor }, function (data) {
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
let btnfull = document.querySelectorAll(".boton");
/* *********************************************************************************************************************** */
/* FUNCION POR DEFINIR */
btnfull.forEach((el) => {
    el.addEventListener("click", (e) => {
        id = el.dataset.id
        /*   console.log(id); */
    })
})

/* *********************************************************************************************************************** */
// actualizar vigencia
/* *********************************************************************************************************************** */
function evento1() {
    console.log("actualizar")
    $('#modal_actualizar').modal('show');
    /*    md_actualizar.innerHTML = `${id}`; */
    let vigencianueva = document.getElementById("vigencianueva");
    ActualizarVigencia(id, vigencianueva);
}

/* *********************************************************************************************************************** */
// bloquear-habilitar proveedor
/* *********************************************************************************************************************** */
function evento2() {
    console.log("bloquear")
    $('#modal_bloq_desb').modal('show');
    md_bloq_desb.innerHTML = `${id}`;
    Bloq_DesbProveedor(id);
}

/* *********************************************************************************************************************** */
// editar proveedor
/* *********************************************************************************************************************** */
function evento3() {
    console.log("editar")
    $('#modal_editar').modal('show');
    md_editar.innerHTML = `${id}`;
    EditarProveedor(id);
}

/* *********************************************************************************************************************** */
// editar pasww  proveedor
/* *********************************************************************************************************************** */
function evento4() {
    console.log("ver")
    $('#modal_passw').modal('show');
    m_passw.innerHTML = `${id}`;
    CambiarContrasena(id);
}



/* *********************************************************************************************************************** */
/* *********************************************************************************************************************** */
/* funciones modals */

function ActualizarVigencia(id, vigencianueva) {

    if (id) {
        data_VigNew = {
            id: id,
            vignew: vigencianueva
        }

        $.post("views/ajax/bari_proveedores.ajax.php", { data_VigNew }, function (data) {
            console.log(data);
        })
    } else {
        console.log("no paso ningun id");
    }
}

/* ************************************************************************************************************************* */
function Bloq_DesbProveedor(id) {
    if (id == 1) {
        //convertir a cero
        data_NewEstado = {
            id: id,
            NewEstado: 0
        }
        CambiarEstado(data_NewEstado);
    } else {
        data_NewEstado = {
            id: id,
            NewEstado: 1
        }

        CambiarEstado(data_NewEstado);
    }


}
function CambiarEstado(data_NewEstado) {
    $.post("views/ajax/bari_proveedores.ajax.php", { data_NewEstado }, function (data) {
        console.log(data);
    })
}

/* ************************************************************************************************************************* */
function EditarProveedor(id) {
    if (id) {
        data_editprov = {
            id: id
        }
        $.post("views/ajax/bari_proveedores.ajax.php", { data_editprov }, function (data) {
            let responses = JSON.parse(data);
            console.log(responses);
        })
    } else {
        console.log("sin datos ")
    }
}


/* ************************************************************************************************************************* */
function CambiarContrasena(data) {
    if (new_pass1 == new_pass2) {
        data_Newpass = {
            id: id,
            Newpass: new_pass1
        }
        $.post("views/ajax/bari_proveedores.ajax.php", { data_Newpass }, function (data) {
            console.log(data);
        })
    }
    else {
        alert("contraseñas no coinciden");
    }


}