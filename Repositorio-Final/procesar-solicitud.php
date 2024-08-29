<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

include("bd-conexion.php");

//Verificamos si la variable dentro del array post existe y que su valor no sea null de lo contrario le asignamos null.
$cv = isset($_POST["cv"]) ? $_POST["cv"] : null;
$idOferta = isset($_POST["idOferta"]) ? $_POST["idOferta"] : null;
$idPerfil = isset($_POST["idPerfil"]) ? $_POST["idPerfil"] : null;

try{
    if(isset($_POST["botonCrearSolicitud"])){
        crearSolicitud($cv, $idOferta, $idPerfil);
        header("Location: crear_solicitud.php");
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

function crearSolicitud($cv, $idOferta, $idPerfil) {
    global $conexion;
    //Verificamos si el id de la oferta de trabajo existe, si no evitamos que el usuario cree una solicitud de trabajo.
    $consulta = $conexion->prepare("SELECT COUNT(*) FROM `oferta_empleo` WHERE `Id_Oferta` = ?");
    //Vinculamos el parámetro con la consulta.
    $consulta->bind_param("i", $idOferta);
    //Ejecutamos la consulta.
    $consulta->execute();
    $consulta->bind_result($existe);
    $consulta->fetch();
    $consulta->close();
    if ($existe) {
        // Si el id_oferta existe, insertar la solicitud de empleo
        $declaracion = $conexion->prepare("INSERT INTO `solicitud_empleo` (CV_Aplicante, Id_Oferta, Id_Perfil) VALUES (?,?,?)");
        $declaracion->bind_param("sii", $cv, $idOferta, $idPerfil);
        if (!$declaracion->execute()) {
            throw new Exception("Error al agregar la información:" .$declaracion->error);
        }
        $declaracion->close();
    } else {
        echo "<script>alert('¡No se pudo crear la solicitud de empleo porque la oferta a la que intentaste aplicar no existe!');</script>";
        
    }

}

?>