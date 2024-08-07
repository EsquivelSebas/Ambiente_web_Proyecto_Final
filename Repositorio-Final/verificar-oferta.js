function validarTexto(inputValue){
    if (inputValue.trim().length === 0 || inputValue.trim().length < 5){
        return false;
    }else{
        return true;
    }
}

//Función para validar la fecha de creación de la oferta de trabajo correctamente.
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

    var botonCrear = document.getElementById("botonCrear");
    var botonEliminar = document.getElementById("botonEliminar");
    
    if(botonCrear){
        botonCrear.addEventListener("click", function (event){
            
            var nombreOferta = document.getElementById("nombreOferta").value;
            var descripcionOferta = document.getElementById("descripcionOferta").value;
            var fechaOferta = document.getElementById("fechaOferta").value;
            var idEmpresa = document.getElementById("idEmpresa").value;
            
            if(!validarTexto(nombreOferta) || !validarTexto(descripcionOferta) || !validarFecha(fechaOferta) || !validarNumero(idPerfil) || !validarNumero(idEmpresa)){
                event.preventDefault();
                alert('Alguno o todos los campos no cumplen con el formato válido o se encuentrán vacíos para crear una oferta.');
            }      
        });
    }else if(botonEliminar){
        botonCrear.addEventListener("click", function (event){
            var idOferta = document.getElementById("idOferta").value;
            var idPerfil = document.getElementById("idEmpresa").value;
            var idEmpresa = document.getElementById("idEmpresa").value;
            
            if(!validarNumero(idOferta) || !validarNumero(idPerfil) || !validarNumero(idEmpresa)){
                event.preventDefault();
                alert('Alguno o todos los campos no cumplen con el formato válido o se encuentrán vacíos para crear una oferta.');
            }

        });
    
    }else{
        console.log('El elemento no se encontró en el DOM.');
    }

});

 
    
    
      
  




