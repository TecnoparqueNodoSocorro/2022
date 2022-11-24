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

     
        /*  data.append(id, id); */
        console.log(data);
        console.log(id);
    } : ''
}