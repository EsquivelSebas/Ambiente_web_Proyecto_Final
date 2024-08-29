<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

$ofertas = $_SESSION["ofertas"] ?? array();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación</title>
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
            <h2 class="mb-3" id="ofertas">Ofertas disponibles</h2>
            <div class="card shadow-lg p-4 mb-5 bg-white rounded" id="cardContainer">
    <?php
    $index = $_SESSION['index'] ?? 0;
    if (isset($ofertas[$index])) {
        $oferta = $ofertas[$index];
    ?>
        <div id="cardtinder" class="card-body text-center">
            <h4 class="card-title"><?php echo $oferta['Nombre_Empresa']; ?></h4>
            <h5 class="card-subtitle mb-2 text-muted"><?php echo $oferta['Nombre_Oferta']; ?></h5>
            <p class="card-text"><?php echo $oferta['Descripcion_Oferta']; ?></p>
            <p class="card-text"><small class="text-muted">Publicado: <?php echo $oferta['Fecha_Oferta']; ?></small></p>
            <div class="d-flex justify-content-around mt-4">
                <a href="#" class="btn btn-success" id="aplicarBoton">Aplicar</a>
                <a href="siguiente_oferta.php" class="btn btn-danger" id="siguienteBtn">Siguiente</a>
            </div>
        </div>
    <?php } else { ?>
        <p class="text-center">no hay ofertas disponibles.</p>
    <?php } ?>
</div>

        </section>
    </main>
    <footer class="bg-light py-3 mt-4 border border-dark">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/animacion-fade.js"></script>
</body>
</html>
