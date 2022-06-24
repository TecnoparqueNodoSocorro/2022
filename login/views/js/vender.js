/* definir arreglo que almacenara los articulos seleccionados  */
let ListadoFactura = [];
/* definir el listado  */
const listaPro = document.querySelector("#listaPro");
const tablafacturahtml = document.querySelector(".tablafacturahtml tbody");
const totalValor = document.querySelector("#totalValor");
const btnfacturar = document.querySelector(".BtnFacturar");

/* Escuchadores  */
function CargarFacturaListener() {
  listaPro.addEventListener("click", AgregarPFactura);
}

function AlmacenarfacturaListener(){
  btnfacturar.addEventListener("click", GuardarFactura);
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
    ListadoFactura = [...ListadoFactura, datosP];
  }
  FacturaHTML();
}

/* crear registro html  */
function FacturaHTML() {
  LimpiarHTML2();
  const arraySave = [];
  ListadoFactura.forEach((prod) => {
    const id_emp = 1;
    const { id, nombre, precio, Cant } = prod;
    arraySave.push({ id_producto: id, cantidad: Cant, id_empresa: id_emp });
    const row = document.createElement("tr");
    let subtotal = precio * Cant;
    row.innerHTML = `
    <td>${Cant}</td>
    <td>${nombre}</td>
    <td>${subtotal}</td>
    <td> <a href="#" class="btn btn-sm btn-danger eliminarP" data-id=${id}> -1 </a></td>
    `;
    /* creamos el listado html en el tbody */
    tablafacturahtml.appendChild(row);
    let totalfacturaFinal = ListadoFactura.reduce(
      (acc, item) => acc + item.precio * item.Cant, 0);

    document.querySelector(".totalValor").innerHTML = totalfacturaFinal;
  });

  AlmacenarfacturaListener();
}
/* ----------------------------------------------------------- */
function GuardarFactura(arraySave) {
  const datos = { myArray: arraySave };
  const paramJson = JSON.stringify(datos);
  console.log(arraySave);
}
/* --------------------------------------------------------------- */
function LimpiarHTML2() {
  while (tablafacturahtml.firstChild) {
    tablafacturahtml.removeChild(tablafacturahtml.firstChild);

    TotalfacturaFinal = "0";
    document.querySelector(".totalValor").innerHTML = TotalfacturaFinal;
  }
  /*   console.log("limpieza ejecutada"); */
}
