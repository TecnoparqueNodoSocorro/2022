
let cantidad = document.getElementById('cantidad')
let btn_agregarCantidad = document.getElementById('btn_agregarCantidad')
let tbodyCantidades = document.getElementById('tbodyCantidades')

//array que va a almacenar las cantidades agregadas

let Cantidades = []

btn_agregarCantidad.addEventListener("click", AgregarCantidad)

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
        <td><button type="button"  class="btnEliminar btn btn-warning btn-sm" >
        <i class="bi bi-trash3"></i></button></td>
        <td>${x}</td>

        </tr>
        `


    })

}