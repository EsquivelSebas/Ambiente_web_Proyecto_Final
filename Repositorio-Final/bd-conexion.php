
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "g8_proyecto";

$conexion = new mysqli($servername,$username,$password,$database);

if ($conexion->connect_error) {
    echo "Error de conexión: " . $conexion->connect_error;
} else {
    echo "Conexión exitosa";
}

?>