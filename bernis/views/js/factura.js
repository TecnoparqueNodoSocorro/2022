
/* ----------------------------------variables y constantes */
let ListadoFactura = [];
let arraySave = [];
const listaPro = document.querySelector("#listaPro");
const tablafacturahtml = document.querySelector(".tablafacturahtml tbody");
const totalValor = document.querySelector("#totalValor");
const btnfacturar = document.querySelector(".BtnFacturar");
const Tfactura = document.querySelector(".tablafacturahtml tbody");
let factid = document.getElementById("factId");
let valor = document.getElementById("valor");
const id_emp = 2;
var id_user = 2;


/* ------------------------------------------------listener */
function CargarFacturaListener() {
  /* -------------------------------------------------------------------------------------------- */
  listaPro.addEventListener("click", AgregarPFactura);
  //eliminar producto del carrito
  Tfactura.addEventListener("click", eliminarProfactura);
}

/* ------------------------------------------------funciones */
function AgregarPFactura(e) {
  /* -------------------------------------------------------------------------------------------- */
  e.preventDefault();
  if (e.target.classList.contains("AgrePro")) {
    const datosSeleccion = e.target.parentElement.parentElement;
    Estrucuradatos(datosSeleccion);
  }
}
/* ------------------------------------------------------------------------------------------- */
function eliminarProfactura(e) {
  /* -------------------------------------------------------------------------------------------- */
  if (e.target.classList.contains("eliminarP")) {
    const prodID = e.target.getAttribute("data-id");
    ListadoFactura = arraySave.filter(
      producto => producto.id !== prodID);
    console.log(ListadoFactura);
    FacturaHTML();
  }
}


/* ------------------------------------------------------------------------------------------ */
function Estrucuradatos(datos) {
  /* -------------------------------------------------------------------------------------------- */
  const datosP = {
    id: datos.querySelector("#prod_id").value,
    nombre: datos.querySelector("#nombre").textContent,
    categoria: datos.querySelector("#clasificacion").textContent,
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

  console.log(ListadoFactura.length);
  FacturaHTML();
}
/* -------------------------------------------------------------------------------------------- */
function FacturaHTML() {
  /* -------------------------------------------------------------------------------------------- */
  LimpiarHTML2();

  ListadoFactura.forEach((prod) => {
    const { id, categoria, nombre, precio, Cant } = prod;
    arraySave.push({ id: id, nombre: nombre, categoria: categoria, Cant: Cant, id_emp: id_emp, precio: precio });
    const row = document.createElement("tr");
    let subtotal = precio * Cant;
    valor.innerHTML = ``;
    row.innerHTML = `
    <td>${Cant}</td>
    <td>${categoria}</td>
    <td>${nombre}</td>
    <td>${subtotal}</td>
    <td> <a href="#" class="btn btn-sm btn-danger eliminarP" data-id=${id}> X </a></td>`;
    tablafacturahtml.appendChild(row);
    let totalfacturaFinal = ListadoFactura.reduce(
      (acc, item) => acc + item.precio * item.Cant, 0);
    document.querySelector(".totalValor").innerHTML = totalfacturaFinal;
  }
  );

}




/* -------------------------------------------------------------------------------------------- */
const onClickFactura = () => {
  guardarIDfact();
};

//envio de cabecera de factura post

async function guardarIDfact() {
  const datosfactura = {
    "d_emp": id_emp,
    "d_user": id_user
  }

  if (arraySave.length > 0) {
    const responseCab = await $.post("views/ajax/factura.ajax.php", { datosfactura });
    console.log(responseCab);
    let rta = JSON.parse(responseCab);
    let datarta = rta.idFactura;
    /*  */
    console.log(datarta);
    factid.value = datarta;
    valor.innerHTML = `<div class="alert alert-info" role="alert">
  <small><i class="bi bi-shield-fill-check"></i> Factura #${datarta} generada exitosamente!</small>
</div>`; datarta;

    guardarDetalleFact(datarta, arraySave);
  }
  else {
    valor.innerHTML = `<div class="alert alert-danger" role="alert">
  <small><i class="bi bi-shield-fill-exclamation"></i> Se requieren productos en la lista  antes de facturar</small>
</div>`;
  }
}




/* ---envio de detalle de factura------------------------------------------------------------ */
function guardarDetalleFact(idfactura, arraySave) {
  /* -------------------------------------------------------------------------------------------- */
  let detallefactura = JSON.stringify(arraySave);
  $.post("views/ajax/factura.ajax.php", { idfactura: idfactura, detallefactura: detallefactura }, function (data) {
    var responseDet = JSON.parse(data);
    console.log(responseDet);
    btnfacturar.style.visibility = "hidden";
     setTimeout(function () {
       window.location = 'index.php?page=vitrina';
     }, 2000);

  });
}

/* -------------------------------------------------------------------------------------------- */
function LimpiarHTML2() {
  /* -------------------------------------------------------------------------------------------- */
  arraySave = [];
  while (tablafacturahtml.firstChild) {
    tablafacturahtml.removeChild(tablafacturahtml.firstChild);
    TotalfacturaFinal = "0";
    document.querySelector(".totalValor").innerHTML = TotalfacturaFinal;


  }
}







