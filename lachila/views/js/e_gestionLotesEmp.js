// gestion de lotes, se agregan las variables
let variables = {}

//----------------VARIABLES QUEMADAS------------
//let usuario = 2
//--------------------------------------------

/* //VARIABLES PARA CAPTURAR EL BODY DE LAS TABLES
let tbody1fEmp = document.getElementById('tbody1fEmp')
let tbody2fEmp = document.getElementById('tbody2fEmp')
let tbody3fEmp = document.getElementById('tbody3fEmp')
let tbody4fEmp= document.getElementById('tbody4fEmp')

//------------------------------------------------------------------- */

//titulos de los modales
let tituloLoteF1 = document.getElementById('tituloLoteF1')
let tituloLoteF2 = document.getElementById('tituloLoteF2')
let tituloLoteF3 = document.getElementById('tituloLoteF3')
let tituloLoteF4 = document.getElementById('tituloLoteF4')
//------------------------------------------------------------------- */




//FUNCIONES PARA TRAER LOS LOTES Y LISTARLOS AL MOMENTO DE CARGAR LA PAGINA
function TraerLotesF1Emp() {
    let tbody1fEmp = document.getElementById('tbody1fEmp')
    const dataFase = { fermentacion: 1 }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {
            if (tbody1fEmp) {
                tbody1fEmp.innerHTML += `
            <tr>
            <td><button type="button" id="btnFerme1" data-estado="${element.fermentacion}" data-codigo="${element.codigo}" class="guardarId btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#AgregarVariables1F">
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
        const guardarId = document.querySelectorAll(".guardarId")
        guardarId.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                codigo = el.dataset.codigo
                faseLote = el.dataset.estado
                console.log(codigo);
                tituloLoteF1.innerText = `codigo: ${codigo} fase:${faseLote}`
            })
        })
    })
}

function TraerLotesF2Emp() {
    let tbody2fEmp = document.getElementById('tbody2fEmp')
    const dataFase = { fermentacion: 2 }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {
            if (tbody2fEmp) {
                tbody2fEmp.innerHTML += `
            <tr>
            <td><button type="button" id="btnFerme2"  data-estado="${element.fermentacion}" data-codigo="${element.codigo}" class="guardarId btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#AgregarVariables2F">
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
        const guardarId = document.querySelectorAll(".guardarId")
        guardarId.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                codigo = el.dataset.codigo
                faseLote = el.dataset.estado
                tituloLoteF2.innerText = `codigo: ${codigo} fase:${faseLote}`

            })
        })
    })

}
function TraerLotesF3Emp() {
    let tbody3fEmp = document.getElementById('tbody3fEmp')
    const dataFase = { fermentacion: 3 }

    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //console.log(response);

        response.forEach(element => {
            if (tbody3fEmp) {
                tbody3fEmp.innerHTML += `
            <tr>
            <!--   <td><button type="button" id="btnFerme3"  data-estado="${element.fermentacion}" data-codigo="${element.codigo}"  class="guardarId btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#envaseUsuario">
            <i class="bi bi-plus-circle"></i>
        </button></td> -->
            <td>${element.codigo}</td>
            <td>${element.materia}</td>
            <td>${element.fecha_inicio}</td>
            <td>${element.peso_inicial}</td>
            </tr>
            `
            }
        });
        // VARIABLES PARA GUARDAR LOS DATOS
        const guardarId = document.querySelectorAll(".guardarId")
        guardarId.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                codigo = el.dataset.codigo
                faseLote = el.dataset.estado
                tituloLoteF3.innerText = `codigo: ${codigo} fase:${faseLote}`

            })
        })
    })

}
function TraerLotesF4Emp() {

    //tabla que meuestra los lotes en los que el empleado interfirió o agregó variables
    let tbody4fEmp = document.getElementById('tbody4fEmp')
    //tabla que muestra los registros de los lotes que estan en estado de historial unicamente los registros del usuario logeado
    let tbodyHistorialEmpleados = document.getElementById('tbodyHistorialEmpleados')
    //la fermentacion en la cual está se quema
    //el codigo se saca desde los atributos data enteriores, el id del usuario viene de las variables de sesion de php

    const dataFase = { fermentacion: 4, user: usuarioLogueado, id_cargo: id_cargo_usuarioLogueado }

    //llamado al ajax
    $.post("views/ajax/lotes_ajax.php", { dataFase }, function (dato) {
        let response = JSON.parse(dato)
        //  console.log(response);

        //se recorre para dibujar la primer tabla, muestra los lotes en los que el empleado agregó variables
        response.forEach(element => {
            if (tbody4fEmp) {

                tbody4fEmp.innerHTML += `
            <tr>
            <td><button type="button" id="btnHistorialU" data-estado="${element.fermentacion}" data-codigo="${element.codigo_lote}" class="HistorialUsuario btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#historialUsuario">
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
        //se le agregó una clase al boton del modal para extraer los atributos data
        const HistorialUsuario = document.querySelectorAll(".HistorialUsuario")
        HistorialUsuario.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                tbodyHistorialEmpleados.innerHTML = ""
                codigo = el.dataset.codigo
                faseLote = el.dataset.estado

                tituloLoteF4.innerText = `codigo: ${codigo} fase:${faseLote}`

                // console.log(id);
                //el codigo se saca desde los atributos data enteriores, el id del usuario viene de las variables de sesion de php
                codigo_loteE = { idCodigo: codigo, idUsuario: usuarioLogueado, fermentacion: 4 }
                $.post("views/ajax/lotes_ajax.php", { codigo_loteE }, function (dato) {
                    let response = JSON.parse(dato)
                    //console.log(response);
                    response.forEach(x => {
                        console.log(x);
                        tbodyHistorialEmpleados.innerHTML += `
                        <tr>
                        <td>${x.nombres + " " + x.apellidos}</td>
                        <td>${x.brix}</td>
                        <td>${x.alcohol}</td>
                        <td>${x.ph}</td>
                        <td>${x.tds}</td>
                        <td>${x.ac}</td>
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

//---------------------------------------------------------------------
function LimpiarModal() {
    $('#AgregarVariables1F').on('show.bs.modal', function (event) {
        $("#AgregarVariables1F input").val("");
    });
    $('#AgregarVariables2F').on('show.bs.modal', function (event) {
        $("#AgregarVariables2F input").val("");
    });
}
$('#AgregarVariables1F').on('show.bs.modal', function (event) {
    $("#AgregarVariables1F input").val("");
});
$('#AgregarVariables2F').on('show.bs.modal', function (event) {
    $("#AgregarVariables2F input").val("");
});

//---------------------------------------------------------------------