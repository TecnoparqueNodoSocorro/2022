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
let vigenciactual = document.querySelector("vigenciactual");
let id;
let info_proveedor;
//listener

//TITULO DEL MODAL QUE MUESTRA EL ESTADO, PARA COLOCAR PROVEEDOR ACTIVO O INACTIVO EN EL TITULO
let tituloModalEstado = document.getElementById('tituloModalEstado')
//INPUT OCULTO AL CUAL SE LE AGREGA EL ESTADO PARA PODER REALIZAR LA CONSULTA SQL
let estadoactual = document.getElementById("estadoactual");

//TITULO DEL MODAL QUE MUESTRA LA VIGENCIA, PARA COLOCAR AL PROVEEDOR  EN EL TITULO
let modalTituloVigencia = document.getElementById("modalTituloVigencia");

//---------------VARIABLES PARA EDITAR UN PROVEEDOR-----------------------------------
let edit_nombre = document.getElementById("edit_nombre")
let edit_nit = document.getElementById("edit_nit")
let edit_direccion = document.getElementById("edit_direccion")
let edit_telefono = document.getElementById("edit_telefono")
let edit_email = document.getElementById("edit_email")
let edit_max_p = document.getElementById("edit_max_p")
let edit_logo = document.getElementById("edit_logo")
let edit_vigencia = document.getElementById("edit_vigencia")
let edit_user = document.getElementById("edit_user")
let edit_descr_prov = document.getElementById("edit_descr_prov")

//-------------//--------------------//--------------//--------------//--------------//--------------//-------

if (c_btn_guardar) { c_btn_guardar.addEventListener("click", crearProveedor) }



/* *********************************************************************************************************************** */
// crear proveedor
/* *********************************************************************************************************************** */
function crearProveedor() {

    if (c_pass_1.value != c_pass_2.value) {
        alert("error!!! Las contraseñas no coinciden");
    }
    else {
        let datos_proveedor = {
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


/* **************************************************** */

function infoproveedor() {
    info_proveedor = {
        id: id
    }
    console.log(info_proveedor);
    $.post("views/ajax/bari_proveedores.ajax.php", { info_proveedor }, function (data) {
        responses = JSON.parse(data);
    })
}

/* *********************************************************************************************************************** */
// actualizar vigencia
/* *********************************************************************************************************************** */

function p_actualizar() {
    console.log("actualizar");
    $('#modal_actualizar').modal('show');

    /* vigenciactual = infoproveedor();
   console.log(vigenciactual); */
    /*  */
    let info_proveedor = {
        id: id
    }
    /*  console.log(info_proveedor); */
    $.post("views/ajax/bari_proveedores.ajax.php", { info_proveedor }, function (data) {
        responses = JSON.parse(data);
        console.log(responses);
        document.getElementById("vigenciactual").innerHTML = responses.vigencia;

        modalTituloVigencia.innerText = `${responses.nombre} `

    })
    /*  */
    //md_actualizar.innerHTML = `${id}`;
    document.getElementById("vigencianueva").value = "";
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
        Swal.fire({
            title: 'Listo',
            text: `Cambiar vigencia?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Cambiar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: () => {
                const popup = Swal.getPopup()
                popup.classList.remove('swal2-show')
                setTimeout(() => {
                    popup.classList.add('animate__animated', 'animate__headShake')
                })
                setTimeout(() => {
                    popup.classList.remove('animate__animated', 'animate__headShake')
                }, 500)
                return false
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("views/ajax/bari_proveedores.ajax.php", { data_VigNew }, function (data) {
                    console.log(data);
                    $('#modal_actualizar').modal('hide');
                    location.reload();
                })
            }
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


    //----------------------------------------------------------------
    let info_proveedor = {
        id: id
    }
    /*  console.log(info_proveedor); */
    $.post("views/ajax/bari_proveedores.ajax.php", { info_proveedor }, function (data) {
        responses = JSON.parse(data);
        console.log(responses);
        //responses.estado == "1" ? md_bloq_desb.classList.add('text-info') : md_bloq_desb.classList.add('text-danger');
        estadoactual.value = responses.estado
        tituloModalEstado.innerText = `${responses.nombre} se encuentra ${responses.estado == "1" ? 'Activo' : 'Inactivo'}`
        //SE VALIDA EL ESTADO PARA MANEJAR EL TEXTO DEL SPAN Y EL TEXTO DEL BOTON
        if (responses.estado == "1") {
            //SI ESTADO ES IGUAL A 1 ENTONCES SE ESCRIBE QUE ESTÁ ACTIVO Y EL BOTON LA OPCION ES DESACTIVAR
            md_bloq_desb.innerText = 'Activo'
            m_btn_guardar_bloq_desb.innerText = 'Desactivar'
            //SE QUITA LA CLASE ANTERIOR QUE SE LE COLOCÓ
            md_bloq_desb.classList.remove('text-danger')
            //DEPENDIENDO DEL ESTADO SE CAMBIA LA CLASE PARA CAMBIAR EL COLOR DEL TEXTO
            md_bloq_desb.classList.add('text-primary')

        } else {
            //SI ES AL CONTRARIO CAMBIA LOS TEXTON
            md_bloq_desb.innerText = 'Inactivo';
            m_btn_guardar_bloq_desb.innerText = 'Activar'
            //SE QUITA LA CLASE ANTERIOR QUE SE LE COLOCÓ
            md_bloq_desb.classList.remove('text-primary')
            //DEPENDIENDO DEL ESTADO SE CAMBIA LA CLASE PARA CAMBIAR EL COLOR DEL TEXTO
            md_bloq_desb.classList.add('text-danger')
        }

        /*  md_bloq_desb.innerText == 'Activo' ? md_bloq_desb.classList.add('text-info') : md_bloq_desb.classList.remove('text-info');
         md_bloq_desb.innerText == 'Inactivo' ? md_bloq_desb.classList.add('text-danger') :  */


    })


    //----------------------------------------------------------------


    let m_btn_guardar_bloq_desb = document.getElementById("btn_guardar_bloq_desb");
    if (m_btn_guardar_bloq_desb) { m_btn_guardar_bloq_desb.addEventListener("click", Bloq_DesbProveedor) }

}


function Bloq_DesbProveedor() {
    console.log(estadoactual.value);

    if (estadoactual.value == "1") {
        //convertir a cero
        data_NewEstado = {
            id: id,
            NewEstado: 0
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Desactivar proveedor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Desactivar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: () => {
                const popup = Swal.getPopup()
                popup.classList.remove('swal2-show')
                setTimeout(() => {
                    popup.classList.add('animate__animated', 'animate__headShake')
                })
                setTimeout(() => {
                    popup.classList.remove('animate__animated', 'animate__headShake')
                }, 500)
                return false
            }
        }).then((result) => {
            if (result.isConfirmed) {
                CambiarEstado(data_NewEstado);
                Swal.fire({
                    icon: 'success',
                    title: `Proveedor desactivado`,
                    showConfirmButton: true,
                    confirmButtonColor: '#a20202',
                    allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })
            }
        })
    } else {
        data_NewEstado = {
            id: id,
            NewEstado: 1
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Activar proveedor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Activar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: () => {
                const popup = Swal.getPopup()
                popup.classList.remove('swal2-show')
                setTimeout(() => {
                    popup.classList.add('animate__animated', 'animate__headShake')
                })
                setTimeout(() => {
                    popup.classList.remove('animate__animated', 'animate__headShake')
                }, 500)
                return false
            }
        }).then((result) => {
            if (result.isConfirmed) {
                CambiarEstado(data_NewEstado);
                Swal.fire({
                    icon: 'success',
                    title: `Proveedor activado`,
                    showConfirmButton: true,
                    confirmButtonColor: '#a20202',
                    allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })
            }
        })
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
    // md_editar.innerHTML = `${id}`;
    let info_proveedor = {
        id: id
    }
    //SE EXTRAE LOS DATOS DEL PROVEEDOR
    $.post("views/ajax/bari_proveedores.ajax.php", { info_proveedor }, function (data) {
        response = JSON.parse(data);
        console.log(response);

        //SE EXTRAEN LOS DATOS QUE ESTAN EN LA BASE DE DATOS Y SE LE ASIGNANA A LOS INPUT DEL MODAL DE EDITAR
        edit_nombre.value = response.nombre
        edit_nit.value = response.nit
        edit_direccion.value = response.direccion
        edit_telefono.value = response.telefono
        edit_email.value = response.correo
        edit_max_p.value = response.maxprod
        edit_logo.value = response.logo
        edit_vigencia.value = response.vigencia
        edit_user.value = response.usuario
        edit_descr_prov.value = response.descripcion
    })

    let m_btn_guardar_editar = document.getElementById("btn_guardar_editar");
    if (m_btn_guardar_editar) { m_btn_guardar_editar.addEventListener("click", EditarProveedor) }

}
function EditarProveedor() {
    if (id) {
        /* data_editprov = {
            id: id
        } */
        //SE GUARDA EL VALUE DE LOS INPUT DEL MODAL DE EDITAR 
        let dataEdit = {
            nombre: edit_nombre.value,
            nit: edit_nit.value,
            direccion: edit_direccion.value,
            telefono: edit_telefono.value,
            email: edit_email.value,
            max_p: edit_max_p.value,
            logo: edit_logo.value,
            vigencia: edit_vigencia.value,
            user: edit_user.value,
            descr: edit_descr_prov.value,
            idproveedor: id
        }
        // console.log(dataEdit);
        Swal.fire({
            title: 'Listo',
            text: `¿Editar proveedor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            scrollbarPadding: false,
                heightAuto: false,
            confirmButtonText: 'Editar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: () => {
                const popup = Swal.getPopup()
                popup.classList.remove('swal2-show')
                setTimeout(() => {
                    popup.classList.add('animate__animated', 'animate__headShake')
                })
                setTimeout(() => {
                    popup.classList.remove('animate__animated', 'animate__headShake')
                }, 500)
                return false
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("views/ajax/bari_proveedores.ajax.php", { dataEdit }, function (data) {
                    let responses = (data);
                    //console.log(responses);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Proveedor editado`,
                    scrollbarPadding: false,
                heightAuto: false,
                    showConfirmButton: true,
                    confirmButtonColor: '#a20202',
                    allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })
            }
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

    let m_btn_guardar_passw = document.getElementById("btn_g_passw");
    let datapsw1 = document.getElementById("edt_pass1");
    let datapsw2 = document.getElementById("edt_pass2");


    if (m_btn_guardar_passw) { m_btn_guardar_passw.addEventListener("click", () => CambiarContrasena(datapsw1, datapsw2)) }

}

function CambiarContrasena(data1, data2) {
    //SE COMPARA EL VALOR DE LOS DOS PARAMETROS QUE SEA IGUAL
    if (data1.value.trim() == data2.value.trim()) {
        data_Newpass = {
            id: id,
            Newpass: data1.value
        }
        Swal.fire({
            title: 'Listo',
            text: `Cambiar clave?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
            confirmButtonText: 'Cambiar',
            cancelButtonText: 'Cancelar',
            scrollbarPadding: false,
                heightAuto: false,
            allowOutsideClick: () => {
                const popup = Swal.getPopup()
                popup.classList.remove('swal2-show')
                setTimeout(() => {
                    popup.classList.add('animate__animated', 'animate__headShake')
                })
                setTimeout(() => {
                    popup.classList.remove('animate__animated', 'animate__headShake')
                }, 500)
                return false
            }
        }).then((result) => {
            if (result.isConfirmed) {
                //AL DARLE CLICK A CAMBIAR SE ENVIAN LOS DATOS DEL JSON CON EL ID DEL USUARIO Y LA NUEVA CLAVE
                $.post("views/ajax/bari_proveedores.ajax.php", { data_Newpass }, function (data) {
                    console.log(data);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Clave editada`,
                    showConfirmButton: true,
                    scrollbarPadding: false,
                heightAuto: false,
                    confirmButtonColor: '#a20202',
                    allowOutsideClick: () => {
                        const popup = Swal.getPopup()
                        popup.classList.remove('swal2-show')
                        setTimeout(() => {
                            popup.classList.add('animate__animated', 'animate__headShake')
                        })
                        setTimeout(() => {
                            popup.classList.remove('animate__animated', 'animate__headShake')
                        }, 500)
                        return false
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })
            }
        })

    }
    else {
        Swal.fire({
            icon: 'error',
            title: `Las contraseñas no coinciden`,
            showConfirmButton: true,
            scrollbarPadding: false,
                heightAuto: false,
            confirmButtonColor: '#a20202',
        })
    }
}
/* ******************************************************** */
