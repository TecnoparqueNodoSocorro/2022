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

let id;

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
function p_actualizar() {
    console.log("actualizar");
    $('#modal_actualizar').modal('show');
    md_actualizar.innerHTML = `${id}`;
    document.getElementById("vigencianueva").value="";
    let m_btn_guardar_vig = document.getElementById("btn_guardar_vig");
    m_btn_guardar_vig.addEventListener("click", ActualizarVigencia);
}
function ActualizarVigencia() {

    if (id) {
        let vigencianueva = document.getElementById("vigencianueva");
        data_VigNew = {
            id: id,
            vignew: vigencianueva.value
        }

        $.post("views/ajax/bari_proveedores.ajax.php", { data_VigNew }, function (data) {
            console.log(data);
            $('#modal_actualizar').modal('hide');
        })
    } else {
        console.log("no paso ningun id");
    }
}

/* *********************************************************************************************************************** */
// bloquear-habilitar proveedor
/* *********************************************************************************************************************** */
function p_bloq_desbloq() {
    console.log("bloquear")
    $('#modal_bloq_desb').modal('show');
    md_bloq_desb.innerHTML = `${id}`;

    let m_btn_guardar_bloq_desb = document.getElementById("btn_guardar_bloq_desb");
    if (m_btn_guardar_bloq_desb) { m_btn_guardar_bloq_desb.addEventListener("click", Bloq_DesbProveedor) }

}

function estadoActual() {
    data_VigNew = {
        id: id
    }
    $.post("views/ajax/bari_proveedores.ajax.php", { data_proveedor }, function (data) {
        console.log(data);
    })
}

function Bloq_DesbProveedor() {
    let estadoactual = document.getElementById("estadoactual");
    if (estadoactual == 1) {
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


/* *********************************************************************************************************************** */
// editar proveedor
/* *********************************************************************************************************************** */
function p_editar() {
    console.log("editar")
    $('#modal_editar').modal('show');
    md_editar.innerHTML = `${id}`;
    let m_btn_guardar_editar = document.getElementById("btn_guardar_editar");
    if (m_btn_guardar_editar) { m_btn_guardar_editar.addEventListener("click", EditarProveedor(id)) }

}
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

/* *********************************************************************************************************************** */
// editar pasww  proveedor
/* *********************************************************************************************************************** */
function p_passw() {
    console.log("paswword")
    $('#modal_passw').modal('show');
    m_passw.innerHTML = `${id}`;
    let m_btn_guardar_passw = document.getElementById("btn_g_passw");
    let datapsw1 = document.getElementById("edt_pass1").value;
    let datapsw2 = document.getElementById("edt_pass2").value;


    if (m_btn_guardar_passw) { m_btn_guardar_passw.addEventListener("click", CambiarContrasena(datapsw1, datapsw2)) }

}

function CambiarContrasena(data1, data2) {
    if (data1 == data2) {
        data_Newpass = {
            id: id,
            Newpass: data1
        }
        $.post("views/ajax/bari_proveedores.ajax.php", { data_Newpass }, function (data) {
            console.log(data);
        })
    }
    else {
        alert("contraseñas no coinciden en el modal");
    }


}
