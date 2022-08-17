// Guardar datos del login y guardarlos en un array
let user = document.getElementById('username')
let pass = document.getElementById('pass')
let btn = document.getElementById('btnIniciar')
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        if (user.value.trim() == "" || pass.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            login = { user: user.value, password: pass.value }
            console.log(login);
        }
    })
}


//registro de caprinocultor
let nuevoCaprinocultor = {}
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let objetivoProduccion = document.getElementById('objetivoProduccion')
let btnRegistrar = document.getElementById('btnRegistrar')
if (btnRegistrar) {
    btnRegistrar.addEventListener("click", () => {
        if (objetivoProduccion.value == "Seleccione el objetivo" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            nuevoCaprinocultor = { objetivo_produccion: objetivoProduccion.options[objetivoProduccion.selectedIndex].text, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value }
            console.log(nuevoCaprinocultor);
        }
    })
}

// reporte de controles, obtener dato de las fechas por el momento
let fecha_inicio = document.getElementById('fecha_inicio')
let fecha_fin = document.getElementById('fecha_fin')
let btnReporteC = document.getElementById('btnReporteC')
if (btnReporteC) {
    btnReporteC.addEventListener("click", () => {
        if (fecha_inicio.value.trim() == "" || fecha_fin.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            console.log(fecha_inicio.value, fecha_fin.value);
        }
    })
}

// reporte de hallazgos, obtener dato de las fechas por el momento
let fecha_inicioH = document.getElementById('fecha_inicioH')
let fecha_finH = document.getElementById('fecha_finH')
let btnReporteH = document.getElementById('btnReporteH')
if (btnReporteH) {
    btnReporteH.addEventListener("click", () => {
        if (fecha_inicioH.value.trim() == "" || fecha_finH.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            console.log(fecha_inicioH.value, fecha_finH.value);
        }
    })
}

// REGISTRO  DE CAPRINOS
let raza = document.getElementById('raza')
let origen = document.getElementById('origen')
let fecha_nac = document.getElementById('fecha_nac')
let nuevoCaprino = {}
let btnRegistrarCaprino = document.getElementById('btnRegistrarCaprino')
if (btnRegistrarCaprino) {
    btnRegistrarCaprino.addEventListener("click", () => {
        if (raza.value == "Seleccione la raza" || origen.value == "Seleccione el origen" || fecha_nac.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            nuevoCaprino = { raza: raza.options[raza.selectedIndex].text, origen: origen.options[raza.selectedIndex].text, fecha_nacimiento: fecha_nac.value }
            console.log(nuevoCaprino);
        }
    })
}


//CAPTURAR ID PARA EL REGISTRO INDIVIDUAL
let id_caprino = document.getElementById('id_caprino')
let btnTraer = document.getElementById('btnTraer')
if (btnTraer) {
    btnTraer.addEventListener("click", () => {
        if (id_caprino.value.trim() == "") {
            console.log("sin datos");
        } else {
            console.log(id_caprino.value);
        }
    })
};


// CAPTURAR DATOS DEL CAPRINO PARA EL REGISTRO INDIVIDUAL
let peso_kilos = document.getElementById('peso_kilos')
let condicion = document.getElementById('condicion')
let textER = document.getElementById('textER')
let textEG = document.getElementById('textEG')
let textEM = document.getElementById('textEM')

function CerrarModal(){
    $('#ModalDatos').modal('hide');
}


let btnGuardarD = document.getElementById('btnGuardarD')
if (btnGuardarD) {
    btnGuardarD.addEventListener("click", () => {
        // VALIDAS DATOS
        if (peso_kilos.value.trim() == "" || condicion.value == "Seleccione la condición") {
            console.log("faltan datos");
        } else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición") {

            //    ENFERMEDAD POR RESPIRATORIAS
            if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textER.value.trim() != "" && textEG.value.trim() == "" && textEM.value.trim() == "") {
                console.log(peso_kilos.value, condicion.value, textER.value);
               CerrarModal()
            }
            // ENFERMEDAD POR RESPIRATORIAS Y GASTROINTESNITNAL
            else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textER.value.trim() != "" && textEG.value.trim() != "" && textEM.value.trim() == "") {
                console.log(peso_kilos.value, condicion.value, textER.value, textEG.value);
               CerrarModal()
            }
            // TODAS LAS ENFERMEDADES
            else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textER.value.trim() != "" && textEG.value.trim() != "" && textEM.value.trim() != "") {
                console.log(peso_kilos.value, condicion.value, textER.value, textEG.value, textEM.value);
               CerrarModal()
            }
            //ENFERMEDAD GASTROINTESTINAL Y MORDEDURAS
            else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textER.value.trim() == "" && textEG.value.trim() != "" && textEM.value.trim() != "") {
                console.log(peso_kilos.value, condicion.value, textEG.value, textEM.value);
               CerrarModal()
            }
            //ENFERMEDA POR RESPIRATORIA Y MORDEDURA
            else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textER.value.trim() != "" && textEG.value.trim() == "" && textEM.value.trim() != "") {
                console.log(peso_kilos.value, condicion.value, textER.value, textEM.value);
               CerrarModal()
            }
            //ENFERMEDAD GASTROINTESTINAL
            else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textEG.value.trim() != "" && textER.value.trim() == "" && textEM.value.trim() == "") {
                console.log(peso_kilos.value, condicion.value, textEG.value);
               CerrarModal()
            }
            //ENFERMEDAD POR MORDEDURA
            else if (peso_kilos.value.trim() != "" && condicion.value != "Seleccione la condición" && textEM.value.trim() != "" && textEG.value.trim() == "" && textER.value.trim() == "") {
                console.log(peso_kilos.value, condicion.value, textEM.value);
               CerrarModal()
            }
            //SIN MORDEDURAS
            else {
                console.log(peso_kilos.value, condicion.value);
               CerrarModal()

            }
        }
    })
}






// REGISTRO DE TRATAMIENTOS
let tratamiento = document.getElementById('tratamiento')
let btnGuardarT = document.getElementById('btnGuardarT')
let caprinos = {}
let caprinosSeleccion = []

// SE RECORRE EL LISTADO DE CHECKBOX Y LOS QUE ESTEN EN TRUE SE AGREGAN AL VECTOR
$('#btnAgregarT').click(function () {
    if (caprinosSeleccion.length != 0) {
        caprinosSeleccion = []
    }
    var ids;

    ids = $('input[type=checkbox]:checked').map(function () {
        return caprinosSeleccion.push($(this).attr('id'));
    }).get();
    $("#staticBackdrop").modal("hide");
    console.log(caprinosSeleccion)
});
//////////////////////////////////////////////////////////////////////////////////////////


if (btnGuardarT) {
    btnGuardarT.addEventListener("click", () => {
        if (tratamiento.value.trim() == "" || caprinosSeleccion.length == 0) {
            console.log("faltan datos");
        } else {
            caprinos = { descripcion_tratamiento: tratamiento.value, caprinos_tratamiento: caprinosSeleccion }
            console.log(caprinos);
        }

    })
}


//REGISTRO DE SALIDAS
let id_salida = document.getElementById('id_salida')
let motivo_salida = document.getElementById('motivo_salida')
let btnRegistrarS = document.getElementById('btnRegistrarS')
let salidas = {}
if (btnRegistrarS) {
    btnRegistrarS.addEventListener("click", () => {
        if (id_salida.value.trim() == "" || motivo_salida.value == "Seleccione el motivo") {
            console.log("sin datos");
        } else {
            salidas = { id_salida: id_salida.value, motivo: motivo_salida.options[motivo_salida.selectedIndex].text }
            console.log(salidas);
        }

    })
}

//REGISTRAR PRODUCCIÓN
let id_produccion = document.getElementById('id_produccion')
let cantidad_leche = document.getElementById('cantidad_leche')
let fecha_prod = document.getElementById('fecha_prod')
let btnAdicionar = document.getElementById('btnAdicionar')
let produccion = {}
if (btnAdicionar) {
    btnAdicionar.addEventListener("click", () => {
        if (id_produccion.value.trim() == "" || cantidad_leche.value.trim() == "" || fecha_prod.value.trim() == "") {
            console.log("datos incompletos");
        } else {
            produccion = { id_produccion: id_produccion.value, cantidad: cantidad_leche.value, fecha: fecha_prod.value }
            console.log(produccion);
        }
    })
}

//DATOS PARA LA GRÁFICA
let fecha1_gra = document.getElementById('fecha1_gra')
let fecha2_gra = document.getElementById('fecha2_gra')
let btnGrafico = document.getElementById('btnGrafico')
if (btnGrafico) {
    btnGrafico.addEventListener("click", () => {
        if (fecha1_gra.value.trim() == "" || fecha2_gra.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            console.log(fecha1_gra.value, fecha2_gra.value);
        }
    })
}