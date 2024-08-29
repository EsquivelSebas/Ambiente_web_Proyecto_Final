<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

include("bd-conexion.php");

// se verifican que todas las variables del post sean vacias y si no estan vacias, se vles asigna un null
$nombre = isset($_POST["nombreOferta"]) ? $_POST["nombreOferta"] : null;
$descripcion = isset($_POST["descripcionOferta"]) ? $_POST["descripcionOferta"] : null;
$fecha = isset($_POST["fechaOferta"]) ? $_POST["fechaOferta"] : null;
$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : null;
$idPerfil = isset($_SESSION["id_perfil"]) ? $_SESSION["id_perfil"] : null;
$idEmpresa = isset($_POST["idEmpresa"]) ? $_POST["idEmpresa"] : null;
$categoriaImagen = isset($_POST["categoriaImagen"]) ? $_POST["categoriaImagen"] : null;

try {
    if (isset($_POST["botonCrearOferta"])) {
        verificarEmpresa($idEmpresa);
        agregarOferta($nombre, $descripcion, $fecha, $idPerfil, $idEmpresa);
        // se almacena el cambio de estado e una sesion para usarlo despues
        $_SESSION["categoriaImagen"] = $categoriaImagen;
        header("Location: crear_oferta.php");
    } else if (isset($_POST["botonEliminarOferta"])) {
        eliminarSolicitud($idOferta);
        eliminarOferta($idOferta, $idPerfil, $idEmpresa);
        header("Location: eliminar_oferta.php");
    } else {
        throw new Exception("Error al procesar la operación.");
    }
} catch (Exception $error) {
    echo $error->getMessage();
} finally {
    $conexion->close();
}

//s elimpian variables
$_POST = array();

function verificarEmpresa($idEmpresa) {
    global $conexion;
    // Creamos la consulta para verificar si el id de la empresa existe en la base de datos.
    $consulta = $conexion->prepare("SELECT COUNT(*) FROM empresa WHERE id_empresa = ?");
    // Vinculamos el parámetro con la consulta.
    $consulta->bind_param("i", $idEmpresa);
    // Si al ejecutar la declaración nos da error, lanzamos una excepción.
    if (!$consulta->execute()) {
        throw new Exception("Error al verificar la empresa: " . $consulta->error);
    }
    $consulta->bind_result($count);
    $consulta->fetch();
    // Si el id de la empresa no existe, lanzamos una excepción.
    if ($count == 0) {
        throw new Exception("El id de la empresa seleccionado no existe en la base de datos.");
    }
    $consulta->close();
}

function agregarOferta($nombre, $descripcion, $fecha, $idPerfil, $idEmpresa) {
    global $conexion;
    // Creamos la declaración preparada.
    $declaracion = $conexion->prepare("INSERT INTO `oferta_empleo` (Nombre_Oferta, Descripcion_Oferta, Fecha_Oferta, Id_Perfil, Id_Empresa) VALUES (?,?,?,?,?)");

    // Vinculamos los parámetros a la declaración.
    $declaracion->bind_param("sssii", $nombre, $descripcion, $fecha, $idPerfil, $idEmpresa);
    // Si al ejecutar la declaración nos da error, lanzamos una excepción.
    if (!$declaracion->execute()) {
        throw new Exception("Error al agregar la información: " . $declaracion->error);
    }
    // Y para concluir, cerramos la conexión de la declaración con la base de datos.
    $declaracion->close();
}

function eliminarSolicitud($idOferta) {
    global $conexion;
    $declaracion = $conexion->prepare("DELETE FROM `solicitud_empleo` WHERE Id_Oferta = ?");
    $declaracion->bind_param("i", $idOferta);
    if (!$declaracion->execute()) {
        throw new Exception("Error al eliminar la información: " . $declaracion->error);
    }
    $declaracion->close();
}

function eliminarOferta($idOferta, $idPerfil, $idEmpresa) {
    global $conexion;
    $declaracion = $conexion->prepare("DELETE FROM `oferta_empleo` WHERE Id_Oferta = ? AND Id_Perfil = ? AND Id_Empresa = ?");
    $declaracion->bind_param("iii", $idOferta, $idPerfil, $idEmpresa);
    if (!$declaracion->execute()) {
        throw new Exception("Error al eliminar la oferta de empleo: " . $declaracion->error);
    }
    $declaracion->close();
}
?>
