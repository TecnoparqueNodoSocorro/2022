
document.getElementById("btnconsultar").addEventListener("click", function () {
    let id_empresa = document.getElementById("id_empresa").value;
    let finicio = document.getElementById("finicio").value;
    let ffinal = document.getElementById("ffinal").value;
    let categoria = document.getElementById("categorias").value;

    realizarInforme(id_empresa, finicio, ffinal, categoria);
    /* console.log(id_empresa,"-",finicio,"-",ffinal,"-",categoria); */
});


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
            $tdPrecio.textContent = producto.precioP * producto.cantidad;
            $tr.appendChild($tdPrecio);

            $cuerpotabla.appendChild($tr);

        
        });
  
        
        // aqui el subtotal
        let totalConsulta = response.reduce(
            (acomulador, item) => acomulador + item.totalConsulta,
            0);
    

        const $totaltabla = document.querySelector("#totaltable");
        const $tr = document.createElement("tr");
        let $tdtotal = document.createElement("td");
        $tdtotal.textContent = "Total: ".totalConsulta;
        $tr.appendChild($tdtotal);
        $totaltabla.appendChild($tr);
    });
}

