/* definir arreglo que almacenara los articulos seleccionados  */
let ListadoFactura = [];
/* definir el listado  */
const listaPro = document.querySelector("#listaPro");
const tablafacturahtml = document.querySelector(".tablafacturahtml tbody");
const totalValor = document.querySelector("#totalValor");
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

  const existefac = ListadoFactura.some((item) => item.id === datosP.id);
  if (existefac) {
    const adicionaprod = ListadoFactura.map((producto) => {
      if (producto.id === datosP.id) {
        producto.Cant++;
        return producto;
      } else {
        return producto;
      }
    });
  } else {
    /*   console.log(datosP); */
    ListadoFactura = [...ListadoFactura, datosP];
    /* console.log(ListadoFactura); */
  }


  FacturaHTML();
}

/* crear registro html  */
function FacturaHTML() {
  //limpiar el html previamente
  LimpiarHTML2();
  ListadoFactura.forEach((prod) => {
    const { id, nombre, precio, Cant } = prod;
    const row = document.createElement("tr");
    let subtotal = precio * Cant;
    row.innerHTML = `
    <td>${Cant}</td>
    <td>${nombre} </td>
    <td>${subtotal} </td>
    `;
    /* creamos le listado htmlen el tbody */
    tablafacturahtml.appendChild(row);

    let totalfacturaFinal = ListadoFactura.reduce(
      (acc, item) => acc + item.precio * item.Cant,
      0
    );
    /*  console.log(totalfacturaFinal); */
    document.querySelector(".totalValor").innerHTML = totalfacturaFinal;
  });
GuardarFactura();

}
/* ----------------------------------------------------------- */

function LimpiarHTML2() {
  while (tablafacturahtml.firstChild) {
    tablafacturahtml.removeChild(tablafacturahtml.firstChild);

    TotalfacturaFinal = "0";
    document.querySelector(".totalValor").innerHTML = TotalfacturaFinal;
  }
/*   console.log("limpieza ejecutada"); */
}

function GuardarFactura(){
  console.log("factura guardada");
   console.log(tablafacturahtml);
}
