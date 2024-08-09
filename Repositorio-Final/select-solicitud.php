<?php
session_start();
include("bd-conexion.php");
header("Location: buzon_contratador.php");

$idPerfilSesion = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;

function observarSolicitudes($idPerfilSesion){
    try{
        global $conexion;
        //Preparamos la consulta para obtener la información que haya en la tabla solicitud_empleo.
        $consulta = $conexion->prepare("SELECT solicitud_empleo.* FROM solicitud_empleo JOIN oferta_empleo ON oferta_empleo.Id_Oferta = solicitud_empleo.Id_Oferta
        JOIN empresa ON empresa.Id_Empresa = oferta_empleo.Id_Empresa WHERE oferta_empleo.Id_Perfil = ?");
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
        }catch(Exception $error){
            echo $error->getMessage();
        }finally{
            $conexion->close();
        }
    }
}

observarSolicitudes();
?>