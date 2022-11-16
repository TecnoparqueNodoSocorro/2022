//registro de EMPLEADO
let nuevoUsuario = {}
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
// let fecha_nacimiento_user = document.getElementById('fecha_nacimiento_user')
let direccion_user = document.getElementById('direccion_user')
let clave = document.getElementById('password_user')
let claveConfir = document.getElementById('confirm_password')
// let cargo_user = document.getElementById('cargo_user')
let email_user = document.getElementById('email_user')




let btnRegistrar = document.getElementById('btnRegistrar')
btnRegistrar ? btnRegistrar.addEventListener("click", CrearUsuario) : ''

function CrearUsuario() {
    if ( document_user.value.trim() == "" ||email_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "") {
        DatosIncompletos()
    } else if (clave.value.trim().length <= 3 || clave.value.trim().length >=9) {
        Swal.fire({
            icon: 'error',
            title: `Clave mínimo 4 caracteres. máximo 8 caracteres`,
            showConfirmButton: true,
            confirmButtonColor: '#dc3545',
            timer: 1200
        })
    } else if (claveConfir.value != clave.value) {
        Swal.fire({
            icon: 'error',
            title: `Las claves no coinciden`,
            showConfirmButton: true,
            confirmButtonColor: '#dc3545',
            timer: 1200
        })
    } else {
        // el cargo se deja  quemado, solo se puede registrar empleados, se deja comentado para una futu
        //nuevoUsuario = { cargo: cargo_user.value, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value }
        nuevoUsuario = {
            // cargo: cargo_user.value,
            documento: document_user.value,
            correo: email_user.value,
            telefono: phone_user.value,
            apellidos: lastname_user.value,
            // nacimiento: fecha_nacimiento_user.value,
            nombres: name_user.value,
            clave: claveConfir.value
        }
   //     console.log(nuevoUsuario);
        Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo usuario?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Registrar',
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
                $.post("views/ajax/usuarios_ajax.php", { nuevoUsuario }, function (dato) {
                    let response = (dato)
                    console.log(response);

                    setTimeout(function () {
                        location.reload()
                    }, 1500);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo usuario registrado `,
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



// funcion para usar en los formularios
function DatosIncompletos() {
    Swal.fire({
        icon: 'error',
        title: `Datos incompletos`,
        showConfirmButton: true,
        confirmButtonColor: '#dc3545',
        timer: 1200
    })
}

//FUNCION SE LE AGREGA A LOS INPUT DE LA CONTRASEÑA DEL REGISTRO DE USUARIOS PARA QUE SOLO PERMITA EL INGRESO DE NUMEROS
$('.only_numbers').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});
