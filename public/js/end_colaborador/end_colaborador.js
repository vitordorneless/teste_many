$(function () {

    $("#dt_end_colaborador").DataTable({
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "enderecoColaborador/listagem",
            "type": "POST"
        }
    });

});



