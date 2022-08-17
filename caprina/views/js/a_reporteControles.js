

//------------------------------REPORTE DE CONTROLES DE LOS CAPRINOS---------------------------------------------
let fecha_inicio = document.getElementById('fecha_inicio')
let fecha_fin = document.getElementById('fecha_fin')
let tbody_reporte_controles = document.getElementById('tbody_reporte_controles')
let thead_reporte = document.getElementById('thead_reporte')
let btnReporteC = document.getElementById('btnReporteC')
let seleccion_enfermedad = document.getElementById('seleccion_enfermedad')

if (btnReporteC) {
    btnReporteC.addEventListener("click", () => {
        tbody_reporte_controles.innerHTML = ``

        ReporteControles()
    })
}

function ReporteControles() {
    if (fecha_inicio.value.trim() == "" || fecha_fin.value.trim() == "" || seleccion_enfermedad.value == "0") {
        DatosIncompletos()
    } else {
        fechas_reporte = { fecha_inicio: fecha_inicio.value, fecha_fin: fecha_fin.value, enfermedad: seleccion_enfermedad.value }
        console.log(fechas_reporte);

        if (seleccion_enfermedad.value == "enfermedad_respiratoria") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
                console.log(response);
                response.forEach(x => {
                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>

                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad respiratoria</th>
                    
                        <th>Fecha de registro</th>
        
                    </tr>`
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
                console.log(response);
                response.forEach(x => {
                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>
                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad gastrointestinal</th>    
                        <th>Fecha de registro</th>
        
                    </tr>`
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
                console.log(response);
                response.forEach(x => {
                    thead_reporte.innerHTML = `<tr>
                        <th>Código del caprino</th>
                        <th>Propietario</th>
                        <th>Raza</th>
                        <th>Condición corporal</th>
                        <th>Enfermedad por mordeduras</th>    
                        <th>Fecha de registro</th>
                    </tr>`
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
                console.log(response);
                response.forEach(x => {
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
