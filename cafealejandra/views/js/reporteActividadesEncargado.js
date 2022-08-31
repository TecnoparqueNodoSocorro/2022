
/*  ENCARGADOS 2 */
/* 234       12345 */
/* *************************************************************** */
//tabl para mostrar pagos

document.addEventListener("DOMContentLoaded", function () {

  let idEnc = document.getElementById("userId").value
  let id_encargado = { id_encargado: idEnc }
  let spanNombreEnc = document.querySelector(".nombreEncargado")
  let tbodyEncargados = document.getElementById("tbodyEncargados")
  let tbodyEncargadosPagos = document.getElementById("tbodyEncargadosPagos")


  id_empleado = { id_empleado: idEnc }
  //console.log(idEnc);

  $.post('views/ajax/reporte_dias_encargados_ajax.php', { id_encargado }, function (dato) {
    response = JSON.parse(dato)
    //console.log(response);

    response.forEach(element => {
      if (spanNombreEnc) {

        spanNombreEnc.innerHTML = `${element.nombres + " " + element.apellidos}`

      }
      if (tbodyEncargados) {
        tbodyEncargados.innerHTML += `
          <tr>
          <td>${element.dia_no_asistido}</td>
          </tr>        
          `

      }

    })
  })



  $.post('views/ajax/consultar_pagos_recolector_ajax.php', { id_empleado }, function (dato) {
    response = JSON.parse(dato)
    //console.log(response);

    response.forEach(x => {
      if (tbodyEncargadosPagos) {
        tbodyEncargadosPagos.innerHTML += `
      <tr>
      <td>${x.fecha}</td>
      <td>${x.pagos}</td>

      </tr>
      `
      }
    })

  })


})
