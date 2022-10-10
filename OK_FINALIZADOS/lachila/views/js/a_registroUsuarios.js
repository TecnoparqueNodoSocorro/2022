//registro de usuarios
let empleado_nuevo = {}
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let nacimiento_user = document.getElementById('nacimiento_user')
let pass_user = document.getElementById('pass_user')
let confirm_pass = document.getElementById('confirm_pass')
let tbodyListarEmpleados = document.getElementById('tbodyListarEmpleados')
let cargo = document.getElementById('cargo_user')

let traerid = document.getElementById('traerid')

//let cargo_user = document.getElementById('cargo_user')
let btnRegistrar = document.getElementById('btnRegistrar')
if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        //    capturar el texto del select
        //     console.log(cosecha_user.options[cosecha_user.selectedIndex].text);

        AgregarUsuario()
    })
}

function AgregarUsuario() {
    if (cargo.value=="0" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "" || nacimiento_user.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Datos incompletos',
            confirmButtonColor: '#a20202',
        })
    } else if (pass_user.value.trim().length <= 3 || pass_user.value.trim().length >= 5) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La contraseña debe ser de 4 dígitos',
            confirmButtonColor: '#a20202',
        })
    } else if (confirm_pass.value != pass_user.value) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las contraseñas no coínciden',
            confirmButtonColor: '#a20202',
        })
    } else {
        empleado_nuevo = { cargo: cargo.value, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value, fecha_nacimiento: nacimiento_user.value, clave: pass_user.value }
        Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo empleado?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#a20202',
            cancelButtonColor: '#3085d6',
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
                $.post("views/ajax/usuarios_ajax.php", { empleado_nuevo }, function (dato) {
                    let response = (dato)
                    console.log(response);

                    setTimeout(function () {
                        location.href = 'index.php?page=a_gestionUsuarios'
                    }, 1500);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo empleado registrado `,
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
                        location.href = 'index.php?page=a_gestionUsuarios'
                    }
                })


            }
        })
    }
}

//FUNCION SE LE AGREGA A LOS INPUT DE LA CONTRASEÑA DEL REGISTRO DE USUARIOS PARA QUE SOLO PERMITA EL INGRESO DE NUMEROS
/* function valideKey(evt){
			
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
} */
$('.only_numbers').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});
