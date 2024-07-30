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
    var mensajeInicioSesion = document.getElementById("mensajeInicioSesion");
    
    botonEnviar.addEventListener("click", function (event){
        
        var usuario = document.getElementById("usuario").value;
        var contraseña = document.getElementById("contraseña").value;
        
        if(validarCampos(usuario) && validarCampos(contraseña)){
            mensajeInicioSesion.textContent = "Inicio de sesión en progreso.";
        }else{
            event.preventDefault();
            mensajeInicioSesion.textContent = "Inicio de sesión rechazado.";
        }
    });    

});