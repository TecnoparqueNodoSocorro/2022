

//------------------------------REPORTE POR USUARIOS DE CONTROLES DE LOS CAPRINOS---------------------------------------------
let fecha_inicioReporteUsuario = document.getElementById('fecha_inicioReporteUsuario')
let fecha_finReporteUsuario = document.getElementById('fecha_finReporteUsuario')
let tbody_reporte_controlesReporteUsuario = document.getElementById('tbody_reporte_controlesReporteUsuario')
let thead_reporteReporteUsuario = document.getElementById('thead_reporteReporteUsuario')
let btnReporteControlesReporteUsuario = document.getElementById('btnReporteControlesReporteUsuario')
let seleccion_enfermedadReporteUsuario = document.getElementById('seleccion_enfermedadReporteUsuario')
//----------------------------------------------------------------------------------------------------------------

//------------------DIV DATOS DEL FORMULARIO---------------------------
let div_form_cont_c = document.getElementById('div_form_cont_c')
div_form_cont_c ? div_form_cont_c.style.display = "block" : ''

//--------------------BOTON PARA REGARGAR LA PAGINA
let btn_nueva_consulta_c = document.getElementById('btn_nueva_consulta_c')
btn_nueva_consulta_c ? btn_nueva_consulta_c.style.display = "none" : ''

//-*-------------------AL DARLE CLICK AL BOTON RECARGA LA PAGINA BORRANDO EL CACHÉ
btn_nueva_consulta_c ? btn_nueva_consulta_c.addEventListener("click", _ => { location.reload() }) : ''


if (btnReporteControlesReporteUsuario) {
    btnReporteControlesReporteUsuario.addEventListener("click", () => {

        //limpiar la tabla cada que se genere un reporte
        tbody_reporte_controlesReporteUsuario.innerHTML = ``
        //se llama la función para generar el reporte, funcion se encuentra en a_reporteControles.js
        ReporteControlesCaprinocultor(fecha_inicioReporteUsuario, fecha_finReporteUsuario, tbody_reporte_controlesReporteUsuario,
            thead_reporteReporteUsuario, seleccion_enfermedadReporteUsuario, id_cargoOculto, id_userOculto)
    })
}
function ReporteControlesCaprinocultor(fecha_inicio, fecha_fin, tbody_reporte_controles, thead_reporte, seleccion_enfermedad, idCargo, idUsuario) {

    if (fecha_inicio.value.trim() == "" || fecha_fin.value.trim() == "" || seleccion_enfermedad.value == "0") {
        DatosIncompletos()
    } else {




        fechas_reporte = { fecha_inicio: fecha_inicio.value, fecha_fin: fecha_fin.value, enfermedad: seleccion_enfermedad.value, cargo: idCargo.value, usuario: idUsuario.value }
        //   console.log(fechas_reporte);



        //SE SELECCIONA  EL VALOR DEL SELECT PARA REALIZAR LA CONSULTA AJAX SOLO BUSCANDO LA ENFERMEDAD
        if (seleccion_enfermedad.value == "enfermedad_respiratoria") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
                //console.log(response);
                //SE VALIDA QUE EL ARRAY NO VENGA VACIO, PORQUE TUMBA LA PAGINA SI SE INTENTA DIBUJAR VACIO
                if (response.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sin registros en ese campo de fechas',
                        confirmButtonColor: '#f69100',
                    })
                } else {
                    //SI LA CONSULTA SE GENERA CORRECTAMENTE SE OCULTA EL FORMULARIO Y SE MUESTRA EL BOTON
                    ocultar_c()
                    //--------------------------------------------------------------------

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
                    $(".rc_tabla").DataTable({
                        dom: "Bfrtip",
                    })
                }
            })
        }



        //SE SELECCIONA  EL VALOR DEL SELECT PARA REALIZAR LA CONSULTA AJAX
        if (seleccion_enfermedad.value == "enfermedad_gastrointestinal") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
                // console.log(response);

                //SE VALIDA QUE EL ARRAY NO VENGA VACIO, PORQUE TUMBA LA PAGINA SI SE INTENTA DIBUJAR VACIO
                if (response.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sin registros en ese campo de fechas',
                        confirmButtonColor: '#f69100',
                    })
                } else {

                    //SI LA CONSULTA SE GENERA CORRECTAMENTE SE OCULTA EL FORMULARIO Y SE MUESTRA EL BOTON
                    ocultar_c()
                    //--------------------------------------------------------------------

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
                    $(".rc_tabla").DataTable({
                        dom: "Bfrtip",
                    })
                }
            })
        }


        //SE SELECCIONA  EL VALOR DEL SELECT PARA REALIZAR LA CONSULTA AJAX
        if (seleccion_enfermedad.value == "enfermedad_mordedura") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
                //console.log(response);
                //SE VALIDA QUE EL ARRAY NO VENGA VACIO, PORQUE TUMBA LA PAGINA SI SE INTENTA DIBUJAR VACIO
                if (response.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sin registros en ese campo de fechas',
                        confirmButtonColor: '#f69100',
                    })
                } else {

                    //SI LA CONSULTA SE GENERA CORRECTAMENTE SE OCULTA EL FORMULARIO Y SE MUESTRA EL BOTON
                    ocultar_c()
                    //--------------------------------------------------------------------


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

                    $(".rc_tabla").DataTable({
                        dom: "Bfrtip",
                    })
                }
            })
        }


        //SE SELECCIONA  EL VALOR DEL SELECT PARA REALIZAR LA CONSULTA AJAX
        if (seleccion_enfermedad.value == "todas") {
            $.post("views/ajax/reportes_ajax.php", { fechas_reporte }, function (dato) {
                let response = (JSON.parse(dato))
                // console.log(response);
                //SE VALIDA QUE EL ARRAY NO VENGA VACIO, PORQUE TUMBA LA PAGINA SI SE INTENTA DIBUJAR VACIO
                if (response.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Sin registros en ese campo de fechas',
                        confirmButtonColor: '#f69100',
                    })
                } else {

                    //SI LA CONSULTA SE GENERA CORRECTAMENTE SE OCULTA EL FORMULARIO Y SE MUESTRA EL BOTON
                    ocultar_c()
                    //--------------------------------------------------------------------

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
                    $(".rc_tabla").DataTable({
                        dom: "Bfrtip",
                    })
                }
            })
        }
    }
}


function ocultar_c() {
    //SI SE LLENAN LOS DATOS Y SE REALIZA LA CONSULTA SE OCULTA EL DIV DEL FORMULARIO Y SE MUESTRA EL BOTON  DE RECARGAR LA PGINA
    div_form_cont_c.style.display = "none";
    btn_nueva_consulta_c.style.display = "block";
}