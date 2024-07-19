<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SE work</title>
    <link rel="stylesheet" href="css/style.css">
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
                        <ul class="nav justify-content-end" id="navbar_main">
                            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="informacion.php">Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="contacto.php">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
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
          <div class="d-flex justify-content-center" style="color:aqua">
                <div class="card" style="width: 18rem;">
                    <img  src="img/LOGOAMBIENTEWEB.png" id="cardImage"  class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title"> Job Offer </h5>
                        <p class="card-text">Clickea aqui para ir al portal.</p>
                        <a href="#" class="btn btn-primary">portal</a>
                    </div>
        </section>
        <section id="services" class="mb-4">
            <h2><?php echo "Automation Intership"; ?></h2>
            <p><?php $servicesText = "Intel is looking for those who are excited to cooperate along intel team while studying. Intel just launched a new opportunity for an intership which will last 6 months, u can apply by clicking the button showed up.";
            echo $servicesText; ?>
            </p>
        </section>

        

    </main>
    <footer class="bg-light py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("d/m/Y"); ?> SE Works.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>