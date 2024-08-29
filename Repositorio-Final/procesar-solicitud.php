<?php
include("bd-conexion.php");
session_start();
header('Location: crear_solicitud.php');

$cv = isset($_POST["cv"]) ? $_POST["cv"] : null;
$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : null;
$idPerfil = isset($_POST["idPerfil"]) ? $_POST["idPerfil"] : null;

try {
    if (isset($_POST["botonCrearSolicitud"])) {
        $mensaje = crearSolicitud($cv, $idOferta, $idPerfil);
        echo "<script>
            alert('$mensaje');
            window.location.href = 'crear_solicitud.php'; 
        </script>";
        exit(); 
    } else {
        throw new Exception("Error al procesar la operación.");
    }
} catch (Exception $error) {
    echo "<script>
        alert('{$error->getMessage()}');
        window.location.href = 'crear_solicitud.php'; 
    </script>";
} finally {

    if (isset($conexion) && $conexion) {
        $conexion->close();
    }
}


$_POST = array();

function crearSolicitud($cv, $idOferta, $idPerfil) {
    global $conexion;


    if (!$conexion) {
        throw new Exception("Error de conexión a la base de datos.");
    }

    // Verifica si el id de la oferta de trabajo existe
    $consulta = $conexion->prepare("SELECT COUNT(*) FROM `oferta_empleo` WHERE `Id_Oferta` = ?");
    if (!$consulta) {
        throw new Exception("Error en la preparación de la consulta: " . $conexion->error);
    }
    
    $consulta->bind_param("i", $idOferta);
    $consulta->execute();
    $consulta->bind_result($existe);
    $consulta->fetch();
    $consulta->close();

    // Si el idOferta no existe
    if ($existe == 0) {
        throw new Exception("¡No se pudo crear la solicitud de empleo porque la oferta a la que intentaste aplicar no existe!");
    }

    // Inserta la solicitud si la oferta existe
    $declaracion = $conexion->prepare("INSERT INTO `solicitud_empleo` (CV_Aplicante, Id_Oferta, Id_Perfil) VALUES (?,?,?)");
    if (!$declaracion) {
        throw new Exception("Error en la preparación de la declaración: " . $conexion->error);
    }

    $declaracion->bind_param("sii", $cv, $idOferta, $idPerfil);
    if (!$declaracion->execute()) {
        throw new Exception("Error al agregar la información: " . $declaracion->error);
    }

    return "Solicitud de empleo creada exitosamente.";
}
?>
