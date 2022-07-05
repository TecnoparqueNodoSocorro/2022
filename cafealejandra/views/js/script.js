

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


$('#myModal').on('hidden.bs.modal', function (event) {
    $("#myModal input").val("");
 });
$('#myModalEm').on('hidden.bs.modal', function (event) {
     $("#myModalEm input").val("");
  });

  $('#myModalEncargado').on('hidden.bs.modal', function (event) {
    $("#myModalEncargado input").val("");
    $("#myModalEncargado count").val("");
 });