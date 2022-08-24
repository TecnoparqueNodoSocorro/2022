//id usuario traido desde la plantilla
let id_usu = id_userOculto.value;
let codigoEliminar
let index
let tratamiento = document.getElementById('tratamiento')
let btnGuardarT = document.getElementById('btnGuardarT')
let fecha_inicio_tratamiento = document.getElementById('fecha_inicio_tratamiento')
let caprino_tratamiento_select = document.getElementById('caprino_tratamiento_select')
let tbodyTratamientos = document.getElementById('tbodyTratamientos')


let caprinosSeleccion = []
let codigo = {}
if (caprino_tratamiento_select) {
    caprino_tratamiento_select.addEventListener("change", () => {
        codigo = { codigo: caprino_tratamiento_select.value }
        //console.log(codigo);

    })
}
let btnAgregarCT = document.getElementById('btnAgregarCT')

if (btnAgregarCT) {
    btnAgregarCT.addEventListener("click", () => {
        //SE VALIDA QUE EL OBJETO CODIGO BNO ESTE VACIO SI NO, SE GENERA UNA ALERTA
        if ((Object.keys(codigo).length === 0) == true) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione un caprino primero',
                confirmButtonColor: '#f69100',
            })
        } else {
            TraerCaprino()
        }
    })
}
function TraerCaprino() {
    $.post("views/ajax/caprino_ajax.php", { codigo }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);
        if (response == false) {
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Caprino ya agregado',
                confirmButtonColor: '#f69100',
            })
        }
        //se utilia la funcion findindex para que recorra el array de caprinosSeleccion y en la variable x, recopile el valor del codigo y lo compare con lo que
        //trae el response.codigo que viene de la bd
        let indice = caprinosSeleccion.findIndex((x) => x.codigo === response.codigo)

        //si el array no tiene elementos entonces guarde el registro sin problema
        if (caprinosSeleccion.length === 0) {
            caprinosSeleccion.push(response)
            listar()
            //   console.log(caprinosSeleccion);

            //findindex devuelve -1 porque no hay registro duplicado entonces agrega al array el response
        } else if (indice === -1) {
            caprinosSeleccion.push(response)
            listar()
            //console.log(caprinosSeleccion);

        } else {

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Caprino ya agregado',
                confirmButtonColor: '#f69100',
            })

        }

        // console.log(caprinosSeleccion);

        function listar() {
            tbodyTratamientos.innerHTML = ``
            //SE RECORRE EL ARRAY Y SE DIBUJA LA TABLA
            caprinosSeleccion.map(x => {
                tbodyTratamientos.innerHTML += `
            <tr>
            <td><button type="button" data-codigo="${x.codigo}" class="btnEliminar btn btn-warning" >
            <i class="bi bi-trash3"></i></button></td>
            <td>${x.codigo}</td>
            <td>${x.raza}</td>
            <td>${x.fecha_nacimiento}</td>   
            </tr>
            `
            })

            // VARIABLES PARA GUARDAR LOS DATOS
            const btnEliminar = document.querySelectorAll(".btnEliminar")
            btnEliminar.forEach((el) => {
                //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
                el.addEventListener("click", (e) => {
                    codigoEliminar = el.dataset.codigo
                    //buscamos el indice para poder usarlo para borrar
                    index = caprinosSeleccion.findIndex(x => x.codigo == codigoEliminar);
                    //verificamos el indice
                    // console.log(index);
                    //modal de confirmación
                    Swal.fire({
                        title: 'Eliminar',
                        text: `¿Eliminar caprino ${codigoEliminar} del listado?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#f69100',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Eliminar',
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
                            //ya teniendo el indice borramos la ubicacion 
                            caprinosSeleccion.splice(index, 1);
                            //console.log(caprinosSeleccion);
                            listar()

                        }
                    })

                })
            })
        }

    })
}





if (btnGuardarT) {
    btnGuardarT.addEventListener("click", () => {
        if (tratamiento.value.trim() == "" || caprinosSeleccion.length == 0 || fecha_inicio_tratamiento.value.trim() == "") {
            DatosIncompletos()
        } else {
            //   caprinos = { descripcion_tratamiento: tratamiento.value, caprinos_tratamiento: caprinosSeleccion, fecha_inicio: fecha_inicio_tratamiento.value }
            //   console.log(caprinos);
            GuardarIDtraramiento()
        }

    })
}
async function GuardarIDtraramiento() {
    const datosTratamiento = {
        //ID DEL USUARIO TRAIDO DESDE LA PLANTILLA
        id_usuario: id_userOculto.value,
        //DATOS DEL TRATAMIENTO
        descripcion: tratamiento.value, fecha_inicio: fecha_inicio_tratamiento.value
    }
    //SI EL ARRAY ESTÁ VACIO SE TRAE EL ID DEL TRATAMIENTO QUE ES LA RESPUESTA DEL AJAX

    if (caprinosSeleccion.length > 0) {
        const idTratamiento = await $.post("views/ajax/caprino_ajax.php", { datosTratamiento });
        console.log(idTratamiento);
        let response = JSON.parse(idTratamiento)
        let id = parseInt(response.idTratamiento)
        // console.log(typeof id);
        guardarCaprinosTratamiento(id, caprinosSeleccion)
        Swal.fire({
            title: 'Listo',
            text: `Caprinos agregados al tratamiento #${id}`,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#f69100',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'OK',
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
                location.href = 'index.php?page=c_registroTratamientos'

            }
        })
    } else {
        DatosIncompletos()
    }
}

function guardarCaprinosTratamiento(id, caprinosSeleccion) {
    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let caprinosTratamiento = JSON.stringify(caprinosSeleccion)
    console.log(caprinosTratamiento);
    $.post("views/ajax/caprino_ajax.php", { idtratatamiento: id, caprinos: caprinosTratamiento }, function (dato) {
        let res = JSON.parse(dato);
        console.log(res);


    })
}