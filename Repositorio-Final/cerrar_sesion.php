<?php

//Resetear los valores de las variables de sesión.
session_unset();

session_destroy();

//Redirigimos al usuario al formulario de inicio de sesión.
header("Location: iniciar_sesion.php");
?>

