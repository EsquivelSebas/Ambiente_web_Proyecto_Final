<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: ofertas.php');
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
<body class="d-flex flex-column min-vh-100" style=" background-image: url('img/fondo2.jpg'); background-size: cover;">
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
            <div class="row">
                    <?php foreach ($ofertas as $oferta): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-lg bg-gradient-primary" id="crdbcg">
                            <div class="card-body rounded" id="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="img/LOGOAMBIENTEWEB.png" alt="Icono" class="me-2" style="width: 30px; height: 30px;">
                                    <h5 class="card-title mb-0"><?php echo $oferta['Nombre_Empresa']; ?></h5>
                                </div id="bodyText">
                                <p class="card-text"><strong>ID Oferta:</strong> <?php echo $oferta['Id_Oferta']; ?></p>
                                <p class="card-text"><strong>Nombre Oferta:</strong> <?php echo $oferta['Nombre_Oferta']; ?></p>
                                <p class="card-text text-muted"><strong>Descripción:</strong> <?php echo $oferta['Descripcion_Oferta']; ?></p>
                                <p class="card-text"><strong>Fecha Publicación:</strong> <?php echo $oferta['Fecha_Oferta']; ?></p>
                                <a href="crear_solicitud.php" class="btn btn-success w-100 mt-3">Aplica ya!</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
        </section>
    </main>
    <footer class="bg-light py-3 mt-4 border border-dark">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>
</body>
</html>
