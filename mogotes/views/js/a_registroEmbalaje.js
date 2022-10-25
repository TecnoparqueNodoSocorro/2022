// REGISTRO EMBALAJE 
let embalaje = {}
let lote_embalaje = document.getElementById('lote_embalaje')
let azucarEmb = document.getElementById('azucarEmb')
let bijaoEmb = document.getElementById('bijaoEmb')
let celofanEmb = document.getElementById('celofanEmb')
let recortesEmb = document.getElementById('recortesEmb')
let maderaEmb = document.getElementById('maderaEmb')
let tablasEmb = document.getElementById('tablasEmb')
let embProducto = {}





//DIV DE LOS PRODUCTOS
let container_bocadillo = document.getElementById('container_bocadillo')
let container_espejuelo = document.getElementById('container_espejuelo')
let container_arequipe = document.getElementById('container_arequipe')
let container = document.getElementById('container')

//---------

//SELECTOR DE PRODUCTO A REGISTRAR EMBALAJE
let select_producto_embalaje = document.getElementById('select_producto_embalaje')


//caputrar fecha de fabricación para calcular la fecha de vecimiento
lote_embalaje
    ? lote_embalaje.addEventListener("change", () => {
       /*  $.post("views/ajax/embalaje_ajax.php", { producto }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
        }) */
    })
    : ''

select_producto_embalaje
    ? select_producto_embalaje.addEventListener("change", () => {
        container.innerHTML = ``
        const producto = { producto: select_producto_embalaje.value }
        $.post("views/ajax/embalaje_ajax.php", { producto }, function (dato) {
            let response = JSON.parse(dato)
            console.log(response);
            response.forEach(x => {
                container.innerHTML += `
                <div class="col-6 col-sm-3">
                    <div class="input-group  mb-1">
                         <span class="input-group-text" id="basic-addon1">${x.empaque}</span>
                    </div>
                </div>
                <div class="col-6  col-sm-3">
                    <input type="number" class="form-control inputEmbalaje" id="${x.id}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                `

            });
        })
        /* asignar()
        console.log(select_producto_embalaje.value);
        switch (select_producto_embalaje.value) {
            case "0":
                container_bocadillo.style.display = "none"
                container_espejuelo.style.display = "none"
                container_arequipe.style.display = "none"
 
                break;
            case "1":
                container_bocadillo.style.display = "block"
                container_espejuelo.style.display = "none"
                container_arequipe.style.display = "none"
                break;
            case "2":
                container_bocadillo.style.display = "none"
                container_espejuelo.style.display = "none"
                container_arequipe.style.display = "block"
                break;
            case "3":
                container_bocadillo.style.display = "none"
                container_espejuelo.style.display = "block"
                container_arequipe.style.display = "none"
                break;
 
            default: "0"
                break;
        } */

    })
    : ''


// FUNCION BLANQUEA LOS INPUT
let control = document.getElementsByClassName('form-control')
function asignar() {
    lote_embalaje.value = 0
    for (let index = 0; index < control.length; index++) {
        control[index].value = " "
    }
}

//FUNCION GUARDAR DATOS FIJOS
function EnviarDatos() {
    embalaje = { lote: lote_embalaje.value, azucar: azucarEmb.value, bijao: bijaoEmb.value, celofan: celofanEmb.value, recortes: recortesEmb.value, madera: maderaEmb.value, tablas: tablasEmb.value, embalaje: embProducto }
}



// VARIABLES BOCADILLO

let espNav = document.getElementById('espNav')
let extrafino = document.getElementById('extrafino')
let veinte_t = document.getElementById('veinte_t')
let venti_ocho = document.getElementById('venti_ocho')
let ochenta_cuatro = document.getElementById('ochenta_cuatro')
let mooticos = document.getElementById('mooticos')
let unidades = document.getElementById('unidades')
let mooticos_c = document.getElementById('mooticos_c')
let moticos_unidades = document.getElementById('moticos_unidades')
let bocadillo_manzana = document.getElementById('bocadillo_manzana')
let lonja = document.getElementById('lonja')

let btnGuardarEmbB = document.getElementById('btnGuardarEmbB')
btnGuardarEmbB

    ? btnGuardarEmbB.addEventListener("click", () => {
        const inputs = document.querySelectorAll('.inputEmbalaje')

        inputs.forEach(x => {
            console.log(x.id, x.value);

            if (x.value.trim() == "") {
                Swal.fire({
                    title: 'Error',
                    text: `Complete los campos`,
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok',
                })
            } else {
                /*  EditarProveedor() */
            }


        })
    })

    : ''


/* if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
    console.log("Datos incompletos");
} else {
    embProducto = { especial_navideno: espNav.value, extrafino: extrafino.value, veinte_trienta: veinte_t.value, veintiocho_veinte: venti_ocho.value, ochenta_diez: ochenta_cuatro.value, moticos_10: mooticos.value, unidades: unidades.value, moticos_cinco: mooticos_c.value, moticos_unidades: moticos_unidades.value, bocadillo_manzana: bocadillo_manzana.value, lonja: lonja.value }
    EnviarDatos()
    console.log(embalaje);
    asignar()
} */




//VARIABLES ESPEJUELO

let pastilla_unidad = document.getElementById('pastilla_unidad')
let moticos_esp = document.getElementById('moticos_esp')
let veinte_esp = document.getElementById('veinte_esp')
let cuarente_esp = document.getElementById('cuarente_esp')
let noventas_esp = document.getElementById('noventas_esp')
let mooticos_diez = document.getElementById('mooticos_diez')
let mooticos_cinco = document.getElementById('mooticos_cinco')
let btnGuardarEmbE = document.getElementById('btnGuardarEmbE')

if (btnGuardarEmbE) {
    btnGuardarEmbE.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { pastilla_unidad: pastilla_unidad.value, moticos_unidades: moticos_esp.value, veinte_cuarenta: veinte_esp.value, cuarenta_veinte: cuarente_esp.value, noventa_seis: noventas_esp.value, mooticos_diez: mooticos_diez.value, moticos_cinco: mooticos_cinco.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
}

//VARIABLE AREQUIPE

let caja_2 = document.getElementById('caja_2')
let bocadillo_panelaU = document.getElementById('bocadillo_panelaU')
let bocadillo_panela = document.getElementById('bocadillo_panela')
let bocadillo_light = document.getElementById('bocadillo_light')
let herpos = document.getElementById('herpos')
let btnGuardarEmbA = document.getElementById('btnGuardarEmbA')

if (btnGuardarEmbA) {
    btnGuardarEmbA.addEventListener("click", () => {
        if (lote_embalaje.value == 0 || azucarEmb.value.trim() == "" || bijaoEmb.value.trim() == "" || celofanEmb.value.trim() == "" || recortesEmb.value.trim() == "" || maderaEmb.value.trim() == "" || tablasEmb.value.trim() == "") {
            console.log("Datos incompletos");
        } else {
            embProducto = { caja_2Unidades: caja_2.value, bocadillo_panelaUnidad: bocadillo_panelaU.value, bocadillo_panela: bocadillo_panela.value, bocadillo_light: bocadillo_light.value, herpos: herpos.value }
            EnviarDatos()
            console.log(embalaje);
            asignar()
        }

    })
}