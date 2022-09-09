

//------------------------------------INICIAR NUEVA COSECHA-------------------------------
let fecha_Inicio = document.getElementById('fecha_Inicio')
let pago_kilo = document.getElementById('pago_kilo')
let pago_encargado = document.getElementById('pago_encargado')
let btnIniciarCosecha = document.getElementById('btnIniciarCosecha')
let cosecha = {}
if (btnIniciarCosecha) {
    btnIniciarCosecha.addEventListener("click", () => {
        if (pago_encargado.value.trim() == "" || pago_kilo.value.trim() == "" || fecha_Inicio.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incompletos',
            })
        } else {
            cosecha = { pago_encargado: pago_encargado.value, pago_kilo: pago_kilo.value, fecha_inicio: fecha_Inicio.value }


            Swal.fire({
                title: 'Listo',
                text: `¿Crear cosecha?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Crear',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({

                        icon: 'success',
                        title: `Nueva cosecha creada `,
                        showConfirmButton: false,
                        timer: 1200
                    })
                    $.post("views/ajax/cosecha_ajax.php", { cosecha }, function (dato) {
                        let response = (dato)
                        //console.log(response);
                        setTimeout(function () {
                            location.href = 'index.php?page=gestionCosechas'

                        }, 1200);
                    })
                }
            })
        }
    })
}
//-----------------------------------------------------------------------------------------------------------------------------------


///--------------------------------------FINALIZAR COSECHA/-------------------------------------------------------------------
let num_cosecha = document.getElementById('num_cosecha')
let id_cosecha
let datos = {}
let cerrarCosecha = document.getElementById('btnCerrarCosecha')

if (num_cosecha) {
    num_cosecha.addEventListener("change", () => {
        //console.log(num_cosecha.value);

    })
}
if (cerrarCosecha) {
    cerrarCosecha.addEventListener("click", () => {
        if (num_cosecha.value == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione una cosecha',
            })
        } else {
            datos = { id_cosecha: num_cosecha.value }

            Swal.fire({
                title: 'Ok!',
                text: `¿Seguro que desea finalizar la cosecha número ${num_cosecha.value}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Finalizar',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("views/ajax/finalizar_cosecha_ajax.php", { datos }, function (dato) {
                        let response = (dato)
                        //console.log(response);
                        location.href = 'index.php?page=finalizarCosecha'

                    })
                }
            })
        }
        // //console.log(datos);

    })
}
//-------------------------------------------------------------------/-------------------------------------------------------------------

//-----------------------------------------------CREACION O REGISTRO DE NUEVOS EMPLEADOS--------------------
let empleado_nuevo = {}
let cosecha_user = document.getElementById('cosecha_user')
let name_user = document.getElementById('name_user')
let lastname_user = document.getElementById('lastname_user')
let phone_user = document.getElementById('phone_user')
let document_user = document.getElementById('document_user')
let cargo_user = document.getElementById('cargo_user')
let clave = document.getElementById('clave')
let claveConfirm = document.getElementById('claveConfirm')


let btnRegister = document.getElementById('btnRegister')

//LISTAR LOS EMPLEADOS POR COSECHA

//variablees cambiar calve

let newclave = document.getElementById("newclave")
let newclaveConfirm = document.getElementById("newclaveConfirm")


let tablaHeadEmpleados = document.getElementById('tableHeadListarEmpleadosCosecha')
let tablaBodyEmpleados = document.getElementById('tableBodyListarEmpleadosCosecha')

if (cosecha_user) {
    cosecha_user.addEventListener("change", () => {

        // LIMPIAR LA TABLA CADA QUE HACE CHANGE EL SELECT
        limpiarTablas()
        const data = { id_cosecha: cosecha_user.value }
        $.post("views/ajax/reporte_empleado_ajax.php", { data }, function (dato) {
            let response = JSON.parse(dato)
            //console.log(response);
            response.forEach(x => {
                tablaHeadEmpleados.innerHTML = `
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                    <th>Cambio clave</th>

                </tr>
            `
                tablaBodyEmpleados.innerHTML += `
            <tr>
            <td>${x.nombres + " " + x.apellidos}</td>
            <td>${x.num_documento}</td>
            <td>${x.num_telefono}</td>
            <td>${(x.id_cargo == 1) ? 'Recolector' : 'Encargado'}</td>
            <td>    <button type="button" data-id="${x.id}" data-nombre="${x.nombres + " " + x.apellidos}" class="editPass btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-key"></i>
            </button></td>

            </tr>

                `
                // VARIABLES PARA GUARDAR LOS DATOS
                const editPass = document.querySelectorAll(".editPass")
                editPass.forEach((el) => {
                    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
                    el.addEventListener("click", (e) => {

                        ////console.log(el.dataset.id);
                        id = el.dataset.id
                        document.getElementById("modal-titulo").innerText = el.dataset.nombre

                    })
                })
            })
        })
    })

}


let btncambiarClave = document.getElementById('cambiarClave')
btncambiarClave ? btncambiarClave.addEventListener("click", cambiarClave) : ""
function cambiarClave() {
    if (newclave.value.trim().length != 4) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La clave tiene que ser de 4 numeros',
        })
    } else if (newclaveConfirm.value !== newclave.value) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las claves no coinciden',
        })
    } else {
        newPass = { id: id, pass: newclaveConfirm.value }
        //console.log(newPass);
        Swal.fire({
            title: 'Listo',
            text: `¿Cambiar clave?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Cambiar',
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
                $.post("views/ajax/usuarios_ajax.php", { newPass }, function (dato) {
                    let response = (dato)
                    //console.log(response);
                })
                setTimeout(function () {
                    location.href = 'index.php?page=gestionUsuarios'

                }, 1200);
                Swal.fire({

                    icon: 'success',
                    title: `Clave cambiada exitosamente`,
                    showConfirmButton: true,
                    timer: 1200,
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
}

function limpiarTablas() {
    tablaBodyEmpleados.innerHTML = ""
    tablaHeadEmpleados.innerHTML = ""
}






if (btnRegister) {
    btnRegister.addEventListener("click", () => {
        //    capturar el texto del select
        //     //console.log(cosecha_user.options[cosecha_user.selectedIndex].text);

        if (cargo_user.value.trim() == "--Seleccione el cargo--" || document_user.value.trim() == "" || phone_user.value.trim() == "" || lastname_user.value.trim() == "" || name_user.value.trim() == "" || cosecha_user.value.trim() == "--Seleccione la cosecha--") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incompletos',
            })
        } else if (clave.value.trim().length != 4) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La clave tiene que ser de 4 numeros',
            })
        } else if (claveConfirm.value != clave.value) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las claves no coinciden',
            })
        } else {

            empleado_nuevo = { clave: clave.value, cargo: cargo_user.value, documento: document_user.value, telefono: phone_user.value, apellidos: lastname_user.value, nombres: name_user.value, cosecha: cosecha_user.value }



            Swal.fire({
                title: 'Listo',
                text: `¿Registrar nuevo empleado?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Registrar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({

                        icon: 'success',
                        title: `Nuevo empleado registrado `,
                        showConfirmButton: false,
                        timer: 1200
                    })
                    $.post("views/ajax/usuarios_ajax.php", { empleado_nuevo }, function (dato) {
                        let response = (dato)
                        //console.log(response);
                        setTimeout(function () {
                            location.href = 'index.php?page=gestionUsuarios'

                        }, 1200);

                    })
                }
            })




        }
        /*    Swal.fire({
               title: 'Nuevo empleado',
               text: `¿Seguro que desea registrar un nuevo empleado?`,
               icon: 'question',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               cancelButtonColor: '#3085d6',
               confirmButtonText: 'Registrar',
           }).then((result) => {
               if (result.isConfirmed) {
                   $.post("views/ajax/usuarios_ajax.php", { empleado_nuevo }, function (dato) {
                       let response = (dato)
                       //console.log(response);
                       location.href = 'index.php?page=gestionUsuarios'
 
                   })
               }
           }) */



    })
}
//-------------------------------------------------------------------/-------------------------------------------------------------------

/* /--------------------------------LISTAR EMPLEADOS TODOS  POR COSECHA/------------------------------------------------------------------- */

/* let usuarios_cosecha = document.getElementById('usuarios_cosecha')
let tabla = document.getElementById('tbody')
let valor
let data = {}
if (usuarios_cosecha) {
 
    usuarios_cosecha.addEventListener("change", () => {
        tabla.innerHTML = ``;
        valor = usuarios_cosecha.value
        data = { id_cosecha: valor }
        // //console.log(data);
 
        $.post("views/ajax/reporte_empleado_ajax.php", { data }, function (dato) {
            let response = (dato)
            // //console.log(response);
            let registros = JSON.parse(response);
            //console.log(registros);
            for (let index = 0; index < registros.length; index++) {
                const element = registros[index];
                tabla.innerHTML += `
          <tr>
          <td>${element.nombres}</td>
          <td>${element.apellidos}</td>
          <td>${element.num_documento}</td>
          <td>${element.num_telefono}</td>
          <td>${(element.id_cargo == 1) ? 'Recolector' : 'Encargado'}</td>
          </tr>
          `
            }
        })
 
    })
} */
//-----------------------------------------------REGISTRO DE TRABAJO DIARIO DE RECOLECTOR--------------------/-------------------------------------------------------------------


let cosecha_trabajo = document.getElementById('cosecha_trabajo')
let agregar_trabajo = document.getElementById('agregar_trabajo')
let modalHeadNombre = document.getElementById('modalHeadNombre')
// DECLARO VARIABLE QUE ME VA A GUARDAR EL RESPONSE YA PARSEADO A JSON
let registros
let dataRecolector = {}
//json para guardar los datos


//body de la tabla
let bodyRegistro = document.getElementById('body')

//variable para guardar los datos
let id = 0
let cargo
let kilos_recogidos = document.getElementById('kilos_recogidos')
let fecha_recoleccion = document.getElementById('fecha_recoleccion')

// VARIABLE PARA PASAR A JSON
let registroTrabajo = {}

if (cosecha_trabajo) {
    cosecha_trabajo.addEventListener("change", () => {
        valor = cosecha_trabajo.value
        dataReporte = { id_cosecha: valor }
        bodyRegistro.innerHTML = ``;
        ////console.log(dataReporte);
        $.post("views/ajax/recolectores_cosecha_ajax.php", { dataReporte }, function (dato) {
            let response = (dato)
            // //console.log(response);
            registros = JSON.parse(response);
            //console.log(registros);
            let i = 0
            for (let registro of registros) {
                i++;
                bodyRegistro.innerHTML += `
            <tr>
            <td><button type="button" class="guardarId btn btn-warning"  id="btnAgregarTrabajo" data-nombre="${registro.nombres + " " + registro.apellidos}" data-id="${registro.id}" data-cargo="${registro.id_cargo}"   data-bs-toggle="modal" data-bs-target="#myModal">
            <i class="bi bi-plus-circle"></i>
        </button></td>
            <td>${registro.nombres} ${registro.apellidos}</td>
            <td>${registro.num_documento}</td>
        </tr>`

            }
            // VARIABLES PARA GUARDAR LOS DATOS
            const guardarId = document.querySelectorAll(".guardarId")
            guardarId.forEach((el) => {
                //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
                el.addEventListener("click", (e) => {

                    ////console.log(el.dataset.id);
                    id = el.dataset.id
                    cargo = el.dataset.cargo
                    nombre = el.dataset.nombre

                    modalHeadNombre.innerHTML = `${nombre}`

                })
            })
        })
    })
}

if (agregar_trabajo) {
    agregar_trabajo.addEventListener("click", () => {
        if (cosecha_trabajo.value.trim() == "--Seleccione la cosecha--" || kilos_recogidos.value.trim() == "" || fecha_recoleccion.value == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incompletos',
            })
        } else {
            registroTrabajo = { id_recolector: id, id_cargo: cargo, id_cosecha: valor, kilos_recogidos: kilos_recogidos.value, fecha: fecha_recoleccion.value }
            Swal.fire({
                title: 'Registrar kilos',
                text: `¿Seguro que desea registrar ${kilos_recogidos.value} kilos al empleado ${nombre}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Registrar',
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire({

                        icon: 'success',
                        title: `Kilos agregados`,
                        showConfirmButton: false,
                        timer: 1200
                    })
                    $.post("views/ajax/registro_trabajo_ajax.php", { registroTrabajo }, function (dato) {
                        let response = (dato)
                        //console.log(response);
                        setTimeout(function () {
                            location.href = 'index.php?page=registroTrabajos'

                        }, 1200);
                    })


                }
            })


            ////console.log(registroTrabajo);

        }

    })
}



// /-------------------------------------REPORTE AVANZADO POR RECOLECTOR---------------------------------------------

let empleado = document.getElementById('empleado_cosecha')
let cosecha_pago = document.getElementById('cosecha_pago')
let fecInicio = document.getElementById('fecInicio')
let fecFin = document.getElementById('fecFin')
let btnGenerarCant = document.getElementById('btnGenerarCant')

let bodyReporte = document.getElementById("bodyReporte")
let reporte_cosecha
let reporte_empleado
let reporteAvanzado = {}


// variable para crear opcion
let opcion

let dataReporte
if (cosecha_pago) {
    cosecha_pago.addEventListener("change", () => {
        empleado.innerHTML = `<option selected>Seleccione el empleado</option> `
        LimpiarTablaRecolector()
        reporte_cosecha = cosecha_pago.value
        //SE GUARDA EL ID DE LA COSECHA PARA LISTAR A LOS EMPLEADOS QUE ESTEN REGISTRADOS EN LA MISMA
        dataReporte = { id_cosecha: reporte_cosecha }
        $.post("views/ajax/recolectores_cosecha_ajax.php", { dataReporte }, function (dato) {
            let response = (JSON.parse(dato))

            response.forEach(x => {

                //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
                opcion = document.createElement('option')
                opcion.value = x.id
                opcion.text = x.nombres + " " + x.apellidos
                empleado.add(opcion)
            })
        })
    })
}
let id_empleado
if (empleado) {
    empleado.addEventListener("change", () => {
        // extraigo el nombre para usarlo en la tabla siguiente
        nombreEmpleado = empleado.options[empleado.selectedIndex].text
        reporte_empleado = empleado.value
        //console.log(empleado.value);

    })
}



if (btnGenerarCant) {
    btnGenerarCant.addEventListener("click", () => {
        if (fecInicio.value.trim() == "" || fecFin.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incompletos',
            })
        } else {
            //SE CREAN DOS OBJETOS PARA LAS DOS PETICIONES QUE SE NECESITAN
            reporteAvanzado = { id_empleado: reporte_empleado, id_cosecha: reporte_cosecha, fecha_inicio: fecInicio.value, fecha_fin: fecFin.value }
            reporteAvanzadoPagos = { id_empleado: reporte_empleado, fecha_inicio: fecInicio.value, fecha_fin: fecFin.value }
            ////console.log(reporteAvanzado);
            ////console.log(reporteAvanzadoPagos);
            //SE CONSULTAN LOS PAGOS ANTERIORES DEL EMPLEADO ENTRE LAS FECHAS SELECCIONADAS
            $.post("views/ajax/reporte_consultar_pagosanteriores_ajax.php", { reporteAvanzadoPagos }, function (dato) {
                res = JSON.parse(dato)
                if (res == false) {
                    //VARIABLE PARA GUARDAR LA CANTIDAD QUE YA SE LE HA PAGADO

                    pagoAbonado = 0
                } else {
                    //VARIABLE PARA GUARDAR LA CANTIDAD QUE YA SE LE HA PAGADO

                    pagoAbonado = res.total_pagado;

                }
                //pagoAbonado = res.total_pagado;


                //SE CONSULTAN LOS DATOS DEL RECOLECTOR KILOS TOTALES RECOGIDOS EN LA COSECHA, EL VALOR POR KILO, ETC
                $.post("views/ajax/reporte_avanzado_ajax.php", { reporteAvanzado }, function (dato) {
                    let response = (JSON.parse(dato))
                    //console.log(response);
                    //console.log(pagoAbonado);
                    //console.log((parseInt(pagoAbonado)));
                    /*     response.forEach(element => {
    
                            bodyReporte.innerHTML = `
                        <tr> 
                        <td>${nombreEmpleado}</td>
                        <td>${element.kilos_totales}</td>
                        <td>$ ${(new Intl.NumberFormat('cop-CO').format(element.total_pagar))}</td>
                        <td>$ ${(new Intl.NumberFormat('cop-CO').format(parseInt(pagoAbonado)))}</td>
                        <td>$ ${(new Intl.NumberFormat('cop-CO').format(element.total_pagar - (parseInt(pagoAbonado))))}</td>
    
                        </tr>`
                        }) */
                    bodyReporte.innerHTML = `
                    <tr> 
                    <td>${nombreEmpleado}</td>
                    <td>${response.kilos_totales}</td>
                    <td>$ ${(new Intl.NumberFormat('cop-CO').format(response.total_pagar))}</td>
                    <td>$ ${(new Intl.NumberFormat('cop-CO').format(parseInt(pagoAbonado)))}</td>
                    <td>$ ${(new Intl.NumberFormat('cop-CO').format(response.total_pagar - (parseInt(pagoAbonado))))}</td>

                    </tr>`


                })
            })

        }

    })
}


function LimpiarTablaRecolector() {
    bodyReporte.innerHTML = ``
    LimpiarSelectRecolector()
}
function LimpiarSelectRecolector() {
    fecFin.value = ""
    fecInicio.value = ""
}

//------------------------------------------------------------------------------------------------------------------------







//-------------------------------------------------- REGISTRAR PAGO AL RECOLECTOR-------------------------------------------------------------------



let registro_pago = document.getElementById('registro_pago')
let cantidadPagar = document.getElementById('cantidadPagar')
let btnPagar = document.getElementById('btnPagar')
let tablaPagos = document.getElementById('tablaPagos')
let nombreRecolector = document.getElementById('nombreRecolector')
let jsonPagoRecolector = {}
let kilosRecogidos = document.getElementById('kilosRecogidos')

let totalPagar = document.getElementById('totalPagar')
let consultaPagos = {}
//VARIABLE PARA OBTENER EL VALOR DEL KILO POR COSECHA Y UTILIZARLO FUERA DE LA FUNCION
let valorKilo

let id_usuario_pagos


//SELECT PARA OBTENER EL ID DE LA COSECHA QUE SE ESTA SELECCIONANDO
if (registro_pago) {
    registro_pago.addEventListener("change", () => {
        tablaPagos.innerHTML = ``
        valor = registro_pago.value
        //SE GUARDA EN UN JSON PARA USARLO COMO PARAMETRO EN LA PETICION AJAX
        data = { id_cosecha: valor }
        ////console.log(registro_pago.value);
        $.post("views/ajax/usuarios_cosecha_ajax.php", { data }, function (dato) {
            let response = JSON.parse(dato)
            //SE ITERA EL RESPONSE PARA RELLENAR LA TABLA
            response.forEach(x => {
                // NOMBRE DEL RECOLECTOR EN EL ENCABEZADO
                tablaPagos.innerHTML += `
                <tr>
                <td><button type="button" class="btnPago btn btn-warning" data-cosecha="${x.id_cosecha}" data-id="${x.id}" data-nombre="${x.nombres}" data-apellido="${x.apellidos}" data-bs-toggle="modal" data-bs-target="#myModalEm"><i class="bi bi-plus-circle"></i></button></td>
                <td>${x.nombres} ${x.apellidos}</td>
                <td>${x.num_documento}</td>
                </tr>
                `

            })
            // VARIABLES PARA GUARDAR LOS DATOS
            const btnPago = document.querySelectorAll(".btnPago")
            btnPago.forEach((el) => {
                el.addEventListener("click", (e) => {
                    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARSE AFUERA DE LA FUNCION
                    id_usuario_pagos = el.dataset.id
                    numbre_usuario_pagos = el.dataset.nombre + " " + el.dataset.apellido
                    nombreRecolector.innerHTML = `${el.dataset.nombre} ${el.dataset.apellido}`
                    nombreRec = el.dataset.nombre + " " + el.dataset.apellido
                    jsonPagoRecolector = { id_usuario: el.dataset.id, id_cosecha: el.dataset.cosecha }
                    consultaPagos = { id_usuario: el.dataset.id }

                    $.post("views/ajax/calcular_pago_recolector_ajax.php", { jsonPagoRecolector }, function (dato) {
                        let response = (JSON.parse(dato))
                        kilosRecogidos.value = parseInt(response.total_recogido)

                        //EN ESTA VARIABLE CUARDO EL VALOR DEL KILO DE LA COSECHA
                        valorKilo = parseInt(response.pago_kilo)

                        $.post("views/ajax/consultar_pagos_recolector_ajax.php", { consultaPagos }, function (dato) {
                            //LA VARIABLE CANTIDAD VA A GUARDAR EL TOTAL DE TODOS LOS PAGOS QUE SE LE HAN REALIZADO AL RECOLECTOR
                            let cantidad = parseInt(dato)

                            //EL CONTROLADOS DEVUELVE EL NUMERO 0 EN CASO DE QUE EL EMPLEADO NO TENGA NINGUN PAGO ANTERIOR REGISTRADO
                            if (cantidad == 0) {

                                totalPagar.value = '$' + (new Intl.NumberFormat('cop-CO').format((kilosRecogidos.value * valorKilo)))
                                totalPagarOperacion = parseInt(kilosRecogidos.value) * parseInt(valorKilo)

                            } else {
                                //SI YA TIENE PAGOS REGISTRADOS SE LE RESTARA AL TOTAL QUE HAY QUE PAGA
                                totalPagar.value = totalPagar.value = '$' + (new Intl.NumberFormat('cop-CO').format((kilosRecogidos.value * valorKilo) - cantidad))
                                totalPagarOperacion = (kilosRecogidos.value * valorKilo) - cantidad


                            }
                        })

                    })

                })
            })
        })
    })

    btnPagar.addEventListener("click", () => {
        //SE VALIDA LAS CANTIDADES QUE SE VAN A INGRESAR
        if (parseInt(cantidadPagar.value) > parseInt(totalPagarOperacion) || parseInt(cantidadPagar.value) <= 0 || cantidadPagar.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Cantidad incorrecta',
            })

        } else {
            resultado = totalPagarOperacion - cantidadPagar.value

            //SE GUARDAN LOS RESULTADOS EN UN OBJETO PARA REGISTRAR EL PAGO
            pago = { cantidad: cantidadPagar.value, id_usuario: id_usuario_pagos, id_cosecha: valor }

            Swal.fire({
                title: 'Registrar kilos',
                text: `¿Seguro que desea registrar el pago de $${(new Intl.NumberFormat('cop-CO').format(cantidadPagar.value))} pesos al empleado ${nombreRec}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Registrar',
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
                    $.post("views/ajax/registrar_pago_recolector_ajax.php", { pago }, function (dato) {
                        let response = dato
                        //console.log(response);
                    })
                    Swal.fire({
                        icon: 'success',
                        title: `Nuevo saldo al recolector: ${numbre_usuario_pagos}  es de:  $${(new Intl.NumberFormat('cop-CO').format(resultado))} pesos `,
                        showConfirmButton: false,
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

                            location.href = 'index.php?page=registroPagos'

                        }
                    })



                    //location.href = 'index.php?page=registroPagos'

                }
            })

        }
    })
}
//-------------------------------------------------------------------------------------------------------------------






//-------------------------------------------REPORTE DE KILOS POR COSECHA----------------------------------------------------
let reporteKilos = document.getElementById("reporteKilos")
let tbodyReporte = document.getElementById("tbodyReporte")
let div = document.getElementById("headReporte")
let empleados
let reporte = {}
let reporteID

//LISTAR LAS COSECHAS PARA CAPTURAR EL ID DE UNA COSECHA
if (reporteKilos) {
    reporteKilos.addEventListener("change", () => {

        //SE LIMPIAN LAS TABLAS CADA QUE SE CAMBIE DE COSECHA
        tbodyReporte.innerHTML = ``;
        div.innerHTML = ``;
        reporteID = reporteKilos.value

        //SE GUARDA EL ID DE LA COSECHA EN UN OBJETO PARA USARLO COMO PARAMETRO DE LA PETICION
        reporte = { reporte: reporteID }

        $.ajax({
            url: 'views/ajax/reporte_kilos_ajax.php',
            type: 'POST',
            data: { reporte },
            dataType: 'json',
            success: function (response) {
                //console.log(response);
                // LLEVAR EL CONTEO DE TODOS LOS KILOS DE LA COSECHA
                conteo = response.reduce((x, y) => x += (parseInt(y.total_kilos)), 0)
                // SE LLEVA EL CONTEO TOTAL DE EMPLEADOS EN LA COSECHA
                empleados = 0
                response.forEach(data => {
                    empleados++
                })
                //console.log(empleados);
                response.forEach(element => {
                    // //console.log(element);
                    tbodyReporte.innerHTML += `
                  <tr>
                  <td><strong>${element.Nombre}</strong> </td>
                  <td>${element.total_kilos} Kilos</td>
                  <td>${(element.total_kilos) * .20} Kilos</td>
                  <td>${(element.total_kilos - (element.total_kilos * 0.20))} Kilos</td>
                  </tr>
                 
                  `
                    div.innerHTML = ` <tr scope="row">
                      <th>Total empleados de la cosecha</th>
  
                      <th>Total Kilos recogidos</th>
                      <th>Total Cafe Guayaba</th>
                      <th>Total Cafe Pergamino</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td><strong>${empleados}</strong> </td>
                  <td>${conteo} Kilos</td>
                  <td>${(conteo) * 0.20} Kilos</td>
                  <td> ${(conteo - (conteo * 0.20))} Kilos</td>
                  </tbody>
                  `


                })
            }
        });
    })
}

//-----------------------------------REGISTRAR PAGO A ENCARGADOS---------------------------------------------------

let buscar_recolectores = document.getElementById('buscar_recolectores')
let tbodyEncargados = document.getElementById('tbodyEncargados')
let nombreEncargado = document.getElementById('nombreEncargado')
let diasTrabajados = document.getElementById('diasTrabajados')
let totalPagarEncargado = document.getElementById('totalPagarEncargado')
let btnPagarEncargado = document.getElementById('btnPagarEncargado')
let cantidadPagarEncargado = document.getElementById('cantidadPagarEncargado')

if (buscar_recolectores) {
    buscar_recolectores.addEventListener("change", () => {

        tbodyEncargados.innerHTML = ``
        dataCosecha = { id_cosecha: buscar_recolectores.value }
        $.post("views/ajax/reporte_encargado_ajax.php", { dataCosecha }, function (dato) {
            let response = JSON.parse(dato)
            // //console.log(response);
            response.forEach(x => {

                tbodyEncargados.innerHTML += `
                <tr>
                <td><button type="button" class="pagoEncargado btn btn-warning" data-pago="${x.pago_encargado}" data-id="${x.id}" data-fecha="${x.fecha_inicio}" data-nombre="${x.nombres}" data-apellido="${x.apellidos}" data-bs-toggle="modal" data-bs-target="#myModalEm"><i class="bi bi-plus-circle"></i></button></td>
                <td>${x.nombres} ${x.apellidos}</td>
                <td>${x.apellidos}</td>
                </tr>
                
                `
            })

            // VARIABLES PARA GUARDAR LOS DATOS
            const pagoEncargado = document.querySelectorAll(".pagoEncargado")
            pagoEncargado.forEach((el) => {
                el.addEventListener("click", (e) => {
                    //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARSE AFUERA DE LA FUNCION
                    id_encargado_pago = el.dataset.id
                    nombre_recolector_pagos = el.dataset.nombre + " " + el.dataset.apellido
                    nombreEncargado.innerHTML = `${el.dataset.nombre} ${el.dataset.apellido}`
                    fechaInicial = el.dataset.fecha
                    jsonPagoEncargado = { id_usuario: el.dataset.id, id_cosecha: el.dataset.cosecha }
                    pagoAencargado = el.dataset.pago
                    //console.log(pagoAencargado);
                    date = new Date();
                    fechaActual = date.toISOString().split('T')[0]
                    // //console.log(fechaActual, fechaInicial);


                    // consultaPagos = { id_usuario: el.dataset.id }
                    consultaEncargadoInd = { id_usuario: id_encargado_pago }
                    consultaDias = { id_usuario: id_encargado_pago }
                    //SE CONSULTA CUANTO LE HAN PAGADO AL RECOLECTOR
                    $.post("views/ajax/calcular_pagos_encargados_ajax.php", { consultaEncargadoInd }, function (dato) {
                        //CONSULTAR LA CANTIDAD DE DIAS QUE EL ENCARGADO NO HA TRABAJADO



                        let response = parseInt(dato);
                        // //console.log(typeof response);
                        $.post("views/ajax/consultar_cantidad_dias_notrabajados_ajax.php", { consultaDias }, function (datas) {
                            let rta = JSON.parse(datas)
                            //  //console.log(rta);
                            //dias trabajados, se calcula la cantidad de dias entre dos fechas y se le resta la cantidad de dias que se registraron como no asistencia
                            diasTrabajados.value = (CalcularFechaPagos(fechaInicial, fechaActual)) - rta

                            if (response == 0) {
                                //SI NO TIENE PAGOS SE DEVUELVE UN 0 Y SE CALCULA EL TOTAL A PAGAR
                                totalPagarEncargado.value = '$' + (new Intl.NumberFormat('cop-CO').format((diasTrabajados.value * (parseInt(pagoAencargado)))))

                                totalPagarEncargadoOperacion = diasTrabajados.value * parseInt(pagoAencargado)
                            } else {
                                //SI YA TIENE PAGOS ANTERIORMENTE SE LE RESTAN AL TOTAL

                                totalPagarEncargado.value = '$' + (new Intl.NumberFormat('cop-CO').format(((diasTrabajados.value * parseInt(pagoAencargado)) - response)))

                                totalPagarEncargadoOperacion = (diasTrabajados.value * parseInt(pagoAencargado)) - response
                            }
                        })

                    })
                })
            })
        })
    })
}
if (btnPagarEncargado) {
    btnPagarEncargado.addEventListener("click", () => {
        if (parseInt(cantidadPagarEncargado.value) <= 0 || cantidadPagarEncargado.value.trim() == "" || parseInt(cantidadPagarEncargado.value) > totalPagarEncargadoOperacion) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Cantidad incorrecta',
            })
        } else {
            resultadoEncargado = totalPagarEncargadoOperacion - parseInt(cantidadPagarEncargado.value)
            //console.log(resultadoEncargado);
            pagoEncargado = { pago: cantidadPagarEncargado.value, id_usuario: id_encargado_pago, id_cosecha: buscar_recolectores.value }


            Swal.fire({
                title: 'Registrar kilos',
                text: `¿Seguro que desea registrar el pago de $${(new Intl.NumberFormat('cop-CO').format(cantidadPagarEncargado.value))} pesos al encargado ${nombre_recolector_pagos}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Registrar',
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
                    Swal.fire({

                        icon: 'success',
                        title: `Nuevo saldo del encargado: ${nombre_recolector_pagos}  es de:  $${(new Intl.NumberFormat('cop-CO').format(resultadoEncargado))} pesos `,
                        showConfirmButton: false,
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
                            $.post("views/ajax/registrar_pago_encargado_ajax.php", { pagoEncargado }, function (dato) {
                                let response = dato
                                //console.log(response);
                            })
                            location.href = 'index.php?page=pagoEncargados'



                        }

                    })



                    //location.href = 'index.php?page=registroPagos'

                }
            })

        }
    })
}










//FUNCION PARA CALCULAR LOS DIAS TRASCURRIDOS DESDE QUE SE ABRIÓ LA COSECHA HASTA EL DIA DE LA CONSULTA
function CalcularFechaPagos(d1, d2) {
    let day1 = new Date(d1);
    let day2 = new Date(d2);
    let difference = Math.abs(day2 - day1);
    days = difference / (1000 * 3600 * 24)

    // //console.log(days)
    return days
}

//$.post("views/ajax/reporte_encargado_ajax.php", { dataCosecha }, function (dato) {
//REPORTE TODOS LOS PAGOS

let reportePagos = document.getElementById('reportePagos')
let tablaReporte = document.getElementById('tbodyReporte')
let ObjreportePago = {}
if (reportePagos) {
    reportePagos.addEventListener("change", () => {
        tablaReporte.innerHTML = ``
        ObjreportePago = { id_cosecha: reportePagos.value }
        //console.log(ObjreportePago);
        $.post("views/ajax/reporte_pagos_ajax.php", { ObjreportePago }, function (dato) {
            let response = JSON.parse(dato)

            //console.log(response);
            response.forEach(x => {
                tablaReporte.innerHTML += `
                <tr>
                <td>${x.nombres} ${x.apellidos}</td>
                <td>${x.num_documento}</td>
                <td>$${new Intl.NumberFormat('cop-CO').format(x.pagos)}</td>
                <td>${x.fecha}</td>

                </tr>
                `
            })
        })
    })
}