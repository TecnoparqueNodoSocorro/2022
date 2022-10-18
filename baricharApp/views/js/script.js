

// Guardar datos del agregar empresa y guardarlos en un array
let nombre_empresa = document.getElementById('nombre_empresa')
let repre_empresa = document.getElementById('repre_empresa')
let nit_empresa = document.getElementById('nit_empresa')
let telefono_empresa = document.getElementById('telefono_empresa')
let correo_empresa = document.getElementById('correo_empresa')
let direccion_empresa = document.getElementById('direccion_empresa')
let descr_empresa = document.getElementById('descr_empresa')



let agregar_empresa = document.getElementById('agregar_empresa')
let nueva_empresa = {}
if (agregar_empresa) {
    agregar_empresa.addEventListener("click", () => {
        if (nombre_empresa.value.trim() == "" || repre_empresa.value.trim() == "" || repre_empresa.value.trim() == "" || nit_empresa.value.trim() == "" || telefono_empresa.value.trim() == "" || correo_empresa.value.trim() == "" || direccion_empresa.value.trim() == "" || descr_empresa.value.trim() == "") {
            console.log("datos incompletos")
        } else {
            nueva_empresa = { nombre: nombre_empresa.value, representante: repre_empresa.value , nit: nit_empresa.value , telefono: telefono_empresa.value , correo: correo_empresa.value , direccion: direccion_empresa.value , descripcion: descr_empresa.value }
            console.log(nueva_empresa);
        }
    })
}

// Guardar datos del agregar empresa y guardarlos en un array
let product_nuevo = document.getElementById('product_nuevo')
let product_precio = document.getElementById('product_precio')
let descr_producto = document.getElementById('descr_producto')
let categoria = document.getElementById('categoria')




let agregar_producto = document.getElementById('agregar_producto')
let nuevo_producto = {}
if (agregar_producto) {
    agregar_producto.addEventListener("click", () => {
        if (product_nuevo.value.trim() == "" || product_precio.value.trim() == "" || descr_producto.value.trim() == "" || categoria.value.trim() == "" ){
            console.log("datos incompletos")
        } else {
            nuevo_producto = { nombre: product_nuevo.value, precio: product_precio.value , descripcion: descr_producto.value , categoria: categoria.options[categoria.selectedIndex].text }
            console.log(nuevo_producto);
        }
    })
}