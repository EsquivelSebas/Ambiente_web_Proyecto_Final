<?php
session_start();
include("bd-conexion.php");

$usuario =  $_POST["usuario"];
$contraseña = $_POST["contraseña"];

$declaracion = $conexion->prepare("SELECT * FROM `perfil` WHERE Nombre_Usuario = ?");

$declaracion->bind_param("s", $usuario);

$declaracion->execute();


$resultado = $declaracion->get_result();

if($resultado->num_rows > 0){
while($fila = $resultado->fetch_assoc()){
    if($fila["Nombre_Usuario"] == $usuario){
        if($contraseña == $fila["Contraseña"]){
            
            session_start();
          
            $_SESSION["nombre_usuario"] = $usuario;
           
            $_SESSION["id_perfil"]= $fila["Id_Perfil"];
          
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