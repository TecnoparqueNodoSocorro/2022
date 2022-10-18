
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
    if (newclave.value.trim().length != 4) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La clave tiene que ser de 4 numeros',
            confirmButtonColor: '#5ac15d',

        })
    } else if (newclaveConfirm.value !== newclave.value) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las claves no coinciden',
            confirmButtonColor: '#5ac15d',

        })
    } else {
        newPass = { id: id, pass: newclaveConfirm.value }
        //console.log(newPass);
        Swal.fire({
            title: 'Listo',
            text: `¿Cambiar clave?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#5ac15d',
            cancelButtonColor: '#3085d6',
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