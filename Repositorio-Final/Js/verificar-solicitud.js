function validarTexto(inputValue) {
    return inputValue.trim().length > 0 && inputValue.trim().length >= 5;
}

function validarNumero(inputValue) {
    return Number(inputValue) > 0;
}

document.addEventListener("DOMContentLoaded", function () {
    var botonCrearSolicitud = document.getElementById("botonCrearSolicitud");
    
    if (botonCrearSolicitud) {
        botonCrearSolicitud.addEventListener("click", function (event) {
            var cv = document.getElementById("cv").value;
            var idOferta = document.getElementById("idOferta").value;
            var idPerfil = document.getElementById("idPerfil").value;
            
            if (!validarTexto(cv) || !validarNumero(idOferta) || !validarNumero(idPerfil)) {
                event.preventDefault();
                alert('Los campos no cumplen con el formato válido o se encuentran vacíos para crear una solicitud de empleo.');
            }
        });
    } else {
        alert('El elemento no se encontró en el DOM');
    }
});
