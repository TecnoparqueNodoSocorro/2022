/* definir arreglo que almacenara los articulos seleccionados  */
let ListadoFactura = [];
/* definir el listado  */
const listaPro = document.querySelector("#listaPro");


/* Escuchadores  */
function CargarFacturaListener() {
/*   console.log("ejecutando escuchador"), */
    listaPro.addEventListener("click", AgregarPFactura);
}

/* funciones */

function AgregarPFactura(e) {
  e.preventDefault();
  if (e.target.classList.contains("AgrePro")) {
    const datosSeleccion = e.target.parentElement.parentElement;
  /*   console.log(datosSeleccion); */

        Estrucuradatos(datosSeleccion);
/*     console.log("agrego item"); */
  }
}

/* ------------------------------------------------------- */
function Estrucuradatos(datos) {
  const datosP = {
    id: datos.querySelector("#prod_id").value,
    nombre: datos.querySelector("#nombre").textContent,
    precio: datos.querySelector("#precio").value,
    Cant: 1,
  };
/*   console.log(datosP); */

ListadoFactura=[...ListadoFactura, datosP];

console.log(ListadoFactura);
}


/* crear registro html  */
