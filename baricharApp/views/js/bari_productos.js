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
let id_prov_oculto = document.getElementById('id_prov_oculto')
let emp_logo = document.getElementById('emp_logo')


//----------------------------------------------------------------------

//-------boton que ejecuta la función de editar--------------
/* let btnGuardarEditProv = document.getElementById('btnGuardarEditProv')
btnGuardarEditProv ? btnGuardarEditProv.addEventListener("click", EditarProveedor) : '' */

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
    id_prov_oculto.value = id
}

const modal_prov_edit = document.querySelector('#modal_prov_edit')

modal_prov_edit ? modal_prov_edit.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))

    const inputs = document.querySelectorAll('#modal_prov_edit .form_provee_edit')

    inputs.forEach(x => {
        //console.log(x);

        if (x.value.trim() == "") {
            Swal.fire({
                title: 'Error',
                text: `Complete los campos`,
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok',
            })
        } else {
            EditarProveedor()
        }


    })

    console.log(data);
} : ''





function EditarProveedor() {

    Swal.fire({
        title: 'Listo',
        text: `¿Editar proveedor?`,
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
            $.ajax({
                type: 'POST',
                url: 'views/ajax/bari_proveedores.ajax.php',
                data: new FormData(modal_prov_edit),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            });
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


/* function EditarProveedorAjax(data_edit_prov) {
    $.post("views/ajax/bari_proveedores.ajax.php", { data_edit_prov }, function (data) {
        console.log(data);
    })
}  */

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


//validar cambio de logo desde el usuario del proveedor
validarLogo(emp_logo)
function validarLogo(fileInput) {

    fileInput ? fileInput.addEventListener('change', function () {
        var filePath = this.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        var sizeByte = this.files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        console.log(siezekiloByte);
        if (!allowedExtensions.exec(filePath)) {
            Swal.fire({
                title: 'Error de formato',
                text: `Por favor seleccione un archivo de imagen valido (JPEG/JPG/PNG)`,
                icon: 'error',
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',

            })
            fileInput.value = '';
            return false;
        } if (siezekiloByte > 650) {
            Swal.fire({
                title: 'Máximo 600 kb',
                text: `Por favor seleccione un tamaño de imagen más pequeña`,
                icon: 'error',
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',

            })
            fileInput.value = '';
            return false;
        }
    }) : ''
}