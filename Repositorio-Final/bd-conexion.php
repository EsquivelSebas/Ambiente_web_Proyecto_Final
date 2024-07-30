
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "G8_Proyecto";

$conexion = new mysqli($servername,$username,$password,$database);

if($conexion->connect_error){
    die("Conexión fallida: ".$conexion->connect_error);
}

?>