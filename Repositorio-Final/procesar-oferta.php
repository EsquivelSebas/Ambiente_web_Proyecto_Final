<?php
session_start();
include("bd-conexion.php");

//Verificamos si la variable dentro del array post existe y que su valor no sea null de lo contrario le asignamos null.
$nombre = isset($_POST["nombreOferta"]) ? $_POST["nombreOferta"] : null;
$descripcion = isset($_POST["descripcionOferta"]) ? $_POST["descripcionOferta"] : null;
$fecha = isset($_POST["fechaOferta"]) ? $_POST["fechaOferta"] : null;
$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : null;
$idPerfil = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;
$idEmpresa = isset($_POST["idEmpresa"]) ? $_POST["idEmpresa"] : null;


try{
    if(isset($_POST["botonCrear"])){
        agregarOferta($nombre, $descripcion, $fecha, $idPerfil, $idEmpresa);
        header("Location: crear_oferta.php");
    }else if(isset($_POST["botonEliminar"])){
        eliminarOferta($idOferta, $idPerfil, $idEmpresa);
        header("Location: eliminar_oferta.php");
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

function agregarOferta($nombre, $descripcion, $fecha, $idPerfil, $idEmpresa) {
    global $conexion;
    //Creamos la declaración preparada.
    $declaracion = $conexion->prepare("INSERT INTO `oferta_empleo` (Nombre_Oferta, Descripcion_Oferta, Fecha_Oferta, Id_Perfil, Id_Empresa) VALUES (?,?,?,?,?)");
    //Vinculamos los parámetros a la declaración.
    $declaracion->bind_param("sssii", $nombre, $descripcion, $fecha, $idPerfil, $idEmpresa);
    //Si al ejecutar la declaración nos da error lanzamos una excepción.
    if(!$declaracion->execute()){
        throw new Exception("Error al agregar la información: " .$declaracion->error);
    }
    //Y para concluir cerramos la conexión de la declaración con la base de datos.
    $declaracion->close();
}

function eliminarOferta($idOferta, $idPerfil, $idEmpresa) {
    global $conexion;
    $declaracion = $conexion->prepare("DELETE FROM `oferta_empleo` WHERE Id_Oferta = ? AND Id_Perfil = ? AND Id_Empresa = ?");
    $declaracion->bind_param("iii", $idOferta, $idPerfil, $idEmpresa);
    if(!$declaracion->execute()){
        throw new Exception("Error al eliminar la información: " .$declaracion->error);
    }
    $declaracion->close();
}
?>










