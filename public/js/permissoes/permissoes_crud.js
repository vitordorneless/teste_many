$(document).ready(function () {

    $("#end_permissoes_form").validate({
        messages: {
            id_many_colaborador: {
                required: 'Campo Obrigatório!!!'
            }
        },
        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: BASE_URL + "permissoes/salva_dados",
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
                    $('#end_permissoes_form')[0].reset();
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