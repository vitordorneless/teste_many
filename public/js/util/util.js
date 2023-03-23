const BASE_URL = 'http://localhost/Many/';

function alerta(icon = "", title = "", text = "") {
    return Swal.fire({
        icon: icon,
        title: title,
        text: text,
        timer: 1800
    });
}

/*exemplo alerta
 * alerta('success', 'Sucesso', 'Dados Salvos!!');
   
                        alerta('error', 'Aconteceu um erro!', 'Tente Novamente!!');
 */