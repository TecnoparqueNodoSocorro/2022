
// let fermen = document.getElementById('fermen')


let estado
//titulo del modal
let numero_lote_f1 = document.getElementById('numero_lote_f1')
let numero_lote_f2 = document.getElementById('numero_lote_f2')
let numero_lote_f3 = document.getElementById('numero_lote_f3')
let numero_lote_f4 = document.getElementById('numero_lote_f4')


//tabla registros f1
let tbodyRegistrosLotesF1 = document.getElementById('tbodyRegistrosLotesF1')
//tabla registros f2
let tbodyRegistrosLotesF2 = document.getElementById('tbodyRegistrosLotesF2')

//CARGAR LAS TABLAS AL CARGAR LA PAGINA

document.addEventListener("DOMContentLoaded", () => {
    TraerLotesF1()
    TraerLotesF2()
    TraerLotesF3()
    TraerLotesF4()

    //SE LLAMAN LAS FUNCIONES QUE ESTAN EN e_gestionEmp.js PARA SOLO USAR UN DOMCONTENTLOADED
    TraerLotesF1Emp()
    TraerLotesF2Emp()
    TraerLotesF3Emp()
    TraerLotesF4Emp()
    //--------------------------------------------------------------------------
})


//FUNCIONES PARA TRAER LOS LOTES Y LISTARLOS AL MOMENTO DE CARGAR LA PAGINA
function TraerLotesF1() {
    let tbody1f = document.getElementById('tbody1f')
    //JSON LOS EL CODIGO DE LA FERMENTACION QUE SE QUIERE LISTAR
    const dataFase = { fermentacion: 1 }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {


            if (tbody1f) {
                tbody1f.innerHTML += `
            <tr>
            <td><button type="button" id="btnFerme1" data-estado="${element.fermentacion}" data-codigo="${element.codigo}" class="guardarCodigo1 btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#consultar">
            <i class="bi bi-plus-circle"></i>
        </button></td>
            <td>${element.codigo}</td>
            <td>${element.materia}</td>
            <td>${element.fecha_inicio}</td>
            <td>${element.peso_inicial}</td>
            </tr>
            `
            }
        });
        // VARIABLES PARA GUARDAR LOS DATOS
        const guardarCodigo1 = document.querySelectorAll(".guardarCodigo1")
        guardarCodigo1.forEach((el) => {

            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                //cada que se de click se limpie la tabla
                tbodyRegistrosLotesF1.innerHTML = ""

                //atributos data, CODIGO DEL LOTE Y FASE PARA USARLO EN EL AVANCE DE FASE Y EN EL LISTADO DE REGISTROS DEL LOTE
                codigo = el.dataset.codigo
                estado = el.dataset.estado
                //titulo del modal
                numero_lote_f1.innerText = `Lote: ${codigo} Fase: ${estado} `
                //json que va al ajax
                GetRegistrosPorFerm = { cod: codigo, state: estado }
                //llamado al ajax
                $.post("views/ajax/variables_ajax.php", { GetRegistrosPorFerm }, function (dato) {
                    let response = JSON.parse(dato)
                    // console.log(response);
                    //TABLA QUE MUESTRA LOS REGISTROS DE LOS LOTES QUE ESTAN EN FASE 1
                    response.forEach(x => {
                        tbodyRegistrosLotesF1.innerHTML += `
                        <tr>
                        <td>${x.nombres + " " + x.apellidos}</td>
                        <td>${x.brix}</td>
                        <td>${x.alcohol}</td>
                        <td>${x.ph}</td>
                        <td>${x.tds}</td>
                        <td>${x.ac}</td>
                        <td>${x.temperatura}</td>
                        <td>${x.humedad}</td>
                        <td>${x.fecha_registro}</td>
                        </tr>      
                        `
                    })
                })

            })
        })
    })
}

function TraerLotesF2() {
    let tbody2f = document.getElementById('tbody2f')
    //JSON LOS EL CODIGO DE LA FERMENTACION QUE SE QUIERE LISTAR

    const dataFase = { fermentacion: 2 }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {
            if (tbody2f) {
                tbody2f.innerHTML += `
            <tr>
            <td><button type="button" id="btnFerme2"  data-estado="${element.fermentacion}" data-codigo="${element.codigo}" class="guardarCodigo2 btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#consultar2fase">
            <i class="bi bi-plus-circle"></i>
        </button></td>
            <td>${element.codigo}</td>
            <td>${element.materia}</td>
            <td>${element.fecha_inicio}</td>
            <td>${element.peso_inicial}</td>
            </tr>
            `
            }
        });
        // VARIABLES PARA GUARDAR LOS DATOS
        const guardarCodigo2 = document.querySelectorAll(".guardarCodigo2")
        guardarCodigo2.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                //cada que se de click se limpie la tabla
                tbodyRegistrosLotesF2.innerHTML = ""
                //atributos data, CODIGO DEL LOTE Y FASE PARA USARLO EN EL AVANCE DE FASE Y EN EL LISTADO DE REGISTROS DEL LOTE

                codigo = el.dataset.codigo
                estado = el.dataset.estado
                //titulo del modal
                numero_lote_f2.innerText = `Lote: ${codigo} Fase: ${estado} `


                //json que va al ajax

                GetRegistrosPorFerm = { cod: codigo, state: estado }

                //llamado al ajax
                $.post("views/ajax/variables_ajax.php", { GetRegistrosPorFerm }, function (dato) {
                    let response = JSON.parse(dato)
                    // console.log(response);
                    //TABLA QUE MUESTRA LOS REGISTROS DE LOS LOTES QUE ESTAN EN FASE 2
                    response.forEach(x => {
                        tbodyRegistrosLotesF2.innerHTML += `
                       <tr>
                       <td>${x.nombres + " " + x.apellidos}</td>
                       <td>${x.brix}</td>
                       <td>${x.alcohol}</td>
                       <td>${x.ph}</td>
                       <td>${x.tds}</td>
                       <td>${x.ac}</td>
                       <td>${x.temperatura}</td>
                       <td>${x.humedad}</td>
                       <td>${x.fecha_registro}</td>
                       </tr>      
                       `
                    })
                })

            })
        })
    })

}
function TraerLotesF3() {
    let tbody3f = document.getElementById('tbody3f')
    //JSON LOS EL CODIGO DE LA FERMENTACION QUE SE QUIERE LISTAR

    const dataFase = { fermentacion: 3 }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {
            if (tbody3f) {
                tbody3f.innerHTML += `
            <tr>
            <td><button type="button" id="btnFerme3"  data-estado="${element.fermentacion}" data-codigo="${element.codigo}"  class="guardarCodigo3 btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#envase">
            <i class="bi bi-plus-circle"></i>
        </button></td>
            <td>${element.codigo}</td>
            <td>${element.materia}</td>
            <td>${element.fecha_inicio}</td>
            <td>${element.peso_inicial}</td>
            </tr>
            `
            }
        });
        // VARIABLES PARA GUARDAR LOS DATOS
        const guardarCodigo3 = document.querySelectorAll(".guardarCodigo3")
        guardarCodigo3.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                codigo = el.dataset.codigo
                estado = el.dataset.estado
                //titulo del modal
                numero_lote_f3.innerText = `Lote: ${codigo} Fase: ${estado} `

            })
        })
    })

}
function TraerLotesF4() {


    let tbody4f = document.getElementById('tbody4f')
    let HistorialLote = document.getElementById('HistorialLote')
    //JSON LOS EL CODIGO DE LA FERMENTACION QUE SE QUIERE LISTAR Y EL CARGO, SI ES 2 ADMINISTRADOR MUESTRA TODOS LOS REGISTROS
    const dataFase = { fermentacion: 4, id_cargo: id_cargo_usuarioLogueado }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {
            if (tbody4f) {

                tbody4f.innerHTML += `
            <tr>
            <td><button type="button" data-estado="${element.fermentacion}" data-codigo="${element.codigo_lote}" id="btnHistA" class="btnHistorialA btn btn-sm btn-danger" data-bs-toggle="modal"
            data-bs-target="#detalles">
            <i class="bi bi-plus-circle"></i>
        </button></td>
            <td>${element.codigo_lote}</td>
            <td>${element.materia}</td>

            <td>${element.fecha_fin}</td>
            </tr>
            `
            }
        });
        // VARIABLES PARA GUARDAR LOS DATOS
        const btnHistorialA = document.querySelectorAll(".btnHistorialA")
        btnHistorialA.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                //blanquea la tabla
                HistorialLote.innerHTML = ""
                // console.log(el.dataset.id);
                //atributos data, CODIGO DEL LOTE Y FASE PARA USARLO EN EL LISTADO DE REGISTROS DEL LOTE
                codigo = el.dataset.codigo
                estado = el.dataset.estado
                //titulo del modal
                numero_lote_f4.innerText = `Lote: ${codigo} Fase: ${estado} `

                console.log(codigo);
                codigo_loteA = { codigo: codigo, fermentacion: 4 }
                $.post("views/ajax/lotes_ajax.php", { codigo_loteA }, function (dato) {
                    let response = JSON.parse(dato)
                    console.log(response);

                    response.forEach(x => {
                        numero_lote_f1.innerText = x.codigo

                        //TABLA QUE MUESTRA LOS REGISTROS DE LOS LOTES QUE ESTAN EN FASE 4
                        HistorialLote.innerHTML += `
                        <tr>
                        <td>${x.nombres + " " + x.apellidos}</td>
                        <td>${x.fase_lote}</td>
                        <td>${x.brix}</td>
                        <td>${x.alcohol}</td>
                        <td>${x.ph}</td>
                        <td>${x.tds}</td>
                        <td>${x.ac}</td>
                        <td>${x.temperatura}</td>
                        <td>${x.humedad}</td>
                        <td>${x.fecha_registro}</td>

                        </tr>
                        `
                    })
                })
            })
        })
    })

}
//---------------------------------------------------------------------








//al cerrar el modal  se ejecuta la funcion de ocultar la grafica que esta en la pagina reporteTemperatura.js
$('#consultar').on('hidden.bs.modal', function () {
    $(this).find("input").val('').end()
    OcultarGrafica()
})
//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------


//al cerrar el modal  se ejecuta la funcion de ocultar la grafica que esta en la pagina reporteTemperatura.js
$('#consultar2fase').on('hidden.bs.modal', function () {
    $(this).find("input").val('').end()
    OcultarGraficaF2()
})
$('#exampleModal').on('hidden.bs.modal', function () {
    $(this).find("input, textarea").val('').end()
})
//-------------------//-------------------//-------------------//-------------------//-------------------//-------------------
