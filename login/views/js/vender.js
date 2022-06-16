let factura = [];
/* definir el listado  */
const BtnlistadoPro = document.querySelector(".AgrePro");

/* Escuchadores  */
function CargarFacturaListener() {
 BtnlistadoPro.addEventListener("click", AgregarPFactura);
}

/* funciones */

function AgregarPFactura(e) {
  /* grupo con datos del registro */
  if (e.target.classList.contains("AgrePro")) {
    //irnos hacia arriba
    const datosSelecion = e.target.parentElement.parentElement;
    console.log(datosSelecion);

    Estrucuradatos(datosSelecion);
  }
};
/* ------------------------------------------------------- */
function Estrucuradatos(datos) {
  const datosP = {
    id: datos.querySelector("#prod_id").value,
    nombre: datos.querySelector("#nombre").textContent,
    precio: datos.querySelector("#precio").value,
    Cant: 1,
  };
  console.log(datosP);
}
