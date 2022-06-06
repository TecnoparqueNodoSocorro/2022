

class carrito{

    // añadir el producto al carrito 
    comprarProducto(e){
        e.preventDefault();
        // si se presiona un boton que contenga la clase agregar_carrito
        if(e.target.classList.contains('agregar_carrito')){
            const producto = e.target.parentElement.parentElement;
            this.leerDatosProductos(producto);
        }

    }
}