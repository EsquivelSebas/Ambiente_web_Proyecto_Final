$(document).ready(function() {
    $('#siguienteBtn').click(function(event) {
        event.preventDefault();
        $('#cardContainer').fadeOut(500, function() {
            window.location.href = 'siguiente_oferta.php';
        });
    });
});
