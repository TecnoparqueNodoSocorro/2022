
const div_ubicaciones = document.getElementById('div_ubicaciones')
let cliente_unic = document.getElementById('cliente_unic')
let name_ubic = document.getElementById('name_ubic')
let btnRegistrar_ubic = document.getElementById('btnRegistrar_ubic')


//variables para la tabla de las ubicaciones
let theadUbicaciones = document.getElementById('theadUbicaciones')
let tbodyUbicaciones = document.getElementById('tbodyUbicaciones')
let textModalUbicacion = document.getElementById('textModalUbicacion')
let edit_name_ubic = document.getElementById('edit_name_ubic')
let btnGuardarCambiosUbic = document.getElementById('btnGuardarCambiosUbic')

const id_cargo_ubicacion = document.getElementById('id_cargo').value
const id_usuario_oculto_ubicacion = document.getElementById('id_usuario_oculto').value


//SI EL ID DE USUARIO ES EL DEL CLIENTE SE OCULTA LA OPCION DE SELECCIONAR CLIENTE
if (id_cargo.value == "3") {
    //SE OCULTA EL SELECT
    cliente_unic ? cliente_unic.style.display = "none" : ''
    //SE ASIGNA EL ID DEL CLIENTE LOGUEADO
    cliente_unic.value = id_usuario_oculto_ubicacion
    //SE LISTA LOS REGISTROS DE LAS UBICACIONES
    listarUbicaciones(id_usuario_oculto_ubicacion)


}
//agregar ubicacion administrador y empleado
btnRegistrar_ubic ? btnRegistrar_ubic.addEventListener("click", UbicacionValidar) : ''
function UbicacionValidar() {
    if (cliente_unic.value == "0" || name_ubic.value == "") {
        DatosIncompletos()
        console.log(id_cargo_ubicacion)
        console.log(id_usuario_oculto_ubicacion)
    } else {
        UbicacionGuardar()
    }
}
//guardar ubicacion post
function UbicacionGuardar() {
    let ubic = {
        cliente: cliente_unic.value,
        nombre: name_ubic.value
    }
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar ubicación?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#5ac15d',
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

            $.ajax({
                data: { ubic },
                type: "POST",
                dataType: "text",
                url: "views/ajax/ubicaciones_ajax.php",
            }).done(function (data, textStatus, jqXHR) {
                console.log(data);
                if (id_cargo_ubicacion == "3") {
                    listarUbicaciones(id_usuario_oculto_ubicacion)
                } else {
                    listarUbicaciones(cliente_unic.value)
                }
                Swal.fire({
                    icon: 'success',
                    title: `Ubicación registrada`,
                    confirmButtonColor: '#5ac15d',
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

                        name_ubic.value = ""
                    }
                    return
                })

            }).fail(function (jqXHR, textStatus, errorThrown) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo procesar la solicitud ' + textStatus,
                    confirmButtonColor: '#5ac15d',

                })

            });
        }
    })
}

//listar ubicaciones al seleccionar el cliente

cliente_unic ? cliente_unic.addEventListener("change", () => {
    // console.log(cliente_unic.value);
    //cada cambio del select blanquear la tabla para no concatenar

    listarUbicaciones(cliente_unic.value)

}) : ''









//FUNCION QUE TRAE LAS UBICACIONES DE LOS CLIENTES Y LAS LISTA E UNA TABLA

function listarUbicaciones(id) {
    limpiarTabla()
    $.ajax({
        data: { id_c: id },
        type: "POST",
        dataType: "json",
        url: "views/ajax/ubicaciones_ajax.php",
    }).done(function (data, textStatus, jqXHR) {

        let response =/*  JSON.parse */(data)
        response.forEach(x => {

            theadUbicaciones.innerHTML = `
            <tr>
            <th style="width:100px">Acciones</th>
            <th>Nombre</th>
            </tr>
            `
            tbodyUbicaciones.innerHTML += `
            <tr>
            <td><button type="button" data-id="${x.id}" data-nombre="${x.nombre}" class="editUbic btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalUbicaciones" ><i class="bi bi-pencil-fill"></i></button></td>
            <td>${x.nombre}</td>
            </tr>
            `
        })
        const editUbic = document.querySelectorAll('.editUbic')
        editUbic.forEach(ub => {
            ub.addEventListener("click", (x) => {
                idUbic = ub.dataset.id
                textModalUbicacion.innerText = ub.dataset.nombre
                edit_name_ubic.value = ub.dataset.nombre
                //console.log(idUbic);
            })
        })
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se pudo procesar la solicitud ' + textStatus,
            confirmButtonColor: '#5ac15d',

        })
    })
}

function limpiarTabla() {
    theadUbicaciones.innerHTML = ``
    tbodyUbicaciones.innerHTML = ``
}


//EDITAR UBICACION ADMIN, EMPLEADO Y CLIENTE

btnGuardarCambiosUbic ? btnGuardarCambiosUbic.addEventListener("click", editarUbicacion) : ''

function editarUbicacion() {
    if (edit_name_ubic.value == "") {
        DatosIncompletos()
    } else {
        Swal.fire({
            title: 'Listo',
            text: `¿Editar ubicación?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#5ac15d',
            cancelButtonColor: '#3085d6',
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

                $.ajax({
                    data: { id: idUbic, nombre: edit_name_ubic.value },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/ubicaciones_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    /*  console.log(data, textStatus, jqXHR); */
                    $('#modalUbicaciones').modal('hide')
                    console.log(id_cargo_ubicacion)
                    console.log(id_usuario_oculto_ubicacion)
                    if (id_cargo_ubicacion == "3") {
                        listarUbicaciones(id_usuario_oculto_ubicacion)
                    } else {
                        listarUbicaciones(cliente_unic.value)
                    }

                    Swal.fire({
                        icon: 'success',
                        title: `Ubicación editada ${data}`,
                        confirmButtonColor: '#5ac15d',
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


                        }
                        return
                    })

                }).fail(function (jqXHR, textStatus, errorThrown) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#5ac15d',

                    })

                });
            }
        })
    }
}