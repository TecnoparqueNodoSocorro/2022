//ADMINISTRADOR

//variable seleccion cliente
let regEqui_cliente = document.getElementById('regEqui_cliente')
//variable seleccion ubicacion
let regEqui_ubic = document.getElementById('regEqui_ubic')

//traer el id del cargo para validar
const id_cargo_registro_equipo = document.getElementById('id_cargo').value
//traer el id oculto del cliente
const id_usuario_oculto_registro_equipo = document.getElementById('id_usuario_oculto').value

//SELECCIONAR EL CLIENTE Y DIBUJAR LAS UBICACIONES YA REGISTRADAS
regEqui_cliente ? regEqui_cliente.addEventListener("change", () => {
    regEqui_ubic.innerHTML = `<option selected>--Seleccionar ubicación</option> `
    traerUbicaciones(regEqui_cliente.value)
}) : ''

//FUNCION QUE CREA LOS SELECT DE LAS UBICACIONES
function traerUbicaciones(id) {
    $.ajax({
        data: { id_c: id },
        type: "POST",
        dataType: "json",
        url: "views/ajax/ubicaciones_ajax.php",
    }).done(function (data, textStatus, jqXHR) {
        console.log(data);
        data.forEach(x => {

            //SE GENERA LOS OPTCION Y SE AGREGAN AL HTML
            opcion = document.createElement('option')
            opcion.value = x.id
            opcion.text = x.nombre
            regEqui_ubic.add(opcion)
        })

    }).fail(function (jqXHR, textStatus, errorThrown) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se pudo procesar la solicitud ' + textStatus,
            confirmButtonColor: '#5ac15d',

        })

    });
}
//SI EL ID DE USUARIO ES EL DEL CLIENTE SE OCULTA LA OPCION DE SELECCIONAR CLIENTE
if (id_cargo.value == "3") {
    //SE OCULTA EL SELECT
    regEqui_cliente ? regEqui_cliente.style.display = "none" : ''
    //SE ASIGNA EL ID DEL CLIENTE LOGUEADO
    regEqui_cliente.value = id_usuario_oculto_registro_equipo
    //SE LISTA LOS REGISTROS DE LAS UBICACIONES
 

    traerUbicaciones(regEqui_cliente.value)
}


//formulario
let signUpForm = document.querySelector('#signUpForm')
//imagen 
let imageUpload = document.getElementById('imageUpload')
validarImagenRe(imageUpload)
function validarImagenRe(fileInput) {

    fileInput ? fileInput.addEventListener('change', function () {
        var filePath = this.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        var sizeByte = this.files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        console.log(siezekiloByte);
        if (!allowedExtensions.exec(filePath)) {
            Swal.fire({
                title: 'Error de formato',
                text: `Por favor seleccione un archivo de imagen valido (JPEG/JPG/PNG)`,
                icon: 'error',
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',

            })
            fileInput.value = '';
            return false;
        } if (siezekiloByte > 650) {
            Swal.fire({
                title: 'Máximo 600 kb',
                text: `Por favor seleccione un tamaño de imagen más pequeña`,
                icon: 'error',
                showConfirmButton: true,
                confirmButtonColor: '#0d6efd',

            })
            fileInput.value = '';
            return false;
        }
    }) : ''
}

signUpForm ? signUpForm.onsubmit = async (e) => {
    e.preventDefault()
    const data = Object.fromEntries(new FormData(e.target))



    //console.log(data);
    $.ajax({
        type: 'POST',
        url: 'views/ajax/equipos_ajax.php',
        data: new FormData(signUpForm),
        contentType: false,
        cache: false,
        processData: false,

    }).done(function (data, textStatus, jqXHR) {
        console.log(data.trim());
        let id_registro = data.trim()
        //si se ejecuto el registro del equipo se ejecutan las funciones para registrar los demas registros
        guardarComponentesAsociados(id_registro, componentes)
        guardarRiesgosAsociados(id_registro, riesgos)
        guardarProcesosLimpieza(id_registro, procesos_limpieza)


    }).fail(function (jqXHR, textStatus, errorThrown) {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se pudo procesar la solicitud ' + textStatus,
            confirmButtonColor: '#5ac15d',

        })

    });
} : ''



//MENU 3 REGISTRAR COMPONENTES
let componente = document.getElementById('componente');
let marca = document.getElementById('marca');
let modelo = document.getElementById('modelo');
let serie = document.getElementById('serie');
let codigo = document.getElementById('codigo');
let btnAgregarComponente = document.getElementById('btnAgregarComponente');


let componentes = []

let theadComponentes = document.getElementById('theadComponentes');
let tbodyComponentes = document.getElementById('tbodyComponentes');



btnAgregarComponente ? btnAgregarComponente.addEventListener("click", () => {
    if (componente.value.trim() == "" || marca.value.trim() == "" || modelo.value.trim() == "" || serie.value.trim() == "" || codigo.value.trim() == "") {
        DatosIncompletos()
    } else {
        guardarComponentes()
        listarComponentes()



    }

}) : ''

//guardar los datos en un array y vaciar los campos
function guardarComponentes() {
    componentes.push({
        componente: componente.value,
        marca: marca.value,
        modelo: modelo.value,
        serie: serie.value,
        codigo: codigo.value
    })
    console.log(componentes);
    componente.value = ""
    marca.value = ""
    modelo.value = ""
    serie.value = ""
    codigo.value = ""
}

//listar en la tabla los datos del array
function listarComponentes() {
    LimpiarTablaComponentes()
    componentes.forEach(x => {
        theadComponentes.innerHTML = `
    <tr>
    <th>Menú</th>
    <th>Comp.</th>
    <th>Marca</th>
    <th>Modelo</th>
    <th>Serie</th>
    <th>Código</th>     
    </tr>
    `
        tbodyComponentes.innerHTML += `
    <tr>
    <td><button type="button" data-codigo="${x.codigo}" class="deleteComponente btn btn-sm btn-primary" ><i class="bi bi-trash"></i></button></td>
    <td>${x.componente}</td>
    <td>${x.marca}</td>
    <td>${x.modelo}</td>
    <td>${x.serie}</td>
    <td>${x.codigo}</td>
    </tr>
    `

        //eliminar
        const deleteComponente = document.querySelectorAll('.deleteComponente')
        deleteComponente.forEach(del => {
            del.addEventListener("click", () => {
                let codigo = del.dataset.codigo
                let index = componentes.findIndex(x => x.codigo == codigo);
                //verificamos el indice
                console.log(index);
                Swal.fire({
                    title: 'Eliminar',
                    text: `¿Eliminar registro?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Eliminar',
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
                        //ya teniendo el indice borramos la ubicacion 
                        componentes.splice(index, 1);
                        console.log(componentes);

                        listarComponentes()


                    }
                })
            })
        })
    })
}

//vaciar la tabla para no concatenar registros
function LimpiarTablaComponentes() {
    theadComponentes.innerHTML = ``
    tbodyComponentes.innerHTML = ``
}

//GUARDAR COMPONENTES ASOCIADOS
function guardarComponentesAsociados(id, array) {
    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let componentesAsociados = JSON.stringify(array)
    // console.log(caprinosTratamiento);
    $.post("views/ajax/equipos_ajax.php", { id_equipo: id, id_cliente: regEqui_cliente.value, componentes: componentesAsociados }, function (dato) {
        // let res = JSON.parse(dato);
        console.log(dato);

    })
}










//GUARDAR RIESGOS ASOCIADOS AL USO

let riesgos = []
function GuardarRiesgos() {
    let controls = document.querySelectorAll('#signUpForm .check_style');
    riesgos = []
    // 3. recorre los nodos encontrados:
    controls.forEach(x => {
        if (x.checked == true) {
            riesgos.push({
                riesgo: x.value
            })

        }
    });
    console.log(riesgos);
}

//GUARDAR RIESGOS ASOCIADOS AL USO
function guardarRiesgosAsociados(id, array) {
    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let riesgosAsociados = JSON.stringify(array)
    // console.log(caprinosTratamiento);
    $.post("views/ajax/equipos_ajax.php", { id_equipo: id, id_cliente: regEqui_cliente.value, riesgos: riesgosAsociados }, function (dato) {
        // let res = JSON.parse(dato);
        console.log(dato);

    })
}



// MENU 9 LIMPIEZA, DESINFECCIÓN Y ESTERILIZACIÓN
let check_limp = document.getElementById('check_limp');
let metodo_limpieza = document.getElementById('metodo_limpieza')

let check_des = document.getElementById('check_des')
let metodo_desinfeccion = document.getElementById('metodo_desinfeccion')

let check_ester = document.getElementById('check_ester')
let metodo_esterilizacion = document.getElementById('metodo_esterilizacion')


//cada cambio de cualquier select ejecuta la funcion
check_limp.addEventListener("change", validaCheckbox, false);
check_des.addEventListener("change", validaCheckbox, false);
check_ester.addEventListener("change", validaCheckbox, false);


//activar o desactivar los checkbox para habilitar o dehabilitar la textarea
function validaCheckbox() {
    let checked_limp = check_limp.checked;
    let checked_des = check_des.checked;
    let checked_ester = check_ester.checked;

    if (checked_limp) {
        metodo_limpieza.disabled = false
    } else {
        metodo_limpieza.disabled = true
        metodo_limpieza.value = ""
    }

    if (checked_des) {
        metodo_desinfeccion.disabled = false
    } else {
        metodo_desinfeccion.disabled = true
        metodo_desinfeccion.value = ""

    }

    if (checked_ester) {
        metodo_esterilizacion.disabled = false
    } else {
        metodo_esterilizacion.disabled = true
        metodo_esterilizacion.value = ""

    }
}
let procesos_limpieza = []

function guardarLimpieza() {
    procesos_limpieza = []
    let checked_limp = check_limp.checked;
    let checked_des = check_des.checked;
    let checked_ester = check_ester.checked;
    if (checked_limp) {
        procesos_limpieza.push({
            proceso: check_limp.value,
            metodo: metodo_limpieza.value
        })

    }

    if (checked_des) {
        procesos_limpieza.push({
            proceso: check_des.value,
            metodo: metodo_desinfeccion.value
        })

    }

    if (checked_ester) {
        procesos_limpieza.push({
            proceso: check_ester.value,
            metodo: metodo_esterilizacion.value
        })
    }
    console.log(procesos_limpieza);
}

//GUARDAR PROCESOS DE LIEMPIEZA
function guardarProcesosLimpieza(id, array) {
    //SE CONVIERTE EL JSON EN UNA CADENA DE TEXTO PARA PODER ENVIARLA Y EN EL AJAX VOLVERLA A DECODIFICAR
    let procesos_limpieza = JSON.stringify(array)
    // console.log(caprinosTratamiento);
    $.post("views/ajax/equipos_ajax.php", { id_equipo: id, id_cliente: regEqui_cliente.value, proceso: procesos_limpieza }, function (dato) {
        // let res = JSON.parse(dato);
        console.log(dato);

    })
}