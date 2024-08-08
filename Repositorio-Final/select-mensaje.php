<?php
session_start();
include("bd-conexion.php");
header("Location: buzon_cliente.php");

/*Esta variable se utiliza para que al querer ver un mensaje el usuario solo vea los mensajes los cuales están 
asociados a su id que se capturó en el archivo procesar-login.php*/
$idPerfilSesion = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;

function observarMensajes($idPerfilSesion){
    try{
        global $conexion;
        //Preparamos la consulta para obtener la información que haya en la tabla mensajes.
        $consulta = $conexion->prepare("SELECT * FROM `mensajes` WHERE Id_Perfil = ?");
        //Vinculamos el parámetro con la declaración.
        $consulta->bind_param("i", $idPerfilSesion);
        //Si la ejecución de la consulta fue fallida lanzamos una excepción.
        if(!$consulta->execute()){
            throw new Exception("Error al ejecutar la consulta: " .$consulta->error);
        }else{
            //Obtenemos el resultado de la consulta y lo guardamos en una variable.
            $resultado = $consulta->get_result();
            //Y para concluir recuperamos y guardamos en una variable de sesión todas las filas de la tabla como un array asociativo.
            $_SESSION["mensajes"] = $resultado->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
        }catch(Exception $error){
            echo $error->getMessage();
        }finally{
            $conexion->close();
        }
    }
}

observarMensajes($idPerfilSesion);
?>