
/* ----------------------------------variables y constantes */
let ListadoFactura = [];
let arraySave = [];
const listaPro = document.querySelector("#listaPro");
const tablafacturahtml = document.querySelector(".tablafacturahtml tbody");
const totalValor = document.querySelector("#totalValor");
const btnfacturar = document.querySelector(".BtnFacturar");
/* ------------------------------------------------listener */
function CargarFacturaListener() {
  listaPro.addEventListener("click", AgregarPFactura);

}
/* ------------------------------------------------funciones */
function AgregarPFactura(e) {
  e.preventDefault();
  if (e.target.classList.contains("AgrePro")) {
    const datosSeleccion = e.target.parentElement.parentElement;
    Estrucuradatos(datosSeleccion);
  }
}

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
  console.log(ListadoFactura.length);
  FacturaHTML();
}
/* ----------------------------------------------- */
function FacturaHTML() {

  LimpiarHTML2();
  /*  */


  /*  */
  ListadoFactura.forEach((prod) => {
    const id_emp = 1;
    const fecha = new Date().toDateString();
    const { id, nombre, precio, Cant } = prod;
    arraySave.push({ id_producto: id, namepro: nombre, cantidad: Cant, id_empresa: id_emp });
    const row = document.createElement("tr");
    let subtotal = precio * Cant;
    row.innerHTML = `
    <td>${Cant}</td>
    <td>${nombre}</td>
    <td>${subtotal}</td>
    <td> <a href="#" class="btn btn-sm btn-danger eliminarP" data-id=${id}> X </a></td>
    `;
    tablafacturahtml.appendChild(row);
    let totalfacturaFinal = ListadoFactura.reduce(
      (acc, item) => acc + item.precio * item.Cant, 0);

    document.querySelector(".totalValor").innerHTML = totalfacturaFinal;

  }
  );

}
/* --------------------------------------------------- */
const onClickFactura = () => {

  guardarIDfact();


};

/*envio de cabecera de factura */
function guardarIDfact() {
  var id_emp = 1;
  enviarIDfactura(id_emp);
  /*  var  id_emp_fact = 1;
   var datos = new FormData();
   datos.append("idempresa",id_emp_fact);
  
    $.ajax({
      url: 'views/ajax/factura.ajax.php',
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {
        console.log("cabecera ok !! respuesta:", respuesta);
       
       
      },
      error: function () {
        alert('error!!!');
      }
    }
    ); */

}



function enviarIDfactura(id_emp) {
  $.post("views/ajax/factura.ajax.php", { id_emp }, function (data) {
    let response = function (data) {
      let response = (data);
      location.href = 'index.php?page=categorias';
      console.log(data);
    };

  });


  /*  envio de detalle de factura*/

  /*   function guardadetalle($id_factura) {
  
      const div_mensaje = document.getElementById('mesaje');
      const datos = { myArray1: arraySave };
      const paramJson = JSON.stringify(datos);
  
      $.ajax({
        type: "POST",
        url: 'views/ajax/factura.ajax.php',
        data: { 'dataDetalle': JSON.stringify(paramJson) },
        success: function (data) {
          console.log(data);
          div_mensaje.innerHTML = paramJson
        },
        error: function () {
          alert('error en trancaccion');
        }
  
      }
      );
    }
   */
  }
  /* ---------------------------------------------------- */
  function LimpiarHTML2() {
    arraySave = [];
    while (tablafacturahtml.firstChild) {
      tablafacturahtml.removeChild(tablafacturahtml.firstChild);
      TotalfacturaFinal = "0";
      document.querySelector(".totalValor").innerHTML = TotalfacturaFinal;

    }
  }







