// variables
// el div donde se encuentra el carrito de compras
const carrito = document.querySelector("#carrito_compras");
// el div donde se encuentran los productos
const listaproductosdisponibles = document.querySelector("#productos");
// tabla donde esta el listado de los productos de la canasta
const listaproductosencanasta = document.querySelector(
  "#tabla_productos tbody"
);
//boton de vaciar carrito
const vaciarcarritoBtn = document.querySelector("#btnvaciarC");

/* variable vector que guarda los articulos  */
let articulosCarrito = [];

/* ---------------------------------------------------------------------------------------------------------------------------------------------- */

function cargareventListener() {
  /*   console.log("aqui entro a este metodo"); */
  // cuando se agrega un producto con el boton agregar
  /*   console.log({listaproductosdisponibles}); */
  listaproductosdisponibles.addEventListener("click", agregarpro);

  //eliminar producto del carrito
  carrito.addEventListener("click", eliminarProdecarro);

  //vaciar carrito
  vaciarcarritoBtn.addEventListener("click", () => {
    /*  console.log('vaciando el carrito'); */
    articulosCarrito = []; //vaciamos el arreglo
    carritoHTML();
  });
}

/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
/* Funciones  */

function agregarpro(e) {
  e.preventDefault();
  if (e.target.classList.contains("agregar_producto")) {
    //irnos hacia arriba
    const DatosProductoSelec =
      e.target.parentElement.parentElement.parentElement.parentElement;
    leerDatosProducto(DatosProductoSelec);
    carritoHTML();
  }
}

/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
function eliminarProdecarro(e) {
  if (e.target.classList.contains("borrar_producto")) {
    /*  console.log(e.target.classList);  */

    const productoID = e.target.getAttribute("data-id");

    /*        console.log(productoID); */

    articulosCarrito = articulosCarrito.filter(
      (productos) => productos.id !== productoID
    );
    carritoHTML();
    console.log(articulosCarrito);
  }
}
/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
/* leer contenido del html al que le dimos click  */
function leerDatosProducto(producto) {
  /* console.log(producto); */
  // crear objeto con la informaicon del producto sseleccionado
  const DatosProducto = {
    imagen: producto.querySelector("img").src,
    titulo: producto.querySelector("#nombreprod").textContent,
    id: producto.querySelector("a").getAttribute("data_id"),
    valor: producto.querySelector("#precio").textContent,
    cant: 1,
  };

  //revisar si un producto ya existe en el carrito

  const existe = articulosCarrito.some(
    (producto) => producto.id === DatosProducto.id
  );

  if (existe) {
    const prod = articulosCarrito.map((producto) => {
      if (producto.id === DatosProducto.id) {
        producto.cant++;
        return producto;
      } else {
        return producto;
      }
    });
  } else {
    //agregar celementos al carrito
    /*     console.log(DatosProducto) */
    articulosCarrito = [...articulosCarrito, DatosProducto];
    /*       console.log(articulosCarrito); */
    carritoHTML();
  }
}
/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
//muestra los productos en el carrito de compras
function carritoHTML() {
  //limpiar el html previamente
  LimpiarHTML();
  // crea la estructura del registro que se presentara
  articulosCarrito.forEach(
    (producto) => {
      // destructorin del objeto
      const { imagen, titulo, cant, valor, id } = producto;
      const row = document.createElement("tr");
      subtotal = producto.cant * producto.valor;
      row.innerHTML = `
        <td><img src= "${imagen}" width="45"></td>
        <td> ${titulo}</td>
        <td>${cant}</td>
        <td>${valor}</td>
        <td> ${subtotal} </td>
        <td>
        <a href="#" class="btn btn-danger borrar_producto" data-id=${id}> X </a>
        </td>
`;
      //crea el registro row el listado de productos html en el tbody
      listaproductosencanasta.appendChild(row);
      let totalCompraCarrito = articulosCarrito.reduce(
        (acomulador, producto) => acomulador + producto.cant * producto.valor,
        0
      );
      const fechaPedido = new Date();
      /* console.log(totalCompraCarrito) */
      document.querySelector(".totalcompra p").innerHTML = totalCompraCarrito;
    }
    /* aqui va el reduce */
  );
}

/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
//eliminar los productos del tbody para que no se almacenen los hijos
function LimpiarHTML() {
  /* 
    //forma lenta de eliminar 
    listaproductosencanasta.innerHTML=''; */
  // mientras exista un hijo en la lista lo elimina y solo deja el ultimo
  while (listaproductosencanasta.firstChild) {
    listaproductosencanasta.removeChild(listaproductosencanasta.firstChild);

    totalCompraCarrito = "0";
    document.querySelector(".totalcompra p").innerHTML = totalCompraCarrito;
  }
}
