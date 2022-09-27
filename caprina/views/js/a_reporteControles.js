

//------------------------------REPORTE DE CONTROLES DE LOS CAPRINOS---------------------------------------------
//id del cargo capturado en campo oculto
let id_cargoOculto = document.getElementById('id_cargoOculto')

let fecha_inicioReporteAdministrador = document.getElementById('fecha_inicioReporteAdministrador')
let fecha_finReporteAdministrador = document.getElementById('fecha_finReporteAdministrador')
let tbody_reporte_controlesReporteAdministrador = document.getElementById('tbody_reporte_controlesReporteAdministrador')
let thead_reporteReporteAdministrador = document.getElementById('thead_reporteReporteAdministrador')
let btnReporteC = document.getElementById('btnReporteC')
let seleccion_enfermedadReporteAdministrador = document.getElementById('seleccion_enfermedadReporteAdministrador')

//------------------DIV DATOS DEL FORMULARIO---------------------------
let div_formulario = document.getElementById('div_formulario')
div_formulario ? div_formulario.style.display = "block" : ''

//--------------------BOTON PARA REGARGAR LA PAGINA
let btn_nueva_consulta = document.getElementById('btn_nueva_consulta')
btn_nueva_consulta ? btn_nueva_consulta.style.display = "none" : ''

//-*-------------------AL DARLE CLICK AL BOTON RECARGA LA PAGINA BORRANDO EL CACHÉ
btn_nueva_consulta ? btn_nueva_consulta.addEventListener("click", _ => { location.reload() }) : ''




if (btnReporteC) {
    btnReporteC.addEventListener("click", () => {
        //Con cada click del boton se limpian las tablas
        tbody_reporte_controlesReporteAdministrador.innerHTML = ``
        thead_reporteReporteAdministrador.innerHTML = ``
        //-**-*-*-*-*-*-*-*-----------******--------*********---------******-------

        //se llama la funcion y se le pasan los parametros
        ReporteControles(fecha_inicioReporteAdministrador, fecha_finReporteAdministrador, tbody_reporte_controlesReporteAdministrador, thead_reporteReporteAdministrador, seleccion_enfermedadReporteAdministrador, id_cargoOculto, id_userOculto)
    })
}


function ReporteControles(fecha_inicio, fecha_fin, tbody_reporte_controles, thead_reporte, seleccion_enfermedad, idCargo, idUsuario) {

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
                    ocultar()
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
                    ocultar()
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
                    ocultar()
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
                    ocultar()
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

//---------------------------------------------------------------------------------------------------------------------


function ocultar() {
    //SI SE LLENAN LOS DATOS Y SE REALIZA LA CONSULTA SE OCULTA EL DIV DEL FORMULARIO Y SE MUESTRA EL BOTON  DE RECARGAR LA PGINA
    div_formulario.style.display = "none";
    btn_nueva_consulta.style.display = "block";
}