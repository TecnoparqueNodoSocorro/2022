
//---------------------------------- REGISTRO  DE CAPRINOS-------------------------------------------------------------------
let id_usuario = id_userOculto.value;


let raza = document.getElementById('raza')

//select con el origen del caprino
let origen = document.getElementById('origen')
//----------------------------------
let fecha_nac = document.getElementById('fecha_nac')
let codigoC = document.getElementById('codigo')


let codigo_madre = document.getElementById('codigo_madre')
//----------------------select genero macho------------------
let CaprinoCapado = document.getElementById('CaprinoCapado')
//------------------------------------------------------------

//----------------------select genero hembra------------------
let CaprinoParto = document.getElementById('CaprinoParto')
//------------------------------------------------------------


let nuevoCaprino = {}
let btnRegistrarCaprino = document.getElementById('btnRegistrarCaprino')
btnRegistrarCaprino ? btnRegistrarCaprino.addEventListener("click", RegistrarCaprinos) : ''


//------------select seleccion del genero del caprino-----------
let CaprinoGenero = document.getElementById('CaprinoGenero')
//-------------------------------------------------------------







//------------mostrar div para colocar el codigo de la madre--------------------------------
function MostrarDivCodigoMadre() {
    document.getElementById("divCodigoMadre").style.display = 'block';
    caprinos_hembras.value = "0"

}
//----------------------------------------------------------------------------------------------

//------------ocultar div para colocar el codigo de la madre--------------------------------
function OcultarDivCodigoMadre() {
    document.getElementById("divCodigoMadre").style.display = 'none';
}
//----------------------------------------------------------------------------------------------

//Cada cambio del select del origen oculta o muestra el div ejecutando la funcion
//se hace un condicional ternario
origen ? origen.addEventListener("change", () => {
    //cada se mueva el select del origen, el select del genero vuelve a la posicion inicial
    CaprinoGenero.value = "0"
    switch (origen.value) {
        case '2':
            MostrarDivCodigoMadre()
            break;
        case '1':
            OcultarDivCodigoMadre()
            break;
        case '3':
            OcultarDivCodigoMadre()
            break;
        default:
            OcultarDivCodigoMadre()
    }
}) : ''
//----------------------------------------------------------------------------------------------

//------------mostrar div si el genero del caprino es macho--------------------------------
function MostrarDivGeneroMacho() {
    CaprinoCapado.value = "0"
    CaprinoParto.value = "0"
    if (origen.value != "2") {
        document.getElementById("DivGeneroMacho").style.display = 'block';
        document.getElementById("DivGeneroHembra").style.display = 'none';
    }

}
//----------------------------------------------------------------------------------------------

//------------mostrar div si el genero del caprino es hembra--------------------------------
function MostrarDivGeneroHembra() {
    CaprinoCapado.value = "0"
    CaprinoParto.value = "0"
    document.getElementById("DivGeneroHembra").style.display = 'block';
    document.getElementById("DivGeneroMacho").style.display = 'none';
}
//----------------------------------------------------------------------------------------------

//------------ocultar los dos div del genero del caprino--------------------------------
function OcultarDivGenero() {
    document.getElementById("DivGeneroHembra").style.display = 'none';
    document.getElementById("DivGeneroMacho").style.display = 'none';
    CaprinoCapado.value = "0"
    CaprinoParto.value = "0"
}
//----------------------------------------------------------------------------------------------



//Cada cambio del select del genero oculta o muestra el div ejecutando la funcion 
CaprinoGenero ? CaprinoGenero.addEventListener("change", () => {
    switch (CaprinoGenero.value) {
        case 'macho':
            MostrarDivGeneroMacho()
            break;
        case 'hembra':
            MostrarDivGeneroHembra()
            break;

        default:
            OcultarDivGenero()
    }
}) : ''
//----------------------------------------------------------------------------------------------

//-----SELECT QUE MUESTRA LOS CAPRINO QUE SEAN DE GENERO HEMBRAS  PARA GUARDAR EL CODIGO DE LA MADRE---------------------------------------------
let caprinos_hembras = document.getElementById('caprinos_hembras')
//----------------------------------------------------------------------------------------------


function RegistrarCaprinos() {

    if (codigoC.value == "" || raza.value == "Seleccione la raza" || origen.value == "Seleccione el origen" || fecha_nac.value.trim() == "") {

        DatosIncompletos()
    } else if (origen.value == "2" && caprinos_hembras.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite el código de la madre del caprino',
            confirmButtonColor: '#f69100',
        })
    } else if (CaprinoGenero.value == "0") {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione el género del caprino',
            confirmButtonColor: '#f69100',
        })
    } else if (CaprinoGenero.value == "macho" && CaprinoCapado.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione si el caprino está capado o no',
            confirmButtonColor: '#f69100',
        })

    } else if (CaprinoGenero.value == "hembra" && CaprinoParto.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione si el caprino ya tuvo un parto o no',
            confirmButtonColor: '#f69100',
        })

    } else if (CaprinoGenero.value == "macho") {
        //SI EL CAPRINO ES MACHO SE ENVIA EN LA PETICION EN EL CAMPO DE DATO SI ESTÁ CAPADO O NO
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        nuevoCaprino = {
            codigo: codigoC.value,
            raza: raza.options[raza.selectedIndex].text,
            origen: origen.options[origen.selectedIndex].text,
            fecha_nacimiento: fecha_nac.value,
            usuario: id_usuario,
            genero: CaprinoGenero.value,
            dato: CaprinoCapado.value,
            codigo_madre: caprinos_hembras.value
        }
        //  console.log(nuevoCaprino);
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        $.post("views/ajax/caprino_ajax.php", { nuevoCaprino }, function (dato) {
            let response = (dato)
            //  console.log(response);

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
    } else if (CaprinoGenero.value == "hembra") {
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        nuevoCaprino = {
            codigo: codigoC.value,
            raza: raza.options[raza.selectedIndex].text,
            origen: origen.options[origen.selectedIndex].text,
            fecha_nacimiento: fecha_nac.value,
            usuario: id_usuario,
            genero: CaprinoGenero.value,
            dato: CaprinoParto.value,
            codigo_madre: caprinos_hembras.value
        }
        //  console.log(nuevoCaprino);
        //JSON CON LOS DATOS QUE SE ENVIAN AL AJAX
        $.post("views/ajax/caprino_ajax.php", { nuevoCaprino }, function (dato) {
            let response = (dato)
            //  console.log(response);

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

