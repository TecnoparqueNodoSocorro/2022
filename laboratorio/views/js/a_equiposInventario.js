//-----------ADMINSITRADOR


//ACTIVAR O DESACTIVAR
//cada clicl del boton activar o desactivar

const ActDesact = document.querySelectorAll('.ActDesact')
ActDesact.forEach(x => {
    x.addEventListener("click", (ex) => {
        //se  extrae el id y el estado en cada click que se le de al boton para ejecutar los procesos
        const id = x.dataset.id
        const estado = x.dataset.estado
        /*         console.log(id);
                console.log(estado);
         */
        //se lanza la alerta
        Swal.fire({
            title: 'Listo',
            text: `¿${estado == 1 ? 'Desactivar' : 'Activar'} equipo?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
            confirmButtonText: `${estado == 1 ? 'Desactivar' : 'Activar'}`,
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
            //se envian los datos al ajax
            if (result.isConfirmed) {
                $.ajax({
                    data: { id: id, estado: estado },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    /*  console.log(data, textStatus, jqXHR); */
                    //la respuesta se maneja desde el backend
                    Swal.fire({
                        icon: 'success',
                        title: `${JSON.parse(data)}`,
                        confirmButtonColor: '#0d6efd',
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
                        if (result.isConfirmed) { location.reload() }
                    })

                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',

                    })

                });
            }
        })


    })
})

//COMPONENTES, TRAER, EDITAR
const TraerComponentes = document.querySelectorAll('.TraerComponentes')
//tabla de los componentes
let theadComponentesInfo = document.getElementById('theadComponentesInfo')
let tbodyComponentesInfo = document.getElementById('tbodyComponentesInfo')

//titulo moda MODAL QUE MUESTRA LA TABLA DE LOS COMPONENTES
let titulo_modal_comp = document.getElementById('titulo_modal_comp')

//titulo modal  editar componente, muestra el nombre de cada compoenente
let titulo_modal_edit_comp = document.getElementById('titulo_modal_edit_comp')

//variables campos
let componente_edit = document.getElementById('componente_edit')
let marca_edit = document.getElementById('marca_edit')
let modelo_edit = document.getElementById('modelo_edit')
let serie_edit = document.getElementById('serie_edit')
let codigo_edit = document.getElementById('codigo_edit')

//boton editar componenete
let btnGuardarEditComp = document.getElementById('btnGuardarEditComp')
TraerComponentes.forEach(x => {
    x.addEventListener("click", (ex) => {
        //LIMPIAR LA TABLA
        theadComponentesInfo.innerHTML = ``
        tbodyComponentesInfo.innerHTML = ``

        //se  extrae el id y el estado en cada click que se le de al boton para ejecutar los procesos
        const id = x.dataset.id
        //ASIGNARLE NOMBRE AL MODAL QUE MUESTRA LA TABLA DE LOS COMPONENTES
        titulo_modal_comp.innerText = x.dataset.nombre
        // console.log(id);
        $.ajax({
            data: { traerComponentes: id },
            type: "POST",
            dataType: "text",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            let response = JSON.parse(data)
            console.log(data);
            if (response.length == 0) {
                //Creación de la instancia 


                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El equipo seleccionado no registra componenetes',
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

                        $('#modal_componentes').modal('hide')

                    }
                })

            } else {

                response.forEach(x => {
                    theadComponentesInfo.innerHTML = `
                <tr>
                <th>Menú</th>
                <th>Componente</th>
                <th>marca</th>
                <th>modelo</th>
                <th>serie</th>
                <th>Cod. iden</th>
                </tr>
                `
                    tbodyComponentesInfo.innerHTML += `
                <tr>
                <td><button type="button" data-id="${x.id}" data-componente="${x.componente}" class="editarComponent btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_editar_componentes" ><i class="bi bi-pencil-fill"></i></button></td>
                <td>${x.componente}</td>
                <td>${x.marca}</td>
                <td>${x.modelo}</td>
                <td>${x.serie}</td>
                <td>${x.cod_iden}</td>
                </tr>
                `
                })
            }
            //EDITAR COMPONENTE
            const editarComponent = document.querySelectorAll('.editarComponent')

            editarComponent.forEach(x => {
                x.addEventListener("click", (ex) => {
                    //LIMPIAR LA TABLA


                    //se  extrae el id y el estado en cada click que se le de al boton para ejecutar los procesos
                    const id = x.dataset.id
                    //ASIGNARLE NOMBRE AL MODAL QUE MUESTRA LA TABLA DE LOS COMPONENTES
                    titulo_modal_edit_comp.innerText = x.dataset.componente
                    console.log(id);
                    $.ajax({
                        data: { idComponente: id },
                        type: "POST",
                        dataType: "text",
                        url: "views/ajax/equipos_ajax.php",
                    }).done(function (data, textStatus, jqXHR) {
                        console.log(data);
                        let response = JSON.parse(data)
                        componente_edit.value = response.componente
                        marca_edit.value = response.marca
                        modelo_edit.value = response.modelo
                        serie_edit.value = response.serie
                        codigo_edit.value = response.cod_iden
                    })
                    btnGuardarEditComp ? btnGuardarEditComp.addEventListener("click", () => {

                        editarComponente(id)
                    }) : ''
                })
            })
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo procesar la solicitud ' + textStatus,
                    confirmButtonColor: '#0d6efd',

                })
            })
    })
})


// 

function editarComponente(id) {
    if (componente_edit.value.trim() == "" ||
        marca_edit.value.trim() == "" ||
        modelo_edit.value.trim() == "" ||
        serie_edit.value.trim() == "" ||
        codigo_edit.value.trim() == ""
    ) {
        DatosIncompletos()
    } else {
        const dataComponent = {
            componente: componente_edit.value,
            marca: marca_edit.value,
            modelo: modelo_edit.value,
            serie: serie_edit.value,
            codigo: codigo_edit.value,
            id: id
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Editar componenete?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                    data: { dataComponent },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    console.log(data);

                    Swal.fire({
                        icon: 'success',
                        title: JSON.parse(data),
                        confirmButtonColor: '#0d6efd',
                        cancelButtonColor: '#dc3545',
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

                            location.reload()
                        }
                        return
                    })

                }).fail(function (jqXHR, textStatus, errorThrown) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',

                    })

                });
            }
        })
    }

}


//TRAER DESCRIPCION DE EQUIPO

//titulo modal editar descripcion general
let titulo_modal_descrip = document.getElementById('titulo_modal_descrip')
let regEqui_nombre_edit = document.getElementById('regEqui_nombre_edit')
let regEqui_ident_edit = document.getElementById('regEqui_ident_edit')
let regEqui_marca_edit = document.getElementById('regEqui_marca_edit')
let regEqui_modelo_edit = document.getElementById('regEqui_modelo_edit')
let regEqui_fabr_edit = document.getElementById('regEqui_fabr_edit')
let regEqui_serie_edit = document.getElementById('regEqui_serie_edit')
let regEqui_lote_edit = document.getElementById('regEqui_lote_edit')
let regEqui_tipo_edit = document.getElementById('regEqui_tipo_edit')
let regEqui_equipo_edit = document.getElementById('regEqui_equipo_edit')
let regEqui_clasificacion_bio_edit = document.getElementById('regEqui_clasificacion_bio_edit')
let regEqui_doc_sanitario_edit = document.getElementById('regEqui_doc_sanitario_edit')
let regEqui_clasificacion_riesgo_edit = document.getElementById('regEqui_clasificacion_riesgo_edit')
let regEqui_pqs_oms_edit = document.getElementById('regEqui_pqs_oms_edit')
let regEqui_codigo_umdns_edit = document.getElementById('regEqui_codigo_umdns_edit')
let imagen_equipo_edit = document.getElementById('imagen_equipo_edit')
let imagePreview_edit = document.getElementById('imagePreview_edit')
let regEqui_uso_previsto_edit = document.getElementById('regEqui_uso_previsto_edit')
let imageUpload_edit = document.getElementById('imageUpload_edit')

//id del registro oculto para enviarlo en el formdata
let id_oculto_registro = document.getElementById('id_oculto_registro')


//se valida el peso de la imagen
validarImagenRe(imageUpload_edit)

const TraerDescrip = document.querySelectorAll('.TraerDescrip')
TraerDescrip.forEach(x => {
    x.addEventListener("click", (ex) => {
        //se  extrae el id y el estado en cada click que se le de al boton para ejecutar los procesos
        const id = x.dataset.id

        titulo_modal_descrip.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { traerDescrip: id },
            type: "POST",
            dataType: "text",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            let response = JSON.parse(data)
            console.log(response);

            regEqui_nombre_edit.value = response.nombre
            regEqui_ident_edit.value = response.codigo
            regEqui_marca_edit.value = response.marca
            regEqui_modelo_edit.value = response.modelo
            regEqui_fabr_edit.value = response.fabricante
            regEqui_serie_edit.value = response.serie
            regEqui_lote_edit.value = response.lote
            regEqui_tipo_edit.value = response.tipo
            regEqui_equipo_edit.value = response.equipo
            regEqui_clasificacion_bio_edit.value = response.claficacion_bio
            regEqui_doc_sanitario_edit.value = response.doc_sanitario
            regEqui_clasificacion_riesgo_edit.value = response.clasif_riesgo
            regEqui_pqs_oms_edit.value = response.pqs_oms
            regEqui_codigo_umdns_edit.value = response.codigo_umdns
            regEqui_uso_previsto_edit.value = response.uso_previsto
            id_oculto_registro.value = response.id
            imagePreview_edit.style.backgroundImage = `url(views/views/${response.imagen})`
            editarDescripcion(id)
        })
    })
})

//codigo imagen registro equipo
function readURLEdit(input) {
    if (input.files && input.files[0]) {
        if (input.files[0].size / 1024 > 650) {
            return false
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview_edit').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview_edit').hide();
            $('#imagePreview_edit').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload_edit").change(function () {
    readURLEdit(this)
});

//funcion editar equipo
function editarDescripcion(id) {
    const formEdit = document.getElementById('formEdit')
    formEdit ? formEdit.onsubmit = async (e) => {
        e.preventDefault()
        let data = Object.fromEntries(new FormData(e.target))
        if (
            regEqui_nombre_edit.value == "" ||
            regEqui_ident_edit.value == "" ||
            regEqui_marca_edit.value == "" ||
            regEqui_modelo_edit.value == "" ||
            regEqui_fabr_edit.value == "" ||
            regEqui_serie_edit.value == "" ||
            regEqui_lote_edit.value == "" ||
            regEqui_tipo_edit.value == "" ||
            regEqui_equipo_edit.value == "0" ||
            regEqui_clasificacion_bio_edit.value == "0" ||
            regEqui_doc_sanitario_edit.value == "0" ||
            regEqui_clasificacion_riesgo_edit.value == "0" ||
            regEqui_pqs_oms_edit.value == "" ||
            regEqui_codigo_umdns_edit.value == "" ||
            regEqui_uso_previsto_edit.value == ""
        ) {
            DatosIncompletos()
        } else {

            // console.log(data);
            Swal.fire({
                title: 'Listo',
                text: `¿Editar descripción?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
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
                        type: 'POST',
                        url: 'views/ajax/equipos_ajax.php',
                        data: new FormData(formEdit),
                        contentType: false,
                        cache: false,
                        processData: false,

                    }).done(function (data, textStatus, jqXHR) {

                        const response = data.trim()
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: response,
                            confirmButtonColor: '#0d6efd',
                            cancelButtonColor: '#dc3545',
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

                                location.reload()
                            }
                            return
                        })
                    }).fail(function (jqXHR, textStatus, errorThrown) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo procesar la solicitud ' + textStatus,
                            confirmButtonColor: '#0d6efd',

                        })

                    });
                }
            })
        }

    } : ''
}


//boton editar ubicacion
let editUbic = document.querySelectorAll('.editUbic')
//titulo modal editar ubicacion
let titulo_modal_editarUbicacion = document.getElementById('titulo_modal_editarUbicacion')
//select a rellenar
let ubicacion_editar = document.getElementById('ubicacion_editar')
//boton cambiar ubicacion
let btnCambiarUbicacion = document.getElementById('btnCambiarUbicacion')


editUbic.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id_cliente = x.dataset.id_cliente
        const id = x.dataset.id

        console.log(id_cliente);
        console.log(id);

        titulo_modal_editarUbicacion.innerText = x.dataset.nombre
        traerUbicaciones(id_cliente, ubicacion_editar)
        btnCambiarUbicacion ? btnCambiarUbicacion.addEventListener("click", () => EditarUbicacion(id, ubicacion_editar.value)) : ''
    })
})

function EditarUbicacion(equipo, idUbic) {
    if (ubicacion_editar.value == "0") {
        DatosIncompletos()
    } else {
        // console.log(data);
        Swal.fire({
            title: 'Listo',
            text: `¿Editar ubicación?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                    data: { equipo: equipo, new_ubic: idUbic },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    /*  console.log(data, textStatus, jqXHR); */
                    //la respuesta se maneja desde el backend
                    let response =

                        (data)
                    if (response == "Error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo procesar la solicitud ',
                            confirmButtonColor: '#0d6efd',

                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: `${response}`,
                            confirmButtonColor: '#0d6efd',
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
                            if (result.isConfirmed) { location.reload() }
                        })
                    }

                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',

                    })

                });


            }
        })
    }
}

//editar regsitro tecnico 
let regEqui_fuente_alimentacion_edit = document.getElementById('regEqui_fuente_alimentacion_edit')
let regEqui_tec_predominante_edit = document.getElementById('regEqui_tec_predominante_edit')
let regEqui_tension_edit = document.getElementById('regEqui_tension_edit')
let regEqui_corriente_edit = document.getElementById('regEqui_corriente_edit')
let regEqui_potencia_edit = document.getElementById('regEqui_potencia_edit')
let regEqui_temperatura_edit = document.getElementById('regEqui_temperatura_edit')
let regEqui_humedad_edit = document.getElementById('regEqui_humedad_edit')
let regEqui_peso_edit = document.getElementById('regEqui_peso_edit')
let regEqui_dimensiones_edit = document.getElementById('regEqui_dimensiones_edit')
let regEqui_otros_edit = document.getElementById('regEqui_otros_edit')


//boton para enviar los datos y realizar registro
let btnCambiarRegistroT = document.getElementById('btnCambiarRegistroT')

//titulo modal editar ubicacion
let titulo_modal_editarRegistroTecnico = document.getElementById('titulo_modal_editarRegistroTecnico')
// btn para extraer el id de cada registro que se selecciona
let editRegistro = document.querySelectorAll('.editRegistro')

editRegistro.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id = x.dataset.id
        titulo_modal_editarRegistroTecnico.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { traerDescrip: id },
            type: "POST",
            dataType: "text",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            let response = JSON.parse(data)
            console.log(response);
            regEqui_fuente_alimentacion_edit.value = response.fuente_alimentacion
            regEqui_tec_predominante_edit.value = response.tec_predominante
            regEqui_tension_edit.value = response.tension
            regEqui_corriente_edit.value = response.corriente
            regEqui_potencia_edit.value = response.potencia
            regEqui_temperatura_edit.value = response.temperatura
            regEqui_humedad_edit.value = response.humedad
            regEqui_peso_edit.value = response.peso
            regEqui_dimensiones_edit.value = response.dimensiones
            regEqui_otros_edit.value = response.otro

            btnCambiarRegistroT ? btnCambiarRegistroT.addEventListener("click", () => editarRegistroTecnico(id)) : ''

        })

    })
})
function editarRegistroTecnico(id) {
    if (
        regEqui_fuente_alimentacion_edit.value.trim() == "" ||
        regEqui_tec_predominante_edit.value.trim() == "" ||
        regEqui_tension_edit.value.trim() == "" ||
        regEqui_corriente_edit.value.trim() == "" ||
        regEqui_potencia_edit.value.trim() == "" ||
        regEqui_temperatura_edit.value.trim() == "" ||
        regEqui_humedad_edit.value.trim() == "" ||
        regEqui_peso_edit.value.trim() == "" ||
        regEqui_dimensiones_edit.value.trim() == "" ||
        regEqui_otros_edit.value.trim() == ""

    ) {
        DatosIncompletos()
    } else {
        const datosRegistroTecnico = {
            id: id,
            fuente_alimentacion: regEqui_fuente_alimentacion_edit.value,
            tec_predominante: regEqui_tec_predominante_edit.value,
            tension: regEqui_tension_edit.value,
            corriente: regEqui_corriente_edit.value,
            potencia: regEqui_potencia_edit.value,
            temperatura: regEqui_temperatura_edit.value,
            humedad: regEqui_humedad_edit.value,
            peso: regEqui_peso_edit.value,
            dimensiones: regEqui_dimensiones_edit.value,
            otro: regEqui_otros_edit.value
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Editar registro técnico?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                    data: { datosRegistroTecnico },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo procesar la solicitud ',
                            confirmButtonColor: '#0d6efd',

                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: (data),
                            confirmButtonColor: '#0d6efd',
                            cancelButtonColor: '#dc3545',
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

                                location.reload()
                            }
                            return
                        })
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',

                    })

                });

            }

        })
    }
}



//editar regsitro tecnico 
let regEqui_clase_edit = document.getElementById('regEqui_clase_edit')
let regEqui_indicacion_edit = document.getElementById('regEqui_indicacion_edit')
let regEqui_division_escala_edit = document.getElementById('regEqui_division_escala_edit')
let regEqui_intervalo_edit = document.getElementById('regEqui_intervalo_edit')
let regEqui_unidad_medida_edit = document.getElementById('regEqui_unidad_medida_edit')
let regEqui_magnitud_edit = document.getElementById('regEqui_magnitud_edit')



//boton para enviar los datos y realizar registro
let btnEditarCaracteristicasMetro = document.getElementById('btnEditarCaracteristicasMetro')

//titulo modal editar ubicacion
let titulo_modal_editar_caracteristicasMetro = document.getElementById('titulo_modal_editar_caracteristicasMetro')
// btn para extraer el id de cada registro que se selecciona
let editCaract = document.querySelectorAll('.editCaract')

editCaract.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id = x.dataset.id
        titulo_modal_editar_caracteristicasMetro.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { traerDescrip: id },
            type: "POST",
            dataType: "text",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            let response = JSON.parse(data)
            console.log(response);
            regEqui_clase_edit.value = response.clase
            regEqui_indicacion_edit.value = response.tipo_indicacion
            regEqui_division_escala_edit.value = response.division_escala
            regEqui_intervalo_edit.value = response.intervalo
            regEqui_unidad_medida_edit.value = response.unidad_medida
            regEqui_magnitud_edit.value = response.magnitud
            btnEditarCaracteristicasMetro ? btnEditarCaracteristicasMetro.addEventListener("click", () => editarCaracteristicasMetro(id)) : ''

        })

    })
})
function editarCaracteristicasMetro(id) {
    if (
        regEqui_magnitud_edit.value.trim() == "" ||
        regEqui_unidad_medida_edit.value.trim() == "" ||
        regEqui_intervalo_edit.value.trim() == "" ||
        regEqui_division_escala_edit.value.trim() == "" ||
        regEqui_indicacion_edit.value.trim() == "" ||
        regEqui_clase_edit.value.trim() == ""

    ) {
        DatosIncompletos()
    } else {
        const datosCaracteristicasMetro = {
            id: id,
            magnitud: regEqui_magnitud_edit.value,
            unidad_medida: regEqui_unidad_medida_edit.value,
            intervalo: regEqui_intervalo_edit.value,
            division_escala: regEqui_division_escala_edit.value,
            tipo_indicacion: regEqui_indicacion_edit.value,
            clase: regEqui_clase_edit.value
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Editar características metrológicas?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                    data: { datosCaracteristicasMetro },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo procesar la solicitud ',
                            confirmButtonColor: '#0d6efd',

                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: (data),
                            confirmButtonColor: '#0d6efd',
                            cancelButtonColor: '#dc3545',
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

                                location.reload()
                            }
                            return
                        })
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',

                    })

                });

            }

        })
    }
}

//editar registro historico
let regEqui_forma_adquisicion_edit = document.getElementById('regEqui_forma_adquisicion_edit')
let regEqui_doc_adquisicion_edit = document.getElementById('regEqui_doc_adquisicion_edit')
let regEqui_estado_adquisicion_edit = document.getElementById('regEqui_estado_adquisicion_edit')
let regEqui_f_fabricacion_edit = document.getElementById('regEqui_f_fabricacion_edit')
let regEqui_f_adquisicion_edit = document.getElementById('regEqui_f_adquisicion_edit')
let regEqui_f_recepcion_edit = document.getElementById('regEqui_f_recepcion_edit')
let regEqui_f_instalacion_edit = document.getElementById('regEqui_f_instalacion_edit')
let regEqui_f_vengarantia_edit = document.getElementById('regEqui_f_vengarantia_edit')
let regEqui_costo_edit = document.getElementById('regEqui_costo_edit')
let regEqui_vida_util_edit = document.getElementById('regEqui_vida_util_edit')
let regEqui_proveedor_edit = document.getElementById('regEqui_proveedor_edit')


//boton para enviar los datos y realizar registro
let btnregistroHistorico = document.getElementById('btnregistroHistorico')

//titulo modal editar ubicacion
let titulo_modal_registroHistorico = document.getElementById('titulo_modal_registroHistorico')
// btn para extraer el id de cada registro que se selecciona
let editRegisHst = document.querySelectorAll('.editRegisHst')

editRegisHst.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id = x.dataset.id
        titulo_modal_registroHistorico.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { traerDescrip: id },
            type: "POST",
            dataType: "text",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            let response = JSON.parse(data)
            console.log(response);
            regEqui_forma_adquisicion_edit.value = response.forma_adq
            regEqui_doc_adquisicion_edit.value = response.doc_adq
            regEqui_estado_adquisicion_edit.value = response.estado_adq
            regEqui_f_fabricacion_edit.value = response.f_fabricacion
            regEqui_f_adquisicion_edit.value = response.f_adq
            regEqui_f_recepcion_edit.value = response.f_recepcion
            regEqui_f_instalacion_edit.value = response.f_instal
            regEqui_f_vengarantia_edit.value = response.f_venc_garantia
            regEqui_costo_edit.value = response.costo
            regEqui_vida_util_edit.value = response.vida_util
            regEqui_proveedor_edit.value = response.proveedor
            btnregistroHistorico ? btnregistroHistorico.addEventListener("click", () => editarRegistroHistorico(id)) : ''
        })
    })
})
function editarRegistroHistorico(id) {
    if (
        regEqui_forma_adquisicion_edit.value.trim() == "" ||
        regEqui_doc_adquisicion_edit.value.trim() == "" ||
        regEqui_estado_adquisicion_edit.value.trim() == "" ||
        regEqui_f_fabricacion_edit.value.trim() == "" ||
        regEqui_f_adquisicion_edit.value.trim() == "" ||
        regEqui_f_recepcion_edit.value.trim() == "" ||
        regEqui_f_instalacion_edit.value.trim() == "" ||
        regEqui_f_vengarantia_edit.value.trim() == "" ||
        regEqui_costo_edit.value.trim() == "" ||
        regEqui_vida_util_edit.value.trim() == "" ||
        regEqui_proveedor_edit.value.trim() == ""
    ) {
        DatosIncompletos()
    } else {
        const datosRegistroHistorico = {
            id: id,
            forma_adq: regEqui_forma_adquisicion_edit.value,
            doc_adq: regEqui_doc_adquisicion_edit.value,
            estado_adq: regEqui_estado_adquisicion_edit.value,
            f_fabricacion: regEqui_f_fabricacion_edit.value,
            f_adq: regEqui_f_adquisicion_edit.value,
            f_recepcion: regEqui_f_recepcion_edit.value,
            f_instal: regEqui_f_instalacion_edit.value,
            f_venc_garantia: regEqui_f_vengarantia_edit.value,
            costo: regEqui_costo_edit.value,
            vida_util: regEqui_vida_util_edit.value,
            proveedor: regEqui_proveedor_edit.value,
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Editar registro histórico?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                    data: { datosRegistroHistorico },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo procesar la solicitud ',
                            confirmButtonColor: '#0d6efd',
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: (data),
                            confirmButtonColor: '#0d6efd',
                            cancelButtonColor: '#dc3545',
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
                                location.reload()
                            }
                            return
                        })
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',
                    })
                });
            }
        })
    }
}



//editar TIPO DE INTERVENCIONES REQUERIDAS, DISPOSICIÓN FINAL, RECOMENDACIONES DE USO Y CUIDADO
let regEqui_tipo_intervencion_edit = document.getElementById('regEqui_tipo_intervencion_edit')
let regEqui_recurso_humano_edit = document.getElementById('regEqui_recurso_humano_edit')
let regEqui_frecuencia_edit = document.getElementById('regEqui_frecuencia_edit')
let regEqui_metodo_desecho_edit = document.getElementById('regEqui_metodo_desecho_edit')
let regEqui_responsable_edit = document.getElementById('regEqui_responsable_edit')
let regEqui_recomendaciones_edit = document.getElementById('regEqui_recomendaciones_edit')



//boton para enviar los datos y realizar registro
let btnrestoEdiciones = document.getElementById('btnrestoEdiciones')

//titulo modal editar ubicacion
let titulo_modal_restoEdiciones = document.getElementById('titulo_modal_restoEdiciones')
// btn para extraer el id de cada registro que se selecciona
let restoEdiciones = document.querySelectorAll('.restoEdiciones')

restoEdiciones.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id = x.dataset.id
        titulo_modal_restoEdiciones.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { traerDescrip: id },
            type: "POST",
            dataType: "text",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            let response = JSON.parse(data)
            console.log(response);
            regEqui_tipo_intervencion_edit.value = response.tipo_intervencion
            regEqui_recurso_humano_edit.value = response.recurso_humano
            regEqui_frecuencia_edit.value = response.frecuencia
            regEqui_metodo_desecho_edit.value = response.metodo_desecho
            regEqui_responsable_edit.value = response.responsable
            regEqui_recomendaciones_edit.value = response.recomendaciones
            btnrestoEdiciones ? btnrestoEdiciones.addEventListener("click", () => editarResto(id)) : ''
        })
    })
})
function editarResto(id) {
    if (
        regEqui_tipo_intervencion_edit.value.trim() == "" ||
        regEqui_recurso_humano_edit.value.trim() == "" ||
        regEqui_frecuencia_edit.value.trim() == "" ||
        regEqui_metodo_desecho_edit.value.trim() == "" ||
        regEqui_responsable_edit.value.trim() == "" ||
        regEqui_recomendaciones_edit.value.trim() == ""
    ) {
        DatosIncompletos()
    } else {
        const datosResto = {
            id: id,
            tipo_intervencion: regEqui_tipo_intervencion_edit.value,
            recurso_humano: regEqui_recurso_humano_edit.value,
            frecuencia: regEqui_frecuencia_edit.value,
            metodo_desecho: regEqui_metodo_desecho_edit.value,
            responsable: regEqui_responsable_edit.value,
            recomendaciones: regEqui_recomendaciones_edit.value
        }
        Swal.fire({
            title: 'Listo',
            text: `¿Editar información?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#dc3545',
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
                    data: { datosResto },
                    type: "POST",
                    dataType: "text",
                    url: "views/ajax/equipos_ajax.php",
                }).done(function (data, textStatus, jqXHR) {
                    console.log(data);
                    if (data == "") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo procesar la solicitud ',
                            confirmButtonColor: '#0d6efd',
                        })
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: (data),
                            confirmButtonColor: '#0d6efd',
                            cancelButtonColor: '#dc3545',
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
                                location.reload()
                            }
                            return
                        })
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo procesar la solicitud ' + textStatus,
                        confirmButtonColor: '#0d6efd',
                    })
                });
            }
        })
    }
}

//EDITAR RIESGOS ASOCIADOS

let btnriesgosAsociados = document.getElementById('btnriesgosAsociados')

//titulo modal editar ubicacion
let titulo_modal_riesgosAsociadoss = document.getElementById('titulo_modal_riesgosAsociadoss')
// btn para extraer el id de cada registro que se selecciona
let TraerRiesgosA = document.querySelectorAll('.TraerRiesgosA')

TraerRiesgosA.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id = x.dataset.id
        titulo_modal_riesgosAsociadoss.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { TraerRiesgosA: id },
            type: "POST",
            dataType: "json",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            // let response = JSON.parse(data)
            console.log(data);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo procesar la solicitud ' + textStatus,
                    confirmButtonColor: '#0d6efd',

                })
            })
    })
})


//EDITAR procesos limpieza

let btnprocesosLimpieza = document.getElementById('btnprocesosLimpieza')

//titulo modal editar ubicacion
let titulo_modal_procesosLimpieza = document.getElementById('titulo_modal_procesosLimpieza')
// btn para extraer el id de cada registro que se selecciona
let traerProcesos = document.querySelectorAll('.traerProcesos')

traerProcesos.forEach(x => {
    x.addEventListener("click", (ex) => {
        //extraer id del cliente para llenar el select
        const id = x.dataset.id
        titulo_modal_procesosLimpieza.innerText = x.dataset.nombre
        console.log(id);
        $.ajax({
            data: { TraerProcesos: id },
            type: "POST",
            dataType: "json",
            url: "views/ajax/equipos_ajax.php",
        }).done(function (data, textStatus, jqXHR) {
            // let response = JSON.parse(data)
            console.log(data);
        })
            .fail(function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo procesar la solicitud ' + textStatus,
                    confirmButtonColor: '#0d6efd',

                })
            })
    })
})