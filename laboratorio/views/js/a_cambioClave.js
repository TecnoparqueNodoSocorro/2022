
//variablees cambiar calve

let newclave = document.getElementById("newclave")
let newclaveConfirm = document.getElementById("newclaveConfirm")

// VARIABLES PARA GUARDAR LOS DATOS
const editPass = document.querySelectorAll(".editPass")
editPass.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {

        //console.log(el.dataset.id);
        id = el.dataset.id
        document.getElementById("modal-titulo").innerText = el.dataset.nombre

        //console.log(id);
    })
})


let btnCambiarClave = document.getElementById('cambiarClave')
btnCambiarClave ? btnCambiarClave.addEventListener("click", cambiarClave) : ""
function cambiarClave() {
    if (newclave.value.trim().length < 4) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La clave tiene que ser mínimo de 4 caracteres ',
            confirmButtonColor: '#f27474',

        })
    } else if (newclaveConfirm.value !== newclave.value) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las claves no coinciden',
            confirmButtonColor: '#f27474',

        })
    } else {
        newPass = { id: id, pass: newclaveConfirm.value }
        //console.log(newPass);
        Swal.fire({
            title: 'Listo',
            text: `¿Cambiar clave?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Cambiar',
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
                $.post("views/ajax/usuarios_ajax.php", { newPass }, function (dato) {
                    let response = (dato)
                    console.log(response);
                })
                setTimeout(function () {
                    location.reload()

                }, 1200);
                Swal.fire({

                    icon: 'success',
                    title: `Clave cambiada exitosamente`,
                    showConfirmButton: true,
                    confirmButtonColor: '#0d6efd',

                    timer: 1200,
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
$('#exampleModal').on('hidden.bs.modal', function (event) {
    $("#exampleModal input").val("");
});

//------------CAMBIO DE CLAVE CLIENTE----------------//


let newclaveClient = document.getElementById("newclaveClient")
let newclaveConfirmClient = document.getElementById("newclaveConfirmClient")

// VARIABLES PARA GUARDAR LOS DATOS
const editPassClient = document.querySelectorAll(".editPassClient")
editPassClient.forEach((el) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    el.addEventListener("click", (e) => {

        //console.log(el.dataset.id);
         idC = el.dataset.id
        document.getElementById("modal-tituloClient").innerText = el.dataset.nombre

        //console.log(id);
    })
})



let cambiarClaveClient = document.getElementById('cambiarClaveClient')
cambiarClaveClient ? cambiarClaveClient.addEventListener("click", cambiarClaveCliente) : ""
function cambiarClaveCliente() {
    if (newclaveClient.value.trim()=="") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo de contraseña no puede estar vacío',
            confirmButtonColor: '#f27474',

        })
    } else if (newclaveConfirmClient.value !== newclaveClient.value) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las claves no coinciden',
            confirmButtonColor: '#f27474',

        })
    } else {
        newPassCliente = { id: idC, pass: newclaveConfirmClient.value }
        //console.log(newPass);
        Swal.fire({
            title: 'Listo',
            text: `¿Cambiar clave?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Cambiar',
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
                $.post("views/ajax/clientes_ajax.php", { newPassCliente }, function (dato) {
                    let response = (dato)
                    console.log(response);
                })
                setTimeout(function () {
                    location.reload()

                }, 1200);
                Swal.fire({

                    icon: 'success',
                    title: `Clave cambiada exitosamente`,
                    showConfirmButton: true,
                    confirmButtonColor: '#0d6efd',

                    timer: 1200,
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






$('#modal_pass_client').on('hidden.bs.modal', function (event) {
    $("#modal_pass_client input").val("");
});