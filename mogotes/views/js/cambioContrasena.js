// variables y constantes
let contra_act = document.getElementById('contra_act')
let confirm_new_contra = document.getElementById('confirm_new_contra')
let new_contra = document.getElementById('new_contra')
const btnCambiarPass = document.getElementById('btnCambiarPass')
const id_usuario_oculto = document.getElementById('id_usuario_oculto').value

btnCambiarPass ? btnCambiarPass.addEventListener("click", CambiarContrasena) : ''

function CambiarContrasena() {
    if (contra_act.value.trim() == "" || confirm_new_contra.value.trim() == "" || new_contra.value.trim() == "") {
        DatosIncompletos()
    } else if (confirm_new_contra.value.trim().length <= 3 || new_contra.value.trim().length >= 5) {
        Swal.fire({
            icon: 'error',
            title: `La clave tiene que ser de 4 números`,
            showConfirmButton: true,
            confirmButtonColor: '#5ac15d',
            timer: 1200
        })
    } else if (confirm_new_contra.value != new_contra.value) {
        Swal.fire({
            icon: 'error',
            title: `Las claves no coinciden`,
            showConfirmButton: true,
            confirmButtonColor: '#5ac15d',
            timer: 1200
        })
    } else {
        const new_pas = { id_usuario: id_usuario_oculto, pass: confirm_new_contra.value, pass_old: contra_act.value }
        console.log(new_pas);
        Swal.fire({
            title: 'Listo',
            text: `¿Cambiar contraseña?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#5ac15d',
            cancelButtonColor: '#3085d6',
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
                $.post("views/ajax/usuarios_ajax.php", { new_pas }, function (dato) {
                    let response = (dato)
                    console.log(response);
                    if (response.trim() == "Clave actual incorrecta") {
                        Swal.fire({
                            icon: 'error',
                            title: `Clave actual incorrecta`,
                            showConfirmButton: true,
                            confirmButtonColor: '#5ac15d',
                            timer: 1200
                        })
                    } else if (response.trim() == "Clave cambiada exitosamente") {
                        Swal.fire({
                            icon: 'success',
                            title: `Contraseña cambiada `,
                            confirmButtonColor: '#5ac15d',
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
                                location.href = 'index.php?page=home'
                            }
                        })
                    }

                })
        


            }
        })


    }
}