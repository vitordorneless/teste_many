$(document).ready(function () {

    $("#end_colaborador_form").validate({
        messages: {
            cep: {
                required: 'Campo Obrigatório!!!'
            },
            rua: {
                required: 'Campo Obrigatório!!!'
            },
            numero: {
                required: 'Campo Obrigatório!!!'
            },
            cidade: {
                required: 'Campo Obrigatório!!!'
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "enderecoColaborador/salva_dados",
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
                    $('#end_colaborador_form')[0].reset();
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