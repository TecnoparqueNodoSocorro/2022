// crear producto

// editar producto 

// eliminar producto 


// bloquear - habilitar producto 

/* *********************************************************************************************************************** */
//-------VARIABLES EDITAR PROVEEDOR-----------------
let emp_descr = document.getElementById('emp_descr')
let emp_email = document.getElementById('emp_email')
let emp_telefono = document.getElementById('emp_telefono')
let emp_direccion = document.getElementById('emp_direccion')
//----------------------------------------------------------------------

//-------boton que ejecuta la función de editar--------------
let btnGuardarEditProv = document.getElementById('btnGuardarEditProv')
btnGuardarEditProv ? btnGuardarEditProv.addEventListener("click", EditarProveedor) : ''

//----------------------------------------------------------------------

//-------VARIABLES CAMBIAR CLAVE PROVEEDOR-----------------

let emp_pss_0 = document.getElementById('emp_pss_0')
let emp_pass_1 = document.getElementById('emp_pass_1')
let emp_pass_2 = document.getElementById('emp_pass_2')

//-------boton que ejecuta la función de CAMBIAR LA CLAVE--------------
let btnEditClaveProv = document.getElementById('btnEditClaveProv')
btnEditClaveProv ? btnEditClaveProv.addEventListener("click", ValidarCamposClaves) : ''

//----------------------------------------------------------------------

//-----------------------------------------------------------------------------
/* btnEditProv POR DEFINIR */
let btnEditProv = document.querySelectorAll(".btnEditProv");
btnEditProv.forEach((el) => {
    el.addEventListener("click", (e) => {
        //se extraen los data atributos
        email = el.dataset.email
        tel = el.dataset.tel
        id = el.dataset.id
        desc = el.dataset.desc
        dir = el.dataset.dir
        // console.log(id);
        //se llama la funcion para que al abrir el modal aparezcan los campos llenos con la informacion de la base de datos
        DatosProveedor()
    })
})
//--------------------------------------------------------------------------------------------------

function DatosProveedor() {
    //SE LE ASIGNAN EL VALOR EXTRAIDO DE LOS DATA ATRIBUTOS A LOS CAMBIOS DE EDICION
    emp_descr.value = desc
    emp_email.value = email
    emp_telefono.value = tel
    emp_direccion.value = dir
}

function EditarProveedor() {
    if (emp_descr.value.trim() == "" || emp_email.value.trim() == "" || emp_telefono.value.trim() == "" || emp_direccion.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: `Datos incompletos`,
            showConfirmButton: true,
            confirmButtonColor: '#a20202',
        })
    } else {
        data_edit_prov = {
            descr: emp_descr.value,
            email: emp_email.value,
            tel: emp_telefono.value,
            direc: emp_direccion.value,
            id: id
        }
        console.log(data_edit_prov);

        Swal.fire({
            title: 'Listo',
            text: `Editar proveedor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#a20202',
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

                //funcion que lleva los datos al ajax
                EditarProveedorAjax(data_edit_prov)
                Swal.fire({
                    icon: 'success',
                    title: `Proveedor editado`,
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

function EditarProveedorAjax(data_edit_prov) {
    $.post("views/ajax/bari_proveedores.ajax.php", { data_edit_prov }, function (data) {
        console.log(data);
    })
}

function ValidarCamposClaves() {
    if (emp_pss_0.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: `Digite la clave actual`,
            showConfirmButton: true,
            confirmButtonColor: '#a20202',
        })
    } else if (emp_pass_1.value.trim().length < 4) {
        Swal.fire({
            icon: 'error',
            title: `La clave tiene que tener mínimo 4 carácteres`,
            showConfirmButton: true,
            confirmButtonColor: '#a20202',
        })
    } else if (emp_pass_1.value.trim() != emp_pass_2.value.trim()) {
        Swal.fire({
            icon: 'error',
            title: `Las claves no coinciden`,
            showConfirmButton: true,
            confirmButtonColor: '#a20202',
        })
    } else {
        data_cambio_clave_prov = {
            id: id,
            clave_old: emp_pss_0.value,
            clave_new: emp_pass_2.value
        }
        CambiarClave(data_cambio_clave_prov)
    }

}

function CambiarClave(data_cambio_clave_prov) {
    $.post("views/ajax/bari_proveedores.ajax.php", { data_cambio_clave_prov }, function (data) {
        //console.log(data);
        let response = data.trim()

        if (response == "Clave incorrecta") {
            Swal.fire({
                icon: 'error',
                title: `La clave es incorrecta`,
                showConfirmButton: true,
                confirmButtonColor: '#a20202',
            })
        } else if (response == "Clave cambiada exitosamente") {
            Swal.fire({
                icon: 'success',
                title: `${response}`,
                showConfirmButton: true,
                confirmButtonColor: '#a20202', allowOutsideClick: () => {
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
                    cerrarModalCambioClave()
                }
            })

        }
    })
}

function cerrarModalCambioClave() {

    $('#modal_cambio_clave').modal('hide')
}
$('#modal_cambio_clave').on('hidden.bs.modal', function () {
    $(this).find("input").val('').end()
})