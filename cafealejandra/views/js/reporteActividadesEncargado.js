
/*  ENCARGADOS 2 */
/* 234       12345 */
/* *************************************************************** */
document.addEventListener("DOMContentLoaded", function () {

  let idEnc = document.getElementById("userId").value
  let id_encargado = { id_encargado: idEnc }
  let spanNombreEnc = document.querySelector(".nombreEncargado")
  let tbodyEncargados = document.getElementById("tbodyEncargados")



  $.post('views/ajax/reporte_dias_encargados_ajax.php', { id_encargado }, function (dato) {
    response = JSON.parse(dato)
    console.log(response);

  

    response.forEach(element => {
       if (spanNombreEnc){

        spanNombreEnc.innerHTML = `${element.nombres +" " +  element.apellidos}`

      } 
      if (tbodyEncargados){
 tbodyEncargados.innerHTML += `
          <tr>
          <td>${element.dia_no_asistido}</td>
          </tr>        
          `

      }
     
    })
  })





})
