$(function () {

    $("#dt_produtos").DataTable({        
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "produtos/listagem",
            "type": "POST"
        }        
    });

});



