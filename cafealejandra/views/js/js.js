


// Guardar datos del login y guardarlos en un array
let user = document.getElementById('user')
let pass = document.getElementById('password')
let btn = document.getElementById('btnIniciar')
let login = {}
if (btn) {
    btn.addEventListener("click", () => {
        if (user.value.trim() == "" || pass.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            login={user: user.value, password: pass.value}
            console.log(login);
        }
    })
}



// Iniciar nueva cosecha
let fecha_Inicio = document.getElementById('fecha_Inicio')
let pago_kilo = document.getElementById('pago_kilo')
let pago_encargado = document.getElementById('pago_encargado')
let btnIniciarCosecha = document.getElementById('btnIniciarCosecha')
let cosecha = {}
if (btnIniciarCosecha) {
    btnIniciarCosecha.addEventListener("click", () => {
        if (pago_encargado.value.trim() == "" || pago_kilo.value.trim() == "" || fecha_Inicio.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            cosecha={pago_encargado: pago_encargado.value, pago_kilo: pago_kilo.value, fecha_inicio: fecha_Inicio.value}
            console.log(cosecha);
        }

    })
}



//registro de empleados
let empleado_nuevo = {}
let cosecha_user = document.getElementById('cosecha_user')
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let cargo_user = document.getElementById('cargo_user')
let btnRegister = document.getElementById('btnRegister')
if (btnRegister) {
    btnRegister.addEventListener("click", () => {
        //    capturar el texto del select
        //     console.log(cosecha_user.options[cosecha_user.selectedIndex].text);

        if (cargo_user.value.trim() == "Seleccione el cargo" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "" || cosecha_user.value.trim() == "Seleccione la cosecha") {
            console.log("datos incompletos")
        } else {
            empleado_nuevo={cargo: cargo_user.value,documento: document_user.value,telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value, cosecha: cosecha_user.value}
            console.log(empleado_nuevo);
        }
    })
}



// registro de trabajo
let cosecha_trabajo = document.getElementById('cosecha_trabajo')
let kilos_recogidos = document.getElementById('kilos_recogidos')
let agregar_trabajo = document.getElementById('agregar_trabajo')
let registro = {}
if (agregar_trabajo) {
    agregar_trabajo.addEventListener("click", () => {
        if (cosecha_trabajo.value.trim() == "Seleccione cosecha" || kilos_recogidos.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            registro={cosecha_trabajo: cosecha_trabajo.value, kilos_recogidos: kilos_recogidos.value}
            console.log(registro);
        }
    })
}



// registro de kilos
let empleado = document.getElementById('empleado')
let cosecha_pago = document.getElementById('cosecha_pago')
let fecInicio = document.getElementById('fecInicio')
let fecFin = document.getElementById('fecFin')
let btnGenerarCant = document.getElementById('btnGenerarCant')

let registro_kilos = {}
if (btnGenerarCant) {
    btnGenerarCant.addEventListener("click", () => {
        if (empleado.value.trim() == "Seleccione el empleado" || cosecha_pago.value.trim() == "Seleccione la cosecha" || fecInicio.value.trim() == "" || fecFin.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            registro_kilos={empleado: empleado.value, cosecha_pago: cosecha_pago.value,fecha_inicio: fecInicio.value,fecha_fin: fecFin.value}
            console.log(registro_kilos);
        }
    })
}



// registro de pago captura dato recolector
let cantidadPagar = document.getElementById('cantidadPagar')
let btnPagar = document.getElementById('btnPagar')

if (btnPagar) {
    btnPagar.addEventListener("click", () => {
        if (cantidadPagar.value.trim() <= 0) {
            console.log("Cantidad incorrecta");
        } else {
            console.log(cantidadPagar.value);
        }
    })
}

// encargado
let cantidadPagarEncargado = document.getElementById('cantidadPagarEncargado')
let diasEncargado = document.getElementById('diasEncargado')
let btnCalcularEncargado = document.getElementById('btnCalcularEncargado')

if (btnCalcularEncargado) {
    btnCalcularEncargado.addEventListener("click", () => {
        if (cantidadPagarEncargado.value.trim() <= 0) {
            console.log("Cantidad incorrecta");
        } else {
            console.log(cantidadPagarEncargado.value);
        }
    })
}