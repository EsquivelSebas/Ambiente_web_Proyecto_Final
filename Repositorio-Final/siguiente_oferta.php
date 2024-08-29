<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}
//funcion para hacer el tinder de trabajos ajaja
$ofertas = $_SESSION["ofertas"] ?? array();
$index = $_SESSION['index'] ?? 0;

if (isset($ofertas[$index + 1])) {
    $_SESSION['index'] = $index + 1;
} else {
    $_SESSION['index'] = 0; //reinicia para no quedar en blanco
}

header('Location: ofertas.php');
exit();
?>