<?php
session_start();

//Resetear los valores de las variables de sesión.
$_SESSION = array();

//Destruir la sesión.
session_destroy();

//Redirigir al usuario al formulario de inicio de sesión.
header("Location: iniciar_sesion.php");
exit();
?>

