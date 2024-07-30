<?php

include("bd-conexion.php");

$nombre =  $_POST["nombreOferta"];
$descripcion = $_POST["descripcionOferta"];
$fecha =  $_POST["fechaOferta"];
$id = $_POST["idEmpresa"];

//Creamos y preparamos la declaración para agregar la oferta a la base de datos.
$declaracion = $conexion->prepare("INSERT INTO `oferta_empleo` (Nombre_Oferta, Descripcion_Oferta, Fecha_Oferta, Id_Empresa) VALUES (?,?,?,?)");

//Vinculamos los parámetros con la declaración SQL.
$declaracion->bind_param("ssss", $nombre, $descripcion, $fecha, $id);

//Ejecutamos la declaración.
if($declaracion->execute()){
    echo "Información agregada correctamente! <br>";
}else{
    echo "Error al agregar la información:" .$declaracion->error . "<br>";
}

//Cerramos la declaración y la conexión.
$declaracion->close();
$conexion->close();
