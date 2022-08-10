//js reporte avanzado encargados

let cosecha_encargado = document.getElementById("cosecha_encargado")
let listado_encargados = document.getElementById("listado_encargados")
let fecFinal = document.getElementById("fecFinal")
let fecIni = document.getElementById("fecIni")

let bodyReporteEncargado = document.getElementById("bodyReporteEncargado")
let dias_laborados
let pago_a_encargado
let id_encargado
let saldoEncargado
let saldoEncargadoOperacion
//VARIABLE PARA CREAR EL OPTION
let encargado

let btnGenerar = document.getElementById("btnGenerar")

if (cosecha_encargado) {
    cosecha_encargado.addEventListener("change", () => {

        // console.log(cosecha_encargado.value);
        LimpiarSelect()
        dataCosecha = { id_cosecha: cosecha_encargado.value }
        $.post("views/ajax/reporte_encargado_ajax.php", { dataCosecha }, function (dato) {

            let response = JSON.parse(dato)
            console.log(response);
            //SE RECORREN LOS VALORES DEL RESPONSE Y SE AGREGAN A UN OPTION DEL SELEC
            response.forEach(element => {
                pago_a_encargado = element.pago_encargado

                encargado = document.createElement('option')
                encargado.value = element.id
                encargado.text = element.nombres + " " + element.apellidos
                listado_encargados.add(encargado)
            });
        })

    })
}
if (listado_encargados) {
    listado_encargados.addEventListener("change", () => {

        encargadoNombre = listado_encargados.options[listado_encargados.selectedIndex].text
        id_encargado = listado_encargados.value

        LimpiarTabla()
    })
}
if (btnGenerar) {

    btnGenerar.addEventListener("click", () => {
        if (fecFinal.value == "" || fecIni == "") {
            console.log("error");
        } else {
            // limpiar tabla

            LimpiarTabla()

            dataConsulta = { id_cosecha: cosecha_encargado.value, id_empleado: id_encargado, fecha_inicio: fecIni.value, fecha_fin: fecFinal.value }
            console.log(dataConsulta);
            $.post("views/ajax/generar_reporte_encargado_ajax.php", { dataConsulta }, function (dato) {
                let response = JSON.parse(dato);
                 console.log(response);
                dias_laborados = CalcularFecha(fecIni.value, fecFinal.value)
                console.log(days);
                consultaEncargado = { id_usuario: id_encargado }
                $.post("views/ajax/calcular_pagos_encargados_ajax.php", { consultaEncargado }, function (dato) {
                    let rta = parseInt(dato);
                    //console.log(rta);
                    //CAPTURO EL VALOR CANCELADO AL ENCARGADO EN DOS VARIABLES, UNA PARA FORMATEAR AL FORMATO DE PESO COLOMBIANO Y LA OTRA PARA TRABAJAR
                    saldoEncargado = rta
                    console.log(saldoEncargado);

                    response.forEach(element => {
                        bodyReporteEncargado.innerHTML += `
                           <tr>
                           <td>${encargadoNombre}</td>
                           <td>${days - parseInt(element.dias_no_asistidos)}</td>
                           <td>${element.dias_no_asistidos}</td>
                           <td>$ ${(new Intl.NumberFormat('cop-CO').format(days * pago_a_encargado))}</td>
                           <td>$ ${(new Intl.NumberFormat('cop-CO').format(saldoEncargado))}</td>
                           <td>$ ${(new Intl.NumberFormat('cop-CO').format(((days - parseInt(element.dias_no_asistidos)) * pago_a_encargado) - saldoEncargado))}</td>
                           </tr>
                           `
                    })
                        
                })
            })

        }



    });



}

function CalcularFecha(d1, d2) {
    let day1 = new Date(d1);
    let day2 = new Date(d2);
    let difference = Math.abs(day2 - day1);
    days = difference / (1000 * 3600 * 24)
    console.log(days)
}

function LimpiarTabla() {
    bodyReporteEncargado.innerHTML = ``
}

function LimpiarSelect() {
    listado_encargados.innerHTML = `<option selected>Seleccione el encargado</option> `
    fecFinal.value = ""
    fecIni.value = ""
} 