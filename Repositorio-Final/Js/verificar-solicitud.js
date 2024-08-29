function validarTexto(inputValue){
    if (inputValue.trim().length === 0 || inputValue.trim().length < 5){
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

    var botonCrearSolicitud = document.getElementById("botonCrearSolicitud");
    
 
    if(botonCrearSolicitud){
        botonCrearSolicitud.addEventListener("click", function (event){
            
            var cv = document.getElementById("cv").value;
            var idOferta = document.getElementById("idOferta").value;
            var idPerfil = document.getElementById("idPerfil").value;
            
            
            if(!validarTexto(cv) || !validarNumero(idOferta) || !validarNumero(idPerfil)){
                event.preventDefault();
                alert('Los campos no cumplen con el formato válido o se encuentrán vacíos para crear una solicitud de empleo.');
            }  else{
                alert('Oferta creada exitosamente.');
            }
            
        });
    }else{
        alert('El elemento no se encontró en el DOM');

    }

});