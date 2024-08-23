<?php
session_start();
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

<body>
    <header class="bg-light py-3" id="headermain">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="img/LOGOAMBIENTEWEB.png" alt="Logo" id="logo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <nav>
                        <ul class="nav justify-content-end" id="navbar_main1">
                            <?php
                            if (isset($_SESSION["nombre_usuario"]) && $_SESSION["nombre_usuario"] != "") {
                                if ($_SESSION["nombre_rol"] == "Cliente") {
                                    echo '<li class="nav-item"><a class="nav-link" href="select-mensaje.php">Buzon personal</a></li>';
                                } else if ($_SESSION["nombre_rol"] == "Contratador") {
                                    echo '<li class="nav-item"><a class="nav-link" href="crear_oferta.php">Crear oferta</a></li>';
                                    echo '<li class="nav-item"><a class="nav-link" href="eliminar_oferta.php">Eliminar oferta</a></li>';
                                    echo '<li class="nav-item"><a class="nav-link" href="crear_mensaje.php">Crear mensaje</a></li>';
                                }
                            ?>
                                <li class="nav-item"><a class="nav-link" href="select-oferta.php">Ofertas</a></li>
                                <li class="nav-item"><a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a></li>
                                <?php
                            } else { ?>
                                <li class="nav-item"><a class="nav-link btn-login" href="iniciar_sesion.php">Iniciar sesión</a></li>
                                <li class="nav-item"><a class="nav-link btn-login" href="crear_usuario.php">Crear Usuario Nuevo</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        <section id="home" class="mb-4">
            <h1 class="display-4" style="font-size: 20px;">What's trending</h1>
        </section>

        <!-- Tarjetas de ofertas de trabajo -->
        <div class="row mb-4">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/Intel-logo-2022.png" id="cardImage" class="card-img-top" alt="Oferta 1">
                    <div class="card-body">
                        <h5 class="card-title">Tecnico Maquinaria</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/social_default_image.png" id="cardImage" class="card-img-top" alt="Oferta 2">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/social_default_image.png" id="cardImage" class="card-img-top" alt="Oferta 3">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <!-- Repite para más ofertas de trabajo -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/ICE.png" id="cardImage" class="card-img-top" alt="Oferta 4">
                    <div class="card-body">
                        <h5 class="card-title">Electricista</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/Logo_Muni.png" id="cardImage" class="card-img-top" alt="Oferta 5">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/IMAS-logo.png" id="cardImage" class="card-img-top" alt="Oferta 6">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/social_default_image.png" id="cardImage" class="card-img-top" alt="Oferta 7">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/IMAS-logo.png" id="cardImage" class="card-img-top" alt="Oferta 8">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/Logo_Muni.png" id="cardImage" class="card-img-top" alt="Oferta 9">
                    <div class="card-body">
                        <h5 class="card-title">Voluntario</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/ICE.png" id="cardImage" class="card-img-top" alt="Oferta 10">
                    <div class="card-body">
                        <h5 class="card-title">Asistente Electricista</h5>
                        <p class="card-text">Click para mas detalles.</p>
                        <a href="#" class="btn btn-primary">Portal</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de servicios -->
        <section id="services" class="mb-4">
            <h2>Mas sobre nosotros</h2>
            <p>Nos encargamos de ofrecer siempre los mejores puestos para aquellas personas que lo necesiten, tomando en cuenta su experiencia y profecionalismo, damos la oportunidad a todo aquel que lo necesite</p>
            <a href="contacto.php" class="btn btn-primary">Sobre nosotros</a>
        </section>
    </main>

    <footer class="bg-light py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>
</body>

</html>
