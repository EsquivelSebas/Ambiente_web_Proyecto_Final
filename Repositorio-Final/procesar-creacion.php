<?php
session_start();
include("bd-conexion.php");

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $Nombre = isset($_POST["Nombre"]) ? trim($_POST["Nombre"]) : null;
        $Apellidos = isset($_POST["Apellidos"]) ? trim($_POST["Apellidos"]) : null;
        $Genero = isset($_POST["Genero"]) ? trim($_POST["Genero"]) : null;
        $Nombre_Usuario = isset($_POST["Nombre_Usuario"]) ? trim($_POST["Nombre_Usuario"]) : null;

        // Depuración
        echo "Nombre: '$Nombre'<br>";
        echo "Apellidos: '$Apellidos'<br>";
        echo "Género: '$Genero'<br>";
        echo "Nombre de Usuario: '$Nombre_Usuario'<br>";

        // Verificar que no haya campos vacíos
        if (!$Nombre || !$Apellidos || !$Genero || !$Nombre_Usuario) {
            echo "Error: Campos vacíos<br>";
            exit();
        }

        // Verificar si el nombre de usuario ya existe
        $declaracion_usuario = $conexion->prepare("SELECT * FROM Perfil WHERE Nombre_Usuario = ?");
        if (!$declaracion_usuario) {
            echo "Error al preparar la consulta: " . $conexion->error;
            exit();
        }

        $declaracion_usuario->bind_param("s", $Nombre_Usuario);
        $declaracion_usuario->execute();
        $resultado_usuario = $declaracion_usuario->get_result();

        if ($resultado_usuario->num_rows > 0) {
            echo "Error: El nombre de usuario ya existe<br>";
            exit();
        }

        // Insertar el nuevo usuario en la base de datos
        $declaracion_insertar_usuario = $conexion->prepare("INSERT INTO Usuario (Nombre, Apellidos, Genero) VALUES (?, ?, ?)");
        if (!$declaracion_insertar_usuario) {
            echo "Error al preparar la consulta de inserción de usuario: " . $conexion->error;
            exit();
        }

        $declaracion_insertar_usuario->bind_param("sss", $Nombre, $Apellidos, $Genero);

        if (!$declaracion_insertar_usuario->execute()) {
            echo "Error al ejecutar la consulta de inserción de usuario: " . $declaracion_insertar_usuario->error;
            exit();
        }

        // Obtener el ID del usuario recién insertado
        $id_usuario = $conexion->insert_id;

        // Insertar en la tabla Perfil
        $id_rol_default = 1; 
        $declaracion_insertar_perfil = $conexion->prepare("INSERT INTO Perfil (Nombre_Usuario, Id_Usuario, Id_Rol) VALUES (?, ?, ?)");
        if (!$declaracion_insertar_perfil) {
            echo "Error al preparar la consulta de inserción de perfil: " . $conexion->error;
            exit();
        }

        $declaracion_insertar_perfil->bind_param("sii", $Nombre_Usuario, $id_usuario, $id_rol_default);

        if (!$declaracion_insertar_perfil->execute()) {
            echo "Error al ejecutar la consulta de inserción de perfil: " . $declaracion_insertar_perfil->error;
            exit();
        }

        // Registro exitoso, redirigir al inicio de sesión
        header("Location: iniciar_sesion.php?registro=exitoso");
        exit();
    } else {
        echo "Error: Solicitud no válida<br>";
        exit();
    }
} catch (Exception $e) {
    // Manejar errores y redirigir con el mensaje de error
    echo "Error: " . $e->getMessage();
    exit();
} finally {
    $conexion->close();
}
?>
