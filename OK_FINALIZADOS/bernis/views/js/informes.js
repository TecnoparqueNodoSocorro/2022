let btnconsultar = document.getElementById("btnconsultar")
if(btnconsultar){


btnconsultar.addEventListener("click", function () {
    let id_empresa = document.getElementById("id_empresa").value;
    let finicio = document.getElementById("finicio").value;
    let ffinal = document.getElementById("ffinal").value;
    let categoria = document.getElementById("categorias").value;
    realizarInforme(id_empresa, finicio, ffinal, categoria);
});

}
function realizarInforme(id_empresa, finicio, ffinal, categoria) {
    $('#totaltable').empty(); 
    $('#rtatable').empty(); 
    datosC = {
        finicio: finicio,
        ffinal: ffinal,
        categoria: categoria,
        id_empresa: id_empresa,
    };

    $.post("views/ajax/informes.ajax.php", { datosC }, function (data) {
        let response = JSON.parse(data)
        console.log(response);
       /* */
        const $cuerpotabla = document.querySelector("#rtatable");

        response.forEach(producto => {
            //creamos la fila
            const $tr = document.createElement("tr");
            //creamos la columna
            let $tdCant = document.createElement("td");
            $tdCant.textContent = producto.cantidad;
            $tr.appendChild($tdCant);
            /*  */
            let $tdCat = document.createElement("td");
            $tdCat.textContent = producto.categoria;
            $tr.appendChild($tdCat);
            /*  */
            let $tdNombre = document.createElement("td");
            $tdNombre.textContent = producto.nombrep;
            $tr.appendChild($tdNombre);
            /*  */
            let $tdPrecio = document.createElement("td");
        /*     $subtotal = producto.precioP * producto.cantidad */
            $tdPrecio.textContent = producto.precioP;
            $tr.appendChild($tdPrecio);
            /*  */
            let $tdSub = document.createElement("td");
            /*     $subtotal = producto.precioP * producto.cantidad */
            $tdSub.textContent = producto.precioP * producto.cantidad;
            $tr.appendChild($tdSub);

            $cuerpotabla.appendChild($tr);

            let totalConsulta = response.reduce(
                (acomulador, item) => acomulador + (item.precioP * item.cantidad),
                0);
            document.querySelector("#totaltable").innerHTML = totalConsulta;
        });
  
        
        // aqui el subtotal
      
        
    });
}

