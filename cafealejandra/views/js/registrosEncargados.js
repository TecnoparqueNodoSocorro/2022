/* ADMINISTRADOR  3 */
///////////////////////////////REGISTRAR DIA NO LABORADO POR ENCARGADO/////////////////////////////

//console.log("dias encargados");
let bodyEncargados = document.getElementById("bodyEncargados")
let nombre_encargado = document.getElementById("nombre_encargado")
//registro de pago captura dato  encargado
let diasNo = document.getElementById('diasNoAsistidos')
let btnCalcularEncargado = document.getElementById('btnCalcularEncargado')



let dias_encargados = document.getElementById("dias_encargados")

// TRAER A TODOS LOS ENCARGADOS
if (dias_encargados) {
    dias_encargados.addEventListener("change", () => {
        bodyEncargados.innerHTML = ``;
        // console.log(dias_encargados.value);
        data = { id_cosecha: dias_encargados.value }
        // console.log(data);
        $.post("views/ajax/encargados_cosechas_ajax.php", { data }, function (dato) {
            let response = JSON.parse(dato)
            // console.log(response);
            response.forEach(element => {
                // console.log(element);
                data = element;
                bodyEncargados.innerHTML += `
               <tr>
               <td><button type="button"  class="capturarNombre btn btn-warning" data-id="${element.id}" data-nombre="${element.nombres} ${element.apellidos}" data-bs-toggle="modal" data-bs-target="#myModalEncargado">
               <i class="bi bi-plus-circle"></i>
           </button></td>
               <td>${element.nombres} ${element.apellidos}</td>
               <td>${element.num_documento}</td>
             
               </tr>
               `
                // VARIABLES PARA GUARDAR LOS DATOS
                const capturarNombre = document.querySelectorAll(".capturarNombre")
                capturarNombre.forEach((el) => {
                    el.addEventListener("click", (e) => {
                        nombre_encargado.innerText = `${el.dataset.nombre}`
                        id = el.dataset.id
                        nombre = el.dataset.nombre
                        console.log(id);
                    })
                })
            });
        })
    })


}



if (btnCalcularEncargado) {
    btnCalcularEncargado.addEventListener("click", () => {
        if (diasNo.value.trim() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione una fecha',
            })
        } else {
            datos = { id_empleado: id, id_cosecha: dias_encargados.value, dia: diasNo.value }
            console.log(datos);
            Swal.fire({
                title: 'Registrar dia no laborado',
                text: `¿Seguro que desea registrar que el día: ${diasNo.value}  el empleado ${nombre} no trabajó?`,
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
                    $.post("views/ajax/reporte_dias_encargados_ajax.php", { datos }, function (dato) {
                        let response = JSON.parse(dato)
                        console.log(response);
                        //se valida si la fecha que se intenta registrar ya se encuentra registrada
                        if (response == "Fecha ya registrada") {
                            Swal.fire({
                                icon: 'error',
                                title: ` ${diasNo.value} ${response}`,
                                showConfirmButton: false,
                            })
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: `Día agregado`,
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
                                    location.href = 'index.php?page=registrarDiasEncargados'
                                }
                            })
                            setTimeout(function () {
                                location.href = 'index.php?page=registrarDiasEncargados'
                            }, 1200);
                        }
                        /* setTimeout(function () {
                            location.href = 'index.php?page=registrarDiasEncargados'
                        }, 1200); */
                    })










                }
            })


        }
    })
}



