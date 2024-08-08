<?php
session_start();
include("bd-conexion.php");

header("Location: buzon_cliente.php");

//Verificamos si la variable dentro del array post existe y que su valor no sea null de lo contrario le asignamos null.
$asunto = isset($_POST["asunto"]) ? $_POST["asunto"] : null;
$fechaMensaje = isset($_POST["fechaMensaje"]) ? $_POST["fechaMensaje"] : null;
$idPerfilPost = isset($_POST["idPerfil"]) ? $_POST["idPerfil"] : null;

try{
    if(isset($_POST["botonCrearMensaje"])){
        enviarMensaje($asunto, $fechaMensaje, $idPerfilPost);
        header("Location: crear_mensaje.php");
    }else{
        throw new Exception("Error al procesar la operación.");
    }
}catch(Exception $error){
    echo $error->getMessage();
}finally{
    $conexion->close();
}

//Limpiamos las variables después de usarlas.
$_POST = array();

function enviarMensaje($asunto, $fechaMensaje, $idPerfilPost) {
    global $conexion;
    //Creamos la declaración preparada.
    $declaracion = $conexion->prepare("INSERT INTO `mensajes` (Asunto, Fecha_Envio, Id_Perfil) VALUES (?,?,?)");
    //Vinculamos los parámetros a la declaración.
    $declaracion->bind_param("ssi", $asunto, $fechaMensaje, $idPerfilPost);
    //Si al ejecutar la declaración nos da error lanzamos una excepción.
    if(!$declaracion->execute()){
        throw new Exception("Error al agregar la información: " .$declaracion->error);
    }
    //Y para concluir cerramos la conexión de la declaración con la base de datos.
    $declaracion->close();
}

?>
