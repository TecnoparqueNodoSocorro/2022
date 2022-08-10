


document.addEventListener("DOMContentLoaded", function () {
  //console.log("Hola ");

  // Variables quemadas
  let idEmp = 4
  let id_empleado = { id_empleado: idEmp }
  let nombre
  let apellidos
  let cargoEmpleado
  let documento
  let telefono
  let registroEmpleado
  let fecha
  let kilos
  let spanNombre = document.querySelector(".nombreEmpleado")
  let tablaActividades = document.getElementById("tablaActividades")
  /* 
     $.post({
     
     }"views/ajax/reporte_actividades_ajax.php", idEmp, dataType:"json", function (dato) {
       let response = (dato)
       console.log(response); */
  //    registroEmpleado = JSON.parse(response)
  //  console.log(registroEmpleado);



  $.post('views/ajax/reporte_actividades_ajax.php', { id_empleado }, function (dato) {
    response = JSON.parse(dato)
    console.log(response);
    //registroEmpleado = response[0]
    response.forEach(element => {

      spanNombre.innerHTML = `${element.nombres} ${element.apellidos}`
      //console.log(element);
      tablaActividades.innerHTML += `
        <tr>
        <td>${element.fecha_registro}</td>
        <td>${element.kilos}</td>
        <td>${ '$' + (new Intl.NumberFormat('cop-CO').format(element.kilos * element.pago_kilo))}</td>
        </tr>        
        `
    })

  })




})
