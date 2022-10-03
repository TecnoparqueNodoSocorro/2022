
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

//--------DIV DE LOS INPUTS------------------//
let nombre_div_edit = document.getElementById('nombre_div_edit')
let direccion_div_edit = document.getElementById('direccion_div_edit')
let coordenadas_div_edit = document.getElementById('coordenadas_div_edit')
let descripcion_div_edit = document.getElementById('descripcion_div_edit')
let facebook_div_edit = document.getElementById('facebook_div_edit')
let instagram_div_edit = document.getElementById('instagram_div_edit')
let imagenes_div_edit = document.getElementById('imagenes_div_edit')



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

function cambiar_estado() {
    new_estado = {
        id: id,
        estado: estado
    }

    estado_nuevo(new_estado)

}

function estado_nuevo(new_estado) {
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

function openModalEdit() {
    $('#editar_articulo_modal').modal('show');
    get_info = {
        id: id,
        estado: estado
    }
    $.post("views/ajax/articulos_ajax.php", { get_info }, function (dato) {
        response = JSON.parse(dato)
        console.log(response);

        //se asignan los valores a las cajas
        nombre_edit.value = response.nombre,
            direccion_edit.value = response.direccion,
            coordenadas_x_edit.value = response.coordenadas_x,
            coordenadas_y_edit.value = response.coordenadas_y,
            descripcion_edit.value = response.descripcion,
            facebook_edit.value = response.facebook,
            instagram_edit.value = response.instagram
    })
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


btn_guardar_edit ? btn_guardar_edit.addEventListener("click", guardar_edit) : ''



function guardar_edit() {
    if (session == "historia") {
        if (nombre_edit.value.trim() == "" || coordenadas_x_edit.value.trim() == "" || coordenadas_y_edit.value.trim() == "" || descripcion_edit.value.trim() == "") {
            DatosIncompletos()
        } else {
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
            guardar_articulo(edit_articulo)
        }
    } else if (session == "generales") {
        if (nombre_edit.value.trim() == "" || direccion_edit.value.trim() == "" || coordenadas_x_edit.value.trim() == "" || coordenadas_y_edit.value.trim() == "" || descripcion_edit.value.trim() == "") {
            DatosIncompletos()
        } else {
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
            guardar_articulo(edit_articulo)
        }
    } else {
        if (nombre_edit.value.trim() == "" || direccion_edit.value.trim() == "" || coordenadas_x_edit.value.trim() == "" || coordenadas_y_edit.value.trim() == "" || descripcion_edit.value.trim() == "" || facebook_edit.value.trim() == "" || instagram_edit.value.trim() == "") {
            DatosIncompletos()
        } else {
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
            guardar_articulo(edit_articulo)
        }
    }

}

function guardar_articulo(edit_articulo) {

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

