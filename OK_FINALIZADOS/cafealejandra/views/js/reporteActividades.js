/* RECOLECTOR 1 */


document.addEventListener("DOMContentLoaded", function () {

  let idEmp = document.getElementById("userId").value
  let id_empleado = { id_empleado: idEmp }
  let spanNombre = document.querySelector(".nombreEmpleado")
  let tablaActividades = document.getElementById("tablaActividades")

  $.post('views/ajax/reporte_actividades_ajax.php', { id_empleado }, function (dato) {
   
    response = JSON.parse(dato)
  //  console.log(response);
    //registroEmpleado = response[0]
    response.forEach(element => {

      spanNombre.innerHTML = `${element.nombres} ${element.apellidos}`
      //console.log(element);
      tablaActividades.innerHTML += `
        <tr>
        <td>${element.fecha_registro}</td>
        <td>${element.kilos}</td>
        <td>${'$' + (new Intl.NumberFormat('cop-CO').format(element.kilos * element.pago_kilo))}</td>
        </tr>        
        `
    })

  })


  $.post('views/ajax/consultar_pagos_recolector_ajax.php', { id_empleado }, function (dato) {
    response = JSON.parse(dato)
    //console.log(response);
    response.forEach(x => {
      theadPagos.innerHTML = `
      <tr>
        <th scope="col">Fecha del pago</th>
        <th scope="col">Pago</th>     
      </tr>
      </thead>
`

      tbodyPagos.innerHTML += ` 
     <tr>
    <td>${x.fecha}</td>
    <td>${'$' + (new Intl.NumberFormat('cop-CO').format(x.pagos))}</td>
    </tr>          
    </tbody>

`
    })

  })


})


