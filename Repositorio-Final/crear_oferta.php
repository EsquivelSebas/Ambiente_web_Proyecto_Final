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
    <script src="Js/verificar-oferta.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="bg-light py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="img/LOGOAMBIENTEWEB.png" alt="Logo" id="logo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <nav id="navbar_main">
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
            <h2 class="mb-3">Crear oferta</h2>
            <form method="post" action="procesar-oferta.php">
                <div class="mb-3">
                    <label for="nombreOferta" class="form-label">Nombre oferta:</label>
                    <input type="text" class="form-control" id="nombreOferta" name="nombreOferta" required>
                </div>
                <div class="mb-3">
                    <label for="descripcionOferta" class="form-label">Descripción oferta:</label>
                    <textarea class="form-control" id="descripcionOferta" name="descripcionOferta" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="fechaOferta" class="form-label">Fecha oferta:</label>
                    <input type="date" class="form-control" id="fechaOferta" name="fechaOferta" required>
                </div>
                <div class="mb-3">
                    <label for="idPerfil" class="form-label">Id perfil:</label>
                    <input type="number" class="form-control" id="idPerfil" name="idPerfil"
                        value="<?php echo $_SESSION['id_perfil']; ?>" required readonly>
                </div>
                <div class="mb-3">
                    <label for="idEmpresa" class="form-label">Id empresa:</label>
                    <input type="number" class="form-control" id="idEmpresa" name="idEmpresa" required>
                </div>
                <div class="mb-3">
                    <label for="categoriaImagen" class="form-label">Categoria de la oferta:</label>
                    <select class="form-control" id="categoriaImagen" name="categoriaImagen" required>
                        <option value="electronica">Electronica</option>
                        <option value="computacion">Computacion</option>
                        <option value="administracion">Administracion de empresas</option>
                        <option value="administracion">Administracion de proyectos</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="botonCrearOferta" name="botonCrearOferta">Crear
                    oferta</button>
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