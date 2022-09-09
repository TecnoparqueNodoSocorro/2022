

//------------------------------REPORTE DE CONTROLES DE LOS CAPRINOS---------------------------------------------
//id del cargo capturado en campo oculto
let id_cargoOculto = document.getElementById('id_cargoOculto')

let fecha_inicioReporteAdministrador = document.getElementById('fecha_inicioReporteAdministrador')
let fecha_finReporteAdministrador = document.getElementById('fecha_finReporteAdministrador')
let tbody_reporte_controlesReporteAdministrador = document.getElementById('tbody_reporte_controlesReporteAdministrador')
let thead_reporteReporteAdministrador = document.getElementById('thead_reporteReporteAdministrador')
let btnReporteC = document.getElementById('btnReporteC')
let seleccion_enfermedadReporteAdministrador = document.getElementById('seleccion_enfermedadReporteAdministrador')

if (btnReporteC) {
    btnReporteC.addEventListener("click", () => {
        tbody_reporte_controlesReporteAdministrador.innerHTML = ``

        ReporteControles(fecha_inicioReporteAdministrador, fecha_finReporteAdministrador, tbody_reporte_controlesReporteAdministrador, thead_reporteReporteAdministrador, seleccion_enfermedadReporteAdministrador, id_cargoOculto, id_userOculto)
    })
}

function ReporteControles(fecha_inicio, fecha_fin, tbody_reporte_controles, thead_reporte, seleccion_enfermedad, idCargo, idUsuario) {

    if (fecha_inicio.value.trim() == "" || fecha_fin.value.trim() == "" || seleccion_enfermedad.value == "0") {
        DatosIncompletos()
    } else {
        fechas_reporte = { fecha_inicio: fecha_inicio.value, fecha_fin: fecha_fin.value, enfermedad: seleccion_enfermedad.value, cargo: idCargo.value, usuario: idUsuario.value }
      //  console.log(fechas_reporte);

        if (seleccion_enfermedad.value == "enfermedad_respiratoria") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
              //  console.log(response);
                response.forEach(x => {
                    //SE DIBUJA EL ENCABEZADO DE LA TABLA UNA SOLA VEZ
                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>

                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad respiratoria</th>
                    
                        <th>Fecha de registro</th>
        
                    </tr>`
                    //SE DIBUJA LA TABLA CONCATENANDO CADA UNO DE LOS RESULTADOS
                    tbody_reporte_controles.innerHTML += `
                        
                        <tr>
                        <td scope="row">${x.codigo_caprino}</td>
                        <td>${x.nombres} ${x.apellidos}</td>

                        <td>${x.raza}</td>
                        <td>${x.condicion_corporal}</td>
                      
                        <td>${x.enfermedad_respiratoria}</td>
                        <td>${x.fecha}</td>
                        </tr>
                        
                        `
                })
            })
        }


        if (seleccion_enfermedad.value == "enfermedad_gastrointestinal") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
               // console.log(response);
                response.forEach(x => {
                    //SE DIBUJA EL ENCABEZADO DE LA TABLA UNA SOLA VEZ
                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>
                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad gastrointestinal</th>    
                        <th>Fecha de registro</th>
        
                    </tr>`
                    //SE DIBUJA LA TABLA CONCATENANDO CADA UNO DE LOS RESULTADOS
                    tbody_reporte_controles.innerHTML += `
                        <tr>
                        <td scope="row">${x.codigo_caprino}</td>
                        <td>${x.nombres} ${x.apellidos}</td>
                        <td>${x.raza}</td>
                        <td>${x.condicion_corporal}</td>
                        <td>${x.enfermedad_gastrointestinal}</td>
                        <td>${x.fecha}</td>
                        </tr>
                        
                        `

                })
            })
        }

        if (seleccion_enfermedad.value == "enfermedad_mordedura") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
                //console.log(response);
                response.forEach(x => {
                    //SE DIBUJA EL ENCABEZADO DE LA TABLA UNA SOLA VEZ

                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>
                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad por mordeduras</th>    
                        <th>Fecha de registro</th>
                    </tr>`
                    //SE DIBUJA LA TABLA CONCATENANDO CADA UNO DE LOS RESULTADOS

                    tbody_reporte_controles.innerHTML += `
                        <tr>
                        <td scope="row">${x.codigo_caprino}</td>
                        <td>${x.nombres} ${x.apellidos}</td>
                        <td>${x.raza}</td>
                        <td>${x.condicion_corporal}</td>
                        <td>${x.enfermedad_mordedura}</td>
                        <td>${x.fecha}</td>
                        </tr>
                        
                        `

                })
            })
        }
        if (seleccion_enfermedad.value == "todas") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
               // console.log(response);
                response.forEach(x => {
                    //SE DIBUJA EL ENCABEZADO DE LA TABLA UNA SOLA VEZ

                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>
                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad respiratoria</th>    
                        <th>Enfermedad gastrointestinal</th>
                        <th>Enfermedad por mordedura</th>   
                        <th>Fecha de registro</th>
        
                    </tr>`
                    //SE DIBUJA LA TABLA CONCATENANDO CADA UNO DE LOS RESULTADOS

                    tbody_reporte_controles.innerHTML += `
                        <tr>
                        <td scope="row">${x.codigo_caprino}</td>
                        <td>${x.nombres} ${x.apellidos}</td>
                        <td>${x.raza}</td>
                        <td>${x.condicion_corporal}</td>
                        <td>${x.enfermedad_respiratoria}</td>

                        <td>${x.enfermedad_gastrointestinal}</td>
                        <td>${x.enfermedad_mordedura}</td>

                        <td>${x.fecha}</td>
                        </tr>
                        
                        `

                })
            })
        }

    }
}

//---------------------------------------------------------------------------------------------------------------------
