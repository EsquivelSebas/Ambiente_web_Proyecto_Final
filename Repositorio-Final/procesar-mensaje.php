<?php
session_start();
include("bd-conexion.php");

//Verificamos si la variable dentro del array post existe y que su valor no sea null de lo contrario le asignamos null.
$asunto = isset($_POST["asunto"]) ? $_POST["asunto"] : null;
$fechaMensaje = isset($_POST["fechaMensaje"]) ? $_POST["fechaMensaje"] : null;
$idPerfilPost = isset($_POST["idPerfil"]) ? $_POST["idPerfil"] : null;
/*Esta variable se utiliza para que al querer ver un mensaje el usuario solo vea los mensajes los cuales están 
asociados a su id que se capturó en el archivo procesar-login.php*/
$idPerfilSesion = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;

try{
    if(isset($_POST["botonCrearMensaje"])){
        enviarMensaje($asunto, $fechaMensaje, $idPerfilPost);
        header("Location: crear_mensaje.php");
    }else if(isset($_POST["botonVerMensajes"])){
        observarMensajes($idPerfilSesion);
        header("Location: buzon_cliente.php");
        
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

function observarMensajes($idPerfilSesion){
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
    }   
}
?>