function validarTexto(inputValue){
    if (inputValue.trim().length === 0){
        return false;
    }else if(inputValue.trim().length < 5){
        return false;
    }else{
        return true;
    }
}
function validarNumeros(inputValue){
    if (inputValue.trim().length === 0){
        return false;
    }else{
        return true;
    }
}

function manejarClick(event){
    var nombreOferta = document.getElementById("nombreOferta").value;
    var descripcionOferta = document.getElementById("descripcionOferta").value;
    var fechaOferta = document.getElementById("fechaOferta").value;
    var idEmpresa = document.getElementById("idEmpresa").value;
    
    if (validarTexto(nombreOferta) && validarTexto(descripcionOferta) && validarNumeros(fechaOferta) && validarNumeros(idEmpresa)) {
        
    } else {
        event.preventDefault();
    }
}
document.addEventListener("DOMContentLoaded", function () {
    var botonCrear = document.getElementById("botonCrear");
    var botonEliminar = document.getElementById("botonEliminar");

    botonCrear.addEventListener("click", manejarClick);
    botonEliminar.addEventListener("click", manejarClick);
});



