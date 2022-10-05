//--------VARIABLES-------------------//
let municipio = document.getElementById('municipio')
let sesion = document.getElementById('sesion')
let nombre_art = document.getElementById('nombre_art')
let direccion_art = document.getElementById('direccion_art')
let coordenadas_x_art = document.getElementById('coordenadas_x_art')
let coordenadas_y_art = document.getElementById('coordenadas_y_art')
let descripcion_art = document.getElementById('descripcion_art')
let facebook_art = document.getElementById('facebook_art')
let instagram_art = document.getElementById('instagram_art')
let img1_art = document.getElementById('img1_art')
let img2_art = document.getElementById('img2_art')
let btn_guardar_art = document.getElementById('btn_guardar_art')

//--------DIV DE LOS INPUTS------------------//
let nombre_div = document.getElementById('nombre_div')
let direccion_div = document.getElementById('direccion_div')
let coordenadas_div = document.getElementById('coordenadas_div')
let descripcion_div = document.getElementById('descripcion_div')
let facebook_div = document.getElementById('facebook_div')
let instagram_div = document.getElementById('instagram_div')
let imagenes_div = document.getElementById('imagenes_div')

//json para guardar los datos 
let new_articulo = {}

//a cada cambio del select de sesion de se ejecuta la funcion select_session
sesion ? sesion.addEventListener("change", select_session) : ''


//esta funcion oculta o muestra los div de los campos de texto ya que en unas sesiones se capturan difernetes datos
function select_session() {
    if (sesion.value == "historia") {
        //---------se muestra------------------
        descripcion_div.style.display = "block"
        nombre_div.style.display = "block"
        coordenadas_div.style.display = "block"
        //--------------------------------------


        //--------se oculta------------------
        instagram_div.style.display = "none"
        facebook_div.style.display = "none"
        direccion_div.style.display = "none"
        //--------------------------------------
    }
    else if (sesion.value == "restaurantes") {
        //---------se muestra------------------
        nombre_div.style.display = "block"
        instagram_div.style.display = "block"
        facebook_div.style.display = "block"
        direccion_div.style.display = "block"
        coordenadas_div.style.display = "block"
        descripcion_div.style.display = "block"
        //--------------------------------------


        //--------se oculta------------------
        //--------------------------------------

    } else if (sesion.value == "hospedajes") {

        //---------se muestra------------------
        nombre_div.style.display = "block"
        instagram_div.style.display = "block"
        facebook_div.style.display = "block"
        direccion_div.style.display = "block"
        coordenadas_div.style.display = "block"
        descripcion_div.style.display = "block"
        //--------------------------------------

        //--------se oculta------------------
        //--------------------------------------

    }
    else if (sesion.value == "turismo") {
        //---------se muestra------------------
        nombre_div.style.display = "block"
        instagram_div.style.display = "block"
        facebook_div.style.display = "block"
        direccion_div.style.display = "block"
        coordenadas_div.style.display = "block"
        descripcion_div.style.display = "block"
        //--------------------------------------

        //--------se oculta------------------
        //--------------------------------------

    }
    else if (sesion.value == "generales") {
        //---------se muestra------------------
        nombre_div.style.display = "block"
        direccion_div.style.display = "block"
        coordenadas_div.style.display = "block"
        descripcion_div.style.display = "block"
        //--------------------------------------

        //--------se oculta------------------
        instagram_div.style.display = "none"
        facebook_div.style.display = "none"
        //--------------------------------------


    } else {
        nombre_div.style.display = "block"
        instagram_div.style.display = "block"
        facebook_div.style.display = "block"
        descripcion_div.style.display = "block"
        direccion_div.style.display = "block"
        coordenadas_div.style.display = "block"
    }

}


//boton para ejecutar la funcion que guarda el articulo
btn_guardar_art ? btn_guardar_art.addEventListener("click", caputar_datos) : ''

function caputar_datos() {
    //se valida que haya una sesion seleccionada
    if (sesion.value == "0") {
        DatosIncompletos()
    }
    if (sesion.value == "historia") {
        //se valida que los datos no se envien vacíos
        if (municipio.value == "0" || nombre_art.value.trim() == "" || coordenadas_x_art.value.trim() == "" || coordenadas_y_art.value.trim() == "" || descripcion_art.value.trim() == "") {

            DatosIncompletos()
        } else {
            //se agregan los datos al json, se envian todos los datos así esten vacios ya que algunas sesiones no necesitan todos los campos
            new_articulo = {
                municipio: municipio.value,
                nombre: nombre_art.value,
                session: sesion.value,
                direccion: direccion_art.value,
                coorx: coordenadas_x_art.value,
                coory: coordenadas_y_art.value,
                face: facebook_art.value,
                insta: instagram_art.value,
                descr: descripcion_art.value,
                img1: img1_art.value,
                img2: img2_art.value,
            }

            // se envia el json, por parametro a la funcion que lo lleva a la base de datos
            guardar_articulo(new_articulo)
        }
    } else if (sesion.value == "generales") {
        //se valida que los datos no se envien vacíos

        if (municipio.value == "0" || nombre_art.value.trim() == "" || direccion_art.value.trim() == "" || coordenadas_x_art.value.trim() == "" || coordenadas_y_art.value.trim() == "" || descripcion_art.value.trim() == "") {
            DatosIncompletos()
        }
        else {
            //se agregan los datos al json, se envian todos los datos así esten vacios ya que algunas sesiones no necesitan todos los campos
            new_articulo = {
                municipio: municipio.value,
                nombre: nombre_art.value,
                session: sesion.value,
                direccion: direccion_art.value,
                coorx: coordenadas_x_art.value,
                coory: coordenadas_y_art.value,
                face: facebook_art.value,
                insta: instagram_art.value,
                descr: descripcion_art.value,
                img1: img1_art.value,
                img2: img2_art.value,
            }
            // se envia el json, por parametro a la funcion que lo lleva a la base de datos
            guardar_articulo(new_articulo)
        }
    } else {
        //se valida que los datos no se envien vacíos
        if (municipio.value == "0" || nombre_art.value.trim() == "" || direccion_art.value.trim() == "" || coordenadas_x_art.value.trim() == "" || coordenadas_y_art.value.trim() == "" || descripcion_art.value.trim() == "" || facebook_art.value.trim() == "" || instagram_art.value.trim() == "") {
            DatosIncompletos()
        }
        else {
            //se agregan los datos al json, se envian todos los datos así esten vacios ya que algunas sesiones no necesitan todos los campos
            new_articulo = {
                municipio: municipio.value,
                nombre: nombre_art.value,
                session: sesion.value,
                direccion: direccion_art.value,
                coorx: coordenadas_x_art.value,
                coory: coordenadas_y_art.value,
                face: facebook_art.value,
                insta: instagram_art.value,
                descr: descripcion_art.value,
                img1: img1_art.value,
                img2: img2_art.value,
            }

            // se envia el json, por parametro a la funcion que lo lleva a la base de datos
            guardar_articulo(new_articulo)
        }

    }
}

//funcion para mostrar cuando a un formulario le falte algun dato
function DatosIncompletos() {
    Swal.fire({
        icon: 'error',
        title: `Datos incompletos`,
        showConfirmButton: true,
        confirmButtonColor: '#0d6efd',
        scrollbarPadding: false,
        heightAuto: false,
    })
}


//funcion que muestra la alerta de confirmacion de guardar articulo
function guardar_articulo(new_articulo) {
    Swal.fire({
        title: 'Listo',
        text: `¿Guardar Artículo?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
        confirmButtonText: 'Guardar',
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
            //llamado ajax que lleva el json que fue enviado por parametro
            $.post("views/ajax/articulos_ajax.php", { new_articulo }, function (dato) {
                console.log(dato);
            })
            Swal.fire({
                icon: 'success',
                title: `Artículo guardado`,
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',
                scrollbarPadding: false,
                heightAuto: false,
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

