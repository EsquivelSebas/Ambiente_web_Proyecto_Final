
<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

$solicitudes = $_SESSION["solicitudes"] ?? array();
$ofertas = array_unique(array_column($solicitudes, 'Nombre_Oferta'));

$filtro = $_GET['filtro'] ?? '';
$solicitudes_filtradas = array_filter($solicitudes, function($solicitud) use ($filtro) {
    return $filtro === '' || $solicitud['Nombre_Oferta'] === $filtro;
});
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
        <div class="row">
            <div class="col-md-12">
                <section id="contact" class="mb-4 mt-4">
                    <h2 class="mb-3" id="">Solicitudes</h2>
                    <div class="mb-3">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Ofertas
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="?filtro=">Todas</a></li>
                                <?php foreach ($ofertas as $oferta): ?>
                                    <li><a class="dropdown-item" href="?filtro=<?php echo $oferta; ?>"><?php echo $oferta; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <div class="row mt-4">
                    <?php foreach ($solicitudes_filtradas as $solicitud): ?>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-lg">
                                <div class="card-body bg-light border border-primary rounded">
                                    <p class="card-text"><strong>Id oferta:</strong><?php echo $solicitud['Id_Oferta']; ?></h5>
                                    <p class="card-text"><strong>Nombre oferta:</strong><?php echo $solicitud['Nombre_Oferta']; ?></h5>
                                    <p class="card-text"><strong>Id perfil:</strong> <?php echo $solicitud['Id_Perfil']; ?></p>
                                    <p class="card-text"><strong>CV aplicante:</strong> <?php echo $solicitud['CV_Aplicante']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-light py-3 mt-4 border border-dark">
        <div class="container">
            <p class="text-center">© <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

