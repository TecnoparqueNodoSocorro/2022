//ADMINISTRADOR

//.-----------------------------------editar cliente----------------------------------------//
// VARIABLES PARA GUARDAR LOS DATOS
let name_emp_edit = document.getElementById('name_emp_edit')
let nit_emp_edit = document.getElementById('nit_emp_edit')
let replegal_emp_edit = document.getElementById('replegal_emp_edit')
let ciudad_emp_edit = document.getElementById('ciudad_emp_edit')
let direccion_emp_edit = document.getElementById('direccion_emp_edit')
let tel_emp_edit = document.getElementById('tel_emp_edit')
let email_emp_edit = document.getElementById('email_emp_edit')
let logo_emp_edit = document.getElementById('logo_emp_edit')

//campo oculto que lleva el id del cliente
let id_cliente_oculto = document.getElementById('id_cliente_oculto')




const extIdClient_edit = document.querySelectorAll(".extIdClient_edit")
extIdClient_edit.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {
        id_c = el.dataset.id
        nombre_c = el.dataset.nombre
        document.getElementById('titulo-modal-edit').innerText = nombre_c
        infoCliente = { id: id_c }
        $.post("views/ajax/clientes_ajax.php", { infoCliente }, function (dato) {
            let response = JSON.parse(dato)
            //console.log(response);
            name_emp_edit.value = response.nombre
            nit_emp_edit.value = response.nit
            replegal_emp_edit.value = response.rep_legal
            ciudad_emp_edit.value = response.ciudad
            direccion_emp_edit.value = response.direccion
            tel_emp_edit.value = response.telefono
            email_emp_edit.value = response.email
            id_cliente_oculto.value = response.id
        })
    })
})

let formulario_edit_cliente = document.querySelector('#formulario_edit_cliente')

formulario_edit_cliente ? formulario_edit_cliente.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))


    console.log(data);
    let { name_emp_edit, nit_emp_edit, replegal_emp_edit, ciudad_emp_edit, direccion_emp_edit, tel_emp_edit, email_emp_edit } = data

    if (name_emp_edit.trim() == "" || nit_emp_edit.trim() == "" || replegal_emp_edit.trim() == "" || ciudad_emp_edit.trim() == "" || direccion_emp_edit.trim() == "" || tel_emp_edit.trim() == "" || email_emp_edit.trim() == "") {

        DatosIncompletos()
    } else {
        EditCliente()

    }
} : ''
validarImagen(logo_emp_edit)




function EditCliente() {

    Swal.fire({
        title: 'Listo',
        text: `Editar cliente?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        scrollbarPadding: false,
        heightAuto: false,
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
            //AL DARLE CLICK A CAMBIAR SE ENVIAN LOS DATOS DEL JSON 
            $.ajax({
                type: 'POST',
                url: 'views/ajax/clientes_ajax.php',
                data: new FormData(formulario_edit_cliente),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            })
                .fail(function () {
                    alert("error");
                })
            Swal.fire({
                icon: 'success',
                title: `Cliente editado`,
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



//.-----------------------------------editar empleados----------------------------------------//
// VARIABLES PARA GUARDAR LOS DATOS
let name_user_edit = document.getElementById('name_user_edit')
let lastname_user_edit = document.getElementById('lastname_user_edit')
let phone_user_edit = document.getElementById('phone_user_edit')
let document_user_edit = document.getElementById('document_user_edit')
let direccion_user_edit = document.getElementById('direccion_user_edit')
let email_user_edit = document.getElementById('email_user_edit')

const extIdEmp_edit = document.querySelectorAll(".extIdEmp_edit")
extIdEmp_edit.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {
        id_e = el.dataset.id
        nombre_e = el.dataset.nombre
        document.getElementById('titulo-modal-emp').innerText = nombre_e
        infoEmpleado = { id: id_e }
        $.post("views/ajax/usuarios_ajax.php", { infoEmpleado }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
            name_user_edit.value = response.nombres
            lastname_user_edit.value = response.apellidos
            phone_user_edit.value = response.numero_telefono
            document_user_edit.value = response.numero_documento
            email_user_edit.value = response.correo
        })
    })
})
const btnEditEmpl = document.getElementById('btnEditEmpl')

btnEditEmpl ? btnEditEmpl.addEventListener("click", CrearUsuario) : ''

function CrearUsuario() {
    if (document_user_edit.value.trim() == "" || email_user_edit.value.trim() == "" || phone_user_edit.value.trim() == "" || lastname_user_edit.value.trim() == "" || name_user_edit.value.trim() == "") {
        DatosIncompletos()
    } else {

        editUsuario = {
            // cargo: cargo_user.value,
            documento: document_user_edit.value,
            correo: email_user_edit.value,
            telefono: phone_user_edit.value,
            apellidos: lastname_user_edit.value,
            id: id_e,
            nombres: name_user_edit.value,

        }

        Swal.fire({
            title: 'Listo',
            text: `¿Editar usuario?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                $.post("views/ajax/usuarios_ajax.php", { editUsuario }, function (dato) {
                    let response = (dato)
                    console.log(response);

                     setTimeout(function () {
                         location.reload()
                     }, 1500);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Usuario editado`,
                    confirmButtonColor: '#0d6efd',
                    showConfirmButton: true,

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

