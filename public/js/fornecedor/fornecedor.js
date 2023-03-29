$(function () {

    $("#dt_fornecedores").DataTable({
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "fornecedor/listagem",
            "type": "POST"
        }
    });

});



