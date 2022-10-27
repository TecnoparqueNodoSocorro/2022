// REGISTRO EMBALAJE 
let embalaje = {}
let lote_embalaje = document.getElementById('lote_embalaje')
let azucarEmb = document.getElementById('azucarEmb')
let bijaoEmb = document.getElementById('bijaoEmb')
let celofanEmb = document.getElementById('celofanEmb')
let recortesEmb = document.getElementById('recortesEmb')
let maderaEmb = document.getElementById('maderaEmb')
let tablasEmb = document.getElementById('tablasEmb')
let embProducto = {}


let idEmpaque = 0

let fecha_fabricacion
let fecha_vencimiento

//DIV DE LOS PRODUCTOS
let container_bocadillo = document.getElementById('container_bocadillo')
let container_espejuelo = document.getElementById('container_espejuelo')
let container_arequipe = document.getElementById('container_arequipe')
let container = document.getElementById('container')

//---------

//tabla dibuja registro de empaques
let theadRegistroEmbalaje = document.getElementById('theadRegistroEmbalaje')
let tbodyRegistroEmbalaje = document.getElementById('tbodyRegistroEmbalaje')



//SELECTOR DE PRODUCTO A REGISTRAR EMBALAJE
let select_producto_embalaje = document.getElementById('select_producto_embalaje')
let select_empaque = document.getElementById('select_empaque')
let cantidadEmpaque = document.getElementById('cantidadEmpaque')
let btnAgregar_empaque = document.getElementById('btnAgregar_empaque')
let divBtnGuardarEmbalaje = document.getElementById('divBtnGuardarEmbalaje')



//BOTON PARA GUARDAR REGISTRO
let btnGuardarEmbalaje = document.getElementById('btnGuardarEmbalaje')




const empaque_cantidad = []
//caputrar fecha de fabricación para calcular la fecha de vecimiento
lote_embalaje
    ? lote_embalaje.addEventListener("change", () => {
        codigoLote = { codigo: lote_embalaje.value }
        $.post("views/ajax/lotes_ajax.php", { codigoLote }, function (dato) {
            let response = JSON.parse(dato)
            fecha_vencimiento = response.fecha_vencimiento
            fecha_fabricacion = response.fecha_fabricacion
            console.log(response);
        })
    })
    : ''


//seleccionar el producto a empacar 
select_producto_embalaje
    ? select_producto_embalaje.addEventListener("change", () => {

        //se blanquea el texto del select
        select_empaque.innerHTML = `<option selected value="0">Seleccione el empaque</option> `
        //se oculta el input y el botn de agregar la cantidad
        cantidadEmpaque.style.display = "none"
        btnAgregar_empaque.style.display = "none"


        const producto = { producto: select_producto_embalaje.value }
        $.post("views/ajax/embalaje_ajax.php", { producto }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
            //se recorre los empaques y se crea un opcion por cada uno
            response.forEach(x => {
                empaqueOption = document.createElement('option')
                empaqueOption.value = x.id
                empaqueOption.text = x.empaque
                select_empaque.add(empaqueOption)
            });
        })


    })
    : ''
//selecccionar empaque, muestra el input para la cantidad y muestra el boton de agregar
select_empaque
    ? select_empaque.addEventListener("change", () => {

        cantidadEmpaque.style.display = "block"
        btnAgregar_empaque.style.display = "block"
        //mostrar el div donde está el boton de guardar
        divBtnGuardarEmbalaje.style.display = "block"


    })
    : ''

btnAgregar_empaque
    ? btnAgregar_empaque.addEventListener("click", () => {
        //console.log(select_empaque.options[select_empaque.selectedIndex].text);
        if (select_empaque.value == "0") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione un empaque',
                confirmButtonColor: '#157347',
            })

        } else if (cantidadEmpaque.value == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Registre una cantidad',
                confirmButtonColor: '#157347',
            })
        } else {

            //FUNCION QUE VALIDA QUE NO HAYAN VARIOS REGISTROS DEL MISMO EMPAQUE
            //se captura el nombre del empaque que se selecciona

            //SE UTILIZA EL METDODO FINDINDEX QUE RECORRE EL ARRAY Y COMPARA EL NOMBRE SI NO ENCUENTRA ARROJA -1 
            let indiceName = empaque_cantidad.findIndex(
                (x) => x.nombre === select_empaque.options[select_empaque.selectedIndex].text
            );
            //SI ESTA VACÍO ENTONCES AGREGA SIN PROBLEMA
            if (empaque_cantidad.length === 0) {
                empaque_cantidad.push({
                    id: select_empaque.value,
                    nombre: select_empaque.options[select_empaque.selectedIndex].text,
                    cantidad: cantidadEmpaque.value
                })
            } else if (indiceName === -1) { //SI NO ENCUENTRA SIMILITUDES AGREGA SIN PROBLEMA
                empaque_cantidad.push({
                    id: select_empaque.value,
                    nombre: select_empaque.options[select_empaque.selectedIndex].text,
                    cantidad: cantidadEmpaque.value
                })
            } else { //DE LO CONTRARIO ES PORQUE ENCONTRÓ EL NOMBRE YA REGISTRADO
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Presentación ya agregada',
                    confirmButtonColor: '#157347',
                })
            }


            // SE LIMPIA LO QUE SE MUESTRA EN EL FRONT
            limpiarEmbalaje()
            //SE LISTA DE NUEVO EPARA EVITAR CONCATENAR TABLAS 
            listarEmbalaje()
        }

    })
    : ''


function listarEmbalaje() {
    empaque_cantidad.forEach(x => {
        theadRegistroEmbalaje.innerHTML = `
        <tr>
        <th>Eliminar</th>
        <th>Empaque</th>
        <th>Cantidad</th>
        </tr>
        `
        tbodyRegistroEmbalaje.innerHTML += `
        <tr>
        <td><button type="button" data-embalaje="${x.id}"  class="EliminarEmbalaje btn btn-warning btn-sm" >
        <i class="bi bi-x"></i></i></button></td>
        <td>${x.nombre}</td>
        <td>${x.cantidad}</td>
        </tr>
        `
        const EliminarEmbalaje = document.querySelectorAll(".EliminarEmbalaje")
        EliminarEmbalaje.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                embalajeEliminar = el.dataset.embalaje
                //buscamos el indice para poder usarlo para borrar
                let index = empaque_cantidad.findIndex(x => x.id == embalajeEliminar);
                //verificamos el indice
                // console.log(index);
                //modal de confirmación
                Swal.fire({
                    title: 'Eliminar',
                    text: `¿Eliminar registro?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#157347',
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
                        empaque_cantidad.splice(index, 1);
                        console.log(empaque_cantidad);
                        limpiarEmbalaje()
                        listarEmbalaje()


                    }
                })

            })
        })
    })
}
function limpiarEmbalaje() {
    select_empaque.value = "0"
    cantidadEmpaque.value = "";
    tbodyRegistroEmbalaje.innerHTML = ``
    theadRegistroEmbalaje.innerHTML = ``


}









btnGuardarEmbalaje
    ? btnGuardarEmbalaje.addEventListener("click", guardar_embalaje)
    : ''




function guardar_embalaje() {
    if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Datos incompletos',
            confirmButtonColor: '#157347',
        })
    } else if (empaque_cantidad.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Registro de empaques está vacío',
            confirmButtonColor: '#157347',
        })
    } else {
        GuardarIDembalaje()

    }
}



//FUNCION PARA GUARDAR EL DATO DE LA DESCRIPCION DEL TRATAMIENTO Y YLA FECHA Y RETORNA EL ID PARA USARLO EN LAS CONSULTAS SIGUIENTES
function GuardarIDembalaje() {

    Swal.fire({
        title: 'Listo',
        text: `¿Registrar Embalaje?`,
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
            const datosEcabezadoEmbalaje = {
                codigo_lote: lote_embalaje.value,
                id_usuario: id_usuario_oculto,
                azucar: azucarEmb.value,
                bijao: bijaoEmb.value,
                celofan: celofanEmb.value,
                recortes: recortesEmb.value,
                madera: maderaEmb.value,
                tablas: tablasEmb.value,
                fabricacion: fecha_fabricacion,
                vencimiento: fecha_vencimiento
            }
            const idEncabezadoEmbalaje = $.post("views/ajax/embalaje_ajax.php", { datosEcabezadoEmbalaje })
            idEncabezadoEmbalaje.done(function (data) {
                console.log(data);
              
                let response = JSON.parse(data)
                console.log(response);
                let id = parseInt(response.idEncabezado)
                console.log(id);
                guardarDetalleEmbalaje(id, empaque_cantidad)
            })



            Swal.fire({
                title: 'Listo',
                text: `Embalaje guardado`,
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#157347',
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
                    location.reload()
                }
            })


        }

        // console.log(datosEcabezadoEmbalaje);
        //SI EL ARRAY ESTÁ VACIO SE TRAE EL ID DEL TRATAMIENTO QUE ES LA RESPUESTA DEL AJAX

    })


}

function guardarDetalleEmbalaje(id, empaque_cantidad) {
    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let cantidadEmpaques = JSON.stringify(empaque_cantidad)
    // console.log(caprinosTratamiento);
    $.post("views/ajax/embalaje_ajax.php", { idEncabezado: id,  codigo_lote: lote_embalaje.value, cantidades: cantidadEmpaques }, function (dato) {
        // let res = JSON.parse(dato);
        console.log(dato);

    })
}

































/*
select_producto_embalaje
    ? select_producto_embalaje.addEventListener("change", () => {
        $('#modal_empaques').modal('show');

        container.innerHTML = ``
        const producto = { producto: select_producto_embalaje.value }
        $.post("views/ajax/embalaje_ajax.php", { producto }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
            response.forEach(x => {
                idEmpaque = x.id
                container.innerHTML += `

                <div class="col-5">
                    <div class="input-group">
                         <span class="input-group-text" id="basic-addon1">${x.empaque}</span>
                    </div>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control inputEmbalaje" id="${x.id}" placeholder="" name="${x.empaque}" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="col-3 mt-1">
                    <button type="button" data-idemp="${x.id}"  class="AgregarEmpaque btn btn-sm btn-success"><i class="bi bi-plus-circle-fill"></i></button>
                </div>

                `

            });
        })


    })
    : '' */


/* // VARIABLES PARA GUARDAR LOS DATOS
const AgregarEmpaque = document.querySelectorAll(".AgregarEmpaque")
AgregarEmpaque.forEach((ag) => {
    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
    ag.addEventListener("click", (e) => {

        //console.log(el.dataset.id);
        idemp = el.dataset.idemp


        console.log(idemp);
    })
})
let empaqueYcantidad =[]
 */
/* let btnGuardarEmbB = document.getElementById('btnGuardarEmbB')
btnGuardarEmbB

    ? btnGuardarEmbB.addEventListener("click", () => {
        const inputs = document.querySelectorAll('.inputEmbalaje')
        inputs.forEach(x => {
            //console.log(x.id, x.value);

            if (x.value.trim() != "") {

                empaqueYcantidad.push({id:x.id, cantidad:x.value, empaque:x.name})
                console.log(empaqueYcantidad);
            }

        })
    })

    : '' */

/* // FUNCION BLANQUEA LOS INPUT
let control = document.getElementsByClassName('form-control')
function asignar() {
    lote_embalaje.value = 0
    for (let index = 0; index < control.length; index++) {
        control[index].value = " "
    }
}

//FUNCION GUARDAR DATOS FIJOS
function EnviarDatos() {
    embalaje = { lote: lote_embalaje.value, azucar: azucarEmb.value, bijao: bijaoEmb.value, celofan: celofanEmb.value, recortes: recortesEmb.value, madera: maderaEmb.value, tablas: tablasEmb.value, embalaje: embProducto }
} */



// VARIABLES BOCADILLO

/* let espNav = document.getElementById('espNav')
let extrafino = document.getElementById('extrafino')
let veinte_t = document.getElementById('veinte_t')
let venti_ocho = document.getElementById('venti_ocho')
let ochenta_cuatro = document.getElementById('ochenta_cuatro')
let mooticos = document.getElementById('mooticos')
let unidades = document.getElementById('unidades')
let mooticos_c = document.getElementById('mooticos_c')
let moticos_unidades = document.getElementById('moticos_unidades')
let bocadillo_manzana = document.getElementById('bocadillo_manzana')
let lonja = document.getElementById('lonja')

let btnGuardarEmbB = document.getElementById('btnGuardarEmbB')
btnGuardarEmbB

    ? btnGuardarEmbB.addEventListener("click", () => {
        const inputs = document.querySelectorAll('.inputEmbalaje')

        inputs.forEach(x => {
            console.log(x.id, x.value);

            if (x.value.trim() == "") {
                Swal.fire({
                    title: 'Error',
                    text: `Complete los campos`,
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok',
                })
            } else {
        
            }


        })
    })

    : '' */


/* if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
    console.log("Datos incompletos");
} else {
    embProducto = { especial_navideno: espNav.value, extrafino: extrafino.value, veinte_trienta: veinte_t.value, veintiocho_veinte: venti_ocho.value, ochenta_diez: ochenta_cuatro.value, moticos_10: mooticos.value, unidades: unidades.value, moticos_cinco: mooticos_c.value, moticos_unidades: moticos_unidades.value, bocadillo_manzana: bocadillo_manzana.value, lonja: lonja.value }
    EnviarDatos()
    console.log(embalaje);
    asignar()
} */


/* 

//VARIABLES ESPEJUELO

let pastilla_unidad = document.getElementById('pastilla_unidad')
let moticos_esp = document.getElementById('moticos_esp')
let veinte_esp = document.getElementById('veinte_esp')
let cuarente_esp = document.getElementById('cuarente_esp')
let noventas_esp = document.getElementById('noventas_esp')
let mooticos_diez = document.getElementById('mooticos_diez')
let mooticos_cinco = document.getElementById('mooticos_cinco')
let btnGuardarEmbE = document.getElementById('btnGuardarEmbE')

if (btnGuardarEmbE) {
    btnGuardarEmbE.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { pastilla_unidad: pastilla_unidad.value, moticos_unidades: moticos_esp.value, veinte_cuarenta: veinte_esp.value, cuarenta_veinte: cuarente_esp.value, noventa_seis: noventas_esp.value, mooticos_diez: mooticos_diez.value, moticos_cinco: mooticos_cinco.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
}

//VARIABLE AREQUIPE

let caja_2 = document.getElementById('caja_2')
let bocadillo_panelaU = document.getElementById('bocadillo_panelaU')
let bocadillo_panela = document.getElementById('bocadillo_panela')
let bocadillo_light = document.getElementById('bocadillo_light')
let herpos = document.getElementById('herpos')
let btnGuardarEmbA = document.getElementById('btnGuardarEmbA')

if (btnGuardarEmbA) {
    btnGuardarEmbA.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { caja_2Unidades: caja_2.value, bocadillo_panelaUnidad: bocadillo_panelaU.value, bocadillo_panela: bocadillo_panela.value, bocadillo_light: bocadillo_light.value, herpos: herpos.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
} */