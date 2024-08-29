
<?php

$servername = "localhost";
$username = "root";
$password = "sebas442018";
$database = "g8_proyecto";

$conexion = new mysqli($servername,$username,$password,$database);

if ($conexion->connect_error) {
    echo "Error de conexión: " . $conexion->connect_error;
} else {
    echo "";
}

?>