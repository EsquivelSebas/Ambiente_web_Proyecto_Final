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
                            <li class="nav-item"><a class="nav-link" href="#home">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="informacion.php">Información</a></li>
                            <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container mt-4">
        <section id="home" class="mb-4">
            <h1 class="display-4" style="font-size: 20px;">Inicio</h1>
          </section>
          <div class="d-flex justify-content-center" style="color:aqua">
                <div class="card" style="width: 18rem;">
                    <img  src="img/LOGOAMBIENTEWEB.png" id="cardImage"  class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">Título del Card</h5>
                        <p class="card-text">Este es un ejemplo de un card centrado utilizando Bootstrap.</p>
                        <a href="#" class="btn btn-primary">Ir a algún lugar</a>
                    </div>
        </section>
        <section id="services" class="mb-4">
            <h2><?php echo "Servicios"; ?></h2>
            <p><?php $servicesText = "En esta página se muestra información de Bruno Mars así como imágenes de él.";
            echo $servicesText; ?>
            </p>
        </section>

        <button id="changeColorButton" class="btn btn-primary">Cambiar Color de Fondo</button>

    </main>
    <footer class="bg-light py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> Página Nicole Obregón.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>