// variables y constantes CAMBIAR CLAVE EMPLEADO
let contra_act = document.getElementById('contra_act')
let confirm_new_contra = document.getElementById('confirm_new_contra')
let new_contra = document.getElementById('new_contra')
const btnCambiarPass = document.getElementById('btnCambiarPass')
const id_usuario_oculto = document.getElementById('id_usuario_oculto').value
const id_cargo = document.getElementById('id_cargo').value

btnCambiarPass ? btnCambiarPass.addEventListener("click", CambiarContrasena) : ''

function CambiarContrasena() {
    if (contra_act.value.trim() == "" || confirm_new_contra.value.trim() == "" || new_contra.value.trim() == "") {
        DatosIncompletos()
    } else if (confirm_new_contra.value != new_contra.value) {
        Swal.fire({
            icon: 'error',
            title: `Las claves no coinciden`,
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            timer: 1200
        })
    } else {
        const new_pas = { id_usuario: id_usuario_oculto, pass: confirm_new_contra.value, pass_old: contra_act.value, cargo:id_cargo }
        console.log(new_pas);
        Swal.fire({
            title: 'Listo',
            text: `¿Cambiar contraseña?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#dc3545',
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
                            confirmButtonColor: '#3085d6',
                            timer: 1200
                        })
                    } else if (response.trim() == "Clave cambiada exitosamente") {
                        Swal.fire({
                            icon: 'success',
                            title: `Contraseña cambiada `,
                            confirmButtonColor: '#3085d6',
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
                                if(id_cargo=="2"){
                                
                                location.href = 'index.php?page=e_home'
                                }
                                if(id_cargo=="3"){
                                
                                    location.href = 'index.php?page=c_home'
                                    }
                            }
                        })
                    }

                })



            }
        })


    }
}