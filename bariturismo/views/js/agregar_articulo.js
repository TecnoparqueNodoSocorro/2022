

//--------VARIABLES-------------------//
/* let municipio = document.getElementById('municipio') */
let sesion = document.getElementById('sesion')
/* let nombre_art = document.getElementById('nombre_art')
let direccion_art = document.getElementById('direccion_art')
let coordenadas_x_art = document.getElementById('coordenadas_x_art')
let coordenadas_y_art = document.getElementById('coordenadas_y_art')
let descripcion_art = document.getElementById('descripcion_art')
let facebook_art = document.getElementById('facebook_art')
let instagram_art = document.getElementById('instagram_art')
let img1_art = document.getElementById('img1_art')
let img2_art = document.getElementById('img2_art')
let btn_guardar_art = document.getElementById('btn_guardar_art') */

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
let formulario_guardar_art = document.querySelector('#formulario_articulo')

formulario_guardar_art ? formulario_guardar_art.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))


    console.log(data);
    let { img2_art, img1_art, instagram_art, facebook_art, descripcion_art, coordenadas_y_art, coordenadas_x_art, direccion_art, nombre_art, sesion, municipio } = data
    if (sesion == "0") {
        DatosIncompletos()
    }
    if (sesion == "historia") {
        //se valida que los datos no se envien vacíos
        if (municipio == "0" || nombre_art.trim() == "" || coordenadas_x_art.trim() == "" || coordenadas_y_art.trim() == "" || descripcion_art.trim() == "" || img1_art.size == 0 || img2_art.size == 0) {

            DatosIncompletos()
        } else {

            guardar_articulo()
        }
    } else if (sesion == "generales") {
        //se valida que los datos no se envien vacíos

        if (municipio == "0" || nombre_art.trim() == "" || direccion_art.trim() == "" || coordenadas_x_art.trim() == "" || coordenadas_y_art.trim() == "" || descripcion_art.trim() == "" || img1_art.size == 0 || img2_art.size == 0) {
            DatosIncompletos()
        }
        else {
            //se agregan los datos al json, se envian todos los datos así esten vacios ya que algunas sesiones no necesitan todos los campos

            guardar_articulo()
        }
    } else {
        //se valida que los datos no se envien vacíos
        if (municipio == "0" || nombre_art.trim() == "" || direccion_art.trim() == "" || coordenadas_x_art.trim() == "" || coordenadas_y_art.trim() == "" || descripcion_art.trim() == "" || facebook_art.trim() == "" || instagram_art.trim() == "" || img1_art.size == 0 || img2_art.size == 0) {
            DatosIncompletos()
        }
        else {

            guardar_articulo()
        }

    }



}:''

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


var fileInput = document.getElementById("img2_art");
var fileInput1 = document.getElementById("img1_art");

fileInput ?fileInput.addEventListener('change', function () {
    var filePath = this.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    var sizeByte = this.files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
    console.log(siezekiloByte);
    if (!allowedExtensions.exec(filePath)) {
        Swal.fire({
            title: 'Error de formato',
            text: `Por favor seleccione un archivo de imagen valido (JPEG/JPG/PNG)`,
            icon: 'error',
            showConfirmButton: true,
            confirmButtonColor: '#0d6efd',

        })
        fileInput.value = '';
        return false;
    } if (siezekiloByte > 650) {
        Swal.fire({
            title: 'Máximo 800kb',
            text: `Por favor seleccione un tamaño de imagen más pequeña`,
            icon: 'error',
            showConfirmButton: true,
            confirmButtonColor: '#0d6efd',

        })
        fileInput.value = '';
        return false;
    }
}):''

fileInput1 ? fileInput1.addEventListener('change', function () {
    var filePath = this.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    var sizeByte = this.files[0].size;
    var siezekiloByte = parseInt(sizeByte / 4024);
    console.log(siezekiloByte);
    if (!allowedExtensions.exec(filePath)) {
        Swal.fire({
            title: 'Error de formato',
            text: `Por favor seleccione un archivo de imagen valido (JPEG/JPG/PNG)`,
            icon: 'error',
            showConfirmButton: true,
            confirmButtonColor: '#0d6efd',

        })
        fileInput1.value = '';
        return false;
    } if (siezekiloByte > 650) {
        Swal.fire({
            title: 'Máximo 800kb',
            text: `Por favor seleccione un tamaño de imagen más pequeña`,
            icon: 'error',
            showConfirmButton: true,
            confirmButtonColor: '#0d6efd',

        })
        fileInput1.value = '';
        return false;
    }
}):''


//funcion que muestra la alerta de confirmacion de guardar articulo
function guardar_articulo() {
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

            $.ajax({
                type: 'POST',
                url: 'views/ajax/articulos_ajax.php',
                data: new FormData(formulario_guardar_art),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            });

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