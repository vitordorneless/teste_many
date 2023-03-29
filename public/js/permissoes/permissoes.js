$(function () {

    $("#dt_permissoes").DataTable({
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "permissoes/listagem",
            "type": "POST"
        }
    });

});



