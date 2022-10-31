// RECEPCION DE GUAYABA

let recepcionGuayaba = {}
let newLote = document.getElementById('newLote')
let btnGuardar = document.getElementById('btnGuardar')

let cantidad = document.getElementById('cantidad')
let btn_agregarCantidad = document.getElementById('btn_agregarCantidad')
let tbodyCantidades = document.getElementById('tbodyCantidades')


//sumatoria de los kilos
let textoSumatoria = document.getElementById('textoSumatoria')
let sumatoriaKilos = 0


//variables de las cajas de la cantidad de kilos
let lebrija = document.getElementById('lebrija')
let cristalina = document.getElementById('cristalina')
let villaMercedes = document.getElementById('villaMercedes')
let manzanaBlanca = document.getElementById('manzanaBlanca')
let cantidad_loteAnterior = document.getElementById('cantidad_adicionar_loteAnterior')

let loteAnterior = document.getElementById('loteAnterior')

//array que va a almacenar las cantidades agregadas
let Cantidades = []


//calcular la cantidad total de kilos sumatoria
let textKilosTotal = document.getElementById('textKilosTotal')
let total_kilos = 0


//boton para guardar cada sumatoria en cada caja
let guardarSumatoria = document.getElementById('guardarSumatoria')


let btnAdicionar = document.getElementById('btnAdicionar')



btn_agregarCantidad ? btn_agregarCantidad.addEventListener("click", AgregarCantidad) : ''

function AgregarCantidad() {
    if (cantidad.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Registre una cantidad',
            confirmButtonColor: '#157347',
        })
    } else {
        //agregar la cantidad al arrat
        Cantidades.push(cantidad.value)

        //console.log(Cantidades);
        //se dibuja cada que se agregue una nueva cantidad
        sumatoriaTotal()
        Listar()


        //se limpia la caja
        return cantidad.value = ""
    }

}

function Listar() {


    //limpiar tabla  cada que se lista
    tbodyCantidades.innerHTML = ``
    //recorrer array
    Cantidades.map(x => {
        //dibujar tabla
        tbodyCantidades.innerHTML += `
        <tr>
        <td><button type="button" data-cantidad="${x}"  class="btnEliminar btn btn-warning btn-sm" >
        <i class="bi bi-trash3"></i></button></td>
        <td>${x}</td> 
        </tr>

        `
        textoSumatoria.innerText = `Total: ${sumatoriaTotal().toFixed(2)} Kilos`



        const btnEliminar = document.querySelectorAll(".btnEliminar")
        btnEliminar.forEach((el) => {
            //SE EXTRAEN LOS ATRIBUTOS DATA PARA PODER USARLOS FUERA DEL FOREACH
            el.addEventListener("click", (e) => {
                cantidadEliminar = el.dataset.cantidad
                //buscamos el indice para poder usarlo para borrar
                index = Cantidades.findIndex(x => x == cantidadEliminar);
                //verificamos el indice
                // console.log(index);
                //modal de confirmación
                Swal.fire({
                    title: 'Eliminar',
                    text: `¿Eliminar  ${cantidadEliminar} kilos?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#157347',
                    cancelButtonColor: '#3085d6',
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
                        Cantidades.splice(index, 1);
                        //si se borra el unico registro la sumatoria no se queda en 0 
                        Cantidades.length == 0 ? textoSumatoria.innerText = `Total: ${0} Kilos` : ''
                        //console.log(caprinosSeleccion);
                        sumatoriaTotal()

                        Listar()


                    }
                })

            })
        })
    })
}


//sumar las cantidades de kilos del array
function sumatoriaTotal() {
    sumatoriaKilos = 0

    return sumatoriaKilos += Cantidades.reduce((x, y) => (x) += parseFloat(y), 0)

    // sumatoriaKilos = parseInt(sumatoriaKilos)+= kilos
    // console.log(sumatoriaKilos);
}


//funciones que se ejecutan al cerrar el modal cerrar modal 
$('#modalSumatoria').on('hidden.bs.modal', function (event) {
    $("#modalSumatoria input").val("");
    Cantidades = []
    Listar()
    sumatoriaKilos = 0
    textoSumatoria.innerText = `Total: ${0} Kilos`
});

//asignar el total a cada caja correspondiente
const btnCampo = document.querySelectorAll(".btnCampo")
btnCampo.forEach((el) => {
    el.addEventListener("click", (e) => {
        //se extrae el dato del campo para poder asignarle el total de la sumatoria
        campo = el.dataset.campo
        //   console.log(campo);
    })

})


guardarSumatoria ? guardarSumatoria.addEventListener("click", Asignar) : ''

//funcion para asignar  la cantidad a cada caja correspondiente
function Asignar() {

    switch (campo) {
        case "1":
            guardarCantidad(sumatoriaKilos.toFixed(2), lebrija)

            break;

        case "2":

            guardarCantidad(sumatoriaKilos.toFixed(2), cristalina)

            break;
            ;
        case "3":

            guardarCantidad(sumatoriaKilos.toFixed(2), villaMercedes)

            break;
        case "4":

            guardarCantidad(sumatoriaKilos.toFixed(2), manzanaBlanca)

            break;
    }
}


//funcion vaciar caja de cantidades

//asignar el total a cada caja correspondiente
const btnCampoDelete = document.querySelectorAll(".btnCampoDelete")
btnCampoDelete.forEach((del) => {
    del.addEventListener("click", (e) => {
        //se extrae el dato del campo para poder asignarle el total de la sumatoria
        Campodelete = del.dataset.delete
        //console.log(Campodelete);

        switch (Campodelete) {
            case "1":
                eliminarCantidad(lebrija)
                break;

            case "2":
                eliminarCantidad(cristalina)
                break;
                ;
            case "3":
                eliminarCantidad(villaMercedes)
                break;
            case "4":
                eliminarCantidad(manzanaBlanca)
                break;
        }
    })



})

function guardarCantidad(cantidad, finca) {
    cantidad == 0 ?
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Registre una cantidad',
            confirmButtonColor: '#157347',
        })
        : Swal.fire({
            title: 'Guardar',
            text: `Guardar  ${(cantidad)} kilos de la finca ${finca.id}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#157347',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Guardar',
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
                finca.value = cantidad
                // TextTotalKilos()
                Swal.fire({
                    icon: 'success',
                    title: 'Hecho',
                    text: `${cantidad} kilos registrados`,
                    confirmButtonColor: '#157347',
                })


                TextTotalKilos()
                total()
                cerrarModal()


            }
        })
}

function cerrarModal() {
    $('#modalSumatoria').modal('hide')
}

function eliminarCantidad(finca) {
    finca.value == 0 || finca.value == "" ?
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Registre una cantidad primero',
            confirmButtonColor: '#157347',
        })
        : Swal.fire({
            title: 'Eliminar',
            text: `eliminar  ${(finca.value)} kilos de la finca ${finca.id}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#157347',
            cancelButtonColor: '#3085d6',
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
                finca.value = 0

                Swal.fire({
                    icon: 'success',
                    title: 'Hecho',
                    text: `${finca.value} kilos eliminados`,
                    confirmButtonColor: '#157347',
                })
                TextTotalKilos()
                total()


            }
        })
}


function TextTotalKilos() {

    total_kilos = 0
    const arrayKilos = [manzanaBlanca.value,
    lebrija.value,
    villaMercedes.value,
    cristalina.value,
    cantidad_loteAnterior.value]
    //console.log(arrayKilos);

    return total_kilos += arrayKilos.reduce((x, y) => x += parseFloat(y), 0)


}

function total() {
    textKilosTotal.innerText = `Sumatoria: ${TextTotalKilos().toFixed(2)} kg`

}
function validarCantidadAgregar() {

    if (cantidad_loteAnterior.value === "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite el número del lote',
            confirmButtonColor: '#157347',
        })
        total()
    }

}

cantidad_loteAnterior ? cantidad_loteAnterior.addEventListener("keyup", total, TextTotalKilos) : ''


btnGuardar ? btnGuardar.addEventListener("click", ValidarLote) : ''

function ValidarLote() {
    if (newLote.value.trim() == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Digite el número del lote',
            confirmButtonColor: '#157347',
        })
    } else if (lebrija.value <= 0 && cristalina.value <= 0 && villaMercedes.value <= 0 && manzanaBlanca.value <= 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Todas las cantidades no pueden estar en 0`,
            confirmButtonColor: '#157347',
        })

    } else if (cantidad_loteAnterior.value > 0 && loteAnterior.value == "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Digite el número del lote del que se está adicionando ${cantidad_loteAnterior.value} kilos`,
            confirmButtonColor: '#157347',
        })

    } else if (cantidad_loteAnterior.value < 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `La cantidad del lote anterior no puede ser menor a 0`,
            confirmButtonColor: '#157347',
        })

    } else if (Number.isNaN(total_kilos)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `Verifique la cantidad de kilos del lote anterior`,
            confirmButtonColor: '#157347',
        })

    } else {
        recepcionGuayaba = {
            id_usuario : id_usuario_oculto,
            lote: newLote.value,
            lebrija: lebrija.value,
            cristalina: cristalina.value,
            villaMercedes: villaMercedes.value,
            manzanaBlanca: manzanaBlanca.value,
            lote_anterior: loteAnterior.value,
            peso_lote: parseFloat(total_kilos.toFixed(2)),
            peso_lote_anterior: cantidad_loteAnterior.value,

        }
        // console.log(recepcionGuayaba);
        CrearLote(recepcionGuayaba)


    }
}

function CrearLote(recepcionGuayaba) {
    Swal.fire({
        title: 'Listo',
        text: `¿Guardar nuevo lote?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#157347',
        cancelButtonColor: '#212529',
        scrollbarPadding: false,
        heightAuto: false,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
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
            //se envia al ajax
            $.post("views/ajax/lotes_ajax.php", { recepcionGuayaba }, function (dato) {
               // console.log(dato);
                let response = dato.trim()
               // console.log(response);
                if (response == "ok") {
                    Swal.fire({
                        icon: 'success',
                        title: `Lote guardado`,
                        scrollbarPadding: false,
                        heightAuto: false,
                        showConfirmButton: true,
                        confirmButtonColor: '#157347',
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
                            location.reload()
                        }
                    })
                } else if (response == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `Código de lote ya registrado`,
                        confirmButtonColor: '#157347',
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `Contacte al administrador`,
                        confirmButtonColor: '#157347',
                    })
                }

            })

        }
    })
}