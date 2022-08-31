//console.log("reprote general");

let selectReporte = document.getElementById('selectReporteGeneral')
let selectCargoReporteG = document.getElementById('selectCargoReporteG')
let ReporteGeneral = {}

//head tabla reporte recolectores
let theadReporte = document.getElementById('theadReporte')

//body tabla reporte recolectores
let tbodyReporteGeneral = document.getElementById('tbodyReporteGeneral')

//head tabla reporte general de recolectores
let headReporteGeneral = document.getElementById('headReporteGeneral')
/* selectReporte ? selectReporte.addEventListener("change", () => { }) : ""

selectCargoReporteG ? selectCargoReporteG.addEventListener("change", () => {
    console.log(selectCargoReporteG.value);
}) : ""

 */
function GenerarReporte() {

    LimpiarTablaReporte() 


    if (selectReporte.value == "0" || selectCargoReporteG.value == "0") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Datos incompletos',
        })
    } else {
        ReporteGeneral = { id: selectReporte.value, cargo: selectCargoReporteG.value }
        switch (selectCargoReporteG.value) {
            case "1":

                $.post("views/ajax/usuarios_ajax.php", { ReporteGeneral }, function (dato) {
                    let response = JSON.parse(dato)
                    console.log(response);
                   /*  //Llevar el conteo de los empleados
                    empleados = 0 */
                    //total recogido se hace la conversion de nulo a 0
                    totalRecogido = response.reduce((x, y) => x += (parseInt(y.sum_kilos)), 0)
                    //total a pagar
                    totalPagar = response.reduce((x, y) => x += (parseInt(y.totalPagar)), 0)
                    //total pagado
                    totalPagado = response.reduce((x, y) => x += (parseInt(y.sum_pagos)), 0)
                    //total faltante a pagar
                    faltantePagar = response.reduce((x, y) => x += (parseInt(y.total_deber)), 0)

                    response.forEach(x => {
                        //empleados++

                        //cabeza de la tabla de recolectores se usa la misma tabla para encargados
                        theadReporte.innerHTML = `
                    <tr>
                    <th>Nombre</th>
                    <th>Kilos recogidos</th>
                    <th>Total a pagar</th>
                    <th>Total pagado</th>
                    <th>Faltante a pagar</th>
                    </tr> 
                    </thead>`
                        //body de la tabla de recolectores se usa la misma tabla para encargados
                        //se hace un operador ternario en cada campo, si el campo viene nullo entonces se reemplaza por un 0
                        tbodyReporteGeneral.innerHTML += `
                    <tr>
                    <td>${x.nombres + " " + x.apellidos}</td>
                    <td>${x.sum_kilos}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(x.totalPagar)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(x.sum_pagos)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(x.total_deber)}</td>
                    </tr>
                    `
                    new Intl.NumberFormat('cop-CO').format()

                        //tabla del reporte en general se usa la misma tabla para encargados
                        headReporteGeneral.innerHTML = `
                    <tr>
                    <th>Total kilos recogidos</th>
                    <th>Total a pagar</th>
                    <th>Total pagado</th>
                    <th>Total faltante a pagar</th>
                    </tr>
                    <tbody>
                    <tr> 
                    <td>$${new Intl.NumberFormat('cop-CO').format(totalRecogido)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(totalPagar)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(totalPagado)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(faltantePagar)}</td>


                    </tr>
                    </tbody>
                    `

                    });
                })
                break;
            case "2":
                $.post("views/ajax/usuarios_ajax.php", { ReporteGeneral }, function (dato) {
                    let response = JSON.parse(dato)
                    console.log(response);
                    encargados = 0
                    total_pagar = response.reduce((x, y) => x += (parseInt(y.total_a_pagar)), 0)
                    total_pagado = response.reduce((x, y) => x += (parseInt(y.suma_de_pagos)), 0)
                    total_deber = response.reduce((x, y) => x += (parseInt(y.total_a_deber)), 0)

                    response.forEach(x => {
                        encargados++
                        theadReporte.innerHTML = `
                        <tr>
                        <th>Nombre</th>
                        <th>Días trabajados</th>
                        <th>Días no trabajados</th>
                        <th>Total a pagar</th>
                        <th>Total pagado</th>
                        <th>Faltante a pagar</th>
                        </tr> 
                        </thead>`

                        tbodyReporteGeneral.innerHTML += `
                        <tr>
                        <td>${x.nombres + " " + x.apellidos}</td>
                        <td>${x.dias_trabajados}</td>
                        <td>${x.dias_no_asistidos}</td>
                        <td>$${new Intl.NumberFormat('cop-CO').format(x.total_a_pagar)}</td>
                        <td>$${new Intl.NumberFormat('cop-CO').format(x.suma_de_pagos)}</td>
                        <td>$${new Intl.NumberFormat('cop-CO').format(x.total_a_deber)}</td>
                        </tr>
                        `

                        //tabla del reporte en general se usa la misma tabla para encargados
                        headReporteGeneral.innerHTML = `
                    <tr>
                    <th>#Encargados</th>
                    <th>Total a pagar</th>
                    <th>Total pagado</th>
                    <th>Total faltante a pagar</th>
                    </tr>
                    <tbody>
                    <tr>
                    <td>${encargados}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(total_pagar)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(total_pagado)}</td>
                    <td>$${new Intl.NumberFormat('cop-CO').format(total_deber)}</td>


                    </tr>
                    </tbody>
                    `
                    });
                })

            break;
        }
    
    }

}
function LimpiarTablaReporte() {
    theadReporte.innerHTML = ""
    tbodyReporteGeneral.innerHTML = ""
    headReporteGeneral.innerHTML = ""
}

/*   ReporteGeneral = { id: selectReporte.value }
  $.post("views/ajax/cosecha_ajax.php", { ReporteGeneral }, function (dato) {
      let response = JSON.parse(dato)
     // console.log(response);
      response.forEach(x => {
          tbodyReporteGeneral.innerHTML+=`
          <tr>
          <td>${x.nombres+" "+x.apellidos}</td>
          <td>${x.total_kilos}</td>
          <td>${x.total_a_pagar}</td>
          </tr>
          `
      });
  }) 
  
  if(selectCargoReporteG == "1") {

         ReporteGeneral = { id: selectReporte.value }
        console.log(ReporteGeneral);
        $.post("views/ajax/usuarios_ajax.php", { ReporteGeneral }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
        })
    }
  
  */