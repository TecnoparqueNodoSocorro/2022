//datos quemados
let id_usuario = 1;
let id_cap = 1

/* 
//------------------------------REGISTRO DE CAPRINOCULTOR---------------------------------
let btnRegistrar = document.getElementById('btnRegistrar')
let nuevoCaprinocultor = {}


if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        AgregarCaprinocultor()
    })
}

function AgregarCaprinocultor() {

    let name_user = document.getElementById('name_user')
    let lastname_user = document.getElementById('lastname_user')
    let phone_user = document.getElementById('phone_user')
    let document_user = document.getElementById('document_user')
    let cargo = document.getElementById('cargo')
    let direccion = document.getElementById('direccion')
    let objetivoProduccion = document.getElementById('objetivoProduccion')


    if (objetivoProduccion.options[objetivoProduccion.selectedIndex].text == "--Seleccione el objetivo--" || cargo.options[cargo.selectedIndex].text == "--Seleccione el cargo--" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "") {
        DatosIncompletos()
    } else {
        nuevoCaprinocultor = { cargo: cargo.value, direccion: direccion.value, objetivo_produccion: objetivoProduccion.options[objetivoProduccion.selectedIndex].text, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value }

        Swal.fire({
            title: 'Listo',
            text: `¿Registrar nuevo caprinocultor?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#f69100',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Registrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: `Nuevo caprinocultor registrado `,
                    showConfirmButton: false,
                    timer: 1200
                })
                console.log(nuevoCaprinocultor);
                $.post("views/ajax/caprinocultor_ajax.php", { nuevoCaprinocultor }, function (dato) {
                    let response = (dato)
                    console.log(response);
                    setTimeout(function () {
                        location.href = 'index.php?page=registroCaprinocultor'
                    }, 1200);
                })
            }
        })
    }
}


// const data = new FormData(document.getElementById('formulario'));
 */

/* // -----------------------------------------------REPORTE DE TRATAMIENTOS-----------------------------------------------------
let fecha_inicioH = document.getElementById('fecha_inicioH')
let fecha_finH = document.getElementById('fecha_finH')
let btnReporteH = document.getElementById('btnReporteH')
let tbodyreporteTratamiento = document.getElementById('tbodyreporteTratamiento')
if (btnReporteH) {
    btnReporteH.addEventListener("click", () => {
        if (fecha_inicioH.value.trim() == "" || fecha_finH.value.trim() == "") {
            DatosIncompletos()
        } else {
            tbodyreporteTratamiento.innerHTML = ``

            reporte_tratamientos = { fecha_inicio: fecha_inicioH.value, fecha_fin: fecha_finH.value }
            console.log(reporte_tratamientos);
            $.post("views/ajax/reportes_ajax.php", { reporte_tratamientos }, (dato) => {
                let response = (JSON.parse(dato))
                console.log(response);
                response.forEach(x => {
                    tbodyreporteTratamiento.innerHTML += `
                    <tr>
                    <td>${x.codigo_caprino}</td>
                    <td>${x.raza}</td>
                    <td>${x.nombres} ${x.apellidos}</td>
                    <td>${x.id_tratamiento}</td>
                    <td>${x.descripcion}</td>
                    <td>${x.fecha_inicio}</td>
                    </tr>
                    `

                })
            })


        }
    })
} */
//---------------------------------------------------------------------------------------------------------------------

/* 
//---------------------------------- REGISTRO  DE CAPRINOS-------------------------------------------------------------------

let nuevoCaprino = {}
let btnRegistrarCaprino = document.getElementById('btnRegistrarCaprino')
if (btnRegistrarCaprino) {
    btnRegistrarCaprino.addEventListener("click", () => {
        RegistrarCaprinos()
    })
}

function RegistrarCaprinos() {
    let raza = document.getElementById('raza')
    let origen = document.getElementById('origen')
    let fecha_nac = document.getElementById('fecha_nac')
    let codigo = document.getElementById('codigo')
    if (codigo.value == "" || raza.value == "Seleccione la raza" || origen.value == "Seleccione el origen" || fecha_nac.value.trim() == "") {
        DatosIncompletos()
    } else {
        nuevoCaprino = { codigo: codigo.value, raza: raza.options[raza.selectedIndex].text, origen: origen.options[origen.selectedIndex].text, fecha_nacimiento: fecha_nac.value, usuario: id_usuario }
        console.log(nuevoCaprino);

        $.post("views/ajax/caprino_ajax.php", { nuevoCaprino }, function (dato) {
            let response = (dato)
            console.log(response);

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
                        location.href = 'index.php?page=registroCaprinos'
                    }
                })
            } else if (response == 0) {
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

 *///--------------------------------CAPTURAR ID PARA EL CONTROL INDIVIDUAL Y LISTAR EL CAPRINO CON SUS DATOS-----------------------------------------------------------
/* let codigo_caprino_control = document.getElementById('codigo_caprino_control')
let tbodyControl = document.getElementById('tbodyControl')
let btnTraer = document.getElementById('btnTraer')

if (codigo_caprino_control) {
    codigo_caprino_control.addEventListener("change", () => {
        LimpiarTabla()
        console.log(codigo_caprino_control.value);
        controlIndividual = { codigo_caprino_control: codigo_caprino_control.value }
        traerDatosCaprino()
    })
}

function traerDatosCaprino() {


    $.post("views/ajax/caprino_ajax.php", { controlIndividual }, function (dato) {
        let response = JSON.parse(dato)
        console.log(response);
        tbodyControl.innerHTML += `
        <tr>
        <td><button type="button" id="controlInfo" class="getInfo btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalDatos">
        Opciones </button></td>
        <td>${response.codigo}</td>
        <td>${response.raza}</td>
        <td>${response.fecha_nacimiento}</td>
        </tr>
        `
        const getInfo = document.querySelectorAll(".getInfo")
        getInfo.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {

                console.log(codigo_caprino_control.value);

                let headControl = document.getElementById('headControl')
                headControl.innerHTML = `Caprino con codigo: ${codigo_caprino_control.value}`

            })
        })
    })




}

function LimpiarTabla() {
    tbodyControl.innerHTML = ``
}


// -----------------------------------CONTROL INDIVIDUAL ENFERMEDADES------------------------------------------------
let peso_kilos = document.getElementById('peso_kilos')

let condicion = document.getElementById('condicion')
let textER = document.getElementById('textER')
let textEG = document.getElementById('textEG')
let textEM = document.getElementById('textEM')
//let enfermedades = "Sin enfermedades";
let caprinoRegistro = {}
function CerrarModal() {
    $('#ModalDatos').on('hidden.bs.modal', function () {
        $(this).find("input,textarea").val('').end()
        $(this).find("select").val('0').end()

        $('#checkMor').prop('checked', false)
        $('#checkGas').prop('checked', false)
        $('#checkRes').prop('checked', false)
            .find("input[type=checkbox], input[type=radio]")
        $("#textEM").prop('disabled', true)
        $("#textEG").prop('disabled', true)
        $("#textER").prop('disabled', true)

            //.prop("checked", "")
            .end()
    });
}
CerrarModal()


let btnGuardarD = document.getElementById('btnGuardarD')
if (btnGuardarD) {
    btnGuardarD.addEventListener("click", () => {
        RegistrarEnfermedades()
    })
}

//----------------CHECKBOX DEL MODAL DE LAS ENFERMEDADES

let checkboxRes = document.getElementById('checkRes')
let checkboxGas = document.getElementById('checkGas');
let checkboxMor = document.getElementById('checkMor');

if (checkboxRes) {
    checkboxRes.addEventListener("change", validaCheckbox, false);
    validaCheckbox()
}
if (checkboxGas) {
    checkboxGas.addEventListener("change", validaCheckbox, false);
    validaCheckbox()
}
if (checkboxMor) {
    checkboxMor.addEventListener("change", validaCheckbox, false);
    validaCheckbox()
}

function validaCheckbox() {
    let check1 = checkboxRes.checked;
    let check2 = checkboxGas.checked;
    let check3 = checkboxMor.checked;

    if (check1) {
        textER.disabled = false
    } else {
        textER.disabled = true
        textER.value = ""
    }
    if (check2) {
        textEG.disabled = false
    } else {
        textEG.disabled = true
        textEG.value = ""
    }
    if (check3) {
        textEM.disabled = false
    } else {
        textEM.disabled = true
        textEM.value = ""
    }
}

//--------------------------------------------------------------------






function RegistrarEnfermedades() {

    // VALIDAS DATOS
    if (peso_kilos.value.trim() == "" || condicion.value == "Seleccione la condición") {
        DatosIncompletos()
    } else {
        GuardarRegistro()
    }
}


function GuardarRegistro() {

    const caprinoRegistro = { peso: peso_kilos.value, condicion: condicion.value, enfermedad_respiratoria: textER.value, enfermedad_gastrointestinal: textEG.value, enfermedad_mordeduras: textEM.value, usuario: id_usuario, caprino: codigo_caprino_control.value }
    Swal.fire({
        title: 'Listo',
        text: `¿Registrar nuevo control al caprino con código: ${codigo_caprino_control.value}?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#f69100',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Registrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("views/ajax/caprino_control_ajax.php", { caprinoRegistro }, function (dato) {
                let response = (dato)
                console.log(response);
                setTimeout(function () {
                    location.href = 'index.php?page=c_registroControlIndividual'
                }, 1200);

            })
            CerrarModal()
            Swal.fire({
                icon: 'success',
                title: `Nuevo caprino registrado `,
                showConfirmButton: false,
                timer: 1200
            })

        }

    })
}
 */
//-------------------------------------------------------- REGISTRO DE TRATAMIENTOS---------------------------------------------
/* let tratamiento = document.getElementById('tratamiento')
let btnGuardarT = document.getElementById('btnGuardarT')
let fecha_inicio_tratamiento = document.getElementById('fecha_inicio_tratamiento')
let caprino_tratamiento_select = document.getElementById('caprino_tratamiento_select')
let tbodyTratamientos = document.getElementById('tbodyTratamientos')

let caprinos = {}
let caprinosSeleccion = []

if (caprino_tratamiento_select) {
    caprino_tratamiento_select.addEventListener("change", () => {
        codigo = { codigo: caprino_tratamiento_select.value }
        console.log(codigo);
        tbodyTratamientos.innerHTML = ``
        TraerCaprino()
    })

}


function TraerCaprino() {
    $.post("views/ajax/caprino_ajax.php", { codigo }, function (dato) {
        let response = JSON.parse(dato)
        console.log(response);


        let indice = caprinosSeleccion.findIndex((x) => x.codigo === response.codigo)
        if (caprinosSeleccion.length === 0) {
            caprinosSeleccion.push(response)
        } else if (indice === -1) {
            caprinosSeleccion.push(response)
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Caprino ya agregado',
                confirmButtonColor: '#f69100',
            })
        }

        console.log(caprinosSeleccion);
        caprinosSeleccion.map(x => {
            tbodyTratamientos.innerHTML += `
        <tr>
        <td>${x.codigo}</td>
        <td>${x.raza}</td>
        <td>${x.fecha_nacimiento}</td>   
        </tr>
        `

        })

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
        id_usuario: id_usuario,
        descripcion: tratamiento.value, fecha_inicio: fecha_inicio_tratamiento.value
    }
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
    let caprinosTratamiento = JSON.stringify(caprinosSeleccion)
    console.log(caprinosTratamiento);
    $.post("views/ajax/caprino_ajax.php", { idtratatamiento: id, caprinos: caprinosTratamiento }, function (dato) {
        let res = JSON.parse(dato);
        console.log(res);


    })
} */

//////////////////////////////////////////////////////////////////////////////////////////




//-------------------------------------REGISTRO DE SALIDAS-----------------------------------------------------------
/* let codigo_salida = document.getElementById('caprino_salida_select')
let fecha_salida = document.getElementById('fecha_salida')

let motivo_salida = document.getElementById('motivo_salida')
let btnRegistrarS = document.getElementById('btnRegistrarS')
let salidas = {}
if (btnRegistrarS) {
    btnRegistrarS.addEventListener("click", () => {
        if (codigo_salida.value === 0 || fecha_salida.value.trim() == "" || motivo_salida.value == "--Seleccione el motivo--") {
            DatosIncompletos()
        } else {
            salidas = { usuario: id_usuario, codigo: codigo_salida.value, motivo: motivo_salida.options[motivo_salida.selectedIndex].text, fecha: fecha_salida.value }

            Swal.fire({
                title: 'Listo',
                text: `¿Registrar salida del caprino con código: ${codigo_salida.value}?`,
                icon: 'question',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonColor: '#f69100',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Registrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({

                        icon: 'success',
                        title: `Caprino dado de baja `,
                        showConfirmButton: false,
                        timer: 1200
                    })
                    console.log(salidas);

                    $.post("views/ajax/salidas_ajax.php", { salidas }, function (dato) {
                        let response = (dato)
                        console.log(response);
                        setTimeout(function () {
                            location.href = 'index.php?page=c_registroSalidas'
                        }, 1200);

                    })
                }

            })

        }

    })
} */
//-------------------------------------------------------------------------------------------------------------------------
/* //-------------------------------------------------REGISTRAR PRODUCCIÓN-----------------------------------------------------
let codigo_caprino = document.getElementById('caprino_produccion_select')
let cantidad_leche = document.getElementById('cantidad_leche')
let fecha_prod = document.getElementById('fecha_prod')
let btnAdicionar = document.getElementById('btnAdicionar')
let produccion = {}
if (btnAdicionar) {
    btnAdicionar.addEventListener("click", () => {
        if (codigo_caprino.value === 0 || cantidad_leche.value.trim() == "" || fecha_prod.value.trim() == "") {
            DatosIncompletos()
        } else {
            produccion = { codigo_caprino: codigo_caprino.value, cantidad: cantidad_leche.value, fecha: fecha_prod.value, usuario: id_usuario }
            $.post("views/ajax/produccion_ajax.php", { produccion }, function (dato) {
                let response = (dato)
                console.log(response);
            })
            Swal.fire({
                title: 'Listo',
                text: `${cantidad_leche.value} litros agregados del caprino con código: ${codigo_caprino.value}`,
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#f69100',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ok',

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
                    location.href = 'index.php?page=c_registroProduccion'

                }
            })
        }
    })
}


//DATOS PARA LA GRÁFICA
let fecha1_gra = document.getElementById('fecha1_gra')
let fecha2_gra = document.getElementById('fecha2_gra')
let btnGenerarGrafica = document.getElementById('btnGenerarGrafica')
let datosGrafico

let fechas = []
let cantidades = []


if (btnGenerarGrafica) {
    btnGenerarGrafica.addEventListener("click", () => {
        if (fecha1_gra.value.trim() == "" || fecha2_gra.value.trim() == "") {
            DatosIncompletos()
        } else {
            grafico = { fecha_inicio: fecha1_gra.value, fecha_fin: fecha2_gra.value }

            $.post("views/ajax/reportes_ajax.php", { grafico }, function (dato) {
                res = JSON.parse(dato)
                console.log(res)
        

                const labels = res.map(function (e) {
                    return e.fecha_registro;
                });

                const dataCantidad = res.map(function (e) {
                    return e.cantidad;
                });

                const canvas = document.querySelector('canvas');
                const ctx = canvas.getContext('2d');

                const config = {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cantidad de leche en litros',
                            data: dataCantidad,
                            backgroundColor: 'rgb(240, 188, 115)'
                        }]
                    }
                };

                const chart = new Chart(ctx, config);
            })
        }
    })
}







function DatosIncompletos() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Datos incompletos',
        confirmButtonColor: '#f69100',
    })
} */