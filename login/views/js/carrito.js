// variables
// el div donde se encuentra el carrito de compras 
const carrito = document.querySelector('#carrito_compras');
// el div donde se encuentran los productos 
const listaproductosdisponibles = document.querySelector('#productos');
// tabla donde esta el listado de los productos de la canasta 
const listaproductosencanasta = document.querySelector('#tabla_productos tbody');
//boton de vaciar carrito
const vaciararritoBtn = document.querySelector('#btnvaciarC');
 

/* -------------------------------------------- */
cargareventListener();

function cargareventListener() {
    // cuando se agrega un curso con el boton agregar
    listaproductosdisponibles.addEventListener('click', agregarcurso);
}
/* Funciones  */
function agregarcurso(e) {
    e.preventDefault();
    if (e.target.classList.contains('agregarproducto')) {
      //irnos hacia arriba 
      /*   console.log(e.target.parentElement.parentElement.parentElement.parentElement)   */
        const DatosProductoSelec = e.target.parentElement.parentElement.parentElement.parentElement;
        leerDatosProducto(DatosProductoSelec);
    }

   
}


/* leer contenido del html al que le dimos click  */
function leerDatosProducto(producto){ 
    /* console.log(producto); */
// crear objeto con la informaicon del curso sseleccionado
    const DatosProducto = {
        imagen: producto.querySelector('img').src,
        titulo: producto.querySelector('.nombreprod').textContent,
        id: producto.querySelector('.prodId').textContent

    } 
    console.log(DatosProducto)

}


