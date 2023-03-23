$(function () {
    $("#login_form").submit(function () {
        $.ajax({
            type: "POST",
            url: BASE_URL + "login/ajax_login",
            dataType: 'JSON',
            data: $(this).serialize(),
            beforeSend: function () {
                $("#conteudo").empty();
                $("#conteudo").html("Processando...");
            },
            success: function (json) {
                $("#conteudo").empty();
                if (json['status'] === 1) {
                    alerta('success', 'Sucesso', 'Direcionando!!');
                    window.location = BASE_URL + 'minds';
                } else {
                    alerta('error', 'Erro nos dados', 'Já tentou ' + json['tentar_logar']);
                    $("#login_form").reset();
                }

            },
            error: function (response) {
                $("#conteudo").empty();
                console.log(response);
                alerta('error', 'Erro nos dados', 'caiu no error');
                $("#conteudo").html("Não logou...");
            }
        });
        return false;
    });
});