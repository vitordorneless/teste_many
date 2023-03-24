$(function () {

    $("#dt_compra").DataTable({        
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": BASE_URL + "compras/listagem",
            "type": "POST"
        }        
    });

});



