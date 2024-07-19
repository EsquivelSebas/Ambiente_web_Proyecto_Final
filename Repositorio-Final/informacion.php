<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
 
</head>
<body>
    <header class="bg-light py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="img/LOGOAMBIENTEWEB.png" alt="Logo" id="logo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <nav>
                        <ul class="nav justify-content-end">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="informacion.php">Información</a></li>
                            <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container mt-4">
        <section id="informacion" class="mb-4">
            <h1 class="display-4">Aquí se muestran imágenes de Bruno Mars</h1>
            <p class="lead">Se muestran imágenes de Bruno en diferentes escenarios.</p>
        </section>
        <section id="services" class="mb-4">
            <h2><?php echo "Servicios"; ?></h2>
            <p><?php $servicesText = "En esta página se muestra información de Bruno Mars así como imágenes de él."; echo $servicesText; ?></p>
        </section>
        
        <div id="image1" class="mb-4">
        <?php
            $images = array("bruno1.jpeg", "2.jpg", "3.jpg");

            foreach ($images as $image) {
                echo '<img src="img/' . $image . '" alt="Imagen de Bruno Mars" class="img-fluid">';
            }
        ?>
        </div>

        <button id="changeColorButton" class="btn btn-primary mb-4">Cambiar Color de Fondo</button>

    </main>
    <footer class="bg-light py-3 mt-4">
        <div class="container">
            <p class="text-center mb-0">&copy; <?php echo date("d/m/Y"); ?> Página Nicole Obregón.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>