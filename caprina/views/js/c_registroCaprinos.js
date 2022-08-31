
//---------------------------------- REGISTRO  DE CAPRINOS-------------------------------------------------------------------
let id_usuario = id_userOculto.value;


let nuevoCaprino = {}
let btnRegistrarCaprino = document.getElementById('btnRegistrarCaprino')
if (btnRegistrarCaprino) {
    btnRegistrarCaprino.addEventListener("click", () => {
        RegistrarCaprinos()
    })
}





function RegistrarCaprinos() {

    let raza = document.getElementById('raza')
    let origen = document.getElementById('origen')
    let fecha_nac = document.getElementById('fecha_nac')
    let codigo = document.getElementById('codigo')
    if (codigo.value == "" || raza.value == "Seleccione la raza" || origen.value == "Seleccione el origen" || fecha_nac.value.trim() == "") {

        DatosIncompletos()
    } else {
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        nuevoCaprino = { codigo: codigo.value, raza: raza.options[raza.selectedIndex].text, origen: origen.options[origen.selectedIndex].text, fecha_nacimiento: fecha_nac.value, usuario: id_usuario }
        console.log(nuevoCaprino);
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        $.post("views/ajax/caprino_ajax.php", { nuevoCaprino }, function (dato) {
            let response = (dato)
            console.log(response);

            if (response == 1) {
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo caprino registrado `,
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
                        //SI SE CONFIRME REGARLA PAGINA
                        location.href = 'index.php?page=c_registroCaprinos'
                    }
                })
            } else if (response == 0) {
                //AL AGREGAR UN CODIGO DE UN CAPRINO Y YA EXISTE EL CODIGO 
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Código ya existente',
                    confirmButtonColor: '#f69100',
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Contacte al administrador',
                    confirmButtonColor: '#f69100',
                })
            }
        })
    }
}
//------------------------------------------------------------------------------------------------------------------------------------

