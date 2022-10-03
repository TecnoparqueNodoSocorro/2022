
//id usuario traido desde la plantilla
let id_usu = id_userOculto.value;
let codigoEliminar

let tratamiento = document.getElementById('tratamiento')
let btnGuardarT = document.getElementById('btnGuardarT')
let fecha_inicio_tratamiento = document.getElementById('fecha_inicio_tratamiento')
let caprino_tratamiento_select = document.getElementById('caprino_tratamiento_select')
let tbodyTratamientos = document.getElementById('tbodyTratamientos')


let caprinosSeleccion = []
let codigo = {}
if (caprino_tratamiento_select) {
    caprino_tratamiento_select.addEventListener("change", () => {
        codigo = { codigo: caprino_tratamiento_select.value }
        ////console.log(codigo);

    })
}

//buscador
let buscar1 = document.getElementById('buscar1')
//ARRAY QUE VA A GUARDAR LOS CAPRINOS SELECCIONADOS PARA EL TRATAMIENTO
let caprinos_sin_tratamiento = []
//--------------------------------------------------------------------------------------
//array para guardar los caprinos que vayan a estar en el tratamiento
let caprinos_en_tratamiento = []
//--------------------------------------------------------------------------------------

//LISTA  DONDE VAN A ESTAR TODOS LOS CAPRINOS QUE NO VAYAN A RECIBIR EL TRATAMIENTO
let list_group1 = document.getElementById('list_group1')
//--------------------------------------------------------------------------------------


//LISTA DONDE VAN A ESTAR TODOS LOS CAPRINOS QUE VAN A RECIBIR EL TRATAMIENTO
let list_group2 = document.getElementById('list_group2')
//--------------------------------------------------------------------------------------


let conteo_caprinos_sin = document.getElementById('conteo_caprinos_sin')
let conteo_caprinos_con = document.getElementById('conteo_caprinos_con')
//--------------------------------------------------------------------------------------



function conteo1() {
    if (caprinos_sin_tratamiento.length === 0) {
        conteo_caprinos_sin.innerText = `0 Caprinos`
    } else {
        conteo_caprinos_sin.innerText = `${caprinos_sin_tratamiento.length} Caprinos`

    }
}

function conteo2() {

    if (caprinos_en_tratamiento.length === 0) {
        conteo_caprinos_con.innerText = `0 Caprinos`

    } else {
        conteo_caprinos_con.innerText = `${caprinos_en_tratamiento.length} Caprinos`

    }
}


//------------------PASAR TODOS LOS CAPRINOS AL TRATAMIENTO-----------------------------------
function checkAll() {


    //se recorre todos los check que tengan la clase cheackSin para sacar los atributos data y agregarlos al array de los caprinos que van a recibir el tratamiento
    document.querySelectorAll('.cheackSin').forEach(x => {
        //x.checked = true;
        caprinos_en_tratamiento.push({
            codigo: x.dataset.codigo,
            id_usuario: x.dataset.usuario
        })
        // console.log(caprinos_en_tratamiento);
    })
    //se vacia todos los registros del array que recoge los datos de los caprinos que trae la base de datos
    caprinos_sin_tratamiento = []
    //se blanque la lista donde estan los que no van a recibir el tratamiento
    list_group1.innerHTML = ""
    list_group2.innerHTML = ""

    //SE EJECUTA LA FUNCION PARA LISTAR LOS REGISTROS QUE YA FUERON AGREGADOS EN EL FOREACH
    //console.log(caprinos_en_tratamiento);
    listar2(caprinos_en_tratamiento)
    listar1(caprinos_sin_tratamiento)

    // console.log(caprinos_sin_tratamiento);


}
//-------------------------------------------------------

//---------FUNCION AGREGAR UNICAMENTE LOS REGISTROS CHECKEADOS AL TRATAMIENTO--------------
function check() {
    index = -1

    //SE RECORREN LOS CHECK QUE TIENE LA CLASE cheackSin QUE SON LOS QUE NO VAN A RECIBIR TRATAMIENTO 
    document.querySelectorAll('.cheackSin').forEach(x => {
        if (x.checked) {


            //en cada iteracion se agregan los datos del caprino que va a recibir el tratamiento
            caprinos_en_tratamiento.push({
                codigo: x.dataset.codigo,
                id_usuario: x.dataset.usuario
            })

            //para que se repita se busca el caprino seleccionado y se elimina del array que se encuentra actualmente
            //capturamos el codigo con el atributo data en una cariable
            const caprino_a_eliminar = x.dataset.codigo
            //luego buscamos el indice en donde se encuentra
            let index = caprinos_sin_tratamiento.findIndex(x => x.codigo === caprino_a_eliminar)

            //con el indice se elimina del array que está actualmente que es el de los caprinos que no van a recibir tratamiento
            // console.log(index);
            caprinos_sin_tratamiento.splice(index, 1);


            //se vacian las dos listas para que no se sobre escriban los registros
            list_group1.innerHTML = ""
            list_group2.innerHTML = ""

            //se llaman las dos funciones de listar para  dibujar los array actualizados
            listar1(caprinos_sin_tratamiento)
            listar2(caprinos_en_tratamiento)


        }
    })
}
//-------------------------------------------------------

//RETIRAR  TODOS LOS CAPRINOS DEL TRATAMIENTO
function removeAll() {
    //se recorre todos los check que tengan la clase cheackRemove para sacar los atributos data y agregarlos al array de los caprinos que no van a recibir el tratamiento
    document.querySelectorAll('.cheackRemove').forEach(x => {

        //se agregan los registros al array que guardar los caprinos que no van a recibir tratamiento extrayendo los data atributos
        caprinos_sin_tratamiento.push({
            codigo: x.dataset.codigo,
            id_usuario: x.dataset.usuario
        })

    })
    //se vacia todos los registros del array que recoge los datos de los caprinos que van a recibir el tratamiento
    caprinos_en_tratamiento = []
    //se blanque la lista donde estan los que  van a recibir el tratamiento
    list_group1.innerHTML = ""
    list_group2.innerHTML = ""

    //se lista el array que contiene los caprinos que no van a recibir el tratamiento
    listar1(caprinos_sin_tratamiento)
    listar2(caprinos_en_tratamiento)

}
//-------------------------------------------------------

function remove() {
    index = -1
    document.querySelectorAll('.cheackRemove').forEach(x => {


        if (x.checked) {

            caprinos_sin_tratamiento.push({
                codigo: x.dataset.codigo,
                id_usuario: x.dataset.usuario
            })
            const caprino_eliminar = x.dataset.codigo
            let index = caprinos_en_tratamiento.findIndex(x => x.codigo === caprino_eliminar)
            caprinos_en_tratamiento.splice(index, 1);
            console.log(index);

            console.log(caprinos_en_tratamiento);
            list_group2.innerHTML = ""
            list_group1.innerHTML = ""
            listar2(caprinos_en_tratamiento)
            listar1(caprinos_sin_tratamiento)


        }

    })
}



//FUNCION PARA LISTAR EN ORDEN NUMERICO PRIMERO Y LUEGO ALFABETICAMENTE
function ordenar(a, b) {

    if (a.codigo - b.codigo) {
        return a.codigo - b.codigo
    }
    if (b.codigo - a.codigo) {
        return b.codigo - a.codigo
    }
    if (a.codigo.toLowerCase() < b.codigo.toLowerCase()) {
        return -1;
    }
    if (a.codigo.toLowerCase() > b.codigo.toLowerCase()) {
        return 1;
    }

    return 0;
}



//funcion que lista todos los registros que llegan de la base de datos
function listar1() {
    conteo1()
    conteo2()
    caprinos_sin_tratamiento.sort(ordenar).forEach(x => {
        list_group1.innerHTML += `<label class="list-group-item">
        <input class="cheackSin form-check-input me-1" data-codigo="${x.codigo}" data-usuario="${x.id_usuario}" type="checkbox" value="">
          ${x.codigo}
        </label>`
    })
}

//funcion que lista todos los registros que van a recibir el tratamiento
function listar2(caprinos_en_tratamiento) {
    conteo1()
    conteo2()
    caprinos_en_tratamiento.sort(ordenar).forEach(x => {
        list_group2.innerHTML += `<label class="list-group-item">
        <input class="cheackRemove form-check-input me-1" data-codigo="${x.codigo}" data-usuario="${x.id_usuario}"  type="checkbox" value="">
             ${x.codigo}
        </label>`
    })
}



function traerCaprinos() {

    //mostrar boton de guardar tratamiento
    document.getElementById('divBtnGuardar').style.display = 'block'
    document.getElementById('btnTraerCaprinos').style.display = 'none'

    id_usuario = {
        id_usuario: id_usuario,

    }
    $.post("views/ajax/caprino_ajax.php", { id_usuario }, function (dato) {
        response = JSON.parse(dato)
        // console.log(response);
        caprinos_sin_tratamiento = response
        console.log(caprinos_sin_tratamiento);
        listar1(caprinos_sin_tratamiento)


    })

}

if (btnGuardarT) {
    btnGuardarT.addEventListener("click", () => {
        if (tratamiento.value.trim() == "" || caprinos_en_tratamiento.length == 0 || fecha_inicio_tratamiento.value.trim() == "") {
            DatosIncompletos()
        } else {
            //   caprinos = { descripcion_tratamiento: tratamiento.value, caprinos_tratamiento: caprinosSeleccion, fecha_inicio: fecha_inicio_tratamiento.value }
            //   //console.log(caprinos);
            GuardarIDtraramiento()
        }

    })
}


//FUNCION PARA GUARDAR EL DATO DE LA DESCRIPCION DEL TRATAMIENTO Y YLA FECHA Y RETORNA EL ID PARA USARLO EN LAS CONSULTAS SIGUIENTES
async function GuardarIDtraramiento() {
    const datosTratamiento = {
        //ID DEL USUARIO TRAIDO DESDE LA PLANTILLA
        id_usuario: id_userOculto.value,
        //DATOS DEL TRATAMIENTO
        descripcion: tratamiento.value, fecha_inicio: fecha_inicio_tratamiento.value
    }
    //SI EL ARRAY ESTÁ VACIO SE TRAE EL ID DEL TRATAMIENTO QUE ES LA RESPUESTA DEL AJAX
    if (caprinos_en_tratamiento.length > 0) {
        const idTratamiento = await $.post("views/ajax/caprino_ajax.php", { datosTratamiento });
        console.log(idTratamiento);
        let response = JSON.parse(idTratamiento)
        let id = parseInt(response.idTratamiento)
        // //console.log(typeof id);
        guardarCaprinosTratamiento(id, caprinos_en_tratamiento)
        Swal.fire({
            title: 'Listo',
            text: `Caprinos agregados al tratamiento #${id}`,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#f69100',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'OK',
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
                location.href = 'index.php?page=c_registroTratamientos'
            }
        })
    } else {
        DatosIncompletos()
    }
}

function guardarCaprinosTratamiento(id, caprinos_en_tratamiento) {
    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let caprinosTratamiento = JSON.stringify(caprinos_en_tratamiento)
    // console.log(caprinosTratamiento);
    $.post("views/ajax/caprino_ajax.php", { idtratatamiento: id, caprinos: caprinosTratamiento }, function (dato) {
        // let res = JSON.parse(dato);
        console.log(dato);
        guardarCaprinosSinTratamiento(id, caprinos_sin_tratamiento)
    })
}

//FUNCION ENVIAR LOS CAPRINOS QUE ESTAN SIN EL TRATAMIENTO
function guardarCaprinosSinTratamiento(id, caprinos_sin_tratamiento) {
    //SE VALIDA QUE EL ARRAY QUE GUARDA LOS ELEMENTOS QUE NO SE SELECCIONARION NO ESTE VACIO
    if (caprinos_sin_tratamiento.length > 0) {

        //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
        let caprinosSinTratamiento = JSON.stringify(caprinos_sin_tratamiento)
        // console.log(caprinosSinTratamiento);
        $.post("views/ajax/caprino_ajax.php", { id_tratatamiento: id, caprinos_sin: caprinosSinTratamiento }, function (dato) {
            // let res = JSON.parse(dato);
            console.log(dato);

        })
    } else {
        //SI EL ARRAY ESTÁ VACIO SE RETORNA PARA EVITAR ERRORES TRATANDO DE HACER INSERCIONES VACIAS
        return;
    }
}


