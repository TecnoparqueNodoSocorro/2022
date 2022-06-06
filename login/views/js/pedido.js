const carro = new carrito();
const carrito = document.getElementById('carrito');
const productos =doncument.getElementById('lista-productos');
const listaProductos = documento.getElementById('#lista-carrito tbody');

cargarEventos();




function cargarEventos(){
productos.addEventListener('click',(e)=>{carro.comprarProducto(e)});

}
