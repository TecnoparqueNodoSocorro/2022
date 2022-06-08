// variables
// el div donde se encuentra el carrito de compras 
const carrito = document.querySelector('#carrito_compras');
// el div donde se encuentran los productos 
const listaproductosdisponibles = document.querySelector('#productos');
// tabla donde esta el listado de los productos de la canasta 
const listaproductosencanasta = document.querySelector('#tabla_productos tbody');
//boton de vaciar carrito
const vaciararritoBtn = document.querySelector('#btnvaciarC');

/* variable vector que guarda los articulos  */
let articulosCarrito = [];

/* -------------------------------------------- */
cargareventListener();

function cargareventListener() {
    // cuando se agrega un curso con el boton agregar
    listaproductosdisponibles.addEventListener('click', agregarpro);
}
/* Funciones  */
function agregarpro(e) {
    e.preventDefault();
    if (e.target.classList.contains('agregarproducto')) {
        //irnos hacia arriba 
        const DatosProductoSelec = e.target.parentElement.parentElement.parentElement.parentElement;
        leerDatosProducto(DatosProductoSelec);
    }


}


/* leer contenido del html al que le dimos click  */
function leerDatosProducto(producto) {
    /* console.log(producto); */
    // crear objeto con la informaicon del producto sseleccionado
    const DatosProducto = {
        imagen: producto.querySelector('img').src,
        titulo: producto.querySelector('#nombreprod').textContent,
        id: producto.querySelector('a').getAttribute('data_id'),
        valor:producto.querySelector('#precio').textContent,
        cant: 2

    }
    //agregar celementos al carrito
    /*     console.log(DatosProducto) */
    articulosCarrito = [...articulosCarrito, DatosProducto]
    console.log(articulosCarrito);
    carritoHTML();
}


//muestra los productos en el carrito de compras

function carritoHTML() {
    //limpiar el html previamente 

    LimpiarHTML();

    // crea la estructura del registro que se presentara
    articulosCarrito.forEach(producto => {
        // destructorin del objeto
        const { imagen, titulo, cant, valor, id}= producto;
        const row = document.createElement('tr');
        row.innerHTML =
`
        <td><img src= "${imagen}" width="45"></td>
        <td> ${titulo}</td>
        <td>${cant}</td>
        <td>${cant}</td>
        <td>
        <a href="#" class="borrar_producto" data-id="${id}"> X </a>
        </td>
        
`
        //agregar el listado de productos html en el tbody
        listaproductosencanasta.appendChild(row)
    })
}


//eliminar los productos del tbody para que no se almacenen los hijos 
function LimpiarHTML() {
    /* 
    
    //forma lenta de eliminar 
    listaproductosencanasta.innerHTML=''; */
    // mientras exista un hijo en la lista lo elimina y solo deja el ultimo
    while (listaproductosencanasta.firstChild) {
        listaproductosencanasta.removeChild(listaproductosencanasta.firstChild)
    }


}

