<?php
session_start();
include("bd-conexion.php");
header("Location: ofertas.php");

try{
    global $conexion;
    //Preparamos la consulta para obtener la información que haya en la tabla oferta_empleo.
    $consulta = $conexion->prepare("SELECT oferta_empleo.*, empresa.Nombre_Empresa FROM oferta_empleo, empresa WHERE oferta_empleo.Id_Empresa = empresa.Id_Empresa");
    //Si la ejecución de la consulta fue fallida lanzamos una excepción.
    if(!$consulta->execute()){
        throw new Exception("Error al ejecutar la consulta: " .$consulta->error);
    }else{
        //Obtenemos el resultado de la consulta y lo guardamos en una variable.
        $resultado = $consulta->get_result();
        //Y para concluir recuperamos y guardamos en una variable de sesión todas las filas de la tabla como un array asociativo.
        $_SESSION["ofertas"] = $resultado->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
    }   
}catch(Exception $error){
    echo $error->getMessage();
}finally{
    $conexion->close();
}