$(function () {

    $("#dt_colaboradores").DataTable({        
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "colaborador/listagem",
            "type": "POST"
        }        
    });

});



