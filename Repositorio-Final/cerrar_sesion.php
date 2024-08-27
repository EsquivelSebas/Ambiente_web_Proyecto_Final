<?php
session_start();

//reset valores
$_SESSION = array();

//eimina la sesion.
session_destroy();

//redirigir a iniciar sesion
header("Location: iniciar_sesion.php");
exit();


