//tabla responsiva
$(document).ready(function () {
    $('#responsive-table').DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bInfo": false,
        "bSort": false,
        "bAutoWidth": false,
        "ClassName": "none",
        "MultiSelect":false
    });

});


$(document).on("click", "#btnn", function () {
    console.log("Prueba botn")
});