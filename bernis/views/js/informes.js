$(document).on("click", "#btnconsultar", function () {
    let finicio = document.getElementById("finicio");
    let ffinal = document.getElementById("ffinal");
    let categoria = document.getElementById("categorias");
    realizarInforme(finicio, ffinal, categoria);
});

function realizarInforme(finicio, ffinal, categoria) {
    datosC = {
        finicio: finicio,
        ffinal: ffinal,
        categoria: categoria,
    }
    $.post("views/ajax/informes.ajax.php", { datosC }, function (data) {
        let response = json.parse(data);
    });
}