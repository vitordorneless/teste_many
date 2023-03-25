$(document).ready(function () {

    $('#valor').maskMoney({
        alloNegative: true,
        thousands: ".",
        decimal: ",",
        precision: 2
    });

    $(".addline").click(function () {
        var novo;
        novo = $("tr.theline:first").clone();
        novo.find("input").val("");
        novo.insertAfter("tr.theline:last");
        initMaskMoney("input[id='valor']");
    });

    function initMaskMoney(selector) {
        $(selector).maskMoney({
            alloNegative: true,
            thousands: ".",
            decimal: ",",
            precision: 2
        });
    }

    $("#pedido_compra").validate({
        messages: {
            obs: {
                required: 'Campo Obrigatório!!!'
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "compras/salva_dados",
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