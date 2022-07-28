

document.getElementById("btnconsultar").addEventListener("click",function()
{
    let id_empresa = document.getElementById("id_empresa").value;
    let finicio = document.getElementById("finicio").value;
    let ffinal = document.getElementById("ffinal").value;
    let categoria = document.getElementById("categorias").value;

    realizarInforme(id_empresa, finicio, ffinal, categoria);
/* console.log(id_empresa,"-",finicio,"-",ffinal,"-",categoria); */
});


function realizarInforme(id_empresa, finicio, ffinal, categoria) {
    datosC = {
        finicio: finicio,
        ffinal: ffinal,
        categoria: categoria,
        id_empresa:id_empresa,
    };
    //datos=JSON.parse(datosC);
    $.post("views/ajax/informes.ajax.php", { datosC }, function (data) {
      let response = JSON.parse(data)
      console.log(response);
      
    });
 
}