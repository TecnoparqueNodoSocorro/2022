
//------------------------------REGISTRO DE CAPRINOCULTOR---------------------------------
let btnRegistrar = document.getElementById('btnRegistrar')
let nuevoCaprinocultor = {}

let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let direccion = document.getElementById('direccion')
let objetivoProduccion = document.getElementById('objetivoProduccion')
let claveConfir = document.getElementById('claveConfir')
let clave = document.getElementById('clave')


if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        AgregarCaprinocultor()
    })
}

function AgregarCaprinocultor() {



    if (objetivoProduccion.value == "0" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "" || direccion.value.trim() == "") {
        DatosIncompletos()
    } else if (clave.value.trim().length <= 3 || clave.value.trim().length >= 5) {
        Swal.fire({
            icon: 'error',
            title: `La clave tiene que ser de 4 números`,
            showConfirmButton: true,
            confirmButtonColor: '#f69100',
            timer: 1200
        })
    } else if (claveConfir.value != clave.value) {
        Swal.fire({
            icon: 'error',
            title: `Las claves no coinciden`,
            showConfirmButton: true,
            confirmButtonColor: '#f69100',
            timer: 1200
        })
    } else {
        //SE QUEMA EL CARGO PORQUE SOLAMENTE SE VAN A REGISTRAR CAPRINOCULTORES POR EL MOMENTO
        nuevoCaprinocultor = { cargo: 2, direccion: direccion.value, objetivo_produccion: objetivoProduccion.options[objetivoProduccion.selectedIndex].text, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value, password: clave.value }
        Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo caprinocultor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#f69100',
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
                $.post("views/ajax/caprinocultor_ajax.php", { nuevoCaprinocultor }, function (dato) {
                    let response = (dato)
                    console.log(response);

                    setTimeout(function () {
                        location.href = 'index.php?page=a_registroCaprinocultor'
                    }, 1500);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo caprinocultor registrado `,
                    confirmButtonColor: '#f69100',
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
                        location.href = 'index.php?page=a_registroCaprinocultor'
                    }
                })


            }
        })
    }
}


// const data = new FormData(document.getElementById('formulario'));
//FUNCION SE LE AGREGA A LOS INPUT DE LA CONTRASEÑA DEL REGISTRO DE USUARIOS PARA QUE SOLO PERMITA EL INGRESO DE NUMEROS
/* function valideKey(evt) {

    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;

    if (code == 8) { // backspace.
        return true;
    } else if (code >= 48 && code <= 57) { // is a number.
        return true;
    } else { // other keys.
        return false;
    }
}

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patrón de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function numero(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
} */
/* 
$("#clave").bind('keypress', function(event) {
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    }
  }); */


$('.only_numbers').on('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});

