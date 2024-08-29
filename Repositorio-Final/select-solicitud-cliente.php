<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

include("bd-conexion.php");
header("Location: buzon_cliente_solicitud.php");

$idPerfilSesion = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;

function observarSolicitudes($idPerfilSesion){
    try{
        global $conexion;
        //Ejecutamos la consulta para obtener las solicitudes de empleo relacionadas al usuario que la creo en específico.
        $consulta = $conexion->prepare("SELECT * FROM `solicitud_empleo` WHERE Id_Perfil = ?");
        //Vinculamos el parámetro con la declaración.
        $consulta->bind_param("i", $idPerfilSesion);
        //Si la ejecución de la consulta fue fallida lanzamos una excepción.
        if(!$consulta->execute()){
            throw new Exception("Error al ejecutar la consulta: " .$consulta->error);
        }else{
            //Obtenemos el resultado de la consulta y lo guardamos en una variable.
            $resultado = $consulta->get_result();
            //Y para concluir recuperamos y guardamos en una variable de sesión todas las filas de la tabla como un array asociativo.
            $_SESSION["solicitudes"] = $resultado->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
        }
    }catch(Exception $error){
        echo $error->getMessage();
    }finally{
        $conexion->close();
    }
}

observarSolicitudes($idPerfilSesion);
?>