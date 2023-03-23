const BASE_URL = 'http://localhost/Many/';

function alerta(icon = "", title = "", text = "") {
    return Swal.fire({
        icon: icon,
        title: title,
        text: text,
        timer: 1800
    });
}