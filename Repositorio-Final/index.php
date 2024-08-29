<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: iniciar_sesion.php');
    exit();
}

include 'bd-conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <header id="navbar_main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="img/LOGOAMBIENTEWEB.png" alt="Logo" id="logo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container">
                            <a class="navbar-brand" href="#"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main1" aria-controls="navbar_main1" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbar_main1">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <?php
                                    if (isset($_SESSION["nombre_usuario"]) && $_SESSION["nombre_usuario"] != "") {
                                        if ($_SESSION["nombre_rol"] == "Cliente") {
                                            echo '<li class="nav-item"><a class="nav-link" href="crear_solicitud.php">Crear solicitud</a></li>';
                                            echo '<li class="nav-item"><a class="nav-link" href="select-mensaje.php">Buzón</a></li>';
                                            echo '<li class="nav-item"><a class="nav-link" href="select-solicitud-cliente.php">Solicitudes</a></li>';
                                        } else if ($_SESSION["nombre_rol"] == "Contratador") {
                                            echo '<li class="nav-item"><a class="nav-link" href="crear_oferta.php">Crear oferta</a></li>';
                                            echo '<li class="nav-item"><a class="nav-link" href="eliminar_oferta.php">Eliminar oferta</a></li>';
                                            echo '<li class="nav-item"><a class="nav-link" href="crear_mensaje.php">Crear mensaje</a></li>';
                                            echo '<li class="nav-item"><a class="nav-link" href="select-solicitud-contratador.php">Buzón</a></li>';
                                        }
                                    ?>
                                        <li class="nav-item"><a class="nav-link" href="select-oferta.php">Ofertas</a></li>
                                        <li class="nav-item"><a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a></li>
                                        <?php
                                    } else { ?>
                                        <li class="nav-item"><a class="nav-link btn-login" href="iniciar_sesion.php">Iniciar sesión</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-4 flex-grow-1">
        <section id="home" class="mb-4">
            <h1 class="display-4" style="font-size: 20px;">What's trending</h1>
        </section>

        <!-- Carrusel de Bootstrap -->
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/intellogo.jpg" id="carrouselimg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block" id="carouseltexto">
                        <h5>Intel New CPU</h5>
                        <p>Intel has officially confirmed that its 15th generation processors, known as “Arrow Lake,” are set to launch in the fourth quarter of 2024.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/mc3.jpg" id="carrouselimg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block" id="carouseltexto">
                        <h5 style="color: aliceblue;">New Intership opportunities</h5>
                        <p style="color: aliceblue;">Microsoft just launched diverse internship programs for students eager to learn about AI models and machine learning.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-none d-md-block" id="carouseltexto">
                        <h5 id="">Nuevo modelo GPT 4.0</h5>
                        <p>An updated version of GPT-4 Turbo – the Large Language Model (LLM) that powers the paid version of ChatGPT – has been released</p>
                    </div>

                    <img src="img/chatgpt.jpg" id="carrouselimg" class="d-block w-100" alt="Slide 3">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section id="services" class="mb-4">
        <h2>Más sobre nosotros</h2>
            <p>Nos encargamos de ofrecer un sin fín de puestos de trabajo para los usuarios que no cuentan con
                experiencia laboral, revisa nuestras ofertas para encontrar la ideal para ti.</p>
            <a href="#" class="btn btn-primary">Sobre nosotros</a>
        </section>
    </main>

    <footer class="bg-light py-3 mt-4 border border-dark">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>