$(document).ready(function () {    
    
    $('#valor_unitario').maskMoney({
        alloNegative: true,
        thousands: ".",
        decimal: ",",
        precision: 2
    });

    $("#pedido_item_edit").validate({
        messages: {
            quantidade: {
                required: 'Campo Obrigatório!!!'
            },
            valor_unitario: {
                required: 'Campo Obrigatório!!!'
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "compras/salva_item_edit",
                dataType: "html",
                data: $(form).serialize(),
                beforeSend: function () {
                    $("#conteudo").html("Carregando...");
                },
                error: function (e) {
                    console.log(e);
                    alerta('error', e, e);
                },
                success: function (response) {
                    $('#pedido_compra')[0].reset();
                    $("#conteudo").empty();
                    if (response === "salvo") {
                        alerta('success', 'Sucesso', 'Dados Salvos!!');
                        $("#conteudo").html('Dados Salvos!!');
                    } else {
                        alerta('error', 'Aconteceu um erro!', 'Tente Novamente!!');
                        $("#conteudo").html('Tente Novamente!!');
                    }
                    $('html,body').animate({scrollTop: document.body.scrollHeight}, "fast");
                },
                complete: function () {
                    $("#conteudo").empty();
                }
            });
            return false;
        }
    });
});