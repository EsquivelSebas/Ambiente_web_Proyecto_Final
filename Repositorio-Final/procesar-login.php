<?php

include("bd-conexion.php");

$usuario =  $_POST["usuario"];
$contraseña = $_POST["contraseña"];

//Creamos y preparamos la consulta.
$declaracion = $conexion->prepare("SELECT * FROM `perfil` WHERE Nombre_Usuario = ?");

//Vinculamos los parámetros con la consulta en este caso, significa que vamos a vincular una cadena de texto que sería el nombre de usuario a la consulta.
$declaracion->bind_param("s", $usuario);

//Ejecutamos la consulta.
$declaracion->execute();

//Obtenemos el resultado de la consulta.
$resultado = $declaracion->get_result();

if($resultado->num_rows > 0){
while($fila = $resultado->fetch_assoc()){
    if($fila["Nombre_Usuario"] == $usuario){
        if($contraseña == $fila["Contraseña"]){
            //Iniciamos una sesión si el nombre de usuario y la contraseña coinciden con los que se encuentran en la base de datos.
            session_start();
            //Guardamos en una variable de sesión el nombre de usuario que está iniciando sesión.
            $_SESSION["nombre_usuario"] = $usuario;
            //Guardamos en una variable el id del perfil que está iniciando sesión.
            $_SESSION["id_perfil"]= $fila["Id_Perfil"];
            //Realizamos de nuevo el proceso de crear, vincular parámetros, ejecutar y obtener el resultado de una consulta.
            $declaracion_rol = $conexion->prepare("SELECT Nombre_Rol FROM `rol` AS A,`perfil` AS B WHERE A.Id_Rol = B.Id_Rol AND B.Nombre_Usuario = ?");
            $declaracion_rol->bind_param("s", $usuario);
            $declaracion_rol->execute();
            $resultado_rol = $declaracion_rol->get_result();
            if($resultado_rol->num_rows > 0){
                $fila_rol = $resultado_rol->fetch_assoc();
                $_SESSION["nombre_rol"] = $fila_rol["Nombre_Rol"];
                header("Location: index.php");
            }
        }else{
            header("Location: iniciar_sesion.php");
            die();
        }

    }
}

}else{
    header("Location: iniciar_sesion.php");
    die();
}

?>

