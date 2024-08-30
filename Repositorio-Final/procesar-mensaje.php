<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

include("bd-conexion.php");

//Verificamos si la variable dentro del array post existe y que su valor no sea null de lo contrario le asignamos null.
$asunto = isset($_POST["asunto"]) ? $_POST["asunto"] : null;
$fechaMensaje = isset($_POST["fechaMensaje"]) ? $_POST["fechaMensaje"] : null;
$idPerfilPost = isset($_POST["idPerfil"]) ? $_POST["idPerfil"] : null;

try{
    if(isset($_POST["botonCrearMensaje"])){
        existenciaUsuario($idPerfilPost);
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

function existenciaUsuario($idPerfilPost) {
    global $conexion;
    // Creamos la declaración preparada.
    $declaracion = $conexion->prepare("SELECT COUNT(*) FROM `perfil` WHERE Id_Perfil = ?");
    // Vinculamos los parámetros a la declaración.
    $declaracion->bind_param("i", $idPerfilPost);
    // Si al ejecutar la declaración nos da error lanzamos una excepción.
    if (!$declaracion->execute()) {
        throw new Exception("Error al verificar la existencia del usuario: " .$declaracion->error);
    }
    // Obtenemos el resultado.
    $declaracion->bind_result($count);
    $declaracion->fetch();
    // Si el usuario no existe, mostramos un mensaje y detenemos la ejecución.
    if ($count == 0) {
        echo "El usuario con ID $idPerfilPost no existe.";
        exit();
    }
    // Cerramos la declaración.
    $declaracion->close();
}

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
