$(document).on("click", "#btnconsultar", function () {
    let id_empresa = document.getElementById("id_empresa");
    let finicio = document.getElementById("finicio");
    let ffinal = document.getElementById("ffinal");
    let categoria = document.getElementById("categorias");
    realizarInforme(id_empresa,finicio, ffinal, categoria);
    
});

function realizarInforme(id_empresa, finicio, ffinal, categoria) {
    datosC = {
        finicio: finicio,
        ffinal: ffinal,
        categoria: categoria,
        id_empresa:id_empresa,
    }
    $.post("views/ajax/informes.ajax.php", { datosC }, function (data) {
        let response = json.parse(data);
    });
    return response;
}