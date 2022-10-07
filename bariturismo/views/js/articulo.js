
//--------VARIABLES-------------------//

let nombre_edit = document.getElementById('nombre_edit')
let direccion_edit = document.getElementById('direccion_edit')
let coordenadas_x_edit = document.getElementById('coordenadas_x_edit')
let coordenadas_y_edit = document.getElementById('coordenadas_y_edit')
let descripcion_edit = document.getElementById('descripcion_edit')
let facebook_edit = document.getElementById('facebook_edit')
let instagram_edit = document.getElementById('instagram_edit')
let img1_edit = document.getElementById('img1_edit')
let img2_edit = document.getElementById('img2_edit')
let btn_guardar_edit = document.getElementById('btn_guardar_edit')

let idEdit = document.getElementById('idEdit')

let img1 = document.getElementById('img1')
let img11 = document.getElementById('img11')

let img2 = document.getElementById('img2')
let img22 = document.getElementById('img22')

//--------DIV DE LOS INPUTS------------------//
let nombre_div_edit = document.getElementById('nombre_div_edit')
let direccion_div_edit = document.getElementById('direccion_div_edit')
let coordenadas_div_edit = document.getElementById('coordenadas_div_edit')
let descripcion_div_edit = document.getElementById('descripcion_div_edit')
let facebook_div_edit = document.getElementById('facebook_div_edit')
let instagram_div_edit = document.getElementById('instagram_div_edit')
let imagenes_div_edit = document.getElementById('imagenes_div_edit')



//extraer el id, el estado y la sesion mediante los data atributos
let btnfull = document.querySelectorAll(".boton");
btnfull.forEach((el) => {
    el.addEventListener("click", (e) => {
        id = el.dataset.id
        estado = el.dataset.estado
        session = el.dataset.session
        // console.log(session);
        // console.log(id);
    })
})

//se crea un json con el estado actual y el id del articulo ambos datos se sacaron en la funcion anterior de los data atributos
function cambiar_estado() {
    new_estado = {
        id: id,
        estado: estado
    }
    //a la funcion de cambiar de estado se le envia por parametro el json creado anteriormente
    estado_nuevo(new_estado)

}

function estado_nuevo(new_estado) {
    //se hace la validacion de si el articulo hay que activarlo o desactivarlo esta validación es unicamente para el texto de la alerta
    //1 es activo, entonces si el estado actual es 1, la alerta mostrara el dialogo de desactivar
    if (estado == 1) {
        Swal.fire({
            title: 'Listo',
            text: `¿Desactivar Artículo?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#212529',
            scrollbarPadding: false,
            heightAuto: false,
            confirmButtonText: 'Desactivar',
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
                //se envia al ajax
                $.post("views/ajax/articulos_ajax.php", { new_estado }, function (dato) {
                    console.log(dato);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Artículo desactivado`,
                    scrollbarPadding: false,
                    heightAuto: false,
                    showConfirmButton: true,
                    confirmButtonColor: '#0d6efd',
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
    //se hace la validacion de si el articulo hay que activarlo o desactivarlo esta validación es unicamente para el texto de la alerta
    //0 es inactivo, entonces si el estado actual es 0, la alerta mostrara el dialogo de activar
    else if (estado == 0) {
        Swal.fire({
            title: 'Listo',
            text: `¿Activar Artículo?`,
            icon: 'question',
            scrollbarPadding: false,
            heightAuto: false,
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#212529',
            confirmButtonText: '¿Activar',
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
                //se envia el json creado al ajax
                $.post("views/ajax/articulos_ajax.php", { new_estado }, function (dato) {
                    console.log(dato);
                })
                Swal.fire({
                    icon: 'success',
                    title: `Artículo activado`,
                    showConfirmButton: true,
                    confirmButtonColor: '#0d6efd',
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
    } else {
        DatosImcompletos()
    }
}

function eliminar_articulo() {
    delete_articulo = {
        id: id
    }
    Swal.fire({
        title: 'Listo',
        text: `¿Eliminar Artículo?`,
        icon: 'question',
        scrollbarPadding: false,
        heightAuto: false,
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#212529',
        confirmButtonText: 'Eliminar',
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

            eliminar(delete_articulo)
            Swal.fire({
                icon: 'success',
                title: `Artículo eliminado`,
                scrollbarPadding: false,
                heightAuto: false,
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',
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

function eliminar(delete_articulo) {

    $.post("views/ajax/articulos_ajax.php", { delete_articulo }, function (dato) {
        console.log(dato);
    })
}

//funcion que se ejecuta al abrir el modal
function openModalEdit() {
    //codigo para abrir un modal
    $('#editar_articulo_modal').modal('show');
    //con los atributos data que son extraidos al darle click al boton  se crea un json
    get_info = {
        id: id,
        estado: estado
    }
    $.post("views/ajax/articulos_ajax.php", { get_info }, function (dato) {
        response = JSON.parse(dato)
        /*    console.log(response); */

        //se asignan los valores que trae de la base de datos  a las cajas del modal de editar para mostrar la informacion actual
        nombre_edit.value = response.nombre,
            direccion_edit.value = response.direccion,
            coordenadas_x_edit.value = response.coordenadas_x,
            coordenadas_y_edit.value = response.coordenadas_y,
            descripcion_edit.value = response.descripcion,
            facebook_edit.value = response.facebook,
            instagram_edit.value = response.instagram,
            idEdit.value = response.id,
        img11.src = "views/views/" + response.imagen1,
        img1.src = "views/views/" + response.imagen1,
        img22.src = "views/views/" + response.imagen2,
        img2.src = "views/views/" + response.imagen2,
        img1_edit.value = response.imagen1,
        img2_edit.value = response.imagen2


    })

    //validacion para mostrar div  y ocultar los div que no son necesarios 
    //ESTO DEPENDE DE LA SESION LA CUAL SE EXTRAE DE LOS ATRIBUTOS DATA Y SE GUARDA EN LA VARIABLE session
    if (session == "historia") {

        //---------se muestra------------------
        descripcion_div_edit.style.display = "block"
        nombre_div_edit.style.display = "block"
        coordenadas_div_edit.style.display = "block"

        //--------------------------------------

        //--------se oculta------------------
        instagram_div_edit.style.display = "none"
        facebook_div_edit.style.display = "none"
        direccion_div_edit.style.display = "none"
        //--------------------------------------

    } else if (session == "restaurantes") {
        //---------se muestra------------------
        nombre_div_edit.style.display = "block"
        instagram_div_edit.style.display = "block"
        facebook_div_edit.style.display = "block"
        direccion_div_edit.style.display = "block"
        coordenadas_div_edit.style.display = "block"
        descripcion_div_edit.style.display = "block"
        //--------------------------------------


        //--------se oculta------------------
        //--------------------------------------

    } else if (session == "hospedajes") {

        //---------se muestra------------------
        nombre_div_edit.style.display = "block"
        instagram_div_edit.style.display = "block"
        facebook_div_edit.style.display = "block"
        direccion_div_edit.style.display = "block"
        coordenadas_div_edit.style.display = "block"
        descripcion_div_edit.style.display = "block"
        //--------------------------------------


        //--------se oculta------------------
        //--------------------------------------

    } else if (session == "turismo") {
        //---------se muestra------------------
        nombre_div_edit.style.display = "block"
        instagram_div_edit.style.display = "block"
        facebook_div_edit.style.display = "block"
        direccion_div_edit.style.display = "block"
        coordenadas_div_edit.style.display = "block"
        descripcion_div_edit.style.display = "block"
        //--------------------------------------

        //--------se oculta------------------
        //--------------------------------------

    } else if (session == "generales") {
        //---------se muestra------------------
        nombre_div_edit.style.display = "block"
        direccion_div_edit.style.display = "block"
        coordenadas_div_edit.style.display = "block"
        descripcion_div_edit.style.display = "block"
        //--------------------------------------


        //--------se oculta------------------
        instagram_div_edit.style.display = "none"
        facebook_div_edit.style.display = "none"
        //--------------------------------------


    } else {
        nombre_div_edit.style.display = "block"
        instagram_div_edit.style.display = "block"
        facebook_div_edit.style.display = "block"
        descripcion_div_edit.style.display = "block"
        direccion_div_edit.style.display = "block"
        coordenadas_div_edit.style.display = "block"
    }

}
/* 
//boton que ejecuta la funcion de guardar los cambios realizados a los articulos
btn_guardar_edit ? btn_guardar_edit.addEventListener("click", guardar_edit) : ''



function guardar_edit() {
    //se valida la sesion actual para saber cuales datos son obligatorios porque  en todas las sesiones se guardan diferentes datos
    if (session == "historia") {
        if (nombre_edit.value.trim() == "" || coordenadas_x_edit.value.trim() == "" || coordenadas_y_edit.value.trim() == "" || descripcion_edit.value.trim() == "") {
            DatosIncompletos()
        } else {
            //se crea el json para enviar por ajax al controlador
            edit_articulo = {
                id: id,
                nombre: nombre_edit.value,
                direccion: direccion_edit.value,
                coorx: coordenadas_x_edit.value,
                coory: coordenadas_y_edit.value,
                face: facebook_edit.value,
                insta: instagram_edit.value,
                descr: descripcion_edit.value,
                img1: img1_edit.value,
                img2: img2_edit.value,
            }
            //se lama la funcion y como parametro se le envia el json creado anteriormente
            guardar_edit_articulo(edit_articulo)
        }
    }
    //se valida la sesion actual para saber cuales datos son obligatorios porque  en todas las sesiones se guardan diferentes datos
    else if (session == "generales") {
        if (nombre_edit.value.trim() == "" || direccion_edit.value.trim() == "" || coordenadas_x_edit.value.trim() == "" || coordenadas_y_edit.value.trim() == "" || descripcion_edit.value.trim() == "") {
            DatosIncompletos()
        } else {
            //se crea el json para enviar por ajax al controlador

            edit_articulo = {
                id: id,
                nombre: nombre_edit.value,
                direccion: direccion_edit.value,
                coorx: coordenadas_x_edit.value,
                coory: coordenadas_y_edit.value,
                face: facebook_edit.value,
                insta: instagram_edit.value,
                descr: descripcion_edit.value,
                img1: img1_edit.value,
                img2: img2_edit.value,
            }
            //se lama la funcion y como parametro se le envia el json creado anteriormente

            guardar_edit_articulo(edit_articulo)
        }
    } else {
        //se valida la sesion actual para saber cuales datos son obligatorios porque  en todas las sesiones se guardan diferentes datos

        if (nombre_edit.value.trim() == "" || direccion_edit.value.trim() == "" || coordenadas_x_edit.value.trim() == "" || coordenadas_y_edit.value.trim() == "" || descripcion_edit.value.trim() == "" || facebook_edit.value.trim() == "" || instagram_edit.value.trim() == "") {
            DatosIncompletos()
        } else {
            //se crea el json para enviar por ajax al controlador

            edit_articulo = {
                id: id,
                nombre: nombre_edit.value,
                direccion: direccion_edit.value,
                coorx: coordenadas_x_edit.value,
                coory: coordenadas_y_edit.value,
                face: facebook_edit.value,
                insta: instagram_edit.value,
                descr: descripcion_edit.value,
                img1: img1_edit.value,
                img2: img2_edit.value,
            }
            //se lama la funcion y como parametro se le envia el json creado anteriormente

            guardar_edit_articulo(edit_articulo)
        }
    }

}

//funcion coge el json con los datos y lo envia al ajax
function guardar_edit_articulo(edit_articulo) {

    Swal.fire({
        title: 'Listo',
        text: `Editar Artículo?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
        confirmButtonText: 'Editar',
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
            //llamada de ajax
            $.post("views/ajax/articulos_ajax.php", { edit_articulo }, function (dato) {
                console.log(dato);
            })
            Swal.fire({
                icon: 'success',
                title: `Artículo editado`,
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
 */


let formulario_edit_articulo = document.querySelector('#formulario_edit_articulo')

formulario_edit_articulo ? formulario_edit_articulo.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))

    let { /* img2_edit, img1_edit, */ instagram_edit, facebook_edit, descripcion_edit, coordenadas_y_edit, coordenadas_x_edit, direccion_edit, nombre_edit } = data

    /*  console.log(img11.src="dfkjshdfjksd");
 
     console.log(img1.src="dfkjshdfjksd"); */
    //se valida la sesion actual para saber cuales datos son obligatorios porque  en todas las sesiones se guardan diferentes datos
    if (session == "historia") {
        if (nombre_edit.trim() == "" || coordenadas_x_edit.trim() == "" || coordenadas_y_edit.trim() == "" || descripcion_edit.trim() == "") {
            DatosIncompletos()
        } else {

            guardar_edit_articulo()
        }
    }
    //se valida la sesion actual para saber cuales datos son obligatorios porque  en todas las sesiones se guardan diferentes datos
    else if (session == "generales") {
        if (nombre_edit.trim() == "" || direccion_edit.trim() == "" || coordenadas_x_edit.trim() == "" || coordenadas_y_edit.trim() == "" || descripcion_edit.trim() == "") {
            DatosIncompletos()
        } else {
            //se crea el json para enviar por ajax al controlador
            console.log(data);
            guardar_edit_articulo()
        }
    } else {
        //se valida la sesion actual para saber cuales datos son obligatorios porque  en todas las sesiones se guardan diferentes datos

        if (nombre_edit.trim() == "" || direccion_edit.trim() == "" || coordenadas_x_edit.trim() == "" || coordenadas_y_edit.trim() == "" || descripcion_edit.trim() == "" || facebook_edit.trim() == "" || instagram_edit.trim() == "") {
            DatosIncompletos()
        } else {
            //se crea el json para enviar por ajax al controlador
            guardar_edit_articulo()
        }
    }

} : ''

//funcion coge el json con los datos y lo envia al ajax
function guardar_edit_articulo() {

    Swal.fire({
        title: 'Listo',
        text: `Editar Artículo?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#0d6efd',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
        confirmButtonText: 'Editar',
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
            //llamada de ajax
            $.ajax({
                type: 'POST',
                url: 'views/ajax/articulos_ajax.php',
                data: new FormData(formulario_edit_articulo),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                }
            });

            Swal.fire({
                icon: 'success',
                title: `Artículo editado`,
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