
//------------------------------REGISTRO DE CAPRINOCULTOR---------------------------------
let btnRegistrar = document.getElementById('btnRegistrar')
let nuevoCaprinocultor = {}

console.log(id_userOculto.value);


if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        AgregarCaprinocultor()
    })
}

function AgregarCaprinocultor() {

    let name_user = document.getElementById('name_user')
    let lastname_user = document.getElementById('lastname_user')
    let phone_user = document.getElementById('phone_user')
    let document_user = document.getElementById('document_user')
    let cargo = document.getElementById('cargo')
    let direccion = document.getElementById('direccion')
    let objetivoProduccion = document.getElementById('objetivoProduccion')


    if (objetivoProduccion.options[objetivoProduccion.selectedIndex].text == "--Seleccione el objetivo--" || cargo.options[cargo.selectedIndex].text == "--Seleccione el cargo--" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "") {
        DatosIncompletos()
    } else {
        nuevoCaprinocultor = { cargo: cargo.value, direccion: direccion.value, objetivo_produccion: objetivoProduccion.options[objetivoProduccion.selectedIndex].text, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value }

        Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo caprinocultor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#f69100',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Registrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo caprinocultor registrado `,
                    showConfirmButton: false,
                    timer: 1200
                })
                console.log(nuevoCaprinocultor);
                $.post("views/ajax/caprinocultor_ajax.php", { nuevoCaprinocultor }, function (dato) {
                    let response = (dato)
                    console.log(response);
                    setTimeout(function () {
                        location.href = 'index.php?page=a_registroCaprinocultor'
                    }, 1200);
                })
            }
        })
    }
}


// const data = new FormData(document.getElementById('formulario'));
