<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación</title>
    <script src="Js/verificar-mensaje.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100" style=" background-image: url('img/fondo2.jpg'); background-size: cover;" >
    <header id="navbar_main" class="top-navigation" style="padding-bottom:15px;padding-top:5px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="img/LOGOAMBIENTEWEB.png" alt="Logo" id="logo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <nav id="bg-light py-3">
                        <ul class="nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container mt-4 flex-grow-1">
        <section id="contact" class="mb-4">
            <h2 class="mb-3" style="padding-bottom:1px;padding-top:70px">Crear mensaje</h2>
            <form method="post" action="procesar-mensaje.php">
                <div class="mb-3" >
                    <label for="asunto" class="form-label">Asunto:</label>
                    <textarea class="form-control" id="asunto" name="asunto" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="fechaMensaje" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" id="fechaMensaje" name="fechaMensaje" required>
                </div>
                <div class="mb-3">
                    <label for="idPerfil" class="form-label">Id perfil:</label>
                    <input type="number" class="form-control" id="idPerfil" name="idPerfil" required>
                </div>
                <button type="submit" class="btn btn-success" id="botonCrearMensaje" name="botonCrearMensaje">Enviar mensaje</button>
            </form>
        </section>
    </main>
    <footer class="bg-light py-3 mt-4 border border-dark">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>
</body>
</html>