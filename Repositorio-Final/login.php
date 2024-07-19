<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <script src="inicioSesion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="bg-light py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="img/bruno.jpg" alt="Logo" id="logo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <nav>
                        <ul class="nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container mt-4">
        <section id="contact" class="mb-4">
            <h2 class="mb-3">Formulario</h2>
            <form method="post" action="index.php">
                <div class="mb-3">
                    <label for="nombreUsuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary" id="botonEnviar">Iniciar sesión</button>
                <br>
                <p id="mensajeInicioSesion"></p>
            </form>
        </section>
    </main>
    <footer class="bg-light py-3 mt-4">
        
    </footer>
</body>
</html>