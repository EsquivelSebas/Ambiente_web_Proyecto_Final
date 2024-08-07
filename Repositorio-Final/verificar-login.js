function validarCampos(inputValue){
    if (inputValue.trim().length === 0){
        return false;
    }else if(inputValue.trim().length < 5 || inputValue.trim().length > 20){
        return false;
    }else{
        return true;
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var botonEnviar = document.getElementById("botonEnviar");
    if(botonEnviar){
        botonEnviar.addEventListener("click", function (event){
            var usuario = document.getElementById("usuario").value;
            var contraseña = document.getElementById("contraseña").value;
            if(!validarCampos(usuario) || !validarCampos(contraseña)){
                event.preventDefault();
                alert('Los campos no cumplen con el formato válido o están vacíos.');
            }
        
        });
    }else{
        console.log('El elemento con id "botonEnviar" no se encontró en el DOM.');
    }

});