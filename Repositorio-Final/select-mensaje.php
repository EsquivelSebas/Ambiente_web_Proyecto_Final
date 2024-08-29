<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

include("bd-conexion.php");
header("Location: buzon_cliente_mensaje.php");

/*Esta variable se utiliza para que al querer ver un mensaje el usuario solo vea los mensajes los cuales están 
asociados a su id que se capturó en el archivo procesar-login.php*/
$idPerfilSesion = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;


function observarMensajes($idPerfilSesion){
    try{
        global $conexion;
        $consulta = $conexion->prepare("SELECT * FROM `mensajes` WHERE Id_Perfil = ?");
        $consulta->bind_param("i", $idPerfilSesion);
        if(!$consulta->execute()){
            throw new Exception("Error al ejecutar la consulta: " .$consulta->error);
        }else{
            $resultado = $consulta->get_result();
            $_SESSION["mensajes"] = $resultado->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
        }
    }catch(Exception $error){
        echo $error->getMessage();
    }finally{
        $conexion->close();
    }
}


observarMensajes($idPerfilSesion);
?>