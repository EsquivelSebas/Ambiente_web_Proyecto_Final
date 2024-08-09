function validarTexto(inputValue){
    if (inputValue.trim().length === 0 || inputValue.trim().length < 5){
        return false;
    }else{
        return true;
    }
}

//Función para validar la fecha correctamente.
function validarFecha(inputValue){
    if(!Date.parse(inputValue)){
        return false;
    }else{
        return true;
    }
}

//Función para validar los identificadores de los diferentes campos que se rellenan en el formulario.
function validarNumero(inputValue){
    if (Number(inputValue)<=0){
        return false;
    }else{
        return true;
    }
}

document.addEventListener("DOMContentLoaded", function () {

    var botonCrearMensaje = document.getElementById("botonCrearMensaje");
    
    
    
    if(botonCrearMensaje){
        botonCrearMensaje.addEventListener("click", function (event){
            
            var asunto = document.getElementById("asunto").value;
            var fechaMensaje = document.getElementById("fechaMensaje").value;
            var idPerfil = document.getElementById("idPerfil").value;
           
            if(!validarTexto(asunto) || !validarFecha(fechaMensaje) || !validarNumero(idPerfil)){
                event.preventDefault();
                alert('Los campos no cumplen con el formato válido o se encuentrán vacíos para crear una oferta.');
            }      
        });
    }else{
        alert('El elemento no se encontró en el DOM');

    }

});


    
