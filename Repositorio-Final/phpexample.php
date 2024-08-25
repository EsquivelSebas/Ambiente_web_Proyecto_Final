

<php
$servername = "localhost";
$username ="root";
$password = "root";
$database = "biblioteca";
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
}
echo "Conexion es exitosa";
// CRUD
// CREATE ->INSERT
$sql = "INSERT INTO `usuarios`( `usuario`, `clave`, `nombre`, `email`) VALUES ('tleal','123456','Tatiana','t@l.com');";
if($conn->query($sql) === TRUE){
    echo "Registro agregado exitosamente! <br>";
} else {
    echo "Error al agregar un registro! <br>";
}
// Read -> Select
$sql = "SELECT * FROM `usuarios` WHERE 1";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "Usuario: ".$row["usuario"].", Email: ".$row["email"]."<br>";
    }
} else {
    echo "No hay registros! <br>";
}
// Update -> Update
$sql = "UPDATE `usuarios` SET `clave`='123' WHERE id=1;";
if($conn->query($sql) === TRUE){
    echo "Registro actualizado  exitosamente! <br>";
} else {
    echo "Error al actualizar un registro! <br>";
}
// Delete -> Delete
$sql = "DELETE FROM `usuarios` WHERE id=1;";
if($conn->query($sql) === TRUE){
    echo "Registro fue eliminado  exitosamente! <br>";
} else {
    echo "Error al eliminar un registro! <br>";
}
*/
//hashing de contrasenna

$clave = "12346";

$hash = password_hash($clave, PASSWORD_BCRYPT);

echo $hash;

if(password_verify($clave,$hash)){
    echo "Clave valida";
} else {
    echo "Clave erronea";
}


 15 changes: 15 additions & 0 deletions15  
db.php
Original file line number	Diff line number	Diff line change
@@ -0,0 +1,15 @@



$servername = "localhost";
$username ="root";
$password = "root";
$database = "biblioteca";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexion fallida: ".$conn->connect_error);
}

echo "Conexion es exitosa";